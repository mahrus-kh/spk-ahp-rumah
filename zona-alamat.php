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
        <div class="col-md-7">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Data Zona Alamat</h3>
              <button type="button" class="btn btn-primary btn-sm pull-right" onclick="tambahDataZAlamat()"><i class="fa fa-plus"></i> Tambah Zona Alamat</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responmsive">
                <table id="zona-alamat-datatables" class="table table-bordered table-hover" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>Zona Alamat</th>
                    <th>Jarak ke Pusat Kota (KM)</th>
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
  <div class="modal fade" id="modal-zona-rumah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><div id="title-modal-zona-rumah"></div> </h4>
      </div>
      <div class="modal-body">
        <form id="formZonaRumah">
          <div class="form-group">
            <label for="">Zona Alamat : </label>
            <input type="text" name="zona_alamat" id="zona_alamat" class="form-control" maxlength="255">
          </div>
          <div class="form-group">
            <label for="">Jarak ke Pusat Kota : </label>
            <div class="input-group">
              <input type="number" name="jkpk" id="jkpk" class="form-control" min="0" required>
              <span class="input-group-addon">Km</span>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnSimpanZonaRumah" onclick="simpanDataRumah()">Simpan</button>
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
  var ZAlamat = {};
  $(document).ready(function () {
    ZAlamat.table = $("#zona-alamat-datatables").DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "php-file/list-zona-alamat.php",
      "columns": [
        {data: "zona_alamat"},
        {data: "jkpk", class: "text-center"},
        {data: "id", class: "text-center",
          render: function (id) {
            return '<button type="button" class="btn btn-success btn-xs edit-zona-alamat" value="'+id+'"><i class="fa fa-edit"></i></button>' +
            ' <button type="button" class="btn btn-danger btn-xs hapus-zona-alamat" value="'+id+'"><i class="fa fa-trash"></i></button>'
          }
        },
      ],
    });

    $('#zona-alamat-datatables tbody').on( 'click', 'td', function () {
     let data = ZAlamat.table.row($(this).parents('tr')).data()
     detailZAlamat(data)
    });

    $('#zona-alamat-datatables tbody').on( 'click', 'button.hapus-zona-alamat', function (e) {
      e.stopPropagation()
      if (confirm("Hapus Zona Alamat ? (Juga menghapus data rumah dengan zona alamat tersebut !)")) {
        $.ajax({
          type: "POST",
          url: "php-file/hapus-zona-alamat.php",
          data: {'id':$(this).val()},
          success: function (data) {
            ZAlamat.table.ajax.reload()
          }
        });
      }
    });

    $('#zona-alamat-datatables tbody').on( 'click', 'button.edit-zona-alamat', function (e) {
      e.stopPropagation()
      ZAlamat.action = "edit"
      ZAlamat.idActiveUpdate = $(this).val()
      $("#title-modal-zona-rumah").text("Edit Zona Alamat")
      $("#btnSimpanZonaRumah").removeClass('hidden').text('Update')
      $("#formZonaRumah")[0].reset()
      $("#formZonaRumah input").attr('readonly', false)

      let data = ZAlamat.table.row($(this).parents('tr')).data()
      $("#zona_alamat").val(data.zona_alamat)
      $("#jkpk").val(data.jkpk)
      $("#modal-zona-rumah").modal("show")
    });
  });

  function detailZAlamat(data) {
    $("#title-modal-zona-rumah").text("Detail Zona Alamat")
    $("#btnSimpanZonaRumah").addClass('hidden')
    $("#zona_alamat").val(data.zona_alamat)
    $("#jkpk").val(data.jkpk)
    $("#formZonaRumah input").attr('readonly', true)
    $("#modal-zona-rumah").modal("show")
  }

  function tambahDataZAlamat() {
    ZAlamat.action = "add"
    $("#title-modal-zona-rumah").text("Tambah Zona Alamat")
    $("#btnSimpanZonaRumah").removeClass('hidden').text('Simpan')
    $("#formZonaRumah")[0].reset()
    $("#formZonaRumah input").attr('readonly', false)
    $("#modal-zona-rumah").modal("show")
  }

  function simpanDataRumah() {
    if (ZAlamat.action == "add") {
      $.ajax({
        type: "POST",
        url: "php-file/simpan-zona-alamat.php",
        data: $("#formZonaRumah").serialize(),
        success: function (data) {
          $("#modal-zona-rumah").modal("hide")
          ZAlamat.table.ajax.reload()
        }
      });
    } else if (ZAlamat.action == "edit") {
      $.ajax({
        type: "POST",
        url: "php-file/edit-zona-alamat.php",
        data: $("#formZonaRumah").serialize() + "&id=" + ZAlamat.idActiveUpdate,
        success: function (data) {
          $("#formZonaRumah")[0].reset()
          $("#modal-zona-rumah").modal("hide")
          ZAlamat.table.ajax.reload()
        }
      });
    }
  }
</script>
</body>
</html>
