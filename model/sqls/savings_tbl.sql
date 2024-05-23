-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 08:03 AM
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
-- Database: `loan`
--

-- --------------------------------------------------------

--
-- Table structure for table `savings_tbl`
--

CREATE TABLE `savings_tbl` (
  `s_id` int(100) NOT NULL,
  `s_type` varchar(100) NOT NULL,
  `s_amount` double(10,2) NOT NULL,
  `s_status` varchar(100) NOT NULL,
  `s_total_savings` double(10,2) NOT NULL,
  `s_withdraw_attempt` int(100) NOT NULL,
  `s_date` date NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `savings_tbl`
--

INSERT INTO `savings_tbl` (`s_id`, `s_type`, `s_amount`, `s_status`, `s_total_savings`, `s_withdraw_attempt`, `s_date`, `user_id`) VALUES
(1, 'Deposit', 500.00, 'Pending', 0.00, 0, '2024-05-23', 0),
(2, 'Deposit', 500.00, 'Pending', 0.00, 0, '2024-05-23', 722),
(3, 'Deposit', 500.00, 'Approved', 1000.00, 0, '2024-05-23', 722),
(4, 'Withdraw', 500.00, 'Approved', 500.00, 1, '2024-05-22', 722),
(5, 'Withdraw', 500.00, 'Approved', 3000.00, 2, '2024-05-22', 722),
(6, 'Withdraw', 500.00, 'Approved', 3500.00, 3, '2024-05-22', 722),
(7, 'Withdraw', 500.00, 'Approved', 4000.00, 4, '2024-05-22', 722),
(8, 'Withdraw', 500.00, 'Approved', 4500.00, 5, '2024-05-22', 722),
(9, 'Withdraw', 500.00, 'Pending', 0.00, 1, '2024-05-23', 722),
(10, 'Withdraw', 500.00, 'Pending', 0.00, 2, '2024-05-23', 722),
(11, 'Withdraw', 500.00, 'Pending', 0.00, 3, '2024-05-23', 722),
(12, 'Withdraw', 500.00, 'Pending', 0.00, 4, '2024-05-23', 722),
(13, 'Withdraw', 500.00, 'Pending', 0.00, 5, '2024-05-23', 722);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `savings_tbl`
--
ALTER TABLE `savings_tbl`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `savings_tbl`
--
ALTER TABLE `savings_tbl`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
