-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 06:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `policy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `policy_type` varchar(100) NOT NULL,
  `engine_no` varchar(20) NOT NULL,
  `chasis_no` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `vehicle_make` varchar(20) NOT NULL,
  `vehicle_model` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `model_year` varchar(10) NOT NULL,
  `vehicle_type` varchar(30) NOT NULL,
  `sel_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `first_name`, `last_name`, `email`, `contact`, `policy_type`, `engine_no`, `chasis_no`, `reg_no`, `vehicle_make`, `vehicle_model`, `color`, `model_year`, `vehicle_type`, `sel_address`) VALUES
(6, 'Monday', 'John', 'kelechi@yahoo.com', '07046837453', 'MCG', 'EER4536YG', '87687rfxbn97', '889947653424', 'BEDFORD', 'ALFA ROMEO:(164)', 'Boysenberry', '2062', 'Taxi (Commercial Only)', '14 Anyaogwu street');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
