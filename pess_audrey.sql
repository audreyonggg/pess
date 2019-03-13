-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 09:24 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pess_audrey`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispatch`
--

CREATE TABLE `dispatch` (
  `incidentID` int(11) NOT NULL,
  `patrolCarID` varchar(10) NOT NULL,
  `timeDispatched` datetime NOT NULL,
  `timeArrived` datetime NOT NULL,
  `timeCompleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispatch`
--

INSERT INTO `dispatch` (`incidentID`, `patrolCarID`, `timeDispatched`, `timeArrived`, `timeCompleted`) VALUES
(25, '<br />\r\n<b', '2019-02-28 14:19:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '<br />\r\n<b', '2019-02-28 14:19:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '<br />\r\n<b', '2019-02-28 14:19:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '<br />\r\n<b', '2019-02-28 14:19:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '<br />\r\n<b', '2019-02-28 14:22:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '<br />\r\n<b', '2019-02-28 14:22:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '<br />\r\n<b', '2019-02-28 14:22:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '<br />\r\n<b', '2019-02-28 14:22:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '<br />\r\n<b', '2019-02-28 14:25:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'QX1111J', '2019-02-28 14:25:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'QX1111J', '2019-02-28 14:27:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'QX3456B', '2019-02-28 14:28:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'QX3456B', '2019-02-28 14:28:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'QX8923T', '2019-02-28 14:29:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'QX8923T', '2019-02-28 14:30:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'QX8923T', '2019-02-28 14:32:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `incidentID` int(11) NOT NULL,
  `callerName` varchar(30) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `incidentTypeID` varchar(3) NOT NULL,
  `incidentLocation` varchar(50) NOT NULL,
  `incidentDesc` varchar(100) NOT NULL,
  `incidentStatusID` varchar(1) NOT NULL,
  `timeCalled` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`incidentID`, `callerName`, `phoneNumber`, `incidentTypeID`, `incidentLocation`, `incidentDesc`, `incidentStatusID`, `timeCalled`) VALUES
(1, 'shu mei', '67676767', '', 'CW', '', '1', '2019-02-26 00:51:47'),
(2, 'li yuen', '12345678', '030', 'CE', 'Help', '1', '2019-02-26 03:57:38'),
(3, 'z', '23134567', '050', 'CC', 'feweweccv', '1', '2019-02-27 05:42:42'),
(4, 'z', '23134567', '050', 'CC', 'feweweccv', '1', '2019-02-27 05:43:15'),
(5, 'z', '', '050', 'CC', 'feweweccv', '1', '2019-02-27 06:10:59'),
(6, 'z', '23134567', '050', 'CC', 'feweweccv', '1', '2019-02-27 06:11:21'),
(7, 'shu mei', '12345678', '030', 'CW', 'ss', '1', '2019-02-28 03:04:04'),
(8, 'shu mei', '12345678', '030', 'CW', 'ss', '1', '2019-02-28 03:04:49'),
(9, 'shu mei', '12345678', '', 'CW', '', '1', '2019-02-28 03:24:50'),
(10, 'shu mei', '12345678', '', 'CW', '', '1', '2019-02-28 03:25:44'),
(11, 'shu mei', '12345678', '', 'CW', '', '1', '2019-02-28 03:31:13'),
(12, 'shu mei', '12345678', '', 'CW', '', '1', '2019-02-28 03:31:19'),
(13, '<br />\r\n<b>Notice</b>:  Undefi', '<br />\r\n<b', '', '<br />\r\n<b>Notice</b>:  Undefined index: location ', '', '2', '2019-02-28 03:37:43'),
(14, 'shu mei', '12345678', '', 'CW', '', '2', '2019-02-28 03:38:14'),
(15, 'shu mei', '12345678', '', 'CW', '', '2', '2019-02-28 03:39:53'),
(16, 'shu mei', '12345678', '', 'CW', '', '2', '2019-02-28 03:41:18'),
(17, 'shu mei', '12345678', '', 'CW', '', '2', '2019-02-28 03:42:48'),
(18, 'shu mei', '12345678', '', 'CW', '', '2', '2019-02-28 03:44:58'),
(19, 'shu mei', '12345678', '', 'CW', '', '2', '2019-02-28 03:46:34'),
(20, 'li yuen', '67676767', '', 'CW', '', '2', '2019-02-28 03:57:22'),
(21, 'li yuen', '67676767', '', 'CW', '', '2', '2019-02-28 06:17:14'),
(22, 'shu mei', '67676767', '030', 'CW', '', '2', '2019-02-28 06:17:37'),
(23, 'shu mei', '67676767', '030', 'CW', '', '2', '2019-02-28 06:18:45'),
(24, 'li yuen', '67676767', '030', 'CW', 'ppp', '2', '2019-02-28 06:19:16'),
(25, 'li yuen', '67676767', '030', 'CW', 'ppp', '2', '2019-02-28 06:19:38'),
(26, 'li yuen', '67676767', '030', 'CW', 'ppp', '2', '2019-02-28 06:19:42'),
(27, 'li yuen', '67676767', '030', 'CW', 'ppp', '2', '2019-02-28 06:19:45'),
(28, 'li yuen', '67676767', '030', 'CW', 'ppp', '2', '2019-02-28 06:19:51'),
(29, 'li yuen', '12345678', '020', 'CW', 'kkk', '2', '2019-02-28 06:22:12'),
(30, 'li yuen', '12345678', '020', 'CW', 'kkk', '2', '2019-02-28 06:22:46'),
(31, 'li yuen', '12345678', '020', 'CW', 'kkk', '2', '2019-02-28 06:22:52'),
(32, 'li yuen', '12345678', '020', 'CW', 'kkk', '1', '2019-02-28 06:22:53'),
(33, 'li yuen', '12345678', '020', 'CW', 'kkk', '2', '2019-02-28 06:22:57'),
(34, 'li yuen', '12345678', '020', 'CW', 'kkk', '2', '2019-02-28 06:25:37'),
(35, 'li yuen', '12345678', '020', 'CW', 'kkk', '2', '2019-02-28 06:25:39'),
(36, 'li yuen', '12345678', '020', 'CW', 'kkk', '2', '2019-02-28 06:27:59'),
(37, 'shu mei', '67676767', '040', 'CW', 'cvgh', '2', '2019-02-28 06:28:20'),
(38, 'shu mei', '67676767', '040', 'CW', 'cvgh', '2', '2019-02-28 06:28:42'),
(39, 'li yuen', '67676767', '030', 'CW', 'gbhnjkl', '2', '2019-02-28 06:29:12'),
(40, 'li yuen', '67676767', '030', 'CW', 'gbhnjkl', '2', '2019-02-28 06:30:36'),
(41, 'li yuen', '67676767', '030', 'CW', 'gbhnjkl', '2', '2019-02-28 06:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `incidenttype`
--

CREATE TABLE `incidenttype` (
  `incidentTypeID` varchar(3) NOT NULL,
  `incidentTypeDesc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incidenttype`
--

INSERT INTO `incidenttype` (`incidentTypeID`, `incidentTypeDesc`) VALUES
('010', 'Fire'),
('020', 'Riot'),
('030', 'Burglary'),
('040', 'Domestic Violent'),
('050', 'Fallen Tree'),
('060', 'Traffic Accident'),
('070', 'Loan Shark'),
('999', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `incident_status`
--

CREATE TABLE `incident_status` (
  `statusID` varchar(1) NOT NULL,
  `statusDesc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident_status`
--

INSERT INTO `incident_status` (`statusID`, `statusDesc`) VALUES
('1', 'Pending'),
('2', 'Dispatched'),
('3', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `patrolcar`
--

CREATE TABLE `patrolcar` (
  `patrolCarID` varchar(10) NOT NULL,
  `patrolcarStatusID` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patrolcar`
--

INSERT INTO `patrolcar` (`patrolCarID`, `patrolcarStatusID`) VALUES
('QX1111J', '1'),
('QX1234A', '3'),
('QX1342G', '1'),
('QX2222K', '4'),
('QX2288D', '3'),
('QX3456B', '1'),
('QX5555D', '2'),
('QX8723W', '2'),
('QX8769P', '4'),
('QX8923T', '1');

-- --------------------------------------------------------

--
-- Table structure for table `patrolcar_status`
--

CREATE TABLE `patrolcar_status` (
  `statusID` varchar(1) NOT NULL,
  `statusDesc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patrolcar_status`
--

INSERT INTO `patrolcar_status` (`statusID`, `statusDesc`) VALUES
('1', 'Dispatched'),
('2', 'Patrol'),
('3', 'Free'),
('4', 'Arrived');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispatch`
--
ALTER TABLE `dispatch`
  ADD PRIMARY KEY (`incidentID`,`patrolCarID`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`incidentID`);

--
-- Indexes for table `incidenttype`
--
ALTER TABLE `incidenttype`
  ADD PRIMARY KEY (`incidentTypeID`);

--
-- Indexes for table `incident_status`
--
ALTER TABLE `incident_status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `patrolcar`
--
ALTER TABLE `patrolcar`
  ADD PRIMARY KEY (`patrolCarID`);

--
-- Indexes for table `patrolcar_status`
--
ALTER TABLE `patrolcar_status`
  ADD PRIMARY KEY (`statusID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `incidentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
