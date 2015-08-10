-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2015 at 08:44 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `registration`
--
CREATE DATABASE IF NOT EXISTS `registration` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `registration`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) NOT NULL,
  `course_descr` varchar(255) NOT NULL,
  `course_cost` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_descr`, `course_cost`, `course_duration`) VALUES
(3, 'Course A', '', '', ''),
(4, 'Course B', '', '', ''),
(5, 'Course C', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE IF NOT EXISTS `course_student` (
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year_start` date NOT NULL,
  `year_end` date NOT NULL,
  `final_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`student_id`, `course_id`, `year_start`, `year_end`, `final_mark`) VALUES
(14, 1, '0000-00-00', '0000-00-00', 0),
(15, 1, '0000-00-00', '0000-00-00', 0),
(16, 1, '0000-00-00', '0000-00-00', 0),
(17, 1, '0000-00-00', '0000-00-00', 0),
(18, 1, '0000-00-00', '0000-00-00', 0),
(19, 1, '0000-00-00', '0000-00-00', 0),
(20, 1, '0000-00-00', '0000-00-00', 0),
(21, 1, '0000-00-00', '0000-00-00', 0),
(22, 1, '0000-00-00', '0000-00-00', 0),
(23, 1, '0000-00-00', '0000-00-00', 0),
(24, 1, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_sname` varchar(100) NOT NULL,
  `student_initials` varchar(100) NOT NULL,
  `student_fname` varchar(100) NOT NULL,
  `student_title` varchar(100) NOT NULL,
  `student_dob` date NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `student_lang` varchar(100) NOT NULL,
  `student_id_no` varchar(100) NOT NULL,
  `student_telh` varchar(100) NOT NULL,
  `student_telw` varchar(100) NOT NULL,
  `student_cell` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_address` varchar(100) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_sname`, `student_initials`, `student_fname`, `student_title`, `student_dob`, `student_gender`, `student_lang`, `student_id_no`, `student_telh`, `student_telw`, `student_cell`, `student_email`, `student_address`) VALUES
(12, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(13, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(14, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(15, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(16, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(17, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(18, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(19, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(20, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(21, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(22, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(23, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', ''),
(24, 'John', '', 'Doe', '', '0000-00-00', '', '', '', '', '', '', 'john@example.com', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
