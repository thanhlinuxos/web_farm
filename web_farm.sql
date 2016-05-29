-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2016 at 02:26 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
  `group` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:female, 1:male',
  `birthday` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'dd/mm/yyy',
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:lock, 1:active',
  `login_fail` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'max: 5',
  `change_password` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1: must change',
  `permission` text COLLATE utf8_unicode_ci,
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `th_users`
--

INSERT INTO `th_users` (`id`, `fullname`, `username`, `password`, `group`, `phone`, `email`, `address`, `gender`, `birthday`, `note`, `status`, `login_fail`, `change_password`, `permission`, `created_at`, `deleted`) VALUES
(1, 'Admin', 'admin', 'd9b1d7db4cd6e70935368a1efb10e377', 'admin', '3', 'thanh.linuxos123@gmail.com', '33', 1, '03-05-2006', '3', 1, 0, 0, 'a:9:{s:4:"user";s:26:"index|add|edit|show|delete";s:10:"permission";s:10:"index|edit";s:6:"agency";s:26:"index|add|edit|show|delete";s:4:"land";s:26:"index|add|edit|show|delete";s:5:"duple";s:26:"index|add|edit|show|delete";s:4:"tree";s:26:"index|add|edit|show|delete";s:16:"processes_forest";s:26:"index|add|edit|show|delete";s:16:"soil_preparation";s:26:"index|add|edit|show|delete";s:9:"materials";s:26:"index|add|edit|show|delete";}', 1464098146, 0),
(2, 'Thanh Nguyen', 'thanh', 'd9b1d7db4cd6e70935368a1efb10e377', 'technical', '0943118494', 'thanh.linuxos@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 0, '01-05-2006', '', 1, 0, 0, 'a:2:{s:16:"processes_forest";s:26:"index|add|edit|show|delete";s:16:"soil_preparation";s:26:"index|add|edit|show|delete";}', 0, 0),
(3, 'Thanh Nguyen', 'hrhrh', '', NULL, '943118494', 'thanh.linuxos@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0, NULL, 0, 0),
(4, 'Thanh Nguyen', '', '', NULL, 'Thanh Nguyen', 'thanh.linuxo1s@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0, NULL, 0, 0),
(5, 'Thanh Nguyen', 'hrhrh1', '', NULL, 'Thanh Nguyen', 'thanh.linuxos@gmail.com1', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0, NULL, 0, 0),
(6, 'Thanh Nguyen', '', '', NULL, '943118494', 'thanh.linuxos1@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0, NULL, 0, 0),
(7, 'Thanh Nguyen', '', '', NULL, '943118494', 'thanh.linux1os@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0, NULL, 0, 0),
(8, 'Thanh Nguyen', '', '', NULL, 'Thanh Nguyen', 'thanh.linux11os@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0, NULL, 0, 0),
(9, 'Thanh Nguyen', '', '', NULL, '943118494', 'thanh.lin311uxos@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0, NULL, 0, 0),
(10, 'Thanh Nguyen', '', '', NULL, '943118494', '', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0, NULL, 0, 0),
(11, 'Thanh Nguyen', '', '123', NULL, '943118494', '111thanh.linuxos@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '12-05-2006', '', 1, 0, 0, NULL, 0, 0),
(12, 'Thanh Nguyen', '123', 'd9b1d7db4cd6e70935368a1efb10e377', NULL, 'Thanh Nguyen', 'thanh.linuxo1111s@gmail.com', '35A duong 1, KP1, P.Cat Lai, Q.2', 1, '', '', 1, 0, 0, NULL, 1464080837, 0),
(13, 't', '', '74be16979710d4c4e7c6647856088456', NULL, '', '', '', 1, '03-05-2006', '', 1, 0, 0, NULL, 1464081009, 0),
(15, 'Test', 'test', 'd9b1d7db4cd6e70935368a1efb10e377', 'employee', '1', '', '', 1, '', '', 1, 0, 1, NULL, 1464274184, 0),
(16, 'thabg', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464350474, 0),
(17, 'asdasda', 'asdad', '6e9665ab37ca1887a7e0179c5fac0dc0', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464350512, 0),
(18, 'đá', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464365348, 0),
(19, 'ádadad', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464365353, 0),
(20, 'adsasd', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464365359, 0),
(21, 'ádasda', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464365362, 0),
(22, 'ádasdasd', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464365367, 0),
(23, 'ádasdads', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464365371, 0),
(24, 'adsasd', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464365385, 0),
(25, 'adsasda', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464365389, 0),
(26, 'ádasdasd', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464365393, 0),
(27, 'adasdad', 'asdasdfsdf', 'd9b1d7db4cd6e70935368a1efb10e377', 'employee', '', '', '', 1, '', '', 1, 0, 1, NULL, 1464365398, 0),
(28, 'adasdad', 'asda', 'd9b1d7db4cd6e70935368a1efb10e377', 'manager', '', '', '', 1, '', '', 1, 0, 1, 'a:2:{s:4:"user";s:19:"index|add|edit|show";s:9:"materials";s:26:"index|add|edit|show|delete";}', 1464365402, 0),
(29, 'ádad', '', '74be16979710d4c4e7c6647856088456', 'employee', '', '', '', 1, '', '', 0, 0, 1, 'a:9:{s:4:"user";s:26:"index|add|edit|show|delete";s:10:"permission";s:4:"edit";s:6:"agency";s:26:"index|add|edit|show|delete";s:4:"land";s:26:"index|add|edit|show|delete";s:5:"duple";s:26:"index|add|edit|show|delete";s:4:"tree";s:26:"index|add|edit|show|delete";s:16:"processes_forest";s:26:"index|add|edit|show|delete";s:16:"soil_preparation";s:26:"index|add|edit|show|delete";s:9:"materials";s:26:"index|add|edit|show|delete";}', 1464498673, 0),
(30, 'tttttt', '', '74be16979710d4c4e7c6647856088456', 'admin', '', '', '', 1, '', '', 1, 0, 1, 'a:9:{s:4:"user";s:8dit";s:10:"permission";s:4:"edit";s:6:"agency";s:15:"add|edit|delete";s:4:"land";s:15:"add|edit|delete";s:5:"duple";s:6:"delete";s:4:"tree";s:10:"add|delete";s:16:"processes_forest";s:10:"add|delete";s:16:"soil_preparation";s:10:"add|delete";s:9:"materials";s:3:"add";}', 1464499308, 1464506519);

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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
