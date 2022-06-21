-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 09:11 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `rec_item`
--

-- CREATE DATABASE stock_system;

USE stock_system;

CREATE TABLE `rec_item` (
  `id` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `name_item` varchar(64) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `date_item` date NOT NULL,
  `rec_user` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rec_item`
--

INSERT INTO `rec_item` (`id`, `serial`, `name_item`, `qty`, `price`, `date_item`, `rec_user`) VALUES
(1, 123, 'computer', 10, 1000, '2021-09-14', 'admin'),
(2, 456, 'printer', 8, 1000, '2021-09-15', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `submit_item`
--

CREATE TABLE `submit_item` (
  `id` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `name_item` varchar(64) NOT NULL,
  `qty` int(11) NOT NULL,
  `submit_by` varchar(64) NOT NULL,
  `recieve_by` varchar(64) NOT NULL,
  `date_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submit_item`
--

INSERT INTO `submit_item` (`id`, `serial`, `name_item`, `qty`, `submit_by`, `recieve_by`, `date_out`) VALUES
(1, 123, 'computer', 5, 'admin', 'Ahmad', '2021-09-14'),
(2, 456, 'printer', 2, 'admin', 'Ali', '2021-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(3, 'admin', 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rec_item`
--
ALTER TABLE `rec_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_item`
--
ALTER TABLE `submit_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rec_item`
--
ALTER TABLE `rec_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submit_item`
--
ALTER TABLE `submit_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
