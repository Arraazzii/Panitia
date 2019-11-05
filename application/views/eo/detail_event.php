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
        <img src="<?= base_url('assets/img/ads.jpeg') ?>" alt="iklan_image" class="w-50">
    </div> -->

    <!-- end iklan -->

    <!-- navbar -->
    <?php
        include 'global/_navbar_panel.php';
    ?>
    <!-- end navbar -->

    <!-- alert -->
    <?php
        include 'global/_alert.php';
    ?>
    <!-- end alert -->
    
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
                <!-- <p>
                    <a href="<?= site_url('daftar_peserta/'.$detail->KODE_EVENTS) ?>" class="btn btn-info btn-md"><i class="mdi mdi-eye"></i> Daftar Peserta</a>
                    <a href="<?= site_url('event_organizer/pembayaran/'.$detail->KODE_EVENTS) ?>" class="btn btn-success btn-md"><i class="mdi mdi-check"></i> Konfirmasi Pendaftaran</a>
                </p> -->
                <p>
                    <h5>Status Event</h5>
                    <?php if ($detail->STATUS == 2) : ?>
                        <a class="btn btn-success btn-md" onclick="return confirm('Are You sure you want to Activate this event?');" href="<?= site_url('aktifkan_event/'.$detail->KODE_EVENTS) ?>">Aktifkan</a>
                    <?php elseif($detail->STATUS == 1) : ?>
                        <a class="btn btn-danger btn-md" onclick="return confirm('Are You sure you want to Non Activate this event?');" href="<?= site_url('nonaktifkan_event/'.$detail->KODE_EVENTS) ?>">Non Aktifkan</a>
                    <?php elseif($detail->STATUS == 0) : ?>
                        <button class="btn btn-light btn-md">Event Selesai</button>
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

  </body>
</html>