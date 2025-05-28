-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 07:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwd2`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_validasi`
--

CREATE TABLE `form_validasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` int(11) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `pekerjaan` enum('Pelajar','Mahasiswa','Pekerja') NOT NULL,
  `negara` varchar(50) DEFAULT NULL,
  `hobi` text DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `setuju` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_validasi`
--

INSERT INTO `form_validasi` (`id`, `nama`, `umur`, `gender`, `pekerjaan`, `negara`, `hobi`, `komentar`, `setuju`, `created_at`) VALUES
(1, 'sonia', 1, 'Perempuan', 'Mahasiswa', 'Indonesia', 'Membaca', 'haloo', 1, '2025-05-28 04:42:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_validasi`
--
ALTER TABLE `form_validasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_validasi`
--
ALTER TABLE `form_validasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
