<?php
include "koneksi.php";
$sql = "INSERT INTO tbl_rumah (id_zona_alamat, nama, alamat, harga, luas_tanah, luas_bangunan, jml_kamar_tidur, keterangan)
        VALUES (:id_zona_alamat,:nama, :alamat, :harga, :luas_tanah, :luas_bangunan, :jml_kamar_tidur, :keterangan)";
$save = $koneksi->prepare($sql);
$save->bindParam(':id_zona_alamat', $_POST['id_zona_alamat']);
$save->bindParam(':nama', $_POST['nama']);
$save->bindParam(':alamat', $_POST['alamat']);
$save->bindParam(':harga', $_POST['harga']);
$save->bindParam(':luas_tanah', $_POST['luas_tanah']);
$save->bindParam(':luas_bangunan', $_POST['luas_bangunan']);
$save->bindParam(':jml_kamar_tidur', $_POST['jml_kamar_tidur']);
$save->bindParam(':keterangan', $_POST['keterangan']);
$save->execute();
// echo $save;
?>
