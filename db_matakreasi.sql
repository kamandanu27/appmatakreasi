-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2023 at 04:40 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_matakreasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int NOT NULL,
  `kode_akun` varchar(25) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `saldo_akun` varchar(100) NOT NULL,
  `dk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `kode_akun`, `nama_akun`, `saldo_akun`, `dk`) VALUES
(2, '54321', 'alvin', '460', 'Kredit'),
(7, '123', 'ijot', '17', 'Debit / Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurnal`
--

CREATE TABLE `tbl_jurnal` (
  `id_jurnal` int NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `debit_jurnal` varchar(50) NOT NULL,
  `kredit_jurnal` varchar(50) NOT NULL,
  `keterangan_jurnal` varchar(100) NOT NULL,
  `id_akun` int NOT NULL,
  `periode_jurnal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_jurnal`
--

INSERT INTO `tbl_jurnal` (`id_jurnal`, `tgl_jurnal`, `debit_jurnal`, `kredit_jurnal`, `keterangan_jurnal`, `id_akun`, `periode_jurnal`) VALUES
(2, '2023-05-02', 'debit', 'kredit', 'data', 2, '450'),
(5, '2023-05-11', 'dbt', 'kdt', 'keterangan', 7, '43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `notlp_pelanggan` text NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `foto_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `notlp_pelanggan`, `email_pelanggan`, `foto_pelanggan`) VALUES
(2, 'PT.MERDEKA MITRA SEJATI', 'CIREBON', '0231', 'merdekamitrasejati@gmail.com', '1685334764-Jellyfish.jpg'),
(3, 'alvin', 'Kuningan', '0889768', 'cbc@gmail.com', '1685334754-Desert.jpg'),
(4, 'ijot', 'jalan tuparev', '08897878', 'cbc@gmail.com', '1685334740-Tulips.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengawas`
--

CREATE TABLE `tbl_pengawas` (
  `id_pengawas` int NOT NULL,
  `nama_pengawas` varchar(50) NOT NULL,
  `notlp_pengawas` text NOT NULL,
  `email_pengawas` varchar(50) NOT NULL,
  `username_pengawas` varchar(50) NOT NULL,
  `password_pengawas` varchar(50) NOT NULL,
  `foto_pengawasan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengawas`
--

INSERT INTO `tbl_pengawas` (`id_pengawas`, `nama_pengawas`, `notlp_pengawas`, `email_pengawas`, `username_pengawas`, `password_pengawas`, `foto_pengawasan`) VALUES
(3, 'sofyan', '0889660', 'sofyan@gmail.com', 'sofyan', '12345', '1685330751-Desert.jpg'),
(4, 'dani', '087', 'dani@gmail.com', 'dani', '12345', '1685330908-Koala.jpg'),
(5, 'alvin', '1234567890', 'alvin@gmail.com', 'alvin', '12345', '1685330921-Penguins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_progresproyek`
--

CREATE TABLE `tbl_progresproyek` (
  `id_progres` int NOT NULL,
  `id_proyek` int NOT NULL,
  `tgl_progres` date NOT NULL,
  `aktifitas_proyek` varchar(100) NOT NULL,
  `kendala_proyek` varchar(100) NOT NULL,
  `foto_pencapaian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_progresproyek`
--

INSERT INTO `tbl_progresproyek` (`id_progres`, `id_proyek`, `tgl_progres`, `aktifitas_proyek`, `kendala_proyek`, `foto_pencapaian`) VALUES
(3, 2, '2023-06-10', 'jalankkk', 'longsor', '1684756842-1684169849-1683985804-1671295614-HYERI_(6).jpg'),
(4, 5, '2023-05-23', 'gas', 'longsor', '1685174681-Chrysanthemum.jpg'),
(5, 4, '2023-05-23', 'jalan', 'tanah longsor', '1684783624-1684169849-1683985804-1671295614-HYERI_(6).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proyek`
--

CREATE TABLE `tbl_proyek` (
  `id_proyek` int NOT NULL,
  `no_proyek` varchar(50) NOT NULL,
  `nama_proyek` varchar(50) NOT NULL,
  `alamat_proyek` text NOT NULL,
  `anggaran_proyek` varchar(50) NOT NULL,
  `tglpersetujuan_proyek` date NOT NULL,
  `tglmulai_proyek` date NOT NULL,
  `tglselesai_proyek` date NOT NULL,
  `keterangan_proyek` varchar(50) NOT NULL,
  `id_pelanggan` int NOT NULL,
  `id_pengawas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proyek`
--

INSERT INTO `tbl_proyek` (`id_proyek`, `no_proyek`, `nama_proyek`, `alamat_proyek`, `anggaran_proyek`, `tglpersetujuan_proyek`, `tglmulai_proyek`, `tglselesai_proyek`, `keterangan_proyek`, `id_pelanggan`, `id_pengawas`) VALUES
(4, 'crb01', 'jembatan', 'cirebon', '5m', '2023-05-23', '2023-05-23', '2023-06-10', 'Mulai', 2, 3),
(5, 'crb02', 'bendungan', 'cirebon', '5m', '2023-05-23', '2023-05-23', '2023-06-10', 'Mulai', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat_user` text NOT NULL,
  `nohp_user` int NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `instansi_user` varchar(50) NOT NULL,
  `level_user` varchar(50) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `alamat_user`, `nohp_user`, `email_user`, `instansi_user`, `level_user`, `username_user`, `password_user`) VALUES
(2, 'admin', 'cirebon', 12345, 'admin@gmail.com', 'pns', 'Admin', 'admin', '12345'),
(6, 'dani', 'crb', 89660353, 'dani@gmail.com', '', 'Pengelola', '', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_jurnal`
--
ALTER TABLE `tbl_jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_pengawas`
--
ALTER TABLE `tbl_pengawas`
  ADD PRIMARY KEY (`id_pengawas`);

--
-- Indexes for table `tbl_progresproyek`
--
ALTER TABLE `tbl_progresproyek`
  ADD PRIMARY KEY (`id_progres`);

--
-- Indexes for table `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_jurnal`
--
ALTER TABLE `tbl_jurnal`
  MODIFY `id_jurnal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengawas`
--
ALTER TABLE `tbl_pengawas`
  MODIFY `id_pengawas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_progresproyek`
--
ALTER TABLE `tbl_progresproyek`
  MODIFY `id_progres` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_proyek`
--
ALTER TABLE `tbl_proyek`
  MODIFY `id_proyek` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
