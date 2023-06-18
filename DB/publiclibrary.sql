-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 12:38 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publiclibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaid` int(3) NOT NULL,
  `areaname` varchar(60) NOT NULL,
  `areadesc` varchar(200) NOT NULL,
  `divid` int(2) NOT NULL,
  `distid` int(2) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaid`, `areaname`, `areadesc`, `divid`, `distid`, `createdate`) VALUES
(1, 'Mirpur', 'Mirpur All', 1, 45, '2016-11-19 15:53:10'),
(2, 'Dhanmondi', 'Dhanmondi area', 1, 45, '2016-11-19 16:32:31'),
(3, 'mirpur', 'mirpur-10', 1, 45, '2016-11-19 16:35:28'),
(4, 'Joypurhat ', 'joyputhat', 3, 5, '2016-11-19 16:36:07'),
(5, 'Companiganj', 'Companiganj', 4, 12, '2016-11-19 16:36:19'),
(6, 'Bhandaria	', 'Bhandaria upazila', 5, 29, '2016-11-19 16:36:39'),
(7, 'Magura Sadar Upazila', 'Magura Sadar Upazila', 2, 26, '2016-11-19 16:36:43'),
(8, 'Mohammadpur Upazila', 'Mohammadpur Upazila', 2, 26, '2016-11-19 16:36:54'),
(9, 'tangail bus stand', 'in main point of tangail dis', 1, 80, '2016-11-19 16:36:57'),
(10, 'Kawkhali', 'Kawkhali upazila', 5, 29, '2016-11-19 16:37:06'),
(11, 'Chatkhil', 'Chatkhil des', 4, 12, '2016-11-19 16:37:11'),
(12, 'Shalikha Upazila', 'Shalikha Upazila', 2, 26, '2016-11-19 16:37:15'),
(13, 'Mathbaria', 'Mathbaria upazila', 5, 29, '2016-11-19 16:37:24'),
(14, 'Sreepur Upazila', 'Sreepur Upazila', 2, 26, '2016-11-19 16:37:24'),
(15, 'Panchbibi', 'Panchbibi', 3, 5, '2016-11-19 16:37:27'),
(16, 'Panchbibi', 'Panchbibi', 3, 5, '2016-11-19 16:37:43'),
(18, 'Begumganj', 'Begumganj description', 4, 12, '2016-11-19 16:37:45'),
(19, 'Nazirpur', 'Nazirpur upazila', 5, 29, '2016-11-19 16:37:49'),
(21, 'tangail old bus stand', 'few km from asekpur', 1, 80, '2016-11-19 16:38:01'),
(24, 'Nesarabad', 'Nesarabad upazila', 5, 29, '2016-11-19 16:38:11'),
(25, 'Khetlal', 'Khetlal', 3, 5, '2016-11-19 16:38:17'),
(27, 'Kalia Upazila', 'Kalia Upazila', 2, 41, '2016-11-19 16:38:24'),
(28, 'Lohagara Upazila', 'Lohagara Upazila', 2, 41, '2016-11-19 16:38:33'),
(29, 'Pirojpur Sadar', 'Pirojpur Sadar', 5, 29, '2016-11-19 16:38:38'),
(30, 'Hatiya', 'Hatiya description', 4, 12, '2016-11-19 16:38:39'),
(31, 'Kalai ', 'Kalai ', 3, 5, '2016-11-19 16:38:42'),
(32, 'Narail Sadar Upazila', 'Narail Sadar Upazila', 2, 41, '2016-11-19 16:38:43'),
(33, 'Naragati Thana', 'Naragati Thana', 2, 41, '2016-11-19 16:38:50'),
(34, 'Noakhali Sadar', 'Noakhali Sadar description', 4, 12, '2016-11-19 16:39:05'),
(35, 'Zianagar', 'Zianagar upazila', 5, 29, '2016-11-19 16:39:06'),
(36, 'delduar thana ', 'delduar thana  here  is my nani bari', 1, 80, '2016-11-19 16:39:07'),
(38, 'Assasuni Upazila', 'Assasuni Upazila', 2, 43, '2016-11-19 16:39:15'),
(39, 'Senbag', 'Senbag description', 4, 12, '2016-11-19 16:39:21'),
(40, 'Akkelpur', 'Akkelpur', 3, 5, '2016-11-19 16:39:21'),
(41, 'Debhata Upazila', 'Debhata Upazila', 2, 43, '2016-11-19 16:39:24'),
(42, 'Kalaroa Upazila', 'Kalaroa Upazila', 2, 43, '2016-11-19 16:39:34'),
(43, 'Trishal', 'Trishal area.', 9, 100, '2016-11-19 16:39:42'),
(44, 'Kaliganj Upazila', 'Kaliganj Upazila', 2, 43, '2016-11-19 16:39:42'),
(45, 'Somaimuri', 'Somaimuri description', 4, 12, '2016-11-19 16:39:45'),
(46, 'Satkhira Sadar Upazila', 'Satkhira Sadar Upazila', 2, 43, '2016-11-19 16:39:53'),
(47, 'Shyamnagar Upazila', 'Shyamnagar Upazila', 2, 43, '2016-11-19 16:40:03'),
(48, 'Subarnachar', 'Subarnachar description', 4, 12, '2016-11-19 16:40:14'),
(49, 'Baluka', 'Baluka area.', 9, 100, '2016-11-19 16:40:22'),
(50, 'Tala Upazila', 'Tala Upazila', 2, 43, '2016-11-19 16:40:36'),
(51, 'tangail sadar', 'nice place of tangail ', 1, 80, '2016-11-19 16:40:38'),
(52, 'Kabir Hat', 'Kabir Hatr description', 4, 12, '2016-11-19 16:40:39'),
(53, 'Fulbharia', 'Fulbharia area.', 9, 100, '2016-11-19 16:40:48'),
(54, 'Rangabali', 'Rangabali Upazila', 5, 24, '2016-11-19 16:40:49'),
(55, 'Akhaura', 'Akhaura description', 4, 33, '2016-11-19 16:41:05'),
(56, 'Dumki', 'Dumki Upazila', 5, 24, '2016-11-19 16:41:13'),
(57, 'Fulpur', 'Fulpur area.', 9, 100, '2016-11-19 16:41:15'),
(58, 'ghatail ', 'ghatail  beside mymensingh', 1, 80, '2016-11-19 16:41:28'),
(59, 'Ashuganj', 'Ashuganj description', 4, 33, '2016-11-19 16:41:31'),
(60, 'Bancharampur', 'Bancharampur description', 4, 33, '2016-11-19 16:42:03'),
(61, 'Brahmanbaria Sadar', 'Brahmanbaria Sadar description', 4, 33, '2016-11-19 16:42:21'),
(62, 'basail', 'basail  beside mymensingh valuka thana.', 1, 80, '2016-11-19 16:42:23'),
(63, 'Muktagasa', 'Muktagasa area.', 9, 100, '2016-11-19 16:42:25'),
(64, 'Atrai Upazila', 'Atrai Upazila', 3, 56, '2016-11-19 16:42:31'),
(65, 'Kashba', 'Kashba description', 4, 33, '2016-11-19 16:42:45'),
(66, 'Badalgachhi Upazila', 'Badalgachhi Upazila', 3, 56, '2016-11-19 16:42:51'),
(68, 'basail', 'basail  beside mymensingh valuka thana.', 1, 80, '2016-11-19 16:42:57'),
(69, 'Nabinagar', 'Nabinagar description', 4, 33, '2016-11-19 16:43:01'),
(70, 'Nasirnagar', 'Nasirnagar description', 4, 33, '2016-11-19 16:43:14'),
(71, 'Dhamoirhat Upazila', 'Dhamoirhat Upazila', 3, 56, '2016-11-19 16:43:18'),
(73, 'Patuakhali Sadar', 'Patuakhali Sadar Upazila', 5, 24, '2016-11-19 16:43:27'),
(74, 'Sarail', 'Sarail description', 4, 33, '2016-11-19 16:43:29'),
(75, 'Manda Upazila', 'Manda Upazila', 3, 56, '2016-11-19 16:43:31'),
(77, 'sakipur', 'sakipur is very nice place', 1, 80, '2016-11-19 16:43:37'),
(78, 'Mohadevpur Upazila', 'Mohadevpur Upazila', 3, 56, '2016-11-19 16:43:44'),
(79, 'Mirzaganj', 'Mirzaganj Upazila', 5, 24, '2016-11-19 16:43:44'),
(80, 'Dewanganj', 'Dewanganj Upazila', 9, 61, '2016-11-19 16:43:46'),
(81, 'Feni Sadar', 'Feni Sadar', 4, 101, '2016-11-19 16:43:48'),
(83, 'Haluwagat', 'Haluwagat area.', 9, 100, '2016-11-19 16:43:55'),
(84, 'Magura Sadar', 'Magura Sadar', 2, 36, '2016-11-19 16:43:57'),
(85, 'Naogaon Sadar Upazila', 'Naogaon Sadar Upazila', 3, 56, '2016-11-19 16:43:57'),
(86, 'Kalapara', 'Kalapara Upazila', 5, 24, '2016-11-19 16:43:59'),
(88, 'Niamatpur Upazila', 'Niamatpur Upazila', 3, 56, '2016-11-19 16:44:10'),
(89, 'Dashmina', 'Dashmina Upazila', 5, 24, '2016-11-19 16:44:13'),
(90, 'Parshuram UPazilla', 'Parshuram UPazilla', 4, 101, '2016-11-19 16:44:20'),
(91, 'Patnitala Upazila', 'Patnitala Upazila', 3, 56, '2016-11-19 16:44:24'),
(93, 'Porsha Upazila', 'Porsha Upazila', 3, 56, '2016-11-19 16:44:37'),
(94, 'Galachipa', 'Galachipa Upazila', 5, 24, '2016-11-19 16:44:39'),
(96, 'Raninagar Upazila', 'Raninagar Upazila', 3, 56, '2016-11-19 16:44:49'),
(97, 'Bauphal', 'Bauphal Upazila', 5, 24, '2016-11-19 16:44:56'),
(98, 'Raninagar Upazila', 'Raninagar Upazila', 3, 56, '2016-11-19 16:44:56'),
(99, 'Baksiganj Upazila', 'Baksiganj Upazila', 9, 61, '2016-11-19 16:44:57'),
(100, 'Parshuram', 'Parshuram UPazilla', 4, 101, '2016-11-19 16:45:01'),
(101, 'Sapahar Upazila', 'Sapahar Upazila', 3, 56, '2016-11-19 16:45:14'),
(102, 'nagurpur', 'nagurpur beside manikgonj district.', 1, 80, '2016-11-19 16:45:17'),
(103, 'Islampur', 'Islampur Upazila', 9, 61, '2016-11-19 16:45:34'),
(105, 'Jamalpur Sadar', 'Jamalpur Sadar Upazila', 9, 61, '2016-11-19 16:46:22'),
(106, 'Madarganj Upazila', 'Madarganj Upazila', 9, 61, '2016-11-19 16:46:53'),
(107, 'kalihati thana ', 'kalihati beside gahtail.', 1, 80, '2016-11-19 16:47:05'),
(108, 'Gaffargaon ', 'Gaffargaon   upazila', 9, 100, '2016-11-19 16:47:18'),
(109, 'mirpur-12', 'mirpur-12', 1, 45, '2016-11-19 16:47:20'),
(112, 'Adamdighi', 'Adamdighi', 3, 17, '2016-11-19 16:47:42'),
(113, 'Sarishabari', 'Sarishabari Upazila', 9, 61, '2016-11-19 16:47:45'),
(114, 'Dhobaura ', 'Dhobaura     upazila', 9, 100, '2016-11-19 16:47:55'),
(116, 'Bogra Sadar', 'Bogra Sadar', 3, 17, '2016-11-19 16:47:58'),
(117, 'Nandail', 'Nandail    upazila', 9, 100, '2016-11-19 16:48:10'),
(119, 'Sherpur', 'Sherpur', 3, 17, '2016-11-19 16:48:16'),
(120, 'Dhunat', 'Dhunat', 3, 17, '2016-11-19 16:48:40'),
(122, 'Melandaho', 'Melandaho Upazila', 9, 61, '2016-11-19 16:48:42'),
(123, 'Dhunat', 'Dhunat', 3, 17, '2016-11-19 16:48:50'),
(125, 'Dhupchanchia', 'Dhupchanchia', 3, 17, '2016-11-19 16:49:16'),
(126, 'Gabtali', 'Gabtali', 3, 17, '2016-11-19 16:49:36'),
(128, 'Atpara Upazila', 'Atpara Upazil', 9, 20, '2016-11-19 16:49:53'),
(130, 'Kahaloo', 'Kahaloo', 3, 17, '2016-11-19 16:49:56'),
(131, 'Nandigram', 'Nandigram', 3, 17, '2016-11-19 16:50:07'),
(133, 'Fulgazi', 'Fulgazi', 4, 101, '2016-11-19 16:50:17'),
(134, 'Shajahanpur', 'Shajahanpur', 3, 17, '2016-11-19 16:50:21'),
(137, 'Sariakandi', 'Sariakandi', 3, 17, '2016-11-19 16:50:42'),
(138, 'Shibganj', 'Shibganj', 3, 17, '2016-11-19 16:50:54'),
(139, 'Sonatala', 'Sonatala', 3, 17, '2016-11-19 16:51:03'),
(140, 'Barhatta ', 'Barhatta Upazila', 9, 20, '2016-11-19 16:51:33'),
(141, 'Durgapur ', 'Durgapur Upazila', 9, 20, '2016-11-19 16:52:05'),
(142, 'Khaliajuri', 'Khaliajuri Upazila', 9, 20, '2016-11-19 16:52:41'),
(143, 'Kalmakanda ', 'Kalmakanda Upazila', 9, 20, '2016-11-19 16:53:11'),
(145, 'Rajapur', 'Rajapur Upazila', 5, 102, '2016-11-19 16:53:23'),
(146, 'Kendua', 'Kendua Upazila', 9, 20, '2016-11-19 16:53:36'),
(147, 'Nalchity', 'Nalchity Upazila', 5, 102, '2016-11-19 16:53:44'),
(148, 'Madan Upazila', 'Madan Upazila', 9, 20, '2016-11-19 16:54:09'),
(149, 'Kathalia', 'Kathalia Upazila', 5, 102, '2016-11-19 16:54:27'),
(150, 'Mohanganj', 'Mohanganj Upazila', 9, 20, '2016-11-19 16:54:37'),
(151, 'Jhalokati Sadar', 'Jhalokati Sadar Upazila', 5, 102, '2016-11-19 16:54:52'),
(153, 'Netrokona', 'Netrokona Sadar Upazila', 9, 20, '2016-11-19 16:55:21'),
(155, 'Manpura', 'Manpura Upazila', 5, 19, '2016-11-19 16:55:35'),
(157, 'Char Fasson', 'Char Fasson Upazila', 5, 19, '2016-11-19 16:55:52'),
(159, 'Purbadhala', 'Purbadhala Upazila', 9, 20, '2016-11-19 16:55:56'),
(161, 'Lalmohan', 'Lalmohan Upazila', 5, 19, '2016-11-19 16:56:11'),
(163, 'Tazumuddin', 'Tazumuddin Upazila', 5, 19, '2016-11-19 16:56:31'),
(166, 'Burhanuddin', 'Burhanuddin Upazila', 5, 19, '2016-11-19 16:57:36'),
(169, 'Daulatkhan', 'Daulatkhan Upazila', 5, 19, '2016-11-19 16:57:52'),
(170, 'Bhola Sadar', 'Bhola Sadar Upazila', 5, 19, '2016-11-19 16:58:10'),
(171, 'parshuram', 'parshuram', 4, 101, '2016-11-19 16:58:25'),
(172, 'Daghonvuiyan', 'Daghonvuiyan', 4, 101, '2016-11-19 16:58:46'),
(173, 'Taltali', 'Taltali Upazila', 5, 13, '2016-11-19 16:58:54'),
(174, 'Patharghata', 'Patharghata Upazila', 5, 13, '2016-11-19 16:59:11'),
(175, 'Chagolnaiyan', 'Chagolnaiyan', 4, 101, '2016-11-19 16:59:15'),
(176, 'Morrelgonj', 'Morrelgonj area', 2, 14, '2016-11-19 16:59:22'),
(177, 'Betagi', 'Betagi Upazila', 5, 13, '2016-11-19 16:59:29'),
(178, 'Sonagazi', 'Sonagazi', 4, 101, '2016-11-19 16:59:33'),
(179, 'Barguna Sadar', 'Barguna Sadar Upazila', 5, 13, '2016-11-19 16:59:58'),
(180, 'Bamna', 'Bamna Upazila', 5, 13, '2016-11-19 17:00:13'),
(181, 'Amtali', 'Amtali Upazila', 5, 13, '2016-11-19 17:00:27'),
(182, 'Mirzapur Upazila', 'Mirzapur Upazila nice place of tangail.', 1, 80, '2016-11-19 17:00:45'),
(183, 'Bagerhat sadar', 'Bagerhat sadar area', 2, 14, '2016-11-19 17:01:46'),
(184, 'Rampal', 'Rampal area', 2, 14, '2016-11-19 17:02:16'),
(185, 'Uttara', 'Uttara municipal area', 1, 45, '2016-11-19 17:02:17'),
(186, 'Bholahat Upazila', 'Bholahat Upazila', 3, 65, '2016-11-19 17:02:18'),
(187, 'Gopalpur Upazila', 'Gopalpur Upazila nice place of tangail.', 1, 80, '2016-11-19 17:02:20'),
(188, 'Uttara', 'Uttara municipal area', 1, 45, '2016-11-19 17:02:26'),
(189, 'Gomastapur Upazila', 'Gomastapur Upazila', 3, 65, '2016-11-19 17:02:32'),
(190, 'Uttar Khan', 'Uttar Khan municipal area', 1, 45, '2016-11-19 17:02:47'),
(191, 'Gomastapur Upazila', 'Gomastapur Upazila', 3, 65, '2016-11-19 17:02:49'),
(192, 'Kachua', 'Kachua Area', 2, 14, '2016-11-19 17:02:58'),
(193, 'Turag', 'Turag municipal area', 1, 45, '2016-11-19 17:03:04'),
(194, 'Nachole Upazila', 'Nachole Upazila', 3, 65, '2016-11-19 17:03:05'),
(195, 'Nachole Upazila', 'Nachole Upazila', 3, 65, '2016-11-19 17:03:07'),
(196, 'Nawabganj Sadar Upazila', 'Nawabganj Sadar Upazila', 3, 65, '2016-11-19 17:03:23'),
(197, 'Mongla', 'Mongla Area', 2, 14, '2016-11-19 17:03:26'),
(198, 'Tejgaon', 'Tejgaon Industrial Area', 1, 45, '2016-11-19 17:03:27'),
(199, 'Bhuapur Upazila', 'Bhuapur Upazila northside.', 1, 80, '2016-11-19 17:03:36'),
(200, 'Shibganj Upazila', 'Shibganj Upazila', 3, 65, '2016-11-19 17:03:47'),
(201, 'Tejgaon', 'Tejgaon municipal area', 1, 45, '2016-11-19 17:03:56'),
(202, 'Dhanbari Upazila', 'Bhuapur Upazila famous for pineapple.', 1, 80, '2016-11-19 17:04:21'),
(203, 'Sher-e-Bangla Nagor', 'Sher-e-Bangla Nagor municipal area', 1, 45, '2016-11-19 17:04:39'),
(204, 'Adabor', 'Adabor municipal area', 1, 45, '2016-11-19 17:05:01'),
(205, 'Agargaon', 'Agargaon municipal area', 1, 45, '2016-11-19 17:05:15'),
(206, 'Gurudaspur Upazila', 'Gurudaspur Upazila', 3, 55, '2016-11-19 17:05:28'),
(207, 'Badda', 'Badda municipal area', 1, 45, '2016-11-19 17:05:33'),
(208, 'Natore Sadar Upazila', 'Natore Sadar Upazila', 3, 55, '2016-11-19 17:05:43'),
(209, 'Biman Bandar', 'Biman Bandar municipal area', 1, 45, '2016-11-19 17:05:51'),
(210, 'Baraigram Upazila', 'Baraigram Upazila', 3, 55, '2016-11-19 17:05:54'),
(211, 'Bagatipara Upazila', 'Bagatipara Upazila', 3, 55, '2016-11-19 17:06:09'),
(212, 'Lalpur Upazila', 'Lalpur Upazila', 3, 55, '2016-11-19 17:06:19'),
(213, 'Bangshal', 'Bangshal municipal area', 1, 45, '2016-11-19 17:06:21'),
(214, 'Singra Upazila', 'Singra Upazila', 3, 55, '2016-11-19 17:06:29'),
(215, 'Cantonment', 'Cantonment municipal area', 1, 45, '2016-11-19 17:06:39'),
(216, 'Naldanga Upazila', 'Naldanga Upazila', 3, 55, '2016-11-19 17:06:40'),
(217, 'Chawkbazar Model', 'Chawkbazar Model municipal area', 1, 45, '2016-11-19 17:07:10'),
(218, 'Dakshinkhan', 'Dakshinkhan Model municipal area', 1, 45, '2016-11-19 17:07:27'),
(219, 'Sarankhola', 'Sarankhola Area', 2, 14, '2016-11-19 17:07:31'),
(220, 'Darus Salam', 'Darus Salam Model municipal area', 1, 45, '2016-11-19 17:08:00'),
(221, 'Mollahat', 'Mollahat Area', 2, 14, '2016-11-19 17:08:07'),
(222, 'Dhanmondi', 'Dhanmondi municipal area', 1, 45, '2016-11-19 17:08:36'),
(223, 'Fakirhat', 'Fakirhat Area', 2, 14, '2016-11-19 17:08:43'),
(224, 'Dhanmondi', 'Demra municipal area', 1, 45, '2016-11-19 17:08:51'),
(225, 'Chitalmari', 'Chitalmari Area', 2, 14, '2016-11-19 17:09:15'),
(226, 'Kotwali', 'Kotwali municipal area', 1, 45, '2016-11-19 17:09:22'),
(227, 'Gulshan', 'Gulshan municipal area', 1, 45, '2016-11-19 17:09:53'),
(228, 'New Market', 'New Market municipal area', 1, 45, '2016-11-19 17:11:02'),
(229, 'Motijheel', 'Motijheel Indastrial area', 1, 45, '2016-11-19 17:11:34'),
(230, 'Chuadanga Sadar', 'Chuadanga Sadar Area', 2, 25, '2016-11-19 17:12:15'),
(231, 'Damurhuda', 'Damurhuda Area', 2, 25, '2016-11-19 17:12:49'),
(232, 'Jibannagar', 'JibannagarArea', 2, 25, '2016-11-19 17:13:18'),
(233, 'Atgharia Upazila', 'Atgharia Upazila', 3, 11, '2016-11-19 17:24:37'),
(234, 'Bera Upazila', 'Bera Upazila', 3, 11, '2016-11-19 17:24:46'),
(235, 'Bhangura Upazila', 'Bhangura Upazila', 3, 11, '2016-11-19 17:25:15'),
(236, 'Chatmohar Upazila', 'Chatmohar Upazila', 3, 11, '2016-11-19 17:25:29'),
(237, 'Faridpur Upazila (Formerly Bonwareenogor)', 'Faridpur Upazila (Formerly Bonwareenogor)', 3, 11, '2016-11-19 17:25:45'),
(238, 'Ishwardi Upazila', 'Ishwardi Upazila', 3, 11, '2016-11-19 17:25:58'),
(239, 'Pabna Sadar Upazila', 'Pabna Sadar Upazila', 3, 11, '2016-11-19 17:26:09'),
(240, 'Santhia Upazila', 'Santhia Upazila', 3, 11, '2016-11-19 17:26:19'),
(241, 'Sujanagar Upazila', 'Sujanagar Upazila', 3, 11, '2016-11-19 17:26:34'),
(242, 'Ataikula Thana', 'Ataikula Thana', 3, 11, '2016-11-19 17:26:46'),
(243, 'Aminpur Thana', 'Aminpur Thana', 3, 11, '2016-11-19 17:26:56'),
(244, 'Bagha Upazila', 'Bagha Upazila', 3, 23, '2016-11-19 17:28:09'),
(245, 'Bagmara Upazila', 'Bagmara Upazila', 3, 23, '2016-11-19 17:28:21'),
(246, 'Charghat Upazila', 'Charghat Upazila', 3, 23, '2016-11-19 17:28:31'),
(247, 'Durgapur Upazila', 'Durgapur Upazila', 3, 23, '2016-11-19 17:28:46'),
(248, 'Godagari Upazila', 'Godagari Upazila', 3, 23, '2016-11-19 17:29:06'),
(249, 'Mohanpur Upazila', 'Mohanpur Upazila', 3, 23, '2016-11-19 17:29:17'),
(250, 'Paba Upazila', 'Paba Upazila', 3, 23, '2016-11-19 17:29:30'),
(251, 'Puthia Upazila', 'Puthia Upazila', 3, 23, '2016-11-19 17:29:40'),
(252, 'Tanore Upazila', 'Tanore Upazila', 3, 23, '2016-11-19 17:29:52'),
(253, 'Boalia Thana', 'Boalia Thana', 3, 23, '2016-11-19 17:30:02'),
(254, 'Matihar Thana', 'Matihar Thana', 3, 23, '2016-11-19 17:30:16'),
(255, 'Rajpara Thana', 'Rajpara Thana', 3, 23, '2016-11-19 17:30:28'),
(256, 'Shah Makdam Thana', 'Shah Makdam Thana', 3, 23, '2016-11-19 17:30:59'),
(257, 'Badarganj', 'Badarganj', 7, 85, '2016-11-19 17:34:23'),
(258, 'Mithapukur', 'Mithapukur', 7, 85, '2016-11-19 17:34:33'),
(259, 'Gangachara', 'Gangachara', 7, 85, '2016-11-19 17:34:49'),
(260, 'Kaunia', 'Kaunia', 7, 85, '2016-11-19 17:35:20'),
(261, 'Rangpur Sadar', 'Rangpur Sadar', 7, 85, '2016-11-19 17:35:34'),
(262, 'Pirgachha', 'Pirgachha', 7, 85, '2016-11-19 17:35:44'),
(263, 'Pirganj', 'Pirganj', 7, 85, '2016-11-19 17:35:54'),
(264, 'Taraganj', 'Taraganj', 7, 85, '2016-11-19 17:36:04'),
(265, 'Jhenaigati ', 'Jhenaigati Upazila', 9, 10, '2016-11-19 17:37:00'),
(266, 'Nakla', 'Nakla Upazila', 9, 10, '2016-11-19 17:37:44'),
(267, 'Biral', 'Biral', 7, 86, '2016-11-19 17:37:50'),
(268, 'Meherpur Sadar', 'Meherpur Sadar', 2, 34, '2016-11-19 17:37:52'),
(269, 'Birampur', 'Birampur', 7, 86, '2016-11-19 17:38:00'),
(270, 'Birganj', 'Birganj', 7, 86, '2016-11-19 17:38:09'),
(271, 'Bochaganj ', 'Bochaganj ', 7, 86, '2016-11-19 17:38:22'),
(272, 'Gangni', 'Gangni Area', 2, 34, '2016-11-19 17:38:29'),
(273, 'Chirirbandar ', 'Bochaganj ', 7, 86, '2016-11-19 17:38:33'),
(274, 'Bochaganj ', 'Bochaganj ', 7, 86, '2016-11-19 17:38:44'),
(275, ' Mujibnagar', ' MujibnagarArea', 2, 34, '2016-11-19 17:38:55'),
(276, 'Nalitabari ', 'Nalitabari Upazila', 9, 10, '2016-11-19 17:38:57'),
(277, 'Chirirbandar', 'Chirirbandar', 7, 86, '2016-11-19 17:38:59'),
(278, 'Bochaganj ', 'Bochaganj ', 7, 86, '2016-11-19 17:39:10'),
(279, 'Ghoraghat ', 'Ghoraghat  ', 7, 86, '2016-11-19 17:39:19'),
(280, 'Sherpur Sadar', 'Sherpur Sadar Upazila', 9, 10, '2016-11-19 17:39:27'),
(281, 'Hakimpur', 'Hakimpur', 7, 86, '2016-11-19 17:39:31'),
(282, 'Kaharole', 'Kaharole', 7, 86, '2016-11-19 17:39:41'),
(283, 'Khansama', 'Khansama', 7, 86, '2016-11-19 17:39:51'),
(284, 'Sreebardi ', 'Sreebardi Upazila', 9, 10, '2016-11-19 17:39:53'),
(285, 'Nawabganj', 'Nawabganj', 7, 86, '2016-11-19 17:40:12'),
(286, 'Parbatipur', 'Parbatipur', 7, 86, '2016-11-19 17:40:23'),
(287, 'Phulbari ', 'Phulbari ', 7, 86, '2016-11-19 17:40:33'),
(288, 'Kurigram Sadar', 'Kurigram Sadar', 7, 87, '2016-11-19 17:42:32'),
(289, 'Nageshwari ', 'Nageshwari ', 7, 87, '2016-11-19 17:42:46'),
(290, 'Bhurungamari', 'Bhurungamari', 7, 87, '2016-11-19 17:42:59'),
(291, 'Phulbari', 'Phulbari', 7, 87, '2016-11-19 17:43:10'),
(292, 'Rajarhat ', 'Rajarhat ', 7, 87, '2016-11-19 17:43:40'),
(293, 'Ulipur ', 'Ulipur ', 7, 87, '2016-11-19 17:43:51'),
(294, 'Chilmari', 'Chilmari ', 7, 87, '2016-11-19 17:43:59'),
(295, 'Raomari ', 'Raomari ', 7, 87, '2016-11-19 17:44:10'),
(296, 'Char Rajibpur ', 'Char Rajibpur ', 7, 87, '2016-11-19 17:44:22'),
(297, 'Fulchhari ', 'Fulchhari ', 7, 88, '2016-11-19 17:46:12'),
(298, 'Gaibandha Sadar', 'Gaibandha Sadar', 7, 88, '2016-11-19 17:46:51'),
(299, 'Gobindaganj', 'Gobindaganj', 7, 88, '2016-11-19 17:47:05'),
(300, 'Palashbari ', 'Palashbari ', 7, 88, '2016-11-19 17:47:20'),
(301, 'Sadullapur', 'Sadullapur', 7, 88, '2016-11-19 17:47:30'),
(302, 'Saghata', 'Saghata', 7, 88, '2016-11-19 17:47:53'),
(303, 'Sundarganj', 'Sundarganj', 7, 88, '2016-11-19 17:48:08'),
(304, 'Bheramara', 'Bheramara Area', 2, 21, '2016-11-19 17:59:41'),
(305, 'Khoksa', 'Khoksa Area', 2, 21, '2016-11-19 18:00:39'),
(306, 'Kushtia Sadar', 'Kushtia Sadar Area', 2, 21, '2016-11-19 18:01:13'),
(307, 'Daulatpur', 'Daulatpur Area', 2, 21, '2016-11-19 18:01:42'),
(308, 'Kumarkhali', 'Kumarkhali Area', 2, 21, '2016-11-19 18:02:14'),
(309, 'Mirpur', 'Mirpur Area', 2, 21, '2016-11-19 18:02:42'),
(310, 'Nilphamari Sadar', 'Nilphamari Sadar', 7, 89, '2016-11-19 18:05:35'),
(311, 'Saidpur ', 'Saidpur ', 7, 89, '2016-11-19 18:05:46'),
(312, 'Jaldhaka', 'Jaldhaka', 7, 89, '2016-11-19 18:05:56'),
(313, 'Kishoreganj ', 'Kishoreganj ', 7, 89, '2016-11-19 18:06:15'),
(314, 'Domar', 'Domar', 7, 89, '2016-11-19 18:06:26'),
(315, 'Dimla', 'Dimla', 7, 89, '2016-11-19 18:06:36'),
(316, 'Panchagarh Sadar', 'Panchagarh Sadar', 7, 91, '2016-11-19 18:07:30'),
(317, 'Debiganj', 'Debiganj', 7, 91, '2016-11-19 18:07:43'),
(318, 'Boda', 'Boda', 7, 91, '2016-11-19 18:07:56'),
(319, 'Atwari', 'Atwari', 7, 91, '2016-11-19 18:08:15'),
(320, 'Tetulia', 'Tetulia', 7, 91, '2016-11-19 18:08:26'),
(321, 'Thakurgaon Sadar', 'Thakurgaon Sadar', 7, 94, '2016-11-19 18:09:01'),
(322, 'Pirganj Upazila', 'Pirganj Upazila', 7, 94, '2016-11-19 18:09:12'),
(323, 'Baliadangi ', 'Baliadangi ', 7, 94, '2016-11-19 18:09:28'),
(324, 'Haripur ', 'Haripur ', 7, 94, '2016-11-19 18:09:37'),
(325, 'Ranisankail', 'Ranisankail', 7, 94, '2016-11-19 18:09:47'),
(326, 'Ruhia', 'Ruhia', 7, 94, '2016-11-19 18:09:56'),
(327, 'Aditmari', 'Aditmari', 7, 89, '2016-11-19 18:11:50'),
(328, 'Kaliganj', 'Kaliganj', 7, 89, '2016-11-19 18:12:04'),
(329, 'Patgram', 'Patgram', 7, 89, '2016-11-19 18:12:18'),
(330, 'Lalmonirhat Sadar', 'Lalmonirhat Sadar', 7, 89, '2016-11-19 18:12:33'),
(331, 'Hatibandha', 'Hatibandha', 7, 89, '2016-11-19 18:12:47'),
(332, 'Baluka', 'Baluka area.', 9, 100, '2016-11-19 18:36:38'),
(333, 'saidpur cantonment', 'cantt public school and college students, cantt board school and college student, army personnel, saidpur airport personnel etc', 7, 89, '2016-11-20 16:03:37'),
(334, 'Parbatipur Puratan Bazar', 'Puratan bazar people', 7, 86, '2016-11-20 16:07:07'),
(335, 'Hili', 'Hili CP Point', 7, 86, '2016-11-20 16:08:19'),
(336, 'moshirpur', 'some desc', 10, 104, '2023-02-05 18:59:16'),
(337, 'area1', 'sfdghfhgfhgfh', 10, 105, '2023-06-15 10:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `price` float(8,2) NOT NULL,
  `sellprice` float(8,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(2) NOT NULL,
  `subcategory_id` int(3) NOT NULL,
  `publisher_id` int(5) NOT NULL,
  `edition` varchar(30) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_writer`
--

CREATE TABLE `book_writer` (
  `book_id` int(11) NOT NULL,
  `writer_id` int(5) NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='m2m relations(pivot table)';

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `reply_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(3) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', 'ATA', NULL, 672),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', 'BVT', NULL, 47),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', 'IOT', NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', 'CXR', NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', 'CCK', NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 243),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', 'ATF', NULL, 262),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', 'HMD', NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', 'MYT', NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', 'PSE', NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 64),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROU', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 7),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', 'SGS', NULL, 500),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', 'TLS', NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', 'UMI', NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263),
(240, 'RS', 'SERBIA', 'Serbia', 'SRB', 688, 381),
(241, 'AP', 'ASIA PACIFIC REGION', 'Asia / Pacific Region', '0', 0, 0),
(242, 'ME', 'MONTENEGRO', 'Montenegro', 'MNE', 499, 382),
(243, 'AX', 'ALAND ISLANDS', 'Aland Islands', 'ALA', 248, 358),
(244, 'BQ', 'BONAIRE, SINT EUSTATIUS AND SABA', 'Bonaire, Sint Eustatius and Saba', 'BES', 535, 599),
(245, 'CW', 'CURACAO', 'Curacao', 'CUW', 531, 599),
(246, 'GG', 'GUERNSEY', 'Guernsey', 'GGY', 831, 44),
(247, 'IM', 'ISLE OF MAN', 'Isle of Man', 'IMN', 833, 44),
(248, 'JE', 'JERSEY', 'Jersey', 'JEY', 832, 44),
(249, 'XK', 'KOSOVO', 'Kosovo', 'XKX', 0, 383),
(250, 'BL', 'SAINT BARTHELEMY', 'Saint Barthelemy', 'BLM', 652, 590),
(251, 'MF', 'SAINT MARTIN', 'Saint Martin', 'MAF', 663, 590),
(252, 'SX', 'SINT MAARTEN', 'Sint Maarten', 'SXM', 534, 1),
(253, 'SS', 'SOUTH SUDAN', 'South Sudan', 'SSD', 728, 211);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `distid` int(2) NOT NULL,
  `distname` varchar(30) NOT NULL,
  `distdesc` varchar(200) NOT NULL,
  `divid` int(2) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`distid`, `distname`, `distdesc`, `divid`, `createdate`) VALUES
(5, 'joypurhat', 'joypurhat', 3, '2016-11-17 16:04:53'),
(10, 'Sherpur', 'Sherpur district', 9, '2016-11-17 16:06:07'),
(11, 'Pabna', 'Pabna', 3, '2016-11-17 16:06:19'),
(12, 'Noakhali', 'Royal District', 4, '2016-11-17 16:06:24'),
(13, 'Barguna ', 'Barguna District', 5, '2016-11-17 16:06:40'),
(14, 'Bagerhat', 'Bagerhat district', 2, '2016-11-17 16:06:44'),
(17, 'Bogra', 'Bogra', 3, '2016-11-17 16:07:25'),
(19, 'Bhola', 'Bhola District', 5, '2016-11-17 16:07:50'),
(20, 'Netrokona', 'Netrokona district', 9, '2016-11-17 16:07:56'),
(21, 'Kushtia', 'Kushtia district', 2, '2016-11-17 16:07:57'),
(23, 'Rajshahi', 'Rajshahi', 3, '2016-11-17 16:08:18'),
(24, 'Patuakhali', 'Patuakhali District', 5, '2016-11-17 16:08:24'),
(25, 'Chuadanga', 'Chuadanga District', 2, '2016-11-17 16:08:28'),
(26, 'Magura', 'magura', 2, '2016-11-17 16:08:35'),
(27, 'Jessore', 'Jessore District', 2, '2016-11-17 16:08:40'),
(28, 'Jhenaidah', 'Jhenaidah District', 2, '2016-11-17 16:08:55'),
(29, 'Pirojpur', 'Pirojpur District', 5, '2016-11-17 16:09:08'),
(33, 'Brahmanbaria', 'Brahmanbaria District', 4, '2016-11-17 16:09:41'),
(34, 'Meherpur', 'Meherpur district', 2, '2016-11-17 16:10:08'),
(35, 'Chandpur', 'Chandpur District', 4, '2016-11-17 16:10:09'),
(36, 'Magura', 'Magura District', 2, '2016-11-17 16:10:13'),
(38, 'Manikgonj', 'Manikgonj District', 1, '2016-11-17 16:10:29'),
(40, 'Chittagong', 'Chittagong District', 4, '2016-11-17 16:10:34'),
(41, 'Narail', 'Narail District', 2, '2016-11-17 16:10:42'),
(42, 'Jhinaidah', 'Jhinaidah district', 2, '2016-11-17 16:10:53'),
(43, 'Satkhira', 'Satkhira District', 2, '2016-11-17 16:10:55'),
(44, 'Comilla', 'Comilla District', 4, '2016-11-17 16:11:02'),
(45, 'Dhaka', 'Dhaka District', 1, '2016-11-17 16:11:03'),
(48, 'Faridpur', 'Faridpur District', 1, '2016-11-17 16:11:57'),
(51, 'Khagrachhari', 'Khagrachhari District', 4, '2016-11-17 16:12:23'),
(52, 'Gazipur', 'Gazipur District', 1, '2016-11-17 16:12:58'),
(53, 'Lakshmipur', 'Lakshmipur District', 4, '2016-11-17 16:12:58'),
(55, 'Natore', 'Natore', 3, '2016-11-17 16:13:07'),
(56, '  Naogaon', '  Naogaon', 3, '2016-11-17 16:13:22'),
(59, 'Kishoreganj', 'Kishoreganj District', 1, '2016-11-17 16:13:49'),
(61, 'Jamalpur', 'Jamalpur Districtrrrrr', 9, '2016-11-17 16:13:59'),
(62, 'Sunamganj', 'Sunamganj District', 6, '2016-11-17 16:14:01'),
(63, 'Rangamati', 'Rangamati District', 4, '2016-11-17 16:14:02'),
(64, 'Habiganj', 'Habiganj district', 6, '2016-11-17 16:14:03'),
(65, 'Chapainawabganj', 'Chapainawabganj', 3, '2016-11-17 16:14:13'),
(66, 'Moulvibazar', 'Moulvibazar District', 6, '2016-11-17 16:14:23'),
(68, 'Gopalgonj ', 'Gopalgonj District', 1, '2016-11-17 16:14:30'),
(69, 'Sylhet', 'Sylhet District', 6, '2016-11-17 16:14:47'),
(71, 'Sunamganj 	', 'Sunamganj district', 6, '2016-11-17 16:14:54'),
(73, 'Habigonj', 'Habigonj district', 6, '2016-11-17 16:15:24'),
(74, 'Madaripur', 'Madaripur District', 1, '2016-11-17 16:15:42'),
(78, 'Rajbari', 'Rajbari District', 1, '2016-11-17 16:16:18'),
(79, 'Shariatpur ', 'Shariatpur District', 1, '2016-11-17 16:16:58'),
(80, 'Tangail', 'Tangail er misti kob maja', 1, '2016-11-17 16:17:20'),
(84, 'Narsingdi', 'Narsingdi District', 1, '2016-11-17 16:17:51'),
(85, 'Rangpur', 'Rangpur', 7, '2016-11-17 16:18:04'),
(86, 'Dinajpur', 'Dinajpur', 7, '2016-11-17 16:18:18'),
(87, ' Kurigram', ' Kurigram', 7, '2016-11-17 16:18:41'),
(88, 'Gaibandha', 'Gaibandha', 7, '2016-11-17 16:18:57'),
(89, 'Nilphamari', 'Nilphamari', 7, '2016-11-17 16:19:12'),
(91, 'Panchagarh', 'Panchagarh', 7, '2016-11-17 16:19:53'),
(94, 'Thakurgaon', 'Thakurgaon', 7, '2016-11-17 16:20:05'),
(95, ' Lalmonirhat.', ' Lalmonirhat.\n', 7, '2016-11-17 16:20:17'),
(100, 'Mymensingh', 'Mymensingh District', 9, '2016-11-17 16:47:37'),
(101, 'Feni', 'Feni district', 4, '2016-11-19 16:43:04'),
(102, 'Jhalokati', 'Jhalokati District', 5, '2016-11-19 16:52:37'),
(103, 'joypurhat', 'joypurhat', 3, '2016-11-19 17:41:04'),
(104, 'Bashurhaat', 'some description', 10, '2023-02-05 18:58:21'),
(105, 'Companygonj', 'asdfasdfasdf', 10, '2023-06-15 10:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `divid` int(2) NOT NULL,
  `divname` varchar(20) NOT NULL,
  `divdesc` varchar(200) NOT NULL,
  `createdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`divid`, `divname`, `divdesc`, `createdate`) VALUES
(1, 'Dhaka', 'Dhaka Division', '2016-11-16 18:02:08'),
(2, 'Khulna', 'Khulna division', '2016-11-16 18:23:39'),
(3, 'Rajshahi', 'Rajshahi division', '2016-11-16 18:24:03'),
(4, 'Chittagong', 'Chittagong division', '2016-11-16 18:24:38'),
(5, 'Barishal', 'Barishal division', '2016-11-16 18:24:52'),
(6, 'Sylhet', 'Sylhet division', '2016-11-16 18:25:11'),
(7, 'Rangpur', 'Rangpur division', '2016-11-16 18:25:27'),
(9, 'Mymensingh', 'Mymensingh Division', '2016-11-16 18:57:28'),
(10, 'Noakhali', 'noakhali', '2023-02-05 18:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `info` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `division_id` int(2) NOT NULL,
  `district_id` int(2) NOT NULL,
  `area_id` int(3) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `bio` text NOT NULL,
  `excerpt` varchar(512) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(5) NOT NULL,
  `name` varchar(80) NOT NULL,
  `address` varchar(128) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(3) NOT NULL,
  `category_id` int(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `active`, `created_at`) VALUES
(3, 'test', 'test@gmail.com', '$2y$10$b2KAF.cJB/66SOe8yUWgfOeulLTjSUjoDzdVwPgjVyRDrCdcEIdde', 1, 1, '2023-06-18 06:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` int(5) NOT NULL,
  `name` varchar(256) NOT NULL,
  `bio` text NOT NULL,
  `country_id` int(3) NOT NULL,
  `image` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaid`),
  ADD KEY `fk_division_for_area` (`divid`),
  ADD KEY `fk_district_for_area` (`distid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `publisher_id` (`publisher_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `book_writer`
--
ALTER TABLE `book_writer`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `writer_id` (`writer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`distid`),
  ADD KEY `fk_division` (`divid`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`divid`),
  ADD UNIQUE KEY `divname` (`divname`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `division_id` (`division_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `areaid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `distid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `divid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `fk_district_for_area` FOREIGN KEY (`distid`) REFERENCES `district` (`distid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_division_for_area` FOREIGN KEY (`divid`) REFERENCES `division` (`divid`) ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`writer_id`) REFERENCES `writers` (`id`),
  ADD CONSTRAINT `books_ibfk_4` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`),
  ADD CONSTRAINT `books_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `book_writer`
--
ALTER TABLE `book_writer`
  ADD CONSTRAINT `book_writer_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_writer_ibfk_2` FOREIGN KEY (`writer_id`) REFERENCES `writers` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_division` FOREIGN KEY (`divid`) REFERENCES `division` (`divid`) ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `profiles_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `division` (`divid`),
  ADD CONSTRAINT `profiles_ibfk_3` FOREIGN KEY (`district_id`) REFERENCES `district` (`distid`),
  ADD CONSTRAINT `profiles_ibfk_4` FOREIGN KEY (`area_id`) REFERENCES `area` (`areaid`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `writers`
--
ALTER TABLE `writers`
  ADD CONSTRAINT `writers_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
