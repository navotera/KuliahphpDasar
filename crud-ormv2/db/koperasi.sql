-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2022 at 03:07 AM
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
  `rencana_angsuran_id` int(11) DEFAULT NULL,
  `anggota_id` int(11) NOT NULL,
  `pinjaman_id` int(11) NOT NULL DEFAULT '0',
  `jumlah` bigint(20) NOT NULL DEFAULT '0',
  `status_jatuh_tempo` int(11) NOT NULL DEFAULT '0',
  `status_lunas` int(11) NOT NULL DEFAULT '0',
  `denda` bigint(20) NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `time_log` int(11) NOT NULL DEFAULT '0',
  `added_by` int(11) NOT NULL DEFAULT '0',
  `status_aktif` int(11) NOT NULL DEFAULT '0' COMMENT 'digunakan sebagai tabel angsuran aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id`, `rencana_angsuran_id`, `anggota_id`, `pinjaman_id`, `jumlah`, `status_jatuh_tempo`, `status_lunas`, `denda`, `tanggal`, `angsuran_ke`, `time_log`, `added_by`, `status_aktif`) VALUES
(1, 0, 8, 1, 5000000, 0, 1, 0, '2022-07-01', 1, 1656638022, 0, 0),
(2, 0, 8, 2, 583333, 0, 1, 0, '2022-07-01', 1, 1656638115, 0, 0),
(3, 0, 8, 3, 4166667, 0, 1, 0, '2022-07-01', 1, 1656638128, 0, 0),
(6, 1, 8, 1, 1000000, 1, 1, 0, '2022-07-15', 2, 1657845575, 0, 0);

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
(1, 'P1', '2022-07-01', 8, 60000000, '', 12, 0, 5000000, '2023-07-01', 1, 0, 1, 1, 0),
(2, 'P2', '2022-07-01', 8, 7000000, '', 12, 0, 583333, '2023-07-29', 10, 0, 1, 1, 0),
(3, 'P3', '2022-07-01', 8, 50000000, '', 12, 0, 4166667, '2023-07-01', 1, 0, 1, 1, 0);

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
(1, 8, 1, 1, 2000000, 0, 0, 0, '2022-07-01', '2022-07-01', 1656635885, 0, 1),
(2, 8, 1, 2, 5000000, 0, 0, 0, '2022-08-01', NULL, 1656635885, 0, 1),
(3, 8, 1, 3, 5000000, 0, 0, 0, '2022-09-01', NULL, 1656635885, 0, 1),
(4, 8, 1, 4, 5000000, 0, 0, 0, '2022-10-01', NULL, 1656635885, 0, 1),
(5, 8, 1, 5, 5000000, 0, 0, 0, '2022-11-01', NULL, 1656635885, 0, 1),
(6, 8, 1, 6, 5000000, 0, 0, 0, '2022-12-01', NULL, 1656635885, 0, 1),
(7, 8, 1, 7, 5000000, 0, 0, 0, '2023-01-01', NULL, 1656635885, 0, 1),
(8, 8, 1, 8, 5000000, 0, 0, 0, '2023-02-01', NULL, 1656635885, 0, 1),
(9, 8, 1, 9, 5000000, 0, 0, 0, '2023-03-01', NULL, 1656635885, 0, 1),
(10, 8, 1, 10, 5000000, 0, 0, 0, '2023-04-01', NULL, 1656635885, 0, 1),
(11, 8, 1, 11, 5000000, 0, 0, 0, '2023-05-01', NULL, 1656635885, 0, 1),
(12, 8, 1, 12, 5000000, 0, 0, 0, '2023-06-01', NULL, 1656635885, 0, 1),
(13, 8, 2, 1, 583333, 0, 0, 0, '2022-07-10', '2022-07-01', 1656636011, 0, 1),
(14, 8, 2, 2, 583333, 0, 0, 0, '2022-08-10', NULL, 1656636011, 0, 1),
(15, 8, 2, 3, 583333, 0, 0, 0, '2022-09-10', NULL, 1656636011, 0, 1),
(16, 8, 2, 4, 583333, 0, 0, 0, '2022-10-10', NULL, 1656636011, 0, 1),
(17, 8, 2, 5, 583333, 0, 0, 0, '2022-11-10', NULL, 1656636011, 0, 1),
(18, 8, 2, 6, 583333, 0, 0, 0, '2022-12-10', NULL, 1656636011, 0, 1),
(19, 8, 2, 7, 583333, 0, 0, 0, '2023-01-10', NULL, 1656636011, 0, 1),
(20, 8, 2, 8, 583333, 0, 0, 0, '2023-02-10', NULL, 1656636011, 0, 1),
(21, 8, 2, 9, 583333, 0, 0, 0, '2023-03-10', NULL, 1656636011, 0, 1),
(22, 8, 2, 10, 583333, 0, 0, 0, '2023-04-10', NULL, 1656636011, 0, 1),
(23, 8, 2, 11, 583333, 0, 0, 0, '2023-05-10', NULL, 1656636011, 0, 1),
(24, 8, 2, 12, 583333, 0, 0, 0, '2023-06-10', NULL, 1656636011, 0, 1),
(25, 8, 3, 1, 4166667, 1, 0, 0, '2022-07-01', '2022-07-15', 1656636137, 0, 1),
(26, 8, 3, 2, 4166667, 0, 0, 0, '2022-08-01', NULL, 1656636137, 0, 1),
(27, 8, 3, 3, 4166667, 0, 0, 0, '2022-09-01', NULL, 1656636137, 0, 1),
(28, 8, 3, 4, 4166667, 0, 0, 0, '2022-10-01', NULL, 1656636137, 0, 1),
(29, 8, 3, 5, 4166667, 0, 0, 0, '2022-11-01', NULL, 1656636137, 0, 1),
(30, 8, 3, 6, 4166667, 0, 0, 0, '2022-12-01', NULL, 1656636137, 0, 1),
(31, 8, 3, 7, 4166667, 0, 0, 0, '2023-01-01', NULL, 1656636137, 0, 1),
(32, 8, 3, 8, 4166667, 0, 0, 0, '2023-02-01', NULL, 1656636137, 0, 1),
(33, 8, 3, 9, 4166667, 0, 0, 0, '2023-03-01', NULL, 1656636137, 0, 1),
(34, 8, 3, 10, 4166667, 0, 0, 0, '2023-04-01', NULL, 1656636137, 0, 1),
(35, 8, 3, 11, 4166667, 0, 0, 0, '2023-05-01', NULL, 1656636137, 0, 1),
(36, 8, 3, 12, 4166667, 0, 0, 0, '2023-06-01', NULL, 1656636137, 0, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `login_terakhir` int(11) NOT NULL,
  `status_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `login_terakhir`, `status_aktif`) VALUES
(1, 'Ridwan', 'a@a.com', '$2y$10$fMd2Vr36POOkuBL/gRofaO8FLclHZAZy4Pg15OaY2BEVdkizdIfsG', 1, 1);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rencana_angsuran`
--
ALTER TABLE `rencana_angsuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
