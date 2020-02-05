# Pigmong
> __아이들의 꾸준한 저축 실천을 위한 디지털 저금통__   

사진 넣자 

### Motivation   
- __어린 시절의 경제관념이 성인이 되어도 영향을 미치기에, 아이들에게 계획적인 저축습관과 돈의 가치를 바르게 인식시키기 위하여 개발하게 되었습니다.__    

### Installation
- __프로젝트에 결합된 api를 사용하기 위해서는 이를 위한 설정이 필요합니다.__   
__api를 모두 연결시키는 자세한 방법은 적지 않고 어떤 api가 필요한지에 대해서만 적겠습니다.__   
__api 연결하는 방법은 api 웹사이트나 구글에 검색하시면 쉽게 설명이 되어있어 따라하시면 됩니다.__
> You need to set up on your Raspberry pi for api before using the project.   
> So i'm going to write down what kind of api you need for the project, not in detail!   
> How to connect api is well described on the websites below or google.


1. Download aiyprojects-raspbian.img    
    i've tested "AIY Kits Release 2018-11-16" 
    if yours doesn't work, it would be better to download older versions!   
https://github.com/google/aiyprojects-raspbian/releases   

2. Get Credentials for the Google Cloud api(Google cloud speech, tts, stt)   
https://console.cloud.google.com/

3. Make your own Dialogflow and connect it to raspbian   
https://dialogflow.cloud.google.com/

4. Make your own AWS EC2 server and RDS for Database   
https://console.aws.amazon.com   

### Screenchots   

[![Video Label](http://img.youtube.com/vi/uLR1RNqJ1Mw/0.jpg)](https://youtu.be/uLR1RNqJ1Mw?t=0s) Video Label
 
스크린샷이나 동영상 넣자   

### Features   

이 프로젝트 특징   

### API Reference   

### Test   
Describe and show how to run the tests with code examples.
### How to use?   
If people like your project they’ll want to learn how they can use it. To do so include step by step guide to use your project.
### Contribute   
Let people know how they can contribute into your project. A contributing guideline will be a big plus.
### Credits   
Give proper credits. This could be a link to any repo which inspired you to build this project, any blogposts or links to people who contrbuted in this project.
### License   



Pigmong is an iot piggy bank made of Raspberry Pi 3, Adafruit Pro Trinket and Google AIY voice kit! + (servo motor, neopixel ring)

the reason why i used Google AIY voice kit was because i had it, you can use other stuff instead of the kit! and the other parts of the project as well!! (i just used a aiy board, a button and basic cloudspeech code!)

but to use google api like cloudspeech or dialogflow, you need to sign up for google cloud platform.

the main code are written with python in Ubuntu Linux and the code for hardware is written in Arduino IDE.

i refered to some code for the project!

aiy_audio.py  ->  pigmong_audio.py
detect_intent_texts.py  ->  pigmong_detect_intent_texts.py
//they are just the same code as the former ones! i wanted to classify code files that i used.

aiy_board.py  ->  pigmong_board.py
//i deleted some parts that i don't use.

aiy_cloudspeech.py  ->  pigmong_cloudspeech.py
//i added few lines for the neopixel ring and servo motor.

cloudspeech_pre_demo.py  ->  pigmong246.py
//this is the main code!!!.

As with the project, it would be great to hear your thoughts, questions, suggestions. 

You can find me here or seongbeen93@naver.com
