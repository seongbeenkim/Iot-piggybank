#include <Adafruit_NeoPixel.h>
#include<Servo.h>
#include <Wire.h>
volatile int number;

#define SLAVE_ADDRESS 0x04
#define PIN 6  // Neopixel PIN
#define servo_PIN 3 // Servo PIN
Adafruit_NeoPixel pixels = Adafruit_NeoPixel(16, PIN, NEO_GRB + NEO_KHZ800);
Servo myservo;

void setup() {
  
  // This is for Trinket 5V 16MHz, you can remove these three lines if you are not using a Trinket
#if defined (__AVR_ATtiny85__)
  if (F_CPU == 16000000) clock_prescale_set(clock_div_1);
#endif

  pixels.begin(); 
  pixels.show(); 
  myservo.attach(servo_PIN);
  myservo.write(0);
  Serial.begin(9600);
  Wire.begin(SLAVE_ADDRESS);
}

void loop() {
  Wire.onReceive(receiveData);
}


// when Pigmong is on 
void pigmong_start(){
  int a = 120;
  int i,pos,temp;

  for(pos=0; pos<=180; pos++){
    myservo.write(pos);
    delay(10);
  }
  temp=pos;
  
  for(i=0; i<(pixels.numPixels()/2); i++) {
    pixels.setPixelColor(i,pixels.Color(a, 0, a));
    pixels.show(); 
    delay(150);
  }
  for(i=((pixels.numPixels()/2))-1; i>=0; i--) {
    pixels.setPixelColor(i,pixels.Color(0, 0, 0));
    pixels.show();
    delay(150);
  }
  
  for(pos=temp; pos>=0; pos--){
    myservo.write(pos);
    delay(10);
  }
}

// showing the ratio of piggy bank's balance to target amount with neopixel, servo 
void pigmong_rainbow(uint8_t wait,uint8_t led){
  float pos_8 = 22.5;    // 각도
  int temp,j;
  for(int i=0; i<=led; i++) {
    if (i==0){
      for (j = 0; j <= round(pos_8); j += 1) { //23
        myservo.write(j);              
        delay(wait/4);                       
      }
      temp=j;
      pixels.setPixelColor(0,pixels.Color(255, 0, 0)); // Red
      pixels.show();
      delay(wait);
    }
    else if (i==1){
      for (j = round(pos_8); j <= round(pos_8*2); j += 1) { //45
        myservo.write(j);              
        delay(wait/4);                       
      }
      temp=j;
      pixels.setPixelColor(1,pixels.Color(255, 30, 0)); // Orange
      pixels.show();
      delay(wait);
    }
    else if (i==2){
      for (j = round(pos_8*2); j <= round(pos_8*3); j += 1) { //68
        myservo.write(j);              
        delay(wait/4);                       
      }
      temp=j;
      pixels.setPixelColor(2,pixels.Color(255, 130, 0)); // Yellow
      pixels.show();
      delay(wait);
    }
    else if (i==3){
      for (j = round(pos_8*3); j <= round(pos_8*4); j += 1) { //90
        myservo.write(j);              
        delay(wait/4);                       
      }
      temp=j;
      pixels.setPixelColor(3,pixels.Color(100,150, 0)); // Yellow-green
      pixels.show();
      delay(wait);
    }
    else if (i==4){

      for (j = round(pos_8*4); j <= round(pos_8*5); j += 1) { //113
        myservo.write(j);              
        delay(wait/4);                       
      }
      temp=j;
      pixels.setPixelColor(4,pixels.Color(0, 255, 0)); // Green
      pixels.show();
      delay(wait);
    }
    else if (i==5){
      for (j = round(pos_8*5); j <= round(pos_8*6); j += 1) { //135
        myservo.write(j);              
        delay(wait/4);                       
      }
      temp=j;
      pixels.setPixelColor(5,pixels.Color(0, 100, 255)); // Sky-blue
      pixels.show();
      delay(wait);
    }
    else if (i==6){
      for (j = round(pos_8*6); j <= round(pos_8*7); j += 1) { //158
        myservo.write(j);              
        delay(wait/4);                       
      }
      temp=j;
      pixels.setPixelColor(6,pixels.Color(100, 0, 255)); // Indigo blue
      pixels.show();
      delay(wait);
    }
    else if (i==7){
      for (j = round(pos_8*7); j <= round(pos_8*8); j += 1) { //180
        myservo.write(j);              
        delay(wait/4);                       
      }
      temp=j;
      pixels.setPixelColor(7,pixels.Color(150, 0, 150)); // Violet
      pixels.show();
      delay(wait);
    }
  }
  delay(2000);
    for(j=temp; j>=0; j--){
    myservo.write(j);              
    delay(10);
  }
  delay(200);
  for(int i=led; i>=0; i--) {
    pixels.setPixelColor(i,pixels.Color(0, 0, 0));
    pixels.show(); 
    delay(wait);
  }
  

}

// listening state
void pigmong_listening(){

  int a = 120;
  int j = 1;
  int b = 1;
  int c = 1;
  int i,q,r,pos,temp;

  for(pos=0; pos<=180; pos++){
    myservo.write(pos);
    delay(10);
  }
  temp=pos;
  
  for(i=3; i<(pixels.numPixels()/2); i++) {
    pixels.setPixelColor(i,pixels.Color(a, 0, a));
    pixels.setPixelColor(i-b,pixels.Color(a, 0, a));    
    pixels.show();
    delay(100);
    c++; 
    b = (2*c)-1;
  }


  while (true){

    if(number==20){
      break; 
    }
    else{
      for(i=0; i<(pixels.numPixels()/2); i++) {
        pixels.setPixelColor(i,pixels.Color(a, 0, a));
        a= a-j;
      }
      delay(100);
      pixels.show();
      
      if (a==0){
        for(i=0; i<(pixels.numPixels()/2); i++) {
          pixels.setPixelColor(i,pixels.Color(a, 0, a));
        }
        pixels.show();
        for(r=0; r<a+1; r++) {
          for(q=0; q<(pixels.numPixels()/2); q++) {
            a=a+j;
            pixels.setPixelColor(q,pixels.Color(a, 0, a));
          }
          if (a==120){
            break;
          }
          else{
            delay(100);
            pixels.show();
          }
        }
      }
    }
  }
}

// processing state after listening 
void pigmong_processing(){
  int color = 120;
  int i; 
  
  for(i=0; i<(pixels.numPixels()/2); i++) {
      pixels.setPixelColor(i,pixels.Color(color, 0, color));
  }
  pixels.show();
  while(true){
    if(number==20){
      break; 
    }
    else{
      for(i=0; i<(pixels.numPixels()/2); i++) {
        pixels.setPixelColor(i,pixels.Color(color, 127, color));
        delay(50);
        pixels.show();
        pixels.setPixelColor(i,pixels.Color(color, 0, color));
      }
      for(i=((pixels.numPixels()/2))-1; i>=1; i--) {
        pixels.setPixelColor(i,pixels.Color(color, 127, color));
        delay(50);
        pixels.show();
        pixels.setPixelColor(i,pixels.Color(color, 0, color));
      }
    }
  }
}


// answering state after processing
void pigmong_talking(){

  int a = 120;
  int i;
  while(true){
    if(number==20){
      break;
    }
    else{
      for(i=0; i<(pixels.numPixels()/2); i++) {
        pixels.setPixelColor(i,pixels.Color(a, 0, a));
      }
      delay(150);
      pixels.show();
      
      for(i=0; i<(pixels.numPixels()/2); i++) {
        pixels.setPixelColor(i,pixels.Color(a, 63, a));
      }
      delay(150);
      pixels.show();
      
      for(i=0; i<(pixels.numPixels()/2); i++) {
      pixels.setPixelColor(i,pixels.Color(a, 127, a));
      
      }
      delay(150);
      pixels.show();
  
      for(i=0; i<(pixels.numPixels()/2); i++) {
        pixels.setPixelColor(i,pixels.Color(a, 63, a));
      }
      delay(150);
      pixels.show();
    }
  }
}

// put everything back after answering what you ask
void pigmong_stopped_talking(){

  int i, pos;
  for(pos=180; pos>=0; pos--){
    myservo.write(pos);
    delay(10);
  }
  //while (true){
  for(i=0; i<(pixels.numPixels()/2); i++) {
      pixels.setPixelColor(i,pixels.Color(0, 0, 0));
  }
  pixels.show();
  delay(150);
  //}
}

// just in case the led hasn't turned off after all processing
void pigmong_led_off(){
  int i;

  for(i=0; i<(pixels.numPixels()/2); i++) {
      pixels.setPixelColor(i,pixels.Color(0, 0, 0));
  }
  pixels.show();
  delay(150);

}

// alarm when new information comes into pigmong
void pigmong_alarm(){

  int a = 120;
  int i,j,pos,temp;
  int color = 0;
  int add = 63;
  for(pos=0; pos<=180; pos++){
    myservo.write(pos);
    delay(5);
  }
  temp=pos;

  for (j=0; j<3; j++){
      for(i=0; i<(pixels.numPixels()/2); i++) {
        pixels.setPixelColor(i,pixels.Color(a, 0, a));
      }
      delay(150);
      pixels.show();
      
      for(i=0; i<(pixels.numPixels()/2); i++) {
        pixels.setPixelColor(i,pixels.Color(a, 63, a));
      }
      delay(150);
      pixels.show();
      
      for(i=0; i<(pixels.numPixels()/2); i++) {
      pixels.setPixelColor(i,pixels.Color(a, 127, a));
      
      }
      delay(150);
      pixels.show();
    
      for(i=0; i<(pixels.numPixels()/2); i++) {
        pixels.setPixelColor(i,pixels.Color(a, 63, a));
      }
      delay(150);
      pixels.show();
  }


  for(i=0; i<(pixels.numPixels()/2); i++) {
    pixels.setPixelColor(i,pixels.Color(0, 0, 0));
  }
  delay(150);
  pixels.show();

  for(pos=temp; pos>=0; pos--){
    myservo.write(pos);
    delay(5);
  }

}

//when you achieve your goal, play a celebrating music
void pigmong_music_test(){
  int pos, temp, i, j;
  int max_pos = 180;
  int min_pos = 130;
  int wait = 40;
  int q = 0;
  for(pos=0; pos<=max_pos; pos++){
    myservo.write(pos);
    delay(10);
  }
  temp=pos;

  while (true){
    if (number==20){
      for(pos=temp; pos>=0; pos--){
        myservo.write(pos);
        delay(5);
      }
      for(i=0; i<(pixels.numPixels()/2); i++) {
        pixels.setPixelColor(i,pixels.Color(0, 0, 0));
      }
      pixels.show();
      break;
    }
    
    for (int q = 0; q < 3; q++) {
      for (int i=0; i < (pixels.numPixels()/2); i=i+3) {
        pixels.setPixelColor(i+q, pixels.Color(0, 50, 200));    //turn every third pixel on
      }
      pixels.show();
      delay(25);
      for (int i=0; i < (pixels.numPixels()/2); i=i+3) {
      pixels.setPixelColor(i+q, 0);        //turn every third pixel off
      }
      pixels.show();
      delay(25);
    } 
  }
}


// getting messages from Raspberry pi and then executing functions
void receiveData(int byteCount){

    if(Wire.available()) {
        number = Wire.read();

        if (number==10){
          pigmong_start();
        }
        else if (number==11){
          pigmong_listening();
        }
        else if (number==12){
          noInterrupts();
          pigmong_processing();
        }
        else if (number==13){
          noInterrupts();
          pigmong_talking();
        }
        else if (number==14){
          noInterrupts();
          pigmong_stopped_talking();
        }
        else if (number==15){
          pigmong_alarm();
        }
        else if (number==16){
          pigmong_led_off();
        }
        else if (number==17){
          pigmong_music_test();
        }       
        else if (number==0){
          pigmong_rainbow(64,number);
        }
        else if (number==1){
          pigmong_rainbow(64,number);          
        }
        else if (number==2){
          pigmong_rainbow(64,number);         
        }
        else if (number==3){
          pigmong_rainbow(64,number);         
        }
        else if (number==4){
          pigmong_rainbow(64,number);         
        }
        else if (number==5){
          pigmong_rainbow(64,number);         
        }
        else if (number==6){
          pigmong_rainbow(64,number);         
        }
        else if (number==7){
          pigmong_rainbow(64,number);
        }

        delay(500);
     }
}
