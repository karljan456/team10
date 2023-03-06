-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 04, 2023 at 12:02 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
