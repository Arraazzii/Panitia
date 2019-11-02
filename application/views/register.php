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
            <h1>Register</h1>
        </div>
    </div>
    
    <div class="container">

    <!-- content -->

    <div class="content">

            <div class="container">
    
                <div class="row justify-content-center align-items-center">
    
                    <div class="card shadow card-login mt-3">

                        <div class="card-body">
                            <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="pills-member-tab" data-toggle="pill" href="#pills-member" role="tab" aria-controls="pills-member" aria-selected="true">Peserta</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="pills-mitra-tab" data-toggle="pill" href="#pills-mitra" role="tab" aria-controls="pills-mitra" aria-selected="false">Event Organizer</a>
                                </li>
                              </ul><hr/>
                              <div class="tab-content" id="pills-tabContent">

                                <!-- content member -->
                                <div class="tab-pane fade show active" id="pills-member" role="tabpanel" aria-labelledby="pills-member-tab">
                                    <form method="POST" action="<?= site_url('registerPeserta') ?>"  accept-charset="utf-8">

                                        <div class="form-group">
                                            <label for="">Nama <span class="text-danger">*</span></label>
                                            <input id="nama" type="text" class="form-control" name="nama" placeholder="Masukan Nama" tabindex="1" required />
                                        </div>
                                        <div class="form-group <?= form_error('email')? 'has-error':'' ?>">
                                            <label for="">Email <span class="text-danger">*</span></label>
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Masukan Email" tabindex="1" required />
                                            <?php if (form_error('email')): ?>
                                            <span class="help-block"><?= form_error('email'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor Telepon <span class="text-danger">*</span></label>
                                            <input id="nohp" type="number" class="form-control" name="nohp" placeholder="Masukan Nomor Telepon" required />
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Password <span class="text-danger">*</span></label>
                                            </div>
                                            <input id="password" type="password" class="form-control" placeholder="Masukan password" name="password" tabindex="2" required />
                                            <div class="invalid-feedback">
                                            please fill in your password
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                            </div>
                                            <input id="repassword" type="password" class="form-control" placeholder="Ulangi password" name="" tabindex="2" required />
                                        </div>
                
                                        <div class="form-group">
                                            <button type="submit" id="btnSubmit" class="btn btn-success btn-lg btn-block rounded-pill" tabindex="4">
                                            REGISTER
                                            </button>
                                        </div>
                
                                        <div class="form-group text-center">
                                            <span>Sudah memiliki akun? <a href="<?= site_url('login') ?>" class="text-warning"> Login </a> </span>
                                        </div>
                
                                        </form>
                                </div>


                                <!-- content eo -->
                                <div class="tab-pane fade" id="pills-mitra" role="tabpanel" aria-labelledby="pills-mitra-tab">
                                  <form method="POST" action="<?= site_url('registerEo') ?>" class="needs-validation">

                                        <div class="form-group">
                                            <label for="">Nama Event Organizer<span class="text-danger">*</span></label>
                                            <input id="nama_eo" type="text" class="form-control" name="nama_eo" placeholder="Masukan Nama" tabindex="1" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Contact Person<span class="text-danger">*</span></label>
                                            <input id="nama_cp" type="text" class="form-control" name="nama_cp" placeholder="Masukan Nama" tabindex="1" required />
                                        </div>
                                        <div class="form-group <?= form_error('email')? 'has-error':'' ?>">
                                            <label for="">Email <span class="text-danger">*</span></label>
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Masukan Email" tabindex="1" required />
                                            <?php if (form_error('email')): ?>
                                            <span class="help-block"><?= form_error('email'); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor Telepon <span class="text-danger">*</span></label>
                                            <input id="nohp" type="number" class="form-control" name="nohp" placeholder="Masukan Nomor Telepon" tabindex="1" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat <span class="text-danger">*</span></label>
                                            <input id="alamat" type="text" class="form-control" name="alamat" placeholder="Masukan Masukkan Alamat" tabindex="1" required />
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Password <span class="text-danger">*</span></label>
                                            </div>
                                            <input id="password" type="password" class="form-control" placeholder="Masukan password" name="password" tabindex="2" required />
                                            <div class="invalid-feedback">
                                                please fill in your password
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                            </div>
                                            <input id="repassword" type="password" class="form-control" placeholder="Ulangi password" name="" tabindex="2" required />
                                        </div>
                
                                        <div class="form-group">
                                            <button type="submit" id="btnSubmit" class="btn btn-success btn-lg btn-block rounded-pill" tabindex="4">
                                                REGISTER
                                            </button>
                                        </div>
                
                                        <div class="form-group text-center">
                                            <span>Sudah memiliki akun? <a href="<?= site_url('login') ?>"class="text-warning"> Login </a> </span>
                                        </div>
                
                                    </form>
                                </div>
                              </div>

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

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#password").val();
                var repassword = $("#repassword").val();
                if (password != repassword) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            });
        });
    </script>

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