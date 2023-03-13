-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 05:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `artiklis`
--

CREATE TABLE `artiklis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(255) DEFAULT NULL,
  `opis` varchar(255) DEFAULT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `kategorija` varchar(255) DEFAULT NULL,
  `kolicina` int(255) DEFAULT NULL,
  `cijena` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artiklis`
--

INSERT INTO `artiklis` (`id`, `ime`, `opis`, `slika`, `kategorija`, `kolicina`, `cijena`, `created_at`, `updated_at`) VALUES
(3, 'Majica', 'Majica je fina', '1676664178.jpg', 'Odjeca', 29, 100, '2023-02-16 15:22:29', '2023-02-24 13:14:54'),
(7, 'Medo', 'Plišani medvjed smeđe boje', '1676913737.jpg', 'Igracke', 14, 25, '2023-02-20 16:22:17', '2023-02-20 16:22:17'),
(8, 'Ogrlica', 'Zlatna ogrlica', '1676913789.jpg', 'Nakit', 10, 149, '2023-02-20 16:23:09', '2023-02-20 16:23:09'),
(9, 'ROG Strix G15 G513', '15.6-inch. FHD (1920 x 1080) 16:9. Value IPS-level. Anti-glare display. sRGB: 62.5% Adobe: 47.34% Refresh Rate: 144Hz. Adaptive-Sync.', '1677351685.png', 'Laptopi', 3, 1600, '2023-02-25 18:01:25', '2023-02-25 18:01:25'),
(10, 'iPhone 14', 'iPhone 14 Pro. Snimite nevjerojatne detalje glavnom kamerom od 48 MP. Doživite iPhone na potpuno novi način uz Dynamic Island i Always-On Display. Nova sigurnosna značajka Crash Detection poziva u pomoć kada vi to ne možete.', '1677545759.jpg', 'Mobitel', 6, 1400, '2023-02-27 23:55:59', '2023-02-27 23:55:59'),
(11, 'Čarobni zlatni set ', 'U Čarobnom zlatnom setu nalaze se Čarobni piling(200ml) gel i Čarobno suho ulje(50 ml). Čarobni piling gel namijenjen je nježnom i temeljitom čišćenju kože tijela. Čarobno suho ulje namijenjeno je njezi tijela, lica i kose.', '1677546013.jpg', 'Kozmetika', 13, 50, '2023-02-28 00:00:13', '2023-02-28 00:00:13'),
(12, 'Srebrena narukvica', 'Pravo srebro 36g, dužina 23 cm', '1677546163.jpg', 'Nakit', 11, 105, '2023-02-28 00:02:43', '2023-02-28 00:02:43');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorijas`
--

CREATE TABLE `kategorijas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime_kategorije` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategorijas`
--

INSERT INTO `kategorijas` (`id`, `ime_kategorije`, `created_at`, `updated_at`) VALUES
(20, 'Odjeca', '2023-02-14 15:08:03', '2023-02-14 15:08:03'),
(21, 'Laptopi', '2023-02-14 15:08:18', '2023-02-14 15:08:18'),
(22, 'Mobitel', '2023-02-14 15:14:20', '2023-02-14 15:14:20'),
(24, 'Kozmetika', '2023-02-17 20:20:36', '2023-02-17 20:20:36'),
(25, 'Igracke', '2023-02-20 16:21:11', '2023-02-20 16:21:11'),
(26, 'Nakit', '2023-02-20 16:21:33', '2023-02-20 16:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `komentaris`
--

CREATE TABLE `komentaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(255) DEFAULT NULL,
  `komentar` longtext DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `artikal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentaris`
--

INSERT INTO `komentaris` (`id`, `ime`, `komentar`, `user_id`, `artikal_id`, `created_at`, `updated_at`) VALUES
(6, 'user', 'Okej je majica', '6', 3, '2023-02-28 13:44:06', '2023-02-28 13:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `kosaras`
--

CREATE TABLE `kosaras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `naziv_artikla` varchar(255) DEFAULT NULL,
  `cijena` varchar(255) DEFAULT NULL,
  `kolicina` int(255) DEFAULT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `artikal_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kosaras`
--

INSERT INTO `kosaras` (`id`, `name`, `email`, `phone`, `address`, `naziv_artikla`, `cijena`, `kolicina`, `slika`, `artikal_id`, `user_id`, `created_at`, `updated_at`) VALUES
(17, 'test', 'test@test.com', '063014562', 'Ulica Kralja Tomislava 2', 'Medo', '25', 1, '1676913737.jpg', '7', '3', '2023-02-21 14:44:54', '2023-02-21 14:44:54'),
(56, 'user', 'petarboss112@gmail.com', '063014562', 'Ulica Kralja Tomislava 2', 'Medo', '25', 1, '1676913737.jpg', '7', '6', '2023-03-02 13:32:42', '2023-03-02 13:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_05_173749_create_sessions_table', 1),
(7, '2023_02_13_213610_create_kategorija_table', 2),
(8, '2023_02_13_213610_create_kategorijas_table', 3),
(9, '2023_02_16_145955_create_artiklis_table', 4),
(10, '2023_02_19_193912_create_kosaras_table', 5),
(11, '2023_02_21_140615_create_narudzbas_table', 6),
(12, '2023_02_23_212955_create_notifications_table', 7),
(13, '2023_02_25_122532_create_komentaris_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbas`
--

CREATE TABLE `narudzbas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `broj` varchar(255) DEFAULT NULL,
  `adresa` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `naziv_artikla` varchar(255) DEFAULT NULL,
  `kolicina` varchar(255) DEFAULT NULL,
  `cijena` varchar(255) DEFAULT NULL,
  `slika` varchar(255) DEFAULT NULL,
  `artikal_id` varchar(255) DEFAULT NULL,
  `dostava_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `narudzbas`
--

INSERT INTO `narudzbas` (`id`, `ime`, `email`, `broj`, `adresa`, `user_id`, `naziv_artikla`, `kolicina`, `cijena`, `slika`, `artikal_id`, `dostava_status`, `created_at`, `updated_at`) VALUES
(10, 'user', 'petarboss112@gmail.com', '063014562', 'Ulica Kralja Tomislava 2', '6', 'Medo', '1', '25', '1676913737.jpg', '7', 'Odobreno', '2023-02-23 20:56:54', '2023-02-23 20:57:21'),
(12, 'user', 'petarboss112@gmail.com', '063014562', 'Ulica Kralja Tomislava 2', '6', 'Majica', '2', '200', '1676664178.jpg', '3', 'Odobreno', '2023-02-24 13:08:13', '2023-02-24 13:14:54'),
(13, 'user', 'petarboss112@gmail.com', '063014562', 'Ulica Kralja Tomislava 2', '6', 'Medo', '2', '50', '1676913737.jpg', '7', 'Poništeno', '2023-02-28 13:38:48', '2023-03-01 14:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BdEPh7QnMEISvFcu6g3CwazUbpS2lU6AwEO461Zq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0ZkU2ZiSkRZcUVDSGdxT21SRDU1ME1ZYWc4RVptUE0yNGVrVVZqOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1677781444),
('gXxL3uZNbU0uoHDSRrdGCNpI7HGWOZsP9isenjCw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUJQeVlxbDBxRUQxemRqY0pYTU95U1lWaVkyOXl6Y2ViNEdHYVgwUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1677772174);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@admin.com', '1', '0', '0', '2023-02-16 15:46:41', '$2y$10$zdDdJug07sb6.l97TEf95OVxkeE9/Q2h0ustF2FDCYtkqoCClTWZ2', NULL, NULL, NULL, 'Z1dtJ7HMnJI3UEUi1x8NMaVIZioPAzXaT9cVlWNoV0P2e2lBY8QuDEr9H8YP', NULL, NULL, '2023-02-06 14:39:08', '2023-02-06 14:39:08'),
(6, 'user', 'petarboss112@gmail.com', '0', '063014562', 'Ulica Kralja Tomislava 2', '2023-02-22 16:25:09', '$2y$10$hIdxsGbvudMY.mBlPMwtXun/zCjSMHroPmx7iNjEgU9Q81780LU9q', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-22 16:20:55', '2023-02-22 16:25:09'),
(7, 'ime', 'zoran.bosnjak1@tel.net.ba', '0', '063014562', 'Ulica Kralja Tomislava 2', '2023-02-22 15:46:41', '$2y$10$pOLW2gYPb8klI/.JWyKtpOdnToJeYTCtdmwriV4QjU.sQkl/azdPm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-23 21:07:04', '2023-02-23 21:07:04'),
(8, 'Josipa', 'josipa.landeka@fsre.sum.ba', '0', '0647189911', 'Ulica Ante Starčevića 13', '2023-02-22 00:43:34', '$2y$10$hdcV/jJ1MxIuP1sPwgVPp.rR.u1u8YRXVhtmxxu.cKSGtQNpo3qku', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-01 23:43:16', '2023-03-01 23:43:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artiklis`
--
ALTER TABLE `artiklis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategorijas`
--
ALTER TABLE `kategorijas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentaris`
--
ALTER TABLE `komentaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentaris_artikal_id_foreign` (`artikal_id`);

--
-- Indexes for table `kosaras`
--
ALTER TABLE `kosaras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzbas`
--
ALTER TABLE `narudzbas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `artiklis`
--
ALTER TABLE `artiklis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategorijas`
--
ALTER TABLE `kategorijas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `komentaris`
--
ALTER TABLE `komentaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kosaras`
--
ALTER TABLE `kosaras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `narudzbas`
--
ALTER TABLE `narudzbas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentaris`
--
ALTER TABLE `komentaris`
  ADD CONSTRAINT `komentaris_artikal_id_foreign` FOREIGN KEY (`artikal_id`) REFERENCES `artiklis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
