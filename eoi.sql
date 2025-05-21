-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2025 at 03:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecrusoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

DROP TABLE IF EXISTS `eoi`;
CREATE TABLE IF NOT EXISTS `eoi` (
  `EOInumber` int(11) NOT NULL AUTO_INCREMENT,
  `JobReference` varchar(5) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `StreetAddress` varchar(40) NOT NULL,
  `Suburb` varchar(40) NOT NULL,
  `State` varchar(3) NOT NULL,
  `Postcode` varchar(4) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `PhoneNumber` varchar(12) NOT NULL,
  `Skill1` varchar(255) DEFAULT NULL,
  `Skill2` varchar(255) DEFAULT NULL,
  `Skill3` varchar(255) DEFAULT NULL,
  `Skill4` varchar(255) DEFAULT NULL,
  `Skill5` varchar(255) DEFAULT NULL,
  `OtherSkills` text DEFAULT NULL,
  `Status` enum('New','Current','Final') DEFAULT 'New',
  PRIMARY KEY (`EOInumber`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT DELAYED IGNORE INTO `eoi` (`EOInumber`, `JobReference`, `FirstName`, `LastName`, `gender`, `StreetAddress`, `Suburb`, `State`, `Postcode`, `EmailAddress`, `PhoneNumber`, `Skill1`, `Skill2`, `Skill3`, `Skill4`, `Skill5`, `OtherSkills`, `Status`) VALUES
(2, 'ITT02', 'Sokhour', 'KIM', 'Male', '56 Lawn Rd', 'Springvale', 'VIC', '3171', '104345352@student.swin.edu.au', '61413021270', 'Programming', 'Digital_forensic', '', '', '', 'Code Analysis', 'New'),
(3, 'ITT02', 'Sokhour', 'KIM', 'Male', '56 Lawn Rd', 'Springvale', 'VIC', '3171', '104345352@student.swin.edu.au', '61413021270', 'Programming', 'Digital_forensic', '', '', '', 'Code Analysis', 'New');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
