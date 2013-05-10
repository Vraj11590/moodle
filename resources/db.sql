-- phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Host: sql.njit.edu
-- Generation Time: May 10, 2013 at 12:50 AM
-- Server version: 5.0.91
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `thh4`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `assignid` int(50) NOT NULL auto_increment,
  `crn` int(255) NOT NULL,
  `assign_name` varchar(500) NOT NULL,
  `assign_content` varchar(500) NOT NULL,
  `assign_deadline` date NOT NULL,
  PRIMARY KEY  (`assignid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignid`, `crn`, `assign_name`, `assign_content`, `assign_deadline`) VALUES
(1, 0, 'assignment1', 'Create a group for project', '2013-02-02'),
(2, 0, 'assignment2', 'Submit the topic for your project', '2013-03-04'),
(3, 0, 'assignment3', 'Provide the basic solutions for your project', '2013-03-27'),
(4, 0, 'assignment4', 'Hand in report (hard copy) of your project', '2013-03-04'),
(5, 0, 'assignment5', 'Show up with the presentation', '2013-04-30'),
(6, 0, 'assignment1', 'Introduce yourself on Moodle ', '2013-01-02'),
(7, 0, 'assignment2', 'Make research: How writing affects the modern Human society', '2013-01-05'),
(8, 0, 'assignment3', 'Writing first essay for project', '2013-01-12'),
(9, 0, 'assignment4', 'Hand in report (hard copy) of your project', '2013-01-15'),
(10, 0, 'assignment5', 'Final presentation', '2013-01-20'),
(11, 0, 'assignment1', 'Create a group for project', '2012-09-02'),
(12, 0, 'assignment2', 'Submit the topic for your project', '2012-09-20'),
(13, 0, 'assignment3', 'Provide the basic solutions for your project', '2012-10-08'),
(14, 0, 'assignment4', 'Hand in report (hard copy) of your project', '2012-11-12'),
(15, 0, 'assignment5', 'Show up with the presentation', '2012-12-05'),
(16, 0, 'assignment1', 'create account through AFS server', '2012-05-31'),
(17, 0, 'assignment2', '1st programming project', '2012-06-20'),
(18, 0, 'assignment3', '2nd programming project', '2012-07-15'),
(19, 0, 'assignment4', '3rd programming project', '2012-07-28'),
(20, 0, 'assignment5', 'final programming project', '2012-08-12'),
(21, 0, 'assignment1', 'Create a group for project', '2012-02-02'),
(22, 0, 'assignment2', 'Submit the topic for your project', '2012-03-04'),
(23, 0, 'assignment3', 'Provide the basic solutions for your project', '2012-03-27'),
(24, 0, 'assignment4', 'Hand in report (hard copy) of your project', '2012-03-04'),
(25, 0, 'assignment5', 'Show up with the presentation', '2012-04-30'),
(37, 4, 'test assn', 'fjdslfjdslsjfslfjsfl', '2013-05-30'),
(36, 4, 'this is a test ', 'a test for an assignment', '2013-05-30'),
(38, 4, 'ass1', 'this is a test assn', '2013-05-30'),
(39, 0, 'ass1', 'this is a test assn', '2013-05-30'),
(40, 0, 'ass1', 'this is a test assn', '2013-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `assignsub`
--

CREATE TABLE IF NOT EXISTS `assignsub` (
  `ID` int(11) NOT NULL auto_increment,
  `assignid` int(50) NOT NULL,
  `ucid` varchar(7) NOT NULL,
  `grade` int(3) default NULL,
  `submitted` date NOT NULL,
  PRIMARY KEY  (`ID`),
  KEY `assignSubFK_1` (`assignid`),
  KEY `assignSubFK_3` (`ucid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166 ;

--
-- Dumping data for table `assignsub`
--

INSERT INTO `assignsub` (`ID`, `assignid`, `ucid`, `grade`, `submitted`) VALUES
(1, 1, 'thh4', 88, '0000-00-00'),
(2, 1, 'thh4', 85, '0000-00-00'),
(3, 1, 'thh4', 76, '0000-00-00'),
(4, 1, 'thh4', 85, '0000-00-00'),
(5, 2, 'thh4', 92, '0000-00-00'),
(6, 2, 'thh4', 73, '0000-00-00'),
(7, 2, 'thh4', 98, '0000-00-00'),
(8, 2, 'thh4', 73, '0000-00-00'),
(9, 3, 'thh4', 100, '0000-00-00'),
(10, 3, 'thh4', 96, '0000-00-00'),
(11, 3, 'thh4', 84, '0000-00-00'),
(12, 3, 'thh4', 96, '0000-00-00'),
(13, 4, 'thh4', 83, '0000-00-00'),
(14, 4, 'thh4', 76, '0000-00-00'),
(15, 4, 'thh4', 75, '0000-00-00'),
(16, 4, 'thh4', 76, '0000-00-00'),
(17, 5, 'thh4', 100, '0000-00-00'),
(18, 5, 'thh4', 92, '0000-00-00'),
(19, 5, 'thh4', 91, '0000-00-00'),
(20, 5, 'thh4', 100, '0000-00-00'),
(21, 1, 'gt35', 88, '0000-00-00'),
(22, 1, 'gt35', 85, '0000-00-00'),
(23, 1, 'gt35', 76, '0000-00-00'),
(24, 1, 'gt35', 85, '0000-00-00'),
(25, 2, 'gt35', 92, '0000-00-00'),
(26, 2, 'gt35', 73, '0000-00-00'),
(27, 2, 'gt35', 98, '0000-00-00'),
(28, 2, 'gt35', 73, '0000-00-00'),
(29, 3, 'gt35', 100, '0000-00-00'),
(30, 3, 'gt35', 96, '0000-00-00'),
(31, 3, 'gt35', 84, '0000-00-00'),
(32, 3, 'gt35', 96, '0000-00-00'),
(33, 4, 'gt35', 83, '0000-00-00'),
(34, 4, 'gt35', 76, '0000-00-00'),
(35, 4, 'gt35', 75, '0000-00-00'),
(36, 4, 'gt35', 76, '0000-00-00'),
(37, 5, 'gt35', 100, '0000-00-00'),
(38, 5, 'gt35', 92, '0000-00-00'),
(39, 5, 'gt35', 91, '0000-00-00'),
(40, 5, 'gt35', 100, '0000-00-00'),
(41, 1, 'vp78', 88, '0000-00-00'),
(42, 1, 'vp78', 85, '0000-00-00'),
(43, 1, 'vp78', 76, '0000-00-00'),
(44, 1, 'vp78', 85, '0000-00-00'),
(45, 2, 'vp78', 92, '0000-00-00'),
(46, 2, 'vp78', 73, '0000-00-00'),
(47, 2, 'vp78', 98, '0000-00-00'),
(48, 2, 'vp78', 73, '0000-00-00'),
(49, 3, 'vp78', 100, '0000-00-00'),
(50, 3, 'vp78', 96, '0000-00-00'),
(51, 3, 'vp78', 84, '0000-00-00'),
(52, 3, 'vp78', 96, '0000-00-00'),
(53, 4, 'vp78', 83, '0000-00-00'),
(54, 4, 'vp78', 76, '0000-00-00'),
(55, 4, 'vp78', 75, '0000-00-00'),
(56, 4, 'vp78', 76, '0000-00-00'),
(57, 5, 'vp78', 100, '0000-00-00')
