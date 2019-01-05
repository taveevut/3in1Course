-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2019 at 05:17 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'ผู้ชาย'),
(2, 'ผู้หญิง'),
(3, 'เด็ก'),
(4, 'เด็ก');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL COMMENT 'รหัสสั่งซื้อ',
  `details` longtext NOT NULL COMMENT 'รายละเอียดการสั้งซื้อ',
  `amount` int(11) NOT NULL COMMENT 'จำนวนเงิน',
  `customer` text NOT NULL COMMENT 'ลูกค้า',
  `created` int(11) NOT NULL COMMENT 'สร้างเมื่อ',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'สถานะ',
  `payment` text NOT NULL COMMENT 'รายละเอียดการชำระเงิน'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='จัดการรายการสั่งซื้อ';

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `details`, `amount`, `customer`, `created`, `status`, `payment`) VALUES
(1, 'Order1901-0001', 'a:3:{i:0;a:11:{s:2:\"id\";s:2:\"18\";s:4:\"name\";s:8:\"Product4\";s:7:\"details\";s:88:\"รองเท้าชายสีดำ เท่อบ่างมีสไตล์\";s:6:\"price1\";s:5:\"15000\";s:6:\"price2\";s:4:\"3000\";s:11:\"category_id\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:7:\"created\";s:19:\"2018-12-30 13:31:56\";s:5:\"cover\";s:60:\"uploads/product/2018/12/e7a5ae31bd3a2fadde8dfbbcc456bdad.jpg\";s:3:\"qty\";i:2;s:6:\"amount\";i:6000;}i:1;a:11:{s:2:\"id\";s:2:\"17\";s:4:\"name\";s:8:\"Product3\";s:7:\"details\";s:88:\"รองเท้าชายสีดำ เท่อบ่างมีสไตล์\";s:6:\"price1\";s:5:\"15000\";s:6:\"price2\";s:4:\"3000\";s:11:\"category_id\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:7:\"created\";s:19:\"2018-12-30 13:31:56\";s:5:\"cover\";s:60:\"uploads/product/2018/12/e7a5ae31bd3a2fadde8dfbbcc456bdad.jpg\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"3000\";}i:2;a:11:{s:2:\"id\";s:2:\"16\";s:4:\"name\";s:8:\"Product2\";s:7:\"details\";s:88:\"รองเท้าชายสีดำ เท่อบ่างมีสไตล์\";s:6:\"price1\";s:5:\"15000\";s:6:\"price2\";s:4:\"3000\";s:11:\"category_id\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:7:\"created\";s:19:\"2018-12-30 13:31:56\";s:5:\"cover\";s:60:\"uploads/product/2018/12/e7a5ae31bd3a2fadde8dfbbcc456bdad.jpg\";s:3:\"qty\";i:2;s:6:\"amount\";i:6000;}}', 15000, 'a:5:{s:4:\"name\";s:21:\"ทวีวุฒิ\";s:7:\"surname\";s:24:\"นากอหม๊ะ\";s:7:\"address\";s:53:\"ต.กาตอง อ.ยะหา จ.ยะลา\";s:3:\"tel\";s:10:\"0862887987\";s:7:\"zipcode\";s:5:\"95120\";}', 2019, 1, ''),
(2, 'Order1901-0002', 'a:2:{i:0;a:11:{s:2:\"id\";s:2:\"16\";s:4:\"name\";s:8:\"Product2\";s:7:\"details\";s:88:\"รองเท้าชายสีดำ เท่อบ่างมีสไตล์\";s:6:\"price1\";s:5:\"15000\";s:6:\"price2\";s:4:\"3000\";s:11:\"category_id\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:7:\"created\";s:19:\"2018-12-30 13:31:56\";s:5:\"cover\";s:60:\"uploads/product/2018/12/e7a5ae31bd3a2fadde8dfbbcc456bdad.jpg\";s:3:\"qty\";i:3;s:6:\"amount\";i:9000;}i:1;a:11:{s:2:\"id\";s:2:\"15\";s:4:\"name\";s:8:\"Product1\";s:7:\"details\";s:88:\"รองเท้าชายสีดำ เท่อบ่างมีสไตล์\";s:6:\"price1\";s:5:\"15000\";s:6:\"price2\";s:4:\"3000\";s:11:\"category_id\";s:1:\"1\";s:6:\"status\";s:1:\"0\";s:7:\"created\";s:19:\"2018-12-30 13:31:56\";s:5:\"cover\";s:60:\"uploads/product/2018/12/e7a5ae31bd3a2fadde8dfbbcc456bdad.jpg\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"3000\";}}', 12000, 'a:5:{s:4:\"name\";s:8:\"fasdfxas\";s:7:\"surname\";s:4:\"xasd\";s:7:\"address\";s:9:\"fasdfxasd\";s:3:\"tel\";s:5:\"fxadf\";s:7:\"zipcode\";s:5:\"axsff\";}', 2019, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price1` float NOT NULL,
  `price2` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `cover` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `details`, `price1`, `price2`, `category_id`, `status`, `created`, `cover`, `qty`) VALUES
(15, 'Product1', 'รองเท้าชายสีดำ เท่อบ่างมีสไตล์', 15000, 3000, 1, 0, '2018-12-30 13:31:56', 'uploads/product/2018/12/e7a5ae31bd3a2fadde8dfbbcc456bdad.jpg', 1),
(16, 'Product2', 'รองเท้าชายสีดำ เท่อบ่างมีสไตล์', 15000, 3000, 1, 0, '2018-12-30 13:31:56', 'uploads/product/2018/12/e7a5ae31bd3a2fadde8dfbbcc456bdad.jpg', 1),
(17, 'Product3', 'รองเท้าชายสีดำ เท่อบ่างมีสไตล์', 15000, 3000, 1, 0, '2018-12-30 13:31:56', 'uploads/product/2018/12/e7a5ae31bd3a2fadde8dfbbcc456bdad.jpg', 1),
(18, 'Product4', 'รองเท้าชายสีดำ เท่อบ่างมีสไตล์', 15000, 3000, 1, 0, '2018-12-30 13:31:56', 'uploads/product/2018/12/e7a5ae31bd3a2fadde8dfbbcc456bdad.jpg', 1),
(19, 'Product5', 'รองเท้าชายสีดำ เท่อบ่างมีสไตล์', 15000, 3000, 2, 0, '2018-12-30 13:31:56', 'uploads/product/2018/12/e7a5ae31bd3a2fadde8dfbbcc456bdad.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
