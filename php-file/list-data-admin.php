<?php
$table = <<<EOT
 (
    SELECT id, nama, username
    FROM tbl_admin
 ) temp
EOT;
$primaryKey = 'id';

$columns = array(
    array( 'db' => 'id','dt' => 'id' ),
    array( 'db' => 'nama','dt' => 'nama' ),
    array( 'db' => 'username','dt' => 'username' ),
);

include 'koneksi-list.php';

include "spp.class.php";

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
?>
