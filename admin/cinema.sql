-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 08:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(10) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `movie_image` varchar(200) DEFAULT NULL,
  `movie_desc` longtext DEFAULT NULL,
  `category_id` int(20) DEFAULT NULL,
  `release_date` datetime NOT NULL,
  `is_released` tinyint(1) NOT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `movie_name`, `movie_image`, `movie_desc`, `category_id`, `release_date`, `is_released`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(1, 'tjmm', './images/tjmm2023.jpg', '<p><strong>Mickey, a carefree businessman and womaniser, helps couples break up. However, things change for him when he falls for Tinni, a witty and beautiful chartered accountant.</strong></p>', 44, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-24 21:04:13', '2023-09-24 22:52:26', 1, 0),
(2, 'mm', './images/jawan2023.jpg', '<p>fnxcnxcccn</p>', 37, '0000-00-00 00:00:00', 0, 1, 1, '2023-09-24 22:45:06', '2023-09-24 22:45:06', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `movie_category`
--

CREATE TABLE `movie_category` (
  `id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_image` varchar(200) DEFAULT NULL,
  `cat_desc` longtext DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_category`
--

INSERT INTO `movie_category` (`id`, `cat_name`, `cat_image`, `cat_desc`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(37, 'test', './images/m.jpg', '<p><em><strong>test</strong></em></p>', 1, 1, '2023-09-22 14:56:02', '2023-09-22 14:56:02', 1, 0),
(42, 'm', './images/m1.jpg', '<p>m</p>', 1, 1, '2023-09-23 16:21:42', '2023-09-23 16:21:42', 1, 0),
(43, 'mi', 'images/adipurush2023.jpg', '<p>mki</p>', 1, 1, '2023-09-23 16:42:16', '2023-09-24 21:16:10', 1, 0),
(44, 'Test1', 'images/animal2023.jpg', '<p>mmm</p>', 1, 1, '2023-09-24 22:42:50', '2023-09-24 22:43:45', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `user_type_id` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `profile`, `password`, `phone_no`, `created_by`, `updated_by`, `user_type_id`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(1, 'Mitul Maiyani', 'mitpatel0720@gmail.com', '', '0720', '9409002090', NULL, 1, 1, '2023-09-20 21:16:14', '2023-09-24 23:38:34', 1, 0),
(2, 'Kevin Kotadiya', 'kevinkotadiya428@gmail.com', '', '999', '9510935250', NULL, 2, 1, '2023-09-21 22:11:48', '2023-09-22 10:16:24', 1, 0),
(3, 'test', 'test@gmail.com', '', '12', 'test', 0, 0, 2, '2023-09-24 22:04:05', '2023-09-24 22:04:05', 1, 0),
(4, 'test', 'test@gmail.com', '', '12', 'test', 0, 0, 2, '2023-09-24 22:06:02', '2023-09-24 22:06:02', 1, 0),
(5, 'test', 'test@gmail.com', '', '12', 'test', 0, 0, 2, '2023-09-24 22:10:31', '2023-09-24 22:10:31', 1, 0),
(6, 'test', 'test@gmail.com', '', '12', 'test', 0, 0, 2, '2023-09-24 22:12:00', '2023-09-24 22:12:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(10) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type_name`) VALUES
(1, 'admin'),
(2, 'assistant'),
(3, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `fk_movie_category_id` FOREIGN KEY (`category_id`) REFERENCES `movie_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie_category`
--
ALTER TABLE `movie_category`
  ADD CONSTRAINT `fk_mc_create_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mc_update_by` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_type_id` FOREIGN KEY (`user_type_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
