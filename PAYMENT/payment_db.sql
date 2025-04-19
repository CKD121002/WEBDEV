-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2025 at 02:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashd`
--

CREATE TABLE `cashd` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `ZipCode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cashd`
--

INSERT INTO `cashd` (`id`, `Firstname`, `Lastname`, `Email`, `Address`, `City`, `ZipCode`) VALUES
(1, 'mj', 'velasco', 'mjazper@gmail.com', 'Blk 3 cainta', 'Rizal', 8089879),
(2, '', '', '', '', '', 0),
(3, '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cashg`
--

CREATE TABLE `cashg` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `ZipCode` int(10) NOT NULL,
  `gname` varchar(50) NOT NULL,
  `gnumber` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cashg`
--

INSERT INTO `cashg` (`id`, `Firstname`, `Lastname`, `Email`, `Address`, `City`, `ZipCode`, `gname`, `gnumber`) VALUES
(1, 'Mj', 'dsfsdf', 'mjazper@gmail.com', 'Blk 3 cainta', 'Rizal', 23131, 'sdadad', 432442),
(2, 'Mj', 'dsfsdf', 'mjazper@gmail.com', 'Blk 3 cainta', 'Rizal', 23131, 'sdadad', 432442);

-- --------------------------------------------------------

--
-- Table structure for table `cashp`
--

CREATE TABLE `cashp` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `ZipCode` int(10) NOT NULL,
  `payname` varchar(50) NOT NULL,
  `paynumber` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cashp`
--

INSERT INTO `cashp` (`id`, `Firstname`, `Lastname`, `Email`, `Address`, `City`, `ZipCode`, `payname`, `paynumber`) VALUES
(1, '5', '454', '', '455', '454', 45453, '434', 343434);

-- --------------------------------------------------------

--
-- Table structure for table `gcash payment`
--

CREATE TABLE `gcash payment` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `ZipCode` int(10) NOT NULL,
  `Gash_Name` varchar(100) NOT NULL,
  `Gcash_Number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashd`
--
ALTER TABLE `cashd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashg`
--
ALTER TABLE `cashg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashp`
--
ALTER TABLE `cashp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gcash payment`
--
ALTER TABLE `gcash payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashd`
--
ALTER TABLE `cashd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cashg`
--
ALTER TABLE `cashg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cashp`
--
ALTER TABLE `cashp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gcash payment`
--
ALTER TABLE `gcash payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
