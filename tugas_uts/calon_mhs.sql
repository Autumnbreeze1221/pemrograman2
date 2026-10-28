-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2026 at 01:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lat_dbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_mhs`
--

CREATE TABLE `calon_mhs` (
  `id` int(11) NOT NULL,
  `tgl_input` date NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `asal_sekolah` varchar(150) NOT NULL,
  `pekerjaan_ortu` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `mat` int(11) NOT NULL,
  `bing` int(11) NOT NULL,
  `umum` int(11) NOT NULL,
  `rata_rata` decimal(5,2) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tempat_tes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calon_mhs`
--

INSERT INTO `calon_mhs` (`id`, `tgl_input`, `kode`, `nama`, `jk`, `asal_sekolah`, `pekerjaan_ortu`, `tempat_lahir`, `tgl_lahir`, `mat`, `bing`, `umum`, `rata_rata`, `keterangan`, `tempat_tes`) VALUES
(2, '2025-10-23', 'A1', 'Amesha Afrian', 'Laki-Laki', 'smk fadilah', 'pengangguran', 'tkw', '2005-04-10', 75, 80, 80, 78.33, 'Lulus', 'Gedung A'),
(3, '2026-10-25', 'A3', 'Muhammad Raihan', 'Laki-Laki', 'SMK BISTEK', 'PNS', 'tangerang', '2005-10-23', 90, 90, 90, 90.00, 'Lulus', 'Gedung A'),
(4, '0006-10-26', 'A4', 'Rafi Alridwan', 'Laki-Laki', 'SMK NEGERI 4 PARUNG', 'Crazy rich', 'CISAUK', '2000-09-12', 33, 17, 67, 39.00, 'Tidak Lulus', 'Gedung A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_mhs`
--
ALTER TABLE `calon_mhs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_mhs`
--
ALTER TABLE `calon_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
