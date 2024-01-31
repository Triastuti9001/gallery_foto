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
    <title>Halaman Komentar</title>
</head>

<body>
    <h1>Halaman Komentar</h1>
    <p>Selamat datang <b><?= $_SESSION['NamaLengkap'] ?></b></p>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="tambah_komentar.php" method="post">
        <?php
        include "koneksi.php";
        $FotoID = $_GET['FotoID'];
        $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE FotoID='$FotoID'");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <input type="text" name="FotoID" value="<?= $data['FotoID'] ?>" hidden>
            <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="JudulFoto" value="<?= $data['JudulFoto'] ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="DeskripsiFoto" value="<?= $data['DeskripsiFoto'] ?>"></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><img src="gambar/<?= $data['LokasiFile'] ?>" width="100px"></td>
                </tr>
                <tr>
                    <td>Komentar</td>
                    <td><input type="text" name="IsiKomentar" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah"></td>
                </tr>
            </table>
        <?php
        }
        ?>
    </form>

    <table width="100%" border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
    <?php
        include "koneksi.php";
        $UserID = $_SESSION['UserID'];
        $sql = mysqli_query($koneksi, "SELECT * FROM komentarfoto,user WHERE komentarfoto.UserID=user.UserID");
        while ($data = mysqli_fetch_array($sql)) {
    ?>
        <tr>
            <td><?=$data['KomentarID']?></td>
            <td><?=$data['NamaLengkap']?></td>
            <td><?=$data['IsiKomentar']?></td>
            <td><?=$data['TanggalKomentar']?></td>

        </tr>

    <?php
        }
    ?>
    </table>
</body>

</html>