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
    
        <div class="patern">
            
        </div>
        
        <div class="container">
    
        <!-- content -->
            <div class="row">
                <div class="col-md-3 p-3">
                    <img src="<?= base_url() ?>assets/img/flayer/<?= $detail->FLAYER ?>" alt="" class="w-100 image-flayer rounded shadow">
                </div>
                <div class="col-md-6 p-3">
                    <h1><?= $detail->JUDUL_ACARA ?></h1>
                    <p>
                        <h5>Website:</h5>
                        <h5><b><a class="link" href="<?= $detail->WEBSITE ?>"><?= $detail->WEBSITE ?></a></b></h5>
                        <h5>Peserta:</h5>
                        <h5><b><?= $count_peserta ?> Peserta</b></h5>
                        <h5>Minat:</h5>
                        <h5><b><?= $detail->JUDUL ?></b></h5>
                    </p>
                </div>
                <div class="col-md-3 p-3">
                    <h4>Jadwal Pelaksanaan</h4>
                    <p>
                        <?php
                            $mulai = date('d M Y, H:i', strtotime($detail->WAKTU_MULAI));
                            $akhir = date('d M Y, H:i', strtotime($detail->WAKTU_AKHIR));
                        ?>
                            Mulai
                            : <?= $mulai ?><br>
                            Selesai
                            : <?= $akhir ?>
                    </p>
                    <h4>Lokasi</h4>
                    <div class="row mb-3">
                        <div class="col-2">
                            <i class="mdi mdi-map-marker"></i>
                        </div>
                        <div class="col-10">
                                <?= $detail->LOKASI ?>
                        </div>
                    </div>
                    <h4>Pembayaran</h4>
                    <div class="row mb-3">
                        <div class="col-10">
                            <?php $harga = "Rp " . number_format($detail->HARGA,2,',','.'); ?>
                                Status : <?= $detail->STATUS_EVENT ?>
                                <br>
                                Harga : <?= $harga ?>
                        </div>
                    </div>
                    <?php if($detail->STATUS = 'PAID'): ?>
                    <h4>Detail Pembayaran</h4>
                    <div class="row">
                        <div class="col-10">
                                No Rekening : <?= $detail->NAMA_BANK ?>
                                <br>
                                Nama Rekening : <?= $detail->NAMA_REKENING ?>
                                <br>
                                No Rekening : <?= $detail->NOMOR_REKENING ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div><hr>
            <div class="mt-5 p-2 p-md-5 rounded shadow">
                <h2>Form Pendaftaran</h2><div class="line"></div>
                <div class="p-3">
                    <form action="<?= site_url('peserta/proses_daftar') ?>" method="POST">
                        <input type="hidden" name="kode_events" value="<?= $detail->KODE_EVENTS ?>">
                        <input type="hidden" name="id_peserta" value="<?= $profile->ID_PESERTA ?>">
                        <input type="hidden" name="harga" value="<?= $detail->HARGA ?>">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-8">
                            <input name="nama" type="text" class="form-control" disabled value="<?= $profile->NAMA ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-8">
                            <input name="email" type="email" class="form-control" disabled value="<?= $profile->EMAIL ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-8">
                            <input name="nohp" type="text" class="form-control" disabled value="<?= $profile->NOHP ?>">
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
                                <input name="tgl_lahir" value="<?= $profile->TGL_LAHIR ?>" type="text" class="form-control date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status Pernikahan</label>
                            <div class="col-sm-8">
                                <select name="status_pernikahan" class="form-control" id="exampleFormControlSelect1" required />
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
                            <label for="" class="col-sm-2 col-form-label">Minat Events</label>
                            <div class="col-sm-8">
                                <select name="id_minat" class="form-control" id="exampleFormControlSelect1" required />
                                    <option>Pilih Minat</option>
                                    <?php foreach ($minat as $var): ?>
                                        <option value="<?= $var->ID_MINAT ?>"><?= $var->JUDUL ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-2">
                                <button class="btn btn-success btn-done"><i class="mdi mdi-send"></i> Daftar </button>
                            </div>
                        </div>
                    </form>
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

    <!-- datepicker -->
    <script src="<?= base_url('assets/datapicker/bootstrap-datepicker.js') ?>"></script>
    <script>
        $('.date').datepicker({
            format: "yyyy-mm-dd",
            uiLibrary: 'bootstrap4',
            autoclose: true,
        });
    </script>

  </body>
</html>