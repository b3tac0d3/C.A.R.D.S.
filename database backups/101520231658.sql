-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 15, 2023 at 10:58 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cards`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `quick_note` text,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `company_id`, `fname`, `lname`, `suffix`, `dob`, `quick_note`, `active`) VALUES
(1, 1, NULL, 'Jimmy', 'McGovern', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_record_edits`
--

CREATE TABLE `log_record_edits` (
  `id` int(11) NOT NULL,
  `rec_table_name` varchar(255) DEFAULT NULL,
  `rec_row_id` int(11) DEFAULT NULL,
  `old_value` text,
  `create_date` datetime DEFAULT NULL,
  `create_id` int(11) DEFAULT NULL,
  `create_ip` varchar(255) DEFAULT NULL,
  `create_sess_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_record_life`
--

CREATE TABLE `log_record_life` (
  `id` int(11) NOT NULL,
  `rec_table_name` varchar(255) DEFAULT NULL,
  `rec_row_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_id` int(11) DEFAULT NULL,
  `create_ip` varchar(255) DEFAULT NULL,
  `create_sess_id` varchar(255) DEFAULT NULL,
  `kill_date` datetime DEFAULT NULL,
  `kill_id` int(11) DEFAULT NULL,
  `kill_ip` varchar(255) DEFAULT NULL,
  `kill_sess_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_record_life`
--

INSERT INTO `log_record_life` (`id`, `rec_table_name`, `rec_row_id`, `create_date`, `create_id`, `create_ip`, `create_sess_id`, `kill_date`, `kill_id`, `kill_ip`, `kill_sess_id`) VALUES
(1, 'users', 1, '2023-10-06 06:33:40', 1, '::1', 'u0nobs2p55arbucr7kisuh4r1q', NULL, NULL, NULL, NULL),
(2, 'contacts', 1, '2023-10-06 06:33:40', 1, '::1', 'u0nobs2p55arbucr7kisuh4r1q', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_user_logins`
--

CREATE TABLE `log_user_logins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `login_status` tinyint(4) DEFAULT NULL,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `create_ip` varchar(255) DEFAULT NULL,
  `create_sess_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_user_logins`
--

INSERT INTO `log_user_logins` (`id`, `user_id`, `username`, `login_status`, `create_date`, `create_ip`, `create_sess_id`) VALUES
(1, 1, 'admin_jpm', 1, '2023-10-12 12:59:46', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(2, 1, 'admin_jpm', 1, '2023-10-12 12:59:58', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(3, NULL, 'admin', -1, '2023-10-12 15:59:37', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(4, 1, 'admin_jpm', 1, '2023-10-12 16:11:28', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(5, 1, 'admin_jpm', 1, '2023-10-12 16:12:22', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(6, 1, 'admin_jpm', 1, '2023-10-12 20:29:45', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(7, 1, 'admin_jpm', 1, '2023-10-12 21:24:14', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(8, 1, 'admin_jpm', 1, '2023-10-12 21:25:05', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(9, 1, 'admin_jpm', 1, '2023-10-12 21:26:15', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(10, 1, 'admin_jpm', 1, '2023-10-12 21:33:50', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(11, 1, 'admin_jpm', 1, '2023-10-12 21:34:05', '::1', '9govb3fkcmiphdgvje9hokhdvm'),
(12, 1, 'admin_jpm', 1, '2023-10-15 18:20:14', '::1', 'e1dqci7c702jcr9jr9gptg7ug5'),
(13, 1, 'admin_jpm', 1, '2023-10-15 18:22:57', '::1', 'e1dqci7c702jcr9jr9gptg7ug5'),
(14, 1, 'admin_jpm', 1, '2023-10-15 18:23:34', '::1', 'e1dqci7c702jcr9jr9gptg7ug5'),
(15, 1, 'admin_jpm', 1, '2023-10-15 18:24:02', '::1', 'e1dqci7c702jcr9jr9gptg7ug5'),
(16, 1, 'admin_jpm', 1, '2023-10-15 18:28:10', '::1', 'e1dqci7c702jcr9jr9gptg7ug5');

-- --------------------------------------------------------

--
-- Table structure for table `task_list_categories`
--

CREATE TABLE `task_list_categories` (
  `id` int(11) NOT NULL,
  `parent_cat_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` text,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `task_list_main`
--

CREATE TABLE `task_list_main` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `priority_level` tinyint(4) DEFAULT NULL,
  `open_status` tinyint(4) NOT NULL DEFAULT '1',
  `title` varchar(255) DEFAULT NULL,
  `body` text,
  `public` tinyint(4) NOT NULL DEFAULT '1',
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `task_list_replies`
--

CREATE TABLE `task_list_replies` (
  `id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `body` text,
  `acitve` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` smallint(6) NOT NULL,
  `main_role` tinyint(4) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `main_role`, `active`) VALUES
(1, 'admin_jpm', '$2y$10$0X5LM7IbqonTJjJhqHRB.eF1omgsOEDLv6BywrA7azAy.PjxHWuJC', 6732, 99, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_record_edits`
--
ALTER TABLE `log_record_edits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_record_life`
--
ALTER TABLE `log_record_life`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_user_logins`
--
ALTER TABLE `log_user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_list_categories`
--
ALTER TABLE `task_list_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_list_main`
--
ALTER TABLE `task_list_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_list_replies`
--
ALTER TABLE `task_list_replies`
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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_record_edits`
--
ALTER TABLE `log_record_edits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_record_life`
--
ALTER TABLE `log_record_life`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_user_logins`
--
ALTER TABLE `log_user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `task_list_categories`
--
ALTER TABLE `task_list_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_list_main`
--
ALTER TABLE `task_list_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_list_replies`
--
ALTER TABLE `task_list_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
