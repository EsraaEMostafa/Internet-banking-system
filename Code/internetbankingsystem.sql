-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 04:56 PM
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
(14, 13, 600),
(21, 13, 600),
(23, 13, 300),
(31, 16, 50),
(32, 16, 50);

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
(16, 'esraa', 'Ah', 'esraa@gmail.com', '$2y$10$NkV.0HYLBpnfiJJDqdG1BOqgz4CblxszgdgD.uf2pvPjkHM3tDb0q');

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
(14, 'received', 10, '2023-03-26 01:31:37'),
(14, 'received', 10, '2023-03-27 14:48:04'),
(14, 'received', 20, '2023-03-27 13:49:55'),
(14, 'received', 20, '2023-03-27 14:31:50'),
(14, 'received', 25, '2023-03-27 13:24:03'),
(14, 'received', 45, '2023-03-26 01:33:49'),
(14, 'received', 46, '2023-03-27 15:20:41'),
(14, 'received', 75, '2023-04-05 16:44:40'),
(14, 'received', 500, '2023-03-26 01:32:17'),
(14, 'sent', 1, '2023-03-27 15:14:00'),
(14, 'sent', 5, '2023-03-27 13:14:02'),
(14, 'sent', 5, '2023-03-27 13:14:24'),
(14, 'sent', 5, '2023-03-27 13:28:11'),
(14, 'sent', 10, '2023-03-27 14:49:59'),
(14, 'sent', 15, '2023-03-27 13:09:16'),
(14, 'sent', 15, '2023-03-27 13:27:37'),
(14, 'sent', 20, '2023-03-27 14:43:03'),
(14, 'sent', 40, '2023-04-05 16:17:12'),
(14, 'sent', 60, '2023-03-27 14:07:32'),
(14, 'sent', 80, '2023-04-05 16:20:42'),
(14, 'sent', 100, '2023-03-26 01:31:15'),
(14, 'sent', 100, '2023-03-27 13:28:41'),
(14, 'sent', 100, '2023-03-27 14:08:20'),
(14, 'sent', 100, '2023-04-05 16:52:47'),
(14, 'sent', 200, '2023-03-26 01:44:11'),
(21, 'received', 5, '2023-03-27 13:14:02'),
(21, 'received', 5, '2023-03-27 13:14:24'),
(21, 'received', 5, '2023-03-27 13:28:11'),
(21, 'received', 10, '2023-03-27 14:49:59'),
(21, 'received', 15, '2023-03-27 13:09:16'),
(21, 'received', 15, '2023-03-27 13:21:59'),
(21, 'received', 15, '2023-03-27 13:27:37'),
(21, 'received', 20, '2023-03-27 14:43:03'),
(21, 'received', 40, '2023-04-05 16:17:12'),
(21, 'received', 60, '2023-03-27 14:07:32'),
(21, 'received', 100, '2023-03-26 01:31:15'),
(21, 'received', 500, '2023-03-26 01:33:04'),
(21, 'sent', 5, '2023-03-27 15:09:17'),
(21, 'sent', 10, '2023-03-26 01:31:37'),
(21, 'sent', 10, '2023-03-27 14:48:04'),
(21, 'sent', 15, '2023-03-27 13:21:59'),
(21, 'sent', 20, '2023-03-27 14:53:30'),
(21, 'sent', 20, '2023-03-27 14:53:32'),
(21, 'sent', 20, '2023-03-27 14:53:33'),
(21, 'sent', 20, '2023-03-27 14:53:34'),
(21, 'sent', 25, '2023-03-27 13:24:03'),
(21, 'sent', 45, '2023-03-26 01:33:49'),
(21, 'sent', 60, '2023-03-27 14:29:02'),
(21, 'sent', 75, '2023-04-05 16:44:40'),
(21, 'sent', 120, '2023-03-27 13:47:35'),
(23, 'received', 1, '2023-03-27 15:14:00'),
(23, 'received', 5, '2023-03-27 15:09:17'),
(23, 'received', 20, '2023-03-27 13:48:24'),
(23, 'received', 20, '2023-03-27 14:53:30'),
(23, 'received', 20, '2023-03-27 14:53:32'),
(23, 'received', 20, '2023-03-27 14:53:33'),
(23, 'received', 20, '2023-03-27 14:53:34'),
(23, 'received', 60, '2023-03-27 14:29:02'),
(23, 'received', 100, '2023-03-27 13:28:41'),
(23, 'received', 100, '2023-03-27 14:08:20'),
(23, 'sent', 20, '2023-03-27 14:31:50'),
(23, 'sent', 46, '2023-03-27 15:20:41'),
(31, 'received', 50, '2023-04-05 16:53:10'),
(32, 'received', 100, '2023-04-05 16:52:47'),
(32, 'sent', 50, '2023-04-05 16:53:10');

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
  MODIFY `accountNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
