<?php
$table = <<<EOT
 (
    SELECT tbl_matriks_hasil.id as id,
            nama,
            tbl_zona_alamat.zona_alamat,
            tbl_zona_alamat.jkpk as jkpk_zona_alamat,
            tbl_matriks_hasil.harga,
            tbl_matriks_hasil.jkpk,
            tbl_matriks_hasil.luas_tanah,
            tbl_matriks_hasil.luas_bangunan,
            tbl_matriks_hasil.jml_kamar_tidur,
            tbl_matriks_hasil.total
    FROM tbl_matriks_hasil
    JOIN tbl_rumah
    ON tbl_matriks_hasil.id_rumah=tbl_rumah.id
    JOIN tbl_zona_alamat
    ON tbl_rumah.id_zona_alamat=tbl_zona_alamat.id
 ) temp
EOT;
$primaryKey = 'id';

$columns = array(
    array( 'db' => 'id','dt' => 'id' ),
    array( 'db' => 'nama','dt' => 'nama' ),
    array( 'db' => 'zona_alamat','dt' => 'zona_alamat' ),
    array( 'db' => 'jkpk_zona_alamat','dt' => 'jkpk_zona_alamat' ),
    array( 'db' => 'harga', 'dt' => 'harga' ),
    array( 'db' => 'jkpk','dt' => 'jkpk' ),
    array( 'db' => 'luas_tanah', 'dt' => 'luas_tanah' ),
    array( 'db' => 'luas_bangunan', 'dt' => 'luas_bangunan' ),
    array( 'db' => 'jml_kamar_tidur', 'dt' => 'jml_kamar_tidur' ),
    array( 'db' => 'total', 'dt' => 'total' ),
);

include 'koneksi-list.php';

include "spp.class.php";

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
?>
