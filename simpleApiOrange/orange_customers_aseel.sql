-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 08:54 AM
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
-- Database: `orange_customers_aseel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'aseel aburumman', 'aseel@gmail.com', 795456525, 'Aseel123$'),
(2, 'ali aburumman', 'ali@gmail.com', 795456525, 'Aseel123$'),
(3, 'khalid ali', 'khalid@gmail.com', 795456525, 'Aseel123$'),
(4, 'omar abukhader', 'omar@gmail.com', 795456525, 'Aseel123$'),
(5, 'lana ahmad', 'lana@gmail.com', 795456525, 'Aseel123$'),
(6, 'amal abukhalil', 'amal@gmail.com', 795456525, 'Aseel123$'),
(7, 'dana abbadi', 'dana@gmail.com', 795456525, 'Aseel123$'),
(8, 'aseel first add', 'aseelFirst@example.com', 796615575, 'Aseel123$'),
(9, 'test', 'test@gmail.com', 762267344, 'Aseel123$'),
(10, 'test2', 'test2@gmail.com', 762267344, 'Aseel123$');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `oldprice` varchar(50) NOT NULL,
  `is_out_of_stock` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `name`, `img_url`, `rate`, `brand`, `price`, `oldprice`, `is_out_of_stock`) VALUES
(1, 'Samsung Galaxy Note 20 Ultra', 'https://image-us.samsung.com/us/smartphones/galaxy-s21/gallery-images-palette-exclusive/P3-Exclusive-Phantom-Brown/PDP-P3-Phantom-Brown-lockup-01-1600x1200.jpg?$product-details-jpg$', 5, 'Samsung', 'JOD 759.00', '770', 1),
(2, 'INFINIX Zero 8', 'https://beon.store/images/detailed/44/Beon.ge_Itel_A48_L6006_Purple__1_.jpg', 0, 'Infinix', 'JOD 205.00', '220', 1),
(3, 'Apple iPhone 12 Pro', 'https://i5.walmartimages.com/seo/Pre-Owned-Apple-iPhone-12-Pro-128GB-Silver-Fully-Unlocked-Excellent-Condition_844d1042-b2d1-48db-8b37-2c34f1d94f8d.2e25fcad07148d0a246746cbf1f0537b.jpeg', 0, 'Apple', 'JOD 973.00', '1000', 1),
(4, 'ITEL A48', 'https://beon.store/images/detailed/44/Beon.ge_Itel_A48_L6006_Purple__1_.jpg', 0, 'iTel', 'JOD 66.00', '80', 0),
(5, 'Samsung Galaxy S21 Ultra', 'https://image-us.samsung.com/us/smartphones/galaxy-s21/gallery-images-palette-exclusive/P3-Exclusive-Phantom-Brown/PDP-P3-Phantom-Brown-lockup-01-1600x1200.jpg?$product-details-jpg$', 0, 'Samsung', 'JOD 799.00', '850', 0),
(6, 'Galaxy A52', 'https://hatif.net/wp-content/uploads/2021/05/Samsung-Galaxy-A52-5G-500x500.jpg', 0, 'Samsung', 'JOD 267.00', '280', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
