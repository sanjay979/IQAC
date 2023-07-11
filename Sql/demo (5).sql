-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 11:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `faculty1`
--

CREATE TABLE `faculty1` (
  `application_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `id` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `LType` varchar(30) NOT NULL,
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
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty1`
--

INSERT INTO `faculty1` (`application_id`, `name`, `id`, `department`, `LType`, `start`, `end`, `ndays`, `reason`, `hod`, `H_feedback`, `aqict`, `IC_Feedback`, `principal`, `Pn_feedback`, `file`, `next_form`, `RegDate`) VALUES
(1, 'dpj', '01fcs101', 'computer science', 'CL', '2023-06-21', '2023-06-22', 2, 'testing', 1, '', 1, '', 1, '', '../assets/assetsBDU Convocation Application Form (1).pdf', 3, '2023-06-20 15:50:39'),
(2, 'dpj', '01fcs101', 'computer science', 'ML', '2023-06-21', '2023-06-22', 2, 'fever', 1, '', 1, '', 1, '', '../assets/assetsSheep.pdf', 3, '2023-06-20 16:00:54'),
(3, 'dpj', '01fcs101', 'computer science', 'ML', '2023-06-22', '2023-06-23', 2, 'fever', 1, '', 1, '', 1, '', '../assets/assetsSheep.pdf', 3, '2023-06-21 02:57:40'),
(5, 'dpj', '01fcs101', 'computer science', 'CL', '2023-06-22', '2023-06-23', 2, 'fever', 1, '', 1, '', 1, '', '../assets/assetsSheep.pdf', 3, '2023-06-22 15:11:10'),
(6, 'dpj', '01fcs101', 'computer science', 'OD', '2023-06-19', '2023-06-20', 2, 'no', 1, '', 1, '', 1, '', '../assets/assetsTECHX INVITATION.pdf', 3, '2023-06-22 15:26:51'),
(8, 'John', '01fbt102', 'botany', 'CL', '2023-06-22', '2023-06-23', 2, 'fever', 1, '', 1, '', 1, '', '../assets/assetsSheep.pdf', 3, '2023-06-22 16:54:02'),
(9, 'John', '01fbt102', 'botany', 'CL', '2023-06-29', '2023-06-30', 2, 'go to kodaikanal', 1, '', 1, '', 1, '', '../assets/assetsSheep.pdf', 1, '2023-06-29 15:34:22'),
(10, 'John', '01fbt102', 'botany', 'OD', '2023-06-29', '2023-07-01', 3, 'testing', 3, '', 3, '', 3, '', '../assets/assetsBDU Convocation Application Form (1).pdf', 3, '2023-06-30 07:22:27'),
(11, 'dpj', '01fcs101', 'computer science', 'OD', '2023-06-30', '2023-07-07', 8, 'testing', 1, '', 1, '', 1, '', '../assets/assetscash receipt.pdf', 1, '2023-06-30 10:12:59'),
(12, 'Charles', '01fcs111', 'computer science', 'CL', '2023-06-30', '2023-07-04', 5, 'fgf', 1, '', 3, '', 3, '', '../assets/assetsVisit 01 Document.pdf', 3, '2023-06-30 10:21:09'),
(13, 'dpj', '01fcs101', 'computer science', 'OD', '2023-07-03', '2023-07-05', 3, 'nothing', 1, '', 1, '', 1, '', '../assets/assetsSheep.pdf', 1, '2023-07-03 16:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
  `s_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`s_id`, `name`, `department`, `dob`) VALUES
('01fbt101', 'senthilkumar', 'botany', '1965-05-08'),
('01fbt102', 'John', 'botany', '1967-05-10'),
('01fcs101', 'dpj', 'computer science', '1965-02-14'),
('01fcs110', 'ravindran', 'computer science', '1967-05-10'),
('01fcs111', 'Charles', 'computer science', '1967-05-10'),
('01fqc101', 'IQAC', 'chemistry', '1967-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `s_id` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `position` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`s_id`, `password`, `position`) VALUES
('01fbt101', '123', 'hod'),
('01fbt102', '123', 'staff'),
('01fcs101', '123', 'staff'),
('01fcs110', '123', 'staff'),
('01fcs111', '123', 'hod'),
('01fqc101', '123', 'iqac'),
('01sjc001', '123', 'principal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty1`
--
ALTER TABLE `faculty1`
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
-- AUTO_INCREMENT for table `faculty1`
--
ALTER TABLE `faculty1`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;