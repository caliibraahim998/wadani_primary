-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 12:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` longtext NOT NULL,
  `user_token` longtext NOT NULL,
  `user_role` varchar(10) NOT NULL DEFAULT 'loading',
  `user_image` longtext NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`Id`, `username`, `email`, `user_password`, `user_token`, `user_role`, `user_image`, `create_date`) VALUES
(23, 'jikatoorka', 'jikatoorka@gmail.com', '$2y$10$W6KUzINgdNfTUFq4.PPneuc4/hx9NHD0J0rwIRhPUg.F5WAi0qkxS', 'verified', 'user', '../admin/images/user.png', '2025-01-04 08:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `mobile_number` int(50) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` enum('HTML','CSS','Javascript','Angular','React','Vue.js','Ruby','PHP','ASP.NET','Python','MySQL') NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `t_image` longtext NOT NULL,
  `Joining_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile_number`, `sex`, `designation`, `department`, `date_of_birth`, `t_image`, `Joining_date`) VALUES
(3, 'cali', 'ibraahim', 'cali1@gmail.com', '$2y$10$Pn1g7jN93schlgjvMD/w5esMgShRWf0G6whZfAit4G2x4B.abZF2q', 12345678, 'male', 'hogamiye', 'HTML', '2020-02-28', 'my love.jpg', '2024-12-28 16:59:27'),
(4, 'moha', 'ibraahim', 'jikatoorka@gmail.com', '$2y$10$qsfv5FZZu.yL4fthv3A5uOv/rW7UjEv26udtidKfoS.MoypwhjSyG', 12345678, 'male', 'hogamiye', 'CSS', '2004-03-01', 'logo.png', '2024-12-28 17:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `class` enum('HTML','CSS','JavaScript','Angular','React','veu.js') NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `mobile_number` int(25) NOT NULL,
  `parents_name` varchar(255) NOT NULL,
  `parents_number` int(25) NOT NULL,
  `date_of_birth` date NOT NULL,
  `Blood_group` varchar(255) NOT NULL,
  `student_image` longtext NOT NULL,
  `Registration_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `student_email`, `class`, `sex`, `mobile_number`, `parents_name`, `parents_number`, `date_of_birth`, `Blood_group`, `student_image`, `Registration_Date`) VALUES
(13, 'idman', 'maxamed', 'jannagale2030@gmail.com', 'HTML', 'Female', 1234567890, 'Kuusee', 12345678, '0000-00-00', 'OB', '../uploads/241121-pam-bondi-se-746p-fa2985.webp', '2024-12-25 08:12:55'),
(14, 'moha', 'cali', 'moha@gmail.com', 'HTML', 'Male', 1234567890, 'kuusee', 34567890, '0000-00-00', 'A+', '../uploads/my love.jpg', '2024-12-25 08:34:15'),
(16, 'maxamed', 'cumar', 'somalip29@gmail.com', 'HTML', 'Male', 615098416, 'XaLIIMO', 615098416, '2009-03-12', 'A+', '../uploads/unnamed.jpg', '2025-07-12 09:13:38'),
(17, 'caaqil', 'cali', 'cali@gmail.com', 'CSS', 'Male', 2147483647, 'xaliimo', 2147483647, '2025-07-12', 'A-', '../uploads/IMG_68722a35f17101.07581049.jpg', '2025-07-12 09:26:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
