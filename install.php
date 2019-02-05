<?php
include('config.php');

CREATE TABLE IF NOT EXISTS `attendence` (
`attendence_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `in_time` varchar(100) DEFAULT NULL,
  `out_time` varchar(100) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY(`attendence_id`),
  UNIQUE KEY `attendence_id` (`attendence_id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1;

--
--Dumping data for table `attendence`
--


-- --------------------------------------------------------

--
--Table structure for table `authentication`
--

CREATE TABLE IF NOT EXISTS `authentication` (
`authentication_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY(`authentication_id`)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;

--
--Dumping data for table `authentication`
--

INSERT INTO `authentication` (`authentication_id`, `person_id`, `email`, `type`, `password`) VALUES
(1, 1, 'emon0407@gmail.com', 'Admin', 'iit123');

-- --------------------------------------------------------

--
--Table structure for table `bank_information`
--

CREATE TABLE IF NOT EXISTS `bank_information` (
`bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `branch_code` varchar(100) DEFAULT NULL,
  `tin_number` varchar(100) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY(`bank_id`)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;

--
--Dumping data for table `bank_information`
--

INSERT INTO `bank_information` (`bank_id`, `person_id`, `bank_name`, `branch_code`, `tin_number`, `account_number`) VALUES
(1, 1, 'Butch Bangla Bank', 'dt-001', 'd001', 'dtb-475');

-- --------------------------------------------------------

--
--Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(110) DEFAULT NULL,
  `company_title` varchar(1000) DEFAULT NULL,
  `company_address` varchar(1000) DEFAULT NULL,
  `company_email` varchar(100) DEFAULT NULL,
  `company_mobile` varchar(100) DEFAULT NULL,
  PRIMARY KEY(`company_id`),
  KEY `company_id` (`company_id`)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;

--
--Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_title`, `company_address`, `company_email`, `company_mobile`) VALUES
(1, 'Sample Company', 'Sample Motto', 'Dhanmondi, Dhaka, Bangladesh', 'sample@example.com', '0000000');

-- --------------------------------------------------------

--
--Table structure for table `education_information`
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
  PRIMARY KEY(`education_id`)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;

--
--Dumping data for table `education_information`
--

INSERT INTO `education_information` (`education_id`, `person_id`, `ssc_institute`, `hsc_institute`, `bachelor_institute`, `masters_institute`, `ssc_year`, `hsc_year`, `bachelor_year`, `masters_year`, `ssc_grade`, `hsc_grade`, `bachelor_grade`, `masters_grade`) VALUES
(1, 1, 'Nasirabad', 'CPSC, Mymensingh', 'IIT, University of Dhaka', '', '2008', '2010', '2014', '', '5.0', '5.0', '3.5', '');

-- --------------------------------------------------------

--
--Table structure for table `employee_information`
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
  PRIMARY KEY(`employee_id`)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;

--
--Dumping data for table `employee_information`
--

INSERT INTO `employee_information` (`employee_id`, `person_id`, `company_id`, `designation`, `department`, `gross_salary`, `house_rent`, `medical_expense`, `transport_expense`, `entertainment_expense`, `tax`, `net_salary`) VALUES
(1, 1, 'SE-001', 'Junior Software Engineer', 'Engineering', 100000, 20000, 10000, 5000, 10000, 4250, 95750);

-- --------------------------------------------------------

--
--Table structure for table `employment_history`
--

CREATE TABLE IF NOT EXISTS `employment_history` (
`employment_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `previous_company` varchar(100) DEFAULT NULL,
  `department_previous` varchar(100) DEFAULT NULL,
  `designation_previous` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `end_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY(`employment_id`)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;

--
--Dumping data for table `employment_history`
--

INSERT INTO `employment_history` (`employment_id`, `person_id`, `previous_company`, `department_previous`, `designation_previous`, `start_time`, `end_time`) VALUES
(1, 1, '', '', '', '', '');

-- --------------------------------------------------------

--
--Table structure for table `leave_table`
--

CREATE TABLE IF NOT EXISTS `leave_table` (
`leave_table_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `annual_leave_taken` int(11) DEFAULT NULL,
  `casual_leave_taken` int(11) DEFAULT NULL,
  `medical_leave_taken` int(11) DEFAULT NULL,
  `others_leave_taken` int(11) DEFAULT NULL,
  `year` varchar(11) DEFAULT NULL,
  PRIMARY KEY(`leave_table_id`)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;

--
--Dumping data for table `leave_table`
--

INSERT INTO `leave_table` (`leave_table_id`, `person_id`, `annual_leave_taken`, `casual_leave_taken`, `medical_leave_taken`, `others_leave_taken`, `year`) VALUES
(1, 1, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
--Table structure for table `leave_type`
--

CREATE TABLE IF NOT EXISTS `leave_type` (
`leave_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `annual_leave` int(11) DEFAULT NULL,
  `casual_leave` int(11) DEFAULT NULL,
  `medical_leave` int(11) DEFAULT NULL,
  `others_leave` int(11) DEFAULT NULL,
  PRIMARY KEY(`leave_type_id`)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;

--
--Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`leave_type_id`, `annual_leave`, `casual_leave`, `medical_leave`, `others_leave`) VALUES
(1, 10, 10, 10, 10);

-- --------------------------------------------------------

--
--Table structure for table `performance`
--

CREATE TABLE IF NOT EXISTS `performance` (
`performance_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `allocated_task` int(11) DEFAULT NULL,
  `completed_task` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY(`performance_id`)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;

--
--Dumping data for table `performance`
--

INSERT INTO `performance` (`performance_id`, `person_id`, `allocated_task`, `completed_task`, `Rating`, `comment`) VALUES
(1, 1, 0, 0, NULL, 'no task');

-- --------------------------------------------------------

--
--Table structure for table `personal_information`
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
  PRIMARY KEY(`person_id`)
) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 2;

--
--Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`person_id`, `full_name`, `gender`, `mobile_number`, `emergency_number`, `email`, `address`, `date_of_birth`, `maritial_status`, `allocated_resource`, `image`) VALUES
(1, 'Nadim Emon', 'Male', '000000', '111111', 'emon0407@gmail.com', 'Dhanmondi, Dhaka', '11/19/1991', 'Single', 'Car, Laptop', 'employee_pics/14-04-12_06-17-39Desert - Copy.jpg');

-- --------------------------------------------------------

--
--Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
`tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_type` varchar(100) DEFAULT NULL,
  `percentage` varchar(100) DEFAULT NULL,
  PRIMARY KEY(`tax_id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 AUTO_INCREMENT = 1;

--
--Dumping data for table `tax`
--

?>