<!doctype html>
<html lang="en">
  <head>
    <?php 
        include 'global/_css.php';
    ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">

    <title>Panitia.id</title>
  </head>
  <body>

    <!-- header -->
    <!-- iklan -->
    <!-- <div class="container my-3 d-flex justify-content-center">
        <img src="assets/img/ads.jpeg" alt="iklan_image" class="w-50">
    </div> -->

    <!-- end iklan -->

    <!-- navbar -->
    <?php
        include 'global/_navbar.php';
    ?>
    <!-- end navbar -->
    
    <div class="patern">
        <div class="container py-3">
            <h1>Login</h1>
        </div>
    </div>
    
    <div class="container">

    <!-- content -->

    <div class="content">

            <div class="container">
    
                <div class="row justify-content-center align-items-center">
    
                    <div class="card shadow card-login mt-5">
    
                        <div class="card-body">
                            <form method="POST" action="<?= site_url('proses_login') ?>">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="username" placeholder="Masukan email" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                Please fill in your email
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" placeholder="Masukan password" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                please fill in your password
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Login Sebagai ? <span class="text-danger">*</span></label>
                                </div>
                                <label class="checkbox-inline mr-3"><input type="radio" name="role" value="peserta" checked> Peserta</label>
                                <label class="checkbox-inline"><input type="radio" name="role" value="eo"> Event Organizer</label>
                            </div>
    
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-done btn-block rounded-pill" tabindex="4">
                                Login
                                </button>
                            </div>
    
                            <div class="form-group text-center">
                                <span> Belum memiliki akun? <a href="<?= site_url('register') ?>"class="text-warning"> Registrasi </a> </span>
                            </div>
    
                            </form>
    
                        </div>
                    </div>
                </div>
            </div>
    
        </div>  

    <!-- end content -->
    
    </div>

    <!-- footer -->
    <?php
        include 'global/_footer.php';
    ?>
    <!-- end footer -->

    <?php
        include 'global/_js.php';
    ?>

    <script>
        $(document).ready(function() {
            // executes when HTML-Document is loaded and DOM is ready

            // breakpoint and up  
            $(window).resize(function(){
                if ($(window).width() >= 980){	

                // when you hover a toggle show its dropdown menu
                $(".navbar .dropdown-toggle").hover(function () {
                    $(this).parent().toggleClass("show");
                    $(this).parent().find(".dropdown-menu").toggleClass("show"); 
                });

                    // hide the menu when the mouse leaves the dropdown
                $( ".navbar .dropdown-menu" ).mouseleave(function() {
                    $(this).removeClass("show");  
                });
            
                    // do something here
                }	
            });  
            
            

        // document ready  
        });
    </script>

  </body>
</html>