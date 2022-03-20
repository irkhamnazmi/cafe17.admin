<header>

    <section class="herobwa mt-5">
        <div class="container">
            <div class="text-center">
                <img src="<?= BASEURL; ?>/images/cafe17.svg" />
            </div>
        </div>
    </section>

</header>
<main>
    <section class="herobwa mt-5">
        <div class="container">

            <div class="text-center">
                <h1>
                    Admin Kasir
                </h1>
            </div>

            <div class="text-center">
                <?php Flasher::flash(); ?>
            </div>
            <div class="card center" style="width: 40%; border: none; color: black;">
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/account/getlogin" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" style="border: 1px solid #000000" aria-describedby="emailHelp" name="email">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" style="border: 1px solid #000000" id="exampleInputPassword1" name="pass">
                        </div>

                        <div class="form-group">
                            <div class="slidercaptcha card" style="height: max-content;">
                                <div class="card-header">
                                    <span style="color:#000000">Lengkapi potongan gambar ini</span>
                                </div>
                                <div class="card-body mt-2 mb-3">
                                    <div id="captcha"></div>
                                    <input type="hidden" name="validation" id="validation">
                                </div>
                                
                                <div class="card-footer border-0" style="background-color: white; text-align: center">
                                    <a style="font-size: small;" href="https://www.jqueryscript.net/plus/search.php?keyword=ArgoZhang">Developed by ArgoZhang</a>
                                </div>
                                
                            </div>
                        </div>

                        <button type="submit" class="col btn-primary" style="margin-top: 10%;">Submit</button>
                    </form>

                    </form>
                </div>
            </div>
        </div>
    </section>




</main>