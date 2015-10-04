-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2015 at 09:09 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trackmytruck`
--
CREATE DATABASE IF NOT EXISTS `trackmytruck` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trackmytruck`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dr_num`
--

CREATE TABLE IF NOT EXISTS `tbl_dr_num` (
  `DR_NUM` int(11) NOT NULL,
  `IS_USED` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DR_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck`
--

CREATE TABLE IF NOT EXISTS `tbl_truck` (
  `TRUCK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TRUCK_NUM` varchar(10) NOT NULL,
  `COMMODITY` varchar(40) NOT NULL,
  `DEST_FROM` varchar(50) NOT NULL,
  `DEST_TO` varchar(50) NOT NULL,
  `SOLD_TO` varchar(50) NOT NULL,
  `VOLUME` int(11) NOT NULL,
  `DRIVER` varchar(50) NOT NULL,
  `DR_NUM` int(15) DEFAULT NULL,
  `REMARKS` text NOT NULL,
  `DATE_ISSUED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ISSUED_BY` varchar(50) NOT NULL,
  `DELETE_FLAG` tinyint(1) NOT NULL,
  PRIMARY KEY (`TRUCK_ID`),
  UNIQUE KEY `DR_NUM` (`DR_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
