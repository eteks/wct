-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2016 at 03:37 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wc_assignschedule`
--

INSERT INTO `wc_assignschedule` (`assignschedule_id`, `assigncreateschedule_id`, `assigncategory_id`, `assignathlete_id`, `assignbib_number`, `assignschedule_status`, `assignschedule_createddate`) VALUES
(1, 1, 1, 1, '0001', 1, '2016-02-15 08:16:33'),
(2, 2, 2, 2, '0002', 1, '2016-02-15 08:16:33'),
(3, 3, 3, 3, '0003', 1, '2016-02-15 08:17:14'),
(4, 4, 4, 4, '0004', 1, '2016-02-15 08:17:14'),
(5, 5, 1, 5, '0005', 1, '2016-02-15 08:18:08'),
(6, 6, 2, 6, '0006', 1, '2016-02-15 08:18:08');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wc_athlete`
--

INSERT INTO `wc_athlete` (`athlete_id`, `athlete_name`, `athlete_dob`, `athlete_mobile`, `athlete_gender`, `athletestates_id`, `athletedistrict_id`, `athlete_address`, `athlete_taluka`, `athletesports_id`, `athlete_status`, `athlete_createddate`) VALUES
(1, 'Ram', '1993-04-19', 2147483647, 'Male', 1, 4, '45,KK nagar,\r\nCuddalore.', 'Cuddalore', 1, 1, '2016-02-15 08:07:09'),
(2, 'Suresh', '1986-02-25', 2147483647, 'Male', 1, 1, '123,VVV Nagar\r\nVirudhunagar', 'Aruppukottai', 2, 1, '2016-02-15 08:07:09'),
(3, 'Kumar', '1990-02-11', 2147483647, 'Male', 1, 2, '23, Ashok Nagar,\r\nVillupuram.\r\n', 'Villupuram', 3, 1, '2016-02-15 08:11:12'),
(4, 'Praveen', '1989-02-26', 2147483647, 'Male', 1, 5, '45, RR Nagar,\r\nTrichy', 'Srirangam', 2, 1, '2016-02-15 08:11:12'),
(5, 'Surya', '1990-02-25', 2147483647, 'Male', 3, 7, '67, Lakshmi Nagar.\r\nKaraikal.', 'Karaikal', 1, 1, '2016-02-15 08:14:47'),
(6, 'Karthi', '1992-06-04', 2147483647, 'Male', 1, 2, '56, Valavanoor,\r\nVillupuram', 'Villupuram', 2, 1, '2016-02-15 08:14:47');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `wc_categories`
--

INSERT INTO `wc_categories` (`categories_id`, `categories_name`, `categories_status`, `categories_createddate`) VALUES
(1, 'Under 14 Boys', 1, '2016-02-15 07:43:08'),
(2, 'Under 14 Girls', 1, '2016-02-15 07:43:08'),
(3, 'Under 16 Boys', 1, '2016-02-15 07:43:46'),
(4, 'Under 19 Boys', 1, '2016-02-15 07:43:46');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `wc_createschedule`
--

INSERT INTO `wc_createschedule` (`createschedule_id`, `createschedule_name`, `createscheduletestbattery_id`, `createschedule_date`, `createschedule_time`, `createschedule_venue`, `createschedule_status`, `createschedule_createddate`) VALUES
(1, 'Schedule1', 1, '2016-02-16', '00:00:00', '34, Anna Nagar,\r\nChennai', 1, '2016-02-15 07:56:34'),
(2, 'Schedule2', 2, '2016-02-18', '00:00:00', '45, KK Nagar,\r\nChennai.', 1, '2016-02-15 07:58:55'),
(3, 'Schedule3', 3, '2016-02-19', '00:00:00', '56, Lawspet,\r\nPuducherry.', 1, '2016-02-15 07:58:55'),
(4, 'Schedule4', 2, '2016-02-17', '00:00:00', '89, Jeeva Nagar,\r\nPuducherry.\r\n', 1, '2016-02-15 08:02:04'),
(5, 'Schedule5', 1, '2016-02-26', '00:00:00', '12, CK Nagar.\r\nMadurai\r\n ', 1, '2016-02-15 08:02:04'),
(6, 'Schedule6', 3, '2016-02-24', '00:00:00', '34, Tagore Nagar,\r\nPuducherry.\r\n', 1, '2016-02-15 08:03:30'),
(7, 'sfdsdfsf', 1, '1991-04-04', '04:03:03', 'dfgsdfg', 1, '2016-02-17 06:55:43'),
(8, 'fdgdfgdfs', 1, '2011-06-03', '03:06:11', 'sadfasdfa', 1, '2016-02-17 07:35:03');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `wc_district`
--

INSERT INTO `wc_district` (`district_id`, `districtstates_id`, `district_name`, `district_status`, `district_createddate`) VALUES
(1, 1, 'Virudhunagar', 1, '2016-02-15 07:36:46'),
(2, 1, 'Villupuram', 1, '2016-02-15 07:36:46'),
(3, 1, 'Madurai', 1, '2016-02-15 07:37:24'),
(4, 1, 'Cuddalore', 1, '2016-02-15 07:37:24'),
(5, 1, 'Trichy', 1, '2016-02-15 07:38:14'),
(6, 1, 'Coimbatore', 1, '2016-02-15 07:38:14'),
(7, 3, 'Karaikal', 1, '2016-02-15 07:39:59');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(7, 'others', 1, '2016-02-10 07:34:35'),
(8, 'sdfasdfas', 1, '2016-02-17 05:33:01'),
(9, 'asfasfasdf', 1, '2016-02-17 05:33:06');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(23, 6, 'SS:MSS', 1, '2016-02-10 07:56:56'),
(24, 7, 'others', 1, '2016-02-17 04:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `wc_range`
--

CREATE TABLE IF NOT EXISTS `wc_range` (
  `range_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Stores the range id',
  `rangetestbattery_id` int(10) NOT NULL COMMENT 'Stores the reference testbattery id for handling range',
  `rangecategories_id` int(10) NOT NULL COMMENT 'Stores the reference categories id for handling range',
  `rangetest_id` int(10) NOT NULL COMMENT 'Stores the reference test id for handling range',
  `rangetestattribute_id` int(11) NOT NULL,
  `range_status` tinyint(1) NOT NULL COMMENT 'Stores the range status either active or inactive',
  `range_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of the range',
  PRIMARY KEY (`range_id`),
  KEY `rangetestbattery_id` (`rangetestbattery_id`),
  KEY `rangecategories_id` (`rangecategories_id`),
  KEY `rangetest_id` (`rangetest_id`),
  KEY `rangetestattribute_id` (`rangetestattribute_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is used to store the ranges with their points for' AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `wc_result`
--

INSERT INTO `wc_result` (`result_id`, `resultcreateschedule_id`, `resultathlete_id`, `resulttest_name`, `resultparameter_name`, `result`, `points`, `result_status`, `result_createddate`) VALUES
(1, 1, 1, 'Test1', 'time', '3', 3, 1, '2016-02-15 09:48:13'),
(2, 2, 2, 'Test2', 'others', '4', 4, 1, '2016-02-15 09:48:13'),
(3, 3, 3, 'Test3', 'others', '5', 5, 1, '2016-02-15 09:48:59'),
(4, 4, 4, 'Test4', 'others', '4', 4, 1, '2016-02-15 09:48:59'),
(5, 5, 5, 'Test1', 'speed', '5', 5, 1, '2016-02-15 09:50:09'),
(6, 6, 6, 'Test2', 'others', '4', 4, 1, '2016-02-15 09:50:09'),
(7, 1, 2, 'test1', 'teeee', '5', 3, 1, '2016-02-16 06:27:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wc_sports`
--

INSERT INTO `wc_sports` (`sports_id`, `sports_name`, `sports_status`, `sports_createddate`) VALUES
(1, 'Hockey', 1, '2016-02-15 07:44:53'),
(2, 'Cricket', 1, '2016-02-15 07:44:53'),
(3, 'Foot Ball', 1, '2016-02-15 07:45:27');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `wc_states`
--

INSERT INTO `wc_states` (`states_id`, `states_name`, `states_status`, `states_createddate`) VALUES
(1, 'Tamilnadu', 1, '2016-02-15 07:35:45'),
(2, 'Kerala', 1, '2016-02-15 07:35:45'),
(3, 'Puducherry', 1, '2016-02-15 07:38:50'),
(4, 'Andhra Pradesh', 1, '2016-02-17 11:49:45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wc_test`
--

INSERT INTO `wc_test` (`test_id`, `test_name`, `test_status`, `test_createddate`) VALUES
(1, 'Test1', 1, '2016-02-15 07:50:08'),
(2, 'Test2', 2, '2016-02-15 07:50:08'),
(3, 'Test3', 1, '2016-02-15 07:51:01'),
(4, 'Test4', 1, '2016-02-15 07:51:01'),
(5, 'Test1', 1, '2016-02-17 08:02:58');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table is used to store the test battery for various tes' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `wc_testbattery`
--

INSERT INTO `wc_testbattery` (`testbattery_id`, `testbattery_name`, `testbatterysports_id`, `testbattery_status`, `testbattery_createddate`) VALUES
(1, 'Petter', 1, 1, '2016-02-15 07:52:40'),
(2, 'Hendri', 2, 1, '2016-02-15 07:52:40'),
(3, 'Olga', 3, 1, '2016-02-15 07:52:56'),
(4, 'dggfdsfg', 2, 1, '2016-02-17 08:05:49'),
(5, 'sampled', 2, 1, '2016-02-17 08:07:27'),
(6, 'dvfxcxcbx', 1, 1, '2016-02-17 08:07:54'),
(7, 'dsfgdsfbxcvxcvuiljl', 3, 1, '2016-02-17 12:18:14');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `wc_testbattery_category_attribute`
--

INSERT INTO `wc_testbattery_category_attribute` (`testbattery_category_attribute_id`, `testbattery_id`, `testbattery_category_id`, `testbattery_category_status`, `testbattery_category_createddate`) VALUES
(1, 1, 1, 1, '2016-02-15 07:54:00'),
(2, 2, 2, 1, '2016-02-15 07:54:00'),
(3, 4, 1, 1, '2016-02-17 08:05:49'),
(4, 4, 2, 1, '2016-02-17 08:05:49'),
(7, 6, 2, 1, '2016-02-17 08:07:54'),
(8, 6, 3, 1, '2016-02-17 08:07:54'),
(9, 5, 1, 1, '2016-02-17 09:38:51'),
(10, 5, 2, 1, '2016-02-17 09:38:52'),
(11, 5, 3, 1, '2016-02-17 09:38:52'),
(12, 7, 1, 1, '2016-02-17 12:18:14');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `wc_testbattery_test_attribute`
--

INSERT INTO `wc_testbattery_test_attribute` (`testbattery_test_attribute_id`, `testbattery_id`, `testbattery_test_id`, `testbattery_test_attribute_status`, `testbattery_test_attribute_createddate`) VALUES
(1, 1, 1, 1, '2016-02-15 09:58:49'),
(2, 2, 2, 1, '2016-02-15 09:58:49'),
(3, 3, 3, 1, '2016-02-15 09:59:14'),
(4, 1, 1, 1, '2016-02-15 09:59:14'),
(5, 2, 3, 1, '2016-02-15 09:59:39'),
(6, 3, 4, 1, '2016-02-15 09:59:39'),
(7, 4, 1, 1, '2016-02-17 08:05:49'),
(8, 4, 2, 1, '2016-02-17 08:05:50'),
(10, 6, 1, 1, '2016-02-17 08:07:54'),
(11, 6, 4, 1, '2016-02-17 08:07:54'),
(12, 5, 1, 1, '2016-02-17 09:38:52'),
(13, 5, 4, 1, '2016-02-17 09:38:52'),
(14, 7, 1, 1, '2016-02-17 12:18:15');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This table is used to store the attribute of the each test ' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `wc_test_attribute`
--

INSERT INTO `wc_test_attribute` (`test_attribute_id`, `test_id`, `test_parameter_name`, `test_parameter_type`, `test_parameter_unit`, `test_parameter_format`, `test_attribute_status`, `test_attribute_createddate`) VALUES
(1, 1, 'High jump', 'speed', 'MT/S', '1', 1, '2016-02-15 09:53:22'),
(2, 2, 'long jump', 'speed', 'MT/S', '2', 1, '2016-02-15 09:54:37'),
(3, 3, 'Running', 'Time', 'KM/S', '3', 1, '2016-02-15 09:54:37'),
(4, 4, 'Long jump', 'Speed', 'MT/S', '4', 1, '2016-02-15 09:56:24'),
(5, 1, 'Foot ball', 'others', 'others', '5', 1, '2016-02-15 09:56:24'),
(6, 2, 'Running', 'Distance', 'KM', '6', 1, '2016-02-15 09:57:18'),
(7, 1, 'High jump1', 'percentage', 'Percentage', '2', 1, '2016-02-17 08:02:58');

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
  ADD CONSTRAINT `wc_assignschedule_ibfk_1` FOREIGN KEY (`assigncreateschedule_id`) REFERENCES `wc_createschedule` (`createschedule_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_assignschedule_ibfk_2` FOREIGN KEY (`assigncategory_id`) REFERENCES `wc_categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_assignschedule_ibfk_3` FOREIGN KEY (`assignathlete_id`) REFERENCES `wc_athlete` (`athlete_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_athlete`
--
ALTER TABLE `wc_athlete`
  ADD CONSTRAINT `wc_athlete_ibfk_1` FOREIGN KEY (`athletestates_id`) REFERENCES `wc_states` (`states_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_athlete_ibfk_2` FOREIGN KEY (`athletedistrict_id`) REFERENCES `wc_district` (`district_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `wc_parameterunit_ibfk_1` FOREIGN KEY (`parametertype_id`) REFERENCES `wc_parametertype` (`parametertype_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_range`
--
ALTER TABLE `wc_range`
  ADD CONSTRAINT `wc_range_ibfk_1` FOREIGN KEY (`rangetestbattery_id`) REFERENCES `wc_testbattery` (`testbattery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_range_ibfk_2` FOREIGN KEY (`rangecategories_id`) REFERENCES `wc_categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_range_ibfk_3` FOREIGN KEY (`rangetest_id`) REFERENCES `wc_test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_range_ibfk_4` FOREIGN KEY (`rangetestattribute_id`) REFERENCES `wc_test_attribute` (`test_attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_range_attribute`
--
ALTER TABLE `wc_range_attribute`
  ADD CONSTRAINT `wc_range_attribute_ibfk_1` FOREIGN KEY (`range_id`) REFERENCES `wc_range` (`range_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_result`
--
ALTER TABLE `wc_result`
  ADD CONSTRAINT `wc_result_ibfk_1` FOREIGN KEY (`resultcreateschedule_id`) REFERENCES `wc_createschedule` (`createschedule_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_result_ibfk_2` FOREIGN KEY (`resultathlete_id`) REFERENCES `wc_athlete` (`athlete_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_testbattery`
--
ALTER TABLE `wc_testbattery`
  ADD CONSTRAINT `wc_testbattery_ibfk_1` FOREIGN KEY (`testbatterysports_id`) REFERENCES `wc_sports` (`sports_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
