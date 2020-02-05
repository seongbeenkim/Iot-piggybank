import datetime
import time
import threading
import sys
import logging
import pymysql
import pygame
import i2cpig

Arduino_address = 0x04

from google.cloud import texttospeech

def say(text):
    text_to_speech(text)

def play_mp3(freq):

    pygame.mixer.init(frequency=freq)
    pygame.mixer.music.load('google_voice.mp3')
    pygame.mixer.music.play()
    while pygame.mixer.music.get_busy():
        time.sleep(1)
    pygame.mixer.quit()
    i2cpig.writeNumber(Arduino_address,14)

def text_to_speech(text):
    
    pigmong = texttospeech.TextToSpeechClient()
    synthesis_input = texttospeech.types.SynthesisInput(text=text)

    voice = texttospeech.types.VoiceSelectionParams(
        language_code='ko-KR',
        name='ko-KR-Wavenet-A',
        ssml_gender=texttospeech.enums.SsmlVoiceGender.FEMALE)

    audio_config = texttospeech.types.AudioConfig(
        audio_encoding=texttospeech.enums.AudioEncoding.MP3)

    response = pigmong.synthesize_speech(synthesis_input, voice, audio_config)

    with open('google_voice.mp3', 'wb') as out:
        out.write(response.audio_content)

    play_mp3(24000)

# to get data real time
class check_start(threading.Thread):
    def __init__(self):
        threading.Thread.__init__(self)
        self.daemon = False
        self.paused = False
        self.closed = False
        self.state = threading.Condition()
        self.start()
        self.pre_piggybank = 0
        self.pre_mission = ''
        self.pre_wallet = 0
        self.pre_goal = ''
        self.pre_goal_price = 0
        self.pre_goal_nidx = 0

    def run(self):
        self.resume()
        try:
            self.cnx = pymysql.connect(host='15.164.100.60', port=3306, user='root', password='password', database='pigmong')
        except:
            print("Couldn't connect to database")
            
        #to see the newest information when boot on terminal
        print('Checking DB')
        self.db_check_mission()
        print('latest mission = {}'.format(self.pre_mission))
        self.db_check_piggybank()
        print('current balance = {}'.format(self.pre_piggybank))
        self.db_check_wallet()
        print('latest fromMom = {}'.format(self.pre_wallet))
        self.db_check_goal()
        print('latest goal nidx = {}, content = {}, price = {}'.format(self.pre_goal_nidx,self.pre_goal,self.pre_goal_price))
        
        self.cnx.close()
        
        while True:
            with self.state:
                if self.paused:
                    self.state.wait()
                try:
                    self.cnx = pymysql.connect(host='15.164.100.60', port=3306, user='root', password='dl94585854', database='pigmong')
                except:
                    print("Couldn't connect to database, retrying to connect")
                    continue
                else:
                    print("getting database real time")
                
                # check if new mission's set up real time    
                self.cursor = self.cnx.cursor()
                self.query = ('select nidx from tbl_needs where writerid="아이0"')
                self.cursor.execute(self.query)
                nidx_str = self.cursor.fetchone()
                if nidx_str is None:
                    nidx=''
                else:
                    nidx = str(nidx_str[0])
                self.query = ('select midx, contents from tbl_missions where writerid="부모0" and nidx= %s order by midx desc limit 1')
                self.cursor.execute(self.query,nidx)
                for midx,content in self.cursor:
                    if content == self.pre_mission:
                        pass
                    else:
                        self.pre_mission = content # new mission
                        i2cpig.writeNumber(Arduino_address,15)
                        pygame.mixer.init()
                        pygame.mixer.music.load("/home/pi/project246/missions.mp3")
                        pygame.mixer.music.play()
                        while pygame.mixer.music.get_busy():
                            time.sleep(1)
                        print('New mission is uploaded : {}'.format(self.pre_mission))
                        say(str(self.pre_mission)+' 미션이 추가되었어요!')

                # check if pigmong's balance is updated real time      
                self.query = ("select bidx, bbalance from tbl_piggybank where bidx=159")   
                self.cursor.execute(self.query);
                for idx,balance in self.cursor:
                    if balance == 0:
                        self.pre_piggybank=0
                    if balance == self.pre_piggybank:
                        pass
                    else:
                        
                        if int(balance) - int(self.pre_piggybank) > 0:
                            temp = balance
                            i2cpig.writeNumber(Arduino_address,15)
                            pygame.mixer.init()
                            pygame.mixer.music.load("/home/pi/project246/piggybank.mp3")
                            pygame.mixer.music.play()
                            while pygame.mixer.music.get_busy():
                                time.sleep(1)
                    
                            self.query = ('select price from tbl_needs where writerid="아이0" and nidx= %s order by nidx desc limit 1')   
                            self.cursor.execute(self.query,nidx);
                            goal_saving = self.cursor.fetchone()

                            # when you achive your goal
                            if goal_saving[0] <= int(balance):
                                self.query = ('select contents from tbl_needs where writerid="아이0"and nidx=%s order by nidx desc limit 1')
                                self.cursor.execute(self.query,nidx)
                                result = self.cursor.fetchone()
                                say("축하해요! 사고 싶은 {} 살 수 있어요!".format(str(result)))
                                time.sleep(0.96)
                                i2cpig.writeNumber(Arduino_address,17)
                               
                                # send arduino a signal to play music for servo and led up(servo is 0)
                                pygame.mixer.init()
                                pygame.mixer.music.load("/home/pi/Music/happy.mp3")
                                pygame.mixer.music.play()
                                while pygame.mixer.music.get_busy():
                                        time.sleep(1)
                                
                                i2cpig.writeNumber(Arduino_address,20)
                                
                                self.pre_piggybank = temp
                                self.pre_wallet -= self.pre_wallet
                                
                            else:
                                add_price = int(balance) - int(self.pre_piggybank)
                                say(str(add_price)+'원이 저금되었어요!')
                                self.pre_piggybank = temp
                                print('your balance is : {}'.format(self.pre_piggybank))
                                self.pre_wallet -= self.pre_wallet
                

                # check if the amount of money in children's wallet is updated real time   
                self.query = ('select idx,walletbalance from tbl_user where userid="아이0"')
                self.cursor.execute(self.query);
                for idx,walletbalance in self.cursor:
                    if walletbalance == self.pre_wallet:
                        pass
                    elif walletbalance > self.pre_wallet:
                        temp2 = walletbalance
                        i2cpig.writeNumber(Arduino_address,15)
                        pygame.mixer.init()
                        pygame.mixer.music.load("/home/pi/project246/wallet.mp3")
                        pygame.mixer.music.play()
                        while pygame.mixer.music.get_busy():
                            time.sleep(1)
                        add_walletbalance = int(walletbalance)-int(self.pre_wallet)
                        say("용돈"+str(add_walletbalance)+'원이 들어왔어요.!')
                        self.pre_wallet = temp2
                        print('your walletbalance is : {}'.format(self.pre_wallet))
                    else:
                        pass
                
                # check if goal is updated real time   
                self.cursor = self.cnx.cursor()
                self.query = ('select nidx,contents,price from tbl_needs where writerid="아이0"')
                self.cursor.execute(self.query)
                for nidx,content,price in self.cursor:
                    if nidx == self.pre_goal_nidx:
                        pass
                    else:
                        self.pre_goal_nidx = nidx
                        self.pre_goal = content
                        self.pre_goal_goal = price
                        i2cpig.writeNumber(Arduino_address,15)
                        pygame.mixer.init()
                        pygame.mixer.music.load("/home/pi/project246/missions.mp3")
                        pygame.mixer.music.play()
                        while pygame.mixer.music.get_busy():
                            time.sleep(1)
                        print('New goal is set up : {}'.format(self.pre_goal))
                        say('목표가 추가되었어요!')
  
                                
                
            time.sleep(2)
            if self.closed:
                self.cursor.close()
                self.cnx.close()
                break
    # to get database real time, after all the pigmong's process is done
    def resume(self):
        with self.state:
            self.paused = False
            self.state.notify()
            print('resume')

    # not to interupt during the pigmong's process
    def pause(self):
        with self.state:
            self.paused = True            
            print("thread is paused")
    def close(self):
        with self.state:
            self.closed = True
    
    # to get a newest mission when pigmong starts
    def db_check_mission(self):
        self.cursor = self.cnx.cursor()
    
        self.query = ('select nidx from tbl_needs where writerid="아이0"')
        self.cursor.execute(self.query)
        nidx_str = self.cursor.fetchone()
        if nidx_str is None:
            nidx=''
        else:
            nidx = str(nidx_str[0])
            print(nidx)
        
        self.query = ("select midx, contents, price from tbl_missions where writerid='부모0' and nidx= %s order by midx desc limit 1")
        self.cursor.execute(self.query,nidx)
        for pre_mid,pre_content,pre_money in self.cursor:
            print('the latest mission - index {}, content - {}, money {}'.format(pre_mid,pre_content,pre_money))
            self.pre_mission = pre_content
        return self.pre_mission                
   
    # to get a newest pimong's balance when pigmong starts
    def db_check_piggybank(self):
        self.cursor = self.cnx.cursor()
        self.query = ("select bidx, bid, bbalance from tbl_piggybank where bidx=159")
        self.cursor.execute(self.query)
        for pre_bidx,pre_bid,pre_balance in self.cursor:
            print('the latest piggybank\'s balance - index {}, id - {}, balance {}'.format(pre_bidx,pre_bid,pre_balance))
            self.pre_piggybank = pre_balance
        return self.pre_piggybank
    
    # to get a newest amount of money in children's wallet when pigmong starts    
    def db_check_wallet(self):
        self.cursor = self.cnx.cursor()
        self.query = ('select idx,username,walletbalance from tbl_user where userid="아이0"')
        self.cursor.execute(self.query)
        for pre_idx,pre_username,pre_walletbalance in self.cursor:
            print('the latest wallet\'s balance - index {}, uesrid - {}, walletbalance {}'.format(pre_idx,pre_username,pre_walletbalance))
            self.pre_wallet = pre_walletbalance
        return self.pre_wallet

    # to get a newest goal when pigmong starts    
    def db_check_goal(self):
        self.cursor = self.cnx.cursor()
        self.query = ('select nidx,contents,price from tbl_needs where writerid="아이0"')
        self.cursor.execute(self.query)
        for pre_nidx,pre_contents,pre_price in self.cursor:
            print('the latest goal - nidx - {} content - {}, price - {}'.format(pre_nidx,pre_contents,pre_price))
            self.pre_goal = pre_contents
            self.pre_goal_price = pre_price
            self.pre_goal_nidx = pre_nidx 
        return self.pre_goal, self.pre_goal_price, self.pre_goal_nidx
    
    
def main():
    check_start()

if __name__ == '__main__':
    main()
