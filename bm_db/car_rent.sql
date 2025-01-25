-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2025 at 04:48 PM
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
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bookingno` bigint NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `vid` int NOT NULL,
  `FromDate` varchar(20) NOT NULL,
  `ToDate` varchar(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` int NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bookingno`, `userEmail`, `vid`, `FromDate`, `ToDate`, `message`, `status`, `PostingDate`, `LastUpdationDate`) VALUES
(26, 767196256, '', 49, '2025-01-07', '2025-01-18', 'sda', 0, '2025-01-24 02:22:03', '2025-01-24 02:22:03'),
(27, 608641699, 'asdbhupatvatukiya1@gmail.com', 49, '2025-01-04', '2025-01-09', 'assda', 0, '2025-01-25 16:45:32', '2025-01-25 16:45:32'),
(25, 465211289, 'abhupatvatukiya1@gmail.com', 51, '2025-01-30', '2025-01-24', 'wsd', 1, '2025-01-20 05:33:30', '2025-01-20 05:33:30'),
(24, 163753437, 'abhupatvatukiya1@gmail.com', 50, '2025-01-05', '2025-01-05', 'fgjh', 1, '2025-01-19 11:53:58', '2025-01-19 11:53:58'),
(23, 903317739, 'abhupatvatukiya1@gmail.com', 50, '2025-01-01', '2025-01-04', 'cvbh', 1, '2025-01-19 11:52:58', '2025-01-19 11:52:58');

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
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_list`
--

INSERT INTO `car_list` (`id`, `name`, `modal`, `price`, `no_plate`, `company_name`, `image`, `seat`, `fual`, `door`, `en_power`, `en_type`, `break_type`, `fual_capacity`, `mileage`) VALUES
(49, 'bmw x7', 2015, 1500, 'dfw', 'bmw', 'a.jpeg,b.jpeg,c.jpeg,d.jpeg', 5, 'type', 0, '', '', '', 0, 0),
(50, 'audi q7', 2024, 25000, '1234', 'audi', 'front.jpeg,rear.jpeg,right-cross.jpeg,side.jpeg', 6, 'CNG', 0, '', '', '', 0, 0),
(47, 'audi x7', 2121, 111111, 'GJ33AB1212', 'audi', 'download (1).png,download (2).png,download (3).png,download (4).png', 6, 'Diesel', 0, '', '', '', 0, 0),
(60, 'Land Rover new Model', 2026, 25000, 'GJ33AB1212', 'Tata', 'b.jpeg,c.jpeg,d.jpeg', 4, 'Diesel', 4, '500  Hp', 'Automatic', 'drum brakes', 40, 25);

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
  `mnumber` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`ID`, `name`, `mnumber`, `email`, `password`) VALUES
(31, 'Bhupat', 2147483647, 'asdbhupatvatukiya1@gmail.com', '123123123'),
(27, 'bhupat', 2147483647, 'bhupatvatukiya1@gmail.com', '1414141414'),
(25, 'kalu', 2147483647, 'kalu@123gmail.com', '1515151515'),
(26, 'vatukiya', 2147483647, 'abhupatvatukiya1@gmail.com', '1111111111'),
(24, 'jadav', 2147483647, 'jadav123@gmail.com', '1515151515'),
(29, 'Bhupat', 2147483647, 'bcacourcebca@gmail.com', '123123123'),
(30, 'jayraj', 2147483647, 'jayraj1@gmail.com', '12345678');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
