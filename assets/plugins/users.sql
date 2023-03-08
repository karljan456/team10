-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 08, 2023 at 11:58 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `fname` varchar(70) NOT NULL,
  `lname` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `email`, `password`, `role`) VALUES
(1, 'Elsayed', 'Mahmoud', 'Elsama', 'm.saijed@gmail.com', '$2y$10$Ls3rdJRO6V8rgRS3sSO0wOhGezux98jwrrDjGp89kfN3pAj6xa4Qy', 'subscriber'),
(11, 'tester', 'tester', 'tester3', 'tester3@tester.com', '$2y$10$HYTYl9WHbYjVj/XlrtHoWesEjyITEfq3mlc.v81Yr3a4vslKNU7Ye', 'administrator'),
(12, 'tester21', 'tester21', 'tester2', 'tester21@tester21.com', '$2y$10$MniTKaEHFUGzcCspA3s7peFPPQLQDnNHJ3.5q8wkA0AglIe3f.9pq', 'subscriber'),
(13, 'Elsayed', 'Mahmoud', 'Elsayed', 'Elsayed@Elsayed.com', '$2y$10$w2VDiDhnuywWBs36dCC61OshbpoR.mvde7EL8k.j7HTpK9YacW6Em', 'administrator'),
(14, 'noob', 'noob', 'noob', 'noob@noob.com', '$2y$10$fPEW5rgYR9iipFsiElo6PO3SVEfnmGwa4CsSEVbexLc60HE29egka', 'subscriber'),
(15, 'Tester', 'Twister', 'hakunaMatata', 'hakunaMatata@test.fi', '$2y$10$S/XpFho9zZJfuyoVSkDzj./1eS0ldwfJFEa9NsHqOc4nCHd3vwFzG', 'subscriber'),
(16, 'Edem', 'Quashigah', 'EdemQ', 'edem@email.com', '$2y$10$tIte5F/C5Gqovnn1CQcpRuRpehdDCQcou66Zr84BbfNzQurxj9weG', 'administrator'),
(17, 'Miika', 'Lahdenpera', 'Miika', 'miika@email.com', '$2y$10$AU9yzJLALyM6JFdP84Kuaed0PC6VqetDmkd/FNf4.y0sBclSLG6BO', 'subscriber'),
(18, 'Edvin', 'Jansson', 'Edvin', 'edvin@email.com', '$2y$10$1Sgwn.BZQzMJACdKuDR89.A./G/6jkEKl3ZELz0jE0lN5G4LlrEha', 'subscriber'),
(19, 'Alpha', 'User', 'Alpha', 'alpha@email.com', '$2y$10$adI85rF6X6BZDJnIM4bhqeiruW5BZufpdoBC9Ty0I5c4USkao1I3S', 'subscriber'),
(20, 'Beta', 'Tester', 'Beta', 'beta@email.com', '$2y$10$DvSpO0l.XoB71iaMJ1xcMenmpzKB0zzDsNIuSyTbcjuS4JRMRJpK.', 'subscriber'),
(21, 'Salmon', 'Soupson', 'Salmon', 'salmon@email.com', '$2y$10$8qhcAThcesVIvcf288m5AOs/vV0XJxHczipNvh9Qo8f1iqLdaIt1C', 'subscriber'),
(22, 'Beef', 'Stroganof', 'Beef', 'beef@email.com', '$2y$10$I.YFB/jVRR3lkDr6N3Ehq.YQOx9CnEY7YGunkN0YNg.XFgQ3YiXVu', 'subscriber'),
(23, 'Curry', 'Powder', 'Curry', 'curry@email.com', '$2y$10$r5to.JNU3Bh1jK25vSFEPe0J45AwUwDOAKVyYVk9LAkc3LvsFiUWG', 'subscriber'),
(24, 'Pizza', 'Slicinton', 'Pizza', 'pizza@email.com', '$2y$10$pcm1BgZ30U7mAU5oBAnsQ.Jk2TkduQNtWdHgBkFfp2ED6aIOK6wIm', 'subscriber'),
(25, 'Elsayed', 'Mahmoud', 'Osiris', 'elsayed@email.com', '$2y$10$z4LChLGHzzcjkpmBRSny6urUgDevfZJyTQER5VhdIzo1XiYdRoe/C', 'subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
