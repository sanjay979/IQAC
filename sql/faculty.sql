-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 07:24 PM
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
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Name` text NOT NULL,
  `id` varchar(8) NOT NULL,
  `LType` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `days` int(11) NOT NULL,
  `reason` text NOT NULL,
  `hod` tinyint(1) NOT NULL DEFAULT 3,
  `aqict` tinyint(1) NOT NULL DEFAULT 3,
  `principal` tinyint(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Name`, `id`, `LType`, `start`, `end`, `days`, `reason`, `hod`, `aqict`, `principal`) VALUES
('peter', '22pca115', 'cl', '2023-05-01', '2023-05-03', 3, 'fever', 1, 0, 3),
('sanjay', '22pc127', 'od', '2023-05-01', '2023-05-17', 17, 'faculty meet', 3, 3, 3),
('heshwar', '22pca121', 'cl', '2023-05-04', '2023-05-05', 2, 'fever', 3, 3, 3),
('peter', '22pca115', 'od', '2023-05-04', '2023-05-05', 2, 'fever', 1, 0, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
