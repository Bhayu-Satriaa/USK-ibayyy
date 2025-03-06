<?php
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
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Dashboard-Style.css">

  <style>

  </style>
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
    <h1>Data Peminjaman Buku</h1>
    <p>Selamat Datang di Halaman Data Peminjaman Buku Tempat Monitoring bla bla bla</p>


    <!--Table Start -->
    <!--Table Start -->
    <div class="card mb-4">
      <div class="card-header text-white bg-secondary">
        Data Buku
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Id Peminjaman</th>
              <th>Judul Buku</th>
              <th>Nama Anggota</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $get = "select * from peminjaman";
            $query1 = mysqli_query($koneksi, $get);
            while ($p = mysqli_fetch_array($query1)) {
              $id_peminjaman = $p['id_peminjaman'];
              $judul_buku = $p['judul_buku'];
              $nama_anggota = $p['nama_anggota'];
              $tanggal_pinjam = $p['tanggal_pinjam'];
              $tanggal_kembali = $p['tanggal_kembali'];

            ?>
              <tr>
                <td><?php echo $id_peminjaman ?></td>
                <td><?php echo $judul_buku ?></td>
                <td><?php echo $nama_anggota ?></td>
                <td><?php echo $tanggal_pinjam ?></td>
                <td><?php echo $tanggal_kembali ?></td>


                <td>
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditPeminjaman<?= $id_peminjaman ?>">
                    Edit Peminjaman
                  </button>
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#KembalikanPeminjaman<?= $id_peminjaman ?>">
                    Kembalikan Buku
                  </button>
                </td>
              </tr>
              <?php
              // Include modal dari file lain
              include 'modal_kembalikan_peminjaman.php';
              ?>





            <?php
            };  // End of While
            ?>
          </tbody>
        </table>
      </div>

    </div>
    <!-- Table End -->
    <!-- Table End -->


  </div>
</body>

</html>