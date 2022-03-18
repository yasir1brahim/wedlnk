-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2022 at 03:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wed`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `is_enabled` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `is_enabled`, `is_deleted`, `created_at`, `modified_at`) VALUES
(1, 'Iphone 10', 'Description for Iphone 10', 'iphone-10.jpg', 300, '1', '0', '2022-03-18 11:27:52', '2022-03-18 07:27:05'),
(2, 'Macbook Pro', 'Description for Macbook Pro', 'mackbook_pro.jpeg', 500, '1', '0', '2022-03-18 11:27:52', '2022-03-18 07:27:05'),
(3, 'Macbook Mini', 'Description for Macbook Mini', 'mackbook_pro.jpeg', 250, '1', '0', '2022-03-18 11:27:52', '2022-03-18 07:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `products_map`
--

CREATE TABLE `products_map` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_map`
--

INSERT INTO `products_map` (`id`, `user_id`, `product_id`, `price`, `qty`, `is_deleted`, `created_at`, `modified_at`) VALUES
(1, 1, 1, 300, 10, '0', '2022-03-18 17:17:51', NULL),
(2, 1, 2, 500, 20, '0', '2022-03-18 17:18:15', NULL),
(3, 2, 1, 300, 100, '0', '2022-03-18 18:14:11', NULL),
(4, 2, 2, 500, 200, '0', '2022-03-18 18:14:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` mediumtext NOT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 2,
  `verify_code` int(11) NOT NULL,
  `is_verified` enum('0','1') NOT NULL DEFAULT '0',
  `is_enabled` enum('0','1') NOT NULL DEFAULT '1',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `user_type`, `verify_code`, `is_verified`, `is_enabled`, `is_deleted`, `created_at`, `modified_at`) VALUES
(1, 'Ignatius', 'Gentry', 'wuxa@mailinator.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0, '1', '1', '0', '2022-03-17 14:26:10', '0000-00-00 00:00:00'),
(2, 'Preston', 'Berry', 'zupyv@mailinator.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0, '1', '1', '0', '2022-03-17 14:35:57', '0000-00-00 00:00:00'),
(3, 'Hedley', 'Larsen', 'japix75451@songsign.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 14:42:15', '0000-00-00 00:00:00'),
(4, 'Hedley', 'Larsen', 'japix75451@songsign.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0, '1', '1', '0', '2022-03-17 14:42:28', '0000-00-00 00:00:00'),
(5, 'Hedley', 'Larsen', 'japix75451@songsign.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 14:44:41', '0000-00-00 00:00:00'),
(6, 'Hedley', 'Larsen', 'japix75451@songsign.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 14:46:56', '0000-00-00 00:00:00'),
(7, 'Maya', 'Irwin', 'japix75451@songsign.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:18:39', '0000-00-00 00:00:00'),
(8, 'Maya', 'Irwin', 'japix75451@songsign.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:21:39', '0000-00-00 00:00:00'),
(9, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:24:43', '0000-00-00 00:00:00'),
(10, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:25:11', '0000-00-00 00:00:00'),
(11, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'c4ca4238a0b923820dcc509a6f75849b', 2, 0, '1', '1', '0', '2022-03-17 15:25:12', '0000-00-00 00:00:00'),
(12, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:25:53', '0000-00-00 00:00:00'),
(13, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:26:29', '0000-00-00 00:00:00'),
(14, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:26:35', '0000-00-00 00:00:00'),
(15, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:26:54', '0000-00-00 00:00:00'),
(16, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:27:31', '0000-00-00 00:00:00'),
(17, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:28:06', '0000-00-00 00:00:00'),
(18, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:28:08', '0000-00-00 00:00:00'),
(19, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:28:08', '0000-00-00 00:00:00'),
(20, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:28:09', '0000-00-00 00:00:00'),
(21, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:28:10', '0000-00-00 00:00:00'),
(22, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:28:10', '0000-00-00 00:00:00'),
(23, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:28:10', '0000-00-00 00:00:00'),
(24, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:28:11', '0000-00-00 00:00:00'),
(25, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:28:24', '0000-00-00 00:00:00'),
(26, 'Nola', 'Donaldson', 'vyrihykyr@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-17 15:29:30', '0000-00-00 00:00:00'),
(27, 'Yuri', 'Burris', 'japix75451@songsign.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-18 06:29:37', '0000-00-00 00:00:00'),
(28, 'Yuri', 'Burris', 'japix75451@songsign.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 0, '1', '1', '0', '2022-03-18 06:33:29', '2022-03-18 06:33:29'),
(29, 'Galvin', 'Bean', 'yipijaw123@tourcc.com', '5b119a961fcb523c81c25e8f79de2380', 2, 12, '1', '1', '0', '2022-03-18 06:59:52', '2022-03-18 06:59:52'),
(30, 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, 0, '1', '1', '0', '2022-03-17 14:26:10', '0000-00-00 00:00:00'),
(31, 'danish', 'shah', 'yipijaw123@tourcc.com', '5b119a961fcb523c81c25e8f79de2380', 2, 0, '1', '1', '0', '2022-03-18 13:15:53', '2022-03-18 13:15:53'),
(32, 'Noah', 'Baird', 'jacehe9908@tonaeto.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, 79, '1', '1', '0', '2022-03-18 14:21:09', '2022-03-18 14:21:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_map`
--
ALTER TABLE `products_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_map`
--
ALTER TABLE `products_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
