-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 04:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

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
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot_kriteria` float NOT NULL,
  `ket_kriteria` enum('Benefit','Cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `ket_kriteria`) VALUES
(54, 'Jaminan', 25, 'Benefit'),
(55, 'Penghasilan Per Bulan', 20, 'Benefit'),
(56, 'Pekerjaan', 15, 'Benefit'),
(57, 'Besar Pinjaman', 10, 'Benefit'),
(58, 'Tanggungan', 10, 'Cost'),
(59, 'Usia', 10, 'Benefit'),
(60, 'Jangka Waktu', 10, 'Cost');

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
  `selesai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nsb`, `nama_nsb`, `no_kk`, `no_nik`, `tempat_lahir`, `tgl_lahir`, `alamat`, `agama`, `email`, `no_tlp`, `jenis_kelamin`, `periode`, `selesai`) VALUES
(39, 'A1', '377369384223232323', '23432423542324', 'mataram', '1994-04-04', 'denpasar', 'Hindu', 'tryfghf@fhjgbjkhlk', '097870798798697', 'Pria', '2023-03-28', 0),
(40, 'A2', '890764781639079823', '0174896237673871', 'Jakarta', '1997-07-03', 'Klungkung', 'Hindu', '65675ghjgvhjgh@gmail.com', '0978675612221', 'Pria', '1998-04-23', 0),
(41, 'A3', '09789678538756', '6732587298172122', 'Banjarmasin', '1975-09-24', 'Gianyar', 'Hindu', 'djhbxzkjbzxnm@gmail.com', '0998675381311', 'Wanita', '2023-03-03', 0),
(42, 'A4', '081293729862981', '14561358768912', 'Denpasar', '1975-05-03', 'Denpasar', 'Hindu', 'hjsghjdsavjzh@gmail.com', '0989728672131', 'Pria', '2023-03-03', 0),
(43, 'A5', '210874698233232', '79816738719823', 'Karangasem', '1986-07-15', 'Denpasar', 'Hindu', 'vdjhaghj@gmail.com', '089786757111', 'Wanita', '2023-02-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_nsb` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_kriteria`, `id_nsb`, `id_subkriteria`) VALUES
(450, 54, 39, 305),
(451, 55, 39, 310),
(452, 56, 39, 314),
(453, 57, 39, 317),
(454, 58, 39, 324),
(455, 59, 39, 325),
(456, 60, 39, 331),
(457, 54, 40, 307),
(458, 55, 40, 311),
(459, 56, 40, 314),
(460, 57, 40, 320),
(461, 58, 40, 324),
(462, 59, 40, 327),
(463, 60, 40, 331),
(464, 54, 41, 306),
(465, 55, 41, 310),
(466, 56, 41, 313),
(467, 57, 41, 320),
(468, 58, 41, 321),
(469, 59, 41, 328),
(470, 60, 41, 332),
(471, 54, 42, 308),
(472, 55, 42, 309),
(473, 56, 42, 315),
(474, 57, 42, 319),
(475, 58, 42, 323),
(476, 59, 42, 326),
(477, 60, 42, 330),
(478, 54, 43, 306),
(479, 55, 43, 312),
(480, 56, 43, 316),
(481, 57, 43, 317),
(482, 58, 43, 322),
(483, 59, 43, 325),
(484, 60, 43, 332);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `ket` varchar(45) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `id_kriteria`, `ket`, `nilai`) VALUES
(305, 54, 'BPKB Motor', 1),
(306, 54, 'BPKB Mobil', 2),
(307, 54, 'Sertifikat Bangunan', 3),
(308, 54, 'Sertifikat Tanah', 4),
(309, 55, '<1.000.000 - 2.0000.000', 1),
(310, 55, '>2.00.000 - 5.000.000', 2),
(311, 55, '>5.000.000 - 10.000.000', 3),
(312, 55, '>10.000.000', 4),
(313, 56, 'Tidak Tetap', 1),
(314, 56, 'Buruh', 2),
(315, 56, 'Swasta/wiraswasta', 3),
(316, 56, 'PNS', 4),
(317, 57, '>1.000.000 - 2.999.999', 1),
(318, 57, '3.00.000 - 6.999.999', 2),
(319, 57, '7.000.000 - 14.999.999', 3),
(320, 57, '> 15.000.000', 4),
(321, 58, '1-2', 4),
(322, 58, '3-6', 3),
(323, 58, '7-10', 2),
(324, 58, '> 10', 1),
(325, 59, '17-20', 1),
(326, 59, '21-30', 2),
(327, 59, '31-50', 3),
(328, 59, '>50 tahun', 4),
(329, 60, '12', 4),
(330, 60, '24', 3),
(331, 60, '36', 2),
(332, 60, '48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','kepala_lpd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nsb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;

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
