-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2025 at 09:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udinus`
--

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `umur` int DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(1000) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `jk` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `hobi` varchar(500) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nim`, `nama`, `no_hp`, `umur`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kota`, `jk`, `status`, `hobi`, `email`, `pass`) VALUES
(1, 'A12.2024.07239', 'Jolang Alif Khan', '0882006787460', 22, 'Pati', '1997-07-10', 'Ds. Kudur, RT.04/RW.03, Kec. Winong, Kab. Pati. Jawa Tengah.', 'Jakarta', 'Laki-laki', '', 'Olahraga', 'jolangalif@gmail.com', '$2y$10$95VbKTpW9ocMnJVOVq0RwOLnDu5sou8yUakPfkWkW/l2em3xLiZKy'),
(2, 'A12.2020.05233', 'Pedri Jono', '081222854209', 21, 'Kudus', '2025-12-10', 'Kec. Barcelona, Ds. Spanyol, RT 02/ RW 10, Jawa Tengah.', 'Semarang', 'Laki-laki', '', 'Olahraga, Gaming', 'pedrijono@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
