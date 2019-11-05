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
            <h1 class="float-sm-left">Invoice</h1>
            <a href="<?= site_url('event_organizer/add_invoice') ?>" class="btn rounded-100 btn-primary btn-soft-b float-sm-right"><i class="mdi mdi-plus"></i> Tambah Invoice </a>
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
            <div class="shadow rounded p-5 bg-white">
                <!-- <div class="mb-5">
                    <button class="btn btn-success btn-done print"><i class="mdi mdi-printer"></i> Cetak </button>
                </div> -->
                <div class="row">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>
                                        Kode Event
                                    </th>
                                    <th>
                                        Nilai
                                    </th>
                                    <th>
                                        Bank
                                    </th>
                                    <th>
                                        No Rek
                                    </th>
                                    <th>
                                        Nama Rek
                                    </th>
                                    <th>
                                        Invoice
                                    </th>
                                    <th>
                                        Tanggal
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            </table>
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

    <!-- Data Tables -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script>
        var table;
 
        $(document).ready(function() {
         
            //datatables
            table = $('#data-table').DataTable({ 
         
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
         
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('get_list_invoice')?>",
                    "type": "POST"
                },
         
                //Set column definition initialisation properties.
                "columnDefs": [
                { 
                    "targets": [0,3,4,5,6], 
                    "orderable": true, //set orderable
                },
                ],
         
            });
         
        });
    </script>

  </body>
</html>