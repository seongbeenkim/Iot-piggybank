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
> So i'm going to write down what kind of api you need for the project.   
> How to connect api is well described on the websites below or google.


1. Download aiyprojects-raspbian.img    
    i've used one of the ones released in 2018.   
    if yours doesn't work, it would be better to download older versions!   
https://github.com/google/aiyprojects-raspbian/releases   

2. Get Credentials for the Google Cloud api(Google cloud speech, tts, stt)   
https://console.cloud.google.com/

3. Make your own Dialogflow and connect it to raspbian   
https://dialogflow.cloud.google.com/

4. Make your own AWS EC2 server and RDS for Database   
https://console.aws.amazon.com   

### Service Introduction Video

[![Service Introduction Video – Pigmong](http://img.youtube.com/vi/k5D5-mXTpUw/0.jpg)](https://youtu.be/k5D5-mXTpUw?t=69s "Service Introduction Video – Pigmong")

### Features   

이 프로젝트 특징   

### API Reference   


### Test   
Describe and show how to run the tests with code examples.
### How to use?   
If people like your project they’ll want to learn how they can use it. To do so include step by step guide to use your project.
### Contribute   
Seongbeen Kim : Software Developer(Piggybank)   
Jaewoo Lee : Software Developer(Web application)   
jimeyong Lee : Desinger(App, Introduction Video)   

### Credits   
https://omoney.kbstar.com/quics?page=C045893#loading - KB's digital piggybank, Liiv.   
https://www.asb.co.nz/banking-with-asb/clever-kash.html - ASB's new cashless moneybox, Clever-kash.   
https://blog.prototypr.io/pig-2-620555b1479d - Pig eBank 2.   
https://wiggyapp.com/ - Wiggy.   
https://www.kickstarter.com/projects/187482891/ernittm-the-smart-piggy-bank - ERNIT   
   
we've got inspired from these piggybanks, especially a piggybank design from eBank 2.   

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
