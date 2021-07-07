-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 11:00 AM
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
  `no_kk` int(11) NOT NULL,
  `no_nik` int(11) NOT NULL,
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
(1, 'Ketut berhasil 1', 2147483647, 2147483647, 'Denpasar', '2021-07-14', 'Alamat adalah alamat', 'Hindu', 'naufalsugiarto832@tutanota.com', '0863520098031', 'Pria', '2021-07-19'),
(6, 'Ketut gagal 2', 2147483647, 2147483647, 'Denpasar', '2021-07-14', 'Alamat saya ada disni', 'Hindu', 'tokohp90@gmail.com', '086352123467', 'Pria', '2021-05-01'),
(7, 'Elit Global 3', 2147483647, 2147483647, 'Denpasar', '2021-01-04', 'Alamat adalah', 'Buddha', 'gibran.ganendra567@icloud.com', '08635200909123', 'Pria', '2020-02-01'),
(8, 'Nama test 4', 2147483647, 2147483647, 'Tanggal', '2021-06-29', 'Alamat adalah', 'Hindu', 'naufalsugiarto832@tutanota.com', '0863523413', 'Pria', '2021-11-01');

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
(28, 'pekerjaan', 0.12, 'Benefit');

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
(119, 26, 1, 175),
(120, 27, 1, 181),
(121, 28, 7, 185);

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
(186, 28, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `password` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_cln_nsb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
