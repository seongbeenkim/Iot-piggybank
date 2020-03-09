# Pigmong
> __아이들의 꾸준한 저축 실천을 위한 디지털 저금통__   
Digial Piggy Bank for child's steady saving practices   

### Service Introduction Video

[![Service Introduction Video – Pigmong](http://img.youtube.com/vi/k5D5-mXTpUw/0.jpg)](https://youtu.be/k5D5-mXTpUw?t=69s "Service Introduction Video – Pigmong")   
   
> 이미지나 아래의 링크를 클릭하시면 소개 영상을 보실 수 있습니다.   
Please click the image or links below to watch the video (in Korean).
* 0:00 ~ 0:53 - [Intro](https://youtu.be/k5D5-mXTpUw?t=0s)   
* 0:54 ~ 1:08 - [Team introduction](https://youtu.be/k5D5-mXTpUw?t=54s)   
* 1:09 ~ 1:41 - [Pigmong introduction](https://youtu.be/k5D5-mXTpUw?t=69s)   
* 1:42 ~ 2:43 - [Service features](https://youtu.be/k5D5-mXTpUw?t=102s)   
* 2:44 ~ 6:07 - [Product demonstration](https://youtu.be/k5D5-mXTpUw?t=164s)   


### Motivation   
- __어린 시절의 경제관념이 성인이 되어도 영향을 미치기에, 아이들에게 계획적인 저축 습관과 돈의 가치를 올바르게 인식시키기 위하여 개발하게 되었습니다.__    
A sense of economy of childhood influence adult's one, so we've made pigmong to make children perceive the value of money and the habit of planned saving rightly

### Installation
- __프로젝트에 결합된 API를 사용하기 위해서는 이를 위한 설정이 필요합니다.   
API를 모두 연결시키는 자세한 방법은 적지 않고 어떤 api가 필요한지에 대해서만 적겠습니다.   
API 연결하는 방법은 API 웹사이트나 구글에 검색하시면 쉽게 설명이 되어있어 따라하시면 됩니다.__   

    > You need to set up on your Raspberry pi for api before using the project.   
      So i'm going to write down what kind of API you need for the project.   
      How to connect api is well described on the websites below.

1. __"aiyprojects-raspbian.img" 를 다운로드 해주세요.   
   저는 "AIY Kits Release 2018-11-16"를 사용했습니다.   
   만약 제대로 작동하지 않을 경우, 다운로드 받으신 버전보다 최신 버전으로 다운받으셔서 하시면 될 겁니다.__   
   > Please download "aiyprojects-raspbian.img"    
   i've used "AIY Kits Release 2018-11-16".   
   if it doesn't work, download a newer version. it would work on a newer version!   
   
    https://github.com/google/aiyprojects-raspbian/releases   

2. __구글 api를 사용하기 위해서는 권한이 필요하니 아래의 사이트에 가서 등록해주세요.   
   아래의 사이트 들어가시면 "GET CREDENTIALS" 에 권한 설정하는 방법 자세히 나와있습니다.__
   > Get Credentials for the Google Cloud api(Google cloud speech, tts, stt)   
     website below will show you how to get Credentials in "GET CREDENTIALS" section  
     
    https://aiyprojects.withgoogle.com/voice-v1/ 

3. __본인만의 Dialogflow를 생성해주시고 라즈베리파이에 연결해주세요.    
   "pigmong_diaglogflow.zip" 다운받으시고 본인의 intents, Entities에 적용시켜주세요.__   
   > Make your own Dialogflow and connect it to raspbian   
     Download "pigmong_diaglogflow.zip" and then apply intents and Entities to your own agent   
   
    https://dialogflow.cloud.google.com/

4. __데이터베이스를 사용하기 위해 AWS EC2, RDS를 만들어주세요. 아니면 자체 mysql로 하셔도 됩니다.__
   > Make your own AWS EC2 server and RDS for Database or just use mysql in localhost

    https://console.aws.amazon.com   

### Features   
__서비스 소개는 [Pigmong introduction](https://youtu.be/k5D5-mXTpUw?t=69s), 기능은 [Service features](https://youtu.be/k5D5-mXTpUw?t=102s) 에서 영상으로 보실 수 있습니다.__   
  > You can see our service introdunction [Pigmong introduction](https://youtu.be/k5D5-mXTpUw?t=69s), features [Service features](https://youtu.be/k5D5-mXTpUw?t=102s) on youtube (in Korean)

- __App Storyboard__   
<img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/Storyboard.png" width="900px" height="450px" title="Storyboard" alt="Storyboard"></img><br/>   

- __Hardware Circuit Diagram__   
<img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/hardware.jpg" width="450px" height="450px" title="Hardware Circuit" alt="Hardware Circuit"></img><br/>   
__Google AIY Voice board 없으시면 라즈베리파이 그대로 사용하시고 그에 맞는 스피커, 마이크로 바꿔주시면 됩니다. Adafruit Pro Trinket도 없으시면 아두이노로 대체하시면 됩니다.__
  > If you don't have Google AIY Voice board, you can just use Raspberry pi 3, but you have to change a speaker and a mike for Raspberry   pi 3. also you can use Arduino instead of Adafruit Pro Trinket.

- __Database Table__   
   <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/DB_Table.png" width="450px" height="300px" title="Database Table" alt="Database Table"></img><br/>   

- __Data Flow Diagram__   
   <img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/Data_Flow_Diagram.png" width="800px" height="400px" title="Data_Flow_Diagram" alt="Data_Flow_Diagram"></img><br/>   
   
### Demo   
<img src="https://github.com/seongbeenkim/Iot-piggybank/blob/master/img/demo.gif" width="650px" height="400px" title="Pigmong demo" alt="Pigmong demo"></img>

### How to use?   
__"pigmong_db.py" 의 66번째 라인, "pigmong_main.py" 의 31번째 라인의 DB 연결 코드를 본인걸로 바꿔주셔야 합니다.__   
   > First of all, you have to put your own DB information on, line 66, in pigmong_db.py and line 31, in pigmong_main.py
``` python
## line 66, in pigmong_db.py
self.cnx = pymysql.connect(host='15.164.100.60', port=3306, user='root', password='password', database='pigmong')
## line 31, in pigmong_main.py
cnx = pymysql.connect(host='15.164.100.60', port=3306, user='root', password='password', database='pigmong')
```   
### Test   
``` python
python3 pigmong_main.py
```   
__버튼을 누르신 후 저금통 관련 질문을 해보세요.__
> click a button and then ask what you would like to know about your own Piggy Bank   

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
