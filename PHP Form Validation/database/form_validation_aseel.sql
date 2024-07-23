-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 02:06 PM
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
-- Database: `form_validation_aseel`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `Full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(200) DEFAULT NULL,
  `profile_picture` longblob DEFAULT NULL,
  `Date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `Full_name`, `email`, `mobile`, `password`, `role_id`, `profile_picture`, `Date_created`) VALUES
(1, 'Fajer Basheer Falah Hasan', 'aseeaburumman47@gmail.com', 796615575, '$2y$10$X9kH5yxjaetIZyWi0Zgu3O7Wd2nWVE2jwMSkbsF1KA8Ozv.WFxsca', 1, NULL, '2024-07-23 10:23:03'),
(2, 'Aseel Ibrahim Ali Aburumman', 'aseelaburumman49@gmail.com', 796615575, '$2y$10$X9kH5yxjaetIZyWi0Zgu3O7Wd2nWVE2jwMSkbsF1KA8Ozv.WFxsca', 2, NULL, '2024-07-23 10:23:03'),
(8, 'lana ahmad ali moham', 'lana@gmail.com', 796615575, '$2y$10$cYyuI5toAs0Jv16ef1cjwu9YssSsh6gw.ky2.LcgooV5UBwSuvfVS', 1, '', '2024-07-23 10:23:03'),
(12, 'Belal Khaled Khaer Naqawa', 'belal@gmail.com', 796615575, '$2y$10$o3G3sOlxMbDlMLq11lPrfeZgFLR2x1jzc1tNuMdRQ.k1MM5JQc8Xu', 1, 0x75706c6f616465645f70696374757265732f736164636174322e706e67, '2024-07-23 10:23:03'),
(13, 'Amal Bashar Mohammad Alhamdan', 'amal@gmail.com', 796615575, '$2y$10$jUfWgWV395gVdmr3suybW.GtJvg4mXobKn9zPhgN3DkEIkY.c69DW', 1, 0x75706c6f616465645f70696374757265732f736164636174322e706e67, '2024-07-23 10:26:46'),
(14, 'Osama Ahmad Mahmoud Alhyari', 'osama@gmail.com', 796615575, '$2y$10$yQsFBUnRz77tVXH9zT2pOeUnbOBg6DxK6.WH1mimuQn33ZZXEAXh.', 1, NULL, '2024-07-23 10:44:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
