-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2025 at 04:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `green-core`
--
CREATE DATABASE IF NOT EXISTS `green-core` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `green-core`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `email`, `display_name`, `avatar`, `password`, `create_at`, `remember_token`) VALUES
(1, 'user@mail.com', 'Tokoh Alat Kebun', 'uploads/1758936647_sekop.jpg', '$2y$10$QPducvR1Z6GT9.k2HqhyHOrYeVvBF5reRNqfBwxrV7OG8fYthUIYK', '2025-09-26 17:47:14', NULL),
(2, 'user2@mail.com', 'Tokoh Bibit Jaya', 'uploads/1758938867_Cakup.png', '$2y$10$NAH987EGS7TO4EeppFmo7.j/C1ZG6rQTqah0IkgVN3Ze6pDU5dNpa', '2025-09-26 17:47:25', NULL),
(3, 'user3@gmail.com', 'Tokoh IOT', 'uploads/1758947793_Drone.jpg', '$2y$10$/bQLgb4IdkXJrH61pTMU0OEts43qk3wPCqX6.gioZKcbQnjgos4si', '2025-09-26 21:35:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `kode_jenis`, `kriteria`) VALUES
(1, 'IOT1', 'IOT'),
(2, 'P1', 'Pupuk & Nutrisi'),
(3, 'A1', 'Alat & Aksesoris'),
(4, 'B1', 'Bibit & Benih');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `kode_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(9) NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kode_jenis` varchar(10) DEFAULT NULL,
  `gambar` mediumblob DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(10) NOT NULL,
  `id_user` int(255) NOT NULL,
  `komentar` longtext NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `kode_produk`, `id_user`, `komentar`, `rating`, `create_at`, `update_at`) VALUES
(1, 'p003', 3, 'kerenn', 5.0, '2025-09-26 21:48:38', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
