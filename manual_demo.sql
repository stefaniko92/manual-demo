-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 10:51 PM
-- Server version: 5.7.23
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manual_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `text`, `sort_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'No', 0, '2024-06-18 12:51:47', '2024-06-18 12:51:47', NULL),
(2, 1, 'Yes', 0, '2024-06-18 12:52:23', '2024-06-18 12:52:23', NULL),
(4, 2, 'Viagra or Sildenafil', 0, '2024-06-18 13:09:03', '2024-06-18 13:09:03', NULL),
(5, 2, 'Cialis or Tadalafil', 0, '2024-06-18 13:09:33', '2024-06-18 13:09:33', NULL),
(6, 2, 'Both', 0, '2024-06-18 13:09:49', '2024-06-18 13:09:49', NULL),
(7, 2, 'None of the above', 0, '2024-06-18 13:11:01', '2024-06-18 13:11:01', NULL),
(8, 3, 'Yes', 0, '2024-06-18 13:11:57', '2024-06-18 13:11:57', NULL),
(9, 3, 'No', 0, '2024-06-18 13:13:05', '2024-06-18 13:13:05', NULL),
(10, 4, 'Yes', 0, '2024-06-18 13:14:27', '2024-06-18 13:14:27', NULL),
(11, 4, 'No', 0, '2024-06-18 13:15:05', '2024-06-18 13:15:05', NULL),
(12, 5, 'Viagra or Sildenafil', 0, '2024-06-18 13:16:22', '2024-06-18 13:16:22', NULL),
(13, 5, 'Cialis or Tadalafil', 0, '2024-06-18 13:17:04', '2024-06-18 13:17:04', NULL),
(14, 5, 'None of the above', 0, '2024-06-18 13:17:43', '2024-06-18 13:17:43', NULL),
(15, 6, 'Yes', 0, '2024-06-18 13:17:57', '2024-06-18 13:17:57', NULL),
(16, 6, 'No', 0, '2024-06-18 13:18:21', '2024-06-18 13:18:21', NULL),
(17, 7, 'Significant liver problems (such as cirrhosis of the liver) or kidney problems', 0, '2024-06-18 13:18:57', '2024-06-18 13:18:57', NULL),
(18, 7, 'Currently prescribed GTN, Isosorbide mononitrate, Isosorbide dinitrate , Nicorandil (nitrates) or Rectogesic ointment', 0, '2024-06-18 13:19:19', '2024-06-18 13:19:19', NULL),
(19, 7, 'Abnormal blood pressure (lower than 90/50 mmHg or higher than 160/90 mmHg)', 0, '2024-06-18 13:19:43', '2024-06-18 13:19:43', NULL),
(20, 7, 'Condition affecting your penis (such as Peyronie\'s Disease, previous injuries or an inability to retract your foreskin)', 0, '2024-06-18 13:20:06', '2024-06-18 13:20:06', NULL),
(21, 7, 'I don\'t have any of these conditions', 0, '2024-06-18 13:20:16', '2024-06-18 13:20:16', NULL),
(22, 8, 'Alpha-blocker medication such as Alfuzosin, Doxazosin, Tamsulosin, Prazosin, Terazosin or over-the-counter Flomax', 0, '2024-06-18 13:20:39', '2024-06-18 13:20:39', NULL),
(23, 8, 'Riociguat or other guanylate cyclase stimulators (for lung problems)', 0, '2024-06-18 13:20:56', '2024-06-18 13:20:56', NULL),
(24, 8, 'Saquinavir, Ritonavir or Indinavir (for HIV)', 0, '2024-06-18 13:21:16', '2024-06-18 13:21:16', NULL),
(25, 8, 'Cimetidine (for heartburn)', 0, '2024-06-18 13:21:34', '2024-06-18 13:21:34', NULL),
(26, 8, 'I don\'t take any of these drugs', 0, '2024-06-18 13:21:41', '2024-06-18 13:21:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `answer_behaviours`
--

CREATE TABLE `answer_behaviours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer_id` bigint(20) UNSIGNED NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer_behaviours`
--

INSERT INTO `answer_behaviours` (`id`, `answer_id`, `subject_type`, `subject_id`, `action`, `created_at`, `updated_at`) VALUES
(2, 4, 'App\\Models\\Question', 3, 'navigate', '2024-06-18 13:09:03', '2024-06-18 13:09:03'),
(3, 5, 'App\\Models\\Question', 4, 'navigate', '2024-06-18 13:09:33', '2024-06-18 13:09:33'),
(4, 6, 'App\\Models\\Question', 5, 'navigate', '2024-06-18 13:09:49', '2024-06-18 13:09:49'),
(5, 7, 'App\\Models\\Product', 1, 'recommend', '2024-06-18 13:11:01', '2024-06-18 13:11:01'),
(6, 7, 'App\\Models\\Product', 3, 'recommend', '2024-06-18 13:11:01', '2024-06-18 13:11:01'),
(7, 8, 'App\\Models\\Product', 1, 'recommend', '2024-06-18 13:11:57', '2024-06-18 13:11:57'),
(8, 9, 'App\\Models\\Product', 2, 'recommend', '2024-06-18 13:13:05', '2024-06-18 13:13:05'),
(9, 10, 'App\\Models\\Product', 3, 'recommend', '2024-06-18 13:14:27', '2024-06-18 13:14:27'),
(10, 11, 'App\\Models\\Product', 4, 'recommend', '2024-06-18 13:15:05', '2024-06-18 13:15:05'),
(11, 12, 'App\\Models\\Product', 4, 'recommend', '2024-06-18 13:16:22', '2024-06-18 13:16:22'),
(12, 13, 'App\\Models\\Product', 2, 'recommend', '2024-06-18 13:17:04', '2024-06-18 13:17:04'),
(13, 14, 'App\\Models\\Product', 4, 'recommend', '2024-06-18 13:17:43', '2024-06-18 13:17:43'),
(14, 14, 'App\\Models\\Product', 2, 'recommend', '2024-06-18 13:17:43', '2024-06-18 13:17:43'),
(15, 16, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:18:22', '2024-06-18 13:18:22'),
(16, 17, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:18:57', '2024-06-18 13:18:57'),
(17, 18, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:19:19', '2024-06-18 13:19:19'),
(18, 19, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:19:43', '2024-06-18 13:19:43'),
(19, 20, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:20:06', '2024-06-18 13:20:06'),
(20, 22, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:20:39', '2024-06-18 13:20:39'),
(21, 23, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:20:56', '2024-06-18 13:20:56'),
(22, 24, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:21:16', '2024-06-18 13:21:16'),
(23, 25, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:21:34', '2024-06-18 13:21:34'),
(25, 1, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 20:35:35', '2024-06-18 20:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `answer_restrictions`
--

CREATE TABLE `answer_restrictions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer_id` bigint(20) UNSIGNED NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer_restrictions`
--

INSERT INTO `answer_restrictions` (`id`, `answer_id`, `subject_type`, `subject_id`, `action`, `created_at`, `updated_at`) VALUES
(2, 8, 'App\\Models\\Product', 2, 'exclude_one', '2024-06-18 13:11:58', '2024-06-18 13:11:58'),
(3, 8, 'App\\Models\\Product', 3, 'exclude_one', '2024-06-18 13:11:58', '2024-06-18 13:11:58'),
(4, 9, 'App\\Models\\Product', 1, 'exclude_one', '2024-06-18 13:13:05', '2024-06-18 13:13:05'),
(5, 9, 'App\\Models\\Product', 4, 'exclude_one', '2024-06-18 13:13:05', '2024-06-18 13:13:05'),
(6, 10, 'App\\Models\\Product', 1, 'exclude_one', '2024-06-18 13:14:27', '2024-06-18 13:14:27'),
(7, 10, 'App\\Models\\Product', 4, 'exclude_one', '2024-06-18 13:14:27', '2024-06-18 13:14:27'),
(8, 11, 'App\\Models\\Product', 2, 'exclude_one', '2024-06-18 13:15:05', '2024-06-18 13:15:05'),
(9, 11, 'App\\Models\\Product', 3, 'exclude_one', '2024-06-18 13:15:05', '2024-06-18 13:15:05'),
(10, 12, 'App\\Models\\Product', 2, 'exclude_one', '2024-06-18 13:16:22', '2024-06-18 13:16:22'),
(11, 12, 'App\\Models\\Product', 3, 'exclude_one', '2024-06-18 13:16:22', '2024-06-18 13:16:22'),
(12, 13, 'App\\Models\\Product', 1, 'exclude_one', '2024-06-18 13:17:04', '2024-06-18 13:17:04'),
(13, 13, 'App\\Models\\Product', 4, 'exclude_one', '2024-06-18 13:17:04', '2024-06-18 13:17:04'),
(14, 16, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:18:22', '2024-06-18 13:18:22'),
(15, 17, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:18:57', '2024-06-18 13:18:57'),
(16, 18, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:19:19', '2024-06-18 13:19:19'),
(17, 19, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:19:43', '2024-06-18 13:19:43'),
(18, 20, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:20:06', '2024-06-18 13:20:06'),
(19, 22, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:20:39', '2024-06-18 13:20:39'),
(20, 23, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:20:56', '2024-06-18 13:20:56'),
(21, 24, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:21:16', '2024-06-18 13:21:16'),
(22, 25, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 13:21:34', '2024-06-18 13:21:34'),
(24, 1, 'App\\Models\\Product', NULL, 'exclude_all', '2024-06-18 20:35:35', '2024-06-18 20:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_06_14_101433_create_products_table', 2),
(5, '2024_06_14_101526_create_questionnaires_table', 2),
(6, '2024_06_14_104623_create_personal_access_tokens_table', 2),
(7, '2024_06_16_214831_create_questions_table', 3),
(8, '2024_06_16_214841_create_answers_table', 3),
(11, '2024_06_16_215009_create_answer_restrictions_table', 4),
(12, '2024_06_16_215023_create_answer_behaviours_table', 4);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sildenafil 50mg', '2024-06-17 12:54:27', '2024-06-17 12:54:27'),
(2, 'Tadalafil 20mg', '2024-06-17 12:54:53', '2024-06-17 12:54:53'),
(3, 'Tadalafil 10mg', '2024-06-17 12:55:03', '2024-06-17 12:55:03'),
(4, 'Sildenafil 100mg', '2024-06-17 12:55:16', '2024-06-17 12:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Questionnaire 1', 1, '2024-06-17 20:08:59', '2024-06-17 20:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `questionnaire_id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questionnaire_id`, `text`, `sort_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1. Do you have difficulty getting or maintaining an erection?', 0, '2024-06-17 21:41:39', '2024-06-18 12:51:25', NULL),
(2, 1, '2. Have you tried any of the following treatments before?', 0, '2024-06-18 07:11:31', '2024-06-18 12:51:31', NULL),
(3, 1, '2a. Was the Viagra or Sildenafil product you tried before effective?', 0, '2024-06-18 07:12:48', '2024-06-18 07:12:48', NULL),
(4, 1, '2b. Was the Cialis or Tadalafil product you tried before effective?', 0, '2024-06-18 07:12:55', '2024-06-18 07:12:55', NULL),
(5, 1, '2c. Which is your preferred treatment?', 0, '2024-06-18 07:13:03', '2024-06-18 07:13:03', NULL),
(6, 1, '3. Do you have, or have you ever had, any heart or neurological conditions?', 0, '2024-06-18 07:13:24', '2024-06-18 07:13:24', NULL),
(7, 1, '4. Do any of the listed medical conditions apply to you?', 0, '2024-06-18 07:13:32', '2024-06-18 07:13:32', NULL),
(8, 1, '5. Are you taking any of the following drugs?', 0, '2024-06-18 07:13:39', '2024-06-18 07:13:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kN4NDd7gmko6IjeGs6jyjwEPx3tOkObn7AZlO9n9', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUXNGcnlSb2JoSGNGeGxjWUl5dkVJV3J5aEZrUTBZQ0dnM3pkcHc1NyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9tYW51YWwtY2FzZS50ZXN0L2xvZ2luIjt9fQ==', 1718750831);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Stefan', 'manual@example.com', '2024-06-14 07:50:28', '$2y$12$u5gbvfrr1.IQ.dcnzzbCn.h/m/RNyl0aOqxWP5wXz2KFK26FfPKEK', 1, 'C4OVN0NFtypCkIcse02NIVlk2W6mNAUftiCmmu1geSn5abpafG62oYqP610d', '2024-06-14 07:50:28', '2024-06-14 07:50:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `answer_behaviours`
--
ALTER TABLE `answer_behaviours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_behaviours_answer_id_foreign` (`answer_id`);

--
-- Indexes for table `answer_restrictions`
--
ALTER TABLE `answer_restrictions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_restrictions_answer_id_foreign` (`answer_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_questionnaire_id_foreign` (`questionnaire_id`);

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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `answer_behaviours`
--
ALTER TABLE `answer_behaviours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `answer_restrictions`
--
ALTER TABLE `answer_restrictions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `answer_behaviours`
--
ALTER TABLE `answer_behaviours`
  ADD CONSTRAINT `answer_behaviours_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`);

--
-- Constraints for table `answer_restrictions`
--
ALTER TABLE `answer_restrictions`
  ADD CONSTRAINT `answer_restrictions_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_questionnaire_id_foreign` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaires` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
