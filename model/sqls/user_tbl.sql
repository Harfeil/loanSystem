-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 03:11 AM
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
  `is_valid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `fname`, `lname`, `gender`, `birthday`, `age`, `email`, `bank_name`, `bank_number`, `holder_name`, `tin_num`, `com_name`, `com_address`, `com_num`, `position`, `earning`, `proof_bill`, `proof_id`, `proof_coe`, `password`, `role`, `account_type`, `is_blocked`, `is_valid`) VALUES
(1, 'asd', 'asd', 'Male', '2024-05-03', 0, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'User', 'Basic', 0, 0),
(2, 'asd', 'asd', 'Male', '2024-05-02', 0, 'arfl@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'carazo.PNG', 'carazo.PNG', 'carazo.PNG', 'asd', 'User', 'Basic', 0, 0),
(3, 'asd', 'asd', 'Male', '2024-05-04', 0, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'carazo.PNG', 'carazo.PNG', 'carazo.PNG', 'asd', 'User', 'Basic', 0, 0),
(4, 'asd', 'asd', 'Male', '2024-05-09', 0, 'asdf@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'ads.png', 'ads.png', 'ads.png', 'asd', 'User', 'Basic', 0, 0),
(5, 'sasd', 'sasd', 'Male', '2024-05-03', 0, 'sasd@gmail.com', 'sasd', 'sasd', 'sasd', 'sasd', 'sasd', 'sasd', 'sasd', 'sasd', 'sasd', 'carazo.PNG', 'carazo.PNG', 'carazo.PNG', 'sasd', 'User', 'Basic', 0, 0),
(6, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload/c0c63d2e49.png', 'upload/c0c63d2e49.png', 'upload/c0c63d2e49.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(7, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload/3824d036df.png', 'upload/3824d036df.png', 'upload/3824d036df.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(8, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload/e9f274c1d3.png', 'upload/e9f274c1d3.png', 'upload/e9f274c1d3.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(9, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', './upload/2354124ea7.png', './upload/2354124ea7.png', './upload/2354124ea7.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(10, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload/3f62b2dcac.png', 'upload/3f62b2dcac.png', 'upload/3f62b2dcac.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(11, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload/6d0181264d.png', 'upload/6d0181264d.png', 'upload/6d0181264d.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(12, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', '', '', '', 'upload_Coe', 'User', 'Basic', 0, 0),
(13, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload/a42a362268.png', 'upload/a42a362268.png', 'upload/a42a362268.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(14, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', '../upload/67df412372.png', '../upload/67df412372.png', '../upload/67df412372.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(15, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload/c9e5210e13.png', 'upload/c9e5210e13.png', 'upload/c9e5210e13.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(16, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload/eafd9d687c.png', 'upload/eafd9d687c.png', 'upload/eafd9d687c.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(17, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload/371a171d19.png', 'upload/371a171d19.png', 'upload/371a171d19.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(18, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'model/upload/6ab9e0a865.png', 'model/upload/6ab9e0a865.png', 'model/upload/6ab9e0a865.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(19, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'model/upload/ac6149b345.png', 'model/upload/ac6149b345.png', 'model/upload/ac6149b345.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(20, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'model/upload/7334b0c327.png', 'model/upload/7334b0c327.png', 'model/upload/7334b0c327.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(21, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'model/upload/08af38392f.png', 'model/upload/08af38392f.png', 'model/upload/08af38392f.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(22, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'model/upload/1c0ad940c4.png', 'model/upload/1c0ad940c4.png', 'model/upload/1c0ad940c4.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(23, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'model/upload/18b74f9c97.png', 'model/upload/18b74f9c97.png', 'model/upload/18b74f9c97.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(24, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'model/upload/909e6d3198.png', 'model/upload/909e6d3198.png', 'model/upload/909e6d3198.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(25, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'model/upload/48ec8c76c8.png', 'model/upload/48ec8c76c8.png', 'model/upload/48ec8c76c8.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(26, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'model/upload/696924c6b1.png', 'model/upload/696924c6b1.png', 'model/upload/696924c6b1.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(27, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', '../model/upload/carazo.PNG', '../model/upload/ads.png', '../model/upload/appointmentList.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(28, 'upload_Coe', 'upload_Coe', 'Male', '2024-05-04', 0, 'upload_Coe@gmail.com', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', 'upload_Coe', '../model/upload/carazo.PNG', '../model/upload/ads.png', '../model/upload/appointmentList.png', 'upload_Coe', 'User', 'Basic', 0, 0),
(29, 'asd', 'asd', 'Male', '2024-05-03', 0, 'asd@gmail.com', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '../model/upload/carazo.PNG', '../model/upload/ads.png', '../model/upload/appointmentList.png', 'asd', 'User', 'Basic', 0, 0);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
