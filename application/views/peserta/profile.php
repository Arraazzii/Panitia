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
        <img src="../../assets/img/ads.jpeg" alt="iklan_image" class="w-50">
    </div> -->

    <!-- end iklan -->

    <!-- navbar -->
    <?php 
        include 'global/_navbar_panel.php';
    ?>
    <!-- end navbar -->
    
        <div class="patern py-3">
        </div>

    <!-- alert -->
    <?php
        include 'global/_alert.php';
    ?>
    <!-- end alert -->
        
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
                                    <form action="<?= site_url('peserta/proses_daftar') ?>" method="POST">
                                        <input type="hidden" name="id_peserta" value="<?= $profile->ID_PESERTA ?>">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="username" readonly class="form-control-plaintext" id="" value="<?= $profile->USERNAME ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-6">
                                            <input name="nama" type="text" class="form-control" value="<?= $profile->NAMA ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-6">
                                            <input name="email" type="email" class="form-control" value="<?= $profile->EMAIL ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">No HP</label>
                                            <div class="col-sm-6">
                                            <input name="nohp" type="text" class="form-control" value="<?= $profile->NOHP ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-8">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="L" <?= ($profile->JENIS_KELAMIN == 'L')? 'checked=""':'' ?>>
                                                    <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="P" <?= ($profile->JENIS_KELAMIN == 'P')? 'checked=""':'' ?>>
                                                    <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-8">
                                                <input name="tgl_lahir" type="text" value="<?= $profile->TGL_LAHIR ?>" class="form-control date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Status Pernikahan</label>
                                            <div class="col-sm-8">
                                                <select name="status_pernikahan" class="form-control" id="exampleFormControlSelect1">
                                                    <option value="<?= $profile->STATUS_PERNIKAHAN ?>" selected=""><?= $profile->STATUS_PERNIKAHAN ?></option>
                                                    <option value="Menikah">Menikah</option>
                                                    <option value="Single">Single</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-8">
                                                <select name="pekerjaan" class="form-control" id="exampleFormControlSelect1">
                                                    <option value="<?= $profile->PEKERJAAN ?>" selected=""><?= $profile->PEKERJAAN ?></option>
                                                    <option value="ASN">ASN</option>
                                                    <option value="Karyawan">Karyawan</option>
                                                    <option value="TNI/POLRI">TNI/POLRI</option>
                                                    <option value="Guru/Dosen">Guru/Dosen</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Penghasilan</label>
                                            <div class="col-sm-8">
                                                <select name="pendapatan" class="form-control" id="exampleFormControlSelect1">
                                                    <option value="<?= $profile->PENDAPATAN ?>" selected=""><?= $profile->PENDAPATAN ?></option>
                                                    <option value=" < Rp 2.500.000">< Rp 2.500.000</option>
                                                    <option value="Rp 2.500.000 - Rp 5.000.000">Rp 2.500.000 - Rp 5.000.000</option>
                                                    <option value="Rp 5.000.000 - Rp 10.000.000">Rp 5.000.000 - Rp 10.000.000</option>
                                                    <option value="Rp 10.000.000 - Rp 25.000.000">Rp 10.000.000 - Rp 25.000.000</option>
                                                    <option value=" > Rp 2.500.000"> > Rp 2.500.000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 offset-sm-2">
                                                <button type="submit" value="update_profile" name="profile" class="btn btn-success btn-done"><i class="mdi mdi-check"></i> Simpan </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="tab-pane fade p-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <form method="POST" action="<?= site_url('ubah_password') ?>">
                                        <input type="hidden" name="id_peserta" value="<?= $profile->ID_PESERTA ?>">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Password Lama</label>
                                            <div class="col-sm-6">
                                            <input name="pw_lama" type="password" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Password Baru</label>
                                            <div class="col-sm-6">
                                            <input name="pw_baru" id="pw_baru" type="password" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                            <div class="col-sm-6">
                                            <input name="retype" id="retype" type="password" class="form-control" required />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 offset-sm-2">
                                                <button type="submit" name="pass" value="peserta" id="btnSubmit" class="btn btn-success btn-done"><i class="mdi mdi-check"></i> Simpan </button>
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

    <!-- Konfirmasi Password -->
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

    <!-- datepicker -->
    <script src="<?= site_url('assets/datapicker/bootstrap-datepicker.js') ?>"></script>
    <script>
        $('.date').datepicker({
            uiLibrary: 'bootstrap4',
            autoclose: true,
        });
    </script>

  </body>
</html>