-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 10:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eman', 'eman', 'eman@gmail.com', NULL, '$2y$10$ZIMNOpLHJJMOFYX/vjAajO3/rBOxvIrAUCLYd1quwAGJmhC8M4BiS', NULL, '2022-04-09 19:30:47', '2022-04-09 19:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age_from` int(11) NOT NULL,
  `age_to` int(11) NOT NULL,
  `publishing_year` date NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `age_from`, `age_to`, `publishing_year`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 'The Atlas Six by Olivie Blake', 'Why You’ll Love It: After becoming a BookTok sensation in the summer of 2021, The Atlas Six is getting a newly revised hardcover rerelease to hype everyone up for the arrival of its sequel The Atlas Paradox later this year. And if you missed the memo on this story the first time now is your chance to catch up. Blake’s novel has a little bit of everything: dark academia vibes, hot magicians, secret societies, a twisty plot, and an array of diverse, intriguing characters at its center. Get in on it now before the already commissioned Amazon series arrives. \r\nPublisher’s Description: The Alexandrian Society is a secret society of magical academicians, the best in the world. Their members are caretakers of lost knowledge from the greatest civilizations of antiquity. And those who earn a place among their number will secure a life of wealth, power, and prestige beyond their wildest dreams. Each decade, the world’s six most uniquely talented magicians are selected for initiation – and here are the chosen few…\r\n- Libby Rhodes and Nicolás Ferrer de Varona: inseparable enemies, cosmologists who can control matter with their minds.\r\n- Reina Mori: a naturalist who can speak the language of life itself.\r\n- Parisa Kamali: a mind reader whose powers of seduction are unmatched.\r\n- Tristan Caine: the son of a crime kingpin who can see the secrets of the universe.\r\n- Callum Nova: an insanely rich pretty boy who could bring about the end of the world. He need only ask.\r\nWhen the candidates are recruited by the mysterious Atlas Blakely, they are told they must spend one year together to qualify for initiation. During this time, they will be permitted access to the Society’s archives and judged on their contributions to arcane areas of knowledge. Five, they are told, will be initiated. One will be eliminated. If they can prove themselves to be the best, they will survive. Most of them.', 10, 25, '2021-01-23', 21, '2022-05-23 13:26:23', '2022-05-23 13:26:23'),
(5, 'Gallant by V.E. Schwab', 'Why You’ll Love It: V.E. Schwab’s haunting new young adult fantasy about a young girl’s search for the home she’s always wanted is a lush, diamond-sharp bit of horror writing, with beautiful visuals, incredible worldbuilding, and a charmingly offbeat found family at its core. The incorporation of different forms of communication—Olivia speaks to others in sign language and the writings and drawings left behind in a journal are all she has left of either of her parents—is incredibly creative, and the spooky, shadow-filled setting is impeccably rendered throughout.\r\nPublisher’s Description: Olivia Prior has grown up in Merilance School for girls, and all she has of her past is her mother’s journal—which seems to unravel into madness. Then, a letter invites Olivia to come home—to Gallant. Yet when Olivia arrives, no one is expecting her. But Olivia is not about to leave the first place that feels like home, it doesn’t matter if her cousin Matthew is hostile or if she sees half-formed ghouls haunting the hallways.\r\nOlivia knows that Gallant is hiding secrets, and she is determined to uncover them. When she crosses a ruined wall at just the right moment, Olivia finds herself in a place that is Gallant—but not. The manor is crumbling, the ghouls are solid, and a mysterious figure rules over all. Now Olivia sees what has unraveled generations of her family, and where her father may have come from.', 15, 35, '2020-05-27', 21, '2022-05-27 15:56:47', '2022-05-27 15:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `book_comments`
--

CREATE TABLE `book_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_comments`
--

INSERT INTO `book_comments` (`id`, `text`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(10, 'Test', 2, 4, '2022-05-27 16:37:07', '2022-05-27 16:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `book_favorites`
--

CREATE TABLE `book_favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit_levels_of_sub_categories` smallint(6) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `limit_levels_of_sub_categories`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ram 17GBtrhrft', 2, 1, '2022-03-12 21:56:47', '2022-05-23 12:23:10'),
(2, 'Eman', 1, 0, '2022-03-18 14:33:44', '2022-03-18 14:33:44'),
(4, 'Read Book', 1, 0, '2022-03-18 14:35:13', '2022-04-11 18:52:41'),
(10, 'Art', 2, 1, '2022-05-23 18:23:42', '2022-05-23 18:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(8, 'Test Comment', 2, 6, '2022-05-17 18:39:42', '2022-05-17 18:39:42'),
(9, 'Eman Test', 2, 6, '2022-05-17 18:40:16', '2022-05-17 18:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `filename`, `path`, `group`, `media_type`, `type_id`, `created_at`, `updated_at`) VALUES
(2, '16528136091094422681835.png', 'uploads/posts/2', 'main', 'App\\Models\\Post', 2, '2022-05-17 15:53:29', '2022-05-17 15:53:29'),
(3, '16528151921475524391740.jpg', 'uploads/posts/3', 'main', 'App\\Models\\Post', 3, '2022-05-17 16:19:52', '2022-05-17 16:19:52'),
(7, '1652823405401722078555.png', 'uploads/posts/6', 'main', 'App\\Models\\Post', 6, '2022-05-17 18:36:45', '2022-05-17 18:36:45'),
(12, '16533231833294138552250.png', 'uploads/book/4', 'main', 'App\\Models\\Book', 4, '2022-05-23 13:26:23', '2022-05-23 13:26:23'),
(13, '16534191551715757112335.jpg', 'uploads/posts/9', 'main', 'App\\Models\\Post', 9, '2022-05-24 16:05:55', '2022-05-24 16:05:55'),
(15, '16536778072763727692775.jpg', 'uploads/book/5', 'main', 'App\\Models\\Book', 5, '2022-05-27 15:56:47', '2022-05-27 15:56:47');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_03_02_213413_create_admin_table', 1),
(11, '2022_03_02_215846_create_category_table', 2),
(12, '2022_03_02_220225_create_book_table', 2),
(14, '2022_03_08_211134_create_rating_table', 3),
(18, '2022_03_08_213350_create_reed_book_now_table', 4),
(19, '2022_03_08_213442_create_reed_book_table', 4),
(20, '2022_03_08_213531_create_finsh_reed_book_table', 4),
(22, '2022_04_12_215102_create_books_table', 5),
(23, '2022_04_11_205529_create_sub_categories_table', 6),
(24, '2022_05_17_155652_create_posts_table', 7),
(25, '2022_05_17_155850_create_media_table', 7),
(26, '2022_05_17_203135_create_comments_table', 8),
(27, '2022_05_26_173152_create_book_comments_table', 9),
(28, '2022_05_26_194011_create_book_favorites_table', 10);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 'Test Description For Post', 2, '2022-05-17 18:36:45', '2022-05-17 18:36:45'),
(9, 'rthrth cgbdbfgbdfg dfg', 2, '2022-05-24 16:05:55', '2022-05-24 16:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `number_rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `book_id`, `number_rating`, `created_at`, `updated_at`) VALUES
(2, 2, 4, 5, '2022-05-27 08:25:17', '2022-05-27 15:26:42'),
(3, 2, 5, 1, '2022-05-27 15:58:54', '2022-05-27 15:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_id` bigint(20) UNSIGNED NOT NULL,
  `level` smallint(6) NOT NULL DEFAULT 1,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `main_id`, `level`, `parent_id`, `created_at`, `updated_at`) VALUES
(20, 'Test', 1, 1, NULL, '2022-05-23 12:23:03', '2022-05-23 16:30:23'),
(21, 'Loai', 1, 2, 20, '2022-05-23 12:23:10', '2022-05-23 12:23:10'),
(22, 'Ram 17GB', 1, 2, 20, '2022-05-23 18:03:56', '2022-05-23 18:03:56'),
(23, 'Malle', 1, 2, 20, '2022-05-23 18:04:01', '2022-05-23 18:04:01'),
(24, 'رعب', 10, 1, NULL, '2022-05-23 18:24:07', '2022-05-23 18:24:07'),
(25, 'درامى', 10, 1, NULL, '2022-05-23 18:24:30', '2022-05-23 18:24:45'),
(26, 'دراما', 10, 2, 24, '2022-05-23 18:25:11', '2022-05-23 18:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `email_verified_at`, `password`, `birth_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Eman2', 'Eman2', 'Eman@gmail.com', NULL, '$2y$10$72tGlP9WtwzL1VccN2jzGOAkV0SN2R2jSZXGaASE45.lTJoWzvaWG', '2022-03-13', NULL, '2022-03-29 18:43:52', '2022-05-24 16:24:34'),
(3, 'User', 'User1', 'User@gmail.com', NULL, '$2y$10$xVpA69XPdTl916.JnlFgsuoL6sfDsbpGcaplRWkyPG1W/xvDYTqb.', '1999-01-24', NULL, '2022-05-24 14:35:31', '2022-05-24 14:35:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_category_id_index` (`category_id`);

--
-- Indexes for table `book_comments`
--
ALTER TABLE `book_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_comments_user_id_index` (`user_id`),
  ADD KEY `book_comments_book_id_index` (`book_id`);

--
-- Indexes for table `book_favorites`
--
ALTER TABLE `book_favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_favorites_user_id_index` (`user_id`),
  ADD KEY `book_favorites_book_id_index` (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_index` (`user_id`),
  ADD KEY `comments_post_id_index` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_index` (`user_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_user_id_index` (`user_id`),
  ADD KEY `rating_book_id_index` (`book_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_main_id_index` (`main_id`),
  ADD KEY `sub_categories_parent_id_index` (`parent_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_comments`
--
ALTER TABLE `book_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_favorites`
--
ALTER TABLE `book_favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_comments`
--
ALTER TABLE `book_comments`
  ADD CONSTRAINT `book_comments_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_favorites`
--
ALTER TABLE `book_favorites`
  ADD CONSTRAINT `book_favorites_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_main_id_foreign` FOREIGN KEY (`main_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
