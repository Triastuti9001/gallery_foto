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
    <title>Halaman Foto</title>
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
    <h2 class="mt-3">Halaman Foto</h2>
    <p>Selamat datang <b><?= $_SESSION['NamaLengkap'] ?></b></p>

    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="JudulFoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="DeskripsiFoto"></td>
            </tr>
            <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="LokasiFile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="AlbumID">
                    <?php
                        include "koneksi.php";
                        $UserID = $_SESSION['UserID'];
                        $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$UserID'");
                        while ($data = mysqli_fetch_array($sql)) {
                    ?>
                            <option value="<?=$data['AlbumID']?>"><?=$data['NamaAlbum']?></option>
                    <?php
                        }
                    ?>
                    </select>

                </td>
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
        <td>Judul</td>
        <td>Deskripsi</td>
        <td>Tanggal Unggah</td>
        <td>Lokasi File</td>
        <td>Album</td>
        <td>DIsukai</td>
        <td>Aksi</td>
    </tr>
    <?php
    include "koneksi.php";
    $no = 1;
    $UserID = $_SESSION['UserID'];
    $sql = mysqli_query($koneksi, "SELECT * FROM foto,album WHERE foto.UserID='$UserID' and foto.AlbumID=album.AlbumID");
    while ($data = mysqli_fetch_array($sql)) {
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['FotoID'] ?></td>
            <td><?= $data['Deskripsi'] ?></td>
            <td><?= $data['JudulFoto'] ?></td>
            <td><?= $data['TanggalUnggah'] ?></td>
            <td>
                <img src="gambar/<?= $data['LokasiFile']?>" width="100px">
            </td>
            <td><?= $data['NamaAlbum'] ?></td>
            <td>
                <?php
                    $FotoID = $data['FotoID'];
                    $sql2 = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID='$FotoID'");
                    echo mysqli_num_rows($sql);
                ?>
                <td>
                <a href="edit_foto.php?FotoID=<?= $data['FotoID'] ?>" class='btn btn-warning'>Edit</a>
                <a href="hapus_foto.php?FotoID=<?= $data['FotoID'] ?>" class='btn btn-danger'>Hapus</a>
            </td>
        </tr>
        <?php } ?>   
</table>
</body>

</html>