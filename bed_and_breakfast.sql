-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 09:23 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bed_and_breakfast`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationNumber` int(11) NOT NULL,
  `firstName` varchar(7) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `specialRequests` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `numPeople` int(11) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `bedding` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationNumber`, `firstName`, `lastName`, `room`, `startDate`, `endDate`, `specialRequests`, `email`, `numPeople`, `phone`, `bedding`) VALUES
(60, 'TEST1', 'TEST1', 'deluxe', '2018-12-08', '2018-12-10', '', 'TEST1', 2, 'TEST1', 'double-bed'),
(61, 'TEST3', 'TEST3', 'deluxe', '2018-12-15', '2018-12-15', '', 'TEST3', 2, 'TEST3', 'double-bed'),
(62, 'TEST30', 'TEST30', 'Zuri-zimmer', '2018-12-15', '2018-12-15', '', 'TEST30', 2, 'TEST30', 'double-bed');

-- --------------------------------------------------------

--
-- Table structure for table `roombookings`
--

CREATE TABLE `roombookings` (
  `reservationID` int(11) NOT NULL,
  `room` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roombookings`
--

INSERT INTO `roombookings` (`reservationID`, `room`, `date`) VALUES
(60, 'deluxe', '2018-12-08'),
(60, 'deluxe', '2018-12-09'),
(60, 'deluxe', '2018-12-10'),
(61, 'deluxe', '2018-12-15'),
(62, 'Zuri-zimmer', '2018-12-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
