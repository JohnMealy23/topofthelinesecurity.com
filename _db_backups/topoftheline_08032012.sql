-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2012 at 05:58 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `topoftheline`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `price` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `fo_visibility` int(1) NOT NULL,
  `max_num_of_registrants` int(11) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_url` varchar(255) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `name`, `description`, `date`, `price`, `sort_order`, `fo_visibility`, `max_num_of_registrants`, `event_type`, `event_url`) VALUES
(73, '16 Hour On-the-Job Training Course for Security Guards', 'This is a 16 hour course that must be completed within 90 days of employment as a security guard.  The course provides the student with detailed information on the duties and responsibilities a security guard.  Topics covered in this course include the role of the security guard, legal powers and limitations, emergency situations, communications and public relations, access control, ethics and conduct, incident command system, and terrorism.  The passing of an examination is required for successful completion of this course.', '2012-01-01', '100', 1, 1, 10, 'Security Guard Training', 'Security_Guard_Training');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE IF NOT EXISTS `registered_users` (
  `ru_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_date` date NOT NULL,
  `surname` varchar(255) NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `name_on_certificate` text NOT NULL,
  `suffix` text NOT NULL,
  `street_address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `event_type` varchar(5) NOT NULL,
  `event_id` int(11) NOT NULL,
  `extra` text NOT NULL,
  PRIMARY KEY (`ru_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`ru_id`, `class_date`, `surname`, `first_name`, `middle_name`, `last_name`, `name_on_certificate`, `suffix`, `street_address`, `city`, `state`, `zip`, `phone`, `email`, `event_type`, `event_id`, `extra`) VALUES
(2, '2012-10-25', 'Faraz', 'F', '', 'Aleem', '', 's', '360', 'Lahore', 'Pun', '51400', '0333', '', 'b', 0, ''),
(3, '0000-00-00', '', 'Asad', '', 'Farooq', '', '', '', '', 'Isb', '51444', '033455', '', 'd', 0, ''),
(4, '0000-00-00', '', 'Sab', '', 'Um', '', '', '123', 'Mur', '', '', '0982', '', 'b', 0, ''),
(6, '0000-00-00', 'faraz b', '', '', '', '', '', '', '', '', '', '', '', 'b', 0, ''),
(7, '0000-00-00', 'faraz b2', '', '', '', '', '', '', '', '', '', '', '', 'b', 5, ''),
(8, '0000-00-00', 'faraza', 'far', '', '', '', '', '', '', '', '', '', '', 'A', 5, ''),
(9, '0000-00-00', 'ch', 'zafar', '', '', '', '', '', '', '', '', '', '', 'C', 4, ''),
(10, '0000-00-00', 'mr', 'hafiz', 'M', 'Faraz', 'Faraz Ch', '', '', '', '', '', '', 'faraz_aleem@hotmail.com', 'A', 5, ''),
(22, '0000-00-00', '', 'far', '', 'Faraz', '', '', '123', 'Mur', 'Pun', '51444', '042375', 'faraz@veztekusa.com', 'C', 4, ''),
(20, '2014-01-22', '', 'far', '', 'Al', 'Faraz The Ch', '', '360', 'Lahore', 'Isb', '51400', '0333', 'faraz_aleem@hotmail.com', 'C', 4, ''),
(23, '0000-00-00', '', 'fa', 'M', 'Faraz', '', '', '360', 'Lahore', 'Pun', '51444', '042375', 'faraz_aleem@hotmail.com', 'C', 4, ''),
(24, '0000-00-00', '', 'Sam', '', 'A', '', '', '1222', 'Lhr', 'Pun', '99546', '0342', 'sam@h.com', 'A', 2, ''),
(25, '0000-00-00', '', 'faraz', '', '2 b', '', '', 'Pat', 'PatCity', 'PatState', '43211', '12345', 'pat@gmail.com', 'B', 7, ''),
(26, '0000-00-00', '', 'M', '', 'M', '', '', '1222', 'LA', 'Califonria', '44332', '5311234452', 'mm@g.com', 'A', 2, ''),
(27, '2012-06-15', 'Surname', 'First Name', 'Middle Name', 'Last Name', 'Name on Cert', 'Suffix', 'Street Address', 'City', 'State', 'Zip', 'Phone', 'email address', 'A', 2, ''),
(28, '0000-00-00', 'Sur', 'First', 'Middle', 'Last', 'Cert name', 'suffix', 'street', 'city', 'state', 'zip', 'phone', 'email', 'C', 4, ''),
(29, '0000-00-00', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'A', 10, ''),
(30, '0000-00-00', '', 'fsfd', 'dfsf', 'dfs', '', '', 'fdsfdfs', 'fsdfs', 'fsdf', 'fdsf', 'dfsd', 'sdfs', 'A', 19, ''),
(31, '0000-00-00', '', 'far', '', 'Aleem', '', '', '123', 'Mur', 'Pun', '51400', '0333', 'faraz@veztekusa.com', 'A', 19, ''),
(32, '0000-00-00', '', 'fa', '', 'Farooq', '', '', '360', 'Lahore', 'Punjab', '51400', '042375', 'faraz_aleem@hotmail.com', 'A', 19, ''),
(33, '0000-00-00', '', 'fa', '', 'Farooq', '', '', '360', 'Lahore', 'Punjab', '51400', '042375', 'faraz_aleem@hotmail.com', 'A', 19, ''),
(34, '0000-00-00', '', 'hafiz', '', 'Faraz', '', '', '360', 'Lahore', 'Punjab', '51400', '042375', 'faraz_aleem@hotmail.com', 'A', 18, ''),
(35, '0000-00-00', '', 'Asad', '', 'Farooq', '', '', '222', 'Khi', 'POL', '21322', '090999', 'ff@gmail.com', 'A', 18, ''),
(36, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', 'faaa@gmail.com', 'A', 18, ''),
(37, '0000-00-00', '', 'far', '', 'Farooq', '', '', '123', 'Khi', 'Punjab', '51444', '090999', 'faaa@gmail.com', 'A', 18, ''),
(38, '0000-00-00', 'Surname', 'John', 'T', 'Mealy', 'Name on Cert', 'III', '181 Hawthorne St. Apt. 2B', 'Brooklyn', 'NY', '11225', '5035224690', 'john@notiondigitalarts.com', 'D', 32, ''),
(39, '0000-00-00', 'Surname', 'First', 'Middle', 'Last', 'Cert', 'Suffix', '181 Hawthorne St. Apt. 2B', 'Brooklyn', 'NY', '11225', '5035224690', 'john@notiondigitalarts.com', 'D', 32, ''),
(40, '0000-00-00', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'h', 'h', 'h', 'h', 'h@h.net', 'D', 32, ''),
(41, '0000-00-00', '', 'far', '', 'Faraz', '', '', '360', 'Khi', 'Pun', '51400', '042375', 'faaa@gmail.com', 'A', 10, ''),
(58, '0000-00-00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'a', 'a@a.com', 'C', 2, ''),
(57, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 'C', 2, ''),
(56, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 'C', 2, ''),
(55, '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', 'C', 2, ''),
(54, '0000-00-00', '', 'far', '', '', '', '', '', '', '', '', '', '', 'C', 2, ''),
(53, '0000-00-00', '', 'far', '', '', '', '', '', '', '', '', '', '', 'C', 2, ''),
(59, '0000-00-00', '', 'John', 'Terence', 'Mealy', 'John Terence Mealy', '', '181 Hawthorne St. Apt. 2B', 'Brooklyn', 'NY', '11225', '5035224690', 'john@notiondigitalarts.com', 'Secur', 53, ''),
(60, '0000-00-00', '', 'John', 'Terence', 'Mealy', 'John Terence Mealy', '', '181 Hawthorne St. Apt. 2B', 'Brooklyn', 'NY', '11225', '5035224690', 'john@notiondigitalarts.com', 'NRA_B', 59, '');

-- --------------------------------------------------------

--
-- Table structure for table `supportpanel_users`
--

CREATE TABLE IF NOT EXISTS `supportpanel_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `supportpanel_users`
--

INSERT INTO `supportpanel_users` (`ID`, `Username`, `Password`) VALUES
(2, 'admin', '0cc175b9c0f1b6a831c399e269772661');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
