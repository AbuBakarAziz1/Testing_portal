-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 06:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdec`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `messages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `messages`) VALUES
(1, 3, 1, 'Hello abubakaraziz'),
(2, 3, 1, 'hello kaisy ho '),
(3, 3, 1, 'hello kaisy ho '),
(4, 3, 1, 'abc123'),
(5, 3, 3, 'hello '),
(6, 3, 1, 'hi'),
(7, 3, 1, 'hello janab'),
(8, 3, 3, 'hello '),
(9, 3, 1, 'salam sarmad '),
(10, 3, 4, 'salam abuzar'),
(11, 3, 1, 'hellooo '),
(12, 3, 3, 'salam sarmad h r u');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `profile` varchar(300) NOT NULL,
  `acc_code` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `password`, `profile`, `acc_code`, `status`, `role`, `country`, `time`) VALUES
(1, 'abubakar Aziz', 'abubakaraziz1122@gmail.com', '$2y$10$Ai51LM4ds/A/T2A/D9ZbfONJ0nELO4y0UBKmaMBvRsJXOUkrwyX..', 'profile/Screenshot_20221130_111300.png', 184, 1, 'user', 'germany', '2022-12-19 05:29:57'),
(2, 'abubakar', 'abubakar@gmail.com', '$2y$10$w5PS9iOqW9hx0/XEyDGBJeiSas6UcVWllOEWCWVGO/oILOl1l2ktC', 'profile/foo.png', 214, 1, 'user', 'pakistan', '2022-12-19 06:07:03'),
(3, 'sarmad tariq', 'sarmad@gmail.com', '$2y$10$EQPfJyBjwJG5Hlb6Qo0CT.xzWeviDcvfVKExjTOHx6S5MlswvdsbC', 'profile/Screenshot_20221203_125244.png', 671, 1, 'user', 'pakistan', '2022-12-19 07:57:18'),
(4, 'Abuzar', 'abuzar@gmail.com', '$2y$10$PaNtmnQf9vVer.LXkg5cReM7j3KLHcAqwq2rH/QsADxOWsERPOBua', 'profile/Screenshot_20221212_031418.png', 641, 1, 'user', 'pakistan', '2022-12-19 09:16:56'),
(5, 'ateeb asif', 'ateebasifawan@gmail.com', '$2y$10$n5ccdXjCuces358wAE7wzOUPyuqqadsoOD3pQcNb4XBydgsCfyVqq', 'profile/Screenshot_20221211_062840.png', 333, 1, 'user', 'pakistan', '2022-12-19 10:08:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
