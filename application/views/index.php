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
    <div class="container my-3 d-flex justify-content-center">
        <img src="<?= base_url('assets/img/ads.jpeg') ?>" alt="iklan_image" class="w-50">
    </div>

    <!-- end iklan -->

    <!-- navbar -->
    <?php
        include 'global/_navbar.php';
    ?>
    <!-- end navbar -->

    
    <div class="container">
    <!-- slider -->
    <div class="">
        <div class="row">
            <div class="col-md-8">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="<?= base_url('assets/img/slider/slider-1.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="<?= base_url('assets/img/slider/slider-2.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="<?= base_url('assets/img/slider/slider-3.jpg') ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <div class="row">
                    <div class="col-12">
                        <img src="<?= base_url('assets/img/slider/slider-2.jpg') ?>" alt="" class="d-block w-100 mb-3">
                    </div>
                    <div class="col-12">
                        <img src="<?= base_url('assets/img/slider/slider-1.jpg') ?>" alt="" class="d-block w-100 mb-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end slider -->

    <!-- content -->
        <div class="mt-5">
            <h2>Events Now</h2><div class="line"></div>
            <div class="row mt-5">
            <?php if(!empty($event)) : ?>
                <?php foreach ($event as $row) : ?>
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="hovereffect">
                            <img class="card-img-top" src="<?= base_url() ?>assets/img/flayer/<?= $row->FLAYER ?>" alt="">
                            <div class="overlay">
                                <h2><?= $row->JUDUL_ACARA ?></h2>
                                <a class="info" href="<?= site_url('detail_event/'.$row->KODE_EVENTS) ?>">Lihat</a><br/>
                                <a class="info" href="<?= site_url('daftar_event/'.$row->KODE_EVENTS) ?>">Daftar</a>
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
                <a href="<?= site_url('event_now') ?>" class="btn btn-primary btn-soft-b btn-sm"> View More </a>
            </div>
        </div>

        <div class="mt-5">
            <h2>Upcoming Events</h2><div class="line"></div>
            <div class="row mt-5">
            <?php if(!empty($upcoming)) : ?>
                <?php foreach ($upcoming as $row) : ?>
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="hovereffect">
                            <img class="card-img-top" src="<?= base_url() ?>assets/img/flayer/<?= $row->FLAYER ?>" alt="">
                            <div class="overlay">
                                <h2><?= $row->JUDUL_ACARA ?></h2><br/>
                                <a class="info" href="<?= site_url('detail_event/'.$row->KODE_EVENTS) ?>">Lihat</a>
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
                <a href="<?= site_url('upcoming') ?>" class="btn btn-primary btn-soft-b btn-sm"> View More </a>
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