-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 11:23 AM
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
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty1`
--

<<<<<<< Updated upstream:Sql/demo (1).sql
INSERT INTO `faculty1` (`application_id`, `name`, `id`, `department`, `LType`, `start`, `end`, `ndays`, `reason`, `hod`, `H_feedback`, `aqict`, `IC_Feedback`, `principal`, `Pn_feedback`, `file`) VALUES
(1, 'Sanjay Rohith A', '22pca115', '', 'CL', '2023-05-22', '2023-05-23', 2, 'nothing', 1, '', 1, 'sanjay nothing approved', 3, '', '[value-12]'),
(2, 'dpj', '01fcs101', 'Computer Science', 'ML', '2023-05-23', '2023-05-26', 4, 'fever', 1, '', 1, 'dpj fever', 3, '', 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf'),
(3, 'john', '01fbt102', 'botany', 'OD', '2023-05-23', '2023-05-26', 3, 'free', 1, 'hello john have a nice day', 1, 'john od free approved', 3, '', 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf'),
(4, 'john', '01fbt102', 'botany', 'CL', '2023-05-22', '2023-05-25', 4, 'testing', 1, 'sorry better luck next time', 0, 'john testing rejected', 3, '', 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf'),
(5, 'dpj', '01fcs101', 'Computer Science', 'OD', '2023-05-22', '2023-05-24', 2, 'testing', 1, '', 0, 'dpj testing rejected', 3, '', 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf'),
(6, 'Sanjay Rohith A', '01fcs101', 'Computer Science', 'OD', '2023-05-15', '2023-05-30', 4, 'testing', 1, '', 1, '', 3, '', 'C:xampphtdocsAQICTaqictStaffuploadsration card.pdf'),
(7, 'ravi', '01fcs110', 'Computer Science', 'OD', '2023-05-23', '2023-05-24', 3, 'testing 2', 1, '', 3, '', 3, '', 'C:xampphtdocsAQICTaqictStaffuploadsself.pdf');
=======
INSERT INTO `faculty1` (`application_id`, `name`, `id`, `department`, `LType`, `start`, `end`, `ndays`, `reason`, `hod`, `aqict`, `principal`, `file`) VALUES
(1, 'Sanjay Rohith A', '22pca115', '', 'CL', '2023-05-22', '2023-05-23', 2, 'nothing', 1, 3, 3, '[value-12]'),
(2, 'dpj', '01fcs101', 'Computer Science', 'ML', '2023-05-23', '2023-05-26', 4, 'fever', 1, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf'),
(3, 'john', '01fbt102', 'botany', 'OD', '2023-05-23', '2023-05-26', 3, 'free', 0, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf'),
(4, 'john', '01fbt102', 'botany', 'CL', '2023-05-22', '2023-05-25', 4, 'testing', 0, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf'),
(5, 'dpj', '01fcs101', 'Computer Science', 'OD', '2023-05-22', '2023-05-24', 2, 'testing', 1, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf'),
(6, 'Sanjay Rohith A', '01fcs101', 'Computer Science', 'OD', '2023-05-15', '2023-05-30', 4, 'testing', 1, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsration card.pdf'),
(7, 'ravi', '01fcs110', 'Computer Science', 'OD', '2023-05-23', '2023-05-24', 3, 'testing 2', 0, 3, 1, 'C:xampphtdocsAQICTaqictStaffuploadsself.pdf');
>>>>>>> Stashed changes:Sql/demo.sql

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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
