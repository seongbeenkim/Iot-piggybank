
<style>
 body {
    overflow-x: hidden;

  }
  .bbal{
      color:#404040;
    display: block;
    font-weight: 300;
    position: relative;
    font-family: 'KOMACON';
    top: 180px;
    text-align: center;
    font-size:3rem;
  }

  /* h1 {
    font-weight: normal;
    color: white;
    position: absolute;
    left: 50%;
    margin-left: -180px;
    top: 15px;
  } */
  .blushs{
    position: absolute;
    width: 20px;
    height: 20px;
    background: #FF3333;
    bottom: 20px;
    border-radius: 50%;
    box-shadow: 0 0 20px 10px #FF3333;
    z-index: 1000;
  }
  .blush1 {
    left: 80px;
  }
  .blush2 {
    left: 280px;
  }
  #pg1{
    position: relative;
    margin-left:-12px

  }
  #coin {
    bottom: 310px;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background: #fff21d;

    border: #9996 solid 2px;
    left: 160px;
    position: absolute;
    animation: glow 1s alternate infinite;
    cursor: pointer;
    z-index: 3;
    text-align:center;
  }
  #coin.active {
    animation: none;
  }
  #coincover{
    position:sticky;
    bottom: 0px;
    z-index: 100;
  }
  
  .money {
    width: 120px;
    height: 60px;
    position: absolute;
    z-index: -1;
    border: solid 2px #006600;
  }
  .money .pres {
    margin: 0 auto;
    margin-top: 10px;
    height: 40px;
    width: 30px;
    background: #006600;
    border-radius: 50%;
  }
  /* img { display: block; margin: 0px auto; } */
  .piggy {
    text-align:center;
    /* width: 300px;
    height: 300px;
    background: #FF6666;
    border-radius: 50%;
    margin: 0 auto;
    margin-top: 100px;
    position: relative; */
    /* bottom:0; */
    position: absolute;
    bottom: 0px;
  }
  .piggy .insert {
    width: 120px;
    height: 10px;
    left: 160px;
    top: 15px;
    position: absolute;
    background: #333;
    border-top: solid 3px #777;
    border-radius: 50% 50% 30% 30%;
  }
  .piggy .cover {
    background: #FF6666;
    width: 115px;
    height: 50px;
    position: absolute;
    top: 55px;
    left: 70px;
    transform: rotate(45deg);
    z-index: 6;
  }
  .piggy .coin-cover {
    position: absolute;
    z-index: 4;
    background: #FF6666;
    height: 80px;
    width: 80px;
    left: 190px;
    top: 28px;
  }

  #coinprice{
    display: block;
    position: relative;
    text-align: center;
    width: 90px;
    line-height: 20px;
    font-size: 1.5rem;
    margin: auto;
    margin-top: 30px;
    color:#404040;

  }
  @keyframes glow {
    from {
      box-shadow: 0 0 10px#FFFF94;
    }
    to {
      box-shadow: 0 0 10px 10px #FFFF94;
    }
  }
  @keyframes smile {
    from {
      border-radius: 0 0 5% 5%;
    }
    to {
      border-radius: 0 0 50% 20%;
    }
  }
  @keyframes touch{
      from{
          opacity: 0.1;
      }
      to{
          opacity: 1;
      }
  }
  .swal-footer{
    text-align:center;
}
#saving_cloud{
    position: absolute;
    top: 80px;
    left:20px;
}
body{
    background:#d9eff4;
}
#ments{
    position: absolute;
    bottom: 350px;
    left: 50px;
    text-align: center;
    

}
.swal-text{
    font-size:23px;
}
.swal-footer{
    text-align:center;
}
.saving_ment{
    font-weight:300;
    font-size:2rem;
    animation:touch 1s alternate infinite;
}
.togglePiggy{
    display: none;
}

#won{
    display: inline-block;
    /* margin-top: 15px; */
}
</style>
<div id="saving">
    <form action="/Main2/saveMoney" method="post" name="savingMoney" id="savingMoney" novalidate="novalidate">
        <input id="pinmoney1" type="hidden" name="pinmoney" value="<?=$wBalance?>">  
    </form>
    <div id="cloud">
        <img id="saving_cloud"src="/assets/freelancer/img/saving_cloud.png" style="max-width:90%; height:auto;">
        <!-- <h4>피그몽에</h4> -->
        <span class="bbal"><?=$bBalance?></span> 
        <!-- <h4>원을 모았어요!</h4> -->
    </div>
    <button id="coinbtn"><div id="coin"><span id="coinprice"><?=$wBalance?></span><span id="won">원</span></div></button>
    <div id="ments">
        <h5 class="saving_ment">Touch!</h5>
        <!-- <h5 class="saving_ment">저금해보아요!</h5> -->
    </div>
    <!-- <div class="col-sm-3 tot">
                    <input id="total" class="form-control" type="text" value="₩ 0">
                    <input id="pinmoney" name="pinmoney" type="hidden" value="0">
                    <input id="wBalance" name="wBalance" type="hidden" value="<?=$wBalance?>">
                    <a href="javascript:resetTotal()" class="" >reset</a>
                    <br>
                    <br>
                </form>
                <button id="saving" class="btn-primary btn-lg" >저금하기</button>
                </div> -->
    <!-- <h1>Insert Coin</h1> -->
    <div class="piggy">
        <img id="coincover" src="/assets/freelancer/img/saving_coincover.png" style="max-width:90%;height: auto;">
        <!-- <div class="blushs blush1 togglePiggy"></div>
        <div class="blushs blush2 togglePiggy"></div> -->
    </div>
    <div class="piggy">
    <!-- <div class="insert"></div>
    <div class="cover"></div>
    <div class="coin-cover">
        -->
        
        
        <img id="pg"class="" src="/assets/freelancer/img/saving_pig2.png" style="max-width:90%;height: auto;">

    </div>
    <div class="piggy">
        <img id="pg1"class="togglePiggy" src="/assets/freelancer/img/saving_pig2_smile.png" style="max-width:94%;height: auto;">
        
    </div>
</div>
<input type="hidden" id="page" value="<?=$page?>">
<script>
var doubleSubmitFlag = false;

function fncSubmit(){
    if(doubleSubmitFlag){
        alert('제출 중입니다.');
        return false;
    }else {
        doubleSubmitFlag = true;
        $('#addMissionsForm').submit();
    }
}

    function savemoney(){
    
    var b = false;
    if(true){
        swal("성공");
        b=true;
    }
    if(b){
        return true;
    }else{
        return false;
    }
}

$(document).ready(function(){

    var page = $('#page').val();
        if(page==0){
            // $('#ntab').css('background-color','#7ba434').css('color','white');
        }else if(page==1){
            // $('#mtab').css('background-color','#7ba434').css('color','white');
        }else if(page==2){
            // $('#stab').css('background-color','#7ba434').css('color','white');
            $('#savingtab').attr('src','/assets/freelancer/img/savingicon_white.png');
        }
    var bbal = $('.bbal').html();
    if(bbal=='0'){
        $('.bbal').html("저금해주세요!").css('font-size','2rem').css('top','180px');
    }else{
        $('.bbal').html(AddComma(bbal)+"원");
        console.log(bbal);
    }
    if(Number($('#coinprice').html())>99999){
        $("#coinprice").css('font-size','1.1rem');
    }else if(Number($('#coinprice').html())>999999){
        $("#coinprice").css('font-size','0.8rem');
    }

    var cp = $('#coinprice').html();
    $('#coinprice').html(AddComma(cp));


// function AddComma(data_value) {
//     return Number(data_value).toLocaleString('en');
//   }


    // $('#pg1').hide();
    if($('#coinprice').html()=='0'){

        $('.saving_ment').css('animation','');
       

    }else{
        $('.saving_ment').css('animation','touch 1s alternate infinite');
    }

    $('#pg').removeClass('togglePiggy');
    // $('#coincover').show();
    $('.blushs').addClass('togglePiggy');

    var pm = $('#pinmoney1').val();

    $('#coincover').css('display','');


    $('#coin').click(function() {
            
            if($('#coinprice').html()=='0'){
                swal('받은 용돈이 없습니다!');
                $('.saving_ment').css('animation','');
                return false;
            }else{
                if(doubleSubmitFlag){
                swal("저금 중입니다.");
                return false;
            }else{
                doubleSubmitFlag = true;
                var pm = $('#pinmoney1').val();
                $(this).addClass('active');
                console.log(pm);
                $('#coincover').css('display','');
                // $('h1').fadeOut('slow');
                
                $(this).animate({
                    bottom: "140px"
                }, 1300);
                
                
                setTimeout(function() {
                    // $('#blush1').fadeIn('slow');
                    // $('.blushs').removeClass('togglePiggy');
                }, 1000);
                // setTimeout(function() {
                // // $('#blush2').fadeIn('slow');
                // }, 1000);
                
                setTimeout(function() {
                    $('#pg1').removeClass('togglePiggy');
                    $('#pg').addClass('togglePiggy');
                
                }, 1100);
                
                setTimeout(function() {
                    var a= 10;
                    // alert(pm+"저금이 완료되었어요");
                    
                    // swal(pm+"원이 저금되었어요!");
                    $('#savingMoney').submit();
                    
                }, 2000);
            }
        // }
        // event.preventDefault();

        }

            
    });
      

});

</script>