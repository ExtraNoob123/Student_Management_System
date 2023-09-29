-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 06:18 AM
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
-- Database: `studentmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`id`, `name`, `email`, `phone`) VALUES
(1, 'jack', 'jack@gmail.com', 1905648243),
(3, 'bob', 'bob@gmail.com', 1278455847),
(4, 'shamp', 'otter@gmail.com', 1927486648);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `com_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `com_subject` varchar(50) DEFAULT NULL,
  `com_description` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`com_id`, `username`, `com_subject`, `com_description`, `date`) VALUES
(1, 'kaeya', 'UB7 lift not working', 'One of the University Building 7 lift has stopped working. Please fix as soon as possible.', '2023-08-25'),
(2, 'mahesh', 'not enough seat in CSE471', 'Please add more seat or section for CSE471 fall2023', '2023-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `c_id` int(11) NOT NULL,
  `course_code` varchar(15) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `department` varchar(40) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `course_code`, `name`, `department`, `description`, `image`) VALUES
(3, 'CSE370', 'Database System', 'CSE', 'You will work with database languages and popular ', 'image/Database System.jpeg'),
(6, 'BUS201', 'Business and Human Communication', 'BSS', 'This course aims to teach the theory and process of communication; including barriers to effective communication; communication skills', 'image/bss1.webp'),
(7, 'MAT120', 'Integral Calculus and Differential Equat', 'MNS', 'Definitions of integration. Integration by the method of substitution. Integration by parts. Standard integrals. Integration by method of successive reduction', 'image/Integral Calculus.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `course_assign`
--

CREATE TABLE `course_assign` (
  `assign_id` int(11) NOT NULL,
  `student_id` varchar(50) DEFAULT NULL,
  `c_code` varchar(15) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_assign`
--

INSERT INTO `course_assign` (`assign_id`, `student_id`, `c_code`, `semester`) VALUES
(9, 'Edward cullen', 'BUS201', 'fall2023'),
(10, 'mahesh', 'CSE370', 'summer2023'),
(11, 'mikasa', 'MAT120', 'summer2023'),
(12, 'shamp', 'MAT120', 'summer2023'),
(13, 'shamp', 'CSE370', 'summer2023'),
(14, 'shamp', 'BUS201', 'fall2023');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `subject`, `description`, `date`) VALUES
(1, 'Final Date', 'Summer2023 Final starts from 2nd September. Will continue till 9th September.', '2023-08-25'),
(2, 'Advising Fall2023', 'Your 2nd pre-advising will be held on 26th,27th,28th of August.', '2023-08-25'),
(3, 'Admission Fall2023', 'Admission is ongoing for Fall2023 semester. Apply with your name and other details now!', '2023-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `transaction_id` varchar(40) DEFAULT NULL,
  `student_name` varchar(40) DEFAULT NULL,
  `semester` varchar(30) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `pay_update` varchar(30) DEFAULT NULL,
  `account_info` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `transaction_id`, `student_name`, `semester`, `amount`, `pay_update`, `account_info`) VALUES
(1, 'transx_45967378ad', 'Edward cullen', 'summer2023', 70000, 'Paid', 'acd_489378'),
(2, 'transx_44737668fs', 'mikasa', 'fall2023', 120000, 'Paid', 'acc_042r4958xa'),
(3, 'transx_57483467d', 'mikasa', 'summer2023', 68500, 'Paid', 'acc_042r49458mik'),
(4, 'transx_2003897ch', 'mahesh', 'spring2023', 59000, 'unpaid', NULL),
(5, 'transx_505733rr', 'Edward cullen', 'spring2024', 100000, 'unpaid', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` int(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`) VALUES
(1, 'admin', 1948328279, 'admin01@gmail.com', 'admin', '1234'),
(3, 'teacher1', 1820558237, 'teacher1chad@gmail.com', 'teacher', '4538'),
(4, 'staff1', 1345628211, 'staff01@gmail.com', 'staff', '1234'),
(6, 'Edward cullen', 1574862286, 'edwardc@gmail.com', 'student', '3465'),
(7, 'mahesh', 1646382341, 'maheshdalle@gmail.com', 'student', '5539'),
(8, 'kaeya', 1287956293, 'kaeyaalb@gmail.com', 'student', '1234'),
(9, 'teacher2', 193725473, 'dave@gmail.com', 'teacher', '1234'),
(11, 'staff2', 1376815592, 'hamudstaff@gmial.com', 'staff', '1867'),
(12, 'staff4', 1836475832, 'henrystaff@gmail.com', 'staff', '1234'),
(14, 'mikasa', 1633642856, 'sasageyo@gmail.com', 'student', '1234'),
(15, 'shamp', 1936478234, 'otter@gmail.com', 'student', '1385');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `course_assign`
--
ALTER TABLE `course_assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_assign`
--
ALTER TABLE `course_assign`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
