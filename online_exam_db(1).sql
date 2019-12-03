-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2019 at 05:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `C_ID` varchar(6) NOT NULL,
  `C_NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`C_ID`, `C_NAME`) VALUES
('C1001', 'CORE JAVA'),
('C1002', 'ADVANCE JAVA'),
('C1003', 'ASP.NET'),
('C1004', 'PHP AND MYSQL'),
('C1005', 'TALLY'),
('C1006', 'MULTIMEDIA');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `EXAM_CODE` varchar(6) NOT NULL,
  `EXAM_DATE` date DEFAULT NULL,
  `EXAM_SLOT` varchar(15) DEFAULT NULL,
  `M_NO` varchar(10) DEFAULT NULL,
  `ST_ID` varchar(6) NOT NULL,
  `C_ID` varchar(6) NOT NULL,
  `P_CODE` varchar(6) DEFAULT NULL,
  `ACTIVATION_NO` int(11) NOT NULL,
  `EXAM_STATUS` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`EXAM_CODE`, `EXAM_DATE`, `EXAM_SLOT`, `M_NO`, `ST_ID`, `C_ID`, `P_CODE`, `ACTIVATION_NO`, `EXAM_STATUS`) VALUES
('E1000', '2019-09-19', '11-12', 'M1', 'ST1001', 'C1001', 'P1002', 29293, 'Appeared'),
('E1001', '2019-09-20', '11-12', 'M3', 'ST1002', 'C1001', 'P1002', 17241, 'Not Appeared'),
('E1002', '2019-09-19', '11-12', 'M3', 'ST1004', 'C1001', 'P1001', 74615, 'Not Appeared'),
('E1003', '2019-09-23', '11-12', 'M1', 'ST1001', 'C1001', 'P1001', 34638, 'Not Appeared');

-- --------------------------------------------------------

--
-- Table structure for table `exam_slot`
--

CREATE TABLE `exam_slot` (
  `sl_no` int(20) NOT NULL,
  `EXAM_SLOT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_slot`
--

INSERT INTO `exam_slot` (`sl_no`, `EXAM_SLOT`) VALUES
(2, '11-12'),
(3, '12-1'),
(4, '1-2'),
(5, '2-3');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `M_NO` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`M_NO`) VALUES
('M1'),
('M2'),
('M3'),
('M4');

-- --------------------------------------------------------

--
-- Table structure for table `machine_allot`
--

CREATE TABLE `machine_allot` (
  `SerialNo` int(20) NOT NULL,
  `EXAM_DATE` date NOT NULL,
  `EXAM_SLOT` varchar(20) NOT NULL,
  `MAC_NO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine_allot`
--

INSERT INTO `machine_allot` (`SerialNo`, `EXAM_DATE`, `EXAM_SLOT`, `MAC_NO`) VALUES
(4, '2019-09-19', '11-12', 'M1'),
(5, '2019-09-16', '12-1', 'M1'),
(6, '2019-09-18', '11-12', 'M1'),
(11, '2019-09-20', '11-12', 'M2'),
(12, '2019-09-20', '11-12', 'M3'),
(13, '2019-09-20', '11-12', 'M1'),
(14, '2019-09-21', '11-12', 'M1');

-- --------------------------------------------------------

--
-- Table structure for table `mac_verification`
--

CREATE TABLE `mac_verification` (
  `EXAM_CODE` varchar(10) NOT NULL,
  `ST_ID` varchar(10) NOT NULL,
  `MAC_ADD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mac_verification`
--

INSERT INTO `mac_verification` (`EXAM_CODE`, `ST_ID`, `MAC_ADD`) VALUES
('E1003', 'ST1001', '331452');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `P_CODE` varchar(6) NOT NULL,
  `P_NAME` varchar(20) NOT NULL,
  `C_ID` varchar(6) NOT NULL,
  `TIME_LIMIT` int(3) NOT NULL,
  `NO_OF_QUES` int(11) NOT NULL,
  `NEG_MARKS_COUNT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`P_CODE`, `P_NAME`, `C_ID`, `TIME_LIMIT`, `NO_OF_QUES`, `NEG_MARKS_COUNT`) VALUES
('P1001', 'Core Java Set1', 'C1001', 2, 2, 4),
('P1002', 'Core Java Set2', 'C1001', 2, 2, 1),
('P1003', 'PHP SET2', 'C1004', 4, 4, 1),
('P1004', 'PHP SET1', 'C1004', 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `USER_ID` varchar(8) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `USER_TYPE` varchar(10) NOT NULL,
  `STATUS` int(11) NOT NULL,
  `HINTS_QUES` varchar(50) NOT NULL,
  `HINTS_ANS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`USER_ID`, `PASSWORD`, `USER_TYPE`, `STATUS`, `HINTS_QUES`, `HINTS_ANS`) VALUES
('ST1001', 'pass@1111', 'STUDENT', 1, 'What is your nick name?', 'pass@1111'),
('ST1002', 'pass@1111', 'STUDENT', 1, 'What is your nick name?', 'pass@1111'),
('ST1004', 'pass@1111', 'STUDENT', 1, 'What is your nick name?', 'pass@1111'),
('U1000', 'pass@1111', 'ADMIN', 1, 'What is your nick name?', 'pass@1111');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `sl_no` int(100) NOT NULL,
  `Q_NO` int(11) NOT NULL,
  `QUESTION` varchar(100) NOT NULL,
  `ANS1` varchar(70) NOT NULL,
  `ANS2` varchar(70) NOT NULL,
  `ANS3` varchar(70) NOT NULL,
  `ANS4` varchar(70) NOT NULL,
  `C_ANS` int(11) NOT NULL,
  `P_CODE` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`sl_no`, `Q_NO`, `QUESTION`, `ANS1`, `ANS2`, `ANS3`, `ANS4`, `C_ANS`, `P_CODE`) VALUES
(1, 1, 'JVM Full form?', 'Java Virtual Machine', 'Jama Virtual Machine', 'All of the above', 'None', 1, 'P1001'),
(2, 2, 'JRE Full form?', 'Java Runtime Environment', 'Jata Running Entity', 'All of the above', ' None', 1, 'P1001'),
(3, 1, 'GC Full form?', 'Green Collector', 'Garbage Collection', 'Garbage Collector', 'None ', 3, 'P1001'),
(4, 2, 'API Full form', 'APP Interface', 'Application Programming Interface', 'Apple Prog Interface', 'None', 2, 'P1001');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `EXAM_CODE` varchar(6) NOT NULL,
  `TOT_QUESTION` int(11) DEFAULT NULL,
  `NOF_ATTEMPTS` int(11) DEFAULT NULL,
  `WRONG_ANS` int(11) DEFAULT NULL,
  `CORRECT_ANS` int(11) DEFAULT NULL,
  `N_MARKS` int(11) DEFAULT NULL,
  `MARKS` int(11) DEFAULT NULL,
  `PERCENTAGE` int(11) DEFAULT NULL,
  `GRADE` varchar(4) DEFAULT NULL,
  `STATUS` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`EXAM_CODE`, `TOT_QUESTION`, `NOF_ATTEMPTS`, `WRONG_ANS`, `CORRECT_ANS`, `N_MARKS`, `MARKS`, `PERCENTAGE`, `GRADE`, `STATUS`) VALUES
('E1000', 2, 2, 1, 1, 1, 0, 0, 'F', 'FAIL');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `CITY` varchar(20) NOT NULL,
  `STATE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`CITY`, `STATE`) VALUES
('KOLKATA', 'WEST BENGAL'),
('ASANSOL', 'WEST BENGAL'),
('X', 'UP'),
('Y', 'UP');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ST_ID` varchar(8) NOT NULL,
  `ST_NAME` varchar(20) NOT NULL,
  `EMAIL_ID` varchar(25) NOT NULL,
  `CONT_NO` varchar(10) NOT NULL,
  `C_ID` varchar(6) NOT NULL,
  `STATUS` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ST_ID`, `ST_NAME`, `EMAIL_ID`, `CONT_NO`, `C_ID`, `STATUS`) VALUES
('ST1001', 'Sayan Sadhukhan', 'sayan@gmail.com', '9874123456', 'C1001', 'REGULAR'),
('ST1002', 'Jhilik Mukherjee', 'debanjan@gmail.com', '9874123457', 'C1002', 'REGULAR'),
('ST1003', 'Sayani Das', 'swgata@gmail.com', '9874123458', 'C1003', 'REGULAR'),
('ST1004', 'Ankita Chowdhury', 'ankita@gmail.com', '9874123459', 'C1001', 'REGULAR'),
('ST1005', 'Snehaprana Karmakar', 'skar@gmail.com', '9874123450', 'C1005', 'REGULAR'),
('U1000', 'Administrator', 'skar@gmail.com', '9874123450', '', 'COMPLETED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`EXAM_CODE`);

--
-- Indexes for table `exam_slot`
--
ALTER TABLE `exam_slot`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`M_NO`);

--
-- Indexes for table `machine_allot`
--
ALTER TABLE `machine_allot`
  ADD PRIMARY KEY (`SerialNo`);

--
-- Indexes for table `mac_verification`
--
ALTER TABLE `mac_verification`
  ADD PRIMARY KEY (`EXAM_CODE`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`P_CODE`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`EXAM_CODE`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ST_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `machine_allot`
--
ALTER TABLE `machine_allot`
  MODIFY `SerialNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `sl_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
