$(function(){

    //Blog
    $('.addBlog').on('click',function(){
     $('#formModalLabel').html('Buat Blog');
     $('.modal-footer button[type=submit]').html('Buat');
     $('#form')[0].reset();
  
     form.classList.remove('was-validated');
     $('#editor-error').hide();
     CKEDITOR.instances['editor'].setData('');
     $('#link_image').css('display','none');
     $('#txt_image').css('display','block');
     $("#form").data('bootstrapValidator').destroy();
     $('#form').data('bootstrapValidator', null);

   
 
 });
 
 $('.editBlog').on('click',function(){
   $('#formModalLabel').html('Ubah Blog');
   $('.modal-footer button[type=submit]').html('Ubah');
   $('.modal-body form').attr('action', baseurl+'/blog/edit');
 
   $('#blog_image').attr('required', false);
   $('#form')[0].reset();
   form.classList.remove('was-validated');
   $('#editor-error').hide(); 
   $('#cashier_id').val('');
   $('#cashier_name').val(''); 
 
   const id = $(this).data('id');
   // console.log(id);
 
   $.ajax({
       url: baseurl+'/blog/getedit',
       data: {blog_id : id},
       method: 'post',
       dataType: 'json',
       success: function(data){
           // console.log(data);
          $('#blog_title').val(data.blog_title);
          $('#cashier_id').val(data.cashier_id);
          $('#cashier_name').val(data.cashier_name);
          $('#link_image').attr('href',baseurl+'/images/'+data.blog_image);
          $('#link_image').html('Lihat Foto '+data.blog_title);
          CKEDITOR.instances['editor'].setData(data.blog_description);
          $('#text_image').val(data.blog_image);
          $('#id').val(data.blog_id);
       }
   });
 
});
 //Cashier 
 
 $('.addCashier').on('click',function(){
    $('#formModalLabel').html('Tambah Kasir');
    $('.modal-footer button[type=submit]').html('Tambah');
    

    $('#form')[0].reset();
     form.classList.remove('was-validated');
    
    
 
});


$('.editCashier').on('click',function(){
    $('#formModalLabel').html('Ubah Kasir');
    $('.modal-footer button[type=submit]').html('Ubah');
    $('.modal-body form').attr('action', baseurl+'/cashier/edit');
    
    form.classList.remove('was-validated');
  
    const id = $(this).data('id');
    console.log(id);
  
    $.ajax({
        url: baseurl+'/cashier/getedit',
        data: {cashier_id : id},
        method: 'post',
        dataType: 'json',
        success: function(data){
            // console.log(data);
           $('#cashier_name').val(data.cashier_name);
           $('#cashier_address').val(data.cashier_address);
           $('#cashier_category').val(data.cashier_category);
           $('#cashier_email').val(data.cashier_email);
           $('#cashier_phone_number').val(data.cashier_phone_number);
           $('#password').val(data.cashier_password);
           $('#cashier_id').val(data.cashier_id);
        }
    });
});


//Menu 
 
$('.addMenu').on('click',function(){
    $('#formModalLabel').html('Tambah Menu');
    $('.modal-footer button[type=submit]').html('Tambah');
    $('#form')[0].reset();
  
    form.classList.remove('was-validated');
    $('#editor-error').hide();
    CKEDITOR.instances['editor'].setData('');
    $('#link_image').css('display','none');
    $('#txt_image').css('display','block');
    $("#form").data('bootstrapValidator').destroy();
    $('#form').data('bootstrapValidator', null);
  
    
    
 
});


$('.editMenu').on('click',function(){
    $('#formModalLabel').html('Ubah Menu');
    $('.modal-footer button[type=submit]').html('Ubah');
    $('.modal-body form').attr('action', baseurl+'/menu/edit');
    
   
    // $('#txt_image').css('display','none');
     $('#menu_image').attr('required', false);
     $('#form')[0].reset();
     form.classList.remove('was-validated');
     $('#editor-error').hide();   
    
    const id = $(this).data('id');
    console.log(id);
  
    $.ajax({
        url: baseurl+'/menu/getedit',
        data: {menu_id : id},
        method: 'post',
        dataType: 'json',
    
        success: function(data){
            // console.log(data);
           
            for(instance in CKEDITOR.instance){
                CKEDITOR.instances['editor'].updateElement();
            }
            
           $('#menu_name').val(data.menu_name);
           $('#menu_category').val(data.menu_category);
           $('#editor').val(data.menu_description);
           CKEDITOR.instances['editor'].setData(editor);
           $('#menu_price').val(data.menu_price);
        //    $('#txt_image').html('Foto tersedia');
           $('#link_image').attr('href',baseurl+'/uploads/images/'+data.menu_image);
           $('#link_image').html('Lihat Foto '+data.menu_name);
         
           $('#text_image').val(data.menu_image);
           $('#id').val(data.menu_id);

             
        }
    });
});

//Transaction 

$('.create').on('click',function(){
    $('#formModalLabel').html('Buat Invoice');
    // $('.modal-body form').attr('action', baseurl+'/menu/edit');
    $.ajax({
        url: baseurl+'/transaction/getinvoice',
        method: 'post',
        dataType: 'json',
    
        success: function(data){
           
            $('#transaction_invoice_code').val(data);

        }
    });
    
   
    
});


//Transaction Detail

$('.confirm').on('click',function(){
   
    $('#process').css('display','block');
    const id = $(this).data('id');
    console.log(id);
    $.ajax({
        url: baseurl+'/transaction/getid',
        data: {transaction_id : id},
        method: 'post',
        dataType: 'json',
    
        success: function(data){
            switch(data.transaction_status){
                case 'Menunggu Konfirmasi':
                    
                    $('#subtitle').html('Pastikan Pesanan pembeli dalam keadaan siap untuk diantar ke Pelanggan.');
                    $('#btn').html('Konfirmasi');
                    $('#image').css('display','none');
                    break;
                case 'Menunggu Pembayaran':
                    if(data.transaction_category == 'Online'){
                        $('#subtitle').html('Hubungi pelanggan untuk segera melakukan proses pembayaran.');
                        $('#btn').css('display','none');
                        $('#image').css('display','none');
                        
                    }else{
                        $('#subtitle').html('Pastikan pelanggan siap melakukan proses pembayaran.');
                        $('#btn').css('display','block');
                        $('#btn').html('Bayar');
                        $('#image').css('display','none');
                    }    
                    
                    break;
                case 'Sedang Proses':
                   
                    $('#subtitle').html('Pastikan Kasir sudah menerima pembayaran dari pelanggan.');
                    $('#btn').css('display','block');
                    $('#btn').html('Lunas');
                    $('#image').css('display','block');
                    break;
                    
              
            }

        }
    });
    $('.modal-body form').attr('action', baseurl+'/transaction/confirm/'+id);
    $('#menu').css('display','none');
    $('#title').html('Apakah Pesanan ini bersedia untuk diproses?');
    $('#btn').attr('class','btn btn-success');
    
    

    
   
    
});



$('.delete').on('click',function(){
    $('#process').css('display','block');
    const id = $(this).data('id');
    console.log(id);

    $.ajax({
        url: baseurl+'/transaction/getid',
        data: {transaction_id : id},
        method: 'post',
        dataType: 'json',
    
        success: function(data){
            switch(data.transaction_status){
                case 'Menunggu Konfirmasi':
                    
                    $('#subtitle').html('Seluruh Data Pesanan ini akan hilang.');
                    $('#image').css('display','none');
                    break;
                case 'Menunggu Pembayaran':
                 
                    $('#subtitle').html('Status Pesanan akan diubah menjadi "Menunggu Konfirmasi".');
                    $('#image').css('display','none');
                    break;
                case 'Sedang Proses':
                   
                    $('#subtitle').html('Status Pesanan akan diubah menjadi "Menunggu Pembayaran".');
                    $('#image').css('display','none');
              
            }
          
          
         
        }
    });

    $('.modal-body form').attr('action', baseurl+'/transaction/delete/'+id);
    $('#menu').css('display','none');
    $('#title').html('Apakah Pesanan ini ingin di batalkan?');
    
    $('#btn').html('Batal');
    $('#btn').attr('class','btn btn-danger');

    
  
   
   
    
});

$('.addOrder').on('click',function(){
 
    $('#process').css('display','none');
    $('#menu').css('display','block');


   
    
});



});


 