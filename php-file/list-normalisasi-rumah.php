<?php
$table = <<<EOT
 (
    SELECT tbl_normalisasi_rumah.id as id,
            nama,
            tbl_normalisasi_rumah.harga,
            tbl_normalisasi_rumah.jkpk,
            tbl_normalisasi_rumah.luas_tanah,
            tbl_normalisasi_rumah.luas_bangunan,
            tbl_normalisasi_rumah.jml_kamar_tidur
    FROM tbl_normalisasi_rumah
    JOIN tbl_rumah
    ON tbl_normalisasi_rumah.id_rumah=tbl_rumah.id
 ) temp
EOT;
$primaryKey = 'id';

$columns = array(
    array( 'db' => 'id','dt' => 'id' ),
    array( 'db' => 'nama','dt' => 'nama' ),
    array( 'db' => 'jkpk','dt' => 'jkpk' ),
    array( 'db' => 'harga', 'dt' => 'harga' ),
    array( 'db' => 'luas_tanah', 'dt' => 'luas_tanah' ),
    array( 'db' => 'luas_bangunan', 'dt' => 'luas_bangunan' ),
    array( 'db' => 'jml_kamar_tidur', 'dt' => 'jml_kamar_tidur' ),
);

include 'koneksi-list.php';

include "spp.class.php";

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
?>
