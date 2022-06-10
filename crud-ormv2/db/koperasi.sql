-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk koperasi
CREATE DATABASE IF NOT EXISTS `koperasi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `koperasi`;

-- membuang struktur untuk table koperasi.anggota
CREATE TABLE IF NOT EXISTS `anggota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(60) NOT NULL,
  `tipe_id` int(2) NOT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.anggota: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `tipe` int(11) NOT NULL COMMENT '1: Simpanan, 2: pinjaman',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.jenis: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.pinjaman
CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `timestamps` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.pinjaman: ~14 rows (lebih kurang)
/*!40000 ALTER TABLE `pinjaman` DISABLE KEYS */;
INSERT INTO `pinjaman` (`id`, `kode`, `tanggal`, `anggota_id`, `jumlah`, `catatan`, `jumlah_kali_angsuran`, `masa_angsuran`, `angsuran`, `tanggal_jatuh_tempo`, `tanggal_jatuh_tempo_angsuran_perbulan`, `status_lunas`, `status_disetujui`, `added_by`, `timestamps`) VALUES
	(3, 'P1', '2022-06-04', 8, 500000000, '222', 45, 0, 11111111, '2022-08-25', 25, 0, 1, 1, 1654328204),
	(4, 'P4', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654332973),
	(5, 'P5', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333028),
	(6, 'P6', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333105),
	(7, 'P7', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333120),
	(8, 'P8', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333184),
	(9, 'P9', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333239),
	(10, 'P10', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333267),
	(11, 'P11', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333281),
	(12, 'P12', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333318),
	(13, 'P13', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333336),
	(14, 'P14', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333347),
	(15, 'P15', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333403),
	(16, 'P16', '2022-06-04', 8, 2500000, '', 4, 0, 625000, '2023-06-01', 1, 0, 1, 1, 1654333417);
/*!40000 ALTER TABLE `pinjaman` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.rencana_angsuran
CREATE TABLE IF NOT EXISTS `rencana_angsuran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pinjaman_id` int(11) NOT NULL DEFAULT '0',
  `jumlah` bigint(20) NOT NULL DEFAULT '0',
  `status_jatuh_tempo` int(11) NOT NULL DEFAULT '0',
  `status_lunas` int(11) NOT NULL DEFAULT '0',
  `denda` bigint(20) NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `time_log` int(11) NOT NULL DEFAULT '0',
  `added_by` int(11) NOT NULL DEFAULT '0',
  `status_aktif` int(11) NOT NULL DEFAULT '0' COMMENT 'digunakan sebagai tabel angsuran aktif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.rencana_angsuran: ~29 rows (lebih kurang)
/*!40000 ALTER TABLE `rencana_angsuran` DISABLE KEYS */;
INSERT INTO `rencana_angsuran` (`id`, `pinjaman_id`, `jumlah`, `status_jatuh_tempo`, `status_lunas`, `denda`, `tanggal`, `time_log`, `added_by`, `status_aktif`) VALUES
	(1, 7, 625000, 0, 0, 0, NULL, 1654333120, 0, 1),
	(2, 7, 625000, 0, 0, 0, NULL, 1654333120, 0, 1),
	(3, 7, 625000, 0, 0, 0, NULL, 1654333120, 0, 1),
	(4, 7, 625000, 0, 0, 0, NULL, 1654333120, 0, 1),
	(5, 9, 625000, 0, 0, 0, NULL, 1654333239, 0, 1),
	(6, 9, 625000, 0, 0, 0, NULL, 1654333239, 0, 1),
	(7, 9, 625000, 0, 0, 0, NULL, 1654333239, 0, 1),
	(8, 9, 625000, 0, 0, 0, NULL, 1654333239, 0, 1),
	(9, 10, 625000, 0, 0, 0, '1970-01-01', 1654333267, 0, 1),
	(10, 10, 625000, 0, 0, 0, '1970-01-01', 1654333267, 0, 1),
	(11, 10, 625000, 0, 0, 0, '1970-01-01', 1654333267, 0, 1),
	(12, 10, 625000, 0, 0, 0, '1970-01-01', 1654333267, 0, 1),
	(13, 11, 625000, 0, 0, 0, '1970-01-01', 1654333281, 0, 1),
	(14, 11, 625000, 0, 0, 0, '1970-01-01', 1654333281, 0, 1),
	(15, 11, 625000, 0, 0, 0, '1970-01-01', 1654333281, 0, 1),
	(16, 11, 625000, 0, 0, 0, '1970-01-01', 1654333281, 0, 1),
	(17, 12, 625000, 0, 0, 0, '1970-01-01', 1654333318, 0, 1),
	(18, 12, 625000, 0, 0, 0, '1970-01-01', 1654333318, 0, 1),
	(19, 12, 625000, 0, 0, 0, '1970-01-01', 1654333318, 0, 1),
	(20, 12, 625000, 0, 0, 0, '1970-01-01', 1654333318, 0, 1),
	(21, 14, 625000, 0, 0, 0, '1970-01-01', 1654333347, 0, 1),
	(22, 14, 625000, 0, 0, 0, '1970-01-01', 1654333347, 0, 1),
	(23, 14, 625000, 0, 0, 0, '1970-01-01', 1654333347, 0, 1),
	(24, 14, 625000, 0, 0, 0, '1970-01-01', 1654333347, 0, 1),
	(25, 15, 625000, 0, 0, 0, '1970-01-01', 1654333403, 0, 1),
	(26, 15, 625000, 0, 0, 0, '1970-01-01', 1654333403, 0, 1),
	(27, 15, 625000, 0, 0, 0, '1970-01-01', 1654333403, 0, 1),
	(28, 15, 625000, 0, 0, 0, '1970-01-01', 1654333403, 0, 1),
	(29, 16, 625000, 0, 0, 0, '2023-06-01', 1654333417, 0, 1),
	(30, 16, 625000, 0, 0, 0, '2023-07-01', 1654333417, 0, 1),
	(31, 16, 625000, 0, 0, 0, '2023-08-01', 1654333417, 0, 1),
	(32, 16, 625000, 0, 0, 0, '2023-09-01', 1654333417, 0, 1);
/*!40000 ALTER TABLE `rencana_angsuran` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.simpanan
CREATE TABLE IF NOT EXISTS `simpanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `anggota_id` int(11) NOT NULL DEFAULT '0',
  `jumlah` bigint(20) NOT NULL DEFAULT '0',
  `catatan` varchar(50) NOT NULL DEFAULT '0',
  `time_log` bigint(20) NOT NULL DEFAULT '0',
  `tipe` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.simpanan: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `simpanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `simpanan` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tipe_anggota
CREATE TABLE IF NOT EXISTS `tipe_anggota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tipe_anggota: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `tipe_anggota` DISABLE KEYS */;
INSERT INTO `tipe_anggota` (`id`, `nama`) VALUES
	(1, 'Umum'),
	(2, 'Karyawan'),
	(3, 'Pengurus'),
	(4, 'Mahasiswa');
/*!40000 ALTER TABLE `tipe_anggota` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `anggota_id` int(11) NOT NULL,
  `jumlah` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.transaksi: ~17 rows (lebih kurang)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id`, `kode`, `anggota_id`, `jumlah`, `tanggal`, `jenis_id`, `added_by`) VALUES
	(1, '0', 8, 5000, '2022-06-04', 1, NULL),
	(2, '0', 8, 200000, '2022-06-04', 1, NULL),
	(3, '0', 8, 200000, '2022-06-09', 1, NULL),
	(4, '0', 8, 200000, '2022-06-09', 1, NULL),
	(5, '0', 8, 200000, '2022-06-09', 1, NULL),
	(6, '0', 8, 11111, '2022-06-09', 1, NULL),
	(7, '0', 8, 13444, '2022-06-09', 1, NULL),
	(8, '0', 8, 13444, '2022-06-09', 1, NULL),
	(9, '0', 8, 444444, '2022-06-09', 1, NULL),
	(10, '0', 8, 200000, '2022-06-09', 1, NULL),
	(11, '0', 8, 10000, '2022-06-09', 1, NULL),
	(12, '0', 8, 11, '2022-06-09', 1, NULL),
	(13, '0', 8, 2, '2022-06-09', 1, NULL),
	(14, '0', 8, 3, '2022-06-09', 1, NULL),
	(15, '0', 8, 2, '2022-06-09', 1, NULL),
	(16, '0', 8, 4, '2022-06-09', 1, NULL),
	(17, '0', 8, 1, '2022-06-09', 1, NULL),
	(18, '0', 8, 44444444, '2022-06-09', 1, NULL);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
