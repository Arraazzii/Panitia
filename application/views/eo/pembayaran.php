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
            <h1>Pembayaran</h1>
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
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Pilih Event</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Event</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-left text-md-right">
                            <button class="btn btn-success btn-done print"><i class="mdi mdi-printer"></i> Cetak </button>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                        <div class="table-responsive">
                            <input type="hidden" id="kode_events" name="kode_events" value="<?= $kode ?>">
                            <table id="data-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Nama Peserta
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
                                        Bukti
                                    </th>
                                    <th>
                                        Aksi
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

    <!-- modal -->

        <!-- Modal -->
            <!-- <div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Bukti Transfer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="<?= base_url() ?>assets/img/bukti/<?= $detail->BUKTI_TRANSFER ?>" alt="">
                            <img  class="w-100 responsive" id="imagepreview" style="width: 570px; height: 264px;">
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Bukti Transfer preview</h4>
                        </div>
                        <div class="modal-body">
                            <img  id="imagepreview" class="w-100 responsive">
                            <br><br>
                            <div id="append-list"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        include 'global/_js.php';
    ?>

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
                    "url": "<?php echo site_url('get_list_pembayaran')?>",
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

    <!-- Modal Bukti Transfer -->
    <script type="text/javascript">
        $(document).on('click', '.detail',function(){
            var url = "<?= site_url('assets/img/bukti/') ?>";
            var images = $(this).data('images');
            var id = $(this).data('id');
            var uri = "<?= site_url('pembayaran/clicked_list') ?>";
            var path = url+images;
            var html = '';
             $.ajax({
                url: uri,
                type: 'POST',
                data: {id: id},
                success: function (result) {
                    if(result){
                        var data  = JSON.parse(result);
                        console.log(data);
                        
                        $('#append-list').html(html);
                        $('#imagepreview').attr('src', path);
                        $('#imagemodal').modal('show');
                    }
                }
            });        
        });
    </script>

    <!-- <script>
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
    </script> -->

  </body>
</html>