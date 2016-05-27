-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2016 at 11:51 AM
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
-- Table structure for table `th_sessions`
--

CREATE TABLE IF NOT EXISTS `th_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) NOT NULL DEFAULT '0',
  `data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `th_sessions`
--

INSERT INTO `th_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0efa0fff68ca0bdc47796892159622b45b36475e', '127.0.0.1', 1464342607, '__ci_last_regenerate|i:1464342583;user_login|a:3:{s:2:"id";s:2:"14";s:8:"fullname";s:4:"Test";s:11:"change_pass";s:1:"0";}'),
('c3af56e89b15313d4e0513e5064068edd910899a', '127.0.0.1', 1464342635, '__ci_last_regenerate|i:1464342631;user_login|a:3:{s:2:"id";s:2:"14";s:8:"fullname";s:4:"Test";s:11:"change_pass";s:1:"0";}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
