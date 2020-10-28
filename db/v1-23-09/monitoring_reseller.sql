-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 11:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_reseller`
--

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `production_id` bigint(20) NOT NULL,
  `production_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `production_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `production_date`, `expired_date`, `production_qty`) VALUES
(1, '2020-09-10', '2020-10-10', 100),
(2, '2020-09-15', '2020-10-15', 75);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `product_discount` int(2) DEFAULT NULL,
  `product_stock` int(5) NOT NULL,
  `production_id` bigint(20) NOT NULL,
  `product_status` int(1) NOT NULL DEFAULT '1',
  `seller_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_type`, `selling_price`, `product_discount`, `product_stock`, `production_id`, `product_status`, `seller_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Es Mochi Vanilla', 'Makanan', 15000, 1, 14, 1, 1, 1, '2020-09-23 21:08:05', 1, '2020-09-23 21:08:05', NULL, NULL, NULL),
(7, 'Es Mochi Coklat', 'Makanan', 16000, 0, 61, 1, 1, 1, '2020-09-23 21:02:58', NULL, '2020-09-23 21:02:58', NULL, NULL, NULL),
(9, 'Es Mochi Kacang Merah', 'Makanan', 13000, 0, 75, 2, 1, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, NULL, NULL),
(10, 'Es Mochi Durian', 'Makanan', 18000, 0, 75, 2, 1, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, NULL, NULL),
(11, 'Es Mochi Strawberry', 'Makanan', 14000, 0, 100, 1, 1, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, NULL, NULL),
(12, 'Youghurt Vanilla', 'Frozen Food', 11000, 0, 50, 1, 1, 1, '2020-09-23 21:02:25', 1, NULL, NULL, NULL, NULL),
(13, 'Es Mochi Coklat', 'Makanan', 16000, 0, 60, 1, 1, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, NULL, NULL),
(14, 'Es Mochi Kacang Merah', 'Makanan', 13000, 0, 75, 2, 1, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, NULL, NULL),
(15, 'Es Mochi Durian', 'Makanan', 18000, 0, 75, 2, 1, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, NULL, NULL),
(16, 'Es Mochi Strawberry', 'Makanan', 14000, 0, 100, 1, 1, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, NULL, NULL),
(17, 'Es Mochi Vanillaa', 'Makanann', 150000, 2, 50, 1, 1, 1, '2020-09-23 21:02:25', 1, NULL, NULL, NULL, NULL),
(18, 'Es Mochi Coklat', 'Makanan', 16000, 0, 60, 1, 1, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, NULL, NULL),
(19, 'Es Mochi Kacang Merah', 'Makanan', 13000, 0, 75, 2, 1, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, NULL, NULL),
(20, 'Es Mochi Durian', 'Makanan', 18000, 0, 75, 2, 1, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, NULL, NULL),
(21, 'Es Mochi Strawberry', 'Makanan', 14000, 0, 100, 1, 0, 1, '2020-09-23 21:02:25', NULL, NULL, NULL, '2020-09-23 20:47:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `reseller_id` bigint(20) NOT NULL,
  `reseller_name` varchar(50) NOT NULL,
  `reseller_address` text NOT NULL,
  `reseller_phone` varchar(15) NOT NULL,
  `reseller_status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `seller_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reseller`
--

INSERT INTO `reseller` (`reseller_id`, `reseller_name`, `reseller_address`, `reseller_phone`, `reseller_status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `seller_id`, `user_id`) VALUES
(1, 'Reseller Cimahi', 'Jl. Bunga Kenanga Perumahan Cimahi Indah Cimahi', '089876543211', 0, '2020-09-23 21:07:49', NULL, '2020-09-23 21:07:49', NULL, '2020-09-23 21:00:56', NULL, 1, 2),
(2, 'Reseller Bandung Kota', 'Jl. Karapitan N0.123 Kota bandung', '087678567348', 1, '2020-09-23 21:13:36', NULL, '2020-09-23 21:13:36', NULL, NULL, NULL, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role_group`
--

CREATE TABLE `role_group` (
  `role_id` bigint(20) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_group`
--

INSERT INTO `role_group` (`role_id`, `role_name`, `role_status`, `created_at`) VALUES
(1, 'seller', 1, '2020-09-22 17:30:18'),
(2, 'reseller', 1, '2020-09-22 17:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` bigint(20) NOT NULL,
  `seller_name` varchar(50) NOT NULL,
  `seller_address` text NOT NULL,
  `seller_phone` char(13) NOT NULL,
  `seller_status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `seller_name`, `seller_address`, `seller_phone`, `seller_status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `user_id`) VALUES
(1, 'Smoochi', 'Bandung', '081234567890', 1, '2020-09-22 17:35:54', NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT '1',
  `role_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_status`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'seller1', 'smoochie@gmail.com', '95caed8e60e15871a6d12fe5505db2db', 1, 1, '2020-09-23 20:22:09', NULL, NULL),
(2, 'reseller1', 'reseller1@gmail.com', 'reseller1', 1, 2, '2020-09-22 17:31:17', NULL, NULL),
(4, 'reseller2', 'reseller2@gmail.com', '9f106cd54c42343deae7fc0a6baf18f0', 1, 2, '2020-09-23 20:21:38', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`production_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `seller_fk` (`seller_id`),
  ADD KEY `created_by_fk` (`created_by`),
  ADD KEY `updated_by_fk` (`updated_by`),
  ADD KEY `deleted_by_fk` (`deleted_by`),
  ADD KEY `production_fk` (`production_id`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`reseller_id`),
  ADD KEY `seller_fk` (`seller_id`),
  ADD KEY `deleted_by_fk` (`deleted_by`),
  ADD KEY `updated_by_fk` (`updated_by`),
  ADD KEY `created_by_fk` (`created_by`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `role_group`
--
ALTER TABLE `role_group`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `created_by_fk` (`created_by`),
  ADD KEY `updated_by_fk` (`updated_by`),
  ADD KEY `deleted_by_fk` (`deleted_by`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_fk` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `production_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `reseller_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_group`
--
ALTER TABLE `role_group`
  MODIFY `role_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`production_id`) REFERENCES `production` (`production_id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reseller`
--
ALTER TABLE `reseller`
  ADD CONSTRAINT `reseller_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reseller_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_group` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
