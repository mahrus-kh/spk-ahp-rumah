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
        <div class="col-md-12 text-center hidden" id="rowLoadingProses">
          <div class="box box-default">
            <div class="box-body" style="margin-top: 150px; padding-bottom: 150px;">
              <span class="fa fa-spinner fa-spin fa-5x"></span>
              <h3>Loading Proses AHP</h3>
            </div>
          </div>
        </div>
        <div id="rowDataRumah">
          <div class=col-md-12>
            <div class="box box-default box-solid flat">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                    <h4><b><i class="fa fa-fire"></i> Proses SPK AHP</b></h4>
                  </div>
                  <div class="col-md-2">
                    <h5 class="pull-right">Zona Alamat : </h5>
                  </div>
                  <div class="col-md-3">
                     <select class="form-control" id="filterZonaAlamat">
                        <option value="all">Semua Zona Alamat</option>
                        <?php
                        include 'php-file/koneksi.php';
                        $get = $koneksi->prepare("SELECT id,zona_alamat, jkpk FROM tbl_zona_alamat");
                        $get->execute();
                        while ($data = $get->fetch(PDO::FETCH_ORI_NEXT)) { ?>
                          <option value="<?php echo $data['id'];?>"><?php echo $data['zona_alamat'];?> (<?php echo $data['jkpk'];?> KM)</option>
                        <?php
                        }
                        ?>
                      </select>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-primary btn-block" onclick="loadDataRumah()"><i class=" fa fa-eye"></i> Tampilkan</button>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-success btn-block" onclick="prosesAHP()"><i class=" fa fa-fire"></i> Proses AHP</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Data Rumah</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table id="data-rumah-datatables" class="table table-bordered table-hover" style="width: 100%;">
                    <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Zona Alamat (JkPK)</th>
                      <th>Harga (Rp.)</th>
                      <th>LT (m<sup>2</sup>)</th>
                      <th>LB (m<sup>2</sup>)</th>
                      <th>JKT</th>
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
        </div>
        <div class="hidden" id="rowMatriksHasil">
          <div class=col-md-12>
            <div class="box box-default box-solid flat">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-10">
                    <h4><b><i class="fa fa-fire"></i> Hasil Proses SPK AHP</b></h4>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-default btn-block" onclick="backToDataRumah()"><i class=" fa fa-arrow-left"></i> Kembali</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Rekomendasi 3 rumah teratas dengan total nilai tertinggi </h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover" id="tableRekomendasiRumah" style="width: 100%;">
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
                        <th>Total AHP</th>
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
          <div class="col-md-12">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Tabel Matriks Hasil</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover" id="tableMatriksHasil" style="width: 100%;">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Zona Alamat</th>
                        <th>Harga</th>
                        <th>Jarak ke Pusat Kota</th>
                        <th>Luas Tanah</th>
                        <th>Luas Bangunan</th>
                        <th>Jumlah Kamar Tidur</th>
                        <th>Total </th>
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
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Prioritas Kriteria</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table tabl-bordered table-striped table-hover" id="tablePrioritasKriteria">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Prioritas</th>
                        <th>Tinggi</th>
                        <th>Sedang</th>
                        <th>Rendah</th>
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
          <div class="col-md-6">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Tabel Normalisasi Data Rumah</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table tabl-bordered table-striped table-hover" id="tableNormalisasiRumah">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>JkPK</th>
                        <th>LT</th>
                        <th>LB</th>
                        <th>JKT</th>
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
        </div>

        <!-- /.col -->
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
  var dataRumah = {};
  $(document).ready(function () {

  });

  function prosesAHP() {
    $("#rowDataRumah, #rowMatriksHasil").addClass("hidden")
    $("#rowLoadingProses").removeClass("hidden")

    $.ajax({
      type: "POST",
      url: "algoritma-ahp/ahp-proses.php",
      data: {'id_zona_alamat': $("#filterZonaAlamat").val()},
      success: function (data) {
        // console.log(data);
        // return
        loadRekomendasiRumah()
        loadNormalisasiRumah()
        loadMatriksHasil()
        let tablePrioritas = $("#tablePrioritasKriteria tbody")
        tablePrioritas.empty()
        $.each(data, function (index, value) {
          tablePrioritas.append(
              '<tr>' +
                '<th>'+index.substr(0,1).toUpperCase()+index.substr(1)+'</th>' +
                '<td>'+value.Prioritas+'</td>' +
                '<td>'+value.Tinggi+'</td>' +
                '<td>'+value.Sedang+'</td>' +
                '<td>'+value.Rendah+'</td>' +
              '</tr>'
            )
        });

        $("#rowMatriksHasil").removeClass("hidden")
        $("#rowLoadingProses").addClass("hidden")
      },
      dataType: "JSON"
    });
  }

  function loadNormalisasiRumah() {
    $("#tableNormalisasiRumah").DataTable({
      "processing": true,
      "serverSide": true,
      "destroy": true,
      "ajax": "php-file/list-normalisasi-rumah.php",
      "columns": [
        {data: "nama"},
        {data: "harga"},
        {data: "jkpk", class: "text-center"},
        {data: "luas_tanah", class: "text-center"},
        {data: "luas_bangunan", class: "text-center"},
        {data: "jml_kamar_tidur", class: "text-center"},
      ],
    });
  }

  function loadMatriksHasil() {
    $("#tableMatriksHasil").DataTable({
      "processing": true,
      "serverSide": true,
      "order": [[ 7, "desc" ]],
      "destroy": true,
      "ajax": "php-file/list-matriks-hasil.php",
      "columns": [
        {data: "nama"},
        {data: "zona_alamat",
          render: function (zona_alamat, display, obj) {
            return zona_alamat + " (" + obj.jkpk_zona_alamat + " Km)"
          }
        },
        {data: "harga", class: "text-center"},
        {data: "jkpk", class: "text-center"},
        {data: "luas_tanah", class: "text-center"},
        {data: "luas_bangunan", class: "text-center"},
        {data: "jml_kamar_tidur", class: "text-center"},
        {data: "total", class: "text-center"},
      ],
    });
  }

  function loadRekomendasiRumah() {
    $("#tableRekomendasiRumah").DataTable({
      "processing": true,
      "serverSide": true,
      "searching": false,
      "lengthChange": false,
      "paging": false,
      "order": [[ 8, "desc" ]],
      "destroy": true,
      "ajax": "php-file/list-rekomendasi-rumah.php",
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
        {data: "keterangan", class: "text-center"},
        {data: "total", class: "text-center"},
      ],
      "columnDefs": [
        {"targets": [0,1,2,3,4,5,6,7], "orderable": false}
      ]
    });
  }

  function backToDataRumah() {
    $("#rowMatriksHasil").addClass("hidden")
    $("#rowDataRumah").removeClass("hidden")
  }

  function loadDataRumah() {
    dataRumah.table = $("#data-rumah-datatables").DataTable({
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "destroy": true,
        "ajax": {
            type: "GET",
            url: "php-file/list-data-rumah.php",
            data: {'id_zona_alamat':$("#filterZonaAlamat").val()}
        },
        "columns": [
          {data: "nama"},
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
        ],
    });
  }
  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }
</script>
</body>
</html>
