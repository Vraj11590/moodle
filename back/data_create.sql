-- phpMyAdmin SQL Dump
-- version 3.2.2
-- http://www.phpmyadmin.net
--
-- Host: sql.njit.edu
-- Generation Time: Apr 20, 2013 at 12:58 AM
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
(1, 'thh4', 98),
(3, 'thh4', 90),
(13, 'thh4', 100),
(17, 'thh4', 98),
(20, 'thh4', 98),
(21, 'thh4', 98),
(28, 'thh4', 98),
(30, 'thh4', 87),
(38, 'thh4', 93),
(40, 'thh4', 96),
(42, 'thh4', 85),
(46, 'thh4', 89),
(51, 'thh4', 99),
(57, 'thh4', 91),
(61, 'thh4', 94),
(1, 'gt35', 98),
(3, 'gt35', 90),
(13, 'gt35', 100),
(17, 'gt35', 95),
(20, 'gt35', 97),
(21, 'gt35', 82),
(28, 'gt35', 81),
(30, 'gt35', 96),
(38, 'gt35', 72),
(40, 'gt35', 85),
(42, 'gt35', 98),
(46, 'gt35', 91),
(51, 'gt35', 94),
(57, 'gt35', 93),
(61, 'gt35', 88),
(1, 'vp78', 98),
(3, 'vp78', 90),
(13, 'vp78', 100),
(17, 'vp78', 78),
(20, 'vp78', 86),
(21, 'vp78', 93),
(28, 'vp78', 97),
(30, 'vp78', 88),
(38, 'vp78', 95),
(40, 'vp78', 92),
(42, 'vp78', 91),
(46, 'vp78', 99),
(51, 'vp78', 89),
(57, 'vp78', 87),
(61, 'vp78', 100);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `pid` int(5) NOT NULL auto_increment,
  `crn` int(3) NOT NULL,
  `ucid` varchar(6) NOT NULL,
  `post_title` varchar(500) default NULL,
  `post_text` varchar(500) NOT NULL,
  PRIMARY KEY  (`pid`),
  KEY `postFK_1` (`ucid`),
  KEY `postFK_2` (`crn`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `crn`, `ucid`, `post_title`, `post_text`) VALUES
(1, 1, 'thh4', 'When will we have midterm?', 'could anyone let me know when we will have midterm exam?'),
(2, 1, 'gt35', 'reply:midterm exam', 'May be on May10'),
(3, 1, 'vp78', 'reply:midterm ', 'i have never heard about it. do we have to do it?'),
(4, 3, 'vp78', 'class attention!', 'did professor check attention list in last class?'),
(5, 3, 'gt35', 'reply: class attention ', 'i was absent 2. lol'),
(6, 3, 'thh4', 'reply: class attention ', 'no, he did not'),
(7, 13, 'vp78', 'mobile app meeting', 'meeting about how to make mobile app on May,15th. Anyone want to join with us?'),
(8, 13, 'gt35', 'reply: ', 'i will. Pick me up after class.'),
(9, 13, 'thh4', 'reply:  ', 'can you give a ride, too?'),
(10, 17, 'gt35', 'practice for final', 'could anyone please help me to practice more problem to get well prepared for upcoming final exam'),
(11, 17, 'vp78', 'reply: ', 'sure. come to see me after class this week'),
(12, 17, 'thh4', 'reply:  ', 'can i come, too?'),
(13, 20, 'thh4', 'When will we have midterm?', 'could anyone let me know when we will have midterm exam?'),
(14, 20, 'gt35', 'reply:midterm exam', 'May be on July 10'),
(15, 20, 'vp78', 'reply:midterm ', 'i have never heard about it. do we have to do it?'),
(16, 21, 'vp78', 'class attention!', 'did professor check attention list in last class?'),
(17, 21, 'gt35', 'reply: class attention ', 'i was absent 2. lol'),
(18, 21, 'thh4', 'reply: class attention ', 'no, he did not'),
(19, 28, 'thh4', 'When will we have midterm?', 'could anyone let me know when we will have midterm exam?'),
(20, 28, 'gt35', 'reply:midterm exam', 'May be on Nov 10'),
(21, 28, 'vp78', 'reply:midterm ', 'i have never heard about it. do we have to do it?'),
(22, 30, 'vp78', 'class attention!', 'did professor check attention list in last class?'),
(23, 30, 'gt35', 'reply: class attention ', 'i was absent 2. lol'),
(24, 30, 'thh4', 'reply: class attention ', 'no, he did not'),
(25, 38, 'vp78', 'mobile app meeting', 'meeting about how to make mobile app on Dec 15th. Anyone want to join with us?'),
(26, 38, 'gt35', 'reply: ', 'i will. Pick me up after class.'),
(27, 38, 'thh4', 'reply:  ', 'can you give a ride, too?'),
(28, 40, 'gt35', 'practice for final', 'could anyone please help me to practice more problem to get well prepared for upcoming final exam'),
(29, 40, 'vp78', 'reply: ', 'sure. come to see me after class this week'),
(30, 40, 'thh4', 'reply:  ', 'can i come, too?'),
(31, 42, 'vp78', 'class attention!', 'did professor check attention list in last class?'),
(32, 42, 'gt35', 'reply: class attention ', 'i was absent 2. lol'),
(33, 42, 'thh4', 'reply: class attention ', 'no, he did not'),
(34, 46, 'thh4', 'When will we have midterm?', 'could anyone let me know when we will have midterm exam?'),
(35, 46, 'gt35', 'reply:midterm exam', 'May be on May10'),
(36, 46, 'vp78', 'reply:midterm ', 'i have never heard about it. do we have to do it?'),
(37, 51, 'vp78', 'class attention!', 'did professor check attention list in last class?'),
(38, 51, 'gt35', 'reply: class attention ', 'i was absent 2. lol'),
(39, 51, 'thh4', 'reply: class attention ', 'no, he did not'),
(40, 57, 'vp78', 'mobile app meeting', 'meeting about how to make mobile app on May,15th. Anyone want to join with us?'),
(41, 57, 'gt35', 'reply: ', 'i will. Pick me up after class.'),
(42, 57, 'thh4', 'reply:  ', 'can you give a ride, too?'),
(43, 61, 'gt35', 'practice for final', 'could anyone please help me to practice more problem to get well prepared for upcoming final exam'),
(44, 61, 'vp78', 'reply: ', 'sure. come to see me after class this week'),
(45, 61, 'thh4', 'reply:  ', 'can i come, too?');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`teacherid`, `courseid`, `sectionid`, `crn`, `semesterid`) VALUES
('cohen', 'CS100', '001', 1, 'Spring2012'),
('kapl', 'CS100', '002', 2, 'Spring2012'),
('bell', 'CS107', '002', 3, 'Spring2012'),
('theo', 'CS490', '001', 4, 'Spring2012'),
('kapl', 'CS280', '004', 5, 'Spring2012'),
('lay', 'CS332', '002', 6, 'Spring2012'),
('sohn', 'CS288', '003', 7, 'Spring2012'),
('marvin', 'CS341', '002', 8, 'Spring2012'),
('george', 'CS356', '002', 9, 'Spring2012'),
('no1', 'MATH326', '002', 10, 'Spring2012'),
('no1', 'MATH222', '003', 11, 'Spring2012'),
('no1', 'MATH326', '001', 12, 'Spring2012'),
('no1', 'MATH112', '004', 13, 'Spring2012'),
('no2', 'HUM101', '002', 14, 'Spring2012'),
('no2', 'HUM102', '006', 15, 'Spring2012'),
('no3', 'PHYS121', '005', 16, 'Spring2012'),
('no3', 'PHYS111', '003', 17, 'Spring2012'),
('no3', 'PHYS203', '008', 18, 'Spring2012'),
('no3', 'PHYS234', '011', 19, 'Spring2012'),
('kapl', 'CS280', '004', 20, 'Summer2012'),
('no1', 'MATH222', '004', 21, 'Summer2012'),
('cohen', 'CS100', '001', 22, 'Fall2012'),
('kapl', 'CS100', '002', 23, 'Fall2012'),
('bell', 'CS107', '002', 24, 'Fall2012'),
('theo', 'CS490', '001', 25, 'Fall2012'),
('kapl', 'CS280', '004', 26, 'Fall2012'),
('lay', 'CS332', '002', 27, 'Fall2012'),
('sohn', 'CS288', '002', 28, 'Fall2012'),
('kapl', 'CS288', '001', 29, 'Fall2012'),
('marvin', 'CS341', '002', 30, 'Fall2012'),
('marvin', 'CS341', '004', 31, 'Fall2012'),
('no1', 'MATH326', '002', 32, 'Fall2012'),
('no1', 'MATH222', '003', 33, 'Fall2012'),
('no1', 'MATH326', '001', 34, 'Fall2012'),
('no1', 'MATH112', '004', 35, 'Fall2012'),
('no2', 'HUM101', '002', 36, 'Fall2012'),
('no2', 'HUM102', '006', 37, 'Fall2012'),
('no3', 'PHYS121', '005', 38, 'Fall2012'),
('no3', 'PHYS111', '003', 39, 'Fall2012'),
('no3', 'PHYS203', '008', 40, 'Fall2012'),
('no3', 'PHYS234', '011', 41, 'Fall2012'),
('no2', 'HUM101', '002', 42, 'Winter2013'),
('cohen', 'CS100', '001', 43, 'Spring2013'),
('kapl', 'CS100', '002', 44, 'Spring2013'),
('bell', 'CS107', '002', 45, 'Spring2013'),
('theo', 'CS490', '001', 46, 'Spring2013'),
('kapl', 'CS280', '004', 47, 'Spring2013'),
('lay', 'CS332', '002', 48, 'Spring2013'),
('sohn', 'CS288', '003', 49, 'Spring2013'),
('marvin', 'CS341', '002', 50, 'Spring2013'),
('george', 'CS356', '002', 51, 'Spring2013'),
('no1', 'MATH326', '002', 52, 'Spring2013'),
('no1', 'MATH222', '003', 53, 'Spring2013'),
('no1', 'MATH326', '001', 54, 'Spring2013'),
('no1', 'MATH112', '004', 55, 'Spring2013'),
('no2', 'HUM101', '002', 56, 'Spring2013'),
('no2', 'HUM102', '006', 57, 'Spring2013'),
('no3', 'PHYS121', '005', 58, 'Spring2013'),
('no3', 'PHYS111', '003', 59, 'Spring2013'),
('no3', 'PHYS203', '008', 60, 'Spring2013'),
('no3', 'PHYS234', '011', 61, 'Spring2013'),
('kapl', 'CS280', '004', 62, 'Summer2013'),
('no1', 'MATH112', '004', 63, 'Summer2013'),
('cohen', 'CS100', '001', 64, 'Fall2013'),
('kapl', 'CS100', '002', 65, 'Fall2013'),
('bell', 'CS107', '002', 66, 'Fall2013'),
('theo', 'CS490', '001', 67, 'Fall2013'),
('elja', 'CS491', '001', 68, 'Fall2013'),
('kapl', 'CS280', '004', 69, 'Fall2013'),
('lay', 'CS332', '002', 70, 'Fall2013'),
('sohn', 'CS288', '003', 71, 'Fall2013'),
('marvin', 'CS341', '002', 72, 'Fall2013'),
('george', 'CS356', '002', 73, 'Fall2013'),
('no1', 'MATH326', '002', 74, 'Fall2013'),
('no1', 'MATH222', '003', 75, 'Fall2013'),
('no1', 'MATH326', '001', 76, 'Fall2013'),
('no1', 'MATH112', '004', 77, 'Fall2013'),
('no2', 'HUM101', '002', 78, 'Fall2013'),
('no2', 'HUM102', '006', 79, 'Fall2013'),
('no3', 'PHYS121', '005', 80, 'Fall2013'),
('no3', 'PHYS111', '003', 81, 'Fall2013'),
('no3', 'PHYS203', '008', 82, 'Fall2013'),
('no3', 'PHYS234', '011', 83, 'Fall2013');

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
