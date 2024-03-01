-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 04:58 AM
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
(1435, 'Self-Contained Breathing Apparatus'),
(1436, 'Electric Spreader'),
(1437, 'Electric Cutter'),
(1438, 'Electric Ram'),
(1439, 'Hydraulic Hand Pump'),
(1440, 'Hydraulic Combi-tool'),
(1441, 'Hydraulic Ram'),
(1442, 'Chainsaw'),
(1443, 'Cutters Edge'),
(1444, 'High Pressure Lift Bag'),
(1445, 'High Lift Jack'),
(1446, 'Remote Area Lighting System RALS'),
(1447, 'Ventilation Blower'),
(1448, 'Tripod and Winch'),
(1449, 'Rope Rescue Equipment'),
(1450, 'Other'),
(1451, 'Self-Contained Breathing Apparatus'),
(1452, 'Electric Spreader'),
(1453, 'Electric Cutter'),
(1454, 'Electric Ram'),
(1455, 'Hydraulic Hand Pump'),
(1456, 'Hydraulic Combi-tool'),
(1457, 'Hydraulic Ram'),
(1458, 'Chainsaw'),
(1459, 'Cutters Edge'),
(1460, 'High Pressure Lift Bag'),
(1461, 'High Lift Jack'),
(1462, 'Remote Area Lighting System RALS'),
(1463, 'Ventilation Blower'),
(1464, 'Tripod and Winch'),
(1465, 'Rope Rescue Equipment'),
(1466, 'Other'),
(1467, 'Self-Contained Breathing Apparatus'),
(1468, 'Electric Spreader'),
(1469, 'Electric Cutter'),
(1470, 'Electric Ram'),
(1471, 'Hydraulic Hand Pump'),
(1472, 'Hydraulic Combi-tool'),
(1473, 'Hydraulic Ram'),
(1474, 'Chainsaw'),
(1475, 'Cutters Edge'),
(1476, 'High Pressure Lift Bag'),
(1477, 'High Lift Jack'),
(1478, 'Remote Area Lighting System RALS'),
(1479, 'Ventilation Blower'),
(1480, 'Tripod and Winch'),
(1481, 'Rope Rescue Equipment'),
(1482, 'Other'),
(1483, 'Self-Contained Breathing Apparatus'),
(1484, 'Electric Spreader'),
(1485, 'Electric Cutter'),
(1486, 'Electric Ram'),
(1487, 'Hydraulic Hand Pump'),
(1488, 'Hydraulic Combi-tool'),
(1489, 'Hydraulic Ram'),
(1490, 'Chainsaw'),
(1491, 'Cutters Edge'),
(1492, 'High Pressure Lift Bag'),
(1493, 'High Lift Jack'),
(1494, 'Remote Area Lighting System RALS'),
(1495, 'Ventilation Blower'),
(1496, 'Tripod and Winch'),
(1497, 'Rope Rescue Equipment'),
(1498, 'Other'),
(1499, 'Self-Contained Breathing Apparatus'),
(1500, 'Electric Spreader'),
(1501, 'Electric Cutter'),
(1502, 'Electric Ram'),
(1503, 'Hydraulic Hand Pump'),
(1504, 'Hydraulic Combi-tool'),
(1505, 'Hydraulic Ram'),
(1506, 'Chainsaw'),
(1507, 'Cutters Edge'),
(1508, 'High Pressure Lift Bag'),
(1509, 'High Lift Jack'),
(1510, 'Remote Area Lighting System RALS'),
(1511, 'Ventilation Blower'),
(1512, 'Tripod and Winch'),
(1513, 'Rope Rescue Equipment'),
(1514, 'Other'),
(1515, 'Self-Contained Breathing Apparatus'),
(1516, 'Electric Spreader'),
(1517, 'Electric Cutter'),
(1518, 'Electric Ram'),
(1519, 'Hydraulic Hand Pump'),
(1520, 'Hydraulic Combi-tool'),
(1521, 'Hydraulic Ram'),
(1522, 'Chainsaw'),
(1523, 'Cutters Edge'),
(1524, 'High Pressure Lift Bag'),
(1525, 'High Lift Jack'),
(1526, 'Remote Area Lighting System RALS'),
(1527, 'Ventilation Blower'),
(1528, 'Tripod and Winch'),
(1529, 'Rope Rescue Equipment'),
(1530, 'Other'),
(1531, 'Self-Contained Breathing Apparatus'),
(1532, 'Electric Spreader'),
(1533, 'Electric Cutter'),
(1534, 'Electric Ram'),
(1535, 'Hydraulic Hand Pump'),
(1536, 'Hydraulic Combi-tool'),
(1537, 'Hydraulic Ram'),
(1538, 'Chainsaw'),
(1539, 'Cutters Edge'),
(1540, 'High Pressure Lift Bag'),
(1541, 'High Lift Jack'),
(1542, 'Remote Area Lighting System RALS'),
(1543, 'Ventilation Blower'),
(1544, 'Tripod and Winch'),
(1545, 'Rope Rescue Equipment'),
(1546, 'Other'),
(1547, 'Self-Contained Breathing Apparatus'),
(1548, 'Electric Spreader'),
(1549, 'Electric Cutter'),
(1550, 'Electric Ram'),
(1551, 'Hydraulic Hand Pump'),
(1552, 'Hydraulic Combi-tool'),
(1553, 'Hydraulic Ram'),
(1554, 'Chainsaw'),
(1555, 'Cutters Edge'),
(1556, 'High Pressure Lift Bag'),
(1557, 'High Lift Jack'),
(1558, 'Remote Area Lighting System RALS'),
(1559, 'Ventilation Blower'),
(1560, 'Tripod and Winch'),
(1561, 'Rope Rescue Equipment'),
(1562, 'Other');

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
(136, 1467, 'Used'),
(136, 1468, 'Used'),
(136, 1469, 'Used'),
(136, 1470, 'Checked'),
(136, 1471, 'Checked'),
(136, 1472, 'Checked'),
(136, 1473, 'Used'),
(136, 1474, 'Used'),
(136, 1475, 'Used'),
(136, 1476, 'Checked'),
(136, 1477, 'Checked'),
(136, 1478, 'Checked'),
(136, 1479, 'Used'),
(136, 1480, 'Used'),
(136, 1481, 'Used'),
(136, 1482, 'Missing'),
(137, 1483, 'Used'),
(137, 1484, 'Used'),
(137, 1485, 'Used'),
(137, 1486, 'Used'),
(137, 1487, 'Used'),
(137, 1488, 'Used'),
(137, 1489, 'Used'),
(137, 1490, 'Used'),
(137, 1491, 'Used'),
(137, 1492, 'Used'),
(137, 1493, 'Used'),
(137, 1494, 'Used'),
(137, 1495, 'Used'),
(137, 1496, 'Used'),
(137, 1497, 'Used'),
(137, 1498, 'Used'),
(138, 1499, NULL),
(138, 1500, NULL),
(138, 1501, NULL),
(138, 1502, NULL),
(138, 1503, NULL),
(138, 1504, NULL),
(138, 1505, NULL),
(138, 1506, NULL),
(138, 1507, NULL),
(138, 1508, NULL),
(138, 1509, NULL),
(138, 1510, NULL),
(138, 1511, NULL),
(138, 1512, NULL),
(138, 1513, NULL),
(138, 1514, NULL),
(139, 1515, 'Used'),
(139, 1516, 'Used'),
(139, 1517, 'Used'),
(139, 1518, 'Used'),
(139, 1519, 'Used'),
(139, 1520, 'Used'),
(139, 1521, 'Used'),
(139, 1522, 'Used'),
(139, 1523, 'Used'),
(139, 1524, 'Used'),
(139, 1525, 'Used'),
(139, 1526, 'Used'),
(139, 1527, 'Used'),
(139, 1528, 'Used'),
(139, 1529, 'Used'),
(139, 1530, 'Used'),
(140, 1531, NULL),
(140, 1532, NULL),
(140, 1533, NULL),
(140, 1534, NULL),
(140, 1535, NULL),
(140, 1536, NULL),
(140, 1537, NULL),
(140, 1538, NULL),
(140, 1539, NULL),
(140, 1540, NULL),
(140, 1541, NULL),
(140, 1542, NULL),
(140, 1543, NULL),
(140, 1544, NULL),
(140, 1545, NULL),
(140, 1546, NULL),
(141, 1547, NULL),
(141, 1548, NULL),
(141, 1549, NULL),
(141, 1550, NULL),
(141, 1551, NULL),
(141, 1552, NULL),
(141, 1553, NULL),
(141, 1554, NULL),
(141, 1555, NULL),
(141, 1556, NULL),
(141, 1557, NULL),
(141, 1558, NULL),
(141, 1559, NULL),
(141, 1560, NULL),
(141, 1561, NULL),
(141, 1562, NULL);

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
  `weather` varchar(50) DEFAULT NULL,
  `warning` varchar(255) NOT NULL,
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
  `call_received` varchar(100) NOT NULL,
  `enroute` varchar(100) NOT NULL,
  `at_scene` varchar(100) NOT NULL,
  `depart_scene` varchar(100) NOT NULL,
  `in_service` varchar(100) NOT NULL,
  `operation_team` varchar(100) NOT NULL,
  `end_mileage` int(11) NOT NULL,
  `begin_mileage` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `prep_by` varchar(50) NOT NULL,
  `endorsed_by` varchar(50) NOT NULL,
  `witnesses` varchar(50) NOT NULL,
  `crew` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usar`
--

INSERT INTO `usar` (`id`, `unit`, `irf_no`, `incident_loc`, `response_type`, `loc_type`, `call_type`, `srr_services`, `incident_commander`, `agency`, `position`, `address`, `contact_no`, `incident`, `weather`, `warning`, `cpr`, `defib`, `terrain`, `casualty`, `ambulance_req`, `interventions`, `map_loc`, `latitude`, `longitude`, `dist_ratio`, `recommendation`, `narrative`, `images`, `date`, `no_cas`, `amb_spec`, `time_start`, `time_end`, `cycle`, `call_received`, `enroute`, `at_scene`, `depart_scene`, `in_service`, `operation_team`, `end_mileage`, `begin_mileage`, `total`, `prep_by`, `endorsed_by`, `witnesses`, `crew`, `designation`) VALUES
(136, 'test', 123, 'test', 'Response to Scene', 'Hospital', ' ', 'Others Emergencies', 'test', 'test', 'test', 'test', 123, 'test', 'Normal', 'Signal no. 1', NULL, NULL, 'Dirt', NULL, NULL, 'Collapse Structure,Confined Space Rescue,Water Res', 'test', 3, 2, 3, 'test', '', '../../resources/gallery/admin.png', '2024-03-01', 0, '', '00:00:00', '00:00:00', '', 'test', 'test', 'test', 'test', 'test', 'test', 5, 1, 4, 'test', 'test', 'test', 'test1, test2, , , , ', 'test1, test2, , , , '),
(137, 'test', 0, 'test', 'hi', 'Airport', 'Vehicular Accident', 'Marpol', 'test', 'test', 'test', 'test', 123, 'test', 'Normal', 'Signal no. 4', 'No', 'Yes', 'Concrete', 'Yes', 'Yes', 'Collapse Structure Rescue,Boom,Barricade,Confined ', 'test', 4, 6, 4, 'test', 'test', '../../resources/gallery/computer.png', '2024-03-01', 1, 'test', '11:17:00', '23:17:00', '1', 'test', 'test', 'test', 'test', 'test', 'test', 1, 1, 0, 'test', 'test', 'test', 'test1, test2, , , , ', 'test1, test2, , , , '),
(138, '', 0, '', 'Standby', 'Nursing Home', 'Vehicular Accident', 'Urban Emergencies', '', '', '', '', 0, '', '', 'No Warning', NULL, NULL, '', NULL, NULL, '', '', 0, 0, 0, '', '', NULL, '0000-00-00', 0, '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', ', , , , , ', ', , , , , '),
(139, 'test', 123, 'test', 'hi', 'hi', ' hi', 'Others Emergencies', 'test', 'test', 'test', 'test', 123, 'test', 'Hot/Humid', 'Signal no. 1', 'Yes', 'Yes', 'Dirt', 'Yes', 'Yes', 'Collapse Structure Rescue,Boom,Barricade,Confined ', 'test', 1, 1, 1, 'test', 'test', '../../resources/gallery/database.png', '2024-03-01', 1, 'test', '11:47:00', '23:47:00', '1', 'test', 'test', 'test', 'test', 'test', 'test', 7, 3, 4, 'test', 'test', 'test', 'test1, test2, , , , ', 'test1, test2, , , , '),
(140, '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', 'No Warning', NULL, NULL, '', NULL, NULL, 'colstruct,boom,confined,outrigger,water,tower,vehi', '', 0, 0, 0, '', '', NULL, '0000-00-00', 0, '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', ', , , , , ', ', , , , , '),
(141, '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', 'No Warning', NULL, NULL, '', NULL, NULL, 'patient,winch,angle,hazmat', '', 0, 0, 0, '', '', NULL, '0000-00-00', 0, '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', ', , , , , ', ', , , , , ');

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
  MODIFY `equip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1563;

--
-- AUTO_INCREMENT for table `usar`
--
ALTER TABLE `usar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

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
