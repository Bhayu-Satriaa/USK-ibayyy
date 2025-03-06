<?php
include 'function.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/Login-Style.css" />
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="login-box">
            <div class="text-center mb-4">
                <h2>Selamat Datang Petugas</h2>
                <p>Siap Menciptakan Perpustakaan yang Lebih Baik?<br> Masuk Sekarang!
                <p>
            </div>

            <form action="Login.php" method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3" name="login">Login</button>

            </form>
        </div>
    </div>
</body>

</html>