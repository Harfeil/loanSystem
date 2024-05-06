-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 04:46 PM
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
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `fname`, `lname`, `gender`, `birthday`, `age`, `email`, `bank_name`, `bank_number`, `holder_name`, `tin_num`, `com_name`, `com_address`, `com_num`, `position`, `earning`, `proof_bill`, `proof_id`, `proof_coe`, `password`, `role`, `account_type`, `is_blocked`, `is_valid`, `status`) VALUES
(667, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../../model/upload/carazo.PNG', '../../model/upload/carazo.PNG', '../../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(668, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(669, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(670, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(671, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(672, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(673, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(674, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(675, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(676, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(677, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(678, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(679, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(680, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(681, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(682, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(683, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(684, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(685, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(686, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(687, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(688, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(689, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(690, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(691, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(692, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(693, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(694, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(695, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(696, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(697, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(698, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(699, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(700, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(701, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(702, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(703, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(704, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(705, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(706, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(707, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(708, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(709, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(710, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(711, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(712, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(713, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(714, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(715, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(716, 'asd', 'asd', 'Male', '2024-05-08', 2, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', '../model/upload/carazo.PNG', 'asd', 'User', 'Basic', 0, 0, 'Pending'),
(717, 'asd', 'asd', 'Male', '2024-05-09', 0, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../../model/upload/carazo.PNG', '../../model/upload/profile.png', '../../model/upload/profile.png', 'asd', 'User', 'Premium', 0, 0, 'Pending'),
(718, 'asd', 'asd', 'Male', '2024-05-09', 0, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../../model/upload/savings.png', '../../model/upload/carazo.PNG', '../../model/upload/carazo.PNG', 'asd', 'User', 'Premium', 0, 0, 'Pending'),
(719, 'asd', 'asd', 'Male', '2024-05-09', 0, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../../model/upload/savings.png', '../../model/upload/carazo.PNG', '../../model/upload/carazo.PNG', 'asd', 'User', 'Premium', 0, 0, 'Pending'),
(720, 'asda', 'asda', 'Female', '2024-04-30', 2, 'arfl@gmail.com', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', '../../model/upload/savings.png', '../../model/upload/savings.png', '../../model/upload/profile.png', 'asda', 'User', 'Premium', 0, 0, 'Pending'),
(721, 'asda', 'asda', 'Female', '2024-04-30', 2, 'arfl@gmail.com', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', 'asda', '../../model/upload/savings.png', '../../model/upload/savings.png', '../../model/upload/profile.png', 'asda', 'User', 'Premium', 0, 0, 'Pending');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=722;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
