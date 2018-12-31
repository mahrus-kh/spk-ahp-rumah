<?php
include "koneksi.php";
$save = $koneksi->prepare("INSERT INTO tbl_zona_alamat (zona_alamat, jkpk) VALUES (:zona_alamat,:jkpk)");
$save->bindParam(':zona_alamat', $_POST['zona_alamat']);
$save->bindParam(':jkpk', $_POST['jkpk']);
$save->execute();
// echo $save;
?>
