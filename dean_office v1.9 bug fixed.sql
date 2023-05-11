-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 09:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dean_office`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `username` varchar(100) NOT NULL,
  `achiev_name` varchar(200) NOT NULL,
  `achiev_type` varchar(20) NOT NULL,
  `achiev_descrip` varchar(1000) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`username`, `achiev_name`, `achiev_type`, `achiev_descrip`, `time_stamp`) VALUES
('a10', 'dwdwdwd', 'award', 'lololololo', '2021-05-18 20:51:47'),
('a2', 'ach name', 'award', '', '2021-06-03 06:24:20'),
('a2', 'achievement name', '', 'enter achievement description here...', '2021-05-19 07:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `commities`
--

CREATE TABLE `commities` (
  `username` varchar(100) NOT NULL,
  `comm_name` varchar(200) NOT NULL,
  `comm_post` varchar(100) DEFAULT NULL,
  `comm_start_year` int(11) DEFAULT NULL,
  `comm_end_year` int(11) DEFAULT NULL,
  `comm_decrip` varchar(1000) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commities`
--

INSERT INTO `commities` (`username`, `comm_name`, `comm_post`, `comm_start_year`, `comm_end_year`, `comm_decrip`, `time_stamp`) VALUES
('a2', 'frfrf', 'frfr', 23, 32, 'enter descriptiofrfrn here...', '2021-05-19 15:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `comm_services`
--

CREATE TABLE `comm_services` (
  `username` varchar(100) NOT NULL,
  `comm_srv_act` varchar(200) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comm_services`
--

INSERT INTO `comm_services` (`username`, `comm_srv_act`, `year`, `time_stamp`) VALUES
('a2', 'dean_1', 2020, '2021-06-03 06:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `contri_in`
--

CREATE TABLE `contri_in` (
  `username` varchar(100) NOT NULL,
  `in_activity` varchar(200) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contri_na`
--

CREATE TABLE `contri_na` (
  `username` varchar(100) NOT NULL,
  `cn_activity` varchar(200) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dok`
--

CREATE TABLE `dok` (
  `username` varchar(100) NOT NULL,
  `dok_activity` varchar(200) NOT NULL,
  `dok_year` int(11) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dok`
--

INSERT INTO `dok` (`username`, `dok_activity`, `dok_year`, `time_stamp`) VALUES
('a2', 'dean _1', 2021, '2021-06-03 06:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `events_con_org`
--

CREATE TABLE `events_con_org` (
  `username` varchar(100) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_type` varchar(100) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events_con_org`
--

INSERT INTO `events_con_org` (`username`, `event_name`, `event_type`, `event_date`, `type`, `role`, `description`, `time_stamp`) VALUES
('a2', 'a', 'symphosium', '2021-06-03', 'local', 'role a', 'desca', '2021-06-03 06:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `grant_`
--

CREATE TABLE `grant_` (
  `username` varchar(100) NOT NULL,
  `grant_name` varchar(100) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `purpose` varchar(200) DEFAULT NULL,
  `benifisheries` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `other` varchar(200) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `delete_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_department` varchar(30) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `epf_no` varchar(30) DEFAULT NULL,
  `user_national_id` varchar(30) DEFAULT NULL,
  `user_mobile` int(30) DEFAULT NULL,
  `user_address` varchar(300) DEFAULT NULL,
  `user_gender` varchar(10) DEFAULT NULL,
  `deleted_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`delete_id`, `username`, `password`, `fullname`, `user_type`, `user_department`, `user_email`, `epf_no`, `user_national_id`, `user_mobile`, `user_address`, `user_gender`, `deleted_timestamp`) VALUES
(0, 'a9', '', 'Academic_support Phy', 'academic support', 'physics', 'academicsupp@phy', '66666', '44444', 771234567, 'mataraa', 'male', '2021-03-19 04:43:18'),
(0, 'a9', '', 'Academic Support', 'academic support', 'physics', 'academicsupport@phy', '11111', '11111', 1111111111, 'matara 123', 'male', '2021-03-30 07:28:00'),
(0, 'a12', '', 'Academic', 'academic', 'chemistry', 'a12@gmail.com', '1111', '1111', 1111, 'a12', 'male', '2021-04-09 13:30:25'),
(0, 'test', '', 'Test', 'department head', 'computer science', 'test@test.com', '123123', '123213', 123213, 'hey', 'male', '2021-04-29 08:32:17'),
(0, 'a3', '', 'Dept_head Cs', 'department head', 'computer science', 'depthead@cs', '2222222222', '1111111111', 771234567, 'mataraa', 'female', '2021-05-05 13:54:21'),
(0, 'test', '', 'Test', 'department head', 'computer science', 'test@test.com', '123123', '123213', 123213, 'hey', 'male', '2021-04-29 14:02:17'),
(0, 'aaa', '', 'Aaa', 'dean', 'mathematics', 'aaaa@s.c', '1212', '121221', 1212, 'enter address here...12', 'female', '2021-05-18 14:39:36'),
(0, 'test', '', 'Test', 'department head', 'computer science', 'test@gmail.com', '123123', '123213', 123123, 'test', 'male', '2021-05-18 20:42:54');

-- --------------------------------------------------------

--
-- Table structure for table `intro_ex_co`
--

CREATE TABLE `intro_ex_co` (
  `username` varchar(100) NOT NULL,
  `ex_name` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `intro_year` int(11) DEFAULT NULL,
  `target_aud` varchar(200) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `new_intro_co`
--

CREATE TABLE `new_intro_co` (
  `username` varchar(100) NOT NULL,
  `co_name` varchar(100) NOT NULL,
  `credits` varchar(10) DEFAULT NULL,
  `unit_code` varchar(100) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `intro_year` int(11) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `benifisheries` varchar(200) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_intro_co`
--

INSERT INTO `new_intro_co` (`username`, `co_name`, `credits`, `unit_code`, `type`, `intro_year`, `description`, `benifisheries`, `time_stamp`) VALUES
('a2', 'b', '12', 'csc1321', 'optional', 2021, 'se', 'levl 1 bcs', '2021-06-03 05:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `outreach_acti`
--

CREATE TABLE `outreach_acti` (
  `username` varchar(100) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `outreach_acti`
--

INSERT INTO `outreach_acti` (`username`, `activity`, `year`, `time_stamp`) VALUES
('a2', 'enter  activity detaujuils here...', 1212, '2021-05-31 00:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `publication_c`
--

CREATE TABLE `publication_c` (
  `username` varchar(100) NOT NULL,
  `c_paper_title` varchar(100) NOT NULL,
  `c_main_author` varchar(100) DEFAULT NULL,
  `c_co_author` varchar(200) DEFAULT NULL,
  `c_publish_yr` int(11) DEFAULT NULL,
  `c_type` varchar(50) DEFAULT NULL,
  `c_status` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publication_j`
--

CREATE TABLE `publication_j` (
  `username` varchar(100) NOT NULL,
  `j_paper_title` varchar(100) NOT NULL,
  `j_main_author` varchar(100) DEFAULT NULL,
  `j_co_author` varchar(200) DEFAULT NULL,
  `j_publish_yr` int(11) DEFAULT NULL,
  `j_name` varchar(50) DEFAULT NULL,
  `j_status` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publication_j`
--

INSERT INTO `publication_j` (`username`, `j_paper_title`, `j_main_author`, `j_co_author`, `j_publish_yr`, `j_name`, `j_status`, `time_stamp`) VALUES
('a2', 'fefe', 'fef', 'asdasd', 2323, 'grg', 'not-indexed', '2021-05-21 04:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `staff_dev_con`
--

CREATE TABLE `staff_dev_con` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `con_year` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `conduc_inst` varchar(100) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff_dev_par`
--

CREATE TABLE `staff_dev_par` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `par_year` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `conduc_inst` varchar(100) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL COMMENT 'PRIMARY KEY',
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_department` varchar(30) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `epf_no` varchar(30) DEFAULT NULL,
  `user_national_id` varchar(30) DEFAULT NULL,
  `user_mobile` int(30) DEFAULT NULL,
  `user_address` varchar(300) DEFAULT NULL,
  `user_gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `user_type`, `user_department`, `user_email`, `epf_no`, `user_national_id`, `user_mobile`, `user_address`, `user_gender`) VALUES
('a1', '$2y$10$XuIdXdQeM/yxkCEFNB1p3.knLzKxsjgaj4Sk5AIHlhXiP86vUgtAi', 'mr.yasith', 'admin', 'computer science', 'yasith@gmail.com', '123123123', '123123123', 123123123, 'matara', 'male'),
('a2', '$2y$10$FF2AszlvaBwAzHBsXzFvC.kNt/k7mCk42.FBbtamQuib75mvPSuB2', 'jayantha pasdunkorala ', 'dean', 'mathematics', 'jayantha@gmail.com', '111111', '11111', 771234567, 'matara 123', 'male'),
('a3', '$2y$10$tiAykyk7a0BTVzO6YNyJhuryDnJWJLsS0lbJ9RkrOXsMhIqPBF7mq', 'indika', 'department head', 'computer science', 'depthead@cs.com', '11111', '11111', 771234567, 'matara', 'female'),
('a4', '$2y$10$c3V1m/50SJsoehnZKMYqgOcGO1DwmRhKxfOrCh6FKWS9CTAuqkMfa', 'tharaka', 'academic', 'computer science', 'tharaka@gmail.com', '111111', '111111', 771234567, 'matara', 'male'),
('a5', '$2y$10$lGTDo1nUb/rrau79wRg3He2vTJmsrlNwV.F.UsdXtCxW2ZYcdNfra', 'geethika', 'academic support', 'computer science', 'geethika@gmail.com', '11111', '111111', 771234567, 'matara', 'female'),
('test', '$2y$10$85GAIBX5tRX5LeGxztEbSuHsntvJEdCk5bq8JPyrmQnwj.5UKzY2y', 'test', 'department head', 'computer science', 'test@gmail.com', '123123', '123213', 123123, 'test', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`username`,`achiev_name`,`achiev_type`);

--
-- Indexes for table `commities`
--
ALTER TABLE `commities`
  ADD PRIMARY KEY (`username`,`comm_name`);

--
-- Indexes for table `comm_services`
--
ALTER TABLE `comm_services`
  ADD PRIMARY KEY (`username`,`comm_srv_act`);

--
-- Indexes for table `contri_in`
--
ALTER TABLE `contri_in`
  ADD PRIMARY KEY (`username`,`in_activity`);

--
-- Indexes for table `contri_na`
--
ALTER TABLE `contri_na`
  ADD PRIMARY KEY (`username`,`cn_activity`);

--
-- Indexes for table `dok`
--
ALTER TABLE `dok`
  ADD PRIMARY KEY (`username`,`dok_activity`);

--
-- Indexes for table `events_con_org`
--
ALTER TABLE `events_con_org`
  ADD PRIMARY KEY (`username`,`event_name`);

--
-- Indexes for table `grant_`
--
ALTER TABLE `grant_`
  ADD PRIMARY KEY (`username`,`grant_name`);

--
-- Indexes for table `intro_ex_co`
--
ALTER TABLE `intro_ex_co`
  ADD PRIMARY KEY (`username`,`ex_name`);

--
-- Indexes for table `new_intro_co`
--
ALTER TABLE `new_intro_co`
  ADD PRIMARY KEY (`username`,`co_name`);

--
-- Indexes for table `outreach_acti`
--
ALTER TABLE `outreach_acti`
  ADD PRIMARY KEY (`username`,`activity`);

--
-- Indexes for table `publication_c`
--
ALTER TABLE `publication_c`
  ADD PRIMARY KEY (`username`,`c_paper_title`);

--
-- Indexes for table `publication_j`
--
ALTER TABLE `publication_j`
  ADD PRIMARY KEY (`username`,`j_paper_title`);

--
-- Indexes for table `staff_dev_con`
--
ALTER TABLE `staff_dev_con`
  ADD PRIMARY KEY (`username`,`name`);

--
-- Indexes for table `staff_dev_par`
--
ALTER TABLE `staff_dev_par`
  ADD PRIMARY KEY (`username`,`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
