-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2012 at 01:37 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `grademe`
--
CREATE DATABASE `grademe` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `grademe`;

-- --------------------------------------------------------

--
-- Table structure for table `course1results`
--

CREATE TABLE IF NOT EXISTS `course1results` (
  `course1resultID` int(26) NOT NULL AUTO_INCREMENT,
  `userID` int(26) NOT NULL,
  `courseID` int(26) NOT NULL,
  `unit1` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit12` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit13` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit20` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit21` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit22` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `result` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`course1resultID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course1results`
--

INSERT INTO `course1results` (`course1resultID`, `userID`, `courseID`, `unit1`, `unit12`, `unit13`, `unit20`, `unit21`, `unit22`, `result`) VALUES
(1, 1, 1, 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Pass'),
(2, 2, 1, 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `course2results`
--

CREATE TABLE IF NOT EXISTS `course2results` (
  `course2resultID` int(26) NOT NULL AUTO_INCREMENT,
  `userID` int(26) NOT NULL,
  `courseID` int(26) NOT NULL,
  `unit11` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit15` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit17` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit18` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit22` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit23` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit27` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `unit28` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `result` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`course2resultID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course2results`
--

INSERT INTO `course2results` (`course2resultID`, `userID`, `courseID`, `unit11`, `unit15`, `unit17`, `unit18`, `unit22`, `unit23`, `unit27`, `unit28`, `result`) VALUES
(2, 3, 2, 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Pass'),
(3, 4, 2, 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Distinction', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `courseID` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `yearID` int(25) NOT NULL,
  `year` varchar(40) NOT NULL,
  `units` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `unitcount` int(20) NOT NULL,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `name`, `yearID`, `year`, `units`, `unitcount`) VALUES
(1, 'BTEC National Subsidiary Diploma IT Practitioners', 1, '2010/2011', '1,12,13,20,21,22', 6),
(2, 'BTEC National Extended Diploma IT Practitioners', 1, '2011/2012', '11,15,17,18,22,23,27,28', 8);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `loginID` int(20) NOT NULL AUTO_INCREMENT,
  `timeLog` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `accesslev` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `userID` int(20) NOT NULL,
  PRIMARY KEY (`loginID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `timeLog`, `username`, `password`, `accesslev`, `userID`) VALUES
(1, '16-04-12 04:18:57', '10677236', '7f1eadefed1a6d7d935ad641753b9da1f717c08f', 'Staff', 1),
(2, '', '10523456', '7f1eadefed1a6d7d935ad641753b9da1f717c08f', '', 2),
(3, '', '15046405', '212419af43263e2130bac0b5041d89e217bb6cbd', '', 3),
(4, '', '16305641', '4c86a2393d8ab56e2f21dd516fcbfbc0aec3a2c3', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE IF NOT EXISTS `tutors` (
  `tutorID` int(20) NOT NULL AUTO_INCREMENT,
  `userID` int(20) NOT NULL,
  PRIMARY KEY (`tutorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unit17`
--

CREATE TABLE IF NOT EXISTS `unit17` (
  `gradeID` int(20) NOT NULL AUTO_INCREMENT,
  `unitID` int(20) NOT NULL,
  `userID` int(20) NOT NULL,
  `P1` varchar(30) NOT NULL,
  `P2` varchar(30) NOT NULL,
  `P3` varchar(30) NOT NULL,
  `P4` varchar(30) NOT NULL,
  `P5` varchar(30) NOT NULL,
  `P6` varchar(30) NOT NULL,
  `P7` varchar(30) NOT NULL,
  `M1` varchar(30) NOT NULL,
  `M2` varchar(30) NOT NULL,
  `M3` varchar(30) NOT NULL,
  `D1` varchar(30) NOT NULL,
  `D2` varchar(30) NOT NULL,
  `result` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`gradeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `unit17`
--

INSERT INTO `unit17` (`gradeID`, `unitID`, `userID`, `P1`, `P2`, `P3`, `P4`, `P5`, `P6`, `P7`, `M1`, `M2`, `M3`, `D1`, `D2`, `result`) VALUES
(1, 17, 1, 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Distinction'),
(2, 17, 2, 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Distinction'),
(3, 17, 3, 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Distinction');

-- --------------------------------------------------------

--
-- Table structure for table `unit5`
--

CREATE TABLE IF NOT EXISTS `unit5` (
  `gradeID` int(20) NOT NULL AUTO_INCREMENT,
  `unitID` int(20) NOT NULL,
  `userID` int(20) NOT NULL,
  `P1` varchar(30) NOT NULL,
  `P2` varchar(30) NOT NULL,
  `P3` varchar(30) NOT NULL,
  `P4` varchar(30) NOT NULL,
  `P5` varchar(30) NOT NULL,
  `P6` varchar(30) NOT NULL,
  `M1` varchar(30) NOT NULL,
  `M2` varchar(30) NOT NULL,
  `D1` varchar(30) NOT NULL,
  `result` varchar(40) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`gradeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `unit5`
--

INSERT INTO `unit5` (`gradeID`, `unitID`, `userID`, `P1`, `P2`, `P3`, `P4`, `P5`, `P6`, `M1`, `M2`, `D1`, `result`) VALUES
(1, 5, 1, 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Pass', 'Distinction');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `unitID` int(20) NOT NULL DEFAULT '0',
  `name` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  `courseID` int(20) NOT NULL,
  `unitSpec` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `passes` int(20) NOT NULL,
  `merits` int(20) NOT NULL,
  `distinctions` int(20) NOT NULL,
  PRIMARY KEY (`unitID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unitID`, `name`, `description`, `courseID`, `unitSpec`, `passes`, `merits`, `distinctions`) VALUES
(5, 'test', 'test unit', 1, 'test', 6, 2, 1),
(17, 'Project Planning', 'The aim of this unit is to ensure learners understand the processes and tools used for project management and are able to plan a project, follow the plan and review the project management process.', 1, 'www.test.com', 7, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `lastname` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(120) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `courseID` int(11) DEFAULT NULL,
  `status` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `class` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `SRF` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstname`, `lastname`, `email`, `courseID`, `status`, `class`, `SRF`) VALUES
(1, 'Christopher', 'Pratt', 'mccrispy2004@hotmail.com', 1, 'Active', 'NDIT01', ''),
(2, 'Test1', 'Test1', 'test@test.com', 1, 'Active', 'NDIT01', NULL),
(3, 'test2', 'test2', 'test@test.com', 2, 'Active', 'NDIT02', NULL),
(4, 'test3', 'test3', 'test@test.com', 2, 'Withdrawn', 'NDIT02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `yearID` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `firstyear` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `secondyear` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`yearID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`yearID`, `year`, `firstyear`, `secondyear`) VALUES
(1, '2010/2012', '2010/2011', '2011/2012');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
