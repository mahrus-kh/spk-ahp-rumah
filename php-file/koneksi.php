<?php
try {
    $koneksi = New PDO ("mysql:host=localhost;dbname=spk_ahp","root","root");
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
