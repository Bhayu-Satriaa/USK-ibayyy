<?php
session_start();
include 'function.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <!-- Bootstrap and CSS Link -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <!-- Menyisipkan JQuery dan Javascript Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="Dashboard-Style.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            Aplikasi Perpustakaan
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
          <a href="Dashboard-Pengunjung.php" class="sidebar-link">
            <i class="bi bi-person"></i>
            <span class="link-text">Pinjam Buku</span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <!-- Content -->
  <div class="content">
    <h1>Data Buku</h1>
    <p>Selamat Datang di Halaman Data Buku</p>
    <!--Table Start -->
    <div class="card mb-4">
      <div class="card-header text-white bg-secondary">
        Data Buku
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Judul Buku</th>
              <th>Pencipta</th>
              <th>Tahun Diciptakan</th>
              <th>kategori</th>
              <th>Status</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Gunakan kondisi WHERE untuk menampilkan buku yang hanya mempunyai status Available
            $get = "select * from buku where status = 'Available'";
            $query1 = mysqli_query($koneksi, $get);
            while ($p = mysqli_fetch_array($query1)) {
              $judul_buku = $p['judul_buku'];
              $pencipta = $p['pencipta'];
              $tahun_diciptakan = $p['tahun_diciptakan'];
              $status = $p['status'];
              $kategori = $p['kategori'];
              $foto = $p['foto'];

            ?>
              <tr>
                <td><?php echo $judul_buku ?></td>
                <td><?php echo $pencipta ?></td>
                <td><?php echo $tahun_diciptakan ?></td>
                <td><?php echo $kategori ?></td>
                <td>
                  <!-- Gunakan Perulangan Untuk Menentukan Warna Status. jika Status Buku Arvhice maka akan berwarna abu abu, jika tidak akan berwarna hijau  -->
                  <?php if ($status == 'Archive') { ?>
                    <span class="badge text-bg-secondary"><?php echo $status ?></span>
                  <?php } else { ?>
                    <span class="badge text-bg-success "><?php echo $status ?></span>
                  <?php } ?>
                </td>

                <td><img src="image/books/<?php echo $foto; ?>" style="width:100px"></td>
                <td>
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#PinjamBuku">
                    Pinjam Buku
                  </button>
                </td>
              </tr>
              <?php

              // Include modal dari file lain
              include 'modal_pinjam_buku.php';
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