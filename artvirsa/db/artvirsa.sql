-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 05:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artvirsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_group`
--

CREATE TABLE `article_group` (
  `AG_id` int(11) NOT NULL,
  `AG_des` varchar(100) NOT NULL,
  `extra1` varchar(100) NOT NULL,
  `extra2` varchar(100) NOT NULL,
  `extra3` varchar(100) NOT NULL,
  `extra4` varchar(100) NOT NULL,
  `extra5` varchar(100) NOT NULL,
  `extra6` varchar(100) NOT NULL,
  `extra7` varchar(100) NOT NULL,
  `extra8` varchar(100) NOT NULL,
  `extra9` varchar(100) NOT NULL,
  `extra10` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_group`
--

INSERT INTO `article_group` (`AG_id`, `AG_des`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`) VALUES
(1, 'Crafts', '', '', '', '', '', '', '', '', '', ''),
(2, 'Home Decor', '', '', '', '', '', '', '', '', '', ''),
(3, 'Apparel', '', '', '', '', '', '', '', '', '', ''),
(4, 'Footwear', '', '', '', '', '', '', '', '', '', ''),
(5, 'Accessories', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

CREATE TABLE `billing_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_label` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `city` int(11) NOT NULL,
  `street_address` varchar(500) NOT NULL,
  `appartment` varchar(500) NOT NULL,
  `floor` varchar(500) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `extra1` varchar(100) NOT NULL,
  `extra2` varchar(100) NOT NULL,
  `extra3` varchar(100) NOT NULL,
  `extra4` varchar(100) NOT NULL,
  `extra5` varchar(100) NOT NULL,
  `extra6` varchar(100) NOT NULL,
  `extra7` varchar(100) NOT NULL,
  `extra8` varchar(100) NOT NULL,
  `extra9` varchar(100) NOT NULL,
  `extra10` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`id`, `user_id`, `address_label`, `firstName`, `lastName`, `phone_no`, `city`, `street_address`, `appartment`, `floor`, `postal_code`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`) VALUES
(47, 60, 'work', 'Hammad', 'jamil', '03232584331', 13, ' Street No 8', ' House 362 Sector 14 H block Orangi Town Karachi', '1', '75800', '1', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `AG_id` int(11) NOT NULL,
  `cat_des` varchar(100) NOT NULL,
  `extra1` varchar(100) NOT NULL,
  `extra2` varchar(100) NOT NULL,
  `extra3` varchar(100) NOT NULL,
  `extra4` varchar(100) NOT NULL,
  `extra5` varchar(100) NOT NULL,
  `extra6` varchar(100) NOT NULL,
  `extra7` varchar(100) NOT NULL,
  `extra8` varchar(100) NOT NULL,
  `extra9` varchar(100) NOT NULL,
  `extra10` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `AG_id`, `cat_des`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`) VALUES
(1, 1, 'Functional', '', '', '', '', '', '', '', '', '', ''),
(2, 1, 'Decorative', '', '', '', '', '', '', '', '', '', ''),
(9, 1, 'Fashion', '', '', '', '', '', '', '', '', '', ''),
(10, 2, 'Home Decor', '', '', '', '', '', '', '', '', '', ''),
(11, 2, 'Furnishing', '', '', '', '', '', '', '', '', '', ''),
(12, 2, 'Home Textile', '', '', '', '', '', '', '', '', '', ''),
(13, 3, 'Women Clothing', '', '', '', '', '', '', '', '', '', ''),
(14, 3, 'Men Clothing', '', '', '', '', '', '', '', '', '', ''),
(15, 3, 'Kids Clothing', '', '', '', '', '', '', '', '', '', ''),
(16, 4, 'Women Shoes', '', '', '', '', '', '', '', '', '', ''),
(17, 4, 'Men Shoes', '', '', '', '', '', '', '', '', '', ''),
(18, 5, 'Bags & Purses', '', '', '', '', '', '', '', '', '', ''),
(19, 5, 'Jewellery', '', '', '', '', '', '', '', '', '', ''),
(20, 5, 'Miscellaneous ', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `state_id`, `city_title`) VALUES
(9, 7, 'Karachi'),
(10, 7, 'Larkana'),
(11, 7, 'Hyderabad'),
(12, 7, 'Jacobabad'),
(13, 7, 'Jamshoro'),
(14, 7, 'Korangi');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `your_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_title`) VALUES
(1, 'Pakistan'),
(3, 'Bangladesh'),
(4, 'Canada'),
(5, 'France'),
(11, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `item_img`
--

CREATE TABLE `item_img` (
  `item_img_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_image` varchar(500) NOT NULL,
  `EXTRA1` varchar(100) NOT NULL,
  `EXTRA2` varchar(100) NOT NULL,
  `EXTRA3` varchar(100) NOT NULL,
  `EXTRA4` varchar(100) NOT NULL,
  `EXTRA5` varchar(100) NOT NULL,
  `EXTRA6` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_img`
--

INSERT INTO `item_img` (`item_img_id`, `item_id`, `item_image`, `EXTRA1`, `EXTRA2`, `EXTRA3`, `EXTRA4`, `EXTRA5`, `EXTRA6`) VALUES
(301, 39, '28870080_213231355924575_1485579546454392832_n (1).jpg', '', '', '', '', '', ''),
(302, 39, '28870167_213230732591304_1945648815339995136_n.jpg', '', '', '', '', '', ''),
(303, 40, '28871777_213231149257929_5263506039273160704_n.jpg', '', '', '', '', '', ''),
(304, 40, '29026366_213230712591306_7889607116023922688_n.jpg', '', '', '', '', '', ''),
(305, 36, '28951942_213231009257943_6696407421000089600_n.jpg', '', '', '', '', '', ''),
(306, 36, '29025368_213231295924581_2279270338611118080_n.jpg', '', '', '', '', '', ''),
(311, 43, 'Thar Diplo 01.jpg', '', '', '', '', '', ''),
(312, 43, 'Thar Diplo 05.jpg', '', '', '', '', '', ''),
(315, 43, 'Thar Diplo 09.jpg', '', '', '', '', '', ''),
(316, 43, 'Thar Diplo 11.jpg', '', '', '', '', '', ''),
(317, 45, '29026308_213231099257934_8158788680857681920_n.jpg', '', '', '', '', '', ''),
(318, 45, '29066264_213230989257945_802464688787947520_n (1).jpg', '', '', '', '', '', ''),
(319, 46, '28951754_213232285924482_4685326247784349696_n.jpg', '', '', '', '', '', ''),
(320, 46, '28958550_213231409257903_1286865673254862848_n.jpg', '', '', '', '', '', ''),
(321, 47, 'p15.png', '', '', '', '', '', ''),
(322, 47, 'p16.png', '', '', '', '', '', ''),
(323, 47, 'Thar Diplo 04.jpg', '', '', '', '', '', ''),
(324, 47, 'Thar Diplo 08.jpg', '', '', '', '', '', ''),
(325, 47, 'Thar Diplo 12.jpg', '', '', '', '', '', ''),
(326, 47, 'Thar Diplo 17.jpg', '', '', '', '', '', ''),
(327, 47, 'Thar Diplo 18.jpg', '', '', '', '', '', ''),
(328, 48, 'p4.jpg', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `item_master`
--

CREATE TABLE `item_master` (
  `id` int(11) NOT NULL,
  `article_group` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_description` varchar(1000) NOT NULL,
  `item_price` varchar(100) NOT NULL,
  `item_qty` varchar(100) NOT NULL,
  `item_discount` varchar(100) NOT NULL,
  `item_feature` int(11) NOT NULL,
  `item_popular` int(11) NOT NULL,
  `item_top_selling` int(11) NOT NULL,
  `extra1` varchar(111) NOT NULL,
  `extra2` varchar(111) NOT NULL,
  `extra3` varchar(111) NOT NULL,
  `extra4` varchar(111) NOT NULL,
  `extra5` varchar(100) NOT NULL,
  `extra6` varchar(100) NOT NULL,
  `extra7` varchar(100) NOT NULL,
  `extra8` varchar(100) NOT NULL,
  `extra9` varchar(100) NOT NULL,
  `extra10` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_master`
--

INSERT INTO `item_master` (`id`, `article_group`, `category`, `sub_cat_id`, `item_name`, `item_description`, `item_price`, `item_qty`, `item_discount`, `item_feature`, `item_popular`, `item_top_selling`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`) VALUES
(36, 5, 18, 50, 'Hand Made Bag', 'Hand Made Red Bag', '0', '3', '0', 1, 1, 1, '', '', '', '', '', '', '', '', '', ''),
(39, 5, 18, 50, 'Red Puoche', 'Red Color Pouche', '0', '5', '0', 1, 1, 1, '', '', '', '', '', '', '', '', '', ''),
(40, 5, 18, 52, 'Red Shoulder Bags', 'Red Color Shoulder bagsa', '0', '0', '0', 1, 1, 1, '', '', '', '', '', '', '', '', '', ''),
(43, 2, 12, 26, 'Red Embroidery 2', 'Red Embroidery 2', '0', '0', '0', 1, 0, 1, '', '', '', '', '', '', '', '', '', ''),
(45, 5, 18, 50, 'Pouche', 'Red Color Pouche', '0', '2', '0', 1, 1, 0, '', '', '', '', '', '', '', '', '', ''),
(46, 3, 13, 29, 'Shawls', 'Yellow And Black Shawls', '0', '2', '0', 1, 1, 1, '', '', '', '', '', '', '', '', '', ''),
(47, 2, 12, 26, 'Colorful Embroidery', 'Colorful Embroidery ', '0', '2', '0', 1, 1, 1, '', '', '', '', '', '', '', '', '', ''),
(48, 2, 12, 25, 'Circle Colorful ', 'Circle colorful Embroidery ', '0', '0', '0', 1, 1, 1, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `O_id` int(11) NOT NULL,
  `user_order_id` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_time` time NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(100) NOT NULL,
  `extra2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`O_id`, `user_order_id`, `order_date`, `order_time`, `order_status`, `extra2`) VALUES
(43, 60, '2022-08-23', '19:06:20', 'complete', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `U_order_id` int(11) NOT NULL,
  `extra6` varchar(100) NOT NULL,
  `extra7` varchar(100) NOT NULL,
  `extra8` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `product_price`, `total_price`, `user_id`, `payment_id`, `billing_id`, `order_status`, `order_date`, `U_order_id`, `extra6`, `extra7`, `extra8`) VALUES
(137, 36, '1', '0', '0', 0, 1, 47, 'complete', '2022-08-23', 43, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `otp_exp`
--

CREATE TABLE `otp_exp` (
  `otp_id` int(11) NOT NULL,
  `otp_code` int(11) NOT NULL,
  `otp_expry` int(11) NOT NULL,
  `otp_email` varchar(50) NOT NULL,
  `otp_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp_exp`
--

INSERT INTO `otp_exp` (`otp_id`, `otp_code`, `otp_expry`, `otp_email`, `otp_date`) VALUES
(1, 122423, 0, 'hmmadjamil@gmail.com', '2022-07-13 13:48:52'),
(2, 594440, 0, 'hmmadjamil@gmail.com', '2022-07-13 13:49:52'),
(3, 347470, 1, 'hmmadjamil@gmail.com', '2022-07-13 13:50:27'),
(4, 779764, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:09:16'),
(5, 982926, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:10:12'),
(6, 159778, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:11:00'),
(7, 678760, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:11:15'),
(8, 426699, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:11:28'),
(9, 787588, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:11:43'),
(10, 693778, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:12:18'),
(11, 773059, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:12:47'),
(12, 138108, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:12:56'),
(13, 852506, 1, 'hmmadjamil@gmail.com', '2022-07-13 14:13:07'),
(14, 692769, 1, 'hmmadjamil@gmail.com', '2022-07-13 14:17:12'),
(15, 598590, 1, 'hmmadjamil@gmail.com', '2022-07-13 14:20:26'),
(16, 169489, 1, 'hmmadjamil@gmail.com', '2022-07-13 14:23:04'),
(17, 399420, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:24:02'),
(18, 777561, 0, 'hmmadjamil@gmail.com', '2022-07-13 14:29:43'),
(19, 791657, 0, 'aamir.aziz@surplus.com.pk', '2022-07-13 14:30:52'),
(20, 187581, 1, 'hmmadjamil@gmail.com', '2022-07-13 14:31:16'),
(21, 644721, 1, 'hmmadjamil@gmail.com', '2022-07-13 14:34:47'),
(22, 835353, 1, 'hmmadjamil@gmail.com', '2022-07-13 14:36:35'),
(23, 549426, 0, 'amiraziz089@gmail.com', '2022-07-13 14:37:19'),
(24, 958150, 0, 'aamir.aziz@surplus.com.pk', '2022-07-13 15:01:01'),
(25, 111572, 1, 'hmmadjamil@gmail.com', '2022-07-13 15:06:54'),
(26, 439630, 0, 'amiraziz089@gmail.com', '2022-07-13 15:13:55'),
(27, 775335, 0, 'hmmadjamil@gmail.com', '2022-07-13 15:14:31'),
(28, 780226, 0, 'hmmadjamil@gmail.com', '2022-07-13 15:17:03'),
(29, 222372, 0, 'aamir.aziz@surplus.com.pk', '2022-07-13 15:17:16'),
(30, 204180, 0, 'aamir.aziz@surplus.com.pk', '2022-07-13 15:17:32'),
(31, 261314, 1, 'hmmadjamil@gmail.com', '2022-07-13 15:18:02'),
(32, 210498, 1, 'amiraziz089@gmail.com', '2022-07-13 15:18:29'),
(33, 362533, 1, 'tahirmehmood18899@gmail.com', '2022-07-13 15:19:29'),
(34, 330675, 1, 'hmmadjamil@gmail.com', '2022-07-13 15:19:59'),
(35, 981198, 1, 'hmmadjamil@gmail.com', '2022-07-13 16:49:36'),
(36, 302253, 1, 'amiraziz089@gmail.com', '2022-07-13 17:13:29'),
(37, 311588, 1, 'amiraziz089@gmail.com', '2022-07-13 17:14:26'),
(38, 608623, 1, 'amiraziz089@gmail.com', '2022-07-13 17:33:34'),
(39, 856565, 1, 'amiraziz089@gmail.com', '2022-07-13 18:37:51'),
(40, 108178, 1, 'amiraziz089@gmail.com', '2022-07-13 18:45:27'),
(41, 990364, 1, 'hmmadjamil@gmail.com', '2022-07-13 18:48:47'),
(42, 282745, 1, 'guitaristhammad@gmail.com', '2022-07-13 18:54:13'),
(43, 692933, 1, 'amiraziz089@gmail.com', '2022-07-13 18:58:52'),
(44, 133642, 1, 'hmmadjamil@gmail.com', '2022-07-13 19:08:13'),
(45, 757004, 1, 'amiraziz089@gmail.com', '2022-07-13 19:10:20'),
(46, 268551, 1, 'hmmadjamil@gmail.com', '2022-07-13 19:12:27'),
(47, 149202, 1, 'hmmadjamil@gmail.com', '2022-07-14 12:26:54'),
(48, 574599, 1, 'guitaristhammad@gmail.com', '2022-07-14 12:34:38'),
(49, 432385, 1, 'hmmadjamil@gmail.com', '2022-07-14 12:41:02'),
(50, 579638, 1, 'guitaristhammad@gmail.com', '2022-07-14 12:44:21'),
(51, 205966, 1, 'guitaristhammad@gmail.com', '2022-07-14 12:44:57'),
(52, 214538, 1, 'hmmadjamil@gmail.com', '2022-07-14 12:46:20'),
(53, 986552, 0, 'guitaristhammad@gmail.com', '2022-07-14 12:49:10'),
(54, 527070, 1, 'hmmadjamil@gmail.com', '2022-07-14 12:50:23'),
(55, 695868, 1, 'aamir.aziz@surplus.com.pk', '2022-07-14 12:51:45'),
(56, 338036, 1, 'hmmadjamil@gmail.com', '2022-07-14 12:52:42'),
(57, 854679, 1, 'hmmadjamil@gmail.com', '2022-07-14 13:11:53'),
(58, 578695, 1, 'aamir.aziz@surplus.com.pk', '2022-07-14 13:12:58'),
(59, 141456, 1, 'hmmadjamil@gmail.com', '2022-07-14 17:32:42'),
(60, 386886, 1, 'hmmadjamil@gmail.com', '2022-07-15 12:24:35'),
(61, 342148, 1, 'hmmadjamil@gmail.com', '2022-07-15 12:26:05'),
(62, 880355, 1, 'hmmadjamil@gmail.com', '2022-07-15 13:12:24'),
(63, 261339, 1, 'hmmadjamil@gmail.com', '2022-07-15 14:14:08'),
(64, 139978, 0, 'hmmadjamil@gmail.com', '2022-07-15 14:42:30'),
(65, 631485, 0, 'hmmadjamil@gmail.com', '2022-07-15 14:45:10'),
(66, 552418, 1, 'hmmadjamil@gmail.com', '2022-07-15 14:51:41'),
(67, 629915, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:17:09'),
(68, 660461, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:18:03'),
(69, 602339, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:18:19'),
(70, 919109, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:18:30'),
(71, 520375, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:19:00'),
(72, 756559, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:19:54'),
(73, 542790, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:20:10'),
(74, 335801, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:21:59'),
(75, 286951, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:22:10'),
(76, 477889, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:22:24'),
(77, 892860, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:22:35'),
(78, 970755, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:22:43'),
(79, 533464, 0, 'amiraziz089@gmail.com', '2022-07-15 15:23:08'),
(80, 190559, 0, 'amiraziz089@gmail.com', '2022-07-15 15:27:14'),
(81, 846768, 0, 'amiraziz089@gmail.com', '2022-07-15 15:27:24'),
(82, 379854, 0, 'amiraziz089@gmail.com', '2022-07-15 15:27:45'),
(83, 620069, 0, 'amiraziz089@gmail.com', '2022-07-15 15:27:55'),
(84, 725305, 0, 'amiraziz089@gmail.com', '2022-07-15 15:28:29'),
(85, 842761, 0, 'amiraziz089@gmail.com', '2022-07-15 15:29:16'),
(86, 615185, 0, 'amiraziz089@gmail.com', '2022-07-15 15:29:42'),
(87, 824716, 0, 'amiraziz089@gmail.com', '2022-07-15 15:30:21'),
(88, 254138, 0, 'amiraziz089@gmail.com', '2022-07-15 15:30:35'),
(89, 596838, 0, 'amiraziz089@gmail.com', '2022-07-15 15:30:54'),
(90, 587172, 0, 'amiraziz089@gmail.com', '2022-07-15 15:31:11'),
(91, 381497, 0, 'amiraziz089@gmail.com', '2022-07-15 15:31:29'),
(92, 575163, 0, 'amiraziz089@gmail.com', '2022-07-15 15:31:53'),
(93, 159328, 0, 'amiraziz089@gmail.com', '2022-07-15 15:31:58'),
(94, 618576, 0, 'amiraziz089@gmail.com', '2022-07-15 15:32:24'),
(95, 929430, 0, 'amiraziz089@gmail.com', '2022-07-15 15:35:08'),
(96, 873705, 0, 'amiraziz089@gmail.com', '2022-07-15 15:35:40'),
(97, 817029, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:36:06'),
(98, 876425, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:36:50'),
(99, 539839, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:37:25'),
(100, 648429, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:39:18'),
(101, 399607, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:40:24'),
(102, 805054, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:42:43'),
(103, 196810, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:44:18'),
(104, 774005, 1, 'hmmadjamil@gmail.com', '2022-07-15 15:45:56'),
(105, 944086, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:47:17'),
(106, 997959, 1, 'hmmadjamil@gmail.com', '2022-07-15 15:48:03'),
(107, 653859, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:48:25'),
(108, 862344, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:48:38'),
(109, 294755, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:49:13'),
(110, 238390, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:50:20'),
(111, 395782, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:51:01'),
(112, 740077, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:51:13'),
(113, 308399, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:51:24'),
(114, 195843, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:51:41'),
(115, 869531, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:51:54'),
(116, 565993, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:52:07'),
(117, 694592, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:52:22'),
(118, 572023, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:52:41'),
(119, 850951, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:53:20'),
(120, 751149, 1, 'fahama@gmail.com', '2022-07-15 15:54:04'),
(121, 120127, 0, 'fahama@gmail.com', '2022-07-15 15:54:39'),
(122, 166149, 1, 'fahama@gmail.com', '2022-07-15 15:55:04'),
(123, 282463, 0, 'hmmadjamil@gmail.com', '2022-07-15 15:56:08'),
(124, 823488, 1, 'hmmadjamil@gmail.com', '2022-07-15 15:56:37'),
(125, 279036, 0, 'fahama@gmail.com', '2022-07-15 15:57:20'),
(126, 884498, 1, 'fahama@gmail.com', '2022-07-15 15:57:38'),
(127, 986810, 0, 'hmmadjamil@gmail.com', '2022-07-15 16:00:07'),
(128, 233685, 0, 'hmmadjamil@gmail.com', '2022-07-15 16:00:25'),
(129, 307666, 0, 'hmmadjamil@gmail.com', '2022-07-15 16:00:39'),
(130, 212493, 0, 'hmmadjamil@gmail.com', '2022-07-15 16:01:12'),
(131, 749113, 1, 'hmmadjamil@gmail.com', '2022-07-15 16:01:33'),
(132, 824646, 0, 'hmmadjamil@gmail.com', '2022-07-15 18:51:53'),
(133, 745385, 1, 'amiraziz089@gmail.com', '2022-07-15 18:52:16'),
(134, 782203, 0, 'hmmadjamil@gmail.com', '2022-07-15 18:54:38'),
(135, 725506, 1, 'hmmadjamil@gmail.com', '2022-07-15 18:55:01'),
(136, 806059, 1, 'hmmadjamil@gmail.com', '2022-07-15 19:06:48'),
(137, 787567, 0, 'hmmadjamil@gmail.com', '2022-07-16 12:56:48'),
(138, 552554, 1, 'hmmadjamil@gmail.com', '2022-07-16 12:57:10'),
(139, 492937, 1, 'hmmadjamil@gmail.com', '2022-07-16 13:14:17'),
(140, 804996, 0, 'hmmadjamil@gmail.com', '2022-07-16 13:32:12'),
(141, 909178, 1, 'hmmadjamil@gmail.com', '2022-07-16 13:32:30'),
(142, 155528, 1, 'hmmadjamil@gmail.com', '2022-07-16 13:33:00'),
(143, 419624, 1, 'hmmadjamil@gmail.com', '2022-07-16 13:33:27'),
(144, 532366, 1, 'hmmadjamil@gmail.com', '2022-07-16 13:53:54'),
(145, 142540, 1, 'hmmadjamil@gmail.com', '2022-07-16 14:45:07'),
(146, 897817, 1, 'amiraziz089@gmail.com', '2022-07-16 14:45:39'),
(147, 568778, 1, 'hmmadjamil@gmail.com', '2022-07-19 13:19:07'),
(148, 778793, 0, 'hmmadjamil@gmail.com', '2022-07-22 14:48:06'),
(149, 489220, 1, 'hmmadjamil@gmail.com', '2022-07-22 14:48:29'),
(150, 589657, 1, 'hmmadjamil@gmail.com', '2022-07-23 13:54:23'),
(151, 752803, 0, 'hmmadjamil@gmail.com', '2022-07-23 18:11:21'),
(152, 603938, 1, 'hmmadjamil@gmail.com', '2022-07-23 18:11:43'),
(153, 169135, 1, 'hmmadjamil@gmail.com', '2022-07-27 14:21:30'),
(154, 123630, 1, 'hmmadjamil@gmail.com', '2022-07-27 15:38:01'),
(155, 619154, 1, 'hmmadjamil@gmail.com', '2022-07-28 12:36:30'),
(156, 531969, 1, 'hmmadjamil@gmail.com', '2022-07-28 15:21:23'),
(157, 324898, 1, 'hmmadjamil@gmail.com', '2022-07-28 16:50:17'),
(158, 970354, 1, 'aamir.aziz@surplus.com.pk', '2022-07-28 17:49:03'),
(159, 628107, 1, 'hmmadjamil@gmail.com', '2022-07-28 18:41:31'),
(160, 749844, 1, 'hmmadjamil@gmail.com', '2022-07-29 12:53:01'),
(161, 792750, 1, 'hmmadjamil@gmail.com', '2022-07-30 12:58:53'),
(162, 404967, 0, 'hmmadjamil@gmail.com', '2022-07-30 13:02:51'),
(163, 746471, 1, 'amiraziz089@gmail.com', '2022-07-30 13:03:05'),
(164, 455513, 1, 'hmmadjamil@gmail.com', '2022-07-30 15:06:44'),
(165, 362663, 1, 'amiraziz089@gmail.com', '2022-07-30 17:52:55'),
(166, 922042, 1, 'hmmadjamil@gmail.com', '2022-07-30 18:00:16'),
(167, 585444, 1, 'hmmadjamil@gmail.com', '2022-07-30 19:48:37'),
(168, 249581, 1, 'hmmadjamil@gmail.com', '2022-08-01 13:33:14'),
(169, 207813, 1, 'amiraziz089@gmail.com', '2022-08-01 13:46:35'),
(170, 136709, 1, 'hmmadjamil@gmail.com', '2022-08-01 16:50:37'),
(171, 259237, 1, 'hmmadjamil@gmail.com', '2022-08-01 17:07:06'),
(172, 221998, 1, 'amiraziz089@gmail.com', '2022-08-01 17:09:07'),
(173, 872355, 1, 'hmmadjamil@gmail.com', '2022-08-01 17:17:57'),
(174, 833537, 1, 'hmmadjamil@gmail.com', '2022-08-02 13:54:09'),
(175, 326064, 1, 'hmmadjamil@gmail.com', '2022-08-02 17:34:42'),
(176, 237718, 1, 'hmmadjamil@gmail.com', '2022-08-03 13:47:28'),
(177, 462171, 1, 'hmmadjamil@gmail.com', '2022-08-05 13:14:15'),
(178, 203610, 1, 'hmmadjamil@gmail.com', '2022-08-05 19:15:19'),
(179, 922131, 1, 'hmmadjamil@gmail.com', '2022-08-06 16:08:39'),
(180, 907577, 0, 'hmmadjamil@gmail.com', '2022-08-10 13:09:24'),
(181, 569906, 1, 'hmmadjamil@gmail.com', '2022-08-10 13:10:02'),
(182, 159249, 1, 'hmmadjamil@gmail.com', '2022-08-10 13:20:32'),
(183, 264240, 1, 'hmmadjamil@gmail.com', '2022-08-10 13:23:53'),
(184, 814886, 1, 'hmmadjamil@gmail.com', '2022-08-10 13:35:07'),
(185, 706149, 0, 'zatopgotovpn@gmail.com', '2022-08-10 13:38:21'),
(186, 940704, 1, 'hmmadjamil@gmail.com', '2022-08-10 13:39:49'),
(187, 201262, 1, 'zatopgotovpn@gmail.com', '2022-08-10 13:40:51'),
(188, 321648, 0, 'hmmadjamil@gmail.com', '2022-08-10 13:43:24'),
(189, 527522, 0, 'hmmadjamil@gmail.com', '2022-08-10 13:43:42'),
(190, 464737, 1, 'zatopgotovpn@gmail.com', '2022-08-10 13:50:47'),
(191, 910044, 1, 'amiraziz089@gmail.com', '2022-08-10 13:55:57'),
(192, 348024, 0, 'aamir.aziz@surplus.com.pk', '2022-08-10 14:21:50'),
(193, 790341, 0, 'hmmadjamil@gmail.com', '2022-08-10 14:23:25'),
(194, 522318, 1, 'guitaristhammad@gmail.com', '2022-08-10 14:24:14'),
(195, 336300, 0, 'hmmadjamil@gmail.com', '2022-08-10 14:26:59'),
(196, 149596, 0, 'hmmadjamil@gmail.com', '2022-08-10 14:28:47'),
(197, 479822, 1, 'hmmadjamil@gmail.com', '2022-08-10 14:29:30'),
(198, 463805, 1, 'hmmadjamil@gmail.com', '2022-08-10 14:47:06'),
(199, 415037, 0, 'hmmadjamil@gmail.com', '2022-08-10 14:48:00'),
(200, 411927, 0, 'hmmadjamil@gmail.com', '2022-08-10 14:48:14'),
(201, 946651, 0, 'hmmadjamil@gmail.com', '2022-08-10 14:48:52'),
(202, 661116, 0, 'hmmadjamil@gmail.com', '2022-08-10 14:49:13'),
(203, 126308, 0, 'hmmadjamil@gmail.com', '2022-08-10 14:49:38'),
(204, 870064, 1, 'hmmadjamil@gmail.com', '2022-08-10 14:49:50'),
(205, 200346, 1, 'hmmadjamil@gmail.com', '2022-08-10 18:32:14'),
(206, 950110, 1, 'guitaristhammad@gmail.com', '2022-08-10 18:32:53'),
(207, 917647, 1, 'hmmadjamil@gmail.com', '2022-08-10 18:35:18'),
(208, 909320, 1, 'zatopgotovpn@gmail.com', '2022-08-10 18:38:11'),
(209, 368460, 1, 'hmmadjamil@gmail.com', '2022-08-10 19:13:24'),
(210, 718584, 0, 'hmmadjamil@gmail.com', '2022-08-11 13:05:53'),
(211, 250619, 1, 'hmmadjamil@gmail.com', '2022-08-11 13:06:35'),
(212, 826314, 0, 'alisufyan2410@gmail.com', '2022-08-11 13:07:31'),
(213, 719300, 1, 'hmmadjamil@gmail.com', '2022-08-11 15:15:59'),
(214, 264498, 1, 'hmmadjamil@gmail.com', '2022-08-11 15:37:36'),
(215, 434554, 1, 'amiraziz089@gmail.com', '2022-08-11 15:51:20'),
(216, 507095, 1, 'hmmadjamil@gmail.com', '2022-08-11 18:26:48'),
(217, 117937, 1, 'aamir.aziz@surplus.com.pk', '2022-08-12 19:33:59'),
(218, 689222, 0, 'hmmadjamil@gmail.com', '2022-08-13 17:58:55'),
(219, 227425, 1, 'hmmadjamil@gmail.com', '2022-08-13 17:59:14'),
(220, 933620, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:00:26'),
(221, 928962, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:00:40'),
(222, 987093, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:04:48'),
(223, 509014, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:05:50'),
(224, 469290, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:06:08'),
(225, 952549, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:07:54'),
(226, 237784, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:08:56'),
(227, 863848, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:09:28'),
(228, 629557, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:10:04'),
(229, 394939, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:10:30'),
(230, 622112, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:12:34'),
(231, 716273, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:16:24'),
(232, 660886, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:17:39'),
(233, 576114, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:18:02'),
(234, 699106, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:21:11'),
(235, 514627, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:21:29'),
(236, 288799, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:23:23'),
(237, 262437, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:23:40'),
(238, 408771, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:24:35'),
(239, 391517, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:27:18'),
(240, 190872, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:31:28'),
(241, 759942, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:33:14'),
(242, 745257, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:34:21'),
(243, 128039, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:34:35'),
(244, 513949, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:38:21'),
(245, 470790, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:38:32'),
(246, 685685, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:39:36'),
(247, 929650, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:39:46'),
(248, 293175, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:40:17'),
(249, 279485, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:40:49'),
(250, 576922, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:42:43'),
(251, 513232, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:42:52'),
(252, 725622, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:44:32'),
(253, 751358, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:45:09'),
(254, 786420, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:45:41'),
(255, 214949, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:46:06'),
(256, 674103, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:46:15'),
(257, 797415, 0, 'guitaristhammad@gmail.com', '2022-08-13 18:48:11'),
(258, 845866, 0, 'guitaristhammad@gmail.com', '2022-08-13 18:48:28'),
(259, 255952, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:56:22'),
(260, 549645, 1, 'hmmadjamil@gmail.com', '2022-08-13 18:57:07'),
(261, 142439, 0, 'hmmadjamil@gmail.com', '2022-08-13 18:58:23'),
(262, 296235, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:00:21'),
(263, 355448, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:01:01'),
(264, 166734, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:01:52'),
(265, 693686, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:02:02'),
(266, 572449, 1, 'guitaristhammad@gmail.com', '2022-08-13 19:04:19'),
(267, 179494, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:04:58'),
(268, 871751, 1, 'hmmadjamil@gmail.com', '2022-08-13 19:05:15'),
(269, 302965, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:24:01'),
(270, 792785, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:24:46'),
(271, 877443, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:25:04'),
(272, 195721, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:25:37'),
(273, 255004, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:26:10'),
(274, 487523, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:27:04'),
(275, 669147, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:28:28'),
(276, 578638, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:29:23'),
(277, 784057, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:32:29'),
(278, 188673, 1, 'hmmadjamil@gmail.com', '2022-08-13 19:35:05'),
(279, 575660, 1, 'hmmadjamil@gmail.com', '2022-08-13 19:36:55'),
(280, 892960, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:37:54'),
(281, 4575, 1, 'hmmadjamil@gmail.com', '2022-08-13 19:39:21'),
(282, 4315, 1, 'hmmadjamil@gmail.com', '2022-08-13 19:40:35'),
(283, 5957, 1, 'guitaristhammad@gmail.com', '2022-08-13 19:41:07'),
(284, 4340, 1, 'hmmadjamil@gmail.com', '2022-08-13 19:41:56'),
(285, 8133, 0, 'hmmadjamil@gmail.com', '2022-08-13 19:43:30'),
(286, 6123, 1, 'hmmadjamil@gmail.com', '2022-08-13 19:52:18'),
(287, 9224, 1, 'hmmadjamil@gmail.com', '2022-08-13 20:04:25'),
(288, 3273, 1, 'hmmadjamil@gmail.com', '2022-08-15 15:54:27'),
(289, 4170, 0, 'hmmadjamil@gmail.com', '2022-08-15 15:54:52'),
(290, 9482, 1, 'hmmadjamil@gmail.com', '2022-08-15 15:55:03'),
(291, 6921, 1, 'hmmadjamil@gmail.com', '2022-08-15 16:10:57'),
(292, 2554, 1, 'hmmadjamil@gmail.com', '2022-08-15 16:30:33'),
(293, 4591, 1, 'hmmadjamil@gmail.com', '2022-08-23 14:52:06'),
(294, 9184, 1, 'hmmadjamil@gmail.com', '2022-08-23 14:54:39'),
(295, 2053, 1, 'hmmadjamil@gmail.com', '2022-08-23 16:14:23'),
(296, 3054, 1, 'hmmadjamil@gmail.com', '2022-08-23 16:38:28'),
(297, 6059, 1, 'hmmadjamil@gmail.com', '2022-08-23 17:10:00'),
(298, 2556, 1, 'hmmadjamil@gmail.com', '2022-08-23 17:49:24'),
(299, 6247, 1, 'hmmadjamil@gmail.com', '2022-08-23 19:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL,
  `extra2` varchar(100) NOT NULL,
  `extra3` varchar(100) NOT NULL,
  `extra4` varchar(100) NOT NULL,
  `extra5` varchar(100) NOT NULL,
  `extra6` int(11) NOT NULL,
  `extra7` int(11) NOT NULL,
  `extra8` int(11) NOT NULL,
  `extra9` int(11) NOT NULL,
  `extra10` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `payment_method`, `img`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`) VALUES
(1, 'Cash On Delivery', '', '', '', '', '', 0, 0, 0, 0, 0),
(2, 'Self Collect', '', '', '', '', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profolio_slider`
--

CREATE TABLE `profolio_slider` (
  `P_id` int(11) NOT NULL,
  `slider_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profolio_slider`
--

INSERT INTO `profolio_slider` (`P_id`, `slider_url`) VALUES
(11, 'client-brand-java.png'),
(12, 'client-brand-css3.png'),
(13, 'client-brand-html5.png'),
(14, 'client-brand-wordpress.png'),
(15, 'client-brand-joomla.png'),
(16, 'client-brand-jquery.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `Rev_id` int(11) NOT NULL,
  `Rev_description` varchar(500) NOT NULL,
  `ratings` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) NOT NULL,
  `Rev_name` varchar(50) NOT NULL,
  `Rev_email` varchar(500) NOT NULL,
  `Extra5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`Rev_id`, `Rev_description`, `ratings`, `date`, `item_id`, `Rev_name`, `Rev_email`, `Extra5`) VALUES
(5, 'This Shawl is Very Nice', 5, '2022-08-23', 46, 'Hammad Jamil', 'hmmadjamil@gmail.com', 0),
(6, 'good Quality', 4, '2022-08-23', 46, 'Hammad Jamil', 'hmdjml@gmail.com', 0),
(7, 'Good ', 3, '2022-08-23', 46, 'arham', 'don0077x89@gmail.com', 0),
(8, 'This is Good ', 4, '2022-08-23', 45, 'Sufiyan Ali', 'don0077x89@gmail.com', 0),
(14, 'Very Good Item ', 3, '2022-08-23', 39, 'Hammad Jamil', 'hmmadjamil@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state_title`) VALUES
(1, 1, 'Azad Jammu and Kashmir'),
(2, 1, 'Balochistan	'),
(3, 1, 'Gilgit-Baltistan	'),
(4, 1, 'Islamabad Capital Territory'),
(5, 1, 'Khyber Pakhtunkhwa	'),
(6, 1, 'Punjab'),
(7, 1, 'Sindh');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_cat_id` int(11) NOT NULL,
  `sub_cat_des` varchar(100) NOT NULL,
  `extra1` varchar(100) NOT NULL,
  `extra2` varchar(100) NOT NULL,
  `extra3` varchar(100) NOT NULL,
  `extra4` varchar(100) NOT NULL,
  `extra5` varchar(100) NOT NULL,
  `extra6` varchar(100) NOT NULL,
  `extra7` varchar(100) NOT NULL,
  `extra8` varchar(100) NOT NULL,
  `extra9` varchar(100) NOT NULL,
  `extra10` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_cat_id`, `sub_cat_cat_id`, `sub_cat_des`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`) VALUES
(1, 1, 'Blue Pottery', '', '', '', '', '', '', '', '', '', ''),
(2, 1, 'Ceramic & Pottery', '', '', '', '', '', '', '', '', '', ''),
(3, 1, 'Basketry', '', '', '', '', '', '', '', '', '', ''),
(4, 2, 'Camel Skin', '', '', '', '', '', '', '', '', '', ''),
(5, 2, 'Lacquer Art', '', '', '', '', '', '', '', '', '', ''),
(6, 2, 'Wood Craft', '', '', '', '', '', '', '', '', '', ''),
(7, 2, 'Metal Craft', '', '', '', '', '', '', '', '', '', ''),
(8, 2, 'Onyx Craft', '', '', '', '', '', '', '', '', '', ''),
(9, 9, 'Ajrak', '', '', '', '', '', '', '', '', '', ''),
(10, 9, 'Khussa', '', '', '', '', '', '', '', '', '', ''),
(11, 9, 'Paper Mache', '', '', '', '', '', '', '', '', '', ''),
(12, 9, 'Bone Carving', '', '', '', '', '', '', '', '', '', ''),
(13, 9, 'Truck Art', '', '', '', '', '', '', '', '', '', ''),
(14, 10, 'Planters', '', '', '', '', '', '', '', '', '', ''),
(15, 10, 'Boxes & Jars', '', '', '', '', '', '', '', '', '', ''),
(16, 10, 'Lamps', '', '', '', '', '', '', '', '', '', ''),
(17, 10, 'Vases & Holders', '', '', '', '', '', '', '', '', '', ''),
(18, 10, 'Pottery & Tableware', '', '', '', '', '', '', '', '', '', ''),
(19, 10, 'Trays & Baskets', '', '', '', '', '', '', '', '', '', ''),
(20, 11, 'Doors & Wall Hangings', '', '', '', '', '', '', '', '', '', ''),
(21, 11, 'Paintings', '', '', '', '', '', '', '', '', '', ''),
(22, 11, 'Sculptures', '', '', '', '', '', '', '', '', '', ''),
(23, 11, 'Furniture', '', '', '', '', '', '', '', '', '', ''),
(24, 11, 'Rugs & Carpets', '', '', '', '', '', '', '', '', '', ''),
(25, 12, 'Cushions', '', '', '', '', '', '', '', '', '', ''),
(26, 12, 'Bed Covers', '', '', '', '', '', '', '', '', '', ''),
(27, 12, 'Blankets & Khess', '', '', '', '', '', '', '', '', '', ''),
(28, 12, 'Tissue Box Covers', '', '', '', '', '', '', '', '', '', ''),
(29, 13, 'Scarfs & Shawls', '', '', '', '', '', '', '', '', '', ''),
(30, 13, 'Unstitched Fabric', '', '', '', '', '', '', '', '', '', ''),
(31, 13, 'Pret Shirt & Kurta', '', '', '', '', '', '', '', '', '', ''),
(32, 13, 'Hats & Caps', '', '', '', '', '', '', '', '', '', ''),
(33, 13, 'Coats & Uppers', '', '', '', '', '', '', '', '', '', ''),
(34, 14, 'Scarfs & Shawls', '', '', '', '', '', '', '', '', '', ''),
(35, 14, 'Shirts & Kurta', '', '', '', '', '', '', '', '', '', ''),
(36, 14, 'Unstitched Fabric', '', '', '', '', '', '', '', '', '', ''),
(37, 14, 'Hats & Caps', '', '', '', '', '', '', '', '', '', ''),
(38, 14, 'Coats & Uppers', '', '', '', '', '', '', '', '', '', ''),
(39, 15, 'Dresses', '', '', '', '', '', '', '', '', '', ''),
(40, 15, 'Kurta & Shirts', '', '', '', '', '', '', '', '', '', ''),
(41, 15, 'Hats & Caps', '', '', '', '', '', '', '', '', '', ''),
(42, 15, 'Sweaters, Coats & Uppers', '', '', '', '', '', '', '', '', '', ''),
(43, 16, 'Khussa & Peeptoes', '', '', '', '', '', '', '', '', '', ''),
(44, 16, 'Chappal & Sandals', '', '', '', '', '', '', '', '', '', ''),
(45, 16, 'Pumps & Heels', '', '', '', '', '', '', '', '', '', ''),
(46, 17, 'Peshawari Chappal', '', '', '', '', '', '', '', '', '', ''),
(47, 17, 'Baluchi Chappal', '', '', '', '', '', '', '', '', '', ''),
(48, 17, 'Khussa', '', '', '', '', '', '', '', '', '', ''),
(49, 18, 'Clutches & Wristlets', '', '', '', '', '', '', '', '', '', ''),
(50, 18, 'Pouches', '', '', '', '', '', '', '', '', '', ''),
(51, 18, 'Handbags', '', '', '', '', '', '', '', '', '', ''),
(52, 18, 'Shoulder Bags', '', '', '', '', '', '', '', '', '', ''),
(53, 18, 'Wallets', '', '', '', '', '', '', '', '', '', ''),
(54, 19, 'Earrings', '', '', '', '', '', '', '', '', '', ''),
(55, 19, 'Bangals', '', '', '', '', '', '', '', '', '', ''),
(56, 19, 'Necklaces', '', '', '', '', '', '', '', '', '', ''),
(57, 19, 'Rings', '', '', '', '', '', '', '', '', '', ''),
(58, 20, 'Phone Covers', '', '', '', '', '', '', '', '', '', ''),
(59, 20, 'Gloves & Mitts', '', '', '', '', '', '', '', '', '', ''),
(60, 20, 'Combs', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `country` int(11) NOT NULL DEFAULT 1,
  `phone_no` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `extra1` varchar(100) NOT NULL,
  `extra2` varchar(100) NOT NULL,
  `extra3` varchar(100) NOT NULL,
  `extra4` varchar(100) NOT NULL,
  `extra5` varchar(100) NOT NULL,
  `extra6` varchar(100) NOT NULL,
  `extra7` varchar(100) NOT NULL,
  `extra8` varchar(100) NOT NULL,
  `extra9` varchar(100) NOT NULL,
  `extra10` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `gender`, `birth_date`, `country`, `phone_no`, `status`, `created_on`, `extra1`, `extra2`, `extra3`, `extra4`, `extra5`, `extra6`, `extra7`, `extra8`, `extra9`, `extra10`) VALUES
(40, 'admin@admin.com', 'admin', 1, '', '', '', '0000-00-00', 1, '', 0, '2022-08-10', '', '', '', '', '', '', '', '', '', ''),
(60, 'hmmadjamil@gmail.com', '', 0, 'Hammad', 'Jamil', 'male', '2000-03-24', 1, '03020293363', 0, '2022-08-23', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `w_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `extra2` varchar(100) NOT NULL,
  `extra3` varchar(100) NOT NULL,
  `extra4` varchar(100) NOT NULL,
  `extra5` varchar(100) NOT NULL,
  `extra6` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_group`
--
ALTER TABLE `article_group`
  ADD PRIMARY KEY (`AG_id`);

--
-- Indexes for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `USER_FK` (`user_id`),
  ADD KEY `FK_CITY` (`city`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKUSER` (`user_id`),
  ADD KEY `PRFK` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `Cat_FK` (`AG_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `CITY_FK` (`state_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `item_img`
--
ALTER TABLE `item_img`
  ADD PRIMARY KEY (`item_img_id`),
  ADD KEY `ITEM_FK` (`item_id`);

--
-- Indexes for table `item_master`
--
ALTER TABLE `item_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SUB_CAT_FK` (`sub_cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`O_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `payment_FK` (`payment_id`),
  ADD KEY `FK_USER` (`user_id`),
  ADD KEY `BIlling_FK` (`billing_id`),
  ADD KEY `Product_FK` (`product_id`);

--
-- Indexes for table `otp_exp`
--
ALTER TABLE `otp_exp`
  ADD PRIMARY KEY (`otp_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `profolio_slider`
--
ALTER TABLE `profolio_slider`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Rev_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `COUNTRY_FK` (`country_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `cat_sub_fk` (`sub_cat_cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CITYFK` (`country`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `W_FK` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_group`
--
ALTER TABLE `article_group`
  MODIFY `AG_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `billing_address`
--
ALTER TABLE `billing_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item_img`
--
ALTER TABLE `item_img`
  MODIFY `item_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `item_master`
--
ALTER TABLE `item_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `O_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `otp_exp`
--
ALTER TABLE `otp_exp`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profolio_slider`
--
ALTER TABLE `profolio_slider`
  MODIFY `P_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `Rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD CONSTRAINT `FK_CITY` FOREIGN KEY (`city`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `USER_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `Cat_FK` FOREIGN KEY (`AG_id`) REFERENCES `article_group` (`AG_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `CITY_FK` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_img`
--
ALTER TABLE `item_img`
  ADD CONSTRAINT `ITEM_FK` FOREIGN KEY (`item_id`) REFERENCES `item_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_master`
--
ALTER TABLE `item_master`
  ADD CONSTRAINT `SUB_CAT_FK` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_category` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `BIlling_FK` FOREIGN KEY (`billing_id`) REFERENCES `billing_address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Product_FK` FOREIGN KEY (`product_id`) REFERENCES `item_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_FK` FOREIGN KEY (`payment_id`) REFERENCES `payment_method` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `COUNTRY_FK` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `cat_sub_fk` FOREIGN KEY (`sub_cat_cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
