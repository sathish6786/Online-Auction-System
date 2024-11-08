-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 08:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_link` varchar(100) NOT NULL,
  `pname` text NOT NULL,
  `ptype` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `pdetails` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_link`, `pname`, `ptype`, `price`, `pdetails`, `email`, `stime`, `etime`, `img`) VALUES
(12, '2FnIPpNl', 'vivo v29', 'mobile', '10000', 'this is brand new mobile', 'viswas@gmail.com', '14:21:00', '16:31:00', '2FnIPpNl.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `product_bit`
--

CREATE TABLE `product_bit` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `prodcut` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_bit`
--

INSERT INTO `product_bit` (`id`, `email`, `price`, `prodcut`) VALUES
(29, 'udhayaezhilmaran@gmail.com', 11000, 'MiLUo3m3'),
(30, 'pranitha@gmail.com', 12000, 'MiLUo3m3'),
(31, 'viswasb26@gmail.com', 15000, 'MiLUo3m3'),
(32, 'ashok@gmail.com', 10500, '2FnIPpNl'),
(33, 'vishal@gmail.com', 11000, '2FnIPpNl'),
(34, 'thamizhl@gmail.com', 12000, '2FnIPpNl');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `img`) VALUES
(37, 'viswas', 'viswas@gmail.com', 'viswas', 'seller', 'viswas@gmail.com.jpg'),
(38, 'ashok', 'ashok@gmail.com', 'ashok', 'bidder', 'ashok@gmail.com.jpg'),
(39, 'vishal', 'vishal@gmail.com', 'vishal', 'bidder', 'vishal@gmail.com.png'),
(40, 'thamizh vibes', 'thamizhl@gmail.com', 'thamizh', 'bidder', 'thamizhl@gmail.com.png'),
(41, 'santhoish', 'santhosh@gmail.com', '1234', 'bidder', 'santhosh@gmail.com.jpg'),
(42, 'sathish', 'sathish@gmail.com', '1234', 'seller', 'sathish@gmail.com.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_bit`
--
ALTER TABLE `product_bit`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_bit`
--
ALTER TABLE `product_bit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
