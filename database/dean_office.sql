-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 03:30 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
(0, 'a12', '', 'Academic', 'academic', 'chemistry', 'a12@gmail.com', '1111', '1111', 1111, 'a12', 'male', '2021-04-09 13:30:25');

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
('a1', '$2y$10$s.Fqvvse.kolZdD5puOMJO8fQU9wM3TAqn9AJIUQcEQiVWeNCE0LK', 'mudith perera', 'admin', 'computer science', 'makawitagemudith@gmail.com', '123123', '990332770v', 778403561, '323/1, bathalahenawatta, gonawala, kelaniya', 'male'),
('a2', '$2y$10$qYRftdL7ezeEuuV1D4v4TeSgcEgV4vrzKUGcmWAuQ7ZpKa6l/gYee', 'a2', 'dean', 'mathematics', 'a2@gmail.com', '34345345', '345345345', 345345345, 'sri lanka', 'male'),
('a3', '$2y$10$9TRaTBPn4YGbcPTkFHkKt.dXBnzNuEkzRjrF5lNCedo7FQl9zRciW', 'a3', 'department head', 'physics', 'a2@gmail.com', '45674435', '34563463563', 345636345, '', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
