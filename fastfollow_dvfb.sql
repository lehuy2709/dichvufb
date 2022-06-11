-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 07:19 PM
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
-- Database: `fastfollow_dvfb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `icon`, `name`, `status`, `slug`, `created_at`, `updated_at`) VALUES
(84, 'mdi mdi-instagram', 'Instagram', 1, 'instagram', '2022-06-10 10:13:55', '2022-06-11 09:14:38'),
(86, 'mdi mdi-facebook', 'Facebook', 1, 'facebook', '2022-06-11 14:46:17', '2022-06-11 14:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packages`
--

CREATE TABLE `tbl_packages` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `min_quantity` int(11) NOT NULL,
  `max_quantity` int(11) NOT NULL,
  `note` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_packages`
--

INSERT INTO `tbl_packages` (`id`, `service_id`, `name`, `price`, `min_quantity`, `max_quantity`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Instagram', 22, 12, 1000, 'f', 1, '2022-06-11 14:42:29', '2022-06-11 14:42:29'),
(2, 14, 'Lê Văn Huy', 500, 222, 222, '22', 1, '2022-06-11 15:03:41', '2022-06-11 15:03:41'),
(3, 15, 'sub sv 2', 20, 1000, 100000, 'a', 1, '2022-06-11 15:13:51', '2022-06-11 15:13:51'),
(4, 15, 'Lê Văn Huy', 2, 2, 23333, '3', 1, '2022-06-11 15:14:30', '2022-06-11 15:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `lable` varchar(255) NOT NULL,
  `placeholder` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `category_id`, `name`, `slug`, `description`, `lable`, `placeholder`, `status`, `created_at`, `updated_at`) VALUES
(14, 84, 'tăng follow ins', 'tang-follow-ins', '1 12 3 4 5 6 7 89 1000100', 'Link Ins', 'nhập link instagram của bạn vào', 1, '2022-06-11 09:55:03', '2022-06-11 09:55:03'),
(15, 86, 'Tăng Like fb', 'tang-like-fb', 'nhập chuẩn vào địt cụ mày', 'Nhập link bài viết', 'link bài viết', 1, '2022-06-11 14:47:35', '2022-06-11 14:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`, `balance`, `role`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'lehuy2709', 'lvhlehuy2709@gmail.com', '$2y$10$d3e/azyrMQrWU4n9MZcEYeoOiSP1jxPQpp9kD5f0jkzR1o4pgmTp.', 3000000, 1, 'user.jpg', '2022-06-08 05:46:07', '2022-06-08 05:46:07'),
(12, 'hoamy', 'hayla@gmail.com', '$2y$10$G3xk69ZZn2eAhE7BipEcKO2bjcSDg2edSHFUkbk1.v8h/kYgeokOO', 0, 2, 'user.jpg', '2022-06-11 16:13:47', '2022-06-11 16:13:47'),
(13, 'leduy2709', 'leduy2709@gmail.com', '$2y$10$vZ4Fm28rF6fDZglgRTjGX.PCaZyfAlYdY2ZrG/DsPK/hDObF6MYUa', 0, 2, 'user.jpg', '2022-06-11 16:39:09', '2022-06-11 16:39:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
