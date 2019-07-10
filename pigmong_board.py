# Copyright 2017 Google Inc.
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

import contextlib
import itertools
import queue
import threading
import time

from collections import namedtuple

from RPi import GPIO

class Button:

    @staticmethod
    def _trigger(event_queue, callback):
        try:
            while True:
                event_queue.get_nowait().set()
        except queue.Empty:
            pass

        if callback:
            callback()

    def _run(self):
        when_pressed = 0.0
        pressed = False
        while not self._done.is_set():
            now = time.monotonic()
            if now - when_pressed > self._debounce_time:
                if GPIO.input(self._channel) == self._expected:
                    if not pressed:
                        pressed = True
                        when_pressed = now
                        self._trigger(self._pressed_queue, self._pressed_callback)
                else:
                    if pressed:
                        pressed = False
                        self._trigger(self._released_queue, self._released_callback)
            self._done.wait(0.05)

    def __init__(self, channel, edge='falling', pull_up_down='up',
                 debounce_time=0.08):
        if pull_up_down not in ('up', 'down'):
            raise ValueError('Must be "up" or "down"')

        if edge not in ('falling', 'rising'):
            raise ValueError('Must be "falling" or "rising"')

        self._channel = channel
        GPIO.setup(channel, GPIO.IN,
                   pull_up_down={'up': GPIO.PUD_UP, 'down': GPIO.PUD_DOWN}[pull_up_down])

        self._pressed_callback = None
        self._released_callback = None

        self._debounce_time = debounce_time
        self._expected = True if edge == 'rising' else False

        self._pressed_queue = queue.Queue()
        self._released_queue = queue.Queue()

        self._done = threading.Event()
        self._thread = threading.Thread(target=self._run)
        self._thread.start()

    def close(self):
        self._done.set()
        self._thread.join()
        GPIO.cleanup(self._channel)

    def __enter__(self):
        return self

    def __exit__(self, exc_type, exc_value, exc_tb):
        self.close()

    def _when_pressed(self, callback):
        self._pressed_callback = callback
    when_pressed = property(None, _when_pressed)

    def _when_released(self, callback):
        self._released_callback = callback
    when_released = property(None, _when_released)

    def wait_for_press(self, timeout=None):
        event = threading.Event()
        self._pressed_queue.put(event)
        return event.wait(timeout)

    def wait_for_release(self, timeout=None):
        event = threading.Event()
        self._released_queue.put(event)
        return event.wait(timeout)

BUTTON_PIN = 23

class Board:

    def __init__(self, button_pin=BUTTON_PIN):
        self._stack = contextlib.ExitStack()
        self._lock = threading.Lock()
        self._button_pin = button_pin
        self._button = None

        GPIO.setmode(GPIO.BCM)

    def close(self):
        self._stack.close()
        with self._lock:
            self._button = None
          

    def __enter__(self):
        return self

    def __exit__(self, exc_type, exc_value, exc_tb):
        self.close()

    @property
    def button(self):
        with self._lock:
            if not self._button:
                self._button = self._stack.enter_context(Button(self._button_pin))
            return self._button

