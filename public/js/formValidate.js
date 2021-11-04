(function() {
  
  
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
     
   
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
         
          var cekEditor =  $('#ckeditor').text();

          if(cekEditor == 'available'){
            var editorValue = CKEDITOR.instances.editor.getData();
            if (form.checkValidity() === false || editorValue.length == "") {
              event.preventDefault();
              event.stopPropagation();
              $('#editor-error').show();
             
          }  
      
            form.classList.add('was-validated');
          }else{
            if (form.checkValidity() === false || editorValue.length == "") {
              event.preventDefault();
              event.stopPropagation();
           
             
          }  
      
            form.classList.add('was-validated');
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

