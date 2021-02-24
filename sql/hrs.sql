-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2021 at 03:04 PM
-- Server version: 5.7.21
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
-- Database: `hrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`) VALUES
('anenoesther00@gmail.com', 'Housings1');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL,
  `image` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `profiles_id` int(11) NOT NULL,
  PRIMARY KEY (`profiles_id`),
  UNIQUE KEY `submitproperty_id` (`profiles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `Name` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm password` varchar(50) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Name`, `Email`, `password`, `confirm password`) VALUES
('ANENO ESTHER', 'anenoesther00@gmail.com', 'Housings1', 'Housings1');

-- --------------------------------------------------------

--
-- Table structure for table `submitproperty`
--

DROP TABLE IF EXISTS `submitproperty`;
CREATE TABLE IF NOT EXISTS `submitproperty` (
  `submitproperty_id` int(10) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `typeofrental` int(11) NOT NULL,
  `price` int(50) NOT NULL,
  `photo` blob NOT NULL,
  `contact` int(10) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`submitproperty_id`),
  UNIQUE KEY `typeofrental` (`typeofrental`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typeofrental`
--

DROP TABLE IF EXISTS `typeofrental`;
CREATE TABLE IF NOT EXISTS `typeofrental` (
  `typeofrental_id` enum('Room','Apartment','Bungalow','Masion') NOT NULL,
  PRIMARY KEY (`typeofrental_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`profiles_id`) REFERENCES `submitproperty` (`submitproperty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
