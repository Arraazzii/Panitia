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
            <div class="row">
                <div class="col-md-12 image-flayer">
                    <div class="rounded shadow-sm bg-white p-2 p-md-5">
                        <form action="<?= site_url('konfirmasi_pendaftaran') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kode_events" value="<?= $detail->KODE_EVENTS ?>">
                            <input type="hidden" name="id_peserta" value="<?= $profile->ID_PESERTA ?>">
                            <input type="hidden" name="harga" value="<?= $detail->HARGA ?>">
                            <div class="row">
                                <div class="col-5">
                                    <img src="<?= base_url() ?>assets/img/flayer/<?= $detail->FLAYER ?>" alt="" class="w-50 rounded">
                                </div>
                                <div class="col-7">
                                    <!-- belum dibayar -->
                                    <h3 class="mb-3">Checkout</h3>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">Nama Bank</label>
                                        <div class="col-sm-6">
                                            : <strong> <?= $detail->NAMA_BANK ?> </strong>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">No Rekening</label>
                                        <div class="col-sm-6">
                                            : <strong> <?= $detail->NOMOR_REKENING ?> </strong>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">Nama Rekening</label>
                                        <div class="col-sm-6">
                                            : <strong> <?= $detail->NAMA_REKENING ?> </strong>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">Harga</label>
                                        <div class="col-sm-6">
                                            <?php $harga = "Rp " . number_format($detail->HARGA,2,',','.'); ?>
                                            : <strong> <?= $harga ?> </strong>
                                        </div>
                                    </div>
                                    <?php if($detail->STATUS_EVENT == 'PAID'): ?>
                                        <input name="nama_bank" value="<?= $detail->NAMA_BANK ?>" type="hidden" class="form-control" required />
                                        <input name="no_rekening" value="<?= $detail->NOMOR_REKENING ?>" type="hidden" class="form-control" required />
                                        <input name="nama_rekening" value="<?= $detail->NAMA_REKENING ?>" type="hidden" class="form-control" required />
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label">Upload Pembayaran</label>
                                        <div class="col-sm-6">
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input name="bukti" type="file" class="custom-file-input" id="inputGroupFile02" required />
                                                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <hr/>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <!-- <strong class="text-danger"> Belum Dibayar </strong> <br> -->
                                            <button type="submit" class="btn btn-sm btn-success btn-done rounded mt-3"><i class="mdi mdi-upload"></i> Daftar Event</button>
                                        </div>
                                    </div>

                                    <!-- sudah dibayar -->
                                    <!-- <h3 class="mb-3">Struk Pembayaran</h3>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">Nama Bank</label>
                                        <div class="col-sm-6">
                                            : <strong> Mandiri </strong>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">No Rekening</label>
                                        <div class="col-sm-6">
                                            : <strong> 80281921992 </strong>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">Nama Rekening</label>
                                        <div class="col-sm-6">
                                            : <strong> Peserta </strong>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">Jumlah Transfer</label>
                                        <div class="col-sm-6">
                                            : <strong> Rp 200.000 </strong>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">Kode Booking/Peserta</label>
                                        <div class="col-sm-6">
                                            <strong class="text-success"> 03918319 </strong>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4">Status Pembayaran</label>
                                        <div class="col-sm-6"> -->
                                            <!-- sudah dikonfirmasi -->
                                            <!-- <strong class="text-success float-md-left"> Sudah Dibayar </strong>  -->
                                            <!-- <button class="btn btn-sm btn-success btn-done rounded float-md-right"><i class="mdi mdi-printer"></i> Cetak</button> -->

                                            <!-- belum dikonfirmasi -->
                                            <!-- <strong class="text-warning"> Proses </strong> -->
                                        <!-- </div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <div class="col-sm-8 offset-sm-2">
                                    <button class="btn btn-success btn-done"><i class="mdi mdi-send"></i> Konfirmasi Pendaftaran </button>
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>
        <!-- end content -->
            </div>
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
    <script src="../assets/datapicker/bootstrap-datepicker.js"></script>
    <script>
        $('.date').datepicker({
            uiLibrary: 'bootstrap4',
            autoclose: true,
        });
    </script>

  </body>
</html>