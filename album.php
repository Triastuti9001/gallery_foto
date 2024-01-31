<?php
session_start();
if (!isset($_SESSION['UserID'])) {
    header("location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="album.php">Album</a>
                    <a class="nav-link" href="foto.php">Foto</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

</head>

<body>
    <h2 class="mt-3">Halaman Album</h2>
    <p>Selamat datang <b><?= $_SESSION['NamaLengkap'] ?></b></p>

    <form action="tambah_album.php" method="post">
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="NamaAlbum"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="Deskripsi"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>ID</td>
        <td>Nama</td>
        <td>Deskripsi</td>
        <td>Tanggal dibuat</td>
        <td>Aksi</td>
    </tr>
    <?php
    include "koneksi.php";
    $no = 1;
    $UserID = $_SESSION['UserID'];
    $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$UserID'");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['AlbumID'] ?></td>
            <td><?= $data['NamaAlbum'] ?></td>
            <td><?= $data['Deskripsi'] ?></td>
            <td><?= $data['TanggalDibuat'] ?></td>
            <td>
                <a href="edit_album.php?AlbumID=<?= $data['AlbumID'] ?>" class='btn btn-warning'>Edit</a>
                <a href="hapus_album.php?AlbumID=<?= $data['AlbumID'] ?>" class='btn btn-danger'>Hapus</a>
            </td>
        </tr>
        <?php } ?>   
</table>
</body>

</html>