-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 06:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ijobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`sno` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `estd` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `about` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`sno`, `name`, `password`, `estd`, `website`, `location`, `about`) VALUES
(2, 'Google', 'iamgoogle', '2020', 'support@google.com', 'California', 'Foken search engine.'),
(6, 'Microsoft', 'iammicro', '1980', 'jobs@microsoft.com', 'California', 'We are Microsoft. We believe in perfection.');

-- --------------------------------------------------------

--
-- Table structure for table `sel`
--

CREATE TABLE IF NOT EXISTS `sel` (
`sno` int(100) NOT NULL,
  `job_id` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sel`
--

INSERT INTO `sel` (`sno`, `job_id`, `company_name`, `name`) VALUES
(2, '32', 'Google', 'Arish Rahil Shah'),
(3, '32', 'Google', 'Mohammed Ishaq'),
(4, '32', 'Google', 'shabbir'),
(5, '33', 'Microsoft', 'shabbir'),
(6, '33', 'Microsoft', 'shabbir'),
(7, '33', 'Microsoft', 'MOHAMMED ABDUL NASEER'),
(8, '33', 'Microsoft', 'Mohammed Ishaq'),
(9, '33', 'Microsoft', 'Arish Rahil Shah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`sno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `interests` varchar(100) DEFAULT NULL,
  `me` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `experience` varchar(10) DEFAULT NULL,
  `prev` varchar(100) DEFAULT NULL,
  `masters` varchar(100) DEFAULT NULL,
  `m_year` varchar(10) DEFAULT NULL,
  `bachelors` varchar(100) DEFAULT NULL,
  `b_year` varchar(10) DEFAULT NULL,
  `inter` varchar(100) DEFAULT NULL,
  `i_year` varchar(10) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `s_year` varchar(10) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `achievements` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `name`, `email`, `password`, `location`, `phone`, `age`, `gender`, `interests`, `me`, `designation`, `experience`, `prev`, `masters`, `m_year`, `bachelors`, `b_year`, `inter`, `i_year`, `school`, `s_year`, `skills`, `achievements`) VALUES
(1, 'Arish Rahil Shah', 'arish0246@gmail.com', 'iamarish', 'Hyderabad', '8120360150', '19', 'Male', 'Playing Football', 'Imma nice guy. very Nice.', 'Student', '0', 'nil', 'nil', '2020', 'BE', '2020', 'Holy Cross, Kapa', '2016', 'Krishna Public Schol', '2014', 'HTML, CSS, PHP, jQuery', 'nil'),
(2, 'Mohammed Ishaq', 'ishaq@gmail.com', 'iamishaq', 'Hyderabad', '100', '20', 'Male', 'Photoshop', 'I just like designing', 'Design Team Head, CSI', '1', 'Pantars of CSE-B', 'nil', '2020', 'BE', '2020', 'Narayana Junior College', '2016', 'St. McLaren', '2014', 'HTML, CSS, PHP, jQuery, PhotoShop', NULL),
(3, 'MOHAMMED ABDUL NASEER', 'abdulnaseer5656@gmail.com', 'iamnaseer', 'Hyderabad', '9676853460', '19', 'Male', 'Designing,developing and playing games.', '', 'Tester', '0', '', '', '2020', 'BE', '2020', 'Narayana Junior College', '2016', 'Royal Embassy High School', '2014', 'HTML, CSS, PHP, jQuery, Java, C, C++', 'Runner up in designing, won in carroms in district level'),
(4, 'shabbir', 'shabbbir@gmail.com', 'iamshabbir', 'Hyderabad', '102', '22', 'Male', 'Assignment writing', 'i am a homie', 'student', '0', 'gajwaiel', 'nil', '2020', '', '2020', '', '2020', '', '2020', 'HTML, CSS, PHP, jQuery', ''),
(6, 'bari', 'bari@bari.com', 'baribari', 'bari', '105', '105', 'Male', 'bari', 'bari', 'bari', '105', 'bari', 'bari', '2020', 'bari', '2020', 'bari', '2020', 'bari', '2020', 'HTML, CSS, PHP, jQuery', 'bari');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
`sno` int(100) NOT NULL,
  `post` varchar(100) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `no` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `deadline` varchar(100) DEFAULT NULL,
  `about` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`sno`, `post`, `skills`, `no`, `location`, `salary`, `deadline`, `about`) VALUES
(31, 'Junior Manager', 'PHP', '10', 'Hyderabad', '15', '2019-12-12', ''),
(32, 'Engineer', 'PHP', '20', 'Hyderabad', '2.5', '13-12-2018', 'The eligibility criteria is pretty strict.  '),
(33, 'Tester/Debugger for part time job', 'HTML, CSS', '10', 'Hyderabad', '10', '2018-12-12', 'Wanted a program debugger on part time basis for testing and debugging a project.'),
(34, 'Web Developer', 'PHP, jQuery', '5', 'Hyderabad', '30', '2018-12-12', 'Wanted a full stack web developer. Should be well versed in latest JavaScript frameworks. Interested');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `sel`
--
ALTER TABLE `sel`
 ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
 ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sel`
--
ALTER TABLE `sel`
MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
