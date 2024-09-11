-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 08:37 AM
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
-- Database: `srs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `course` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `course`, `description`, `status`, `created_at`) VALUES
(1, 'M.C.A', 'Master of Computer Application', 1, '2024-07-02 17:49:32'),
(2, 'M. Tech', 'Master of Technology', 1, '2024-07-02 17:49:59'),
(3, 'M. Pharma', 'Master of Pharmacy', 1, '2024-07-02 17:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `course_name` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `dob` varchar(250) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gaurdian_name` varchar(255) NOT NULL,
  `gaurdian_mobile` varchar(10) NOT NULL,
  `board` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `passing_year` varchar(255) NOT NULL,
  `I_board` varchar(255) NOT NULL,
  `I_subject` varchar(255) NOT NULL,
  `I_passing_year` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `student_id`, `course_name`, `first_name`, `last_name`, `gender`, `dob`, `mobile`, `emailid`, `address`, `gaurdian_name`, `gaurdian_mobile`, `board`, `subject`, `passing_year`, `I_board`, `I_subject`, `I_passing_year`, `status`, `created_at`) VALUES
(3, 'SRN-3', 'M.C.A', 'kai', 'sotto', 'Others', '09/09/2024', '0938111418', 'kaisotto@gmail.com', 'sa court lang', 'vic sotto', '0923145', 'basketball', 'bola', '2090', 'basketball', 'bola', '2100', 0, '2024-09-09 06:36:23'),
(4, 'SRN-4', 'M. Tech', 'herris', 'herrera', 'Male', '09/09/2024', '232323', 'kaisotto@gmail.com', 'kahit saan', 'vic sotto', '0923145', 'basketball', 'bola', '2090', 'basketball', 'bola', '2100', 1, '2024-09-09 07:21:55'),
(5, 'SRN-5', 'M. Tech', 'asdasd', 'asdasdas', 'Female', '09/09/2024', '232323', 'kaisotto@gmail.com', 'asdasdasd', 'asdasdasdas', 'dasdasd', 'asdsa', 'dasd', 'asdsadas', 'asdasdasdsad', 'asdasdasd', 'asdasdsa', 1, '2024-09-09 12:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `emailid` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`, `username`, `emailid`, `password`, `created_at`) VALUES
(1, 'admin', '', 'admin', 'admin@srs.com', '202cb962ac59075b964b07152d234b70', '2024-09-09 06:34:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
