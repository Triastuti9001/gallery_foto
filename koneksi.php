<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'db_galeri');

// Check connection
if(!$koneksi) {
    echo "Koneksi database gagal";
}
?>
