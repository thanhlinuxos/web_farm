-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2016 at 08:24 AM
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
-- Table structure for table `th_logs`
--

CREATE TABLE IF NOT EXISTS `th_logs` (
  `id` int(10) unsigned NOT NULL,
  `action_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `browser` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `th_logs`
--

INSERT INTO `th_logs` (`id`, `action_key`, `content`, `ip`, `browser`, `user_id`, `username`, `fullname`, `created_at`, `deleted`) VALUES
(1, 'user_edit', '<br> [branch_id]: 3 => 5<br> [group]: admin => manager<br> [permission]: a:10:{s:4:"user";s:26:"index|add|edit|show|delete";s:10:"permission";s:4:"edit";s:6:"branch";s:26:"index|add|edit|show|delete";s:4:"land";s:26:"index|add|edit|show|delete";s:5:"duple";s:26:"index|add|edit|show|delete";s:3:"row";s:26:"index|add|edit|show|delete";s:4:"tree";s:26:"index|add|edit|show|delete";s:16:"processes_forest";s:26:"index|add|edit|show|delete";s:16:"soil_preparation";s:26:"index|add|edit|show|delete";s:9:"materials";s:26:"index|add|edit|show|delete";} => a:1:{s:4:"user";s:19:"index|add|edit|show";}', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1, 'admin', 'Admin', 1464755762, 0),
(2, 'user_add', '<br> [id]: 35<br> [branch_id]: 3<br> [fullname]: sdsdsdsd<br> [username]: <br> [password]: 74be16979710d4c4e7c6647856088456<br> [group]: admin<br> [image]: <br> [phone]: <br> [email]: <br> [address]: <br> [gender]: 1<br> [birthday]: <br> [note]: <br> [status]: 1<br> [login_fail]: 0<br> [change_password]: 1<br> [permission]: a:11:{s:4:"user";s:26:"index|add|edit|show|delete";s:10:"permission";s:4:"edit";s:4:"logs";s:10:"index|show";s:6:"branch";s:26:"index|add|edit|show|delete";s:4:"land";s:26:"index|add|edit|show|delete";s:5:"duple";s:26:"index|add|edit|show|delete";s:3:"row";s:26:"index|add|edit|show|delete";s:4:"tree";s:26:"index|add|edit|show|delete";s:16:"processes_forest";s:26:"index|add|edit|show|delete";s:16:"soil_preparation";s:26:"index|add|edit|show|delete";s:9:"materials";s:26:"index|add|edit|show|delete";}<br> [created_at]: 1464755770<br> [deleted]: 0', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1, 'admin', 'Admin', 1464755770, 0),
(3, 'user_update', '<br> [branch_id]: 0 => 3<br> [fullname]: t => tvfvchgfchgc<br> [username]:  => jêjẹ<br> [password]: 74be16979710d4c4e7c6647856088456 => d9b1d7db4cd6e70935368a1efb10e377<br> [change_password]: 0 => 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1, 'admin', 'Admin', 1464757574, 0),
(4, 'user_update', '<br> [branch_id]: 3 => 4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1, 'admin', 'Admin', 1464760470, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `th_logs`
--
ALTER TABLE `th_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `th_logs`
--
ALTER TABLE `th_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
