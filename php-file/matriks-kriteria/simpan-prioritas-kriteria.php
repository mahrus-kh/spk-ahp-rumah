<?php
include "../koneksi.php";
$id = 1;
if ($_POST['kriteria'] == "harga") {
  $table = "tbl_prioritas_kriteria_harga";
} elseif ($_POST['kriteria'] == "jkpk") {
  $table = "tbl_prioritas_kriteria_jkpk";
} elseif ($_POST['kriteria'] == "luas_tanah") {
  $table = "tbl_prioritas_kriteria_luas_tanah";
} elseif ($_POST['kriteria'] == "luas_bangunan") {
  $table = "tbl_prioritas_kriteria_luas_bangunan";
} elseif ($_POST['kriteria'] == "jkt") {
  $table = "tbl_prioritas_kriteria_jkt";
}

$sql = "UPDATE ".$table." SET tinggi_sedang=:tinggi_sedang, tinggi_rendah=:tinggi_rendah,
        sedang_rendah=:sedang_rendah WHERE id=:id";

$save = $koneksi->prepare($sql);
$save->bindParam(':id', $id);
$save->bindParam(':tinggi_sedang', $_POST['tinggi_sedang']);
$save->bindParam(':tinggi_rendah', $_POST['tinggi_rendah']);
$save->bindParam(':sedang_rendah', $_POST['sedang_rendah']);
$save->execute();
?>
