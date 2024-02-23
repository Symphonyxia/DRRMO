-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 09:07 AM
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
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `equip_id` int(11) NOT NULL,
  `equip_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equip_id`, `equip_name`) VALUES
(923, 'Self-Contained Breathing Apparatus'),
(924, 'Electric Spreader'),
(925, 'Electric Cutter'),
(926, 'Electric Ram'),
(927, 'Hydraulic Hand Pump'),
(928, 'Hydraulic Combi-tool'),
(929, 'Hydraulic Ram'),
(930, 'Chainsaw'),
(931, 'Cutters Edge'),
(932, 'High Pressure Lift Bag'),
(933, 'High Lift Jack'),
(934, 'Remote Area Lighting System RALS'),
(935, 'Ventilation Blower'),
(936, 'Tripod and Winch'),
(937, 'Rope Rescue Equipment'),
(938, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_record`
--

CREATE TABLE `equipment_record` (
  `id` int(11) NOT NULL,
  `equip_id` int(11) NOT NULL,
  `equip_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_record`
--

INSERT INTO `equipment_record` (`id`, `equip_id`, `equip_status`) VALUES
(102, 923, 'used'),
(102, 924, 'used'),
(102, 925, 'checked'),
(102, 926, 'checked'),
(102, 927, 'missing'),
(102, 928, 'missing'),
(102, 929, 'checked'),
(102, 930, 'checked'),
(102, 931, 'used'),
(102, 932, 'used'),
(102, 933, 'checked'),
(102, 934, 'checked'),
(102, 935, 'missing'),
(102, 936, 'missing'),
(102, 937, 'checked'),
(102, 938, 'checked');

-- --------------------------------------------------------

--
-- Table structure for table `usar`
--

CREATE TABLE `usar` (
  `id` int(11) NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `irf_no` int(50) DEFAULT NULL,
  `incident_loc` varchar(255) DEFAULT NULL,
  `response_type` varchar(100) DEFAULT NULL,
  `loc_type` varchar(100) DEFAULT NULL,
  `call_type` varchar(100) DEFAULT NULL,
  `srr_services` varchar(100) DEFAULT NULL,
  `incident_comm` varchar(100) DEFAULT NULL,
  `agency` varchar(100) DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `incident` varchar(255) DEFAULT NULL,
  `weather` varchar(50) DEFAULT NULL,
  `cpr` varchar(50) DEFAULT NULL,
  `defib` varchar(50) DEFAULT NULL,
  `terrain` varchar(50) DEFAULT NULL,
  `casualty` varchar(50) DEFAULT NULL,
  `ambulance_req` varchar(50) DEFAULT NULL,
  `interventions` varchar(50) DEFAULT NULL,
  `map_loc` varchar(150) DEFAULT NULL,
  `latitude` decimal(50,0) DEFAULT NULL,
  `longitude` decimal(50,0) DEFAULT NULL,
  `dist_ratio` decimal(50,0) DEFAULT NULL,
  `recommendation` varchar(255) DEFAULT NULL,
  `narrative` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `no_cas` int(11) DEFAULT NULL,
  `amb_spec` varchar(255) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `cycle` varchar(255) NOT NULL,
  `cr` int(11) NOT NULL,
  `enr` int(11) NOT NULL,
  `atscn` int(11) NOT NULL,
  `descn` int(11) NOT NULL,
  `insvc` int(11) NOT NULL,
  `optm` varchar(25) NOT NULL,
  `end` int(11) NOT NULL,
  `begin` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `prep_by` varchar(50) NOT NULL,
  `endorsed_by` varchar(50) NOT NULL,
  `witness` varchar(50) NOT NULL,
  `crew` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usar`
--

INSERT INTO `usar` (`id`, `unit`, `irf_no`, `incident_loc`, `response_type`, `loc_type`, `call_type`, `srr_services`, `incident_comm`, `agency`, `position`, `address`, `contact_no`, `incident`, `weather`, `cpr`, `defib`, `terrain`, `casualty`, `ambulance_req`, `interventions`, `map_loc`, `latitude`, `longitude`, `dist_ratio`, `recommendation`, `narrative`, `images`, `date`, `no_cas`, `amb_spec`, `time_start`, `time_end`, `cycle`, `cr`, `enr`, `atscn`, `descn`, `insvc`, `optm`, `end`, `begin`, `total`, `prep_by`, `endorsed_by`, `witness`, `crew`, `designation`) VALUES
(102, 'test', 12345, 'test', 'Standby', 'residence', 'fire', 'illumination', 'test', 'test', 'test', 'test', 12345, 'test', 'light - signal_1', 'yes', 'yes', 'concrete', 'yes', 'yes', 'colstruct', 'test', 5, 5, 5, 'test', 'test', '../../resources/gallery/hope.png', '2024-02-23', 1, 'test', '11:17:00', '23:17:00', 'test', 4, 2, 2, 2, 2, 'test', 10, 5, 5, 'test', 'test', 'test', '', '');

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
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `registration_date`) VALUES
(1, 'Mary', 'Tabunlupa', 'tabunlupamaryhope@gmail.com', '$2y$10$jzWs1umaVgKFIWb3Z7jgzuzNxa1KmNvTYwttVrNgRxaswXnL/bhyC', '0000-00-00'),
(2, 'test', 'test', 'test@gmail.com', '$2y$10$JhbpnGngtmKczLnBGbrfx.GcRLRQTb3t3ZWDDMg2dBbjGBI4Lz2fm', '0000-00-00'),
(3, 'test', 'test', 'hope@gmail.com', '$2y$10$EKzdjG9Xrmel7lKfXE9XTecJfww5m7e66zcFZbKgBOuiM/zUoe/9a', '0000-00-00'),
(4, 'qq', 'qw', 'q@gmail.com', '$2y$10$X3cheDTBsBUaTVJeQQq5iuJNmy9r/JfYFbqouFVERT0Qx.NShvMLG', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equip_id`);

--
-- Indexes for table `equipment_record`
--
ALTER TABLE `equipment_record`
  ADD PRIMARY KEY (`id`,`equip_id`),
  ADD KEY `equipments` (`equip_id`);

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
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `usar`
--
ALTER TABLE `usar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment_record`
--
ALTER TABLE `equipment_record`
  ADD CONSTRAINT `equipment_record_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usar` (`id`),
  ADD CONSTRAINT `equipment_record_ibfk_2` FOREIGN KEY (`equip_id`) REFERENCES `equipments` (`equip_id`),
  ADD CONSTRAINT `fk_equipment_record_usar` FOREIGN KEY (`id`) REFERENCES `usar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
