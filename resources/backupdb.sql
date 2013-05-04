-- phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Host: sql.njit.edu
-- Generation Time: May 04, 2013 at 07:37 AM
-- Server version: 5.0.91
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `thh4`
--
CREATE DATABASE `thh4` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `thh4`;

-- --------------------------------------------------------

--
-- Table structure for table `assignSub`
--

CREATE TABLE IF NOT EXISTS `assignSub` (
  `assignid` int(50) NOT NULL,
  `crn` int(3) NOT NULL,
  `ucid` varchar(7) NOT NULL,
  `grade` int(3) default NULL,
  KEY `assignSubFK_1` (`assignid`),
  KEY `assignSubFK_3` (`ucid`),
  KEY `assignSubFK_2` (`crn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignSub`
--

INSERT INTO `assignSub` (`assignid`, `crn`, `ucid`, `grade`) VALUES
(1, 4, 'thh4', 88),
(1, 9, 'thh4', 85),
(1, 15, 'thh4', 76),
(1, 19, 'thh4', 85),
(2, 4, 'thh4', 92),
(2, 9, 'thh4', 73),
(2, 15, 'thh4', 98),
(2, 19, 'thh4', 73),
(3, 4, 'thh4', 100),
(3, 9, 'thh4', 96),
(3, 15, 'thh4', 84),
(3, 19, 'thh4', 96),
(4, 4, 'thh4', 83),
(4, 9, 'thh4', 76),
(4, 15, 'thh4', 75),
(4, 19, 'thh4', 76),
(5, 4, 'thh4', 100),
(5, 9, 'thh4', 92),
(5, 15, 'thh4', 91),
(5, 19, 'thh4', 100),
(1, 4, 'gt35', 88),
(1, 9, 'gt35', 85),
(1, 15, 'gt35', 76),
(1, 19, 'gt35', 85),
(2, 4, 'gt35', 92),
(2, 9, 'gt35', 73),
(2, 15, 'gt35', 98),
(2, 19, 'gt35', 73),
(3, 4, 'gt35', 100),
(3, 9, 'gt35', 96),
(3, 15, 'gt35', 84),
(3, 19, 'gt35', 96),
(4, 4, 'gt35', 83),
(4, 9, 'gt35', 76),
(4, 15, 'gt35', 75),
(4, 19, 'gt35', 76),
(5, 4, 'gt35', 100),
(5, 9, 'gt35', 92),
(5, 15, 'gt35', 91),
(5, 19, 'gt35', 100),
(1, 4, 'vp78', 88),
(1, 9, 'vp78', 85),
(1, 15, 'vp78', 76),
(1, 19, 'vp78', 85),
(2, 4, 'vp78', 92),
(2, 9, 'vp78', 73),
(2, 15, 'vp78', 98),
(2, 19, 'vp78', 73),
(3, 4, 'vp78', 100),
(3, 9, 'vp78', 96),
(3, 15, 'vp78', 84),
(3, 19, 'vp78', 96),
(4, 4, 'vp78', 83),
(4, 9, 'vp78', 76),
(4, 15, 'vp78', 75),
(4, 19, 'vp78', 76),
(5, 4, 'vp78', 100),
(5, 9, 'vp78', 92),
(5, 15, 'vp78', 91),
(5, 19, 'vp78', 100),
(11, 20, 'thh4', 88),
(12, 20, 'thh4', 92),
(13, 20, 'thh4', 100),
(14, 20, 'thh4', 83),
(15, 20, 'thh4', 100),
(11, 20, 'gt35', 88),
(12, 20, 'gt35', 92),
(13, 20, 'gt35', 100),
(14, 20, 'gt35', 83),
(15, 20, 'gt35', 100),
(11, 20, 'vp78', 88),
(12, 20, 'vp78', 92),
(13, 20, 'vp78', 100),
(14, 20, 'vp78', 83),
(15, 20, 'vp78', 100),
(11, 27, 'thh4', 88),
(11, 29, 'thh4', 85),
(11, 37, 'thh4', 76),
(11, 39, 'thh4', 85),
(12, 27, 'thh4', 92),
(12, 29, 'thh4', 73),
(12, 37, 'thh4', 98),
(12, 39, 'thh4', 73),
(13, 27, 'thh4', 100),
(13, 29, 'thh4', 96),
(13, 37, 'thh4', 84),
(13, 39, 'thh4', 96),
(14, 27, 'thh4', 83),
(14, 29, 'thh4', 76),
(14, 37, 'thh4', 75),
(14, 39, 'thh4', 76),
(15, 27, 'thh4', 100),
(15, 29, 'thh4', 92),
(15, 37, 'thh4', 91),
(15, 39, 'thh4', 100),
(11, 27, 'gt35', 88),
(11, 29, 'gt35', 85),
(11, 37, 'gt35', 76),
(11, 39, 'gt35', 85),
(12, 27, 'gt35', 92),
(12, 29, 'gt35', 73),
(12, 37, 'gt35', 98),
(12, 39, 'gt35', 73),
(13, 27, 'gt35', 100),
(13, 29, 'gt35', 96),
(13, 37, 'gt35', 84),
(13, 39, 'gt35', 96),
(14, 27, 'gt35', 83),
(14, 29, 'gt35', 76),
(14, 37, 'gt35', 75),
(14, 39, 'gt35', 76),
(15, 27, 'gt35', 100),
(15, 29, 'gt35', 92),
(15, 37, 'gt35', 91),
(15, 39, 'gt35', 100),
(11, 27, 'vp78', 88),
(11, 29, 'vp78', 85),
(11, 37, 'vp78', 76),
(11, 39, 'vp78', 85),
(12, 27, 'vp78', 92),
(12, 29, 'vp78', 73),
(12, 37, 'vp78', 98),
(12, 39, 'vp78', 73),
(13, 27, 'vp78', 100),
(13, 29, 'vp78', 96),
(13, 37, 'vp78', 84),
(13, 39, 'vp78', 96),
(14, 27, 'vp78', 83),
(14, 29, 'vp78', 76),
(14, 37, 'vp78', 75),
(14, 39, 'vp78', 76),
(15, 27, 'vp78', 100),
(15, 29, 'vp78', 92),
(15, 37, 'vp78', 91),
(15, 39, 'vp78', 100),
(16, 41, 'thh4', 88),
(16, 42, 'thh4', 85),
(17, 41, 'thh4', 92),
(17, 42, 'thh4', 73),
(18, 41, 'thh4', 100),
(18, 42, 'thh4', 96),
(19, 41, 'thh4', 83),
(19, 42, 'thh4', 76),
(20, 41, 'thh4', 100),
(20, 42, 'thh4', 92),
(16, 41, 'gt35', 88),
(16, 42, 'gt35', 85),
(17, 41, 'gt35', 92),
(17, 42, 'gt35', 73),
(18, 41, 'gt35', 100),
(18, 42, 'gt35', 96),
(19, 41, 'gt35', 83),
(19, 42, 'gt35', 76),
(20, 41, 'gt35', 100),
(20, 42, 'gt35', 92),
(16, 41, 'vp78', 88),
(16, 42, 'vp78', 85),
(17, 41, 'vp78', 92),
(17, 42, 'vp78', 73),
(18, 41, 'vp78', 100),
(18, 42, 'vp78', 96),
(19, 41, 'vp78', 83),
(19, 42, 'vp78', 76),
(20, 41, 'vp78', 100),
(20, 42, 'vp78', 92);

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
(13, 'assignment3', 'Provide the basic solutions for your project', '2012-10-08')