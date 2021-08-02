-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 10:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `constructionsolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(255) NOT NULL,
  `admin_lname` varchar(255) NOT NULL,
  `admin_img` text NOT NULL,
  `admin_number` varchar(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`admin_id`, `admin_fname`, `admin_lname`, `admin_img`, `admin_number`, `admin_email`, `admin_password`) VALUES
(1, 'Aditya', 'Pandey', '../image/adminprofileimg/', '7709213053', 'pandey.api2k@gmail.com', 'Asdfghjkl_456'),
(2, 'Akash', 'Pandey', '', '0', 'akashpandey@gmail.com', '@Akash'),
(3, 'Pranjal', 'upadhyay', '', '0', 'pranjalupadhyayofficial@gmail.com', 'Pranjal1@');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `bu_id` int(11) NOT NULL,
  `bu_fname` varchar(255) NOT NULL,
  `bu_lname` varchar(255) NOT NULL,
  `bu_email` varchar(255) NOT NULL,
  `bu_password` varchar(255) NOT NULL,
  `bu_img` text NOT NULL,
  `bu_number` varchar(11) NOT NULL,
  `bu_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bu_id`, `bu_fname`, `bu_lname`, `bu_email`, `bu_password`, `bu_img`, `bu_number`, `bu_address`) VALUES
(54, 'Test', 'Buyer', 'testbuyer@fscs.com', '$2y$10$QfoxbZ.CXtEdIoNl/5lG1.EdpCVNuy/1lzWrS7qiQux/jDIZP/Xya', '../image/buyerprofileimg/', '08009055665', 'DLW'),
(55, 'Test', 'Buyer 2', 'testbuyer2@fscs.com', '$2y$10$gTigPWRdpnRrohfJPyHFcOzzkCOrNggpZVyPhby/NZpvnc0Ol6aEW', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_total` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `se_id` int(11) NOT NULL,
  `bu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_img`) VALUES
(1, 'Brick', '../image/catimage/bricks.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_id`, `contact_name`, `contact_email`, `contact_comment`) VALUES
(2, 'Akash Pandey', 'pandeyakash382@gmail.com', 'hello world');

-- --------------------------------------------------------

--
-- Table structure for table `order-product`
--

CREATE TABLE `order-product` (
  `ord_id` varchar(255) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `ordpr_id` int(11) NOT NULL,
  `pr_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order-product`
--

INSERT INTO `order-product` (`ord_id`, `pr_id`, `ordpr_id`, `pr_qty`) VALUES
('ORDS61706114', 16, 1, 12),
('ORDS61706114', 17, 2, 5),
('ORDS56140469', 16, 3, 12),
('ORDS56140469', 17, 4, 5),
('ORDS10007836', 16, 5, 60),
('ORDS83486513', 16, 6, 60),
('ORDS83486513', 17, 7, 6),
('ORDS2819982', 16, 8, 60),
('ORDS2819982', 17, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ord_id` varchar(255) NOT NULL,
  `ord_qty` int(11) NOT NULL,
  `ord_txnDate` datetime NOT NULL,
  `ord_status` enum('PROCESSING','APPROVED','SHIPPED','DILIVERED','CANCELLED') NOT NULL DEFAULT 'PROCESSING',
  `ord_amt` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'TXN_FAILED',
  `bu_email` varchar(255) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `se_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ord_id`, `ord_qty`, `ord_txnDate`, `ord_status`, `ord_amt`, `payment_status`, `bu_email`, `cart_id`, `se_id`) VALUES
(1, 'ORDS87741861', 60, '2021-08-01 14:33:25', 'APPROVED', 600, 'TXN_SUCCESS', 'pandeyakash382@gmail.com', 1, 21),
(2, 'ORDS10732242', 60, '2021-08-01 14:36:04', '', 600, 'TXN_SUCCESS', 'pandeyakash382@gmail.com', 2, 21),
(3, 'ORDS706717', 60, '2021-08-01 14:59:02', 'PROCESSING', 600, 'TXN_SUCCESS', 'pandeyakash382@gmail.com', 3, 21),
(4, 'ORDS49604826', 1, '0000-00-00 00:00:00', 'PROCESSING', 10, 'TXN_FAILED', 'ananya@gmail.com', 9, 21),
(5, 'ORDS48779209', 1, '2021-08-01 16:50:32', 'PROCESSING', 10, 'TXN_SUCCESS', 'ananya@gmail.com', 9, 21),
(6, 'ORDS3118615', 10, '0000-00-00 00:00:00', 'PROCESSING', 100, 'TXN_FAILED', 'testbuyer@fscs.com', 10, 21),
(7, 'ORDS20412877', 10, '0000-00-00 00:00:00', 'PROCESSING', 100, 'TXN_FAILED', 'testbuyer@fscs.com', 10, 21),
(8, 'ORDS35037808', 10, '2021-08-01 23:27:54', 'PROCESSING', 100, 'TXN_SUCCESS', 'testbuyer@fscs.com', 10, 21),
(9, 'ORDS33464069', 50, '2021-08-02 00:17:41', 'DILIVERED', 2750, 'TXN_SUCCESS', 'testbuyer@fscs.com', 12, 24),
(11, 'ORDS44886539', 12, '0000-00-00 00:00:00', 'PROCESSING', 120, 'TXN_FAILED', 'testbuyer@fscs.com', 13, 21),
(12, 'ORDS51162330', 12, '0000-00-00 00:00:00', 'PROCESSING', 120, 'TXN_FAILED', 'testbuyer@fscs.com', 13, 21),
(13, 'ORDS17587473', 12, '2021-08-02 04:08:06', 'PROCESSING', 120, 'TXN_SUCCESS', 'testbuyer@fscs.com', 13, 21),
(14, 'ORDS62836923', 60, '2021-08-02 04:13:49', 'PROCESSING', 3300, 'TXN_SUCCESS', 'testbuyer@fscs.com', 15, 24),
(15, 'ORDS25747046', 10, '0000-00-00 00:00:00', 'PROCESSING', 100, 'TXN_FAILED', 'testbuyer@fscs.com', 17, 21),
(17, 'ORDS23883624', 12, '0000-00-00 00:00:00', 'PROCESSING', 40, 'TXN_FAILED', 'testbuyer@fscs.com', 2, 21),
(18, 'ORDS39412422', 12, '0000-00-00 00:00:00', 'PROCESSING', 40, 'TXN_FAILED', 'testbuyer@fscs.com', 2, 21),
(19, 'ORDS61706114', 12, '0000-00-00 00:00:00', 'PROCESSING', 40, 'TXN_FAILED', 'testbuyer@fscs.com', 2, 21),
(20, 'ORDS56140469', 12, '2021-08-02 12:34:35', 'PROCESSING', 40, 'TXN_SUCCESS', 'testbuyer@fscs.com', 2, 21),
(21, 'ORDS10007836', 60, '2021-08-02 12:54:22', 'PROCESSING', 600, 'TXN_SUCCESS', 'testbuyer@fscs.com', 4, 21),
(22, 'ORDS83486513', 60, '2021-08-02 12:55:06', 'PROCESSING', 600, 'TXN_SUCCESS', 'testbuyer@fscs.com', 5, 21),
(23, 'ORDS2819982', 60, '2021-08-02 13:03:47', 'PROCESSING', 820, 'TXN_SUCCESS', 'testbuyer@fscs.com', 7, 21);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pr_id` int(11) NOT NULL,
  `pr_name` varchar(255) NOT NULL,
  `pr_desc` varchar(255) NOT NULL,
  `pr_img` text NOT NULL,
  `pr_origionalprice` int(11) NOT NULL,
  `pr_sellingprice` int(11) NOT NULL,
  `pr_quantity` int(11) NOT NULL,
  `pr_unit` varchar(255) NOT NULL,
  `pr_brand` varchar(255) NOT NULL,
  `se_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pr_id`, `pr_name`, `pr_desc`, `pr_img`, `pr_origionalprice`, `pr_sellingprice`, `pr_quantity`, `pr_unit`, `pr_brand`, `se_id`, `cat_id`) VALUES
(16, 'Cement', 'sasta nhi sabse acha..\r\n', '../image/productimg/bricks.jpg', 12, 10, 500, 'kg', 'ambuja', 21, 1),
(17, 'Test Product', 'Lorem Ipsum', '../image/productimg/demoprofilepic.png', 58, 55, 500, 'Kg', 'Unbranded', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `se_id` int(11) NOT NULL,
  `se_fname` varchar(255) NOT NULL,
  `se_lname` varchar(255) NOT NULL,
  `se_email` varchar(255) NOT NULL,
  `se_password` varchar(255) NOT NULL,
  `se_img` text NOT NULL,
  `se_number` varchar(11) NOT NULL,
  `se_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`se_id`, `se_fname`, `se_lname`, `se_email`, `se_password`, `se_img`, `se_number`, `se_address`) VALUES
(21, 'amasn', 'PAndey', 'bc21018@smsvaranasi.in', '123', '', '0', ''),
(22, 'Chacha', 'Chamdi', 'chichaChamadi@kamik.com', 'akashwedschamain', '', '0', ''),
(24, 'Test', 'Seller', 'testseller@fscs.com', '$2y$10$eEususWxP9n/yqi3P8.WJ.Yrm7344X8Cjieo.jjzER9tcvh05TquO', '../image/sellerprofileimg/', '08009055665', 'DLW'),
(25, 'test', 'seller2', 'testseller2@fscs.com', '$2y$10$85.9ycWeAL.gYSr16Vzs0eEIgTCE0gubtnQWMmeaLP3biUI4aZGYW', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`bu_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `pr_id` (`pr_id`),
  ADD KEY `se_id` (`se_id`),
  ADD KEY `bu_id` (`bu_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `order-product`
--
ALTER TABLE `order-product`
  ADD PRIMARY KEY (`ordpr_id`),
  ADD KEY `ord_id` (`ord_id`),
  ADD KEY `pr_id` (`pr_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `se_id` (`se_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `se_id` (`se_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`se_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order-product`
--
ALTER TABLE `order-product`
  MODIFY `ordpr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`pr_id`) REFERENCES `products` (`pr_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`se_id`) REFERENCES `seller` (`se_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`bu_id`) REFERENCES `buyer` (`bu_id`);

--
-- Constraints for table `order-product`
--
ALTER TABLE `order-product`
  ADD CONSTRAINT `order-product_ibfk_2` FOREIGN KEY (`pr_id`) REFERENCES `products` (`pr_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`se_id`) REFERENCES `seller` (`se_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`se_id`) REFERENCES `seller` (`se_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
