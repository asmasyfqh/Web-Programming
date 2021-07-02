-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 05:35 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grouptour`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactID` int(11) NOT NULL,
  `phone` int(16) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactID`, `phone`, `email`) VALUES
(2, 111111111, 'hello@gmail.com'),
(4, 222222222, 'sher@gmail.com'),
(7, 123456789, 'syazni@gmail.com'),
(9, 179273893, 'fatin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `participantID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `gender` text NOT NULL,
  `passportNum` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` text NOT NULL,
  `dietRestriction` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`participantID`, `firstname`, `lastname`, `dateOfBirth`, `gender`, `passportNum`, `address`, `country`, `dietRestriction`) VALUES
(2, 'Asma', 'Syafiqah', '1997-07-19', 'female', 987654321, 'UNIMAS', 'malaysia', 'Chilli'),
(4, 'sherlock', 'Holmes', '2015-02-18', 'male', 2147483647, 'Baker Street', 'malaysia', 'Nicotine'),
(7, 'syazni', 'jaslan', '0000-00-00', 'female', 2147483647, 'Universiti Malaysia Sarawak', 'malaysia', 'N/A'),
(9, 'Fatin', 'Afiqah', '1997-12-22', 'female', 2147483647, 'Universiti Malaysia Sarawak', 'singapore', 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`participantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `participantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
