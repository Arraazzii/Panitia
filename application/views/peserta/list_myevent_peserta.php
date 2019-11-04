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
            <h1>My Events</h1>
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
                <div class="row">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Kode Events
                                    </th>
                                    <th>
                                        Events
                                    </th>
                                    <th>
                                        Start Date
                                    </th>
                                    <th>
                                        End Date
                                    </th>
                                    <th>
                                        Lokasi
                                    </th>
                                    <th>
                                        Status
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script type="text/javascript" src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>

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
                    "url": "<?php echo site_url('get_list_myevent_peserta')?>",
                    "type": "POST"
                },
         
                //Set column definition initialisation properties.
                "columnDefs": [
                { 
                    "targets": [0,6], 
                    "orderable": true, //set orderable
                },
                ],
         
            });
         
        });
    </script>

  </body>
</html>