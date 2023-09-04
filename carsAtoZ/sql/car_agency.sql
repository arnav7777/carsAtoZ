-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 08:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id` int(11) NOT NULL,
  `agency_name` varchar(100) NOT NULL,
  `registration_number` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`id`, `agency_name`, `registration_number`, `email`, `phone`, `password`, `location`) VALUES
(22, 'arnav cars', '987654321', 'arnav@gmail.com', '9323832222', 'arnav', 'mumbai'),
(23, 'aditya', '123', 'a@gmail.com', '9876543211', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `security_question`, `security_answer`) VALUES
(4, 'UVEz3yz0vV', 'xeSA7HefFc', 'hocwd@uac7.com', '1001376265', '$2y$10$Um94mD1O93rbZSpGFGS5tOZafZYhxx8T2PNHUfGNbppf836eqF1yW', 'What is your Birthdate?', 'emczS1Yapt'),
(5, 'UVEz3yz0vV', 'xeSA7HefFc', 'hocwd@uac7.com', '1001376265', '$2y$10$QfmOS6Lm/zIxqUMvEgniu.h4CSLB8Fdm1Nlp42Zgbyvj.gOQnZjdK', 'What is your Birthdate?', 'emczS1Yapt'),
(6, 'JvRthpocFp', 'Wm20RmhsVO', 'arnav@gmail.com', '2595542487', '$2y$10$fl58yHQF5q1gd3DEbDN06uQM75buFvGH7aXyaPeNiBbYXBlUCwI0C', 'What is your Birthdate?', 'PCQSJ46OfY'),
(7, '', '', '', '', '', '', ''),
(8, '', '', '', '', '', '', ''),
(9, 'OlN2ANHuby', 'jdN7aY8KT4', 'arnav@gmail.com', '3978563859', 'arnav', 'What is your Birthdate?', 'x6TzewAmL2');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `VehicleID` int(11) NOT NULL,
  `VehicleModel` varchar(255) NOT NULL,
  `VehicleNumber` varchar(15) NOT NULL,
  `SeatingCapacity` int(11) NOT NULL,
  `RentPerDay` decimal(10,2) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `e_spec` varchar(255) NOT NULL,
  `gear` varchar(255) NOT NULL,
  `PhotoURL` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `agency_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`VehicleID`, `VehicleModel`, `VehicleNumber`, `SeatingCapacity`, `RentPerDay`, `engine`, `e_spec`, `gear`, `PhotoURL`, `status`, `agency_id`, `customer_id`) VALUES
(8, 'maruti brezza', 'Mh-43-B4-2022', 5, '200.00', 'Petrol', '2', 'Automatic', 'car-1.jpg', 'rent', '22', ''),
(9, 'BMW X6', 'MH-56-JH-2100', 3, '700.00', 'Petrol', '3', 'Manual', 'car-5.jpg', 'rent', '22', ''),
(10, 'MERC', 'GJ-43-ER-3456', 1, '1200.00', 'Diesel', '4', 'Automatic', 'car-4.jpg', 'booked', '23', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`VehicleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `VehicleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
