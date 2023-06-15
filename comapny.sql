-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 05:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comapny`
--

-- --------------------------------------------------------

--
-- Table structure for table `cross reference`
--

CREATE TABLE `cross reference` (
  `P_name` varchar(20) NOT NULL,
  `P_number` int(11) NOT NULL,
  `SSN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cross reference2`
--

CREATE TABLE `cross reference2` (
  `Name` varchar(20) NOT NULL,
  `Number` int(11) NOT NULL,
  `SSN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cross refernce1`
--

CREATE TABLE `cross refernce1` (
  `Name` varchar(20) NOT NULL,
  `Number` int(11) NOT NULL,
  `P_name` varchar(20) NOT NULL,
  `P_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Name` varchar(20) NOT NULL,
  `Number` int(11) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Manager` varchar(20) NOT NULL,
  `Manager_start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Name`, `Number`, `Location`, `Manager`, `Manager_start_date`) VALUES
('rohith', 23, 'vijayawda', 'ramesh', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dependent`
--

CREATE TABLE `dependent` (
  `Employee` varchar(20) NOT NULL,
  `Dependent_Name` varchar(20) NOT NULL,
  `D_Sex` varchar(20) NOT NULL,
  `D_Birth_Date` date NOT NULL,
  `Relationship` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dependent`
--

INSERT INTO `dependent` (`Employee`, `Dependent_Name`, `D_Sex`, `D_Birth_Date`, `Relationship`) VALUES
('ramesh', 'ravi', 'male', '0000-00-00', 'father');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `E_name` varchar(20) NOT NULL,
  `SSN` int(11) NOT NULL,
  `Sex` varchar(20) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Salary` int(11) NOT NULL,
  `Birth date` date NOT NULL,
  `Department` varchar(20) NOT NULL,
  `Supervisor` varchar(20) NOT NULL,
  `works_on_project` varchar(20) NOT NULL,
  `works_on_hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`E_name`, `SSN`, `Sex`, `Address`, `Salary`, `Birth date`, `Department`, `Supervisor`, `works_on_project`, `works_on_hours`) VALUES
('daniel', 1, 'female', 'bdeuhdhdiwjdfriojfuh', 29900, '0000-00-00', 'cse', 'ramesh', 'hema', 23);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `P_name` varchar(20) NOT NULL,
  `P_number` int(11) NOT NULL,
  `P_location` varchar(20) NOT NULL,
  `Controlling department` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`P_name`, `P_number`, `P_location`, `Controlling department`) VALUES
('ghty', 12456, 'hyderabad', 'cse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cross reference`
--
ALTER TABLE `cross reference`
  ADD PRIMARY KEY (`P_name`,`P_number`,`SSN`),
  ADD KEY `cross reference_ibfk_2` (`SSN`),
  ADD KEY `P_number` (`P_number`);

--
-- Indexes for table `cross reference2`
--
ALTER TABLE `cross reference2`
  ADD PRIMARY KEY (`Name`,`Number`,`SSN`),
  ADD KEY `cross reference2_ibfk_2` (`SSN`);

--
-- Indexes for table `cross refernce1`
--
ALTER TABLE `cross refernce1`
  ADD PRIMARY KEY (`Name`,`Number`,`P_name`),
  ADD KEY `cross refernce1_ibfk_2` (`P_name`),
  ADD KEY `P_number` (`P_number`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Name`,`Number`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`SSN`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`P_name`,`P_number`),
  ADD KEY `P_number` (`P_number`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cross reference`
--
ALTER TABLE `cross reference`
  ADD CONSTRAINT `cross reference_ibfk_1` FOREIGN KEY (`P_name`) REFERENCES `project` (`P_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cross reference_ibfk_2` FOREIGN KEY (`SSN`) REFERENCES `employee` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cross reference_ibfk_3` FOREIGN KEY (`P_number`) REFERENCES `project` (`P_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cross reference2`
--
ALTER TABLE `cross reference2`
  ADD CONSTRAINT `cross reference2_ibfk_1` FOREIGN KEY (`Name`) REFERENCES `department` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cross reference2_ibfk_2` FOREIGN KEY (`SSN`) REFERENCES `employee` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cross refernce1`
--
ALTER TABLE `cross refernce1`
  ADD CONSTRAINT `cross refernce1_ibfk_1` FOREIGN KEY (`Name`) REFERENCES `department` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cross refernce1_ibfk_2` FOREIGN KEY (`P_name`) REFERENCES `project` (`P_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cross refernce1_ibfk_3` FOREIGN KEY (`P_number`) REFERENCES `project` (`P_number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
