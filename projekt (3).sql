-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 09:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `image`, `description`) VALUES
(23, 'uploads/679f75db8961e.webp', 'PINT aka Për Inati t’Njoni Tjetrit, është grup i krijuar në vitin 2010 si shtëpi e artistëve të ndryshëm; prej atyre që sot janë ikona muzikore e deri te ata që do te jenë ikonat e së ardhmes. Për here të parë u zyrtarizua më 16 Gusht 2011, duke lançuar albumin e \"Mc Kresha & Lyrical Son – Për inati t’njoni tjetrit\". Përgjegjsite dhe drejtimi I punës së PINT është cilësia e lartë e produkteve muzikore, që do të lançohen në tregun mbarë Shqiptarë dhe Internacional. Pjese e ketij label eshte Mc Kresha, Lyrical Son, Lluni dhe K-Master.'),
(24, 'uploads/679f7600e14cd.jpeg', 'Kreshnik Fazliu i njohur me emrin artistik MC Kresha, numëron gjithsej 8 albume: Albumi i parë i publikuar është \"Patikat e mia\" në vitin 2010 me 15 kënge, \"Për inati t´njoni tjetrit\" (2011), \"Air Force 1\" (2012), \"Emceeclopedy\" (2014), Rapsodët N\'rap T\'sotit (2016), \"United State of Albania\" (2019) \"Muzikë e alltisë\"(2022) dhe tani është duke e publikuar albumin e radhes \"1618\" i cili është gati për të dalë.'),
(25, 'uploads/679f762988614.jpeg', 'Festim Arifi, i njohur më mirë me emrin Lyrical Son, është një nga më të suksesshmit nga hip hop artistët në Kosovë.Eksperienca e pare ne muzike vjen ne vitin 1993 me kengen \"Pappa was a rollin stone (rap version)\" bashke me shoket e fillores. Por ne vitin 1997, Lyrical Son fillon te shkruaj tekstet e para rap dhe incizimi i pare profesional erdhi mbas luftes ne vitin 1999 me grupin \"Gjurma e Nates\". Gjeja qe e urren me se shumti eshte muzika \'Tallava\' dhe kete e shpreh edhe ne kengen ne bashkpunim me Mc Kreshen - \"Fuck Tallava\".'),
(26, 'uploads/679f764aeb50b.jpg', 'Leart Zymeri me emrin e njohur artistik Lluni eshte rritur ne nje nga lagjet e Prishtines. Lluni qe nga mosha e re ka filluar te shkruaj tekste, ai karrieren e tij e filloi me daten 14 Maj 2017, ne kete date Lluni ka postuar Kengen e tije te pare nga Mixtape te cilin Lluni e ka quajtur BregMatic, kjo kenge ma pasur emrin e lagjes ku eshte rritur lluni: Bregu Deal It. Pastaj lluni i ka publikuar edhe kenget e tjera te Mixtape-it BregMatic te cilat jane: \"Back\", \"Infinit\", \"Represent\", dhe kenga e fundit e Mixtapit e titulluar si viti ne te cilin lluni ka lindur, \"96\".');

-- --------------------------------------------------------

--
-- Table structure for table `buytickets`
--

CREATE TABLE `buytickets` (
  `id` int(11) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `ticket_count` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buytickets`
--

INSERT INTO `buytickets` (`id`, `zone`, `ticket_count`, `total_price`, `created_at`) VALUES
(1, 'Regular - Ticket', 1, 200.00, '2025-02-01 00:41:54'),
(3, 'Group Of Three - Ticket', 1, 170.00, '2025-02-01 00:47:19'),
(10, 'Group Of Five - Ticket', 2, 280.00, '2025-02-01 01:09:07'),
(15, 'Group Of Three - Ticket', 3, 510.00, '2025-02-01 12:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `added_at`) VALUES
(5, 1, 28, 1, '2025-01-31 06:36:58'),
(6, 1, 33, 1, '2025-01-31 06:37:16'),
(7, 1, 36, 1, '2025-01-31 06:37:58'),
(8, 1, 29, 1, '2025-01-31 06:39:06'),
(9, 1, 28, 1, '2025-01-31 08:09:41'),
(10, 1, 29, 1, '2025-01-31 12:03:36'),
(11, 1, 28, 1, '2025-01-31 12:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`) VALUES
(1, 'Can I refund my ticket', 'All tickets are non-transferable and non-refundable.'),
(2, 'Can I buy a parking ticket?', 'Yes, parking tickets will be available for purchase soon.'),
(3, 'What are the festival dates?', 'Be ready for four unforgettable nights! Pint Festival 2024 dates are 8, 9, and 10 November.'),
(4, 'How can I top-up my wristband online?', 'Install the Pint Festival app (iOS and Android-friendly), create your account, go to \"Wallet\", click \"Add\" balance, and enter bank details to confirm.'),
(5, 'Where can I top-up my wristband?', 'You can top-up your wristband through the app or directly at the venue.'),
(6, 'How to use a smart wristband?', 'Pint Festival uses a cashless system. Show your wristband to bartenders to make purchases.'),
(7, 'What is the check-in process?', 'Present your ID card and ticket at the gate to receive a re-entry wristband.'),
(8, 'How can I transfer my ticket to another person?', 'All tickets are non-transferable and non-refundable.'),
(9, 'What is the difference between a Regular and VIP ticket?', 'Regular tickets allow entrance through the main gate. VIP tickets have a special entrance and designated VIP space.'),
(10, 'Where can I buy tickets?', 'Tickets can be purchased online at pintfestival.com. All tickets are 4-day passes.'),
(11, 'Use of tickets for promotions?', 'Tickets cannot be used for promotions without Pint Festival consent. For corporate or bulk tickets, contact pintfestival@republika.tv.'),
(12, 'Recommended Hotels and Hostels?', 'Find accommodation in Prishtina: <a href=\"https://www.booking.com/hostels/city/xk/pristina.html\">Hostels</a>, <a href=\"https://www.booking.com/city/xk/pristina.html\">Hotels</a>.'),
(13, 'What is the minimum age to attend?', 'The minimum age is 16. Anyone under 16 must be accompanied by an adult.'),
(14, 'How do I get to the festival?', 'The venue is located in Bërnicë e Poshtme, just 15 minutes from the city. We recommend using the festival shuttle buses as parking is limited.'),
(15, 'How many types of tickets are available?', 'Regular ticket, Group of 3, Group of 5, VIP ticket.'),
(16, 'Can I work as a volunteer at the festival?', 'Yes, volunteer information will be posted on our website and Facebook. Stay tuned to be part of the festival!');

-- --------------------------------------------------------

--
-- Table structure for table `festival_users`
--

CREATE TABLE `festival_users` (
  `ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festival_users`
--

INSERT INTO `festival_users` (`ID`, `username`, `email`, `created_at`, `role`, `password`) VALUES
(2, 'asd', 'asd@gmail.com', '2025-01-28 20:26:16', 'admin', 'asd'),
(3, 'dsa', 'dsa@gmail.com', '2025-01-28 20:27:01', 'regular', 'dsa'),
(5, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(7, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(13, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(14, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(15, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(16, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(17, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(18, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(19, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(20, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(21, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(22, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(23, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(24, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(25, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(26, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(27, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(28, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(29, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(30, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(31, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(32, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(33, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(34, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(35, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(36, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(37, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(38, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(39, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(40, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(41, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(42, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(43, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(44, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(45, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(46, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(47, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(48, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(49, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(50, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(51, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(52, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(53, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(54, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(55, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(56, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(57, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(58, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(59, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(60, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(61, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(62, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(63, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(64, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(65, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(66, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(67, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(68, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(69, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(70, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(71, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(72, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(73, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(74, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(75, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(76, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(77, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(78, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(79, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(80, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(81, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(82, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(83, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(84, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(85, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(86, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(87, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(88, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(89, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(90, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(91, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(92, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(93, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(94, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(95, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(96, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(97, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(98, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(99, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(100, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(101, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(102, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(103, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(104, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(105, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(106, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(107, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(108, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(109, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(110, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(111, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(112, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(113, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(114, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(115, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(116, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(117, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(118, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(119, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(120, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(121, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(122, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(123, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(124, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(125, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(126, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(127, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(128, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(129, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(130, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(131, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(132, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(133, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(134, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(135, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(136, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(137, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(138, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(139, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(140, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(141, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(142, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(143, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(144, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(145, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(146, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(147, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(148, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(149, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(150, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(151, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(152, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(153, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(154, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(155, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(156, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(157, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(158, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(159, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(160, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(161, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(162, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(163, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(164, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(165, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(166, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(167, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(168, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(169, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(170, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(171, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(172, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(173, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(174, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(175, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(176, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(177, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(178, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(179, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(180, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(181, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(182, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(183, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(184, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(185, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(186, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(187, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(188, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(189, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(190, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(191, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(192, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(193, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(194, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(195, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(196, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(197, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(198, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(199, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(200, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(201, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(202, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(203, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(204, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(205, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(206, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(207, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(208, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(209, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(210, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(211, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(212, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(213, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(214, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(215, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(216, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(217, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(218, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(219, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(220, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(221, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(222, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(223, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(224, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(225, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(226, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(227, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(228, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(229, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(230, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(231, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(232, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(233, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(234, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(235, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(236, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(237, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(238, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(239, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(240, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(241, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(242, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(243, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(244, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(245, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(246, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(247, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(248, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(249, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(250, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(251, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(252, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(253, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(254, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(255, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(256, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(257, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(258, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(259, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(260, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(261, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(262, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(263, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(264, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(265, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(266, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(267, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(268, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(269, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(270, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(271, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(272, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(273, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(274, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(275, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(276, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(277, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(278, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(279, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(280, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(281, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(282, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(283, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(284, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(285, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(286, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(287, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(288, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(289, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(290, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(291, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(292, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(293, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(294, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(295, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(296, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(297, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(298, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(299, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(300, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(301, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(302, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(303, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(304, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(305, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(306, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(307, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(308, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(309, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(310, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(311, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(312, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(313, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(314, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(315, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(316, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(317, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(318, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(319, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(320, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(321, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(322, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(323, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(324, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(325, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(326, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(327, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(328, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(329, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(330, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(331, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(332, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(333, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(334, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(335, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(336, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(337, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(338, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(339, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(340, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(341, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(342, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(343, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(344, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(345, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(346, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(347, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(348, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(349, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(350, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(351, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(352, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(353, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(354, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(355, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(356, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(357, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(358, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(359, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(360, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(361, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(362, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(363, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(364, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(365, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(366, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(367, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(368, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(369, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(370, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(371, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(372, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(373, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(374, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(375, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(376, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(377, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(378, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(379, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(380, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(381, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(382, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(383, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(384, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(385, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(386, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(387, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(388, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(389, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(390, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(391, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(392, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(393, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(394, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(395, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(396, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(397, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(398, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(399, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(400, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(401, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(402, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(403, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(404, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(405, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(406, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(407, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(408, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(409, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(410, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(411, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(412, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(413, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(414, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(415, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(416, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(417, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(418, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(419, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(420, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(421, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(422, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(423, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(424, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(425, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(426, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(427, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(428, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(429, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(430, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(431, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(432, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(433, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(434, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(435, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(436, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(437, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(438, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(439, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(440, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(441, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(442, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(443, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(444, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(445, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(446, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(447, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(448, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(449, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(450, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(451, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(452, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(453, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(454, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(455, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(456, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(457, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(458, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(459, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(460, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(461, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(462, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(463, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(464, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(465, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(466, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(467, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(468, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(469, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(470, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(471, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(472, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(473, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(474, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(475, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(476, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(477, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(478, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(479, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(480, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(481, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(482, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(483, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(484, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(485, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(486, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(487, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(488, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(489, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(490, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(491, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(492, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(493, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(494, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(495, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(496, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(497, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(498, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(499, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(500, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(501, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(502, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(503, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(504, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(505, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(506, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(507, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(508, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(509, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(510, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(511, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(512, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(513, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(514, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(515, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(516, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(517, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(518, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(519, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(520, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(521, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(522, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(523, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(524, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(525, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(526, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(527, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(528, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(529, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(530, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(531, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(532, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(533, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(534, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(535, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(536, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(537, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(538, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(539, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(540, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(541, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(542, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(543, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(544, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(545, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(546, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(547, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(548, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(549, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(550, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(551, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(552, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(553, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(554, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(555, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(556, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(557, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(558, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(559, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(560, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(561, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(562, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(563, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(564, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(565, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(566, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(567, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(568, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(569, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(570, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(571, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(572, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(573, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(574, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(575, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(576, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(577, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(578, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(579, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(580, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(581, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(582, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(583, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(584, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(585, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(586, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(587, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(588, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(589, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(590, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(591, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(592, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(593, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(594, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(595, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(596, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(597, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(598, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(599, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(600, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(601, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(602, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(603, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(604, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(605, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(606, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(607, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(608, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(609, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(610, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(611, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(612, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(613, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(614, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(615, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(616, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(617, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(618, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(619, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(620, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(621, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(622, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(623, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(624, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(625, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(626, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(627, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(628, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(629, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(630, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(631, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(632, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(633, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(634, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(635, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(636, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(637, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(638, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(639, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(640, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(641, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(642, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(643, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(644, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(645, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(646, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(647, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(648, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(649, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(650, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(651, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(652, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(653, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(654, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(655, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(656, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(657, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(658, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(659, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(660, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(661, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(662, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(663, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(664, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(665, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(666, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(667, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(668, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(669, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(670, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(671, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(672, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(673, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(674, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(675, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(676, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(677, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(678, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(679, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(680, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(681, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(682, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(683, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(684, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(685, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(686, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(687, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(688, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(689, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(690, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(691, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(692, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(693, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(694, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(695, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(696, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(697, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(698, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(699, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(700, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(701, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(702, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(703, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(704, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(705, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(706, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(707, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(708, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(709, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(710, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(711, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(712, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(713, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(714, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(715, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(716, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(717, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(718, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(719, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(720, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(721, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(722, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(723, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(724, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(725, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(726, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(727, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(728, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(729, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(730, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(731, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(732, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(733, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(734, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(735, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(736, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(737, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(738, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(739, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(740, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(741, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(742, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(743, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(744, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(745, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(746, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(747, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(748, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(749, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(750, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(751, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(752, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(753, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(754, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(755, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(756, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(757, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(758, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(759, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(760, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(761, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(762, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(763, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(764, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(765, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(766, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(767, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(768, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(769, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(770, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(771, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(772, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(773, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(774, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(775, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(776, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(777, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(778, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(779, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(780, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(781, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(782, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(783, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(784, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(785, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(786, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(787, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(788, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(789, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(790, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(791, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(792, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(793, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(794, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(795, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(796, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(797, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(798, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(799, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(800, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(801, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(802, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(803, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(804, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(805, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(806, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(807, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(808, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(809, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(810, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(811, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(812, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(813, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(814, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(815, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(816, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(817, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(818, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(819, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(820, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(821, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(822, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(823, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(824, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(825, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(826, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(827, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(828, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(829, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(830, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(831, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(832, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(833, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(834, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(835, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(836, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(837, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(838, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(839, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(840, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(841, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(842, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(843, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(844, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(845, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(846, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(847, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(848, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(849, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(850, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(851, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(852, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(853, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(854, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(855, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(856, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(857, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(858, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(859, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(860, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(861, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(862, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(863, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(864, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(865, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(866, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(867, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(868, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(869, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(870, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(871, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(872, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(873, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(874, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(875, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(876, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(877, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(878, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(879, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(880, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(881, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(882, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(883, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(884, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(885, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(886, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(887, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(888, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(889, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(890, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(891, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(892, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(893, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(894, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(895, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(896, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(897, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(898, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(899, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(900, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(901, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(902, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(903, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(904, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(905, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(906, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(907, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(908, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(909, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(910, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(911, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(912, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(913, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(914, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(915, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(916, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(917, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(918, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(919, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(920, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(921, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(922, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(923, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(924, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(925, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(926, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(927, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(928, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(929, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(930, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(931, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(932, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(933, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(934, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(935, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(936, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(937, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(938, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(939, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(940, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(941, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(942, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(943, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(944, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(945, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(946, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(947, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(948, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(949, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(950, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(951, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(952, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(953, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(954, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(955, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(956, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(957, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(958, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(959, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(960, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(961, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(962, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(963, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(964, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(965, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(966, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(967, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(968, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(969, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(970, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(971, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(972, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(973, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(974, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(975, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(976, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(977, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(978, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(979, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(980, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(981, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(982, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(983, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(984, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(985, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(986, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(987, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL);
INSERT INTO `festival_users` (`ID`, `username`, `email`, `created_at`, `role`, `password`) VALUES
(988, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(989, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(990, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(991, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(992, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(993, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(994, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(995, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(996, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(997, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(998, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(999, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1000, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1001, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1002, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1003, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1004, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1005, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1006, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1007, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1008, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1009, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1010, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1011, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1012, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1013, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1014, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1015, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1016, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1017, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1018, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1019, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1020, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1021, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1022, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1023, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1024, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1025, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1026, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1027, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1028, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1029, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1030, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1031, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1032, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1033, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1034, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1035, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1036, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1037, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1038, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1039, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1040, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1041, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1042, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1043, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1044, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1045, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1046, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1047, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1048, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1049, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1050, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1051, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1052, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1053, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1054, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1055, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1056, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1057, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1058, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1059, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1060, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1061, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1062, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1063, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1064, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1065, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1066, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1067, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1068, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1069, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1070, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1071, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1072, 'asd', '', '0000-00-00 00:00:00', NULL, NULL),
(1073, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1074, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1075, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1076, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1077, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1078, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL),
(1079, 'dsa', '', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forgetpassword`
--

CREATE TABLE `forgetpassword` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forgetpassword`
--

INSERT INTO `forgetpassword` (`id`, `email`, `password`) VALUES
(1, 'test@example.com', '$2y$10$WzEw.FoORsmRtWftI07MOuePHNQHdBd19iOlSc8IzxjLbLDRmQGS'),
(2, 'loreta12@gmail.com', '$2y$10$xAExxpJ6xUsZqlalbcGqjultK1rViPExiEcFlv8GKTSWwrQ4ELpZ.'),
(3, 'oltianabalaj@gmail.com', '$2y$10$BGc6QEDU/34z4kiWKOQImetOsPYGTNW9lgqekxRVXsI.m90caK05C'),
(4, 'loretabilalli@gmail.com', '$2y$10$2VjAa6/dd3dtkzks7MlTV.bC9F1dwALotaMn2RW5S.I/pxQnWyVhG'),
(5, 'adeanimanaj@gmail.com', '$2y$10$WzEw.FoORsmRtWftI07MOuePHNQHdBd19iOlSc8IzxjLbLDRmQGS');

-- --------------------------------------------------------

--
-- Table structure for table `home1`
--

CREATE TABLE `home1` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `image2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home1`
--

INSERT INTO `home1` (`id`, `title`, `date`, `created_on`, `image2`) VALUES
(1, 'test', 'testi', '2025-02-02 19:21:32', 'uploads/679fc6c0bd628.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `line_up`
--

CREATE TABLE `line_up` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `line_up`
--

INSERT INTO `line_up` (`ID`, `name`, `image_path`) VALUES
(10, 'Mc Kresha', 'images/mc_kresha.jpg'),
(11, 'Lyrical Son', 'images/lyrical_son.jpg'),
(13, 'Lluni', 'images/lluni.jpg'),
(14, 'Dua Lipa', 'images/dua_lipa.jpg'),
(15, 'Lumi B', 'images/LumiB.jpg'),
(16, 'Ledri', 'images/ledri.jpg'),
(17, 'Dafina Zeqiri', 'images/Dafina_Zeqiri.jpg'),
(18, 'Tayna', 'images/Tayna.jpg'),
(19, 'Era Istrefi', 'images/Era_Istrefi.jpg'),
(20, 'Elinel', 'images/Elinel.jpg'),
(21, 'Gjiko', 'images/gjiko.jpg'),
(22, 'Singullar', 'images/singullari.jpg'),
(23, 'Kida', 'images/Kida.jpg'),
(24, 'Dj Pm & Dj Gagz', 'images/dj pm & dj dagz.jpg'),
(25, 'Dhurata Dora', 'images/dhurata-dora.jpg'),
(26, 'Fifi', 'images/fifi.jpg'),
(27, 'Majk', 'images/Majk.jpg'),
(28, 'Capital T', 'images/Capital_t.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`id`, `category`, `image`, `title`, `description`, `price`) VALUES
(28, 'hoddie', 'duksi1.png', 'Pint Festival Hoddie', 'Get your official festival hoodie in black or white.', 35.00),
(29, 'hoddie', 'duksi2.pnh.png', 'Pint Festival Hoddie', 'Get your official festival hoodie in black or white.', 35.00),
(31, 'hoddie', 'duksi3.png.png', 'Pint Festival Hoddie', 'Get your official festival hoodie in black or white.', 35.00),
(32, 'cases', 'case1.png', 'Pint Festival Case', 'Protect your phone with these stylish Pint Festival cases!', 10.00),
(33, 'cases', 'case2.png', 'Pint Festval Case', 'Protect your phone with these stylish Pint Festival cases!', 10.00),
(34, 'cases', 'case3.png', 'Pint Festval Case', 'Protect your phone with these stylish Pint Festival cases!', 10.00),
(35, 'tshirts', 'maica1.png', 'Pint Festval T-Shirt', 'Lightweight and comfy, available in multiple colors!', 20.00),
(36, 'tshirts', 'maica2.png', 'Pint Festval T-Shirt', 'Lightweight and comfy, available in multiple colors!', 20.00),
(37, 'tshirts', 'maica3.png', 'Pint Festval T-Shirt', 'Lightweight and comfy, available in multiple colors!', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `created_at`) VALUES
(2, 'Exclusive: MC Kresha talks about PINT\'s newest album. \"United State of Albania\".', '2025-01-30 18:21:40'),
(3, '\"Amore\" by Lyrical Son, Lav\'da and MC Kresha is released.', '2025-01-30 20:10:17'),
(4, 'MC Kresha, Lyrical Son, Semiautomvtic, Kreshnique and NS release the song \"Beirut\" on YouTube.', '2025-01-30 20:10:57'),
(5, '\"Dilêm jasht\", the new musical project by Lyrical Son and MC Kresha, is launched.', '2025-01-30 20:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payinfo`
--

CREATE TABLE `payinfo` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `payment_status` enum('pending','completed','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payinfo`
--

INSERT INTO `payinfo` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `country`, `payment_status`, `created_at`) VALUES
(1, 'oltiana', 'balaj', 'oltianabalaj@gmail.com', '034532252', 'Blaj', 'istog', 'kosovo', 'pending', '2025-01-30 13:47:55'),
(7, 'adea', 'Nimanaj', 'adeanimanaj@gmail.com', '37339898', 'Nimanaj', 'Peje', 'kosovo', 'pending', '2025-01-31 09:38:59'),
(13, 'filan', 'fistek', 'filan@gmail.com', '23586', 'dieid', 'Prishtine', 'kosovo', 'pending', '2025-02-01 18:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `payment_db`
--

CREATE TABLE `payment_db` (
  `id` int(11) NOT NULL,
  `cardNumber` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `cardHolder` varchar(50) NOT NULL,
  `cvv` int(11) NOT NULL,
  `saveAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_db`
--

INSERT INTO `payment_db` (`id`, `cardNumber`, `month`, `year`, `cardHolder`, `cvv`, `saveAt`) VALUES
(8, 2147483647, 21, 26, 'Adea Nimanaj', 124, '2025-01-31 00:30:50'),
(15, 2147483647, 12, 2024, 'Oltiana Balaj', 123, '2025-01-31 00:43:29'),
(16, 2147483647, 12, 2024, 'Loreta Bilalli', 123, '2025-01-31 00:43:46'),
(17, 2147483647, 12, 2024, 'Filan Fisteku', 123, '2025-01-31 00:46:29'),
(23, 2147483647, 12, 2024, 'hhahsshsh', 425, '2025-01-31 01:08:42'),
(24, 2147483647, 10, 2025, 'Olta', 234, '2025-02-01 18:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(12,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `category`, `description`, `price`, `stock`) VALUES
(1, 'images/hoodie.jpg', 'Pint Festival Hoodie', NULL, 'High-quality hoodie', 35.00, 50),
(2, 'images/tshirt.jpg', 'Pint Festival T-shirt', NULL, 'Comfortable cotton t-shirt', 20.00, 100),
(3, 'images/hoodie.jpg', 'Pint Festival Hoodie', NULL, 'High-quality hoodie', 35.00, 0),
(4, 'images/tshirt.jpg', 'Pint Festival T-shirt', NULL, 'Comfortable cotton t-shirt', 20.00, 0),
(5, 'hoodie.jpg', 'Pint Festival Hoodie', NULL, NULL, 35.00, 0),
(6, 'tshirt.jpg', 'Pint Festival T-shirt', NULL, NULL, 20.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `singup`
--

CREATE TABLE `singup` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `singup`
--

INSERT INTO `singup` (`ID`, `Name`, `username`, `email`, `create_at`, `role`, `password`) VALUES
(1, 'Loreta', 'bilalli', 'loretabilalli8@gmail.com', '2025-01-28 22:43:48', 'user', '$2y$10$./jVSJ61BLvn72DGIqiWBe8HkuLjgEY7o2fx3ZMvH2lAmpY7Jt85.'),
(2, 'oltiana', 'Balaj', 'oltabalaja@gmail.com', '2025-01-28 22:45:51', 'user', '$2y$10$OHJsZOkt0leoPbU3gtaNEutxrFRK1GJgjPkSOB4HmuK9xlD9BGJ/.'),
(3, 'Adea', 'Nimanaj', 'AdeaNimanaj@gmail.com', '2025-01-29 12:09:02', 'user', '$2y$10$tWbjBXNh52nVVe0T6XHC2Oltt9UsPnmMDKOHOjCQJ4VsRCg5IrHbO'),
(5, 'admin', 'admin123', 'loretabilalli9@gmail.com', '2025-01-29 13:06:01', 'user', '$2y$10$eE2l0cmnLD.D27DGgaFux.dgot9ndVzXt09lkYFASbdXhHDeAqyJe'),
(20, 'filan', 'filanfisteku', 'filan@gmail.com', '2025-01-31 10:17:43', 'user', '$2y$10$cI7iscq4hH.OWRH1FvDb4.paT16dopUEXaaTi4hDYhJAVSyAke0wW');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticket_type` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_type`, `Price`, `Quantity`) VALUES
(5, 'REGULAR', 200, 80),
(6, 'GROUP OF THREE', 170, 100),
(7, 'GROUP OF FIVE', 140, 100),
(11, 'VIP TICKET', 300, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buytickets`
--
ALTER TABLE `buytickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `festival_users`
--
ALTER TABLE `festival_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `forgetpassword`
--
ALTER TABLE `forgetpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home1`
--
ALTER TABLE `home1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `line_up`
--
ALTER TABLE `line_up`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payinfo`
--
ALTER TABLE `payinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_db`
--
ALTER TABLE `payment_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singup`
--
ALTER TABLE `singup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `buytickets`
--
ALTER TABLE `buytickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `festival_users`
--
ALTER TABLE `festival_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1080;

--
-- AUTO_INCREMENT for table `forgetpassword`
--
ALTER TABLE `forgetpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `line_up`
--
ALTER TABLE `line_up`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payinfo`
--
ALTER TABLE `payinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_db`
--
ALTER TABLE `payment_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `singup`
--
ALTER TABLE `singup`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
