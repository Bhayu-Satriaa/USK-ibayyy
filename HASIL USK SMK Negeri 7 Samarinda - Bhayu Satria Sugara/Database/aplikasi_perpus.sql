-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2025 at 08:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_perpus`
--

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `alamat`, `no_hp`, `foto`) VALUES
(1, 'Stephen ', '1414 David ThroughwayPort Jason', 372421057, 'Stephen.jpg'),
(2, 'Rebecca', '1414 David ThroughwayPort Jason', 220701220, 'Rebecca.jpg');

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pencipta`, `tahun_diciptakan`, `kategori`, `stok`, `status`, `foto`) VALUES
(1, 'The Richest Man in Babylon', 'George Samuel Clason', '2018', 'Philosophy', 53, 'Available', 'The Richest Man in Babylon - George Samuel Clason.jpeg'),
(2, 'The Pyschology of Money', 'Morgan Housel', '2020', 'Finance ', 55, 'Available', 'The Pyschology of Money.jpg'),
(3, 'Wealth of Nations', 'Adam Smith', '2000', 'Economics', 35, 'Available', 'wealth of nations by adam smith.jpg'),
(4, 'The Laws of Human Nature', 'Robert Greene', '2018', 'Self-help Book', 100, 'Archive', 'The Laws of Human Nature.jpg');

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `judul_buku`, `nama_anggota`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(12, 'The Richest Man in Babylon', 'Rebecca', '2025-02-11', '2025-02-18');

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `alamat`, `no_hp`, `foto`) VALUES
(1, 'Bonnie', '6705 Miller Orchard Suite 186 Lake Shanestad', 756965051, 'Bonnie.jpg');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'Petugas1', 'Petugas11', 'Petugas'),
(2, 'Pengunjung', 'PengunjungPerpus', 'Pengunjung');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
