-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2017 at 10:33 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapmangint_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `project_id`, `created_at`, `updated_at`) VALUES
(26, 'qw', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(27, 'gg', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(28, 'q', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(29, 'fcccc', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(30, 'dd', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(31, 's', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(32, 'test', 129, '102735194769734852276143542463280520170700', NULL, NULL),
(33, 't', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(34, 'a', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(35, 's', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(36, 'zzsz', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(37, 'z', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(38, 'jjjjj', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(39, 'a', 129, '104294793340564718599082127012280520170700', NULL, NULL),
(40, 'Ä‘áº¹p', 129, '104294793340564718599082127012280520170700', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `elements`
--

CREATE TABLE `elements` (
  `id` int(10) UNSIGNED NOT NULL,
  `entry_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `transition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gesture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mock_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mocks`
--

CREATE TABLE `mocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `entry_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `entry_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `orientation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poster_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_public` tinyint(1) NOT NULL,
  `list_user_shares` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `open_id`, `token`, `created_at`, `updated_at`) VALUES
(117, 'Nguyen Thanh Tuan', NULL, NULL, '104294793340564718599', 'uRfVFpy77Kbxs2ed8fchgxehyb3Z5km54kMJ6V98It282jl9koDMetuvQVLYYj0PXmFqNbwlKpxlcsHeGTqj1XMRXyraBcnM58fZ', NULL, NULL),
(120, 'Nguyá»…n Thanh Tuáº¥n', NULL, NULL, '1374273495952563', 'EAAJlW1eYFUkBADurOfFGmeMx5CEi3ckEeZB033ffZCmt70vSUuO70gKgIJWObRB9HQbrzB32S4ySO5qyuoOJDlkGWJQslxEZANZAFDkpsprujtEFeYR4Sdag1gP5KHik3qCfximC7OBSMPue1IGveSu43ZCORLha3kFYxn6RraeAz57W2JMPMyIAWZATlppACsUekHVn1hjgZDZD', NULL, NULL),
(127, 'Tuáº¥n', NULL, NULL, '1531863680177645', 'EAAJlW1eYFUkBABfVmJxhhjYl2HXPoU1VAuMhlZBUWdl5Ygxp6sMzEhC6GcFbyuLQ49tdxi8W0rQiZAYNvM16M0AY8i2hEcBebhL2fYwFHYZChtdiKPq6FMSZBJ1ZAED14fT5ylAQW2StR8EzXisi4nOo0I0MzXkQWjA09Nff8SzbZBEWdg5IyIWAxjfwZBZB2WAZD', NULL, NULL),
(129, 'Thanh Tuáº¥n', NULL, NULL, '102735194769734852276', 'TagDnHwBZUT3S5jaTYkprws4dA02pZ5cdQqLuhutIyzCkQ7Y1Od5jL1AI4xS7hBQVRoNK0KA052f31Qsfu4FsrT26BxL3YquyuvL', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elements`
--
ALTER TABLE `elements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `elements_entry_id_unique` (`entry_id`);

--
-- Indexes for table `mocks`
--
ALTER TABLE `mocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mocks_entry_id_unique` (`entry_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_entry_id_unique` (`entry_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `open_id` (`open_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `mocks`
--
ALTER TABLE `mocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
