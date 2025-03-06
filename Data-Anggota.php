<?php
include "function.php"

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- Bootstrap and CSS Link -->
    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Menyisipkan JQuery dan Javascript Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Dashboard-Style.css">

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Aplikasi Perpustakaan </a>
                    </li>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="d-flex flex-column">
            <div class="mb-4">
                <h5
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1">
                    <span>Menu</span>
                </h5>
            </div>

            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="Dashboard.php" class="sidebar-link active">
                        <i class="bi bi-house"></i>
                        <span class="link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Data-Buku.php" class="sidebar-link">
                        <i class="bi bi-person"></i>
                        <span class="link-text">Data Buku</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Data-Anggota.php" class="sidebar-link">
                        <i class="bi bi-person"></i>
                        <span class="link-text">Data Anggota</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <h1>Data Anggota</h1>
        <p>Selamat Datang di Halaman Data Anggota</p>
        <!-- Button Untuk Membuka Modal -->
        <button type="button" class="btn btn-info mb-5" data-bs-toggle="modal" data-bs-target="#TambahAnggota">
            Tambah Anggota
        </button>

        <!-- Modal Untuk Menambahkan Buku -->
        <div class="modal fade" id="TambahAnggota">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Silahkan Tambah Anggota</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <form action="Data-Anggota.php" method="POST">
                        <div class="modal-body">
                            <input type="number" class="form-control mt-2" name="id_anggota" placeholder="Id Anggota">
                            <input type="text" class="form-control mt-2" name="nama_anggota" placeholder="Nama Anggota">
                            <input type="text" class="form-control mt-2" name="alamat" placeholder="Alamat">
                            <input type="number" class="form-control mt-2" name="no_hp" placeholder="Nomor Hp">
                            <input type="file" class="form-control mt-2" name="foto" placeholder="Foto">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="TambahAnggota" class="btn btn-primary" data-bs-dismiss="modal">Tambah Anggota</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <!--Table Start -->
        <div class="card mb-4">
            <div class="card-header text-white bg-secondary">
                Data Buku
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Alamat</th>
                            <th>Nomor HP</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get = "select * from anggota";
                        $query1 = mysqli_query($koneksi, $get);
                        while ($p = mysqli_fetch_array($query1)) {
                            $id_anggota = $p['id_anggota'];
                            $nama_anggota = $p['nama_anggota'];
                            $alamat = $p['alamat'];
                            $no_hp = $p['no_hp'];
                            $foto = $p['foto'];

                        ?>
                            <tr>
                                <td><?php echo $id_anggota ?></td>
                                <td><?php echo $nama_anggota ?></td>
                                <td><?php echo $alamat ?></td>
                                <td><?php echo $no_hp ?></td>
                                <td><img src="image/anggota/<?php echo $foto; ?>" style="width:100px"></td>

                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditAnggota<?= $id_anggota ?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#HapusAnggota<?= $id_anggota ?>">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <?php
                            // Include modal dari file lain
                            include 'modal_edit_anggota.php';
                            include 'modal_hapus_anggota.php';
                            ?>





                        <?php
                        };  // End of While
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- Table End -->

    </div>


</body>


</html>

<div class="modal fade" id="edit<?= $id_produk; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Produk <?= $nama_produk; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="Produk.php">
                <div class="modal-body">
                    <input type="number" name="id_produk" class="form-control mt-2" placeholder="Id Produk" value="<?= $id_produk; ?>">
                    <input type="text" name="nama_produk" class="form-control mt-2" placeholder="NamaProduk" value="<?= $nama_produk; ?>">
                    <input type="number" name="harga_satuan" class="form-control mt-2" placeholder="Harga Satuan" value="<?= $harga_satuan; ?>">
                    <input type="number" name="stok" class="form-control mt-2" placeholder="Stok" value="<?= $stok; ?>">
                    <select name="status" class="form-control mt-2">
                        <?php
                        $sql = "SELECT DISTINCT status FROM produk";
                        $get = mysqli_query($koneksi, $sql);
                        while ($pl = mysqli_fetch_array($get)) {
                            $status = $pl['status'];
                        ?>
                            <option value="<?= $status; ?>"><?= $status; ?></option>
                        <?php };
                        ?>
                    </select>
                    <input type="file" name="foto" class="form-control mt-2" placeholder="Foto" value="<?= $foto; ?>">

                    <input type="hidden" name="idp" value="<?= $id_produk; ?>">
                </div>
                <div class="modal-footer">
                    <input type="submit" name="editbarang" value="Simpan Data" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>