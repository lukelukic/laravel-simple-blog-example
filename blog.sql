-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 05:55 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `content`, `user_id`, `post_id`) VALUES
(2, '2018-02-20 14:52:52', '2018-02-20 14:53:04', 'Komentarrrrr', 1, 3),
(3, '2018-02-20 14:57:50', '2018-02-20 14:58:07', 'komentar', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_id` int(10) UNSIGNED NOT NULL
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
(1, '2018_01_31_221413_create_pictures_table', 1),
(2, '2018_01_31_221518_create_roles_table', 1),
(3, '2018_01_31_221620_create_gallery_table', 1),
(4, '2018_01_31_221647_create_navigation_table', 1),
(5, '2018_01_31_221802_create_users_table', 1),
(6, '2018_01_31_221859_create_posts_table', 1),
(7, '2018_01_31_221924_create_comments_table', 1),
(8, '2018_01_31_222045_create_social_networks_table', 1),
(9, '2018_01_31_224534_create_visits_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(10) UNSIGNED NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `route`, `name`, `position`) VALUES
(1, '/', 'Home', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `created_at`, `updated_at`, `file`, `alt`) VALUES
(1, '2018-02-16 13:52:41', '2018-02-16 13:52:41', 'images/posts/1518792761_post3.jpg', 'blog post'),
(2, '2018-02-16 13:54:16', '2018-02-16 13:54:16', 'images/posts/1518792856_post5.jpg', 'blog post'),
(4, '2018-02-16 14:03:45', '2018-02-16 14:03:45', 'images/posts/1518793425_post1.jpg', 'blog post'),
(5, '2018-02-16 14:04:32', '2018-02-16 14:04:32', 'images/posts/1518793472_post4.jpg', 'blog post');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `content`, `description`, `picture_id`, `user_id`) VALUES
(1, NULL, '2018-02-16 14:00:54', 'Naslov', '<h3>Podnaslov</h3><p>Tekstualni deo.</p><ul><li>Element liste 1</li><li>Element liste 2</li><li>Element liste 3</li><li>Element liste 4<br></li></ul><p><br></p>', 'Tekstualni opis posta proba 100 karaktera', 2, 1),
(2, '2018-02-16 15:01:38', '2018-02-16 14:03:45', 'Title', '<p>Sadrzaj<br></p>', 'Opis dugacak bar 10 karaktera', 4, 1),
(3, '2018-02-16 15:04:32', '2018-02-16 15:04:32', 'NaslovPosta', '<p>Sadrzajposta<br></p>', 'Opis posta', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, '2018-02-15 23:00:00', '2018-02-15 23:00:00', 'user'),
(2, '2018-02-15 23:00:00', '2018-02-15 23:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `social_networks`
--

CREATE TABLE `social_networks` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_networks`
--

INSERT INTO `social_networks` (`id`, `icon`, `name`, `url`) VALUES
(1, 'facebook', 'Facebook', 'http://www.facebook.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`created_at`, `updated_at`, `id`, `username`, `email`, `password`, `first_name`, `last_name`, `role_id`) VALUES
('2018-02-16 01:47:18', '2018-02-16 01:47:18', 1, 'luke', 'lukeelukic@gmail.com', 'ce635f9aa9631c7286cd13b5ed9cfc10', 'Luka', 'Lukic', 2);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `visited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `visited_at`, `ip`, `post_id`) VALUES
(1, '2018-02-16 14:55:25', '::1', 1),
(2, '2018-02-16 15:01:53', '::1', 2),
(3, '2018-02-16 15:03:04', '::1', 2),
(4, '2018-02-16 15:03:06', '::1', 2),
(5, '2018-02-16 15:04:07', '::1', 1),
(6, '2018-02-16 15:09:41', '::1', 3),
(7, '2018-02-16 15:09:46', '::1', 3),
(8, '2018-02-16 15:10:29', '::1', 3),
(9, '2018-02-16 15:10:30', '::1', 3),
(10, '2018-02-16 15:10:34', '::1', 3),
(11, '2018-02-16 15:10:47', '::1', 3),
(12, '2018-02-16 15:47:20', '::1', 3),
(13, '2018-02-16 15:47:22', '::1', 3),
(14, '2018-02-20 15:52:19', '::1', 3),
(15, '2018-02-20 15:52:38', '::1', 3),
(16, '2018-02-20 15:52:43', '::1', 3),
(17, '2018-02-20 15:52:52', '::1', 3),
(18, '2018-02-20 15:57:39', '::1', 3),
(19, '2018-02-20 15:57:50', '::1', 3),
(20, '2018-02-20 15:58:16', '::1', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gallery_title_unique` (`title`),
  ADD KEY `gallery_picture_id_foreign` (`picture_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `navigation_name_unique` (`name`),
  ADD UNIQUE KEY `navigation_position_unique` (`position`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pictures_file_unique` (`file`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_picture_id_foreign` (`picture_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `social_networks`
--
ALTER TABLE `social_networks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_networks_icon_unique` (`icon`),
  ADD UNIQUE KEY `social_networks_name_unique` (`name`),
  ADD UNIQUE KEY `social_networks_url_unique` (`url`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_post_id_foreign` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_picture_id_foreign` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_picture_id_foreign` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
