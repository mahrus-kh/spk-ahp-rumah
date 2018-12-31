<?php
include "koneksi.php";
$edit = $koneksi->prepare("UPDATE tbl_zona_alamat SET zona_alamat=:zona_alamat,jkpk=:jkpk WHERE id=:id");
$edit->bindParam(':id', $_POST['id']);
$edit->bindParam(':zona_alamat', $_POST['zona_alamat']);
$edit->bindParam(':jkpk', $_POST['jkpk']);
$edit->execute();
?>
