<?php
include 'ahp-class.php';

$filter = "";
if (isset($_POST['id_zona_alamat']) && $_POST['id_zona_alamat'] != "all" ) {
  $filter = $_POST['id_zona_alamat'];
}

$ahp = New SpkAhp();
$ahp->truncateDatabase(); //jalan
$ahp->normalisasiMinMaxKriteria($filter); //jalan
// $satu = $ahp->generateMatriksNormalisasi($filter);
// $hasil3 = $ahp->getAndCheckMatriksSubKriteria("harga");
$hasil4 = $ahp->generateMatriksHasil($filter); //jalan

  // var_dump($hasil4);
echo json_encode($hasil4);
?>
