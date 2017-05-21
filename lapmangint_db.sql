-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2017 at 06:01 PM
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
  `mock_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `elements`
--

INSERT INTO `elements` (`id`, `entry_id`, `x`, `y`, `width`, `height`, `transition`, `gesture`, `link_to`, `mock_id`, `created_at`, `updated_at`) VALUES
(1, '1531863680177645lpqadn60jmotq1m11jkcbs0mmc.png24', 192, 334, 159, 176, 'Fade', 'Double Tap', '1531863680177645kb2kesgudt67h55qfhnl7c0ukh', '1531863680177645lpqadn60jmotq1m11jkcbs0mmc.png', NULL, NULL),
(7, '1531863680177645kb2kesgudt67h55qfhnl7c0ukh.png23', 290, 392, 159, 176, 'Default', 'Swipe Up', '1531863680177645lpqadn60jmotq1m11jkcbs0mmc', '1531863680177645kb2kesgudt67h55qfhnl7c0ukh.png', NULL, NULL),
(10, '15318636801776457ih074ji4q24gmf5telcccdmt8.png22', 204, 56, 159, 176, 'Default', 'Tap', '', '15318636801776457ih074ji4q24gmf5telcccdmt8.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_22_030856_create_projects_table', 1),
(4, '2017_04_22_030908_create_mocks_table', 1),
(5, '2017_04_22_030919_create_elements_table', 1),
(6, '2017_04_22_030939_create_comments_table', 1);

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

--
-- Dumping data for table `mocks`
--

INSERT INTO `mocks` (`id`, `entry_id`, `title`, `note`, `image`, `image_url`, `position`, `project_id`, `created_at`, `updated_at`) VALUES
(1, '1531863680177645lpqadn60jmotq1m11jkcbs0mmc.png', '1', '', '1531863680177645lpqadn60jmotq1m11jkcbs0mmc.png', NULL, 0, '15318636801776454', NULL, NULL),
(2, '1531863680177645kb2kesgudt67h55qfhnl7c0ukh.png', '123', '', '1531863680177645kb2kesgudt67h55qfhnl7c0ukh.png', NULL, 1, '15318636801776454', NULL, NULL),
(5, '15318636801776453r5ptp34gs4n6hkmqovm5geuu8.png', '222', '', '15318636801776453r5ptp34gs4n6hkmqovm5geuu8.png', NULL, 2, '15318636801776454', NULL, NULL),
(13, '15318636801776457ih074ji4q24gmf5telcccdmt8.png', 'er', '', '15318636801776457ih074ji4q24gmf5telcccdmt8.png', NULL, 0, '15318636801776453', NULL, NULL),
(17, '102735194769734852276cbj2hsgvurcjkadpsc89518538.png', 'test', '', '102735194769734852276cbj2hsgvurcjkadpsc89518538.png', NULL, 0, '1027351947697348522762', NULL, NULL),
(18, '102735194769734852276fpp0rkpdeggjiuikd68r8d3m0d.png', 'test', '', '102735194769734852276fpp0rkpdeggjiuikd68r8d3m0d.png', NULL, 1, '1027351947697348522762', NULL, NULL),
(23, '15318636801776451f6ob46caia2c2871fj1c7juaa.png', 'er', '', '15318636801776451f6ob46caia2c2871fj1c7juaa.png', NULL, 3, '15318636801776454', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `entry_id`, `title`, `description`, `width`, `height`, `orientation`, `poster`, `poster_url`, `is_public`, `list_user_shares`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '15318636801776454', 'First Project', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 768, 1196, 'portrait', '1531863680177645s.png', '', 0, NULL, 127, NULL, NULL),
(17, '15318636801776453', 'dsadsads', '', 768, 1196, 'portrait', '1531863680177645dsa.png', '', 0, NULL, 127, NULL, NULL),
(19, '1027351947697348522762', 'Project', 'hello', 1080, 1920, 'portrait', '102735194769734852276Project.png', '', 0, NULL, 129, NULL, NULL);

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
(117, 'Nguyen Thanh Tuan', NULL, NULL, '104294793340564718599', '7c9jYGXx21NguXofXbvWU8kDO4apW0sALNu5ZzQsd1f8mjHvbVdBqWbnnbzigpSGU18YKEdj6HDVvmz6szXBYRk85rHiOX0VHMIL', NULL, NULL),
(120, 'Nguyá»…n Thanh Tuáº¥n', NULL, NULL, '1374273495952563', 'EAAJlW1eYFUkBADurOfFGmeMx5CEi3ckEeZB033ffZCmt70vSUuO70gKgIJWObRB9HQbrzB32S4ySO5qyuoOJDlkGWJQslxEZANZAFDkpsprujtEFeYR4Sdag1gP5KHik3qCfximC7OBSMPue1IGveSu43ZCORLha3kFYxn6RraeAz57W2JMPMyIAWZATlppACsUekHVn1hjgZDZD', NULL, NULL),
(127, 'Tuáº¥n', NULL, NULL, '1531863680177645', 'EAAJlW1eYFUkBABfVmJxhhjYl2HXPoU1VAuMhlZBUWdl5Ygxp6sMzEhC6GcFbyuLQ49tdxi8W0rQiZAYNvM16M0AY8i2hEcBebhL2fYwFHYZChtdiKPq6FMSZBJ1ZAED14fT5ylAQW2StR8EzXisi4nOo0I0MzXkQWjA09Nff8SzbZBEWdg5IyIWAxjfwZBZB2WAZD', NULL, NULL),
(129, 'Thanh Tuáº¥n', NULL, NULL, '102735194769734852276', 'siaZQwMRw4OXAGDlfM4FPnmBaN1S9E3FL9L1i9K2tLjwfwDzOmoleURRXkjRGSN2ClVHAoPP6IEDMBdTjbj3gHyLDJ58nUdnR0CQ', NULL, NULL);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mocks`
--
ALTER TABLE `mocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mocks_entry_id_unique` (`entry_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `elements`
--
ALTER TABLE `elements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mocks`
--
ALTER TABLE `mocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
