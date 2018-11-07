-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2018 at 08:10 PM
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
  `userName` varchar(7) NOT NULL,
  `room` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `specialRequests` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationNumber`, `userName`, `room`, `startDate`, `endDate`, `specialRequests`) VALUES
(1, 'eKrizan', 'A', '2018-11-17', '2018-11-19', 'Peanut Allergy'),
(2, 'hJohns', '', '2018-11-24', '2018-11-28', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userName` varchar(7) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `addressLn1` varchar(200) NOT NULL,
  `addressLn2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(5) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`userName`, `f_name`, `l_name`, `phoneNumber`, `addressLn1`, `addressLn2`, `city`, `state`, `zip`, `password`) VALUES
('eKrizan', 'Emily', 'Krizan', '218-555-55555', '1234 Lane', '', 'Menomonie', 'WI', 54751, ''),
('hJohns', 'Heather', 'Johnson', '715-555-7891', 'ABC Street', 'Apt #5', 'Eau Claire', 'Wisconsin', 54701, ''),
('jFehr', 'Jon', 'Fehr', '715-555-1234', '1536 Maple Ln', '', 'Eau Claire', 'Wisconsin', 54703, ''),
('tKretsc', 'Tyler', 'Kretschmer', '715-555-4561', '1537th 540 Street ', 'Apt #2', 'Elk Mound', 'Wisconsin', 55713, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationNumber`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
