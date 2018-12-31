<?php
include "koneksi.php";
$sql = "UPDATE tbl_rumah SET id_zona_alamat=:id_zona_alamat,nama=:nama,alamat=:alamat,harga=:harga,luas_tanah=:luas_tanah,
        luas_bangunan=:luas_bangunan, jml_kamar_tidur=:jml_kamar_tidur, keterangan=:keterangan
        WHERE id=:id";
$edit = $koneksi->prepare($sql);
$edit->bindParam(':id', $_POST['id']);
$edit->bindParam(':id_zona_alamat', $_POST['id_zona_alamat']);
$edit->bindParam(':nama', $_POST['nama']);
$edit->bindParam(':alamat', $_POST['alamat']);
$edit->bindParam(':harga', $_POST['harga']);
$edit->bindParam(':luas_tanah', $_POST['luas_tanah']);
$edit->bindParam(':luas_bangunan', $_POST['luas_bangunan']);
$edit->bindParam(':jml_kamar_tidur', $_POST['jml_kamar_tidur']);
$edit->bindParam(':keterangan', $_POST['keterangan']);
$edit->execute();
?>
