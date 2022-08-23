-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 01:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cman`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `Bank_Name` varchar(200) DEFAULT NULL,
  `Account_Number` varchar(200) DEFAULT NULL,
  `Branch` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `Bank_Name`, `Account_Number`, `Branch`) VALUES
(1, 'LIPA NA MPESA', '11111110', 'Safaricom'),
(2, 'COPARATIVE BANK', '0213289993', 'Meru'),
(3, 'NATIONAL BANK', '099887765666', 'Meru'),
(4, 'COMMERCIAL BANK', '3476374654623', 'Meru'),
(5, 'STARDAND CHARTER', '345646332', 'Meru'),
(6, 'EQUIT BANK', '21242423432', 'Meru');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `church_id` int(20) NOT NULL,
  `action` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `username`, `church_id`, `action`, `timestamp`) VALUES
(152, 'Moses` cradle', 4, 'User login', '2022-08-21 06:53:13'),
(153, 'Kisaakye Caleb', 34, 'Data entrant has Logged in', '2022-08-21 07:02:57'),
(154, 'henry kakembo', 5, 'Admin Log in', '2022-08-21 07:03:21'),
(155, 'kakembo henry', 5, 'User has logged out', '2022-08-21 07:19:23'),
(156, 'Moses` cradle', 4, 'User login', '2022-08-21 07:19:48'),
(157, 'Moses` cradle', 4, 'User has logged out', '2022-08-21 07:34:21'),
(158, 'Moses` cradle', 4, 'User login', '2022-08-23 08:48:36'),
(159, 'Moses` cradle', 4, 'User has logged out', '2022-08-23 09:56:02'),
(160, 'Moses` cradle', 4, 'User login', '2022-08-23 09:56:10'),
(161, 'Moses` cradle', 0, 'Added a new member', '2022-08-23 10:03:26'),
(162, 'Moses` cradle', 0, 'Added a new member', '2022-08-23 10:09:19'),
(163, 'Moses` cradle', 4, 'User has logged out', '2022-08-23 10:16:52'),
(164, 'Jaggwe James', 4, 'User has logged out', '2022-08-23 11:05:07'),
(165, 'henry kakembo', 5, 'Admin Log in', '2022-08-23 11:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(128) NOT NULL,
  `user_id` int(100) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `adminthumbnails` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_id`, `firstname`, `surname`, `adminthumbnails`) VALUES
(1, 5, 'kakembo', 'henry', '');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `times` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `title`, `content`, `times`) VALUES
(1, 'notice', 'ALL FEES SHOULD BE PAID THROUGH THE ACCOUNTS GIVEN. NO CASH WILL BE ACCEPTED', '2016-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `churches`
--

CREATE TABLE `churches` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date_established` varchar(10) NOT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `churches`
--

INSERT INTO `churches` (`id`, `user_id`, `name`, `date_established`, `isVerified`, `avatar`, `timestamp`) VALUES
(4, 4, 'Moses` cradle', '2011-02-11', 1, '../public/uploads/freelancer1.jpg', '2022-08-20 19:29:44'),
(5, 6, 'Gods glory', '2010-02-11', 1, '3.PNG', '2022-08-13 11:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `church_staff`
--

CREATE TABLE `church_staff` (
  `id` int(11) NOT NULL,
  `church_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `residence` varchar(30) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `role` varchar(100) NOT NULL,
  `avatar` varchar(256) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `isVerified` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `church_staff`
--

INSERT INTO `church_staff` (`id`, `church_id`, `user_id`, `first_name`, `surname`, `phone_number`, `email`, `dob`, `residence`, `marital_status`, `role`, `avatar`, `occupation`, `isVerified`, `timestamp`) VALUES
(10, 4, 34, 'Caleb', 'Kisaakye', 2147483647, 'caleb@gmail.com', '2022-08-19', 'nateete', 'None', 'data_entrant', '', 'developer', 1, '2022-08-21 07:02:17'),
(11, 4, 36, 'James', 'Jaggwe', 787072005, 'mobd3ep@gmail.com', '', 'kamwokya', '', 'admin', '../public/uploads/fb.jpeg', 'Super', 1, '2022-08-23 10:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `congrigants`
--

CREATE TABLE `congrigants` (
  `congrigation_id` int(11) NOT NULL,
  `church_id` varchar(30) NOT NULL,
  `service_id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `congrigants`
--

INSERT INTO `congrigants` (`congrigation_id`, `church_id`, `service_id`, `member_id`, `created_at`) VALUES
(1, '4', 1, 'cm1', '2022-01-30 15:24:32'),
(3, '4', 1, 'cm2', '2022-01-30 15:43:12'),
(4, '4', 1, 'cm3', '2022-01-30 15:57:41'),
(5, '4', 2, 'cm4', '2022-04-11 09:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `verification_code` varchar(6) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`id`, `email`, `verification_code`, `timestamp`) VALUES
(18, 'Combs@gmail.com', '721276', '2022-08-17 11:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(100) NOT NULL,
  `church_id` int(20) NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `giving`
--

CREATE TABLE `giving` (
  `givingid` int(10) NOT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  `church_id` varchar(30) NOT NULL,
  `Amount` varchar(100) DEFAULT NULL,
  `paytime` timestamp NULL DEFAULT current_timestamp(),
  `na` varchar(10) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `giving`
--

INSERT INTO `giving` (`givingid`, `member_id`, `church_id`, `Amount`, `paytime`, `na`, `reason`, `service_id`) VALUES
(1, 'JCC12', '', '890000', '2022-04-14 06:17:32', '0787999987', 'camera', 2),
(2, 'J0067', '', '700000', '2022-04-14 06:18:05', '0787999987', 'computer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mc`
--

CREATE TABLE `mc` (
  `mc_id` varchar(20) NOT NULL,
  `mc_name` varchar(255) NOT NULL,
  `church_id` varchar(30) NOT NULL,
  `mc_leader` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(10) NOT NULL,
  `attendance` int(10) NOT NULL,
  `offering` int(11) NOT NULL,
  `salvation` int(11) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mc`
--

INSERT INTO `mc` (`mc_id`, `mc_name`, `church_id`, `mc_leader`, `location`, `date`, `time`, `attendance`, `offering`, `salvation`, `mobile`) VALUES
('mc1', 'kyaggwe', '4', 'leo', 'kampala', '2022-09-10', '23:36', 0, 0, 0, '0716804062'),
('mc2', 'kyaggwe', '4', 'qee', 'ndebba', '2022-08-25', '18:41', 0, 0, 0, '0712808562');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `church_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `mobile` int(11) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `residence` varchar(20) NOT NULL,
  `workplace` varchar(20) NOT NULL,
  `ministry` varchar(20) NOT NULL,
  `marital_status` varchar(15) NOT NULL,
  `date_of_marriage` varchar(15) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `mc` varchar(20) NOT NULL,
  `zone` varchar(30) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`church_id`, `id`, `member_id`, `fname`, `sname`, `mobile`, `birthday`, `residence`, `workplace`, `ministry`, `marital_status`, `date_of_marriage`, `occupation`, `mc`, `zone`, `thumbnail`, `timestamp`) VALUES
(4, 1, 'cm1', 'mbuuse', 'victor', 712804062, '2022-08-26', 'Wakiso', 'Buckingham', 'Praise and Worship', 'Married', '2022-08-05', 'non specific', 'kazo', 'makerere', 'uploads/img.png', '2022-08-13 11:38:29'),
(4, 2, 'cm2', 'penlope', 'martin', 712804061, '2022-08-26', 'Wakiso', 'Buckingham', 'None', 'Married', '2022-08-06', 'non specific', 'kazo', 'makerere', 'uploads/admin login.PNG', '2022-08-13 11:38:33'),
(4, 3, 'cm3', 'jay', 'son', 712803862, '2022-08-26', 'Wakiso', 'Buckingham', 'Hostessing', 'Married', '2022-08-06', 'non specific', 'kazo', 'makerere', 'uploads/3.PNG', '2022-08-13 11:38:41'),
(4, 4, 'cm4', 'gang', 'victor', 716804062, '2022-08-27', 'Wakiso', 'Buckingham', 'Praise and Worship', 'Married', '2022-09-03', 'non specific', 'kazo', 'makerere', 'uploads/2.PNG', '2022-08-13 11:38:53'),
(4, 5, 'cm5', 'moses', 'victor', 712804067, '2022-08-05', 'Wakiso', 'Buckingham', 'Praise and Worship', 'Single', '2022-08-06', 'non specific', 'kazo', 'makerere', 'uploads/3.PNG', '2022-08-13 11:38:58'),
(4, 6, 'cm6', 'jotham', 'wasswa', 712504062, '2022-08-10', 'Wakiso', 'Buckingham', 'Hostessing', 'Married', '2022-08-02', 'non specific', 'kazo', 'makerere', 'uploads/2.PNG', '2022-08-13 11:39:05'),
(6, 7, 'm1', 'wasswa', 'jotham', 712804062, '2022-08-04', 'Wakiso', 'Buckingham', 'Pastor', 'None', '2022-08-12', 'non specific', 'kazo', 'makerere', 'uploads/', '2022-08-13 11:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `offering`
--

CREATE TABLE `offering` (
  `offeringid` int(10) NOT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  `church_id` varchar(20) NOT NULL,
  `Offering` int(255) NOT NULL,
  `Sponsorship` int(255) NOT NULL,
  `Evangelism` int(255) NOT NULL,
  `pastor` int(255) NOT NULL,
  `service_id` int(11) NOT NULL,
  `paytime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `reset_code` varchar(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `reset_code`, `email`, `timestamp`) VALUES
(7, '145921', 'ping@gmail.com', '2022-08-05 17:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `familyname` varchar(100) NOT NULL,
  `church_id` varchar(30) NOT NULL,
  `time` time NOT NULL,
  `contact` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`familyname`, `church_id`, `time`, `contact`) VALUES
('wasswa', '4', '52:06:09', 789166748);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleName`, `description`, `createAt`) VALUES
(1, 'Admin', 'All', '2022-01-28 09:54:57'),
(2, 'Senior Pastor', 'All', '2022-01-28 09:54:57'),
(3, 'Data Entrant', 'Can edit, delete, enter and view', '2022-01-28 09:56:41'),
(4, 'Treasurer', 'Can edit, delete, enter and view', '2022-01-28 09:56:41'),
(5, 'Date viewer', 'Can only view', '2022-01-28 09:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_date`) VALUES
(1, 'Free Sunday Service', '2021-12-26'),
(2, 'Celebrity Sunday', '2021-12-26'),
(3, 'Fellowship Sunday', '2022-04-10'),
(4, 'Trial', '2022-08-12'),
(5, 'testing', '2022-08-06'),
(6, 'testing 1', '2022-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` int(10) NOT NULL,
  `title` text NOT NULL,
  `church_id` int(20) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`sms_id`, `title`, `church_id`, `contact`, `content`, `date`) VALUES
(1, 'birthday', 0, '+256753273361', 'hello, today is your birthday', '2022-04-13 15:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` varchar(25) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `user_id`, `plan`, `start_date`, `end_date`, `timestamp`) VALUES
(8, 2, 'basic<br>', '2022-07-15 11:21:46', '2022-08-14 11:21:46', '2022-07-15 08:21:46'),
(9, 0, 'basic', '2022-07-15 12:45:54', '2022-08-14 12:45:58', '2022-07-15 09:45:54'),
(10, 5, 'basic', '2022-07-18 12:30:36', '2022-08-17 12:30:36', '2022-08-20 10:05:22'),
(11, 4, 'free', '2022-08-02 15:16:24', '2022-09-01 15:16:25', '2022-08-18 19:07:41'),
(12, 0, 'standard', '2022-08-20 13:23:47', '2022-09-19 13:23:47', '2022-08-20 10:23:47'),
(13, 4, 'basic', '2022-08-20 13:42:35', '2022-09-19 13:42:36', '2022-08-20 10:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `sub_payments`
--

CREATE TABLE `sub_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` varchar(15) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_payments`
--

INSERT INTO `sub_payments` (`id`, `user_id`, `plan`, `amount`, `created_at`) VALUES
(34, 2, 'basic<br>', '30000', '2022-07-15 08:21:46'),
(35, 0, 'basic', '30000', '2022-07-15 09:45:54'),
(36, 5, 'basic', '30000', '2022-07-18 09:30:36'),
(37, 0, 'basic', '30000', '2022-08-02 12:16:24'),
(38, 0, 'standard', '40000', '2022-08-20 10:20:44'),
(39, 0, 'standard', '40000', '2022-08-20 10:23:47'),
(40, 4, 'basic', '30000', '2022-08-20 10:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `sundays`
--

CREATE TABLE `sundays` (
  `child_id` varchar(255) NOT NULL,
  `church_id` varchar(30) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `birthday` varchar(100) DEFAULT NULL,
  `residence` varchar(100) DEFAULT NULL,
  `parent_name` varchar(50) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(5000) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sundays`
--

INSERT INTO `sundays` (`child_id`, `church_id`, `fname`, `sname`, `birthday`, `residence`, `parent_name`, `mobile`, `thumbnail`, `timestamp`) VALUES
('cm1', '4', 'penlope', 'martin', '2022-09-03', 'Wakiso', 'juma ', '0712504062', 'uploads/512247233453.PNG', '2022-08-11 11:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `tithe`
--

CREATE TABLE `tithe` (
  `titheid` int(10) NOT NULL,
  `Amount` varchar(100) DEFAULT NULL,
  `Member_ID` varchar(255) DEFAULT NULL,
  `paytime` timestamp NULL DEFAULT current_timestamp(),
  `na` varchar(10) DEFAULT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tithe`
--

INSERT INTO `tithe` (`titheid`, `Amount`, `Member_ID`, `paytime`, `na`, `service_id`) VALUES
(31, '40000', 'J001', '2022-01-24 12:29:11', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `timestamp`) VALUES
(4, 'ping@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-08-23 09:53:40'),
(5, 'kakembohenry@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-08-11 19:33:14'),
(6, 'wasswajotham@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-08-13 11:22:24'),
(34, 'caleb@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-08-17 12:08:00'),
(36, 'mobd3ep@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-08-23 10:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(128) NOT NULL,
  `admin_id` int(128) NOT NULL,
  `student_id` varchar(128) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(10) NOT NULL,
  `church_id` varchar(30) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `residence` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `event` varchar(20) NOT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `church_id`, `fname`, `sname`, `gender`, `residence`, `birthday`, `event`, `mobile`, `thumbnail`) VALUES
(1, '4', 'were', 'benjamin', 'male', 'kamwokya', '2022-08-03', 'Prayer Kesha', '0713485736', NULL),
(2, '4', 'mbuuse', 'son', 'male', 'jinja', '2022-09-02', 'Extreme Worship', '0772847362', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `churches`
--
ALTER TABLE `churches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `church_staff`
--
ALTER TABLE `church_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `congrigants`
--
ALTER TABLE `congrigants`
  ADD PRIMARY KEY (`congrigation_id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giving`
--
ALTER TABLE `giving`
  ADD PRIMARY KEY (`givingid`);

--
-- Indexes for table `mc`
--
ALTER TABLE `mc`
  ADD PRIMARY KEY (`mc_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offering`
--
ALTER TABLE `offering`
  ADD PRIMARY KEY (`offeringid`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`contact`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_payments`
--
ALTER TABLE `sub_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sundays`
--
ALTER TABLE `sundays`
  ADD PRIMARY KEY (`child_id`);

--
-- Indexes for table `tithe`
--
ALTER TABLE `tithe`
  ADD PRIMARY KEY (`titheid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `churches`
--
ALTER TABLE `churches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `church_staff`
--
ALTER TABLE `church_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `congrigants`
--
ALTER TABLE `congrigants`
  MODIFY `congrigation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `giving`
--
ALTER TABLE `giving`
  MODIFY `givingid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offering`
--
ALTER TABLE `offering`
  MODIFY `offeringid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_payments`
--
ALTER TABLE `sub_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tithe`
--
ALTER TABLE `tithe`
  MODIFY `titheid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
