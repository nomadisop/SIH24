-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 08:32 PM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Vegetable'),
(2, 'Fruit'),
(3, 'Millets'),
(4, 'Leafy-Vegetable'),
(5, 'Dry-Fruit');

-- --------------------------------------------------------

--
-- Table structure for table `form_submission`
--

CREATE TABLE `form_submission` (
  `id` int(200) NOT NULL,
  `Name` text NOT NULL,
  `cropName` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `userID` int(200) NOT NULL,
  `Productid` int(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `price` bigint(20) NOT NULL,
  `weight` int(10) NOT NULL,
  `DateOfDelivery` date NOT NULL,
  `transportation` varchar(50) NOT NULL,
  `Account Name` text NOT NULL,
  `Account Number` int(200) NOT NULL,
  `Signature` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES
(1, 11, 10, 'Hey, i am intrested to buy this', '2024-09-19 16:45:11'),
(2, 10, 11, 'Sure , let me know what is required', '2024-09-19 16:47:20'),
(3, 6, 10, 'hey', '2024-09-19 17:44:31'),
(4, 10, 11, 'hey', '2024-09-19 18:06:28'),
(5, 10, 6, 'hey', '2024-09-19 18:08:49'),
(6, 6, 10, 'sup', '2024-09-19 18:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(3) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` text NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `type`, `title`, `author`, `price`, `weight`, `date`, `status`, `content`, `name`, `uid`) VALUES
(36, 'Millets', 'Wheat', 'adnanansar0101@gmail.com', 30, 1200, '0000-00-00 00:00:00', 0, 'Wheat, fresh', 'Crop-Name-1185.jpg', 0),
(37, 'Vegetable', 'Basmati Rice', 'adnanansar0101@gmail.com', 69, 10000, '2024-09-16 20:00:00', 0, 'Top quality rice , given as per the requirement', 'Crop-Name-5812.jpg', 0),
(38, 'Category', 'Cherry', 'adnanansar0101@gmail.com', 103, 500, '0000-00-00 00:00:00', 0, 'Fresh cherry from maharashtra', 'Crop-Name-2115.jpg', 0),
(39, 'Fruit', 'Banana', 'adnanansar0101@gmail.com', 60, 300, '0000-00-00 00:00:00', 0, 'Fresh Bananas from kerala', 'Crop-Name-945.jpg', 1),
(40, 'Millets', 'Wheat', 'farmer1@gmail.com', 100, 500, '0000-00-00 00:00:00', 0, 'Freshly harvested wheat ', 'Crop-Name-8371.jpg', 0);

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
(6, 'Asmi', 'chicken', 'Goa', 'Margao', '123@gmail.com', 7507760785, '$2y$10$81L9kOE3L.EQ9uvZq7MuwOzH.EqQUHwbN9hg093wWxO96TtkzQ/R6', 'Buyer'),
(7, 'adnaan', 'www', 'Goa', 'Panaji', 'master@123.com', 1234567890, '$2y$10$Zex0AnEquFDCa9nZPmoxFOWFKQZKjn0n48lQiB0y8L1MbwPqn9Bii', 'Farmer'),
(8, 'ambani', 'aa', 'Maharashtra', 'Mumbai', 'a@1.com', 1234567890, '$2y$10$vfb7fmF48cNXXYre0FV8he0PZ2Z/q3HgGGKI.gMNV7CaaZioWHx2y', 'Buyer'),
(9, 'adnan', 'test', 'Maharashtra', 'Mumbai', '23@gm.com', 7507760785, '$2y$10$KhDHTzj8TUKtLvRP9qH/0uAGfQVfqFapJwe8svLyNeERdOE3wzlPa', 'Transporte'),
(10, 'Farmer1', 'India', 'Andhra Pradesh', 'Visakhapatnam', 'farmer1@gmail.com', 1234567890, '$2y$10$FtTCZ.Zn1OFinLBQS8yfy.l3ZC4e8pRs.pZqy0GhnPsAJ5WSiC/X2', 'Farmer'),
(11, 'buyer1', 'INDIA', 'Andhra Pradesh', 'Visakhapatnam', 'buyer1@gmail.com', 4567891230, '$2y$10$ncKh97JohYm3VaHhwGJ2v.koQMKyprLlcLcU0YxILKs2Zd63MSoie', 'Buyer');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
