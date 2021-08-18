-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 03:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_pendukung_keputusan_kredit`
--

-- --------------------------------------------------------

--
-- Table structure for table `cln_nasabah`
--

CREATE TABLE `cln_nasabah` (
  `id_cln_nsb` int(11) NOT NULL,
  `nama_nsb` varchar(45) NOT NULL,
  `no_kk` varchar(40) NOT NULL,
  `no_nik` varchar(40) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `agama` enum('Hindu','Islam','Kristen','Buddha') NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cln_nasabah`
--

INSERT INTO `cln_nasabah` (`id_cln_nsb`, `nama_nsb`, `no_kk`, `no_nik`, `tempat_lahir`, `tgl_lahir`, `alamat`, `agama`, `email`, `no_tlp`, `jenis_kelamin`, `periode`) VALUES
(1, 'Ketut berhasil 1', '2147483647', '2147483647', 'Denpasar', '2021-07-14', 'Alamat adalah alamat', 'Hindu', 'naufalsugiarto832@tutanota.com', '0863520098031', 'Pria', '2021-10-01'),
(6, 'Ketut gagal 2', '2147483647', '2147483647', 'Denpasar', '2021-07-14', 'Alamat saya ada disni', 'Hindu', 'tokohp90@gmail.com', '086352123467', 'Pria', '2021-12-01'),
(7, 'Elit Global 3', '2147483647', '2147483647', 'Denpasar', '2021-01-04', 'Alamat adalah', 'Buddha', 'gibran.ganendra567@icloud.com', '08635200909123', 'Pria', '2020-02-01'),
(10, 'Elit Global 4', '2147483647', '2147483647', 'Denpasar', '2021-07-23', 'Alamat nomor 5', 'Hindu', 'test123@gmail.com', '086323423663431', 'Pria', '2021-01-01'),
(11, 'Elit Global 5', '2147483647', '2147483647', 'Denpasar', '2021-07-23', 'Alamat nomor 5', 'Hindu', 'test123@gmail.com', '086323423663431', 'Pria', '2021-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_cln_nsb` int(11) NOT NULL,
  `nilai_akhir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot_kriteria` float NOT NULL,
  `ket_kriteria` enum('Benefit','Cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `ket_kriteria`) VALUES
(40, 'Pendapatan', 25, 'Benefit'),
(41, 'Pekerjaan', 20, 'Benefit'),
(42, 'Jaminan', 20, 'Benefit'),
(43, 'Pengeluaran', 15, 'Cost'),
(44, 'Usia', 10, 'Benefit'),
(45, 'Jangka waktu', 10, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_cln_nsb` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_kriteria`, `id_cln_nsb`, `id_subkriteria`) VALUES
(198, 40, 1, 244),
(199, 41, 1, 249),
(200, 42, 1, 254),
(201, 43, 1, 260),
(202, 44, 1, 265),
(203, 45, 1, 270),
(204, 40, 6, 244),
(205, 41, 6, 250),
(206, 42, 6, 255),
(207, 43, 6, 259),
(208, 44, 6, 264),
(209, 45, 6, 269),
(210, 40, 7, 243),
(211, 41, 7, 247),
(212, 42, 7, 253),
(213, 43, 7, 258),
(214, 44, 7, 264),
(215, 45, 7, 268),
(216, 40, 10, 243),
(217, 41, 10, 248),
(218, 42, 10, 252),
(219, 43, 10, 259),
(220, 44, 10, 263),
(221, 45, 10, 267),
(222, 40, 11, 242),
(223, 41, 11, 249),
(224, 42, 11, 254),
(225, 43, 11, 257),
(226, 44, 11, 262),
(227, 45, 11, 267),
(228, 40, 16, 245),
(229, 41, 16, 249),
(230, 42, 16, 253),
(231, 43, 16, 259),
(232, 44, 16, 265),
(233, 45, 16, 269);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `ket` varchar(45) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `id_kriteria`, `ket`, `nilai`) VALUES
(242, 40, '≥ 15.000.000', 4),
(243, 40, '≥ 8.000.000 - < 15.000.000', 3),
(244, 40, '≥ 3.000.000 - < 8.000.000', 2),
(245, 40, '<3.000.000', 1),
(246, 40, '', 0),
(247, 41, 'PNS', 4),
(248, 41, 'Wiraswasta', 3),
(249, 41, 'Pedagang', 2),
(250, 41, 'Tidak Tetap', 1),
(251, 41, '', 0),
(252, 42, 'Sertifikat tanah', 4),
(253, 42, 'SK', 3),
(254, 42, 'BPKB', 2),
(255, 42, 'Slip Gaji', 1),
(256, 42, '', 0),
(257, 43, '≥10.000.000', 1),
(258, 43, '≥6.000.000 - < 10.000.000', 2),
(259, 43, '≥3.000.000 - < 6.00.000', 3),
(260, 43, '<3.000.000', 4),
(261, 43, '', 0),
(262, 44, '> 50  thn', 4),
(263, 44, '36 thn - 50  thn', 3),
(264, 44, '26  thn - 35  thn', 2),
(265, 44, '21 thn - 25thn', 1),
(266, 44, '', 0),
(267, 45, '>36 bulan', 4),
(268, 45, '≥24 bulan - < 36 bulan', 3),
(269, 45, '≥12 bulan - < 24 bulan', 2),
(270, 45, '< 12 bln', 1),
(271, 45, '', 0),
(272, 46, 'test 1', 1),
(273, 46, 'test 2', 1),
(274, 46, 'test 3', 1),
(275, 46, 'test 4', 1),
(276, 46, 'test 5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','kepala_lpd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$XvM.zP6/7NDhrzVRNKYCOe3QmwH/Apw3a1YJBB4M8nCgwLqK530a6', 'admin'),
(2, 'kepala_lpd', '$2y$10$XvM.zP6/7NDhrzVRNKYCOe3QmwH/Apw3a1YJBB4M8nCgwLqK530a6', 'kepala_lpd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cln_nasabah`
--
ALTER TABLE `cln_nasabah`
  ADD PRIMARY KEY (`id_cln_nsb`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cln_nasabah`
--
ALTER TABLE `cln_nasabah`
  MODIFY `id_cln_nsb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
