<?php
$table = <<<EOT
 (
    SELECT id, zona_alamat, jkpk
    FROM tbl_zona_alamat
 ) temp
EOT;
$primaryKey = 'id';

$columns = array(
    array( 'db' => 'id','dt' => 'id' ),
    array( 'db' => 'zona_alamat','dt' => 'zona_alamat' ),
    array( 'db' => 'jkpk','dt' => 'jkpk' ),
);

include 'koneksi-list.php';

include "spp.class.php";

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
?>
