-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 10:10 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productinventror`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`) VALUES
(3, '2017-10-02 18:00:00'),
(4, '2018-01-07 18:00:00'),
(5, '2018-03-01 16:09:03'),
(6, '2018-03-31 16:10:34'),
(7, '2018-02-01 16:11:00'),
(8, '2018-03-31 16:11:28'),
(9, '2018-03-01 16:11:45'),
(10, '2018-03-31 16:27:46'),
(11, '2018-03-31 16:35:52'),
(12, '2018-03-31 21:47:49'),
(13, '2018-03-31 21:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) NOT NULL,
  `orderid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `orderid`, `productid`, `quantity`, `price`) VALUES
(3, 3, 1, 7, 50),
(4, 3, 3, 30, 450),
(5, 3, 2, 3, 4554),
(6, 3, 1, 7, 50),
(7, 4, 3, 30, 450),
(8, 4, 2, 3, 4554),
(9, 4, 1, 7, 50),
(10, 4, 5, 1, 250),
(11, 5, 2, 3, 4554),
(12, 5, 1, 7, 50),
(13, 5, 5, 1, 250),
(14, 6, 2, 3, 4554),
(15, 6, 1, 7, 50),
(16, 7, 2, 3, 4554),
(17, 7, 1, 7, 50),
(18, 8, 2, 3, 4554),
(19, 8, 1, 7, 50),
(20, 9, 2, 3, 4554),
(21, 9, 1, 7, 50),
(22, 10, 2, 3, 4554),
(23, 10, 1, 7, 50),
(24, 10, 3, 1, 450),
(25, 11, 2, 3, 4554),
(26, 11, 1, 7, 50),
(27, 11, 3, 1, 450),
(28, 12, 3, 1, 450),
(29, 13, 3, 1, 450),
(30, 13, 2, 2, 4554);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`) VALUES
(1, 'dfgf', 50, 'thi is new'),
(2, 'hgjhgfjhgj', 4554, 'fdgfdgggggggg'),
(3, 'jans ', 450, '  fgfgfdghfdgf'),
(4, 't-shirt', 450, 'latest dress'),
(5, 'jack e chain', 250, '  this is awosome');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
