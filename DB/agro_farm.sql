-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 30, 2021 at 08:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agro_farm`
--
CREATE DATABASE IF NOT EXISTS `agro_farm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agro_farm`;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `no` int(11) NOT NULL,
  `buyers_id` int(11) DEFAULT NULL,
  `sellers_id` int(11) DEFAULT NULL,
  `buyers_name` text DEFAULT NULL,
  `sellers_name` text DEFAULT NULL,
  `message_from` text DEFAULT NULL,
  `message_to` text DEFAULT NULL,
  `messageRead` varchar(7) DEFAULT 'unseen',
  `message` varchar(7) DEFAULT 'unseen',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `no` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `notice` text DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `title` text DEFAULT NULL,
  `post` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `commentNo` int(11) DEFAULT NULL,
  `approved` text NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_confirm`
--

CREATE TABLE `product_confirm` (
  `no` int(11) NOT NULL,
  `user_id_From` int(11) DEFAULT NULL,
  `user_id_To` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `pnumber` text DEFAULT NULL,
  `item` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` text NOT NULL DEFAULT '0',
  `product` text DEFAULT NULL,
  `units` text DEFAULT NULL,
  `transaction` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `pnumber` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `cname` text DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `emailtoken` varchar(6) NOT NULL DEFAULT 'no',
  `recover` text DEFAULT NULL,
  `checkActive` text NOT NULL DEFAULT 'no',
  `transaction` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `name`, `email`, `pnumber`, `position`, `cname`, `pass`, `address`, `image`, `emailtoken`, `recover`, `checkActive`, `transaction`, `date`, `time`) VALUES
(13, 'Rayhan Ahmed', 'Rayhan.Ahmed@gmail.com', '01865232773', 'Admin', NULL, '4fd4fb92d494be0609c4d8a1dad9c6ae', 'Hathazari, CTG', '../../assets/img/784225Farmer-standing-in-field.jpg', 'yes', '794096', 'yes', NULL, NULL, NULL),
(35, 'Jubair Ahmed', 'Jubair@net.com', '01850751714', 'Sellers', 'BGI', '4fd4fb92d494be0609c4d8a1dad9c6ae', 'Halisohor, CTG', '../../assets/img/821784225Farmer-standing-in-field.jpg', 'yes', NULL, 'yes', '1234', '2021-06-29', 12),
(36, 'Hasan Mahmud', 'yibowi7132@paseacuba.com', '01850751714', 'Sellers', 'Rokomari Hunts', '4fd4fb92d494be0609c4d8a1dad9c6ae', 'GEC Circle, CTG', NULL, 'yes', '485310', 'no', '1234', '2021-04-04', NULL),
(37, 'Mithila Hossain', 'mithi@gmail.com', '01876954586', 'Buyers', NULL, '4fd4fb92d494be0609c4d8a1dad9c6ae', 'Patiya, CTG', '../../assets/img/206158261416-4160158_profile-hero-girl-hd-png-download.png', 'yes', NULL, 'yes', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `product_confirm`
--
ALTER TABLE `product_confirm`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `product_confirm`
--
ALTER TABLE `product_confirm`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
