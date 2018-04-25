-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2018 at 08:46 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5406048_classregistration`
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
('admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin', '2018-04-19 16:19:39'),
('jaaguirre', '08506d2487e78caf8d27ef22cfe5e3d436160d5f', 'Joel Aguirre', '2018-04-13 17:27:15'),
('Shau', 'e38745d0cdc394a9beb903b15f41ce974ac33144', 'Armechelyn Derecho', '2018-04-19 22:36:43');

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
(1, 'Shielded and Metal Works', '2018-06-04', 'Shielded and Metal Works', 0.00, 'Joel Aguirre'),
(2, 'Bread and Pastry Production', '2018-06-04', 'Bread and Pastry Production', 0.00, 'Armechelyn Derecho'),
(3, 'Computer System Servicing', '2019-01-01', 'Computer System Servicing', 0.00, 'Nixon Garais'),
(4, 'Consumer\'s Electronics', '2018-06-04', 'Consumer\'s Electronics', 0.00, 'Joel Tapiru');

-- --------------------------------------------------------

--
-- Table structure for table `facilitator`
--

CREATE TABLE `facilitator` (
  `id` int(5) NOT NULL,
  `faci_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `faci_password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `faci_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `faci_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `facilitator`
--

INSERT INTO `facilitator` (`id`, `faci_id`, `faci_password`, `faci_name`, `faci_date`) VALUES
(1, 'faci', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Joel Tapiru', '2018-04-15 17:29:20'),
(2, 'jaaguirre', '08506d2487e78caf8d27ef22cfe5e3d436160d5f', 'Joel Aguirre', '2018-04-19 14:22:08'),
(3, 'Shau', 'e38745d0cdc394a9beb903b15f41ce974ac33144', 'Armechelyn', '2018-04-24 06:48:27'),
(4, 'jtapiru', '251b7fa54f80e5342167d02a018a1c8d5bf49e0d', 'Adam Tapiru', '2018-04-24 09:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(5) NOT NULL,
  `student_name` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `shielded_metal_works` smallint(2) NOT NULL,
  `computer_system_servicing` smallint(2) NOT NULL,
  `bread_pastry` smallint(2) NOT NULL,
  `electronics` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_name`, `shielded_metal_works`, `computer_system_servicing`, `bread_pastry`, `electronics`) VALUES
(10, 'Jaena Kate Raina', 8, 12, 21, 2),
(11, 'VeyAnne Monteverde', 6, 8, 25, 24),
(12, 'VeyAnne Monteverde', 6, 8, 25, 24),
(13, 'Angelica Devera', 11, 15, 23, 23),
(14, 'Justine Fer Amurao', 15, 19, 22, 23),
(15, 'John Jhonel Nerval', 15, 23, 25, 25),
(16, 'Daniell Karl Ustare', 19, 24, 25, 22),
(17, 'Lander Rey', 10, 6, 5, 15),
(18, 'Raiza Coleen Querrel', 15, 17, 22, 21),
(19, 'Van Bryan Ceniza', 16, 18, 5, 14),
(20, 'John Lloyd Ceniza', 15, 19, 10, 20),
(21, 'Kayla Aquino', 9, 13, 12, 17),
(22, 'Carlos Eduardo Aman', 11, 13, 17, 25);

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
(12, 4, 'joel.aguirre@gmail.com', '2018-04-17 15:28:43'),
(13, 1, 'jaaguirre@mailinator.com', '2018-04-19 16:26:09'),
(14, 1, 'jaaguirre@mailinator.com', '2018-04-19 16:27:18'),
(15, 1, 'jaaguirre@mailinator.com', '2018-04-19 16:27:44'),
(16, 1, 'jaaguirre@mailinator.com', '2018-04-19 16:28:52'),
(17, 4, 'willowfairy_8@yahoo.com', '2018-04-22 18:17:18'),
(18, 1, 'joel.aguirre@gmail.com', '2018-04-23 01:53:49'),
(19, 1, 'joel.aguirre@gmail.com', '2018-04-23 01:54:14'),
(20, 2, 'mikalaizareyganda@gmail.com', '2018-04-24 06:44:20'),
(21, 2, 'jmtapiru.up.edu.ph@gmail.com', '2018-04-24 10:10:49');

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
('jmtapiru.up.edu.ph@gmail.com', 'Joel Tapiru', '0566485959', '2018-04-24 10:10:38'),
('joel.aguirre@gmail.com', 'Joel Aguirre', '83239795', '2018-04-17 15:28:36'),
('mikalaizareyganda@gmail.com', 'Mika Laiza Rey', '09461250187', '2018-04-24 06:43:55'),
('willowfairy_8@yahoo.com', 'Joel Tapiru', '0566485959', '2018-04-22 18:17:16');

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
-- Indexes for table `facilitator`
--
ALTER TABLE `facilitator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `facilitator`
--
ALTER TABLE `facilitator`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
