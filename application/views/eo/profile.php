<!doctype html>
<html lang="en">
  <head>
    <?php 
        include 'global/_css_panel.php';
    ?>
    <title>Panitia.id</title>
  </head>
  <body>

    <!-- header -->
    <!-- iklan -->
    <!-- <div class="container my-3 d-flex justify-content-center">
        <img src="../assets/img/ads.jpeg" alt="iklan_image" class="w-50">
    </div> -->

    <!-- end iklan -->

    <!-- navbar -->
    <?php
        include 'global/_navbar_panel.php';
    ?>
    <!-- end navbar -->
    
    <div class="patern py-3">
        <div class="container">
            <h1 class="float-sm-left">Profile</h1>
        </div>
    </div>
    
    <div class="container">

    <!-- content -->
        <div class="mt-5">
            <div class="shadow rounded p-3 bg-white">
                <div class="row">

                    <div class="col-md-4 text-center">
                        <div class="row justify-content-center">
                            <img class="rounded-circle w-50" src="../assets/img/auth/face1.jpg" alt="foto profil">
                        </div>
                        <!-- <div class="media-body mt-3 text-center">
                            <span class="btn btn-success btn-sm btn-file">
                               <i class="mdi mdi-camera"></i> Ganti Foto <input type="file">
                            </span><br>
                            <small class="text-black-50">
                                Ukuran: 128 x 128px.
                                Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG
                            </small>
                        </div> -->
                    </div>

                    <div class="col-md-8 p-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ubah Password</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active p-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <form action="<?= site_url('update_profile') ?>" method="POST">
                                    <input type="hidden" name="id_eo" value="<?= $profile->ID_EO ?>">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly class="form-control-plaintext" id="" value="<?= $profile->USERNAME ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Nama EO</label>
                                        <div class="col-sm-6">
                                        <input name="nama_eo" type="text" class="form-control" value="<?= $profile->NAMA_EO ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-6">
                                        <textarea name="alamat" rows="4" class="form-control"><?= $profile->ALAMAT ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Nama CP</label>
                                        <div class="col-sm-6">
                                        <input name="nama_cp" type="text" class="form-control" value="<?= $profile->NAMA_CP ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-6">
                                        <input disabled type="email" name="email" class="form-control" value="<?= $profile->EMAIL ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">No HP</label>
                                        <div class="col-sm-6">
                                        <input name="nohp" type="text" class="form-control" value="<?= $profile->NOHP ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 offset-sm-2">
                                            <button value="update_profile" name="profile" class="btn btn-success btn-done"><i class="mdi mdi-check"></i> Simpan </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade p-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <form method="POST" action="<?= site_url('ubah_password') ?>">
                                    <input type="hidden" name="id_eo" value="<?= $profile->ID_EO ?>">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Password Lama</label>
                                        <div class="col-sm-6">
                                        <input name="pw_lama" type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Password Baru</label>
                                        <div class="col-sm-6">
                                        <input name="pw_baru" id="pw_baru" type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-6">
                                        <input name="retype" id="retype" type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 offset-sm-2">
                                            <button id="btnSubmit" class="btn btn-success btn-done"><i class="mdi mdi-check"></i> Simpan </button>
                                        </div>
                                    </div>
                                </form>
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
                var password = $("#pw_baru").val();
                var repassword = $("#retype").val();
                if (password != repassword) {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            });
        });
    </script>

  </body>
</html>