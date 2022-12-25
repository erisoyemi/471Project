-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2022 at 06:52 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `emp_no` int(100) NOT NULL,
  `restriction_level` int(1) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`emp_no`)
) ENGINE=MyISAM AUTO_INCREMENT=1240 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`emp_no`, `restriction_level`, `password`) VALUES
(1234, 3, '1'),
(1237, 5, '1'),
(1238, 5, '1'),
(1452, 4, '1');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_no` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `patient_no` int(11) NOT NULL,
  `emp_no` int(11) NOT NULL,
  PRIMARY KEY (`appointment_no`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_no`, `time`, `date`, `patient_no`, `emp_no`) VALUES
(3, '6', '2022-12-24', 1, 3),
(4, '8am', '2022-12-30', 123, 424),
(5, '8am', '2022-12-14', 1323, 1241);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `bill_no` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `amount` int(11) NOT NULL,
  `patient_no` int(11) NOT NULL,
  PRIMARY KEY (`bill_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

DROP TABLE IF EXISTS `conditions`;
CREATE TABLE IF NOT EXISTS `conditions` (
  `condition_name` varchar(100) NOT NULL,
  `fatalility_rate` varchar(5) NOT NULL,
  `symptoms` text NOT NULL,
  PRIMARY KEY (`condition_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `email` varchar(100) NOT NULL,
  `emp_no` int(100) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `specialisation` varchar(100) NOT NULL,
  PRIMARY KEY (`emp_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`email`, `emp_no`, `job_title`, `name`, `phone_no`, `password`, `specialisation`) VALUES
('erisoyemi@gmail.com', 12345, 'GP', 'Jacob Lao', '7546757574', 'jacob', ''),
('dfghbijnok', 4567, 'hrbkn', 'dfghjk', '3456789', '1', 'cygvhubjk'),
('gee', 51431, 'frw', 'vwrb', '3', '1', 'r');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE IF NOT EXISTS `hospital` (
  `hname` varchar(100) NOT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_company`
--

DROP TABLE IF EXISTS `insurance_company`;
CREATE TABLE IF NOT EXISTS `insurance_company` (
  `name` varchar(100) NOT NULL,
  `policy_no` int(11) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

DROP TABLE IF EXISTS `medical_record`;
CREATE TABLE IF NOT EXISTS `medical_record` (
  `patient_no` int(100) NOT NULL,
  `mother_history` text NOT NULL,
  `father_history` text NOT NULL,
  `mr_no` int(100) NOT NULL,
  `dob` date NOT NULL,
  `conditions` text NOT NULL,
  `past_treatments` text NOT NULL,
  PRIMARY KEY (`patient_no`,`mr_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `model_no` int(11) NOT NULL,
  `prescription` varchar(100) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `patient_no` int(11) NOT NULL,
  `doc_emp_no` int(11) NOT NULL,
  PRIMARY KEY (`model_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `not_treatable`
--

DROP TABLE IF EXISTS `not_treatable`;
CREATE TABLE IF NOT EXISTS `not_treatable` (
  `condition_name` varchar(100) NOT NULL,
  `fatality_rate` varchar(5) NOT NULL,
  `symptoms` text NOT NULL,
  PRIMARY KEY (`condition_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

DROP TABLE IF EXISTS `nurse`;
CREATE TABLE IF NOT EXISTS `nurse` (
  `email` varchar(100) NOT NULL,
  `emp_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  PRIMARY KEY (`emp_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

DROP TABLE IF EXISTS `others`;
CREATE TABLE IF NOT EXISTS `others` (
  `name` int(11) NOT NULL,
  `emp_no` int(11) NOT NULL,
  `job_title` int(11) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`emp_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patient_no` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `insurance_name` varchar(100) NOT NULL,
  `race` varchar(20) NOT NULL,
  PRIMARY KEY (`patient_no`,`email`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_no`, `email`, `fname`, `lname`, `phone_no`, `gender`, `age`, `weight`, `height`, `room_no`, `insurance_name`, `race`) VALUES
(1, 'acf', 'cac', 'njkqwc ', '7546757574', 'f', 34, 13, 13, 31, 'eafvv', '345vgsvva'),
(324, 'klvklew', 'mkqfe', 'efnl', '4523535', 'f', 23, 123, 31, 13, 'ewfwer', 'ewf');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `equipment` text NOT NULL,
  `room_no` int(11) NOT NULL,
  `nurses` int(11) NOT NULL,
  `patients` int(11) NOT NULL,
  PRIMARY KEY (`room_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `emp_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `job_title` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  PRIMARY KEY (`emp_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatable`
--

DROP TABLE IF EXISTS `treatable`;
CREATE TABLE IF NOT EXISTS `treatable` (
  `condition_name` varchar(100) NOT NULL,
  `fatality_rate` varchar(5) NOT NULL,
  `symptoms` text NOT NULL,
  PRIMARY KEY (`condition_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

DROP TABLE IF EXISTS `treatment`;
CREATE TABLE IF NOT EXISTS `treatment` (
  `treatment_name` varchar(100) NOT NULL,
  `date_administered` date NOT NULL,
  `duration` text NOT NULL,
  `cost` int(11) NOT NULL,
  `patient_no` int(11) NOT NULL,
  `emp_no` int(11) NOT NULL,
  PRIMARY KEY (`treatment_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `restriction_level` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`restriction_level`, `password`, `email`) VALUES
(1, 'lao', 'laojacob@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
