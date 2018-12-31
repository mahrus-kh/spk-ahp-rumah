<?php
include "../koneksi.php";
$id = 1;
$sql = "UPDATE tbl_matriks_prioritas SET harga_jkpk=:harga_jkpk, harga_luas_tanah=:harga_luas_tanah,
        harga_luas_bangunan=:harga_luas_bangunan, harga_jkt=:harga_jkt, jkpk_luas_tanah=:jkpk_luas_tanah,
        jkpk_luas_bangunan=:jkpk_luas_bangunan, jkpk_jkt=:jkpk_jkt, luas_tanah_luas_bangunan=:luas_tanah_luas_bangunan,
        luas_tanah_jkt=:luas_tanah_jkt, luas_bangunan_jkt=:luas_bangunan_jkt WHERE id=:id";

$save = $koneksi->prepare($sql);
$save->bindParam(':id', $id);
$save->bindParam(':harga_jkpk', $_POST['harga_jkpk']);
$save->bindParam(':harga_luas_tanah', $_POST['harga_luas_tanah']);
$save->bindParam(':harga_luas_bangunan', $_POST['harga_luas_bangunan']);
$save->bindParam(':harga_jkt', $_POST['harga_jkt']);
$save->bindParam(':jkpk_luas_tanah', $_POST['jkpk_luas_tanah']);
$save->bindParam(':jkpk_luas_bangunan', $_POST['jkpk_luas_bangunan']);
$save->bindParam(':jkpk_jkt', $_POST['jkpk_jkt']);
$save->bindParam(':luas_tanah_luas_bangunan', $_POST['luas_tanah_luas_bangunan']);
$save->bindParam(':luas_tanah_jkt', $_POST['luas_tanah_jkt']);
$save->bindParam(':luas_bangunan_jkt', $_POST['luas_bangunan_jkt']);
$save->execute();
?>
