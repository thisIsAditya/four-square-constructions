-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 07:47 PM
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
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`admin_id`, `admin_fname`, `admin_lname`, `admin_img`, `admin_number`, `admin_email`, `admin_password`) VALUES
(1, 'Aditya', 'pandey', '', 0, 'pandey.api2k@gmail.com', 'Asdfghjkl_456'),
(2, 'Akash', 'Pandey', '', 0, 'akashpandey@gmail.com', '@Akash'),
(3, 'Pranjal', 'upadhyay', '', 0, 'pranjalupadhyayofficial@gmail.com', 'Pranjal1@'),
(4, 'Anand Kumar', 'Verma', '', 0, 'thunder1998@gmail.com', 'Akverma');

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
(46, 'gopa', 'gopu', 'gopa@gmail.com', 'gopa', '', 0);

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
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `se_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
