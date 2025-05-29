-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 29, 2025 at 05:39 PM
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
-- Database: `pwd`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_wisata`
--

CREATE TABLE `booking_wisata` (
  `id` int(11) NOT NULL,
  `nama_pengunjung` varchar(100) DEFAULT NULL,
  `tanggal_kunjungan` date DEFAULT NULL,
  `jumlah_orang` int(11) DEFAULT NULL,
  `jenis_wisata` varchar(50) DEFAULT NULL,
  `layanan_tambahan` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_wisata`
--

INSERT INTO `booking_wisata` (`id`, `nama_pengunjung`, `tanggal_kunjungan`, `jumlah_orang`, `jenis_wisata`, `layanan_tambahan`, `keterangan`) VALUES
(1, 'Riyadhy', '2025-05-29', 4, 'Air Terjun', 'Pemandu, Makan Siang, Asuransi', 'aku anaksehat'),
(2, 'Riyadhy', '2025-05-29', 4, 'Gunung', '', ''),
(3, 'Riyadi', '2025-05-28', 6, 'Pantai', 'Pemandu, Makan Siang, Asuransi', 'Saya Anak Pantai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_wisata`
--
ALTER TABLE `booking_wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_wisata`
--
ALTER TABLE `booking_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
