<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
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
    <h2 class="mt-3">Halaman Landing</h2>
    <?php
    session_start();
    if (!isset($_SESSION['UserID'])) {
    ?>
        <ul>
            <li><a href="daftar.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>

    <?php
        }else{
    ?>
        <p>Selamat datang <b><?= $_SESSION['NamaLengkap'] ?></b></p>
    <?php
    }
    ?>

    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
            <th>Jumlah Like</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        $sql = mysqli_query($koneksi, "SELECT * FROM foto,user WHERE foto.UserID=user.UserID");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?= $data['FotoID'] ?></td>
                <td><?= $data['JudulFoto'] ?></td>
                <td><?= $data['DeskripsiFoto'] ?></td>
                <td><img src="gambar/<?= $data['LokasiFile'] ?>" width="100px"></td>
                <td><?= $data['NamaLengkap'] ?></td>
                <td>
                    <?php
                    $FotoID = $data['FotoID'];
                    $sql2 = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID='$FotoID'");
                    echo mysqli_num_rows($sql);
                    ?>
                </td>
                <td>
                    <a href="like.php?FotoID=<?= $data['FotoID'] ?>">Like</a>
                    <a href="komentar.php?FotoID=<?= $data['FotoID'] ?>">Komentar</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>