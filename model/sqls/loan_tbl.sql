-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 11:19 AM
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
  `loan_date` date NOT NULL,
  `deadline` varchar(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_tbl`
--

INSERT INTO `loan_tbl` (`loan_id`, `loan_money`, `with_interest`, `loan_date`, `deadline`, `user_id`, `status`) VALUES
(20, 0, 0, '2024-05-08', '05/06/2024', 722, ''),
(21, 0, 0, '2024-05-08', '2024-06-05', 722, ''),
(22, 0, 0, '2024-05-08', '2024-06-05', 722, ''),
(23, 5000, 150, '2024-05-08', '2024-06-05', 722, ''),
(24, 5000, 150, '2024-05-08', '2024-06-05', 722, 'Pending'),
(25, 10000, 300, '2024-05-08', '2024-06-05', 722, 'Pending');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan_tbl`
--
ALTER TABLE `loan_tbl`
  MODIFY `loan_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan_tbl`
--
ALTER TABLE `loan_tbl`
  ADD CONSTRAINT `loan_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
