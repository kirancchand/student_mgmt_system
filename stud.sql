-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2020 at 09:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stud`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_tbl`
--

CREATE TABLE `attendance_tbl` (
  `attendance_id` int(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `f_sub_id` int(100) NOT NULL,
  `f_user_id` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classtimetable_tbl`
--

CREATE TABLE `classtimetable_tbl` (
  `ct_id` int(11) NOT NULL,
  `f_course_id` int(11) DEFAULT NULL,
  `f_sem_id` int(11) DEFAULT NULL,
  `f_day_id` int(11) DEFAULT NULL,
  `f_period_id` int(11) DEFAULT NULL,
  `f_subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classtimetable_tbl`
--

INSERT INTO `classtimetable_tbl` (`ct_id`, `f_course_id`, `f_sem_id`, `f_day_id`, `f_period_id`, `f_subject_id`) VALUES
(9, 1236, 1, 1, 1, 6),
(10, 1236, 1, 2, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `course_subject_tbl`
--

CREATE TABLE `course_subject_tbl` (
  `cs_id` int(11) NOT NULL,
  `f_course_id` int(11) DEFAULT NULL,
  `f_subject_id` int(11) DEFAULT NULL,
  `f_sem_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_subject_tbl`
--

INSERT INTO `course_subject_tbl` (`cs_id`, `f_course_id`, `f_subject_id`, `f_sem_id`) VALUES
(1, 222, 3, NULL),
(2, 222, 7, NULL),
(3, 222, 6, NULL),
(4, 222, 7, NULL),
(5, 222, 4, NULL),
(6, 222, 7, NULL),
(7, 222, 7, NULL),
(8, 222, 8, NULL),
(9, 222, 6, NULL),
(10, 222, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `crse_id` int(11) NOT NULL,
  `crse_name` varchar(40) DEFAULT NULL,
  `f_dept_id` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`crse_id`, `crse_name`, `f_dept_id`) VALUES
(1234, 'maths', 0),
(1236, 'bba', 0);

-- --------------------------------------------------------

--
-- Table structure for table `day_tbl`
--

CREATE TABLE `day_tbl` (
  `day_id` int(11) NOT NULL,
  `day_name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day_tbl`
--

INSERT INTO `day_tbl` (`day_id`, `day_name`) VALUES
(1, 'mondays'),
(2, 'tuesday'),
(3, 'wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `dept_tbl`
--

CREATE TABLE `dept_tbl` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_tbl`
--

INSERT INTO `dept_tbl` (`dept_id`, `dept_name`) VALUES
(1, 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `mains_tbl`
--

CREATE TABLE `mains_tbl` (
  `mains_id` int(11) NOT NULL,
  `mains_name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mains_tbl`
--

INSERT INTO `mains_tbl` (`mains_id`, `mains_name`) VALUES
(1, NULL),
(2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `marklist_tbl`
--

CREATE TABLE `marklist_tbl` (
  `mark_id` int(10) NOT NULL,
  `external_mark` float NOT NULL,
  `internal_marks` int(11) NOT NULL,
  `f_user_id` int(10) NOT NULL,
  `f_subject_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `period_tbl`
--

CREATE TABLE `period_tbl` (
  `period_id` int(11) NOT NULL,
  `period_name` varchar(15) DEFAULT NULL,
  `period_time` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `period_tbl`
--

INSERT INTO `period_tbl` (`period_id`, `period_name`, `period_time`) VALUES
(1, 'period 1', 'dvsd'),
(2, 'period 2', 'wetwe'),
(3, 'period 3', 'cvxcvxcv');

-- --------------------------------------------------------

--
-- Table structure for table `regstn_tbl`
--

CREATE TABLE `regstn_tbl` (
  `user_id` int(11) NOT NULL,
  `emp_code` int(40) NOT NULL,
  `admssn_no` int(10) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `emailid` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  `f_utype_id` int(40) NOT NULL,
  `f_crse_id` int(40) NOT NULL,
  `f_sem_id` int(40) NOT NULL,
  `is_active` int(40) NOT NULL,
  `create_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regstn_tbl`
--

INSERT INTO `regstn_tbl` (`user_id`, `emp_code`, `admssn_no`, `first_name`, `last_name`, `emailid`, `password`, `f_utype_id`, `f_crse_id`, `f_sem_id`, `is_active`, `create_time`) VALUES
(1, 234, 2222, 'deva', 'nandan', 'devanandandevendu@gmail.com', '22222222', 1, 1, 1, 0, '0000-00-00'),
(2, 434, 4444, 'vijay', 'kumar', 'vijaykumar@gmail.com', '4444444', 1, 1, 1, 0, '0000-00-00'),
(3, 546, 4445, 'helo', 'helllo', 'hello@gmail.com', '8888', 1, 1, 1, 0, '0000-00-00'),
(4, 5656565, 432, 'deva', 'de', 'a@a', 'a', 1, 1, 1, 0, '0000-00-00'),
(7, 23423, 234234, 'sdsdf', 'sdfsdf', 'fsdfsd@fsdg', '23423', 2, 2, 2, 0, '0000-00-00'),
(8, 0, 0, 'sdfsdf', 'sfsdfs', 'fsdf@sfdfsdf', 'aaaaaa', 4, 1236, 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `semester_tbl`
--

CREATE TABLE `semester_tbl` (
  `sem_id` int(11) NOT NULL,
  `semester_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester_tbl`
--

INSERT INTO `semester_tbl` (`sem_id`, `semester_name`) VALUES
(1, 'semester 1');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(40) DEFAULT NULL,
  `f_crse_id` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_tbl`
--

INSERT INTO `subject_tbl` (`sub_id`, `sub_name`, `f_crse_id`) VALUES
(1, NULL, 0),
(2, 'maths', 0),
(3, 'maths', 0),
(4, 'maths', 0),
(5, NULL, 0),
(6, 'mathsss', 0),
(7, 'physics', 0),
(8, 'chem', 0),
(9, NULL, 0),
(10, NULL, 0),
(11, NULL, 0),
(12, NULL, 0),
(13, 'bio', 0),
(14, NULL, 0),
(15, NULL, 0),
(16, NULL, 0),
(17, NULL, 0),
(18, NULL, 0),
(19, 'gfdg', 0),
(20, 'gfdg', 0),
(21, 'gfdg', 0),
(22, 'gfdg', 0),
(23, 'gfdg', 0),
(24, 'dbgdfg', 0),
(25, 'dghdfghdfgdf', 0),
(26, 'dghdfghdfgdf', 0),
(27, 'dfgdgdfgdfg', 0),
(28, 'sdcsdjjjjjjj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype_tbl`
--

CREATE TABLE `usertype_tbl` (
  `utype_id` int(11) NOT NULL,
  `usertype` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype_tbl`
--

INSERT INTO `usertype_tbl` (`utype_id`, `usertype`) VALUES
(3, 'admin'),
(4, 'teachers'),
(11, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `classtimetable_tbl`
--
ALTER TABLE `classtimetable_tbl`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `course_subject_tbl`
--
ALTER TABLE `course_subject_tbl`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`crse_id`);

--
-- Indexes for table `day_tbl`
--
ALTER TABLE `day_tbl`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `dept_tbl`
--
ALTER TABLE `dept_tbl`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `mains_tbl`
--
ALTER TABLE `mains_tbl`
  ADD PRIMARY KEY (`mains_id`);

--
-- Indexes for table `marklist_tbl`
--
ALTER TABLE `marklist_tbl`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `period_tbl`
--
ALTER TABLE `period_tbl`
  ADD PRIMARY KEY (`period_id`);

--
-- Indexes for table `regstn_tbl`
--
ALTER TABLE `regstn_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `emp_code` (`emp_code`),
  ADD UNIQUE KEY `admssn_no` (`admssn_no`),
  ADD UNIQUE KEY `emailid` (`emailid`);

--
-- Indexes for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `usertype_tbl`
--
ALTER TABLE `usertype_tbl`
  ADD PRIMARY KEY (`utype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_tbl`
--
ALTER TABLE `attendance_tbl`
  MODIFY `attendance_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classtimetable_tbl`
--
ALTER TABLE `classtimetable_tbl`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_subject_tbl`
--
ALTER TABLE `course_subject_tbl`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `crse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1237;

--
-- AUTO_INCREMENT for table `day_tbl`
--
ALTER TABLE `day_tbl`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dept_tbl`
--
ALTER TABLE `dept_tbl`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marklist_tbl`
--
ALTER TABLE `marklist_tbl`
  MODIFY `mark_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `period_tbl`
--
ALTER TABLE `period_tbl`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regstn_tbl`
--
ALTER TABLE `regstn_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `semester_tbl`
--
ALTER TABLE `semester_tbl`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `usertype_tbl`
--
ALTER TABLE `usertype_tbl`
  MODIFY `utype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
