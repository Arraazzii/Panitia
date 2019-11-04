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
            <img src="<?= base_url('assets/img/ads.jpeg') ?>" alt="iklan_image" class="w-50 d-none d-sm-block">
            <img src="<?= base_url('assets/img/ads.jpeg') ?>" alt="iklan_image" class="w-100 d-block d-sm-none">
        </div> -->

    <!-- end iklan -->

    <!-- navbar -->
    <?php
        include 'global/_navbar_panel.php';
    ?>
    <!-- end navbar -->
    
    <div class="patern py-3">
        <div class="container">
            <h1>Dashboard</h1>
        </div>
    </div>

    <!-- alert -->
    <?php
        include 'global/_alert.php';
    ?>
    <!-- end alert -->
    
    <div class="container">

    <!-- content -->
        <div class="mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="card shadow rounded p-3 border-0">
                        <div class="row">
                            <div class="col-4 text-center">
                                <h1><i class="mdi mdi-calendar"></i></h1>
                            </div>
                            <div class="col-8">
                                <h3><?= !empty($count_myevents)? $count_myevents:'0' ?></h3>
                                <h5>My Events</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow rounded p-3 border-0">
                        <div class="row">
                            <div class="col-4 text-center">
                                <h1><i class="mdi mdi-account-multiple-outline"></i></h1>
                            </div>
                            <div class="col-8">
                                <h3><?= !empty($count_peserta)? $count_peserta:'0' ?></h3>
                                <h5>Peserta</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow rounded p-3 border-0">
                        <div class="row">
                            <div class="col-4 text-center">
                                <h1><i class="mdi mdi-calendar-clock"></i></h1>
                            </div>
                            <div class="col-8">
                                <h3><?= !empty($count_jadwal)? $count_jadwal:'0' ?></h3>
                                <h5>Jadwal</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow rounded p-3 border-0">
                        <div class="row">
                            <div class="col-4 text-center">
                                <h1><i class="mdi mdi-cart-outline"></i></h1>
                            </div>
                            <div class="col-8">
                                <h3><?= !empty($count_invoice)? $count_invoice:'0' ?></h3>
                                <h5>Invoice</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h2>My Events</h2><div class="line"></div>
            <div class="row mt-5">
            <?php if(!empty($event)) : ?>
                <?php foreach ($event as $row) : ?>
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="hovereffect">
                            <img class="card-img-top" src="<?= base_url() ?>assets/img/flayer/<?= $row->FLAYER ?>" alt="">
                            <div class="overlay">
                                <h2><?= $row->KODE_EVENTS ?></h2>
                                <a class="info" href="<?= site_url('detail_event/'.$row->KODE_EVENTS) ?>">Lihat</a><br/>
                                <?php if ($row->STATUS == 2) : ?>
                                    <a class="info" onclick="return confirm('Are You sure you want to Activate this event?');" href="<?= site_url('aktifkan_event/'.$row->KODE_EVENTS) ?>">Aktifkan</a>
                                <?php elseif($row->STATUS == 1) : ?>
                                    <a class="info" onclick="return confirm('Are You sure you want to Non Activate this event?');" href="<?= site_url('nonaktifkan_event/'.$row->KODE_EVENTS) ?>">Non Aktifkan</a>
                                <?php elseif($row->STATUS == 0) : ?>
                                    <a class="info" href="#">Event Selesai</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-body border-0">
                            <h5 class="card-title text-center"><?= $row->JUDUL_ACARA ?></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>    
            </div>
            <div class="d-flex justify-content-center">
                <a href="<?= site_url('event_organizer/events') ?>" class="btn btn-primary btn-soft-b btn-sm"> View More </a>
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