-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2016 at 08:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_saga`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `tname` varchar(25) NOT NULL,
  `mem1` varchar(25) NOT NULL,
  `mem2` varchar(25) NOT NULL,
  `college` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `l1q1` varchar(15) NOT NULL,
  `l1q2` varchar(15) NOT NULL,
  `l1q3` varchar(15) NOT NULL,
  `l1q4` varchar(15) NOT NULL,
  `l1q5` varchar(15) DEFAULT NULL,
  `l2q1` varchar(15) DEFAULT NULL,
  `l2q2` varchar(15) DEFAULT NULL,
  `l2q3` varchar(15) DEFAULT NULL,
  `l2q4` varchar(15) DEFAULT NULL,
  `l2q5` varchar(15) DEFAULT NULL,
  `l3q1` varchar(15) DEFAULT NULL,
  `l3q2` varchar(15) DEFAULT NULL,
  `l3q3` varchar(15) DEFAULT NULL,
  `l3q4` varchar(15) DEFAULT NULL,
  `l3q5` varchar(15) DEFAULT NULL,
  `bonus1` varchar(25) NOT NULL,
  `bonus2` varchar(25) NOT NULL,
  `bonus3` varchar(25) NOT NULL,
  `final` varchar(60) DEFAULT NULL,
  `time_login` datetime DEFAULT NULL,
  `time_logout` datetime DEFAULT NULL,
  `duration` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Username`, `Password`, `l1q1`, `l1q2`, `l1q3`, `l1q4`, `l1q5`, `l2q1`, `l2q2`, `l2q3`, `l2q4`, `l2q5`, `l3q1`, `l3q2`, `l3q3`, `l3q4`, `l3q5`, `bonus1`, `bonus2`, `bonus3`, `final`, `time_login`, `time_logout`, `duration`) VALUES
('Adminn', 'asdf', 'tcs', 'windows xp', 'cisco', 'feeling lucky', 'eco', 'googol', 'vaio', 'binary', 'poke', '1214', 'azerty qwerty', '11226', '64', '1685', '7', 'abstract', 'window', 'toolkit', 'abstract window toolkit', '2016-10-13 23:40:35', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
