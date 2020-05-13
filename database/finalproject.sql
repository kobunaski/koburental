-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2020 at 06:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_staff` int(10) UNSIGNED NOT NULL,
  `id_vehicle` int(10) UNSIGNED NOT NULL,
  `id_payment` int(10) UNSIGNED DEFAULT NULL,
  `pickup_date` date NOT NULL,
  `return_date` date NOT NULL,
  `id_pickup_location` int(10) UNSIGNED NOT NULL,
  `id_drop_location` int(10) UNSIGNED DEFAULT NULL,
  `id_feedback` int(10) UNSIGNED DEFAULT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `id_user`, `id_staff`, `id_vehicle`, `id_payment`, `pickup_date`, `return_date`, `id_pickup_location`, `id_drop_location`, `id_feedback`, `status`, `created_at`, `updated_at`) VALUES
(9, 19, 2, 10, NULL, '2020-05-08', '2020-05-10', 3, NULL, NULL, '2', '2020-05-03 19:59:09', '2020-05-04 00:32:52'),
(12, 4, 0, 10, NULL, '2020-05-15', '2020-05-20', 3, NULL, NULL, '0', '2020-05-09 00:41:50', '2020-05-09 00:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_vehicle` int(10) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `content`, `id_user`, `id_vehicle`, `rating`, `created_at`, `updated_at`) VALUES
(2, 'Good Car', 2, 1, 7, '2020-04-24 21:37:38', '2020-04-24 21:37:38'),
(5, 'Really comfortable', 2, 6, 3, '2020-04-24 22:12:52', '2020-04-24 22:12:52'),
(7, 'Rating system is very bad', 4, 5, 10, '2020-04-25 01:41:58', '2020-04-25 01:41:58'),
(8, 'Great interior', 4, 6, 8, '2020-04-25 02:01:06', '2020-04-25 02:01:06'),
(9, 'Not that good', 2, 8, 8, '2020-04-25 02:52:16', '2020-04-25 02:52:16'),
(10, 'Average use\r\n', 4, 8, 7, '2020-04-25 03:21:17', '2020-04-25 03:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', '2020-04-22 02:07:14', '2020-04-22 07:09:24'),
(3, 'Ford', '2020-04-22 03:51:16', '2020-04-22 03:51:16'),
(4, 'Audi', '2020-04-24 07:08:13', '2020-04-24 07:08:13'),
(5, 'BMW', '2020-04-25 02:50:25', '2020-04-25 02:50:25'),
(6, 'Mazda', '2020-04-25 02:53:50', '2020-04-25 02:53:50'),
(7, 'Kia', '2020-04-25 02:57:26', '2020-04-25 02:57:26'),
(8, 'Lamborghini', '2020-04-29 21:11:26', '2020-04-29 21:11:26'),
(9, 'Lexus', '2020-05-07 10:24:39', '2020-05-07 10:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2020_04_21_100033_create_roles_table', 1),
('2020_04_21_100646_create_vehicles_table', 1),
('2020_04_21_100709_create_manufactures_table', 1),
('2020_04_21_100733_create_payments_table', 1),
('2020_04_21_100741_create_payment_types_table', 1),
('2020_04_21_100753_create_bookings_table', 1),
('2020_04_21_100825_create_pickup_locations_table', 1),
('2020_04_21_100833_create_feedback_table', 1),
('2020_04_21_113552_create_vehicle_types_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_payment` date NOT NULL,
  `id_payment_type` int(10) UNSIGNED NOT NULL,
  `total_price` decimal(18,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'visa', '2020-04-22 02:55:34', '2020-04-22 02:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_locations`
--

CREATE TABLE `pickup_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pickup_locations`
--

INSERT INTO `pickup_locations` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'Ha Noi', 'hn', '2030142049', '2020-04-22 03:16:06', '2020-04-22 03:16:06'),
(3, 'Da Nang', 'dn', '0129390123', '2020-04-25 02:58:17', '2020-04-25 02:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-04-21 06:32:52', '0000-00-00 00:00:00'),
(2, 'staff', '2020-04-22 00:16:56', '2020-04-22 00:19:12'),
(3, 'customer', '2020-04-22 00:02:40', '2020-04-22 00:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_role` int(10) UNSIGNED NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver_license` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verify_email` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `gender`, `id_role`, `phone`, `date_of_birth`, `image`, `driver_license`, `verify_email`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Truong Giang', 'giangvptgcs17161@fpt.edu.vn', '$2y$10$aTKUy/wLV9V3Xak7a1AgTeH0PCjWYk5sJ.d/NKjT0YREM4Zc64VBC', '89/12 Nguyễn Hồng Đào, p 14', 'm', 1, '0932041717', '1999-02-20', '52417149_1617116148432556_3196456747791286272_n.jpg', '', '1', NULL, '2020-04-22 01:36:13', '2020-04-26 22:13:15'),
(4, 'Duc Thinh', 'thinhvu3007@gmail.com', '$2y$10$aTKUy/wLV9V3Xak7a1AgTeH0PCjWYk5sJ.d/NKjT0YREM4Zc64VBC', '89/12 Nguyễn Hồng Đào', 'm', 2, '09029202', '2008-07-30', '70396637_102931691107407_5523041708855525376_n.jpg', '9434f231070485815651ee9992dcd17e.jpg', '1', NULL, '2020-04-24 06:44:06', '2020-05-09 00:41:50'),
(6, 'Ha Tuan Kiet', 'kiet@gmail.com', '$2y$10$iwLmAiwyyD8lba7zDOY5Se3aXVzrP18eytLqHFmCxSjnws/WtzQm.', '', '', 3, '', '2020-04-27', '', '', '0', NULL, '2020-04-26 20:10:44', '2020-04-26 20:10:44'),
(7, 'hieu', 'hieu@gmail.com', '$2y$10$mpHvQFTV0kFPWVuIRACygeWF8LbjN/KnAoEvPAcI7qRdOWqaDk3W.', NULL, NULL, 3, NULL, NULL, NULL, '', '0', NULL, '2020-04-26 20:13:15', '2020-04-26 20:13:15'),
(8, 'Khanh', 'khanhnoob@gmail.com', '$2y$10$P4.cVZA7PtOXm4wRQjwnTuxz6.Ytfk9w2qzsaaZ1F81D4uk5tDljC', '', 'm', 3, '', NULL, NULL, '', '0', NULL, '2020-04-26 20:15:05', '2020-04-26 20:19:08'),
(9, 'The Huy', 'huy@gmail.com', '$2y$10$N4YEQEzSxoxpe6Ps.tFdeufa.USa.SOt8tIbGZO796Gmk63PYYzXK', NULL, 'm', 3, NULL, NULL, '51227986_1193215667511918_6152604990130094080_n.jpg', '', '0', NULL, '2020-04-26 20:45:47', '2020-04-26 21:30:41'),
(19, 'Cong Test', 'vnhunter369@gmail.com', '$2y$10$ZFF4S4rvhc8Q828bxvFPquYypcBZ.Q/.h38fMxnto/igT67OWJttS', '89/12 đường Nguyễn Hồng Đào', 'm', 3, '0932041818', NULL, 'cong2.png', '9434f231070485815651ee9992dcd17e.jpg', '1', NULL, '2020-05-02 20:08:06', '2020-05-03 00:54:07'),
(20, 'Truong Giang', 'tg.ethanstark@gmail.com', '$2y$10$aczxEzTZ3aXcQ5BIMSCJseHazAbs/7OOI8J.9To64C68LDUvIfqR6', NULL, NULL, 3, NULL, NULL, NULL, '', '1', NULL, '2020-05-08 22:37:56', '2020-05-08 22:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_pickup_location` int(10) UNSIGNED NOT NULL,
  `id_model` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `daily_price` decimal(18,2) NOT NULL,
  `view_count` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `id_pickup_location`, `id_model`, `image`, `image2`, `image3`, `image4`, `daily_price`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 'Camry', 2, 2, 'danh-gia-xe-toyota-camry-2019-2020-viet-nam-tuvanmuaxe-2.jpg', 'toyota-camry-2-5q-2019-mau-den-nhap-khau-2-thegioixeoto.jpg', '2402_hinh-anh-toyota-camry-2019-autobikes-41.jpg', 'Toyota-Camry-2019-cao-cap-tuvanmuaxe-2.jpg', '30.00', 20, '2020-04-22 05:54:05', '2020-05-04 07:28:59'),
(4, 'Mustang', 2, 3, 'photo-1547744152-14d985cb937f.jpeg', '1.jpg', '2018-ford-mustang-gt-rear-1.jpg', '2018-ford-mustang-gt-front.jpg', '42.00', 68, '2020-04-22 09:28:26', '2020-05-10 03:21:24'),
(5, 'Audi A7', 2, 4, '2020-audi-a7_100726075_h.jpg', '2020_Audi_A6_hero-610x400.jpg', '2020-audi-a7-mmp-1-1572634868.jpg', '2020-audi-a7-mmp-2-1572635049.jpg', '400.00', 26, '2020-04-24 07:09:09', '2020-05-08 22:43:23'),
(6, 'Audi Q8', 2, 5, '5144_faec558b-audi-q8-50-tdi-quattro-by-abt-9.jpg', 'Tuning-Audi-Q8-ABT-driveit.sk-2-1024x683.jpg', 'D5GUzmkXsAA4uJQ.jpg', 'ABT_Q8_orcaschwarz_Front_fahrend.jpg', '380.00', 36, '2020-04-24 07:12:09', '2020-05-04 07:59:12'),
(7, 'Yaris GR', 2, 6, 'toyota-yaris-gr-du-rallye-a-la-route_MD_0.jpg', 'gr-yaris-2020.jpg', '2021-Toyota-GR-Yaris-Rear-Three-Quarter-Wallpaper.jpg', 'thumb2-toyota-gr-yaris-2021-exterior-rear-view-hatchback.jpg', '25.00', 7, '2020-04-25 02:48:19', '2020-05-04 07:36:01'),
(8, 'BMW X6', 2, 7, '2020-bmw-x6-m-competition-108-1569964624.jpg', 'Audi-RS-Q8-vs-BMW-X6-M-4-scaled.jpg', '2020_bmw_x6_m_competition_29_1920x1080.jpg', '2020_bmw_x6_m_competition_31_1920x1080.jpg', '230.00', 19, '2020-04-25 02:51:22', '2020-05-12 03:53:25'),
(10, 'Kia Stinger', 3, 9, '2.jpg', '2018-kia-stinger-car-review.jpg', '2018-kia-stinger-gt-first-drive.jpg', '2020-kia-stinger-rear-view-driving-carbuzz-605852.jpg', '170.00', 62, '2020-04-25 02:58:03', '2020-05-09 00:49:01'),
(12, 'Aventador', 2, 11, 'maxresdefault.jpg', 'White-Lamborghini-Aventador-S-Back.jpg', 'White-Lamborghini-Aventador-S.jpg', 'Lambo-Aventador-S-For-Rent.jpg', '250.00', 7, '2020-04-29 21:13:19', '2020-05-04 07:58:27'),
(13, 'BMW i8', 3, 12, '2-bmw-i8-roadster-2018-fd-hero-rear.jpg', '2020-BMW-i8-Roadster-Exterior.jpg', '21-bmw-i8-roadster-2018-fd-static-side.jpg', '18-bmw-i8-roadster-2018-fd-otr-rear.jpg', '300.00', 3, '2020-05-04 07:53:57', '2020-05-04 07:57:19'),
(15, 'Lexus RX350', 3, 13, '001-2018-lexus-rx-l.webp', '002-2018-lexus-rx-l.webp', '004-2018-lexus-rx-l.webp', '005-2018-lexus-rx-l.webp', '130.00', 0, '2020-05-07 10:32:08', '2020-05-07 10:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_vehicle` int(10) UNSIGNED NOT NULL,
  `seat` int(11) NOT NULL,
  `door` int(10) UNSIGNED NOT NULL,
  `fuel` int(10) NOT NULL,
  `air_con` int(10) NOT NULL,
  `bluetooth` int(11) NOT NULL,
  `gearbox` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`id`, `id_vehicle`, `seat`, `door`, `fuel`, `air_con`, `bluetooth`, `gearbox`, `created_at`, `updated_at`) VALUES
(2, 1, 5, 4, 2, 1, 0, 3, '2020-04-25 07:06:18', '2020-04-25 07:29:30'),
(3, 4, 4, 2, 1, 1, 1, 4, '2020-04-25 22:31:24', '2020-04-25 22:31:24'),
(4, 5, 4, 4, 1, 1, 1, 1, '2020-04-25 22:32:16', '2020-04-25 22:32:16'),
(5, 6, 5, 4, 2, 0, 1, 1, '2020-04-25 22:33:24', '2020-04-25 22:33:24'),
(6, 7, 5, 4, 1, 1, 1, 1, '2020-04-25 22:33:48', '2020-04-25 22:33:48'),
(7, 8, 5, 4, 1, 1, 1, 4, '2020-04-25 22:34:27', '2020-04-25 22:34:27'),
(8, 10, 5, 4, 1, 1, 0, 2, '2020-04-25 22:40:08', '2020-04-25 22:40:08'),
(9, 12, 4, 2, 1, 1, 1, 1, '2020-04-29 21:14:14', '2020-04-29 21:14:14'),
(10, 15, 7, 4, 1, 1, 1, 1, '2020-05-07 21:36:02', '2020-05-07 21:36:02'),
(11, 13, 2, 2, 1, 1, 1, 1, '2020-05-07 21:36:17', '2020-05-07 21:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_manufacture` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `name`, `id_manufacture`, `created_at`, `updated_at`) VALUES
(2, 'Sedan', 1, '2020-04-22 03:51:04', '2020-04-22 03:51:04'),
(3, 'Sedan', 3, '2020-04-22 03:52:45', '2020-04-22 03:52:45'),
(4, 'Sedan', 4, '2020-04-24 07:08:30', '2020-04-24 07:08:30'),
(5, 'SUV', 4, '2020-04-24 07:08:40', '2020-04-24 07:08:40'),
(6, 'Hatchback', 1, '2020-04-25 02:47:06', '2020-04-25 02:47:06'),
(7, 'Coupé', 5, '2020-04-25 02:50:48', '2020-04-25 02:50:48'),
(8, 'Roadster', 6, '2020-04-25 02:54:39', '2020-04-25 02:54:39'),
(9, 'Sedan', 7, '2020-04-25 02:57:38', '2020-04-25 02:57:38'),
(10, 'Coupé', 4, '2020-04-25 03:00:03', '2020-04-25 03:00:03'),
(11, 'Supercar', 8, '2020-04-29 21:11:39', '2020-04-29 21:11:39'),
(12, 'Supercar', 5, '2020-05-04 07:47:33', '2020-05-04 07:47:33'),
(13, 'SUV', 9, '2020-05-07 10:24:50', '2020-05-07 10:24:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_locations`
--
ALTER TABLE `pickup_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pickup_locations`
--
ALTER TABLE `pickup_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
