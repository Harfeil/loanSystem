-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 09:01 AM
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
  `total_savings` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `fname`, `lname`, `gender`, `birthday`, `age`, `email`, `bank_name`, `bank_number`, `holder_name`, `tin_num`, `com_name`, `com_address`, `com_num`, `position`, `earning`, `proof_bill`, `proof_id`, `proof_coe`, `password`, `role`, `account_type`, `is_blocked`, `is_valid`, `status`, `total_savings`) VALUES
(667, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../../model/upload/carazo.PNG', '../../model/upload/carazo.PNG', '../../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(668, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(669, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(670, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(671, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(672, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(673, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(674, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(675, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(676, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(677, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(678, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(679, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(680, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(681, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(682, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(683, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(684, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(685, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(686, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(687, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(688, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(689, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(690, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(691, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(692, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(693, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(694, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(695, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(696, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(697, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(698, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(699, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(700, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(701, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(702, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(703, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(704, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(705, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(706, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(707, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(708, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(709, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(710, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(711, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(712, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(713, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(714, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(715, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(716, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(717, 'asd', 'asd', 'Male', '2024-05-09', 0, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../../model/upload/carazo.PNG', '../../model/upload/profile.png', '../../model/upload/profile.png', 'asd', 'User', 'Premium', 0, 0, 'Pending', 0.00),
(718, 'asd', 'asd', 'Male', '2024-05-09', 0, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../../model/upload/savings.png', '../../model/upload/carazo.PNG', '../../model/upload/carazo.PNG', 'asd', 'User', 'Premium', 0, 0, 'Pending', 0.00),
(719, 'asd', 'asd', 'Male', '2024-05-09', 0, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../../model/upload/savings.png', '../../model/upload/carazo.PNG', '../../model/upload/carazo.PNG', 'asd', 'User', 'Premium', 0, 0, 'Pending', 0.00),
(720, 'asda', 'asda', 'Female', '2024-04-30', 2, 'arfl@gmail.com', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', '../../model/upload/savings.png', '../../model/upload/savings.png', '../../model/upload/profile.png', 'asda', 'User', 'Premium', 0, 0, 'Pending', 0.00),
(721, 'asda', 'asda', 'Female', '2024-04-30', 2, 'arfl@gmail.com', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', '../../model/upload/savings.png', '../../model/upload/savings.png', '../../model/upload/profile.png', 'asda', 'User', 'Premium', 0, 0, 'Pending', 0.00),
(722, 'Harfeil', 'Salmeron', 'Male', '2002-12-02', 21, 'Harfeil@gmail.com', 'Harfeil', 'Harfeil', 'Harfeil', 'Harfeil', 'Harfeil', 'Harfeil', 'Harfeil', 'Harfeil', 'Harfeil', '../../model/upload/ads.png', '../../model/upload/loan.png', '../../model/upload/loan.png', '$2y$10$A93FCZWwgfgUmYul0rq7pebcNXfZjT1Jhvr.h9xTfPJBzqZraU5Fu', 'User', 'Basic', 0, 0, 'Pending', 0.00),
(723, 'Jeremy', 'Jeremy', 'Male', '2002-12-02', 21, 'Jeremy@gmail.com', 'Jeremy', 'Jeremy', 'Jeremy', 'Jeremy', 'Jeremy', 'Jeremy', 'Jeremy', 'Jeremy', 'Jeremy', '../../model/upload/profile.png', '../../model/upload/notification.png', '../../model/upload/profile.png', '$2y$10$UW5jqy1RmzqSgeIS4yirfu/EWoJuZnFdy.0NvBGV5OYqCbP2dJS06', 'User', 'Premium', 0, 0, 'Pending', 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=724;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
