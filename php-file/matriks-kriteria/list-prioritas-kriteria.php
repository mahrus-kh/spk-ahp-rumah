<?php
include '../koneksi.php';

if ($_GET['kriteria'] == "harga") {
  $table = "tbl_prioritas_kriteria_harga";
} elseif ($_GET['kriteria'] == "jkpk") {
  $table = "tbl_prioritas_kriteria_jkpk";
} elseif ($_GET['kriteria'] == "luas_tanah") {
  $table = "tbl_prioritas_kriteria_luas_tanah";
} elseif ($_GET['kriteria'] == "luas_bangunan") {
  $table = "tbl_prioritas_kriteria_luas_bangunan";
} elseif ($_GET['kriteria'] == "jkt") {
  $table = "tbl_prioritas_kriteria_jkt";
}

$get = $koneksi->prepare("SELECT tinggi_sedang, tinggi_rendah, sedang_rendah FROM ".$table);
$get->execute();
$get->setFetchMode(PDO::FETCH_ASSOC);
while ($data = $get->fetch(PDO::FETCH_ORI_NEXT)) {
  echo json_encode($data);
}
?>
