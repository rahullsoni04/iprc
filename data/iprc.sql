-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 04:06 PM
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
-- Table structure for table `ipr_about_us`
--

CREATE TABLE `ipr_about_us` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipr_about_us`
--

INSERT INTO `ipr_about_us` (`id`, `description`, `img`) VALUES
(1, 'final testing', '620286b1e992a7.75812992.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ipr_contact_us`
--

CREATE TABLE `ipr_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `query` varchar(255) NOT NULL,
  `queryTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `replyStatus` tinyint(4) NOT NULL DEFAULT 0,
  `replyMsg` varchar(255) DEFAULT NULL,
  `repliedBy` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipr_contact_us`
--

INSERT INTO `ipr_contact_us` (`id`, `name`, `emailId`, `subject`, `query`, `queryTime`, `replyStatus`, `replyMsg`, `repliedBy`) VALUES
(1, 'jjm', 'wddwd', 'deded', 'wede', '2022-02-05 08:56:49', 1, 'wedewd', 'admin'),
(4, '', 'ipradmin@sakec.ac.in', 'test', 'testing', '2022-02-06 10:16:59', 0, NULL, 'admin'),
(5, 'admin', 'ipradmin@sakec.ac.in', 'hello', 'test', '2022-02-06 10:20:39', 0, NULL, 'admin'),
(6, 'RAHUL SONI', 'rahul.soni_19@sakec.ac.in', 'test', 'hello', '2022-02-06 10:35:59', 0, NULL, 'admin');

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
(1, 'Project xyz', 'this is a test', 'abc1234xyz', 'accepted', 1),
(2, 'protect test', 'this is a test project', 'xyz123', 'accepted', 1);

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
-- Table structure for table `ipr_cp_reject`
--

CREATE TABLE `ipr_cp_reject` (
  `id` int(11) NOT NULL,
  `cp_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipr_cp_reject`
--

INSERT INTO `ipr_cp_reject` (`id`, `cp_id`, `date`, `reason`) VALUES
(1, 1, '2022-01-07 20:31:22', ''),
(2, 1, '2022-01-07 20:31:41', ''),
(3, 1, '2022-01-07 20:32:55', ''),
(4, 1, '2022-01-07 20:38:35', ''),
(5, 1, '2022-01-07 20:42:08', ''),
(6, 1, '2022-01-07 21:03:02', ''),
(7, 1, '2022-01-07 21:07:46', ''),
(8, 1, '2022-01-07 21:08:47', ''),
(9, 1, '2022-01-07 21:12:45', ''),
(10, 1, '2022-01-07 21:16:21', ''),
(11, 1, '2022-01-07 21:18:30', ''),
(12, 1, '2022-01-07 21:23:52', ''),
(13, 1, '2022-01-07 21:28:09', ''),
(14, 1, '2022-01-07 21:28:50', ''),
(15, 1, '2022-01-07 21:29:16', ''),
(16, 1, '2022-01-07 21:30:24', ''),
(17, 1, '2022-01-07 21:31:51', ''),
(18, 1, '2022-01-07 21:32:54', ''),
(19, 1, '2022-01-07 21:33:16', 'ass'),
(20, 1, '2022-01-07 21:36:48', 'ass'),
(21, 1, '2022-01-07 21:38:15', 'ass'),
(22, 1, '2022-01-07 21:41:31', 'ass'),
(23, 1, '2022-01-07 21:44:11', 'ass'),
(24, 1, '2022-01-07 21:47:18', 'ass'),
(25, 1, '2022-01-07 21:50:01', 'ass'),
(26, 1, '2022-01-07 21:50:25', 'ass'),
(27, 1, '2022-01-07 21:52:07', 'ass'),
(28, 1, '2022-01-07 21:53:04', 'ass'),
(29, 1, '2022-01-07 21:54:10', 'ass'),
(30, 1, '2022-01-07 21:54:27', 'cs'),
(31, 1, '2022-01-07 22:24:15', 'dfffd'),
(32, 1, '2022-01-07 22:24:35', 'dfffd'),
(33, 1, '2022-01-07 22:25:04', 'dfffd'),
(34, 1, '2022-01-07 22:27:32', 'dfffd'),
(35, 1, '2022-01-07 22:28:49', 'dfffd');

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
(2, 'student'),
(3, 'Sakec student'),
(4, 'Member'),
(5, 'student coordinator'),
(6, 'staff coordinator'),
(7, 'staff');

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
(1, 'admin', 'ipradmin@sakec.ac.in', 'admin123', 'iprc', 1, '00000'),
(2, 'XYZ', 'test@gmail.com', 'test', 'testing', 2, '00000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipr_about_us`
--
ALTER TABLE `ipr_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipr_contact_us`
--
ALTER TABLE `ipr_contact_us`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `ipr_cp_reject`
--
ALTER TABLE `ipr_cp_reject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ipr_cp_reject_ibfk_1` (`cp_id`);

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
-- AUTO_INCREMENT for table `ipr_about_us`
--
ALTER TABLE `ipr_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ipr_contact_us`
--
ALTER TABLE `ipr_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `ipr_cp_reject`
--
ALTER TABLE `ipr_cp_reject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ipr_role`
--
ALTER TABLE `ipr_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ipr_users`
--
ALTER TABLE `ipr_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Constraints for table `ipr_cp_reject`
--
ALTER TABLE `ipr_cp_reject`
  ADD CONSTRAINT `ipr_cp_reject_ibfk_1` FOREIGN KEY (`cp_id`) REFERENCES `ipr_copyrights` (`id`);

--
-- Constraints for table `ipr_users`
--
ALTER TABLE `ipr_users`
  ADD CONSTRAINT `ipr_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `ipr_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
