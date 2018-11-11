-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2015 at 09:53 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gocenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `Booked` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `user_id`, `data`, `date`, `Booked`) VALUES
(39, 11, 'Bronze', '2015-05-02', 'Booked'),
(41, 11, 'Bronze', '2015-05-28', 'Booked'),
(42, 11, 'Bronze', '2015-06-19', 'Booked'),
(43, 12, 'Bronze', '2015-06-28', 'Booked'),
(62, 12, 'Silver', '2015-05-28', 'Booked'),
(67, 12, 'Bronze', '2015-05-16', 'Booked'),
(68, 12, 'Gold', '2015-07-05', 'Booked'),
(69, 12, 'Silver', '2015-05-10', 'Booked'),
(70, 12, 'Silver', '2015-04-10', 'Booked'),
(71, 13, 'Silver', '2015-06-07', 'Booked'),
(72, 12, 'Bronze', '2015-05-02', 'Booked'),
(73, 12, 'Bronze', '2015-05-03', 'Booked'),
(74, 12, 'Silver', '2015-05-24', 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `validate` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `Phone`, `Pass`, `validate`, `img`) VALUES
(10, 'alex', 'kinale93@gmail.com', '0708070897', '6576f29c328ea8904f9f51d1b71f3d5e', 'yes', ''),
(12, 'alex', 'alekin93@yahoo.com', '0708070897', '1d9e17c4f9708b54f3da6e6eed172658', 'yes', 'compiler.PNG'),
(13, 'mark', 'alexkinuthia22@gmail.com', '07080787878978', 'c2082a69bbbcfed6983a4976d9dd2776', 'b7f1995ca75d3450e49551e5f0995017', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
