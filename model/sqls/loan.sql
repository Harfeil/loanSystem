-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 05:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `loan_tbl`
--

CREATE TABLE `loan_tbl` (
  `loan_id` int(100) NOT NULL,
  `loan_money` int(100) NOT NULL,
  `with_interest` float NOT NULL,
  `total_payment` int(100) NOT NULL,
  `loan_date` date NOT NULL,
  `deadline_days` int(100) NOT NULL,
  `deadline` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `praktis`
--

CREATE TABLE `praktis` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `praktis`
--

INSERT INTO `praktis` (`id`, `name`, `age`) VALUES
(1, 'Jeremy', 12),
(2, 'Jeremy', 12),
(3, 'Jeremy', 12),
(4, 'Jeremy', 12),
(5, 'Jeremy', 12),
(6, 'Jeremy', 12),
(7, 'Jeremy', 12),
(8, 'Jeremy', 12),
(9, 'Jeremy', 12),
(10, 'Jeremy', 12),
(11, 'Jeremy', 12),
(12, 'Jeremy', 12),
(13, 'Jeremy', 12),
(14, 'Jeremy', 12),
(15, 'Jeremy', 12);

-- --------------------------------------------------------

--
-- Table structure for table `savings_tbl`
--

CREATE TABLE `savings_tbl` (
  `s_id` int(100) NOT NULL,
  `s_type` varchar(100) NOT NULL,
  `s_amount` double(10,2) NOT NULL,
  `s_total_savings` double(10,2) NOT NULL,
  `s_withdraw_attempt` int(100) NOT NULL,
  `s_status` varchar(100) NOT NULL,
  `s_date` date NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_table`
--

CREATE TABLE `transaction_table` (
  `t_id` int(11) NOT NULL,
  `total_payment` double(10,2) NOT NULL,
  `t_type` varchar(110) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `due_date` date NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_number` varchar(100) NOT NULL,
  `holder_name` varchar(100) NOT NULL,
  `tin_num` varchar(100) NOT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_address` varchar(100) NOT NULL,
  `com_num` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `earning` varchar(100) NOT NULL,
  `proof_bill` varchar(100) NOT NULL,
  `proof_id` varchar(100) NOT NULL,
  `proof_coe` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `is_blocked` int(100) NOT NULL,
  `is_valid` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `total_savings` double(10,2) NOT NULL,
  `total_loan` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loan_tbl`
--
ALTER TABLE `loan_tbl`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `praktis`
--
ALTER TABLE `praktis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings_tbl`
--
ALTER TABLE `savings_tbl`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction_table`
--
ALTER TABLE `transaction_table`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `loan_id` (`loan_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan_tbl`
--
ALTER TABLE `loan_tbl`
  MODIFY `loan_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `praktis`
--
ALTER TABLE `praktis`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `savings_tbl`
--
ALTER TABLE `savings_tbl`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `transaction_table`
--
ALTER TABLE `transaction_table`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=726;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan_tbl`
--
ALTER TABLE `loan_tbl`
  ADD CONSTRAINT `loan_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`id`);

--
-- Constraints for table `savings_tbl`
--
ALTER TABLE `savings_tbl`
  ADD CONSTRAINT `savings_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`id`);

--
-- Constraints for table `transaction_table`
--
ALTER TABLE `transaction_table`
  ADD CONSTRAINT `transaction_table_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loan_tbl` (`loan_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
