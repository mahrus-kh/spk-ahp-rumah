<?php
include "koneksi.php";
$del = $koneksi->prepare("DELETE FROM tbl_rumah WHERE id=:id");
$del->bindParam(':id', $_POST['id']);
$del->execute();
?>
