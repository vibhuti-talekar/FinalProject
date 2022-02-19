-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 06:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mytasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `list_name` varchar(255) NOT NULL,
  `list_body` text NOT NULL,
  `list_user` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `list_name`, `list_body`, `list_user`, `create_date`) VALUES
(5, 'hi ', 'new list test', 'march20', '2022-01-02 17:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_body` text NOT NULL,
  `list_id` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_complete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `task_body`, `list_id`, `due_date`, `create_date`, `is_complete`) VALUES
(1, 'qwe', 'v', 1, '2022-01-12', '2022-01-01 14:55:38', 1),
(2, 'qwe', 'bhj', 3, '2021-08-20', '2022-01-01 15:05:33', 0),
(3, 'qwe', 'v', 0, '2022-01-13', '2022-01-01 15:06:32', 0),
(4, 'qwe', 'sionh', 4, '2022-01-06', '2022-01-01 15:54:44', 1),
(5, 'qwe', 'sdgk', 4, '2022-01-20', '2022-01-01 15:55:43', 0),
(6, 'test task', 'tested', 5, '2022-01-21', '2022-01-02 17:09:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'Vibhuti', 'Talekar', 'vibhutitalekar88@gmail.com', 'march20', '202cb962ac59075b964b07152d234b70', '2022-01-01 11:43:01'),
(2, 'a', 'b', 'vibhutitalkar88@gmail.com', 'march21', 'd81f9c1be2e08964bf9f24b15f0e4900', '2022-01-01 12:57:44'),
(3, 'a', 'b', 'vibhutitalekar8@gmail.com', 'march27', '881094f8a4b1682e05fe78181fea8a48', '2022-01-01 13:53:14'),
(4, 'Vibhuti', 'Talekar', 'vibhutitalekar@gmail.com', 'qwerty', '202cb962ac59075b964b07152d234b70', '2022-01-01 15:04:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
