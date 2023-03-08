-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 08, 2023 at 06:42 PM
-- Server version: 8.0.32
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

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `author_id` int DEFAULT NULL,
  `author` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `content` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `excerpt` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `featured_image` varchar(50) NOT NULL DEFAULT '../assets/images/article-banner.jpg',
  `category` varchar(50) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `author`, `title`, `slug`, `content`, `excerpt`, `featured_image`, `category`, `publish_date`) VALUES
(10, 1, 'Elsama', 'blabla', 'bla', '1914 translation by H. Rackham\n\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"', 'excerptexcerptexcerpt', '../assets/images/ali.jpg', 'News,Transfers', '2023-02-28 15:31:44'),
(12, 1, 'Elsama', 'Lorem Ipsum', 'Lorem-Ipsum', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using ..\r\n\r\n', '../assets/images/lfc_logo.png', 'Transfers', '2023-02-28 15:31:44'),
(13, NULL, 'EdemQ', 'Blah blahhhshshs', 'Tester validation', '<p>Edem is fucking awesome</p>', '<p>Edem is fucking awesome</p>', '../assets/images/640858fbcdf75.jpg', '1', '2023-03-08 09:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int NOT NULL,
  `title` varchar(70) NOT NULL,
  `slug` varchar(70) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `featured_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `title`, `slug`, `description`, `featured_image`) VALUES
(1, 'News', 'news', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"', '../assets/images/inmemoria.png'),
(2, 'Transfers', 'transfers', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"', '../assets/images/loader.gif');

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
(609, 1, 'Napoli', 6, 5, 0, 1, 20, 6, '+14', '15[a]'),
(610, 2, 'Liverpool', 6, 5, 0, 1, 17, 6, '+11', '15[a]'),
(611, 3, 'Ajax', 6, 2, 0, 4, 11, 16, '-5', '6'),
(612, 4, 'Rangers', 6, 0, 0, 6, 2, 22, '-20', '0');

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
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_author` (`comment_author`),
  ADD KEY `comment_post_slug` (`post_slug`);

--
-- Indexes for table `epl22_23`
--
ALTER TABLE `epl22_23`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`poll_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `slug_2` (`slug`),
  ADD KEY `author_ID` (`author_id`),
  ADD KEY `author_name` (`author`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ucl22_23`
--
ALTER TABLE `ucl22_23`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `epl22_23`
--
ALTER TABLE `epl22_23`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=761;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `poll_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ucl22_23`
--
ALTER TABLE `ucl22_23`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_author` FOREIGN KEY (`comment_author`) REFERENCES `users` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_post_slug` FOREIGN KEY (`post_slug`) REFERENCES `posts` (`slug`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `poll`
--
ALTER TABLE `poll`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `author_ID` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `author_name` FOREIGN KEY (`author`) REFERENCES `users` (`username`) ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
