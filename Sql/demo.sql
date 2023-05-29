-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 05:41 PM
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
  `aqict` int(10) NOT NULL DEFAULT 3,
  `principal` int(10) NOT NULL DEFAULT 3,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty1`
--

INSERT INTO `faculty1` (`application_id`, `name`, `id`, `department`, `LType`, `start`, `end`, `ndays`, `reason`, `hod`, `aqict`, `principal`, `file`) VALUES
(1, 'Sanjay Rohith A', '22pca115', 'Computer Science', 'CL', '2023-05-22', '2023-05-23', 2, 'nothing', 1, 3, 3, '[value-12]'),
(2, 'dpj', '01fcs101', 'Computer Science', 'ML', '2023-05-23', '2023-05-26', 4, 'fever', 1, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf'),
(3, 'john', '01fbt102', 'botany', 'OD', '2023-05-23', '2023-05-26', 3, 'free', 3, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf'),
(4, 'john', '01fbt102', 'botany', 'CL', '2023-05-22', '2023-05-25', 4, 'testing', 0, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf'),
(5, 'dpj', '01fcs101', 'Computer Science', 'OD', '2023-05-22', '2023-05-24', 2, 'testing', 1, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf'),
(6, 'Sanjay Rohith A', '01fcs101', 'Computer Science', 'OD', '2023-05-15', '2023-05-30', 4, 'testing', 1, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsration card.pdf'),
(7, 'ravi', '01fcs110', 'Computer Science', 'OD', '2023-05-23', '2023-05-24', 3, 'testing 2', 0, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsself.pdf');

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
('01sjc001', 'Arokiasamy Xavier', 'History', '2013-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `hod_login`
--

CREATE TABLE `hod_login` (
  `s_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod_login`
--

INSERT INTO `hod_login` (`s_id`, `password`) VALUES
('01fbt101', '123'),
('01fcs111', '123');

-- --------------------------------------------------------

--
-- Table structure for table `principal_login`
--

CREATE TABLE `principal_login` (
  `s_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal_login`
--

INSERT INTO `principal_login` (`s_id`, `password`) VALUES
('01sjc001', '123');

-- --------------------------------------------------------

--
-- Table structure for table `staff_login`
--

CREATE TABLE `staff_login` (
  `s_id` varchar(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `c_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_login`
--

INSERT INTO `staff_login` (`s_id`, `password`, `c_password`) VALUES
('01fbt102', '123', '123'),
('01fcs101', '123', '123'),
('01fcs110', '123', '123');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `hod_login`
--
ALTER TABLE `hod_login`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `staff_login`
--
ALTER TABLE `staff_login`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty1`
--
ALTER TABLE `faculty1`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
