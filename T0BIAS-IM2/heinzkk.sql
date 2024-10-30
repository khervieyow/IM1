-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 11:33 AM
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
-- Database: `heinzkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(250) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `date_created`) VALUES
(1, 'Cars', '2024-10-01'),
(2, 'Fruits', '2024-10-01'),
(3, 'Peripherals', '2024-10-01'),
(4, 'FPSGames', '2024-10-01'),
(5, 'Brands', '2024-10-01'),
(6, 'Device', '2024-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(255) NOT NULL,
  `category` varchar(500) NOT NULL,
  `productname` varchar(500) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `category`, `productname`, `price`, `quantity`, `date`) VALUES
(5, 'Brands', 'Nike', 112, 3, '2024-10-01'),
(6, 'Cars', 'Ferrari', 1500, 100, '2024-10-16'),
(7, 'Fruits', 'Mango', 15, 1, '2024-10-16'),
(8, 'Peripherals', 'Keyboard', 150, 100, '2024-10-16'),
(9, 'FPSGames', 'CrossFire', 1500, 100, '2024-10-16'),
(10, 'Device', 'iPhone', 1500, 100, '2024-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `productz_table`
--

CREATE TABLE `productz_table` (
  `ID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Price` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `DateofPurchase` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productz_table`
--

INSERT INTO `productz_table` (`ID`, `ProductName`, `Category`, `Price`, `Quantity`, `DateofPurchase`) VALUES
(1, 'Lamborghini', 'Cars', 5000, 25, '2024-08-28'),
(2, 'Mango', 'Fruits', 35, 37, '2024-10-06'),
(4, 'Ferrari', 'Cars', 6900, 45, '2024-10-02'),
(6, 'Dodge-Challenger', 'Cars', 9000, 0, '2024-07-08'),
(7, 'Grapes', 'Fruits', 163, 0, '2024-10-03'),
(8, 'Pineapple', 'Fruits', 167, 17, '2024-10-03'),
(10, 'Aspark', 'Cars', 5300, 10, '2024-10-02'),
(11, 'Durian', 'Fruits', 65, 0, '2024-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `thetable`
--

CREATE TABLE `thetable` (
  `id` int(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date_purchase` date NOT NULL,
  `expiry_date` date NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thetable`
--

INSERT INTO `thetable` (`id`, `category_id`, `productname`, `price`, `quantity`, `date_purchase`, `expiry_date`, `date_created`) VALUES
(8, 1, 'Ferrari', 999, 2, '2024-10-01', '2024-10-23', '2024-10-01'),
(9, 2, 'Pineapple', 10, 1, '2024-10-01', '2024-10-03', '2024-10-01'),
(10, 3, 'Mouse', 10, 100, '2024-10-01', '2024-10-24', '2024-10-01'),
(22, 6, 'iPad', 299, 1, '2024-10-01', '2024-10-24', '2024-10-01'),
(23, 4, 'Valorant', 299, 2, '2024-10-01', '2024-10-02', '2024-10-01'),
(24, 1, 'McLaren', 500, 3, '2024-10-30', '2024-10-31', '2024-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `address`, `username`, `password`) VALUES
(1, 'Heinz', 'test address', 'username', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productz_table`
--
ALTER TABLE `productz_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `thetable`
--
ALTER TABLE `thetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productz_table`
--
ALTER TABLE `productz_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `thetable`
--
ALTER TABLE `thetable`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `thetable`
--
ALTER TABLE `thetable`
  ADD CONSTRAINT `thetable_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
