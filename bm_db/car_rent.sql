-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2025 at 04:47 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rentnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bookingno` bigint NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `id` int NOT NULL,
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

INSERT INTO `booking` (`bookingno`, `userEmail`, `id`, `FromDate`, `ToDate`, `message`, `status`, `PostingDate`, `LastUpdationDate`) VALUES
(437452828, 'abhupatvatukiya1@gmail.com', 63, '2025-01-03', '2025-01-18', 'qwe', 0, '2025-01-27 05:22:42', '2025-01-27 05:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bname` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `bname`, `created_at`, `updated_at`) VALUES
(2, 'creata', '2025-01-05 11:43:22', '2025-01-05 11:43:22'),
(3, 'web', '2025-01-08 16:16:01', '2025-01-08 16:16:01'),
(4, 'u', '2025-01-12 16:32:11', '2025-01-12 16:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `car_list`
--

DROP TABLE IF EXISTS `car_list`;
CREATE TABLE IF NOT EXISTS `car_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_list`
--

INSERT INTO `car_list` (`id`, `name`, `brand`, `modal`, `price`, `no_plate`, `company_name`, `image`, `seat`, `fual`, `door`, `en_power`, `en_type`, `break_type`, `fual_capacity`, `mileage`) VALUES
(64, 'BMW X7', '', 2025, 13000, 'NL25LK2150', 'BMW', 'a.jpeg,b.jpeg,c.jpeg', 4, 'Petrol', 2, '300 Hp', 'Automatic', 'drum brakes', 40, 29),
(63, 'Audi Q7', '', 2023, 15000, 'GJ25IO2152', 'Audi', 'front.jpeg,rear.jpeg,right-cross.jpeg', 5, 'Petrol', 4, '500  Hp', 'Diesel engine', 'anti-lock brakes', 50, 12),
(62, 'Mahindra BE 6', '', 2025, 12000, 'GJ19BG2150', 'Mahindra', 'mahidra2.jpeg,mahindra1.jpeg,mahindra3.jpeg', 4, 'Petrol', 4, '500  Hp', 'Diesel engine', 'disc brakes', 40, 22),
(65, 'Mercedes-Benz EQS', '', 2024, 25000, 'MH02UK1542', 'Mercedes', 'mer1.jpeg,mer2.jpeg,mer3.jpeg', 5, 'Diesel', 4, '500  Hp', 'Diesel engine', 'drum brakes', 50, 8),
(66, 'Kia  carens', '', 2024, 11000, 'MH02UK1544', 'KIa', 'kia1.jpeg,kia2.jpeg,kia3.jpeg', 4, 'CNG', 2, '500  Hp', 'Automatic', 'drum brakes', 40, 120),
(67, '1dgd', 'creata', 2025, 1524, 'GJ33AB1212', '', 'front.jpeg,rear.jpeg,right-cross.jpeg,side.jpeg', 5, 'Petrol', 2, '300 Hp', 'Automatic', 'drum brakes', 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

DROP TABLE IF EXISTS `demo`;
CREATE TABLE IF NOT EXISTS `demo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `model` int NOT NULL,
  `price` int NOT NULL,
  `no_plate` varchar(20) NOT NULL,
  `company_name` varchar(80) NOT NULL,
  `s_capacity` int NOT NULL,
  `fual` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

DROP TABLE IF EXISTS `reguser`;
CREATE TABLE IF NOT EXISTS `reguser` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mnumber` bigint NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`ID`, `name`, `mnumber`, `email`, `password`) VALUES
(39, 'rahul', 9824545454, 'rahul123@gmail.com', '123123123'),
(38, 'Bhupat', 7359509387, 'abhupatvatukiya1@gmail.com', '123123123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
