<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin / Petugas / User - Aplikasi Pembayaran SPP</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <h4 class="text-center"> HALAMAN LOGIN </h4>
                <div class="card">
                    <div class="card-header">
                        <img src="assets/img/login1.png" width="300px">
                    </div>
                    <div class="card-body">
                        <form action="proses-login-petugas.php" method="post">
                            <div class="form-group mb-2">
                                <label>Username</label>
                                <input type="text" name="Username" class="form-control" placeholder="Masukan username anda.." required>
                            </div>
                            <div class="form-group mb-2">
                                <label>Password</label>
                                <input type="password" name="Password" class="form-control" placeholder="Masukan password anda.." required>
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-primary"> LOGIN </button>
                            </div>
                            <div class="form-group mt-3">
                                    <label>Belum Punya Akun Silahkan Klik Tombol Berikut:</label>
                                    <a href="daftar.php" class="btn btn-warning btn-sm">Register</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>