-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 17, 2023 at 01:19 PM
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
(1, 1, NULL, 'Jimmy', 'McGovern', NULL, NULL, NULL, 1),
(2, 2, NULL, 'Jimmy', 'McGovern', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_record_audit`
--

CREATE TABLE `log_record_audit` (
  `id` int(11) NOT NULL,
  `record_table` varchar(255) DEFAULT NULL,
  `record_id` int(11) DEFAULT NULL,
  `audit_type` tinyint(4) DEFAULT NULL,
  `column_name` varchar(255) DEFAULT NULL,
  `old_value` text,
  `audit_note` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_id` int(11) DEFAULT NULL,
  `create_ip` varchar(25) DEFAULT NULL,
  `create_sess_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_record_audit`
--

INSERT INTO `log_record_audit` (`id`, `record_table`, `record_id`, `audit_type`, `column_name`, `old_value`, `audit_note`, `create_date`, `create_id`, `create_ip`, `create_sess_id`) VALUES
(1, 'users', 1, 1, NULL, NULL, NULL, '2023-10-16 05:56:57', NULL, '::1', 'e1dqci7c702jcr9jr9gptg7ug5'),
(2, 'contacts', 1, 1, NULL, NULL, NULL, '2023-10-16 05:56:57', NULL, '::1', 'e1dqci7c702jcr9jr9gptg7ug5'),
(3, 'users', 2, 1, NULL, NULL, 'User registration form', '2023-10-16 05:58:23', NULL, '::1', 'e1dqci7c702jcr9jr9gptg7ug5'),
(4, 'contacts', 2, 1, NULL, NULL, 'User registration form', '2023-10-16 05:58:23', NULL, '::1', 'e1dqci7c702jcr9jr9gptg7ug5');

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

-- --------------------------------------------------------

--
-- Table structure for table `system_sql_table_keys`
--

CREATE TABLE `system_sql_table_keys` (
  `id` int(11) NOT NULL,
  `sql_table_name` varchar(255) DEFAULT NULL,
  `sql_column_name` varchar(255) DEFAULT NULL,
  `key_value` tinyint(4) DEFAULT NULL,
  `db_value` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_sql_table_keys`
--

INSERT INTO `system_sql_table_keys` (`id`, `sql_table_name`, `sql_column_name`, `key_value`, `db_value`, `active`) VALUES
(1, 'log_record_audit', 'audit_type', 1, 'Record created', 1),
(2, 'log_record_audit', 'audit_type', 0, 'Record deactivated (soft delete)', 1),
(3, 'log_record_table', 'audit_type', 2, 'Record updated', 1),
(4, 'log_user_logins', 'login_status', -1, 'Username not found', 1),
(5, 'log_user_logins', 'login_status', 0, 'Password mismatch', 1),
(6, 'log_user_logins', 'login_type', 1, 'Successful login', 1),
(7, 'Global', 'active', 0, 'Inactive', 1),
(8, 'Global', 'active', 1, 'Active', 1);

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
(1, 'admin_jpm', '$2y$10$OcCOtwjdeuBZaxtDaBf8lOwxWgjSYA/Uxg5MMPUffpAbzmot/TFtm', 8058, 49, 1),
(2, 'admin_jpm1', '$2y$10$ty1BrtAqVIfdjV0mSR.KcOVI4OrbZuXEOj3vGJp7SefhlrhLDPfCW', 7961, 49, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_record_audit`
--
ALTER TABLE `log_record_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_user_logins`
--
ALTER TABLE `log_user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_sql_table_keys`
--
ALTER TABLE `system_sql_table_keys`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_record_audit`
--
ALTER TABLE `log_record_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log_user_logins`
--
ALTER TABLE `log_user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_sql_table_keys`
--
ALTER TABLE `system_sql_table_keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
