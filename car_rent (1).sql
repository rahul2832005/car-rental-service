-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2025 at 05:35 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_list`
--

INSERT INTO `car_list` (`id`, `name`, `modal`, `price`, `no_plate`, `company_name`, `image`, `seat`, `fual`) VALUES
(1, 'Audi Q7', 2024, 9999, 'GJ04BG4142', 'AUDI', 'land_rover_discovery_new1-1.jpg', 2, 'Diesel'),
(2, 'BMW x7', 2020, 8888, 'GJ4BG4141', 'bmw', 'Jaguar-XE-facelift-review-12.jpg', 4, 'Petrol'),
(3, 'Jaguar', 2023, 9990, 'GJ33AB1111', 'Tata', 'Deliveries_of_the_Land_Rover_Defender_90_will_start_after_some_time.jpg', 2, 'CNG'),
(4, 'hardik', 4, 4444, '10', 'bavaliya', 'IMG-20230503-WA0026.jpg', 4, 'Petrol');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

DROP TABLE IF EXISTS `demo`;
CREATE TABLE IF NOT EXISTS `demo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `image`) VALUES
(10, 'amritsar.jpg,bengaluru.jpg,demo.png');

-- --------------------------------------------------------

--
-- Table structure for table `rahul`
--

DROP TABLE IF EXISTS `rahul`;
CREATE TABLE IF NOT EXISTS `rahul` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rahul`
--


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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`ID`, `name`, `mnumber`, `email`, `password`) VALUES
(1, 'bhupathupat', 2147483647, 'bhupatvatukiya1@gmail.com', '12121212'),
(2, 'jay', 2147483647, 'jay123@gmail.com', '123456789'),
(3, 'bhupathupat', 2147483647, 'bhupatvatukiya1@gmail.com', '12121212'),
(4, 'sagar', 2147483647, 'jau@123gmail.com', '123123123');

-- --------------------------------------------------------
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
