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
          <div class="box box-default flat">
            <div class="box-body text-center">
              <h2>Sistem Pendukung Keputusan Pemilihan Rumah di Malang</h2>
              <h2>Dengan Metode AHP (Analytic Hierarchy Process)</h2>
              <br><br>
              <img src="assets/image/logo-asia.png" style="height: 250px;">
              <br><br>
              <h4>Oleh </h4>
              <h4>Andy Wahyu Hartato (14201125)</h4>
              <br><br><br><br>
              <h4>PROGRAM STUDI TEKNIK INFORMATIKA</h4>
              <h4>SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER ASIAMALANG</h4>
              <h4>2019</h4>
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
</body>
</html>
