-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2024 at 05:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warungsteak`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `ID_ANTRIAN` int(11) NOT NULL,
  `NAMA` varchar(32) NOT NULL,
  `NO_MEJA` int(11) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `STATUS` int(1) NOT NULL,
  `ID_KARYAWAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`ID_ANTRIAN`, `NAMA`, `NO_MEJA`, `TANGGAL`, `STATUS`, `ID_KARYAWAN`) VALUES
(10, 'ganjar', 16, '2024-06-11 12:27:29', 2, 15),
(11, 'dinasti', 2, '2024-06-11 17:14:21', 2, 15),
(12, 'ALFA', 6, '2024-06-11 17:16:49', 2, 15),
(13, 'samsul', 6, '2024-06-11 17:37:42', 2, 15),
(14, 'ALFA', 6, '2024-06-11 17:47:14', 2, 15),
(15, 'jokowi', 6, '2024-06-11 17:48:32', 2, 16),
(16, 'owo', 1, '2024-06-12 14:51:15', 2, 15),
(17, 'jokowi', 6, '2024-06-12 19:32:50', 2, 16),
(18, 'samsul', 1, '2024-06-12 19:41:35', 2, 15),
(19, 'owo', 2, '2024-06-12 20:10:23', 2, 15),
(20, 'ALFA', 6, '2024-06-12 20:49:41', 2, 15),
(21, 'owo', 1, '2024-06-12 20:50:31', 2, 15),
(22, 'dcdfc', 3, '2024-06-12 21:01:03', 2, 15),
(23, 'ALFA', 6, '2024-06-12 21:51:05', 0, 15),
(24, 'owo', 1, '2024-06-12 21:51:22', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `ID_KARYAWAN` int(11) NOT NULL,
  `NAMA_KARYAWAN` varchar(225) DEFAULT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `NO_HP_KARYAWAN` int(11) DEFAULT NULL,
  `PASSWORD` varchar(32) NOT NULL,
  `ROLE_ID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`ID_KARYAWAN`, `NAMA_KARYAWAN`, `USERNAME`, `NO_HP_KARYAWAN`, `PASSWORD`, `ROLE_ID`) VALUES
(6, 'JOKOWI', '', 88335, '', 0),
(7, 'PRABOWOOO', '', 666, '', 0),
(8, 'SPREI', 'sprei', 121323, '0a95b5ce0fcf38cae55356b223c292', 0),
(11, 'nadiem', 'ukt', 66666, 'fafa790445f821b779493db055e2cd', 0),
(13, 'SAMSUL', 'jibran', 8833523, '7d00ff54a263fe80825b9297804a98', 0),
(14, 'amba', 'tukam', 55555, '97ca97313d0100a4c9398957a245d1', 2),
(15, 'pbl', 'admin', 812345789, '098f6bcd4621d373cade4e832627b4f6', 1),
(16, 'subli', 'subli', 121323, 'e464416cc7f81c52c8f9e482da8db509', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID_MENU` int(11) NOT NULL,
  `NAMA_MENU` varchar(225) DEFAULT NULL,
  `HARGA` bigint(20) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID_MENU`, `NAMA_MENU`, `HARGA`, `STOK`, `FOTO`) VALUES
(1, 'TESTTT ko', 1000, 10, 'download.jpeg'),
(2, '10000', 1000, 10, '1.jpeg'),
(3, 'SATE KAMBING', 10000, 7, '1.jpeg'),
(55, 'TESTTT ko', 25000, 15, '__(1).jpeg'),
(56, ' Chicken BBQ Grill', 45000, 30, 'BBQ_GRILL.png'),
(57, 'STEAK', 1000, 5, '_1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `ID_PESANAN` int(11) NOT NULL,
  `ID_ANTRIAN` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `NAMA_MENU` varchar(30) NOT NULL,
  `JUMLAH` int(3) NOT NULL,
  `HARGA` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`ID_PESANAN`, `ID_ANTRIAN`, `ID_MENU`, `NAMA_MENU`, `JUMLAH`, `HARGA`) VALUES
(14, 10, 1, 'TESTTT ko', 1, 1000),
(15, 10, 2, '10000', 1, 1000),
(16, 11, 1, 'TESTTT ko', 1, 1000),
(17, 11, 55, 'TESTTT ko', 1, 25000),
(18, 11, 3, 'SATE KAMBING', 1, 10000),
(19, 11, 56, ' Chicken BBQ Grill', 1, 45000),
(20, 12, 56, ' Chicken BBQ Grill', 2, 45000),
(21, 12, 3, 'SATE KAMBING', 1, 10000),
(22, 13, 3, 'SATE KAMBING', 1, 10000),
(23, 14, 2, '10000', 1, 1000),
(24, 15, 1, 'TESTTT ko', 1, 1000),
(25, 16, 1, 'TESTTT ko', 2, 1000),
(26, 17, 1, 'TESTTT ko', 1, 1000),
(27, 18, 1, 'TESTTT ko', 1, 1000),
(28, 19, 2, '10000', 2, 1000),
(29, 19, 1, 'TESTTT ko', 1, 1000),
(30, 19, 56, ' Chicken BBQ Grill', 1, 45000),
(31, 19, 57, 'STEAK', 1, 1000),
(32, 19, 3, 'SATE KAMBING', 1, 10000),
(33, 20, 1, 'TESTTT ko', 1, 1000),
(34, 21, 56, ' Chicken BBQ Grill', 1, 45000),
(35, 22, 56, ' Chicken BBQ Grill', 1, 45000),
(36, 23, 1, 'TESTTT ko', 1, 1000),
(37, 23, 2, '10000', 1, 1000),
(38, 23, 56, ' Chicken BBQ Grill', 1, 45000),
(39, 24, 55, 'TESTTT ko', 2, 25000),
(40, 24, 2, '10000', 1, 1000),
(41, 24, 3, 'SATE KAMBING', 1, 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`ID_ANTRIAN`),
  ADD KEY `FK_DIPESAN` (`ID_KARYAWAN`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`ID_KARYAWAN`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_MENU`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID_PESANAN`),
  ADD KEY `FK_MEMILIKI` (`ID_ANTRIAN`),
  ADD KEY `FK_MEMESAN` (`ID_MENU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `ID_ANTRIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `ID_KARYAWAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID_PESANAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `FK_DIPESAN` FOREIGN KEY (`ID_KARYAWAN`) REFERENCES `karyawan` (`ID_KARYAWAN`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `FK_MEMESAN` FOREIGN KEY (`ID_MENU`) REFERENCES `menu` (`ID_MENU`),
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_ANTRIAN`) REFERENCES `antrian` (`ID_ANTRIAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
