-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 07:31 AM
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
-- Database: `logistikpenyewaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `decline_reason`
--

CREATE TABLE `decline_reason` (
  `id` int(11) NOT NULL,
  `id_order` bigint(20) NOT NULL,
  `id_driver` bigint(20) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decline_reason`
--

INSERT INTO `decline_reason` (`id`, `id_order`, `id_driver`, `alasan`) VALUES
(4, 19, 2, 'mengantar istri ke acara keluarga');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id_driver` bigint(20) NOT NULL,
  `nama_driver` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto_driver` text,
  `status` int(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id_driver`, `nama_driver`, `no_hp`, `foto_driver`, `status`, `user_id`, `deleted_at`) VALUES
(1, 'Alexander Graham', '087987876001', 'c7f015dcb229af58d702573c486b272d.jpg', 1, 2, NULL),
(2, 'Marcopolo', '087678567453', NULL, 1, 4, NULL),
(4, 'Thomas Alfa Edison', '087987876771', NULL, 1, 10, NULL),
(5, 'Columbus', '08123456789', NULL, 1, 11, NULL),
(6, 'Issac Newton', '089768567466', NULL, 1, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `fakultas_id` bigint(20) NOT NULL,
  `nama_fakultas` text NOT NULL,
  `nama_kaur` varchar(50) NOT NULL,
  `jabatan` text,
  `no_hp` varchar(15) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`fakultas_id`, `nama_fakultas`, `nama_kaur`, `jabatan`, `no_hp`, `user_id`) VALUES
(1, 'Fakultas Komunikasi dan Bisnis', 'Hera', 'KAUR', '087987876761', 5),
(2, 'Fakultas Ekonomi dan Bisnis', 'Athena', 'KAUR', '087987876765', 6),
(3, 'Fakultas Ilmu Terapan', 'Gilang', 'KAUR', '087987876765', 7),
(4, 'Fakultas Industri Kreatif', 'Ikhsan', 'KAUR', '087987876765', 8),
(5, 'Fakultas Informatika', 'Nining', 'KAURR', '087654765877', 16);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_driver`
--

CREATE TABLE `feedback_driver` (
  `id_feedback` int(11) NOT NULL,
  `id_order` bigint(20) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_driver`
--

INSERT INTO `feedback_driver` (`id_feedback`, `id_order`, `rating`, `komentar`) VALUES
(1, 27, '4', 'Lain kali jangan ngebut lagi ya Pak'),
(2, 31, '3', 'driver ngebut'),
(3, 32, '4', 'Driver baik tidak ngebut');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` bigint(20) NOT NULL,
  `nopol` varchar(15) NOT NULL,
  `merk_mobil` varchar(50) NOT NULL,
  `type_mobil` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `km_awal` bigint(20) DEFAULT NULL,
  `km_akhir` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nopol`, `merk_mobil`, `type_mobil`, `kapasitas`, `km_awal`, `km_akhir`, `status`) VALUES
(1, 'D1114KM', 'Toyota Avanza', 'MPV', 5, 12000, 12500, 1),
(2, 'D1212DD', 'Suzuki APV', 'MPV', 7, 144444, 135710, 2),
(3, 'D4321JK', 'Toyota Fortuner', 'MPV', 8, NULL, NULL, 1),
(4, 'D1114XY', 'Toyota Avanza', 'MPV', 5, NULL, NULL, 1),
(5, 'D1212XX', 'Suzuki APV', 'MPV', 7, 144444, 135710, 1),
(6, 'D4321XF', 'Toyota Fortuner', 'MPV', 8, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_sewa`
--

CREATE TABLE `order_sewa` (
  `id_order` bigint(20) NOT NULL,
  `id_fakultas` bigint(20) NOT NULL,
  `jml_penumpang` int(11) NOT NULL,
  `tgl_pergi` datetime NOT NULL,
  `tgl_pulang` datetime NOT NULL,
  `tujuan` text,
  `keterangan` text NOT NULL,
  `note` text,
  `status` int(1) NOT NULL DEFAULT '0',
  `stat_adm` int(1) DEFAULT NULL,
  `stat_drv` int(1) DEFAULT NULL,
  `stat_cst` int(1) DEFAULT NULL,
  `cost` int(15) DEFAULT NULL,
  `sppd` bigint(20) NOT NULL DEFAULT '0',
  `id_mobil` bigint(20) DEFAULT '0',
  `id_driver` bigint(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_sewa`
--

INSERT INTO `order_sewa` (`id_order`, `id_fakultas`, `jml_penumpang`, `tgl_pergi`, `tgl_pulang`, `tujuan`, `keterangan`, `note`, `status`, `stat_adm`, `stat_drv`, `stat_cst`, `cost`, `sppd`, `id_mobil`, `id_driver`) VALUES
(19, 3, 5, '2020-10-29 14:00:00', '2020-10-29 22:00:00', 'Jakarta', 'Studi Banding', 'Drivernya tolong Pak Marcopolo', 0, NULL, NULL, NULL, 500000, 0, 1, 0),
(27, 1, 4, '2020-10-22 10:00:00', '2020-10-22 15:00:00', 'Bogor', 'Studi Banding', '', 4, NULL, NULL, NULL, 500000, 0, 2, 1),
(28, 2, 3, '2020-10-22 17:45:00', '2020-10-22 19:45:00', 'ALun-alun Bandung', 'Wawancara', '', 6, NULL, NULL, NULL, 250000, 0, 1, 2),
(29, 4, 3, '2020-10-30 14:00:00', '2020-10-30 17:00:00', 'Ciparay', 'Studi Banding', '', 0, NULL, NULL, NULL, NULL, 0, 0, 0),
(30, 5, 7, '2020-10-30 06:00:00', '2020-10-30 19:00:00', 'Dago', 'Seminar', '', 0, NULL, NULL, NULL, NULL, 0, 0, 0),
(31, 4, 4, '2020-10-22 10:30:00', '2020-10-22 21:00:00', 'Bandung Barat', 'Studi Banding', 'Tolong beri driver paling berhati-hati', 3, NULL, NULL, NULL, 300000, 0, 1, 2),
(32, 1, 3, '2020-10-22 00:00:00', '2020-10-22 00:00:00', 'Jakarta', 'Studi Banding', 'Minta Pak Driver Marcopolo', 3, NULL, NULL, NULL, 200000, 0, 1, 2);

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
(1, 'admin', 1, '2020-10-03 21:56:47'),
(2, 'driver', 1, '2020-10-03 21:56:54'),
(3, 'konsumen', 1, '2020-10-03 21:56:54');

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
(1, 'adminlog', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2020-10-03 21:59:54', NULL, NULL),
(2, 'driver11', 'driver1@gmail.com', 'f37115f0699ec15cb309004562d51f3e', 1, 2, '2020-10-21 14:22:43', NULL, NULL),
(4, 'driver2', 'driver2@gmail.com', 'd95784faa6597a0253e483e500ced3ee', 1, 2, '2020-10-03 22:00:38', NULL, NULL),
(5, 'fkb', 'fkb@gmail.com', '26b351a6fb22ba9658978a4672049551', 1, 3, '2020-10-21 17:40:04', NULL, NULL),
(6, 'feb', 'feb@gmail.com', 'd7b85f12bdf36266db695411a654f73f', 1, 3, '2020-10-03 22:00:38', NULL, NULL),
(7, 'fit', 'fit@gmail.com', '1977c9daa1d67de51a4651abdb160c09', 1, 3, '2020-10-03 22:34:35', NULL, NULL),
(8, 'fik', 'fik@gmail.com', 'a29530332290da89653790cac7b5f9c8', 1, 3, '2020-10-03 22:00:38', NULL, NULL),
(10, 'driver4', '', 'a727098b2711281f6bee057b613ccd5e', 1, 2, '2020-10-08 00:27:32', NULL, NULL),
(11, 'driver5', '', 'bd5f2ceffd2ded0e3717135069b5a960', 1, 2, '2020-10-08 00:28:28', NULL, NULL),
(13, 'driver6', '', 'c93ec3da3c5f0c82b9c3e37f023d21cd', 1, 2, '2020-10-21 12:58:24', NULL, NULL),
(16, 'fif1', '', 'b307ade6169b1477e5716bed7df0f47b', 1, 3, '2020-10-21 15:56:30', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `decline_reason`
--
ALTER TABLE `decline_reason`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`id_order`),
  ADD KEY `fk_driver` (`id_driver`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`fakultas_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback_driver`
--
ALTER TABLE `feedback_driver`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `fk_order` (`id_order`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD UNIQUE KEY `nomor_polisi` (`nopol`);

--
-- Indexes for table `order_sewa`
--
ALTER TABLE `order_sewa`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_driver` (`id_driver`);

--
-- Indexes for table `role_group`
--
ALTER TABLE `role_group`
  ADD PRIMARY KEY (`role_id`);

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
-- AUTO_INCREMENT for table `decline_reason`
--
ALTER TABLE `decline_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id_driver` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `fakultas_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback_driver`
--
ALTER TABLE `feedback_driver`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_sewa`
--
ALTER TABLE `order_sewa`
  MODIFY `id_order` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `role_group`
--
ALTER TABLE `role_group`
  MODIFY `role_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `decline_reason`
--
ALTER TABLE `decline_reason`
  ADD CONSTRAINT `decline_reason_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_sewa` (`id_order`),
  ADD CONSTRAINT `decline_reason_ibfk_2` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id_driver`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD CONSTRAINT `fakultas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `feedback_driver`
--
ALTER TABLE `feedback_driver`
  ADD CONSTRAINT `feedback_driver_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_sewa` (`id_order`);

--
-- Constraints for table `order_sewa`
--
ALTER TABLE `order_sewa`
  ADD CONSTRAINT `order_sewa_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`fakultas_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role_group` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
