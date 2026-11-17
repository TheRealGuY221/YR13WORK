-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2026 at 09:17 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `date_time_tester`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appid` int NOT NULL,
  `datetime` datetime NOT NULL,
  `bookedon` datetime NOT NULL,
  `notes` text,
  `proid` int NOT NULL,
  `patientid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientid` int NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `sname` text NOT NULL,
  `addressln1` text NOT NULL,
  `addressln2` text NOT NULL,
  `county` text NOT NULL,
  `postcode` text NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `phone_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientid`, `email`, `password`, `fname`, `sname`, `addressln1`, `addressln2`, `county`, `postcode`, `dob`, `gender`, `phone_number`) VALUES
(1, 'liamstephens380@gmail.com', '$2y$10$EGhuBWnQyF4ybRG2xzyf3OkhLG2OLpyF6esSKeDbZ.adOUWiUomoG', 'Liam', 'Stephens', '19 Tingle View', '12', '12', 'LS12 6LJ', '2026-11-04', 'male', '07765545691');

-- --------------------------------------------------------

--
-- Table structure for table `professional`
--

CREATE TABLE `professional` (
  `proid` int NOT NULL,
  `role` text NOT NULL,
  `fname` text NOT NULL,
  `sname` text NOT NULL,
  `roomno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `professional`
--

INSERT INTO `professional` (`proid`, `role`, `fname`, `sname`, `roomno`) VALUES
(1, 'Doctor', 'Liam', 'Stephens', '1222'),
(2, 'Doctor', 'Neyen', 'Yahoo', '1212431'),
(3, 'Doctor', 'Albert', 'Eienstien', '12313'),
(4, 'Nurse', 'we', 'ew', '1234'),
(5, 'Nurse', 're', 'er', '12344'),
(6, 'Nurse', 'RT', 'TR', '13134');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appid`),
  ADD KEY `proid` (`proid`),
  ADD KEY `patientid` (`patientid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientid`);

--
-- Indexes for table `professional`
--
ALTER TABLE `professional`
  ADD PRIMARY KEY (`proid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `professional`
--
ALTER TABLE `professional`
  MODIFY `proid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patientid`) REFERENCES `patient` (`patientid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`proid`) REFERENCES `professional` (`proid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
