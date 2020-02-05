<!-- Portfolio Grid Section --><!-- class="star-dark mb-5" -->
<style>
  h1, h2, h3, h4, h5, h6 {
    font-weight: 700;
    font-family: 'KOMACON';
}
span{
    font-family: 'KOMACON';
}
#contact{
  margin-top:1rem;
 
}
.row{
  height:100%;
  text-align:center;
}
#inputdiv{
  width:100%;

}
.form-control{
  width:60%;
  text-align:center;
  float:right;
  margin-right:1rem;
}
#smb{
  width:100%;
  text-align:center;
}

label{
  padding-top:0.4rem;
}
.flex-wrapper {
  display: flex;
  flex-flow: row nowrap;
}

.single-chart {
  width: 100%;
  justify-content: space-around ;
}

.circular-chart {

  display: block;
  margin: 10px auto;
  max-width: 80%;
  max-height: 250px;
}

.circle-bg {
  fill: none;
  stroke: #eee;
  stroke-width: 3.8;
}

.circle {
  fill: none;
  stroke-width: 2.8;
  stroke-linecap: round;
  animation: progress 1s ease-out forwards;
}

@keyframes progress {
  0% {
    stroke-dasharray: 0 100;
  }
}


.circular-chart.orange .circle {
  stroke: #ff9f00;
}

.circular-chart.green .circle {
  stroke: #4CC790;
}

.circular-chart.blue .circle {
  stroke: #3c9ee5;
}

.percentage {
  fill: #666;
  font-family: sans-serif;
  font-size: 0.5em;
  text-anchor: middle;
}
.goaltext{
  fill: #666;
  font-family: sans-serif;
  font-size: 0.15rem;
  text-anchor: middle;
}
img {
    /* width: 100px;
    height:100px;
    border-radius: 50px; */
} 
.tab {
    width: 100%;
    margin: 2rem auto;
    text-align: center;
    position: absolute;
    top: 0;
    /* opacity: 0; */
    transform: translateY(3rem);
    /* transition: all .5s cubic-bezier(.2, 0, 0, 1); */
  }
  .savingInfo{
    
    width:90%;
    height:8rem;
    border-radius:10px;
    box-shadow: 0px 0px 10px #656668;
    margin: auto;
  }
  #needback{
    margin-top:-3.8rem;

    animation: needback 1.5s forwards;

  }
  /* @keyframes needback {
    from {
      margin-left: -10px;
    }
    to {
      margin-left:-30px;
    }
  }  */
  .price{
    color:#e39897;
    font-size:2rem;
  }
  #contents{
    /* background-color:white; */
    text-shadow: 0 0 5px #ffffff;
    color: #fe9898;

    font-size:2.8rem;
    margin:0px;
    font-weight:bold;
    /* border:2px solid gray; */
  }
#section{
  font-family: 'jua', sans-serif;
}

.actionbutton {
  position: absolute;
  background: pink;
  width: 50px;
  height: 50px;
  font-size: 3em;
  font-weight: 300;
  padding-top:8px;
  color:white;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  bottom: 6.5rem;

  left: 43%;
  box-shadow: 0 0 8px #202020;
  float:left;
  z-index:1000;
}

  /* .tooltip{ 
    position:relative;
    float:right;
  }
  .tooltip > .tooltip-inner {background-color: ; padding:5px 15px; color:rgb(23,44,66); font-weight:bold; font-size:13px;}
  .popOver + .tooltip > .tooltip-arrow {border-left: 5px solid transparent; border-right: 5px solid transparent; 	}

  .progress{
    border-radius:;
    overflow:visible;
  }
  .progress-bar{
    background:rgb(23,44,60); 
    -webkit-transition: width 1.5s ease-in-out;
    transition: width 1.5s ease-in-out;
  } */ 

/*
배경하늘 : d9eff4
연초록 : a9ce49
연분홍 : e39897
*/
#char{
  position: absolute;
    top: 200px;
    width: 80px;
    /* animation: show 0.35s forwards ease-in-out 0.5s; */
    /* animation: run 0.1s forwards; */
}
  .progress-bar {
  width: 0;
  animation: progress 2s ;
  /* //ease-in-out forwards */
  background:#ff9898;
  height:15px;
  margin:auto 0;

} 
  
.progress{
  height:15px;
  background-color: white;
    border-radius: 10rem;
}
  
.title {
    margin-top:10px;
    opacity: 0;
    font-size:1.5rem;
    animation: show 0.35s forwards ease-in-out 0.5s;
    float:left;
  }
@keyframes progress {
  from {
    width: 0;
  }
  to {
    width: 100%;
  }
} 
/* @keyframes run{
  from{
    margin-left:0;
  }
  to{
    margin-left:77%;
  }
} */
@keyframes show  {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  } 
}
.savingInfo_1{
  /* float:left; */
  display:inline-block;
  margin:10px auto;
}
.wp{
  display:block;
  width:80x;
  /* margin-bottom:10px; */
}
#w{
  margin-right:30px;
}
#p{
  margin-left:30px;
}
.wp_wording{
  font-size:1.2rem;
}


.ment{
  display:block;
  text-align:center;
  margin-top:1rem;
  margin-bottom:0.8rem;
  font-size:1.5rem;
  font-family: 'jua', sans-serif;
}
.needs_pigmong{
    position: relative;
    display: block;
    text-align: center;
    margin-top: 20px;
}
.toggleTimeline{
    display:none;
}
.timeline_amount{
    font-weight:bold;
}
.l-block-spacing{
    margin-top:10px;
}

/* .budget-alert {
  background-color: #424242;
  color: #fff;
  padding: 20px 30px;
  border-radius: 5px;
  position: relative;
  width: 80%;
  font-weight: 100;
  font-size: 1.5rem;
}
.budget-alert:before {
  content: attr(data-line);
  font-weight: bold;
  font-family: rooney-web;
}
.budget-alert:after {
  content: "";
  position: absolute;
  bottom: -10px;
  right: 80px;
  width: 0;
  height: 0;
  border-left: 13px solid transparent;
  border-right: 13px solid transparent;
  border-top: 20px solid #424242;
} */

/* Global resets */
/* * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
} */


/* Fonts */
/* h1 {
  font-family: "rooney-web", 'AmericanTypewriter', Rockwell, serif;
  font-size: 2.5em;
  font-weight: bold;
} */
/* 
.container {
  margin: 2em auto;
  max-width: 630px;
  text-align: center;
} */

/* Your CSS goes here */
/* FONTS */
/* Config */
/* COLORS */
/*COMMON STYLE*/
html {
  /* font-size: 16px; */
}

.bold {
  font-weight: bold;
}

.link {
  font-family: "rooney-sans";
  font-style: italic;
  text-decoration: none;
  color: #20A1D4;
}

.p {
  color: #777;
  line-height: 2rem;
  margin: 20px 0;
  font-weight: 100;
}

.text-highlighted {
  color: #EF5F3C;
}

/* BUTTON */
/* CUSTOM COMPONENT STYLE*/
.component-section {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  font-size: 1.4rem;
  font-family: "rooney-sans";
  padding-right: 40px;
  padding-left: 40px;
}
.component-section .top-section-wrapper {
  margin-bottom: 15px;
  width: 100%;
  display: flex;
}
.component-section .top-section-wrapper .budget-alert {
  background-color: #424242;
  color: #fff;
  padding: 20px 30px;
  border-radius: 5px;
  position: relative;
  width: 100%;
  font-weight: 100;
  font-size: 1.5rem;
}
.component-section .top-section-wrapper .budget-alert:before {
  content: attr(data-line);
  font-weight: bold;
  font-family: rooney-web;
}
.component-section .top-section-wrapper .budget-alert:after {
  content: "";
  position: absolute;
  bottom: -10px;
  right: 30px;
  width: 0;
  height: 0;
  border-left: 13px solid transparent;
  border-right: 13px solid transparent;
  border-top: 20px solid #424242;
}
.component-section .middle-section-wrapper {
  border: 1.5px solid #eaeaea;
  width: 100%;
}
.component-section .middle-section-wrapper .progress-bar {
  height: 20px;
  border-bottom: 1.5px solid #eaeaea;
}
.component-section .middle-section-wrapper .progress-bar .level-bar {
  width: 80%;
  background-color: #EF5F3C;
  display: block;
  height: inherit;
}
.component-section .middle-section-wrapper .content-section {
  padding: 15px 50px 30px 50px;
  text-align: left;
}
.component-section .middle-section-wrapper .content-section .button-wrapper {
  display: flex;
  justify-content: space-between;
  padding: 20px 0;
}
.component-section .middle-section-wrapper .content-section .button-wrapper .input {
  position: relative;
  border: 1.5px solid #eaeaea;
  padding: 25px 30px;
  width: 48%;
  font-size: 1.2rem;
  outline: none;
  border-radius: 3px;
  font-weight: bold;
}
.component-section .middle-section-wrapper .content-section .button-wrapper .input:before {
  content: "$";
  position: absolute;
  left: 12px;
  top: 25px;
  color: #777;
  font-weight: 700;
  font-size: inherit;
}
.component-section .middle-section-wrapper .content-section .button-wrapper .button {
  outline: none;
  border: 1.5px solid #eaeaea;
  cursor: pointer;
  background-color: #fff;
  color: #777;
  font-size: 1.5rem;
  font-weight: 500;
  width: 48%;
  padding: 15px 20px;
  font-family: "rooney-sans";
  box-shadow: 0px 2px 0px #eaeaea;
  border-radius: 5px;
}
.component-section .middle-section-wrapper .content-section .button-wrapper .button.primary {
  background-color: #1CBC2C;
  color: #fff;
  box-shadow: inset 0px 2px 0px #1CBC2C;
  padding-top: 20px;
  padding-bottom: 20px;
  border: 1.5px solid #1CBC2C;
}
.component-section .middle-section-wrapper .content-section .button-wrapper .button.primary:hover {
  box-shadow: inset 0 0 2px #777;
}
.component-section .middle-section-wrapper .content-section .button-wrapper .button:hover {
  cursor: pointer;
}
.component-section .bottom-section-wrapper {
  display: flex;
  justify-content: space-between;
  width: 100%;
  padding: 20px 0;
}
.component-section .bottom-section-wrapper .button {
  outline: none;
  border: 1.5px solid #eaeaea;
  cursor: pointer;
  background-color: #fff;
  color: #777;
  font-size: 1.5rem;
  font-weight: 500;
  width: 48%;
  padding: 15px 20px;
  font-family: "rooney-sans";
  box-shadow: 0px 2px 0px #eaeaea;
  border-radius: 5px;
}
.component-section .bottom-section-wrapper .button.primary {
  background-color: #1CBC2C;
  color: #fff;
  box-shadow: inset 0px 2px 0px #1CBC2C;
  padding-top: 20px;
  padding-bottom: 20px;
  border: 1.5px solid #1CBC2C;
}
.component-section .bottom-section-wrapper .button.primary:hover {
  box-shadow: inset 0 0 2px #777;
}
.component-section .bottom-section-wrapper .button:hover {
  cursor: pointer;
}

/*media query */
/* @media only screen and (max-width: 767px) {
  html {
    font-size: 14px;
  }

  .component-section {
    padding-right: 20px;
    padding-left: 20px;
  }
  .component-section .middle-section-wrapper .content-section {
    padding: 15px;
  }
} */
.contents{
    margin:15px;
}
.scroll_ment{
    font-size:1.2rem;
    margin-bottom:0px;
}
#needsPrice{
    font-weight:400;
    float:right;
    color:white;
}
#progressPrice{
    font-size:1.8rem;
    color:#ff9898;
    font-weight:500;
}
#piggy_ment{
    background-color: #ff9898;
    display: block;
    border-radius: 5rem;
    padding: 5px;
    width: 130px;
    font-size: 1.5rem;
    margin: 0 auto;
    margin-bottom: 20px;
    color:white;
}
.tl_box{
    margin-top:40px;
    text-align:center;
}
#piggy_balance{
    display:inline-block;
    font-size:2rem;
    margin-bottom:20px;
}
#need_inputment{
    display: block;

    font-size: 2rem;
    font-weight: 400;
    color:gray;
    margin-bottom:20px;
}
#need_inputment2{

    font-size:1.2rem;
    display: block;
    padding: 15px;
}
#need_inputbox{
    
    margin-top:130px;
}
.underline{
    text-align:center;
    border-style:none;
        border-bottom:solid 1px #cacaca;
        border-collapse:collapse; 


}
.need_input{
    font-size:1.5rem;
    font-weight:400;
    padding-bottom:10px;
}
.need_mentbox{
    margin-top: 40px;
}
.keyboard{
    position:fixed;
    top:0px;
    left:0px;
    width:100%;
    height:100%;
}
.onlydate{
  font-size: 1.4rem;
    font-weight: 300;
    margin-bottom: 20px;
    display: block;
}
body {
  /* background: #2c3e50; */
}

.pigcontainer {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -64.5px;
  margin-top: -85.5px;
}

.ghost {
  animation: float 3s ease-out infinite;
}

@keyframes float {
  50% {
     transform: translate(0, 15px);
  }
}
.shadowFrame {

  width: 150px;
  /* margin-top: 15px; */
  margin:0 auto;
  padding-left:0px;
}
.shadow1 {
  animation: shrink 3s ease-out infinite;

  transform-origin: center center;
  ellipse {
    transform-origin: center center;
  }
}

@keyframes shrink {
  0% {
    width: 70%;
    margin: 0 16%;
  }
  50% {
    width: 90%;
    margin: 0 5%;
  }
  100% {
    width: 70%;
    margin: 0 16%;
  }
}
.swal-footer{
    text-align:center;
}
#Layer_1 {
    float:right;
    margin:10px;
}
</style>

<div class="keyboard"></div>
<section id="section section_tabs">
  <?if(!$needsList){?>
    <?if(!$this->session->userdata("AdminType")){?><!-- 아이 -->
        <img id="needback"  class="needback" src="/assets/freelancer/img/need_newback_470.png" style="max-width:100%;height: auto;"> 
      <div id="tab" class="tab container">
          <div class="need_mentbox">
              <h3 id="need_inputment"class="text-center text-secondary mb-0">필요한 물건을 등록해보아요!</h3>
              <br>
              <span id="need_inputment2"></span>
          </div>

        <div id="need_inputbox"class="row">
          <div class="col-lg-8 mx-auto">
              <form name="addNeedsForm" action="/Main2/addNeeds" method="post" id="contactForm" novalidate="novalidate">
                
              <div class="form-group">
                    <label class="need_input">필요한 물건</label>
                    <input class=" form-control" name="contents" id="input_contents" type="text" placeholder="ex) 타요 장난감" required="required" data-validation-required-message="필요한 물건을 입력해주세요." autocomplete="off">
                    <br><br>
                    <label class="need_input">가&nbsp&nbsp&nbsp&nbsp&nbsp격</label>
                    <input class="form-control" name="price" id="price" type="text" placeholder="ex) 20000" required="required" data-validation-required-message="가격을 입력해주세요."autocomplete="off">
                </div> <!-- form-group// -->

                <!-- <div class="control-group  text-center "id="inputdiv">
                    <label class="need_input">필요한 물건</label>
                  <div class="form-group mb-0 pb-2" id="inputdiv">
                    <input class=" form-control" name="contents" id="input_contents" type="text" placeholder="ex) 타요 장난감" required="required" data-validation-required-message="필요한 물건을 입력해주세요." autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="control-group  text-center "id="inputdiv">
                    <label class="need_input">가&nbsp&nbsp&nbsp&nbsp&nbsp격</label>
                  <div class="form-group controls mb-0 pb-2">
                    <input class="form-control" name="price" id="price" type="text" placeholder="ex) 20000" required="required" data-validation-required-message="가격을 입력해주세요."autocomplete="off">
                    <p class="help-block text-danger"></p>
                  </div>
                </div> -->
                <br>
                <div class="form-group" id="smb">
                  <button type="submit" class="btn btn-primary btn-md" id="sendMessageButton" onclick="return fncSubmit();" value="upload" style="border-color:#48adbc;background-color:#48adbc">등 록</button>
                </div>
              </form>
            </div>
          </div> 
        </div> 
        <input type="hidden" id="page" value="<?=$page?>">
        <?}else{?>
            <img id="needback"  class="needback" src="/assets/freelancer/img/need_newback_470.png" style="max-width:100%;height: auto;"> 
            <div id="tab" class="tab container">
                <div class="need_mentbox">
                    <h3 id="need_inputment"class="text-center text-secondary mb-0">아이가 필요한 물건을</h3><br>
                    <h3 id="need_inputment"class="text-center text-secondary mb-0">등록하게 해주세요!</h3>
                </div>
                <img src="/assets/freelancer/img/blank_pig.png" style="max-width: 45%;position: relative;top: 315px;">
            </div>
      <?}?>
      <?} else {?>

      <div>
        <!-- <img id="needback" src="/assets/freelancer/img/needback_375.png" width=""alt=""> -->
        <img id="needback"  class="needback" src="/assets/freelancer/img/need_newback_470.png" style="max-width:100%;height: auto;"> 
        <!-- <img id="char" src="/assets/freelancer/img/needs_bicycle.png" style=" height: auto;"> -->
        
        <div class="needs_pigmong">
            <form action="/Main2/clearAll" method="post">
                <button type="submit" class="close" onclick="">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px" y="0px" width="10px" height="10px" viewBox="215.186 215.671 80.802 80.8"
                    enable-background="new 215.186 215.671 80.802 80.8" xml:space="preserve">
                    <polygon fill="#FFFFFF" points="280.486,296.466 255.586,271.566 230.686,296.471 215.19,280.964 240.086,256.066 215.186,231.17 
                    230.69,215.674 255.586,240.566 280.475,215.671 295.985,231.169 271.089,256.064 295.987,280.96 "/>
                </svg>
                </button>
            </form>
            <span id="piggy_ment" style="box-shadow:0 5px 5px -3px rgba(0, 0, 0, 0.3), 0 3px 5px 2px rgba(0, 0, 0, 0.12)">저금통</span>

            <div><span id="piggy_balance"><?=$bBalance->bbalance?></span><span style="display:inline-block; font-size:1.3rem;"> 원</span></div>
            <?foreach($needsList as $index=>$row){?>
                <?$price=$row['price'];?>
            <?if ($bBalance->bbalance != $price){?>
                <img class="ghost" id="pigmongicon"src="/assets/freelancer/img/newpig.png"  style="max-width:30%;height:auto;margin-top:10px;">
            <?}else{?>
                <img class="ghost" id="pigmongicon"src="/assets/freelancer/img/newpig2.png"  style="max-width:30%;height:auto;margin-top:10px;">
            <?}?>
            <?}?>
                <p class="shadowFrame"><svg version="1.1" class="shadow1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="61px" y="20px"
                width="122.436px" height="39.744px" viewBox="0 0 122.436 39.744" enable-background="new 0 0 122.436 39.744"
                xml:space="preserve">
                <ellipse fill="#b9b9b9" cx="61.128" cy="19.872" rx="49.25" ry="8.916"/>
                </svg></p>
            
        </div>
        <div class="header" id="top" style="margin-top:55px;"onclick="$('body,html').animate({scrollTop:$('body').height()-100},1000);" >
            <p class="scroll_ment">저금 기록을 확인해보아요!</p>
            <!-- <br> -->
            <!-- <p class="scroll_ment">저금 기록을 확인해보아요!</p> -->
            <i class="fa fa-angle-down animated bounce" ></i>
        </div>
     
        <script src="//use.typekit.net/rzv2mwh.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>




<div class="tl_box toggleTimeline">
    <h1 style="margin-bottom:30px; display:none;">저금 기록</h1>
    <?if(!empty($savingInfo)){?>
      <?$date = $savingInfo[0]['onlydate'];?>
      <span class="onlydate"><?=$savingInfo[0]['onlydate']?></span>
      <?foreach($savingInfo as $index=>$row){?>
      <?if($date!=$row['onlydate']){?>
          <hr><h3 class="onlydate"><?=$row['onlydate']?></h3>
      <?$date=$row['onlydate']?>
      <?}?>
      <div class="card ">
          <ul class="timeline">
              <li class="timeline__item">
                  <div class="timeline__step">
                      <div class="timeline__step__marker timeline__step__marker--red"></div>
                  </div>
                  <div class="timeline__time" style="width:70px;">
                      <?=$row['onlytime']?>
                  </div>
                  <div class="timeline__content">
                      <div class="timeline__title">
                          <span class="timeline_amount amount<?=$row['tidx']?>" style="font-weight:bold;"><?=$row['amount']?></span><span style="font-weight:bold;">원</span>을 저금했어요!
                      </div>
                      <!-- <ul class="timeline__points">
                      <li></li>
                      </ul> -->
                  </div>
              </li>
          </ul>
      </div>
      <script>
          var amount = $(".amount<?=$row['tidx']?>").html();
          $(".amount<?=$row['tidx']?>").html(AddComma(amount));    ㅁ
      </script>
      <?}?><!--End foreach -->
    <?}else{?><!--End if -->
      <span>아직 저금된 돈이 없어요!</span>
    <?}?>
</div>



      <div id="tab" class="tab container">
    <!-- <img src="/assets/freelancer/img/need_cloud.png" style="max-width:50%;position:absolute;left: 35px;top: -35px;"> -->
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="row">
              <div class="col-lg-8 mx-auto">

                <?foreach($needsList as $index=>$row){?>
                  <?$price=$row['price'];?>
                    <?if ($bBalance->bbalance < $price){?>
                        <h3 class="contents"><b><span id="contents"><?=$row['contents']?></span ></b><span style="font-size:1.2rem;font-weight:100;"> 이(가) 필요해요!</span></h3>
                        <div id="bar" style="width: 300px; margin: auto; margin-top:40px;">
                        <?foreach($needsList as $index=>$row){?>
                        <?$price=$row['price'];?>
                        <div class="progress">
                            <input type="hidden" id="percent" value="<?$bBalance->bbalance/$price*100?>">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?=$bBalance->bbalance/$price*100?>" aria-valuemin="0" aria-valuemax="100" style="max-width: <?=$bBalance->bbalance/$price*100?>%">
                            </div>
                        </div>
                        
                        <span id="progressPrice" class="title"><?=$bBalance->bbalance?></span>
                        <span id="needsPrice" class="title"><?=$price?></span>
                        <?}?>
                    </div>
                    <?}else if($bBalance->bbalance >= $price){?>
                        <h3 class="contents"><b><span id="contents"><?=$row['contents']?></span ></b><span style="font-size:1.2rem;font-weight:100;"> 을(를) 살 수 있어요!</span></h3>
                        <div style="width: 300px; margin: auto">
                        <?if(!$this->session->userdata('AdminType')){?>
                        <form action="/Main2/clearAll" method="post">
                            <button type="submit" class="btn btn-primary btn-md" onclick="return newNeeds();" style="width:300px;">새로운 목표 정하기!</button>
                        </form>
                        <?}else{?>
                        <h5>새로운 목표를 등록하게 해주세요</h5>
                        <?}?>
                        </div>
                    <?}?>
                        <!-- <img src="/uploads/needpic.jpg" alt=""> -->

                    <?}?>
                    
                <?if ($bBalance->bbalance >= $price){?>
                    <div class = "gradient">
                        <!-- <h1> CONGRATS CS3 </h1> -->
                        <div class="fireworks">
                            <div class="firework" id="leftfire">
                                <div class="explosion"><div class="spark green"></div></div>
                                <div class="explosion"><div class="spark blue"></div></div>
                                <div class="explosion"><div class="spark red"></div></div>
                                <div class="explosion"><div class="spark red"></div></div>
                                <div class="explosion"><div class="spark yellow"></div></div>
                                <div class="explosion"><div class="spark blue"></div></div>
                                <div class="explosion"><div class="spark green"></div></div>
                                <div class="explosion"><div class="spark yellow"></div></div>
                            </div>
                        <div class="firework" id="rightfire">
                            <div class="explosion"><div class="spark green"></div></div>
                            <div class="explosion"><div class="spark blue"></div></div>
                            <div class="explosion"><div class="spark red"></div></div>
                            <div class="explosion"><div class="spark red"></div></div>
                            <div class="explosion"><div class="spark yellow"></div></div>
                            <div class="explosion"><div class="spark blue"></div></div>
                            <div class="explosion"><div class="spark green"></div></div>
                            <div class="explosion"><div class="spark yellow"></div></div>
                        </div>
                    </div>
                    <script>
                    
                    </script>
                <?}?>
              <?if($isDone){?>
                <?if(!$this->session->userdata('AdminType')){?>
                    <?echo "hi";?>
                <?}?>
              <?}?>
          </div>
        </div>
      </div>
      <?}?>

  </section>
  <input type="hidden" id="page" value="<?=$page?>">
  <script>
  

  var doubleSubmitFlag = false;

function fncSubmit(){
    if(doubleSubmitFlag){
        swal('등록 중입니다!');
        return false;
    }else {
        var c = $('#input_contents').val();
        var p = $('#price').val();

        if(c==''){
            swal('필요한 것을 입력해주세요!');
            return false;
        }else if(p==''){
            swal('가격을 입력해주세요!');
            return false;
        }else if(isNaN(p)){
            swal('가격은 숫자만 입력해주세요!');
            return false;
        }else if(p>1000000){
            swal('백만원 이하의 물건을 등록해주세요!');
            return false;
        }
        doubleSubmitFlag = true;
        $('#addNeedsForm').submit();
    }
}
  function needsalert(){
    var contents = $('#input_contents').val();
    console.log(contents);
    console.log(price);
    var price = $('#price').val();
    if(contents.indexOf('ex)')!=-1 || price.match(/ex)/)!=null){
      swal("내용을 모두 입력해주세요!");
      return false;
    }
  }

function newNeeds(){
    // swal("새로운 목표를 등록하시겠습니까?");
    return true;
}
function AddComma(data_value) {
    return Number(data_value).toLocaleString('en');
  }
var page = $('#page').val();
$('#needtab').attr('src','/assets/freelancer/img/needicon_white.png');
$(document).ready(function(){

    if(page==undefined){
        page=0;
        console.log(page);
    }
    var cl = $("#contents").html().length;
    console.log(cl);
    if(cl>0 && cl<10){
        $("#contents").css('font-size','2.5rem');
    }else if(cl>=10 && cl <15){
        $("#contents").css('font-size','1.7rem');
        $("#bar").css('margin-top','10px');
    }else if(cl>=15 && cl <20) {
        $("#contents").css('font-size','1.5rem');
        $("#bar").css('margin-top','10px');
    }else{
        $("#contents").css('font-size','1rem');
        $("#bar").css('margin-top','10px');
    }
    $(function(){
        $('.keyboard').css('height',window.innerHeight);
    })
    
    var page = $('#page').val();

        if(page==0){
            // $('#ntab').css('background-color','#7ba434').css('color','white');
            $('#needtab').attr('src','/assets/freelancer/img/needicon_white.png');
        }else if(page==1){
            // $('#mtab').css('background-color','#7ba434').css('color','white');
        }else{
            // $('#mtab').css('background-color','#7ba434').css('color','white');
        }


  $('[data-toggle="tooltip"]')
      .tooltip({ trigger: "manual" })
      .tooltip("show");
  
  $(".progress-bar").each(function() {
    each_bar_width = $(this).attr("aria-valuenow");
    $(this).width(each_bar_width + "%");
  });

  var price = $("#price").html();
  var walletBalance = $("#walletBalance").html();
  var bankBalance = $("#bankBalance").html();
  var progressPrice = $("#progressPrice").html();
  var needsPrice = $("#needsPrice").html();
  var piggybal = $("#piggy_balance").html();

  $("#price").html(AddComma(price));
  $("#walletBalance").html(AddComma(walletBalance));
  $("#bankBalance").html(AddComma(bankBalance));
  $("#progressPrice").html(AddComma(progressPrice));
  $("#needsPrice").html(AddComma(needsPrice));
  $("#piggy_balance").html(AddComma(piggybal));
//   $('.block-content').addClass('toggleTimeline');
//   $('.block-content *').attr('height','0px');
  
  
  $('#top').click(function(){
    // $('.timeline').removeClass('toggleTimeline');
    $('.tl_box').removeClass('toggleTimeline');
    // $('.block-content *').attr('height','');
  });

  var run = $('#percent').val()*3;
  if(run>290){
    run=290;
  }
  $("#char").animate({ left : run+'px' },1100)

});
    function funLoad(){
        var Cheight = $(window).height();
        $('body').css({'height':Cheight+'px'});
    }
    window.onload = funLoad;
    window.onresize = funLoad;

//   $("#top").click(function(){
//         $('html, body').animate({scrollTop:($('body').height())}, 200);
//     }); 
  </script>
 
