<?php
include "koneksi.php";
$edit = $koneksi->prepare("UPDATE tbl_admin SET nama=:nama,username=:username WHERE id=:id");
$edit->bindParam(':id', $_POST['id']);
$edit->bindParam(':nama', $_POST['nama']);
$edit->bindParam(':username', $_POST['username']);
$edit->execute();
?>
