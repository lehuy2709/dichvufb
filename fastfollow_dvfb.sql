-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 03:15 PM
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
(87, 'mdi mdi-facebook', 'Facebook', 1, 'facebook', '2022-06-13 14:10:15', '2022-06-13 14:10:15'),
(88, 'mdi mdi-instagram', 'Instagram', 1, 'instagram', '2022-06-13 14:54:43', '2022-06-13 14:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `input` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `user_id`, `package_id`, `input`, `quantity`, `note`, `status`, `total`, `created_at`, `updated_at`) VALUES
(10, 16, 10, 'https://fb.com/namphimcachnhiet', 1000, 'no', 1, 5000, '2022-06-16 16:02:33', '2022-06-16 16:02:33'),
(11, 16, 8, 'aaaaaaaa', 1000, '', 4, 10000, '2022-06-16 16:04:47', '2022-06-16 16:05:15'),
(12, 16, 10, 'https://www.facebook.com/hi.im.huy.dzz', 20000, '', 1, 100000, '2022-06-19 08:34:21', '2022-06-19 08:34:21'),
(13, 16, 8, 'ưewewe', 1000, '', 1, 10000, '2022-06-23 12:13:08', '2022-06-23 12:13:08');

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
(8, 16, 'Sub sv1', 10, 1000, 10000, 'chú ý sv này đang bận', 1, '2022-06-13 14:11:42', '2022-06-13 14:11:42'),
(9, 17, 'like sv1', 10, 100, 1000, 'fs', 1, '2022-06-13 14:55:32', '2022-06-13 14:55:32'),
(10, 16, 'sub sv 3', 5, 1000, 100000, 's', 1, '2022-06-14 07:03:19', '2022-06-19 08:26:38');

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
(16, 87, 'Tăng Follow Facebook', 'tang-follow-fb', 'Chú ý là dán đúng link fb và phải bật người theo dõi rồi', 'LINK FB', 'Dán Link FB xong dán vào đây', 1, '2022-06-13 14:11:10', '2022-06-13 14:11:10'),
(17, 88, 'Tăng like ins', 'tang-like-ins', 'no', 'nhập link ins', 'no', 1, '2022-06-13 14:55:07', '2022-06-15 15:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `user_id`, `type`, `amount`, `balance`, `description`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 1000, 8000, 'Đặt đơn dịch vụ #7', '2022-06-15 15:05:59', '2022-06-15 15:05:59'),
(2, 12, 1, 10000, 19500, 'Đặt đơn dịch vụ #8', '2022-06-15 17:01:49', '2022-06-15 17:01:49'),
(3, 12, 4, 10000, 39500, 'Hoàn tiền', '2022-06-15 17:12:34', '2022-06-15 17:12:34'),
(4, 12, 1, 10000, 29500, 'Đặt đơn dịch vụ #9', '2022-06-16 15:48:15', '2022-06-16 15:48:15'),
(5, 16, 1, 5000, 995000, 'Đặt đơn dịch vụ #10', '2022-06-16 16:02:33', '2022-06-16 16:02:33'),
(6, 16, 1, 10000, 985000, 'Đặt đơn dịch vụ #11', '2022-06-16 16:04:47', '2022-06-16 16:04:47'),
(7, 16, 4, 10000, 995000, 'Hoàn tiền', '2022-06-16 16:05:15', '2022-06-16 16:05:15'),
(8, 1, 2, 200000, 3200000, 'thử xem thế nào', '2022-06-19 08:16:56', '2022-06-19 08:16:56'),
(9, 12, 2, 20000, 49500, 'nạp tiền qua momo', '2022-06-19 08:17:42', '2022-06-19 08:17:42'),
(10, 16, 3, 200000, 795000, 'bố m thích thì trừ ', '2022-06-19 08:19:39', '2022-06-19 08:19:39'),
(11, 16, 1, 100000, 695000, 'Đặt đơn dịch vụ #12', '2022-06-19 08:34:21', '2022-06-19 08:34:21'),
(12, 16, 2, 100000, 795000, 'nạp tiền từ momo', '2022-06-19 16:27:24', '2022-06-19 16:27:24'),
(13, 16, 3, 100000, 695000, 'Cộng tiền nhầm nên trừ:)', '2022-06-19 16:28:56', '2022-06-19 16:28:56'),
(14, 16, 2, 300000, 995000, 'abc', '2022-06-23 10:33:36', '2022-06-23 10:33:36'),
(15, 16, 2, 10000, 1005000, 'nạp tiền từ banking', '2022-06-23 12:09:40', '2022-06-23 12:09:40'),
(16, 16, 1, 10000, 995000, 'Đặt đơn dịch vụ #13', '2022-06-23 12:13:08', '2022-06-23 12:13:08');

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
(1, 'lehuy2709', 'lvhlehuy2709@gmail.com', '$2y$10$d3e/azyrMQrWU4n9MZcEYeoOiSP1jxPQpp9kD5f0jkzR1o4pgmTp.', 3200000, 1, 'user.jpg', '2022-06-08 05:46:07', '2022-06-19 08:16:56'),
(12, 'hoamy', 'hayla@gmail.com', '$2y$10$G3xk69ZZn2eAhE7BipEcKO2bjcSDg2edSHFUkbk1.v8h/kYgeokOO', 49500, 2, 'user.jpg', '2022-06-11 16:13:47', '2022-06-19 08:17:42'),
(13, 'leduy2709', 'leduy2709@gmail.com', '$2y$10$vZ4Fm28rF6fDZglgRTjGX.PCaZyfAlYdY2ZrG/DsPK/hDObF6MYUa', 0, 2, 'user.jpg', '2022-06-11 16:39:09', '2022-06-11 16:39:09'),
(14, 'anhhuy', 'vanchuongkieu@gmail.com', '$2y$10$Qxkq.qT4xP3Dp4ndyUGpNOhJ.OWE5uMQ7qFxIqQmvynoWbF8L5mTO', 0, 2, 'user.jpg', '2022-06-13 12:38:37', '2022-06-16 14:19:08'),
(16, 'test01', 'test@gmail.com', '$2y$10$WKW6uVioNyS4cBiCjlVPb.p9rdtwRVR3ZVc04UkflCGFmybq1nGpO', 995000, 2, 'logointro.png', '2022-06-16 16:01:19', '2022-06-23 12:13:08'),
(17, 'test02', 'meoit270922@gmail.com', '$2y$10$GGlWYxtwQy6Ui289nwJ.uOvQXOigsuZYPo91C97oox6xiZXIEevua', 0, 2, 'user.jpg', '2022-06-23 12:17:08', '2022-06-23 12:17:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
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
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_packages`
--
ALTER TABLE `tbl_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
