-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 11:16 PM
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
-- Table structure for table `obtain_policy`
--

CREATE TABLE `obtain_policy` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `policy_no` varchar(30) NOT NULL,
  `policy_type` varchar(100) NOT NULL,
  `engine_no` varchar(20) NOT NULL,
  `chasis_no` varchar(20) NOT NULL,
  `reg_no` varchar(20) NOT NULL,
  `vehicle_make` varchar(20) NOT NULL,
  `vehicle_model` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `model_year` varchar(10) NOT NULL,
  `vehicle_type` varchar(30) NOT NULL,
  `sel_address` varchar(50) NOT NULL,
  `exp_date` date NOT NULL DEFAULT current_timestamp(),
  `renew_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obtain_policy`
--

INSERT INTO `obtain_policy` (`id`, `first_name`, `last_name`, `email`, `contact`, `policy_no`, `policy_type`, `engine_no`, `chasis_no`, `reg_no`, `vehicle_make`, `vehicle_model`, `color`, `model_year`, `vehicle_type`, `sel_address`, `exp_date`, `renew_date`) VALUES
(12, 'Monday', 'Bright', 'bryn035@gmail.com', '07046837453', '1599641721', 'CVF', 'EER4536YG', '87687rfxbn97', '889947653424', 'ACURA', 'ACURA:(LEGEND)', 'American rose', '2010', 'Saloon car (Private Motor Only', '14 Anyaogwu street', '2024-07-23', '2024-07-23'),
(13, 'Monday', 'Baribolve', 'emmy.neka@gmail.com', '07046837453', '3371301721', 'TCC', 'EER4536YG', '87687rfxbn97', '889947653424', 'BENTLEY', 'ACURA:(TLX)', 'Anti-flash white', '1992', 'Jeep (Private Motor Only)', '14 Anyaogwu street', '2020-07-23', '2023-07-23'),
(14, 'Monday', 'John', 'kelechi@yahoo.com', '07046837453', '0326361721', 'MCG', 'EER4536YG', '87687rfxbn97', '8823377653424', 'ASIA', 'ACURA:(RLX)', 'Blue Bell', '2033', 'Saloon car (Private Motor Only', '14 Anyaogwu street', '2023-07-23', '2024-07-23'),
(21, 'Jay', 'Sandra', 'jay@gmail.com', '07046837453', '1857851721', 'MCI', 'EER4536YG', '87687rfxbn97', '889947653424', 'ALFA ROMEO', 'ACURA:(LEGEND)', 'Antique white', '2015', 'Taxi (Commercial Only)', '14 Anyaogwu street', '2023-07-23', '2024-07-23'),
(22, 'Divine', 'Charles', '', '09130816787', '2847531721', 'PMI', '1234abcd', '1234abcd', '12345678', 'BUGATTI', 'BUGATTI:(VEYRON)', 'Gray', '2024', 'SUV (Private Motor Only)', '14 Anyaogwu street', '2024-07-23', '2024-07-23'),
(24, 'Divine', 'Charles', 'avinecharles@yahoo.com', '09130816787', '2722541721', 'TCF', '1234abcd', '1234abcd', '12345678', 'BUGATTI', 'BUGATTI:(VEYRON)', 'Grey', '2024', 'SUV (Private Motor Only)', '14 Anyaogwu street', '2023-07-23', '2024-07-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obtain_policy`
--
ALTER TABLE `obtain_policy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obtain_policy`
--
ALTER TABLE `obtain_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
