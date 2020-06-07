-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 08:49 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coaching`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Techno', 'info@technothinksup.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` bigint(20) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_address` varchar(350) NOT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `state_id` bigint(20) NOT NULL,
  `company_statecode` bigint(20) NOT NULL,
  `company_mob1` varchar(12) NOT NULL,
  `company_mob2` varchar(12) NOT NULL,
  `company_email` varchar(150) NOT NULL,
  `company_website` varchar(150) NOT NULL,
  `company_pan_no` varchar(12) NOT NULL,
  `company_gst_no` varchar(100) NOT NULL,
  `company_cin_no` varchar(50) DEFAULT NULL,
  `company_iec_no` varchar(50) DEFAULT NULL,
  `company_logo` varchar(200) NOT NULL,
  `company_seal` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`, `country_id`, `state_id`, `company_statecode`, `company_mob1`, `company_mob2`, `company_email`, `company_website`, `company_pan_no`, `company_gst_no`, `company_cin_no`, `company_iec_no`, `company_logo`, `company_seal`, `date`) VALUES
(1, 'CRM2', 'Rajarampuri Kolhapur', 101, 22, 27, '9876543210', '9998887770', 'demo@email.com', 'www.ppp.com', '111', '222', '1', '2', '', '', '2020-04-12 05:31:11'),
(4, 'satyam2', 'gaibi nagar kagal', 101, 22, 27, '9876549876', '9966558877', 'satyam@gmail.com', 'satyam.com', '123456', '123456', '123456', '123456', '', '', '2020-04-01 04:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `role_name` varchar(150) NOT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1,
  `role_addedby` int(11) DEFAULT NULL,
  `role_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `company_id`, `role_name`, `role_status`, `role_addedby`, `role_date`) VALUES
(1, 1, 'Admin', 1, 1, ''),
(2, 1, 'User', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `branch_id` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `user_name` varchar(250) NOT NULL,
  `user_lastname` varchar(100) NOT NULL,
  `user_city` text DEFAULT NULL COMMENT 'Address',
  `user_email` varchar(250) NOT NULL,
  `user_mobile` varchar(12) NOT NULL,
  `user_mobile2` varchar(20) DEFAULT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_otp` varchar(10) DEFAULT NULL,
  `user_website` varchar(150) DEFAULT NULL,
  `user_dob` varchar(20) DEFAULT NULL,
  `user_anniversary` varchar(20) DEFAULT NULL COMMENT 'anniversary date',
  `user_pan` varchar(100) DEFAULT NULL,
  `user_adhar` varchar(20) DEFAULT NULL,
  `user_bank` varchar(250) DEFAULT NULL,
  `user_acc_no` varchar(50) DEFAULT NULL,
  `user_bank_ifsc` varchar(50) DEFAULT NULL,
  `user_start_date` varchar(50) DEFAULT NULL,
  `user_end_date` varchar(50) DEFAULT NULL,
  `user_image` varchar(150) DEFAULT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'active',
  `user_addedby` varchar(100) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `company_id`, `group_id`, `branch_id`, `role_id`, `user_name`, `user_lastname`, `user_city`, `user_email`, `user_mobile`, `user_mobile2`, `user_password`, `user_otp`, `user_website`, `user_dob`, `user_anniversary`, `user_pan`, `user_adhar`, `user_bank`, `user_acc_no`, `user_bank_ifsc`, `user_start_date`, `user_end_date`, `user_image`, `user_status`, `user_addedby`, `user_date`, `is_admin`) VALUES
(1, 1, NULL, '', 1, 'Admin', '', 'Kolhapur', 'demo@email.com', '9876543210', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'Admin', '2020-01-08 09:55:02', 1),
(6, 1, NULL, '', 2, 'Datta Mane', '', 'Kop', 'datta@mail.com', '9673454383', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '1', '2020-02-12 06:56:56', 0),
(9, 4, NULL, '', 1, 'Admin', '', NULL, 'satyam@gmail.com', '9876549876', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 'Admin', '2020-03-31 12:02:25', 1),
(10, 1, 1, '3,2', 2, 'aaa', '', 'dfgsdfg', 'aaa@ddd.mmm', '45675467', '34574567', '', NULL, 'aaa.mmm', '18-05-1989', '15-02-2019', '7567', '67', 'fhjghj', '57567', '567', '567', '567', 'user_10_1586845568.jpg', '1', '1', '0000-00-00 00:00:00', 0),
(12, 1, 1, '3', 2, 'sdfgfg', '', 'sdfg', 'dfhjjh@vhj.ghj', '56785678', '', '', NULL, '', '08-04-2020', '', '78678', '678', 'fhjghj', '57567', '567', '578', '578', NULL, '1', '1', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
