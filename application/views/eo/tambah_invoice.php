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
            <h1 class="float-sm-left">Tambah Invoice</h1>
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
                <div class="card border-0 rounded shadow p-5 bg-white w-100">
                    <form action="<?= site_url('proses_tambah_invoice') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Event</label>
                            <div class="col-sm-6">
                                <select name="kode_events" class="form-control" id="exampleFormControlSelect1" required />
                                    <?php foreach ($event as $var): ?>
                                        <option value="<?= $var->KODE_EVENTS ?>"><?= $var->JUDUL_ACARA ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nilai Invoice</label>
                            <div class="col-sm-6">
                            <input name="nilai_invoice" id="rupiah" type="text" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Bank</label>
                            <div class="col-sm-6">
                            <input name="nama_bank" type="text" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama Rekening</label>
                            <div class="col-sm-6">
                            <input name="nama_rekening" type="text" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No Rekening</label>
                            <div class="col-sm-6">
                            <input name="no_rekening" type="text" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Upload Invoice</label>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="invoice" type="file" class="custom-file-input" id="inputGroupFile02" required />
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 offset-sm-2">
                                <button class="btn btn-success btn-done"><i class="mdi mdi-check"></i> Simpan </button>
                            </div>
                        </div>
                    </form>
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

    <script type="text/javascript">
        var rupiah = document.getElementById("rupiah");
        rupiah.addEventListener("keyup", function(e) {
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
          var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
          }

          rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
          return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }

    </script>

  </body>
</html>