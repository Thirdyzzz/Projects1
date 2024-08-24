-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 08:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `securedocs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `archivedbilling`
--

CREATE TABLE `archivedbilling` (
  `id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `case_id` varchar(255) NOT NULL,
  `case_title` varchar(255) NOT NULL,
  `b_clientbalance` varchar(255) NOT NULL,
  `b_casetype` varchar(255) NOT NULL,
  `b_paymethod` varchar(255) NOT NULL,
  `bclient_paystatus` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archivedbilling`
--

INSERT INTO `archivedbilling` (`id`, `client_id`, `case_id`, `case_title`, `b_clientbalance`, `b_casetype`, `b_paymethod`, `bclient_paystatus`, `created_at`, `updated_at`) VALUES
(27, '15', '331', 'Tailwind Scam', '50000', 'Criminal Case', 'Debit', 'Paid', '2023-10-25 19:27:38', '2023-10-28 02:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `case_id` varchar(255) DEFAULT NULL,
  `case_title` varchar(255) DEFAULT NULL,
  `b_clientbalance` int(11) DEFAULT NULL,
  `b_casetype` varchar(255) NOT NULL,
  `b_paymethod` varchar(255) NOT NULL,
  `bclient_paystatus` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `client_id`, `case_id`, `case_title`, `b_clientbalance`, `b_casetype`, `b_paymethod`, `bclient_paystatus`, `created_at`, `updated_at`) VALUES
(28, 15, '333', 'DDG', 50000, 'Criminal Case', 'Cash', 'Unpaid', '2023-10-25 19:28:19', '2023-10-25 19:28:19'),
(29, 16, '332', '9mm wadadadeng', 50000, 'Criminal Case', 'Cash', 'Unpaid', '2023-10-25 19:28:55', '2023-10-25 19:28:55'),
(30, 16, '334', 'UMYUNG', 20000, 'Civil Case', 'Debit', 'Paid', '2023-10-25 19:37:43', '2023-10-25 19:37:43'),
(31, 15, '400', 'DDG2', 50000, 'Criminal Case', 'Cash', 'Unpaid', '2023-10-25 19:43:54', '2023-10-25 19:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `checkoxtest`
--

CREATE TABLE `checkoxtest` (
  `casename` varchar(255) NOT NULL,
  `casetype` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkoxtest`
--

INSERT INTO `checkoxtest` (`casename`, `casetype`, `updated_at`, `created_at`) VALUES
('bilat', 'bilat', '2023-09-14 09:28:59', '2023-09-14 09:28:59'),
('bilat', '[\"Cyercrime\"]', '2023-09-14 09:32:13', '2023-09-14 09:32:13'),
('bilat', 'Cyercrime', '2023-09-14 09:38:25', '2023-09-14 09:38:25'),
('bilat', 'Cyercrime,Burglary,Assault', '2023-09-14 09:38:38', '2023-09-14 09:38:38'),
('bilat', 'Cyercrime, Burglary, Assault', '2023-09-14 09:39:13', '2023-09-14 09:39:13'),
('bilat234', 'Cyercrime, Murder, Burglary, Rape, Assault, Theft', '2023-09-14 09:39:21', '2023-09-14 09:39:21'),
('d', 'Cybercrime', '2023-09-14 12:42:05', '2023-09-14 12:42:05'),
('d', 'Cybercrime', '2023-09-14 12:42:47', '2023-09-14 12:42:47'),
('d', 'Cybercrime', '2023-09-14 12:52:52', '2023-09-14 12:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `client_lawyer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_submitby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_sname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_contactnum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_emailadd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_permadd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_emcontactnum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ememailadd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_empermadd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_oppsfname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_oppsmname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_oppssname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_oppslawyer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_oppsfirmaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_lawyer`, `client_submitby`, `client_fname`, `client_mname`, `client_sname`, `client_contactnum`, `client_emailadd`, `client_permadd`, `client_type`, `client_emcontactnum`, `client_ememailadd`, `client_empermadd`, `client_oppsfname`, `client_oppsmname`, `client_oppssname`, `client_oppslawyer`, `client_oppsfirmaddress`, `created_at`, `updated_at`) VALUES
(15, 'Jane Doe', 'zhou', 'Thirdy', NULL, 'Monte', '09183341281', 'thirde@yahoo.com', 'Sandawa Villages', 'Plaintiff', '09184521781', 'pete69@gmail.com', 'Davao City', 'Charisse', NULL, 'Barbossa', 'Peter', 'Japan Tokyo', '2023-10-25 09:41:49', '2023-10-25 09:41:49'),
(16, 'James', 'zhou', 'Peter', NULL, 'Monte', '09183341281', 'pete@gmail.com', 'Sandawa Villages', 'Deffendant', '09184521781', 'rtest@gmail.com', 'Davao City', 'Zo', NULL, 'Barbossa', 'Peter', 'Ecoland Matina', '2023-10-25 09:43:00', '2023-10-25 09:43:00'),
(20, 'Jane Doe', 'zjake', 'Benjamin', 'Jess', 'Monte', '09183341281', 'bbb@gmail.com', 'washing dc', 'Plaintiff', '09184521781', 'no@gmail.com', 'Davao City', 'Charisse', NULL, 'Beas', 'Higuruma', 'Japan Tokyo', '2023-10-28 03:37:45', '2023-10-28 03:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(255) NOT NULL,
  `file_idID` int(11) NOT NULL,
  `file_submittedby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_authoredby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_docketnum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_casestatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_casetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_casetypetype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_genID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_court` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_branch` varchar(2555) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `file_idID`, `file_submittedby`, `file_authoredby`, `file_name`, `file_docketnum`, `file_casestatus`, `file_casetype`, `file_casetypetype`, `file_genID`, `file`, `file_client`, `file_court`, `file_branch`, `created_at`, `updated_at`) VALUES
(33, 331, 'zjake', 'Memphis Cult', 'Tailwind Scam', '9MMILLI1', 'Open', 'Criminal Case', 'Polo G', 'Red-1003', '1698290858.IT15-RMITASK3-SARILLANA.pdf', '15', 'Court of justice', 'UMindanao', '2023-10-25 19:27:38', '2023-10-25 19:27:38'),
(34, 333, 'zjake', 'Blueface', 'DDG', 'C112345', 'Closed', 'Criminal Case', 'YBN nahmir', 'Red-3275', '1698290898.IT15-RABBITMQTASK1-SARILLANA.pdf', '15', 'Court of justice', 'UMindanao', '2023-10-25 19:28:18', '2023-10-25 19:28:18'),
(35, 332, 'zjake', 'Memphis Cult212', '9mm wadadadeng', '9MMILLI1', 'Closed', 'Criminal Case', 'Polo G', 'Red-2343', '1698290934.IT15-CHATMASTER-SARILLANA.pdf', '16', 'Court of justice', 'UMindanao', '2023-10-25 19:28:54', '2023-10-25 19:28:54'),
(36, 334, 'zjake', 'Luis', 'UMYUNG', 'B111111', 'Declined', 'Civil Case', 'Polo G', 'Blu-6004', '1698291463.IT15-CHATMASTERTASK2-SARILLANA.pdf', '16', 'Court of justice', 'UMindanao', '2023-10-25 19:37:43', '2023-10-25 19:37:43'),
(38, 335, 'zjake', 'Tester', 'DDG2', 'B111111', 'Closed', 'Criminal Case', 'Murder, Illegal possession of weaponry', 'Red-5351', '1698291818.IT15-RABBITMQTASK1-SARILLANA.pdf', '15', 'Court of justice', 'UMindanao', '2023-10-25 19:43:38', '2023-10-25 19:43:38'),
(40, 400, 'zjake', 'Tester', 'DDG2', 'B111111', 'Closed', 'Criminal Case', 'Murder, Illegal possession of weaponry', 'Red-8922', '1698291834.IT15-RABBITMQTASK1-SARILLANA.pdf', '15', 'Court of justice', 'UMindanao', '2023-10-25 19:43:54', '2023-10-25 19:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_14_184647_create_clients_table', 2),
(7, '2023_10_19_115222_recently_added', 3);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recentlyadded`
--

CREATE TABLE `recentlyadded` (
  `ra_id` bigint(20) UNSIGNED NOT NULL,
  `ra_filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ra_by_author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recentlyadded`
--

INSERT INTO `recentlyadded` (`ra_id`, `ra_filename`, `ra_by_author`, `created_at`, `updated_at`) VALUES
(23, 'Tailwind Scam', 'zjake', '2023-10-25 19:27:38', '2023-10-25 19:27:38'),
(24, 'DDG', 'zjake', '2023-10-25 19:28:18', '2023-10-25 19:28:18'),
(25, '9mm wadadadeng', 'zjake', '2023-10-25 19:28:55', '2023-10-25 19:28:55'),
(26, 'UMYUNG', 'zjake', '2023-10-25 19:37:43', '2023-10-25 19:37:43'),
(27, 'DDG2', 'zjake', '2023-10-25 19:43:38', '2023-10-25 19:43:38'),
(28, 'DDG2', 'zjake', '2023-10-25 19:43:54', '2023-10-25 19:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `client_id`, `name`, `email`, `email_verified_at`, `password`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'user', 'user@muragdev.com', NULL, '$2y$10$5rvoG9EmT4i.SezhBF7H5efLl/RYThoEqXCfxUlPc31SbwjLhtm12', 'user', NULL, '2023-09-06 06:04:45', '2023-09-06 06:04:45'),
(2, 0, 'admin', 'admin@muragdev.com', NULL, '$2y$10$6QezMd6G/kmABTEc4wkaV.WyqyS1KsSAkcgqdpf2Fr.4ATblZyHsa', 'admin', NULL, '2023-09-06 06:06:38', '2023-09-06 06:06:38'),
(15, 0, 'zjake', 'zjake.sarillana@gmail.com', '2023-09-06 19:28:12', '$2y$10$TzlsEyeQ9FumKNfRt/vhQOO3bvj0IG45QaqfzN/fzXELOTRNFbahC', 'admin', 'qbPPTVDeHjilfGyqvRTz3qW6OrgMctKlVALlWXYT7BsduCgzMsZzzmh39a13', '2023-09-06 19:27:50', '2023-09-06 19:28:12'),
(16, 0, 'zhou', 'zhou991818@gmail.com', '2023-09-06 20:18:51', '$2y$10$eskK9mlPHXvUfihKgvGtF.nNIcEKaltdGIJ0VFi7XQG3f1ZTLLmMi', 'user', NULL, '2023-09-06 20:18:06', '2023-09-06 20:18:51'),
(17, 0, 'test', 'test@gmail.com', NULL, '$2y$10$S8gSKMNPM9O99wPZNBsUieJ5oXfwVf2l1WWebIxDKkcRjs.shL8Ym', 'user', NULL, '2023-09-21 05:32:14', '2023-09-21 05:32:14'),
(18, 0, 'kin hakari', 'kin@muragdev.com', NULL, '$2y$10$Wyy.BPtIocjGfDJJT7/76e6UOvjA4QFOJz0ryMiFZQKlB58FtFPke', 'user', NULL, '2023-10-03 22:32:12', '2023-10-03 22:32:12'),
(19, 0, 'rou', 'rou_kun@yahoo.com', '2023-10-03 22:35:49', '$2y$10$7ZyxTsIA4Db8p0BTUoHNJeXK9LxgKlFnt9MuEA/wT.4Reh.fzpiP.', 'user', NULL, '2023-10-03 22:35:03', '2023-10-03 22:35:49'),
(25, 15, 'Thirdy  Monte', 'thirde@yahoo.com', '2023-10-28 04:59:57', '$2y$10$WT.Gwe3rnuU9HnQqU5RIZuBkNFmd1VWa6Jg8w21HpLvaSt.L0Txnq', 'client', NULL, '2023-10-28 04:59:57', '2023-10-28 04:59:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archivedbilling`
--
ALTER TABLE `archivedbilling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD UNIQUE KEY `file_idID` (`file_idID`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recentlyadded`
--
ALTER TABLE `recentlyadded`
  ADD PRIMARY KEY (`ra_id`);

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
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recentlyadded`
--
ALTER TABLE `recentlyadded`
  MODIFY `ra_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
