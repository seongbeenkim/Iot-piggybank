# Pigmong
> __아이들의 꾸준한 저축 실천을 위한 디지털 저금통__   
Digial Piggy Bank for child's steady saving practices   

### Service Introduction Video

[![Service Introduction Video – Pigmong](http://img.youtube.com/vi/k5D5-mXTpUw/0.jpg)](https://youtu.be/k5D5-mXTpUw?t=69s "Service Introduction Video – Pigmong")   
   
> 이미지나 아래의 링크를 클릭하시면 소개 영상을 보실 수 있습니다.   
Please click the image or links below to watch the video
* 0:00 ~ 0:53 - [Intro](https://youtu.be/k5D5-mXTpUw?t=0s)   
* 0:54 ~ 1:08 - [Team introduction](https://youtu.be/k5D5-mXTpUw?t=54s)   
* 1:09 ~ 1:41 - [Pigmong introduction](https://youtu.be/k5D5-mXTpUw?t=69s)   
* 1:42 ~ 2:43 - [Service features](https://youtu.be/k5D5-mXTpUw?t=102s)   
* 2:44 ~ 6:07 - [Product demonstration](https://youtu.be/k5D5-mXTpUw?t=164s)   


### Motivation   
- __어린 시절의 경제관념이 성인이 되어도 영향을 미치기에, 아이들에게 계획적인 저축 습관과 돈의 가치를 올바르게 인식시키기 위하여 개발하게 되었습니다.__    
a sense of economy of childhood influence adult's one, so we've made pigmong to make children perceive the value of money and the habit of planned saving rightly

### Installation
- __프로젝트에 결합된 api를 사용하기 위해서는 이를 위한 설정이 필요합니다.   
api를 모두 연결시키는 자세한 방법은 적지 않고 어떤 api가 필요한지에 대해서만 적겠습니다.   
api 연결하는 방법은 api 웹사이트나 구글에 검색하시면 쉽게 설명이 되어있어 따라하시면 됩니다.__   

    > You need to set up on your Raspberry pi for api before using the project.   
      So i'm going to write down what kind of api you need for the project.   
      How to connect api is well described on the websites below or google.

1. __"aiyprojects-raspbian.img" 를 다운로드 해주세요.   
   저는 "AIY Kits Release 2018-11-16"를 사용했습니다.   
   만약 제대로 작동하지 않을 경우, 다운로드 받으신 버전보다 최신 버전으로 다운받으셔서 하시면 될 겁니다.__   
   > Please Download "aiyprojects-raspbian.img"    
   i've used "AIY Kits Release 2018-11-16".   
   if yours doesn't work, it would be better to download a newer version!   
   
    https://github.com/google/aiyprojects-raspbian/releases   

2. __구글 api를 사용하기 위해서는 권한이 필요하니 아래의 사이트에 가서 등록해주세요.   
   아래의 사이트 들어가시면 "Get CREDENTIALS" 에 권한 설정하는 방법 자세히 나와있습니다.__
   > Get Credentials for the Google Cloud api(Google cloud speech, tts, stt)   
     website below will show you how to get Credentials in "Get CREDENTIALS" section  
     
    https://aiyprojects.withgoogle.com/voice-v1/ 

3. __본인만의 Dialogflow를 생성해주시고 라즈베리파이에 연결해주세요.__    
   > Make your own Dialogflow and connect it to raspbian   
   
    https://dialogflow.cloud.google.com/

4. __데이터베이스를 사용하기 위해 AWS EC2, RDS를 만들어주세요. 아니면 자체 mysql로 하셔도 됩니다.__
   > Make your own AWS EC2 server and RDS for Database or just use mysql in localhost

    https://console.aws.amazon.com   

### Features   
__ 어플리케이션을 통해서 아이가 사고 싶어하는 물건을 등록함으로써
#### App Storyboard   
<img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/Storyboard.png" width="700px" height="450px" title="Storyboard" alt="Storyboard"></img><br/>   

#### Hardware Circuit Diagram   
<img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/hardware.jpg" width="450px" height="450px" title="Hardware Circuit" alt="Hardware Circuit"></img><br/>   

#### Database Table
   <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/DB_Table.png" width="450px" height="300px" title="Database Table" alt="Database Table"></img><br/>   

### API Reference   


### Test   
Describe and show how to run the tests with code examples.
### How to use?   
__"pigmong_db.py" 의 66번째 라인, "pigmong_main.py" 의 31번째 라인의 DB 연결 코드를 본인걸로 바꿔주셔야 합니다.__   
   > First of all, you have to put your own DB information on, line 66, in pigmong_db.py and line 31, in pigmong_main.py
``` python
## line 66, in pigmong_db.py
self.cnx = pymysql.connect(host='15.164.100.60', port=3306, user='root', password='password', database='pigmong')
## line 31, in pigmong_main.py
cnx = pymysql.connect(host='15.164.100.60', port=3306, user='root', password='password', database='pigmong')
```   
Example
``` python
python3 pigmong_main.py
```

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

### License   

aiy_audio.py  ->  pigmong_audio.py
detect_intent_texts.py  ->  pigmong_detect_intent_texts.py
//they are just the same code as the former ones! i wanted to classify code files that i used.

aiy_board.py  ->  pigmong_board.py
//i deleted some parts that i don't use.

aiy_cloudspeech.py  ->  pigmong_cloudspeech.py
//i added few lines for the neopixel ring and servo motor.

cloudspeech_pre_demo.py  ->  pigmong.py
//this is the main code!!!.

As with the project, it would be great to hear your thoughts, questions and suggestions. 
