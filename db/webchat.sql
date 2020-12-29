-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2020 at 07:02 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webchat`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userPic` varchar(255) NOT NULL,
  `forgtn_answer` varchar(100) NOT NULL,
  `log_in` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `email`, `password`, `userPic`, `forgtn_answer`, `log_in`) VALUES
(1, 'nipa101', 'nipa@gmail.com', '12abc00000', '', '', 'Online'),
(2, 'dipto', 'dipto@gmail.com', '123456789', '', '', 'Offline'),
(11, 'kiwiarpa', 'priontidas.arpa@gmail.com', '123456789', '', '', 'Online'),
(14, 'arpa', 'arpa@gmail.com', '123456789', '../img/user.png', '', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `chat_id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `chat_content` varchar(255) NOT NULL,
  `chat_status` text NOT NULL,
  `chat_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_chat`
--

INSERT INTO `users_chat` (`chat_id`, `sender_username`, `receiver_username`, `chat_content`, `chat_status`, `chat_date`) VALUES
(1, 'nipa101', 'nipa101', 'hi', 'read', '2020-12-17 14:15:59'),
(2, 'nipa101', 'nipa101', 'hlw', 'read', '2020-12-17 14:16:08'),
(3, 'nipa101', 'nipa101', 'bye', 'read', '2020-12-17 14:16:12'),
(4, 'nipa101', 'nipa101', 'gdhd', 'read', '2020-12-17 14:16:21'),
(5, 'nipa101', 'nipa101', 'ndjdjd', 'read', '2020-12-17 14:16:26'),
(6, 'nipa101', 'nipa101', 'bdhsjskj', 'read', '2020-12-17 14:16:32'),
(7, 'nipa101', 'nipa101', 'shhsjsk', 'read', '2020-12-17 14:16:37'),
(8, 'nipa101', 'nipa101', 'snsjssksl', 'read', '2020-12-17 14:16:40'),
(9, 'nipa101', 'kiwiarpa', 'hi', 'read', '2020-12-17 14:23:15'),
(10, 'nipa101', 'kiwiarpa', 'ajkakal', 'read', '2020-12-17 14:23:26'),
(11, 'nipa101', 'kiwiarpa', 'ajkjakala', 'read', '2020-12-17 14:23:30'),
(12, 'nipa101', 'kiwiarpa', 'njkl', 'read', '2020-12-17 14:23:34'),
(13, 'nipa101', 'kiwiarpa', 'jjkk', 'read', '2020-12-17 14:23:38'),
(14, 'nipa101', 'kiwiarpa', 'hjkk', 'read', '2020-12-17 14:23:43'),
(15, 'nipa101', 'kiwiarpa', 'bnmk', 'read', '2020-12-17 14:23:51'),
(16, 'nipa101', 'kiwiarpa', 'hjjkll', 'read', '2020-12-17 14:23:57'),
(17, 'nipa101', 'kiwiarpa', 'kll;;', 'read', '2020-12-17 14:24:03'),
(18, 'kiwiarpa', 'dipto', 'hi', 'unread', '2020-12-19 13:47:40'),
(19, 'kiwiarpa', 'dipto', 'hlw', 'unread', '2020-12-19 13:47:53'),
(20, 'kiwiarpa', 'dipto', 'how are you', 'unread', '2020-12-19 13:48:03'),
(21, 'kiwiarpa', 'dipto', 'how are you', 'unread', '2020-12-19 13:50:03'),
(22, 'kiwiarpa', 'dipto', 'how are you', 'unread', '2020-12-19 13:51:04'),
(23, 'kiwiarpa', 'dipto', 'hi', 'unread', '2020-12-19 17:46:05'),
(24, 'kiwiarpa', 'dipto', 'hi', 'unread', '2020-12-19 17:46:12'),
(25, 'arpa', 'arpa', 'hi', 'unread', '2020-12-19 17:50:36'),
(26, 'arpa', 'dipto', 'hi', 'unread', '2020-12-19 17:50:43'),
(27, 'arpa', 'dipto', 'hi', 'unread', '2020-12-19 17:50:48'),
(28, 'arpa', 'dipto', 'hi', 'unread', '2020-12-19 17:53:07'),
(29, 'arpa', 'dipto', 'hi', 'unread', '2020-12-19 17:54:52'),
(30, 'arpa', 'dipto', 'hi', 'unread', '2020-12-19 17:54:57'),
(31, 'arpa', 'dipto', 'hi', 'unread', '2020-12-19 17:55:15'),
(32, 'arpa', 'dipto', 'hi', 'unread', '2020-12-19 17:58:23'),
(33, 'arpa', 'dipto', 'hi', 'unread', '2020-12-19 17:59:03'),
(34, 'arpa', 'dipto', 'hi', 'unread', '2020-12-19 17:59:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
