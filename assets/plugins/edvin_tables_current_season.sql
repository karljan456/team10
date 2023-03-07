-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 07, 2023 at 02:44 PM
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
-- Database: `team10_lfc`
--

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

--
-- Dumping data for table `epl22_23`
--

INSERT INTO `epl22_23` (`id`, `Pos`, `Team`, `Pld`, `W`, `D`, `L`, `GF`, `GA`, `GD`, `Pts`) VALUES
(741, 1, 'Arsenal', 26, 20, 3, 3, 59, 25, '+34', '63'),
(742, 2, 'Manchester City', 26, 18, 4, 4, 66, 25, '+41', '58'),
(743, 3, 'Manchester United', 25, 15, 4, 6, 41, 35, '+6', '49'),
(744, 4, 'Tottenham Hotspur', 26, 14, 3, 9, 46, 36, '+10', '45'),
(745, 5, 'Liverpool', 25, 12, 6, 7, 47, 28, '+19', '42'),
(746, 6, 'Newcastle United', 24, 10, 11, 3, 35, 17, '+18', '41'),
(747, 7, 'Fulham', 26, 11, 6, 9, 38, 34, '+4', '39'),
(748, 8, 'Brighton & Hove Albion', 23, 11, 5, 7, 43, 29, '+14', '38'),
(749, 9, 'Brentford', 24, 9, 11, 4, 40, 32, '+8', '38'),
(750, 10, 'Chelsea', 25, 9, 7, 9, 24, 25, '-1', '34'),
(751, 11, 'Aston Villa', 25, 10, 4, 11, 31, 38, '-7', '34'),
(752, 12, 'Crystal Palace', 25, 6, 9, 10, 21, 32, '-11', '27'),
(753, 13, 'Wolverhampton Wanderers', 26, 7, 6, 13, 19, 35, '-16', '27'),
(754, 14, 'Nottingham Forest', 25, 6, 8, 11, 20, 44, '-24', '26'),
(755, 15, 'Leicester City', 25, 7, 3, 15, 36, 43, '-7', '24'),
(756, 16, 'West Ham United', 25, 6, 5, 14, 23, 33, '-10', '23'),
(757, 17, 'Leeds United', 25, 5, 7, 13, 29, 40, '-11', '22'),
(758, 18, 'Everton', 26, 5, 7, 14, 19, 38, '-19', '22'),
(759, 19, 'Southampton', 25, 6, 3, 16, 20, 41, '-21', '21'),
(760, 20, 'Bournemouth', 25, 5, 6, 14, 24, 51, '-27', '21');

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
-- Dumping data for table `ucl22_23`
--

INSERT INTO `ucl22_23` (`id`, `Pos`, `Team`, `Pld`, `W`, `D`, `L`, `GF`, `GA`, `GD`, `Pts`) VALUES
(609, 1, 'Napoli', 6, 5, 0, 1, 20, 6, '+14', '15[a]'),
(610, 2, 'Liverpool', 6, 5, 0, 1, 17, 6, '+11', '15[a]'),
(611, 3, 'Ajax', 6, 2, 0, 4, 11, 16, '-5', '6'),
(612, 4, 'Rangers', 6, 0, 0, 6, 2, 22, '-20', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `epl22_23`
--
ALTER TABLE `epl22_23`
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
-- AUTO_INCREMENT for table `epl22_23`
--
ALTER TABLE `epl22_23`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=761;

--
-- AUTO_INCREMENT for table `ucl22_23`
--
ALTER TABLE `ucl22_23`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
