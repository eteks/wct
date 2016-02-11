-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2016 at 06:43 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wellocity_feb06`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`athlete_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `range_point` decimal(10,10) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `wc_sports`
--

INSERT INTO `wc_sports` (`sports_id`, `sports_name`, `sports_status`, `sports_createddate`) VALUES
(4, 'testsetsetse', 1, '2016-02-06 10:59:19'),
(5, '', 1, '2016-02-06 11:40:19'),
(6, 'asdfasdf', 1, '2016-02-06 12:02:38'),
(7, 'asdfwerwe', 1, '2016-02-06 12:03:03'),
(8, 'erwerf', 1, '2016-02-06 12:05:30'),
(9, 'sdfgsdfgsd', 1, '2016-02-06 12:05:57'),
(10, 'dsfgcvb', 1, '2016-02-06 12:10:41'),
(11, 'test', 1, '2016-02-06 12:16:42'),
(12, 'test1', 1, '2016-02-06 12:16:51');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wc_states`
--

INSERT INTO `wc_states` (`states_id`, `states_name`, `states_status`, `states_createddate`) VALUES
(1, 'Puducherry', 1, '2016-02-06 13:10:06'),
(2, 'Arunachal Pradesh', 1, '2016-02-06 13:10:41'),
(3, 'Bihar', 1, '2016-02-06 13:10:53');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is used to store the test battery for various tes' AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is used to store the attribute of the each test ' AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `wc_usermanagement`
--

INSERT INTO `wc_usermanagement` (`usermanagement_id`, `usermanagement_type`, `usermanagement_username`, `usermanagement_password`, `usermanagement_status`, `usermanagement_createddate`) VALUES
(1, 'administrator', 'administrator@gmail.com', 'administrator', 1, '2016-02-06 05:54:07');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wc_assignschedule`
--
ALTER TABLE `wc_assignschedule`
  ADD CONSTRAINT `wc_assignschedule_ibfk_1` FOREIGN KEY (`assigncreateschedule_id`) REFERENCES `wc_createschedule` (`createschedule_id`),
  ADD CONSTRAINT `wc_assignschedule_ibfk_2` FOREIGN KEY (`assigncategory_id`) REFERENCES `wc_categories` (`categories_id`),
  ADD CONSTRAINT `wc_assignschedule_ibfk_3` FOREIGN KEY (`assignathlete_id`) REFERENCES `wc_athlete` (`athlete_id`);

--
-- Constraints for table `wc_createschedule`
--
ALTER TABLE `wc_createschedule`
  ADD CONSTRAINT `wc_createschedule_ibfk_1` FOREIGN KEY (`createscheduletestbattery_id`) REFERENCES `wc_testbattery` (`testbattery_id`);

--
-- Constraints for table `wc_district`
--
ALTER TABLE `wc_district`
  ADD CONSTRAINT `wc_district_ibfk_1` FOREIGN KEY (`districtstates_id`) REFERENCES `wc_states` (`states_id`);

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
  ADD CONSTRAINT `wc_range_attribute_ibfk_1` FOREIGN KEY (`range_id`) REFERENCES `wc_range` (`range_id`);

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
  ADD CONSTRAINT `wc_testbattery_category_attribute_ibfk_1` FOREIGN KEY (`testbattery_id`) REFERENCES `wc_testbattery` (`testbattery_id`),
  ADD CONSTRAINT `wc_testbattery_category_attribute_ibfk_2` FOREIGN KEY (`testbattery_category_id`) REFERENCES `wc_categories` (`categories_id`);

--
-- Constraints for table `wc_testbattery_test_attribute`
--
ALTER TABLE `wc_testbattery_test_attribute`
  ADD CONSTRAINT `wc_testbattery_test_attribute_ibfk_1` FOREIGN KEY (`testbattery_id`) REFERENCES `wc_testbattery` (`testbattery_id`),
  ADD CONSTRAINT `wc_testbattery_test_attribute_ibfk_2` FOREIGN KEY (`testbattery_test_id`) REFERENCES `wc_test` (`test_id`);

--
-- Constraints for table `wc_test_attribute`
--
ALTER TABLE `wc_test_attribute`
  ADD CONSTRAINT `wc_test_attribute_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `wc_test` (`test_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
