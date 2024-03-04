-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 07:11 AM
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
(1659, 'Self-Contained Breathing Apparatus'),
(1660, 'Electric Spreader'),
(1661, 'Electric Cutter'),
(1662, 'Electric Ram'),
(1663, 'Hydraulic Hand Pump'),
(1664, 'Hydraulic Combi-tool'),
(1665, 'Hydraulic Ram'),
(1666, 'Chainsaw'),
(1667, 'Cutters Edge'),
(1668, 'High Pressure Lift Bag'),
(1669, 'High Lift Jack'),
(1670, 'Remote Area Lighting System RALS'),
(1671, 'Ventilation Blower'),
(1672, 'Tripod and Winch'),
(1673, 'Rope Rescue Equipment'),
(1674, 'Other');

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
(148, 1659, 'Used'),
(148, 1660, 'Checked'),
(148, 1661, 'Checked'),
(148, 1662, 'Used'),
(148, 1663, 'Used'),
(148, 1664, 'Checked'),
(148, 1665, 'Checked'),
(148, 1666, 'Checked'),
(148, 1667, 'Used'),
(148, 1668, 'Used'),
(148, 1669, 'Used'),
(148, 1670, 'Used'),
(148, 1671, 'Checked'),
(148, 1672, 'Checked'),
(148, 1673, 'Used'),
(148, 1674, 'Used');

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
  `incident_commander` varchar(100) DEFAULT NULL,
  `agency` varchar(100) DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  `incident` varchar(255) DEFAULT NULL,
  `weather` varchar(255) DEFAULT NULL,
  `warning` varchar(255) NOT NULL,
  `cpr` varchar(50) DEFAULT NULL,
  `defib` varchar(50) DEFAULT NULL,
  `terrain` varchar(50) DEFAULT NULL,
  `casualty` varchar(50) DEFAULT NULL,
  `ambulance_req` varchar(50) DEFAULT NULL,
  `interventions` varchar(255) DEFAULT NULL,
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
  `call_received` varchar(100) NOT NULL,
  `enroute` varchar(100) NOT NULL,
  `at_scene` varchar(100) NOT NULL,
  `depart_scene` varchar(100) NOT NULL,
  `in_service` varchar(100) NOT NULL,
  `operation_team` varchar(100) NOT NULL,
  `end_mileage` int(11) NOT NULL,
  `begin_mileage` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `prep_by` varchar(255) NOT NULL,
  `endorsed_by` varchar(255) NOT NULL,
  `witnesses` varchar(255) NOT NULL,
  `crew` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usar`
--

INSERT INTO `usar` (`id`, `unit`, `irf_no`, `incident_loc`, `response_type`, `loc_type`, `call_type`, `srr_services`, `incident_commander`, `agency`, `position`, `address`, `contact_no`, `incident`, `weather`, `warning`, `cpr`, `defib`, `terrain`, `casualty`, `ambulance_req`, `interventions`, `map_loc`, `latitude`, `longitude`, `dist_ratio`, `recommendation`, `narrative`, `images`, `date`, `no_cas`, `amb_spec`, `time_start`, `time_end`, `cycle`, `call_received`, `enroute`, `at_scene`, `depart_scene`, `in_service`, `operation_team`, `end_mileage`, `begin_mileage`, `total`, `prep_by`, `endorsed_by`, `witnesses`, `crew`, `designation`) VALUES
(148, ' test', 123, 'test', 'Response to Scene', 'Hospital', 'Vehicular Accident', 'Natural Disaster Response', 'test', 'test', 'test', 'test', 123, 'test', 'Normal,Hot/Humid,Cold,Light Rain', 'Signal no. 1', 'Yes', 'Yes', 'Dirt,Mud,Sand', 'Yes', 'Yes', 'colstruct,boom,barricade,confined,outrigger,structural,water,tower,vehicular,patient,winch,wildlife, ,hazmat,generator', 'test', 1, 1, 1, 'test', 'test', '../../resources/gallery/hope.png', '2024-03-04', 1, 'test', '14:07:00', '02:07:00', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 4, 3, 1, 'test', 'test', 'test', 'test1,test2,,,,', 'test1,test2,,,,');

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
  MODIFY `equip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1675;

--
-- AUTO_INCREMENT for table `usar`
--
ALTER TABLE `usar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

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
