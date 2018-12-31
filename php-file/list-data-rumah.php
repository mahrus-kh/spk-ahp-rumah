<?php
$sql = "SELECT tbl_rumah.id as id,
              nama,
              id_zona_alamat,
              tbl_zona_alamat.zona_alamat as zona_alamat,
              tbl_zona_alamat.jkpk as jkpk,
              alamat,
              harga,
              luas_tanah,
              luas_bangunan,
              jml_kamar_tidur,
              keterangan
        FROM tbl_rumah
        JOIN tbl_zona_alamat
        ON tbl_rumah.id_zona_alamat=tbl_zona_alamat.id";

if (isset($_GET['id_zona_alamat']) && $_GET['id_zona_alamat'] != "all" ) {
  $filter_alamat = $_GET['id_zona_alamat'];
  $sql .= " WHERE id_zona_alamat=".$filter_alamat;
}

$table = <<<EOT
 (
   $sql
 ) temp
EOT;

$primaryKey = 'id';

$columns = array(
    array( 'db' => 'id','dt' => 'id' ),
    array( 'db' => 'nama','dt' => 'nama' ),
    array( 'db' => 'id_zona_alamat','dt' => 'id_zona_alamat' ),
    array( 'db' => 'zona_alamat','dt' => 'zona_alamat' ),
    array( 'db' => 'jkpk','dt' => 'jkpk' ),
    array( 'db' => 'alamat', 'dt' => 'alamat' ),
    array( 'db' => 'harga', 'dt' => 'harga' ),
    array( 'db' => 'luas_tanah', 'dt' => 'luas_tanah' ),
    array( 'db' => 'luas_bangunan', 'dt' => 'luas_bangunan' ),
    array( 'db' => 'jml_kamar_tidur', 'dt' => 'jml_kamar_tidur' ),
    array( 'db' => 'keterangan', 'dt' => 'keterangan' ),
);

include 'koneksi-list.php';

include "spp.class.php";

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
?>
