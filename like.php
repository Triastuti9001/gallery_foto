<?php
    include "koneksi.php";
    session_start();

    if (!isset($_SESSION['UserID'])) {
        //Untuk bisa like harus login dulu
        header("location:index.php")
    }else{
        $FotoID=$_GET['FotoID'];
        $UserID=$_SESSION['UserID'];
        //Cek apakah user sudah pernah like foto ini apa belum

        $sql=mysqli_query($koneksi,"SELECT COUNT(LikeID) likefoto WHERE FotoID='$FotoID' and
        UserID='$UserID'");

        if(mysqli_num_rows($sql)==1){
            //User sudah pernah like foto ini
            header("location:index.php");
        }else{
            $TanggalLike=date("Y-m-d");
            mysqli_query($koneksi,"INSERT into likefoto values('','$FotoID','$UserID','$TanggalLike')");
            header("location:index.php");
        }
    }
?>