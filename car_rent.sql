-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 30, 2024 at 04:49 AM
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
-- Table structure for table `car_list`
--

DROP TABLE IF EXISTS `car_list`;
CREATE TABLE IF NOT EXISTS `car_list` (
  `name` varchar(255) NOT NULL,
  `modal` int NOT NULL,
  `price` int NOT NULL,
  `no_plate` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `seat` int NOT NULL,
  `fual` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_list`
--

INSERT INTO `car_list` (`name`, `modal`, `price`, `no_plate`, `company_name`, `image`, `seat`, `fual`) VALUES
('rolls-royce', 2023, 9999, 'GJ4BG4142', 'rolls-royce', 'land_rover_discovery_new1-1.jpg', 2, ''),
('jaguar', 2022, 8888, 'dfgghfg', 'abc', 'Jaguar-XE-facelift-review-12.jpg', 4, ''),
('Land Rover', 2024, 9999, 'GJ33AB1212', 'toyota', 'Deliveries_of_the_Land_Rover_Defender_90_will_start_after_some_time.jpg', 2, 'Diesel');

-- --------------------------------------------------------

--
-- Table structure for table `reguser`
--

DROP TABLE IF EXISTS `reguser`;
CREATE TABLE IF NOT EXISTS `reguser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mnumber` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`id`, `name`, `mnumber`, `email`, `password`) VALUES
(1, 'bhupat', 2147483647, 'bcacourcebca@gmail.com', '12345678'),
(2, 'bhupa', 2147483647, 'bcacourcebca@gmail.com', '12345678'),
(3, 'bhupa', 2147483647, 'bcacourcebca@gmail.com', '12345678'),
(5, 'sagar', 2147483647, 'bcacourcebca@gmail.com', '7359509387'),
(6, 'kajal', 2147483647, 'jay123@gmail.com', '11111111'),
(7, 'yara', 2147483647, 'khodal123@gmail.com', '123123123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
