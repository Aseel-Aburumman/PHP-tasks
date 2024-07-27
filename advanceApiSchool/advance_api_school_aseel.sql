-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 11:48 PM
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
-- Database: `advance_api_school_aseel`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `max_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `subject_id`, `date`, `max_score`) VALUES
(1, 1, '2023-05-15', 30),
(2, 1, '2023-06-15', 30),
(3, 1, '2023-07-15', 40),
(4, 2, '2023-05-16', 30),
(5, 2, '2023-06-17', 30),
(6, 2, '2023-07-18', 40),
(7, 3, '2023-05-16', 30),
(8, 3, '2023-06-17', 30),
(9, 3, '2023-07-19', 40),
(10, 4, '2023-05-12', 30),
(11, 4, '2023-06-13', 30),
(12, 4, '2023-07-15', 40),
(13, 5, '2023-05-17', 30),
(14, 5, '2023-06-18', 30),
(15, 5, '2023-07-22', 40),
(16, 6, '2023-05-12', 30),
(17, 6, '2023-06-15', 30),
(18, 6, '2023-07-17', 40),
(19, 1, '2023-10-25', 100),
(20, 2, '0000-00-00', 100);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `subject1` int(11) DEFAULT NULL,
  `subject2` int(11) DEFAULT NULL,
  `subject3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `date_of_birth`, `address`, `email`, `phone`, `password`, `subject1`, `subject2`, `subject3`) VALUES
(1, 'aseel ali aburumman', '1999-10-29', 'amman', 'aseel@gmail.com', 795456525, 'Aseel123$', 5, 1, 6),
(2, 'ali hasan aburumman', '1998-01-04', 'amman', 'ali@gmail.com', 795456525, 'Aseel123$', 4, 3, 2),
(3, 'khalid ali', '1997-10-05', 'amman', 'khalid@gmail.com', 795456525, 'Aseel123$', 1, 4, 3),
(5, 'lana ahmad', '2000-07-06', 'amman', 'lana@gmail.com', 795456525, 'Aseel123$', 6, 4, 1),
(6, 'amal abukhalil', '1998-05-05', 'amman', 'amal@gmail.com', 795456525, 'Aseel123$', 2, 4, 5),
(7, 'dana abbadi', '1999-01-29', 'amman', 'dana@gmail.com', 795456525, 'Aseel123$', 5, 4, 1),
(8, 'postman first edit', '1999-06-05', 'zarqa', 'postmanFirst@example.com', 796615575, 'Aseel123$', 6, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `teacherId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `name`, `description`, `teacherId`) VALUES
(1, 'Math', 'Mathematics description', 1),
(2, 'Science', 'Science description', 2),
(3, 'History', 'History description', 3),
(4, 'English', 'English description', 6),
(5, 'Arabic', 'Arabiv description', 5),
(6, 'Art', 'Art description', 4),
(7, 'Sport', 'lets move ', 7),
(9, 'Philosophy', 'Philosophy', 8);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherId`, `name`, `subject`, `email`) VALUES
(1, 'Mr. Smith', 'Math', 'mrsmith@example.com'),
(2, 'Mr. Josh', 'Science', 'mrJosh@example.com'),
(3, 'Mr. Waleed', 'History', 'mrWaleed@example.com'),
(4, 'Ms. Lana', 'Art', 'msLana@example.com'),
(5, 'Mr. Ali', 'Arabic', 'mrAli@example.com'),
(6, 'Mrs. Johnson', 'English', 'mrsjohnson@example.com'),
(7, 'aseel aburumman', 'Sport', 'aseel@gmail.com'),
(8, 'Mr. Omar', 'Philosophy', 'mromar@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `subject1key` (`subject1`),
  ADD KEY `subject2key` (`subject2`),
  ADD KEY `subject3key` (`subject3`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `teacherId` (`teacherId`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `subject1key` FOREIGN KEY (`subject1`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `subject2key` FOREIGN KEY (`subject2`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `subject3key` FOREIGN KEY (`subject3`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`teacherId`) REFERENCES `teachers` (`teacherId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
