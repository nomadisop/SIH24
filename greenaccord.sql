-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 12:22 PM
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
-- Database: `greenaccord`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(3) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(11) NOT NULL,
  `author` text NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `content` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `type`, `title`, `author`, `price`, `weight`, `date`, `status`, `content`, `name`, `location`) VALUES
(31, 'Millets', 'sus', 'adnanansar0101@gmail.com', 100, 5, '0.041666666666666666', 0, 'saas', 'Crop-Name-6747.jpg', ''),
(32, 'Vegetable', 'MH52AC5252', 'waasil@gmail.com', 30, 500, '0.041666666666666666', 0, 'adnan', 'Crop-Name-1854.png', ''),
(33, 'Vegetable', 'MH52AC5252', 'waasil@gmail.com', 30, 500, '0.041666666666666666', 0, 'adnan', 'Crop-Name-5950.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `state`, `district`, `email`, `phone`, `password`, `role`) VALUES
(1, 'Adnan', 'Qureshi', 'Andhra Pradesh', 'Visakhapatnam', 'adnanansar0101@gmail.com', 7507760785, '$2y$10$NN8Y5dtdpg95mp9X7H1yjeoCvBp9PRgOP5PqGzZ3SlVoNlsHDHzQu', 'Farmer'),
(4, 'adnan', 'qureshi', 'Maharashtra', 'Pune', 'fondesthorse11@gmail.com', 7507760785, '$2y$10$eH9E1AF5ywCq4JAQwLpjjeTNdfctAU2JGOLH5ERrb.YWn2v8DJj2e', 'Farmer'),
(5, 'waasil', 'qureshi', 'Maharashtra', 'Nagpur', 'waasil@gmail.com', 7507760785, '$2y$10$Fc0BgHfjpIOEPwalwtMCQOlSJkjlveQmofJq9aW4FCrNaacqIf.6.', 'Transport'),
(6, 'butter', 'chicken', 'Goa', 'Margao', '123@gmail.com', 7507760785, '$2y$10$81L9kOE3L.EQ9uvZq7MuwOzH.EqQUHwbN9hg093wWxO96TtkzQ/R6', 'Buyer');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `sno` int(11) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `truck_type` varchar(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `cpkm` int(11) NOT NULL,
  `author` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`sno`, `vehicle_no`, `truck_type`, `capacity`, `cpkm`, `author`, `name`) VALUES
(9, 'MH12TT6969', 'Flatbed', 2000, 50, 'waasil@gmail.com', 'Crop-Name-6363.jpg'),
(10, 'MH69TT4200', 'Refrigerate', 1200, 80, 'waasil@gmail.com', 'Crop-Name-2092.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
