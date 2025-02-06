-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: sql.freedb.tech
-- Generation Time: Feb 05, 2025 at 05:36 AM
-- Server version: 8.0.41-0ubuntu0.22.04.1
-- PHP Version: 8.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freedb_car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int NOT NULL,
  `bookingno` bigint NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `vid` int NOT NULL,
  `FromDate` varchar(20) NOT NULL,
  `ToDate` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` int NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bookingno`, `userEmail`, `vid`, `FromDate`, `ToDate`, `message`, `status`, `PostingDate`, `LastUpdationDate`) VALUES
(101, 8837, 'bhupatvatukiya1@gmail.com', 85, '2025-02-04', '2025-02-08', 'setf', 1, '2025-02-04 04:22:09', '2025-02-04 04:22:09'),
(100, 1852, 'bhupatvatukiya1@gmail.com', 69, '2025-02-06', '2025-02-08', 'sdf', 0, '2025-02-03 16:13:37', '2025-02-03 16:13:37'),
(97, 3126, 'bhupatvatukiya1@gmail.com', 68, '2025-02-05', '2025-02-11', 'c', 1, '2025-02-03 13:38:16', '2025-02-03 13:38:16'),
(98, 4693, 'hr123@gmail.com', 70, '2025-02-06', '2025-02-08', 'dz', 2, '2025-02-03 13:39:36', '2025-02-03 13:39:36'),
(99, 2277, 'hr123@gmail.com', 70, '2025-02-09', '2025-02-26', 'vnx', 1, '2025-02-03 14:15:04', '2025-02-03 14:15:04'),
(95, 6834, 'bhupatvatukiya1@gmail.com', 69, '2025-02-04', '2025-02-13', 'dzf', 2, '2025-02-03 13:26:11', '2025-02-03 13:26:11'),
(96, 4152, 'hr123@gmail.com', 70, '2025-02-05', '2025-02-09', 'dzf', 0, '2025-02-03 13:27:20', '2025-02-03 13:27:20'),
(94, 9652, 'bhupatvatukiya1@gmail.com', 68, '2025-02-03', '2025-02-15', 'fg', 0, '2025-02-03 13:25:38', '2025-02-03 13:25:38'),
(102, 6701, 'bhupatvatukiya1@gmail.com', 84, '2025-02-06', '2025-02-22', 'ar', 0, '2025-02-04 18:45:34', '2025-02-04 18:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `bname` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `bname`, `created_at`, `updated_at`) VALUES
(2, 'creata', '2025-01-05 11:43:22', '2025-01-05 11:43:22'),
(3, 'web', '2025-01-08 16:16:01', '2025-01-08 16:16:01'),
(4, 'u', '2025-01-12 16:32:11', '2025-01-12 16:32:11'),
(5, 'tata', '2025-02-01 10:58:12', '2025-02-01 10:58:12'),
(6, 'J', '2025-02-03 05:13:52', '2025-02-03 05:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `car_img`
--

CREATE TABLE `car_img` (
  `id` int NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_img`
--

INSERT INTO `car_img` (`id`, `img`) VALUES
(13, 'side.jpeg  '),
(11, 'right-cross.jpeg  '),
(12, 'front.jpeg,right-cross.jpeg  '),
(10, 'front.jpeg,rear.jpeg,right-cross.jpeg  '),
(14, 'front.jpeg,rear.jpeg,right-cross.jpeg,side.jpeg  '),
(15, 'front.jpeg,rear.jpeg,right-cross.jpeg  '),
(16, 'front.jpeg,rear.jpeg,front.jpeg  '),
(17, 'front.jpeg  '),
(18, 'front.jpeg,rear.jpeg,right-cross.jpeg  ');

-- --------------------------------------------------------

--
-- Table structure for table `car_list`
--

CREATE TABLE `car_list` (
  `vid` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `modal` int NOT NULL,
  `price` int NOT NULL,
  `no_plate` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `seat` int NOT NULL,
  `fual` varchar(255) NOT NULL,
  `door` int NOT NULL,
  `en_power` varchar(255) NOT NULL,
  `en_type` varchar(255) NOT NULL,
  `break_type` varchar(255) NOT NULL,
  `fual_capacity` int NOT NULL,
  `mileage` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_list`
--

INSERT INTO `car_list` (`vid`, `name`, `modal`, `price`, `no_plate`, `company_name`, `image`, `seat`, `fual`, `door`, `en_power`, `en_type`, `break_type`, `fual_capacity`, `mileage`, `status`) VALUES
(79, 'Land Roverddfd', 123, 123, '123', '123', 'front.jpeg,rear.jpeg,right-cross.jpeg', 123, 'CNG', 0, '', '', '', 0, 0, 0),
(80, 'audi x7', 21, 21, '21', '21', 'front.jpeg,rear.jpeg,right-cross.jpeg,side.jpeg', 21, 'Diesel', 4, '300 Hp', 'Diesel engine', 'Carbon break', 50, 1234, 0),
(81, 'sdfsdgsdgs', 4234, 4234234, '324234', '234234234', 'front.jpeg,right-cross.jpeg,side.jpeg', 234234, 'Diesel', 4, '500  Hp', 'EV', 'disc break', 40, 12, 0),
(82, 'ASDASFFSDFG', 4534536, 6456, '54645645', '4564564', 'car1.png,car1.png,car1.png', 645645645, 'Petrol', 4, '300 Hp', 'Diesel engine', 'Carbon break', 20, 4522, 0),
(83, '345', 345, 345, '345', '345', 'car1.png,car1.png,car1.png', 345, 'Diesel', 4, '300 Hp', 'Petrol ', 'Carbon break', 20, 45, 0),
(84, '5654645645', 645645, 645645, '645645645', '645645', 'car1.png,car1.png,car1.png', 6456, 'Diesel', 2, '261 Hp', 'Petrol ', 'disc break', 50, 56, 0);

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `model` int NOT NULL,
  `price` int NOT NULL,
  `no_plate` varchar(20) NOT NULL,
  `company_name` varchar(80) NOT NULL,
  `s_capacity` int NOT NULL,
  `fual` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `image`, `name`, `model`, `price`, `no_plate`, `company_name`, `s_capacity`, `fual`) VALUES
(1, 'download (1).png', '', 0, 0, '0', '', 0, ''),
(2, 'download (1).png', '', 0, 0, '0', '', 0, ''),
(3, '', '', 0, 0, '0', '', 0, ''),
(4, 'download (4).png', '', 0, 0, '0', '', 0, ''),
(5, 'download (4).png,download (5).png,download (6).png', '', 0, 0, '0', '', 0, ''),
(6, 'download (4).png,download (5).png,download (6).png', '', 0, 0, '0', '', 0, ''),
(7, 'front-left-side-47 (1).jpg,front-view-118.jpg,rear-view-119.jpg', '', 0, 0, '0', '', 0, ''),
(8, 'download (4).png,download (5).png,download (6).png', 'Land Rover', 2025, 1520, 'qweqweqwe', 'tata', 5, 'Petrol'),
(9, 'front-left-side-47 (1).jpg,front-left-side-47 (2).jpg,front-left-side-47.jpg,front-view-118 (1).jpg,front-view-118.jpg', 'ori', 1520, 1000, 'hj74lk55', 'tata', 6, 'Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `reguser`
--

CREATE TABLE `reguser` (
  `uid` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `mnumber` bigint NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expiry` datetime DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`uid`, `name`, `mnumber`, `email`, `password`, `token`, `reset_token`, `reset_expiry`, `is_verified`, `created_at`) VALUES
(32, 'Bhupat', 7359509387, 'bhupatvatukiya1@gmail.com', '789789789', '', NULL, '2025-02-04 18:55:11', NULL, '2025-02-05 03:01:29'),
(33, 'hardik', 7474747474, 'hr123@gmail.com', '123123123', '', NULL, NULL, NULL, '2025-02-05 03:01:29'),
(34, 'bhapti', 7878787878, 'bcacourcebca@gmail.com', '58585858', '', NULL, '2025-02-04 23:18:09', NULL, '2025-02-05 03:01:29'),
(40, 'mahadev', 9898989898, 'mm2028501@gmail.com', '123123123', '', NULL, NULL, 1, '2025-02-05 04:34:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_img`
--
ALTER TABLE `car_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_list`
--
ALTER TABLE `car_list`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reguser`
--
ALTER TABLE `reguser`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car_img`
--
ALTER TABLE `car_img`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `car_list`
--
ALTER TABLE `car_list`
  MODIFY `vid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reguser`
--
ALTER TABLE `reguser`
  MODIFY `uid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
