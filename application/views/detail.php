<!doctype html>
<html lang="en">
  <head>
    <?php 
        include 'global/_css.php';
    ?>
    <title>Panitia.id</title>
  </head>
  <body>

    <!-- header -->
    <!-- iklan -->
    <!-- <div class="container my-3 d-flex justify-content-center">
        <img src="<?= base_url('assets/img/ads.jpeg') ?>" alt="iklan_image" class="w-50">
    </div> -->

    <!-- end iklan -->

    <!-- navbar -->
    <?php
        include 'global/_navbar.php';
    ?>
    <!-- end navbar -->
    
    <div class="patern">

    </div>

    <!-- alert -->
    <?php
        include 'global/_alert.php';
    ?>
    <!-- end alert -->
    
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
                <p>
                    <?php if($detail->STATUS == 1) : ?>
                        <a href="<?= site_url('daftar_event/'.$detail->KODE_EVENTS) ?>" class="btn btn-success btn-done rounded"><i class="mdi mdi-pen"></i> Daftar Sekarang</a>
                    <?php endif; ?>
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
        <div class="mt-5">
            <h2>Deskripsi</h2><div class="line"></div>
            <div class="row p-3">
                <?= $detail->DETAIL_ACARA ?>
            </div>
        </div>
        <div class="mt-5">
            <h2>Agenda</h2><div class="line"></div>
            <div class="col-md-6 p-3">
                <img src="<?= base_url() ?>assets/img/agenda/<?= $detail->AGENDA ?>" alt="" class="w-100 rounded shadow">
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