-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2020 at 11:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codePHP`
--

-- --------------------------------------------------------

--
-- Table structure for table `BookingData`
--

CREATE TABLE `BookingData` (
  `partId` int(11) NOT NULL,
  `employeeName` varchar(128) DEFAULT NULL,
  `employeeEmail` varchar(128) DEFAULT NULL,
  `eventId` int(11) DEFAULT NULL,
  `eventName` varchar(128) DEFAULT NULL,
  `participationFee` varchar(128) DEFAULT NULL,
  `eventDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `BookingData`
--

INSERT INTO `BookingData` (`partId`, `employeeName`, `employeeEmail`, `eventId`, `eventName`, `participationFee`, `eventDate`) VALUES
(1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0', '2019-09-04'),
(2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'International PHP Conference', '1485.99', '2019-10-21'),
(3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'International PHP Conference', '657.50', '2019-10-21'),
(4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0', '2019-09-04'),
(5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'PHP 7 crash course', '0', '2019-09-04'),
(6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'International PHP Conference', '657.50', '2019-10-21'),
(7, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 3, 'code.talks', '474.81', '2019-10-24'),
(8, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 3, 'code.talks', '534.31', '2019-10-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BookingData`
--
ALTER TABLE `BookingData`
  ADD PRIMARY KEY (`partId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
