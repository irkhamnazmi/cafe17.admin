$(function(){
  
    //Blog
    $('.addBlog').on('click',function(){
     $('#formModalLabel').html('Buat Blog');
     $('.modal-footer button[type=submit]').html('Buat');
    
 
     $('#title').val('');
     $('#author').val('');
     $('#image').val('');
     $('#description').val('');
     
   
 
 });
 
 $('.editBlog').on('click',function(){
   $('#formModalLabel').html('Ubah Blog');
   $('.modal-footer button[type=submit]').html('Ubah');
   $('.modal-body form').attr('action', 'http://localhost/cafe17.admin/public/blog/getupdate');
 
  
 
   const id = $(this).data('id');
   // console.log(id);
 
   $.ajax({
       url: 'http://localhost/cafe17.admin/public/blog/getupdate',
       data: {id : id},
       method: 'post',
       dataType: 'json',
       success: function(data){
           // console.log(data);
          $('#title').val(data.title);
          $('#author').val(data.author);
          $('#image').val(data.image);
          $('#description').val(data.description);
          $('#id').val(data.id);
       }
   });
 
});
 //Cashier 
 $('.addCashier').on('click',function(){
    $('#formModalLabel').html('Tambah Kasir');
    $('.modal-footer button[type=submit]').html('Tambah');
   

    $('#cashier_name').val('');
    $('#cashier_address').val('');
    $('#cashier_type').val('');
    $('#cashier_email').val('');
    $('#cashier_phone_number').val('');
    $('#password').val('');
    $('#cashier_id').val('');
    
 
});


$('.editCashier').on('click',function(){
    $('#formModalLabel').html('Ubah Kasir');
    $('.modal-footer button[type=submit]').html('Ubah');
    $('.modal-body form').attr('action', 'http://localhost/cafe17.admin/public/cashier/edit');
  
   
  
    const id = $(this).data('id');
    console.log(id);
  
    $.ajax({
        url: 'http://localhost/cafe17.admin/public/cashier/getedit',
        data: {cashier_id : id},
        method: 'post',
        dataType: 'json',
        success: function(data){
            // console.log(data);
           $('#cashier_name').val(data.cashier_name);
           $('#cashier_address').val(data.cashier_address);
           $('#cashier_type').val(data.cashier_type);
           $('#cashier_email').val(data.cashier_email);
           $('#cashier_phone_number').val(data.cashier_phone_number);
           $('#password').val(data.cashier_password);
           $('#cashier_id').val(data.cashier_id);
        }
    });
});
});


 