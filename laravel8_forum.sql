-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 02:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel8_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `content`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 2, 'vscode memang bagus!', 9, 'App\\Models\\Forum', '2020-11-28 04:26:33', '2020-11-28 04:26:33'),
(2, 3, 'Ya aku juga udah pake', 9, 'App\\Models\\Forum', '2020-11-28 04:35:17', '2020-11-28 04:35:17'),
(3, 1, 'Iya, soalnya banyak extensions nya,', 9, 'App\\Models\\Forum', '2020-11-28 04:38:37', '2020-11-28 04:38:37'),
(4, 5, 'wah enak banget kayanya..', 4, 'App\\Models\\Forum', '2020-11-28 14:04:43', '2020-11-28 14:04:43'),
(6, 2, 'mantap banget', 2, 'App\\Models\\Comment', '2020-11-29 07:38:03', '2020-11-29 07:38:03'),
(7, 2, 'iya aku juga udah pindah ke vscode', 9, 'App\\Models\\Forum', '2020-11-29 07:40:01', '2020-11-29 07:40:01'),
(8, 2, 'terima kasih tipsnya', 11, 'App\\Models\\Forum', '2020-11-29 07:42:40', '2020-11-29 07:42:40'),
(9, 1, 'sama2', 8, 'App\\Models\\Comment', '2020-11-29 07:44:13', '2020-11-29 07:44:13'),
(10, 2, 'iya, bisa mempermudah kita dalam menulis kode', 3, 'App\\Models\\Comment', '2020-11-29 07:49:47', '2020-11-29 07:49:47'),
(11, 1, 'ya benar, sangat membantu ya', 1, 'App\\Models\\Comment', '2020-11-29 13:06:26', '2020-11-29 13:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `counterables`
--

CREATE TABLE `counterables` (
  `id` int(10) UNSIGNED NOT NULL,
  `counterable_id` int(10) UNSIGNED NOT NULL,
  `counterable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter_id` int(10) UNSIGNED NOT NULL,
  `value` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counterables`
--

INSERT INTO `counterables` (`id`, `counterable_id`, `counterable_type`, `counter_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 11, 'App\\Models\\Forum', 1, 71, NULL, NULL),
(2, 9, 'App\\Models\\Forum', 1, 30, NULL, NULL),
(3, 8, 'App\\Models\\Forum', 1, 2, NULL, NULL),
(4, 6, 'App\\Models\\Forum', 1, 3, NULL, NULL),
(5, 5, 'App\\Models\\Forum', 1, 7, NULL, NULL),
(6, 4, 'App\\Models\\Forum', 1, 0, NULL, NULL),
(7, 3, 'App\\Models\\Forum', 1, 0, NULL, NULL),
(8, 7, 'App\\Models\\Forum', 1, 0, NULL, NULL),
(9, 2, 'App\\Models\\Forum', 1, 19, NULL, NULL),
(10, 1, 'App\\Models\\Forum', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_value` double NOT NULL DEFAULT 0,
  `value` double NOT NULL DEFAULT 0,
  `step` double NOT NULL DEFAULT 1,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `key`, `name`, `initial_value`, `value`, `step`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'number_of_visitors', 'Visitors', 0, 0, 1, NULL, '2020-11-29 09:13:36', '2020-11-29 09:13:36');

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
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `user_id`, `title`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Forum pertama gian belajar', 'forum-pertama-gian-belajar', '<p>Deskripsi forum pertama</p>', 'images/forums/w3Xhpc3xdjWQ9ddZhsgFma3sRyUvngjcGcAceOHwMugs52ZaJg.jpeg', '2020-11-22 14:43:29', '2020-11-26 09:06:56'),
(3, 3, 'Forum dina', 'forum-dina', 'deskripsi forum dina', NULL, '2020-11-23 04:47:45', '2020-11-23 04:47:45'),
(4, 3, 'forum dina yang kedua', 'forum-dina-yang-kedua', 'Yuuk cobain ramen yang lezat!', 'images/forums/4Wdc6jnWoduYHSFPpaFoxoWbKIhGEHDFX772MApgyeJ6x2L4Og.jpeg', '2020-11-23 04:59:31', '2020-11-23 05:07:40'),
(6, 2, 'belajar membuat website', 'belajar-membuat-website', 'mari kita belajar membuat website mulai dari dasar', 'images/forums/dWdoasmAtM0bO9EDFICPkZBJPnxbxUQSwZ0i0JMumaSwnxLBhb.jpeg', '2020-11-23 07:08:17', '2020-11-23 07:08:17'),
(8, 1, 'instal xampp windows', 'instal-xampp-windows', '<p>cara menginstal xampp di windows</p>', 'images/forums/4Dm0p3IUT9YpMe6QsWhsiVyjttFZl0lqgnPxrSUsVWRhXWlurP.jpeg', '2020-11-25 09:43:09', '2020-11-25 09:47:47'),
(9, 1, 'install vscode m', 'install-vscode-m', '<p>install vscode di windows m</p>', 'images/forums/l2JDma1lnJ23MCm8TBtr1KZ5BHpdslgAeYVL6jTwUOXujTNlEW.jpeg', '2020-11-25 09:53:11', '2020-11-25 09:53:49'),
(11, 1, 'install font awesome', 'install-font-awesome', '<p>cara menginstal font awesome di node_modules</p>', 'images/forums/F91zD74q630tGFsE17M455hlBlDYaYcbzoW5mSXGyPtduaOGyg.jpeg', '2020-11-26 09:02:03', '2020-12-02 03:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `forum_tag`
--

CREATE TABLE `forum_tag` (
  `forum_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum_tag`
--

INSERT INTO `forum_tag` (`forum_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(6, 1),
(6, 2),
(8, 4),
(8, 8),
(9, 2),
(9, 6);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_22_121558_create_forums_table', 1),
(5, '2020_11_23_134605_create_tags_table', 2),
(6, '2020_11_23_134656_create_forum_tag_table', 2),
(7, '2020_11_28_110300_create_comments_table', 3),
(8, '0000_00_00_000000_create_counters_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 'php', '2020-11-23 06:57:50', '2020-11-23 06:57:50'),
(2, 'Javascript ES2015', 'javascript', '2020-11-23 06:57:50', '2020-12-01 14:20:41'),
(3, 'Error Handling', 'error-handling', '2020-11-24 01:12:56', '2020-11-24 01:12:56'),
(4, 'Backend', 'backend', '2020-11-24 01:12:56', '2020-11-24 01:12:56'),
(5, 'Frontend', 'frontend', '2020-11-24 01:15:07', '2020-11-24 01:15:07'),
(6, 'Web Programming', 'web-programming', '2020-11-24 01:15:07', '2020-11-24 01:15:07'),
(7, 'Mobile Programming', 'mobile-programming', '2020-11-24 01:15:07', '2020-11-24 01:15:07'),
(8, 'Database', 'database', '2020-11-24 01:15:07', '2020-11-24 01:15:07');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gian Nurwana', 'gian@gmail.com', NULL, '$2y$10$KkUje1x5xVigm75na6m8t.WgoJCuHkWlerUBUz61Do/1bc6xevkBG', NULL, '2020-11-22 06:25:18', '2020-11-22 06:25:18'),
(2, 'Gita Rahma', 'gita@gmail.com', NULL, '$2y$10$WBj8L2ih00BaHVDgC.gibumAGDnfqffW5wJ2LKQCLxdqCb425eRFa', NULL, '2020-11-22 06:25:41', '2020-11-22 06:25:41'),
(3, 'Dina Alenda', 'dina@gmail.com', NULL, '$2y$10$Ttd3L6JLgrCj.AMmHts9eeSJqR2sV3iKylAb6YOM2RhZSz6kQVkfO', NULL, '2020-11-23 03:49:25', '2020-11-23 03:49:25'),
(4, 'lukman hudzaifah', 'lukman@gmail.com', NULL, '$2y$10$TSA/c4T3xad.m1AfOspJVeJlfiJGUXwKYcGwLVDdXl5A7rZD2.BVS', NULL, '2020-11-28 13:57:32', '2020-11-28 13:57:32'),
(5, 'fajri dwi', 'fajri@gmail.com', NULL, '$2y$10$rXR4CePzL5M1VR7e5Op5jOP66XDuEUvW1OnQNGenHO4v9BGPtKqUq', NULL, '2020-11-28 13:58:00', '2020-11-28 13:58:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `counterables`
--
ALTER TABLE `counterables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `counters_key_unique` (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forums_user_id_foreign` (`user_id`);

--
-- Indexes for table `forum_tag`
--
ALTER TABLE `forum_tag`
  ADD PRIMARY KEY (`forum_id`,`tag_id`),
  ADD KEY `forum_tag_tag_id_foreign` (`tag_id`);

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `counterables`
--
ALTER TABLE `counterables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_tag`
--
ALTER TABLE `forum_tag`
  ADD CONSTRAINT `forum_tag_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forum_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
