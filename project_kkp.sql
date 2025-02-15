-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 15, 2025 at 09:59 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_kkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_data`
--

CREATE TABLE `master_data` (
  `id` int NOT NULL,
  `material` varchar(255) NOT NULL,
  `kategory` varchar(255) NOT NULL,
  `tebal` int NOT NULL,
  `lebar` int NOT NULL,
  `berat_jenis` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_data`
--

INSERT INTO `master_data` (`id`, `material`, `kategory`, `tebal`, `lebar`, `berat_jenis`, `created_at`, `updated_at`) VALUES
(1, 'PET PLAIN 12 MIC X 1100 MM', 'PrintBased', 12, 1, 1.42, NULL, '2025-02-11 12:32:46'),
(2, 'CPP PLAIN 20 MIC X 1000 MM', 'LayerBased', 20, 1000, 0.91, NULL, '2025-02-11 12:33:03'),
(3, 'NYLON 15 MIC X 750 MM', 'PrintBased', 15, 750, 1.15, NULL, NULL),
(4, 'BCN 123 DNN', 'LayerBased', 3, 23, 1.5, '2025-02-11 10:28:03', '2025-02-14 22:49:41'),
(5, 'BCN 123 ASS', 'LayerBased', 12, 11, 2.3, '2025-02-12 03:20:37', '2025-02-12 03:20:37'),
(6, 'CPP PLAIN 20 MIC X 1222', 'LayerBased', 234, 11, 2.008, '2025-02-12 03:22:14', '2025-02-12 03:22:14'),
(8, 'Void PTL N123', 'LayerBased', 11, 12, 0.43, '2025-02-12 03:54:52', '2025-02-12 03:54:52'),
(9, 'YET 45 NX 22', 'PrintBased', 3, 1, 23, '2025-02-12 03:55:21', '2025-02-12 03:55:21'),
(10, 'BET 123 SHI', 'PrintBased', 2, 12, 10.2, '2025-02-12 03:55:45', '2025-02-12 03:55:45'),
(11, 'BCS 133 HNN', 'PrintBased', 80, 1, 90, '2025-02-12 03:56:09', '2025-02-12 03:56:09'),
(12, 'HJK VN 34', 'LayerBased', 10, 2, 1.5, '2025-02-15 02:40:42', '2025-02-15 02:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request_head`
--

CREATE TABLE `purchase_request_head` (
  `id` bigint NOT NULL,
  `purchase_request_number` varchar(255) NOT NULL,
  `user_ID` bigint NOT NULL,
  `document_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase_request_head`
--

INSERT INTO `purchase_request_head` (`id`, `purchase_request_number`, `user_ID`, `document_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRRM 0001', 1, '2025-02-09 12:50:25', 1, '2025-02-12 12:50:52', '2025-02-15 01:19:54'),
(2, 'PRRM 0002', 1, '2025-02-15 01:57:51', 1, '2025-02-14 18:57:51', '2025-02-15 01:20:10'),
(3, 'PRRM 0003', 1, '2025-02-15 02:03:05', 1, '2025-02-14 19:03:05', '2025-02-15 01:20:17'),
(4, 'PRRM 0004', 1, '2025-02-15 03:54:43', 0, '2025-02-14 20:54:43', '2025-02-14 20:54:43'),
(5, 'PRRM 0005', 1, '2025-02-15 09:43:19', 0, '2025-02-15 02:43:19', '2025-02-15 02:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request_list`
--

CREATE TABLE `purchase_request_list` (
  `id` bigint NOT NULL,
  `purchase_request_number` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `kategory` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` float NOT NULL,
  `uom` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase_request_list`
--

INSERT INTO `purchase_request_list` (`id`, `purchase_request_number`, `material`, `kategory`, `description`, `qty`, `uom`, `created_at`, `updated_at`) VALUES
(1, 'PRRM 0001', 'PET PLAIN 12 MIC X 1100 MM', 'PrintBased', 'Energen', 15, 'kg', '2025-02-12 13:42:20', '2025-02-14 21:25:32'),
(2, 'PRRM 0001', 'CPP PLAIN 20 MIC X 1000 MM', 'LayerBased', 'Inner Kis BM', 20, 'kg', '2025-02-12 13:42:20', '2025-02-12 13:42:20'),
(3, 'PRRM 0001', 'NYLON 15 MIC X 750 MM', 'PrintBased', 'Inner coki coki', 10, 'kg', '2025-02-12 13:43:48', '2025-02-12 13:43:48'),
(6, 'PRRM 0001', 'CPP PLAIN 20 MIC X 1222', 'LayerBased', 'Indomie Goreng', 1, 'meter', '2025-02-12 09:37:05', '2025-02-12 09:37:05'),
(8, 'PRRM 0001', 'BET 123 SHI', 'PrintBased', 'Besi 3', 11, 'meter', '2025-02-12 09:42:48', '2025-02-14 22:47:42'),
(9, 'PRRM 0001', 'CPP PLAIN 20 MIC X 1000 MM', 'LayerBased', 'avdad', 2, 'meter', '2025-02-13 03:57:35', '2025-02-13 03:57:35'),
(10, 'PRRM 0003', 'YET 45 NX 22', 'PrintBased', 'Baja 12 XP', 2, 'kg', '2025-02-14 21:02:26', '2025-02-14 21:02:26'),
(11, 'PRRM 0001', 'PET PLAIN 12 MIC X 1100 MM', 'PrintBased', 'Aqua', 2, 'kg', '2025-02-14 21:27:33', '2025-02-14 21:27:33'),
(12, 'PRRM 0002', 'BCN 123 DNN', 'LayerBased', 'Cat putih', 2, 'kg', '2025-02-14 22:44:28', '2025-02-14 23:37:31'),
(13, 'PRRM 0005', 'PET PLAIN 12 MIC X 1100 MM', 'PrintBased', 'selayolay', 2, 'meter', '2025-02-15 02:43:50', '2025-02-15 02:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request_signature`
--

CREATE TABLE `purchase_request_signature` (
  `id` bigint NOT NULL,
  `purchase_request_number` varchar(255) NOT NULL,
  `approved_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `approved_manager` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `acknowledge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase_request_signature`
--

INSERT INTO `purchase_request_signature` (`id`, `purchase_request_number`, `approved_user`, `approved_manager`, `acknowledge`, `created_at`, `updated_at`) VALUES
(1, 'PRRM 0001', 'staff', 'admin1', 'staff', '2025-02-12 13:46:26', '2025-02-15 01:14:44'),
(2, 'PRRM 0002', 'admin1', 'admin1', 'admin1', '2025-02-14 18:57:51', '2025-02-15 00:47:41'),
(3, 'PRRM 0003', 'admin1', 'admin1', 'admin1', '2025-02-14 19:03:05', '2025-02-15 01:03:47'),
(4, 'PRRM 0004', 'admin1', NULL, NULL, '2025-02-14 20:54:43', '2025-02-14 20:54:43'),
(5, 'PRRM 0005', 'admin1', 'admin1', NULL, '2025-02-15 02:43:19', '2025-02-15 02:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('so601ahPh4AN7Q9i5H9RhDLKJ67uT8MUcxX3BhTm', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ2JRSkpYZ1dXRUJ2SVl1Tnl6N0FnNHRVUmIyanRldTlqaHk0aWNKRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wdXJjaGFzZS1yZXF1ZXN0L1BSUk0lMjAwMDAxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1739613006);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'admin1@mailnesia.com', NULL, '$2y$12$t/O.kAELik4DmoXeqIDHOeRF8wnSii.Vxa0AyjTs.X0bE9FeE2WGq', NULL, 'admin', '2025-02-08 21:27:50', '2025-02-08 21:27:50'),
(2, 'Atasan', 'atasan@mailnesia.com', NULL, '$2y$12$t/O.kAELik4DmoXeqIDHOeRF8wnSii.Vxa0AyjTs.X0bE9FeE2WGq', NULL, 'atasan', '2025-02-09 00:11:04', '2025-02-09 00:11:04'),
(3, 'staff', 'staff@mailnesia.com', NULL, '$2y$12$gJtddqWFp7s4zUviD0QmtO8IPa.ql97yOysPkrtwwAZ64FVlHrJwi', NULL, 'staff', '2025-02-09 03:01:14', '2025-02-09 03:01:14'),
(4, 'staff2', 'staff2@mailnesia.com', NULL, '$2y$12$YvRcVYpJyYEqnKsYyyB3s.Xl6GFyhcdjHjjPNH4U.gBGUxreGVVqG', NULL, 'staff', '2025-02-09 03:02:41', '2025-02-09 03:02:41'),
(5, 'staff1', 'staff1@gmail.com', NULL, '$2y$12$2E7YL8EQAZaft3B3sFWre.S5WDdZT.xE6vqcW4BvLipU5.Nf0Srx6', NULL, NULL, '2025-02-09 05:08:31', '2025-02-09 05:08:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_data`
--
ALTER TABLE `master_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `purchase_request_head`
--
ALTER TABLE `purchase_request_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_request_list`
--
ALTER TABLE `purchase_request_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_request_signature`
--
ALTER TABLE `purchase_request_signature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_data`
--
ALTER TABLE `master_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_request_head`
--
ALTER TABLE `purchase_request_head`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_request_list`
--
ALTER TABLE `purchase_request_list`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchase_request_signature`
--
ALTER TABLE `purchase_request_signature`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
