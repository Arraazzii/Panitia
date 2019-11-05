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
            <h1 class="float-sm-left">My Events</h1>
            <a href="<?= site_url('event_organizer/add_events') ?>" class="btn rounded-100 btn-primary btn-soft-b float-sm-right"><i class="mdi mdi-plus"></i> Tambah Event </a>
        </div>
    </div>

    <!-- alert -->
    <?php
        include 'global/_alert.php';
    ?>
    <!-- end alert -->
    
    <div class="container">

    <!-- content -->
            <div class="row mt-5">
            <?php if(!empty($results)) : ?>
                <?php foreach ($results as $row) : ?>
                <div class="col-md-3 col-6">
                    <div class="card mb-3">
                        <div class="hovereffect">
                            <img class="card-img-top" src="<?= base_url() ?>assets/img/flayer/<?= $row->FLAYER ?>" alt="">
                            <div class="overlay">
                                <h2><?= $row->KODE_EVENTS ?></h2>
                                <a class="info" href="<?= site_url('detail_event/'.$row->KODE_EVENTS) ?>">Lihat</a><br/>
                                <!-- <?php if ($row->STATUS == 2) : ?>
                                    <a class="info" onclick="return confirm('Are You sure you want to Activate this event?');" href="<?= site_url('aktifkan_event/'.$row->KODE_EVENTS) ?>">Aktifkan</a>
                                <?php elseif($row->STATUS == 1) : ?>
                                    <a class="info" onclick="return confirm('Are You sure you want to Non Activate this event?');" href="<?= site_url('nonaktifkan_event/'.$row->KODE_EVENTS) ?>">Non Aktifkan</a>
                                <?php elseif($row->STATUS == 0) : ?>
                                    <a class="info" href="#">Event Selesai</a>
                                <?php endif; ?> -->
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title text-center"><?= $row->JUDUL_ACARA ?></h5>
                            <a href="<?= site_url('edit_event/'.$row->KODE_EVENTS) ?>" class="btn btn-primary btn-sm"><i class="mdi mdi-pen"></i> Edit</a>
                            <a  onclick="return confirm('Are You sure you want to Delete this event?');" href="<?= site_url('delete_event/'.$row->KODE_EVENTS) ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i> Hapus</a>
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