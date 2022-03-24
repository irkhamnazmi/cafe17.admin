//   $('#formModal').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget) // Button that triggered the modal
//     var recipient = button.data('whatever') // Extract info from data-* attributes
//     modal = $(this)
//     //  modal.find('.modal-title').text(recipient)
// })


$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});




function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

// function sendWhatsapp(id){
//   console.log(id);

//   $.ajax({
//     url: baseurl + '/transaction/contact',
//     data: {
//       transaction_id: $id
     
//     },
//     method: 'POST',
//     dataType: 'json',
//     success: function (data) {


//       window.location.href = 'https://wa.me/'+data.user_phone_number+'/';

      
//     }
//   });

// }




function calculate(qty){
    
  $.ajax({
    url: baseurl + '/menu/getmenu',
    data: {
      menu_id: $('#menu_id').val()
     
    },
    method: 'POST',
    dataType: 'json',
    success: function (data) {

      if(data != ''){
        var price = data.menu_price;
        var result = price * qty;
        $('#transaction_detail_price_total').val(result);
      }else{
        $('#transaction_detail_price_total').val('');
      }

      
    }
  });

}

function selectData(){
  var data = $('#data').val();
  switch(data){
    case "User" :
     
    //  console.log(data);
     $.ajax({
      url: baseurl + '/report/getuser_year',
      data: {
        user: data
       
      },
      method: 'POST',
      dataType: 'json',
      success: function (result) {
        // console.log(result);
        var len = result.length;

        $("#year").empty();
        for( var i = 0; i<len; i++){
           
            var year = result[i]['user_year'];
            
            $("#year").append("<option value='"+year+"'>"+year+"</option>");

        }
        
      }
    });
    break;
    case "Transaction" :
   
    //  console.log(data);
     $.ajax({
      url: baseurl + '/report/gettransaction_year',
      data: {
        user: data
       
      },
      method: 'POST',
      dataType: 'json',
      success: function (result) {
        // console.log(result);
        var len = result.length;

        $("#year").empty();
        for( var i = 0; i<len; i++){
           
            var year = result[i]['transaction_year'];
            
            $("#year").append("<option value='"+year+"'>"+year+"</option>");

        }
        
      }
    });
    break;
  }
}

function checkDate(){
  $('#dateLabel').text('Tanggal');
  $('#datepicker').css('display','block');
  $('#selectMonth').css('display','none');
  $('#selectYear').css('display','none');
  $('#form').attr('action', baseurl+'/report/by_date');
  $('#date').attr('required','');
  $('#month').removeAttr('required');
  $('#year').removeAttr('required');
  console.log('Tanggal');

}
function checkMonth(){
  $('#dateLabel').text('Bulan');
  $('#datepicker').css('display','none');
  $('#selectMonth').css('display','block');
  $('#selectYear').css('display','block');
  $('#form').attr('action', baseurl+'/report/by_month');
  $('#month').attr('required','');
  $('#date').removeAttr('required');
  $('#year').removeAttr('required');
  console.log('Bulan');


 
}
function checkYear(){
  $('#dateLabel').text('Tahun');
  $('#datepicker').css('display','none');
  $('#selectMonth').css('display','none');
  $('#selectYear').css('display','block');
  $('#form').attr('action', baseurl+'/report/by_year');
  $('#year').attr('required','');
  $('#date').removeAttr('required');
  $('#month').removeAttr('required');
  console.log('Tahun');
}




// function datePicker(){
//   $('#date').format('dd/mm/yyyy') ;
// console.log('haha');
// }

