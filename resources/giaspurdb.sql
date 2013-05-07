-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2013 at 08:50 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thh4`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `assignid` int(50) NOT NULL AUTO_INCREMENT,
  `assign_name` varchar(500) NOT NULL,
  `assign_content` varchar(500) NOT NULL,
  `assign_deadline` date NOT NULL,
  PRIMARY KEY (`assignid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignid`, `assign_name`, `assign_content`, `assign_deadline`) VALUES
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
(25, 'assignment5', 'Show up with the presentation', '2012-04-30'),
(37, 'test assn', 'fjdslfjdslsjfslfjsfl', '2013-05-30'),
(36, 'this is a test ', 'a test for an assignment', '2013-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `assignsub`
--

CREATE TABLE IF NOT EXISTS `assignsub` (
  `assignid` int(50) NOT NULL,
  `crn` int(3) NOT NULL,
  `ucid` varchar(7) NOT NULL,
  `grade` int(3) DEFAULT NULL,
  KEY `assignSubFK_1` (`assignid`),
  KEY `assignSubFK_3` (`ucid`),
  KEY `assignSubFK_2` (`crn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignsub`
--

INSERT INTO `assignsub` (`assignid`, `crn`, `ucid`, `grade`) VALUES
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
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `courseid` varchar(8) NOT NULL,
  `coursename` varchar(40) NOT NULL,
  PRIMARY KEY (`courseid`),
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
  `ucid` varchar(7) NOT NULL,
  `grade` int(3) DEFAULT NULL,
  KEY `enrolledFK` (`crn`),
  KEY `ENROLLMENT_FK` (`ucid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`crn`, `ucid`, `grade`) VALUES
(4, 'thh4', 98),
(9, 'thh4', 90),
(15, 'thh4', 100),
(19, 'thh4', 98),
(20, 'thh4', 98),
(27, 'thh4', 98),
(29, 'thh4', 98),
(37, 'thh4', 87),
(39, 'thh4', 93),
(41, 'thh4', 96),
(42, 'thh4', 85),
(43, 'thh4', 89),
(45, 'thh4', 99),
(55, 'thh4', 91),
(59, 'thh4', 94),
(4, 'gt35', 98),
(9, 'gt35', 90),
(15, 'gt35', 100),
(19, 'gt35', 98),
(20, 'gt35', 98),
(27, 'gt35', 98),
(29, 'gt35', 98),
(37, 'gt35', 87),
(39, 'gt35', 93),
(41, 'gt35', 96),
(42, 'gt35', 85),
(43, 'gt35', 89),
(45, 'gt35', 99),
(55, 'gt35', 91),
(59, 'gt35', 94),
(4, 'vp78', 98),
(9, 'vp78', 90),
(15, 'vp78', 100),
(19, 'vp78', 98),
(20, 'vp78', 98),
(27, 'vp78', 98),
(29, 'vp78', 98),
(37, 'vp78', 87),
(39, 'vp78', 93),
(41, 'vp78', 96),
(42, 'vp78', 85),
(43, 'vp78', 89),
(45, 'vp78', 99),
(55, 'vp78', 91),
(59, 'vp78', 94);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `fileid` int(5) NOT NULL AUTO_INCREMENT,
  `crn` int(3) NOT NULL,
  `ucid` varchar(6) NOT NULL,
  `file_name` varchar(500) DEFAULT NULL,
  `file_format` varchar(500) NOT NULL,
  `file_content` varchar(500) NOT NULL,
  PRIMARY KEY (`fileid`),
  KEY `postFK_1` (`ucid`),
  KEY `postFK_2` (`crn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `crn` int(100) NOT NULL,
  `ucid` varchar(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `parent` int(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`ID`, `crn`, `ucid`, `title`, `content`, `parent`) VALUES
(4, 4, 'theo', 'hello', 'this is a the topic', 0),
(5, 4, 'theo', 'replhy', 'this is a reply to topic', 4),
(6, 4, 'theo', 'replhy', 'reply to reply', 5),
(7, 4, 'theo', 'replhy', 'reply^3', 6),
(8, 4, 'theo', 're:', 'replying to topic', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quizans`
--

CREATE TABLE IF NOT EXISTS `quizans` (
  `qid` int(5) NOT NULL,
  `crn` int(3) NOT NULL,
  `ucid` varchar(7) NOT NULL,
  `student_ans` varchar(500) DEFAULT NULL,
  `grade` int(3) DEFAULT NULL,
  KEY `quizAnsFK_1` (`ucid`),
  KEY `quizAnsFK_2` (`crn`),
  KEY `quizAnsFK_3` (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Submitted Quiz Answers';

--
-- Dumping data for table `quizans`
--

INSERT INTO `quizans` (`qid`, `crn`, `ucid`, `student_ans`, `grade`) VALUES
(1, 4, 'gt35', 'adccb', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizmaster`
--

CREATE TABLE IF NOT EXISTS `quizmaster` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `crn` int(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quizmaster`
--

INSERT INTO `quizmaster` (`ID`, `name`, `crn`) VALUES
(1, 'quiz1', 4),
(2, 'quiz2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `quizquestions`
--

CREATE TABLE IF NOT EXISTS `quizquestions` (
  `qid` int(5) NOT NULL AUTO_INCREMENT,
  `quizID` int(11) NOT NULL,
  `quiz_quest` varchar(500) NOT NULL,
  `a` varchar(500) NOT NULL,
  `b` varchar(500) NOT NULL,
  `c` varchar(500) NOT NULL,
  `d` varchar(500) NOT NULL,
  `quiz_ans` varchar(500) NOT NULL,
  `grade` int(3) DEFAULT '25',
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `quizquestions`
--

INSERT INTO `quizquestions` (`qid`, `quizID`, `quiz_quest`, `a`, `b`, `c`, `d`, `quiz_ans`, `grade`) VALUES
(1, 1, 'Who is currently US President?', 'Barack Obama', 'Paris Hilton', 'Beyonce ', 'Lindsay Lohan', 'a', 25),
(2, 1, 'Who will schedule Capstone ShowCase in NJIT ?', 'Principle', 'no one', 'Instructor', 'Professor', 'd', 25),
(3, 1, 'What is NY ?', 'New Yankees', 'Not Yummy', 'US state', 'No Yelling', 'c', 25),
(4, 1, 'What is CA ?', 'Cops Around', 'Camera Around', 'US state', 'Center of Austin', 'c', 25),
(5, 1, 'what is love?', 'baby dont hurt me', 'dont hurt me ', 'no more', 'what is love', 'a', 25);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `teacherid` varchar(7) NOT NULL,
  `courseid` varchar(8) NOT NULL,
  `sectionid` char(3) NOT NULL,
  `crn` int(3) NOT NULL AUTO_INCREMENT,
  `semesterid` varchar(15) DEFAULT NULL,
  `capacity` int(3) DEFAULT '30',
  `actual` int(3) DEFAULT '3',
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`crn`),
  UNIQUE KEY `crn` (`crn`),
  KEY `sectionFK_1` (`teacherid`),
  KEY `sectionFK_2` (`courseid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`teacherid`, `courseid`, `sectionid`, `crn`, `semesterid`, `capacity`, `actual`, `start`, `end`) VALUES
('cohen', 'CS100', '001', 1, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('kapl', 'CS100', '002', 2, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('bell', 'CS107', '002', 3, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('theo', 'CS490', '001', 4, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('kapl', 'CS280', '004', 5, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('lay', 'CS332', '002', 6, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('sohn', 'CS288', '003', 7, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('marvin', 'CS341', '002', 8, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('george', 'CS356', '002', 9, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH326', '002', 10, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH222', '003', 11, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH326', '001', 12, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH112', '004', 13, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('rachel', 'HUM101', '002', 14, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('rachel', 'HUM102', '006', 15, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS121', '005', 16, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS111', '003', 17, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS203', '008', 18, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS234', '011', 19, 'Spring2013', 30, 3, '0000-00-00', '0000-00-00'),
('rachel', 'HUM101', '002', 20, 'Winter2013', 30, 3, '0000-00-00', '0000-00-00'),
('cohen', 'CS100', '001', 21, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('kapl', 'CS100', '002', 22, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('bell', 'CS107', '002', 23, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('theo', 'CS490', '001', 24, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('kapl', 'CS280', '004', 25, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('lay', 'CS332', '002', 26, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('sohn', 'CS288', '002', 27, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('kapl', 'CS288', '001', 28, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('marvin', 'CS341', '002', 29, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('marvin', 'CS341', '004', 30, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH326', '002', 31, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH222', '003', 32, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH326', '001', 33, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH112', '004', 34, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('rachel', 'HUM101', '002', 35, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('rachel', 'HUM102', '006', 36, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS121', '005', 37, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS111', '003', 38, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS203', '008', 39, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS234', '011', 40, 'Fall2012', 30, 3, '0000-00-00', '0000-00-00'),
('kapl', 'CS280', '004', 41, 'Summer2012', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH222', '004', 42, 'Summer2012', 30, 3, '0000-00-00', '0000-00-00'),
('cohen', 'CS100', '001', 43, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('kapl', 'CS100', '002', 44, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('bell', 'CS107', '002', 45, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('theo', 'CS490', '001', 46, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('kapl', 'CS280', '004', 47, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('lay', 'CS332', '002', 48, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('sohn', 'CS288', '003', 49, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('marvin', 'CS341', '002', 50, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('george', 'CS356', '002', 51, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH326', '002', 52, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH222', '003', 53, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH326', '001', 54, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('ganga', 'MATH112', '004', 55, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('rachel', 'HUM101', '002', 56, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('rachel', 'HUM102', '006', 57, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS121', '005', 58, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS111', '003', 59, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS203', '008', 60, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('will', 'PHYS234', '011', 61, 'Spring2012', 30, 3, '0000-00-00', '0000-00-00'),
('kapl', 'CS280', '004', 62, 'Summer2013', 30, 3, '2013-05-28', '2013-08-15'),
('ganga', 'MATH112', '004', 63, 'Summer2013', 30, 3, '2013-05-28', '2013-08-15'),
('cohen', 'CS100', '001', 64, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('kapl', 'CS100', '002', 65, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('bell', 'CS107', '002', 66, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('theo', 'CS490', '001', 67, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('elja', 'CS491', '001', 68, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('kapl', 'CS280', '004', 69, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('lay', 'CS332', '002', 70, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('sohn', 'CS288', '003', 71, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('marvin', 'CS341', '002', 72, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('george', 'CS356', '002', 73, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('ganga', 'MATH326', '002', 74, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('ganga', 'MATH222', '003', 75, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('ganga', 'MATH326', '001', 76, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('ganga', 'MATH112', '004', 77, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('rachel', 'HUM101', '002', 78, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('rachel', 'HUM102', '006', 79, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('will', 'PHYS121', '005', 80, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('will', 'PHYS111', '003', 81, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('will', 'PHYS203', '008', 82, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20'),
('will', 'PHYS234', '011', 83, 'Fall2013', 30, 3, '2013-09-05', '2013-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ucid` varchar(7) NOT NULL,
  `password` varchar(25) NOT NULL,
  `type` char(1) DEFAULT NULL,
  `name` tinytext,
  `email` varchar(25) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ucid`),
  UNIQUE KEY `ucid` (`ucid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ucid`, `password`, `type`, `name`, `email`, `phone`) VALUES
('thh4', 'password', 's', 'Vuong Huynh', 'thh4@njit.edu', '908 733 1256'),
('gt35', 'password', 's', 'Giaspur Tabangay', 'gt35@njit.edu', '908 376 2345'),
('vp78', 'password', 's', 'Vrajesh Patel', 'vp78@njit.edu', '201 564 2598'),
('theo', 'password', 't', 'Theo Nicholson', 'theodore.l.nicholson@njit', '1800 ask theo'),
('abc123', 'password', 't', 'John Smith', 'john@njit.edu', '911 911 9119'),
('sohn', 'password', 't', 'Andrew Sohn', 'sohn.njit.edu', '911 911 0000'),
('marvin', 'password', 't', 'Marvin Nakayama', 'marvin@njit.edu', '911 911 0002'),
('george', 'password', 't', 'George Blank', 'george@njit.edu', '911 911 0003'),
('kapl', 'password', 't', 'Jonathan Kapleau', 'kapleau@njit.edu', '911 911 0004'),
('lay', 'password', 't', 'Larry Lay', 'lay.njit.edu', '911 911 0005'),
('bell', 'password', 't', 'Michele Bell', 'bell@njit.edu', '911 911 0006'),
('cohen', 'password', 't', 'Barry Cohen', 'cohen@njit.edu', '911 911 0006'),
('elja', 'password', 't', 'Osama Eljabiri', 'elja@njit.edu', '911 911 0007'),
('ganga', 'password', 't', 'Rihana Ganga', 'ganga@njit.edu', '911 911 0008'),
('rachel', 'password', 't', 'Zainab Rachel', 'rachel@njit.edu', '911 911 0010'),
('will', 'password', 't', 'Brown Will', 'will@njit.edu', '911 911 0011');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
