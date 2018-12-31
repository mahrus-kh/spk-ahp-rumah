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
  <style media="screen">
    input.form-control {
      text-align: center;
    }
  </style>
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
              <h3 class="box-title">Matriks Prioritas Kriteria</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form id="formPrioritasKriteria">
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" style="width: 100%;">
                  <thead>
                  </thead>
                    <tbody>
                      <tr>
                        <td class="warning">Kriteria</td>
                        <td class="text-center">Harga</td>
                        <td class="text-center">Jarak ke Pusat Kota</td>
                        <td class="text-center">Luas Tanah</td>
                        <td class="text-center">Luas Bangunan</td>
                        <td class="text-center">Jumlah Kamar Tidur</td>
                      </tr>
                      <tr>
                        <td>Harga</td>
                        <td class="text-center warning">1</td>
                        <td class="text-center"> <input type="number" name="harga_jkpk" id="harga-jkpk" class="form-control" min="1"></td>
                        <td class="text-center"> <input type="number" name="harga_luas_tanah" id="harga-luas_tanah" class="form-control" min="1"></td>
                        <td class="text-center"> <input type="number" name="harga_luas_bangunan" id="harga-luas_bangunan" class="form-control" min="1"></td>
                        <td class="text-center"> <input type="number" name="harga_jkt" id="harga-jkt" class="form-control" min="1"></td>
                      </tr>
                      <tr>
                        <td>Jarak ke Pusat Kota</td>
                        <td class="text-center"><input type="number" id="jkpk-harga" class="form-control" readonly></td>
                        <td class="text-center warning">1</td>
                        <td class="text-center"><input type="number" name="jkpk_luas_tanah" id="jkpk-luas_tanah" class="form-control" min="1"></td>
                        <td class="text-center"><input type="number" name="jkpk_luas_bangunan" id="jkpk-luas_bangunan" class="form-control" min="1"></td>
                        <td class="text-center"><input type="number" name="jkpk_jkt" id="jkpk-jkt" class="form-control" min="1"></td>
                      </tr>
                      <tr>
                        <td>Luas Tanah</td>
                        <td class="text-center"><input type="number" id="luas_tanah-harga" class="form-control" readonly></td>
                        <td class="text-center"><input type="number" id="luas_tanah-jkpk" class="form-control" readonly></td>
                        <td class="text-center warning">1</td>
                        <td class="text-center"><input type="number" name="luas_tanah_luas_bangunan" id="luas_tanah-luas_bangunan" class="form-control" min="1"> </td>
                        <td class="text-center"><input type="number" name="luas_tanah_jkt" id="luas_tanah-jkt" class="form-control" min="1"></td>
                      </tr>
                      <tr>
                        <td>Luas Bangunan</td>
                        <td class="text-center"><input type="number" id="luas_bangunan-harga" class="form-control" readonly></td>
                        <td class="text-center"><input type="number" id="luas_bangunan-jkpk" class="form-control" readonly></td>
                        <td class="text-center"><input type="number" id="luas_bangunan-luas_tanah" class="form-control" readonly></td>
                        <td class="text-center warning">1</td>
                        <td class="text-center"><input type="number" name="luas_bangunan_jkt" id="luas_bangunan-jkt" class="form-control" min="1"></td>
                      </tr>
                      <tr>
                        <td>Jumlah Kamar Tidur</td>
                        <td class="text-center"><input type="number" id="jkt-harga" class="form-control" readonly></td>
                        <td class="text-center"><input type="number" id="jkt-jkpk" class="form-control" readonly></td>
                        <td class="text-center"><input type="number" id="jkt-luas_tanah" class="form-control" readonly></td>
                        <td class="text-center"><input type="number" id="jkt-luas_bangunan" class="form-control" readonly></td>
                        <td class="text-center warning">1</td>
                      </tr>
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" class="btn btn-primary pull-right" id="updateMatriksPrioritas">Simpan</button>
              <button type="button" class="btn btn-default pull-left" onclick="loadMatriksPrioritas()">Reset</button>
            </div>
            </form>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Prioritas Kriteria Harga</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form id="formPrioritasKriteriaHarga">
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" style="width: 100=;">
                  <thead>
                  </thead>
                    <tbody>
                      <tr>
                        <td class="warning"></td>
                        <td class="text-center">Tinggi</td>
                        <td class="text-center">Sedang</td>
                        <td class="text-center">Rendah</td>
                      </tr>
                      <tr>
                        <td class="text-center">Tinggi</td>
                        <td class="text-center warning">1</td>
                        <td class="text-center"><input type="number" name="tinggi_sedang" id="tinggi-sedang" class="form-control" min="1"></td>
                        <td class="text-center"><input type="number" name="tinggi_rendah" id="tinggi-rendah" class="form-control" min="1"></td>
                      </tr>
                      <tr>
                        <td class="text-center">Sedang</td>
                        <td class="text-center"><input type="number" id="sedang-tinggi" class="form-control" readonly></td>
                        <td class="text-center warning">1</td>
                        <td class="text-center"><input type="number" name="sedang_rendah" id="sedang-rendah" class="form-control" min="1"></td>
                      </tr>
                      <tr>
                        <td class="text-center">Rendah</td>
                        <td class="text-center"><input type="number" id="rendah-tinggi" class="form-control" readonly></td>
                        <td class="text-center"><input type="number" id="rendah-sedang" class="form-control" readonly></td>
                        <td class="text-center warning">1</td>
                      </tr>
                    </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" class="btn btn-primary pull-right updatePrioritasKriteria">Simpan</button>
              <button type="button" class="btn btn-default pull-left" onclick="loadPrioritasKriteria('formPrioritasKriteriaHarga', 'harga')">Reset</button>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Prioritas Kriteria Jarak ke Pusat Kota</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form id="formPrioritasKriteriaJKPK">
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" style="width: 100%;">
                  <thead>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="warning"></td>
                      <td class="text-center">Tinggi</td>
                      <td class="text-center">Sedang</td>
                      <td class="text-center">Rendah</td>
                    </tr>
                    <tr>
                      <td class="text-center">Tinggi</td>
                      <td class="text-center warning">1</td>
                      <td class="text-center"><input type="number" name="tinggi_sedang" id="tinggi-sedang" class="form-control" min="1"></td>
                      <td class="text-center"><input type="number" name="tinggi_rendah" id="tinggi-rendah" class="form-control" min="1"></td>
                    </tr>
                    <tr>
                      <td class="text-center">Sedang</td>
                      <td class="text-center"><input type="number" id="sedang-tinggi" class="form-control" readonly></td>
                      <td class="text-center warning">1</td>
                      <td class="text-center"><input type="number" name="sedang_rendah" id="sedang-rendah" class="form-control" min="1"></td>
                    </tr>
                    <tr>
                      <td class="text-center">Rendah</td>
                      <td class="text-center"><input type="number" id="rendah-tinggi" class="form-control" readonly></td>
                      <td class="text-center"><input type="number" id="rendah-sedang" class="form-control" readonly></td>
                      <td class="text-center warning">1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" class="btn btn-primary pull-right updatePrioritasKriteria">Simpan</button>
              <button type="button" class="btn btn-default pull-left" onclick="loadPrioritasKriteria('formPrioritasKriteriaJKPK', 'jkpk')">Reset</button>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Prioritas Kriteria Luas Tanah</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form id="formPrioritasKriteriaLuasTanah">
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" style="width: 100%;">
                  <thead>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="warning"></td>
                      <td class="text-center">Tinggi</td>
                      <td class="text-center">Sedang</td>
                      <td class="text-center">Rendah</td>
                    </tr>
                    <tr>
                      <td class="text-center">Tinggi</td>
                      <td class="text-center warning">1</td>
                      <td class="text-center"><input type="number" name="tinggi_sedang" id="tinggi-sedang" class="form-control" min="1"></td>
                      <td class="text-center"><input type="number" name="tinggi_rendah" id="tinggi-rendah" class="form-control" min="1"></td>
                    </tr>
                    <tr>
                      <td class="text-center">Sedang</td>
                      <td class="text-center"><input type="number" id="sedang-tinggi" class="form-control" readonly></td>
                      <td class="text-center warning">1</td>
                      <td class="text-center"><input type="number" name="sedang_rendah" id="sedang-rendah" class="form-control" min="1"></td>
                    </tr>
                    <tr>
                      <td class="text-center">Rendah</td>
                      <td class="text-center"><input type="number" id="rendah-tinggi" class="form-control" readonly></td>
                      <td class="text-center"><input type="number" id="rendah-sedang" class="form-control" readonly></td>
                      <td class="text-center warning">1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" class="btn btn-primary pull-right updatePrioritasKriteria">Simpan</button>
              <button type="button" class="btn btn-default pull-left" onclick="loadPrioritasKriteria('formPrioritasKriteriaLuasTanah', 'luas_tanah')">Reset</button>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Prioritas Kriteria Luas Bangunan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form id="formPrioritasKriteriaLuasBangunan">
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" style="width: 100%;">
                  <thead>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="warning"></td>
                      <td class="text-center">Tinggi</td>
                      <td class="text-center">Sedang</td>
                      <td class="text-center">Rendah</td>
                    </tr>
                    <tr>
                      <td class="text-center">Tinggi</td>
                      <td class="text-center warning">1</td>
                      <td class="text-center"><input type="number" name="tinggi_sedang" id="tinggi-sedang" class="form-control" min="1"></td>
                      <td class="text-center"><input type="number" name="tinggi_rendah" id="tinggi-rendah" class="form-control" min="1"></td>
                    </tr>
                    <tr>
                      <td class="text-center">Sedang</td>
                      <td class="text-center"><input type="number" id="sedang-tinggi" class="form-control" readonly></td>
                      <td class="text-center warning">1</td>
                      <td class="text-center"><input type="number" name="sedang_rendah" id="sedang-rendah" class="form-control" min="1"></td>
                    </tr>
                    <tr>
                      <td class="text-center">Rendah</td>
                      <td class="text-center"><input type="number" id="rendah-tinggi" class="form-control" readonly></td>
                      <td class="text-center"><input type="number" id="rendah-sedang" class="form-control" readonly></td>
                      <td class="text-center warning">1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" class="btn btn-primary pull-right updatePrioritasKriteria">Simpan</button>
              <button type="button" class="btn btn-default pull-left" onclick="loadPrioritasKriteria('formPrioritasKriteriaLuasBangunan', 'luas_bangunan')">Reset</button>
            </div>
            </form>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Prioritas Kriteria Jumlah Kamar Tidur</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <form id="formPrioritasKriteriaJKT">
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" style="width: 100%;">
                  <thead>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="warning"></td>
                      <td class="text-center">Tinggi</td>
                      <td class="text-center">Sedang</td>
                      <td class="text-center">Rendah</td>
                    </tr>
                    <tr>
                      <td class="text-center">Tinggi</td>
                      <td class="text-center warning">1</td>
                      <td class="text-center"><input type="number" name="tinggi_sedang" id="tinggi-sedang" class="form-control" min="1"></td>
                      <td class="text-center"><input type="number" name="tinggi_rendah" id="tinggi-rendah" class="form-control" min="1"></td>
                    </tr>
                    <tr>
                      <td class="text-center">Sedang</td>
                      <td class="text-center"><input type="number" id="sedang-tinggi" class="form-control" readonly></td>
                      <td class="text-center warning">1</td>
                      <td class="text-center"><input type="number" name="sedang_rendah" id="sedang-rendah" class="form-control" min="1"></td>
                    </tr>
                    <tr>
                      <td class="text-center">Rendah</td>
                      <td class="text-center"><input type="number" id="rendah-tinggi" class="form-control" readonly></td>
                      <td class="text-center"><input type="number" id="rendah-sedang" class="form-control" readonly></td>
                      <td class="text-center warning">1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="button" class="btn btn-primary pull-right updatePrioritasKriteria">Simpan</button>
              <button type="button" class="btn btn-default pull-left" onclick="loadPrioritasKriteria('formPrioritasKriteriaJKT', 'jkt')">Reset</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
$(document).ready(function () {
  loadMatriksPrioritas()
  loadPrioritasKriteria("formPrioritasKriteriaHarga", "harga")
  loadPrioritasKriteria("formPrioritasKriteriaJKPK", "jkpk")
  loadPrioritasKriteria("formPrioritasKriteriaLuasTanah", "luas_tanah")
  loadPrioritasKriteria("formPrioritasKriteriaLuasBangunan", "luas_bangunan")
  loadPrioritasKriteria("formPrioritasKriteriaJKT", "jkt")

  $('input').on('keyup click', function () {
    let value = this.value
    if (value == '' || value <= 0) {
      value = 1
    }
    let tableId = $(this).parents('form').attr('id')
    fillInputMatriks(this.id, value, tableId)
  });

  $("#updateMatriksPrioritas").click(function () {
    let self = $(this)
    let current_text = self.html()
    self.html('<i class="fa fa-spinner fa-spin"></i>').attr('disabled', true)
    $.ajax({
      type: "POST",
      url: "php-file/matriks-kriteria/simpan-matriks-prioritas.php",
      data: $("#formPrioritasKriteria").serialize(),
      success: function (data) {
        alert("Berhasil Simpan Matriks Kriteria !")
        self.html("Simpan").attr('disabled', false)
        loadMatriksPrioritas()
      },
      error: function (error) {
        self.html("Simpan").attr('disabled', false)
        loadMatriksPrioritas()
      }
    });
  });

  $('.updatePrioritasKriteria').click(function () {
    let self = $(this)
    let current_text = self.html()
    let tableId = self.parents('form').attr('id')
    let kriteria = getKriteria(tableId)
    self.html('<i class="fa fa-spinner fa-spin"></i>').attr('disabled', true)

    $.ajax({
      type: "POST",
      url: "php-file/matriks-kriteria/simpan-prioritas-kriteria.php",
      data: $("#"+tableId).serialize()+"&kriteria="+kriteria,
      success: function (data) {
        alert("Berhasil Simpan Prioritas Kriteria "+kriteria.charAt(0).toUpperCase()+kriteria.slice(1) + " !")
        self.html("Simpan").attr('disabled', false)
        loadPrioritasKriteria(tableId, kriteria)
      },
      error: function (error) {
        self.html("Simpan").attr('disabled', false)
        loadPrioritasKriteria(tableId, kriteria)
      }
    });
  })
});

function loadMatriksPrioritas() {
  let tableId = "formPrioritasKriteria"
  $.ajax({
    type: "GET",
    url: "php-file/matriks-kriteria/list-matriks-kriteria.php",
    success: function (data) {
      // console.log(data);
      $("#harga-jkpk").val(data.harga_jkpk)
      fillInputMatriks("harga-jkpk", data.harga_jkpk  , tableId)
      $("#harga-luas_tanah").val(data.harga_luas_tanah)
      fillInputMatriks("harga-luas_tanah", data.harga_luas_tanah, tableId)
      $("#harga-luas_bangunan").val(data.harga_luas_bangunan)
      fillInputMatriks("harga-luas_bangunan", data.harga_luas_bangunan, tableId)
      $("#harga-jkt").val(data.harga_jkt)
      fillInputMatriks("harga-jkt", data.harga_jkt, tableId)
      $("#jkpk-luas_tanah").val(data.jkpk_luas_tanah)
      fillInputMatriks("jkpk-luas_tanah", data.jkpk_luas_tanah, tableId)
      $("#jkpk-luas_bangunan").val(data.jkpk_luas_bangunan)
      fillInputMatriks("jkpk-luas_bangunan", data.jkpk_luas_bangunan, tableId)
      $("#jkpk-jkt").val(data.jkpk_jkt)
      fillInputMatriks("jkpk-jkt", data.jkpk_jkt, tableId)
      $("#luas_tanah-luas_bangunan").val(data.luas_tanah_luas_bangunan)
      fillInputMatriks("luas_tanah-luas_bangunan", data.luas_tanah_luas_bangunan, tableId)
      $("#luas_tanah-jkt").val(data.luas_tanah_jkt)
      fillInputMatriks("luas_tanah-jkt", data.luas_tanah_jkt, tableId)
      $("#luas_bangunan-jkt").val(data.luas_bangunan_jkt)
      fillInputMatriks("luas_bangunan-jkt", data.luas_bangunan_jkt, tableId)
    },
    dataType: "JSON"
  });
}

function loadPrioritasKriteria(tableId, kriteria) {
  $.ajax({
    type: "GET",
    url: "php-file/matriks-kriteria/list-prioritas-kriteria.php",
    data: {'kriteria': kriteria},
    success: function (data) {
      $("#"+tableId).find('#tinggi-sedang').val(data.tinggi_sedang)
      fillInputMatriks('tinggi-sedang', data.tinggi_sedang, tableId)
      $("#"+tableId).find('#tinggi-rendah').val(data.tinggi_rendah)
      fillInputMatriks('tinggi-rendah', data.tinggi_rendah, tableId)
      $("#"+tableId).find('#sedang-rendah').val(data.sedang_rendah)
      fillInputMatriks('sedang-rendah', data.sedang_rendah, tableId)
    },
    dataType: "JSON"
  });
}

function fillInputMatriks(selector, value, tableId='') {
  let new_selector = selector.split('-')
  new_selector = "#" + new_selector[1] + '-' + new_selector[0]
  let new_value = parseFloat(1/value).toFixed(2)
  $("#"+tableId).find(new_selector).val(new_value)
}

function getKriteria(tableId) {
  let kriteria = ''
  if (tableId == "formPrioritasKriteriaHarga") {
    kriteria = "harga"
  } else if (tableId == "formPrioritasKriteriaJKPK") {
    kriteria = "jkpk"
  } else if (tableId == "formPrioritasKriteriaLuasTanah") {
    kriteria = "luas_tanah"
  } else if (tableId == "formPrioritasKriteriaLuasBangunan") {
    kriteria = "luas_bangunan"
  } else if (tableId == "formPrioritasKriteriaJKT") {
    kriteria = "jkt"
  }
  return kriteria
}
</script>
</body>
</html>
