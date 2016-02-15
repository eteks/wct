-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2016 at 11:32 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wellocity`
--

-- --------------------------------------------------------

--
-- Table structure for table `wc_assignschedule`
--

CREATE TABLE IF NOT EXISTS `wc_assignschedule` (
  `assignschedule_id` int(10) NOT NULL AUTO_INCREMENT,
  `assigncreateschedule_id` int(10) NOT NULL,
  `assigncategory_id` int(10) NOT NULL,
  `assignathlete_id` int(10) NOT NULL,
  `assignbib_number` varchar(50) NOT NULL,
  `assignschedule_status` tinyint(1) NOT NULL,
  `assignschedule_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`assignschedule_id`),
  KEY `assigncreateschedule_id` (`assigncreateschedule_id`),
  KEY `assignathlete_id` (`assignathlete_id`),
  KEY `assigncategory_id` (`assigncategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `wc_athlete`
--

CREATE TABLE IF NOT EXISTS `wc_athlete` (
  `athlete_id` int(10) NOT NULL AUTO_INCREMENT,
  `athlete_name` varchar(150) NOT NULL,
  `athlete_dob` date NOT NULL,
  `athlete_mobile` int(15) NOT NULL,
  `athlete_gender` varchar(10) NOT NULL,
  `athletestates_id` int(10) NOT NULL,
  `athletedistrict_id` int(10) NOT NULL,
  `athlete_address` text NOT NULL,
  `athlete_taluka` varchar(50) NOT NULL,
  `athletesports_id` int(10) NOT NULL,
  `athlete_status` tinyint(1) NOT NULL,
  `athlete_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`athlete_id`),
  KEY `athletestates_id` (`athletestates_id`),
  KEY `athletedistrict_id` (`athletedistrict_id`),
  KEY `athletesports_id` (`athletesports_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `wc_categories`
--

CREATE TABLE IF NOT EXISTS `wc_categories` (
  `categories_id` int(10) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(150) NOT NULL,
  `categories_status` tinyint(1) NOT NULL,
  `categories_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`categories_id`),
  KEY `categories_name` (`categories_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `wc_categories`
--

INSERT INTO `wc_categories` (`categories_id`, `categories_name`, `categories_status`, `categories_createddate`) VALUES
(1, 'sdgfsdgvgdfsgs', 1, '2016-02-09 04:31:02'),
(2, 'asdfxzvzxc23424', 1, '2016-02-09 04:32:05'),
(3, 'dfghdfgh', 1, '2016-02-09 04:32:32'),
(12, 'sdfgdsfg', 1, '2016-02-09 04:40:12'),
(14, 'dsfgdsfgdsfgsdgdfg', 1, '2016-02-09 04:43:54'),
(15, 'sdsdgsdfg', 1, '2016-02-09 04:46:43'),
(16, 'add', 1, '2016-02-09 04:47:03'),
(17, 'asdfdasf', 1, '2016-02-09 04:48:06'),
(18, 'sdfgdsg', 1, '2016-02-09 04:48:34'),
(19, 'dfghdfghdfgh', 1, '2016-02-09 04:48:45'),
(20, 'xcbxcvbxcvb xdfbxcbx ', 1, '2016-02-09 04:49:59'),
(21, 'zzxcvxz', 1, '2016-02-09 04:50:53'),
(22, 'dsgdf dfgdfgdfg', 1, '2016-02-09 04:51:36'),
(23, 'test', 1, '2016-02-09 07:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `wc_createschedule`
--

CREATE TABLE IF NOT EXISTS `wc_createschedule` (
  `createschedule_id` int(10) NOT NULL AUTO_INCREMENT,
  `createschedule_name` varchar(255) NOT NULL,
  `createscheduletestbattery_id` int(10) NOT NULL,
  `createschedule_date` date NOT NULL,
  `createschedule_time` time NOT NULL,
  `createschedule_venue` text NOT NULL,
  `createschedule_status` tinyint(1) NOT NULL,
  `createschedule_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`createschedule_id`),
  KEY `createscheduletestbattery_id` (`createscheduletestbattery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wc_createschedule`
--

INSERT INTO `wc_createschedule` (`createschedule_id`, `createschedule_name`, `createscheduletestbattery_id`, `createschedule_date`, `createschedule_time`, `createschedule_venue`, `createschedule_status`, `createschedule_createddate`) VALUES
(1, 'test1', 11, '2016-02-24', '08:20:00', 'aSfaesqtgdasgf', 1, '2016-02-12 18:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `wc_district`
--

CREATE TABLE IF NOT EXISTS `wc_district` (
  `district_id` int(10) NOT NULL AUTO_INCREMENT,
  `districtstates_id` int(10) NOT NULL,
  `district_name` varchar(150) NOT NULL,
  `district_status` tinyint(1) NOT NULL,
  `district_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`district_id`),
  KEY `districtstates_id` (`districtstates_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wc_district`
--

INSERT INTO `wc_district` (`district_id`, `districtstates_id`, `district_name`, `district_status`, `district_createddate`) VALUES
(2, 1, 'Karaikal', 1, '2016-02-14 08:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `wc_parametertype`
--

CREATE TABLE IF NOT EXISTS `wc_parametertype` (
  `parametertype_id` int(10) NOT NULL AUTO_INCREMENT,
  `parametertype_name` varchar(150) NOT NULL,
  `parametertype_status` tinyint(1) NOT NULL,
  `parametertype_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`parametertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `wc_parametertype`
--

INSERT INTO `wc_parametertype` (`parametertype_id`, `parametertype_name`, `parametertype_status`, `parametertype_createddate`) VALUES
(1, 'weight', 1, '2016-02-10 07:31:56'),
(2, 'distance', 1, '2016-02-10 07:32:59'),
(3, 'percentage', 1, '2016-02-10 07:32:59'),
(4, 'number', 1, '2016-02-10 07:33:43'),
(5, 'speed', 1, '2016-02-10 07:33:43'),
(6, 'time', 1, '2016-02-10 07:34:06'),
(7, 'others', 1, '2016-02-10 07:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `wc_parameterunit`
--

CREATE TABLE IF NOT EXISTS `wc_parameterunit` (
  `parameterunit_id` int(10) NOT NULL AUTO_INCREMENT,
  `parametertype_id` int(10) NOT NULL,
  `parameterunit` varchar(150) NOT NULL,
  `parameterunit_status` tinyint(1) NOT NULL,
  `parameterunit_createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`parameterunit_id`),
  KEY `parametertype_id` (`parametertype_id`),
  KEY `parametertype_id_2` (`parametertype_id`),
  KEY `parametertype_id_3` (`parametertype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `wc_parameterunit`
--

INSERT INTO `wc_parameterunit` (`parameterunit_id`, `parametertype_id`, `parameterunit`, `parameterunit_status`, `parameterunit_createdate`) VALUES
(1, 1, 'KG', 1, '2016-02-10 07:40:06'),
(2, 1, 'GM', 1, '2016-02-10 07:40:06'),
(3, 1, 'MG', 1, '2016-02-10 07:44:27'),
(4, 1, 'LBS', 1, '2016-02-10 07:44:27'),
(5, 1, 'others', 1, '2016-02-10 07:44:45'),
(6, 2, 'MT', 1, '2016-02-10 07:47:28'),
(7, 2, 'CM', 1, '2016-02-10 07:47:28'),
(8, 2, 'MM', 1, '2016-02-10 07:47:55'),
(9, 2, 'KM', 1, '2016-02-10 07:47:55'),
(10, 2, 'others', 1, '2016-02-10 07:48:12'),
(11, 2, 'others', 1, '2016-02-10 07:48:12'),
(12, 3, 'Percentage', 1, '2016-02-10 07:48:41'),
(13, 4, 'NUMBER', 1, '2016-02-10 07:49:07'),
(14, 5, 'MT/S', 1, '2016-02-10 07:50:01'),
(15, 5, 'KM/S', 1, '2016-02-10 07:50:01'),
(16, 5, 'others', 1, '2016-02-10 07:50:40'),
(17, 6, 'HH:MM', 1, '2016-02-10 07:51:49'),
(18, 6, 'HH:MM:SS', 1, '2016-02-10 07:52:21'),
(19, 6, 'HH:MM:SS:MSS', 1, '2016-02-10 07:53:38'),
(20, 6, 'MM:SS', 1, '2016-02-10 07:53:38'),
(21, 6, 'HH:MM:SS:MSS', 1, '2016-02-10 07:55:51'),
(22, 6, 'MM:SS', 1, '2016-02-10 07:55:51'),
(23, 6, 'SS:MSS', 1, '2016-02-10 07:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `wc_range`
--

CREATE TABLE IF NOT EXISTS `wc_range` (
  `range_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Stores the range id',
  `rangetestbattery_id` int(10) NOT NULL COMMENT 'Stores the reference testbattery id for handling range',
  `rangecategories_id` int(10) NOT NULL COMMENT 'Stores the reference categories id for handling range',
  `rangetest_id` int(10) NOT NULL COMMENT 'Stores the reference test id for handling range',
  `range_status` tinyint(1) NOT NULL COMMENT 'Stores the range status either active or inactive',
  `range_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of the range',
  PRIMARY KEY (`range_id`),
  KEY `rangetestbattery_id` (`rangetestbattery_id`),
  KEY `rangecategories_id` (`rangecategories_id`),
  KEY `rangetest_id` (`rangetest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table is used to store the ranges with their points for' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wc_range`
--

INSERT INTO `wc_range` (`range_id`, `rangetestbattery_id`, `rangecategories_id`, `rangetest_id`, `range_status`, `range_createddate`) VALUES
(1, 4, 1, 26, 1, '2016-02-14 06:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `wc_range_attribute`
--

CREATE TABLE IF NOT EXISTS `wc_range_attribute` (
  `range_attribute_id` int(10) NOT NULL AUTO_INCREMENT,
  `range_id` int(10) NOT NULL,
  `range_start` int(10) NOT NULL,
  `range_end` int(10) NOT NULL,
  `range_point` int(11) NOT NULL,
  `range_attribute_status` tinyint(1) NOT NULL,
  `range_attribute_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`range_attribute_id`),
  KEY `range_id` (`range_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wc_range_attribute`
--

INSERT INTO `wc_range_attribute` (`range_attribute_id`, `range_id`, `range_start`, `range_end`, `range_point`, `range_attribute_status`, `range_attribute_createddate`) VALUES
(1, 1, 0, 5, 1, 1, '2016-02-14 06:08:50'),
(2, 1, 5, 10, 1, 1, '2016-02-14 06:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `wc_result`
--

CREATE TABLE IF NOT EXISTS `wc_result` (
  `result_id` int(10) NOT NULL AUTO_INCREMENT,
  `resultcreateschedule_id` int(10) NOT NULL,
  `resultathlete_id` int(10) NOT NULL,
  `resulttest_name` varchar(50) NOT NULL,
  `resultparameter_name` varchar(50) NOT NULL,
  `result` decimal(10,0) NOT NULL,
  `points` int(5) NOT NULL,
  `result_status` tinyint(1) NOT NULL,
  `result_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`result_id`),
  KEY `resultcreateschedule_id` (`resultcreateschedule_id`),
  KEY `resultathlete_id` (`resultathlete_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wc_sports`
--

CREATE TABLE IF NOT EXISTS `wc_sports` (
  `sports_id` int(10) NOT NULL AUTO_INCREMENT,
  `sports_name` varchar(150) NOT NULL,
  `sports_status` tinyint(1) NOT NULL,
  `sports_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sports_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `wc_sports`
--

INSERT INTO `wc_sports` (`sports_id`, `sports_name`, `sports_status`, `sports_createddate`) VALUES
(12, 'test1gd', 1, '2016-02-06 12:16:51'),
(16, 'sdfgdsgf', 1, '2016-02-08 05:19:20'),
(17, 'sdfgd3434', 1, '2016-02-08 05:19:27'),
(18, 'sdfgdsgfddgd', 1, '2016-02-08 05:19:31'),
(21, 'sdfgds', 1, '2016-02-08 05:19:48'),
(22, 'sdfgds dfg', 1, '2016-02-08 05:19:53'),
(23, 'test', 1, '2016-02-08 05:37:29'),
(24, 'test', 1, '2016-02-08 05:39:03'),
(25, 'test11', 1, '2016-02-08 05:40:04'),
(26, 'test1323w', 1, '2016-02-08 05:42:00'),
(27, 'sdfcvbxcvb', 1, '2016-02-09 07:15:13'),
(28, 'sdfgdsfgsdfgdsgfdsf', 1, '2016-02-09 11:38:55'),
(29, 'sdfgdsfgsd', 1, '2016-02-09 11:39:00'),
(30, 'sdfgdfgdsf dfgdfgd', 1, '2016-02-09 11:39:32'),
(31, 'dsfgdsfgcvbxb dfgdfg ', 1, '2016-02-09 11:39:40'),
(32, 'dsfgdsfg', 1, '2016-02-09 11:40:38'),
(33, 'sdfgdsfg', 1, '2016-02-09 11:40:47'),
(34, 'sdfgdsfgsdfgsdfgs', 1, '2016-02-09 11:40:56'),
(35, 'sdfds', 1, '2016-02-10 05:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `wc_states`
--

CREATE TABLE IF NOT EXISTS `wc_states` (
  `states_id` int(10) NOT NULL AUTO_INCREMENT,
  `states_name` varchar(150) NOT NULL,
  `states_status` tinyint(1) NOT NULL,
  `states_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`states_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wc_states`
--

INSERT INTO `wc_states` (`states_id`, `states_name`, `states_status`, `states_createddate`) VALUES
(1, 'Puducherry', 1, '2016-02-06 13:10:06'),
(2, 'Arunachal Pradesh', 1, '2016-02-06 13:10:41'),
(3, 'Bihar', 1, '2016-02-06 13:10:53'),
(4, 'Kerala', 1, '2016-02-13 13:27:08'),
(5, 'Andhra Pradesh', 1, '2016-02-14 08:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `wc_test`
--

CREATE TABLE IF NOT EXISTS `wc_test` (
  `test_id` int(10) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(100) NOT NULL,
  `test_status` tinyint(1) NOT NULL,
  `test_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `wc_test`
--

INSERT INTO `wc_test` (`test_id`, `test_name`, `test_status`, `test_createddate`) VALUES
(25, 'test2', 1, '2016-02-11 07:52:37'),
(26, 'cvfhxg', 1, '2016-02-11 10:17:35'),
(27, '', 1, '2016-02-11 12:23:20'),
(28, 'gsdfgsdgf', 1, '2016-02-11 12:30:01'),
(29, 'vgfhdfghd', 1, '2016-02-12 12:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `wc_testbattery`
--

CREATE TABLE IF NOT EXISTS `wc_testbattery` (
  `testbattery_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Stores the testbattery id',
  `testbattery_name` varchar(255) NOT NULL COMMENT 'Stores the testbattery name',
  `testbatterysports_id` int(10) NOT NULL COMMENT 'Stores the testbattery name',
  `testbattery_status` tinyint(1) NOT NULL COMMENT 'Stores the testbattery status either active or inactive',
  `testbattery_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of the  testbattery',
  PRIMARY KEY (`testbattery_id`),
  KEY `testbatterysports_id` (`testbatterysports_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table is used to store the test battery for various tes' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `wc_testbattery`
--

INSERT INTO `wc_testbattery` (`testbattery_id`, `testbattery_name`, `testbatterysports_id`, `testbattery_status`, `testbattery_createddate`) VALUES
(2, 'sdfasfasdfasdf', 23, 1, '2016-02-11 13:41:55'),
(4, 'dfsgdsfgdsfg', 12, 1, '2016-02-11 13:54:49'),
(6, 'sdfgbcvbxcvb', 21, 1, '2016-02-11 13:58:15'),
(11, 'sample', 29, 1, '2016-02-12 17:05:21'),
(12, 'sdd', 12, 1, '2016-02-12 17:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `wc_testbattery_category_attribute`
--

CREATE TABLE IF NOT EXISTS `wc_testbattery_category_attribute` (
  `testbattery_category_attribute_id` int(10) NOT NULL AUTO_INCREMENT,
  `testbattery_id` int(10) NOT NULL,
  `testbattery_category_id` int(10) NOT NULL,
  `testbattery_category_status` tinyint(1) NOT NULL,
  `testbattery_category_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`testbattery_category_attribute_id`),
  KEY `testbattery_id` (`testbattery_id`),
  KEY `testbattery_category_id` (`testbattery_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `wc_testbattery_category_attribute`
--

INSERT INTO `wc_testbattery_category_attribute` (`testbattery_category_attribute_id`, `testbattery_id`, `testbattery_category_id`, `testbattery_category_status`, `testbattery_category_createddate`) VALUES
(9, 4, 1, 1, '2016-02-11 13:54:49'),
(10, 4, 2, 1, '2016-02-11 13:54:49'),
(13, 6, 3, 1, '2016-02-11 13:58:15'),
(54, 12, 2, 1, '2016-02-12 18:12:41'),
(57, 11, 1, 1, '2016-02-13 05:08:44'),
(58, 11, 2, 1, '2016-02-13 05:08:45'),
(59, 2, 16, 1, '2016-02-13 12:08:18'),
(60, 2, 17, 1, '2016-02-13 12:08:19'),
(61, 2, 20, 1, '2016-02-13 12:08:19'),
(62, 2, 21, 1, '2016-02-13 12:08:19'),
(63, 2, 22, 1, '2016-02-13 12:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `wc_testbattery_test_attribute`
--

CREATE TABLE IF NOT EXISTS `wc_testbattery_test_attribute` (
  `testbattery_test_attribute_id` int(10) NOT NULL AUTO_INCREMENT,
  `testbattery_id` int(10) NOT NULL,
  `testbattery_test_id` int(10) NOT NULL,
  `testbattery_test_attribute_status` tinyint(1) NOT NULL,
  `testbattery_test_attribute_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`testbattery_test_attribute_id`),
  KEY `testbattery_id` (`testbattery_id`),
  KEY `testbattery_test_id` (`testbattery_test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `wc_testbattery_test_attribute`
--

INSERT INTO `wc_testbattery_test_attribute` (`testbattery_test_attribute_id`, `testbattery_id`, `testbattery_test_id`, `testbattery_test_attribute_status`, `testbattery_test_attribute_createddate`) VALUES
(28, 12, 28, 1, '2016-02-12 18:12:41'),
(30, 11, 26, 1, '2016-02-13 05:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `wc_test_attribute`
--

CREATE TABLE IF NOT EXISTS `wc_test_attribute` (
  `test_attribute_id` int(10) NOT NULL AUTO_INCREMENT,
  `test_id` int(10) NOT NULL,
  `test_parameter_name` varchar(250) NOT NULL,
  `test_parameter_type` varchar(150) NOT NULL,
  `test_parameter_unit` varchar(50) NOT NULL,
  `test_parameter_format` varchar(50) NOT NULL,
  `test_attribute_status` tinyint(1) NOT NULL,
  `test_attribute_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`test_attribute_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table is used to store the attribute of the each test ' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `wc_test_attribute`
--

INSERT INTO `wc_test_attribute` (`test_attribute_id`, `test_id`, `test_parameter_name`, `test_parameter_type`, `test_parameter_unit`, `test_parameter_format`, `test_attribute_status`, `test_attribute_createddate`) VALUES
(10, 26, 'dfsgdsfg', 'percentage', 'Percentage', '3', 1, '2016-02-11 10:17:35'),
(11, 26, 'dfsgdsfgsdfg', 'number', 'NUMBER', '4', 1, '2016-02-11 10:17:35'),
(13, 28, 'sdfgdsfgds123123123', 'weight', 'KG', '2', 1, '2016-02-11 12:30:01'),
(14, 28, 'sdfgdsfgdssdfs', 'percentage', 'Percentage', '3', 1, '2016-02-11 12:30:01'),
(15, 29, 'dfghdfgh', 'percentage', 'Percentage', '3', 1, '2016-02-12 12:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `wc_usermanagement`
--

CREATE TABLE IF NOT EXISTS `wc_usermanagement` (
  `usermanagement_id` int(10) NOT NULL AUTO_INCREMENT,
  `usermanagement_type` varchar(15) NOT NULL,
  `usermanagement_username` varchar(155) NOT NULL,
  `usermanagement_password` varchar(255) NOT NULL,
  `usermanagement_status` tinyint(1) NOT NULL,
  `usermanagement_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usermanagement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wc_usermanagement`
--

INSERT INTO `wc_usermanagement` (`usermanagement_id`, `usermanagement_type`, `usermanagement_username`, `usermanagement_password`, `usermanagement_status`, `usermanagement_createddate`) VALUES
(1, 'administrator', 'administrator@gmail.com', 'administrator', 1, '2016-02-06 05:54:07'),
(2, 'admin', 'admin@gmail.com', 'admin', 1, '2016-02-10 05:09:45');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wc_assignschedule`
--
ALTER TABLE `wc_assignschedule`
  ADD CONSTRAINT `wc_assignschedule_ibfk_3` FOREIGN KEY (`assignathlete_id`) REFERENCES `wc_athlete` (`athlete_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_assignschedule_ibfk_1` FOREIGN KEY (`assigncreateschedule_id`) REFERENCES `wc_createschedule` (`createschedule_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_assignschedule_ibfk_2` FOREIGN KEY (`assigncategory_id`) REFERENCES `wc_categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_athlete`
--
ALTER TABLE `wc_athlete`
  ADD CONSTRAINT `wc_athlete_ibfk_2` FOREIGN KEY (`athletedistrict_id`) REFERENCES `wc_district` (`district_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_athlete_ibfk_1` FOREIGN KEY (`athletestates_id`) REFERENCES `wc_states` (`states_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_createschedule`
--
ALTER TABLE `wc_createschedule`
  ADD CONSTRAINT `wc_createschedule_ibfk_1` FOREIGN KEY (`createscheduletestbattery_id`) REFERENCES `wc_testbattery` (`testbattery_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_district`
--
ALTER TABLE `wc_district`
  ADD CONSTRAINT `wc_district_ibfk_1` FOREIGN KEY (`districtstates_id`) REFERENCES `wc_states` (`states_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_parameterunit`
--
ALTER TABLE `wc_parameterunit`
  ADD CONSTRAINT `wc_parameterunit_ibfk_1` FOREIGN KEY (`parametertype_id`) REFERENCES `wc_parametertype` (`parametertype_id`);

--
-- Constraints for table `wc_range`
--
ALTER TABLE `wc_range`
  ADD CONSTRAINT `wc_range_ibfk_1` FOREIGN KEY (`rangetestbattery_id`) REFERENCES `wc_testbattery` (`testbattery_id`),
  ADD CONSTRAINT `wc_range_ibfk_2` FOREIGN KEY (`rangecategories_id`) REFERENCES `wc_categories` (`categories_id`),
  ADD CONSTRAINT `wc_range_ibfk_3` FOREIGN KEY (`rangetest_id`) REFERENCES `wc_test` (`test_id`);

--
-- Constraints for table `wc_range_attribute`
--
ALTER TABLE `wc_range_attribute`
  ADD CONSTRAINT `wc_range_attribute_ibfk_1` FOREIGN KEY (`range_id`) REFERENCES `wc_range` (`range_id`) ON DELETE CASCADE;

--
-- Constraints for table `wc_result`
--
ALTER TABLE `wc_result`
  ADD CONSTRAINT `wc_result_ibfk_1` FOREIGN KEY (`resultcreateschedule_id`) REFERENCES `wc_createschedule` (`createschedule_id`),
  ADD CONSTRAINT `wc_result_ibfk_2` FOREIGN KEY (`resultathlete_id`) REFERENCES `wc_athlete` (`athlete_id`);

--
-- Constraints for table `wc_testbattery`
--
ALTER TABLE `wc_testbattery`
  ADD CONSTRAINT `wc_testbattery_ibfk_1` FOREIGN KEY (`testbatterysports_id`) REFERENCES `wc_sports` (`sports_id`);

--
-- Constraints for table `wc_testbattery_category_attribute`
--
ALTER TABLE `wc_testbattery_category_attribute`
  ADD CONSTRAINT `wc_testbattery_category_attribute_ibfk_1` FOREIGN KEY (`testbattery_id`) REFERENCES `wc_testbattery` (`testbattery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_testbattery_category_attribute_ibfk_2` FOREIGN KEY (`testbattery_category_id`) REFERENCES `wc_categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_testbattery_test_attribute`
--
ALTER TABLE `wc_testbattery_test_attribute`
  ADD CONSTRAINT `wc_testbattery_test_attribute_ibfk_1` FOREIGN KEY (`testbattery_id`) REFERENCES `wc_testbattery` (`testbattery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_testbattery_test_attribute_ibfk_2` FOREIGN KEY (`testbattery_test_id`) REFERENCES `wc_test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_test_attribute`
--
ALTER TABLE `wc_test_attribute`
  ADD CONSTRAINT `wc_test_attribute_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `wc_test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
