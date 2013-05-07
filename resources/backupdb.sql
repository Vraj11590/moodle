-- phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Host: sql.njit.edu
-- Generation Time: May 07, 2013 at 08:49 PM
-- Server version: 5.0.91
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `thh4`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE IF NOT EXISTS `assigns` (
  `assignid` int(50) NOT NULL auto_increment,
  `assign_name` varchar(500) NOT NULL,
  `assign_content` varchar(500) NOT NULL,
  `assign_deadline` date NOT NULL,
  PRIMARY KEY  (`assignid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`assignid`, `assign_name`, `assign_content`, `assign_deadline`) VALUES
(1, 'assignment1', 'Create a group for project', '2013-02-02'),
(2, 'assignment2', 'Submit the topic for your project', '2013-03-04'),
(3, 'assignment3', 'Provide the basic solutions for your project', '2013-03-27'),
(4, 'assignment4', 'Hand in report (hard copy) of your project', '2013-03-04'),
(5, 'assignment5', 'Show up with the presentation', '2013-04-30'),
(6, 'assignment1', 'Introduce yourself on Moodle ', '2013-01-02'),
(7, 'assignment2', 'Make research: How writing affects the modern Human society', '2013-01-05'),
(8, 'assignment3', 'Writing first essay for project', '2013-01-12'),
(9, 'assignment4', 'Hand in report (hard copy) of your project', '2013-01-15'),
(10, 'assignment5', 'Final presentation', '2013-01-20'),
(11, 'assignment1', 'Create a group for project', '2012-09-02'),
(12, 'assignment2', 'Submit the topic for your project', '2012-09-20'),
(13, 'assignment3', 'Provide the basic solutions for your project', '2012-10-08'),
(14, 'assignment4', 'Hand in report (hard copy) of your project', '2012-11-12'),
(15, 'assignment5', 'Show up with the presentation', '2012-12-05'),
(16, 'assignment1', 'create account through AFS server', '2012-05-31'),
(17, 'assignment2', '1st programming project', '2012-06-20'),
(18, 'assignment3', '2nd programming project', '2012-07-15'),
(19, 'assignment4', '3rd programming project', '2012-07-28'),
(20, 'assignment5', 'final programming project', '2012-08-12'),
(21, 'assignment1', 'Create a group for project', '2012-02-02'),
(22, 'assignment2', 'Submit the topic for your project', '2012-03-04'),
(23, 'assignment3', 'Provide the basic solutions for your project', '2012-03-27'),
(24, 'assignment4', 'Hand in report (hard copy) of your project', '2012-03-04'),
(25, 'assignment5', 'Show up with the presentation', '2012-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `assignSub`
--

CREATE TABLE IF NOT EXISTS `assignSub` (
  `assignid` int(50) NOT NULL,
  `crn` int(3) NOT NULL,
  `ucid` varchar(7) NOT NULL,
  `submit` varchar(1000) NOT NULL,
  `date_submit` date default NULL,
  `grade` int(3) default NULL,
  KEY `assignSubFK_1` (`assignid`),
  KEY `assignSubFK_3` (`ucid`),
  KEY `assignSubFK_2` (`crn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignSub`
--

INSERT INTO `assignSub` (`assignid`, `crn`, `ucid`, `submit`, `date_submit`, `grade`) VALUES
(1, 4, 'thh4', 'ksfjibieibieb', '2013-05-07', 88),
(1, 9, 'thh4', '', NULL, 85),
(1, 15, 'thh4', '', NULL, 76),
(1, 19, 'thh4', 'songjsngon', '2013-05-07', 85),
(2, 4, 'thh4', '', NULL, 92),
(2, 9, 'thh4', '', NULL, 73),
(2, 15, 'thh4', '', NULL, 98),
(2, 19, 'thh4', '', NULL, 73),
(3, 4, 'thh4', '', NULL, 100),
(3, 9, 'thh4', '', NULL, 96),
(3, 15, 'thh4', '', NULL, 84),
(3, 19, 'thh4', '', NULL, 96),
(4, 4, 'thh4', '', NULL, 83),
(4, 9, 'thh4', '', NULL, 76),
(4, 15, 'thh4', '', NULL, 75),
(4, 19, 'thh4', '', NULL, 76),
(5, 4, 'thh4', '', NULL, 100),
(5, 9, 'thh4', '', NULL, 92),
(5, 15, 'thh4', '', NULL, 91),
(5, 19, 'thh4', '', NULL, 100),
(1, 4, 'gt35', '', NULL, 88),
(1, 9, 'gt35', '', NULL, 85),
(1, 15, 'gt35', '', NULL, 76),
(1, 19, 'gt35', '', NULL, 85),
(2, 4, 'gt35', '', NULL, 92),
(2, 9, 'gt35', '', NULL, 73),
(2, 15, 'gt35', '', NULL, 98),
(2, 19, 'gt35', '', NULL, 73),
(3, 4, 'gt35', '', NULL, 100),
(3, 9, 'gt35', '', NULL, 96),
(3, 15, 'gt35', '', NULL, 84),
(3, 19, 'gt35', '', NULL, 96),
(4, 4, 'gt35', '', NULL, 83),
(4, 9, 'gt35', '', NULL, 76),
(4, 15, 'gt35', '', NULL, 75),
(4, 19, 'gt35', '', NULL, 76),
(5, 4, 'gt35', '', NULL, 100),
(5, 9, 'gt35', '', NULL, 92),
(5, 15, 'gt35', '', NULL, 91),
(5, 19, 'gt35', '', NULL, 100),
(1, 4, 'vp78', '', NULL, 88),
(1, 9, 'vp78', '', NULL, 85),
(1, 15, 'vp78', '', NULL, 76),
(1, 19, 'vp78', '', NULL, 85),
(2, 4, 'vp78', '', NULL, 92),
(2, 9, 'vp78', '', NULL, 73),
(2, 15, 'vp78', '', NULL, 98),
(2, 19, 'vp78', '', NULL, 73),
(3, 4, 'vp78', '', NULL, 100),
(3, 9, 'vp78', '', NULL, 96),
(3, 15, 'vp78', '', NULL, 84),
(3, 19, 'vp78', '', NULL, 96),
(4, 4, 'vp78', '', NULL, 83),
(4, 9, 'vp78', '', NULL, 76),
(4, 15, 'vp78', '', NULL, 75),
(4, 19, 'vp78', '', NULL, 76),
(5, 4, 'vp78', '', NULL, 100),
(5, 9, 'vp78', '', NULL, 92),
(5, 15, 'vp78', '', NULL, 91),
(5, 19, 'vp78', '', NULL, 100),
(11, 20, 'thh4', '', NULL, 88),
(12, 20, 'thh4', '', NULL, 92),
(13, 20, 'thh4', '', NULL, 100),
(14, 20, 'thh4', '', NULL, 83),
(15, 20, 'thh4', '', NULL, 100),
(11, 20, 'gt35', '', NULL, 88),
(12, 20, 'gt35', '', NULL, 92),
(13, 20, 'gt35', '', NULL, 100),
(14, 20, 'gt35', '', NULL, 83),
(15, 20, 'gt35', '', NULL, 100),
(11, 20, 'vp78', '', NULL, 88),
(12, 20, 'vp78', '', NULL, 92),
(13, 20, 'vp78', '', NULL, 100),
(14, 20, 'vp78', '', NULL, 83),
(15, 20, 'vp78', '', NULL, 100)