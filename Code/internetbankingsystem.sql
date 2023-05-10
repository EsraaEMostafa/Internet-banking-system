-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 09:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internetbankingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountNo` int(11) NOT NULL,
  `client_ID` int(11) NOT NULL,
  `currentBalance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountNo`, `client_ID`, `currentBalance`) VALUES
(14, 13, 1465),
(31, 16, 100),
(40, 26, 35),
(76, 47, 0),
(77, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `passwords` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `passwords`) VALUES
('admin@gmail.com', 'admin123/');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(11) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `passwords` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `firstName`, `lastName`, `email`, `passwords`) VALUES
(13, 'Hana', 'Gamal', 'hana@gmail.com', '$2y$10$LjDDXgIIMFTCGGFHoPejC.YwzGheWbQt/fcFH.IElaUqvqBLRYsEe'),
(14, 'amany', 'hegazy', 'amany@gmail.com', '$2y$10$ED5vsnZbF20a/mc/vROG7e7Oq8/PWNU0.sfEk0cA/DM/A8hYuK.IS'),
(15, 'Rola', 'Gamal', 'rola@gmail.com', '$2y$10$RHlvcMZ7AKJ2xriiOFrQd.IxaI/Vn5GlTht3oFhYVpr9ZqjFE3V6C'),
(16, 'esraa', 'Ah', 'esraa@gmail.com', '$2y$10$NkV.0HYLBpnfiJJDqdG1BOqgz4CblxszgdgD.uf2pvPjkHM3tDb0q'),
(26, 'Mai', 'Ahmed', 'mai@gmail.com', '$2y$10$PMXTgqoaCfRKM6GOMzgLcOnrh1yhlVrfvTvJp7Qrh/02vII22yi0a'),
(27, 'Dina', 'Mohamed', 'dina@gmail.com', '$2y$10$PmTUdA4QfkB9Kiq.QGj3kuBM6pe/QcHoTZx4pYiLkUJK8x5v2XUdK'),
(28, 'Enjy', 'Omar', 'enjy@gmail.com', '$2y$10$43U49ocKG8.35zuyyS7aZeMHa5sJ7dBYEvDYemKt1zBKNmwg0bDK.'),
(29, 'Rana', 'Ahmed', 'rana@gmail.com', '$2y$10$Y6N4i2ECFB4kVbpijeEYfeEXlQCnsaCqc0np2jmxBoCyJiiFpt4Fy'),
(37, 'Rawan', 'Ahmed', 'rawan@gmail.com', '$2y$10$4vy7RePfCUj6glHgroOaxuSINmWCWezH0CQRZ/DGBT63HapW7PJeq'),
(42, 'Yasmine', 'Mohamed', 'yasmine@gmail.com', '$2y$10$g5yxdPeRialXyXFf.yovTOh4bFfOB4sIKoDljHuiLAtVD/zsl.cwu'),
(44, 'Tala', 'Karim', 'tala@gmail.com', '$2y$10$SSal5DVO6SDDKVXnXGB9SejDQcKR1MhP1hLMUy0n3NNup8dI3ZZuG'),
(45, 'Yehia', 'Ahmed', 'yehia@gmail.com', '$2y$10$f5XT9UFPFmDuUeOOzGzTLeaYrR7cqYFMcwFTEuVryVxEoCcLBvO5O'),
(46, 'Yassin', 'Mohamed', 'Yassin@gmail.com', '$2y$10$.yy0vFXPlxAcThZJKwr6xebeNoE6KxTPHHFCVjH/b94ZWiaoOFFSu'),
(47, 'Mohamed', 'Mohamed', 'mohamed@gmail.com', '$2y$10$8Tb1h7w0OFJORJ6ZgtslvOnScbV0MKX8IBry1IPSr6o48muYv93VO');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `accountnum` int(11) NOT NULL,
  `transactionType` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `trans_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`accountnum`, `transactionType`, `amount`, `trans_date`) VALUES
(14, 'received', 5, '2023-03-27 14:01:05'),
(14, 'received', 5, '2023-04-07 14:52:38'),
(14, 'received', 10, '2023-03-26 01:31:37'),
(14, 'received', 10, '2023-03-27 14:48:04'),
(14, 'received', 15, '2023-04-07 13:10:41'),
(14, 'received', 15, '2023-04-07 13:14:19'),
(14, 'received', 15, '2023-04-07 14:28:51'),
(14, 'received', 15, '2023-04-08 02:50:53'),
(14, 'received', 15, '2023-04-08 15:42:59'),
(14, 'received', 15, '2023-04-17 17:34:16'),
(14, 'received', 20, '2023-03-27 13:49:55'),
(14, 'received', 20, '2023-03-27 14:31:50'),
(14, 'received', 20, '2023-04-07 14:51:14'),
(14, 'received', 25, '2023-03-27 13:24:03'),
(14, 'received', 25, '2023-04-05 17:39:24'),
(14, 'received', 25, '2023-04-07 15:09:11'),
(14, 'received', 34, '2023-04-07 16:07:19'),
(14, 'received', 40, '2023-04-07 16:07:34'),
(14, 'received', 45, '2023-03-26 01:33:49'),
(14, 'received', 46, '2023-03-27 15:20:41'),
(14, 'received', 50, '2023-04-08 13:52:35'),
(14, 'received', 50, '2023-04-08 15:53:30'),
(14, 'received', 65, '2023-04-08 15:52:51'),
(14, 'received', 70, '2023-04-07 15:09:28'),
(14, 'received', 75, '2023-04-05 16:44:40'),
(14, 'received', 75, '2023-04-07 15:19:42'),
(14, 'received', 80, '2023-04-07 22:33:16'),
(14, 'received', 100, '2023-04-08 02:34:37'),
(14, 'received', 100, '2023-05-06 09:53:55'),
(14, 'received', 115, '2023-04-08 15:17:17'),
(14, 'received', 115, '2023-04-08 16:28:09'),
(14, 'received', 130, '2023-04-08 14:35:36'),
(14, 'received', 135, '2023-04-07 22:21:14'),
(14, 'received', 150, '2023-05-09 13:49:03'),
(14, 'received', 205, '2023-04-07 15:59:42'),
(14, 'received', 215, '2023-05-07 10:09:47'),
(14, 'received', 315, '2023-05-06 19:05:24'),
(14, 'received', 500, '2023-03-26 01:32:17'),
(14, 'received', 615, '2023-05-06 14:58:39'),
(14, 'sent', 1, '2023-03-27 15:14:00'),
(14, 'sent', 5, '2023-03-27 13:14:02'),
(14, 'sent', 5, '2023-03-27 13:14:24'),
(14, 'sent', 5, '2023-03-27 13:28:11'),
(14, 'sent', 10, '2023-03-27 14:49:59'),
(14, 'sent', 10, '2023-04-07 21:52:01'),
(14, 'sent', 14, '2023-04-07 15:48:21'),
(14, 'sent', 15, '2023-03-27 13:09:16'),
(14, 'sent', 15, '2023-03-27 13:27:37'),
(14, 'sent', 15, '2023-04-07 14:29:36'),
(14, 'sent', 15, '2023-04-07 16:26:31'),
(14, 'sent', 15, '2023-04-08 15:30:50'),
(14, 'sent', 15, '2023-04-08 15:54:22'),
(14, 'sent', 15, '2023-04-08 16:47:20'),
(14, 'sent', 20, '2023-03-27 14:43:03'),
(14, 'sent', 25, '2023-04-07 15:07:38'),
(14, 'sent', 30, '2023-04-08 15:13:41'),
(14, 'sent', 40, '2023-04-05 16:17:12'),
(14, 'sent', 50, '2023-04-07 22:21:01'),
(14, 'sent', 55, '2023-04-07 13:14:59'),
(14, 'sent', 60, '2023-03-27 14:07:32'),
(14, 'sent', 65, '2023-04-07 16:07:50'),
(14, 'sent', 65, '2023-04-08 15:51:30'),
(14, 'sent', 75, '2023-04-07 15:47:48'),
(14, 'sent', 75, '2023-04-07 22:20:50'),
(14, 'sent', 80, '2023-04-05 16:20:42'),
(14, 'sent', 95, '2023-04-07 15:12:26'),
(14, 'sent', 100, '2023-03-26 01:31:15'),
(14, 'sent', 100, '2023-03-27 13:28:41'),
(14, 'sent', 100, '2023-03-27 14:08:20'),
(14, 'sent', 100, '2023-04-05 16:52:47'),
(14, 'sent', 100, '2023-04-07 14:52:13'),
(14, 'sent', 100, '2023-04-08 15:55:45'),
(14, 'sent', 100, '2023-04-08 16:17:20'),
(14, 'sent', 100, '2023-05-06 09:51:31'),
(14, 'sent', 100, '2023-05-06 19:20:47'),
(14, 'sent', 115, '2023-04-25 21:20:23'),
(14, 'sent', 115, '2023-05-06 19:04:17'),
(14, 'sent', 115, '2023-05-06 19:08:10'),
(14, 'sent', 130, '2023-04-08 13:52:51'),
(14, 'sent', 150, '2023-04-08 15:39:20'),
(14, 'sent', 200, '2023-03-26 01:44:11'),
(14, 'sent', 200, '2023-05-06 19:04:55'),
(31, 'received', 50, '2023-04-05 16:53:10'),
(31, 'received', 50, '2023-05-06 15:01:37'),
(40, 'received', 35, '2023-04-07 14:15:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountNo`),
  ADD KEY `client_ID` (`client_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`accountnum`,`transactionType`,`amount`,`trans_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`client_ID`) REFERENCES `client` (`clientID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_parent_id` FOREIGN KEY (`accountnum`) REFERENCES `account` (`accountNo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
