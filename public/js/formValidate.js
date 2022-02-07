(function() {
  
  
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
     
   
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
         
          // var cekEditor =  $('#ckeditor').text();

          // if(cekEditor == 'available'){
          //   var editorValue = CKEDITOR.instances.editor.getData();
          //   if (form.checkValidity() === false || editorValue.length == "") {
          //     event.preventDefault();
          //     event.stopPropagation();
          //     $('#editor-error').show();
             
          // }  
      
          //   form.classList.add('was-validated');
          // }else{
          //   if (form.checkValidity() === false || editorValue.length == "") {
          //     event.preventDefault();
          //     event.stopPropagation();
           
             
          // } 
      
          //   form.classList.add('was-validated');
          //   return true;
          // }
        
          var page =  $('#page').text();
          switch(page){
              case 'blog': 
              var editorValue = CKEDITOR.instances.editor.getData();
              if(form.checkValidity() === false || editorValue.length == ""){
                event.preventDefault();
                event.stopPropagation();
                $('#editor-error').show();
              }
              form.classList.add('was-validated');
                break;
              case 'menu': 
              var editorValue = CKEDITOR.instances.editor.getData();
              if(form.checkValidity() === false || editorValue.length == ""){
                event.preventDefault();
                event.stopPropagation();
                $('#editor-error').show();
              }
              
              form.classList.add('was-validated');
                break;
              case 'cashier': 
              // var editorValue = CKEDITOR.instances.editor.getData();
              if(form.checkValidity() === false){
                event.preventDefault();
                event.stopPropagation();
                
              }
              form.classList.add('was-validated');
                break;
              case 'transaction': 
              // var editorValue = CKEDITOR.instances.editor.getData();
              if(form.checkValidity() === false){
                event.preventDefault();
                event.stopPropagation();
               }
           
              form.classList.add('was-validated');
                break;
              case 'report': 
              // var editorValue = CKEDITOR.instances.editor.getData();
              // if(form.checkValidity() === false){
              //   event.preventDefault();
              //   event.stopPropagation();
              //  }
              var data =  $('#data').val();
              var radioBtn =  document.querySelector( 'input[name="exampleRadios"]:checked');   
              var date = $('#date').val();
              var month = $('#month').val();
              var year = $('#year').val();
              if(data == ''){
                event.preventDefault();
                event.stopPropagation();
              }  
              if(radioBtn == 'date'){
                if(date == ''){
                  event.preventDefault();
                  event.stopPropagation();
                  $('#date').removeClass("form-control").addClass("form-control is-invalid");
                  $('#date-error').text('Tanggal belum ditentukan');
                }}
      
                else if(radioBtn == 'month'){
                if(month == '' && year == ''){
                  event.preventDefault();
                  event.stopPropagation();
                  $('#month').removeClass("form-control").addClass("form-control is-invalid");
                  $('#year').removeClass("form-control").addClass("form-control is-invalid");
                  $('#date-error').text('Bulan dan tahun belum ditentukan');
                }    
              }
              else if(radioBtn == 'year'){
                if(year == ''){
                  event.preventDefault();
                  event.stopPropagation();
                  $('#year').removeClass("form-control").addClass("form-control is-invalid");
                  $('#date-error').text('Tahun belum ditentukan');
                }    
              }


           
              form.classList.add('was-validated');
                break;
          }
        
         
       
        }, false);
      });
    }, false);
  })();


//   $(document).ready(function() {
//     $('#submitbtn').click(function () {
//       var cekEditor =  $('#ckeditor').text();
//       alert(cekEditor);
//      });

//     // function validateEditor() {
//     //   let editorValue = $('#editor').val();
//     //   if (editorValue.length == '') {
//     //   $('#editor-error').show();
//     //       editorError = false;
//     //       return false;
//     //   }
   
//     //   else {
//     //       $('#editor-error').hide();
//     //   }
//     // }

//     // $('#submitbtn').click(function () {
//     //     validateEditor();
       
//     // });

//     // // $('#resetbtn').click(function () {
//     // //     validateEditor();
//     // //     form.classList.remove('was-validated');
//     // // });
// });

