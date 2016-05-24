-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 11:28 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `th_users`
--

CREATE TABLE IF NOT EXISTS `th_users` (
  `id` int(10) unsigned NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:female, 1:male',
  `birthday` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'dd/mm/yyy',
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:lock, 1:active',
  `login_fail` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'max: 5',
  `created_at` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `th_users`
--

INSERT INTO `th_users` (`id`, `fullname`, `username`, `password`, `phone`, `email`, `address`, `gender`, `birthday`, `note`, `status`, `login_fail`, `created_at`) VALUES
(2, 'Thanh Nguyen', '', '', '943118494', 'thanh.linuxos@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0),
(3, 'Thanh Nguyen', 'hrhrh', '', '943118494', 'thanh.linuxos@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0),
(4, 'Thanh Nguyen', '', '', 'Thanh Nguyen', 'thanh.linuxo1s@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0),
(5, 'Thanh Nguyen', 'hrhrh1', '', 'Thanh Nguyen', 'thanh.linuxos@gmail.com1', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0),
(6, 'Thanh Nguyen', '', '', '943118494', 'thanh.linuxos1@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0),
(7, 'Thanh Nguyen', '', '', '943118494', 'thanh.linux1os@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0),
(8, 'Thanh Nguyen', '', '', 'Thanh Nguyen', 'thanh.linux11os@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0),
(9, 'Thanh Nguyen', '', '', '943118494', 'thanh.lin311uxos@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0),
(10, 'Thanh Nguyen', '', '', '943118494', '', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0),
(11, 'Thanh Nguyen', '', '123', '943118494', '111thanh.linuxos@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '12-05-2006', '', 1, 0, 0),
(12, 'Thanh Nguyen', '123', 'd9b1d7db4cd6e70935368a1efb10e377', 'Thanh Nguyen', 'thanh.linuxo1111s@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 1464080837),
(13, 't', '', '74be16979710d4c4e7c6647856088456', '', '', '', 1, '03-05-2006', '', 1, 0, 1464081009);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `th_users`
--
ALTER TABLE `th_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `th_users`
--
ALTER TABLE `th_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
