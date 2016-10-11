-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2016 at 02:30 AM
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
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `subject` varchar(128) NOT NULL,
  `messages` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(128) NOT NULL,
  `site_email` varchar(128) NOT NULL,
  `email_verification_subject` varchar(128) NOT NULL,
  `email_verification_template` text NOT NULL,
  `footer_text` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_email`, `email_verification_subject`, `email_verification_template`, `footer_text`, `created`, `modified`) VALUES
(1, 'Cake Admin', 'cakeadmin@gmail.com', 'Signup Confirmation', '<table width="100%"> 	<thead> 		<tr> 			<th>1</th> 			<th>2</th> 			<th>3</th> 			<th>4</th> 			<th>5</th> 		</tr> 	</thead> 	<tbody> 		<tr> 			<th>1</th> 			<th>2</th> 			<th>3</th> 			<th>4</th> 			<th>5</th> 		</tr> 	</tbody> </table>', 'Footer demo text', '2016-09-13 09:17:45', '2016-09-14 19:12:44');

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
  `password_recover_token` varchar(128) DEFAULT '0',
  `email_verified` tinyint(1) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `first_name`, `last_name`, `username`, `email`, `password`, `designation`, `photo`, `sidebar_profile_photo`, `sidebar_expand`, `phone`, `address`, `website`, `verification_token`, `password_recover_token`, `email_verified`, `active`, `created`, `modified`) VALUES
(13, 1, 'Sumon', 'Sarker', 'administrator', 'sumoncpp@gmail.com', '$2y$10$XDtpvFouPYfR/.lJ/bbs/uIhM1H.RgCtQDqeYyNSpJ48hNfXowXPi', 'Software Engineer', 'user.png', 1, 0, '+8801920025943', 'Dhaka, Bangladesh', 'http://sumonsarker.com', 'none', '76dd8414fbb34395436faa80e4287e6966b3eac4', 1, 1, '2016-09-11 10:31:57', '2016-09-30 16:34:19'),
(14, 2, 'Tarikul', 'Islam', 'islm90', 'islm90@gmail.com', '$2y$10$Y6cRzMffY4RpgfVxbXG.DOoZdhZVxSdUsSOnmfwQckHIpwxZ0I5vq', 'Software Engineer', 'user.png', 1, 1, '+8801920025943', 'Dhaka, Bangladesh', 'http://sumonsarker.com', 'none', '0', 0, 1, '2016-09-11 14:18:59', '2016-09-13 17:35:30'),
(16, 3, 'Imam', 'Hossain', 'imamhossain', 'guest@gmail.com', '$2y$10$KuKHejEEiaE2JOV9NNrAZOqHfKWzE3L7p4whGiJKalveqZua9UTKC', 'Web Developer', 'user.png', 1, 1, '+8801920025943', 'Dhaka, Bangladesh', '', NULL, '0', 0, 1, '2016-09-13 11:50:18', '2016-09-15 14:25:51'),
(17, 2, 'Signup 1', 'User', NULL, 'signup@gmail.com', '$2y$10$MBNpz1FJrHp6kRsocnXt6elwaRTEaUKGrA7yl5t.D7vAPjvvbu5lO', NULL, 'user.png', 1, 1, NULL, NULL, NULL, NULL, '0', 0, 1, '2016-09-14 10:02:12', '2016-09-14 10:02:12'),
(18, 2, 'Signup 2', 'User', NULL, 'signup2@gmail.com', '$2y$10$cmW7zn988irFNEGOMoPlaek9r3Z0aaldzqVrEUewZKzjLhJzYD/ya', NULL, 'user.png', 1, 1, NULL, NULL, NULL, NULL, '0', 0, 1, '2016-09-14 10:03:07', '2016-09-14 10:03:07'),
(19, 2, 'Signup', 'User', 'signupuser', 'signup3@gmail.com', '$2y$10$YpOJI85xzON24WWxw4K8HetfUaHMtj78n9GI3VaAPQUQGW8/VUCs2', 'Software Engineer', 'user.png', 1, 1, '0192', 'Dhaka Bangladesh', '', NULL, '0', 0, 1, '2016-09-14 10:03:48', '2016-09-25 08:04:39'),
(20, 1, 'Hello', 'World', NULL, 'signupadmin@gmail.com', '$2y$10$oyzvLmWMMZnqapMYSWdXbucbA3aUJQBSruEKSOeHRWTPSfkkALzK2', NULL, 'user.png', 1, 1, NULL, NULL, NULL, NULL, '0', 0, 1, '2016-09-25 09:34:11', '2016-09-25 09:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `plugin_prefix` varchar(32) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Only for admin',
  `allow_registration` tinyint(1) NOT NULL DEFAULT '0',
  `email_verification` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `plugin_prefix`, `allow_registration`, `email_verification`, `created`, `modified`) VALUES
(1, 'Administrator', 'administrator', 0, 0, '2016-08-14 17:13:51', '2016-09-14 10:47:10'),
(2, 'User', NULL, 1, 0, '2016-08-14 17:13:51', '2016-09-14 10:36:29'),
(3, 'Guest', NULL, 0, 1, '2016-09-12 19:30:57', '2016-09-12 19:30:57'),
(4, 'Subscriber', NULL, 1, 1, '2016-09-14 10:15:16', '2016-09-14 10:15:49'),
(5, 'Author', NULL, 0, 1, '2016-09-14 10:15:58', '2016-09-14 10:15:58'),
(7, 'Editor', NULL, 0, 0, '2016-09-30 17:29:41', '2016-09-30 17:29:41');

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1616;
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
