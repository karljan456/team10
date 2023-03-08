-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 08, 2023 at 11:59 AM
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
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `poll_id` int NOT NULL,
  `match1` varchar(50) DEFAULT NULL,
  `match2` varchar(50) DEFAULT NULL,
  `match3` varchar(50) DEFAULT NULL,
  `match4` varchar(50) DEFAULT NULL,
  `match5` varchar(50) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`poll_id`, `match1`, `match2`, `match3`, `match4`, `match5`, `username`) VALUES
(4, 'win', 'draw', 'win', 'draw', 'lose', 'Miika'),
(5, 'win', 'lose', 'win', 'win', 'draw', 'Edvin'),
(6, 'lose', 'draw', 'win', 'draw', 'win', 'Alpha'),
(7, 'draw', 'win', 'draw', 'draw', 'draw', 'Beta'),
(8, 'lose', 'win', 'lose', 'draw', 'win', 'Salmon'),
(9, 'win', 'win', 'win', 'draw', 'win', 'Beef'),
(10, 'draw', 'lose', 'draw', 'draw', 'lose', 'Curry'),
(11, 'win', 'win', 'draw', 'lose', 'lose', 'Pizza'),
(13, 'lose', 'draw', 'draw', 'draw', 'lose', 'Osiris'),
(15, 'lose', 'lose', 'lose', 'draw', 'lose', 'EdemQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`poll_id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `poll_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `poll`
--
ALTER TABLE `poll`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
