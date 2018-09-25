-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 09:33 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `technologyonthetrail_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE IF NOT EXISTS `event_tbl` (
  `event_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `trail_ID` int(11) DEFAULT NULL,
  `event_date` date NOT NULL,
  `additional` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`event_ID`),
  UNIQUE KEY `event_ID` (`event_ID`),
  KEY `trail_ID` (`trail_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`event_ID`, `name`, `description`, `trail_ID`, `event_date`, `additional`) VALUES
(1, 'trail1', NULL, 2, '2018-04-11', NULL),
(2, 'trail2', 'testing', 2, '2018-04-11', NULL),
(3, 'trail3', 'testing', 2, '2018-04-11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pictures_tags_tbl`
--

CREATE TABLE IF NOT EXISTS `pictures_tags_tbl` (
  `pictures_tags_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `pictures_ID` bigint(20) DEFAULT NULL,
  `confirmation_state` int(11) DEFAULT NULL,
  `tag_ID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pictures_tags_ID`),
  UNIQUE KEY `pictures_tags_ID` (`pictures_tags_ID`),
  KEY `tag_ID` (`tag_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pictures_tags_tbl`
--

INSERT INTO `pictures_tags_tbl` (`pictures_tags_ID`, `pictures_ID`, `confirmation_state`, `tag_ID`) VALUES
(1, 1, 1, 1),
(2, 3, 1, 3),
(3, 1, 1, 2),
(4, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pictures_tbl`
--

CREATE TABLE IF NOT EXISTS `pictures_tbl` (
  `picture_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `filename` varchar(60) DEFAULT NULL,
  `category` varchar(60) DEFAULT NULL,
  `keywords` varchar(40) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `altText` varchar(255) DEFAULT NULL,
  `owner_ID` int(11) DEFAULT NULL,
  `date_taken` date NOT NULL,
  `event_ID` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  PRIMARY KEY (`picture_ID`),
  UNIQUE KEY `picture_ID` (`picture_ID`),
  KEY `owner_ID` (`owner_ID`),
  KEY `event_ID` (`event_ID`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pictures_tbl`
--

INSERT INTO `pictures_tbl` (`picture_ID`, `name`, `filename`, `category`, `keywords`, `description`, `filePath`, `altText`, `owner_ID`, `date_taken`, `event_ID`, `share`) VALUES
(1, 'car', 'car.jpg', NULL, NULL, NULL, 'users/1/blacksburg/car.jpg', NULL, 1, '2018-04-11', 1, 1),
(2, 'keyboard', 'keyboard.jpg', NULL, NULL, NULL, 'users/1/myitem/keyboard.jpg', NULL, 1, '2018-04-11', 2, 0),
(3, 'street', 'street.jpg', NULL, NULL, NULL, 'users/1/blacksburg/street.jpg', NULL, 1, '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_ref`
--

CREATE TABLE IF NOT EXISTS `role_ref` (
  `role_ref_ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(30) NOT NULL,
  PRIMARY KEY (`role_ref_ID`),
  UNIQUE KEY `role_ref_ID` (`role_ref_ID`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role_ref`
--

INSERT INTO `role_ref` (`role_ref_ID`, `role_name`) VALUES
(2, 'Administrator'),
(1, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `tags_tbl`
--

CREATE TABLE IF NOT EXISTS `tags_tbl` (
  `tag_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `tag_type_ID` int(11) DEFAULT NULL,
  `additional` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tag_ID`),
  UNIQUE KEY `tag_ID` (`tag_ID`),
  KEY `tag_type_ID` (`tag_type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tags_tbl`
--

INSERT INTO `tags_tbl` (`tag_ID`, `name`, `description`, `tag_type_ID`, `additional`) VALUES
(1, 'cool', NULL, 1, NULL),
(2, 'blacksburg', NULL, 3, NULL),
(3, 'peace', NULL, 2, NULL),
(4, 'test', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag_type_tbl`
--

CREATE TABLE IF NOT EXISTS `tag_type_tbl` (
  `tag_type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `additional` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tag_type_ID`),
  UNIQUE KEY `tag_type_ID` (`tag_type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tag_type_tbl`
--

INSERT INTO `tag_type_tbl` (`tag_type_ID`, `name`, `description`, `additional`) VALUES
(1, 'feelings', NULL, NULL),
(2, 'description', NULL, NULL),
(3, 'location', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trail_tbl`
--

CREATE TABLE IF NOT EXISTS `trail_tbl` (
  `trail_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `difficulty` varchar(60) DEFAULT NULL,
  `trail_type_ID` int(11) NOT NULL,
  `additional` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`trail_ID`),
  UNIQUE KEY `trail_ID` (`trail_ID`),
  KEY `trail_type_ID` (`trail_type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `trail_tbl`
--

INSERT INTO `trail_tbl` (`trail_ID`, `name`, `description`, `difficulty`, `trail_type_ID`, `additional`) VALUES
(1, NULL, 'Cascades Falls Trail', 'Moderate', 1, NULL),
(2, 'home trail', 'testing', 'Easy', 2, NULL),
(3, NULL, 'Cascades Falls Trail', 'Moderate', 1, NULL),
(4, 'ICAT Day', NULL, 'Easy', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trail_type_tbl`
--

CREATE TABLE IF NOT EXISTS `trail_type_tbl` (
  `trail_type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `additional` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`trail_type_ID`),
  UNIQUE KEY `trail_type_ID` (`trail_type_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trail_type_tbl`
--

INSERT INTO `trail_type_tbl` (`trail_type_ID`, `name`, `description`, `additional`) VALUES
(1, 'out-and-back trail', '', ''),
(2, 'recreation trail', 'A trail which provides a recreational experience', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(20) NOT NULL DEFAULT 'avatar.png',
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(86) NOT NULL,
  `email` varchar(70) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_modified_by` int(11) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `role_ref_ID` tinyint(4) NOT NULL DEFAULT '1',
  `folders` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `user_ID` (`user_ID`),
  UNIQUE KEY `email` (`email`),
  KEY `role_ref_ID` (`role_ref_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `avatar`, `f_name`, `l_name`, `dob`, `gender`, `password`, `email`, `role`, `created_on`, `last_modified_on`, `last_modified_by`, `active`, `role_ref_ID`, `folders`) VALUES
(1, 'avatar.png', 'Rui', 'Jin', NULL, 'male', 'test', 'rryan2@vt.edu', '', '2018-03-31 20:59:25', '0000-00-00 00:00:00', NULL, 1, 2, 'trail1,trail2'),
(2, 'avatar.png', 'shumeng', 'Zhang', NULL, 'male', 'test', 'zsm618@vt.edu', '', '2018-04-12 07:40:08', '2018-04-29 00:00:00', NULL, 1, 1, NULL),
(3, 'avatar.png', 'Derek', 'Haqq', NULL, '', 'test', 'dhaqq@vt.edu', '', '2018-04-12 07:55:40', '0000-00-00 00:00:00', NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_event_tbl`
--

CREATE TABLE IF NOT EXISTS `user_event_tbl` (
  `user_event_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_ID` int(11) DEFAULT NULL,
  `event_ID` int(11) NOT NULL,
  `event_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_event_ID`),
  UNIQUE KEY `user_event_ID` (`user_event_ID`),
  KEY `user_ID` (`user_ID`),
  KEY `event_ID` (`event_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_event_tbl`
--

INSERT INTO `user_event_tbl` (`user_event_ID`, `user_ID`, `event_ID`, `event_role`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 3, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD CONSTRAINT `event_tbl_ibfk_1` FOREIGN KEY (`trail_ID`) REFERENCES `trail_tbl` (`trail_ID`) ON DELETE CASCADE;

--
-- Constraints for table `pictures_tags_tbl`
--
ALTER TABLE `pictures_tags_tbl`
  ADD CONSTRAINT `pictures_tags_tbl_ibfk_1` FOREIGN KEY (`tag_ID`) REFERENCES `tags_tbl` (`tag_ID`) ON DELETE CASCADE;

--
-- Constraints for table `pictures_tbl`
--
ALTER TABLE `pictures_tbl`
  ADD CONSTRAINT `pictures_tbl_ibfk_1` FOREIGN KEY (`owner_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE;

--
-- Constraints for table `tags_tbl`
--
ALTER TABLE `tags_tbl`
  ADD CONSTRAINT `tags_tbl_ibfk_1` FOREIGN KEY (`tag_type_ID`) REFERENCES `tag_type_tbl` (`tag_type_ID`) ON DELETE CASCADE;

--
-- Constraints for table `trail_tbl`
--
ALTER TABLE `trail_tbl`
  ADD CONSTRAINT `trail_tbl_ibfk_1` FOREIGN KEY (`trail_type_ID`) REFERENCES `trail_type_tbl` (`trail_type_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_ref_ID`) REFERENCES `role_ref` (`role_ref_ID`) ON DELETE CASCADE;

--
-- Constraints for table `user_event_tbl`
--
ALTER TABLE `user_event_tbl`
  ADD CONSTRAINT `user_event_tbl_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_event_tbl_ibfk_2` FOREIGN KEY (`event_ID`) REFERENCES `event_tbl` (`event_ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
