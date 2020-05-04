-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2016 at 03:37 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_aclcscheduling`
--
CREATE DATABASE IF NOT EXISTS `db_aclcscheduling` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_aclcscheduling`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

DROP TABLE IF EXISTS `tbl_course`;
CREATE TABLE IF NOT EXISTS `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_abbr` varchar(10) NOT NULL,
  `course_type` enum('DEGREE','ASSOCIATE') NOT NULL,
  `course_noYears` int(11) NOT NULL,
  `course_status` enum('1','0') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_abbr`, `course_type`, `course_noYears`, `course_status`, `date_added`) VALUES
(1, 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', 'BSIT', 'DEGREE', 4, '1', '2016-08-14 15:04:26'),
(2, 'BACHELOR OF SCIENCE IN COMPUTER SCIENCE', 'BSCS', 'DEGREE', 4, '1', '2016-08-14 15:04:30'),
(3, 'BACHELOR OF SCIENCE IN HOTEL AND RESTAURANT MANAGEMENT', 'bshrm', 'DEGREE', 4, '1', '2016-08-14 15:05:14'),
(4, 'BACHELOR OF SCIENCE IN BUSINESS ADMINISTRATION', 'BSBA', 'DEGREE', 4, '1', '2016-08-14 15:05:40'),
(5, 'BACHELOR OF SCIENCE IN ACCOUNTANCY', 'BSA', 'DEGREE', 5, '1', '2016-08-12 10:40:44'),
(6, 'BACHELOR OF SCIENCE IN INFORMATION SYSTEM', 'BSIS', 'DEGREE', 4, '1', '2016-08-14 15:04:34'),
(7, 'WEB APPLICATION DEVELOPMENT', 'WAD', 'ASSOCIATE', 2, '0', '2016-08-14 15:04:42'),
(8, 'HOTEL AND RESTAURANT SERVICES', 'HRS', 'ASSOCIATE', 2, '1', '2016-08-14 15:05:26'),
(9, 'COMPUTER SYSTEM DESIGN AND PROGRAMMING', 'CSDP', 'ASSOCIATE', 2, '0', '2016-08-14 15:04:46'),
(10, 'BUSINESS OFFICE ADMINISTRATION SERVICES', 'boas', 'ASSOCIATE', 2, '1', '2016-08-12 19:05:24'),
(11, 'COMPUTER SYSTEMS NETWORK TECHNOLOGY', 'CSNT', 'ASSOCIATE', 2, '1', '2016-08-14 15:04:50'),
(12, 'COMPUTER BASED ACCOUNTANCY', 'cba', 'ASSOCIATE', 2, '1', '2016-08-07 18:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE IF NOT EXISTS `tbl_department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_head` int(3) NOT NULL,
  `department_status` enum('1','0') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`, `department_head`, `department_status`, `date_created`) VALUES
(1, 'BUSINESS ADMINISTRATION', 7, '1', '2016-08-12 07:25:59'),
(2, 'GENERAL EDUCATION', 5, '1', '2016-08-10 20:09:56'),
(3, 'INFORMATION AND COMMUNICATIONS TECHNOLOGY', 4, '1', '2016-08-12 07:56:25'),
(4, 'HOSPITALITY', 6, '1', '2016-08-12 07:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

DROP TABLE IF EXISTS `tbl_faculty`;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
(9, 'Bacolod', 'Hazel', '', 'FEMALE', 'awdaw@aw', '12', 'Wa', 4, 'PART TIME', '1', '2016-08-15 07:50:35'),
(10, 'Barola', 'Reynold Chavez', '', 'MALE', 'aw', '12', 'aw', 1, 'FULL TIME', '1', '2016-08-06 06:07:46'),
(11, 'Olaso', 'Alvarel', 'J', 'MALE', 'aw@aw.com', '', 'Awdj', 4, 'PART TIME', '1', '2016-08-12 11:38:48'),
(12, 'Ostia', 'Ma. Nita', '', 'MALE', '', '', 'Helloworld', 3, 'PART TIME', '1', '2016-08-15 07:52:50'),
(13, 'Lopena', 'Nemesio Jr.', '', 'MALE', '', '', 'A', 3, 'PART TIME', '1', '2016-08-15 07:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

DROP TABLE IF EXISTS `tbl_room`;
CREATE TABLE IF NOT EXISTS `tbl_room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_type` enum('REGULAR','LABORATORY') NOT NULL,
  `floor_level` int(11) NOT NULL,
  `student_capacity` int(10) NOT NULL,
  `room_status` enum('1','0') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`room_id`, `room_name`, `room_type`, `floor_level`, `student_capacity`, `room_status`, `date_added`) VALUES
(1, '101', 'REGULAR', 1, 40, '1', '2016-08-10 20:10:23'),
(2, '102', 'REGULAR', 1, 40, '1', '2016-07-31 06:20:49'),
(3, '103', 'REGULAR', 1, 40, '1', '2016-07-31 06:20:51'),
(4, '104', 'REGULAR', 1, 40, '1', '2016-07-31 06:20:53'),
(5, '201', 'REGULAR', 2, 40, '1', '2016-07-31 06:20:57'),
(6, '202', 'REGULAR', 2, 40, '1', '2016-08-13 17:06:30'),
(7, '203', 'REGULAR', 2, 40, '1', '2016-08-06 05:24:12'),
(8, '204', 'REGULAR', 2, 40, '1', '2016-07-31 06:21:03'),
(9, '205', 'REGULAR', 2, 40, '1', '2016-07-31 06:21:04'),
(10, '206', 'REGULAR', 2, 40, '1', '2016-07-31 06:21:05'),
(11, '207', 'REGULAR', 2, 40, '1', '2016-07-31 06:21:07'),
(12, '208', 'REGULAR', 2, 40, '1', '2016-07-31 06:21:08'),
(13, '209', 'REGULAR', 2, 40, '1', '2016-07-31 06:21:10'),
(14, '210', 'REGULAR', 2, 40, '1', '2016-07-31 06:21:11'),
(15, 'NLAB', 'LABORATORY', 3, 40, '1', '2016-08-07 11:22:36'),
(16, 'SLAB1', 'LABORATORY', 3, 40, '1', '2016-08-07 11:22:45'),
(17, 'SLAB2', 'LABORATORY', 3, 40, '1', '2016-08-07 11:22:51'),
(18, 'SLAB3', 'LABORATORY', 3, 40, '1', '2016-08-09 16:28:37'),
(19, 'SLAB4', 'LABORATORY', 1, 40, '1', '2016-08-07 11:22:59'),
(20, 'Slab6', 'LABORATORY', 3, 40, '1', '2016-08-15 08:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

DROP TABLE IF EXISTS `tbl_schedule`;
CREATE TABLE IF NOT EXISTS `tbl_schedule` (
  `schedule_id` int(11) NOT NULL,
  `ecode` varchar(15) NOT NULL,
  `subject_code` varchar(15) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `lec_startTime` varchar(20) NOT NULL,
  `lec_endTime` varchar(20) NOT NULL,
  `lec_room` varchar(20) NOT NULL,
  `lab_startTime` varchar(20) NOT NULL,
  `lab_endTime` varchar(20) NOT NULL,
  `lab_room` varchar(20) NOT NULL,
  `firstDay` varchar(20) NOT NULL,
  `secondDay` varchar(20) NOT NULL,
  `faculty_id` varchar(30) NOT NULL,
  `schoolyear_code` int(11) NOT NULL,
  `schedule_status` enum('1','0') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schedule_id`, `ecode`, `subject_code`, `subject_title`, `lec_startTime`, `lec_endTime`, `lec_room`, `lab_startTime`, `lab_endTime`, `lab_room`, `firstDay`, `secondDay`, `faculty_id`, `schoolyear_code`, `schedule_status`, `date_added`) VALUES
(1, 'IT11A1', 'CS102A', 'awd', '07:30', '08:30', '204', '08:30', '10:00', 'SLAB4', 'Monday', 'Thursday', '1', 16171, '1', '2016-08-15 12:59:45'),
(2, 'IT11A2', 'cs123', '', '10:00', '11:00', '', '11:00', '12:30', '', '', '', '', 16171, '1', '2016-08-15 13:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schoolyear`
--

DROP TABLE IF EXISTS `tbl_schoolyear`;
CREATE TABLE IF NOT EXISTS `tbl_schoolyear` (
  `schoolyear_id` int(11) NOT NULL,
  `schoolyear_code` int(15) NOT NULL,
  `schoolyear_status` enum('1','0') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schoolyear`
--

INSERT INTO `tbl_schoolyear` (`schoolyear_id`, `schoolyear_code`, `schoolyear_status`, `date_added`) VALUES
(1, 16171, '1', '2016-08-12 16:48:25'),
(2, 16172, '1', '2016-08-12 18:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

DROP TABLE IF EXISTS `tbl_subject`;
CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(15) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `course_abbr` varchar(15) NOT NULL,
  `year_level` int(2) NOT NULL,
  `semester` int(2) NOT NULL,
  `lec` int(3) NOT NULL,
  `lab` int(3) NOT NULL,
  `pre_requisite` varchar(100) NOT NULL,
  `subject_status` enum('1','0') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=464 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_code`, `subject_title`, `course_abbr`, `year_level`, `semester`, `lec`, `lab`, `pre_requisite`, `subject_status`, `date_added`) VALUES
(1, 'AC101A', 'Financial Accounting and Reporting 1', 'BSA', 3, 1, 5, 1, 'BE402', '1', '2016-08-12 18:53:18'),
(2, 'AC103', 'Financial Accounting and Reporting 3', 'BSA', 4, 1, 3, 0, 'AC102', '1', '2016-08-02 17:21:02'),
(3, 'AC201', 'Cost Accounting and Cost Management', 'BSA', 4, 2, 5, 1, 'AC103', '1', '2016-08-02 17:21:42'),
(4, 'AC301', 'Management Accounting', 'BSA', 5, 1, 6, 0, 'AC201', '1', '2016-08-02 17:22:11'),
(5, 'AC302', 'Management Consultancy', 'BSA', 5, 2, 3, 0, 'AC301', '1', '2016-08-02 17:22:30'),
(6, 'AC401', 'Advance Financial Accounting and Reporting 1', 'BSA', 4, 2, 3, 0, 'AC103', '1', '2016-08-02 17:22:54'),
(7, 'AC402', 'Advanced Financial Accounting and Reporting 2', 'BSA', 5, 1, 3, 0, 'AC401B', '1', '2016-08-02 17:23:12'),
(8, 'AC403', 'Acctg for Gov''tl. Non Profit and Specialized Industries', 'BSA ', 5, 2, 3, 0, 'AC402', '1', '2016-08-02 17:23:44'),
(9, 'AC501', 'Assurance Prin, Prof''l Ethics and Governance', 'BSA', 4, 2, 6, 0, 'AC103', '1', '2016-08-02 17:24:01'),
(10, 'AC502', 'Applied Auditing', 'BSA', 5, 1, 5, 1, 'AC501', '1', '2016-08-02 17:24:09'),
(11, 'AC504', 'Advance Auditing', 'BSA', 5, 2, 3, 0, 'AC502', '1', '2016-08-02 17:25:10'),
(12, 'AC602', 'Accounting Information Systems', 'BSA', 4, 1, 2, 1, 'TE109', '1', '2016-08-02 17:25:33'),
(13, 'AC603', 'Auditing in a CIS Environment', 'BSA', 5, 2, 2, 1, 'AC602', '1', '2016-08-02 17:26:21'),
(14, 'AC801', 'Accounting Review', 'BSA', 3, 1, 3, 0, '3rd year Standing', '1', '2016-08-02 17:26:43'),
(15, 'AC802', 'Synthesis/Acctg review with Comperehensive Exam', 'BSA', 5, 2, 6, 0, 'Graduating', '1', '2016-08-02 17:27:12'),
(16, 'AC901', 'Practicum with Case Study', 'BSA', 5, 2, 3, 0, '', '1', '2016-08-09 17:18:03'),
(17, 'BA303', 'Major Subject 2 (Labor Law And Legislation)', 'BSBA', 3, 1, 3, 0, '', '1', '2016-08-01 06:24:24'),
(18, 'BE202', 'Financial Management 1', 'BSA', 2, 2, 3, 0, 'BE201,BE402', '1', '2016-08-02 17:28:12'),
(19, 'BE202A', 'Basic Finance', 'BSBA', 3, 1, 3, 0, 'BE201', '1', '2016-08-02 15:45:33'),
(20, 'BE203', 'Financial Management 2', 'BSA', 3, 1, 3, 0, 'BE202', '1', '2016-08-02 17:39:42'),
(21, 'BE204', 'Introduction to Finance for Hospitality Management', 'BSHRM', 3, 2, 3, 0, 'BE405A', '1', '2016-08-03 08:28:43'),
(22, 'BE301A', 'Principles of Marketing', 'BSBA', 2, 1, 3, 0, 'BE501', '1', '2016-08-02 15:45:59'),
(23, 'BE401', 'Fundamentals of Accounting Theory and Practice 1', 'BSA', 1, 2, 5, 1, 'GE211', '1', '2016-08-02 17:40:08'),
(24, 'BE402', 'Fundamentals of Accounting Theory and Practice 2', 'BSA', 2, 1, 5, 1, 'BE401', '1', '2016-08-02 17:40:50'),
(25, 'BE403B', 'Fundamentals of Accounting 3', 'BSBA', 2, 2, 3, 0, 'BE402A', '1', '2016-08-02 15:46:36'),
(26, 'BE501B', 'Principles of Management', 'BSHRM', 1, 1, 3, 0, '', '1', '2016-08-01 09:22:34'),
(27, 'BE502', 'Human Behaviour in Organization', 'BSHRM', 2, 2, 3, 0, 'BE501', '1', '2016-08-03 08:29:26'),
(28, 'BE503A', 'Human Resource Management', 'BSBA', 3, 1, 3, 0, 'BE502', '1', '2016-08-02 15:46:57'),
(29, 'BE504', 'Business Policy and Strategy', 'BSA', 5, 1, 3, 0, '5th year Standing', '1', '2016-08-02 17:46:34'),
(30, 'BE504A', 'Business Policy And Strategy with TQM', 'BSBA', 4, 1, 3, 0, '', '1', '2016-08-01 09:29:15'),
(31, 'BE505A', 'Entrepreneurship & Business Planning', 'BSHRM', 4, 1, 3, 0, 'HC102A', '1', '2016-08-03 08:29:54'),
(32, 'BE602', 'Law Business Organization', 'BSA', 4, 1, 3, 0, 'BE601', '1', '2016-08-02 17:47:57'),
(33, 'BE603', 'Law on Negotiable Instruments', 'BSA', 4, 2, 3, 0, 'BE601,BE602', '1', '2016-08-02 17:48:24'),
(34, 'BE604', 'Sales, Agency, Labor and Other Commercial Laws', 'BSA', 5, 1, 3, 0, 'BE603', '1', '2016-08-02 17:48:53'),
(35, 'BE702', 'Business and Transfer Taxes', 'BSA', 4, 1, 3, 0, 'BE701', '1', '2016-08-02 17:49:19'),
(36, 'BE801', 'Business Statistics', 'BSA', 1, 2, 3, 0, 'GE211', '1', '2016-08-02 17:49:52'),
(37, 'BE802', 'Quantitative Techniques in Business', 'BSA', 2, 2, 3, 0, 'BE501,BE402', '1', '2016-08-02 17:50:29'),
(38, 'BE812', 'Calculus for Business', 'BSA', 2, 1, 3, 0, 'GE211', '1', '2016-08-02 17:50:44'),
(39, 'CN101A', 'Fundamentals of Electronics and Electricity', 'CSNT', 1, 1, 2, 1, '', '1', '2016-08-04 15:06:55'),
(40, 'CN700B', 'On the Job Training', 'CSNT', 2, 1, 3, 0, '', '1', '2016-08-04 15:07:37'),
(41, 'CO800B', 'On the Job Training (CSDP OJT)', 'CSDP', 2, 1, 2, 1, '', '1', '2016-08-04 15:08:39'),
(42, 'CS101', 'Computer Fundamentals With Business Application Software', 'BSIT', 1, 1, 2, 1, '', '1', '2016-08-13 07:39:10'),
(43, 'CS102', 'Introduction to Information Systems', 'BSIT', 1, 2, 2, 1, 'CS101', '1', '2016-08-02 08:11:42'),
(44, 'CS103A', 'Internet Technologies', 'BSCS', 2, 1, 2, 1, 'CS101A', '1', '2016-08-02 05:58:44'),
(45, 'CS201A', 'Mathematical Analysis', 'BSCS', 2, 1, 3, 0, 'GE213B', '1', '2016-08-02 05:59:29'),
(46, 'CS202A', 'Discrete Mathematics', 'BSCS', 2, 1, 3, 0, 'GE211A', '1', '2016-08-02 06:00:57'),
(47, 'CS203B', 'Mathematical Analysis 2', 'BSCS', 2, 2, 3, 0, 'CS201A', '1', '2016-08-02 06:01:46'),
(48, 'CS211B', 'PC Troubleshooting And Maintenance', 'CSNT', 1, 2, 1, 2, 'CN101A', '1', '2016-08-12 11:25:47'),
(49, 'GE111A', 'Communication Skills 1', 'CSNT', 1, 1, 3, 0, '', '1', '2016-08-04 15:13:17'),
(50, 'CS302A', 'Computer Programming 1 (C++)', 'BSCS', 2, 1, 2, 1, 'CS301A', '1', '2016-08-02 06:05:30'),
(51, 'CS303A', 'Digital Designs', 'BSCS', 2, 1, 2, 1, 'CS101A', '1', '2016-08-02 06:06:09'),
(52, 'CS304B', 'Data Structure and Algorithms', 'BSCS', 2, 2, 2, 1, 'CS302A', '1', '2016-08-02 06:08:39'),
(53, 'CS305B', 'Computer Organization and Assembly Language', 'BSCS', 2, 2, 2, 1, 'CS303A,CS302A', '1', '2016-08-02 06:11:11'),
(54, 'CS306B', 'Object Oriented Programming', 'BSCS', 2, 2, 2, 1, 'CS302A', '1', '2016-08-02 06:12:40'),
(55, 'CS377', 'Application Lifecycle Mgt. (HP) (Free Elective 1)', 'BSCS', 2, 2, 2, 1, 'CS302A', '1', '2016-08-02 06:13:11'),
(56, 'CS378', 'Load Testing (HP) Free Elective 2', 'BSCS', 3, 2, 2, 1, 'CS377', '1', '2016-08-02 06:13:48'),
(57, 'CS379', 'Unified Functional Testing (HP)', 'BSCS', 4, 1, 2, 1, 'CS378', '1', '2016-08-02 06:14:26'),
(58, 'CS401A', 'Algorithms Design and Analysis', 'BSCS', 3, 1, 3, 0, 'CS304B', '1', '2016-08-02 06:14:53'),
(59, 'CS401A', 'Database Mgt. Systems 1', 'BSCS', 3, 1, 2, 1, 'CS306B', '1', '2016-08-02 06:15:24'),
(60, 'CS403A', 'Principles of Programming Languages with Compilers', 'BSCS', 3, 1, 3, 0, 'CS302B', '1', '2016-08-02 06:16:28'),
(61, 'CS404A', 'Principles of Operating Systems and its Applications', 'BSCS', 3, 1, 2, 1, 'CS305B', '1', '2016-08-02 06:16:52'),
(62, 'CS405A', 'Data Comm. and Networking 1', 'BSCS', 3, 1, 2, 1, 'CS310B', '1', '2016-08-02 06:17:17'),
(63, 'CS406B', 'Automata and Language Theory', 'BSCS', 3, 2, 3, 0, 'CS302B', '1', '2016-08-02 06:17:55'),
(64, 'CS408B', 'Computer Programming 2 (JAVA)', 'BSCS', 3, 2, 2, 1, 'CS302B', '1', '2016-08-02 06:18:40'),
(65, 'CS409B', 'Introduction to Software Engineering', 'BSCS', 3, 2, 2, 1, 'CS401B', '1', '2016-08-02 06:19:20'),
(66, 'CS410B', 'Web Programming and Development', 'BSCS', 3, 2, 2, 1, 'CS402A', '1', '2016-08-02 06:19:47'),
(67, 'CS411A', 'Modelling and Simulation', 'BSCS', 4, 1, 3, 0, '4TH YEAR STANDING', '1', '2016-08-02 06:20:37'),
(68, 'CS412B', 'ITE Professional Ethics and Values', 'BSCS', 4, 2, 3, 0, '4TH YEAR STANDING', '1', '2016-08-02 06:21:00'),
(69, 'CS500A', 'CS Practicum (min. of 162 hrs,)', 'BSCS', 4, 1, 6, 0, '4TH YEAR STANDING', '1', '2016-08-02 06:21:26'),
(70, 'CS600A', 'CS Thesis A', 'BSCS', 4, 1, 3, 0, '', '1', '2016-08-01 10:19:25'),
(71, 'CS601', 'CS Thesis B', 'BSCS', 4, 2, 3, 0, 'CS600', '1', '2016-08-02 06:40:24'),
(72, 'CSME1', 'CS Major Elective 1', 'BSCS', 3, 2, 3, 0, '', '1', '2016-08-09 17:22:02'),
(73, 'CSME2', 'CS Major Elective 2', 'BSCS', 4, 2, 3, 0, '', '1', '2016-08-09 17:22:07'),
(74, 'CSME3', 'CS Major Elective 3', 'BSCS', 4, 2, 3, 0, '', '1', '2016-08-09 17:22:13'),
(75, 'CSME4', 'CS Major Elective 4', 'BSCS', 4, 2, 3, 0, '', '1', '2016-08-09 17:22:16'),
(76, 'CSSD03B', 'Computer Programming 6 (Microsoft.NET)', 'CSDP', 2, 2, 2, 4, 'CS302B', '1', '2016-08-04 15:19:11'),
(77, 'CSSD05A', 'Computer Programming 8 (Advance JAVA)', 'CSDP', 2, 1, 2, 4, 'CS302B', '1', '2016-08-04 15:20:15'),
(78, 'ENTRE101', 'Major Elective 1 Entrepreneurship', 'BSBA', 2, 2, 3, 0, '', '1', '2016-08-01 10:27:37'),
(79, 'GE111', 'Communication Skills 1', 'BSCS', 1, 1, 3, 0, '', '1', '2016-08-01 10:28:18'),
(80, 'GE112', 'Communication Skills 2', 'BSCS', 1, 2, 3, 0, 'GE111', '1', '2016-08-02 06:41:10'),
(81, 'GE113A', 'Speech Communication 1', 'BSCS', 2, 1, 3, 0, 'GE112B', '1', '2016-08-02 06:41:45'),
(82, 'GE116', 'Technical, Scientific and Business English', 'BSIT', 2, 2, 3, 0, 'GE112', '1', '2016-08-02 08:12:08'),
(83, 'GE116B', 'Technical, Scientific and Business English', 'BSCS', 3, 2, 3, 0, 'GE112', '1', '2016-08-02 07:50:55'),
(84, 'GE121', 'Komunikasyon sa Akademikong Fiipino', 'BSCS', 1, 1, 3, 0, '', '1', '2016-08-01 10:35:11'),
(85, 'GE122', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 'BSCS', 1, 2, 3, 0, 'GE121', '1', '2016-08-02 06:43:12'),
(86, 'GE131A', 'Philippine Literature', 'BSCS', 4, 1, 3, 0, '', '1', '2016-08-01 10:36:18'),
(87, 'GE141', 'Introduction to Philosophy with Logic', 'BSCS', 1, 1, 3, 0, '', '1', '2016-08-01 10:36:42'),
(88, 'GE151A', 'Art, Man and Society', 'BSCS', 3, 1, 3, 0, '', '1', '2016-08-01 10:37:30'),
(89, 'GE211', 'College Algebra', 'BSCS', 1, 1, 3, 0, '', '1', '2016-08-12 10:55:08'),
(90, 'GE212', 'Trigonometry', 'BSCS', 1, 2, 3, 0, 'GE211', '1', '2016-08-02 06:45:30'),
(91, 'GE212B', 'Mathematics of Investments', 'BSHRM', 1, 2, 3, 0, 'GE211A', '1', '2016-08-03 08:30:18'),
(92, 'GE213', 'Statistics and Probrability', 'BSCS', 1, 2, 3, 0, 'GE211', '1', '2016-08-02 07:12:47'),
(93, 'GE231A', 'Computer Fund. with MS Application', 'BSHRM', 1, 1, 2, 1, '', '1', '2016-08-01 10:43:37'),
(94, 'GE151', 'Art,Man and Society ', 'BSIS', 2, 1, 3, 0, '', '1', '2016-08-10 15:36:04'),
(95, 'GE312', 'Environmental Science', 'BSIS', 2, 1, 3, 0, '', '1', '2016-08-04 15:32:02'),
(96, 'GE312A', 'Environmental Science', 'BSCS', 2, 1, 3, 0, '', '1', '2016-08-01 10:49:52'),
(97, 'GE313', 'Physical Science', 'BSCS', 1, 2, 3, 0, 'GE211', '1', '2016-08-02 07:13:30'),
(98, 'GE411', 'General Psychology', 'BSCS', 1, 1, 3, 0, '', '1', '2016-08-01 10:50:49'),
(99, 'GE412', 'Society and Culture with FP & HIV', 'BSIT', 2, 2, 3, 0, '', '1', '2016-08-02 08:13:27'),
(100, 'GE412B', 'Society and Culture with FP&HIV/SARS Prevention', 'BSCS', 2, 2, 3, 0, '', '1', '2016-08-01 10:53:46'),
(101, 'GE412B', 'Phil. History, Politics, Governance, & Constitution', 'BSCS', 2, 2, 3, 0, '', '1', '2016-08-10 15:42:17'),
(102, 'GE211', 'College Algebra', 'BSIT', 1, 1, 3, 0, '', '1', '2016-08-14 16:19:39'),
(103, 'GE414A', 'Intro to Microeconomic Theory and Policy with LRT', 'BSCS', 3, 1, 3, 0, 'GE211A', '1', '2016-08-02 06:50:36'),
(104, 'GE415A', 'Life and Works of Jose Rizal', 'BSCS', 4, 1, 3, 0, '', '1', '2016-08-01 10:59:50'),
(105, 'GE113', 'speech Communication 1', 'BSIS', 2, 1, 3, 0, 'GE112', '1', '2016-08-04 15:02:29'),
(106, 'GE511', 'Euthenics 1', 'BSIT', 1, 1, 1, 0, '', '1', '2016-08-01 11:02:26'),
(107, 'GE512', 'Euthenics 2', 'BSIT', 1, 2, 1, 0, 'GE511', '1', '2016-08-02 08:14:26'),
(108, 'GE521', 'Physical Education 1', 'BSIT', 1, 1, 2, 0, '', '1', '2016-08-01 11:03:14'),
(109, 'GE522', 'Physical Education 2', 'BSIT', 1, 2, 0, 2, 'GE521', '1', '2016-08-02 08:14:58'),
(110, 'GE523A', 'Physical Education 3', 'BSCS', 2, 1, 2, 0, 'GE522', '1', '2016-08-02 06:51:25'),
(111, 'GE524B', 'Physical Education 4', 'BSCS', 2, 2, 2, 0, 'GE523', '1', '2016-08-02 06:51:48'),
(112, 'GE531', 'National Service Training Program 1', 'BSIT', 1, 1, 3, 0, '', '1', '2016-08-01 11:05:14'),
(113, 'GE532', 'National Service Training Program 2', 'BSIT', 1, 2, 3, 0, 'GE531', '1', '2016-08-02 08:16:32'),
(114, 'HC101A', 'Principles of Tourism 1', 'BSHRM', 1, 2, 3, 0, '', '1', '2016-08-01 11:07:50'),
(115, 'HC102A', 'Tourism Planning and Development', 'BSHRM', 3, 2, 3, 0, 'HC101,HC301', '1', '2016-08-03 08:33:11'),
(116, 'HC104A', 'Foreign Language 1', 'BSHRM', 3, 1, 3, 0, '', '1', '2016-08-01 11:10:30'),
(117, 'HC105B', 'Foreign Language 2', 'BSHRM', 3, 2, 3, 0, 'HC104A', '1', '2016-08-03 08:33:33'),
(118, 'HC204', 'Hygiene, Sanitation and Environment', 'BSHRM', 2, 1, 2, 1, 'GE211A', '1', '2016-08-03 08:33:52'),
(119, 'HC301', 'Principles Of Tourism 2 with Intro to Hospitality & Tourism Operation', 'BSHRM', 2, 1, 2, 1, 'HC101', '1', '2016-08-04 06:31:34'),
(120, 'HE101A', 'Front Office Mangement', 'BSHRM', 2, 2, 2, 1, 'HC301B,GE233', '1', '2016-08-04 06:31:54'),
(121, 'HE105B', 'Hospitality and Tourism Law', 'BSHRM', 4, 1, 3, 0, 'HC301A', '1', '2016-08-04 06:32:16'),
(122, 'HE106A', 'Resort and Club Operations Management', 'BSHRM', 4, 1, 2, 1, 'HC301B', '1', '2016-08-04 06:32:29'),
(123, 'HE107A', 'MICE / Events Management', 'BSHRM', 4, 1, 3, 1, 'Graduating', '1', '2016-08-04 06:32:54'),
(124, 'HR101A', 'Front Office Management', 'HRS', 2, 1, 5, 4, '', '1', '2016-08-04 15:35:21'),
(125, 'HR101B', 'House Keeping Management', 'BSHRM', 2, 2, 2, 1, 'HC204', '1', '2016-08-04 06:33:15'),
(126, 'HR102B', 'Bar & Beverage Management', 'BSHRM', 3, 2, 2, 1, 'TR203A,HR104', '1', '2016-08-04 06:33:46'),
(127, 'HR103B', 'Hospitality Facilities Planning and Design', 'BSHRM', 3, 1, 2, 1, 'HC301B', '1', '2016-08-04 06:34:01'),
(128, 'HR104B', 'Food & Beverage Services', 'BSHRM', 3, 1, 2, 1, 'HC204,TR203', '1', '2016-08-04 06:34:20'),
(129, 'HR106B', 'Case Study', 'BSHRM', 4, 2, 3, 0, 'Graduating', '1', '2016-08-04 06:34:34'),
(130, 'HR107B', 'Practicum', 'BSHRM', 4, 2, 12, 0, 'Graduating', '1', '2016-08-04 06:34:46'),
(131, 'HR201B', 'Rooms Division Mgt. & Control System', 'BSHRM', 3, 1, 2, 1, 'HR101', '1', '2016-08-04 06:35:02'),
(132, 'HR203A', 'Food & Beverage Control System', 'BSHRM', 3, 2, 2, 1, 'HR104', '1', '2016-08-04 06:35:24'),
(133, 'HR204A', 'Banquet Functions & Catering Services', 'BSHRM', 3, 2, 2, 1, 'HR104', '1', '2016-08-04 06:35:34'),
(134, 'HR700B', 'On the Job Training (HRS OJT)', 'HRS', 2, 2, 5, 4, '', '1', '2016-08-04 15:37:39'),
(135, 'HRDM301', 'Major Course 1 (Administrative and office Management)', 'BSBA', 2, 2, 3, 0, '', '1', '2016-08-01 11:31:47'),
(136, 'HRDM311', 'Major Subject 3 (Recruitment Selection)', 'BSBA', 3, 1, 3, 0, '', '1', '2016-08-01 11:32:47'),
(137, 'HRDM321', 'Major Course 4 - Compensation and Administration', 'BSBA', 3, 2, 3, 0, '', '1', '2016-08-01 11:34:34'),
(138, 'HRDM331', 'Major Course 5 - Labor Relation and Negotiations', 'BSBA', 3, 2, 3, 0, '', '1', '2016-08-01 11:37:37'),
(139, 'HRDM343', 'Major Course 6 - Training and Development', 'BSBA', 3, 2, 3, 0, '', '1', '2016-08-01 11:37:59'),
(140, 'HRDM344', 'Major Course 7 - Organization and Development', 'BSBA', 4, 1, 3, 0, '', '1', '2016-08-01 11:38:37'),
(141, 'HRDM410', 'Major Elective 2 - Performance Management and Development', 'BSBA', 3, 2, 2, 1, '', '1', '2016-08-01 11:40:42'),
(142, 'HRDM411', 'Major Elective 3 - International Issues in HR Management', 'BSBA', 4, 1, 3, 0, '', '1', '2016-08-01 11:41:15'),
(143, 'HRDM412', 'Major Elective 4 - Special Topics in Human Resource Management', 'BSBA', 4, 1, 3, 0, '', '1', '2016-08-01 11:42:10'),
(144, 'HRDM413', 'Major Elective 5 - Seminars in HR Management', 'BSBA', 4, 2, 3, 0, '', '1', '2016-08-01 11:42:43'),
(145, 'IT202', 'System Analysis And Design', 'BSIT', 3, 1, 2, 1, 'GE212', '1', '2016-08-14 16:23:17'),
(146, 'MGT301', 'Major Course 8 - Strategic Human Resource Management', 'BSBA', 4, 1, 3, 0, 'BE601', '1', '2016-08-02 15:53:44'),
(147, 'MGT311', 'Production and Operations Management', 'BSBA', 2, 1, 3, 0, '', '1', '2016-08-01 11:46:06'),
(148, 'NT', 'Switch and Advance Router Configuration', 'CSNT', 2, 1, 2, 1, 'NT121B', '1', '2016-08-04 15:39:12'),
(149, 'NT111A', 'Basic Networking', 'CSNT', 1, 1, 2, 1, '', '1', '2016-08-12 11:17:18'),
(150, 'NT121B', 'Basic Router Configuration', 'CSNT', 1, 2, 2, 1, 'NT111A', '1', '2016-08-04 23:56:56'),
(151, 'NT142B', 'Wide Area Network', 'CSNT', 2, 2, 2, 1, '', '1', '2016-08-12 11:27:38'),
(152, 'NT212A', 'Structure Cabling System', 'CSNT', 2, 1, 2, 1, 'NT111A', '1', '2016-08-04 15:43:35'),
(153, 'NT311B', 'Network Infrastructure and Directory Services', 'CSNT', 1, 2, 2, 1, 'NT111A', '1', '2016-08-04 15:44:32'),
(154, 'NT412A', 'Linux Administration', 'CSNT', 2, 1, 2, 1, 'NT111A', '1', '2016-08-04 15:45:43'),
(156, 'TC342B', 'Work Ethics and Standards', 'CSNT', 1, 2, 3, 0, '', '1', '2016-08-04 15:48:26'),
(157, 'TCM142', 'Technical, Scientific and Business English', 'WAD', 2, 2, 3, 0, 'TCM132', '1', '2016-08-04 23:53:09'),
(158, 'TCM211', 'Basic Mathematical Processes', 'WAD', 1, 1, 3, 0, '', '1', '2016-08-04 16:01:42'),
(159, 'TCM411', 'Physical Fitness', 'WAD', 1, 1, 2, 0, '', '1', '2016-08-04 16:02:50'),
(160, 'TCM421', 'Rhythmic Activities', 'WAD', 1, 1, 2, 0, 'TCM411', '1', '2016-08-04 23:53:32'),
(161, 'TCM432', 'Individual / Dual Sports', 'WAD', 2, 1, 2, 0, 'TCM421', '1', '2016-08-04 16:04:14'),
(162, 'TCM442', 'Team Sports', 'WAD', 2, 2, 2, 0, 'TCM423', '1', '2016-08-04 16:04:57'),
(163, 'HR101A', 'Housekeeping Management', 'HRS', 2, 1, 4, 4, '', '1', '2016-08-04 16:08:43'),
(164, 'TR203A', 'Culinary Arts and Science', 'HRS', 1, 1, 3, 4, '', '1', '2016-08-04 16:10:01'),
(165, 'GE111A', 'Communication Arts and Skills 1', 'HRS', 1, 1, 3, 0, '', '1', '2016-08-04 16:14:33'),
(166, 'WAD111', 'Web Analysis and Design', 'WAD', 1, 1, 2, 1, '', '1', '2016-08-04 16:16:12'),
(167, 'WAD211', 'Web Application Programming 1 (DW)', 'WAD', 1, 2, 2, 1, 'CCM111,WAD111', '1', '2016-08-04 16:17:25'),
(168, 'WAD221', 'Web Application Programming 2(F)', 'WAD', 1, 2, 2, 1, 'CCM111,WAD111', '1', '2016-08-04 16:18:32'),
(169, 'WAD232', 'Web Application Programming 3 (AW)', 'WAD', 2, 1, 2, 1, 'CCM111,WAD111', '1', '2016-08-04 16:19:11'),
(170, 'WAD311', 'Web Application Development 1 (HTML)', 'WAD', 1, 2, 2, 1, 'WAD111', '1', '2016-08-04 16:19:58'),
(171, 'WAD412', 'XML - based Web Applications with SQL', 'WAD', 2, 1, 2, 1, 'WAD311', '1', '2016-08-04 16:21:20'),
(172, 'WAD422', 'Web Enhanced Animation Graphics', 'WAD', 2, 2, 2, 1, 'WAD322', '1', '2016-08-04 16:22:33'),
(173, 'WAD432', 'Web Security and Management', 'WAD', 2, 2, 2, 1, 'Graduating', '1', '2016-08-04 16:23:37'),
(174, 'WAD700', 'Special Project in Web Application Development', 'WAD', 2, 2, 2, 1, 'Graduating', '1', '2016-08-04 16:25:32'),
(176, 'GE511', 'Euthenics 1', 'BSCS', 1, 1, 1, 0, '', '1', '2016-08-02 07:39:47'),
(177, 'CS101', 'Computer Fundamentals with Business Application Software', 'BSCS', 1, 1, 2, 1, '', '1', '2016-08-02 07:00:07'),
(179, 'GE521', 'Physical Education 1', 'BSCS', 1, 1, 2, 0, '', '1', '2016-08-02 07:39:46'),
(180, 'GE531', 'National Service Training Program 1', 'BSCS', 1, 1, 3, 0, '', '1', '2016-08-02 07:39:46'),
(181, 'CS102', 'Intro to Information System', 'BSCS', 1, 2, 2, 1, 'CS101', '1', '2016-08-02 07:07:30'),
(182, 'CS301', 'Introduction to Programming(C Language)', 'BSCS', 1, 2, 2, 1, 'CS101', '1', '2016-08-02 07:33:08'),
(183, 'GE512', 'Euthenics 2', 'BSCS', 1, 2, 1, 0, 'GE511', '1', '2016-08-02 07:09:11'),
(184, 'GE522', 'Physical Education 2', 'BSCS', 1, 2, 2, 0, 'GE521', '1', '2016-08-02 07:17:51'),
(185, 'GE532', 'National Service Training Program 2', 'BSCS', 1, 2, 3, 0, 'GE531', '1', '2016-08-02 07:17:51'),
(186, 'GE111', 'Communication Skills 1', 'BSIT', 1, 1, 3, 0, '', '1', '2016-08-02 08:19:46'),
(187, 'GE121', 'Komunikasyon sa Akademikong Filipino', 'BSIT', 1, 1, 3, 0, '', '1', '2016-08-02 08:19:46'),
(188, 'GE141', 'Intro to Philosophy w/ Logic', 'BSIT', 1, 1, 3, 0, '', '1', '2016-08-13 19:06:22'),
(189, 'GE411', 'General Psychology', 'BSIT', 1, 1, 3, 0, '', '1', '2016-08-13 19:06:11'),
(191, 'GE112', 'Communication Skills 2', 'BSIT', 1, 2, 3, 0, 'GE111', '1', '2016-08-02 08:29:20'),
(192, 'GE122', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 'BSIT', 1, 2, 3, 0, 'GE121', '1', '2016-08-02 08:29:20'),
(193, 'GE212', 'Trigonometry', 'BSIT', 1, 2, 3, 0, 'GE211', '1', '2016-08-02 08:31:58'),
(194, 'GE213', 'Statistic and Probability', 'BSIT', 1, 2, 3, 0, 'GE211', '1', '2016-08-02 08:31:58'),
(195, 'GE313', 'Physical Science', 'BSIT', 1, 2, 3, 0, 'GE211', '1', '2016-08-02 08:33:54'),
(196, 'CS301', 'Intro to Programming (C Language)', 'BSIT', 1, 2, 2, 1, 'CS101', '1', '2016-08-02 08:38:07'),
(197, 'GE113', 'Speech Communication 1', 'BSIT', 2, 1, 3, 0, 'GE112', '1', '2016-08-02 08:38:07'),
(198, 'GE151', 'Art,Man and Society', 'BSIT', 2, 1, 3, 0, '', '1', '2016-08-02 08:40:43'),
(199, 'GE312', 'Environmental Science', 'BSIT', 2, 1, 3, 0, 'GE311', '1', '2016-08-02 08:40:43'),
(200, 'CS202', 'Discrete Mathematics', 'BSIT', 2, 1, 3, 0, 'GE211', '1', '2016-08-02 08:45:26'),
(201, 'CS103', 'Internet Technologies', 'BSIT', 2, 1, 2, 1, 'CS101', '1', '2016-08-15 12:55:43'),
(202, 'CS302', 'Computer Programming 1(c++)', 'BSIT', 2, 1, 2, 1, 'CS301', '1', '2016-08-02 10:38:28'),
(203, 'IT101', 'Accounting for non-accountants', 'BSIT', 2, 1, 3, 0, 'GE211', '1', '2016-08-02 10:38:28'),
(204, 'GE523', 'Physical Education 3', 'BSIT', 2, 1, 2, 0, '', '1', '2016-08-02 10:42:30'),
(205, 'GE413', 'Phil.History,Politics,Governance & Constitution', 'BSIT', 2, 2, 3, 0, '', '1', '2016-08-02 10:42:30'),
(206, 'CS305', 'Computer Organization And Assembly Language', 'BSIT', 2, 2, 2, 1, 'CS302', '1', '2016-08-14 16:24:50'),
(207, 'CS306', 'Object Oriented Programming(VB)', 'BSIT', 2, 2, 2, 1, 'CS302', '1', '2016-08-13 19:00:54'),
(208, 'CS408', 'Computer Programming 2(JAVA)', 'BSIT', 2, 2, 2, 1, 'CS302', '1', '2016-08-14 16:36:57'),
(209, 'IT201', 'Computer Installation and Configuration', 'BSIT', 2, 2, 2, 1, 'CS302', '1', '2016-08-14 16:36:55'),
(210, 'GE524', 'Physical Education 4', 'BSIT', 2, 2, 2, 0, '', '1', '2016-08-02 10:50:36'),
(211, 'CS401', 'Database Management System 1', 'BSIT', 3, 1, 2, 1, 'CS306', '1', '2016-08-02 14:55:27'),
(212, 'CS404', 'Principles of Operating Systems and its Applications', 'BSIT', 3, 1, 2, 1, 'CS305', '1', '2016-08-02 14:55:27'),
(213, 'CS405', 'Data Commu. and Networking 1', 'BSIT', 3, 1, 2, 1, 'CS310', '1', '2016-08-02 15:00:32'),
(214, 'ITME1', 'IT Major Elective 1', 'BSIT', 3, 1, 2, 1, '', '1', '2016-08-14 11:43:28'),
(215, 'GE415', 'Life and Works of Rizal', 'BSIT', 3, 2, 3, 0, '', '1', '2016-08-02 15:09:36'),
(216, 'CS409', 'Introduction to Software Engineering', 'BSIT', 3, 2, 2, 1, 'CS401', '1', '2016-08-02 15:09:36'),
(217, 'CS410', 'Web programming and Development', 'BSIT', 3, 2, 2, 1, 'IT202', '1', '2016-08-02 15:09:36'),
(218, 'CS402', 'Database Management Systems 2', 'BSIT', 3, 2, 2, 1, 'CS401', '1', '2016-08-02 15:09:36'),
(219, 'GE131', 'Philippine Literature', 'BSIT', 3, 2, 3, 0, '', '1', '2016-08-02 15:24:14'),
(220, 'CS377', 'Application Lifecycle Management', 'BSIT', 3, 2, 2, 1, 'CS302', '1', '2016-08-02 15:24:14'),
(221, 'ITME2', 'IT Major Elective 2', 'BSIT', 3, 2, 2, 1, '', '1', '2016-08-14 16:37:56'),
(222, 'IT302', 'Multimedia Systems', 'BSIT', 4, 1, 2, 1, 'CS410', '1', '2016-08-02 15:24:14'),
(223, 'IT304', 'Network Security', 'BSIT', 4, 1, 2, 1, '4th year Standing', '1', '2016-08-02 15:24:14'),
(224, 'IT500', 'IT(Practicum(min.of 486 hours)', 'BSIT', 4, 1, 9, 0, 'Graduating', '1', '2016-08-02 15:24:14'),
(225, 'CS378', 'Loading Testing(HP)(Free Elective 2)', 'BSIT', 4, 1, 2, 1, 'CS377', '1', '2016-08-02 15:24:14'),
(226, 'ITME3', 'IT Major Elective 3', 'BSIT', 4, 1, 2, 1, '', '1', '2016-08-14 16:37:48'),
(227, 'CS412', 'ITE Professional Ethics and Values', 'BSIT', 4, 2, 3, 0, '4th year Standing', '1', '2016-08-02 15:39:09'),
(228, 'IT303', 'Current Trends in IT', 'BSIT', 4, 2, 2, 1, '4th year Standing', '1', '2016-08-02 15:39:09'),
(229, 'IS202', 'Project Management and Quality Systems', 'BSIT', 4, 2, 3, 0, 'CS410', '1', '2016-08-02 15:39:09'),
(230, 'IT600', 'IT Capstone Project(Entrepreneurship)', 'BSIT', 4, 2, 3, 0, '', '1', '2016-08-02 15:39:09'),
(231, 'CS379', 'Unified Functional Testing(HP)(Free Elective 3)', 'BSIT', 4, 2, 2, 1, 'CS378', '1', '2016-08-14 16:37:28'),
(232, 'ITME4', 'IT Major Elective 4', 'BSIT', 4, 2, 2, 1, '', '1', '2016-08-14 16:37:37'),
(233, 'GE111A', 'English Communication Skills 1', 'BSBA', 1, 1, 3, 0, '', '1', '2016-08-02 16:05:09'),
(234, 'GE211A', 'College Algebra', 'BSBA', 1, 1, 3, 0, '', '1', '2016-08-02 16:05:09'),
(235, 'GE141A', 'Introduction to Philosophy w/ Logic', 'BSBA', 1, 1, 3, 0, '', '1', '2016-08-02 16:05:09'),
(236, 'GE231A', 'Computer Fund.with MS Application', 'BSBA', 1, 1, 2, 1, '', '1', '2016-08-02 16:05:09'),
(237, 'BE201A', 'Introduction to Business and Phil.Financial System', 'BSBA', 1, 1, 3, 0, '', '1', '2016-08-02 16:05:09'),
(238, 'GE301A', 'General Psychology ', 'BSBA', 1, 1, 3, 0, '', '1', '2016-08-02 16:05:09'),
(239, 'GE521A', 'Physical Education 1', 'BSBA', 1, 1, 2, 0, '', '1', '2016-08-02 16:26:11'),
(240, 'GE511A', 'Euthenics 1', 'BSBA', 1, 1, 1, 0, '', '1', '2016-08-02 16:26:11'),
(241, 'GE531A', 'National Service Training Program 1', 'BSBA', 1, 1, 0, 0, '', '1', '2016-08-02 16:26:11'),
(242, 'GE112B', 'English Communication Skills 2', 'BSBA', 1, 2, 3, 0, 'GE111A', '1', '2016-08-02 16:26:11'),
(243, 'BE501B', 'Principles of Management and Organization', 'BSBA', 1, 2, 3, 0, '', '1', '2016-08-02 16:26:11'),
(244, 'BE302B', 'Phil.History w/ Politics and Governance', 'BSBA', 1, 2, 3, 0, '', '1', '2016-08-02 16:26:11'),
(245, 'BE801B', 'Business Statistics ', 'BSBA', 1, 2, 3, 0, 'GE211A', '1', '2016-08-02 16:26:11'),
(246, 'GE212B', 'Mathematics of Investments ', 'BSBA', 1, 2, 3, 0, 'GE211A', '1', '2016-08-02 16:26:11'),
(247, 'BE401B', 'Fundamentals of Accounting 1 ', 'BSBA', 1, 2, 2, 1, 'GE211A', '1', '2016-08-02 16:26:11'),
(248, 'GE522B', 'Physical Education 2', 'BSBA', 1, 2, 2, 0, 'GE521A', '1', '2016-08-02 16:26:11'),
(249, 'GE512B', 'Euthenics 2', 'BSBA', 1, 2, 1, 0, 'GE511A', '1', '2016-08-02 16:49:12'),
(250, 'GE532B', 'National Service Training Program 2', 'BSBA', 1, 2, 0, 0, 'GE531A', '1', '2016-08-02 16:49:12'),
(251, 'GE113', 'Speech Communication 1', 'BSBA', 1, 2, 3, 0, 'GE112B', '1', '2016-08-02 16:49:12'),
(252, 'GE304A', 'Intro to MicroEconomics Theory & Policy w/ LRT', 'BSBA', 1, 2, 3, 0, 'GE211', '1', '2016-08-02 16:49:12'),
(253, 'GE121A', 'Komunikasyon sa Akademikong Filipino', 'BSBA', 2, 1, 3, 0, '', '1', '2016-08-02 16:49:12'),
(254, 'BE402', 'Fundamentals of Accounting 2', 'BSBA', 2, 1, 2, 1, 'BE401B', '1', '2016-08-02 16:49:12'),
(255, 'BE502A', 'Human Behaviour in Organization ', 'BSBA', 2, 1, 3, 0, 'BE501', '1', '2016-08-02 16:49:12'),
(256, 'GE523A', 'Physical Education 3', 'BSBA', 2, 1, 2, 0, 'GE522B', '1', '2016-08-02 16:49:12'),
(257, 'GE122B', 'Pagbasa at Pagsulat Sa Ibat ibang Disiplina ', 'BSBA', 2, 2, 3, 0, 'GE121A', '1', '2016-08-02 16:49:12'),
(259, 'GE303B', 'Society and culture w/ FP&HIV/SARS PREVENTION', 'BSBA', 2, 2, 3, 0, '', '1', '2016-08-02 17:07:31'),
(260, 'BE101B', 'Intro to MacroEconomic Theory& Practice', 'BSBA', 2, 2, 3, 0, 'GE304A', '1', '2016-08-02 17:07:31'),
(261, 'GE524B', 'Physical Education 4', 'BSBA', 2, 2, 2, 0, 'GE523A', '1', '2016-08-02 17:07:31'),
(262, 'GE131A', 'Philippine Literature', 'BSBA', 3, 1, 3, 0, '', '1', '2016-08-02 17:07:31'),
(263, 'GE232A', 'Business Software Packages', 'BSBA', 3, 1, 2, 1, 'GE231A', '1', '2016-08-02 17:07:31'),
(264, 'GE223', 'Environmental Science', 'BSBA', 3, 1, 3, 0, '', '1', '2016-08-02 17:07:31'),
(265, 'GE116B', 'Business Communication Technical, Scientific &Business English', 'BSBA', 3, 2, 3, 0, 'GE112', '1', '2016-08-02 17:07:31'),
(266, 'BE601B', 'Law on Obligation and Contracts', 'BSBA', 3, 2, 3, 0, '', '1', '2016-08-02 17:07:31'),
(267, 'BE701B', 'Phil.Tax System and Income Tax ', 'BSBA', 3, 2, 3, 0, '', '1', '2016-08-02 17:07:31'),
(268, 'GE401A', 'Life and Works of Jose Rizal', 'BSBA', 4, 1, 3, 0, '', '1', '2016-08-02 17:07:31'),
(269, 'GE151A', 'Art,Man and Society', 'BSBA', 4, 1, 3, 0, '', '1', '2016-08-02 17:16:34'),
(270, 'MG108B', 'Practicum/OJT', 'BSBA', 4, 2, 9, 0, 'Graduating', '1', '2016-08-02 17:16:34'),
(271, 'MG107B', 'Case Study', 'BSBA', 4, 2, 3, 0, 'Graduating', '1', '2016-08-02 17:16:34'),
(272, 'BE901B', 'Business Ethics with Social Responsibility and Good Governance', 'BSBA', 4, 2, 3, 0, '', '1', '2016-08-02 17:16:34'),
(273, 'GE111', 'COMMUNICATION SKILLS 1', 'BSA', 1, 1, 3, 0, '', '1', '2016-08-03 06:53:20'),
(275, 'GE141', 'Philosophy of Man w/ Logic and Critical Thingking', 'BSA', 1, 1, 3, 0, '', '1', '2016-08-03 06:55:56'),
(276, 'CS101', 'Computer Fundamental with MS Application', 'BSA', 1, 1, 2, 1, '', '1', '2016-08-03 07:13:26'),
(277, 'GE411', 'General Psychology', 'BSA', 1, 1, 3, 0, '', '0', '2016-08-14 16:38:19'),
(278, 'BE201', 'Intro. to Business and Phili.Financial System', 'BSA', 1, 1, 3, 0, '', '1', '2016-08-03 07:14:58'),
(279, 'GE521', 'Physical Education 1', 'BSA', 1, 1, 2, 0, '', '1', '2016-08-03 07:14:58'),
(280, 'GE511', 'Euthenics 1', 'BSA', 1, 1, 1, 0, '', '1', '2016-08-03 07:16:37'),
(281, 'GE531', 'National Service Training Program 1', 'BSA', 1, 1, 0, 0, '', '1', '2016-08-03 07:16:37'),
(282, 'GE112', 'Communication Skills 2', 'BSA', 1, 2, 3, 0, 'GE111', '1', '2016-08-03 07:18:33'),
(283, 'GE213', 'Mathematics and Investment ', 'BSA', 1, 2, 3, 0, 'GE211', '1', '2016-08-03 07:18:33'),
(284, 'GE232', 'Fund of Progg & Database Theory and Application', 'BSA', 1, 2, 2, 1, 'CS101', '1', '2016-08-03 07:21:03'),
(285, 'BE501', 'Principles of Management and Organization ', 'BSA', 1, 2, 3, 0, '', '1', '2016-08-03 07:21:03'),
(286, 'GE522', 'Physical Education 2', 'BSA', 1, 2, 2, 0, 'GE521', '1', '2016-08-03 07:22:46'),
(287, 'GE512', 'Euthenics 2', 'BSA', 1, 2, 1, 0, 'GE511', '1', '2016-08-03 07:22:46'),
(288, 'GE532B', 'National Service Training Program 2', 'BSA', 1, 2, 0, 0, 'GE531', '1', '2016-08-03 07:24:40'),
(289, 'GE113', 'Speech Communication 1', 'BSA', 2, 1, 3, 0, 'GE112', '1', '2016-08-03 07:24:40'),
(290, 'GE121', 'Kom.sa Akademikong Filipino', 'BSA', 2, 1, 3, 0, 'GE112', '1', '2016-08-03 07:27:01'),
(291, 'GE416', 'Principle of Economics with Agrarian Reform and Taxation', 'BSA', 2, 1, 3, 0, 'GE211', '1', '2016-08-03 07:27:01'),
(292, 'BE502', 'Human Behaviour in Organization', 'BSA', 2, 1, 3, 0, 'BE501', '1', '2016-08-03 07:28:43'),
(293, 'GE523', 'Physical Education 3', 'BSA', 2, 1, 2, 0, 'GE522', '1', '2016-08-03 07:28:43'),
(294, 'GE122', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 'BSA', 2, 2, 3, 0, 'GE121', '1', '2016-08-03 07:30:52'),
(295, 'GE311', 'General Chemistry', 'BSA', 2, 2, 2, 1, 'GE211', '', '2016-08-03 07:30:52'),
(296, 'GE413', 'Phil.History Politics Governance&Constitution', 'BSA', 2, 2, 3, 0, '', '1', '2016-08-03 07:33:20'),
(297, 'GE412', 'Society and Culture w/ FP&HIV/SARS PREVENTION', 'BSA', 2, 2, 3, 0, '', '', '2016-08-03 07:33:20'),
(298, 'BE101', 'Microeconomics Theory and Practice', 'BSA', 2, 2, 3, 0, 'GE416', '1', '2016-08-03 07:34:58'),
(299, 'GE524', 'Physical Education 4', 'BSA', 2, 2, 2, 0, 'GE523', '1', '2016-08-03 07:37:50'),
(300, 'BE102', 'Macroeconomics Theory and Practice', 'BSA', 3, 1, 3, 0, 'BE101', '1', '2016-08-03 07:37:50'),
(301, 'GE312', 'Environmental Science', 'BSA', 3, 1, 3, 0, '', '1', '2016-08-03 07:39:39'),
(302, 'BE503', 'Production and Operation Management', 'BSA', 3, 1, 3, 0, 'BE801,BE802', '1', '2016-08-03 07:39:39'),
(303, 'GE116', 'Technical scientific Business English', 'BSA', 3, 2, 3, 0, 'GE112', '1', '2016-08-03 07:41:51'),
(304, 'GE131', 'Philippine Literature', 'BSA', 3, 2, 3, 0, '', '1', '2016-08-03 07:41:51'),
(305, 'GE117', 'World Literature', 'BSA', 3, 2, 3, 0, '', '1', '2016-08-03 07:43:34'),
(306, 'TE109', 'IT Concept and System Analysis and Design', 'BSA', 3, 2, 2, 1, 'CS101', '1', '2016-08-03 07:43:34'),
(307, 'BE601', 'Law and Obligation and Contracts', 'BSA', 3, 2, 3, 0, '', '1', '2016-08-03 07:45:27'),
(308, 'BE701', 'Philippine Tax System and Income Tax', 'BSA', 3, 2, 3, 0, 'BE402', '1', '2016-08-03 07:45:27'),
(309, 'AC102', 'Financial Accounting and Reporting 2', 'BSA', 3, 2, 5, 1, 'AC101', '1', '2016-08-05 16:03:04'),
(310, 'GE415', 'Life and Work of Jose Rizal', 'BSA', 4, 1, 3, 0, '', '1', '2016-08-03 08:07:05'),
(311, 'GE151', 'Artman and Society', 'BSA', 4, 1, 3, 0, '', '1', '2016-08-03 08:08:55'),
(312, 'AC601', 'Business Software Package', 'BSA', 4, 1, 2, 1, 'CS101', '1', '2016-08-03 08:08:55'),
(313, 'BE901', 'Bus.Ethics with Good Governance & Social Responsibilty', 'BSA', 4, 1, 3, 0, 'BE501,BE602', '1', '2016-08-03 08:10:14'),
(314, 'GE111A', 'Communication Skill 1', 'BSHRM', 1, 1, 3, 0, '', '1', '2016-08-04 06:37:33'),
(315, 'GE121A', 'Kom. sa Akademikong Filipino', 'BSHRM', 1, 1, 3, 0, '', '1', '2016-08-04 06:37:33'),
(316, 'GE301A', 'General Psychology', 'BSHRM', 1, 1, 3, 0, '', '1', '2016-08-04 06:38:57'),
(317, 'GE211A', 'College Algebra', 'BSHRM', 1, 1, 3, 0, '', '1', '2016-08-04 06:38:57'),
(318, 'GE141A', 'Intro. to Philosophy with Logic', 'BSHRM', 1, 1, 3, 0, '', '1', '2016-08-04 06:42:30'),
(319, 'GE511A', 'Euthenics 1', 'BSHRM', 1, 1, 1, 0, '', '1', '2016-08-04 06:42:30'),
(320, 'GE531A', 'Natoional Service Training Program 1', 'BSHRM', 1, 1, 3, 0, '', '1', '2016-08-04 06:44:34'),
(321, 'GE521', 'Physical Education 1', 'BSHRM', 1, 1, 2, 0, '', '1', '2016-08-04 06:44:34'),
(322, 'GE112B', 'Communication Skills 2', 'BSHRM', 1, 2, 3, 0, 'GE111A', '1', '2016-08-04 06:46:05'),
(323, 'GE122B', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 'BSHRM', 1, 2, 3, 0, 'GE121A', '1', '2016-08-04 06:46:05'),
(324, 'GE414', 'Intro to Economics with LRT ', 'BSHRM', 1, 2, 3, 0, '', '1', '2016-08-04 06:47:52'),
(325, 'BE301A', 'Principles of Marketing', 'BSHRM', 1, 2, 3, 0, 'BE501B', '1', '2016-08-04 06:47:52'),
(326, 'GE233B', 'Mgt.Info.Sys. w/ Internet Technologies', 'BSHRM', 1, 2, 2, 1, 'GE231A', '1', '2016-08-04 06:49:58'),
(327, 'GE522', 'Euthenics 2', 'BSHRM', 1, 2, 1, 0, '', '1', '2016-08-04 06:49:58'),
(328, 'GE532B', 'National Service Training Program 2', 'BSHRM', 1, 2, 3, 0, '', '1', '2016-08-04 06:51:17'),
(329, 'GE522', 'Physical Education 2', 'BSHRM', 1, 2, 2, 0, '', '1', '2016-08-04 06:51:17'),
(330, 'GE113A', 'Speech Communication 1', 'BSHRM', 2, 1, 3, 0, 'GE112B', '1', '2016-08-04 06:53:16'),
(331, 'GE131A', 'Philippine Literature ', 'BSHRM', 2, 1, 3, 0, 'GE112B', '1', '2016-08-04 06:53:16'),
(332, 'BE405A', 'Accounting for non-accountants', 'BSHRM', 2, 1, 3, 0, 'GE211A', '1', '2016-08-04 06:54:21'),
(333, 'GE302', 'Phil.History,Politics,Governance&Constitution ', 'BSHRM', 2, 1, 3, 0, '', '1', '2016-08-04 07:57:00'),
(334, 'BE801', 'Business Statistic', 'BSHRM', 2, 1, 3, 0, 'GE211A', '1', '2016-08-04 07:57:00'),
(335, 'GE523A', 'Physical Education  ', 'BSHRM', 2, 1, 2, 0, '', '1', '2016-08-04 08:00:20'),
(336, 'GE116B', 'Business Communication:Technical,Scientific & Bus.English', 'BSHRM', 2, 2, 3, 0, 'GE112B', '1', '2016-08-04 08:00:20'),
(337, 'TR201B', 'Hospitality/Tourism Mktg.Mgt.', 'BSHRM', 2, 2, 3, 0, 'BE301A', '1', '2016-08-04 08:04:01'),
(338, 'GE412', 'Antropology/Society and Culture w/ FP& HIV', 'BSHRM', 2, 2, 3, 0, '', '1', '2016-08-04 08:04:01'),
(339, 'TR203A', 'Culinary Arts and Sciences', 'BSHRM', 2, 2, 2, 1, 'HC204', '1', '2016-08-04 08:11:18'),
(340, 'GE223A', 'Environmental Science', 'BSHRM', 3, 1, 3, 0, '', '1', '2016-08-04 08:11:18'),
(341, 'TR205A', 'Total Quality Management', 'BSHRM', 3, 1, 3, 0, '3rd year Standing', '1', '2016-08-04 08:14:17'),
(342, 'GE401A', 'Life and Works of Jose Rizal', 'BSHRM', 3, 2, 3, 0, '', '1', '2016-08-04 08:14:17'),
(343, 'GE151A', 'Art,MAN,Society ', 'BSHRM', 4, 2, 3, 0, '', '1', '2016-08-04 08:16:54'),
(344, 'HR203A', 'International Cuisine', 'BSHRM', 4, 1, 1, 1, 'TR203A', '1', '2016-08-04 08:16:54'),
(345, 'GE111', 'Communication Skills 1', 'BSIS', 1, 1, 3, 0, '', '1', '2016-08-04 13:22:29'),
(346, 'GE121', 'Komunikasyon sa Akademikong Filipino', 'BSIS', 1, 1, 3, 0, '', '1', '2016-08-04 13:22:29'),
(347, 'GE141', 'Introduction to Philosophy with Logic', 'BSIS', 1, 1, 3, 0, '', '1', '2016-08-04 13:38:26'),
(348, 'GE411', 'General Psychology', 'BSIS', 1, 1, 3, 0, '', '1', '2016-08-04 13:38:26'),
(350, 'CS101', 'Computer Fundamentals with Business Application Software', 'BSIS', 1, 1, 2, 1, '', '1', '2016-08-04 13:47:42'),
(351, 'GE511', 'Euthenics 1', 'BSIS', 1, 1, 1, 0, '', '1', '2016-08-04 13:47:42'),
(352, 'GE521', 'Physical Education 1', 'BSIS', 1, 1, 1, 0, '', '1', '2016-08-04 13:51:59'),
(353, 'GE531', 'National Service Training Program 1', 'BSIS', 1, 1, 3, 0, '', '1', '2016-08-04 13:59:53'),
(354, 'GE112', 'Communication Skills 2', 'BSIS', 1, 2, 3, 0, 'GE111', '1', '2016-08-04 14:04:43'),
(355, 'GE122', 'Pagbasa at Pagsulat tungo sa Pananaliksik', 'BSIS', 1, 2, 3, 0, 'GE121', '1', '2016-08-04 14:04:43'),
(356, 'GE212', 'Trigonometry', 'BSIS', 1, 2, 3, 0, 'GE211', '1', '2016-08-04 14:19:58'),
(357, 'GE213', 'Statistic and Probability', 'BSIS', 1, 2, 3, 0, 'GE211', '1', '2016-08-04 14:19:58'),
(358, 'GE313', 'Physical Science', 'BSIS', 1, 2, 3, 0, 'GE211', '1', '2016-08-04 14:19:58'),
(359, 'CS102', 'Introduction to Information System', 'BSIS', 1, 2, 2, 1, 'CS101', '1', '2016-08-04 14:19:58'),
(360, 'CS301', 'Introduction to Programming (C Language)', 'BSIS', 1, 2, 2, 1, 'CS101', '1', '2016-08-04 14:30:49'),
(361, 'GE512', 'Euthenics 2', 'BSIS', 1, 2, 1, 0, 'GE511', '1', '2016-08-04 14:30:49'),
(362, 'GE522', 'Physical Education 2', 'BSIS', 1, 2, 2, 0, 'GE521', '1', '2016-08-04 14:30:49'),
(363, 'TCM111', 'Communication Skills 1', 'WAD', 1, 1, 3, 0, '', '1', '2016-08-04 22:01:54'),
(364, 'TCM311', 'Principles of Management', 'WAD', 1, 1, 3, 0, '', '1', '2016-08-04 17:26:41'),
(365, 'CCM111', 'Computer Fundamentals with MS Application', 'WAD', 1, 1, 2, 1, '', '1', '2016-08-04 17:26:41'),
(366, 'TCM511', 'National Service Training Program 1', 'WAD', 1, 1, 3, 0, '', '1', '2016-08-04 17:26:41'),
(367, 'TCM511', 'Euthenics 1', 'WAD', 1, 1, 1, 0, '', '1', '2016-08-04 17:26:41'),
(368, 'TCM521', 'National Service Training Program 2', 'WAD', 1, 2, 3, 0, 'TCM511', '1', '2016-08-04 17:26:41'),
(369, 'TCM121', 'Communication Skills 2', 'WAD', 1, 2, 3, 0, 'TCM111', '1', '2016-08-04 17:26:41'),
(370, 'SOD411', 'Computer Programming 1(C Language)', 'WAD', 1, 2, 2, 1, 'TCM111', '1', '2016-08-04 22:20:43'),
(371, 'TCM132', 'Speech Communication 2', 'WAD', 2, 2, 3, 0, 'TCM121', '1', '2016-08-04 22:20:43'),
(372, 'TCM342', 'Work Ethics and Standards', 'WAD', 2, 1, 3, 0, '', '1', '2016-08-04 22:20:43'),
(373, 'WAD322', 'Web Application Development Development 2(j)', 'WAD', 2, 2, 2, 1, 'CCM111,WAD111', '1', '2016-08-04 22:20:43'),
(374, 'TCM142', 'Technical,Scientific&Business English', 'WAD', 2, 2, 3, 0, 'TCM132', '1', '2016-08-04 22:20:43'),
(375, 'WAD800', 'On-The-Job Training', 'WAD', 2, 2, 0, 0, 'Graduating', '1', '2016-08-04 22:20:43'),
(376, 'GE112B', 'Communication Skills 2', 'CSNT', 1, 2, 3, 0, 'GE511A', '1', '2016-08-04 22:34:06'),
(377, 'GE532B', 'National Service Training Program 2', 'CSNT', 1, 2, 3, 0, '', '1', '2016-08-04 22:34:06'),
(378, 'GE522B', 'Physical Education 2', 'CSNT', 1, 2, 2, 0, '', '1', '2016-08-04 22:34:06'),
(379, 'CS301A', 'Intro to Programming 1(C Language', 'CSNT', 2, 1, 2, 1, 'CS101A', '1', '2016-08-04 22:34:06'),
(380, 'TCM111', 'Communication Skills 1', 'CBA', 1, 1, 3, 0, '', '1', '2016-08-04 22:55:25'),
(381, 'TCM211', 'Basic Mathematical Process', 'CBA', 1, 1, 3, 0, '', '1', '2016-08-04 22:55:25'),
(382, 'TCM311', 'Principles of Management', 'CBA', 1, 1, 3, 0, '', '1', '2016-08-04 22:55:25'),
(383, 'CCM111', 'Computer Fundamentals with MS Application', 'CBA', 1, 1, 2, 1, '', '1', '2016-08-04 22:55:25'),
(384, 'CBA11', 'Fundamentals of Accounting 1', 'CBA', 1, 1, 3, 0, '', '1', '2016-08-04 22:55:25'),
(385, 'TCM411', 'Physical Fitness', 'CBA', 1, 1, 2, 0, '', '1', '2016-08-04 22:55:25'),
(386, 'TCM511', 'National Service Training Program 1', 'CBA', 1, 1, 3, 0, '', '1', '2016-08-04 22:55:25'),
(387, 'TCM611', 'Euthnics 1', 'CBA', 1, 1, 1, 0, '', '1', '2016-08-04 22:55:25'),
(388, 'TCM121', 'Communication Skills 2', 'CBA', 1, 2, 3, 0, 'TCM111', '1', '2016-08-04 22:55:25'),
(389, 'CBA122', 'Fundamentals of Accounting 2', 'CBA', 1, 2, 3, 0, '	CBA111', '1', '2016-08-04 22:55:25'),
(390, 'CBA211', 'Computer- Based Accounting 1', 'CBA', 1, 2, 3, 0, 'CBA111', '1', '2016-08-04 22:55:25'),
(391, 'CBA312', 'Income Taxation', 'CBA', 1, 2, 3, 0, '', '1', '2016-08-04 22:55:25'),
(392, 'TCM421', 'Rhythmic Activities', 'CBA', 1, 2, 2, 0, 'TCM411', '1', '2016-08-04 23:55:27'),
(393, 'TCM521', 'National Service Training Program 2', 'CBA', 1, 2, 3, 0, 'TCM511', '1', '2016-08-04 23:15:45'),
(394, 'TCM132', 'Speech Communication 1', 'CBA', 2, 1, 3, 0, 'TCM121', '1', '2016-08-04 23:15:45'),
(395, 'TCM321', 'Work,Ethics,and Standards', 'CBA', 2, 1, 3, 0, '', '1', '2016-08-04 23:15:45'),
(396, 'CBA131', 'Partnership and Corporation', 'CBA', 2, 1, 2, 1, 'CBA122', '1', '2016-08-04 23:15:45'),
(397, 'CBA221', 'Computer-Based Accounting 2', 'CBA', 2, 1, 4, 2, 'CBA211', '1', '2016-08-04 23:15:45'),
(398, 'TCM432', 'Individual/Dual Sports', 'CBA', 2, 1, 2, 0, 'TCM421', '1', '2016-08-04 23:15:45'),
(399, 'TCM142', 'Technical,Scientific&Business English', 'CBA', 2, 2, 3, 0, 'TCM132', '1', '2016-08-04 23:15:45'),
(400, 'CBA142', 'Management Accounting', 'CBA', 2, 2, 3, 0, 'CBA131', '1', '2016-08-04 23:15:45'),
(401, 'CBA232', 'Computer-Based Accounting Integrated', 'CBA', 2, 2, 2, 1, 'CBA221', '1', '2016-08-04 23:15:45'),
(402, 'CBA700', 'Special Project in Computer-Based Accounting', 'CBA', 2, 2, 3, 0, 'Graduating', '1', '2016-08-04 23:15:45'),
(403, 'CBA800', 'On-the-Job Training', 'CBA', 2, 2, 3, 0, 'Graduating', '1', '2016-08-04 23:15:45'),
(404, 'TCM442', 'Team Sports', 'CBA', 2, 2, 2, 0, 'TCM432', '1', '2016-08-04 23:15:45'),
(405, 'CS101', 'Computer Fundamentals with Business Application Software', 'HRS', 1, 1, 2, 1, '', '1', '2016-08-04 23:26:33'),
(406, 'GE531A', 'National Service Training Program 1', 'HRS', 1, 1, 2, 0, '', '1', '2016-08-04 23:26:33'),
(407, 'GE521A', 'Physical Education 1', 'HRS', 1, 1, 2, 0, '', '1', '2016-08-04 23:26:33'),
(408, 'HR102B', 'Bar & Beverage Management', 'HRS', 1, 2, 2, 2, '', '1', '2016-08-04 23:26:33'),
(409, 'HR104B', 'Food & Beverage Services', 'HRS', 1, 2, 3, 4, '', '1', '2016-08-04 23:26:33'),
(410, 'GE532B', 'National Service Training Program 2', 'HRS', 1, 2, 3, 0, '', '1', '2016-08-04 23:26:33'),
(411, 'GE522B', 'Physical Education 2', 'HRS', 1, 2, 2, 0, '', '1', '2016-08-04 23:26:33'),
(412, 'GE11A', 'Communication Skills 1', 'CSDP', 1, 1, 3, 0, '', '1', '2016-08-04 23:50:12'),
(413, 'GE211A', 'College Algebra', 'CSDP', 1, 1, 3, 0, '', '1', '2016-08-04 23:50:12'),
(414, 'CS101A', 'Computer Fundamentals with Business Application Software', 'CSDP', 1, 1, 2, 1, '', '1', '2016-08-04 23:50:12'),
(415, 'CS301A', 'Introduction to Programming Language (C Language', 'CSDP', 1, 1, 2, 1, '', '1', '2016-08-04 23:50:12'),
(416, 'GE531A', 'National Service Training Program 1', 'CSDP', 1, 1, 3, 0, '', '1', '2016-08-04 23:50:12'),
(417, 'GE621A', 'Physical Education 1', 'CSDP', 1, 1, 2, 0, '', '1', '2016-08-04 23:50:12'),
(418, 'GE112B', 'Communication Skills 2', 'CSDP', 1, 2, 3, 0, 'GE511A', '1', '2016-08-04 23:50:12'),
(419, 'TC342B', 'Work Ethics and Standard', 'CSDP', 1, 2, 3, 0, '', '1', '2016-08-04 23:50:12'),
(420, 'CS302B', 'Computer Programming 1(C++)', 'CSDP', 1, 2, 2, 1, 'CS301A', '1', '2016-08-04 23:50:12'),
(421, 'CS306B', 'Object-Oriented Programming', 'CSDP', 1, 2, 2, 1, 'CS301A', '1', '2016-08-04 23:50:12'),
(422, 'IT202A', 'System Analysis and Design', 'CSDP', 1, 2, 2, 1, 'CS301A', '1', '2016-08-04 23:50:12'),
(423, 'GE532B', 'National Service Training Program 2', 'CSDP', 1, 2, 3, 0, '', '1', '2016-08-04 23:50:12'),
(424, 'GE522B', 'Physical Education 2', 'CSDP', 1, 2, 2, 0, '', '1', '2016-08-04 23:50:12'),
(425, 'CS408A', 'Computer Programming 2 (JAVA)', 'CSDP', 2, 1, 2, 1, 'CS302B', '1', '2016-08-04 23:50:12'),
(445, 'GE211A', 'Communication Skills 1', 'BOAS', 1, 1, 3, 0, '', '1', '2016-08-05 07:20:35'),
(446, 'GE211A', 'College Algebra', 'BOAS', 1, 1, 3, 0, '', '1', '2016-08-05 07:20:35'),
(447, 'CS101A', 'Computer Fundamentals with MS Application', 'BOAS', 1, 1, 2, 1, '', '1', '2016-08-05 07:20:35'),
(448, 'BE401A', 'Fundamentals of Accounting 1', 'BOAS', 1, 1, 4, 1, '', '1', '2016-08-05 07:25:14'),
(449, 'GE531A', 'National Service Trainin Program 1', 'BOAS', 1, 1, 3, 0, '', '1', '2016-08-05 07:25:14'),
(450, 'GE521A', 'Physical Education 1', 'BOAS', 1, 1, 2, 0, '', '1', '2016-08-05 07:25:14'),
(451, 'MKTGO4', 'Customer Relationship Management', 'BOAS', 1, 2, 3, 0, '', '1', '2016-08-05 07:35:45'),
(452, 'GE113B', 'Speech Communication 1', 'BOAS', 1, 2, 3, 0, '', '1', '2016-08-05 07:35:45'),
(453, 'GE113B', 'Speech Communication 2', 'BOAS', 1, 2, 4, 5, '', '1', '2016-08-05 07:35:45'),
(454, 'GE532B', 'Ntional Service Training Program 2', 'BOAS', 1, 2, 3, 0, '', '1', '2016-08-05 07:35:45'),
(455, 'GE522B', 'Physical Education 2', 'BOAS', 1, 2, 2, 0, '', '1', '2016-08-05 07:35:45'),
(456, 'MG104AA', 'Management Services', 'BOAS', 2, 1, 3, 1, '', '1', '2016-08-05 07:35:45'),
(457, 'BE402A', 'Fundamentals of Accounting 2', 'BOAS', 2, 1, 5, 1, 'BE401A', '1', '2016-08-05 07:35:45'),
(458, 'BA336B', 'Review Internal Control Systems', 'BOAS', 2, 1, 3, 0, '', '1', '2016-08-05 07:35:45'),
(459, 'BA700B', 'On the Job Training', 'BOAS', 2, 2, 0, 3, '', '1', '2016-08-05 07:35:45'),
(463, 'NT42B', 'Network Security', 'CSNT', 2, 2, 2, 1, 'CN700B', '1', '2016-08-12 11:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time`
--

DROP TABLE IF EXISTS `tbl_time`;
CREATE TABLE IF NOT EXISTS `tbl_time` (
  `id` int(11) NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_time`
--

INSERT INTO `tbl_time` (`id`, `timeStart`, `timeEnd`) VALUES
(1, '07:30:00', '22:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `mi` varchar(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` enum('ADMIN','SECRETARY','REGISTRAR','PROFILING') NOT NULL,
  `user_status` enum('1','0') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `lastname`, `firstname`, `mi`, `username`, `password`, `user_type`, `user_status`, `date_added`) VALUES
(1, 'Imperial', 'Roy', '', 'R.IMPERIAL', '123', 'ADMIN', '1', '2016-08-12 16:47:06'),
(2, 'SECRETARY', 'SECRETARY', '', 'SECRETARY', '123', 'SECRETARY', '1', '2016-08-12 16:49:29'),
(3, 'REGISTRAR', 'REGISTRAR', '', 'REGISTRAR', '123', 'REGISTRAR', '1', '2016-08-12 16:48:17'),
(4, 'PROFILING', 'PROFILING', '', 'PROFILING', '123', 'PROFILING', '1', '2016-08-12 16:49:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
  ADD PRIMARY KEY (`schoolyear_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_time`
--
ALTER TABLE `tbl_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_schoolyear`
--
ALTER TABLE `tbl_schoolyear`
  MODIFY `schoolyear_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=464;
--
-- AUTO_INCREMENT for table `tbl_time`
--
ALTER TABLE `tbl_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
