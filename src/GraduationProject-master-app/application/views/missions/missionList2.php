<style>
 h1, h2, h3, h4, h5, h6 {
    /* font-weight: 700; */
    font-family: 'KOMACON';
}
span{
    font-family: 'KOMACON';
}
#mtb *{
  border:1px solid gray;
  text-align:center;
}

#mt{

}
.addmission{
  text-align:center;
}
.row{
  text-align:center;
}
.plusbtn1{
    box-shadow:0 5px 5px -3px rgba(0, 0, 0, 0.3), 0 3px 5px 2px rgba(0, 0, 0, 0.12);
  background-color: #48adbc;
  padding: 0.2rem 11rem;
  border-color: #48adbc;
  position: fixed;
  left: 25px;
  z-index: 998;
  top: 160px;

}
.plusbtn{
    box-shadow:0 5px 5px -3px rgba(0, 0, 0, 0.3), 0 3px 5px 2px rgba(0, 0, 0, 0.12);
  background-color: #48adbc;
  padding: 0.2rem 11rem;
  border-color: #48adbc;
  position: fixed;
  left: 25px;
  z-index: 998;
  top: 160px;

}
tr{

}
.date{
  width:250px;
  
}
td{
  padding:10px;
}
.contents{
  width:100px;
}
#about{
  -ms-overflow-style: none; 
}
::-webkit-scrollbar {

display:none;

}
#mp{
    /* width: 70px;
    margin-left: 190px;
    height: 100%;
    position: relative;
    bottom: 25px;
    color:white; */
    width: 80px;
    margin-left: 230px;
    height: 100%;
    position: relative;
    bottom: 25px;
    color: black;
}
#mp2{
    /* width: 70px;
    margin-left: 220px;
    height: 100%;
    position: relative;
    bottom: 25px;
    color:white; */
    width: 80px;
    margin-left: 240px;
    height: 100%;
    position: relative;
    bottom: 30px;
    color: black;
}
#missionback{
    top:20px;
  margin-top:30px;  
  margin-top: 30px;
    position: fixed;
    z-index: 994;
    /* box-shadow: 0px 0px 8px #202020; */
}
.missionment{

    margin-left: 110px;
    font-size: 1.8rem;
    color: gray;
    margin-top: -20px;
    display: block;
    z-index: 1000;
    position: fixed;
}
.btn-blue{
    background-color: white;
    color: gray;
    font-weight: 400;
}
.mission_blank{
    font-size: 2rem;
    position: relative;
    top: 180px;
}
.mission_blank_p{
    font-size: 1.8rem;
    position: relative;
    top: 0px;
    z-index: 100;
}
.blank_pig{
    max-width: 45%;
    position: relative;
    top: 350px;
}
.blank_box{
    
}
.mission_chal{
  position: fixed;
    z-index: 1000;
    width: 90%;
    font-weight: 400;
    z-index: 1000;

}
.btn-gray{
    background-color:white;
    color:black;
}
.swal-footer{
    text-align:center;
}
.popup {
    box-shadow: 0 5px 5px -3px rgba(0, 0, 0, 0.4), 0 3px 5px 2px rgba(0, 0, 0, 0.3);
    position: relative;
    left: 50%;
    top: -1rem;
    transform: translate(-50%, -50%);
    /* background: #f19495; */
    background:#ffb4b4b8;
    height: 130px;
    width: 330px;
    border-radius: 10px;
    border: 1px solid white;
    font-family:'KOMACON';
    margin-top: 30px;
    
}


</style>
<script>
var evtMCS = new EventSource('/Sse/missionCheckState');
var evtMCS2 = new EventSource('/Sse/missionCheckState2');
var evtSaving = new EventSource('/Sse/saving');
</script>
<!-- About Section -->
<img id="missionback" class="" src="/assets/freelancer/img/mission_back.png" style="max-width:100%;height: auto;z-index:1;"> 
<section id="section section_tabs">
    
    
    <!-- 부모 -->
    <?if($this->session->userdata("AdminType")){?> 
        
    <div id="tab" class="tab container">
      <!-- <div class="addmission"> -->


       
      <!-- </div> -->
      <?if(!$missionsList){?>
      <div class="blank_box">
        <span class="text-center mission_blank_p">미션을 추가해주세요!</span>
        <a href="/Main2/goToAddMissions" onClick="return missionalert();" class="btn-primary btn-lg plusbtn1" >+</a>
        <img class="blank_pig" src="/assets/freelancer/img/blank_pig.png" alt="">
    </div> 
      <?}else{?>
        <?$i=1;?>
        <div class="mission_top">
          <h3 class="mission_chal">미션을 추가해주세요!</h3>
          <a href="/Main2/goToAddMissions" onClick="return missionalert();" class="btn-primary btn-lg plusbtn">+</a>
        </div>
          <div class="row" style="margin-top: 40px;">
            <div class="col-lg-8 mx-auto">
            <div class="missionList">
              <?foreach($missionsList_p as $index=>$row){?>
                  <div class="popup"> 
                    <form action="/Main2/deleteMissions" method="post" >
                      <button name="midx" value="<?=$row['midx']?>" class="close" onclick="return missiondelete();">
                          <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                          x="0px" y="0px" width="10px" height="10px" viewBox="215.186 215.671 80.802 80.8"
                          enable-background="new 215.186 215.671 80.802 80.8" xml:space="preserve">
                          <polygon fill="#FFFFFF" points="280.486,296.466 255.586,271.566 230.686,296.471 215.19,280.964 240.086,256.066 215.186,231.17 
                          230.69,215.674 255.586,240.566 280.475,215.671 295.985,231.169 271.089,256.064 295.987,280.96 "/>
                        </svg>
                      </button>
                    </form>
                    <div class="valid">
                    <!-- <svg version="1.1" class="check checkicon<?=$row['midx']?> check<?=$row['state']?>" style="display:none;"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px" y="0px" width="30px" height="30px" viewBox="222.744 227.408 67.744 58.526"
                        enable-background="new 222.744 227.408 67.744 58.526" xml:space="preserve">
                        <path fill="#39BA6F" d="M250.062,285.934c-9.435-11.111-15.731-18.195-27.318-28.935l5.793-5.357
                        c6.778,3.28,11.076,5.774,18.693,11.204c14.32-16.25,23.783-24.495,41.372-35.438l1.886,4.335
                        C275.983,244.402,265.359,258.502,250.062,285.934z" />
                      </svg> -->
                      <div class="timeline__step__marker timeline__step__marker--red" style="top:10px;left:10px;"></div>
                    </div>
                    <h1 class="mission mission<?=$row['midx']?>" style="font-family:'KOMACON'"><?=$row['contents']?></h1>
                    <div class="mpbox">
                      <img class="missionprice" src="/assets/freelancer/img/moneybox.png" style="max-width:40%;height: auto;">
                      <span id="mp" class="mp<?=$row['midx']?>"><?=$row['price']?></span>
                      <!-- <span style=""><?=date("y년 m월 d일\n h시 i분", strtotime($row['regdate']))?></span> -->
                    </div>
                    <!-- <img src="/assets/freelancer/img/moneybox.png" style="max-width:60%;height: auto;"> -->
                    <input id="state" type="hidden" value="<?=$row['state']?>">
                    <!-- <p>You've successfully signed into iAnswer 2.0!</p> -->
                    <form action="/Main2/missionState" onsubmit="return fncSubmit1();" method="get">
                      <input type="hidden" name="midx" value="<?=$row['midx']?>">
                      <input type="hidden" name="mprice" value="<?=$row['price']?>">
                      <?if($row['state']==0 || $row['state']==1){?>
                        <div class="bottom-popup "><span  class="ms ms<?=$row['midx']?>  mission_ing start btn-gray"name="state"style="color:#00b0bf; font-weight:400;">미션 수행 중</span></div>
                        <input type="hidden"  value="<?=$row['midx']?>" class="bp<?=$row['midx']?>">
                        <?}else if($row['state']==2){?>
                        <div class="bottom-popup " value="<?=$row['midx']?>"><span class="ms ms<?=$row['midx']?> start btn-gray"name="state" style="color:gray;">용돈 지급 완료</span></div>
                        <input type="hidden"  value="<?=$row['midx']?>" class="bp<?=$row['midx']?>">
                        <?}?>
                    </form>
                    <script>
                    var ml = $(".mission<?=$row['midx']?>").html();
                    // console.log(ml);
                    if(ml.length>=0 && ml.length<10){
                        $(".mission<?=$row['midx']?>").css('font-size','1.2rem');
                    }else if(ml.length>=10 && ml.length <15){
                        $(".mission<?=$row['midx']?>").css('font-size','0.8rem');
                    }else if(ml.length>=15 && ml.length <25) {
                        $(".mission<?=$row['midx']?>").css('font-size','0.8rem').css('margin-top','20px');
                        $(".mp<?=$row['midx']?>").css('bottom','35px');
                    }else{
                        $(".mission<?=$row['midx']?>").css('font-size','0.5rem').css('margin-top','20px');
                        $(".mp<?=$row['midx']?>").css('bottom','35px');
                    }
                    var ml = $('.mp<?=$row['midx']?>').html().length;

                    if(ml>0 && ml<5){
                        $(".mp<?=$row['midx']?>").css('font-size','1rem');
                    }else if(ml>=5 && ml <7){
                        $(".mp<?=$row['midx']?>").css('font-size','0.8rem');
                    }else if(ml>=7) {
                        $(".mp<?=$row['midx']?>").css('font-size','0.5rem')
                    }
                    var mp = $('.mp<?=$row['midx']?>').html();
                    $('.mp<?=$row['midx']?>').html(AddComma(mp));
                        </script>
                    <!-- <div class="bottom-popup"><a class="start" href="#">START</a></div> -->
                </div>
                <script>
                const renameTag = function ($obj, new_tag) {
                    let obj = $obj.get(0);
                    let tag = obj.tagName.toLowerCase();
                    let tag_start = new RegExp('^<' + tag);
                    let tag_end = new RegExp('<\\/' + tag + '>$');
                    let new_html = obj.outerHTML.replace(tag_start, "<" + new_tag).replace(tag_end, '</' + new_tag + '>');
                    $obj.replaceWith(new_html);
                };
            //    $(document).ready(function(){
                evtMCS.addEventListener("message", function(event) {
                    /**
                    지금 여기서는 전체를 다 훑어서 state가 1인 것
                     */
                    let data = JSON.parse(event.data);
                    // console.log("MCS"+data[0]['midx']);
                    // console.log("MCS!");
                    // let midx = $(".bp<?=$row['midx']?>").val();
                    // console.log(midx);
                    // let missions = $('.ms');
                    for (let i = 0; i < data.length; i++) {
                        console.log(data[i]['midx']);
                        renameTag($(".ms"+data[i]['midx']),'button')
                        $(".ms"+data[i]['midx']).css('background-color','#27bbcc').css('color','white').css('box-shadow','0 5px 5px -3px rgba(0, 0, 0, 0.3), 0 3px 5px 2px rgba(0, 0, 0, 0.12)').css('border','1px solid white').html("용돈 지급하기").attr('type','submit').attr('value','1');
                    }
                });
            //    });
              </script>
                
                
                
              <?}?> <!-- foreach문 끝 -->
            </div>
          </div>
          </div>
        <?}?>
      </div>
    <!-- 아이 -->
    <?} else {?>
    <div id="tab" class="tab container">
      <!-- 미션 등록되지 않을 때 -->
      <?if(!$missionsList){?>
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <span class="text-center mission_blank">미션 기다리는 중...</span>
            <img class="blank_pig" src="/assets/freelancer/img/blank_pig.png" >
          </div>
        </div>
      <!-- 미션 등록되지 않을 때 -->
      <?}else{?>
        <?$i=1;?>
        <div class="row" style="margin-top: 40px;">
          <div class="col-lg-8 mx-auto">
            <h3 class="mission_chal" style="top: 120px;">미션 도전하기!</h3>

             <!-- -->
            


            <!-- -->
            <div class="missionList">
        
            
            <?foreach($missionsList as $index=>$row){?>
              <div class="popup"> 
                <a href="#" class="close">
                  <!-- <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px" y="0px" width="10px" height="10px" viewBox="215.186 215.671 80.802 80.8"
                    enable-background="new 215.186 215.671 80.802 80.8" xml:space="preserve">
                    <polygon fill="#FFFFFF" points="280.486,296.466 255.586,271.566 230.686,296.471 215.19,280.964 240.086,256.066 215.186,231.17 
                    230.69,215.674 255.586,240.566 280.475,215.671 295.985,231.169 271.089,256.064 295.987,280.96 "/>
                  </svg> -->
                </a>
                <div class="valid">
                  <!-- <svg version="1.1" class="check checkicon<?=$row['midx']?> check<?=$row['state']?>" style="display:none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px" y="0px" width="30px" height="30px" viewBox="222.744 227.408 67.744 58.526"
                    enable-background="new 222.744 227.408 67.744 58.526" xml:space="preserve">
                    <path fill="#39BA6F" d="M250.062,285.934c-9.435-11.111-15.731-18.195-27.318-28.935l5.793-5.357
                    c6.778,3.28,11.076,5.774,18.693,11.204c14.32-16.25,23.783-24.495,41.372-35.438l1.886,4.335
                    C275.983,244.402,265.359,258.502,250.062,285.934z" />
                  </svg> -->
                  <div class="timeline__step__marker timeline__step__marker--red" style="top:10px;left:10px;"></div>
                </div>
                <!-- <div class="timeline__step__marker timeline__step__marker--red"></div> -->
                <h1 class="mission mission<?=$row['midx']?>" style="margin-top:35px;font-family:'KOMACON'"><?=$row['contents']?></h1>
                  <div class="mpbox">
                    <img class="missionprice" src="/assets/freelancer/img/moneybox.png" style="max-width:40%;height: auto;left:0px;">
                    <span id="mp2" class="mp2<?=$row['midx']?>"><?=$row['price']?></span>
                    <!-- <span style=""><?=date("m월 d일\n h시 i분", strtotime($row['regdate']))?></span> -->
                    <!-- <span class="mp"><?=$row['price']?></span> -->
                  </div>
                <!-- <p>You've successfully signed into iAnswer 2.0!</p> -->
                <form class="msForm" action="/Main2/missionState" onsubmit="return fncSubmit1();"method="get">
                  <input id="state" type="hidden" value="<?=$row['state']?>">
                  <input type="hidden" name="midx" value="<?=$row['midx']?>">
                  <input type="hidden" name="mprice" value="<?=$row['price']?>">
                    <?if($row['state']==0){?>
                        <div class="bottom-popup " value="<?=$row['midx']?>"><button type="submit" name="state" value="<?=$row['state']?>" class="ms ms<?=$row['midx']?> start btn-green" style="border:1px solid white;box-shadow:0 5px 5px -3px rgba(0, 0, 0, 0.3), 0 3px 5px 2px rgba(0, 0, 0, 0.12);">다했어요!</button></div>
                        <input type="hidden"  value="<?=$row['midx']?>" class="bp<?=$row['midx']?>">
                    <?}else if($row['state']==1){?>
                        <div class="bottom-popup " value="<?=$row['midx']?>"><span  class="ms ms<?=$row['midx']?> start btn-gray">용돈 기다리는 중...</span></div>
                        <input type="hidden"  value="<?=$row['midx']?>" class="bp<?=$row['midx']?>">
                    <?}else if($row['state']==2){?>
                        <div class="bottom-popup " value="<?=$row['midx']?>"><span  onclick="$('.msForm').doNotSubmit();" class="ms ms<?=$row['midx']?> start btn-gray" style="color:gray;box-shadow:0px;">저금했어요!</span></div>
                        <input type="hidden"  value="<?=$row['midx']?>" class="bp<?=$row['midx']?>">
                    <?}?>
                </form>
                <script>
                    var ml = $(".mission<?=$row['midx']?>").html();
                    // console.log(ml);
                    if(ml.length>=0 && ml.length<10){
                        $(".mission<?=$row['midx']?>").css('font-size','1rem');
                    }else if(ml.length>=10 && ml.length <15){
                        $(".mission<?=$row['midx']?>").css('font-size','0.8rem');
                    }else if(ml.length>=15 && ml.length <25) {
                        $(".mission<?=$row['midx']?>").css('font-size','0.8rem').css('margin-top','20px');
                        $(".mp2<?=$row['midx']?>").css('bottom','35px');
                    }else{
                        $(".mission<?=$row['midx']?>").css('font-size','0.5rem').css('margin-top','20px');
                        $(".mp2<?=$row['midx']?>").css('bottom','35px');
                    }
                    var ml = $('.mp2<?=$row['midx']?>').html().length;

                    if(ml>0 && ml<5){
                        $(".mp2<?=$row['midx']?>").css('font-size','1rem');
                    }else if(ml>=5 && ml <7){
                        $(".mp2<?=$row['midx']?>").css('font-size','0.8rem');
                    }else if(ml>=7) {
                        $(".mp2<?=$row['midx']?>").css('font-size','0.5rem')
                    }
                    var mp = $('.mp2<?=$row['midx']?>').html();
                    $('.mp2<?=$row['midx']?>').html(AddComma(mp));

                </script>
                <!-- <div class="bottom-popup"><a class="start" href="#">START</a></div> -->
              </div>
              <script>

                // var state = $('#state').val();
                
                // if(state==0){
                //   $(".check"+state).css('display','block');
                // }
                evtSaving.addEventListener("message", function(event) {
            
                    let data = JSON.parse(event.data);
                    let count = data.length;
                    // .contents()css('background-color','#3F51B5')
                    for(let i =0; i<count;i++){
                        $(".ms"+data[i]['midx']).css('background-color','#3F51B5').css('color','white').css('box-shadow','0 5px 5px -3px rgba(0, 0, 0, 0.3), 0 3px 5px 2px rgba(0, 0, 0, 0.12)').css('border','1px solid white').html("저금해보아요!").click(function(){
                            // if($(".ms"+data[i]['midx']).html()=='저금해보아요!'){
                                document.location.href='/Main2/savings';
                            // }
                        });
                    }
                });
                // var ml = $('.mission<?=$row['midx']?>').html().length;
                // // console.log(ml);
                // if(ml>0 && ml<12){
                //     $(".mission<?=$row['midx']?>").css('font-size','1rem');
                // }else if(ml>=12 && ml <18){
                //     $(".mission<?=$row['midx']?>").css('font-size','0.8rem');
                // }else if(ml>=18) {
                //     $(".mission<?=$row['midx']?>").css('font-size','0.5rem')
                // }
                // var ml = $('.mp2<?=$row['midx']?>').html().length;

                // if(ml>0 && ml<5){
                //     $(".mp2<?=$row['midx']?>").css('font-size','1rem');
                // }else if(ml>=5 && ml <7){
                //     $(".mp2<?=$row['midx']?>").css('font-size','0.8rem');
                // }else if(ml>=7) {
                //     $(".mp2<?=$row['midx']?>").css('font-size','0.5rem')
                // }
                // var mp2 = $('.mp2<?=$row['midx']?>').html();
                // $('.mp2<?=$row['midx']?>').html(AddComma(mp2));
              </script>

              
            <?}?>
          </div>

          </div>
        </div>
      <?}?>

    </div>
    <?}?><!--부모/아이-->
  </section>
  <?foreach($nidx as $index=>$row){?>
    <input type="hidden" id="nidx" value="<?=$row['nidx']?>">
  <?}?>
  <input type="hidden" id="page" value="<?=$page?>">
  <script>
  var doubleSubmitFlag1 = false;

    function fncSubmit1(){
        if(doubleSubmitFlag1){
            swal('처리 중입니다!');
            return false;
        }else {
            doubleSubmitFlag1 = true;
            $('#addNeedsForm').submit();
        }
    }
    // evtMissionAlarm.onmessage = function(e) {
    //         console.log(e.data+"mission2");
            
    //         if(e.data!=0){
    //             $("#childmission").prepend('<div class="bottom-popup "><button type="button"  class="ms mission_ing start btn-gray"name="state">미션 수행 중</button></div>');
                
    //         }

    //     };
    var doubleSubmitFlag=false;

    function missiondelete(){
        if(doubleSubmitFlag){
            swal('삭제 중입니다!');
            return false;
        }else {

            swal("삭제하시겠습니까?");
            doubleSubmitFlag = true;
            $('#addNeedsForm').submit();
        }
    }
//    function missiondelete(){
//     swal({
//       title: "미션을 삭제하시겠어요?",
//       icon: "warning",
//       buttons: true,
//       dangerMode: true,
//     })
//     .then((willDelete) => {
//       if (willDelete) {
//         swal("미션이 삭제되었어요. 새로운 미션을 등록해주세요!", {
//           icon: "success",
//         });
//       }
//     });
//    }


  function missionalert(){
    var nidx = $('#nidx').val();
    // console.log(nidx);
    if(!nidx){
      swal('아이가 필요한 물건을 등록하지 않았아요!');
      return false;
    }
  }
  </script>
   <script>
   $(document).ready(function(){
    // console.log("MCS!");
    
        var doubleSubmitFlagMs = false;
        $('button').click(function(){
            if(doubleSubmitFlagMs){
                swal("처리 중입니다!");
                return false;
            }else{
                doubleSubmitFlagMs = true;
            }
            
        });
        if($('button').html()=="용돈을 받았어요!"){
            
        }


        var page = $('#page').val();
        if(page==0){
            // $('#ntab').css('background-color','#7ba434').css('color','white');
        }else if(page==1){
            // $('#mtab').css('background-color','#7ba434').css('color','white');
            $('#missiontab').attr('src','/assets/freelancer/img/missionicon_white.png');
        }

        // if(Number($('#mp').html())>99999){
        //     $("#mp").css('font-size','0.8rem');
        // }
        // if(Number($('#mp2').html())>99999){
        //     $("#mp2").css('font-size','0.8rem');
        // }

        // var cp = $('#mp').html();
        // $('#mp').html(AddComma(cp));
        // var cp2 = $('#mp2').html();
        // $('#mp2').html(AddComma(cp2));
   });
            

            // evtSource.addEventListener("ping", function(e) {
            //   var newElement = document.createElement("li");
            //
            //   var obj = JSON.parse(e.data);
            //   newElement.innerHTML = "ping at " + obj.time;
            //   eventList.appendChild(newElement);
            // }, false);
 </script>