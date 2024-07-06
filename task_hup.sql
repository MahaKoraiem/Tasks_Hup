-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 05:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_hup`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Marketing'),
(2, 'Social Media'),
(3, 'Finance');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Great Cairo'),
(2, 'Giza'),
(3, 'Alex');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Marketing'),
(2, 'Sales'),
(3, 'Public Relations'),
(4, 'IT'),
(5, 'Social Media'),
(6, 'HR');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `image`, `name`, `phone`, `birth_date`, `department_id`, `city_id`) VALUES
(1, 'default.png', 'ALi', '010015203344', '1994-04-18', 1, 1),
(2, 'default.png', 'Hany', '0155566487', '1990-04-12', 1, 2),
(3, 'default.png', 'shady', '0101578364', '1999-05-17', 1, 1),
(4, 'ahmed_mohsen_2024-05-12-19-44-09.png', 'Ahmed Mohsen', '010015486654', '1999-05-03', 4, 3),
(5, 'ziyad_gamal_2024-05-12-19-46-32.avif', 'Ziyad Gamal', '0121312669874', '1999-02-03', 3, 2),
(6, 'default.png', 'Shaker Mousa', '010001446657', '1998-05-09', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee_task`
--

CREATE TABLE `employee_task` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `name`, `color`) VALUES
(1, 'Low', '#5b5b5b'),
(2, 'Medium', '#edb10c'),
(3, 'High', '#e71304'),
(4, 'Not Defiended', '#6a788a'),
(5, 'Say Hello World', '#4911e4'),
(6, 'ali', '#e0b8d6');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `color`) VALUES
(1, 'To Do', ''),
(2, 'In Progress', ''),
(3, 'Done', ''),
(4, 'Postponed', '');

-- --------------------------------------------------------

--
-- Table structure for table `status_task`
--

CREATE TABLE `status_task` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_task`
--

INSERT INTO `status_task` (`id`, `task_id`, `status_id`, `employee_id`, `date`) VALUES
(1, 10, 1, 1, '2024-05-01 00:00:00'),
(2, 20, 1, 1, '2024-05-16 19:29:44'),
(3, 13, 1, 4, '2024-05-16 19:34:51'),
(4, 11, 3, 2, '2024-05-16 19:34:51'),
(5, 19, 4, 3, '2024-05-16 19:35:16'),
(6, 14, 1, 3, '2024-05-16 19:35:16'),
(7, 21, 1, 2, '2024-05-16 19:40:28'),
(8, 14, 2, 1, '2024-05-16 21:57:28'),
(9, 14, 3, 1, '2024-05-16 22:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `due_date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `created_date`, `due_date`, `employee_id`, `category_id`, `priority_id`) VALUES
(10, 'Design a new logo', 'design a new attractive logo for facebook', '2024-04-23 20:49:21', '2024-05-11', 1, 2, 2),
(11, 'Create Hello World Function', 'create a function that says ', '2024-04-30 19:45:51', '2024-05-31', 1, 2, 1),
(13, 'creat a new website', 'creat a new website', '2024-04-30 19:54:20', '2024-05-09', 1, 2, 1),
(14, 'get flowers', 'buy  attractive flowers', '2024-05-02 19:56:17', '2024-04-29', 1, 1, 1),
(19, 'design a new logo', 'hgfhhgfhfj', '2024-05-07 19:27:10', '2024-05-17', 1, 1, 2),
(20, 'design a new logo for a product', 'design a new logo for a  new product', '2024-05-16 19:29:44', '2024-05-31', 1, 1, 2),
(21, 'creat a new Ecommerce website', 'creat a new Ecommerce website', '2024-05-16 19:40:28', '2024-05-23', 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'MahmoudIslam@email.com', 'mahmoudislam'),
(2, 'ZeyadGamal@email.com', 'zezo2151968'),
(3, 'Gamalmohsen@gmail.com', '123'),
(4, 'medohamdy', '456'),
(5, 'adelhamed', '$2y$10$2fkbZ5mipUvcAbT/rPB1pebpdoxVg1OxqBICpzJ73rrkOXkNPoTh6'),
(6, 'halamohsen', '123'),
(9, 'hasna1415', '$2y$10$zbFr2pZmexyKeupMg8Sg0uoUSHBMLjtPubjEf1n/xxtTc1wj661vO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `employee_task`
--
ALTER TABLE `employee_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_task`
--
ALTER TABLE `status_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `priority_id` (`priority_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_task`
--
ALTER TABLE `employee_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_task`
--
ALTER TABLE `status_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_task`
--
ALTER TABLE `employee_task`
  ADD CONSTRAINT `employee_task_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_task_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `status_task`
--
ALTER TABLE `status_task`
  ADD CONSTRAINT `status_task_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status_task_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `status_task_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
