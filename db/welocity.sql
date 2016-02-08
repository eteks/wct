-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2016 at 02:52 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `welocity`
--

-- --------------------------------------------------------

--
-- Table structure for table `wc_assignschedule`
--

CREATE TABLE `wc_assignschedule` (
  `assignschedule_id` int(10) NOT NULL,
  `assigncreateschedule_id` int(10) NOT NULL,
  `assigncategory_id` int(10) NOT NULL,
  `assignathlete_id` int(10) NOT NULL,
  `assignbib_number` varchar(50) NOT NULL,
  `assignschedule_status` tinyint(1) NOT NULL,
  `assignschedule_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wc_athlete`
--

CREATE TABLE `wc_athlete` (
  `athlete_id` int(10) NOT NULL,
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
  `athlete_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wc_categories`
--

CREATE TABLE `wc_categories` (
  `categories_id` int(10) NOT NULL,
  `categories_name` varchar(150) NOT NULL,
  `categories_status` tinyint(1) NOT NULL,
  `categories_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wc_createschedule`
--

CREATE TABLE `wc_createschedule` (
  `createschedule_id` int(10) NOT NULL,
  `createschedule_name` varchar(255) NOT NULL,
  `createscheduletestbattery_id` int(10) NOT NULL,
  `createschedule_date` date NOT NULL,
  `createschedule_time` time NOT NULL,
  `createschedule_venue` text NOT NULL,
  `createschedule_status` tinyint(1) NOT NULL,
  `createschedule_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wc_district`
--

CREATE TABLE `wc_district` (
  `district_id` int(10) NOT NULL,
  `districtstates_id` int(10) NOT NULL,
  `district_name` varchar(150) NOT NULL,
  `district_status` tinyint(1) NOT NULL,
  `district_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wc_range`
--

CREATE TABLE `wc_range` (
  `range_id` int(10) NOT NULL COMMENT 'Stores the range id',
  `rangetestbattery_id` int(10) NOT NULL COMMENT 'Stores the reference testbattery id for handling range',
  `rangecategories_id` int(10) NOT NULL COMMENT 'Stores the reference categories id for handling range',
  `rangetest_id` int(10) NOT NULL COMMENT 'Stores the reference test id for handling range',
  `range_start` int(10) NOT NULL COMMENT 'Stores the start range of the particular test',
  `range_end` int(10) NOT NULL COMMENT 'Stores the end range of the particular test',
  `range_points` decimal(10,0) NOT NULL COMMENT 'Stores the points based on the calculation of start_range and end_range',
  `range_status` tinyint(1) NOT NULL COMMENT 'Stores the range status either active or inactive',
  `range_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of the range'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is used to store the ranges with their points for';

-- --------------------------------------------------------

--
-- Table structure for table `wc_result`
--

CREATE TABLE `wc_result` (
  `result_id` int(10) NOT NULL,
  `resultcreateschedule_id` int(10) NOT NULL,
  `resultathlete_id` int(10) NOT NULL,
  `resulttest_name` varchar(50) NOT NULL,
  `resultparameter_name` varchar(50) NOT NULL,
  `result` decimal(10,0) NOT NULL,
  `points` int(5) NOT NULL,
  `result_status` tinyint(1) NOT NULL,
  `result_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wc_sports`
--

CREATE TABLE `wc_sports` (
  `sports_id` int(10) NOT NULL,
  `sports_name` varchar(150) NOT NULL,
  `sports_status` tinyint(1) NOT NULL,
  `sports_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wc_states`
--

CREATE TABLE `wc_states` (
  `states_id` int(10) NOT NULL,
  `states_name` varchar(150) NOT NULL,
  `states_status` tinyint(1) NOT NULL,
  `states_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wc_test`
--

CREATE TABLE `wc_test` (
  `test_id` int(10) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_parametername` varchar(100) NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `test_unit` varchar(50) NOT NULL,
  `test_format` varchar(50) NOT NULL,
  `test_status` tinyint(1) NOT NULL,
  `test_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wc_testbattery`
--

CREATE TABLE `wc_testbattery` (
  `testbattery_id` int(10) NOT NULL COMMENT 'Stores the testbattery id',
  `testbattery_name` varchar(255) NOT NULL COMMENT 'Stores the testbattery name',
  `testbatterysports_id` int(10) NOT NULL COMMENT 'Stores the testbattery name',
  `testbatterycategories_id` varchar(50) NOT NULL COMMENT 'Stores the multiple reference categories id using ''#'' for the ',
  `testbatterytest_id` varchar(50) NOT NULL COMMENT 'Stores the multiple reference test id using ''#'' for the testbattery,',
  `testbattery_status` tinyint(1) NOT NULL COMMENT 'Stores the testbattery status either active or inactive',
  `testbattery_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Stores the created date of the  testbattery'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is used to store the test battery for various tes';

-- --------------------------------------------------------

--
-- Table structure for table `wc_usermanagement`
--

CREATE TABLE `wc_usermanagement` (
  `usermanagement_id` int(10) NOT NULL,
  `usermanagement_type` varchar(15) NOT NULL,
  `usermanagement_username` varchar(155) NOT NULL,
  `usermanagement_password` varchar(255) NOT NULL,
  `usermanagement_status` tinyint(1) NOT NULL,
  `usermanagement_createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wc_assignschedule`
--
ALTER TABLE `wc_assignschedule`
  ADD PRIMARY KEY (`assignschedule_id`),
  ADD KEY `assigncreateschedule_id` (`assigncreateschedule_id`),
  ADD KEY `assignathlete_id` (`assignathlete_id`),
  ADD KEY `assigncategory_id` (`assigncategory_id`);

--
-- Indexes for table `wc_athlete`
--
ALTER TABLE `wc_athlete`
  ADD PRIMARY KEY (`athlete_id`);

--
-- Indexes for table `wc_categories`
--
ALTER TABLE `wc_categories`
  ADD PRIMARY KEY (`categories_id`),
  ADD KEY `categories_name` (`categories_name`);

--
-- Indexes for table `wc_createschedule`
--
ALTER TABLE `wc_createschedule`
  ADD PRIMARY KEY (`createschedule_id`),
  ADD KEY `createscheduletestbattery_id` (`createscheduletestbattery_id`);

--
-- Indexes for table `wc_district`
--
ALTER TABLE `wc_district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `districtstates_id` (`districtstates_id`);

--
-- Indexes for table `wc_range`
--
ALTER TABLE `wc_range`
  ADD PRIMARY KEY (`range_id`),
  ADD KEY `rangetestbattery_id` (`rangetestbattery_id`),
  ADD KEY `rangecategories_id` (`rangecategories_id`),
  ADD KEY `rangetest_id` (`rangetest_id`);

--
-- Indexes for table `wc_result`
--
ALTER TABLE `wc_result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `resultcreateschedule_id` (`resultcreateschedule_id`),
  ADD KEY `resultathlete_id` (`resultathlete_id`);

--
-- Indexes for table `wc_sports`
--
ALTER TABLE `wc_sports`
  ADD PRIMARY KEY (`sports_id`);

--
-- Indexes for table `wc_states`
--
ALTER TABLE `wc_states`
  ADD PRIMARY KEY (`states_id`);

--
-- Indexes for table `wc_test`
--
ALTER TABLE `wc_test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `wc_testbattery`
--
ALTER TABLE `wc_testbattery`
  ADD PRIMARY KEY (`testbattery_id`),
  ADD KEY `testbatterysports_id` (`testbatterysports_id`);

--
-- Indexes for table `wc_usermanagement`
--
ALTER TABLE `wc_usermanagement`
  ADD PRIMARY KEY (`usermanagement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wc_assignschedule`
--
ALTER TABLE `wc_assignschedule`
  MODIFY `assignschedule_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wc_athlete`
--
ALTER TABLE `wc_athlete`
  MODIFY `athlete_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wc_categories`
--
ALTER TABLE `wc_categories`
  MODIFY `categories_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wc_createschedule`
--
ALTER TABLE `wc_createschedule`
  MODIFY `createschedule_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wc_district`
--
ALTER TABLE `wc_district`
  MODIFY `district_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wc_range`
--
ALTER TABLE `wc_range`
  MODIFY `range_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Stores the range id';
--
-- AUTO_INCREMENT for table `wc_result`
--
ALTER TABLE `wc_result`
  MODIFY `result_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wc_sports`
--
ALTER TABLE `wc_sports`
  MODIFY `sports_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wc_states`
--
ALTER TABLE `wc_states`
  MODIFY `states_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wc_test`
--
ALTER TABLE `wc_test`
  MODIFY `test_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wc_testbattery`
--
ALTER TABLE `wc_testbattery`
  MODIFY `testbattery_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Stores the testbattery id';
--
-- AUTO_INCREMENT for table `wc_usermanagement`
--
ALTER TABLE `wc_usermanagement`
  MODIFY `usermanagement_id` int(10) NOT NULL AUTO_INCREMENT;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
