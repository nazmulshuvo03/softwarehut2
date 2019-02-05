-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 04:30 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `softwarehut`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE IF NOT EXISTS `attendence` (
  `attendence_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `in_time` varchar(100) DEFAULT NULL,
  `out_time` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`attendence_id`),
  UNIQUE KEY `attendence_id` (`attendence_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `attendence`
--


-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE IF NOT EXISTS `authentication` (
  `authentication_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`authentication_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`authentication_id`, `person_id`, `email`, `type`, `password`) VALUES
(1, 1, 'admin@gmail.com', 'Admin', 'admin'),
(8, 8, 'nazmulshuvo03@live.com', 'Employee', '123456'),
(9, 9, 'abdurrahman@gmail.com', 'Employee', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bank_information`
--

CREATE TABLE IF NOT EXISTS `bank_information` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `branch_code` varchar(100) DEFAULT NULL,
  `tin_number` varchar(100) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `bank_information`
--

INSERT INTO `bank_information` (`bank_id`, `person_id`, `bank_name`, `branch_code`, `tin_number`, `account_number`) VALUES
(8, 8, 'Islami Bank Dhaka', 'Mirpur', '2222', '12213443'),
(9, 9, 'Uttara Bank', 'Dhaka', '3333', '98986767');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(110) DEFAULT NULL,
  `company_title` varchar(1000) DEFAULT NULL,
  `company_address` varchar(1000) DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `company_mobile` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`company_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_title`, `company_address`, `company_email`, `company_mobile`) VALUES
(3, 'Software Hut', 'You Dream, We Build', 'Mirpur DOHS, Dhaka, Bangladesh', 'softwarehut@gmail.com', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `education_information`
--

CREATE TABLE IF NOT EXISTS `education_information` (
  `education_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `ssc_institute` varchar(100) DEFAULT NULL,
  `hsc_institute` varchar(100) DEFAULT NULL,
  `bachelor_institute` varchar(100) DEFAULT NULL,
  `masters_institute` varchar(1000) DEFAULT NULL,
  `ssc_year` varchar(100) DEFAULT NULL,
  `hsc_year` varchar(1000) DEFAULT NULL,
  `bachelor_year` varchar(1000) DEFAULT NULL,
  `masters_year` varchar(1000) DEFAULT NULL,
  `ssc_grade` varchar(1000) DEFAULT NULL,
  `hsc_grade` varchar(1000) DEFAULT NULL,
  `bachelor_grade` varchar(1000) DEFAULT NULL,
  `masters_grade` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`education_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `education_information`
--

INSERT INTO `education_information` (`education_id`, `person_id`, `ssc_institute`, `hsc_institute`, `bachelor_institute`, `masters_institute`, `ssc_year`, `hsc_year`, `bachelor_year`, `masters_year`, `ssc_grade`, `hsc_grade`, `bachelor_grade`, `masters_grade`) VALUES
(8, 8, 'School', 'College', 'University', '', '2010', '2012', '2018', '', '5.0', '5.0', '3.0', ''),
(9, 9, 'ASchool', 'BCollege', 'CUniversity', '', '2010', '2012', '2018', '', '5.0', '5.0', '3.0', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_information`
--

CREATE TABLE IF NOT EXISTS `employee_information` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `company_id` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `gross_salary` double DEFAULT NULL,
  `house_rent` double DEFAULT NULL,
  `medical_expense` double DEFAULT NULL,
  `transport_expense` double DEFAULT NULL,
  `entertainment_expense` double DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `net_salary` double DEFAULT NULL,
  `joining_date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `employee_information`
--

INSERT INTO `employee_information` (`employee_id`, `person_id`, `company_id`, `designation`, `department`, `gross_salary`, `house_rent`, `medical_expense`, `transport_expense`, `entertainment_expense`, `tax`, `net_salary`, `joining_date`) VALUES
(8, 8, '101', 'Senior Developer', 'Computer', 20000, 10000, 5000, 5000, 5000, 0, 20000, 'joining_date'),
(9, 9, '102', 'Junier Engineer', 'Electronics', 15000, 7000, 4000, 2000, 4000, 0, 15000, 'joining_date');

-- --------------------------------------------------------

--
-- Table structure for table `employment_history`
--

CREATE TABLE IF NOT EXISTS `employment_history` (
  `employment_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `previous_company` varchar(100) DEFAULT NULL,
  `department_previous` varchar(100) DEFAULT NULL,
  `designation_previous` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `end_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`employment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `employment_history`
--

INSERT INTO `employment_history` (`employment_id`, `person_id`, `previous_company`, `department_previous`, `designation_previous`, `start_time`, `end_time`) VALUES
(8, 8, 'Google Inc.', 'Software Development', 'Junior Developer', '2017', '2017'),
(9, 9, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_table`
--

CREATE TABLE IF NOT EXISTS `leave_table` (
  `leave_table_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `annual_leave_taken` int(11) DEFAULT NULL,
  `casual_leave_taken` int(11) DEFAULT NULL,
  `medical_leave_taken` int(11) DEFAULT NULL,
  `others_leave_taken` int(11) DEFAULT NULL,
  `year` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`leave_table_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `leave_table`
--

INSERT INTO `leave_table` (`leave_table_id`, `person_id`, `annual_leave_taken`, `casual_leave_taken`, `medical_leave_taken`, `others_leave_taken`, `year`) VALUES
(8, 8, 0, 0, 0, 0, NULL),
(9, 9, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE IF NOT EXISTS `leave_type` (
  `leave_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `annual_leave` int(11) DEFAULT NULL,
  `casual_leave` int(11) DEFAULT NULL,
  `medical_leave` int(11) DEFAULT NULL,
  `others_leave` int(11) DEFAULT NULL,
  PRIMARY KEY (`leave_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `leave_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`) VALUES
(16, 'Nazmul Alom', 'nazmulshuvo03@live.com', 'I have a message');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE IF NOT EXISTS `performance` (
  `performance_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `allocated_task` int(11) DEFAULT NULL,
  `completed_task` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`performance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`performance_id`, `person_id`, `allocated_task`, `completed_task`, `Rating`, `comment`) VALUES
(8, 8, 0, 0, NULL, 'no task'),
(9, 9, 0, 0, NULL, 'no task');

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE IF NOT EXISTS `personal_information` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'male',
  `mobile_number` varchar(100) DEFAULT NULL,
  `emergency_number` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(10000) DEFAULT NULL,
  `date_of_birth` varchar(100) DEFAULT NULL,
  `maritial_status` varchar(100) DEFAULT NULL,
  `allocated_resource` varchar(1000) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`person_id`, `full_name`, `gender`, `mobile_number`, `emergency_number`, `email`, `address`, `date_of_birth`, `maritial_status`, `allocated_resource`, `image`) VALUES
(8, 'Nazmul Alom', 'Male', '0987654321', '', 'nazmulshuvo03@live.com', 'Barisal', '06021995', 'Single', 'Laptop, Hard-Drive', 'employee_pics/18-04-14_02-34-54d9505f570a73f1c4e290ecf00b250f0e--baby-kittens-small-kittens.jpg'),
(9, 'Abdur Rahman', 'Male', '0123456789', '', 'abdurrahman@gmail.com', 'Dhaka', '01021995', 'Single', 'Laptop', 'employee_pics/18-04-14_02-45-43baby-animals-cats-cute-animals-kitten-Favim.com-5140341.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_type` varchar(100) DEFAULT NULL,
  `percentage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tax`
--

