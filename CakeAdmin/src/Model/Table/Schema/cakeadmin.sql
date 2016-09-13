-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2016 at 07:16 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 5.6.25-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakeadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(128) NOT NULL,
  `site_email` varchar(128) NOT NULL,
  `signup_user_group` int(11) NOT NULL,
  `footer_text` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_email`, `signup_user_group`, `footer_text`, `created`, `modified`) VALUES
(1, 'Cake Admin', 'cakeadmin@gmail.com', 0, 'Footer demo text', '2016-09-13 09:17:45', '2016-09-13 09:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `designation` varchar(128) DEFAULT NULL,
  `photo` varchar(128) NOT NULL DEFAULT 'user.png',
  `sidebar_profile_photo` tinyint(1) NOT NULL DEFAULT '1',
  `sidebar_expand` tinyint(1) NOT NULL DEFAULT '1',
  `phone` varchar(16) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `website` varchar(128) DEFAULT NULL,
  `verification_token` varchar(128) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `first_name`, `last_name`, `username`, `email`, `password`, `designation`, `photo`, `sidebar_profile_photo`, `sidebar_expand`, `phone`, `address`, `website`, `verification_token`, `email_verified`, `active`, `created`, `modified`) VALUES
(13, 1, 'Sumon', 'Sarker', 'administrator', 'sumoncpp@gmail.com', '$2y$10$XDtpvFouPYfR/.lJ/bbs/uIhM1H.RgCtQDqeYyNSpJ48hNfXowXPi', 'Software Engineer', 'user.png', 1, 0, '+8801920025943', 'Dhaka, Bangladesh', 'http://sumonsarker.com', 'none', 1, 1, '2016-09-11 10:31:57', '2016-09-13 11:58:22'),
(14, 2, 'Tarikul', 'Islam', 'islm90', 'islm90@gmail.com', '$2y$10$XDtpvFouPYfR/.lJ/bbs/uIhM1H.RgCtQDqeYyNSpJ48hNfXowXPi', 'Software Engineer', 'user.png', 0, 1, '+8801920025943', 'Dhaka, Bangladesh', 'http://sumonsarker.com', 'none', 0, 1, '2016-09-11 14:18:59', '2016-09-12 16:57:47'),
(16, 3, 'Guest', 'User', 'guest', 'guest@gmail.com', '$2y$10$XDtpvFouPYfR/.lJ/bbs/uIhM1H.RgCtQDqeYyNSpJ48hNfXowXPi', 'Web Developer', 'user.png', 1, 1, '+8801920025943', 'Dhaka, Bangladesh', '', NULL, 0, 1, '2016-09-13 11:50:18', '2016-09-13 12:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `plugin_prefix` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `allow_registration` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `plugin_prefix`, `allow_registration`, `created`, `modified`) VALUES
(1, 'Administrator', 'administrator', 0, '2016-08-14 17:13:51', '2016-09-13 12:06:44'),
(2, 'User', NULL, 1, '2016-08-14 17:13:51', '2016-09-12 11:10:28'),
(3, 'Guest', NULL, 0, '2016-09-12 19:30:57', '2016-09-12 19:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_permissions`
--

CREATE TABLE `user_group_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `controller` varchar(64) CHARACTER SET utf8 NOT NULL,
  `action` varchar(128) CHARACTER SET utf8 NOT NULL,
  `allowed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user` (`username`),
  ADD KEY `mail` (`email`),
  ADD KEY `user_group_id` (`user_group_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_group_id` (`user_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`id`);

--
-- Constraints for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  ADD CONSTRAINT `user_group_permissions_ibfk_1` FOREIGN KEY (`user_group_id`) REFERENCES `user_groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
