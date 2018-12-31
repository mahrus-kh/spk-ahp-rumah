<?php
$table = <<<EOT
 (
    SELECT tbl_matriks_hasil.id as id,
            tbl_rumah.nama,
            tbl_rumah.id_zona_alamat,
            tbl_rumah.alamat,
            tbl_rumah.harga,
            tbl_rumah.luas_tanah,
            tbl_rumah.luas_bangunan,
            tbl_rumah.jml_kamar_tidur,
            tbl_rumah.keterangan,
            tbl_zona_alamat.zona_alamat,
            tbl_zona_alamat.jkpk as jkpk,
            tbl_matriks_hasil.total
    FROM tbl_matriks_hasil
    JOIN tbl_rumah
    ON tbl_matriks_hasil.id_rumah=tbl_rumah.id
    JOIN tbl_zona_alamat
    ON tbl_rumah.id_zona_alamat=tbl_zona_alamat.id
    ORDER BY tbl_matriks_hasil.total DESC LIMIT 3
 ) temp
EOT;
$primaryKey = 'id';

$columns = array(
    array( 'db' => 'id','dt' => 'id' ),
    array( 'db' => 'nama','dt' => 'nama' ),
    array( 'db' => 'id_zona_alamat','dt' => 'id_zona_alamat' ),
    array( 'db' => 'alamat','dt' => 'alamat' ),
    array( 'db' => 'harga', 'dt' => 'harga' ),
    array( 'db' => 'luas_tanah', 'dt' => 'luas_tanah' ),
    array( 'db' => 'luas_bangunan', 'dt' => 'luas_bangunan' ),
    array( 'db' => 'jml_kamar_tidur', 'dt' => 'jml_kamar_tidur' ),
    array( 'db' => 'keterangan', 'dt' => 'keterangan' ),
    array( 'db' => 'zona_alamat','dt' => 'zona_alamat' ),
    array( 'db' => 'jkpk','dt' => 'jkpk' ),
    array( 'db' => 'total', 'dt' => 'total' ),
);

include 'koneksi-list.php';

include "spp.class.php";

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
?>
