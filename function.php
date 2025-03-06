<?php

//Koneksi Database
$koneksi = mysqli_connect('localhost', 'root', '', 'aplikasi_perpus');

// Function untuk Validasi Login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'Petugas') {
            header('Location: Dashboard.php');
        } else {
            header('Location: Dashboard-Pengunjung.php');
        }
    } else {
        $error = "Username atau password salah!";
    }
}



// Function Tambah Buku di Halaman Data Buku
if (isset($_POST['TambahBuku'])) {
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $pencipta = $_POST['pencipta'];
    $tahun_diciptakan = $_POST['tahun_diciptakan'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $foto = $_POST['foto'];

    $insert1 = "INSERT INTO buku(id_buku, judul_buku, pencipta, tahun_diciptakan, kategori, stok, foto) VALUES ('$id_buku', '$judul_buku', '$pencipta', '$tahun_diciptakan', '$kategori', '$stok', '$foto')";
    $query1 = mysqli_query($koneksi, $insert1);
    if ($q1) {
        $sukses = "Data berhasil disimpan";
    } else {
        $error = "Data gagal disimpan";
    }
}

// Function Edit Buku di Halaman Data Buku
if (isset($_POST['EditBuku'])) {
    $idb = $_POST['idb']; //Id Buku
    $judul_buku = $_POST['judul_buku'];
    $pencipta = $_POST['pencipta'];
    // $tahun_diciptakan = $_POST['tahun_diciptakan'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $status = $_POST['status'];
    $foto = $_POST['foto'];

    $query = mysqli_query($koneksi, "UPDATE buku set judul_buku='$judul_buku', pencipta='$pencipta', kategori='$kategori', stok='$stok', status='$status', foto='$foto' WHERE id_buku='$idb' ");
}

// Function Soft Delete Buku di Halaman Data Buku
if (isset($_POST['HapusBuku'])) {
    $id_buku = $_POST['idb'];
    $query = "UPDATE buku SET status = 'Archive' WHERE id_buku = '$id_buku'";
    mysqli_query($koneksi, $query);
}

// Function Tambah Anggota di Halaman Data Anggota
if (isset($_POST['TambahAnggota'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $foto = $_POST['foto'];

    $insert1 = "INSERT INTO anggota(id_anggota, nama_anggota, alamat, no_hp, foto) VALUES ('$id_anggota', '$nama_anggota', '$alamat', '$no_hp','$foto')";
    $query1 = mysqli_query($koneksi, $insert1);
    if ($q1) {
        $sukses = "Data berhasil disimpan";
    } else {
        $error = "Data gagal disimpan";
    }
}

// Function Edit Anggota di Halaman Data Anggota
if (isset($_POST['EditAnggota'])) {
    $ida = $_POST['ida']; //Id Anggota
    $nama_anggota = $_POST['nama_anggota'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $foto = $_POST['foto'];


    $query = mysqli_query($koneksi, "UPDATE anggota set nama_anggota='$nama_anggota', alamat='$alamat', no_hp='$no_hp', foto='$foto' WHERE id_anggota='$ida'");
}

// Function Delete Anggota di Halaman Data Anggota
if (isset($_POST['HapusAnggota'])) {
    $ida = $_POST['ida']; //Id Anggota

    $query = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$ida'");
}


// Function Pinjam Buku
if (isset($_POST['PinjamBuku'])) {
    // Ambil data dari form
    $judul_buku = $_POST['judul_buku'];
    $nama_anggota = $_POST['nama_anggota'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    // Cari id_anggota berdasarkan nama_anggota
    $query_anggota = "SELECT id_anggota FROM anggota WHERE nama_anggota = '$nama_anggota'";
    $result_anggota = mysqli_query($koneksi, $query_anggota);

    if (mysqli_num_rows($result_anggota) > 0) {
        $row_anggota = mysqli_fetch_assoc($result_anggota);
        $id_anggota = $row_anggota['id_anggota'];

        // Insert data ke tabel peminjaman
        $query_insert = "INSERT INTO peminjaman (judul_buku, nama_anggota, tanggal_pinjam, tanggal_kembali) 
                         VALUES ('$judul_buku', '$nama_anggota', '$tanggal_pinjam', '$tanggal_kembali')";

        $result_insert = mysqli_query($koneksi, $query_insert);
    }
}

// Function Delete Peminjaman di Halaman Dashboard
if (isset($_POST['KembalikanPeminjaman'])) {
    $idp = $_POST['idp']; //Id Peminjaman

    $query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_peminjaman='$idp'");
}
