<?php
include "koneksi.php";
session_start();

$FotoID = $_GET['FotoID'];

$sql = mysqli_query($koneksi, "DELETE FROM foto WHERE FotoID='$FotoID'");

header("location:foto.php");
