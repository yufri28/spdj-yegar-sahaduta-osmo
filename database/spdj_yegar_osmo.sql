-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 09:12 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spdj_yegar_osmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nij` char(9) NOT NULL,
  `nkj` char(7) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(12) DEFAULT NULL,
  `pendidikan_terakhir` varchar(255) DEFAULT NULL,
  `status_dalam_kel` varchar(200) NOT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `kode_rayon` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nij`, `nkj`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan_terakhir`, `status_dalam_kel`, `pekerjaan`, `kode_rayon`) VALUES
('040400101', '0404001', 'Samuel Hilli', 'Kupang', '1972-12-21', 'Laki-Laki', 'SD', 'Kepala Keluarga', 'WIRASWASTA', '0404'),
('040400102', '0404001', 'Sarlota Hilli-Le\'u', 'Kupang', '1976-09-15', 'Perempuan', 'SD', 'Istri', 'IBU RUMAH TANGGA', '0404'),
('040400103', '0404001', 'Briliant Excel Hilli', 'Kupang', '2007-07-07', 'Laki-Laki', 'SD', 'Anak', 'PELAJAR', '0404'),
('040400201', '0404002', 'Antonius Smaut', 'Oefafi', '1968-08-01', 'Laki-Laki', 'SMA/SMK', 'Kepala Keluarga', 'WIRASWASTA', '0404'),
('040400203', '0404002', 'Gilbert Smaut', 'Kupang', '2000-01-17', 'Laki-Laki', 'SMA/SMK', 'Anak', 'PELAJAR', '0404');

-- --------------------------------------------------------

--
-- Table structure for table `tb_baptis`
--

CREATE TABLE `tb_baptis` (
  `id` int(11) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `tanggal_baptis` date NOT NULL,
  `nij` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluarga`
--

CREATE TABLE `tb_keluarga` (
  `nkj` char(7) NOT NULL,
  `nik` char(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kode_rayon` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keluarga`
--

INSERT INTO `tb_keluarga` (`nkj`, `nik`, `password`, `kode_rayon`) VALUES
('0404001', '5314072806990002', '$2y$10$1qw0xWUUiVg8Ws4AuZZ8jeN2WQO7CA2TqT0ngtaVidzSN26C3k0Vy', '0404'),
('0404002', '5314072806990009', '$2y$10$1Rl7gDDt2mIJQF2KbVPXOOt0FK/F6kH/88fz6QcviBulrln2auez.', '0404');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nikah`
--

CREATE TABLE `tb_nikah` (
  `id` int(11) NOT NULL,
  `nij_kepala_keluarga` char(9) NOT NULL,
  `tempat_nikah` varchar(255) DEFAULT NULL,
  `tanggal_nikah` date DEFAULT NULL,
  `nij_istri` char(9) DEFAULT NULL,
  `nkj` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rayon`
--

CREATE TABLE `tb_rayon` (
  `kode_rayon` char(4) NOT NULL,
  `nama_rayon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rayon`
--

INSERT INTO `tb_rayon` (`kode_rayon`, `nama_rayon`) VALUES
('0101', 'Rayon I'),
('0202', 'Rayon II'),
('0303', 'Rayon III'),
('0404', 'Rayon IV'),
('0505', 'Rayon V'),
('0606', 'Rayon VI'),
('0707', 'Rayon VII'),
('0808', 'Rayon VIII'),
('0909', 'Rayon IX'),
('1010', 'Rayon X');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sidi`
--

CREATE TABLE `tb_sidi` (
  `id` int(11) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `tanggal_sidi` date NOT NULL,
  `nij` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nij`),
  ADD KEY `kode_rayon` (`kode_rayon`),
  ADD KEY `nkj` (`nkj`);

--
-- Indexes for table `tb_baptis`
--
ALTER TABLE `tb_baptis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nij` (`nij`);

--
-- Indexes for table `tb_keluarga`
--
ALTER TABLE `tb_keluarga`
  ADD PRIMARY KEY (`nkj`),
  ADD KEY `kode_rayon` (`kode_rayon`);

--
-- Indexes for table `tb_nikah`
--
ALTER TABLE `tb_nikah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nij_kepala_keluarga` (`nij_kepala_keluarga`),
  ADD KEY `nij_istri` (`nij_istri`);

--
-- Indexes for table `tb_rayon`
--
ALTER TABLE `tb_rayon`
  ADD PRIMARY KEY (`kode_rayon`);

--
-- Indexes for table `tb_sidi`
--
ALTER TABLE `tb_sidi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nij` (`nij`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_baptis`
--
ALTER TABLE `tb_baptis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nikah`
--
ALTER TABLE `tb_nikah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sidi`
--
ALTER TABLE `tb_sidi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`kode_rayon`) REFERENCES `tb_rayon` (`kode_rayon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_3` FOREIGN KEY (`nkj`) REFERENCES `tb_keluarga` (`nkj`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_baptis`
--
ALTER TABLE `tb_baptis`
  ADD CONSTRAINT `tb_baptis_ibfk_1` FOREIGN KEY (`nij`) REFERENCES `tb_anggota` (`nij`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_keluarga`
--
ALTER TABLE `tb_keluarga`
  ADD CONSTRAINT `tb_keluarga_ibfk_1` FOREIGN KEY (`kode_rayon`) REFERENCES `tb_rayon` (`kode_rayon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_nikah`
--
ALTER TABLE `tb_nikah`
  ADD CONSTRAINT `tb_nikah_ibfk_1` FOREIGN KEY (`nij_kepala_keluarga`) REFERENCES `tb_anggota` (`nij`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nikah_ibfk_2` FOREIGN KEY (`nij_istri`) REFERENCES `tb_anggota` (`nij`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sidi`
--
ALTER TABLE `tb_sidi`
  ADD CONSTRAINT `tb_sidi_ibfk_1` FOREIGN KEY (`nij`) REFERENCES `tb_anggota` (`nij`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
