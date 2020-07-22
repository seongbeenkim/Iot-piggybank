# Pigmong
__Digial Piggy Bank for child's steady saving practices__   

### Service Introduction Video

[![Service Introduction Video – Pigmong](http://img.youtube.com/vi/k5D5-mXTpUw/0.jpg)](https://youtu.be/k5D5-mXTpUw?t=69s "Service Introduction Video – Pigmong")   
   
> Please click the image or links below to watch the video (in Korean).   
* 0:00 ~ 0:53 - [Intro](https://youtu.be/k5D5-mXTpUw?t=0s)   
* 0:54 ~ 1:08 - [Team introduction](https://youtu.be/k5D5-mXTpUw?t=54s)   
* 1:09 ~ 1:41 - [Pigmong introduction](https://youtu.be/k5D5-mXTpUw?t=69s)   
* 1:42 ~ 2:43 - [Service features](https://youtu.be/k5D5-mXTpUw?t=102s)   
* 2:44 ~ 6:07 - [Product demonstration](https://youtu.be/k5D5-mXTpUw?t=164s)   


### Motivation   
- __A sense of economy of childhood influences on adult's one, so we've made pigmong to make children perceive the value of money and the habit of planned saving rightly__    

### Installation
- __You need to set up on your Raspberry pi for some API before using the project.   
So i'm going to write down what kind of API you need for the project.   
How to connect api to the project is well described on the websites below.__   

1. __Please download "aiyprojects-raspbian.img"   
   i've used "AIY Kits Release 2018-11-16".   
   if it doesn't work properly, download a newer version please. it would work on a newer version!__      
   
    https://github.com/google/aiyprojects-raspbian/releases   

2. __Get credentials for the Google Cloud api(Google cloud speech, tts, stt)   
   A website below will show you how to get credentials in "GET CREDENTIALS" section.__   
     
    https://aiyprojects.withgoogle.com/voice-v1/ 

3. __Make your own Dialogflow and connect it to raspbian.    
   Download "pigmong_diaglogflow.zip" and then apply intents and Entities to your own agent.__     
   
    https://dialogflow.cloud.google.com/

4. __Make your own AWS EC2 server and RDS for database or just use mysql in localhost.__

    https://console.aws.amazon.com   

5. __Install pymysql with "pip install pymysql" in Linux__   

### Features   
__You can watch our service introdunction [Pigmong introduction](https://youtu.be/k5D5-mXTpUw?t=69s), features [Service features](https://youtu.be/k5D5-mXTpUw?t=102s) on youtube (in Korean)__   
 
- __Piggy Bank's Features__   
   
   __The Piggy Bank gives you information related to your savings__   
   __It shows you the states of the Piggy Bank with LED(mouth) and Servo motor(ears)__   
   
   __Main status__   
   * __When listening to user's voice__   

      <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/state_listening.gif" width="150px" height="150px" title="Listening" alt="Listening"></img><br/>   
      
   * __When parsing words from user voice data__   
      
      <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/state_process.gif" width="150px" height="150px" title="Processing" alt="Processing"></img><br/>   
   
   * __When talking to user__   
      
      <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/state_talk.gif" width="150px" height="150px" title="Talking" alt="Talking"></img><br/>   
   
   __The rest__
   * __When getting asked how much it's been saved__   
      
     __Showing "The ratio of the saved money compared to its goal" with LED anf Servo motor__   
     __LED "100 / 8 = 12.5" each LED : 12.5%, Servo motor 180 degree "180 / 8 = 22.5" per each LED : 22.5"__   
     __LEDs come on as much as the ratio, rotating the servo moter.__   
     
     - Servo motor - 0 ~ 180   
     <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/servo_motor(ears).gif" width="200px" height="200px" title="servo_motor" alt="servo_motor"></img><br/>   
     - LED - 0 ~ 8   
     <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/state_percentage.gif" width="200px" height="200px" title="state_percentage" alt="state_percentage"></img><br/>  
     - Example   
     <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/showing_percentage.gif" width="300px" height="300px" title="showing_percentage" alt="showing_percentage"></img><br/>   
     
   * __When accomplishs the savings goal__    
   
     __LEDs comes on and off quickly, playing a song for celebration__   
      
     - Example   
   <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/complete_saving.gif" width="300px" height="300px" title="complete_saving" alt="complete_saving"></img><br/>   
   
   * __When the data is updated__      
     
     __Giving you notification by playing different alarm sounds depend on data, rotating servo motor and turning on LED__   

     - Example   
     <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/state_alarm.gif" width="300px" height="300px" title="state_alarm" alt="state_alarm"></img><br/>   
     
   * __A video that shows the Piggy Bank's all status__ 
      
     [![All states – Pigmong](http://img.youtube.com/vi/BkBq-P0q2wQ/0.jpg)](https://youtu.be/BkBq-P0q2wQ?t=0s "All states – Pigmong")   
     > Please click the image to watch the video (in Korean).   
   
    __the Piggy Bank's test video__   
      
     [![Test Video – Pigmong](http://img.youtube.com/vi/WiCvG09UwmM/0.jpg)](https://youtu.be/WiCvG09UwmM?t=0s "Test Video – Pigmong")   
     > Please click the image to watch the video (in Korean).   

- __App's Features__     
   
   * __App's Storyboard__   
      
      <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/Storyboard.png" width="900px" height="450px" title="Storyboard" alt="Storyboard"></img><br/>   
         
      __1. Child - Set up a goal__   
      __2. Parent - Check the goal and give the child assignments with the amount of money that the child would get when the child does__   
      __3. Child - Complete the assignments__    
      __4. Parent - Check if the assignments is done properly and then send the pocket money__   
      __5. Child - Save money to the piggy bank__   
      __6. When you accomplish your goal, you can get your goal and repeat the 1 ~ 5 process.__      
   
   
   * __App's demo__   
      
      * __Giving assignments__   
      
        　　　　   　　　__Child　　 　　　　　　　　　　　　　　　　　Parent__   
     <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/app_demo1.gif" width="600px" height="400px" title="app_demo1" alt="app_demo1"></img><br/>   
        
      * __Completing assignments and Saving__    
         
        　　　　   　　　__Child　　 　　　　　　　　　　　　　　　　　Parent__   
     <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/app_demo_2.gif" width="600px" height="400px" title="app_demo_2" alt="app_demo_2"></img><br/> 

- __Hardware Circuit Diagram__   
<img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/hardware.jpg" width="450px" height="450px" title="Hardware Circuit" alt="Hardware Circuit"></img><br/>   
__If you don't have Google AIY Voice board, you can just use Raspberry pi 3 but you have to get a speaker and a mike for Raspberry pi 3. and also you can use Arduino instead of Adafruit Pro Trinket.__

- __Database Table__   
   <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/DB_Table.png" width="450px" height="300px" title="Database Table" alt="Database Table"></img><br/>   

- __Data Flow Diagram__   
   <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/Data_Flow_Diagram.png" width="800px" height="400px" title="Data_Flow_Diagram" alt="Data_Flow_Diagram"></img><br/>   
   
### Demo GIF
<img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/demo.gif" width="650px" height="400px" title="Pigmong demo" alt="Pigmong demo"></img>

### How to use?    
__First of all, you have to put your own DB information on, line 66, 88 in pigmong_db.py and line 31, in pigmong_main.py__   

``` python
## line 66, 88 in pigmong_db.py
self.cnx = pymysql.connect(host='15.164.100.60', port=3306, user='root', password='password', database='pigmong')
## line 31, in pigmong_main.py
cnx = pymysql.connect(host='15.164.100.60', port=3306, user='root', password='password', database='pigmong')
```
### Test   
``` python
python3 pigmong_main.py
```   
__Click a button and then ask what you would like to know about your savings__

### Contribute   
* __Seongbeen Kim : Software Developer(Piggy Bank)__   
* __Jaewoo Lee : Software Developer(Web application)__   
* __Jimeyong Lee : Desinger(UX/UI, Introduction Video)__   

### Credits   
* https://omoney.kbstar.com/quics?page=C045893#loading - KB's digital Piggy Bank, Liiv.   
* https://www.asb.co.nz/banking-with-asb/clever-kash.html - ASB's new cashless moneybox, Clever-kash.   
* https://blog.prototypr.io/pig-2-620555b1479d - Pig eBank 2.   
* https://wiggyapp.com/ - Wiggy.   
* https://www.kickstarter.com/projects/187482891/ernittm-the-smart-piggy-bank - ERNIT   
   
we've got inspired from these Piggy Banks, especially a Piggy Bank's design from eBank 2.   

### API Reference   

Amazon EC2 - https://docs.aws.amazon.com/ec2/   
Amazon RDS - https://docs.aws.amazon.com/rds/   
Google Cloud Speech-to-Text - https://cloud.google.com/speech-to-text/docs      
Google Cloud Text-to-Speech - https://cloud.google.com/text-to-speech/docs      
Google Diaglogflow - https://cloud.google.com/dialogflow/docs/quick      
   
__As with the project, it would be great to hear your thoughts, questions and suggestions.__ 
