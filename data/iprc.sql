-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 02:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iprc`
--

-- --------------------------------------------------------

--
-- Table structure for table `ipr_copyrights`
--

CREATE TABLE `ipr_copyrights` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `diary_no` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `presenter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipr_copyrights`
--

INSERT INTO `ipr_copyrights` (`id`, `title`, `description`, `diary_no`, `status`, `presenter`) VALUES
(1, 'Project xyz', 'this is a test', 'abc1234xyz', 'in progress', 1),
(2, 'protect test', 'this is a test project', 'xyz123', 'in progress', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ipr_cp_applicant`
--

CREATE TABLE `ipr_cp_applicant` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipr_cp_applicant`
--

INSERT INTO `ipr_cp_applicant` (`id`, `cid`, `name`, `email`, `role`, `designation`) VALUES
(1, 1, 'xyz', 'xyz@gmail.com', 'author', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `ipr_role`
--

CREATE TABLE `ipr_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipr_role`
--

INSERT INTO `ipr_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `ipr_users`
--

CREATE TABLE `ipr_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `reg_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipr_users`
--

INSERT INTO `ipr_users` (`id`, `name`, `email_id`, `password`, `department`, `role`, `reg_no`) VALUES
(1, 'admin', 'ipradmin@sakec.ac.in', 'admin123', 'iprc', 1, '00000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipr_copyrights`
--
ALTER TABLE `ipr_copyrights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presenter` (`presenter`);

--
-- Indexes for table `ipr_cp_applicant`
--
ALTER TABLE `ipr_cp_applicant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `ipr_role`
--
ALTER TABLE `ipr_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipr_users`
--
ALTER TABLE `ipr_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ipr_copyrights`
--
ALTER TABLE `ipr_copyrights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ipr_cp_applicant`
--
ALTER TABLE `ipr_cp_applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ipr_role`
--
ALTER TABLE `ipr_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ipr_users`
--
ALTER TABLE `ipr_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ipr_copyrights`
--
ALTER TABLE `ipr_copyrights`
  ADD CONSTRAINT `ipr_copyrights_ibfk_1` FOREIGN KEY (`presenter`) REFERENCES `ipr_users` (`id`);

--
-- Constraints for table `ipr_cp_applicant`
--
ALTER TABLE `ipr_cp_applicant`
  ADD CONSTRAINT `ipr_cp_applicant_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `ipr_copyrights` (`id`);

--
-- Constraints for table `ipr_users`
--
ALTER TABLE `ipr_users`
  ADD CONSTRAINT `ipr_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `ipr_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
