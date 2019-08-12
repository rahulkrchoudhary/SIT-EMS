-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2019 at 04:24 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sit-ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `E_id` int(11) NOT NULL,
  `faculty` varchar(20) NOT NULL DEFAULT 'no',
  `student` varchar(20) NOT NULL DEFAULT 'no',
  `staff` varchar(20) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Department_id` int(11) NOT NULL,
  `department_name` varchar(20) NOT NULL,
  `E_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `E_id` int(11) NOT NULL,
  `E_name` varchar(30) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `Event_Incharge` varchar(30) NOT NULL,
  `Event_Date` date NOT NULL,
  `Programme` varchar(10) NOT NULL,
  `Attendees` varchar(30) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Achievments` varchar(100) NOT NULL,
  `event_status` varchar(20) NOT NULL DEFAULT 'pending',
  `Resource_name` varchar(40) NOT NULL,
  `Resource_designation` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`E_id`, `E_name`, `Department`, `Event_Incharge`, `Event_Date`, `Programme`, `Attendees`, `Type`, `Description`, `Achievments`, `event_status`, `Resource_name`, `Resource_designation`, `user_id`) VALUES
(54, 'Dance Battle', 'reverb', 'sdfdsfsdfds', '2018-01-01', 'M.Tech', 'Staff,Faculty', 'Guest Lecture', 'fjvk', ' vhjvkh', 'pending', 'hhhhh, dddddddd', 'bbbbb, ddddddddddd', 1),
(55, 'Cricket', 'reverb', 'sdfdsfsdfds', '2018-01-01', 'M.Tech', 'Staff,Faculty', 'Guest Lecture', 'fjvk', ' vhjvkh', 'pending', 'hhhhh', 'bbbbb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `Res_id` int(11) NOT NULL,
  `R_name` varchar(30) NOT NULL,
  `Designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `role`, `Designation`, `branch`, `password`) VALUES
(1, 'shreyash', 'abc@sit.com', 'faculty', 'Proffesor', 'Computer Science', 'shreyash'),
(2, 'vidhi', 'vidhi@sit.com', 'admin', 'Assistant', 'Computer Science', 'vidhi'),
(3, 'aditi', 'aditi@sit.com', 'information_officer', 'Assistant', 'Computer Science', 'aditi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`E_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `E_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
