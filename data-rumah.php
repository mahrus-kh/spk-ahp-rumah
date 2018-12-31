<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPK AHP Rumah</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/lte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/lte/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/lte/dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'php-file/cek-session.php'?>
  <?php include "include/main-header.php"?>
  <?php include "include/sidebar.php"?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>Data Rumah</h1>
    </section> -->

    <!--Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Data Rumah</h3>
              <button type="button" class="btn btn-primary btn-sm pull-right" onclick="tambahDataRumah()"><i class="fa fa-plus"></i> Tambah Rumah</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="data-rumah-datatables" class="table table-bordered table-hover" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Zona Alamat (JkPK)</th>
                    <th>Harga (Rp.)</th>
                    <th>LT (m<sup>2</sup>)</th>
                    <th>LB (m<sup>2</sup>)</th>
                    <th>JKT</th>
                    <th>Keterangan</th>
                    <th>Tools</th>
                  </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="modal-data-rumah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><div id="title-modal-data-rumah"></div> </h4>
      </div>
      <div class="modal-body">
        <form id="formDataRumah">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama : </label>
                <input type="text" name="nama" id="nama" class="form-control" maxlength="255" required>
              </div>
              <div class="form-group">
                <label for="">Alamat : </label>
                <textarea name="alamat" id="alamat" rows="2" class="form-control"></textarea required>
              </div>
              <div class="form-group">
                <label for="">Keterangan : </label>
                <textarea name="keterangan" id="keterangan" rows="2" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Zona Alamat (Jarak ke Pusat Kota) : </label>
                <select class="form-control" name="id_zona_alamat" id="id_zona_alamat" required>
                  <?php
                  include 'php-file/koneksi.php';
                  $a = $koneksi->prepare("SELECT id, zona_alamat, jkpk FROM tbl_zona_alamat");
                  $a->execute();
                  $a->setFetchMode(PDO::FETCH_ASSOC);
                  while ($data = $a->fetch(PDO::FETCH_ORI_NEXT)) { ?>
                    <option value="<?php echo $data['id']?>"><?php echo $data['zona_alamat'] . " (" . $data['jkpk'] . " KM)"?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Harga : </label>
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                  <input type="number" name="harga" id="harga" class="form-control" min="0" required>
                </div>
              </div>
              <div class="form-group">
                <label for="">Luas Tanah : </label>
                <div class="input-group">
                  <input type="number" name="luas_tanah" id="luas_tanah" class="form-control" min="0" required>
                  <span class="input-group-addon">m<sup>2</sup></span>
                </div>
              </div>
              <div class="form-group">
                <label for="">Luas Bangunan : </label>
                <div class="input-group">
                  <input type="number" name="luas_bangunan" id="luas_bangunan" class="form-control" min="0" required>
                  <span class="input-group-addon">m<sup>2</sup></span>
                </div>
              </div>
              <div class="form-group">
                <label for="">Jumlah Kamar Tidur : </label>
                <input type="number" name="jml_kamar_tidur" id="jml_kamar_tidur" class="form-control" min="0" required>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnSimpanDataRumah" onclick="simpanDataRumah()">Simpan</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
  <?php include 'include/footer.php';?>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="assets/lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/lte/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/lte/dist/js/app.min.js"></script>
<script src="include/modify.js"></script>
<!-- page script -->
<script type="text/javascript">
  var dataRumah = {};
  $(document).ready(function () {
    dataRumah.table = $("#data-rumah-datatables").DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "php-file/list-data-rumah.php",
      "columns": [
        {data: "nama"},
        {data: "alamat"},
        {data: "zona_alamat",
          render: function (zona_alamat, display, obj) {
            return zona_alamat + " (" + obj.jkpk + " Km)"
          }
        },
        {data: "harga",
          render: function (harga) {
            return numberWithCommas(harga)
          }
        },
        {data: "luas_tanah", class: "text-center"},
        {data: "luas_bangunan", class: "text-center"},
        {data: "jml_kamar_tidur", class: "text-center"},
        {data: "keterangan"},
        {data: "id", class: "text-center",
          render: function (id) {
            return '<button type="button" class="btn btn-success btn-xs edit-data-rumah" value="'+id+'"><i class="fa fa-edit"></i></button>' +
            ' <button type="button" class="btn btn-danger btn-xs hapus-data-rumah" value="'+id+'"><i class="fa fa-trash"></i></button>'
          }
        },
      ],
      "columnDefs": [
        {"targets": [8], "orderable": false}
      ]
    });

    $('#data-rumah-datatables tbody').on( 'click', 'td', function () {
     let data = dataRumah.table.row($(this).parents('tr')).data()
     detaildataRumah(data)
    });

    $('#data-rumah-datatables tbody').on( 'click', 'button.hapus-data-rumah', function (e) {
      e.stopPropagation()
      if (confirm("Hapus Data Rumah ?")) {
        $.ajax({
          type: "POST",
          url: "php-file/hapus-data-rumah.php",
          data: {'id':$(this).val()},
          success: function (data) {
            dataRumah.table.ajax.reload()
          }
        });
      }
    });

    $('#data-rumah-datatables tbody').on( 'click', 'button.edit-data-rumah', function (e) {
      e.stopPropagation()
      dataRumah.action = "edit"
      dataRumah.idActiveUpdate = $(this).val()
      $("#title-modal-data-rumah").text("Edit Data Rumah")
      $("#btnSimpanDataRumah").removeClass('hidden').text('Update')
      $("#formDataRumah")[0].reset()
      $("#formDataRumah input, textarea").attr('readonly', false)
      $("#formDataRumah select").attr('disabled', false)

      let data = dataRumah.table.row($(this).parents('tr')).data()

      $("#nama").val(data.nama)
      $("#alamat").val(data.alamat)
      $("#id_zona_alamat").val(data.id_zona_alamat)
      $("#harga").val(data.harga)
      $("#luas_tanah").val(data.luas_tanah)
      $("#luas_bangunan").val(data.luas_bangunan)
      $("#jml_kamar_tidur").val(data.jml_kamar_tidur)
      $("#keterangan").val(data.keterangan)
      $("#modal-data-rumah").modal("show")
    });

  });

  function detaildataRumah(data) {
    $("#title-modal-data-rumah").text("Detail Data Rumah")
    $("#btnSimpanDataRumah").addClass('hidden')
    $("#nama").val(data.nama)
    $("#alamat").val(data.alamat)
    $("#id_zona_alamat").val(data.id_zona_alamat)
    $("#harga").val(data.harga)
    $("#luas_tanah").val(data.luas_tanah)
    $("#luas_bangunan").val(data.luas_bangunan)
    $("#jml_kamar_tidur").val(data.jml_kamar_tidur)
    $("#keterangan").val(data.keterangan)
    $("#formDataRumah input, textarea").attr('readonly', true)
    $("#formDataRumah select").attr('disabled', true)
    $("#modal-data-rumah").modal("show")
  }

  function tambahDataRumah() {
    dataRumah.action = "add"
    $("#title-modal-data-rumah").text("Tambah Data Rumah")
    $("#btnSimpanDataRumah").removeClass('hidden').text('Simpan')
    $("#formDataRumah")[0].reset()
    $("#formDataRumah input, textarea").attr('readonly', false)
    $("#formDataRumah select").attr('disabled', false)
    $("#modal-data-rumah").modal("show")
  }

  function simpanDataRumah() {
    if (dataRumah.action == "add") {
      $.ajax({
        type: "POST",
        url: "php-file/simpan-data-rumah.php",
        data: $("#formDataRumah").serialize(),
        success: function (data) {
          $("#modal-data-rumah").modal("hide")
          dataRumah.table.ajax.reload()
        }
      });
    } else if (dataRumah.action == "edit") {
      $.ajax({
        type: "POST",
        url: "php-file/edit-data-rumah.php",
        data: $("#formDataRumah").serialize() + "&id=" + dataRumah.idActiveUpdate,
        success: function (data) {
          $("#formDataRumah")[0].reset()
          $("#modal-data-rumah").modal("hide")
          dataRumah.table.ajax.reload()
        }
      });
    }
  }

  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }
</script>
</body>
</html>
