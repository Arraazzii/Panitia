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
            <h1 class="float-sm-left">Tambah Events</h1>
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
                    <form action="<?= site_url('proses_tambah_event') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Judul Acara</label>
                            <div class="col-sm-6">
                            <input name="judul_acara" type="text" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Detail Acara</label>
                            <div class="col-sm-10">
                            <textarea name="detail_acara" id="editor1" rows="10" cols="80" required /></textarea> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Website</label>
                            <div class="col-sm-6">
                            <input name="website" type="url" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col-sm-6">
                            <textarea name="lokasi" rows="4" class="form-control" required /></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Jam/Tanggal Mulai</label>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <input name="waktu_mulai" type="text" class="form-control date form_datetime" aria-describedby="basic-addon2" required />
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Jam/Tanggal Akhir</label>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <input name="waktu_akhir" type="text" class="form-control date form_datetime" aria-describedby="basic-addon2" required />
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Agenda Kegiatan</label>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <!-- <?php echo form_upload('agenda'); ?> -->
                                        <input name="agenda" type="file" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>
                                </div>
                                <span>* File Agenda Berekstensi .jpg / .png / .jpeg</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nama CP</label>
                            <div class="col-sm-6">
                            <input name="nama_cp" type="text" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" required />Email</label>
                            <div class="col-sm-6">
                            <input name="email" type="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-6">
                            <input name="nohp" type="number" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Status Event</label>
                            <div class="col-sm-6">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" onclick="showHide()" value="FREE" name="status_event" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="customRadioInline1">Free</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" onclick="showHide()" value="PAID" name="status_event" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">Berbayar</label>
                                    </div>
                            </div>
                        </div>
                        <div id="berbayar" style="display: none;">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-6">
                                <input name="harga" id="rupiah" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Bank</label>
                                <div class="col-sm-6">
                                <input name="nama_bank" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Nama Rekening</label>
                                <div class="col-sm-6">
                                <input name="nama_rekening" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">No Rekening</label>
                                <div class="col-sm-6">
                                <input name="no_rekening" type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Minat</label>
                            <div class="col-sm-6">
                                <select name="id_minat" class="form-control" id="exampleFormControlSelect1" required />
                                    <?php foreach ($minat as $var): ?>
                                        <option value="<?= $var->ID_MINAT ?>"><?= $var->JUDUL ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Upload Flayer</label>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <!-- <?php echo form_upload('flayer'); ?> -->
                                        <input name="flayer" type="file" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>
                                </div>
                                <span>* File Flayer Berekstensi .jpg / .png / .jpeg</span>
                                <br><span>* Ukuran lebar x tinggi -> 600 x 1200</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 offset-sm-2">
                                <button type="submit" class="btn btn-success btn-done"><i class="mdi mdi-check"></i> Simpan </button>
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

    <!-- ckeditor -->
    <script type="text/javascript" src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace( 'editor1' );
        } );
    </script>

    <!-- Id berbayar -->
    <script type="text/javascript">
        function showHide() {
            var customRadioInline2 = document.getElementById("customRadioInline2");
            var berbayar = document.getElementById("berbayar");
            berbayar.style.display = customRadioInline2.checked ? "block" : "none";
        }
    </script>

    <!-- datepicker -->
    <script src="<?= base_url('assets/datapicker/bootstrap-datepicker.js') ?>"></script>

    <script type="text/javascript" src="<?= base_url('assets/datetimepicker/js/bootstrap-datetimepicker.js') ?>" charset="UTF-8"></script>
    <script type="text/javascript" src="<?= base_url('assets/datetimepicker/js/locales/bootstrap-datetimepicker.fr.js') ?>" charset="UTF-8"></script>
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii:ss",
            autoclose: true,
            todayBtn: true,
            pickerPosition: "bottom-left"
        });
    </script>

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