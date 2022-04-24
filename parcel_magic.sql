-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 11:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parcel_magic`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_budget` double(8,2) DEFAULT NULL,
  `daily_budget` double(8,2) DEFAULT NULL,
  `banner` mediumtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `from_date`, `to_date`, `total_budget`, `daily_budget`, `banner`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', '2022-04-21', '2022-04-22', 123.00, 12.00, 'banner/0-1650562362.png|banner/1a631a0a-13ad-4ff5-8276-78843d92fc85-original-1650562362.jpeg', 1, '2022-04-21 11:32:42', '2022-04-21 11:32:42'),
(2, 'test 2', '2022-04-22', '2022-04-23', 111.00, 10.00, 'banner/29a7c8e7-62b7-404a-90ae-51310abf7c66-original-1650562601.jpeg|banner/888ea0c0-8793-48a6-909b-1132a9670a04-original-1650562601.jpeg|banner/3130f2af-8c04-41f6-8259-05b06ac17879-original-1650562601.jpeg|banner/6453f287-b6f0-4c5d-a242-13b6b12eaff0-original-1650562601.jpeg', 1, '2022-04-21 11:36:41', '2022-04-21 11:36:41'),
(3, 'Lorem Ipsum comes from sections', '2022-04-29', '2022-04-22', 100.00, 5.00, 'banner/wallhaven-342160-(1)-1650787931.jpg|banner/web-design-development-1650787931.jpg|banner/webdesign-sketch-1650787931.jpg|banner/whatis-data-structure-1650787931.png', 1, '2022-04-21 11:39:17', '2022-04-24 02:12:11'),
(4, 'Lorem Ipsum is simply dummy text', '2022-04-29', '2022-04-22', 100.00, 5.00, 'banner/56595499-2095505443899847-1752949906399559680-o-1650787502.jpg|banner/109951163131069630-1650786882.jpg|banner/girl-1650786882.jpeg|banner/jail-0-1650786882.jpg', 1, '2022-04-21 11:59:28', '2022-04-24 02:05:02'),
(5, 'test campaign using api', '2022-04-27', '2022-04-30', 100.00, 10.00, '', 1, '2022-04-24 00:45:17', '2022-04-24 00:45:17'),
(6, 'test campaign using api', '2022-04-27', '2022-04-30', 100.00, 10.00, 'banner/code-rain-modified-dark-wallpaper-by-zunayed-hassan-d8iqh1w-1650786387.png|banner/fm1okbo-1650786387.jpg', 1, '2022-04-24 01:07:11', '2022-04-24 01:46:27'),
(7, 'Lorem ipsum may be used as a placeholder', '2022-04-27', '2022-05-07', 600.00, 22.00, 'banner/42858958-2379084058769806-8331187783355858944-n-1650788358.jpg|banner/42881932-2379523468725865-7356424013268123648-n-1650788358.jpg|banner/42956062-313771345841045-4603724562104844288-n-1650788358.jpg', 1, '2022-04-24 02:19:18', '2022-04-24 02:19:18'),
(8, 'text commonly used to demonstrate', '2022-04-28', '2022-05-04', 200.00, 50.00, 'banner/56595499-2095505443899847-1752949906399559680-o-1650788426.jpg', 1, '2022-04-24 02:20:26', '2022-04-24 02:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_19_082458_create_campaigns_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$02pcQDKvbHoaDS4KkuEL1u8cowSk6du35CIqoeGuZEypL/igasLh6', NULL, '2022-04-21 11:29:39', '2022-04-21 11:29:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
