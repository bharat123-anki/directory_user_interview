-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 02:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `directory_interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `directory_info`
--

CREATE TABLE `directory_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_image_path` text,
  `email` varchar(60) DEFAULT NULL,
  `mobile_no` bigint(20) DEFAULT NULL,
  `landline_no` varchar(20) DEFAULT NULL,
  `notes` text,
  `view_count` longtext,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `directory_info`
--

INSERT INTO `directory_info` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `user_image_path`, `email`, `mobile_no`, `landline_no`, `notes`, `view_count`, `is_deleted`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 1, 'Bharat', 'JAGDAMBA', 'Yadav', '', 'bharat@gmail.com', 909090909, NULL, NULL, '', 1, 1, '2021-04-29 18:17:37', 1, '2021-05-28 17:37:54'),
(4, 2, 'Ankita', 'Bharat', 'YAdav', '', NULL, NULL, NULL, NULL, '', 0, 1, '2021-04-29 18:17:42', 1, '2021-05-28 17:37:54'),
(5, 2, 'Pajav', 'Singh', 'Ture', '\r\n', 'paji@gmail', 9090909090, NULL, NULL, '', 0, 1, '2021-04-29 18:18:18', NULL, '2021-05-28 17:37:54'),
(6, 1, 'milind', 'Ganatra', 'Pravin', 'Screenshot_(21).png', 'miling@gmail.com', 8879715444, '', NULL, '', 1, 1, '2021-04-29 18:21:34', 1, '2021-06-01 15:55:36'),
(7, 2, 'Oiyush', 'Salunkhe', 'qwety', '', 'piyush@gmail.com', NULL, NULL, NULL, '', 1, 1, '2021-04-29 18:22:11', 1, '2021-05-28 17:37:54'),
(8, 2, 'No image no', '3', '3', '', NULL, NULL, NULL, NULL, '', 1, 1, '2021-04-29 23:51:51', 1, '2021-05-28 17:37:54'),
(10, 1, 'Mirchi', 'Rajkamal', 'Yadav', 'Screenshot_(32).png', 'mirchi@gmail.com', 9090909090, '4567', NULL, '', 0, 1, '2021-05-28 15:34:08', 1, '2021-05-28 17:37:54'),
(11, 1, 'Darshini', 'Chauhan', 'Bharta', 'Screenshot_(29).png', '', 0, '', '', '', 1, 1, '2021-05-28 15:37:09', 1, '2021-06-01 15:53:46'),
(12, 1, 'darshini', 'rajkamal', 'yadav', 'download1.jpg', 'darshu@hh.f', 9099098977, '', 'hello', '', 0, 1, '2021-05-11 15:49:55', 1, '2021-06-01 16:27:29'),
(13, 5, 'aatish', 'harishf', 'aat', 'Screenshot_(24).png', 'aatish@gmail.com', 9099098903, '', '', '', 0, 5, '2021-05-27 16:15:54', 5, '2021-06-01 17:42:06'),
(14, 5, 'checklead qqqqqqqqqqqqqqqqqqqqq', 'lead', 'leading upd', 'Screenshot_(39).png', 'update@gmail.com', 1232123234, '4545545', NULL, '', 0, 5, '2021-05-28 16:16:26', 5, '2021-05-28 17:37:54'),
(15, 5, 'checklead qqqqqqqqqqqqqqqqqqqqq', 'lead', 'leading', '', 'bharat@gmail.com', 8989767878, '', NULL, '', 1, 5, '2021-05-26 16:18:41', 5, '2021-06-01 17:09:11'),
(16, 5, 'charmi', 'pravin', 'ganatra', '', 'bharat@gmail.com', 8097172307, '', NULL, '', 0, 5, '2021-05-30 16:50:44', NULL, '2021-06-01 17:05:59'),
(17, 5, 'ajinkya', 'rahane', 'shah', '', 'aatish@gmail.com', 9099098903, '', 'hhh', '', 1, 5, '2021-05-28 16:54:49', 5, '2021-06-01 17:08:52'),
(18, 5, 'charmi.s', 'pravin', 'ganatra', '', 'bharat@gmail.com', 8097172307, '123456', NULL, '', 0, 5, '2021-05-28 16:57:34', 5, '2021-05-28 17:37:54'),
(19, 6, 'mayuri', 'bhaarat', 'Yadav', 'Screenshot_(32)2.png', 'mayuri@gmail.com', 9999995454, '123456789', 'Hello Mayuri Bharta', NULL, 0, 6, '2021-05-28 20:44:29', 6, '2021-05-28 20:45:01'),
(20, 6, 'vishaka', 'smitesh', 'Yadav', '', 'vishaka@hh.gg', 1234567890, 'hhhh', 'yuiop[', NULL, 0, 6, '2021-05-28 21:07:08', NULL, '0000-00-00 00:00:00'),
(21, 1, 'genuine', 'test', 'user', '', '', 0, '', '', NULL, 1, 1, '2021-06-01 11:26:36', 1, '2021-06-01 16:09:17'),
(22, 1, 'genuines', 'user', 'info', 'download.jpg', 'ggg@hh.com', 1233213456, '', '', NULL, 1, 1, '2021-06-01 11:29:24', 1, '2021-06-01 15:57:44'),
(23, 9, 'tanvi', 'mayur', 'Deshpand', 'Screenshot_(27)1.png', 'fgg@gg.hh', 9090909090, '312345686789', 'ff', NULL, 0, 9, '2021-06-01 16:51:49', 9, '2021-06-01 17:03:25'),
(24, 10, 'tarun', 'taru', 'taaa', 'Screenshot_(30).png', 'ta@fma.com', 1234567890, '12345678908', 'hello', NULL, 0, 10, '2021-06-01 17:50:28', 10, '2021-06-01 17:52:54'),
(25, 10, 'checklead qqqqqqqqqqqqqqqqqqqqq', 'lead', 'leading', 'Screenshot_(14)1.png', 'bharat@gmail.com', 1234567890, '', '', NULL, 0, 10, '2021-06-01 17:51:23', 10, '2021-06-01 17:52:36'),
(26, 10, 'laaaaaa', 'qqqqqqq', 'leading', '', 'bharat@gmail.com', 9123456789, '', '', NULL, 0, 10, '2021-06-01 17:56:36', 10, '2021-06-01 17:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Bharat', 'test@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1, '2021-04-28 15:58:41', 0, '2021-04-29 11:24:01'),
(2, 'testing', 'qwerty@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, '2021-04-30 18:15:40', 0, '0000-00-00 00:00:00'),
(5, 'bhar', 'testing@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, '2021-05-01 16:53:42', 0, '2021-06-01 17:05:03'),
(6, 'Mayuri', 'Mayuri@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, '2021-05-28 20:39:10', 0, '0000-00-00 00:00:00'),
(9, 'newuser', 'newuser@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, '2021-06-01 16:46:08', 0, '2021-06-01 16:46:41'),
(10, 'tanya', 'tanya@gmail.com', 'd37eaa547940fdd713097006308bf6c9', 0, '2021-06-01 17:49:36', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `directory_info`
--
ALTER TABLE `directory_info`
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
-- AUTO_INCREMENT for table `directory_info`
--
ALTER TABLE `directory_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
