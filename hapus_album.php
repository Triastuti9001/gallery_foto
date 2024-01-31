<?php
include "koneksi.php";
session_start();

$AlbumID = $_GET['AlbumID'];

$sql = mysqli_query($koneksi, "DELETE FROM album WHERE AlbumID='$AlbumID'");

header("location:album.php");
