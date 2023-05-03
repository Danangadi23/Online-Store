-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2022 at 08:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokopenjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(26, 20, 11, 1, '', 0, 0, 0, 0),
(27, 21, 12, 1, '', 0, 0, 0, 0),
(28, 21, 11, 1, '', 0, 0, 0, 0),
(29, 21, 13, 2, '', 0, 0, 0, 0),
(30, 21, 14, 1, '', 0, 0, 0, 0),
(31, 21, 15, 1, '', 0, 0, 0, 0),
(32, 22, 12, 1, '', 0, 0, 0, 0),
(33, 23, 11, 1, '', 0, 0, 0, 0),
(34, 30, 11, 2, 'Headset', 200000, 90, 180, 400000),
(35, 30, 12, 1, 'Monitor', 6000000, 34, 34, 6000000),
(36, 30, 13, 1, 'Keyboard', 3000000, 300, 300, 3000000),
(37, 31, 11, 1, 'Headset', 200000, 90, 90, 200000),
(38, 31, 12, 1, 'Monitor', 6000000, 34, 34, 6000000),
(39, 31, 13, 1, 'Keyboard', 3000000, 300, 300, 3000000),
(40, 32, 11, 1, 'Headset', 200000, 90, 90, 200000),
(41, 33, 12, 1, 'Monitor', 6000000, 34, 34, 6000000),
(42, 34, 11, 1, 'Headset', 200000, 90, 90, 200000),
(43, 35, 11, 1, 'Headset', 200000, 90, 90, 200000),
(44, 36, 11, 2, 'Headset', 200000, 90, 180, 400000),
(45, 36, 12, 10, 'Monitor', 6000000, 34, 340, 60000000),
(46, 37, 11, 1, 'Headset', 200000, 90, 90, 200000),
(47, 38, 12, 1, 'Monitor', 6000000, 34, 34, 6000000),
(48, 39, 13, 1, 'Keyboard', 3000000, 300, 300, 3000000),
(49, 40, 12, 1, 'Monitor', 6000000, 34, 34, 6000000),
(50, 41, 12, 1, 'Monitor', 6000000, 34, 34, 6000000),
(51, 42, 15, 1, 'VGA GTX 3050', 26000000, 200, 200, 26000000),
(52, 43, 11, 2, 'Headset', 200000, 90, 180, 400000),
(53, 44, 11, 3, 'Headset', 200000, 90, 270, 600000),
(54, 45, 11, 3, 'Headset', 200000, 90, 270, 600000),
(55, 46, 11, 3, 'Headset', 200000, 90, 270, 600000),
(56, 47, 15, 1, 'VGA GTX 3050', 26000000, 200, 200, 26000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
