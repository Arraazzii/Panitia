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
    
    <div class="patern">

    </div>

    <!-- alert -->
    <?php
        include 'global/_alert.php';
    ?>
    <!-- end alert -->
    
    <div class="container">

    <!-- content -->
        <div class="mt-5">
            <h2>Events Now</h2><div class="line"></div>
            <div class="row mt-5">
            <?php if(!empty($results)) : ?>
                <?php foreach ($results as $row) : ?>
                <div class="col-md-3 col-6">
                    <div class="card border-0">
                        <div class="hovereffect">
                            <img class="card-img-top" src="<?= base_url() ?>assets/img/flayer/<?= $row->FLAYER ?>" alt="">
                            <!-- <div class="overlay">
                                <h2><?= $row->JUDUL_ACARA ?></h2>
                                <a class="info" href="<?= site_url('detail_event/'.$row->KODE_EVENTS) ?>">Lihat</a>
                                <br/>
                                <a class="info" href="<?= site_url('daftar_event/'.$row->KODE_EVENTS) ?>">Daftar</a>
                            </div> -->
                        </div>
                        <div class="card-body border-0">
                            <a class="nav-link" href="<?= site_url('detail_event/'.$row->KODE_EVENTS) ?>"><h5 class="card-title text-center"><?= $row->JUDUL_ACARA ?></h5></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>    
            </div>
            <div class="d-flex justify-content-center mt-5">
                <nav aria-label="Page navigation example">
                    <?php
                        if (isset($links)) {
                            echo $links;
                        }
                    ?>
                </nav>
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