 <!--Footer-->
 <footer>
     <section class="herobwa mt-5">
         <div class="container">


             <p style="text-align: center;"> <?= VERSION; ?></p>


         </div>
     </section>

 </footer>

 </div>
 </div>


 <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>

 <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>

 <script src="js/main.js"></script>
 <script src="js/disk/longbow.slidercaptcha.min.js"></script>
 <script>
     var captcha = sliderCaptcha({
         id: 'captcha',
         repeatIcon: 'fa fa-redo',
         onSuccess: function() {
             var handler = setTimeout(function() {
                 window.clearTimeout(handler);
                //  captcha.reset();
                $('#validation').val('success');
                             
             }, 500);
         }
     });
 </script>
 </body>

 </html>