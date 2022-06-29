-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2022 at 08:16 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(60) NOT NULL,
  `tipe_id` int(2) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `email`, `alamat`, `telp`, `tipe_id`, `tanggal`) VALUES
(8, 'Nada', 'dsfsf@a.afafcom', 'ttttt', '085515151515', 3, '2022-06-30'),
(9, 'Susi', '222', '222', '222', 1, NULL),
(10, 'Gofar', '222', '222', '222', 2, '2022-06-20'),
(12, 'Abdul', 'dsfsf@a.afafcom', 'dddddd', '085000000', 0, NULL),
(13, 'Ahmad', 'aaaa@a.afafcom', 'dddddd', '085515151515', 0, NULL),
(14, 'Halim', 'halimi@aaa.com', 'Jalan cendana', '0193993', 0, NULL),
(16, 'Joko sentosa', 'halimi@aaa.com', 'Jalan cendana', '0193993', 0, NULL),
(17, 'Haidir', 'abc@gaga.com', 'Jalan perkasa', '123', 3, NULL),
(18, 'ssss', 'ssss', 'sss', '121212', 1, '2022-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `pinjaman_id` int(11) NOT NULL DEFAULT '0',
  `jumlah` bigint(20) NOT NULL DEFAULT '0',
  `status_jatuh_tempo` int(11) NOT NULL DEFAULT '0',
  `status_lunas` int(11) NOT NULL DEFAULT '0',
  `denda` bigint(20) NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `time_log` int(11) NOT NULL DEFAULT '0',
  `added_by` int(11) NOT NULL DEFAULT '0',
  `status_aktif` int(11) NOT NULL DEFAULT '0' COMMENT 'digunakan sebagai tabel angsuran aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id`, `anggota_id`, `pinjaman_id`, `jumlah`, `status_jatuh_tempo`, `status_lunas`, `denda`, `tanggal`, `time_log`, `added_by`, `status_aktif`) VALUES
(1, 8, 1, 5000000, 1, 1, 0, '2022-06-29', 1656489736, 0, 0),
(2, 8, 1, 5000000, 1, 1, 0, '2022-06-29', 1656490285, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tipe` int(11) NOT NULL COMMENT '1: Simpanan, 2: pinjaman'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  `anggota_id` int(11) NOT NULL DEFAULT '0',
  `jumlah` bigint(20) NOT NULL DEFAULT '0',
  `catatan` varchar(50) NOT NULL DEFAULT '0',
  `jumlah_kali_angsuran` int(11) NOT NULL DEFAULT '0',
  `masa_angsuran` int(11) NOT NULL DEFAULT '0',
  `angsuran` bigint(20) NOT NULL DEFAULT '0',
  `tanggal_jatuh_tempo` date NOT NULL,
  `tanggal_jatuh_tempo_angsuran_perbulan` tinyint(4) NOT NULL DEFAULT '0',
  `status_lunas` int(11) NOT NULL DEFAULT '0',
  `status_disetujui` int(11) NOT NULL DEFAULT '1',
  `added_by` int(11) NOT NULL DEFAULT '0',
  `timestamps` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id`, `kode`, `tanggal`, `anggota_id`, `jumlah`, `catatan`, `jumlah_kali_angsuran`, `masa_angsuran`, `angsuran`, `tanggal_jatuh_tempo`, `tanggal_jatuh_tempo_angsuran_perbulan`, `status_lunas`, `status_disetujui`, `added_by`, `timestamps`) VALUES
(1, 'P1', '2022-06-29', 8, 60000000, '', 12, 0, 5000000, '2023-06-01', 2, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_angsuran`
--

CREATE TABLE `rencana_angsuran` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `pinjaman_id` int(11) NOT NULL DEFAULT '0',
  `angsuran_ke` int(11) NOT NULL,
  `jumlah` bigint(20) NOT NULL DEFAULT '0',
  `status_jatuh_tempo` int(11) NOT NULL DEFAULT '0',
  `status_lunas` int(11) NOT NULL DEFAULT '0',
  `denda` bigint(20) NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `tanggal_dibayarkan` date DEFAULT NULL,
  `time_log` int(11) NOT NULL DEFAULT '0',
  `added_by` int(11) NOT NULL DEFAULT '0',
  `status_aktif` int(11) NOT NULL DEFAULT '0' COMMENT 'digunakan sebagai tabel angsuran aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rencana_angsuran`
--

INSERT INTO `rencana_angsuran` (`id`, `anggota_id`, `pinjaman_id`, `angsuran_ke`, `jumlah`, `status_jatuh_tempo`, `status_lunas`, `denda`, `tanggal`, `tanggal_dibayarkan`, `time_log`, `added_by`, `status_aktif`) VALUES
(1, 8, 1, 1, 5000000, 1, 1, 0, '2022-06-02', '2022-06-29', 1656489432, 0, 1),
(2, 8, 1, 2, 5000000, 0, 0, 0, '2022-07-02', NULL, 1656489432, 0, 1),
(3, 8, 1, 3, 5000000, 0, 0, 0, '2022-08-02', NULL, 1656489432, 0, 1),
(4, 8, 1, 4, 5000000, 0, 0, 0, '2022-09-02', NULL, 1656489432, 0, 1),
(5, 8, 1, 5, 5000000, 0, 0, 0, '2022-10-02', NULL, 1656489432, 0, 1),
(6, 8, 1, 6, 5000000, 0, 0, 0, '2022-11-02', NULL, 1656489432, 0, 1),
(7, 8, 1, 7, 5000000, 0, 0, 0, '2022-12-02', NULL, 1656489432, 0, 1),
(8, 8, 1, 8, 5000000, 0, 0, 0, '2023-01-02', NULL, 1656489432, 0, 1),
(9, 8, 1, 9, 5000000, 0, 0, 0, '2023-02-02', NULL, 1656489432, 0, 1),
(10, 8, 1, 10, 5000000, 0, 0, 0, '2023-03-02', NULL, 1656489432, 0, 1),
(11, 8, 1, 11, 5000000, 0, 0, 0, '2023-04-02', NULL, 1656489432, 0, 1),
(12, 8, 1, 12, 5000000, 0, 0, 0, '2023-05-02', NULL, 1656489432, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `anggota_id` int(11) NOT NULL DEFAULT '0',
  `jumlah` bigint(20) NOT NULL DEFAULT '0',
  `catatan` varchar(50) NOT NULL DEFAULT '0',
  `time_log` bigint(20) NOT NULL DEFAULT '0',
  `tipe` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_anggota`
--

CREATE TABLE `tipe_anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_anggota`
--

INSERT INTO `tipe_anggota` (`id`, `nama`) VALUES
(1, 'Umum'),
(2, 'Karyawan'),
(3, 'Pengurus'),
(4, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `anggota_id` int(11) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rencana_angsuran`
--
ALTER TABLE `rencana_angsuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_anggota`
--
ALTER TABLE `tipe_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rencana_angsuran`
--
ALTER TABLE `rencana_angsuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_anggota`
--
ALTER TABLE `tipe_anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
