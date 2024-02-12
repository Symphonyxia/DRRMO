-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 01:08 AM
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
-- Database: `drrmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `usar`
--

CREATE TABLE `usar` (
  `id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `irf_no` int(50) NOT NULL,
  `incident_loc` varchar(255) NOT NULL,
  `response_type` varchar(100) NOT NULL,
  `loc_type` varchar(100) NOT NULL,
  `call_type` varchar(100) NOT NULL,
  `srr_services` varchar(100) NOT NULL,
  `incident_comm` varchar(100) NOT NULL,
  `agency` varchar(100) NOT NULL,
  `position` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `incident` text NOT NULL,
  `weather` varchar(50) NOT NULL,
  `cpr` varchar(50) NOT NULL,
  `defib` varchar(50) NOT NULL,
  `terrain` varchar(50) NOT NULL,
  `casualty` varchar(50) NOT NULL,
  `ambulance_req` varchar(50) NOT NULL,
  `interventions` varchar(50) NOT NULL,
  `map_loc` varchar(150) NOT NULL,
  `latitude` decimal(50,0) NOT NULL,
  `longitude` decimal(50,0) NOT NULL,
  `dist_ratio` decimal(50,0) NOT NULL,
  `recommendation` text NOT NULL,
  `narrative` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `registration_date`) VALUES
(1, 'Mary', 'Tabunlupa', 'tabunlupamaryhope@gmail.com', '$2y$10$jzWs1umaVgKFIWb3Z7jgzuzNxa1KmNvTYwttVrNgRxaswXnL/bhyC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usar`
--
ALTER TABLE `usar`
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
-- AUTO_INCREMENT for table `usar`
--
ALTER TABLE `usar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
