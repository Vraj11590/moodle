-- phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Host: sql.njit.edu
-- Generation Time: Apr 15, 2013 at 05:22 PM
-- Server version: 5.0.91
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `thh4`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `courseid` varchar(8) NOT NULL,
  `coursename` varchar(40) NOT NULL,
  PRIMARY KEY  (`courseid`),
  UNIQUE KEY `courseid` (`courseid`),
  UNIQUE KEY `coursename` (`coursename`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseid`, `coursename`) VALUES
('CS100', 'ROADMAP TO COMPUTING'),
('CS101', 'COMP PRO & PROB SOLVING'),
('CS103', 'COMPUT SCI BUSINESS PROB'),
('CS104', 'COMPUT PROG & GRAPH PROB'),
('CS106', 'ROADMAP TO COMPUTING ENGINEERS'),
('CS107', 'COMPUTING AS A CAREER'),
('CS113', 'INTRO COMPUTER SCI I'),
('CS114', 'INTRO COMPUTER SCI II'),
('CS115', 'INTRO COM SCI I C++'),
('CS116', 'INTRO COM SCI II C++'),
('CS241', 'FOUNDATION OF COMPUTER SCIENCE I'),
('CS252', 'COMPUTER ORG & ARCHITECT'),
('CS266', 'GAME MOD DEVELOPMENT'),
('CS280', 'PROGRAMING LANG CONCEPT'),
('CS288', 'INTENSIVE PROGRAMING IN LINUX'),
('CS310', 'WORK EXPERIENCE'),
('CS332', 'PRINCIPLES OF OPER SYS'),
('CS341', 'FOUND OF COMP SCIENCE II'),
('CS345', 'WEB SEARCH'),
('CS356', 'INTRO TO COMPUTER NETWORKS'),
('CS490', 'DESIGN IN SOTFWARE ENGINEERING'),
('CS491', 'COMPUTER CIENCE PROJECT'),
('MATH326', 'MATH THEORY FOR ENGINEER'),
('MATH211', 'CALCULUS III A'),
('MATH111', 'CALCULUS I'),
('MATH112', 'CALCULUS II'),
('MATH213', 'CALCULUS III B'),
('MATH139', 'GENERAL CALCULUS '),
('MATH222', 'DIFERENTIAL EQUATIONS'),
('MATH132', 'CALCULUS B'),
('ENG333', 'CYBER TEXT'),
('ENG340', 'ORAL PRESENTATION'),
('ENG352', 'TECHNICAL WRITING'),
('PHYS121', 'PHYSICS II'),
('PHYS111', 'PHYSICS I'),
('PHYS203', 'EARTH IN SPACE'),
('PHYS234', 'PHYSICS III'),
('HUM101', 'WRITING - SPEAKING - THINKING I'),
('HUM102', 'WRITING - SPEAKING - THINKING II');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE IF NOT EXISTS `enrolled` (
  `crn` int(3) NOT NULL,
  `ucid` varchar(6) NOT NULL,
  `grade` int(3) default NULL,
  KEY `enrolledFK` (`crn`),
  KEY `ENROLLMENT_FK` (`ucid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`crn`, `ucid`, `grade`) VALUES
(2, 'thh4', 98),
(4, 'thh4', 90),
(7, 'thh4', 100),
(9, 'thh4', 98),
(18, 'thh4', 98),
(23, 'thh4', 98),
(26, 'thh4', 98),
(35, 'thh4', 87),
(32, 'thh4', 98),
(36, 'thh4', 98),
(2, 'gt35', 98),
(4, 'gt35', 90),
(7, 'gt35', 100),
(9, 'gt35', 98),
(18, 'gt35', 98),
(23, 'gt35', 98),
(26, 'gt35', 98),
(35, 'gt35', 87),
(32, 'gt35', 98),
(36, 'gt35', 98),
(2, 'vp78', 98),
(4, 'vp78', 90),
(7, 'vp78', 100),
(9, 'vp78', 98),
(18, 'vp78', 98),
(23, 'vp78', 98),
(26, 'vp78', 98),
(35, 'vp78', 87),
(32, 'vp78', 98),
(36, 'vp78', 98);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `crn` int(3) NOT NULL,
  `pid` int(5) NOT NULL auto_increment,
  `ucid` varchar(6) NOT NULL,
  `text_post` varchar(500) default NULL,
  `post_title` varchar(100) NOT NULL,
  PRIMARY KEY  (`pid`),
  KEY `postFK_1` (`ucid`),
  KEY `postFK_2` (`crn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `posts`
--


-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `teacherid` varchar(6) NOT NULL,
  `courseid` varchar(7) NOT NULL,
  `sectionid` char(3) NOT NULL,
  `crn` int(3) NOT NULL auto_increment,
  `semesterid` varchar(15) default NULL,
  PRIMARY KEY  (`crn`),
  UNIQUE KEY `crn` (`crn`),
  KEY `sectionFK_1` (`teacherid`),
  KEY `sectionFK_2` (`courseid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`teacherid`, `courseid`, `sectionid`, `crn`, `semesterid`) VALUES
('cohen', 'CS100', '001', 1, 'Fall2012'),
('kapl', 'CS100', '002', 2, 'Fall2012'),
('bell', 'CS107', '002', 3, 'Fall2012'),
('theo', 'CS490', '001', 4, 'Fall2012'),
('kapl', 'CS280', '004', 5, 'Fall2012'),
('lay', 'CS332', '002', 6, 'Fall2012'),
('sohn', 'CS288', '002', 7, 'Fall2012'),
('kapl', 'CS288', '001', 8, 'Fall2012'),
('marvin', 'CS341', '002', 9, 'Fall2012'),
('marvin', 'CS341', '004', 10, 'Fall2012'),
('no1', 'MATH326', '002', 11, 'Fall2012'),
('no1', 'MATH222', '003', 12, 'Fall2012'),
('no1', 'MATH326', '001', 13, 'Fall2012'),
('no1', 'MATH112', '004', 14, 'Fall2012'),
('no2', 'HUM101', '002', 15, 'Fall2012'),
('no2', 'HUM102', '006', 16, 'Fall2012'),
('no3', 'PHYS121', '005', 17, 'Fall2012'),
('no3', 'PHYS111', '003', 18, 'Fall2012'),
('no3', 'PHYS203', '008', 19, 'Fall2012'),
('no3', 'PHYS234', '011', 20, 'Fall2012'),
('cohen', 'CS100', '001', 21, 'Spring2013'),
('kapl', 'CS100', '002', 22, 'Spring2013'),
('bell', 'CS107', '002', 23, 'Spring2013'),
('theo', 'CS490', '001', 24, 'Spring2013'),
('kapl', 'CS280', '004', 25, 'Spring2013'),
('lay', 'CS332', '002', 26, 'Spring2013'),
('sohn', 'CS288', '003', 27, 'Spring2013'),
('marvin', 'CS341', '002', 28, 'Spring2013'),
('george', 'CS356', '002', 29, 'Spring2013'),
('no1', 'MATH326', '002', 30, 'Spring2013'),
('no1', 'MATH222', '003', 31, 'Spring2013'),
('no1', 'MATH326', '001', 32, 'Spring2013'),
('no1', 'MATH112', '004', 33, 'Spring2013'),
('no2', 'HUM101', '002', 34, 'Spring2013'),
('no2', 'HUM102', '006', 35, 'Spring2013'),
('no3', 'PHYS121', '005', 36, 'Spring2013'),
('no3', 'PHYS111', '003', 37, 'Spring2013'),
('no3', 'PHYS203', '008', 38, 'Spring2013'),
('no3', 'PHYS234', '011', 39, 'Spring2013'),
('cohen', 'CS100', '001', 40, 'Fall2013'),
('kapl', 'CS100', '002', 41, 'Fall2013'),
('bell', 'CS107', '002', 42, 'Fall2013'),
('theo', 'CS490', '001', 43, 'Fall2013'),
('elja', 'CS491', '001', 44, 'Fall2013'),
('kapl', 'CS280', '004', 45, 'Fall2013'),
('lay', 'CS332', '002', 46, 'Fall2013'),
('sohn', 'CS288', '003', 47, 'Fall2013'),
('marvin', 'CS341', '002', 48, 'Fall2013'),
('george', 'CS356', '002', 49, 'Fall2013'),
('no1', 'MATH326', '002', 50, 'Fall2013'),
('no1', 'MATH222', '003', 51, 'Fall2013'),
('no1', 'MATH326', '001', 52, 'Fall2013'),
('no1', 'MATH112', '004', 53, 'Fall2013'),
('no2', 'HUM101', '002', 54, 'Fall2013'),
('no2', 'HUM102', '006', 55, 'Fall2013'),
('no3', 'PHYS121', '005', 56, 'Fall2013'),
('no3', 'PHYS111', '003', 57, 'Fall2013'),
('no3', 'PHYS203', '008', 58, 'Fall2013'),
('no3', 'PHYS234', '011', 59, 'Fall2013');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ucid` varchar(6) NOT NULL,
  `password` varchar(25) NOT NULL,
  `type` char(1) default NULL,
  `name` tinytext,
  PRIMARY KEY  (`ucid`),
  UNIQUE KEY `ucid` (`ucid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ucid`, `password`, `type`, `name`) VALUES
('thh4', 'password', 's', 'Vuong Huynh'),
('gt35', 'password', 's', 'Giaspur Tabangay'),
('vp78', 'password', 's', 'Vrajesh Patel'),
('theo', 'password', 't', 'Theo Nicholson'),
('abc123', 'password', 't', 'John Smith'),
('sohn', 'password', 't', 'Andrew Sohn'),
('marvin', 'password', 't', 'Marvin Nakayama'),
('george', 'password', 't', 'George Blank'),
('kapl', 'password', 't', 'Jonathan Kapleau'),
('lay', 'password', 't', 'Larry Lay'),
('bell', 'password', 't', 'Michele Bell'),
('cohen', 'password', 't', 'Barry Cohen'),
('elja', 'password', 't', 'Osama Eljabiri'),
('no1', 'password', 't', 'Rihana Ganga'),
('no2', 'password', 't', 'Zainab Rachel'),
('no3', 'password', 't', 'Brown Will');
