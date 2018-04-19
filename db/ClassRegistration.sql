-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2018 at 04:32 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ClassRegistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `admin_password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `admin_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `admin_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_password`, `admin_name`, `admin_date`) VALUES
('jaaguirre', '08506d2487e78caf8d27ef22cfe5e3d436160d5f', 'Joel Aguirre', '2018-04-13 17:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` smallint(6) NOT NULL,
  `class_title` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `class_start` date NOT NULL,
  `class_descr` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `class_cost` decimal(6,2) NOT NULL,
  `class_instr` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_title`, `class_start`, `class_descr`, `class_cost`, `class_instr`) VALUES
(1, 'Agricultural Crops Production (NC I)', '2019-01-01', 'Agricultural Crops Production (NC I)', '0.00', 'Joel Aguirre'),
(2, 'Animal Health Care Management (NC III)', '2019-01-01', 'Animal Health Care Management (NC III)', '0.00', 'Armechelyn Derecho'),
(3, 'Aquaculture (NC II)', '2019-01-01', 'Aquaculture (NC II)', '0.00', 'Nixon Garais'),
(4, 'Animation (NC II)', '2019-01-01', 'Animation (NC II)', '0.00', 'Joel Tapiru');

-- --------------------------------------------------------

--
-- Table structure for table `facilitator`
--

CREATE TABLE `facilitator` (
  `faci_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `faci_password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `faci_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `faci_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `facilitator`
--

INSERT INTO `facilitator` (`faci_id`, `faci_password`, `faci_name`, `faci_date`) VALUES
('faci', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Joel Tapiru', '2018-04-15 17:29:20'),
('jaaguirre', '08506d2487e78caf8d27ef22cfe5e3d436160d5f', 'Joel Aguirre', '2018-04-19 14:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `student_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `dressmaking` smallint(2) NOT NULL,
  `cookery` smallint(2) NOT NULL,
  `handycraft` smallint(2) NOT NULL,
  `electrical` smallint(2) NOT NULL,
  `electronics` smallint(2) NOT NULL,
  `drafting` smallint(2) NOT NULL,
  `chs` smallint(2) NOT NULL,
  `beauty_care` smallint(2) NOT NULL,
  `welding` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`student_name`, `dressmaking`, `cookery`, `handycraft`, `electrical`, `electronics`, `drafting`, `chs`, `beauty_care`, `welding`) VALUES
('Joel Aguirre', 78, 78, 78, 78, 78, 78, 78, 78, 78);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` smallint(6) NOT NULL,
  `class_id` smallint(6) NOT NULL,
  `student_email` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `class_id`, `student_email`, `reg_date`) VALUES
(6, 1, 'jaaguirre@up.edu.ph', '2018-04-13 18:20:05'),
(7, 1, 'jaaguirre@up.edu.ph', '2018-04-13 18:32:59'),
(8, 0, 'jaaguirre@up.edu.ph', '2018-04-13 18:34:00'),
(9, 1, 'jaaguirre@up.edu.ph', '2018-04-13 18:34:17'),
(10, 1, 'jaaguirre@up.edu.ph', '2018-04-13 18:34:25'),
(11, 1, 'jaaguirre@up.edu.ph', '2018-04-13 18:34:51'),
(12, 4, 'joel.aguirre@gmail.com', '2018-04-17 15:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_email` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `student_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `student_phone` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `student_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_email`, `student_name`, `student_phone`, `student_date`) VALUES
('jaaguirre@mailinator.com', 'Joel Aguirre', '83239795', '2018-04-13 17:11:38'),
('jaaguirre@up.edu.ph', 'Joel Aguirre', '83239795', '2018-04-13 17:03:37'),
('joel.aguirre@gmail.com', 'Joel Aguirre', '83239795', '2018-04-17 15:28:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
