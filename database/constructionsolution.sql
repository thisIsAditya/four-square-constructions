-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 07:15 AM
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
  `admin_number` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`admin_id`, `admin_fname`, `admin_lname`, `admin_img`, `admin_number`, `admin_email`, `admin_password`, `admin_address`) VALUES
(1, 'Aditya', 'pandey', '', 0, 'pandey.api2k@gmail.com', 'Asdfghjkl_456', ''),
(2, 'Akash', 'Pandey', '', 0, 'akashpandey@gmail.com', '@Akash', ''),
(3, 'Pranjal', 'upadhyay', '', 0, 'pranjalupadhyayofficial@gmail.com', 'Pranjal1@', ''),
(4, 'Anand Kumar', 'Verma', '', 0, 'thunder1998@gmail.com', 'Akverma', '');

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
  `bu_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bu_id`, `bu_fname`, `bu_lname`, `bu_email`, `bu_password`, `bu_img`, `bu_number`) VALUES
(43, 'Akash', 'Pandey', 'pandeyakash382@gmail.com', '123', '', 0),
(44, 'bipul', 'upadhyay', 'bipul@gmail.com', '123456', '', 0),
(45, 'abhishek', 'verma', 'abhi2021@gmail.com', '86011', '', 0),
(46, 'gopa', 'gopu', 'gopa@gmail.com', 'gopa', '', 0),
(47, 'a', 'b', 'a@xyz.zom', 'md5(123)', '', 0),
(48, 'pandey', 'padey', 'p@ndey.com', '202cb962ac59075b964b07152d234b70', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `pr_brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pr_id`, `pr_name`, `pr_desc`, `pr_img`, `pr_origionalprice`, `pr_sellingprice`, `pr_quantity`, `pr_unit`, `pr_brand`) VALUES
(1, 'A', 'Lorem Ipsum', '../image/productimg/', 1234, 1111, 1, 'Kg', 'Brand A'),
(2, 'B', 'Lorem', '../image/productimg/', 1234, 1112, 1, 'Kg', 'Brand B'),
(3, 'C', 'Lorem', '../image/productimg/', 1234, 1113, 2, 'Kg', 'Brand C'),
(4, 'D', 'Lorem', '../image/productimg/', 60, 55, 2, 'Foot', 'Brand A'),
(5, 'E', 'Lorem', '../image/productimg/', 60, 54, 100, 'Foot', 'Brand B'),
(6, 'F', 'Lorem', '../image/productimg/', 25, 20, 80, 'Foot', 'Brand C'),
(7, 'G', 'Lorem', '../image/productimg/', 5000, 4800, 500, 'Tonn', 'Brand D'),
(10, 'H', 'Lorem', '../image/productimg/', 45, 40, 400, 'Kg', 'Brand D'),
(11, 'I', 'Lorem', '../image/productimg/', 500, 450, 500, 'Trolly', 'Brand E'),
(12, 'J', 'Lorem', '../image/productimg/', 56, 54, 800, 'Foot', 'Brand E'),
(13, 'K', 'Lorem', '../image/productimg/', 5000, 4950, 25, 'Kg', 'Brand B'),
(14, 'L', 'Lorem', '../image/productimg/', 85, 80, 50, 'Meter', 'Brand E'),
(15, 'M', 'Lorem', '../image/productimg/', 150, 130, 12, 'Pcs.', 'Brand D');

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
  `se_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`se_id`, `se_fname`, `se_lname`, `se_email`, `se_password`, `se_img`, `se_number`) VALUES
(20, 'Aditya', 'Pandey', 'pandeyaditya382@gmail.com', '123', '', 0),
(21, 'amasn', 'PAndey', 'bc21018@smsvaranasi.in', '123', '', 0),
(22, 'Chacha', 'Chamdi', 'chichaChamadi@kamik.com', 'akashwedschamain', '', 0);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pr_id`);

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
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
