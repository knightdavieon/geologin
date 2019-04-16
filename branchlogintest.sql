-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 12:09 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `branchlogintest`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(200) NOT NULL,
  `user_staffcode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_fname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_priviledge` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_staffcode`, `user_fname`, `user_lname`, `user_password`, `user_status`, `user_priviledge`) VALUES
(1, '1', 'John Dave', 'Espinosa', '1', 'Active', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(200) NOT NULL,
  `user_staffcode` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `date_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `user_staffcode`, `user_name`, `activity`, `date_time`) VALUES
(1, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 17:45:58'),
(2, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 17:46:02'),
(3, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 17:46:14'),
(4, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 17:51:14'),
(5, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 17:51:27'),
(6, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 17:54:32'),
(7, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:03:19'),
(8, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:14:34'),
(9, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:14:47'),
(10, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:16:10'),
(11, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:18:00'),
(12, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:20:33'),
(13, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:20:35'),
(14, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:20:51'),
(15, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:20:52'),
(16, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:20:52'),
(17, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:20:53'),
(18, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:21:23'),
(19, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:21:33'),
(20, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:21:40'),
(21, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:41:22'),
(22, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:50:18'),
(23, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:51:34'),
(24, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:53:25'),
(25, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:53:36'),
(26, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:54:06'),
(27, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:54:25'),
(28, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:54:51'),
(29, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:54:57'),
(30, '1', 'John Dave Espinosa', 'Logged in using this IP ', '14/03/2019, 18:55:23'),
(31, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '14/03/2019, 18:55:57'),
(32, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '15/03/2019, 08:35:46'),
(33, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '18/03/2019, 08:58:55'),
(34, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '18/03/2019, 09:08:40'),
(35, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '18/03/2019, 09:28:00'),
(36, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '18/03/2019, 09:28:33'),
(37, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '18/03/2019, 09:36:00'),
(38, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '18/03/2019, 09:46:08'),
(39, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '19/03/2019, 09:33:04'),
(40, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '19/03/2019, 09:33:23'),
(41, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '19/03/2019, 09:51:18'),
(42, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '20/03/2019, 14:15:09'),
(43, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '20/03/2019, 14:15:09'),
(44, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '20/03/2019, 14:15:09'),
(45, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '20/03/2019, 14:15:09'),
(46, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '20/03/2019, 14:15:21'),
(47, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '20/03/2019, 14:15:33'),
(48, '1', 'John Dave Espinosa', 'Created new user with the staff code \'13\' in using this IP ::1', '20/03/2019, 17:52:04'),
(49, '1', 'John Dave Espinosa', 'Updated user with the staff code \'1\' in using this IP ::1', '20/03/2019, 17:58:17'),
(50, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '25/03/2019, 14:49:14'),
(51, '1', 'John Dave Espinosa', 'Updated user with the staff code \'1\' in using this IP ::1', '25/03/2019, 14:49:29'),
(52, '1', 'John Dave Espinosa', 'Updated user with the staff code \'1\' in using this IP ::1', '25/03/2019, 14:49:36'),
(53, '1', 'John Dave Espinosa', 'Deleted user with the staff code \'1\' in using this IP ::1', '25/03/2019, 15:20:03'),
(54, '1', 'John Dave Espinosa', 'Deleted user with the staff code \'1\' in using this IP ::1', '25/03/2019, 15:20:34'),
(55, '1', 'John Dave Espinosa', 'Created new user with the staff code \'qwe\' in using this IP ::1', '25/03/2019, 15:21:10'),
(56, '1', 'John Dave Espinosa', 'Deleted user with the staff code \'qwe\' in using this IP ::1', '25/03/2019, 15:21:15'),
(57, '1', 'John Dave Espinosa', 'Activated user with the staff code \'1\' in using this IP ::1', '25/03/2019, 15:49:26'),
(58, '1', 'John Dave Espinosa', 'Deactivated user with the staff code \'1\' in using this IP ::1', '25/03/2019, 15:49:33'),
(59, '1', 'John Dave Espinosa', 'Activated user with the staff code \'1\' in using this IP ::1', '25/03/2019, 15:49:38'),
(60, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '26/03/2019, 10:55:34'),
(61, '1', 'John Dave Espinosa', 'Created new user with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 11:11:42'),
(62, '1', 'John Dave Espinosa', 'Created new user with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 11:12:18'),
(63, '1', 'John Dave Espinosa', 'Created new user with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 11:12:32'),
(64, '1', 'John Dave Espinosa', 'Deleted user with the staff code \'<br />\r\n<b>Notice</b>:  Undefined index: user_staffcode in <b>C:\\xampp\\htdocs\\projects\\geologin\\admin\\actions\\users\\modals.php</b> on line <b>65</b><br />\r\n\' in using', '26/03/2019, 11:13:12'),
(65, '1', 'John Dave Espinosa', 'Activated user with the staff code \'<br />\r\n<b>Notice</b>:  Undefined index: user_staffcode in <b>C:\\xampp\\htdocs\\projects\\geologin\\admin\\actions\\users\\modals.php</b> on line <b>15</b><br />\r\n\' in usi', '26/03/2019, 11:28:29'),
(66, '1', 'John Dave Espinosa', 'Activated user with the staff code \'<br />\r\n<b>Notice</b>:  Undefined index: user_staffcode in <b>C:\\xampp\\htdocs\\projects\\geologin\\admin\\actions\\users\\modals.php</b> on line <b>15</b><br />\r\n\' in usi', '26/03/2019, 11:29:23'),
(67, '1', 'John Dave Espinosa', 'Activated user with the staff code \'<br />\r\n<b>Notice</b>:  Undefined index: user_staffcode in <b>C:\\xampp\\htdocs\\projects\\geologin\\admin\\actions\\users\\modals.php</b> on line <b>15</b><br />\r\n\' in usi', '26/03/2019, 11:30:49'),
(68, '1', 'John Dave Espinosa', 'Activated employee with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 11:31:16'),
(69, '1', 'John Dave Espinosa', 'Deactivated employee with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 11:31:19'),
(70, '1', 'John Dave Espinosa', 'Deleted user with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 11:31:21'),
(71, '1', 'John Dave Espinosa', 'Deleted user with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 11:31:53'),
(72, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 11:33:09'),
(73, '1', 'John Dave Espinosa', 'Activated employee with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 11:33:14'),
(74, '1', 'John Dave Espinosa', 'Deactivated employee with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 11:33:17'),
(75, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'16377\' in using this IP ::1', '26/03/2019, 11:38:37'),
(76, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '26/03/2019, 15:32:55'),
(77, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 15:42:16'),
(78, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'16397\' in using this IP ::1', '26/03/2019, 15:42:53'),
(79, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 15:44:38'),
(80, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'ewq\' in using this IP ::1', '26/03/2019, 15:46:14'),
(81, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'eee\' in using this IP ::1', '26/03/2019, 15:47:07'),
(82, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'qwe3232\' in using this IP ::1', '26/03/2019, 15:56:08'),
(83, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'qwe32312\' in using this IP ::1', '26/03/2019, 15:56:30'),
(84, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'rqrwr\' in using this IP ::1', '26/03/2019, 15:57:34'),
(85, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'qwe21\' in using this IP ::1', '26/03/2019, 15:57:44'),
(86, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'rqrwr\' in using this IP ::1', '26/03/2019, 16:37:08'),
(87, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'qwe3232\' in using this IP ::1', '26/03/2019, 16:37:12'),
(88, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'qwe32312\' in using this IP ::1', '26/03/2019, 16:37:16'),
(89, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'qwe21\' in using this IP ::1', '26/03/2019, 16:37:20'),
(90, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'qwe\' in using this IP ::1', '26/03/2019, 16:37:23'),
(91, '1', 'John Dave Espinosa', 'Updated user with the staff code \'1\' in using this IP ::1', '26/03/2019, 17:05:52'),
(92, '1', 'John Dave Espinosa', 'Updated user with the staff code \'eee\' in using this IP ::1', '26/03/2019, 17:06:04'),
(93, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'ewq\' in using this IP ::1', '26/03/2019, 17:06:13'),
(94, '1', 'John Dave Espinosa', 'Updated user with the staff code \'eee\' in using this IP ::1', '26/03/2019, 17:06:22'),
(95, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '27/03/2019, 09:30:20'),
(96, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '27/03/2019, 09:31:05'),
(97, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '27/03/2019, 09:33:11'),
(98, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '27/03/2019, 09:46:54'),
(99, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'qwe\' in using this IP ::1', '27/03/2019, 09:47:15'),
(100, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '27/03/2019, 14:54:41'),
(101, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'qweqweqwe\' in using this IP ::1', '27/03/2019, 15:06:20'),
(102, '1', 'John Dave Espinosa', 'Activated employee with the staff code \'qweqweqwe\' in using this IP ::1', '27/03/2019, 15:07:37'),
(103, '1', 'John Dave Espinosa', 'Deactivated employee with the staff code \'qweqweqwe\' in using this IP ::1', '27/03/2019, 15:07:44'),
(104, '1', 'John Dave Espinosa', 'Updated user with the staff code \'qweqweqwe\' in using this IP ::1', '27/03/2019, 15:07:53'),
(105, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'qweqweqwe\' in using this IP ::1', '27/03/2019, 15:08:02'),
(106, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '28/03/2019, 16:16:09'),
(107, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'1\' in using this IP ::1', '28/03/2019, 16:16:43'),
(108, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '29/03/2019, 09:12:07'),
(109, '1', 'John Dave Espinosa', 'Updated user with the staff code \'1\' in using this IP ::1', '29/03/2019, 09:12:19'),
(110, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '29/03/2019, 16:43:58'),
(111, '1', 'John Dave Espinosa', 'Activated employee with the staff code \'16397\' in using this IP ::1', '29/03/2019, 16:48:33'),
(112, '1', 'John Dave Espinosa', 'Activated employee with the staff code \'16377\' in using this IP ::1', '29/03/2019, 16:49:33'),
(113, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'eee\' in using this IP ::1', '29/03/2019, 16:49:47'),
(114, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'qwe\' in using this IP ::1', '29/03/2019, 16:49:50'),
(115, '1', 'John Dave Espinosa', 'Deleted employee with the staff code \'1\' in using this IP ::1', '29/03/2019, 16:49:54'),
(116, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'10151\' in using this IP ::1', '29/03/2019, 16:58:41'),
(117, '1', 'John Dave Espinosa', 'Activated employee with the staff code \'10151\' in using this IP ::1', '29/03/2019, 16:59:06'),
(118, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '02/04/2019, 16:58:11'),
(119, '1', 'John Dave Espinosa', 'Created new employee with the staff code \'16044\' in using this IP ::1', '02/04/2019, 17:00:30'),
(120, '1', 'John Dave Espinosa', 'Activated employee with the staff code \'16044\' in using this IP ::1', '02/04/2019, 17:00:40'),
(121, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '10/04/2019, 17:11:08'),
(122, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '11/04/2019, 09:06:38'),
(123, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '12/04/2019, 16:35:00'),
(124, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '16/04/2019, 17:13:46'),
(125, '1', 'John Dave Espinosa', 'Logged in using this IP ::1', '16/04/2019, 17:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_staffcode` varchar(255) NOT NULL,
  `emp_fname` varchar(255) NOT NULL,
  `emp_lname` varchar(255) NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `emp_contact` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_department` varchar(255) NOT NULL,
  `emp_position` varchar(255) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `emp_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_staffcode`, `emp_fname`, `emp_lname`, `emp_address`, `emp_contact`, `emp_email`, `emp_department`, `emp_position`, `emp_password`, `emp_status`) VALUES
(5, '16377', 'John Mark', ' Morales', '122334', '09087885028', 'johnmarkmorales04.jmm@gmail.com', 'MIS', 'IT Staff', '2328', 'Active'),
(6, '16397', 'John Dave', 'Espinosa', 'Bahay', 'Number', 'Email', 'MIS', 'DEV', 'qwe', 'Active'),
(12, '10151', 'Jonnel', 'Albino', '183 P. Gomez St. Bagumbayan Bocaue, Bulacan', '09209030982', 'jonnelalbino@gmail.com', 'MIS', 'IT', '202020', 'Active'),
(13, '16044', 'Edison', 'Estrada', 'Pasig City', '09460188313', 'edisonestrada801@gmail.com', 'MIS', 'I.T. Staff', 'Edison16044', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(200) NOT NULL,
  `user_staffcode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_fname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_branch` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
