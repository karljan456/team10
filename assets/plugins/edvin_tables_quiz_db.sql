-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 07, 2023 at 03:25 PM
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
(1, 1, 'Manchester City', 38, 29, 6, 3, 99, 26, '+73', '93'),
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
(18, 18, 'Burnley', 38, 7, 14, 17, 34, 53, '−19', '35'),
(19, 19, 'Watford', 38, 6, 5, 27, 34, 77, '−43', '23'),
(20, 20, 'Norwich City', 38, 5, 7, 26, 23, 84, '−61', '22');

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
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int NOT NULL,
  `question` varchar(60) DEFAULT NULL,
  `option_1` varchar(40) DEFAULT NULL,
  `option_2` varchar(40) DEFAULT NULL,
  `option_3` varchar(40) DEFAULT NULL,
  `option_4` varchar(40) DEFAULT NULL,
  `correct_answer` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_answer`) VALUES
(1, 'When was Liverpool FC founded?', '1914', '1892', 'Last year', '2000', '1892'),
(2, 'What is the name of the bird on the Liverpool badge?', 'Magpie', 'Eagle', 'Liver Bird', 'Comorant', 'Liver Bird'),
(3, 'What are the terraces at Anfield also known as?', 'The Kip', 'The Kop', 'The Kup', 'The Kap', 'The Kop'),
(4, 'Where is Mohamed Salah from?', 'Norway', 'Finland', 'United States', 'Egypt', 'Egypt'),
(5, 'Which of these people HAS NEVER played for Liverpool?', 'Steven Gerrard', 'Mario Balotelli', 'Zlatan Ibrahimovic', 'Xabi Alonso', 'Zlatan Ibrahimovic'),
(6, 'Which LFC player won the Ballon D\'or in 2001?', 'Steven Gerrard', 'Jamie Carragher', 'Sami Hyypiä', 'Michael Owen', 'Michael Owen'),
(7, 'When did Liverpool win their first FA Cup?', '1965', '2022', '1981', '2001', '1965'),
(8, 'Which newspaper is boycotted in Liverpool?', 'The Daily Mail', 'The Times', 'The Sun', 'The Guardian', 'The Sun'),
(9, 'What is the name of Liverpool FC home ground?', 'Old Trafford', 'Goodison Park', 'Anfield', 'Wembley', 'Anfield'),
(10, 'What’s the name of the two liver birds by the docks?', 'Bella & Bertie', 'Bertha & Bernie', 'Bernie & Bianca', 'Bernard & Isabella', 'Bella & Bertie');

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
-- Dumping data for table `ucl22_23`
--

INSERT INTO `ucl22_23` (`id`, `Pos`, `Team`, `Pld`, `W`, `D`, `L`, `GF`, `GA`, `GD`, `Pts`) VALUES
(609, 1, 'Napoli', 6, 5, 0, 1, 20, 6, '+14', '15'),
(610, 2, 'Liverpool', 6, 5, 0, 1, 17, 6, '+11', '15'),
(611, 3, 'Ajax', 6, 2, 0, 4, 11, 16, '-5', '6'),
(612, 4, 'Rangers', 6, 0, 0, 6, 2, 22, '-20', '0');

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
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=761;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ucl21_22`
--
ALTER TABLE `ucl21_22`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ucl22_23`
--
ALTER TABLE `ucl22_23`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
