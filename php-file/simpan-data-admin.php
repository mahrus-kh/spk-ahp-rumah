<?php
include "koneksi.php";
$password = md5($_POST['password']);
$save = $koneksi->prepare("INSERT INTO tbl_admin (nama, username, password) VALUES (:nama,:username,:password)");
$save->bindParam(':nama', $_POST['nama']);
$save->bindParam(':username', $_POST['username']);
$save->bindParam(':password', $password);
$save->execute();
// echo $save;
?>
