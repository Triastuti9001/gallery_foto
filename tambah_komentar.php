<?php
include "koneksi.php";
session_start();

$FotoID = $_POST['FotoID'];
$IsiKomentar = $_POST['IsiKomentar'];
$TanggalKomentar = date('Y-m-d');
$UserID = $_SESSION['UserID'];

$sql = mysqli_query($koneksi, "insert into komentarfoto values('','$FotoID','$UserID','$IsiKomentar',
    '$TanggalKomentar')");

header("location:komentar.php?FotoID=".$FotoID);
