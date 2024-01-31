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
    <title>Halaman Edit Album</title>
</head>

<body>
    <h1>Halaman Edit Album</h1>
    <p>Selamat datang <b><?= $_SESSION['NamaLengkap'] ?></b></p>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="update_album.php" method="post">
        <?php
        include "koneksi.php";
        $AlbumID = $_GET['AlbumID'];
        $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE AlbumID='$AlbumID'");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
        <input type="text" name="AlbumID" value="<?= $data['AlbumID'] ?>" hidden>
            <table>
                <tr>
                    <td>Nama Album</td>
                    <td><input type="text" name="NamaAlbum" value="<?= $data['NamaAlbum'] ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="Deskripsi" value="<?= $data['Deskripsi'] ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Ubah"></td>
                </tr>
            </table>
        <?php
        }
        ?>
    </form>

</body>

</html>