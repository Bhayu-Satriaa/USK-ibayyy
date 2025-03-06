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
                        <a class="nav-link active" href="#">Aplikasi Perpustakaan</a>
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
        <h1>Data Buku</h1>
        <p>Selamat Datang di Halaman Data Buku Tempat Monitoring bla bla bla</p>
        <!-- Button Untuk Membuka Modal -->
        <button type="button" class="btn btn-info mb-5" data-bs-toggle="modal" data-bs-target="#TambahBuku">
            Tambah Buku
        </button>

        <!-- Modal Untuk Menambahkan Buku -->
        <div class="modal fade" id="TambahBuku">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Silahkan Tambah Buku</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <form action="Data-Buku.php" method="POST">
                        <div class="modal-body">
                            <input type="number" class="form-control mt-2" name="id_buku" placeholder="Id Buku">
                            <input type="text" class="form-control mt-2" name="judul_buku" placeholder="Judul Buku">
                            <input type="text" class="form-control mt-2" name="pencipta" placeholder="Pencipta">
                            <select name="tahun_diciptakan" id="tahun_diciptakan" class="form-control mt-2">
                                <?php
                                $tahun = date("Y");
                                ?>
                                <?php
                                for ($i = $tahun - 29; $i <= $tahun; $i++) {
                                    echo '
                                    <option value="' . $i . '">' . $i . '</option>
                                    ';
                                }
                                ?>

                            </select>
                            <input type="text" class="form-control mt-2" name="kategori" placeholder="Kategori">
                            <input type="number" class="form-control mt-2" name="stok" placeholder="Stok">
                            <input type="file" class="form-control mt-2" name="foto" placeholder="Foto">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" name="TambahBuku" class="btn btn-primary" data-bs-dismiss="modal">Tambah Buku</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Modal Untuk Menghapus Buku -->


        <!-- The Modal -->

        <!--Table Start -->
        <div class="card mb-4">
            <div class="card-header text-white bg-secondary">
                Data Buku
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id Buku</th>
                            <th>Judul</th>
                            <th>Pencipta</th>
                            <th>Tahun Diciptakan</th>
                            <th>kategori</th>
                            <th>Stok</th>
                            <th>Status</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get = "select * from buku";
                        $query1 = mysqli_query($koneksi, $get);
                        while ($p = mysqli_fetch_array($query1)) {
                            $id_buku = $p['id_buku'];
                            $judul_buku = $p['judul_buku'];
                            $pencipta = $p['pencipta'];
                            $tahun_diciptakan = $p['tahun_diciptakan'];
                            $kategori = $p['kategori'];
                            $stok = $p['stok'];
                            $status = $p['status'];
                            $foto = $p['foto'];

                        ?>
                            <tr>
                                <td><?php echo $id_buku ?></td>
                                <td><?php echo $judul_buku ?></td>
                                <td><?php echo $pencipta ?></td>
                                <td><?php echo $tahun_diciptakan ?></td>
                                <td><?php echo $kategori ?></td>
                                <td><?php echo $stok ?></td>
                                <td>
                                    <?php if ($status == 'Archive') { ?>
                                        <span class="badge text-bg-secondary"><?php echo $status ?></span>
                                    <?php } else { ?>
                                        <span class="badge text-bg-success "><?php echo $status ?></span>
                                    <?php } ?>
                                </td>
                                <td><img src="image/books/<?php echo $foto; ?>" style="width:100px"></td>

                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditBuku<?= $id_buku ?>">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#HapusBuku<?= $id_buku ?>">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <?php
                            // Include modal dari file lain
                            include 'modal_edit_buku.php';
                            include 'modal_hapus_buku.php';
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