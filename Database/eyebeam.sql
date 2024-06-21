-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 10:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eyebeam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aname` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `password`, `email`, `image`) VALUES
(1, 'admin', 'admin123', 'admin123@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `bid` int(11) NOT NULL,
  `bname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`bid`, `bname`) VALUES
(1, 'Eyebeam'),
(2, 'PRADA'),
(3, 'Versace'),
(4, 'Ray-Ban'),
(5, 'TitanEye+'),
(6, 'Gucci');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(200) NOT NULL,
  `pname` text NOT NULL,
  `price` int(200) NOT NULL,
  `colour` varchar(200) NOT NULL,
  `qty` int(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `image` varchar(500) NOT NULL,
  `pid` int(200) NOT NULL,
  `uid` int(200) NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `pname`, `price`, `colour`, `qty`, `size`, `image`, `pid`, `uid`, `brand`) VALUES
(40, 'p6', 500, 'red', 4, '12', 'upload/1.2.1.jpg', 31, 7, 'eyebeam'),
(65, 'Matte Black Gunmetal Full Rim Round Eyeglasses', 1700, 'Black', 1, 'Woman', 'upload/m-2.1.1.jpg', 39, 8, 'titaneye');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `uname` text NOT NULL,
  `email` text NOT NULL,
  `comment` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `uname`, `email`, `comment`, `time`) VALUES
(1, 11, 'hardik', 'hardik123@gmail.com', 'Nice website but some issues !', '2023-04-04 08:47:29'),
(2, 13, 'Tilak', 'tilak123@gmail.com', 'Best Sunglasses', '2023-04-15 12:19:06'),
(3, 13, 'Rohit', 'Rohit123@gmail.com', 'Deliver wrong product', '2023-04-15 12:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_item`
--

CREATE TABLE `ordered_item` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(200) NOT NULL,
  `aid` int(11) NOT NULL,
  `pname` text NOT NULL,
  `price` int(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `colour` varchar(200) NOT NULL,
  `qty` int(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `odered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered_item`
--

INSERT INTO `ordered_item` (`oid`, `pid`, `uid`, `aid`, `pname`, `price`, `size`, `colour`, `qty`, `image`, `odered`) VALUES
(70, 106, 11, 55, 'Black Full Rim Square Sunglasses', 1800, 'Small', 'Black', 1, 'upload/k-8.1.1.jpg', '2023-04-07 09:13:29'),
(71, 69, 11, 55, 'Matte Black Gunmetal Full Rim Round Eyeglasses', 1800, 'Small', 'Black', 1, 'upload/f-3.1.1.jpg', '2023-04-07 09:13:29'),
(72, 59, 11, 57, 'Silver Full Rim Round Sunglasses', 1600, 'Medium', 'Grey', 1, 'upload/m-8.1.1.jpg', '2023-04-15 06:54:19'),
(73, 75, 11, 58, 'Blue Rimless Square Eyeglasses', 1700, 'Small', 'Blue', 5, 'upload/f-6.1.1.jpg', '2023-04-15 12:38:44'),
(74, 52, 11, 59, 'Blue Transparent Full Rim Aviator Eyeglasses', 1200, 'Large', 'Blue', 3, 'upload/m-3.1.1.jpg', '2023-04-15 12:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

CREATE TABLE `ordertbl` (
  `order_id` int(100) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `nearby` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertbl`
--

INSERT INTO `ordertbl` (`order_id`, `fname`, `lname`, `mobile`, `email`, `address`, `nearby`, `city`, `state`, `zip`, `date`, `uid`) VALUES
(19, 'rohit', '', '8980785759', 'rohitrwl7698@gamail.com', 'jvjh vhgcvcch', '', '', '', '395010', '2023-03-22 07:42:28', 7),
(20, 'rohit', '', '8980785759', 'rohitrwl7698@gamail.com', 'jvjh vhgcvcch', '', '', '', '395010', '2023-03-22 07:42:28', 7),
(21, 'rohit', '', '8980785759', 'rohitrwl7698@gamail.com', 'jvjh vhgcvcch', '', '', '', '395010', '2023-03-22 07:42:28', 7),
(22, 'rohit', '', '8980785759', 'rohitrwl7698@gamail.com', 'jvjh vhgcvcch', '', '', '', '395010', '2023-03-22 07:42:28', 7),
(23, 'rohit', '', '8980785759', 'rohitrwl7698@gamail.com', 'jvjh vhgcvcch', '', '', '', '395010', '2023-03-22 07:42:28', 7),
(24, 'rohit', '', '6335336778', 'rohit123@gmail.com', 'vrajbhumi ', '', '', '', '395010', '2023-03-22 07:42:28', 8),
(25, '', '', '8980785359', 'rawalrohit@gmail.com', 'vrajbhumi complex', '', '', '', '', '2023-03-22 07:42:28', 8),
(26, '', '', '787878787878', 'rawalrohit@gmail.com', 'asbcs', '', '', '', '', '2023-03-22 07:42:28', 8),
(27, 'tiLAK', '66666666666666', '66666666666666', 'SONDAGARTILAK@123.COM', 'YOGESHWAR SOC', 'MATHURA GATE', 'SURAT', '', '395009', '2023-03-22 07:48:58', 8),
(28, 'hardik', 'viras', '8899899898', 'hardik@123', 'yogeshwar', 'katargam darwaja', 'surat', '', '395004', '2023-03-22 08:46:13', 8),
(29, 'hardik', 'viras', '8899899898', 'hardik@123', 'yogeshwar', 'katargam darwaja', 'surat', '', '395004', '2023-03-22 08:47:30', 8),
(30, 'tilak', 'SONDAGAR', '999999999999999', 'rawalrohit@gmail.com', 'vrajbhumi complex', 'MATHURA GATE', 'surat', '', '395009', '2023-03-22 09:51:27', 8),
(31, 'kamal', 'shingh', '0000000', 'ruchu@123', 'dindoli', 'manibhadra', 'surat', '', '400040404', '2023-03-22 09:56:29', 8),
(32, 'kamal', 'shingh', '0000000', 'ruchu@123', 'dindoli', 'manibhadra', 'surat', '', '400040404', '2023-03-22 10:21:38', 8),
(33, 'hardik', 'vva', 'sdsddsds', 'rohit@12.com', 'dasc', 'fdfs', 'sdsd', '', 'sdsdsd', '2023-03-22 10:28:14', 8),
(34, 'rohit', 'rawal', '4343343434343', 'rawalrohit@gmail.com', 'hsjhdhsjsjd', 'nxknxsxs', 'sdsd', '', '343434', '2023-03-22 11:10:57', 8),
(35, 'hardik', 'viras', '8899899898', 'rohit@12.com', 'dindoli', 'katargam darwaja', 'surat', '', '395009', '2023-03-22 14:46:06', 8),
(36, 'tilak', 'viras', '8899899898', 'rohit123@gmail.com', 'dindoli', 'katargam darwaja', 'surat', '', '395004', '2023-03-23 09:08:04', 8),
(37, 'hardik', 'viras', '8899899898', 'rawalrohit@gmail.com', 'dindoli', 'katargam darwaja', 'surat', '', '395004', '2023-03-23 09:10:20', 8),
(38, 'd', 'dd', '8899899898', 'rohit123@gmail.com', 'dindoli', 'katargam darwaja', 'surat', '', '395004', '2023-03-24 14:52:02', 8),
(39, 'tilak', 'SONDAGAR', '4343343434343', 'rohit123@gmail.com', 'yogeshwar', 'katargam darwaja', 'surat', '', '395009', '2023-03-25 06:16:59', 9),
(40, 'hardik', 'viras', '8899899898', 'rawalrohit@gmail.com', 'dindoli', 'katargam darwaja', 's', '', '395004', '2023-03-25 06:40:38', 9),
(41, 'hardik', 'viras', '0000000', 'rohit123@gmail.com', 'dindoli', 'manibhadra', 'surat', '', '395009', '2023-03-25 06:45:16', 9),
(42, 'hardik', 'SONDAGAR', '4343343434343', 'rohit123@gmail.com', 'yogeshwar', 'fdfs', 's', '', '400040404', '2023-03-25 06:49:19', 9),
(43, 'hardik', 'viras', '9313493134', 'hardik123@gmail.com', 'dindoli', 'katargam darwaja', 'surat', '', '395009', '2023-03-26 04:40:21', 11),
(44, 'tilak', 'sondagar', '9911199111', 'virashardik2003@gmail.com', 'prime market', 'adajan', 'surat', '', '395010', '2023-03-26 12:29:59', 12),
(45, 'rohit', 'rawal', '8899889988', 'rawalrohit8980@gmail.com', 'yogi nagar', 'dindoli', 'surat', '', '395001', '2023-03-26 12:42:50', 13),
(46, 'tilak', 'sondagar', '9911199111', 'rawalrohit8980@gmail.com', '145 UDAY NAGAR SOCIETY-2 NEAR MADHVANAND ASHRAM KATARGAM Surat Gujarat', 'karatgam', 'Surat', '', '395004', '2023-03-26 13:31:05', 11),
(47, 'tilak', 'sondagar', '9587654321', 'tilak1@gmail.com', 'pal', 'star bazzar', 'surat', '', '395009', '2023-03-27 05:35:56', 12),
(48, 'tilak', 'SONDAGAR', '9876543213', 'tilak1@gmail.com', 'pal', 'star bazzar', 'surat', '', '395009', '2023-03-27 05:36:58', 12),
(49, 'HARDIK', 'VIRAS', '8888888999', 'rawalrohit@gmail.com', 'yogeshwar', 'PAL', 'SUART', '', '395010', '2023-03-27 06:26:51', 14),
(50, 'vishal', 'bsdk', '565984749862682896023489', 'VISDIX@TUSHAY.COM', 'ravannagar', 'gannaLA', 'MIRZAPUR', '', '420840', '2023-03-27 10:22:08', 12),
(51, 'Hardik', 'viras', '9313493134', 'Hardik123@gmail.com', '12 VR Mall ', 'vesu', 'surat', '', '395010', '2023-04-04 10:04:06', 11),
(52, 'Hardik', 'viras', '9313493134', 'Hardik123@gmail.com', '12 VR Mall ', 'vesu', 'surat', '', '395010', '2023-04-05 16:10:16', 11),
(53, 'Hardik', 'viras', '9313493200', 'Hardik123@gmail.com', '12 VR Mall ', 'vesu', 'surat', '', '395010', '2023-04-07 09:05:38', 11),
(54, 'Hardik', 'viras', '93134932004', 'Hardik123@gmail.com', '12 VR Mall ', 'vesu', 'surat', '', '395010', '2023-04-07 09:12:14', 11),
(55, 'Hardik', 'viras', '9313493200', 'Hardik123@gmail.com', '145 uday ', 'vesu', 'surat', '', '395010', '2023-04-07 09:13:22', 11),
(56, 'Hardik', 'viras', '9313493200', 'Hardik123@gmail.com', 'hello', 'hy990', 'surat', 'gujarat', '395010', '2023-04-15 06:51:40', 11),
(57, 'Hardik', 'viras', '9313493200', 'Hardik123@gmail.com', '145 uday ', 'katargam', 'surat', 'gujarat', '395004', '2023-04-15 06:52:04', 11),
(58, 'Hardik', 'viras', '9313493200', 'Hardik123@gmail.com', 'hello', 'hy990', 'surat', 'gujarat', '395010', '2023-04-15 12:37:50', 11),
(59, 'Hardik', 'viras', '9313493200', 'Hardik123@gmail.com', '145 uday ', 'katargam', 'surat', 'gujarat', '395004', '2023-04-15 12:40:31', 11);

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `payid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `type` text NOT NULL,
  `acc` int(11) NOT NULL,
  `status` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`payid`, `orderid`, `type`, `acc`, `status`, `time`) VALUES
(1, 0, 'Cash on Delivery', 0, 'Successfull', '2023-03-22 10:29:59'),
(2, 0, 'Cash on Delivery', 0, 'Successfull', '2023-03-23 09:08:10'),
(3, 39, 'Debit / Credit Card ', 1212121212, 'Successfull', '2023-03-25 06:28:18'),
(4, 40, 'Cash on Delivery', 0, 'Successfull', '2023-03-25 06:42:16'),
(5, 41, 'UPI', 0, 'Successfull', '2023-03-25 06:46:37'),
(6, 42, 'Debit / Credit Card ', 1212121212, 'Successfull', '2023-03-25 06:50:25'),
(7, 43, 'Cash on Delivery', 0, 'Successfull', '2023-03-26 04:40:29'),
(8, 44, 'Debit / Credit Card ', 2147483647, 'Successfull', '2023-03-26 12:31:03'),
(9, 45, 'UPI', 0, 'Successfull', '2023-03-26 12:43:13'),
(10, 47, 'Cash on Delivery', 0, 'Successfull', '2023-03-27 05:36:08'),
(11, 48, 'Debit / Credit Card ', 2147483647, 'Successfull', '2023-03-27 05:38:13'),
(12, 49, 'Cash on Delivery', 0, 'Successfull', '2023-03-27 06:28:40'),
(13, 50, 'Debit / Credit Card ', 0, 'Successfull', '2023-03-27 10:22:38'),
(14, 51, 'Cash on Delivery', 0, 'Successfull', '2023-04-04 10:04:11'),
(15, 52, 'Cash on Delivery', 0, 'Successfull', '2023-04-05 16:10:26'),
(16, 53, 'Cash on Delivery', 0, 'Successfull', '2023-04-07 09:05:40'),
(17, 54, 'Cash on Delivery', 0, 'Successfull', '2023-04-07 09:12:22'),
(18, 55, 'Cash on Delivery', 0, 'Successfull', '2023-04-07 09:13:29'),
(19, 57, 'Debit / Credit Card ', 2147483647, 'Successfull', '2023-04-15 06:54:19'),
(20, 58, 'Debit / Credit Card ', 2147483647, 'Successfull', '2023-04-15 12:38:44'),
(21, 58, 'Cash on Delivery', 0, 'Cash on Delivery', '2023-04-15 12:39:44'),
(22, 59, 'Cash on Delivery', 0, 'Cash on Delivery', '2023-04-15 12:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(10) NOT NULL,
  `pname` text NOT NULL,
  `brand` text NOT NULL,
  `price` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `for` text NOT NULL,
  `size` text NOT NULL,
  `type` varchar(200) NOT NULL,
  `colour` varchar(200) NOT NULL,
  `shape` varchar(200) NOT NULL,
  `material` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `img11` text NOT NULL,
  `img12` text NOT NULL,
  `img13` text NOT NULL,
  `img14` text NOT NULL,
  `img15` text NOT NULL,
  `img16` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `brand`, `price`, `quantity`, `for`, `size`, `type`, `colour`, `shape`, `material`, `description`, `img11`, `img12`, `img13`, `img14`, `img15`, `img16`) VALUES
(43, 'Matte Black Gunmetal Full Rim Round Eyeglasses', 'Eyebeam', 1700, 50, 'Man', 'Small', 'Eyeglass', 'Black', 'Round', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable but they all also protect your eyes. ', 'upload/m-2.1.1.jpg', 'upload/m-2.1.2.jpg', 'upload/m-2.1.5.jpg', 'upload/m-2.1.6.jpg', 'upload/m-2.1.3.jpg', 'upload/m-2.1.4.jpg'),
(44, 'Blue Full Rim Rectangle Eyeglasses', 'Gucci', 1800, 50, 'Man', 'Small', 'Eyeglass', 'Blue', 'Rectangle', 'TR90 (Flexible Light-Weight)', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-5.1.1.jpg', 'upload/m-5.1.2.jpg', 'upload/m-5.1.5.jpg', 'upload/m-5.1.6.jpg', 'upload/m-5.1.3.jpg', 'upload/m-5.1.4.jpg'),
(45, 'Purple Silver Full Rim Round Eyeglasses', 'Eyebeam', 1700, 49, 'Man', 'Medium', 'Eyeglass', 'Purple ', 'Round', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-2.2.1.jpg', 'upload/m-2.2.2.jpg', 'upload/m-2.2.5.jpg', 'upload/m-2.2.6.jpg', 'upload/m-2.2.3.jpg', 'upload/m-2.2.4.jpg'),
(46, 'Brown Full Rim Round Eyeglasses', 'Eyebeam', 1700, 45, 'Man', 'Large', 'Eyeglass', 'Brown', 'Round', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-2.3.1.jpg', 'upload/m-2.3.2.jpg', 'upload/m-2.3.5.jpg', 'upload/m-2.3.6.jpg', 'upload/m-2.3.3.jpg', 'upload/m-2.3.4.jpg'),
(47, 'Transparent Blue Full Rim Hexagonal Eyeglasses', 'Rayban', 1200, 25, 'Man', 'Small', 'Eyeglass', 'Blue', 'Hexagonal', 'TR90 & Acetate', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-1.1.1.jpg', 'upload/m-1.1.2.jpg', 'upload/m-1.1.5.jpg', 'upload/m-1.1.6.jpg', 'upload/m-1.1.3.jpg', 'upload/m-1.1.4.jpg'),
(48, 'Transparent GreyFull Rim Hexagonal Eyeglasses', 'Rayban', 1200, 50, 'Man', 'Medium', 'Eyeglass', 'Grey', 'Hexagonal', 'TR90 & Acetate', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-1.2.1.jpg', 'upload/m-1.2.2.jpg', 'upload/m-1.2.5.jpg', 'upload/m-1.2.6.jpg', 'upload/m-1.2.3.jpg', 'upload/m-1.2.4.jpg'),
(49, 'Blue Rimless Square Eyeglasses', 'Prada', 2000, 47, 'Man', 'Small', 'Eyeglass', 'Blue', 'Square', 'Stainless Steel (Simple Matte & Shiny)', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-6.1.1.jpg', 'upload/m-6.1.2.jpg', 'upload/m-6.1.5.jpg', 'upload/m-6.1.6.jpg', 'upload/m-6.1.3.jpg', 'upload/m-6.1.4.jpg'),
(50, 'Black Rimless Square Eyeglasses', 'Prada', 2000, 50, 'Man', 'Medium', 'Eyeglass', 'Black', 'Square', 'Stainless Steel (Simple Matte & Shiny)', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-6.2.1.jpg', 'upload/m-6.2.2.jpg', 'upload/m-6.2.5.jpg', 'upload/m-6.2.6.jpg', 'upload/m-6.2.3.jpg', 'upload/m-6.2.4.jpg'),
(51, 'Silver Rimless Square Eyeglasses', 'Prada', 2000, 50, 'Man', 'Large', 'Eyeglass', 'Grey', 'Square', 'Stainless Steel (Simple Matte & Shiny)', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-6.3.1.jpg', 'upload/m-6.3.2.jpg', 'upload/m-6.3.5.jpg', 'upload/m-6.3.6.jpg', 'upload/m-6.3.3.jpg', 'upload/m-6.3.4.jpg'),
(52, 'Blue Transparent Full Rim Aviator Eyeglasses', 'Titaneye+', 1200, 17, 'Man', 'Large', 'Eyeglass', 'Blue', 'Aviator', 'TR90 & Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-3.1.1.jpg', 'upload/m-3.1.2.jpg', 'upload/m-3.1.5.jpg', 'upload/m-3.1.6.jpg', 'upload/m-3.1.3.jpg', 'upload/m-3.1.4.jpg'),
(53, 'Gunmetal Rimless Rectangle Eyeglasses', 'Titaneye+', 1500, 50, 'Man', 'Small', 'Eyeglass', 'Brown', 'Rectangle', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-4.1.1.jpg', 'upload/m-4.1.2.jpg', 'upload/m-4.1.5.jpg', 'upload/m-4.1.6.jpg', 'upload/m-4.1.3.jpg', 'upload/m-4.1.4.jpg'),
(54, 'Gunmetal Rimless Rectangle Eyeglasses', 'Titaneye+', 1500, 50, 'Man', 'Medium', 'Eyeglass', 'Gold', 'Rectangle', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-4.2.1.jpg', 'upload/m-4.2.2.jpg', 'upload/m-4.2.5.jpg', 'upload/m-4.2.6.jpg', 'upload/m-4.2.3.jpg', 'upload/m-4.2.4.jpg'),
(55, 'Matte Blue Full Rim Clubmaster Sunglasses', 'Gucci', 1200, 45, 'Man', 'Small', 'Sunglass', 'Blue', 'Clubmaster', 'Polycarbonate & Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-7.1.1.jpg', 'upload/m-7.1.2.jpg', 'upload/m-7.1.5.jpg', 'upload/m-7.1.6.jpg', 'upload/m-7.1.3.jpg', 'upload/m-7.1.4.jpg'),
(56, 'Matte Grey Full Rim Clubmaster Sunglasses', 'Gucci', 1200, 50, 'Man', 'Medium', 'Sunglass', 'Grey', 'Clubmaster', 'Polycarbonate & Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-7.2.1.jpg', 'upload/m-7.2.2.jpg', 'upload/m-7.2.5.jpg', 'upload/m-7.2.6.jpg', 'upload/m-7.2.3.jpg', 'upload/m-7.2.4.jpg'),
(57, 'Gold Black Full Rim Clubmaster Sunglasses', 'Gucci', 1200, 50, 'Man', 'Large', 'Sunglass', 'Gold', 'Clubmaster', 'Polycarbonate & Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-7.3.1.jpg', 'upload/m-7.3.2.jpg', 'upload/m-7.3.5.jpg', 'upload/m-7.3.6.jpg', 'upload/m-7.3.3.jpg', 'upload/m-7.3.4.jpg'),
(58, 'Gold Full Rim Round Sunglasses', 'Rayban', 1600, 49, 'Man', 'Small', 'Sunglass', 'Gold', 'Round', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-8.2.1.jpg', 'upload/m-8.2.2.jpg', 'upload/m-8.2.5.jpg', 'upload/m-8.2.6.jpg', 'upload/m-8.2.3.jpg', 'upload/m-8.2.4.jpg'),
(59, 'Silver Full Rim Round Sunglasses', 'Rayban', 1600, 49, 'Man', 'Medium', 'Sunglass', 'Grey', 'Round', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-8.1.1.jpg', 'upload/m-8.1.2.jpg', 'upload/m-8.1.5.jpg', 'upload/m-8.1.6.jpg', 'upload/m-8.1.3.jpg', 'upload/m-8.1.4.jpg'),
(60, 'Gunmetal Full Rim Aviator Sunglasses', 'Prada', 2500, 50, 'Man', 'Small', 'Sunglass', 'Black', 'Aviator', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-9.1.1.jpg', 'upload/m-9.1.2.jpg', 'upload/m-9.1.5.jpg', 'upload/m-9.1.6.jpg', 'upload/m-9.1.3.jpg', 'upload/m-9.1.4.jpg'),
(61, 'Gunmetal Green Full Rim Aviator Sunglasses', 'Prada', 2500, 50, 'Man', 'Small', 'Sunglass', 'Green', 'Aviator', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-9.2.1.jpg', 'upload/m-9.2.2.jpg', 'upload/m-9.2.5.jpg', 'upload/m-9.2.6.jpg', 'upload/m-9.2.3.jpg', 'upload/m-9.2.4.jpg'),
(62, 'Gunmetal Gold Full Rim Aviator Sunglasses', 'Prada', 2500, 50, 'Man', 'Large', 'Sunglass', 'Gold', 'Aviator', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/m-9.3.1.jpg', 'upload/m-9.3.2.jpg', 'upload/m-9.3.5.jpg', 'upload/m-9.3.6.jpg', 'upload/m-9.3.3.jpg', 'upload/m-9.3.4.jpg'),
(63, 'Black Full Rim Square Eyeglasses', 'Eyebeam', 1200, 50, 'Woman', 'Small', 'Eyeglass', 'Black', 'Square', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-1.1.1.jpg', 'upload/f-1.1.2.jpg', 'upload/f-1.1.5.jpg', 'upload/f-1.1.6.jpg', 'upload/f-1.1.3.jpg', 'upload/f-1.1.4.jpg'),
(64, 'Blue Full Rim Square Eyeglasses', 'Eyebeam', 1200, 50, 'Woman', 'Medium', 'Eyeglass', 'Blue', 'Square', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-1.2.1.jpg', 'upload/f-1.2.2.jpg', 'upload/f-1.2.5.jpg', 'upload/f-1.2.6.jpg', 'upload/f-1.2.3.jpg', 'upload/f-1.2.4.jpg'),
(65, 'Red Transparent Full Rim Cat Eye Eyeglasses', 'Rayban', 1000, 50, 'Woman', 'Small', 'Eyeglass', 'Red', 'Cateye', 'TR90 & Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-2.1.1.jpg', 'upload/f-2.1.2.jpg', 'upload/f-2.1.5.jpg', 'upload/f-2.1.6.jpg', 'upload/f-2.1.3.jpg', 'upload/f-2.1.4.jpg'),
(67, 'Grey Transparent Full Rim Cat Eye Eyeglasses', 'Eyebeam', 1000, 50, 'Woman', 'Large', 'Eyeglass', 'Grey', 'Cateye', 'TR90 & Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-2.3.1.jpg', 'upload/f-2.3.2.jpg', 'upload/f-2.3.5.jpg', 'upload/f-2.3.6.jpg', 'upload/f-2.3.3.jpg', 'upload/f-2.3.4.jpg'),
(68, 'Blue Transparent Full Rim Cat Eye Eyeglasses', 'Rayban', 1000, 50, 'Woman', 'Medium', 'Eyeglass', 'Blue', 'Cateye', 'TR90 & Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-2.2.1.jpg', 'upload/f-2.2.2.jpg', 'upload/f-2.2.5.jpg', 'upload/f-2.2.6.jpg', 'upload/f-2.2.3.jpg', 'upload/f-2.2.4.jpg'),
(69, 'Matte Black Gunmetal Full Rim Round Eyeglasses', 'Versace', 1800, 48, 'Woman', 'Small', 'Eyeglass', 'Black', 'Round', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-3.1.1.jpg', 'upload/f-3.1.2.jpg', 'upload/f-3.1.5.jpg', 'upload/f-3.1.6.jpg', 'upload/f-3.1.3.jpg', 'upload/f-3.1.4.jpg'),
(70, 'Purple Silver Full Rim Round Eyeglasses', 'Versace', 1800, 49, 'Woman', 'Medium', 'Eyeglass', 'Purple', 'Round', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-3.2.1.jpg', 'upload/f-3.2.2.jpg', 'upload/f-3.2.5.jpg', 'upload/f-3.2.6.jpg', 'upload/f-3.2.3.jpg', 'upload/f-3.2.4.jpg'),
(71, 'Brown Full Rim Round Eyeglasses', 'Versace', 1800, 50, 'Woman', 'Large', 'Eyeglass', 'Brown', 'Round', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-3.3.1.jpg', 'upload/f-3.3.2.jpg', 'upload/f-3.3.5.jpg', 'upload/f-3.3.6.jpg', 'upload/f-3.3.3.jpg', 'upload/f-3.3.4.jpg'),
(72, 'Gold Black Full Rim Geometric Eyeglasses', 'Prada', 2000, 45, 'Woman', 'Small', 'Eyeglass', 'Gold', 'Geomatric', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-4.1.1.jpg', 'upload/f-4.1.2.jpg', 'upload/f-4.1.5.jpg', 'upload/f-4.1.6.jpg', 'upload/f-4.1.3.jpg', 'upload/f-4.1.4.jpg'),
(73, 'Gunmetal Blue Full Rim Geometric Eyeglasses', 'Prada', 2000, 49, 'Woman', 'Medium', 'Eyeglass', 'Blue', 'Geomatric', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-4.2.1.jpg', 'upload/f-4.2.2.jpg', 'upload/f-4.2.5.jpg', 'upload/f-4.2.6.jpg', 'upload/f-4.2.3.jpg', 'upload/f-4.2.4.jpg'),
(74, 'Green Gunmetal Full Rim Square Eyeglasses', 'Prada', 2000, 50, 'Woman', 'Large', 'Eyeglass', 'Green', 'Geomatric', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-4.3.1.jpg', 'upload/f-4.3.2.jpg', 'upload/f-4.3.5.jpg', 'upload/f-4.3.6.jpg', 'upload/f-4.3.3.jpg', 'upload/f-4.3.4.jpg'),
(75, 'Blue Rimless Square Eyeglasses', 'Titaneye+', 1700, 45, 'Woman', 'Small', 'Eyeglass', 'Blue', 'Square', 'Stainless Steel (Simple Matte & Shiny)', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-6.1.1.jpg', 'upload/f-6.1.2.jpg', 'upload/f-6.1.5.jpg', 'upload/f-6.1.6.jpg', 'upload/f-6.1.3.jpg', 'upload/f-6.1.4.jpg'),
(76, 'Black Rimless Square Eyeglasses', 'Titaneye+', 1700, 50, 'Woman', 'Medium', 'Eyeglass', 'Black', 'Square', 'Stainless Steel (Simple Matte & Shiny)', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-6.2.1.jpg', 'upload/f-6.2.2.jpg', 'upload/f-6.2.5.jpg', 'upload/f-6.2.6.jpg', 'upload/f-6.2.3.jpg', 'upload/f-6.2.4.jpg'),
(77, 'Silver Rimless Square Eyeglasses', 'Titaneye+', 1700, 50, 'Woman', 'Large', 'Eyeglass', 'Grey', 'Square', 'Stainless Steel (Simple Matte & Shiny)', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-6.3.1.jpg', 'upload/f-6.3.2.jpg', 'upload/f-6.3.5.jpg', 'upload/f-6.3.6.jpg', 'upload/f-6.3.3.jpg', 'upload/f-6.3.4.jpg'),
(78, 'Golden Black Full Rim Square Eyeglasses', 'Gucci', 4000, 50, 'Woman', 'Medium', 'Eyeglass', 'Black', 'Square', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-5.1.1.jpg', 'upload/f-5.1.2.jpg', 'upload/f-5.1.5.jpg', 'upload/f-5.1.6.jpg', 'upload/f-5.1.3.jpg', 'upload/f-5.1.4.jpg'),
(79, 'Rose Gold Full Rim Square Eyeglasses', 'Gucci', 4000, 50, 'Woman', 'Large', 'Eyeglass', 'Gold', 'Square', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-5.2.1.jpg', 'upload/f-5.2.2.jpg', 'upload/f-5.2.5.jpg', 'upload/f-5.2.6.jpg', 'upload/f-5.2.3.jpg', 'upload/f-5.2.4.jpg'),
(80, 'Golden Full Rim Cat Blue Eye Sunglasses', 'Eyebeam', 2000, 50, 'Woman', 'Small', 'Sunglass', 'Gold', 'Cateye', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-7.1.1.jpg', 'upload/f-7.1.2.jpg', 'upload/f-7.1.5.jpg', 'upload/f-7.1.6.jpg', 'upload/f-7.1.3.jpg', 'upload/f-7.1.4.jpg'),
(81, 'Silver Full Rim Cat Eye Sunglasses', 'Eyebeam', 2000, 50, 'Woman', 'Medium', 'Sunglass', 'Grey', 'Cateye', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-7.2.1.jpg', 'upload/f-7.2.2.jpg', 'upload/f-7.2.5.jpg', 'upload/f-7.2.6.jpg', 'upload/f-7.2.3.jpg', 'upload/f-7.2.4.jpg'),
(82, 'Golden Full Rim Cat Brown Eye Sunglasses', 'Eyebeam', 2000, 49, 'Woman', 'Large', 'Sunglass', 'Brown', 'Cateye', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-7.3.1.jpg', 'upload/f-7.3.2.jpg', 'upload/f-7.3.5.jpg', 'upload/f-7.3.6.jpg', 'upload/f-7.3.3.jpg', 'upload/f-7.3.4.jpg'),
(83, 'Gold Black Full Rim Round Sunglasses', 'Gucci', 2500, 50, 'Woman', 'Small', 'Sunglass', 'Gold', 'Round', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-8.1.1.jpg', 'upload/f-8.1.2.jpg', 'upload/f-8.1.5.jpg', 'upload/f-8.1.6.jpg', 'upload/f-8.1.3.jpg', 'upload/f-8.1.4.jpg'),
(84, 'Silver Black Full Rim Round Sunglasses', 'Gucci', 2500, 50, 'Woman', 'Medium', 'Sunglass', 'Grey', 'Round', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-8.2.1.jpg', 'upload/f-8.2.2.jpg', 'upload/f-8.2.5.jpg', 'upload/f-8.2.6.jpg', 'upload/f-8.2.3.jpg', 'upload/f-8.2.4.jpg'),
(85, 'Gunmetal Full Rim Hexagonal Sunglasses', 'Rayban', 1500, 48, 'Woman', 'Small', 'Sunglass', 'Grey', 'Hexagonal', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-9.1.1.jpg', 'upload/f-9.1.2.jpg', 'upload/f-9.1.5.jpg', 'upload/f-9.1.6.jpg', 'upload/f-9.1.3.jpg', 'upload/f-9.1.4.jpg'),
(86, 'Rose Gold Full Rim Hexagonal Sunglasses', 'Rayban', 1500, 50, 'Woman', 'Medium', 'Sunglass', 'Gold', 'Hexagonal', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-9.2.1.jpg', 'upload/f-9.2.2.jpg', 'upload/f-9.2.5.jpg', 'upload/f-9.2.6.jpg', 'upload/f-9.2.3.jpg', 'upload/f-9.2.4.jpg'),
(87, 'Gold Full Rim Hexagonal Sunglasses', 'Rayban', 1500, 50, 'Woman', 'Large', 'Sunglass', 'Brown', 'Hexagonal', 'Stainless Steel', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/f-9.3.1.jpg', 'upload/f-9.3.2.jpg', 'upload/f-9.3.5.jpg', 'upload/f-9.3.6.jpg', 'upload/f-9.3.3.jpg', 'upload/f-9.3.4.jpg'),
(88, 'Black Full Rim Rectangle Eyeglasses', 'Eyebeam', 1000, 50, 'Kid', 'Small', 'Eyeglass', 'Black', 'Rectangle', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-1.1.1.jpg', 'upload/k-1.1.2.jpg', 'upload/k-1.1.5.jpg', 'upload/k-1.1.6.jpg', 'upload/k-1.1.3.jpg', 'upload/k-1.1.4.jpg'),
(89, 'Green Transparent Full Rim Rectangle Eyeglasses', 'Eyebeam', 1000, 50, 'Kid', 'Medium', 'Eyeglass', 'Green', 'Rectangle', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-1.2.1.jpg', 'upload/k-1.2.2.jpg', 'upload/k-1.2.5.jpg', 'upload/k-1.2.6.jpg', 'upload/k-1.2.3.jpg', 'upload/k-1.2.4.jpg'),
(90, 'Pink Transparent Full Rim Rectangle Eyeglasses', 'Eyebeam', 1000, 50, 'Kid', 'Large', 'Eyeglass', 'Purple', 'Rectangle', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-1.3.1.jpg', 'upload/k-1.3.2.jpg', 'upload/k-1.3.5.jpg', 'upload/k-1.3.6.jpg', 'upload/k-1.3.3.jpg', 'upload/k-1.3.4.jpg'),
(91, 'Transparent Full Rim Square Eyeglasses', 'Rayban', 1500, 50, 'Kid', 'Small', 'Eyeglass', 'Purple', 'Square', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-2.1.1.jpg', 'upload/k-2.1.2.jpg', 'upload/k-2.1.5.jpg', 'upload/k-2.1.6.jpg', 'upload/k-2.1.3.jpg', 'upload/k-2.1.4.jpg'),
(92, 'Blue Full Rim Square Eyeglasses', 'Rayban', 1500, 50, 'Kid', 'Medium', 'Eyeglass', 'Blue', 'Square', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-2.2.1.jpg', 'upload/k-2.2.2.jpg', 'upload/k-2.2.5.jpg', 'upload/k-2.2.6.jpg', 'upload/k-2.2.3.jpg', 'upload/k-2.2.4.jpg'),
(93, 'Red Full Rim Square Eyeglasses', 'Rayban', 1500, 50, 'Kid', 'Medium', 'Eyeglass', 'Red', 'Square', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-2.3.1.jpg', 'upload/k-2.3.2.jpg', 'upload/k-2.3.5.jpg', 'upload/k-2.3.6.jpg', 'upload/k-2.3.3.jpg', 'upload/k-2.3.4.jpg'),
(94, 'Black Full Rim Rectangle Eyeglasses', 'Versace', 1000, 50, 'Kid', 'Medium', 'Eyeglass', 'Black', 'Square', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-3.1.1.jpg', 'upload/k-3.1.2.jpg', 'upload/k-3.1.5.jpg', 'upload/k-3.1.6.jpg', 'upload/k-3.1.3.jpg', 'upload/k-3.1.4.jpg'),
(95, 'Blue Full Rim Rectangle Eyeglasses', 'Versace', 1000, 50, 'Kid', 'Medium', 'Eyeglass', 'Blue', 'Square', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-3.2.1.jpg', 'upload/k-3.2.2.jpg', 'upload/k-3.2.5.jpg', 'upload/k-3.2.6.jpg', 'upload/k-3.2.3.jpg', 'upload/k-3.2.4.jpg'),
(96, 'Transparent Full Rim Round Eyeglasses', 'Prada', 1200, 50, 'Kid', 'Large', 'Eyeglass', 'Green', 'Round', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-4.1.1.jpg', 'upload/k-4.1.2.jpg', 'upload/k-4.1.5.jpg', 'upload/k-4.1.6.jpg', 'upload/k-4.1.3.jpg', 'upload/k-4.1.4.jpg'),
(97, 'Blue Transparent Full Rim Round Eyeglasses', 'Prada', 1200, 50, 'Kid', 'Large', 'Eyeglass', 'Blue', 'Round', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-4.2.1.jpg', 'upload/k-4.2.2.jpg', 'upload/k-4.2.5.jpg', 'upload/k-4.2.6.jpg', 'upload/k-4.2.3.jpg', 'upload/k-4.2.4.jpg'),
(98, 'Blue Full Rim Round Eyeglasses', 'Titaneye+', 2000, 50, 'Kid', 'Small', 'Eyeglass', 'Blue', 'Round', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-5.1.1.jpg', 'upload/k-5.1.2.jpg', 'upload/k-5.1.5.jpg', 'upload/k-5.1.6.jpg', 'upload/k-5.1.3.jpg', 'upload/k-5.1.4.jpg'),
(99, 'Purple Transparent Full Rim Round Eyeglasses', 'Titaneye+', 2000, 50, 'Kid', 'Small', 'Eyeglass', 'Purple', 'Round', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-5.2.1.jpg', 'upload/k-5.2.2.jpg', 'upload/k-5.2.5.jpg', 'upload/k-5.2.6.jpg', 'upload/k-5.2.3.jpg', 'upload/k-5.2.4.jpg'),
(100, 'Green Transparent Full Rim Round Eyeglasses', 'Titaneye+', 2000, 50, 'Kid', 'Medium', 'Eyeglass', 'Green', 'Round', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-5.3.1.jpg', 'upload/k-5.3.2.jpg', 'upload/k-5.3.5.jpg', 'upload/k-5.3.6.jpg', 'upload/k-5.3.3.jpg', 'upload/k-5.3.4.jpg'),
(101, 'Blue Transparent Full Rim Round Eyeglasses', 'Gucci', 1000, 50, 'Kid', 'Small', 'Eyeglass', 'Blue', 'Round', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-6.2.1.jpg', 'upload/k-6.2.2.jpg', 'upload/k-6.2.5.jpg', 'upload/k-6.2.6.jpg', 'upload/k-6.2.3.jpg', 'upload/k-6.2.4.jpg'),
(102, 'Purple Transparent Full Rim Round Eyeglasses', 'Gucci', 1000, 50, 'Kid', 'Medium', 'Eyeglass', 'Purple', 'Round', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-6.1.1.jpg', 'upload/k-6.1.2.jpg', 'upload/k-6.1.5.jpg', 'upload/k-6.1.6.jpg', 'upload/k-6.1.3.jpg', 'upload/k-6.1.4.jpg'),
(103, 'Red Transparent Full Rim Round Eyeglasses', 'Gucci', 1000, 50, 'Kid', 'Large', 'Eyeglass', 'Red', 'Round', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-6.3.1.jpg', 'upload/k-6.3.2.jpg', 'upload/k-6.3.5.jpg', 'upload/k-6.3.6.jpg', 'upload/k-6.3.3.jpg', 'upload/k-6.3.4.jpg'),
(104, 'Black Full Rim Round Sunglasses', 'Gucci', 2000, 50, 'Kid', 'Small', 'Sunglass', 'Black', 'Round', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-7.1.1.jpg', 'upload/k-7.1.2.jpg', 'upload/k-7.1.5.jpg', 'upload/k-7.1.6.jpg', 'upload/k-7.1.3.jpg', 'upload/k-7.1.4.jpg'),
(105, 'Purple Full Rim Round Sunglasses', 'Gucci', 2000, 49, 'Kid', 'Medium', 'Sunglass', 'Purple', 'Round', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-7.2.1.jpg', 'upload/k-7.2.2.jpg', 'upload/k-7.2.5.jpg', 'upload/k-7.2.6.jpg', 'upload/k-7.2.3.jpg', 'upload/k-7.2.4.jpg'),
(106, 'Black Full Rim Square Sunglasses', 'Eyebeam', 1800, 49, 'Kid', 'Small', 'Sunglass', 'Black', 'Square', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-8.1.1.jpg', 'upload/k-8.1.2.jpg', 'upload/k-8.1.5.jpg', 'upload/k-8.1.6.jpg', 'upload/k-8.1.3.jpg', 'upload/k-8.1.4.jpg'),
(107, 'Blue Full Rim Square Sunglasses', 'Eyebeam', 1800, 50, 'Kid', 'Medium', 'Sunglass', 'Blue', 'Square', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-8.2.1.jpg', 'upload/k-8.2.2.jpg', 'upload/k-8.2.5.jpg', 'upload/k-8.2.6.jpg', 'upload/k-8.2.3.jpg', 'upload/k-8.2.4.jpg'),
(108, 'Blue Transparent Full Rim Square Sunglasses', 'Eyebeam', 1800, 50, 'Kid', 'Large', 'Sunglass', 'Blue', 'Square', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-8.3.1.jpg', 'upload/k-8.3.2.jpg', 'upload/k-8.3.5.jpg', 'upload/k-8.3.6.jpg', 'upload/k-8.3.3.jpg', 'upload/k-8.3.4.jpg'),
(109, 'Black Grey Transparent Full Rim Wayfarer Sunglasses', 'Rayban', 2500, 50, 'Kid', 'Medium', 'Sunglass', 'Black', 'Square', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-9.1.1.jpg', 'upload/k-9.1.2.jpg', 'upload/k-9.1.5.jpg', 'upload/k-9.1.6.jpg', 'upload/k-9.1.3.jpg', 'upload/k-9.1.4.jpg'),
(110, 'Brown Tortoise Full Rim Wayfarer Sunglasses', 'Rayban', 2500, 50, 'Kid', 'Medium', 'Sunglass', 'Brown', 'Square', 'TR90', 'You all love these super cool and stylish Colton Editon sunglasses by Sunglassic. Featuring UV400 protection they are not only fashionable, but they all also protect your eyes.', 'upload/k-9.2.1.jpg', 'upload/k-9.2.2.jpg', 'upload/k-9.2.5.jpg', 'upload/k-9.2.6.jpg', 'upload/k-9.2.3.jpg', 'upload/k-9.2.4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `name` text NOT NULL,
  `pid` int(10) NOT NULL,
  `title` text NOT NULL,
  `comment` text NOT NULL,
  `ratings` int(100) NOT NULL,
  `posted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rid`, `uid`, `name`, `pid`, `title`, `comment`, `ratings`, `posted`, `img`) VALUES
(3, 9, 'Tilak', 47, 'Good ', 'Good Quality', 5, '2023-03-25 07:58:05', '../admin/upload/m-2.1.5.jpg'),
(4, 12, 'tilak', 46, 'Awesome', 'Good product', 5, '2023-03-26 12:34:08', '../admin/upload/m-2.3.1.jpg'),
(5, 11, 'Hardik', 47, 'Good 👌', 'Best product ever', 5, '2023-03-26 12:35:48', '../admin/upload/m-1.1.1.jpg'),
(6, 13, 'rohit', 85, 'Good 👌', 'Good Look of this site and good quality of product', 5, '2023-03-26 12:40:31', '../admin/upload/f-9.1.1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shape`
--

CREATE TABLE `shape` (
  `sid` int(11) NOT NULL,
  `sname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shape`
--

INSERT INTO `shape` (`sid`, `sname`) VALUES
(1, 'Round'),
(2, 'Rectangle'),
(3, 'Hexagonal'),
(4, 'Square'),
(5, 'Aviator'),
(6, 'ClubMaster'),
(7, 'CatEye'),
(8, 'Geomatric');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `nearby` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `pin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `email`, `phone`, `password`, `image`, `address`, `nearby`, `state`, `city`, `pin`) VALUES
(11, 'Hardik', 'Hardik123@gmail.com', '9313493200', '$2y$10$F09wixoJ4JbtyvdtcH4NyOCZGoWH/q3FvywKTByKUZwW/fxZqU0Va', '../admin/upload/m-7.2.5.jpg', '145 uday ', 'katargam', 'gujarat', 'surat', '395004'),
(12, 'tilak', 'tilak123@gmail.com', '9911199111', '$2y$10$odR4HJdbbWUDtrd4X1lF1egg4Mj08aWy2WVHscQsMOA9nNfjK.2Wa', '../admin/upload/m-2.3.5.jpg', 'hello', 'hy', 'gujarat', 'surat', '395010'),
(13, 'rohit', 'rohit123@gmail.com', '8899889988', '$2y$10$WRaCoeK8PPK94x5ICELZDujAU4M00xBC3hZ/1EsK4e9zng1Z2N4nG', '../admin/upload/m-2.2.6.jpg', 'Gokuldham', 'Vesu', 'Gujarat', 'surat', '395011');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `ordered_item`
--
ALTER TABLE `ordered_item`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `ordertbl`
--
ALTER TABLE `ordertbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `shape`
--
ALTER TABLE `shape`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordered_item`
--
ALTER TABLE `ordered_item`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `ordertbl`
--
ALTER TABLE `ordertbl`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shape`
--
ALTER TABLE `shape`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
