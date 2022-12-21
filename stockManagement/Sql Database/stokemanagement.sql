-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 08:37 AM
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
-- Database: `stokemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `price`) VALUES
(20001, 'HP Monitor', 12000),
(20002, 'Leneve Laptop', 50000),
(20003, 'HP Laptop', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `purches`
--

CREATE TABLE `purches` (
  `purches_id` int(200) NOT NULL,
  `item_id` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `purches_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purches`
--

INSERT INTO `purches` (`purches_id`, `item_id`, `quantity`, `purches_date`) VALUES
(30001, '20001', '86', '2022-12-23'),
(30002, '20002', '22', '2022-12-22'),
(30003, '20003', '97', '2022-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `invoicenumber` int(200) NOT NULL,
  `item_id` varchar(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `totalItems` varchar(200) NOT NULL,
  `unitPrice` varchar(200) NOT NULL,
  `totalPrice` varchar(200) NOT NULL,
  `saledate` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`invoicenumber`, `item_id`, `item_name`, `totalItems`, `unitPrice`, `totalPrice`, `saledate`) VALUES
(1009, '20001', 'HP Monitor', '4', '12000', '48000', '01/12/22'),
(1010, '20002', 'Leneve Laptop', '5', '50000', '250000', '01/12/22'),
(1011, '20003', 'HP Laptop', '3', '60000', '180000', '01/12/22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `purches`
--
ALTER TABLE `purches`
  ADD PRIMARY KEY (`purches_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`invoicenumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20123;

--
-- AUTO_INCREMENT for table `purches`
--
ALTER TABLE `purches`
  MODIFY `purches_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100002;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `invoicenumber` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
