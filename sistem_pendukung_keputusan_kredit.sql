-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 03:11 PM
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
(1, 'Ketut berhasil 1', '2147483647', '2147483647', 'Denpasar', '2021-07-14', 'Alamat adalah alamat', 'Hindu', 'naufalsugiarto832@tutanota.com', '0863520098031', 'Pria', '2021-01-01'),
(6, 'Ketut gagal 2', '2147483647', '2147483647', 'Denpasar', '2021-07-14', 'Alamat saya ada disni', 'Hindu', 'tokohp90@gmail.com', '086352123467', 'Pria', '2021-05-01'),
(7, 'Elit Global 3', '2147483647', '2147483647', 'Denpasar', '2021-01-04', 'Alamat adalah', 'Buddha', 'gibran.ganendra567@icloud.com', '08635200909123', 'Pria', '2020-02-01'),
(10, 'Elit Global 4', '2147483647', '2147483647', 'Denpasar', '2021-07-23', 'Alamat nomor 5', 'Hindu', 'test123@gmail.com', '086323423663431', 'Pria', '2021-01-01'),
(11, 'Elit Global 5', '2147483647', '2147483647', 'Denpasar', '2021-07-23', 'Alamat nomor 5', 'Hindu', 'test123@gmail.com', '086323423663431', 'Pria', '2021-01-01'),
(14, 'Nasabah 6', '103123141', '99999999999123', 'Bangli', '2021-07-28', 'Alamat saya ada di', 'Hindu', 'dity971@gmail.co.id', '0917340913451', 'Pria', '2021-11-01'),
(15, 'Ihsffff', '28093184135135', '70578352452352', 'Denpasar', '2021-07-12', 'Hello world', 'Hindu', 'toasdfk@gmail.com', '089173487', 'Pria', '2021-09-01');

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
(32, 'Pinjaman', 3, 'Benefit'),
(33, 'Jaminan', 3, 'Benefit'),
(34, 'Usia', 2, 'Benefit'),
(35, 'Pekerjaan', 3, 'Benefit'),
(36, 'Pendapatan per bulan', 5, 'Benefit'),
(37, 'Pengeluaran per bulan', 4, 'Cost'),
(38, 'Jangka waktu', 3, 'Benefit');

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
(163, 32, 1, 204),
(164, 33, 1, 207),
(165, 34, 1, 216),
(166, 35, 1, 217),
(167, 36, 1, 222),
(168, 37, 1, 230),
(169, 38, 1, 233),
(170, 32, 6, 205),
(171, 33, 6, 209),
(172, 34, 6, 215),
(173, 35, 6, 220),
(174, 36, 6, 223),
(175, 37, 6, 229),
(176, 38, 6, 232),
(177, 32, 7, 206),
(178, 33, 7, 210),
(179, 34, 7, 215),
(180, 35, 7, 218),
(181, 36, 7, 223),
(182, 37, 7, 230),
(183, 38, 7, 234),
(184, 32, 10, 205),
(185, 33, 10, 209),
(186, 34, 10, 216),
(187, 35, 10, 221),
(188, 36, 10, 224),
(189, 37, 10, 228),
(190, 38, 10, 236),
(191, 32, 11, 206),
(192, 33, 11, 211),
(193, 34, 11, 214),
(194, 35, 11, 219),
(195, 36, 11, 226),
(196, 37, 11, 227),
(197, 38, 11, 235);

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
(157, 23, 'C1 - 11', 2),
(158, 23, 'C1 - 2', 2),
(159, 23, 'C1 - 3', 3),
(160, 23, '', 1),
(161, 23, '', 1),
(162, 24, 'Pedagang', 1),
(163, 24, 'Nelayan', 2),
(164, 24, 'C1 - 1', 3),
(165, 24, 'Pedagang', 4),
(166, 24, 'Nelayan', 5),
(167, 25, '> 10 tahun', 1),
(168, 25, '> 10 tahun', 5),
(169, 25, 'Nelayan', 7),
(170, 25, '', 1),
(171, 25, '', 1),
(172, 26, 'Pedagang', 1),
(173, 26, 'Nelayan', 2),
(174, 26, 'Dokter', 3),
(175, 26, 'Dosen', 4),
(176, 26, 'TNI', 5),
(177, 27, '> 10 tahun', 1),
(178, 27, '> 20 tahun', 2),
(179, 27, '> 30 tahun', 3),
(180, 27, '> 40 tahun', 4),
(181, 27, '> 50 tahun', 5),
(182, 28, 'Pedagang', 1),
(183, 28, 'Nelayan', 2),
(184, 28, 'Dokter', 3),
(185, 28, 'Dosen', 4),
(186, 28, 'TNI', 7),
(187, 29, 'Dosen', 1),
(188, 29, 'Nelayan', 2),
(189, 29, 'Dokter', 3),
(190, 29, 'PNS', 4),
(191, 29, 'Guru', 5),
(192, 30, '> 10 tahun', 10),
(193, 30, '> 20 tahun', 20),
(194, 30, '> 30 tahun', 30),
(195, 30, '> 40 tahun', 40),
(196, 30, '> 50 tahun', 50),
(197, 31, '', 1),
(198, 31, '', 1),
(199, 31, '', 1),
(200, 31, '', 1),
(201, 31, '', 1),
(202, 32, '1.000.000 - 6.999.999', 1),
(203, 32, '7.000.000 - 11.999.999', 2),
(204, 32, '13.000.000 - 24.999.999', 3),
(205, 32, '25.000.000 - 49.999.999', 4),
(206, 32, '>50.000.000', 5),
(207, 33, '≥2.000.000', 1),
(208, 33, '≥10.000.000', 2),
(209, 33, '≥25.000.000', 3),
(210, 33, '≥50.000.0000', 4),
(211, 33, '≥100.000.000', 5),
(212, 34, '>17 thn', 1),
(213, 34, '>25 thn', 2),
(214, 34, '>30 thn ', 3),
(215, 34, '>40 thn', 4),
(216, 34, '>50 thn', 5),
(217, 35, 'petani/buruh', 1),
(218, 35, 'TNI/POLISI', 2),
(219, 35, 'wirausaha/wiraswasta', 3),
(220, 35, 'PNS ', 4),
(221, 35, 'Dokter', 5),
(222, 36, '≥2.000.000', 1),
(223, 36, '≥5.000.000', 2),
(224, 36, '≥15.000.000', 3),
(225, 36, '≥30.000.000', 4),
(226, 36, '≥50.000.000', 5),
(227, 37, '>20.000.000', 1),
(228, 37, '>15.000.000 ', 2),
(229, 37, '>10.000.000', 3),
(230, 37, '>5.000.000', 4),
(231, 37, '>3.000.000', 5),
(232, 38, '1-6 bln', 1),
(233, 38, '7-12 bln', 2),
(234, 38, '13-24 bln', 3),
(235, 38, '24-36 bln', 4),
(236, 38, '>36 bln', 5),
(237, 39, 'test1', 1),
(238, 39, 'tse2', 1),
(239, 39, 'test', 1),
(240, 39, 'test', 1),
(241, 39, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password`, `username`) VALUES
(1, '$2y$10$XvM.zP6/7NDhrzVRNKYCOe3QmwH/Apw3a1YJBB4M8nCgwLqK530a6', 'admin');

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
  MODIFY `id_cln_nsb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
