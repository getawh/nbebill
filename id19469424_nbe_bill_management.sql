-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2022 at 05:17 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19469424_nbe_bill_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `first_name`, `last_name`, `email_address`) VALUES
('admin', 'admin', 'admin', 'panel', 'getaw.hab@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ownership_history`
--

CREATE TABLE `ownership_history` (
  `service_number` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL,
  `owner` varchar(80) NOT NULL,
  `remark` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ownership_history`
--

INSERT INTO `ownership_history` (`service_number`, `from_date`, `to_date`, `owner`, `remark`) VALUES
(908783813, '2022-08-02', '2022-08-29', 'TEKLU ABEBE', 'MISSUSE'),
(908783813, '2022-09-01', '2022-09-05', 'ABEBAW DEREJE', 'TEST PURPOSE'),
(908783813, '2022-09-06', '2022-09-28', 'GETNET WELDETSEHAY', 'LAST TEST'),
(908783813, '2022-09-29', NULL, 'GETABALEW TEMESGEN', 'MISS-USE'),
(968574510, '2022-08-10', NULL, 'TAMIRAT GIRMA', 'NEW'),
(988564343, '2022-09-06', NULL, 'NATNAEL MENGISTU', 'NEW');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `service_number` int(11) NOT NULL,
  `date` date NOT NULL,
  `payed_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`service_number`, `date`, `payed_amount`) VALUES
(908783813, '2022-08-01', 2999),
(908783813, '2022-08-02', 3000),
(908783813, '2022-08-03', 4000),
(908783813, '2022-08-04', 4100),
(908783813, '2022-08-05', 7000),
(968574510, '2022-08-28', 7500),
(988564343, '2022-09-16', 2555);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `service_number` int(11) NOT NULL,
  `service_type` varchar(60) NOT NULL,
  `password` varchar(80) NOT NULL,
  `owner_name` varchar(80) NOT NULL,
  `last_renew_date` date DEFAULT NULL,
  `last_payed_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`service_number`, `service_type`, `password`, `owner_name`, `last_renew_date`, `last_payed_amount`) VALUES
(908783813, 'VOICE SIM', '908783813', 'GETABALEW TEMESGEN', '2022-08-05', 7000),
(965713678, 'VOICE SIM', '965713678', 'TAMIRU BELACHEW', '2022-07-05', 2000),
(968574510, 'NBE VPN', 'tamirat', 'TAMIRAT GIRMA', '2022-08-28', 7500),
(988564343, 'DATA SIM', 'nati', 'NATNAEL MENGISTU', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `service_type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`service_type`) VALUES
('DATA SIM'),
('DONGLE'),
('NBE VPN'),
('VOICE SIM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ownership_history`
--
ALTER TABLE `ownership_history`
  ADD PRIMARY KEY (`service_number`,`from_date`,`owner`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`service_number`,`date`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`service_number`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`service_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
