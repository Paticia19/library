-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2022 at 06:36 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `barangay`
--

-- --------------------------------------------------------

--
-- Table structure for table `blotter`
--

CREATE TABLE IF NOT EXISTS `blotter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yearRecorded` varchar(100) NOT NULL,
  `dateRecorded` date NOT NULL,
  `complainant` varchar(100) NOT NULL,
  `cage` int(11) NOT NULL,
  `personToComplain` varchar(100) NOT NULL,
  `page` int(11) NOT NULL,
  `paddress` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `actionTaken` varchar(100) NOT NULL,
  `sStatus` varchar(50) NOT NULL,
  `locationOfIncidence` text NOT NULL,
  `recordedby` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blotter`
--

INSERT INTO `blotter` (`id`, `yearRecorded`, `dateRecorded`, `complainant`, `cage`, `personToComplain`, `page`, `paddress`, `complaint`, `actionTaken`, `sStatus`, `locationOfIncidence`, `recordedby`, `created_at`) VALUES
(1, '2016', '2016-10-15', 'reyes, jorylle m.', 2132, 'dagalea, aila j.', 213, 11, '213asd', '1st Option', 'Solved', 'asdsa', 'admin', '2022-12-05 17:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE IF NOT EXISTS `officials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sPosition` varchar(100) NOT NULL,
  `completeName` varchar(100) NOT NULL,
  `pcontact` varchar(100) NOT NULL,
  `paddress` varchar(100) NOT NULL,
  `termStart` varchar(100) NOT NULL,
  `termEnd` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `sPosition`, `completeName`, `pcontact`, `paddress`, `termStart`, `termEnd`, `status`, `created_at`) VALUES
(1, 'Captain', 'eliezer a. vacalares', '8978768761', 'gdfgdfgd', '2016-10-03', '2016-10-06', 'Ongoing Term', '2022-12-05 16:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE IF NOT EXISTS `residents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `bdate` varchar(20) NOT NULL,
  `bplace` text NOT NULL,
  `age` int(11) NOT NULL,
  `barangay` varchar(120) NOT NULL,
  `zone` varchar(5) NOT NULL,
  `totalhousehold` int(5) NOT NULL,
  `differentlyabledperson` varchar(100) NOT NULL,
  `bloodtype` varchar(10) NOT NULL,
  `civilstatus` varchar(20) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `monthlyincome` int(12) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `philhealthNo` int(12) NOT NULL,
  `highestEducationalAttainment` varchar(50) NOT NULL,
  `houseOwnershipStatus` varchar(50) NOT NULL,
  `landOwnershipStatus` varchar(20) NOT NULL,
  `formerAddress` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `lname`, `fname`, `mname`, `bdate`, `bplace`, `age`, `barangay`, `zone`, `totalhousehold`, `differentlyabledperson`, `bloodtype`, `civilstatus`, `occupation`, `monthlyincome`, `religion`, `nationality`, `gender`, `philhealthNo`, `highestEducationalAttainment`, `houseOwnershipStatus`, `landOwnershipStatus`, `formerAddress`, `image`, `created_at`) VALUES
(1, 'alejandro', 'chelsea', 'bien', 'may 15, 2002', 'fsafdag', 20, 'brgy1', 'zone1', 6, 'sdgfsdgs', 'b', 'single', 'sdad', 50000, 'cvzxv', 'filipino', 'female', 23423, 'sffaa', 'asfas', 'afa', 'eawrwrwr', 'asfweret', '2022-12-05 16:00:00');



ALTER TABLE `blotter`
  ADD PRIMARY KEY (`id`),

--
-- Indexes for table `purchased_history`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

  ALTER TABLE `Blotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--
  ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for table `items`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
