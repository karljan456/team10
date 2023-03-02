-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 01, 2023 at 11:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tables`
--

-- --------------------------------------------------------

--
-- Table structure for table `epl21_22`
--

CREATE TABLE `epl21_22` (
  `id` int NOT NULL,
  `Pos` int DEFAULT NULL,
  `Team` varchar(50) DEFAULT NULL,
  `Pld` int DEFAULT NULL,
  `W` int DEFAULT NULL,
  `D` int DEFAULT NULL,
  `L` int DEFAULT NULL,
  `GF` int DEFAULT NULL,
  `GA` int DEFAULT NULL,
  `GD` varchar(10) DEFAULT NULL,
  `Pts` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `epl21_22`
--

INSERT INTO `epl21_22` (`id`, `Pos`, `Team`, `Pld`, `W`, `D`, `L`, `GF`, `GA`, `GD`, `Pts`) VALUES
(1, 1, 'Manchester City (C)', 38, 29, 6, 3, 99, 26, '+73', '93'),
(2, 2, 'Liverpool', 38, 28, 8, 2, 94, 26, '+68', '92'),
(3, 3, 'Chelsea', 38, 21, 11, 6, 76, 33, '+43', '74'),
(4, 4, 'Tottenham Hotspur', 38, 22, 5, 11, 69, 40, '+29', '71'),
(5, 5, 'Arsenal', 38, 22, 3, 13, 61, 48, '+13', '69'),
(6, 6, 'Manchester United', 38, 16, 10, 12, 57, 57, '0', '58'),
(7, 7, 'West Ham United', 38, 16, 8, 14, 60, 51, '+9', '56'),
(8, 8, 'Leicester City', 38, 14, 10, 14, 62, 59, '+3', '52'),
(9, 9, 'Brighton & Hove Albion', 38, 12, 15, 11, 42, 44, '−2', '51'),
(10, 10, 'Wolverhampton Wanderers', 38, 15, 6, 17, 38, 43, '−5', '51'),
(11, 11, 'Newcastle United', 38, 13, 10, 15, 44, 62, '−18', '49'),
(12, 12, 'Crystal Palace', 38, 11, 15, 12, 50, 46, '+4', '48'),
(13, 13, 'Brentford', 38, 13, 7, 18, 48, 56, '−8', '46'),
(14, 14, 'Aston Villa', 38, 13, 6, 19, 52, 54, '−2', '45'),
(15, 15, 'Southampton', 38, 9, 13, 16, 43, 67, '−24', '40'),
(16, 16, 'Everton', 38, 11, 6, 21, 43, 66, '−23', '39'),
(17, 17, 'Leeds United', 38, 9, 11, 18, 42, 79, '−37', '38'),
(18, 18, 'Burnley (R)', 38, 7, 14, 17, 34, 53, '−19', '35'),
(19, 19, 'Watford (R)', 38, 6, 5, 27, 34, 77, '−43', '23'),
(20, 20, 'Norwich City (R)', 38, 5, 7, 26, 23, 84, '−61', '22');

-- --------------------------------------------------------

--
-- Table structure for table `epl22_23`
--

CREATE TABLE `epl22_23` (
  `id` int NOT NULL,
  `Pos` int DEFAULT NULL,
  `Team` varchar(50) DEFAULT NULL,
  `Pld` int DEFAULT NULL,
  `W` int DEFAULT NULL,
  `D` int DEFAULT NULL,
  `L` int DEFAULT NULL,
  `GF` int DEFAULT NULL,
  `GA` int DEFAULT NULL,
  `GD` varchar(10) DEFAULT NULL,
  `Pts` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ucl21_22`
--

CREATE TABLE `ucl21_22` (
  `id` int NOT NULL,
  `Pos` int DEFAULT NULL,
  `Team` varchar(50) DEFAULT NULL,
  `Pld` int DEFAULT NULL,
  `W` int DEFAULT NULL,
  `D` int DEFAULT NULL,
  `L` int DEFAULT NULL,
  `GF` int DEFAULT NULL,
  `GA` int DEFAULT NULL,
  `GD` varchar(10) DEFAULT NULL,
  `Pts` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ucl21_22`
--

INSERT INTO `ucl21_22` (`id`, `Pos`, `Team`, `Pld`, `W`, `D`, `L`, `GF`, `GA`, `GD`, `Pts`) VALUES
(1, 1, 'Liverpool', 6, 6, 0, 0, 17, 6, '+11', '18'),
(2, 2, 'Atlético Madrid', 6, 2, 1, 3, 7, 8, '−1', '7'),
(3, 3, 'Porto', 6, 1, 2, 3, 4, 11, '−7', '5'),
(4, 4, 'Milan', 6, 1, 1, 4, 6, 9, '−3', '4');

-- --------------------------------------------------------

--
-- Table structure for table `ucl22_23`
--

CREATE TABLE `ucl22_23` (
  `id` int NOT NULL,
  `Pos` int DEFAULT NULL,
  `Team` varchar(50) DEFAULT NULL,
  `Pld` int DEFAULT NULL,
  `W` int DEFAULT NULL,
  `D` int DEFAULT NULL,
  `L` int DEFAULT NULL,
  `GF` int DEFAULT NULL,
  `GA` int DEFAULT NULL,
  `GD` varchar(10) DEFAULT NULL,
  `Pts` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `epl21_22`
--
ALTER TABLE `epl21_22`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `epl22_23`
--
ALTER TABLE `epl22_23`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ucl21_22`
--
ALTER TABLE `ucl21_22`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ucl22_23`
--
ALTER TABLE `ucl22_23`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `epl21_22`
--
ALTER TABLE `epl21_22`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `epl22_23`
--
ALTER TABLE `epl22_23`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=701;

--
-- AUTO_INCREMENT for table `ucl21_22`
--
ALTER TABLE `ucl21_22`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ucl22_23`
--
ALTER TABLE `ucl22_23`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
