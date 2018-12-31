<?php
include '../koneksi.php';
$sql = "SELECT harga_jkpk, harga_luas_tanah, harga_luas_bangunan, harga_jkt, jkpk_luas_tanah, jkpk_luas_bangunan,
        jkpk_jkt, luas_tanah_luas_bangunan, luas_tanah_jkt, luas_bangunan_jkt FROM tbl_matriks_prioritas";
$get = $koneksi->prepare($sql);
$get->execute();
$get->setFetchMode(PDO::FETCH_ASSOC);
while ($data = $get->fetch(PDO::FETCH_ORI_NEXT)) {
  echo json_encode($data);
}
?>
