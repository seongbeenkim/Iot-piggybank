<style>
.container{
    text-align:center;
}
.missionback{
    top: 20px;
    /* margin-top: 30px; */
    margin-top: 30px;
    position: fixed;
    z-index: 994;
}
#inputdiv{
    position: relative;
    z-index: 1000;
}
#inputdiv1{
margin-top:40px;
}
.addmissioninput{
    margin:0 auto;
    width:70%;
    text-align:center;
}
.mission_inputment{
    font-size:1.5rem;
    font-weight:300;
    padding-bottom:10px;
}
.addbox{
    position: relative;
    top: 10px;
    width: 70%;
    margin: 0 auto;
    text-align:center;
    position: sticky;
}
.availableprice{
    position: relative;
    z-index: 1000;
    text-align: center;
    
}
.availablepricement{
    font-size: 1.7rem;
    margin-bottom: 10px;
    display:block;
    
}
#missionPrice{
    font-size:1.5rem;
}
.swal-footer{
    text-align:center;
}
</style>
<img id="missionback" class="missionback" src="/assets/freelancer/img/mission_back.png" style="position: absolute;z-index:0;max-width:100%;height: auto;top:20px;"> 
<section class="bg-white primary text-dark mb-0" id="about">
    <!-- <div class="container" style="position: fixed;z-index: 1000;">
    <form name="addMissionsForm" action="/Main2/addMissions" method="post" id="addMissionsForm" novalidate="novalidate">
        <div class="control-group  text-center "id="inputdiv">
            <div class="form-group mb-0 pb-2" id="inputdiv">
                <br>
                <h3 class="missionment">미션 등록하기</h3>
                <br>
            </div>
        </div>
        <div class="control-group  text-center "id="inputdiv1">
            <div>
                <h5>지급 가능한 용돈</h5>
                <input type="hidden" name="missionPrice" value="<?=$missionPrice?>">
                <h5 id="missionPrice"><?=$needsPrice-$missionPrice?></h5>
            </div>
            <br>
            <label class="mission_inputment">미&nbsp&nbsp&nbsp&nbsp&nbsp션</label>
            <input class="form-control addmissioninput" name="contents" id="contents" type="text" placeholder="ex) 일어나서 이불 개기" required="required" data-validation-required-message="미션 내용을 입력해주세요." autocomplete="off">
            <p class="help-block text-danger"></p>
            <div class="form-group controls mb-0 pb-2">
            <label class="mission_inputment">가&nbsp&nbsp&nbsp&nbsp&nbsp격</label>
            <input class="form-control addmissioninput" name="price" id="price" type="text" placeholder="ex) 1000" required="required" data-validation-required-message="미션 완료시 지급할 용돈을 입력해주세요." value="" autocomplete="off">
            <p class="help-block text-danger"></p>
            </div>
        </div>
        <br>
        <div class="form-group" id="smb">
            <input type="submit" class="btn btn-primary btn-md" id="addMissionBtn" value="등 록" onClick="return missionalert();">
        </div>
        </form>
    </div> -->
    <div class="availableprice">
        <span class="availablepricement">지급 가능한 용돈</span>
        <input type="hidden" name="missionPrice" value="<?=$missionPrice?>">
        <input type="hidden" class="mp" value="<?=$needsPrice-$missionPrice?>">
        <span id="missionPrice"><?=$needsPrice-$missionPrice?></span><span> 원</span>
    </div>
    <div class="addbox">
        <article class="card-body" style="margin-top: 80px;">

        <form name="addMissionsForm" onsubmit="return fncSubmit();"action="/Main2/addMissions" method="post" id="addMissionsForm" novalidate="novalidate">

                <div class="form-group">
                    <label class="mission_inputment">미&nbsp&nbsp션&nbsp&nbsp&nbsp내&nbsp&nbsp&nbsp용</label>
                    <input class="form-control" id="input_contents"name="contents"type="text" placeholder="ex) 일어나서 이불 개기" required="required" data-validation-required-message="미션 내용을 입력해주세요." autocomplete="off">
                    <br><br>
                    <label class="mission_inputment">용&nbsp&nbsp&nbsp&nbsp&nbsp돈</label>
                    <input id="price"class="form-control" name="price"type="text" placeholder="ex) 1000" required="required" data-validation-required-message="미션 완료시 지급할 용돈을 입력해주세요." value="" autocomplete="off">
                </div> <!-- form-group// -->
                
                <br>
                <br>
                <div class="form-group">
                    <button class="btn btn-block" style="background-color:#48adbc;color:white;"> 미션 추가 </button>
					<!-- <button type="submit" class="btn btn-primary btn-block"> Login  </button> -->
                </div> <!-- form-group// -->                                                           
            </form>
        </article>
    </div>
</section>
<script>
// $(document).on('change', '#price', function(e){
//     var price = $('#price').val();
//     var mp = $('#missionPrice').html();
//     if(price>mp){
//         location.reload();
//     }

// });
$(document).ready(function(){
    $('#missiontab').attr('src','/assets/freelancer/img/missionicon_white.png');
    var price = $('#price').val();
    var missionPrice = $('#missionPrice').html();
    $('#missionPrice').html(AddComma(missionPrice));
});

var doubleSubmitFlag = false;


function fncSubmit(){
    if(doubleSubmitFlag){
        swal('등록 중입니다!');
        return false;
    }else {
        var c = $('#input_contents').val();
        var p = $('#price').val();

        if(c==''){
            swal('미션 내용을 입력해주세요!');
            return false;
        }else if(p==''){
            swal('용돈을 입력해주세요!');
            return false;
        }else if(isNaN(p)){
            swal('용돈은 숫자만 입력해주세요!');
            return false;
        }else if(c.length> 30){
            swal('미션은 30자 이내로 입력해주세요!');
            return false;
        }
        var mp = $('.mp').val();
        var price = $('#price').val();
        

        
        mp = Number(mp);
        price =  Number(price);
        // missionPrice=$()
        console.log(price);
        if(mp==0){
            swal("지급 가능한 용돈이 없습니다!");
            return false;
        }
        if(price>mp){
            swal("지급 가능한 용돈을 초과하였습니다!");
            return false;
        }else if(empty(price)){
            swal("용돈을 입력하세요!");
            return false;
        }
        doubleSubmitFlag = true;
        $('#addNeedsForm').submit();
    }
}





function missionalert(){

    var mp = $('.mp').val();
    var price = $('#price').val();
    
    mp = Number(mp);
    price =  Number(price);
    // missionPrice=$()
    console.log(price);
    if(mp==0){
        swal("지급 가능한 용돈이 없습니다!");
        return false;
    }
    if(price>mp){
        swal("지급 가능한 용돈을 초과하였습니다!");
        return false;
    }else if(empty(price)){
        swal("용돈을 입력하세요!");
        return false;
    }
}


// var sSendFlag=false;
// 	$("#addMissionsForm").submit(function(e) {
// 		e.preventDefault();
// 		}).validate({
// 			submitHandler:function(form) {
// 				if (!sSendFlag) {
// 					sSendFlag=true;
// 					$.ajax({
// 						type: $(form).attr("method"),
// 						encoding:"UTF-8",
// 						contentType: "application/x-www-form-urlencoded; charset=UTF-8",
// 						url: $(form).attr("action"),
// 						data: $(form).serialize(),
// 						dataType:"json",
// 						success:function(data) {
// 							alert(data.sMessage);
// 							// $("#csrf").val(data.sToken);
// 							if (data.sRetCode=="01") { //로그인 성공시
// 								document.location.href=data.sRetUrl;
// 							} else { //실패시
// 								alert(data.sRetCode);
// 							}
// 							sSendFlag=false;
// 						}
// 					})
// 				} else {
// 				}
// 			}
// 	});
</script>