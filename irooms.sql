-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 05:16 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irooms`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `idBooking` char(8) NOT NULL,
  `noKamar` int(11) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`idBooking`, `noKamar`, `checkIn`, `checkOut`) VALUES
('V2RR5015', 101, '2021-08-07', '2021-08-08'),
('V2RR5015', 108, '2021-08-28', '2021-08-31'),
('V2RR5015', 113, '2021-09-09', '2021-09-15'),
('V2RR5024', 113, '2021-09-28', '2021-10-05'),
('V2RR5030', 108, '2021-09-01', '2021-09-03'),
('V2RR5090', 123, '2021-10-07', '2021-10-11'),
('V2RR5096', 123, '2021-11-02', '2021-11-09'),
('V2RR5097', 112, '2021-11-25', '2021-11-26'),
('V2RR5097', 113, '2021-12-02', '2021-12-04'),
('V2RR5099', 108, '2021-12-22', '2021-12-24'),
('V2RR5100', 101, '2021-12-28', '2021-12-29'),
('V2RR5100', 113, '2021-12-28', '2021-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `fda`
--

CREATE TABLE `fda` (
  `idFDA` char(3) NOT NULL,
  `namaFDA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fda`
--

INSERT INTO `fda` (`idFDA`, `namaFDA`) VALUES
('P01', 'Rina'),
('P02', 'Jonny'),
('P03', 'Maria'),
('P04', 'Rizal'),
('P08', 'Rendy');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `alamatHotel` varchar(100) NOT NULL,
  `namaHotel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`alamatHotel`, `namaHotel`) VALUES
('No. 10, Candi Winangun, Sleman', 'iRooms');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `noKamar` int(11) NOT NULL,
  `jenisKamar` varchar(10) NOT NULL,
  `hargaKamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`noKamar`, `jenisKamar`, `hargaKamar`) VALUES
(101, 'double', 77000),
(108, 'double', 77000),
(112, 'twin', 80000),
(113, 'single', 64000),
(123, 'single', 64000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `idPemesan` int(11) NOT NULL,
  `namaPemesan` varchar(30) NOT NULL,
  `contactPemesan` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`idPemesan`, `namaPemesan`, `contactPemesan`) VALUES
(1, 'Barry', '08990625075'),
(2, 'Yolanda', '08267456661'),
(3, 'MinHan', '08113415677'),
(6, 'Kenji', '06678182888'),
(7, 'Juan', '06667991023');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idBooking` char(8) NOT NULL,
  `idPemesan` int(11) NOT NULL,
  `idFDA` char(3) NOT NULL,
  `alamatHotel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`idBooking`, `idPemesan`, `idFDA`, `alamatHotel`) VALUES
('V2RR5015', 1, 'P01', 'No. 10, Candi Winangun, Sleman'),
('V2RR5024', 3, 'P02', 'No. 10, Candi Winangun, Sleman'),
('V2RR5030', 2, 'P04', 'No. 10, Candi Winangun, Sleman'),
('V2RR5090', 3, 'P04', 'No. 10, Candi Winangun, Sleman'),
('V2RR5096', 7, 'P08', 'No. 10, Candi Winangun, Sleman'),
('V2RR5097', 6, 'P03', 'No. 10, Candi Winangun, Sleman'),
('V2RR5099', 3, 'P04', 'No. 10, Candi Winangun, Sleman'),
('V2RR5100', 1, 'P01', 'No. 10, Candi Winangun, Sleman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`idBooking`,`noKamar`),
  ADD KEY `FKnoKamar` (`noKamar`);

--
-- Indexes for table `fda`
--
ALTER TABLE `fda`
  ADD PRIMARY KEY (`idFDA`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`alamatHotel`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`noKamar`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`idPemesan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idBooking`),
  ADD KEY `FKidPemesan` (`idPemesan`),
  ADD KEY `FKidFDA` (`idFDA`),
  ADD KEY `FKalamatHotel` (`alamatHotel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `idPemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `FKidBooking` FOREIGN KEY (`idBooking`) REFERENCES `pemesanan` (`idBooking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKnoKamar` FOREIGN KEY (`noKamar`) REFERENCES `kamar` (`noKamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `FKalamatHotel` FOREIGN KEY (`alamatHotel`) REFERENCES `hotel` (`alamatHotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKidFDA` FOREIGN KEY (`idFDA`) REFERENCES `fda` (`idFDA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKidPemesan` FOREIGN KEY (`idPemesan`) REFERENCES `pemesan` (`idPemesan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
