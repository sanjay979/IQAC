-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Jun 10, 2023 at 09:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
=======
-- Generation Time: Jun 11, 2023 at 09:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1
>>>>>>> 5ff64b7f5b55e51081bdb132365293beb692d861

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
  `IC_feedback` varchar(100) DEFAULT NULL,
  `principal` int(10) NOT NULL DEFAULT 3,
<<<<<<< HEAD
  `Pn_feedback` varchar(100) DEFAULT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
=======
  `file` varchar(255) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
>>>>>>> 5ff64b7f5b55e51081bdb132365293beb692d861

--
-- Dumping data for table `faculty1`
--

<<<<<<< HEAD
INSERT INTO `faculty1` (`application_id`, `name`, `id`, `department`, `LType`, `start`, `end`, `ndays`, `reason`, `hod`, `H_feedback`, `aqict`, `IC_feedback`, `principal`, `Pn_feedback`, `file`) VALUES
(1, 'Sanjay Rohith A', '22pca115', 'botany', 'CL', '2023-05-22', '2023-05-23', 2, 'nothing', 1, 'sanjay cl accept', 1, 'hii sanjay this is iqac cl has been declined ', 1, 'hiii sanjay this is principal this is rejected', '[value-12]'),
(2, 'dpj', '01fcs101', 'botany', 'ML', '2023-05-23', '2023-05-26', 4, 'fever', 1, 'no. 2 dpj ml', 1, NULL, 1, 'hello dpj', 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf'),
(3, 'john', '01fbt102', 'botany', 'OD', '2023-05-23', '2023-05-26', 3, 'free', 1, 'hii john ur reason is free l type - od rejected', 1, NULL, 1, NULL, 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf'),
(4, 'john', '01fbt102', 'botany', 'CL', '2023-05-22', '2023-05-25', 4, 'testing', 1, 'john cl approve', 1, NULL, 1, NULL, 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf'),
(5, 'dpj', '01fcs101', 'botany', 'OD', '2023-05-22', '2023-05-24', 2, 'testing', 1, 'venthu thanintha thu kadu', 1, NULL, 1, NULL, 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf'),
(6, 'Sanjay Rohith A', '01fcs101', 'botany', 'OD', '2023-05-15', '2023-05-30', 4, 'testing', 1, 'smart applied od app id:6', 1, NULL, 1, NULL, 'C:xampphtdocsAQICTaqictStaffuploadsration card.pdf'),
(7, 'ravi', '01fcs110', 'botany', 'OD', '2023-05-23', '2023-05-24', 3, 'testing 2', 1, 'hello ravi u requested od and ur app id : 7', 1, NULL, 1, NULL, 'C:xampphtdocsAQICTaqictStaffuploadsself.pdf'),
(8, 'Shankar', '22pca127', 'Physics', 'CL', '2023-06-08', '2023-06-09', 3, 'boring', 1, NULL, 1, 'iqac test for shankar', 1, 'Hii shankar your request has been approved by pricipal', '../assets/assetsGetting started with OneDrive.pdf'),
(11, 'popoye', '22pca127', 'botany', 'OD', '2023-06-02', '2023-06-05', 3, 'going to canteen', 1, 'hello popoye avoid takind leave too often', 1, 'approved by iqac', 0, 'sorry rejected ', '../assets/assetsGetting started with OneDrive.pdf'),
(17, 'John', '01fbt102', 'botany', 'OD', '2023-06-12', '2023-06-13', 2, 'Office work', 3, NULL, 3, NULL, 3, NULL, '../assets/assetsGetting started with OneDrive.pdf');
=======
INSERT INTO `faculty1` (`application_id`, `name`, `id`, `department`, `LType`, `start`, `end`, `ndays`, `reason`, `hod`, `aqict`, `principal`, `file`, `RegDate`) VALUES
(1, 'Sanjay Rohith A', '22pca115', '', 'CL', '2023-05-22', '2023-05-23', 2, 'nothing', 1, 3, 3, '[value-12]', '2023-06-07 00:29:07'),
(2, 'dpj', '01fcs101', 'Computer Science', 'ML', '2023-05-23', '2023-05-26', 4, 'fever', 1, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf', '2023-06-07 00:29:07'),
(3, 'john', '01fbt102', 'botany', 'OD', '2023-05-23', '2023-05-26', 3, 'free', 0, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsaadhar card.pdf', '2023-06-07 00:29:07'),
(4, 'john', '01fbt102', 'botany', 'CL', '2023-05-22', '2023-05-25', 4, 'testing', 0, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf', '2023-06-07 00:29:07'),
(5, 'dpj', '01fcs101', 'Computer Science', 'OD', '2023-05-22', '2023-05-24', 2, 'testing', 1, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadscommunite.pdf', '2023-06-07 00:29:07'),
(6, 'Sanjay Rohith A', '01fcs101', 'Computer Science', 'OD', '2023-05-15', '2023-05-30', 4, 'testing', 1, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsration card.pdf', '2023-06-07 00:29:07'),
(7, 'ravi', '01fcs110', 'Computer Science', 'OD', '2023-05-23', '2023-05-24', 3, 'testing 2', 0, 3, 3, 'C:xampphtdocsAQICTaqictStaffuploadsself.pdf', '2023-06-07 00:29:07'),
(8, 'peter', '22pca132', 'Chemistry', 'OD', '2023-06-06', '2023-06-08', 2, 'personal', 3, 3, 3, 'C:xampphtdocs\new projectaqictStaffuploadsEVS.pdf', '2023-06-07 00:29:07'),
(10, 'kitta', 'cs112', 'Computer Science', 'CL', '2023-06-08', '2023-06-09', 1, 'function', 1, 3, 3, 'C:xampphtdocs\new projectaqictStaffuploadspython acc.pdf', '2023-06-07 02:29:37'),
(11, 'ananth', 'cs115', 'Computer Science', 'ML', '2023-06-10', '2023-06-12', 2, 'health issue', 0, 3, 3, 'C:xampphtdocs\new projectaqictStaffuploadsAdobe Scan Nov 27, 2020.pdf', '2023-06-07 02:34:17'),
(12, 'ragul', 'cs120', 'Computer Science', 'CL', '2023-06-07', '2023-06-08', 1, 'casual', 1, 3, 3, 'C:xampphtdocs\new projectaqictStaffuploadsAdobe Scan Nov 27, 2020.pdf', '2023-06-07 05:19:18'),
(13, 'rohit', 'cs130', 'Computer Science', 'ML', '2023-06-09', '2023-06-10', 2, 'Health Issue', 1, 3, 3, 'C:xampphtdocs\new projectaqictStaffuploadsFcFIoCaJ-6342.pdf', '2023-06-07 18:02:14');
>>>>>>> 5ff64b7f5b55e51081bdb132365293beb692d861

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE `faculty_details` (
  `s_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`s_id`, `name`, `department`, `dob`) VALUES
('01fbt101', 'SenthilKumar', 'botany', '1965-05-08'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
<<<<<<< HEAD
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
=======
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
>>>>>>> 5ff64b7f5b55e51081bdb132365293beb692d861

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
