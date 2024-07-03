-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 08:00 PM
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
-- Database: `ecommerce`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)   SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Kabir', 'kabir.sheth747@gmail.com', 'Kabir');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(186, 12, '::1', 37, 0),
(187, 56, '::1', 37, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Ladies Wears'),
(3, 'Mens Wear');

-- --------------------------------------------------------

--
-- Table structure for table `customizations`
--

CREATE TABLE `customizations` (
  `customization_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `custom_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customizations`
--

INSERT INTO `customizations` (`customization_id`, `product_id`, `user_id`, `text`, `image`, `price`, `custom_date`) VALUES
(1, 58, 29, 'Hello', '1698429774_WhatsApp Image 2023-06-24 at 5.18.52 PM.jpeg', '350.00', '2023-10-27 18:20:01'),
(2, 58, 29, 'Hello', '1698429998_u4(10).jpeg', '350.00', '2023-10-27 18:20:01'),
(11, 21, 29, 'Hello', '1709144153_WhatsApp Image 2023-11-30 at 11.48.15 AM (1).jpeg', '800.00', '2024-02-28 18:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `designers`
--

CREATE TABLE `designers` (
  `id` int(11) NOT NULL,
  `Name` char(20) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `designers`
--

INSERT INTO `designers` (`id`, `Name`, `Email`, `Password`) VALUES
(1, 'Kabir', 'kabir.sheth747@gmail.com', 'KabirSheth'),
(2, 'Kashish Reshamwala', 'kashishreshamwala20@gmail.com', 'KashishReshamwala'),
(3, 'Ishika', 'ishikadesigner40@gmail.com', 'Ishika'),
(4, 'Dezal CA', 'dezalca50@gmail.com', 'DezalCA'),
(5, 'Prerna Mistry', 'prernamistry27@gmail.com', 'PrernaMistry'),
(6, 'Khushboo Desai', 'kmdesai05@gmail.com', 'KhushbooDesai'),
(7, 'Harsh Jariwala', 'harshjariwala70@gmail.com', 'HarshJariwala'),
(8, 'Vilish Dharia', 'vilishdharia17@gmail.com', 'VilishDharia'),
(9, 'Princy Rana', 'ranaprincy2021@gmail.com', 'PrincyRana');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE `email_info` (
  `email_id` int(100) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`email_id`, `email`) VALUES
(6, 'kabir.sheth747@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `offer_name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `offer_name`, `start_date`, `end_date`, `discount_percentage`, `status`) VALUES
(1, 'Navratri', '2023-10-14', '2023-10-24', 20, 'Active'),
(2, 'Diwali', '2023-10-22', '2023-10-24', 20, 'Active'),
(3, 'Holi', '2024-02-28', '2024-03-10', 50, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 29, 30, 3, '1511df11gd11ftx', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `O_Date` date DEFAULT curdate(),
  `cardname` varchar(255) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(255) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` int(15) DEFAULT NULL,
  `cvv` int(5) NOT NULL,
  `order_status` varchar(50) DEFAULT 'Paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `zip`, `O_Date`, `cardname`, `cardnumber`, `expdate`, `prod_count`, `total_amt`, `cvv`, `order_status`) VALUES
(2, 29, 'Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'India', 395007, NULL, 'VISA', '7778855442200365', '12/24', 2, 7000, 8854, 'Delivered'),
(3, 29, 'Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'India', 395007, NULL, 'VISA', '7774521332242365', '12/24', 2, 9000, 7896, 'Delivered'),
(4, 29, 'Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'India', 395007, NULL, 'VISA', '8854 1253 6974 1231', '12/24', 2, 65000, 8545, 'Paid'),
(5, 29, 'Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'India', 395007, NULL, 'VISA', '8874 5632 5412 0315', '12/24', 2, 90000, 5478, 'Paid'),
(6, 29, 'Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, NULL, '', '', '', 1, 3500, 0, 'Paid'),
(7, 29, 'Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '0000-00-00', '', '', '', 1, 25000, 0, 'Paid'),
(8, 29, 'Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-03-23', '', '', '', 1, 3500, 0, 'Paid'),
(9, 29, 'Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-03-23', '', '', '', 1, 5000, 0, 'Paid'),
(10, 29, 'Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-03-23', '', '', '', 1, 5000, 0, 'Order Shipped'),
(11, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-03-23', '', '', '', 2, 7000, 0, 'Paid'),
(12, 34, 'Ronak Sir', 'rnoak07@gmail.com', 'UTU', 'Bardoli', 'Gujarat', 395007, '0000-00-00', '', '', '', 2, 40000, 0, ''),
(13, 34, 'Ronak Sir', 'rnoak07@gmail.com', 'UTU', 'Bardoli', 'Gujarat', 395007, '2023-03-24', '', '', '', 1, 5000, 0, ''),
(14, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-04-10', 'Visa', '5413 2544 7585 2100', '2023-04-13', 3, 3300, 4523, ''),
(15, 39, 'kevin dharia', 'kevin123@gmail.com', 'althan', 'surat', 'Gujarat', 395007, '2023-04-17', 'VISA', '1234789524584', '2024-06-17', 3, 2759, 789, ''),
(16, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 365, 0, 'Paid'),
(17, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 514, 0, ''),
(18, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 514, 0, 'Paid'),
(19, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 514, 0, 'Paid'),
(20, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 514, 0, 'Order Accepted'),
(21, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 514, 0, ''),
(22, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 514, 0, ''),
(23, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-29', '', '', '', 2, 514, 0, ''),
(24, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 365, 0, ''),
(25, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 365, 0, ''),
(51, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-29', '', '', '', 2, 610, 0, ''),
(52, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-29', '', '', '', 2, 610, 0, ''),
(53, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 610, 0, ''),
(54, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 769, 0, 'Paid'),
(55, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 1, 290, 0, ''),
(56, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-09-28', '', '', '', 2, 1005, 0, ''),
(57, 29, '', '', '', '', '', 0, '0000-00-00', '', '', '', 0, 0, 0, ''),
(58, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-07', '', '', '', 2, 1005, 0, ''),
(59, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-07', '', '', '', 2, 1005, 0, ''),
(60, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-07', '', '', '', 2, 1005, 0, 'Paid'),
(61, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-07', '', '', '', 2, 1005, 0, ''),
(62, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-07', '', '', '', 2, 1005, 0, ''),
(63, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-07', '', '', '', 2, 514, 0, ''),
(64, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-07', '', '', '', 2, 1090, 0, ''),
(65, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-07', '', '', '', 2, 549, 0, ''),
(66, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-07', '', '', '', 1, 800, 0, ''),
(67, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-08', '', '', '', 1, 299, 0, 'Delivered'),
(68, 40, 'Sangita Sheth', 'sangi.sakhi@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-10', '', '', '', 2, 2500, 0, 'Order Shipped'),
(69, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-11', '', '', '', 2, 365, 0, 'Delivered'),
(70, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-23', '', '', '', 2, 960, 0, 'Paid'),
(71, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-26', 'Visa', '', '2023-10-02', 1, 160, 265, 'Paid'),
(72, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-26', 'Visa', '7864512548652', '2023-10-02', 1, 160, 265, 'Order Accepted'),
(73, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-27', '', '', '', 1, 800, 0, 'Paid'),
(74, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2023-10-27', 'Visa', '', '', 1, 468, 0, 'Delivered'),
(75, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2024-02-28', '', '', '', 1, 2000, 0, 'Paid'),
(76, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2024-02-28', '', '', '', 1, 800, 0, 'Paid'),
(77, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2024-05-04', '', '', '', 1, 1600, 0, 'Paid'),
(78, 29, 'The Kabir Sheth', 'kabir.sheth747@gmail.com', 'Surat', 'Surat', 'Gujarat', 395007, '2024-05-04', '', '', '', 1, 800, 0, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `amt`) VALUES
(73, 1, 1, 1, 5000),
(74, 1, 4, 2, 64000),
(75, 1, 8, 1, 40000),
(91, 2, 73, 1, 3500),
(92, 2, 72, 1, 3500),
(93, 3, 74, 1, 5500),
(94, 3, 73, 1, 3500),
(95, 4, 3, 1, 30000),
(96, 4, 6, 1, 35000),
(97, 5, 7, 1, 50000),
(98, 5, 8, 1, 40000),
(99, 6, 73, 1, 3500),
(100, 7, 2, 1, 25000),
(101, 8, 73, 1, 3500),
(102, 9, 71, 1, 5000),
(103, 10, 71, 1, 5000),
(104, 11, 72, 1, 3500),
(105, 11, 73, 1, 3500),
(106, 12, 3, 1, 30000),
(107, 12, 5, 1, 10000),
(108, 13, 1, 1, 5000),
(109, 14, 89, 1, 500),
(110, 14, 21, 1, 800),
(111, 14, 90, 1, 2000),
(112, 15, 87, 1, 2000),
(113, 15, 54, 1, 259),
(114, 15, 3, 1, 500),
(115, 16, 54, 1, 150),
(116, 16, 54, 1, 215),
(117, 17, 54, 1, 150),
(118, 17, 54, 1, 215),
(119, 18, 54, 1, 150),
(120, 18, 54, 1, 215),
(121, 16, 54, 1, 150),
(122, 16, 54, 1, 215),
(203, 55, 54, 0, 0),
(204, 56, 54, 0, 0),
(205, 56, 54, 0, 0),
(206, 58, 54, 0, 0),
(207, 58, 54, 0, 0),
(208, 59, 54, 0, 0),
(209, 59, 54, 0, 0),
(210, 60, 54, 0, 0),
(211, 60, 54, 0, 0),
(212, 61, 54, 0, 0),
(213, 61, 54, 0, 0),
(214, 62, 54, 0, 0),
(215, 62, 54, 0, 0),
(216, 63, 54, 0, 0),
(217, 63, 54, 0, 0),
(218, 64, 54, 1, 290),
(219, 64, 21, 1, 800),
(220, 65, 54, 1, 290),
(221, 65, 54, 1, 259),
(222, 66, 21, 1, 800),
(223, 67, 54, 1, 299),
(224, 68, 87, 1, 2000),
(225, 68, 89, 1, 500),
(226, 69, 54, 1, 150),
(227, 69, 54, 1, 215),
(228, 70, 89, 1, 800),
(229, 70, 89, 1, 160),
(230, 71, 89, 1, 160),
(231, 72, 89, 1, 160),
(232, 73, 21, 1, 800),
(233, 74, 123, 1, 467),
(234, 75, 114, 1, 2000),
(235, 76, 21, 1, 800),
(236, 77, 114, 1, 1600),
(237, 78, 21, 1, 800);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_cat` int(2) NOT NULL,
  `product_brand` int(10) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `discounted_price` decimal(10,2) DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `discounted_price`, `offer_id`) VALUES
(1, 1, 2, 'Green Top', 5000, 'Green Top', 'GirlsClothing_Widgets.jpg', 'Green Top', NULL, NULL),
(2, 1, 3, 'Jeans', 25000, 'Jeans', 'pt6.jpg', 'Jeans', NULL, NULL),
(3, 1, 3, 'Shirt', 30000, 'Shirt', 'pt6.jpg', 'Shirt', NULL, NULL),
(21, 3, 6, 'T shirt', 800, 'ssds', 'IN-Mens-Apparel-Voodoo-Tiles-09._V333872612_.jpg', 'formal t shirt black', NULL, NULL),
(22, 4, 6, 'Yellow T shirt ', 1300, 'yello t shirt with pant', '1.0x0.jpg', 'kids yellow t shirt', NULL, NULL),
(23, 4, 6, 'Girls cloths', 1900, 'sadsf', 'GirlsClothing_Widgets.jpg', 'formal kids wear dress', NULL, NULL),
(25, 4, 6, 'Yellow girls dress', 750, 'as', 'images (3).jpg', 'yellow kids dress', NULL, NULL),
(54, 3, 6, 'boys shirts', 290, 'shirts', 'ms2.JPG', 'suit boys shirts', NULL, NULL),
(55, 3, 6, 'boys shirts', 259, 'shirts', 'ms3.JPG', 'suit boys shirts', NULL, NULL),
(56, 3, 6, 'boys shirts', 299, 'shirts', 'pm7.JPG', 'suit boys shirts', NULL, NULL),
(57, 3, 6, 'boys shirts', 260, 'shirts', 'i3.JPG', 'suit boys shirts', NULL, NULL),
(58, 3, 6, 'boys shirts', 350, 'shirts', 'pm9.JPG', 'suit boys shirts', NULL, NULL),
(59, 3, 6, 'boys shirts', 855, 'shirts', 'a2.JPG', 'suit boys shirts', NULL, NULL),
(60, 3, 6, 'boys shirts', 150, 'shirts', 'pm11.JPG', 'suit boys shirts', NULL, NULL),
(61, 3, 6, 'boys shirts', 215, 'shirts', 'pm12.JPG', 'suit boys shirts', NULL, NULL),
(62, 3, 6, 'boys shirts', 299, 'shirts', 'pm13.JPG', 'suit boys shirts', NULL, NULL),
(65, 3, 6, 'boys Jeans Pant', 470, 'pants', 'pt8.jpg', 'boys Jeans Pant', NULL, NULL),
(66, 3, 6, 'boys Jeans Pant', 480, 'pants', 'pt4.jpg', 'boys Jeans Pant', NULL, NULL),
(67, 3, 6, 'boys Jeans Pant', 360, 'pants', 'pt5.jpg', 'boys Jeans Pant', NULL, NULL),
(68, 3, 6, 'boys Jeans Pant', 550, 'pants', 'pt6.jpg', 'boys Jeans Pant', NULL, NULL),
(69, 3, 6, 'boys Jeans Pant', 390, 'pants', 'pt7.jpg', 'boys Jeans Pant', NULL, NULL),
(70, 3, 6, 'boys Jeans Pant', 399, 'pants', 'pt8.jpg', 'boys Jeans Pant', NULL, NULL),
(71, 1, 2, 'Black Shirt For Men', 5000, 'Black Shirt For Men', 'pm1.jpg', 'Black Shirt For Men', NULL, NULL),
(74, 1, 1, 'Blue T-Shirt For Men', 550, 'Blue T-Shirt For Men', 'pm9.jpg', 'Blue T-Shirt For Men', NULL, NULL),
(87, 2, 3, 'Girls Hoodie', 2000, 'Girls Green Hoodie', '1680840509_greengirlhoodie5.jpg', 'Green Hoodie For Girls', NULL, NULL),
(88, 3, 2, 'boys hoodie', 1500, 'green men hoodie', '1680848431_greenboyhoodie.jpg', 'Green Hoodie For boys', NULL, NULL),
(89, 2, 3, 'girls t shirt', 500, 'black', '1680858273_girlblackhoodie.jpg', 'black ', NULL, NULL),
(90, 1, 2, 'Boys Bown Hoodie', 2000, 'Brown Hoodies for Boys', '1681119926_brownboyhoodie.jpg', 'Brown Hoodie for Boys', NULL, NULL),
(91, 3, 1, 'Boys Bown Hoodie', 2000, 'Brown Hoodie for Boys', '1681120063_brownboyhoodie.jpg', 'Brown Hoodie for Boys', NULL, NULL),
(93, 3, 3, 'shirt', 500, 'blue shirt', '1681710844_743fd989-8c2f-48ec-9c1d-afdb6715de96.png', 'male blue shirt', NULL, NULL),
(113, 3, 4, 'Kediyu for Men ', 1500, 'Kediya', '1698306669_nav5.jpg', 'blue kediyu', '1200.00', 1),
(114, 2, 4, 'Chanya Choli', 2000, 'chanya choli', '1698306876_nav2.jpg', 'navratri ', '1600.00', 1),
(115, 2, 4, 'Chanya Choli', 2500, 'black Chaniya', '1698306981_nav8.jpg', 'black chaniya', '2000.00', 1),
(116, 2, 4, 'Heavy dress', 3000, 'Greeen Dress', '1698307250_diw1.jpg', 'green dress', '2400.00', 2),
(117, 2, 4, 'Pink Heavy Dress', 1500, 'Pink', '1698307494_diw8.jpeg', 'pink', '1200.00', 2),
(118, 3, 4, 'Black fromal', 1500, 'black', '1698307587_diw4.jpeg', 'black ', '1200.00', 2),
(119, 3, 4, 'Grey Kurta', 1000, 'Grey ', '1698307657_diw5.jpeg', 'grey dress', '800.00', 2),
(121, 3, 2, 'Holi t shirt', 400, 't shirt for boys', '1698385622_holi1.jpeg', 't shirt', '200.00', 3),
(122, 2, 4, 'White kurta', 852, 'kurta', '1698386032_holi3.jpeg', 'kurtta', '426.00', 3),
(123, 3, 4, 'Men Kurta', 935, 'Kurta', '1698386175_holi4.jpeg', 'kurtta', '467.50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`brand_id`, `brand_title`) VALUES
(1, 'Shirt'),
(2, 'T-Shirt'),
(3, 'Jeans'),
(4, 'Dress');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(12, 'Narendra', 'Congress', 'narendramodi2014@gmail.com', 'Narendra', '9448121558', '123456789', 'sdcjns,djc'),
(29, 'The Kabir', 'Sheth', 'kabir.sheth747@gmail.com', 'KabirSheth29', '9409499129', 'Surat', 'Surat'),
(34, 'Ronak', 'Sir', 'rnoak07@gmail.com', 'RonakSirUTU', '8745213698', 'UTU', 'Bardoli'),
(35, 'Princy', 'Rana', 'ranaprincy2021@gmail.com', 'princyrana', '9104622336', 'surat', 'Althan'),
(36, 'Princy', 'Rana', 'ranaprincy2021@gmail.com', 'princyrana', '9104622336', 'surat', 'Althan'),
(37, 'Dhruv', 'Patel', 'dhruv123@gmail.com', 'dhruv123456', '8695741236', 'vesu', 'surat'),
(38, 'dev', 'dev', 'dev@gmail.com', 'blueeyes123', '9409499129', 'Surat', 'Surat'),
(39, 'kevin', 'dharia', 'kevin123@gmail.com', '1234561234', '9909265096', 'althan', 'surat'),
(40, 'Sangita', 'Sheth', 'sangi.sakhi@gmail.com', 'SangiSakhi', '9427111932', 'Surat', 'Surat');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `ID` int(11) NOT NULL,
  `Name` char(20) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`ID`, `Name`, `CompanyName`, `Password`) VALUES
(1, 'Kabir', 'Kabir Fabrics and Clothes', 'KabirSheth'),
(2, 'Prerna Mistry', 'Mistry Textile', 'PrernaMistry'),
(3, 'Khushboo Desai', 'Desai Cloth Material', 'Khushboo Desai'),
(4, 'Harsh Jariwala', 'Jariwala Textile & Sons', 'HarshJariwala'),
(5, 'Vilish Dharia', 'Dharia Kapdo ki Shan', 'VilishDharia'),
(6, 'Dezal CA', 'Dezal Sarree', 'DezalCA'),
(7, 'Ishika', 'Ishi and Marriage Clothes', 'Ishika'),
(8, 'Kashish Reshamwala', 'Kashish ki Fashion', 'KashishReshamwala'),
(9, 'Princy Rana', 'Rana and Sons Textile', 'PrincyRana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customizations`
--
ALTER TABLE `customizations`
  ADD PRIMARY KEY (`customization_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `designers`
--
ALTER TABLE `designers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_pro_id`),
  ADD KEY `order_products` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customizations`
--
ALTER TABLE `customizations`
  MODIFY `customization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `designers`
--
ALTER TABLE `designers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_info`
--
ALTER TABLE `email_info`
  MODIFY `email_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customizations`
--
ALTER TABLE `customizations`
  ADD CONSTRAINT `customizations_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `customizations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`offer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
