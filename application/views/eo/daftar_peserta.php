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
            <h1><?= $detail->JUDUL_ACARA ?></h1>
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
                <div class="mb-5">
                    <h3>Daftar Peserta</h3>
                </div>
                <div class="mb-5">
                    <button class="btn btn-success btn-done print"><i class="mdi mdi-printer"></i> Cetak </button>
                </div>
                <div class="row">
                        <div class="table-responsive">
                            <input type="hidden" id="kode_events" name="kode_events" value="<?= $kode ?>">
                            <table border="1" cellpadding="3" cellspacing="0" id="data-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Nama Peserta
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        No HP
                                    </th>
                                    <th>
                                        Events
                                    </th>
                                    <th>
                                        Kehadiran
                                    </th>
                                    <!-- <th>
                                        Aksi
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
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

    <script>
        function printData()
        {
            var divToPrint=document.getElementById("data-table");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }

        $('.print').on('click',function(){
            printData();
        })
    </script>

    <!-- Data Tables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script>
        var table;
        var kode_events = $('#kode_events').val();
 
        $(document).ready(function() {
         
            //datatables
            table = $('#data-table').DataTable({ 
         
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
         
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('get_list_daftar')?>",
                    "type": "POST",
                    "data": {
                        "kode_events" : kode_events
                    }
                },
         
                //Set column definition initialisation properties.
                "columnDefs": [
                { 
                    "targets": [0,5], 
                    "orderable": true, //set orderable
                },
                ],
         
            });
         
        });
    </script>

  </body>
</html>