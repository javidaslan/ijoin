-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2017 at 09:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ijoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `avatar`) VALUES
(1, 'Sports', '/frontend/web/store/media/avatar/13938.png'),
(2, 'Study', '/frontend/web/store/media/avatar/28_study_abroad-128.png');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `quota` int(11) NOT NULL,
  `numOfPart` int(11) DEFAULT '0',
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `lng` varchar(255) NOT NULL,
  `ltd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `category_id`, `title`, `description`, `address`, `quota`, `numOfPart`, `date`, `time`, `lng`, `ltd`) VALUES
(6, 5, 1, 'Sport', 'Test', 'here', 0, 12, '0000-00-00', NULL, '47.5863222773731', '18.97441864013672'),
(7, 5, 2, 'Sport2', 'Test2', 'Pest Side', 0, 121, '0000-00-00', NULL, '47.58519418636856', '19.09320831298828'),
(8, 5, 2, 'Sport3', 'DEsc3', 'here', 1, 10, '14-May-2017', '23:01', '47.561307394339615', '19.015960693359375'),
(9, 5, 1, 'Sport4', 'Testdesc4', 'here4', 4, 12, '14-May-2017', '12:12', '47.57772354355723', '19.016990661621094'),
(10, 5, 1, 'Sport5', 'Testdesc5', 'here 5', 15, 15, '14-May-2017', '13:31', '47.59694297313349', '19.002914428710938'),
(11, 5, 1, 'SPort 6', 'Test desc 6', 'Here', 0, 43, '14-May-2017', '12:12', '47.56730042049783', '19.10247802734375'),
(12, 5, 1, 'Sport 7', 'DEsc 7', 'Address here', 0, 12, '14-May-2017', '12:13', '47.54389874621119', '19.01081085205078'),
(13, 5, 1, 'Sport 7', 'DEsc 7', 'Address here', 0, 12, '14-May-2017', '12:13', '47.54389874621119', '19.01081085205078'),
(14, 5, 1, 'Sport 7', 'DEsc 7', 'Address here', 0, 12, '14-May-2017', '12:13', '47.54389874621119', '19.01081085205078'),
(15, 5, 1, 'Sport 7', 'DEsc 7', 'Address here', 0, 12, '14-May-2017', '12:13', '47.54389874621119', '19.01081085205078'),
(16, 5, 1, 'Sport 7', 'DEsc 7', 'Address here', 0, 12, '14-May-2017', '12:13', '47.54389874621119', '19.01081085205078'),
(17, 5, 1, 'Sport 7', 'DEsc 7', 'Address here', 0, 12, '14-May-2017', '12:13', '47.54389874621119', '19.01081085205078'),
(18, 5, 1, 'Sport 7', 'DEsc 7', 'address', 0, 23, '14-May-2017', '23:23', '47.57054339220451', '18.988494873046875'),
(19, 5, 1, 'SPort 8', 'Desc 8', '12 here', 0, 12, '14-May-2017', '12:43', '47.541349417895454', '19.147109985351562');

-- --------------------------------------------------------

--
-- Table structure for table `eventuser`
--

CREATE TABLE `eventuser` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventuser`
--

INSERT INTO `eventuser` (`id`, `user_id`, `event_id`) VALUES
(1, 5, 11),
(2, 5, 9),
(3, 5, 9),
(4, 5, 9),
(5, 5, 9),
(6, 5, 8),
(7, 5, 6),
(8, 5, 7),
(9, 5, 12),
(10, 5, 13),
(11, 5, 14),
(12, 5, 15),
(13, 5, 16),
(14, 5, 17),
(15, 5, 18),
(16, 5, 19);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1490128729),
('m130524_201442_init', 1490128733);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `isStaff` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `userId`, `name`, `surname`, `email`, `status`, `created_at`, `updated_at`, `isStaff`) VALUES
(3, 'admin', 'RexeTyR1_i__pFFCLDUB1I_tx5qsfW_w', '$2y$13$n8KHj/rT/G9J61BNDtQBr.OIakEjGnbRPFwOTOXt3BRGdUtW89S3G', NULL, '', '', '', 'aslanov94@gmail.com', 10, 1494756459, 1494756459, 0),
(5, '1295895793778862', 'zqZyvjhV-c7JH_G8Q1HNjphQH_yqstAf', '$2y$13$pHINVve05ykv/sDTUd6IuO4dDaKyOMOdOjWHYVty9BaICTeyads6.', NULL, '1295895793778862', 'Cavid', 'Aslanov', 'aslanov94@yahoo.com', 10, 1494758365, 1494758365, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `eventuser`
--
ALTER TABLE `eventuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `eventuser`
--
ALTER TABLE `eventuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `eventuser`
--
ALTER TABLE `eventuser`
  ADD CONSTRAINT `eventuser_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `eventuser_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
