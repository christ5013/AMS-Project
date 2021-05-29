-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 01:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `log_type` tinyint(1) NOT NULL COMMENT '1 = IN,2 = out',
  `datetime_log` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employee_no`, `log_type`, `datetime_log`, `date_updated`) VALUES
(1, '2021-9350', 1, '2021-05-26 17:03:29', '2021-05-26 17:03:29'),
(2, '2021-5798', 1, '2021-05-26 18:54:26', '2021-05-26 18:54:26'),
(3, '2021-5798', 2, '2021-05-26 18:55:01', '2021-05-26 18:55:01'),
(4, '2021-9101', 1, '2021-05-28 21:24:25', '2021-05-28 21:24:25'),
(5, '2021-9350', 1, '2021-05-28 22:46:57', '2021-05-28 22:46:57'),
(6, '2021-9350', 1, '2021-05-29 08:43:18', '2021-05-29 08:43:18'),
(7, '2021-9101', 1, '2021-05-29 09:35:51', '2021-05-29 09:35:51'),
(9, '2021-9350', 2, '2021-05-29 10:01:48', '2021-05-29 10:01:48'),
(10, '2021-9350', 1, '2021-05-29 13:53:46', '2021-05-29 13:53:46'),
(11, '2021-8590', 1, '2021-05-29 13:55:09', '2021-05-29 13:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `consolidate`
--

CREATE TABLE `consolidate` (
  `id` int(11) NOT NULL,
  `employee_no` varchar(255) NOT NULL,
  `number_days` int(255) NOT NULL,
  `Request_overtime` varchar(255) DEFAULT NULL,
  `Monthly_salary` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(20) NOT NULL,
  `employee_no` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `started_at` date NOT NULL DEFAULT current_timestamp(),
  `ended_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_no`, `firstname`, `middlename`, `lastname`, `department`, `position`, `started_at`, `ended_at`) VALUES
(3, '2021-9350', 'Winabel Marie', 'Cabactulan', 'Anore', 'IT', 'Software Developer', '0000-00-00', '0000-00-00 00:00:00'),
(4, '2021-8590', 'Marjorie', 'Ontolan', 'Entoma', 'Marketing Department', 'Marketing Analyst', '0000-00-00', '0000-00-00 00:00:00'),
(5, '2021-5798', 'Dave Lyndrex ', '', 'Millan', 'HR', 'Staff', '0000-00-00', '0000-00-00 00:00:00'),
(7, '2021-9101', 'Kaith Chymbee', 'Santillan', 'Cerrenio', 'IT', 'Software Developer', '0000-00-00', '0000-00-00 00:00:00'),
(8, '2021-5028', 'Romeo', '', 'Rodemio', 'IT', 'Programmer', '0000-00-00', '0000-00-00 00:00:00'),
(9, '2021-3787', 'Jeric', 'Dumaguit', 'Baterna', 'Operations Department', 'Project Manager', '0000-00-00', '0000-00-00 00:00:00'),
(12, '2021-9609', 'Jennnifer', 'Mujeres', 'Jabagat', 'IT', 'Software Developer', '0000-00-00', '0000-00-00 00:00:00'),
(14, '2021-3976', 'Guian', '', 'Amancio', 'Marketing Department', 'Analyst', '0000-00-00', '0000-00-00 00:00:00'),
(15, '2021-5623', 'Kyla Jean', 'MoniÃ±o', 'Dumaguit', 'IT', 'Software Developer', '0000-00-00', '0000-00-00 00:00:00'),
(16, '2021-4879', 'James Lloyd', '', 'Belda', 'IT', 'Programmer', '0000-00-00', '0000-00-00 00:00:00'),
(18, '2021-9406', 'Rehnan', 'YbaÃ±ez', 'Ramil', 'IT', 'Programmer', '0000-00-00', '0000-00-00 00:00:00'),
(20, '2021-3606', 'daryll', '', 'Vildosola', 'Operational Maketing', 'analyst', '0000-00-00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_stated` datetime NOT NULL DEFAULT current_timestamp(),
  `time_updated` datetime DEFAULT NULL,
  `date_ended` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_title`, `department`, `status`, `date_stated`, `time_updated`, `date_ended`) VALUES
(1, 'Pseudo Scientific Calculator (python)', 'IT', 'complete', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Calculator Java Application', 'IT', 'complete', '2021-05-14 17:51:42', NULL, NULL),
(3, 'MilkTea Store Management System', 'IT', 'complete', '2021-05-14 17:51:42', NULL, NULL),
(4, 'Personal Blog', 'IT', 'complete', '2021-05-14 17:51:42', NULL, NULL),
(5, 'Attendance Monitoring System web application', 'IT', 'in progress', '2021-05-14 17:51:42', NULL, NULL),
(6, 'Attendance Monitoring System java application', 'IT', 'in progress', '2021-05-14 17:51:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(11) NOT NULL,
  `employee_no` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `employee_no`, `Date`, `status`) VALUES
(1, '2021-9350', '0000-00-00', NULL),
(2, '2021-9101', '0000-00-00', NULL),
(3, '2021-9350', '0000-00-00', NULL),
(4, '2021-9101', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT 'p@$$w0rd123',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `access` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `access`) VALUES
(1, 'admin@gmail.com', 'admin123', 'ss', 'administrator', 'admin'),
(8, '2021-9350', 'p@$$w0rd123', 'Winabel Marie', 'Anore', 'employee'),
(9, '2021-8590', 'p@$$w0rd123', 'Marjorie', 'Entoma', 'employee'),
(10, '2021-5798', 'p@$$w0rd123', 'Dave Lyndrex ', 'Millan', 'employee'),
(12, '2021-9101', 'p@$$w0rd123', 'Kaith Chymbee', 'Cerrenio', 'employee'),
(13, '2021-5028', 'p@$$w0rd123', 'Romeo', 'Rodemio', 'employee'),
(14, '2021-3787', 'p@$$w0rd123', 'Jeric', 'Baterna', 'employee'),
(17, '2021-9609', 'p@$$w0rd123', 'Jennnifer', 'Jabagat', 'employee'),
(19, '2021-3976', 'p@$$w0rd123', 'Guian', 'Amancio', 'employee'),
(20, '2021-5623', 'p@$$w0rd123', 'Kyla Jean', 'Dumaguit', 'employee'),
(21, '2021-4879', 'p@$$w0rd123', 'James Lloyd', 'Belda', 'employee'),
(23, '2021-9406', 'p@$$w0rd123', 'Rehnan', 'Ramil', 'employee'),
(25, 'xhianne515@gmail.com', 'admin123', 'Xhianne Vannesse', 'villasco', 'admin'),
(26, '2021-3606', 'p@$$w0rd123', 'daryll', 'Vildosola', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consolidate`
--
ALTER TABLE `consolidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `consolidate`
--
ALTER TABLE `consolidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
