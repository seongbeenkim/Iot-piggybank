#!/usr/bin/env python3

import argparse
import logging
import subprocess
import os, random
import time
import pigmong246_db
import sys
import smbus
import pygame
import pymysql
import i2cpig
from google.cloud import texttospeech
from pigmong_detect_intent_texts import detect_intent_texts
from pigmong_board import Board
from pigmong_cloudspeech import CloudSpeechClient

state_start = False
check_percent = False
music_playing = False

filename = ''
filepath = ''
Arduino_address = 0x04

# to connect to mysql
def data_check():
    try:
        # type your mysql information
        cnx = pymysql.connect(host='15.164.100.60', port=3306, user='root', password='password', database='pigmong')
    except:
        print("Pigmong couldn't connect to database")
    return cnx

def say(text):
    text_to_speech(text)

# to play a celebrating song when you achieve your goal
def play_mp3(freq):
    global state_start
    global check_percent
    if state_start == False:
        if check_percent == False:
            i2cpig.writeNumber(Arduino_address,20) # exit led_processing
            time.sleep(0.96)
            i2cpig.writeNumber(Arduino_address,13) # execute led_talking
        elif check_percent == True:
            i2cpig.writeNumber(Arduino_address,13) # execute led_talking
        
    pygame.mixer.init(frequency=freq)
    pygame.mixer.music.load('google_voice.mp3')
    pygame.mixer.music.play()
    while pygame.mixer.music.get_busy():
        time.sleep(1)
    pygame.mixer.quit()
    
    if state_start == False:
        if check_percent == False:
            i2cpig.writeNumber(Arduino_address,20) # exit led_talking
            time.sleep(0.96)
            i2cpig.writeNumber(Arduino_address,14) # excute led_stop_talking
        elif check_percent == True:
            i2cpig.writeNumber(Arduino_address,20) # exit led_talking
            time.sleep(0.96)
            i2cpig.writeNumber(Arduino_address,16) # excute led_off

# to convert korean text to 
def text_to_speech(text):
    
    pigmong = texttospeech.TextToSpeechClient()
    synthesis_input = texttospeech.types.SynthesisInput(text=text)

    voice = texttospeech.types.VoiceSelectionParams(
        # you can change korean into other languages here
        language_code='ko-KR',
        name='ko-KR-Wavenet-A',
        ssml_gender=texttospeech.enums.SsmlVoiceGender.FEMALE)

    audio_config = texttospeech.types.AudioConfig(
        audio_encoding=texttospeech.enums.AudioEncoding.MP3)

    response = pigmong.synthesize_speech(synthesis_input, voice, audio_config)

    with open('google_voice.mp3', 'wb') as out:
        out.write(response.audio_content)
    # you can change frequency of voice
    play_mp3(24000)
    

def main():
    # to enable Auto-start after booting
    # you need to type your cloud_speech json file path
    os.environ['GOOGLE_APPLICATION_CREDENTIALS'] = '/home/pi/cloud_speech.json'
    
    #to solve a problem which is an audio file doesn't play longer than 1 sec
    subprocess.call('sudo sed -i -e "s/^load-module module-suspend-on-idle/#load-module module-suspend-on-idle/" /etc/pulse/default.pa', shell=True)
    subprocess.call('pulseaudio --kill', shell=True)
    subprocess.call('pulseaudio --start', shell=True)

    global filename
    global filepath
    global state_start
    global check_percent
    global music_playing
    
    state_start = True
    paused = False
    
    # to use dialogflow
    project_id = 'project246'
    session_id = 'project246_session'
    language_code = 'ko-KR'
    logging.basicConfig(level=logging.DEBUG)

    parser = argparse.ArgumentParser(description='Assistant service example.')
    parser.add_argument('--language', default='ko-KR')
    args = parser.parse_args()

    logging.info('Initializing for language %s...', args.language)
    pigmong = CloudSpeechClient()
    db_check = pigmong246_db.check_start()
    
    with Board() as board:

        # alarm when pigmong wakes up
        pygame.mixer.init()
        i2cpig.writeNumber(Arduino_address,10)
        time.sleep(1)
        say('피그몽이 일어났어요!')
        state_start = False
        
        while True:
            print("waiting for the button")
            
            board.button.wait_for_press()
                               
            if paused == False:
                db_check.pause()
                paused == True
                
            
            text = pigmong.recognize(language_code=args.language)       
            
            if text is None:
                logging.info('You said nothing.')
                say('아무말도 하지 않았네요! 버튼을 다시 눌러서 말씀해주세요.')
                db_check.resume()
                continue
 
            # to detect intent texts from your dialogflow
            text = detect_intent_texts(project_id, session_id, text, language_code)

                       
            logging.info('You said: "%s"' % text)

            # when the intent is about checking missions
            if '미션 확인' in text:

                # you need to connect to mysql whenever you want to get data from your database otherwise you can't get any newest data 
                cnx = data_check()
                cursor = cnx.cursor()
                query = ('select nidx from tbl_needs where writerid="아이0"')
                cursor.execute(query)
                nidx_str = cursor.fetchone()
                if nidx_str is None:
                    nidx=''
                else:
                    nidx = str(nidx_str[0])
            
                query = ('select contents from tbl_missions where writerid="부모0" and nidx= %s order by midx desc limit 1')
                cursor.execute(query,nidx)
                result = cursor.fetchone()
                a = '현재 미션은'
                b = '에요.'
                if result is None:
                    i2cpig.writeNumber(Arduino_address,20)
                    say("아직 미션이 등록되지 않았어요.")
                else:
                    mission = a + str(result) + b
                    i2cpig.writeNumber(Arduino_address,20)
                    #time.sleep(0.96)
                    say(mission)
                cursor.close()
                cnx.close()

            # when the intent is about checking children's wallet
            elif '아이 지갑 확인' in text:
                cnx = data_check()
                cursor = cnx.cursor()
           
                query = ('select walletbalance from tbl_user where userid="아이0"')
                cursor.execute(query)
                result = cursor.fetchone()
                a = '저금할 수 있는 용돈은'
                b = '원이에요.'
                if result[0] == 0:
                    i2cpig.writeNumber(Arduino_address,20)
                    say("저금할 수 있는 용돈이 없어요.")
                else:
                    wallet = a + str(result) + b
                    i2cpig.writeNumber(Arduino_address,20)
                    say(wallet)
                cursor.close()
                cnx.close()

            # when the intent is about checking a goal    
            elif '목표 확인' in text:
                cnx = data_check()
                cursor = cnx.cursor()
                query = ('select nidx from tbl_needs where writerid="아이0"')
                cursor.execute(query)
                nidx_str = cursor.fetchone()
                if nidx_str is None:
                    nidx=''
                else:
                    nidx = str(nidx_str[0])
                    
                query = ('select contents from tbl_needs where writerid="아이0" and nidx= %s order by nidx desc limit 1')
                cursor.execute(query,nidx)
                result = cursor.fetchone()
                a = '현재 목표는'
                b = '에요.'
                if result is None:
                    i2cpig.writeNumber(Arduino_address,20)
                    say('아직 목표가 등록되지 않았어요.')
                else:
                    goal = a + str(result) + b
                    i2cpig.writeNumber(Arduino_address,20)
                    say(goal)
                cursor.close()
                cnx.close()
            
            # when the intent is about checking target amount 
            elif '목표 금액 확인' in text:
    
                i2cpig.writeNumber(Arduino_address,20) # exit led_processing
                time.sleep(0.96)
                i2cpig.writeNumber(Arduino_address,14) # excute led_stop_talking
                cnx = data_check()
                cursor = cnx.cursor()
                query = ('select nidx from tbl_needs where writerid="아이0"')
                cursor.execute(query)
                nidx_str = cursor.fetchone()
                if nidx_str is None:
                    nidx=''
                else:
                    nidx = str(nidx_str[0])

                query = ('select price from tbl_needs where writerid="아이0" and nidx= %s order by nidx desc limit 1')
                cursor.execute(query,nidx)
                goal_saving = cursor.fetchone()
                if goal_saving is None:
                    i2cpig.writeNumber(Arduino_address,13)
                    say('아직 목표가 등록되지 않았어요.')
                    i2cpig.writeNumber(Arduino_address,20)
                else:
                    
                    print(goal_saving)
                    a = '현재 목표 금액은'
                    b = '원이며 '
                    goal_saving_str = str(goal_saving[0])
                    goal = a + goal_saving_str + b
                  
                    query = ('select bbalance from tbl_piggybank where bidx=159')
                    cursor.execute(query)
                    current_balance = cursor.fetchone()
                    print(current_balance)
                    c = '목표 금액까지'
                    d = '원 남았어요'
                    current_balance_str = str(current_balance[0])
                    final_saving = int(goal_saving_str)-int(current_balance_str)
                    
                    final_saving/int(goal_saving_str)
                    
                    final = goal + c + str(final_saving) + d
                    
                    temp_data = round(((current_balance[0]/goal_saving[0])*100))
                    print(temp_data)
                    time.sleep(1)
                    check_percent = True

                    # i divid data into 8 sections because i use only 8 led of the neopixel ring.
                    # 12.5 * 8 => 100 
                    if temp_data >= 100:
                        query = ('select contents from tbl_needs where writerid="아이0"and nidx=%s order by nidx desc limit 1')
                        cursor.execute(query,nidx)
                        result = cursor.fetchone()
                        i2cpig.writeNumber(Arduino_address,7)
                        time.sleep(9)
                        i2cpig.writeNumber(Arduino_address,13)
                        say("축하해요! 사고 싶은 {} 살 수 있어요!".format(str(result)))
                        #time.sleep(0.96)
                        i2cpig.writeNumber(Arduino_address,20)
                        time.sleep(0.96)
                        i2cpig.writeNumber(Arduino_address,14)
                        
                    elif temp_data >= 87.5:
                        i2cpig.writeNumber(Arduino_address,6)
                        time.sleep(7)
                        say(final)
                    elif temp_data >= 75:
                        i2cpig.writeNumber(Arduino_address,5)
                        time.sleep(6)
                        say(final)
                    elif temp_data >= 62.5:
                        i2cpig.writeNumber(Arduino_address,4)
                        time.sleep(5)
                        say(final)
                    elif temp_data >= 50:
                        i2cpig.writeNumber(Arduino_address,3)
                        time.sleep(5)
                        say(final)
                    elif temp_data >= 37.5:
                        i2cpig.writeNumber(Arduino_address,2)
                        time.sleep(4)
                        say(final)
                    elif temp_data >= 25:
                        i2cpig.writeNumber(Arduino_address,1)
                        time.sleep(4)
                        say(final)
                    elif temp_data >= 12.5:
                        i2cpig.writeNumber(Arduino_address,0)
                        time.sleep(3)
                        say(final)
                    elif temp_data >= 0:
                        say(final)
                    
                check_percent = False
                cursor.close()
                cnx.close()

            # when the intent is about checking piggybank's balance
            elif '저금액 확인' in text:
                
                cnx = data_check()
                cursor = cnx.cursor()
 
                query = ('select nidx from tbl_needs where writerid="y"')
                cursor.execute(query)
                nidx_str = cursor.fetchone()
                if nidx_str is None:
                    nidx=''
                else:
                    nidx = str(nidx_str[0])
                
                query = ("select bbalance from tbl_piggybank where bidx=159")
                
                cursor.execute(query)
                result = cursor.fetchone()
                a = '현재까지의 저금한 용돈은'
                b = '원이에요.'
        
                current_balance = a + str(result) + b
                say(current_balance)
                cursor.close()
                cnx.close()

            # when the intent is about turning off pigmong  
            elif '시스템 종료' in text:
                say('피그몽은 자러 갈 거에요. 안녕!')
                break
                subprocess.call('sudo shutdown now', shell=True)
            else:
                say('죄송해요. 다시 말씀해주세요!')
            

            db_check.resume()
            paused = False
            time.sleep(1)
if __name__ == '__main__':
    main()