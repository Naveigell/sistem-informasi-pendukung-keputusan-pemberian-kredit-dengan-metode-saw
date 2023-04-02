-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 05:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(45, 'Jangka waktu', 10, 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nsb` int(11) NOT NULL,
  `nama_nsb` varchar(45) NOT NULL,
  `no_kk` varchar(40) NOT NULL,
  `no_nik` varchar(16) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `agama` enum('Hindu','Islam','Kristen','Buddha') NOT NULL,
  `email` varchar(35) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `periode` date NOT NULL,
  `selesai` integer NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nsb`, `nama_nsb`, `no_kk`, `no_nik`, `tempat_lahir`, `tgl_lahir`, `alamat`, `agama`, `email`, `no_tlp`, `jenis_kelamin`, `periode`) VALUES
(6, 'I Putu Eka Sumaharta Putra', '6777658192787322', '317178905029992', 'Gianyar', '1993-07-12', 'Jl. siulan Gang Cempaka No.8', 'Hindu', 'ekaaa1212@gmail.com', '086352123467', 'Pria', '2021-08-01'),
(7, 'Nadia Krisnayanti', '567432145266789', '3111205480502000', 'Sidemen', '1988-12-04', 'Jl. Melati no.10', 'Hindu', 'nadnad567@icloud.com', '086352009091', 'Pria', '2021-09-01'),
(10, 'Putu Aditya', '5767287466822511', '5271055507199661', 'Mataram', '1991-07-23', 'Jl. Imam Bonjol No.89', 'Hindu', 'dityaaa1222@gmail.com', '089887567341', 'Pria', '2021-09-02'),
(17, 'Ratna Maharani', '22109089889728783', '5271054805022201', 'Mataram', '2000-05-08', 'Jl. Batu Sari No 4', 'Hindu', 'ratnamaharani0805@gmail.com', '082345121278', 'Wanita', '2021-08-01'),
(18, 'Komang Sutama', '5222791000868272', '4371055502199671', 'Klungkung', '1949-02-05', 'Jl. HOS cokroaminoto No. 99', 'Hindu', 'komanggg45@gmail.com', '088678524443', 'Pria', '2021-09-02'),
(19, 'Ida Bagus Surya', '22389080098972365', '5270098480456014', 'Denpasar', '1986-02-23', 'Jl. Sedap Malam No.12', 'Hindu', 'suryauyakkk123@gmail.com', '08909877759', 'Pria', '2021-09-01'),
(20, 'Nyoman Suriati', '221676897890899807', '5289054805019986', 'Mataram', '1975-07-25', 'Jl. Drupadi No 3', 'Hindu', 'nyomansuriati25@gmail.com', '081803703114', 'Wanita', '2021-09-01'),
(21, 'Ni Ketut Rumin', '3320908988900910', '3321009870019872', 'Karangasem', '1956-12-12', 'Jl. RA Kartini No.12', 'Hindu', 'niketut123@gmail.com', '081677543234', 'Wanita', '2021-09-01'),
(22, 'Dewa Ayu Rista Ristiyanti', '890192841009876', '5431890678096547', 'Denpasar', '2021-10-03', 'kljlkjklsjfdlasjlkfd', 'Hindu', 'test@gmail.com', '08798918414', 'Wanita', '2021-10-01'),
(24, 'Ratih Purwaning', '22109089889728783', '5271055507000002', 'Mataram', '2000-07-15', 'jl.hkjhlkn', 'Hindu', 'purwaningratih@gmail.com', '082878345233', 'Wanita', '2021-11-06'),
(25, 'Widiatmika Dewi', '89109089349728783', '5271054805020005', 'Denpasar', '2000-06-21', 'jl. cempaka no 123', 'Hindu', 'geqamik@gmail.com', '081876843253', 'Wanita', '2021-11-17'),
(26, 'Gusti Ayu Asry', '5271090898899990', '4351054805620001', 'Mataram', '1970-02-23', 'Jl. siulan Gang Melati No.67', 'Hindu', 'asryyy@gmail.com', '08788845799', 'Wanita', '2021-11-17'),
(27, 'Ignatius Rony', '8740909907972112', '5541103420700999', 'Yogyakarta', '1994-04-03', 'Jl. Siulan No. 88', 'Kristen', 'romyyy@gmail.com', '089887675451', 'Pria', '2021-11-17'),
(28, 'Satya Joe', '4458906543621', '7651345645900043', 'Singaraja', '1984-12-23', 'Jl. Melati Indah No. 78', 'Buddha', 'joe345@gmail.com', '081876543226', 'Pria', '2021-11-17'),
(29, 'Indri Yuni', '887654309897656', '9456788890710032', 'Badung', '1983-01-30', 'Jl. Siulan Gang Anggrek No. 11', 'Hindu', 'indriyuni@gmail.com', '087654389727', 'Wanita', '2021-11-17'),
(32, 'Nanda', '90888675432167890', '8976543219087658', 'mataram', '1999-01-22', 'Jl. Merpati  No.90', 'Islam', '-', '087890887654', 'Pria', '2021-10-02'),
(33, 'Anagatha', '8907654321567890', '7865432215678956', 'Gianyar', '1984-09-08', 'Jl. Merak No. 3A', 'Hindu', 'anagtha123@gmail.com', '089776560987', 'Wanita', '2021-10-02'),
(34, 'Ayu Sri Widhi Parwati', '9087654329090345', '8976543315789028', 'Mataram', '1997-06-07', 'Jl. Siulan Gang Cempaka No.8A', 'Hindu', 'widhiparwati@gmail.com', '087865437809', 'Wanita', '2021-10-01'),
(37, 'Komang Sutama	', '4371055502199671', '1127894567818233', 'Mataram', '1969-09-18', 'Jl. Siulan No.89', 'Hindu', 'komanggg45@gmail.com', '089753245611', 'Pria', '2021-11-18'),
(38, 'Dion', '8765432156578982', '2347678196244611', 'Klungkung', '1998-12-02', 'Jl. Siulan No.80', 'Hindu', 'dionn@gmail.com', '089765431233', 'Pria', '2021-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_nsb` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_kriteria`, `id_nsb`, `id_subkriteria`) VALUES
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
(234, 40, 6, 244),
(235, 41, 6, 250),
(236, 42, 6, 255),
(237, 43, 6, 259),
(238, 44, 6, 264),
(239, 45, 6, 269),
(240, 40, 17, 245),
(241, 41, 17, 250),
(242, 42, 17, 255),
(243, 43, 17, 259),
(244, 44, 17, 265),
(245, 45, 17, 270),
(246, 40, 18, 243),
(247, 41, 18, 247),
(248, 42, 18, 252),
(249, 43, 18, 257),
(250, 44, 18, 262),
(251, 45, 18, 267),
(252, 40, 19, 245),
(253, 41, 19, 250),
(254, 42, 19, 255),
(255, 43, 19, 259),
(256, 44, 19, 264),
(257, 45, 19, 269),
(258, 40, 20, 244),
(259, 41, 20, 249),
(260, 42, 20, 254),
(261, 43, 20, 258),
(262, 44, 20, 263),
(263, 45, 20, 267),
(264, 40, 21, 245),
(265, 41, 21, 250),
(266, 42, 21, 252),
(267, 43, 21, 259),
(268, 44, 21, 262),
(269, 45, 21, 270),
(276, 40, 22, 243),
(277, 41, 22, 250),
(278, 42, 22, 253),
(279, 43, 22, 257),
(280, 44, 22, 262),
(281, 45, 22, 267),
(294, 40, 25, 244),
(295, 41, 25, 249),
(296, 42, 25, 254),
(297, 43, 25, 260),
(298, 44, 25, 265),
(299, 45, 25, 269),
(300, 40, 26, 245),
(301, 41, 26, 250),
(302, 42, 26, 255),
(303, 43, 26, 258),
(304, 44, 26, 262),
(305, 45, 26, 268),
(354, 40, 27, 245),
(355, 41, 27, 250),
(356, 42, 27, 254),
(357, 43, 27, 260),
(358, 44, 27, 264),
(359, 45, 27, 267),
(360, 40, 28, 242),
(361, 41, 28, 248),
(362, 42, 28, 252),
(363, 43, 28, 257),
(364, 44, 28, 263),
(365, 45, 28, 269),
(366, 40, 29, 243),
(367, 41, 29, 247),
(368, 42, 29, 253),
(369, 43, 29, 259),
(370, 44, 29, 264),
(371, 45, 29, 270),
(396, 40, 32, 244),
(397, 41, 32, 250),
(398, 42, 32, 255),
(399, 43, 32, 257),
(400, 44, 32, 265),
(401, 45, 32, 267),
(402, 40, 33, 243),
(403, 41, 33, 247),
(404, 42, 33, 253),
(405, 43, 33, 258),
(406, 44, 33, 263),
(407, 45, 33, 269),
(408, 40, 34, 245),
(409, 41, 34, 250),
(410, 42, 34, 254),
(411, 43, 34, 257),
(412, 44, 34, 265),
(413, 45, 34, 267),
(438, 40, 37, 244),
(439, 41, 37, 247),
(440, 42, 37, 254),
(441, 43, 37, 258),
(442, 44, 37, 262),
(443, 45, 37, 268),
(444, 40, 38, 244),
(445, 41, 38, 248),
(446, 42, 38, 254),
(447, 43, 38, 259),
(448, 44, 38, 265),
(449, 45, 38, 267);

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
(247, 41, 'PNS', 4),
(248, 41, 'Wiraswasta', 3),
(249, 41, 'Pedagang', 2),
(250, 41, 'Tidak Tetap', 1),
(252, 42, 'Sertifikat tanah', 4),
(253, 42, 'Sertifikat rumah ', 3),
(254, 42, 'BPKB diatas tahun 2015 ', 2),
(255, 42, 'BPKB dibawah tahun 2015 ', 1),
(257, 43, '≥10.000.000', 1),
(258, 43, '≥6.000.000 - < 10.000.000', 2),
(259, 43, '≥3.000.000 - < 6.00.000', 3),
(260, 43, '<3.000.000', 4),
(262, 44, '> 50 tahun', 4),
(263, 44, '36 tahun - 50 tahun', 3),
(264, 44, '26 tahun - 35 tahun', 2),
(265, 44, '21 tahun - 25 tahun', 1),
(267, 45, '≥36 bulan', 1),
(268, 45, '≥24 bulan - <36 bulan', 2),
(269, 45, '≥12 bulan - < 24 bulan', 3),
(270, 45, '< 12 bln', 4);

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
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nsb`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_subkriteria` (`id_subkriteria`),
  ADD KEY `id_cln_nsb` (`id_nsb`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nsb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_subkriteria`) REFERENCES `sub_kriteria` (`id_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ibfk_3` FOREIGN KEY (`id_nsb`) REFERENCES `nasabah` (`id_nsb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
