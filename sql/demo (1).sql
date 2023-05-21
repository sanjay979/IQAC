-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 09:31 AM
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

INSERT INTO `faculty1` (`name`, `id`, `department`, `LType`, `start`, `end`, `ndays`, `reason`, `hod`, `aqict`, `principal`, `file`) VALUES
('Sanjay Rohith A', '22pca115', '', 'CL', '2023-05-22', '2023-05-23', 2, 'nothing', 3, 3, 3, '[value-12]');

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
('01fcs101', 'dpj', 'computer science', '1965-02-14'),
('01fcs110', 'ravindran', 'computer science', '1967-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `hod_login`
--

CREATE TABLE `hod_login` (
  `s_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod_login`
--

INSERT INTO `hod_login` (`s_id`, `password`, `department`) VALUES
('01fcs111', '123', 'computer science');

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
('01fcs101', '123', '123'),
('01fcs110', '123', '123');

--
-- Indexes for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
