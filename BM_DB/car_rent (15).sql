-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2025 at 07:27 PM
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
  `FromDate` datetime NOT NULL,
  `ToDate` datetime NOT NULL,
  `message` varchar(200) NOT NULL,
  `status` int NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pickup` varchar(255) NOT NULL,
  `dropoff` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `did` int NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `payment` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bookingno`, `userEmail`, `vid`, `FromDate`, `ToDate`, `message`, `status`, `PostingDate`, `LastUpdationDate`, `pickup`, `dropoff`, `did`, `order_id`, `payment`) VALUES
(164, 5338, 'mm2028501@gmail.com', 90, '2025-02-14 23:21:00', '2025-02-27 23:21:00', '', 0, '2025-02-13 17:51:29', '2025-02-13 17:51:29', 'Botad', 'Botad', 3, '', 0),
(167, 1216, 'mm2028501@gmail.com', 86, '2025-02-15 00:22:00', '2025-02-15 00:22:00', '', 0, '2025-02-13 18:53:07', '2025-02-13 18:53:07', 'Botad', 'Botad', 5, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

DROP TABLE IF EXISTS `booking_details`;
CREATE TABLE IF NOT EXISTS `booking_details` (
  `id` int NOT NULL,
  `bookingno` int NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `vid` int NOT NULL,
  `FromDate` datetime NOT NULL,
  `ToDate` datetime NOT NULL,
  `pickup` varchar(255) NOT NULL,
  `dropoff` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `bname` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bid`, `bname`, `created_at`, `updated_at`) VALUES
(3, 'webaggx', '2025-01-08 16:16:01', '2025-01-08 16:16:01'),
(5, 'tata', '2025-02-01 10:58:12', '2025-02-01 10:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `car_img`
--

DROP TABLE IF EXISTS `car_img`;
CREATE TABLE IF NOT EXISTS `car_img` (
  `id` int NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `accessories` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_img`
--

INSERT INTO `car_img` (`id`, `img`, `accessories`) VALUES
(13, 'side.jpeg  ', 'Air Conditioner, Power Steering'),
(11, 'right-cross.jpeg  ', ''),
(12, 'front.jpeg,right-cross.jpeg  ', ''),
(10, 'front.jpeg,rear.jpeg,right-cross.jpeg  ', ''),
(14, 'front.jpeg,rear.jpeg,right-cross.jpeg,side.jpeg  ', ''),
(15, 'front.jpeg,rear.jpeg,right-cross.jpeg  ', ''),
(16, 'front.jpeg,rear.jpeg,front.jpeg  ', ''),
(17, 'front.jpeg  ', ''),
(18, 'front.jpeg,rear.jpeg,right-cross.jpeg  ', ''),
(19, '', 'CD Player, Power Door Locks'),
(20, '', 'Crash Sensor'),
(21, '', 'Power Steering');

-- --------------------------------------------------------

--
-- Table structure for table `car_list`
--

DROP TABLE IF EXISTS `car_list`;
CREATE TABLE IF NOT EXISTS `car_list` (
  `vid` int NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `modal` int NOT NULL,
  `price` int NOT NULL,
  `no_plate` varchar(255) NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `seat` int NOT NULL,
  `fual` varchar(255) NOT NULL,
  `door` int NOT NULL,
  `en_power` varchar(255) NOT NULL,
  `en_type` varchar(255) NOT NULL,
  `break_type` varchar(255) NOT NULL,
  `fual_capacity` int NOT NULL,
  `mileage` int NOT NULL,
  `status` int NOT NULL,
  `accessories` varchar(255) NOT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car_list`
--

INSERT INTO `car_list` (`vid`, `cname`, `modal`, `price`, `no_plate`, `brand`, `image`, `seat`, `fual`, `door`, `en_power`, `en_type`, `break_type`, `fual_capacity`, `mileage`, `status`, `accessories`) VALUES
(86, 'Audia1', 20211, 120001, 'GJ33AB12121', 'tata', 'thar2.jpg,thar3.jpg,thar4.jpg,amritsar.jpg,audi_logo.jpg', 331, 'Petrol', 2, '300', 'Diesel engine', 'Carbon break', 20, 1010, 0, 'CD Player, Driver Airbag'),
(87, 'thar', 2022, 2500, 'gj19hj7863', 'tata', 'audi1.jpg', 5, 'Petrol', 4, '500', 'Diesel engine', 'disc break', 20, 4, 0, ''),
(88, 'Land Rover', 2025, 100, 'GJ33AB1212', 'webagg', 'audi1.jpg,mahindra1.jpeg,gallery_3.jpg,mahindra3.jpeg', 4, 'CNG', 2, '261', 'Diesel engine', 'disc break', 40, 8, 0, ''),
(89, 'audi x7', 1234, 10, 'GJ33AB1212', 'webagg', 'front-view-118.jpg,front-left-side-47 (1).jpg,gallery_4.jpg,gallery_9.jpg', 3, 'Diesel', 2, '500', 'Diesel engine', 'disc break', 40, 12, 0, ''),
(90, 'Kia  carens', 1234, 1234, '1111', 'tata', 'front-left-side-47.jpg,front-view-118 (1).jpg,a.jpeg,c.jpeg', 123, 'Diesel', 4, '500', 'Diesel engine', 'ABS break', 20, 12, 0, ''),
(92, '1dgd', 1213, 12212, '123', 'webaggx', '200-2001519_xuv-700-price-in-india-2019-hd-png.png,gallery_10.jpg,606-6067459_bmw-x7-price-in-india-2020-hd-png.png,about.png', 12, 'Petrol', 5, '261 Hp', 'Diesel engine', 'Carbon break', 40, 10, 0, 'CD Player, Power Door Locks, Driver Airbag, Brake Assist, Passenger Airbag, Crash Sensor, Leather Seats'),
(93, 'Land Rover123', 789, 789, '789', 'webaggx', 'ad_car.png,gallery_1.jpg,GLC_1.jpg', 789, 'Petrol', 2, '261', 'Diesel engine', 'Carbon break', 20, 7, 0, 'Air Conditioner, Power Steering, CD Player, Power Door Locks, Driver Airbag, Central Locking, AntiLock Braking System, Brake Assist, Passenger Airbag, Crash Sensor, Power Windows');

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
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `did` int NOT NULL AUTO_INCREMENT,
  `dfname` varchar(255) NOT NULL,
  `dlname` varchar(255) NOT NULL,
  `fnumber` bigint NOT NULL,
  `hprice` int NOT NULL,
  `dprice` int NOT NULL,
  `type_licence` varchar(255) NOT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pin` bigint NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `licence_pdf` varchar(255) NOT NULL,
  `adhar_pdf` varchar(255) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`did`, `dfname`, `dlname`, `fnumber`, `hprice`, `dprice`, `type_licence`, `profile`, `address`, `city`, `state`, `pin`, `status`, `created_at`, `updated_at`, `licence_pdf`, `adhar_pdf`) VALUES
(3, 'Vatukiya', 'Bhupat', 7359509387, 200, 1200, 'passenger', 'driver/WhatsApp Image 2025-02-12 at 8.30.26 PM.jpeg', 'Hifli Sheri No.4 Botad', 'Botad', 'Gujarat', 364710, 1, '2025-02-11 07:56:25', '2025-02-13 18:48:21', '', ''),
(4, 'hardik', 'vatukiya', 9106265263, 100, 1000, 'four_wheeler', 'download (2).jpeg,licence.png,profile.jpeg', 'GEDI,GEDI', 'SURENDRANAGAR', 'GUJARAT', 363421, 1, '2025-02-11 07:57:34', '2025-02-13 18:00:41', '', ''),
(5, 'Vatukiya bhai', 'Bhupat', 7359509387, 1230, 12, 'passenger', 'driver/WhatsApp Image 2025-02-12 at 8.30.26 PM.jpeg', 'Hifli Sheri No.4 Botad', 'Botad', 'Gujarat', 364710, 1, '2025-02-13 04:35:08', '2025-02-13 18:52:17', 'driver/VatukiyaBhupatResume (3).pdf', 'driver/HirenLakum(CV) (1).pdf'),
(6, 'Vikrambhai', 'Dhoraliya', 7359509387, 456, 546, 'passenger', '', 'GEDI,GEDI', 'SURENDRANAGAR', 'GUJARAT', 363421, 1, '2025-02-13 04:48:46', '2025-02-13 18:49:34', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reguser`
--

DROP TABLE IF EXISTS `reguser`;
CREATE TABLE IF NOT EXISTS `reguser` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mnumber` bigint NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expiry` datetime DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`uid`, `name`, `mnumber`, `email`, `password`, `token`, `reset_token`, `reset_expiry`, `is_verified`, `created_at`) VALUES
(32, 'Bhupat', 7359509387, 'bhupatvatukiya1@gmail.com', '789789789', '', 'f12f8f62c66b613417c9ad5f6290f11a21d64798394e01bfb1454762367d05d0984146eb0c3d4d46884a335b3a5666fb10a3', '2025-02-05 12:13:40', NULL, '2025-02-05 03:01:29'),
(33, 'hardik', 7474747474, 'hr123@gmail.com', '123123123', '', NULL, NULL, NULL, '2025-02-05 03:01:29'),
(40, 'mahadev', 9898989898, 'mm2028501@gmail.com', '123123123', '', NULL, NULL, 1, '2025-02-05 04:34:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
