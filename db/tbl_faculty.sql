-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2016 at 11:31 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_aclcscheduling`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE IF NOT EXISTS `tbl_faculty` (
  `faculty_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `mi` varchar(5) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `department_id` int(3) NOT NULL,
  `faculty_type` enum('FULL TIME','PART TIME') NOT NULL,
  `faculty_status` enum('1','0') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `lastname`, `firstname`, `mi`, `gender`, `email`, `mobile`, `address`, `department_id`, `faculty_type`, `faculty_status`, `date_added`) VALUES
(1, 'Horfilla', 'Franz Marvin', 'C', 'MALE', 'franzhorfilla@yahoo.com', '', '127.0.0.1', 3, 'FULL TIME', '1', '2016-08-08 06:55:41'),
(2, 'Panfilo', 'Remedio', 'O', 'MALE', 'panfiloremedio@yahoo.com', '09231895819', 'awkjdkjawkj kawjdk awkdj kaw', 3, 'FULL TIME', '1', '2016-08-05 16:13:15'),
(3, 'Aranas', 'Steven Dave', 'A', 'MALE', 'localhost@yahoo.com', '28912898912', '127.0.0.1', 3, 'FULL TIME', '1', '2016-08-08 06:57:40'),
(4, 'Francisco', 'Donald', '', 'MALE', 'aaaaaa', '123123', 'awd', 3, 'FULL TIME', '1', '2016-08-06 05:52:52'),
(5, 'Amang', 'Dena Jane', 'c', 'FEMALE', '', '0942-182-3812', 'Aw', 2, 'FULL TIME', '1', '2016-08-08 06:57:10'),
(6, 'Perral', 'Marilou', '', 'FEMALE', 'wad', '123', 'aw', 4, 'FULL TIME', '1', '2016-08-06 05:52:52'),
(7, 'Almanon', 'Philip', 'A', 'MALE', 'wad@a', '1231-231-2312', 'Wdawdawd', 1, 'FULL TIME', '1', '2016-08-10 20:10:15'),
(8, 'Jo', 'Jill', 'B', 'FEMALE', 'aw', '12', 'aw', 2, 'FULL TIME', '1', '2016-08-06 16:11:59'),
(9, 'Bacolod', 'Hazel', '', 'FEMALE', 'aw', '12', 'wa', 4, 'FULL TIME', '1', '2016-08-06 06:06:56'),
(10, 'Barola', 'Reynold Chavez', '', 'MALE', 'aw', '12', 'aw', 1, 'FULL TIME', '1', '2016-08-06 06:07:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
