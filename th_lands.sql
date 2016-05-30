-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2016 at 03:56 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

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
-- Table structure for table `th_lands`
--

CREATE TABLE `th_lands` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `axis_x` tinyint(3) NOT NULL DEFAULT '0',
  `axis_y` tinyint(3) NOT NULL DEFAULT '0',
  `image` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `th_lands`
--

INSERT INTO `th_lands` (`id`, `branch_id`, `name`, `axis_x`, `axis_y`, `image`, `deleted`) VALUES
(5, 5, 'A1', 12, 12, '8374a835efda4c16e67464abcaf478b7.jpg', 0),
(6, 6, 'A2', 15, 12, '16a42f2b7ed0144462966f8e9218880c.jpg', 1464702141),
(7, 5, 'A3', 12, 12, '168988da7cde6fea83dcb943ddb96ef0.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `th_lands`
--
ALTER TABLE `th_lands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `th_lands`
--
ALTER TABLE `th_lands`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
