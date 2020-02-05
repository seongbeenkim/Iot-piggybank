// // function AddComma(data_value) {
// //     return Number(data_value).toLocaleString('en');
// //   }
// function savemoney(){
    
//     var b = false;
//     if(true){
//         swal("성공");
//         b=true;
//     }
//     if(b){
//         return true;
//     }else{
//         return false;
//     }
// }


    
// $(document).ready(function() {
//     // $('#pg1').hide();
//     if($('#coinprice').html()=='0'){

//         $('.saving_ment').css('animation','');

//     }else{
//         $('.saving_ment').css('animation','touch 1s alternate infinite');
//     }
//     $('#pg').removeClass('togglePiggy');
//     $('#coincover').hide();
//     $('.blushs').addClass('togglePiggy');

//     var pm = $('#pinmoney1').val();


//     $('#coin').click(function() {
        
//         if($('#coinprice').html()=='0'){
//             swal('저금할 돈이 없습니다!');
//             $('.saving_ment').css('animation','');
//             return false;
//         }else{
            
//             var pm = $('#pinmoney1').val();
//             $(this).addClass('active');
//             console.log(pm);
//             $('#coincover').show();
//             // $('h1').fadeOut('slow');
            
//             $(this).animate({
//             bottom: "173px"
//             }, 1000);
            
//             $('.mouth').addClass('smile');
            
//             setTimeout(function() {
//             // $('#blush1').fadeIn('slow');
//             $('.blushs').removeClass('togglePiggy');
//             }, 1000);
//             // setTimeout(function() {
//             // // $('#blush2').fadeIn('slow');
//             // }, 1000);
            
//             setTimeout(function() {
//             $('#pg1').removeClass('togglePiggy');
//             $('#pg').addClass('togglePiggy');
            
//             }, 1100);
            
//             setTimeout(function() {
//             var a= 10;
//             // alert(pm+"저금이 완료되었어요");
            
//             swal(pm+"원이 저금되었어요!");
//             $('#savingMoney').submit();
            
                
            
            
//             }, 1300);
//         }
//         // event.preventDefault();

        
        
      
//     });
    
//   });
