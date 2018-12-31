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
              <h3 class="box-title">Data Administrator</h3>
              <button type="button" class="btn btn-primary btn-sm pull-right" onclick="tambahAdmin()"><i class="fa fa-plus"></i> Tambah Admin</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="admin-datatables" class="table table-bordered table-hover" style="width: 100%;">
                  <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Username</th>
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
  <div class="modal fade" id="modal-data-admin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><div id="title-modal-admin"></div> </h4>
      </div>
      <div class="modal-body">
        <form id="formDataAdmin">
          <div class="form-group">
            <label for="">Nama : </label>
            <input type="text" name="nama" id="nama" class="form-control" maxlength="255">
          </div>
          <div class="form-group">
            <label for="">Username : </label>
              <input type="text" name="username" id="username" class="form-control" maxlength="255">
          </div>
          <div class="form-group" id="form-password">
            <label for="">Password : </label>
              <input type="password" name="password" class="form-control" maxlength="255">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnSimpanAdmin" onclick="simpanDataAdmin()">Simpan</button>
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
  var dataAdmin = {};
  $(document).ready(function () {
    dataAdmin.table = $("#admin-datatables").DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "php-file/list-data-admin.php",
      "columns": [
        {data: "nama"},
        {data: "username", class: "text-center"},
        {data: "id", class: "text-center",
          render: function (id) {
            return '<button type="button" class="btn btn-success btn-xs edit-data-admin" value="'+id+'"><i class="fa fa-edit"></i></button>' +
              ' <button type="button" class="btn btn-danger btn-xs hapus-data-admin" value="'+id+'"><i class="fa fa-trash"></i></button>'
          }
        },
      ],
    });

    $('#admin-datatables tbody').on( 'click', 'td', function () {
     let data = dataAdmin.table.row($(this).parents('tr')).data()
     detaildataAdmin(data)
    });

    $('#admin-datatables tbody').on( 'click', 'button.hapus-data-admin', function (e) {
      e.stopPropagation()
      if (confirm("Hapus Data Admin ?")) {
        $.ajax({
          type: "POST",
          url: "php-file/hapus-data-admin.php",
          data: {'id':$(this).val()},
          success: function (data) {
            dataAdmin.table.ajax.reload()
          }
        });
      }
    });

    $('#admin-datatables tbody').on( 'click', 'button.edit-data-admin', function (e) {
      e.stopPropagation()
      dataAdmin.action = "edit"
      dataAdmin.idActiveUpdate = $(this).val()
      $("#title-modal-admin").text("Edit Data Admin")
      $("#btnSimpanAdmin").removeClass('hidden').text('Update')
      $("#formDataAdmin")[0].reset()
      $("#formDataAdmin input").attr('readonly', false)
      $("#form-password").addClass("hidden")

      let data = dataAdmin.table.row($(this).parents('tr')).data()
      $("#nama").val(data.nama)
      $("#username").val(data.username)
      $("#modal-data-admin").modal("show")
    });
  });

  function detaildataAdmin(data) {
    $("#title-modal-admin").text("Detail Admin")
    $("#btnSimpanAdmin").addClass('hidden')
    $("#nama").val(data.nama)
    $("#username").val(data.username)
    $("#formDataAdmin input").attr('readonly', true)
    $("#form-password").addClass("hidden")
    $("#modal-data-admin").modal("show")
  }

  function tambahAdmin() {
    dataAdmin.action = "add"
    $("#title-modal-admin").text("Tambah Admin")
    $("#btnSimpanAdmin").removeClass('hidden').text('Simpan')
    $("#formDataAdmin")[0].reset()
    $("#formDataAdmin input").attr('readonly', false)
    $("#form-password").removeClass("hidden").attr('disabled', false)
    $("#modal-data-admin").modal("show")
  }

  function simpanDataAdmin() {
    if (dataAdmin.action == "add") {
      $.ajax({
        type: "POST",
        url: "php-file/simpan-data-admin.php",
        data: $("#formDataAdmin").serialize(),
        success: function (data) {
          $("#modal-data-admin").modal("hide")
          dataAdmin.table.ajax.reload()
        }
      });
    } else if (dataAdmin.action == "edit") {
      $.ajax({
        type: "POST",
        url: "php-file/edit-data-admin.php",
        data: $("#formDataAdmin").serialize() + "&id=" + dataAdmin.idActiveUpdate,
        success: function (data) {
          $("#formDataAdmin")[0].reset()
          $("#modal-data-admin").modal("hide")
          dataAdmin.table.ajax.reload()
        }
      });
    }
  }
</script>
</body>
</html>
