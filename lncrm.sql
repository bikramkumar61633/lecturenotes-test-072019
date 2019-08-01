-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2019 at 01:11 AM
-- Server version: 5.7.25
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lncrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `type` set('Call','Email','Visit') NOT NULL DEFAULT 'Call',
  `description` text,
  `next_act_description` text NOT NULL,
  `next_time` datetime NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `customer_id`, `type`, `description`, `next_act_description`, `next_time`, `created_on`, `created_by`, `modified_on`, `modified_by`, `deleted`) VALUES
(1, 6, '', '', 'Test Act', '2019-10-10 10:10:00', '2019-07-31 18:01:33', 0, '0000-00-00 00:00:00', 0, 0),
(2, 6, 'Call', 'Test description will come here', 'Test action done', '2019-08-01 00:00:00', '2019-07-31 18:07:12', 0, '0000-00-00 00:00:00', 0, 0),
(3, 5, 'Email', 'Test description will come here once you have something to do here.', 'Visiting required to the client place.', '2019-08-01 00:00:00', '2019-07-31 18:14:49', 0, '0000-00-00 00:00:00', 0, 0),
(4, 7, 'Call', 'Please check your last bill', 'Visit the location to collect the bill.', '2019-08-01 10:10:00', '2019-07-31 18:21:22', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` set('Paid','Not Paid') DEFAULT 'Not Paid',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `emailid`, `phone`, `address`, `status`, `created_on`, `created_by`, `modified_on`, `modified_by`, `deleted`) VALUES
(3, 'Test', 'test@gmail.com', 1111112233, 'test', 'Not Paid', '2019-07-31 14:56:01', 0, '0000-00-00 00:00:00', 0, 0),
(4, 'test', 'test@gmail.com', 11233, 'test', 'Not Paid', '2019-07-31 14:56:38', 0, '0000-00-00 00:00:00', 0, 0),
(5, 'Test 34', 'test234@gmail.com', 72364527, 'test addres line 245', 'Not Paid', '2019-07-31 17:04:40', 0, '0000-00-00 00:00:00', 0, 0),
(6, 'trstt', 'rt56', 236745627, 'test address 7888', 'Not Paid', '2019-07-31 17:04:56', 0, '0000-00-00 00:00:00', 0, 0),
(7, 'Khageswar', 'khageswar@gmail.com', 9439361633, 'Begur, Bengaluru, Karnataka, India', 'Not Paid', '2019-07-31 18:20:10', 0, '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_on` datetime DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `emailid`, `phone`, `password`, `created_on`, `created_by`, `modified_on`, `modified_by`, `deleted`) VALUES
(2, 'Khageswar', 'khageswar@gmail.com', 9439361633, '$2a$08$4c8HX4WnfmXZtUg.9CLez.bxxwcYVtgWCnV7EZhEfhvkgpgA7ooSm', '2019-07-31 19:08:21', 0, '0000-00-00 00:00:00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
