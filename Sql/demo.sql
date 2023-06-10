-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 10:23 PM
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
  `H_feedback` varchar(100) DEFAULT NULL,
  `aqict` int(10) NOT NULL DEFAULT 3,
  `IC_Feedback` varchar(100) DEFAULT NULL,
  `principal` int(10) NOT NULL DEFAULT 3,
  `Pn_feedback` varchar(100) DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty1`
--

INSERT INTO `faculty1` (`application_id`, `name`, `id`, `department`, `LType`, `start`, `end`, `ndays`, `reason`, `hod`, `H_feedback`, `aqict`, `IC_Feedback`, `principal`, `Pn_feedback`, `file`, `RegDate`) VALUES
(1, 'Sanjay Rohith A', '22pca115', '', 'CL', '2023-05-22', '2023-05-23', 2, 'nothing', 1, NULL, 3, NULL, 3, NULL, '[value-12]', '2023-06-07 00:29:07'),
(2, 'dpj', '01fcs101', 'Computer Science', 'ML', '2023-05-23', '2023-05-26', 4, 'fever', 1, NULL, 3, NULL, 3, NULL, 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf', '2023-06-07 00:29:07'),
(3, 'john', '01fbt102', 'botany', 'OD', '2023-05-23', '2023-05-26', 3, 'free', 0, NULL, 3, NULL, 3, NULL, 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf', '2023-06-07 00:29:07'),
(4, 'john', '01fbt102', 'botany', 'CL', '2023-05-22', '2023-05-25', 4, 'testing', 0, NULL, 3, NULL, 3, NULL, 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf', '2023-06-07 00:29:07'),
(5, 'dpj', '01fcs101', 'Computer Science', 'OD', '2023-05-22', '2023-05-24', 2, 'testing', 1, NULL, 3, NULL, 3, NULL, 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf', '2023-06-07 00:29:07'),
(6, 'Sanjay Rohith A', '01fcs101', 'Computer Science', 'OD', '2023-05-15', '2023-05-30', 4, 'testing', 1, NULL, 3, NULL, 3, NULL, 'C:xampphtdocsAQICTaqictStaffuploadsration card.pdf', '2023-06-07 00:29:07'),
(7, 'ravi', '01fcs110', 'Computer Science', 'OD', '2023-05-23', '2023-05-24', 3, 'testing 2', 0, NULL, 3, NULL, 3, NULL, 'C:xampphtdocsAQICTaqictStaffuploadsself.pdf', '2023-06-07 00:29:07'),
(8, 'peter', '22pca132', 'Chemistry', 'OD', '2023-06-06', '2023-06-08', 2, 'personal', 0, NULL, 3, NULL, 3, NULL, 'C:xampphtdocs\new projectaqictStaffuploadsEVS.pdf', '2023-06-07 00:29:07'),
(10, 'kitta', 'cs112', 'Computer Science', 'CL', '2023-06-08', '2023-06-09', 1, 'function', 1, NULL, 3, NULL, 3, NULL, 'C:xampphtdocs\new projectaqictStaffuploadspython acc.pdf', '2023-06-07 02:29:37'),
(11, 'ananth', 'cs115', 'Computer Science', 'ML', '2023-06-10', '2023-06-12', 2, 'health issue', 0, NULL, 3, NULL, 3, NULL, 'C:xampphtdocs\new projectaqictStaffuploadsAdobe Scan Nov 27, 2020.pdf', '2023-06-07 02:34:17'),
(12, 'ragul', 'cs120', 'Computer Science', 'CL', '2023-06-07', '2023-06-08', 1, 'casual', 1, NULL, 3, NULL, 3, NULL, 'C:xampphtdocs\new projectaqictStaffuploadsAdobe Scan Nov 27, 2020.pdf', '2023-06-07 05:19:18'),
(13, 'rohit', 'cs130', 'Computer Science', 'ML', '2023-06-09', '2023-06-10', 2, 'Health Issue', 1, NULL, 3, NULL, 3, NULL, 'C:xampphtdocs\new projectaqictStaffuploadsFcFIoCaJ-6342.pdf', '2023-06-07 18:02:14'),
(14, 'IQAC', '01fqc101', 'chemistry', '', '2023-06-12', '2023-06-14', 3, 'this is a demo application', 0, NULL, 3, NULL, 3, NULL, '../assets/assetsGetting started with OneDrive.pdf', '2023-06-10 20:05:30'),
(15, 'IQAC', '01fqc101', 'chemistry', '', '2023-06-12', '2023-06-14', 3, 'this is a demo application', 0, NULL, 3, NULL, 3, NULL, '../assets/assetsGetting started with OneDrive.pdf', '2023-06-10 20:06:37'),
(16, 'IQAC', '01fqc101', 'chemistry', '', '2023-06-11', '2023-06-11', 1, 'Office work', 1, 'office work demo', 1, 'demo approval iqac', 1, 'demo approval', '../assets/assetsGetting started with OneDrive.pdf', '2023-06-10 20:07:18'),
(17, 'John', '01fbt102', 'botany', '', '2023-06-01', '2023-06-22', 22, 'this is a demo application', 3, NULL, 3, NULL, 3, NULL, '../assets/assetsGetting started with OneDrive.pdf', '2023-06-10 20:15:13'),
(18, 'John', '01fbt102', 'botany', '', '2023-06-14', '2023-06-27', 14, 'boooring', 3, NULL, 3, NULL, 3, NULL, '../assets/assetsGetting started with OneDrive.pdf', '2023-06-10 20:16:31'),
(19, 'John', '01fbt102', 'botany', '', '2023-06-11', '2023-06-11', 1, 'this is a demo application', 3, NULL, 3, NULL, 3, NULL, '../assets/assetsGetting started with OneDrive.pdf', '2023-06-10 20:21:42');

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
('01fqc101', 'IQAC', 'chemistry', '1967-05-10'),
('asdfgh', 'kitta', 'Physics', '2023-06-25');

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
-- Table structure for table `iqac_login`
--

CREATE TABLE `iqac_login` (
  `s_id` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iqac_login`
--

INSERT INTO `iqac_login` (`s_id`, `password`) VALUES
('01fqc101', '123');

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
('01fcs110', '123', '123'),
('asdfgh', 'sss', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `DepartmentCode` varchar(50) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `DepartmentCode`, `CreationDate`) VALUES
(1, 'Computer Science', 'CS', 'CS160', '2020-11-01 07:16:25'),
(2, 'Information Technology', 'IT', 'IT807', '2020-11-01 07:19:37'),
(3, 'Chemistry', 'CH', 'CH640', '2020-12-02 21:28:56'),
(4, 'Physics', 'PH', 'PH9696', '2021-03-03 08:27:52'),
(5, 'Commerce', 'CO', 'CO369', '2021-03-03 10:53:52'),
(6, 'Economics', 'EC', 'EC123', '2021-03-03 10:54:27'),
(7, 'English', 'ENG', 'ENG469', '2021-03-03 10:55:24'),
(8, 'Tamil', 'TAM', 'TAM666', '2021-03-03 16:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(150) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` date NOT NULL,
  `Department` varchar(150) NOT NULL,
  `Qualification` varchar(150) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(150) NOT NULL,
  `Country` varchar(150) NOT NULL,
  `Phonenumber` int(10) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `EmpId`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Qualification`, `Address`, `City`, `Country`, `Phonenumber`, `Status`, `RegDate`) VALUES
(1, '22pca132', 'peter', 'thamiyan', 'peter@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'MALE', '2002-07-01', 'Computer Science', 'MCA', '2-20 east street, Alambakkam', 'Trichy', 'India', 2147483647, 1, '2023-05-29 23:50:16'),
(5, '22pca113', 'nnnn', 'gandhi', 'ragul@gmail.com', '698d51a19d8a121ce581499d7b701668', 'MALE', '0000-00-00', 'Commerce', 'dfg', '2-20 east street, pullambadi', 'trichy', 'India', 2147483647, 1, '2023-05-31 10:05:32'),
(6, '22120cs', 'anantha', 'krishnan', 'ananth@gmail.com', 'd0970714757783e6cf17b26fb8e2298f', 'MALE', '1996-09-16', 'English', 'MA English', '1-19 east street, alambakkam', 'trichy', 'india', 2147483647, 1, '2023-05-31 16:23:41'),
(7, '123', 'ragul', 'gandhi', 'ragul@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'MALE', '2023-06-01', 'Information Technology', 'MBA', 'alambakkam', 'trichy', 'India', 2147483647, 1, '2023-06-01 08:46:46'),
(8, '123', 'ragul', 'gandhi', 'ragul@gmail.com', '202cb962ac59075b964b07152d234b70', 'MALE', '2023-06-01', 'Physics', 'asdfgh', 'alambakkam', 'trichy', 'India', 2147483647, 1, '2023-06-01 21:04:53'),
(9, '123', 'ragul', 'gandhi', 'ragul@gmail.com', '202cb962ac59075b964b07152d234b70', 'MALE', '2023-06-01', 'Physics', 'asdfgh', 'alambakkam', 'trichy', 'India', 2147483647, 1, '2023-06-01 21:05:45'),
(10, '123', 'raguly', 'gandhi', 'ragul@gmail.com', '9f6e6800cfae7749eb6c486619254b9c', 'MALE', '2023-06-01', 'English', 'asdfgh', 'alambakkam', 'trichy', 'India', 2147483647, 1, '2023-06-01 21:06:25');

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
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty1`
--
ALTER TABLE `faculty1`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
