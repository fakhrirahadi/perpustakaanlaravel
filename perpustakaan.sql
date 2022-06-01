-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 05:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `idbuku` int(255) NOT NULL,
  `kodebuku` varchar(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`idbuku`, `kodebuku`, `judul`, `pengarang`, `penerbit`, `created_at`, `updated_at`) VALUES
(2, 'FIS', 'Fisika Kelas XII', 'Nur', 'RPL production', NULL, '2022-05-29 03:32:43'),
(3, 'MAT', 'Matematika', 'Razza Galang', 'RPL production', NULL, NULL),
(4, 'OOP', 'Pem Berorientasi Obyek', 'Dudung', 'GS', NULL, NULL),
(5, 'OR', 'Olah Raga', 'Satia Nugraha', 'Zidane Production', NULL, NULL),
(6, 'PAI', 'Pendidikan Agama Islam', 'M Bagus', 'Zidane Production', NULL, NULL),
(7, 'Java', 'Pemrograman Java', 'James Gosling', 'Deepublish', NULL, '2022-05-26 02:16:31'),
(11, 'PD', 'Pemrograman Dasar', 'Daniar', 'RPL Production', NULL, NULL),
(12, 'KIM', 'Kimia', 'Eros', 'RPL Production', NULL, NULL),
(13, 'WEB', 'Pemrograman Web', 'M Bagus', 'Bagus Production', NULL, NULL),
(14, 'JARKOM', 'Jaringan Komputer', 'Dodi', 'RPL Production', NULL, NULL),
(16, 'PD', 'Pemrograman Dasar', 'Daniar', 'RPL Production', NULL, NULL),
(19, 'Python-1', 'Python: For Beginner', 'Guido van Rossum', 'Gaya Media', '2022-05-26 05:50:01', '2022-05-26 05:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `idpinjam` int(255) NOT NULL,
  `idpetugas` int(10) NOT NULL,
  `idsiswa` int(255) NOT NULL,
  `idbuku` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`idpinjam`, `idpetugas`, `idsiswa`, `idbuku`, `created_at`, `updated_at`) VALUES
(3, 4, 6, 3, '2022-05-29 03:17:54', '2022-05-29 03:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `idpetugas` int(10) NOT NULL,
  `namapetugas` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`idpetugas`, `namapetugas`, `hp`, `created_at`, `updated_at`) VALUES
(1, 'Andreas Pardede', '08994125688', '2022-05-26 15:00:16', '2022-06-01 08:40:37'),
(2, 'Davion Hermanto', '08213568744', '2022-05-29 03:14:31', '2022-06-01 08:40:44'),
(4, 'Nabil', '0865478922', '2022-05-29 03:15:30', '2022-06-01 08:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `idsiswa` int(255) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `namasiswa` varchar(100) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `hp`, `created_at`, `updated_at`) VALUES
(1, '2051947287', 'Andi Suherman', '12', '08121234567', '2022-05-26 12:05:58', '2022-06-01 08:38:44'),
(2, '8144880078', 'Budianto Sudimoro', '11', '081212345655', '2022-05-26 12:37:16', '2022-06-01 08:38:57'),
(4, '8259988489', 'Charlie Budiman', '11', '0243566277', '2022-05-26 05:52:58', '2022-06-01 08:39:26'),
(6, '9790369983', 'Devanto Wirawan', '10', '08145987622', '2022-05-26 05:57:30', '2022-06-01 08:39:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`idpinjam`),
  ADD KEY `idpetugas` (`idpetugas`),
  ADD KEY `idsiswa` (`idsiswa`),
  ADD KEY `idbuku` (`idbuku`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`idpetugas`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`idsiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `idbuku` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `idpinjam` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `idpetugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `idsiswa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD CONSTRAINT `tbl_peminjaman_ibfk_1` FOREIGN KEY (`idbuku`) REFERENCES `tbl_buku` (`idbuku`),
  ADD CONSTRAINT `tbl_peminjaman_ibfk_2` FOREIGN KEY (`idpetugas`) REFERENCES `tbl_petugas` (`idpetugas`),
  ADD CONSTRAINT `tbl_peminjaman_ibfk_3` FOREIGN KEY (`idsiswa`) REFERENCES `tbl_siswa` (`idsiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
