<?php
include "koneksi.php";
session_start();

$JudulFoto = $_POST['JudulFoto'];
$DeskripsiFoto = $_POST['DeskripsiFoto'];
$AlbumID = $_POST['AlbumID'];

//Jika Upload gambar baru
if ($_FILES['LokasiFile']['name'] != "") {
    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['LokasiFile']['name'];
    $ukuran = $_FILES['LokasiFile']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        header("location:foto.php");
    } else {
        if ($ukuran < 1044070) {
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['LokasiFile']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
            mysqli_query($koneksi, "UPDATE foto SET JudulFoto='$JudulFoto',
            DeskripsiFoto='$DeskripsiFoto',LokasiFile='$xx',AlbumID='$AlbumID'");
            header("location:foto.php");
        } else {
            header("location:foto.php");
        }
    }
} else {
        mysqli_query($koneksi, "UPDATE foto SET JudulFoto='$JudulFoto',
        DeskripsiFoto='$DeskripsiFoto',AlbumID='$AlbumID'");
        header("location:foto.php");
}

?>