-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 05:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_data`
--

CREATE TABLE `application_data` (
  `application_id` int(11) NOT NULL,
  `Academic_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty1`
--

CREATE TABLE `faculty1` (
  `application_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `LType` varchar(30) NOT NULL,
  `shift` int(1) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `ndays` int(30) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `hod` int(10) NOT NULL DEFAULT 3,
  `H_feedback` varchar(100) NOT NULL,
  `aqict` int(10) NOT NULL DEFAULT 3,
  `IC_Feedback` varchar(100) NOT NULL,
  `principal` int(10) NOT NULL DEFAULT 3,
  `Pn_feedback` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL,
  `next_form` int(11) NOT NULL DEFAULT 3,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `a_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty1`
--

INSERT INTO `faculty1` (`application_id`, `name`, `id`, `department`, `LType`, `shift`, `start`, `end`, `ndays`, `reason`, `hod`, `H_feedback`, `aqict`, `IC_Feedback`, `principal`, `Pn_feedback`, `file`, `next_form`, `RegDate`, `a_year`) VALUES
(1, 'dpj', '01fcs101', 'computer science', 'CL', 1, '2023-06-21', '2023-06-22', 2, 'testing', 1, '', 1, '', 1, 'this is a demo comments\nand i can add lines of comments enjoy your cl mr.Dpj', '../assets/assetsBDU Convocation Application Form (1).pdf', 0, '2023-06-20 15:50:39', ''),
(2, 'dpj', '01fcs101', 'computer science', 'ML', 1, '2023-06-21', '2023-06-22', 2, 'fever', 1, '', 1, '', 3, 'this is a demo approval for ml of dpj', '../assets/assetsSheep.pdf', 1, '2023-06-20 16:00:54', ''),
(3, 'dpj', '01fcs101', 'computer science', 'ML', 1, '2023-06-22', '2023-06-23', 2, 'fever', 1, '', 3, 'this is the testing for sno updation and the row removal of preleave', 3, '', '../assets/assetsSheep.pdf', 1, '2023-06-21 02:57:40', ''),
(5, 'dpj', '01fcs101', 'computer science', 'CL', 1, '2023-06-22', '2023-06-23', 2, 'fever', 0, '', 3, 'chk', 3, '', '../assets/assetsSheep.pdf', 0, '2023-06-22 15:11:10', ''),
(6, 'dpj', '01fcs101', 'computer science', 'OD', 1, '2023-06-19', '2023-06-20', 2, 'no', 0, '', 3, 'chk2', 3, '', '../assets/assetsTECHX INVITATION.pdf', 1, '2023-06-22 15:26:51', ''),
(8, 'John', '01fbt102', 'botany', 'CL', 1, '2023-06-22', '2023-06-23', 2, 'fever', 0, '', 3, 'chk3', 3, '', '../assets/assetsSheep.pdf', 0, '2023-06-22 16:54:02', ''),
(9, 'John', '01fbt102', 'botany', 'CL', 1, '2023-06-29', '2023-06-30', 2, 'go to kodaikanal', 1, '', 1, '', 1, 'hey john you can go to kodaikanal', '../assets/assetsSheep.pdf', 0, '2023-06-29 15:34:22', ''),
(10, 'John', '01fbt102', 'botany', 'OD', 1, '2023-06-29', '2023-07-01', 3, 'testing', 0, '', 3, '', 3, '', '../assets/assetsBDU Convocation Application Form (1).pdf', 1, '2023-06-30 07:22:27', ''),
(11, 'dpj', '01fcs101', 'computer science', 'OD', 1, '2023-06-30', '2023-07-07', 8, 'testing', 3, '', 3, '', 3, '', '../assets/assetscash receipt.pdf', 1, '2023-06-30 10:12:59', ''),
(12, 'Charles', '01fcs111', 'computer science', 'CL', 1, '2023-06-30', '2023-07-04', 5, 'fgf', 0, '', 3, '', 3, '', '../assets/assetsVisit 01 Document.pdf', 0, '2023-06-30 10:21:09', ''),
(13, 'dpj', '01fcs101', 'computer science', 'OD', 1, '2023-07-03', '2023-07-05', 3, 'nothing', 0, '', 3, '', 3, '', '../assets/assetsSheep.pdf', 1, '2023-07-03 16:32:11', ''),
(14, 'John', '01fbt102', 'botany', 'OD', 1, '2023-07-10', '2023-07-11', 2, 'casual', 0, '', 3, '', 3, '', '../assets/assetsFcFIoCaJ-6342.pdf', 1, '2023-07-11 06:18:00', ''),
(15, 'John', '01fbt102', 'botany', 'ML', 1, '2023-07-10', '2023-07-19', 10, 'function', 0, '', 3, '', 3, '', '../assets/assetsUnit-2 _functions.pdf', 1, '2023-07-11 06:50:26', ''),
(16, 'John', '01fbt102', 'botany', 'OD', 1, '2023-07-11', '2023-07-20', 10, 'important works', 0, '', 3, '', 3, '', '../assets/assetsFcFIoCaJ-6342.pdf', 1, '2023-07-11 07:09:30', ''),
(19, 'Antony John Prabu', '02fcs202', 'Computer Science', 'OD', 2, '2023-07-12', '2023-07-27', 16, 'personal', 1, '', 1, '', 3, '', '../assets/assetsAdobe Scan Nov 27, 2020.pdf', 1, '2023-07-12 21:36:07', ''),
(20, 'dpj', '01fcs101', 'computer science', 'OD', 1, '2023-07-19', '2023-07-19', 1, 'boring', 0, '', 3, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 1, '2023-07-18 16:39:00', ''),
(23, 'dpj', '01fcs101', 'computer science', 'ML', 1, '2023-07-18', '2023-07-19', 2, 'johnson shift 1', 1, 'approved testing', 1, 'approval testing', 0, 'hey dpj kindly provide proper reason thank you', '../assets/assetsGetting started with OneDrive.pdf', 1, '2023-07-18 16:44:51', ''),
(28, 'Sanjay', '02fcs201', 'Computer Science', 'CL', 2, '2023-08-05', '2023-08-05', 1, 'testingg', 1, '', 1, 'leave has been approved!', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 0, '2023-07-27 16:54:50', ''),
(42, 'Antony John Prabu', '02fcs202', 'Computer Science', 'OD', 0, '2023-07-30', '2023-08-03', 5, 'going to canteen', 1, '', 1, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-07-30 13:52:33', ''),
(43, 'Antony John Prabu', '02fcs202', 'Computer Science', 'CL', 2, '2023-08-01', '2023-08-24', 24, 'boring', 1, '', 1, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 0, '2023-07-30 14:23:30', ''),
(49, 'John', '01fbt102', 'botany', 'OD', 1, '2023-08-26', '2023-08-26', 1, 'this is a demo application', 1, '', 1, '', 1, '', '../assets/Getting started with OneDrive.pdf', 1, '2023-08-26 08:07:06', ''),
(52, 'John', '01fbt102', 'botany', 'OD', 1, '2023-08-26', '2023-08-26', 1, 'boring', 1, '', 1, '', 1, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-08-26 16:34:54', ''),
(54, 'John', '01fbt102', 'botany', 'OD', 1, '2023-08-27', '2023-08-27', 1, 'Office work', 1, 'enjoy', 1, '', 1, '', '../assets/assetsAdobe Scan 01 Aug 2023 (1).pdf', 3, '2023-08-26 18:51:31', ''),
(55, 'John', '01fbt102', 'botany', 'OD', 1, '2023-08-27', '2023-08-27', 1, 'doom demo', 0, '', 3, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-08-26 19:10:01', ''),
(56, 'John', '01fbt102', 'botany', 'OD', 1, '2023-08-27', '2023-08-27', 1, 'the time is 1 am ', 1, '', 1, '', 1, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-08-26 19:32:20', ''),
(57, 'John', '01fbt102', 'botany', 'CL', 1, '2023-08-31', '2023-08-31', 1, 'boring', 1, 'approved', 1, 'approved', 1, '', '../assets/assetsGetting started with OneDrive.pdf', 1, '2023-08-31 08:45:32', ''),
(58, 'John', '01fbt102', 'botany', 'CL', 1, '2023-09-02', '2023-09-08', 7, 'boring', 1, '', 0, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-08-31 08:51:03', ''),
(59, 'John', '01fbt102', 'botany', 'OD', 1, '2023-08-31', '2023-09-01', 2, 'watch kgf', 3, '', 3, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-08-31 09:03:58', ''),
(60, 'ravindran', '01fcs110', 'computer science', 'CL', 1, '2023-08-31', '2023-08-31', 1, 'going to canteen', 3, '', 3, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-08-31 10:42:29', ''),
(61, 'senthilkumar', '01fbt101', 'botany', 'OD', 1, '2023-08-31', '2023-08-31', 1, 'Office work', 1, '', 1, 'approved successfully', 1, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-08-31 17:22:36', ''),
(62, 'senthilkumar', '01fbt101', 'botany', 'OD', 1, '2023-08-31', '2023-08-31', 1, 'this is a demo application', 1, '', 3, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-08-31 17:42:51', ''),
(63, 'Charles', '01fcs111', 'computer science', 'OD', 1, '2023-08-31', '2023-08-31', 1, 'going to canteen', 1, '', 3, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-08-31 17:48:38', ''),
(64, 'senthilkumar', '01fbt101', 'botany', 'ML', 1, '2023-08-31', '2023-08-31', 1, 'hod leave form check ', 1, '', 3, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-08-31 17:54:24', ''),
(65, 'John', '01fbt102', 'botany', 'OD', 1, '2023-09-01', '2023-09-02', 2, 'testing 1 2 3', 3, '', 3, '', 3, '', '../assets/assetsGetting started with OneDrive.pdf', 3, '2023-09-01 15:25:40', '');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
  `s_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `shift` int(1) NOT NULL,
  `position` varchar(30) NOT NULL,
  `a_position` varchar(20) NOT NULL DEFAULT 'Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`s_id`, `name`, `department`, `dob`, `shift`, `position`, `a_position`) VALUES
('01fbt101', 'senthilkumar', 'botany', '1965-05-08', 1, 'hod', 'Deactive'),
('01fbt101d', 'Assistant HOD', 'botany', '1965-02-14', 1, 'hod_dep', 'Active'),
('01fbt102', 'John', 'botany', '1967-05-10', 1, 'staff', 'Deactive'),
('01FCH17', 'Dr.S.DENIS AROCKIARAJ', 'Chemistry', '2023-09-27', 1, 'staff', 'Deactive'),
('01FCS08', 'Dr.L.AROCKIAM', 'Data science', '2023-09-04', 1, 'hod', 'Deactive'),
('01fcs101', 'dpj', 'computer science', '1965-02-14', 1, 'staff', 'Deactive'),
('01fcs110', 'ravindran', 'computer science', '1967-05-10', 1, 'staff', 'Deactive'),
('01fcs111', 'Charles', 'computer science', '1967-05-10', 1, 'hod', 'Deactive'),
('01fcs112', 'Assistant HOD', 'computer science', '1967-05-10', 1, 'hod_dep', 'Deative'),
('01FMA15', 'Dr.M.THIAGARAJAN', 'MATHEMATICS', '2023-09-19', 1, 'staff', 'Deactive'),
('01FPH16', 'Dr.I.JOHNSON', 'Physics', '2023-09-22', 1, 'staff', 'Deactive'),
('01FPH17', 'Mr.A.PATRICK PRABHU', 'Physics', '2023-09-15', 1, 'hod', 'Deactive'),
('01FPH18', 'Dr.B.Kanickairaj', 'ELECTRONICS', '2023-09-13', 1, 'staff', 'Deactive'),
('01fqc101', 'IQAC', 'chemistry', '1967-05-10', 1, 'iqac', 'Deactive'),
('01sjc001', 'Arockiyasamy xavier', 'All', '2023-07-11', 1, 'principal', 'Deactive'),
('02fcs201', 'Sanjay', 'Computer Science', '2006-07-01', 2, 'hod', 'Deactive'),
('02fcs202', 'Antony John Prabu', 'Computer Science', '1983-08-15', 2, 'staff', 'Deactive'),
('06FEN21', 'Dr.V.L.JAYAPAUL', 'English', '2023-09-02', 1, 'hod', 'Deactive'),
('06FEN24', 'Dr.V.FRANCIS', 'English', '2023-09-03', 1, 'staff', 'Deactive'),
('06FMA17', 'Dr.Y.DOMINIC', 'MATHEMATICS', '2023-09-20', 1, 'hod', 'Deactive'),
('07FCH02', 'Dr.S.ANTONY SAKTHI', 'Chemistry', '2023-09-29', 1, 'hod', 'Deactive'),
('07FCM01', 'Mr.D.MARIA ANTONY', 'commerce', '2023-09-30', 1, 'staff', 'Deactive'),
('07FEC01', 'Dr.M.SUVAKKIN', 'Economics', '2023-09-09', 1, 'staff', 'Deactive'),
('12FEC01', 'Dr.K.A.MICHAEL', 'Economics', '2023-09-10', 1, 'hod', 'Deactive'),
('18FCO01', 'Dr.M.JULIAS CEASAR', 'commerce', '2023-09-06', 1, 'hod', 'Deactive'),
('20CDS52', 'Dr.V.ARUL KUMAR', 'Data science', '2023-09-08', 1, 'staff', 'Deactive'),
('20CEL51', 'P.SUBBUTHAI', 'ELECTRONICS', '2023-09-16', 1, 'hod', 'Deactive');

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `application_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id` varchar(30) NOT NULL,
  `shift` int(11) NOT NULL,
  `department` varchar(30) NOT NULL,
  `assessment` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `hod` tinyint(1) NOT NULL DEFAULT 3,
  `H_feedback` varchar(100) NOT NULL,
  `iqac` tinyint(1) NOT NULL DEFAULT 3,
  `IC_Feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_details`
--

INSERT INTO `leave_details` (`application_id`, `name`, `id`, `shift`, `department`, `assessment`, `file`, `hod`, `H_feedback`, `iqac`, `IC_Feedback`) VALUES
(5, 'ravindran', '01fcs110', 1, 'computer science', 'zcxzcx', '../assets/postAssetsGetting started with OneDrive.pdf', 1, '', 1, ''),
(6, 'John', '01fbt102', 1, 'botany', 'test', '../assets/postAssetsGetting started with OneDrive.pdf', 1, '', 0, ''),
(12, 'John', '01fbt102', 1, 'botany', 'a', '../assets/postAssetsGetting started with OneDrive.pdf', 1, '', 0, ''),
(15, 'John', '01fbt102', 1, 'botany', 'testing over over', '../assets/postAssetsGetting started with OneDrive.pdf', 1, '', 1, 'this is a demo approval'),
(21, 'Antony John Prabu', '02fcs202', 2, 'Computer Science', 'testing over over', '../assets/postAssetsGetting started with OneDrive.pdf', 1, '', 1, 'approved'),
(22, 'Antony John Prabu', '02fcs202', 2, 'Computer Science', 'asdfghjkl', '../assets/postAssetsGetting started with OneDrive.pdf', 1, '', 0, 'better luck next time'),
(23, 'Antony John Prabu', '02fcs202', 2, 'Computer Science', 'this is a demo test', '../assets/postAssetsGetting started with OneDrive.pdf', 1, 'hod approval comt testing', 0, 'this is a demo rejection and cmt check -iqac'),
(24, 'dpj', '01fcs101', 1, 'computer science', 'this is a test description', '../assets/postAssetsGetting started with OneDrive.pdf', 1, 'approved successfully', 1, 'kindly upload the proper pdf'),
(49, 'John', '01fbt102', 1, 'botany', '', '../assets/Getting started with OneDrive.pdf', 1, 'APPROVED', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `s_id` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `shift` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`s_id`, `password`, `shift`) VALUES
('01fbt101', '123', 0),
('01fbt102', '123', 0),
('01FCH17', '123', 0),
('01FCS08', '123', 0),
('01fcs101', '123', 0),
('01fcs110', '123', 0),
('01fcs111', '123', 0),
('01fcs112', '123', 0),
('01FMA15', '123', 0),
('01FPH16', '123', 0),
('01FPH17', '123', 0),
('01FPH18', '123', 0),
('01fqc101', '123', 0),
('01sjc001', '123', 0),
('02fcs201', '123', 2),
('02fcs202', '123', 2),
('06FEN21', '123', 0),
('06FEN24', '123', 0),
('06FMA17', '123', 0),
('07FCH02', '123', 0),
('07FCM01', '123', 0),
('07FEC01', '123', 0),
('12FEC01', '123', 0),
('18FCO01', '123', 0),
('20CDS52', '123', 0),
('20CEL51', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `l_details`
--

CREATE TABLE `l_details` (
  `CL` int(11) DEFAULT NULL,
  `OD` int(11) DEFAULT NULL,
  `ML` int(11) DEFAULT NULL,
  `Academic_year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `l_details`
--

INSERT INTO `l_details` (`CL`, `OD`, `ML`, `Academic_year`) VALUES
(15, 15, 30, '2023-2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_data`
--
ALTER TABLE `application_data`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `faculty1`
--
ALTER TABLE `faculty1`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `faculty_details`
--
ALTER TABLE `faculty_details`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_data`
--
ALTER TABLE `application_data`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty1`
--
ALTER TABLE `faculty1`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
