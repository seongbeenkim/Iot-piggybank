import smbus
import time
 # for RPI version 1, use “bus = smbus.SMBus(0)”
bus = smbus.SMBus(1)

# This is the Arduino_address we setup in the Arduino Program
Arduino_address = 0x04

def writeNumber(value):
    bus.write_byte(Arduino_address, value)
    # bus.write_byte_data(Arduino_address, 0, value)
    return -1

def readNumber():
    number = bus.read_byte(Arduino_address)
    # number = bus.read_byte_data(Arduino_address, 1)
    return number

