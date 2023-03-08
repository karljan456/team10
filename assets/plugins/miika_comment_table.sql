-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 08, 2023 at 06:24 PM
-- Server version: 8.0.31
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
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `comment_author` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comment_time` datetime NOT NULL,
  `comment_text` text NOT NULL,
  `post_slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment_author`, `comment_time`, `comment_text`, `post_slug`) VALUES
(24, 'tester3', '2023-03-06 11:13:20', 'asdasdsad', 'bla'),
(161, 'tester3', '2023-03-08 15:42:24', '<p>asdasdasdasd</p>', 'bla'),
(162, 'tester3', '2023-03-08 15:51:21', '', 'bla'),
(163, 'tester3', '2023-03-08 15:53:51', '<p>asd</p>\r\n<p>&nbsp;</p>\r\n<p>asdasd</p>', 'bla'),
(164, 'tester3', '2023-03-08 15:54:08', '', 'bla'),
(165, 'tester3', '2023-03-08 15:54:08', '<p>jlkjlkj</p>\r\n<p>asdasdasd</p>\r\n<p>dasdas</p>', 'bla'),
(168, 'tester3', '2023-03-08 20:16:28', '<p>dasdasdsd</p>', 'Lorem-Ipsum'),
(169, 'tester3', '2023-03-08 20:19:16', '<p>asdasdasdasd</p>', 'Lorem-Ipsum'),
(170, 'tester3', '2023-03-08 20:19:16', '<p>asdasdasdasd</p>', 'Lorem-Ipsum'),
(171, 'tester3', '2023-03-08 20:19:43', '<p>final asd</p>', 'Lorem-Ipsum'),
(172, 'noob', '2023-03-08 20:20:22', '<p>asd</p>', 'Lorem-Ipsum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_author` (`comment_author`),
  ADD KEY `comment_post_slug` (`post_slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_author` FOREIGN KEY (`comment_author`) REFERENCES `users` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_post_slug` FOREIGN KEY (`post_slug`) REFERENCES `posts` (`slug`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
