-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2020 at 08:37 AM
-- Server version: 10.3.10-MariaDB-log
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haul_prod`
--

-- --------------------------------------------------------

--
-- Table structure for table `enum`
--

CREATE TABLE `enum` (
  `id` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` text NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `type` varchar(25) NOT NULL,
  `by_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enum`
--

INSERT INTO `enum` (`id`, `created_at`, `updated_at`, `deleted_at`, `code`, `name`, `category`, `category_description`, `type`, `by_user`) VALUES
(1, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '1', 'Shift 1', NULL, NULL, 'shift', 1),
(2, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '2', 'Shift 2', NULL, NULL, 'shift', 1),
(3, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, 'KM 34', NULL, NULL, 'area', 1),
(4, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, 'KM 65', NULL, NULL, 'area', 1),
(5, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, 'KM 69', NULL, NULL, 'area', 1),
(6, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'K', 'Kosongan', NULL, NULL, 'posisi', 1),
(7, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'M', 'Muatan', NULL, NULL, 'posisi', 1),
(8, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PBHICV', 'HCV PRG', NULL, '#62CCFF,black', 'material', 1),
(10, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PBHICTS', 'HCV HTS', NULL, '#6E32A3,white', 'material', 1),
(11, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PBLOCTS', 'LCV HTS', NULL, '#F99E00,white', 'material', 1),
(12, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PB600', 'P600', NULL, '#00B249,black', 'material', 1),
(13, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PB700', 'P700', NULL, '#FAFF04,black', 'material', 1),
(14, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PB800', 'P800', NULL, '#FD0004,white', 'material', 1),
(15, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PBA', 'HI ASH PRG', NULL, '#FBFDFF,black', 'material', 1),
(16, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PBTS', 'HTS PRG', NULL, '#000000,white', 'material', 1),
(17, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PBLOCV', 'LCV PRG', NULL, '#F89CCD,black', 'material', 1),
(18, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PBLOCA', 'LCA PRG', NULL, '#C08F71,white', 'material', 1),
(19, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'PSBC', 'BC', NULL, '#AFC7ED,black', 'material', 1),
(20, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'BCLSA', 'BC', NULL, '#AFC7ED,black', 'material', 1),
(21, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'BCSCM', 'BC', NULL, '#AFC7ED,black', 'material', 1),
(22, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSC21', 'T100 CT2 ', NULL, '#00B249,black', 'material', 1),
(23, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSC11', 'T100 CT1 ', NULL, '#00B249,black', 'material', 1),
(24, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSCHICV', 'HCV CT', NULL, '#62CCFF,black', 'material', 1),
(25, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSC2HICA', 'HCV HI ASH CT', NULL, '#3699FD,white', 'material', 1),
(26, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSC12', 'T200 CT1', NULL, '#FAFF04,black', 'material', 1),
(27, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSC22', 'T200 CT2 ', NULL, '#FAFF04,black', 'material', 1),
(28, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSC13', 'T300 CT1', NULL, '#FD0004,white', 'material', 1),
(29, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSC23', 'T300 CT2 ', NULL, '#FD0004,white', 'material', 1),
(30, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSN100', 'T100 NT', NULL, '#00B249,black', 'material', 1),
(31, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSN200', 'T200 NT', NULL, '#FAFF04,black', 'material', 1),
(32, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSN300', 'T300 NT', NULL, '#FD0004,white', 'material', 1),
(33, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSNA', 'HI ASH NT', NULL, '#FBFDFF,black', 'material', 1),
(34, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSCA', 'HI ASH CT', NULL, '#FBFDFF,black', 'material', 1),
(35, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSNHICV', 'HCV NT', NULL, '#62CCFF,black', 'material', 1),
(36, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSNLOCA', 'LCA NT', NULL, '#C08F71,white', 'material', 1),
(37, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSNLOCV', 'LCV NT', NULL, '#F89CCD,black', 'material', 1),
(38, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSCLOCV', 'LCV CT', NULL, '#F89CCD,black', 'material', 1),
(39, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TSCLOCA', 'LCA CT', NULL, '#C08F71,white', 'material', 1),
(40, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'WS100', 'W100', NULL, '#00B24E,yellow', 'material', 1),
(41, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'WS200', 'W200', NULL, '#FAFF04,black', 'material', 1),
(42, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'WS300', 'W300', NULL, '#FD0004,white', 'material', 1),
(43, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'WSHICV', 'HI CV WARA', NULL, '#62CCFF,black', 'material', 1),
(44, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'WSS', 'HI TS', NULL, '#000000,white', 'material', 1),
(45, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'WSA', 'HI ASH WARA', NULL, '#FBFDFF,black', 'material', 1),
(46, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TPS100', 'T100 ST', NULL, '#00B24D,white', 'material', 1),
(47, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TPS200', 'T200 ST', NULL, '#FAFF04,black', 'material', 1),
(48, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TPSHICV', 'T300 ST', NULL, '#FD0004,white', 'material', 1),
(49, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TPSHICTS', 'HI-CV ST', NULL, '#62CCFF,black', 'material', 1),
(50, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TPSA', 'HCV HTS ST', NULL, '#6E32A3,white', 'material', 1),
(51, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TPSHICA', 'HI ASH ST', NULL, '#FBFDFF,black', 'material', 1),
(52, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TPSLOCV', 'HCV HI ASH ST', NULL, '#3597EA,white', 'material', 1),
(53, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TPS300', 'LCV ST', NULL, '#F89CCD,black', 'material', 1),
(54, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TPSLOCA', 'LCV HI ASH ST', NULL, '#C48B77,white', 'material', 1),
(55, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'TPSLOCTS', 'LCV HITS ST', NULL, '#FF9601,white', 'material', 1),
(56, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI CV PRG', 'HCV PRG', NULL, '#62CCFF,black', 'material', 1),
(57, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI CV HI ASH PRG', 'HCV HI ASH', NULL, '#3299FF,white', 'material', 1),
(58, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI CV HTS PRG', 'HCV HTS', NULL, '#6E32A3,white', 'material', 1),
(59, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'LOW CV HTS PRG', 'LCV HTS', NULL, '#FF9601,white', 'material', 1),
(60, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'P600', 'P600', NULL, '#00B249,black', 'material', 1),
(61, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'P700', 'P700', NULL, '#FAFF04,black', 'material', 1),
(62, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'P800', 'P800', NULL, '#FD0004,white', 'material', 1),
(63, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI ASH PRG', 'HI ASH PRG', NULL, '#FBFDFF,black', 'material', 1),
(64, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI TS PRG', 'HTS PRG', NULL, '#000000,white', 'material', 1),
(65, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'LOW CV PRG', 'LCV PRG', NULL, '#F89CCD,black', 'material', 1),
(66, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'LOW CV HI-ASH PRG', 'LCA PRG', NULL, '#BE8F78,white', 'material', 1),
(67, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T100 CT2', 'T100 CT2 ', NULL, '#00B249,black', 'material', 1),
(68, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T100 CT1', 'T100 CT1 ', NULL, '#00B249,black', 'material', 1),
(69, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI CV CT', 'HCV CT', NULL, '#62CCFF,black', 'material', 1),
(70, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI CV HI ASH CT2', 'HCV HI ASH CT', NULL, '#3299FF,white', 'material', 1),
(71, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T200 CT1', 'T200 CT1', NULL, '#FAFF04,black', 'material', 1),
(72, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T200 CT2', 'T200 CT2 ', NULL, '#FAFF04,black', 'material', 1),
(73, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T300 CT1', 'T300 CT1', NULL, '#FD0004,white', 'material', 1),
(74, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T300 CT2', 'T300 CT2 ', NULL, '#FD0004,white', 'material', 1),
(75, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T100 NT', 'T100 NT', NULL, '#00B249,black', 'material', 1),
(76, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T200 NT', 'T200 NT', NULL, '#FAFF04,black', 'material', 1),
(77, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T300 NT', 'T300 NT', NULL, '#FD0004,white', 'material', 1),
(78, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI ASH NT', 'HI ASH NT', NULL, '#FBFDFF,black', 'material', 1),
(79, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI ASH CT', 'HI ASH CT', NULL, '#FBFDFF,black', 'material', 1),
(80, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI CV NT', 'HCV NT', NULL, '#62CCFF,black', 'material', 1),
(81, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'LOW CV HI ASH NT', 'LCA NT', NULL, '#BE8F78,white', 'material', 1),
(82, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'LOW CV NT', 'LCV NT', NULL, '#F89CCD,black', 'material', 1),
(83, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'LOW CV CT', 'LCV CT', NULL, '#F89CCD,black', 'material', 1),
(84, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'LOW CV HI ASH CT', 'LCA CT', NULL, '#BE8F78,white', 'material', 1),
(85, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'W100', 'W100', NULL, '#00B24E,yellow', 'material', 1),
(86, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'W200', 'W200', NULL, '#FAFF04,black', 'material', 1),
(87, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'W300', 'W300', NULL, '#FD0004,white', 'material', 1),
(88, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI CV WARA', 'HI CV WARA', NULL, '#62CCFF,black', 'material', 1),
(89, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI TS', 'HI TS', NULL, '#000000,white', 'material', 1),
(90, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI ASH WARA', 'HI ASH WARA', NULL, '#FBFDFF,black\r\n', 'material', 1),
(91, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T100 ST', 'T100 ST', NULL, '#01AE54,white', 'material', 1),
(92, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T200 ST', 'T200 ST', NULL, '#FAFF04,black', 'material', 1),
(93, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'T300 ST', 'T300 ST', NULL, '#FD0004,white', 'material', 1),
(94, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI-CV ST', 'HI-CV ST', NULL, '#62CCFF,black', 'material', 1),
(95, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI CV HI TS ST', 'HCV HTS ST', NULL, '#6E32A3,white', 'material', 1),
(96, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI ASH ST', 'HI ASH ST', NULL, '#FBFDFF,black', 'material', 1),
(97, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'HI CV HI ASH ST', 'HCV HI ASH ST', NULL, '#3299FF,white', 'material', 1),
(98, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'LOW CV ST', 'LCV ST', NULL, '#F89CCD,black', 'material', 1),
(99, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'LOW CV HI ASH ST', 'LCV HI ASH ST', NULL, '#BE8F78,white', 'material', 1),
(100, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'LOW CV HI TS ST', 'LCV HITS ST', NULL, '#FF9601,white', 'material', 1),
(101, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, '34', NULL, NULL, 'location', 1),
(102, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, '65', NULL, NULL, 'location', 1),
(103, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, '69', NULL, NULL, 'location', 1),
(104, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, 'CSA 34', NULL, NULL, 'csa', 1),
(105, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, 'CSA 65', NULL, NULL, 'csa', 1),
(106, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, 'CSA 69', NULL, NULL, 'csa', 1),
(107, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, 'RMI 68', NULL, NULL, 'csa', 1),
(108, '2020-01-31 00:00:00', '2020-03-12 13:51:16', NULL, 'KS', 'Kosongan', NULL, 'null', 'material', 1),
(109, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'S01', 'Rest, Meal, and Party', NULL, NULL, 'code_stby', 1),
(110, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, 'S02', 'Change Shift', NULL, NULL, 'code_stby', 1),
(111, '2020-02-01 00:00:00', '2020-02-01 00:00:00', NULL, 'S03A', 'No Operator (Not yet recruited)', NULL, NULL, 'code_stby', 1),
(112, '2020-02-02 00:00:00', '2020-02-02 00:00:00', NULL, 'S03B', 'No Operator (SIA)', NULL, NULL, 'code_stby', 1),
(113, '2020-02-03 00:00:00', '2020-02-03 00:00:00', NULL, 'S03C', 'No Operator (Late Delivery)', NULL, NULL, 'code_stby', 1),
(114, '2020-02-04 00:00:00', '2020-02-04 00:00:00', NULL, 'S04A', 'Queuing at ROM (Passing Problem)', NULL, NULL, 'code_stby', 1),
(115, '2020-02-05 00:00:00', '2020-02-05 00:00:00', NULL, 'S04B', 'Queuing at ROM (WA Breakdown)', NULL, NULL, 'code_stby', 1),
(116, '2020-02-06 00:00:00', '2020-02-06 00:00:00', NULL, 'S05', 'Queuing at Kelanis', NULL, NULL, 'code_stby', 1),
(117, '2020-02-07 00:00:00', '2020-02-07 00:00:00', NULL, 'S06A', 'Queuing at Halte (Crowded, Full Stockpile)', NULL, NULL, 'code_stby', 1),
(118, '2020-02-08 00:00:00', '2020-02-08 00:00:00', NULL, 'S06B', 'Queuing at Halte (Hopper Breakdown)', NULL, NULL, 'code_stby', 1),
(119, '2020-02-09 00:00:00', '2020-02-09 00:00:00', NULL, 'S06C', 'Queuing at Halte (Passing Problem)', NULL, NULL, 'code_stby', 1),
(120, '2020-02-10 00:00:00', '2020-02-10 00:00:00', NULL, 'S07', 'Road Maintenance', NULL, NULL, 'code_stby', 1),
(121, '2020-02-11 00:00:00', '2020-02-11 00:00:00', NULL, 'S08A', 'Stoppage (Demo & External matter)', NULL, NULL, 'code_stby', 1),
(122, '2020-02-12 00:00:00', '2020-02-12 00:00:00', NULL, 'S08B', 'Stoppage (Cuaca : Smoke, fog, dust)', NULL, NULL, 'code_stby', 1),
(123, '2020-02-13 00:00:00', '2020-02-13 00:00:00', NULL, 'S08C', 'Flood', NULL, NULL, 'code_stby', 1),
(124, '2020-02-14 00:00:00', '2020-02-14 00:00:00', NULL, 'S08D', 'Holiday', NULL, NULL, 'code_stby', 1),
(125, '2020-02-15 00:00:00', '2020-02-15 00:00:00', NULL, 'S09', 'P5M & Safety Talk', NULL, NULL, 'code_stby', 1),
(126, '2020-02-16 00:00:00', '2020-02-16 00:00:00', NULL, 'S10', 'Parking No Barge', NULL, NULL, 'code_stby', 1),
(127, '2020-02-17 00:00:00', '2020-02-17 00:00:00', NULL, 'S11', 'Parking No Cargo at ROM', NULL, NULL, 'code_stby', 1),
(128, '2020-02-18 00:00:00', '2020-02-18 00:00:00', NULL, 'S12A', 'Periodic Inspection (PI)', NULL, NULL, 'code_stby', 1),
(129, '2020-02-19 00:00:00', '2020-02-19 00:00:00', NULL, 'S12B', 'Queuing Periodic Inspection', NULL, NULL, 'code_stby', 1),
(130, '2020-02-20 00:00:00', '2020-02-20 00:00:00', NULL, 'S13A', 'Refueling', NULL, NULL, 'code_stby', 1),
(131, '2020-02-21 00:00:00', '2020-02-21 00:00:00', NULL, 'S13B', 'Queuing Refueling', NULL, NULL, 'code_stby', 1),
(132, '2020-02-22 00:00:00', '2020-02-22 00:00:00', NULL, 'BD34', 'Breakdown KM33', NULL, NULL, 'code_stby', 1),
(133, '2020-02-23 00:00:00', '2020-02-23 00:00:00', NULL, 'BD35', 'Breakdown KM35', NULL, NULL, 'code_stby', 1),
(134, '2020-02-24 00:00:00', '2020-02-24 00:00:00', NULL, 'BD65', 'Breakdown KM65', NULL, NULL, 'code_stby', 1),
(135, '2020-02-25 00:00:00', '2020-02-25 00:00:00', NULL, 'BD69', 'Breakdown KM69', NULL, NULL, 'code_stby', 1),
(136, '2020-02-26 00:00:00', '2020-02-26 00:00:00', NULL, 'BDTP', 'Breakdown Tenda Putih', NULL, NULL, 'code_stby', 1),
(137, '2020-02-27 00:00:00', '2020-02-27 00:00:00', NULL, 'BS', 'Breakdown Scheduled', NULL, NULL, 'code_stby', 1),
(138, '2020-02-28 00:00:00', '2020-02-28 00:00:00', NULL, 'L', 'No Queuing (Lanjut)', NULL, NULL, 'code_stby', 1),
(141, '2020-03-04 14:24:00', '2020-03-04 14:24:00', '2020-03-04 14:30:23', 'aass', 'ssss', NULL, 'sssss,hhhh', 'material', 1),
(142, '2020-02-24 00:00:00', '2020-02-24 00:00:00', NULL, '', 'administrator', NULL, NULL, 'level', 1),
(143, '2020-02-24 00:00:00', '2020-02-24 00:00:00', NULL, '', 'supervisor', NULL, NULL, 'level', 1),
(144, '2020-02-24 00:00:00', '2020-02-24 00:00:00', NULL, '', 'dispatcher', NULL, NULL, 'level', 1),
(145, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HCV PRG', NULL, '#62CCFF,black', 'material_new', 1),
(146, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HCV HI ASH PRG', NULL, '#62CCFF,white', 'material_new', 1),
(147, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HCV HTS PRG', NULL, '#62CCFF,white', 'material_new', 1),
(148, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'LCV HTS PRG', NULL, '#62CCFF,white', 'material_new', 1),
(149, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'P600', NULL, '#62CCFF,white', 'material_new', 1),
(150, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'P700', NULL, '#62CCFF,white', 'material_new', 1),
(151, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'P800', NULL, '#62CCFF,white', 'material_new', 1),
(152, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HI ASH PRG', NULL, '#62CCFF,white', 'material_new', 1),
(153, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HTS PRG', NULL, '#62CCFF,white', 'material_new', 1),
(154, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'LCV PRG', NULL, '#62CCFF,white', 'material_new', 1),
(155, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'LCA PRG', NULL, '#62CCFF,white', 'material_new', 1),
(156, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'PSBC', NULL, '#62CCFF,white', 'material_new', 1),
(157, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'BCLSA', NULL, '#62CCFF,white', 'material_new', 1),
(158, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'BCSCM', NULL, '#62CCFF,white', 'material_new', 1),
(159, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'BCNLSA', NULL, '#62CCFF,white', 'material_new', 1),
(160, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T100 CT2', NULL, '#62CCFF,white', 'material_new', 1),
(161, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T100 CT1', NULL, '#62CCFF,white', 'material_new', 1),
(162, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HCV CT', NULL, '#62CCFF,white', 'material_new', 1),
(163, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HCV HI ASH CT', NULL, '#62CCFF,white', 'material_new', 1),
(164, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T200 CT1', NULL, '#62CCFF,white', 'material_new', 1),
(165, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T200 CT2', NULL, '#62CCFF,white', 'material_new', 1),
(166, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T300 CT1', NULL, '#62CCFF,white', 'material_new', 1),
(167, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T300 CT2', NULL, '#62CCFF,white', 'material_new', 1),
(168, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T100 NT', NULL, '#62CCFF,white', 'material_new', 1),
(169, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T200 NT', NULL, '#62CCFF,white', 'material_new', 1),
(170, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T300 NT', NULL, '#62CCFF,white', 'material_new', 1),
(171, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HI ASH NT', NULL, '#62CCFF,white', 'material_new', 1),
(172, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HI ASH CT', NULL, '#62CCFF,white', 'material_new', 1),
(173, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HCV NT', NULL, '#62CCFF,white', 'material_new', 1),
(174, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'LCA NT', NULL, '#62CCFF,white', 'material_new', 1),
(175, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'LCV NT', NULL, '#62CCFF,white', 'material_new', 1),
(176, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'LCV CT', NULL, '#62CCFF,white', 'material_new', 1),
(177, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'LCA CT', NULL, '#62CCFF,white', 'material_new', 1),
(178, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'W100', NULL, '#62CCFF,white', 'material_new', 1),
(179, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'W200', NULL, '#62CCFF,white', 'material_new', 1),
(180, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'W300', NULL, '#62CCFF,white', 'material_new', 1),
(181, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HCV WARA', NULL, '#62CCFF,white', 'material_new', 1),
(182, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HTS WARA', NULL, '#62CCFF,white', 'material_new', 1),
(183, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HI ASH WARA', NULL, '#62CCFF,white', 'material_new', 1),
(184, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T100 ST', NULL, '#62CCFF,white', 'material_new', 1),
(185, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T200 ST', NULL, '#62CCFF,white', 'material_new', 1),
(186, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'T300 ST', NULL, '#62CCFF,white', 'material_new', 1),
(187, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HI-CV ST', NULL, '#62CCFF,white', 'material_new', 1),
(188, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HCV HTS ST', NULL, '#62CCFF,white', 'material_new', 1),
(189, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HI ASH ST', NULL, '#62CCFF,white', 'material_new', 1),
(190, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'HCV HI ASH ST', NULL, '#62CCFF,white', 'material_new', 1),
(191, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'LCV ST', NULL, '#62CCFF,white', 'material_new', 1),
(192, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'LCV HI ASH ST', NULL, '#62CCFF,white', 'material_new', 1),
(193, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, '', 'LCV HITS ST', NULL, '#62CCFF,white', 'material_new', 1),
(194, '2020-03-18 11:37:53', '2020-03-18 11:37:53', NULL, NULL, 'Kosongan', NULL, 'white,black', 'material_new', 2),
(195, '2020-01-31 00:00:00', '2020-01-31 00:00:00', NULL, NULL, 'Flexible', NULL, NULL, 'csa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_enum`
--

CREATE TABLE `table_enum` (
  `id` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `name` text NOT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(25) NOT NULL,
  `by_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_enum`
--

INSERT INTO `table_enum` (`id`, `created_at`, `updated_at`, `deleted_at`, `code`, `name`, `description`, `type`, `by_user`) VALUES
(1, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '34', 'CSA 34', 'Change Shift Area Km 34', 'csa', 1),
(2, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '65', 'CSA 65', 'Change Shift Area Km 65', 'csa', 1),
(3, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '69', 'CSA 69', 'Change Shift Area Km 69', 'csa', 1),
(4, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'RMI', 'CSA RMI', 'Change Shift Area RMI', 'csa', 1),
(5, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'Flexible', 'CSA Flexible', 'Change Shift Area Km Flexible', 'csa', 1),
(6, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '1', 'Shift 1', 'Form 06:00 until 18:00 WITA', 'shift', 1),
(7, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '2', 'Shift 2', 'Form 18:00 until 06:00 WITA', 'shift', 1),
(8, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'K', 'Kosongan', NULL, 'position', 1),
(9, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'M', 'Muatan', NULL, 'position', 1),
(10, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '34', 'KM 34', NULL, 'area', 1),
(11, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '65', 'KM 65', NULL, 'area', 1),
(12, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '69', 'KM 69', NULL, 'area', 1),
(13, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'Administrator', 'Login Sebagai Admin', 'level', 1),
(14, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'dispatcher', 'Login Sebagai user pengguna', 'level', 1),
(15, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HCV PRG', '#62CCFF,black', 'cargo_muatan', 1),
(16, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HCV HI ASH PRG', '#6E32A3,white', 'cargo_muatan', 1),
(17, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HCV HTS PRG', '#FBFDFF,black', 'cargo_muatan', 1),
(18, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'LCV HTS PRG', '#F89CCD,black', 'cargo_muatan', 1),
(19, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'P600', '#00B249,black', 'cargo_muatan', 1),
(20, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'P700', '#FAFF04,black', 'cargo_muatan', 1),
(21, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'P800', '#FD0004,white', 'cargo_muatan', 1),
(22, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HI ASH PRG', '#FBFDFF,black', 'cargo_muatan', 1),
(23, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HTS PRG', '#000000,white', 'cargo_muatan', 1),
(24, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'LCV PRG', '#F89CCD,black', 'cargo_muatan', 1),
(25, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'LCA PRG', '#BE8F78,white', 'cargo_muatan', 1),
(26, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'PSBC', '#AFC7ED,black', 'cargo_muatan', 1),
(27, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'BCLSA', '#AFC7ED,black', 'cargo_muatan', 1),
(28, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'BCSCM', '#AFC7ED,black', 'cargo_muatan', 1),
(29, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'BCNLSA', '', 'cargo_muatan', 1),
(30, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T100 CT2', '#00B249,black', 'cargo_muatan', 1),
(31, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T100 CT1', '#00B249,black', 'cargo_muatan', 1),
(32, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HCV CT', '#62CCFF,black', 'cargo_muatan', 1),
(33, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HCV HI ASH CT', '#3299FF,white', 'cargo_muatan', 1),
(34, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T200 CT1', '#FAFF04,black', 'cargo_muatan', 1),
(35, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T200 CT2', '#FAFF04,black', 'cargo_muatan', 1),
(36, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T300 CT1', '#FD0004,white', 'cargo_muatan', 1),
(37, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T300 CT2', '#FD0004,white', 'cargo_muatan', 1),
(38, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T100 NT', '#00B249,black', 'cargo_muatan', 1),
(39, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T200 NT', '#FAFF04,black', 'cargo_muatan', 1),
(40, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T300 NT', '#FD0004,white', 'cargo_muatan', 1),
(41, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HI ASH NT', '#FBFDFF,black', 'cargo_muatan', 1),
(42, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HI ASH CT', '#FBFDFF,black', 'cargo_muatan', 1),
(43, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HCV NT', '#62CCFF,black', 'cargo_muatan', 1),
(44, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'LCA NT', '#C08F71,white', 'cargo_muatan', 1),
(45, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'LCV NT', '#F89CCD,black', 'cargo_muatan', 1),
(46, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'LCV CT', '#F89CCD,black', 'cargo_muatan', 1),
(47, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'LCA CT', '#C08F71,white', 'cargo_muatan', 1),
(48, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'W100', '#00B24E,yellow', 'cargo_muatan', 1),
(49, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'W200', '#FAFF04,black', 'cargo_muatan', 1),
(50, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'W300', '#FD0004,white', 'cargo_muatan', 1),
(51, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HCV WARA', '#62CCFF,black', 'cargo_muatan', 1),
(52, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HTS WARA', '#000000,white', 'cargo_muatan', 1),
(53, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HI ASH WARA', '#FBFDFF,black', 'cargo_muatan', 1),
(54, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T100 ST', '#01AE54,white', 'cargo_muatan', 1),
(55, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T200 ST', '#FAFF04,black', 'cargo_muatan', 1),
(56, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'T300 ST', '#FD0004,white', 'cargo_muatan', 1),
(57, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HI-CV ST', '#62CCFF,black', 'cargo_muatan', 1),
(58, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HCV HTS ST', '#6E32A3,white', 'cargo_muatan', 1),
(59, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HI ASH ST', '#FBFDFF,black', 'cargo_muatan', 1),
(60, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'HCV HI ASH ST', '#3299FF,white', 'cargo_muatan', 1),
(61, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'LCV ST', '#F89CCD,black', 'cargo_muatan', 1),
(62, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'LCV HI ASH ST', '#BE8F78,white', 'cargo_muatan', 1),
(63, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'LCV HITS ST', '#FF9601,white', 'cargo_muatan', 1),
(64, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'Kosongan', '', 'cargo_muatan', 1),
(65, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S01', 'Rest, Meal, and Party', '', 'code_standby', 1),
(66, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S02', 'Change Shift', '', 'code_standby', 1),
(67, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S03A', 'No Operator (Not yet recruited)', '', 'code_standby', 1),
(68, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S03B', 'No Operator (SIA)', '', 'code_standby', 1),
(69, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S03C', 'No Operator (Late Delivery)', '', 'code_standby', 1),
(70, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S04A', 'Queuing at ROM (Passing Problem)', '', 'code_standby', 1),
(71, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S04B', 'Queuing at ROM (WA Breakdown)', '', 'code_standby', 1),
(72, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S05', 'Queuing at Kelanis', '', 'code_standby', 1),
(73, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S06A', 'Queuing at Halte (Crowded, Full Stockpile)', '', 'code_standby', 1),
(74, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S06B', 'Queuing at Halte (Hopper Breakdown)', '', 'code_standby', 1),
(75, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S06C', 'Queuing at Halte (Passing Problem)', '', 'code_standby', 1),
(76, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S07', 'Road Maintenance', '', 'code_standby', 1),
(77, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S08A', 'Stoppage (Demo & External matter)', '', 'code_standby', 1),
(78, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S08B', 'Stoppage (Cuaca : Smoke, fog, dust)', '', 'code_standby', 1),
(79, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S08VC', 'Flood', '', 'code_standby', 1),
(80, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S08C', 'Flood', '', 'code_standby', 1),
(81, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S08D', 'Holiday', '', 'code_standby', 1),
(82, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S09', 'P5M & Safety Talk', '', 'code_standby', 1),
(83, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S10', 'Parking No Barge', '', 'code_standby', 1),
(84, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S11', 'Parking No Cargo at ROM', '', 'code_standby', 1),
(85, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S12A', 'Periodic Inspection (PI)', '', 'code_standby', 1),
(86, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S12B', 'Queuing Periodic Inspection', '', 'code_standby', 1),
(87, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S13A', 'Refueling', '', 'code_standby', 1),
(88, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'S13B', 'Queuing Refueling', '', 'code_standby', 1),
(89, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'BD34', 'Breakdown KM33', '', 'code_standby', 1),
(90, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'BD35', 'Breakdown KM35', '', 'code_standby', 1),
(91, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'BD65', 'Breakdown KM65', '', 'code_standby', 1),
(92, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'BD69', 'Breakdown KM69', '', 'code_standby', 1),
(93, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'BDTP', 'Breakdown Tenda Putih', '', 'code_standby', 1),
(94, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'BS', 'Breakdown Scheduled', '', 'code_standby', 1),
(95, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, 'L', 'No Queuing (Lanjut)', '', 'code_standby', 1),
(96, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '34', '34', 'Location Record KM 34', 'location', 1),
(97, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '65', '65', 'Location Record KM 65', 'location', 1),
(98, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '69', '69', 'Location Record KM 69', 'location', 1),
(99, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'Over Suppply/ Kordinasi 29', '', 'status_passing', 1),
(100, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'Hopper BD', '', 'status_passing', 1),
(101, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'Stock Krom Penuh', '', 'status_passing', 1),
(102, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'Antri Klanis', '', 'status_passing', 1),
(103, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'Quality Issue', '', 'status_passing', 1),
(104, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'Low Supply', '', 'status_passing', 1),
(105, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'Others', '', 'status_passing', 1),
(106, '2020-04-01 00:00:00', '2020-04-01 00:00:00', NULL, '', 'Barging Mundur', '', 'status_passing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_equipment`
--

CREATE TABLE `table_equipment` (
  `id` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `set_trailler` varchar(50) NOT NULL,
  `unit_id` varchar(25) NOT NULL,
  `no_unit` varchar(25) NOT NULL,
  `model` varchar(50) NOT NULL,
  `chassis_number` varchar(50) NOT NULL,
  `brand_state` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `engine_model` varchar(50) NOT NULL,
  `delivery` varchar(50) NOT NULL,
  `engine_number` varchar(50) NOT NULL,
  `kw_hp_rpm` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `doc_ellipse` varchar(50) NOT NULL,
  `owner_unit` varchar(50) NOT NULL,
  `status_unit` varchar(50) NOT NULL,
  `status_to_use` varchar(25) NOT NULL,
  `by_user` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_equipment`
--

INSERT INTO `table_equipment` (`id`, `created_at`, `updated_at`, `deleted_at`, `date`, `set_trailler`, `unit_id`, `no_unit`, `model`, `chassis_number`, `brand_state`, `product`, `engine_model`, `delivery`, `engine_number`, `kw_hp_rpm`, `type`, `capacity`, `doc_ellipse`, `owner_unit`, `status_unit`, `status_to_use`, `by_user`) VALUES
(1, '2020-03-20 15:22:12', '2020-05-28 09:28:00', NULL, '2020-03-20', 'HT140-0040', '40', 'H040', 'FH16 550 | V.2', 'A620845', 'SWEDEN', 'VOLVO', 'D16C3*A', '38921', '010707', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(2, '2020-03-20 15:22:12', '2020-05-28 09:28:00', NULL, '2020-03-20', 'HT140-0041', '41', 'H041', 'FH16 550 | V.2', 'A620868', 'SWEDEN', 'VOLVO', 'D16C3*A', '38921', '013064', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(3, '2020-03-20 15:22:12', '2020-05-28 09:28:00', NULL, '2020-03-20', 'HT140-0049', '49', 'H049', 'FH16 550 | V.2', 'A627529', 'SWEDEN', 'VOLVO', 'D16C4*A', '39024', '013036', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(4, '2020-03-20 15:22:12', '2020-05-28 09:28:00', NULL, '2020-03-20', 'HT140-0051', '51', 'H051', 'FH16 550 | V.2', 'A627628', 'SWEDEN', 'VOLVO', 'D16C4', '39024', '005336', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(5, '2020-03-20 15:22:12', '2020-05-28 09:28:00', NULL, '2020-03-20', 'HT140-0052', '52', 'H052', 'FH16 550 | V.2', 'A627601', 'SWEDEN', 'VOLVO', 'D16C4', '39024', '013063', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(6, '2020-03-20 15:22:12', '2020-05-28 09:28:00', NULL, '2020-03-20', 'HT140-0053', '53', 'H053', 'FH16 550 | V.2', 'A627610', 'SWEDEN', 'VOLVO', 'D16C4*A', '39024', '031064', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(7, '2020-03-20 15:22:13', '2020-05-28 09:28:00', NULL, '2020-03-20', 'HT140-0056', '56', 'H056', 'FH16 550 | V.2', 'A628746', 'SWEDEN', 'VOLVO', 'D16C4', '39052', '013283', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(8, '2020-03-20 15:22:13', '2020-05-28 09:28:00', NULL, '2020-03-20', 'HT140-0057', '57', 'H057', 'FH16 550 | V.2', 'A628743', 'SWEDEN', 'VOLVO', 'D16C4*A', '39052', '013275', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(9, '2020-03-20 15:22:13', '2020-05-28 09:28:00', NULL, '2020-03-20', 'HT140-0058', '58', 'H058', 'FH16 550 | V.2', 'A628756', 'SWEDEN', 'VOLVO', 'D16C4*A', '39052', '013285', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(10, '2020-03-20 15:22:13', '2020-05-28 09:28:00', NULL, '2020-03-20', 'HT140-0060', '60', 'H060', 'FH16 550 | V.2', 'A628739', 'SWEDEN', 'VOLVO', 'D16C4*A', '39052', '013281', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(11, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0061', '61', 'H061', 'FH16 550 | V.2', 'A628719', 'SWEDEN', 'VOLVO', 'D16C4*A', '39052', '013282', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(12, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0062', '62', 'H062', 'FH16 550 | V.2', 'A628755', 'SWEDEN', 'VOLVO', 'D16C4*A', '39052', '013284', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(13, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0063', '63', 'H063', 'FH16 550 | V.2', 'A628743', 'SWEDEN', 'VOLVO', 'D16C4*A', '39052', '013276', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(14, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0064', '64', 'H064', 'FH16 550 | V.2', 'A631227', 'SWEDEN', 'VOLVO', 'D16C4', '39322', '014523', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(15, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0065', '65', 'H065', 'FH16 550 | V.2', 'A632748', 'SWEDEN', 'VOLVO', 'D16C4*A', '39322', '015208', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Move Out', 'Ready', 1),
(16, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0067', '67', 'H067', 'FH16 550 | V.2', 'A632755', 'SWEDEN', 'VOLVO', 'D16C4*A', '39322', '015211', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(17, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0068', '68', 'H068', 'FH16 550 | V.2', 'A632759', 'SWEDEN', 'VOLVO', 'D16C4*A', '39322', '010749', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(18, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0069', '69', 'H069', 'FH16 550 | V.2', 'A632760', 'SWEDEN', 'VOLVO', 'D16C4', '39322', '015222', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(19, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0070', '70', 'H070', 'FH16 550 | V.2', 'A632765', 'SWEDEN', 'VOLVO', 'D16C4*A', '39322', '015210', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(20, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0071', '71', 'H071', 'FH16 550 | V.2', 'A632766', 'SWEDEN', 'VOLVO', 'D16C4*A', '39322', '015233', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Stand By', 1),
(21, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0072', '72', 'H072', 'FH16 550 | V.2', 'A682324', 'SWEDEN', 'VOLVO', 'D16C4*A', '39827', 'RC008727', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Dispose', 'Dispose', 1),
(22, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0073', '73', 'H073', 'FH16 550 | V.2', 'A683694', 'SWEDEN', 'VOLVO', 'D16C4*A', '39845', '036250', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Scrap', 'Breakdown', 1),
(23, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0074', '74', 'H074', 'FH16 550 | V.2', 'A682329', 'SWEDEN', 'VOLVO', 'D16C4*A', '39827', '035749', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Stand By', 'Karantina2', 1),
(24, '2020-03-20 15:22:13', '2020-05-28 09:28:01', NULL, '2020-03-20', 'HT140-0075', '75', 'H075', 'FH16 550 | V.2', 'A682347', 'SWEDEN', 'VOLVO', 'D16C4*A', '39827', '035780', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Scrap', 'Breakdown', 1),
(25, '2020-03-20 15:22:13', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0076', '76', 'H076', 'FH16 550 | V.2', 'A683696', 'SWEDEN', 'VOLVO', 'D16C4', '39845', '036251', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Stand By', 'Karantina1', 1),
(26, '2020-03-20 15:22:13', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0092A', '92', 'H092', 'FH16 550 | V.2', 'A690174', 'SWEDEN', 'VOLVO', 'D16C4*A', '40125', '039601', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(27, '2020-03-20 15:22:13', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0093A', '93', 'H093', 'FH16 550 | V.2', 'A690554', 'SWEDEN', 'VOLVO', 'D16C4*A', '40125', '039903', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(28, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0094A', '94', 'H094', 'FH16 550 | V.2', 'A692829', 'SWEDEN', 'VOLVO', 'D16C4*A', '40213', '041675', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(29, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0095A', '95', 'H095', 'FH16 550 | V.2', 'A692857', 'SWEDEN', 'VOLVO', 'D16C4*A', '40213', '041705', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(30, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0096A', '96', 'H096', 'FH16 550 | V.2', 'A692870', 'SWEDEN', 'VOLVO', 'D16C4*A', '40213', '041706', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(31, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0097A', '97', 'H097', 'FH16 550 | V.2', 'A692890', 'SWEDEN', 'VOLVO', 'D16C4*A', '40213', '041729', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(32, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0098A', '98', 'H098', 'FH16 550 | V.2', 'A692892', 'SWEDEN', 'VOLVO', 'D16C4*A', '40213', '041730', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(33, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0099A', '99', 'H099', 'FH16 550 | V.2', 'A692893', 'SWEDEN', 'VOLVO', 'D16C4*A', '40213', '041731', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Karantina1', 1),
(34, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0100A', '100', 'H100', 'FH16 550 | V.2', 'A693144', 'SWEDEN', 'VOLVO', 'D16C4*A', '40213', '041913', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(35, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0101A', '101', 'H101', 'FH16 550 | V.2', 'A693173', 'SWEDEN', 'VOLVO', 'D16C4*A', '40213', '041939', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(36, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0102A', '102', 'H102', 'FH16 550 | V.2', 'A693175', 'SWEDEN', 'VOLVO', 'D16C4*A', '40213', '041917', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(37, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0103A', '103', 'H103', 'FH16 550 | V.2', 'A693177', 'SWEDEN', 'VOLVO', 'D16C4*A', '40213', '041932', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(38, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0104', '104', 'H104', 'FH16 550 | V.2', 'A698993', 'SWEDEN', 'VOLVO', 'D16C4*A', '40554', '046013', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina1', 1),
(39, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0105', '105', 'H105', 'FH16 550 | V.2', 'A699016', 'SWEDEN', 'VOLVO', 'D16C4*A', '40554', '046052', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(40, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0106', '106', 'H106', 'FH16 550 | V.2', 'A699791', 'SWEDEN', 'VOLVO', 'D16C4*A', '40554', '046687', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina1', 1),
(41, '2020-03-20 15:22:14', '2020-05-28 09:28:02', NULL, '2020-03-20', 'HT140-0107', '107', 'H107', 'FH16 550 | V.2', 'A699159', 'SWEDEN', 'VOLVO', 'D16C4*A', '40554', '046177', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(42, '2020-03-20 15:22:14', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0108', '108', 'H108', 'FH16 550 | V.2', 'A699187', 'SWEDEN', 'VOLVO', 'D16C4*A', '40554', '046178', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Jockey', 'Ready', 1),
(43, '2020-03-20 15:22:14', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0109', '109', 'H109', 'FH16 550 | V.2', 'A699197', 'SWEDEN', 'VOLVO', 'D16C4*A', '40554', '046179', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina1', 1),
(44, '2020-03-20 15:22:14', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0110', '110', 'H110', 'FH16 550 | V.2', 'A699381', 'SWEDEN', 'VOLVO', 'D16C4*A', '40554', '046197', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Jockey', 'Ready', 1),
(45, '2020-03-20 15:22:14', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0111', '111', 'H111', 'FH16 550 | V.2', 'A699382', 'SWEDEN', 'VOLVO', 'D16C4*A', '40554', '046198', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(46, '2020-03-20 15:22:14', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0112', '112', 'H112', 'FH16 550 | V.2', 'A702222', 'SWEDEN', 'VOLVO', 'D16C4*A', '40599', '048413', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(47, '2020-03-20 15:22:14', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0113', '113', 'H113', 'FH16 550 | V.2', 'A702551', 'SWEDEN', 'VOLVO', 'D16C4*A', '40599', '048511', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(48, '2020-03-20 15:22:14', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0114', '114', 'H114', 'FH16 550 | V.2', 'A702559', 'SWEDEN', 'VOLVO', 'D16C4*A', '40599', '048512', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(49, '2020-03-20 15:22:15', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0115', '115', 'H115', 'FH16 550 | V.2', 'A702562', 'SWEDEN', 'VOLVO', 'D16C4*A', '40599', '048514', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(50, '2020-03-20 15:22:15', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0116', '116', 'H116', 'FH16 550 | V.2', 'A702568', 'SWEDEN', 'VOLVO', 'D16C4*A', '40599', '048515', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Jockey', 'Ready', 1),
(51, '2020-03-20 15:22:15', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0117', '117', 'H117', 'FH16 550 | V.2', 'A705052', 'SWEDEN', 'VOLVO', 'D16C4*A', '40619', '049811', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(52, '2020-03-20 15:22:15', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0118', '118', 'H118', 'FH16 550 | V.2', 'A705060', 'SWEDEN', 'VOLVO', 'D16C4*A', '40619', '049816', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(53, '2020-03-20 15:22:15', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0119', '119', 'H119', 'FH16 550 | V.2', 'A705065', 'SWEDEN', 'VOLVO', 'D16C4*A', '40619', '049817', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Low Boy', 'Ready', 1),
(54, '2020-03-20 15:22:15', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0121', '121', 'H121', 'FH16 550 | V.2', 'A705076', 'SWEDEN', 'VOLVO', 'D16C4*A', '40619', '049828', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(55, '2020-03-20 15:22:15', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0122', '122', 'H122', 'FH16 550 | V.2', 'A705086', 'SWEDEN', 'VOLVO', 'D16C4*A', '40619', '049825', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(56, '2020-03-20 15:22:15', '2020-05-28 09:28:03', NULL, '2020-03-20', 'HT140-0123', '123', 'H123', 'FH16 550 | V.2', 'A706943', 'SWEDEN', 'VOLVO', 'D16C4*A', '40659', '050653', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(57, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0124', '124', 'H124', 'FH16 550 | V.2', 'A706949', 'SWEDEN', 'VOLVO', 'D16C4*A', '40659', '050663', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(58, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0125', '125', 'H125', 'FH16 550 | V.2', 'A706953', 'SWEDEN', 'VOLVO', 'D16C4*A', '40659', '050664', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'WT', 'Ready', 1),
(59, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0126', '126', 'H126', 'FH16 550 | V.2', 'A706961', 'SWEDEN', 'VOLVO', 'D16C4*A', '40659', '050667', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(60, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0128', '128', 'H128', 'FH16 550 | V.2', 'A706968', 'SWEDEN', 'VOLVO', 'D16C4*A', '40659', '050718', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(61, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0130', '130', 'H130', 'FH16 550 | V.2', 'A708306', 'SWEDEN', 'VOLVO', 'D16C4*A', '40673', '051340', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(62, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0131', '131', 'H131', 'FH16 550 | V.2', 'A708308', 'SWEDEN', 'VOLVO', 'D16C4*A', '40680', '051341', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(63, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0132', '132', 'H132', 'FH16 550 | V.2', 'A708311', 'SWEDEN', 'VOLVO', 'D16C4*A', '40681', '151343', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Jockey', 'Ready', 1),
(64, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0133', '133', 'H133', 'FH16 550 | V.2', 'A708313', 'SWEDEN', 'VOLVO', 'D16C4*A', '40681', '051354', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(65, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0134', '134', 'H134', 'FH16 550 | V.2', 'A708314', 'SWEDEN', 'VOLVO', 'D16C4*A', '40682', '051384', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Jockey', 'Ready', 1),
(66, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0135', '135', 'H135', 'FH16 550 | V.2', 'A708321', 'SWEDEN', 'VOLVO', 'D16C4*A', '40682', '051385', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(67, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0136', '136', 'H136', 'FH16 550 | V.2', 'A706989', 'SWEDEN', 'VOLVO', 'D16C4*A', '40715', '050729', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Dispose', 1),
(68, '2020-03-20 15:22:15', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0137', '137', 'H137', 'FH16 550 | V.2', 'A708328', 'SWEDEN', 'VOLVO', 'D16C4*A', '40715', '051386', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(69, '2020-03-20 15:22:16', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0138', '138', 'H138', 'FH16 550 | V.2', 'A709383', 'SWEDEN', 'VOLVO', 'D16C4*A', '40715', '051920', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Jockey', 'Ready', 1),
(70, '2020-03-20 15:22:16', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0139', '139', 'H139', 'FH16 550 | V.2', 'A709392', 'SWEDEN', 'VOLVO', 'D16C4*A', '40715', '051931', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(71, '2020-03-20 15:22:16', '2020-05-28 09:28:04', NULL, '2020-03-20', 'HT140-0140', '140', 'H140', 'FH16 550 | V.2', 'A709651', 'SWEDEN', 'VOLVO', 'D16C4*A', '40715', '052044', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'WT', 'Ready', 1),
(72, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0141', '141', 'H141', 'FH16 550 | V.2', 'A709653', 'SWEDEN', 'VOLVO', 'D16C4*A', '40715', '052068', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Low Boy', 'Ready', 1),
(73, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0142', '142', 'H142', 'FH16 550 | V.2', 'A714168', 'SWEDEN', 'VOLVO', 'D16C4*A', '40798', '054237', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'SIS', 'Jockey', 'Ready', 1),
(74, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0143', '143', 'H143', 'FH16 550 | V.2', 'A714170', 'SWEDEN', 'VOLVO', 'D16C4*A', '40798', '054328', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(75, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0144', '144', 'H144', 'FH16 550 | V.2', 'A714182', 'SWEDEN', 'VOLVO', 'D16C4*A', '40798', '054274', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(76, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0145', '145', 'H145', 'FH16 550 | V.2', 'A714183', 'SWEDEN', 'VOLVO', 'D16C4*A', '40798', '054275', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(77, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0146', '146', 'H146', 'FH16 550 | V.2', 'A714192', 'SWEDEN', 'VOLVO', 'D16C4*A', '40798', '054277', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina1', 1),
(78, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0147', '147', 'H147', 'FH16 550 | V.2', 'A714278', 'SWEDEN', 'VOLVO', 'D16C4*A', '40798', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina1', 1),
(79, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0148', '148', 'H148', 'FH16 550 | V.2', 'A722721', 'SWEDEN', 'VOLVO', 'D16C4*A', '40925', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(80, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0149', '149', 'H149', 'FH16 550 | V.2', 'A722763', 'SWEDEN', 'VOLVO', 'D16C4*A', '40925', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina1', 1),
(81, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0150', '150', 'H150', 'FH16 550 | V.2', 'A722764', 'SWEDEN', 'VOLVO', 'D16C4*A', '40925', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(82, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0151', '151', 'H151', 'FH16 550 | V.2', 'A722767', 'SWEDEN', 'VOLVO', 'D16C4*A', '40925', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina1', 1),
(83, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0152', '152', 'H152', 'FH16 550 | V.2', 'A722769', 'SWEDEN', 'VOLVO', 'D16C4*A', '40925', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(84, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0153', '153', 'H153', 'FH16 550 | V.2', 'A722866', 'SWEDEN', 'VOLVO', 'D16C4*A', '40925', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina1', 1),
(85, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0155', '155', 'H155', 'FH16 550 | V.2', 'A722868', 'SWEDEN', 'VOLVO', 'D16C4*A', '40925', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(86, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0156', '156', 'H156', 'FH16 550 | V.2', 'A722536', 'SWEDEN', 'VOLVO', 'D16C4*A', '40925', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(87, '2020-03-20 15:22:16', '2020-05-28 09:28:05', NULL, '2020-03-20', 'HT140-0157', '157', 'H157', 'FH16 550 | V.2', 'A722545', 'SWEDEN', 'VOLVO', 'D16C4*A', '40925', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Accident', 1),
(88, '2020-03-20 15:22:16', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0158', '158', 'H158', 'FH16 550 | V.2', 'A722742', 'SWEDEN', 'VOLVO', 'D16C4*A', '40950', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(89, '2020-03-20 15:22:16', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0159', '159', 'H159', 'FH16 550 | V.2', 'A722743', 'SWEDEN', 'VOLVO', 'D16C4*A', '40950', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(90, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0160', '160', 'H160', 'FH16 550 | V.2', 'A722765', 'SWEDEN', 'VOLVO', 'D16C4*A', '40950', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(91, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0161', '161', 'H161', 'FH16 550 | V.2', 'A722766', 'SWEDEN', 'VOLVO', 'D16C4*A', '40950', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(92, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0162', '162', 'H162', 'FH16 550 | V.2', 'A722768', 'SWEDEN', 'VOLVO', 'D16C4*A', '40950', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(93, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0163', '163', 'H163', 'FH16 550 | V.2', 'A722861', 'SWEDEN', 'VOLVO', 'D16C4*A', '40950', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(94, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0165', '165', 'H165', 'FH16 550 | V.2', 'A722863', 'SWEDEN', 'VOLVO', 'D16C4*A', '40950', '054336', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(95, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0166', '166', 'H166', 'FH16 550 | V.2', 'A723688', 'SWEDEN', 'VOLVO', 'D16C4*A', '40999', '058959', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(96, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0167', '167', 'H167', 'FH16 550 | V.2', 'A723712', 'SWEDEN', 'VOLVO', 'D16C4*A', '40999', '058968', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(97, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0168', '168', 'H168', 'FH16 550 | V.2', 'A723719', 'SWEDEN', 'VOLVO', 'D16C4*A', '40999', '058969', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(98, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0169', '169', 'H169', 'FH16 550 | V.2', 'A723839', 'SWEDEN', 'VOLVO', 'D16C4*A', '40999', '059057', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(99, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0170', '170', 'H170', 'FH16 550 | V.2', 'A724233', 'SWEDEN', 'VOLVO', 'D16C4*A', '40999', '059190', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(100, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0171', '171', 'H171', 'FH16 550 | V.2', 'A724249', 'SWEDEN', 'VOLVO', 'D16C4*A', '40999', '059193', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(101, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0172', '172', 'H172', 'FH16 550 | V.2', 'A722671', 'SWEDEN', 'VOLVO', 'D16C4*A', '41024', '058660', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(102, '2020-03-20 15:22:17', '2020-05-28 09:28:06', NULL, '2020-03-20', 'HT140-0173', '173', 'H173', 'FH16 550 | V.2', 'A722623', 'SWEDEN', 'VOLVO', 'D16C4*A', '41024', '058650', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(103, '2020-03-20 15:22:17', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0174', '174', 'H174', 'FH16 550 | V.2', 'A722647', 'SWEDEN', 'VOLVO', 'D16C4*A', '41024', '058656', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina3', 1),
(104, '2020-03-20 15:22:17', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0175', '175', 'H175', 'FH16 550 | V.2', 'A723808', 'SWEDEN', 'VOLVO', 'D16C4*A', '41024', '058994', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(105, '2020-03-20 15:22:17', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0176', '176', 'H176', 'FH16 550 | V.2', 'A723898', 'SWEDEN', 'VOLVO', 'D16C4*A', '41024', '059059', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(106, '2020-03-20 15:22:17', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0177', '177', 'H177', 'FH16 550 | V.2', 'A724158', 'SWEDEN', 'VOLVO', 'D16C4*A', '41024', '059139', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(107, '2020-03-20 15:22:17', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0178', '178', 'H178', 'FH16 550 | V.2', 'A723701', 'SWEDEN', 'VOLVO', 'D16C4*A', '41087', '058962', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(108, '2020-03-20 15:22:17', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0179', '179', 'H179', 'FH16 550 | V.2', 'A725217', 'SWEDEN', 'VOLVO', 'D16C4*A', '41087', '059341', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(109, '2020-03-20 15:22:17', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0180', '180', 'H180', 'FH16 550 | V.2', 'A725518', 'SWEDEN', 'VOLVO', 'D16C4*A', '41087', '059352', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(110, '2020-03-20 15:22:17', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0181', '181', 'H181', 'FH16 550 | V.2', 'A725265', 'SWEDEN', 'VOLVO', 'D16C4*A', '41087', '059387', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(111, '2020-03-20 15:22:18', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0182', '182', 'H182', 'FH16 550 | V.2', 'A725490', 'SWEDEN', 'VOLVO', 'D16C4*A', '41087', '059436', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(112, '2020-03-20 15:22:18', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0183', '183', 'H183', 'FH16 550 | V.2', 'A725514', 'SWEDEN', 'VOLVO', 'D16C4*A', '41087', '059453', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(113, '2020-03-20 15:22:18', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0184', '184', 'H184', 'FH16 550 | V.2', 'A726450', 'SWEDEN', 'VOLVO', 'D16C4*A', '41133', '060337', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(114, '2020-03-20 15:22:18', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0185', '185', 'H185', 'FH16 550 | V.2', 'A726557', 'SWEDEN', 'VOLVO', 'D16C4*A', '41133', '059853', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(115, '2020-03-20 15:22:18', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0186', '186', 'H186', 'FH16 550 | V.2', 'A727548', 'SWEDEN', 'VOLVO', 'D16C4*A', '41133', '060262', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(116, '2020-03-20 15:22:18', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0187', '187', 'H187', 'FH16 550 | V.2', 'A727721', 'SWEDEN', 'VOLVO', 'D16C4*A', '41133', '059805', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(117, '2020-03-20 15:22:18', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0188', '188', 'H188', 'FH16 550 | V.2', 'A727863', 'SWEDEN', 'VOLVO', 'D16C4*A', '41133', '060397', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(118, '2020-03-20 15:22:18', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0189', '189', 'H189', 'FH16 550 | V.2', 'A728266', 'SWEDEN', 'VOLVO', 'D16C4*A', '41133', '060611', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(119, '2020-03-20 15:22:18', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0190', '190', 'H190', 'FH16 550 | V.2', 'A728242', 'SWEDEN', 'VOLVO', 'D16C4*A', '41174', '060608', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(120, '2020-03-20 15:22:18', '2020-05-28 09:28:07', NULL, '2020-03-20', 'HT140-0191', '191', 'H191', 'FH16 550 | V.2', 'A728652', 'SWEDEN', 'VOLVO', 'D16C4*A', '41174', '060792', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(121, '2020-03-20 15:22:18', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0192', '192', 'H192', 'FH16 550 | V.2', 'A728377', 'SWEDEN', 'VOLVO', 'D16C4*A', '41174', '060644', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(122, '2020-03-20 15:22:18', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0193', '193', 'H193', 'FH16 550 | V.2', 'A728651', 'SWEDEN', 'VOLVO', 'D16C4*A', '41174', '060791', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(123, '2020-03-20 15:22:18', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0194', '194', 'H194', 'FH16 550 | V.2', 'A726575', 'SWEDEN', 'VOLVO', 'D16C4*A', '41174', '059866', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(124, '2020-03-20 15:22:18', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0195', '195', 'H195', 'FH16 550 | V.2', 'A728477', 'SWEDEN', 'VOLVO', 'D16C4*A', '41174', '060695', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(125, '2020-03-20 15:22:18', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0196', '196', 'H196', 'FH16 550 | V.2', 'A733931', 'SWEDEN', 'VOLVO', 'D16C4*A', '41232', '064411', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(126, '2020-03-20 15:22:18', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0197', '197', 'H197', 'FH16 550 | V.2', 'A733836', 'SWEDEN', 'VOLVO', 'D16C4*A', '41232', '064271', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(127, '2020-03-20 15:22:18', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0198', '198', 'H198', 'FH16 550 | V.2', 'A733884', 'SWEDEN', 'VOLVO', 'D16C4*A', '41232', '064341', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(128, '2020-03-20 15:22:18', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0199', '199', 'H199', 'FH16 550 | V.2', 'A733863', 'SWEDEN', 'VOLVO', 'D16C4*A', '41232', '064342', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(129, '2020-03-20 15:22:18', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0200', '200', 'H200', 'FH16 550 | V.2', 'A733864', 'SWEDEN', 'VOLVO', 'D16C4*A', '41278', '064345', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(130, '2020-03-20 15:22:18', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0201', '201', 'H201', 'FH16 550 | V.2', 'A733905', 'SWEDEN', 'VOLVO', 'D16C4*A', '41278', '064392', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(131, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0202', '202', 'H202', 'FH16 550 | V.2', 'A733930', 'SWEDEN', 'VOLVO', 'D16C4*A', '41278', '064410', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(132, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0203', '203', 'H203', 'FH16 550 | V.2', 'A733837', 'SWEDEN', 'VOLVO', 'D16C4*A', '41278', '064272', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(133, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0204', '204', 'H204', 'FH16 550 | V.2', 'A739554', 'SWEDEN', 'VOLVO', 'D16C4*A', '41424', '067083', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(134, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0205', '205', 'H205', 'FH16 550 | V.2', 'A722862', 'SWEDEN', 'VOLVO', 'D16C4*A', '40950', '058727', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(135, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0206', '206', 'H206', 'FH16 550 | V.2', 'A739525', 'SWEDEN', 'VOLVO', 'D16C4*A', '41424', '067076', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Scrap', 'Breakdown', 1),
(136, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0207', '207', 'H207', 'FH16 550 | V.2', 'A739526', 'SWEDEN', 'VOLVO', 'D16C4*A', '41424', '067081', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(137, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0208', '208', 'H208', 'FH16 550 | V.2', 'A739555', 'SWEDEN', 'VOLVO', 'D16C4*A', '41424', '067091', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(138, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0209', '209', 'H209', 'FH16 550 | V.2', 'A728680', 'SWEDEN', 'VOLVO', 'D16C4*A', '41465', '060794', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(139, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0210', '210', 'H210', 'FH16 550 | V.2', 'A740919', 'SWEDEN', 'VOLVO', 'D16C4*A', '41465', '067538', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Scrap', 'Breakdown', 1),
(140, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0211', '211', 'H211', 'FH16 550 | V.2', 'A740920', 'SWEDEN', 'VOLVO', 'D16C4*A', '41465', '067569', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(141, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0212', '212', 'H212', 'FH16 550 | V.2', 'A746689', 'SWEDEN', 'VOLVO', 'D16C4*A', '41510', '071030', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(142, '2020-03-20 15:22:19', '2020-05-28 09:28:08', NULL, '2020-03-20', 'HT140-0213', '213', 'H213', 'FH16 550 | V.2', 'A746640', 'SWEDEN', 'VOLVO', 'D16C4*A', '41510', '071031', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(143, '2020-03-20 15:22:19', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0214', '214', 'H214', 'FH16 550 | V.2', 'A746684', 'SWEDEN', 'VOLVO', 'D16C4*A', '41510', '071060', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(144, '2020-03-20 15:22:19', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0215', '215', 'H215', 'FH16 550 | V.2', 'A746666', 'SWEDEN', 'VOLVO', 'D16C4*A', '41510', '071040', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(145, '2020-03-20 15:22:19', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0216', '216', 'H216', 'FH16 550 | V.2', 'A746667', 'SWEDEN', 'VOLVO', 'D16C4*A', '41510', '071041', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(146, '2020-03-20 15:22:19', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0217', '217', 'H217', 'FH16 550 | V.2', 'A750934', 'SWEDEN', 'VOLVO', 'D16C4*A', '41588', '073746', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Move Out', 'Move Out', 1),
(147, '2020-03-20 15:22:19', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0218', '218', 'H218', 'FH16 550 | V.2', 'A750986', 'SWEDEN', 'VOLVO', 'D16C4*A', '41588', '073749', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(148, '2020-03-20 15:22:19', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0219', '219', 'H219', 'FH16 550 | V.2', 'A751011', 'SWEDEN', 'VOLVO', 'D16C4*A', '41588', '073772', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(149, '2020-03-20 15:22:19', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0220', '220', 'H220', 'FH16 550 | V.2', 'A751096', 'SWEDEN', 'VOLVO', 'D16C4*A', '41588', '073778', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(150, '2020-03-20 15:22:19', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0221', '221', 'H221', 'FH16 550 | V.2', 'A751097', 'SWEDEN', 'VOLVO', 'D16C4*A', '41588', '073774', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(151, '2020-03-20 15:22:19', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0222', '222', 'H222', 'FH16 550 | V.2', 'A751360', 'SWEDEN', 'VOLVO', 'D16C4*A', '41588', '073886', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(152, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0223', '223', 'H223', 'FH16 550 | V.2', 'A751387', 'SWEDEN', 'VOLVO', 'D16C4*A', '41588', '073885', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(153, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0224', '224', 'H224', 'FH16 550 | V.2', 'A751409', 'SWEDEN', 'VOLVO', 'D16C4*A', '41588', '073902', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(154, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0225', '225', 'H225', 'FH16 550 | V.2', 'A762422', 'SWEDEN', 'VOLVO', 'D16C4*A', '41792', '077856', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(155, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0226', '226', 'H226', 'FH16 550 | V.2', 'A762470', 'SWEDEN', 'VOLVO', 'D16C4*A', '41792', '077863', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(156, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0227', '227', 'H227', 'FH16 550 | V.2', 'A762548', 'SWEDEN', 'VOLVO', 'D16C4*A', '41792', '077887', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(157, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0228', '228', 'H228', 'FH16 550 | V.2', 'A762549', 'SWEDEN', 'VOLVO', 'D16C4*A', '41792', '077893', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(158, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0229', '229', 'H229', 'FH16 550 | V.2', 'A762571', 'SWEDEN', 'VOLVO', 'D16C4*A', '41806', '077911', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(159, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0230', '230', 'H230', 'FH16 550 | V.2', 'A763217', 'SWEDEN', 'VOLVO', 'D16C4*A', '41806', '078057', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(160, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0231', '231', 'H231', 'FH16 550 | V.2', 'A763218', 'SWEDEN', 'VOLVO', 'D16C4*A', '41806', '078064', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(161, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0232', '232', 'H232', 'FH16 550 | V.2', 'A763243', 'SWEDEN', 'VOLVO', 'D16C4*A', '41806', '078070', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(162, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0233', '233', 'H233', 'FH16 550 | V.2', 'A763244', 'SWEDEN', 'VOLVO', 'D16C4*A', '41806', '078103', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(163, '2020-03-20 15:22:20', '2020-05-28 09:28:09', NULL, '2020-03-20', 'HT140-0234', '234', 'H234', 'FH16 550 | V.2', 'A763266', 'SWEDEN', 'VOLVO', 'D16C4*A', '41806', '078109', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Produksi', 'Ready', 1),
(164, '2020-03-20 15:22:20', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0235S', '235', 'H235', 'FH16 550 | V.4', 'A769875', 'SWEDEN', 'VOLVO', 'D16C5*A', '41976', '081687', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina Smada', 1),
(165, '2020-03-20 15:22:20', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0236S', '236', 'H236', 'FH16 550 | V.4', 'A769895', 'SWEDEN', 'VOLVO', 'D16C5*A', '41976', '081689', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina Smada', 1),
(166, '2020-03-20 15:22:20', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0237S', '237', 'H237', 'FH16 550 | V.4', 'A769975', 'SWEDEN', 'VOLVO', 'D16C5*A', '41976', '081743', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina Smada', 1),
(167, '2020-03-20 15:22:20', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0238S', '238', 'H238', 'FH16 550 | V.4', 'A769976', 'SWEDEN', 'VOLVO', 'D16C5*A', '41976', '081744', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina Smada', 1),
(168, '2020-03-20 15:22:20', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0239S', '239', 'H239', 'FH16 550 | V.4', 'A769949', 'SWEDEN', 'VOLVO', 'D16C5*A', '41976', '081704', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina Smada', 1),
(169, '2020-03-20 15:22:20', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0240S', '240', 'H240', 'FH16 550 | V.4', 'A770002', 'SWEDEN', 'VOLVO', 'D16C5*A', '41976', '081745', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'SIS', 'Dispose', 'Karantina Smada', 1),
(170, '2020-03-20 15:22:20', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0241', '241', 'H241', 'FH16 550 | V.2', 'A693183', 'SWEDEN', 'VOLVO', 'D16C4*A', '42559', '041948', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina1', 1),
(171, '2020-03-20 15:22:20', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0242', '242', 'H242', 'FH16 550 | V.2', 'A695802', 'SWEDEN', 'VOLVO', 'D16C4*A', '42560', '043635', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina1', 1),
(172, '2020-03-20 15:22:20', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0243', '243', 'H243', 'FH16 550 | V.2', 'A696563', 'SWEDEN', 'VOLVO', 'D16C4*A', '42561', '044087', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina1', 1),
(173, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0244', '244', 'H244', 'FH16 550 | V.2', 'A714202', 'SWEDEN', 'VOLVO', 'D16C4*A', '42562', '054287', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(174, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0245', '245', 'H245', 'FH16 550 | V.2', 'A722865', 'SWEDEN', 'VOLVO', 'D16C5*A', '42563', '058738', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Karantina4', 1),
(175, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0246', '246', 'H246', 'FH16 550 | V.2', 'A723794', 'SWEDEN', 'VOLVO', 'D16C5*A', '42564', '058987', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Scrap', 'Breakdown', 1),
(176, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0247', '247', 'H247', 'FH16 550 | V.2', 'A724255', 'SWEDEN', 'VOLVO', 'D16C5*A', '42565', '059194', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(177, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0248', '248', 'H248', 'FH16 550 | V.2', 'A722648', 'SWEDEN', 'VOLVO', 'D16C5*A', '42566', '058657', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(178, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0249', '249', 'H249', 'FH16 550 | V.2', 'A726467', 'SWEDEN', 'VOLVO', 'D16C5*A', '42567', '059828', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(179, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0250', '250', 'H250', 'FH16 550 | V.2', 'A727722', 'SWEDEN', 'VOLVO', 'D16C5*A', '42568', '060338', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(180, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0251', '251', 'H251', 'FH16 550 | V.2', 'A682921', 'SWEDEN', 'VOLVO', 'D16C5*A', '42568', '', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Move Out', 'Move Out', 1),
(181, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0252', '252', 'H252', 'FH16 550 | V.2', 'A689180', 'SWEDEN', 'VOLVO', 'D16C5*A', '42569', '38636', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina1', 1),
(182, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0253', '253', 'H253', 'FH16 550 | V.2', 'A689189', 'SWEDEN', 'VOLVO', 'D16C5*A', '42569', '', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina1', 1),
(183, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0254', '254', 'H254', 'FH16 550 | V.2', 'A689634', 'SWEDEN', 'VOLVO', 'D16C5*A', '42570', '39003', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Dispose', 1),
(184, '2020-03-20 15:22:21', '2020-05-28 09:28:10', NULL, '2020-03-20', 'HT140-0255', '255', 'H255', 'FH16 550 | V.2', 'A692202', 'SWEDEN', 'VOLVO', 'D16C5*A', '42571', '41258', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina1', 1),
(185, '2020-03-20 15:22:21', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0256', '256', 'H256', 'FH16 550 | V.2', 'A692921', 'SWEDEN', 'VOLVO', 'D16C5*A', '42572', '041732', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina3', 1),
(186, '2020-03-20 15:22:21', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0257', '257', 'H257', 'FH16 550 | V.2', 'A699791', 'SWEDEN', 'VOLVO', 'D16C5*A', '42573', '046687', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(187, '2020-03-20 15:22:21', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0258', '258', 'H258', 'FH16 550 | V.2', 'A693178', 'SWEDEN', 'VOLVO', 'D16C5*A', '42574', '041915', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(188, '2020-03-20 15:22:21', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0259', '259', 'H259', 'FH16 550 | V.2', 'A692925', 'SWEDEN', 'VOLVO', 'D16C5*A', '42575', '041742', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina3', 1),
(189, '2020-03-20 15:22:21', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0260', '260', 'H260', 'FH16 550 | V.2', 'A692933', 'SWEDEN', 'VOLVO', 'D16C5*A', '42576', '041743', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(190, '2020-03-20 15:22:21', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0261', '261', 'H261', 'FH16 550 | V.2', 'A695771', 'SWEDEN', 'VOLVO', 'D16C5*A', '42577', '043627', '550 HP', 'PRIMEMOVER', '100 TON', 'Support', 'X-RA', 'Low Boy', 'Ready', 1),
(191, '2020-03-20 15:22:21', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0262', '262', 'H262', 'FH16 550 | V.2', 'A695782', 'SWEDEN', 'VOLVO', 'D16C5*A', '42578', '043628', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina3', 1),
(192, '2020-03-20 15:22:22', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0263', '263', 'H263', 'FH16 550 | V.2', 'A696751', 'SWEDEN', 'VOLVO', 'D16C5*A', '42579', '044313', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1);
INSERT INTO `table_equipment` (`id`, `created_at`, `updated_at`, `deleted_at`, `date`, `set_trailler`, `unit_id`, `no_unit`, `model`, `chassis_number`, `brand_state`, `product`, `engine_model`, `delivery`, `engine_number`, `kw_hp_rpm`, `type`, `capacity`, `doc_ellipse`, `owner_unit`, `status_unit`, `status_to_use`, `by_user`) VALUES
(193, '2020-03-20 15:22:22', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0264', '264', 'H264', 'FH16 550 | V.2', 'A699158', 'SWEDEN', 'VOLVO', 'D16C5*A', '42579', '046099', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(194, '2020-03-20 15:22:22', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0265', '265', 'H265', 'FH16 550 | V.2', 'A706497', 'SWEDEN', 'VOLVO', 'D16C5*A', '42579', '', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(195, '2020-03-20 15:22:22', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0266', '266', 'H266', 'FH16 550 | V.2', 'A722864', 'SWEDEN', 'VOLVO', 'D16C5*A', '42580', '058737', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina3', 1),
(196, '2020-03-20 15:22:22', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0267', '267', 'H267', 'FH16 550 | V.2', 'A723852', 'SWEDEN', 'VOLVO', 'D16C5*A', '42581', '059058', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(197, '2020-03-20 15:22:22', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0268', '268', 'H268', 'FH16 550 | V.2', 'A722624', 'SWEDEN', 'VOLVO', 'D16C5*A', '42582', '058651', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(198, '2020-03-20 15:22:22', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0269', '269', 'H269', 'FH16 550 | V.2', 'A726468', 'SWEDEN', 'VOLVO', 'D16C5*A', '42583', '058966', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(199, '2020-03-20 15:22:22', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0270', '270', 'H270', 'FH16 550 | V.2', 'A723782', 'SWEDEN', 'VOLVO', 'D16C5*A', '42584', '058981', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(200, '2020-03-20 15:22:22', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0271', '271', 'H271', 'FH16 550 | V.2', 'A723791', 'SWEDEN', 'VOLVO', 'D16C5*A', '42585', '058986', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Accident', 1),
(201, '2020-03-20 15:22:22', '2020-05-28 09:28:11', NULL, '2020-03-20', 'HT140-0272', '272', 'H272', 'FH16 550 | V.2', 'A723707', 'SWEDEN', 'VOLVO', 'D16C5*A', '42586', '059829', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Scrap', 'Breakdown', 1),
(202, '2020-03-20 15:22:22', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0273', '273', 'H273', 'FH16 550 | V.2', 'A726556', 'SWEDEN', 'VOLVO', 'D16C5*A', '42586', '', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(203, '2020-03-20 15:22:22', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0274', '274', 'H274', 'FH16 550 | V.2', 'A725241', 'SWEDEN', 'VOLVO', 'D16C5*A', '42587', '059369', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(204, '2020-03-20 15:22:22', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0275', '275', 'H275', 'FH16 550 | V.2', 'A726351', 'SWEDEN', 'VOLVO', 'D16C5*A', '42588', '059804', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(205, '2020-03-20 15:22:22', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0276', '276', 'H276', 'FH16 550 | V.2', 'A726486', 'SWEDEN', 'VOLVO', 'D16C5*A', '42589', '059832', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(206, '2020-03-20 15:22:22', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0277', '277', 'H277', 'FH16 550 | V.2', 'A693752', 'SWEDEN', 'VOLVO', 'D16C5*A', '42590', '41706', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Dispose', 'Karantina1', 1),
(207, '2020-03-20 15:22:22', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0278', '278', 'H278', 'FH16 550 | V.2', 'A714298', 'SWEDEN', 'VOLVO', 'D16C5*A', '42591', '054362', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(208, '2020-03-20 15:22:22', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0279', '279', 'H279', 'FH16 550 | V.4', 'B710344', 'SWEDEN', 'VOLVO', 'D16C5*A', '42592', '082534', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(209, '2020-03-20 15:22:22', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0280', '280', 'H280', 'FH16 550 | V.4', 'A770003', 'SWEDEN', 'VOLVO', 'D16C5*A', '42593', '081747', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(210, '2020-03-20 15:22:22', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0281', '281', 'H281', 'FH16 550 | V.4', 'A771241', 'SWEDEN', 'VOLVO', 'D16C5*A', '42594', '082695', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(211, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0282', '282', 'H282', 'FH16 550 | V.4', 'A771440', 'SWEDEN', 'VOLVO', 'D16C5*A', '42595', '082766', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(212, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0283', '283', 'H283', 'FH16 550 | V.4', 'A770047', 'SWEDEN', 'VOLVO', 'D16C5*A', '42595', '', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'X-RA', 'Produksi', 'Ready', 1),
(213, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0284', '284', 'H284', 'FH16 550 | V.4', 'B804783', 'SWEDEN', 'VOLVO', 'D16C5*A', '42850', '101743', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(214, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0285', '285', 'H285', 'FH16 550 | V.4', 'B804816', 'SWEDEN', 'VOLVO', 'D16C5*A', '42850', '101745', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(215, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0286', '286', 'H286', 'FH16 550 | V.4', 'B810897', 'SWEDEN', 'VOLVO', 'D16C5*A', '42850', '102754', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(216, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0287', '287', 'H287', 'FH16 550 | V.4', 'B810869', 'SWEDEN', 'VOLVO', 'D16C5*A', '42850', '102753', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(217, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0288', '288', 'H288', 'FH16 550 | V.4', 'B804897', 'SWEDEN', 'VOLVO', 'D16C5*A', '42850', '101758', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(218, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0289', '289', 'H289', 'FH16 550 | V.4', 'B811146', 'SWEDEN', 'VOLVO', 'D16C5*A', '42850', '102789', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(219, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0290', '290', 'H290', 'FH16 550 | V.4', 'B811481', 'SWEDEN', 'VOLVO', 'D16C5*A', '42850', '102851', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(220, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0291', '291', 'H291', 'FH16 550 | V.4', 'B811083', 'SWEDEN', 'VOLVO', 'D16C5*A', '42857', '102788', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(221, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0292', '292', 'H292', 'FH16 550 | V.4', 'B813614', 'SWEDEN', 'VOLVO', 'D16C5*A', '42857', '103220', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(222, '2020-03-20 15:22:23', '2020-05-28 09:28:12', NULL, '2020-03-20', 'HT140-0293', '293', 'H293', 'FH16 550 | V.4', 'B813759', 'SWEDEN', 'VOLVO', 'D16C5*A', '42857', '103224', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(223, '2020-03-20 15:22:23', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0294', '294', 'H294', 'FH16 550 | V.4', 'B814172', 'SWEDEN', 'VOLVO', 'D16C5*A', '42895', '103282', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(224, '2020-03-20 15:22:23', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0295', '295', 'H295', 'FH16 550 | V.4', 'B814658', 'SWEDEN', 'VOLVO', 'D16C5*A', '42895', '103383', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(225, '2020-03-20 15:22:23', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0296', '296', 'H296', 'FH16 550 | V.4', 'B814270', 'SWEDEN', 'VOLVO', 'D16C5*A', '42895', '103284', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(226, '2020-03-20 15:22:23', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0297', '297', 'H297', 'FH16 550 | V.4', 'B814045', 'SWEDEN', 'VOLVO', 'D16C5*A', '42895', '103281', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(227, '2020-03-20 15:22:23', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0298', '298', 'H298', 'FH16 550 | V.4', 'B814614', 'SWEDEN', 'VOLVO', 'D16C5*A', '42895', '103422', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(228, '2020-03-20 15:22:23', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0299', '299', 'H299', 'FH16 550 | V.4', 'B814544', 'SWEDEN', 'VOLVO', 'D16C5*A', '42895', '103413', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(229, '2020-03-20 15:22:23', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0300', '300', 'H300', 'FH16 550 | V.4', 'B821095', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '104620', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(230, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0301', '301', 'H301', 'FH16 550 | V.4', 'B821213', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '104949', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(231, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0302', '302', 'H302', 'FH16 550 | V.4', 'B821290', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '104906', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(232, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0303', '303', 'H303', 'FH16 550 | V.4', 'B821412', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '104863', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(233, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0304', '304', 'H304', 'FH16 550 | V.4', 'B821512', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '104855', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(234, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0305', '305', 'H305', 'FH16 550 | V.4', 'B821608', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '104039', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(235, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0306', '306', 'H306', 'FH16 550 | V.4', 'B821681', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '104699', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(236, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0307', '307', 'H307', 'FH16 550 | V.4', 'B821785', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '104674', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(237, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0308', '308', 'H308', 'FH16 550 | V.4', 'B821898', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '104672', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(238, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0309', '309', 'H309', 'FH16 550 | V.4', 'B821985', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '104630', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(239, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0310', '310', 'H310', 'FH16 550 | V.4', 'A812381', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '107232', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(240, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0311', '311', 'H311', 'FH16 550 | V.4', 'A812590', 'SWEDEN', 'VOLVO', 'D16C5*A', '43115', '107361', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(241, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0312', '312', 'H312', 'FH16 550 | V.4', 'A812910', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '107443', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(242, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0313', '313', 'H313', 'FH16 550 | V.4', 'A813310', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '107735', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(243, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0314', '314', 'H314', 'FH16 550 | V.4', 'A813314', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '107737', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(244, '2020-03-20 15:22:24', '2020-05-28 09:28:13', NULL, '2020-03-20', 'HT140-0315', '315', 'H315', 'FH16 550 | V.4', 'A813887', 'SWEDEN', 'VOLVO', 'D16C5*A', '43115', '108044', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(245, '2020-03-20 15:22:24', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0316', '316', 'H316', 'FH16 550 | V.4', 'A814087', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '108149', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(246, '2020-03-20 15:22:24', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0317', '317', 'H317', 'FH16 550 | V.4', 'A814194', 'SWEDEN', 'VOLVO', 'D16C5*A', '43073', '108151', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(247, '2020-03-20 15:22:24', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0318', '318', 'H318', 'FH16 550 | V.4', 'B835639', 'SWEDEN', 'VOLVO', 'D16C5*A', '43115', '107993', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(248, '2020-03-20 15:22:24', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0319', '319', 'H319', 'FH16 550 | V.4', 'B835824', 'SWEDEN', 'VOLVO', 'D16C5*A', '43115', '108068', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(249, '2020-03-20 15:22:24', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0320', '320', 'H320', 'FH16 550 | V.4', 'A812485', 'SWEDEN', 'VOLVO', 'D16C5*A', '43115', '107253', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(250, '2020-03-20 15:22:24', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0321', '321', 'H321', 'FH16 550 | V.4', 'A812489', 'SWEDEN', 'VOLVO', 'D16C5*A', '43108', '107254', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(251, '2020-03-20 15:22:24', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0322', '322', 'H322', 'FH16 550 | V.4', 'A812594', 'SWEDEN', 'VOLVO', 'D16C5*A', '43115', '107362', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(252, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0323', '323', 'H323', 'FH16 550 | V.4', 'A812998', 'SWEDEN', 'VOLVO', 'D16C5*A', '43115', '107483', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(253, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0324', '324', 'H324', 'FH16 550 | V.4', 'A813016', 'SWEDEN', 'VOLVO', 'D16C5*A', '43108', '107484', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(254, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0325', '325', 'H325', 'FH16 550 | V.4', 'A813982', 'SWEDEN', 'VOLVO', 'D16C5*A', '43108', '108067', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(255, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0326', '326', 'H326', 'FH16 550 | V.4', 'A813102', 'SWEDEN', 'VOLVO', 'D16C5*A', '43115', '107718', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(256, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0327', '327', 'H327', 'FH16 550 | V.4', 'A812915', 'SWEDEN', 'VOLVO', 'D16C5*A', '43108', '107444', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(257, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0328', '328', 'H328', 'FH16 550 | V.4', 'A813429', 'SWEDEN', 'VOLVO', 'D16C5*A', '43108', '107770', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(258, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0329', '329', 'H329', 'FH16 550 | V.4', 'A812994', 'SWEDEN', 'VOLVO', 'D16C5*A', '43108', '107478', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(259, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0330', '330', 'H330', 'FH16 550 | V.4', 'A813880', 'SWEDEN', 'VOLVO', 'D16C5*A', '43108', '108043', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(260, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0331', '331', 'H331', 'FH16 550 | V.4', 'A814096', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108150', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(261, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0332', '332', 'H332', 'FH16 550 | V.4', 'B836249', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108213', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(262, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0333', '333', 'H333', 'FH16 550 | V.4', 'A814198', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108152', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(263, '2020-03-20 15:22:25', '2020-05-28 09:28:14', NULL, '2020-03-20', 'HT140-0334', '334', 'H334', 'FH16 550 | V.4', 'B837027', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108328', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(264, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0335', '335', 'H335', 'FH16 550 | V.4', 'A814286', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108232', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(265, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0336', '336', 'H336', 'FH16 550 | V.4', 'A814282', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108231', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(266, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0337', '337', 'H337', 'FH16 550 | V.4', 'A814211', 'SWEDEN', 'VOLVO', 'D16C5*A', '43113', '108153', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(267, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0338', '338', 'H338', 'FH16 550 | V.4', 'A814391', 'SWEDEN', 'VOLVO', 'D16C5*A', '43114', '108253', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(268, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0339', '339', 'H339', 'FH16 550 | V.4', 'A815306', 'SWEDEN', 'VOLVO', 'D16C5*A', '43115', '108652', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(269, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0340', '340', 'H340', 'FH16 550 | V.4', 'B839960', 'SWEDEN', 'VOLVO', 'D16C5*A', '43112', '108802', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(270, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0341', '341', 'H341', 'FH16 550 | V.4', 'B837303', 'SWEDEN', 'VOLVO', 'D16C5*A', '43108', '108369', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(271, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0342', '342', 'H342', 'FH16 550 | V.4', 'B837463', 'SWEDEN', 'VOLVO', 'D16C5*A', '43109', '108396', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(272, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0343', '343', 'H343', 'FH16 550 | V.4', 'B837612', 'SWEDEN', 'VOLVO', 'D16C5*A', '43110', '108440', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(273, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0344', '344', 'H344', 'FH16 550 | V.4', 'B837767', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108481', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(274, '2020-03-20 15:22:25', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0345', '345', 'H345', 'FH16 550 | V.4', 'A814206', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108154', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(275, '2020-03-20 15:22:26', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0346', '346', 'H346', 'FH16 550 | V.4', 'A815340', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108653', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(276, '2020-03-20 15:22:26', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0347', '347', 'H347', 'FH16 550 | V.4', 'B839693', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108773', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(277, '2020-03-20 15:22:26', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0348', '348', 'H348', 'FH16 550 | V.4', 'B836415', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108215', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(278, '2020-03-20 15:22:26', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0349', '349', 'H349', 'FH16 550 | V.4', 'B835922', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108148', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(279, '2020-03-20 15:22:26', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0350', '350', 'H350', 'FH16 550 | V.4', 'B838114', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108549', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(280, '2020-03-20 15:22:26', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0351', '351', 'H351', 'FH16 550 | V.4', 'B840445', 'SWEDEN', 'VOLVO', 'D16C5*A', '43111', '108914', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(281, '2020-03-20 15:22:26', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0352', '352', 'H352', 'FH16 550 | V.4 I-Shift', 'A835627', 'SWEDEN', 'VOLVO', 'D16C5*A', '43505', '118736', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(282, '2020-03-20 15:22:26', '2020-05-28 09:28:15', NULL, '2020-03-20', 'HT140-0353', '353', 'H353', 'FH16 550 | V.4 I-Shift', 'A835974', 'SWEDEN', 'VOLVO', 'D16C5*A', '43505', '119025', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(283, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0354', '354', 'H354', 'FH16 550 | V.4 I-Shift', 'A835676', 'SWEDEN', 'VOLVO', 'D16C5*A', '43505', '118745', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(284, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0355', '355', 'H355', 'FH16 550 | V.4 I-Shift', 'A835981', 'SWEDEN', 'VOLVO', 'D16C5*A', '43521', '119026', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(285, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0356', '356', 'H356', 'FH16 550 | V.4 I-Shift', 'A835700', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '118831', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(286, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0357', '357', 'H357', 'FH16 550 | V.4 I-Shift', 'A835753', 'SWEDEN', 'VOLVO', 'D16C5*A', '43521', '119001', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(287, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0358', '358', 'H358', 'FH16 550 | V.4 I-Shift', 'A835295', 'SWEDEN', 'VOLVO', 'D16C5*A', '43521', '118486', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(288, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0359', '359', 'H359', 'FH16 550 | V.4 I-Shift', 'A837410', 'SWEDEN', 'VOLVO', 'D16C5*A', '43521', '120037', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(289, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0360', '360', 'H360', 'FH16 550 | V.4 I-Shift', 'A837251', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119870', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(290, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0361', '361', 'H361', 'FH16 550 | V.4 I-Shift', 'A835901', 'SWEDEN', 'VOLVO', 'D16C5*A', '43509', '119020', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(291, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0362', '362', 'H362', 'FH16 550 | V.4 I-Shift', 'A836971', 'SWEDEN', 'VOLVO', 'D16C5*A', '43508', '119764', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(292, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0363', '363', 'H363', 'FH16 550 | V.4 I-Shift', 'A837347', 'SWEDEN', 'VOLVO', 'D16C5*A', '43505', '119915', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(293, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0364', '364', 'H364', 'FH16 550 | V.4 I-Shift', 'A835367', 'SWEDEN', 'VOLVO', 'D16C5*A', '43505', '118547', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(294, '2020-03-20 15:22:26', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0365', '365', 'H365', 'FH16 550 | V.4 I-Shift', 'A837314', 'SWEDEN', 'VOLVO', 'D16C5*A', '43509', '119903', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(295, '2020-03-20 15:22:27', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0366', '366', 'H366', 'FH16 550 | V.4 I-Shift', 'A837521', 'SWEDEN', 'VOLVO', 'D16C5*A', '43508', '120174', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(296, '2020-03-20 15:22:27', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0367', '367', 'H367', 'FH16 550 | V.4 I-Shift', 'A835943', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119023', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(297, '2020-03-20 15:22:27', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0368', '368', 'H368', 'FH16 550 | V.4 I-Shift', 'A837195', 'SWEDEN', 'VOLVO', 'D16C5*A', '43521', '119850', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(298, '2020-03-20 15:22:27', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0369', '369', 'H369', 'FH16 550 | V.4 I-Shift', 'A837421', 'SWEDEN', 'VOLVO', 'D16C5*A', '43505', '120038', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(299, '2020-03-20 15:22:27', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0370', '370', 'H370', 'FH16 550 | V.4 I-Shift', 'A837438', 'SWEDEN', 'VOLVO', 'D16C5*A', '43505', '120100', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(300, '2020-03-20 15:22:27', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0371', '371', 'H371', 'FH16 550 | V.4 I-Shift', 'A835887', 'SWEDEN', 'VOLVO', 'D16C5*A', '43508', '119019', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(301, '2020-03-20 15:22:27', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0372', '372', 'H372', 'FH16 550 | V.4 I-Shift', 'A837208', 'SWEDEN', 'VOLVO', 'D16C5*A', '43521', '119859', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(302, '2020-03-20 15:22:27', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0373', '373', 'H373', 'FH16 550 | V.4 I-Shift', 'A835910', 'SWEDEN', 'VOLVO', 'D16C5*A', '43508', '119021', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(303, '2020-03-20 15:22:27', '2020-05-28 09:28:16', NULL, '2020-03-20', 'HT140-0374', '374', 'H374', 'FH16 550 | V.4 I-Shift', 'A835760', 'SWEDEN', 'VOLVO', 'D16C5*A', '43508', '119002', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(304, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0375', '375', 'H375', 'FH16 550 | V.4 I-Shift', 'A837279', 'SWEDEN', 'VOLVO', 'D16C5*A', '43508', '119883', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(305, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0376', '376', 'H376', 'FH16 550 | V.4 I-Shift', 'A837299', 'SWEDEN', 'VOLVO', 'D16C5*A', '43508', '119894', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(306, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0377', '377', 'H377', 'FH16 550 | V.4 I-Shift', 'A835806', 'SWEDEN', 'VOLVO', 'D16C5*A', '43505', '119005', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(307, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0378', '378', 'H378', 'FH16 550 | V.4 I-Shift', 'A837571', 'SWEDEN', 'VOLVO', 'D16C5*A', '43508', '120234', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Accident', 1),
(308, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0379', '379', 'H379', 'FH16 550 | V.4 I-Shift', 'A836433', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119320', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(309, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0380', '380', 'H380', 'FH16 550 | V.4 I-Shift', 'A835780', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119003', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(310, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0381', '381', 'H381', 'FH16 550 | V.4 I-Shift', 'A837072', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119790', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Accident', 1),
(311, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0382', '382', 'H382', 'FH16 550 | V.4 I-Shift', 'A835356', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '118541', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(312, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0383', '383', 'H383', 'FH16 550 | V.4 I-Shift', 'A838360', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '120906', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(313, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0384', '384', 'H384', 'FH16 550 | V.4 I-Shift', 'A838302', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '120846', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(314, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0385', '385', 'H385', 'FH16 550 | V.4 I-Shift', 'A836399', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119319', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(315, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0386', '386', 'H386', 'FH16 550 | V.4 I-Shift', 'A837459', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '120160', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(316, '2020-03-20 15:22:27', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0387', '387', 'H387', 'FH16 550 | V.4 I-Shift', 'A837642', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '120301', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(317, '2020-03-20 15:22:28', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0388', '388', 'H388', 'FH16 550 | V.4 I-Shift', 'A837529', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '120183', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(318, '2020-03-20 15:22:28', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0389', '389', 'H389', 'FH16 550 | V.4 I-Shift', 'A837172', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119835', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(319, '2020-03-20 15:22:28', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0390', '390', 'H390', 'FH16 550 | V.4 I-Shift', 'A839525', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '121812', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(320, '2020-03-20 15:22:28', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0391', '391', 'H391', 'FH16 550 | V.4 I-Shift', 'A837131', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119805', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(321, '2020-03-20 15:22:28', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0392', '392', 'H392', 'FH16 550 | V.4 I-Shift', 'A839539', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '121813', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(322, '2020-03-20 15:22:28', '2020-05-28 09:28:17', NULL, '2020-03-20', 'HT140-0393', '393', 'H393', 'FH16 550 | V.4 I-Shift', 'A837185', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119836', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(323, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0394', '394', 'H394', 'FH16 550 | V.4 I-Shift', 'A835148', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '118454', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(324, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0395', '395', 'H395', 'FH16 550 | V.4 I-Shift', 'A835858', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119007', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(325, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0396', '396', 'H396', 'FH16 550 | V.4 I-Shift', 'A838421', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '120984', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(326, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0397', '397', 'H397', 'FH16 550 | V.4 I-Shift', 'A839228', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '121530', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(327, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0398', '398', 'H398', 'FH16 550 | V.4 I-Shift', 'A839604', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '121894', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(328, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0399', '399', 'H399', 'FH16 550 | V.4 I-Shift', 'A837588', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '120270', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(329, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0400', '400', 'H400', 'FH16 550 | V.4 I-Shift', 'A837145', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119806', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(330, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0401', '401', 'H401', 'FH16 550 | V.4 I-Shift', 'A837540', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '120231', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(331, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0402', '402', 'H402', 'FH16 550 | V.4 I-Shift', 'A837359', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '119916', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(332, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0403', '403', 'H403', 'FH16 550 | V.4 I-Shift', 'A839637', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '121907', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(333, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0404', '404', 'H404', 'FH16 550 | V.4 I-Shift', 'A839620', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '121905', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(334, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0405', '405', 'H405', 'FH16 550 | V.4 I-Shift', 'A839565', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '121825', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(335, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0406', '406', 'H406', 'FH16 550 | V.4 I-Shift', 'A840643', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '122632', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(336, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0407', '407', 'H407', 'FH16 550 | V.4 I-Shift', 'A839707', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '121952', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(337, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0408', '408', 'H408', 'FH16 550 | V.4 I-Shift', 'A839653', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '121913', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(338, '2020-03-20 15:22:28', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0409', '409', 'H409', 'FH16 550 | V.4 I-Shift', 'A839504', 'SWEDEN', 'VOLVO', 'D16C5*A', '43524', '121768', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(339, '2020-03-20 15:22:29', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0410', '410', 'H410', 'FH16 550 | V.4 I-Shift', 'A839954', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122183', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(340, '2020-03-20 15:22:29', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0411', '411', 'H411', 'FH16 550 | V.4 I-Shift', 'A840616', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122630', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(341, '2020-03-20 15:22:29', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0412', '412', 'H412', 'FH16 550 | V.4 I-Shift', 'A839908', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122131', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(342, '2020-03-20 15:22:29', '2020-05-28 09:28:18', NULL, '2020-03-20', 'HT140-0413', '413', 'H413', 'FH16 550 | V.4 I-Shift', 'A840016', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122222', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(343, '2020-03-20 15:22:29', '2020-05-28 09:28:19', NULL, '2020-03-20', 'HT140-0414', '414', 'H414', 'FH16 550 | V.4 I-Shift', 'A839937', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122132', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(344, '2020-03-20 15:22:29', '2020-05-28 09:28:19', NULL, '2020-03-20', 'HT140-0415', '415', 'H415', 'FH16 550 | V.4 I-Shift', 'A839995', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122149', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(345, '2020-03-20 15:22:29', '2020-05-28 09:28:19', NULL, '2020-03-20', 'HT140-0416', '416', 'H416', 'FH16 550 | V.4 I-Shift', 'A840698', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122650', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(346, '2020-03-20 15:22:29', '2020-05-28 09:28:19', NULL, '2020-03-20', 'HT140-0417', '417', 'H417', 'FH16 550 | V.4 I-Shift', 'A840788', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122849', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(347, '2020-03-20 15:22:29', '2020-05-28 09:28:19', NULL, '2020-03-20', 'HT140-0418', '418', 'H418', 'FH16 550 | V.4 I-Shift', 'A840760', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122773', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(348, '2020-03-20 15:22:29', '2020-05-28 09:28:19', NULL, '2020-03-20', 'HT140-0419', '419', 'H419', 'FH16 550 | V.4 I-Shift', 'A840956', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122851', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(349, '2020-03-20 15:22:29', '2020-05-28 09:28:19', NULL, '2020-03-20', 'HT140-0420', '420', 'H420', 'FH16 550 | V.4 I-Shift', 'A840673', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122648', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1),
(350, '2020-03-20 15:22:29', '2020-05-28 09:28:19', NULL, '2020-03-20', 'HT140-0421', '421', 'H421', 'FH16 550 | V.4 I-Shift', 'A840974', 'SWEDEN', 'VOLVO', 'D16C5*A', '43628', '122718', '550 HP', 'PRIMEMOVER', '100 TON', 'Production', 'New SIS', 'Produksi', 'Ready', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_quality`
--

CREATE TABLE `table_quality` (
  `id` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `series` varchar(100) NOT NULL,
  `tm` float DEFAULT NULL,
  `im` float DEFAULT NULL,
  `ash_ar` float DEFAULT NULL,
  `ts_ar` float DEFAULT NULL,
  `cv_ar` float DEFAULT NULL,
  `hgi` float DEFAULT NULL,
  `by_user` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_quality`
--

INSERT INTO `table_quality` (`id`, `created_at`, `updated_at`, `deleted_at`, `date`, `series`, `tm`, `im`, `ash_ar`, `ts_ar`, `cv_ar`, `hgi`, `by_user`) VALUES
(1, '2020-03-22 10:42:44', '2020-03-22 10:57:27', NULL, '2020-03-21', 'HCV WARA', 0, 0, 0, 0, 4.221, 58, 1),
(2, '2020-03-22 10:42:44', '2020-03-22 10:57:27', NULL, '2020-03-21', 'T200 CT1', 0, 0, 0, 0, 4.803, 43, 1),
(3, '2020-03-22 10:42:44', '2020-03-22 10:57:27', NULL, '2020-03-21', 'T200 CT2', 0, 0, 0, 0, 4.785, 41, 1),
(4, '2020-03-22 10:42:44', '2020-03-22 10:57:27', NULL, '2020-03-21', 'T100 NT', 0, 0, 0, 0, 4.727, 46, 1),
(5, '2020-03-22 10:42:44', '2020-03-22 10:57:27', NULL, '2020-03-21', 'T300 CT2', 0, 0, 0, 0, 4.696, 40, 1),
(6, '2020-03-22 10:42:44', '2020-03-22 10:57:27', NULL, '2020-03-21', 'T300 CT1', 0, 0, 0, 0, 4.66, 41, 1),
(7, '2020-03-22 10:42:44', '2020-03-22 10:57:27', NULL, '2020-03-21', 'T200 NT', 0, 0, 0, 0, 4.635, 49, 1),
(8, '2020-03-22 10:42:44', '2020-03-22 10:57:27', NULL, '2020-03-21', 'LCV CT', 0, 0, 0, 0, 4.418, 48, 1),
(9, '2020-03-22 10:42:45', '2020-03-22 10:57:27', NULL, '2020-03-21', 'W100', 0, 0, 0, 0, 4.098, 60, 1),
(10, '2020-03-22 10:42:45', '2020-03-22 10:57:27', NULL, '2020-03-21', 'W200', 0, 0, 0, 0, 3.941, 56, 1),
(11, '2020-03-22 10:42:45', '2020-03-22 10:57:27', NULL, '2020-03-21', 'W300', 0, 0, 0, 0, 3.819, 54, 1),
(12, '2020-03-22 10:42:45', '2020-03-22 10:57:27', NULL, '2020-03-21', 'HCV PRG', 0, 0, 0, 0, 5.259, 49, 1),
(13, '2020-03-22 10:42:45', '2020-03-22 10:57:27', NULL, '2020-03-21', 'HCV HTS PRG', 0, 0, 0, 0, 5.32, 46, 1),
(14, '2020-03-22 10:42:45', '2020-03-22 10:57:28', NULL, '2020-03-21', 'P600', 0, 0, 0, 0, 5.005, 50, 1),
(15, '2020-03-22 10:42:45', '2020-03-22 10:57:28', NULL, '2020-03-21', 'P700', 0, 0, 0, 0, 4.827, 47, 1),
(16, '2020-03-22 10:42:45', '2020-03-22 10:57:28', NULL, '2020-03-21', 'HI ASH PRG', 0, 0, 0, 0, 4.814, 48, 1),
(17, '2020-03-22 10:42:45', '2020-03-22 10:57:28', NULL, '2020-03-21', 'HTS PRG', 0, 0, 0, 0, 4.68, 47, 1),
(18, '2020-03-22 10:42:45', '2020-03-22 10:57:28', NULL, '2020-03-21', 'LCV HTS PRG', 0, 0, 0, 0, 4.457, 46, 1),
(19, '2020-03-22 10:42:45', '2020-03-22 10:57:28', NULL, '2020-03-21', 'LCA PRG', 0, 0, 0, 0, 4.379, 44, 1),
(20, '2020-03-22 14:00:36', '2020-03-22 14:00:36', NULL, '2020-03-22', 'LCV ST', 0, 0, 0, 0, 4.555, 55, 2),
(21, '2020-07-19 08:36:05', '2020-07-19 08:36:05', NULL, '2020-07-19', 'HCV PRG', 0, 0, 0, 0, 0, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `table_settingunit`
--

CREATE TABLE `table_settingunit` (
  `id` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `unit_id` varchar(25) NOT NULL,
  `ellipse` varchar(50) NOT NULL,
  `csa` varchar(50) NOT NULL,
  `register` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `by_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_shiftoperations`
--

CREATE TABLE `table_shiftoperations` (
  `id` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `shift` int(2) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `location` varchar(25) NOT NULL,
  `cn_unit` varchar(25) NOT NULL,
  `position` varchar(25) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `code_stby` varchar(25) NOT NULL,
  `time_passing` time NOT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `operation` tinyint(1) NOT NULL,
  `by_ordered` int(25) NOT NULL,
  `by_area` int(25) NOT NULL,
  `by_user` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_shiftoperations`
--

INSERT INTO `table_shiftoperations` (`id`, `created_at`, `updated_at`, `deleted_at`, `date`, `shift`, `time_in`, `time_out`, `location`, `cn_unit`, `position`, `cargo`, `code_stby`, `time_passing`, `remark`, `operation`, `by_ordered`, `by_area`, `by_user`) VALUES
(1, '2020-06-17 09:08:09', '2020-06-17 09:08:09', NULL, '2020-06-17', 1, '2020-06-17 09:07:00', '2020-06-17 09:07:00', '10', '212', 'M', 'T300 CT1', 'L', '09:00:00', '', 1, 1, 10, 2),
(2, '2020-06-17 09:09:08', '2020-06-17 09:09:08', NULL, '2020-06-17', 1, '2020-06-17 09:08:00', '2020-06-17 09:08:00', '10', '298', 'M', 'W200', 'S06C', '09:00:00', '', 0, 2, 10, 2),
(3, '2020-06-17 09:09:25', '2020-06-17 09:09:25', NULL, '2020-06-17', 1, '2020-06-17 09:09:00', '2020-06-17 09:09:00', '10', '300', 'M', 'P600', 'S06C', '09:00:00', '', 0, 3, 10, 2),
(4, '2020-06-17 09:09:45', '2020-06-17 09:09:45', NULL, '2020-06-17', 1, '2020-06-17 09:09:00', '2020-06-17 09:09:00', '10', '315', 'K', 'Kosongan', 'S02', '09:00:00', 'PARKIR', 0, 4, 10, 2),
(5, '2020-06-17 13:35:49', '2020-06-17 13:35:49', NULL, '2020-06-17', 1, '2020-06-17 13:35:49', '2020-06-17 13:35:49', '10', '111', 'M', 'T100 CT1', 'L', '13:35:49', '', 1, 5, 10, 2),
(6, '2020-06-17 13:35:49', '2020-06-17 13:35:49', NULL, '2020-06-17', 1, '2020-06-17 13:35:49', '2020-06-17 13:35:49', '10', '112', 'M', 'HCV PRG', 'S01', '13:35:49', 'masuk csa', 0, 6, 10, 2),
(7, '2020-06-17 13:44:00', '2020-06-17 13:44:00', NULL, '2020-06-17', 1, '2020-06-17 13:44:00', '2020-06-17 13:44:00', '10', '100', 'M', 'HCV PRG', 'S02', '13:44:00', '', 0, 7, 10, 2),
(8, '2020-06-17 13:44:00', '2020-06-17 13:44:00', NULL, '2020-06-17', 1, '2020-06-17 13:44:00', '2020-06-17 13:44:00', '10', '101', 'M', 'HCV PRG', 'S02', '13:44:00', '', 0, 8, 10, 2),
(9, '2020-06-17 13:46:07', '2020-06-17 13:46:07', NULL, '2020-06-17', 1, '2020-06-17 13:46:07', '2020-06-17 13:46:07', '10', '92', 'M', 'LCA PRG', 'L', '13:46:07', '', 1, 10, 10, 2),
(10, '2020-06-17 13:46:08', '2020-06-17 13:46:08', NULL, '2020-06-17', 1, '2020-06-17 13:46:08', '2020-06-17 13:46:08', '10', '93', 'M', 'W100', 'L', '13:46:08', '', 1, 9, 10, 2),
(11, '2020-06-22 13:21:46', '2020-06-22 13:21:46', NULL, '2020-06-22', 1, '2020-06-22 13:21:00', '2020-06-22 13:21:00', '10', '100', 'M', 'HCV PRG', 'L', '13:00:00', 'lanjut gas', 1, 1, 10, 2),
(12, '2020-06-22 13:22:04', '2020-06-22 13:22:04', NULL, '2020-06-22', 1, '2020-06-22 13:21:00', '2020-06-22 13:21:00', '10', '101', 'M', 'T100 CT1', 'L', '13:00:00', 'lanjut lage', 1, 2, 10, 2),
(13, '2020-06-22 13:22:20', '2020-06-22 13:22:20', NULL, '2020-06-22', 1, '2020-06-22 13:22:00', '2020-06-22 13:22:00', '10', '102', 'M', 'T300 CT1', 'L', '13:00:00', '', 1, 3, 10, 2),
(14, '2020-06-24 10:23:12', '2020-06-24 10:23:12', NULL, '2020-06-24', 1, '2020-06-24 10:22:00', '2020-06-24 10:22:00', '10', '100', 'M', 'HCV PRG', 'L', '10:00:00', '', 1, 1, 10, 2),
(15, '2020-06-24 10:25:09', '2020-06-24 10:25:09', NULL, '2020-06-24', 1, '2020-06-24 10:24:00', '2020-06-24 10:24:00', '10', '101', 'M', 'T100 NT', 'L', '10:00:00', '', 1, 2, 10, 2),
(16, '2020-06-24 10:25:28', '2020-06-24 10:25:28', NULL, '2020-06-24', 1, '2020-06-24 10:25:00', '2020-06-24 10:25:00', '10', '102', 'M', 'T200 CT1', 'L', '10:00:00', '', 1, 3, 10, 2),
(17, '2020-06-24 10:25:45', '2020-06-24 10:25:45', NULL, '2020-06-24', 1, '2020-06-24 10:25:00', '2020-06-24 10:25:00', '10', '103', 'M', 'T200 CT2', 'L', '10:00:00', '', 1, 4, 10, 2),
(18, '2020-06-24 10:47:34', '2020-06-24 10:47:34', NULL, '2020-06-24', 1, '2020-06-24 10:47:00', '2020-06-24 10:47:00', '10', '105', 'M', 'HCV NT', 'S02', '10:00:00', '', 0, 5, 10, 2),
(19, '2020-07-17 07:04:06', '2020-07-17 07:04:06', NULL, '2020-07-17', 1, '2020-07-17 15:03:00', '2020-07-17 15:03:00', '10', '100', 'M', 'HCV PRG', 'L', '15:00:00', 'lanjut ges', 1, 1, 10, 2),
(20, '2020-07-19 07:21:04', '2020-07-19 07:21:04', NULL, '2020-07-19', 1, '2020-07-19 15:21:00', '2020-07-19 15:21:00', '10', '100', 'M', 'HCV PRG', 'S01', '15:00:00', '', 0, 1, 10, 2),
(21, '2020-07-19 07:21:28', '2020-07-19 07:21:28', NULL, '2020-07-19', 1, '2020-07-19 15:21:00', '2020-07-19 15:21:00', '11', '101', 'M', 'HCV PRG', 'S01', '15:00:00', '', 0, 1, 11, 2),
(22, '2020-07-19 07:21:47', '2020-07-19 07:21:47', NULL, '2020-07-19', 1, '2020-07-19 15:21:00', '2020-07-19 15:21:00', '12', '102', 'M', 'HCV PRG', 'S01', '15:00:00', '', 0, 1, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `table_shiftos`
--

CREATE TABLE `table_shiftos` (
  `id` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `date` date NOT NULL,
  `code_number` varchar(25) NOT NULL,
  `no_unit` varchar(25) NOT NULL,
  `no_id` varchar(25) NOT NULL,
  `time` varchar(25) NOT NULL,
  `csa` varchar(25) NOT NULL,
  `by_user` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_shiftos`
--

INSERT INTO `table_shiftos` (`id`, `created_at`, `updated_at`, `deleted_at`, `date`, `code_number`, `no_unit`, `no_id`, `time`, `csa`, `by_user`) VALUES
(1, '2020-03-21 14:05:35', '2020-03-21 14:05:35', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0092A', 'H092', '92', '04:30', 'CSA 34', 1),
(2, '2020-03-21 14:05:35', '2020-03-21 14:05:35', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0093A', 'H093', '93', '06:00', 'CSA 69', 1),
(3, '2020-03-21 14:05:35', '2020-03-21 14:05:35', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0094A', 'H094', '94', '04:00', 'CSA 34', 1),
(4, '2020-03-21 14:05:35', '2020-03-21 14:05:35', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0095A', 'H095', '95', 'Flexible', 'Flexible', 1),
(5, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0096A', 'H096', '96', 'Flexible', 'Flexible', 1),
(6, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0097A', 'H097', '97', 'Flexible', 'Flexible', 1),
(7, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0098A', 'H098', '98', 'Flexible', 'Flexible', 1),
(8, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0099A', 'H099', '99', 'Flexible', 'Flexible', 1),
(9, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0100A', 'H100', '100', 'Flexible', 'Flexible', 1),
(10, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0101A', 'H101', '101', 'Flexible', 'Flexible', 1),
(11, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0102A', 'H102', '102', 'Flexible', 'Flexible', 1),
(12, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0103A', 'H103', '103', '04:30', 'CSA 34', 1),
(13, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0105', 'H105', '105', 'Flexible', 'Flexible', 1),
(14, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0112', 'H112', '112', '04:00', 'CSA 69', 1),
(15, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0114', 'H114', '114', 'Flexible', 'Flexible', 1),
(16, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0118', 'H118', '118', '04:30', 'CSA 34', 1),
(17, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0121', 'H121', '121', '05:30', 'CSA 65', 1),
(18, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0122', 'H122', '122', '04:30', 'CSA 34', 1),
(19, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0123', 'H123', '123', '04:00', 'CSA 69', 1),
(20, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0126', 'H126', '126', '05:00', 'CSA 69', 1),
(21, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0137', 'H137', '137', '04:30', 'CSA 65', 1),
(22, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0139', 'H139', '139', '04:00', 'CSA 34', 1),
(23, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0143', 'H143', '143', 'Flexible', 'Flexible', 1),
(24, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0144', 'H144', '144', '04:00', 'CSA 34', 1),
(25, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0145', 'H145', '145', '04:00', 'CSA 34', 1),
(26, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0148', 'H148', '148', '04:30', 'CSA 65', 1),
(27, '2020-03-21 14:05:36', '2020-03-21 14:05:36', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0150', 'H150', '150', 'Flexible', 'Flexible', 1),
(28, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0152', 'H152', '152', '04:30', 'CSA 34', 1),
(29, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0155', 'H155', '155', '05:30', 'CSA 65', 1),
(30, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0156', 'H156', '156', '05:30', 'CSA 65', 1),
(31, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0157', 'H157', '157', '04:30', 'CSA 65', 1),
(32, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0158', 'H158', '158', 'Flexible', 'Flexible', 1),
(33, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0159', 'H159', '159', 'Flexible', 'Flexible', 1),
(34, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0160', 'H160', '160', 'Flexible', 'Flexible', 1),
(35, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0161', 'H161', '161', '05:30', 'CSA 65', 1),
(36, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0162', 'H162', '162', '04:30', 'CSA 34', 1),
(37, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0163', 'H163', '163', '06:30', 'CSA 34', 1),
(38, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0165', 'H165', '165', '04:30', 'CSA 65', 1),
(39, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0166', 'H166', '166', '04:30', 'CSA 65', 1),
(40, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0167', 'H167', '167', '04:30', 'CSA 65', 1),
(41, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0168', 'H168', '168', '05:30', 'CSA 65', 1),
(42, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0169', 'H169', '169', '04:30', 'CSA 34', 1),
(43, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0170', 'H170', '170', 'Flexible', 'Flexible', 1),
(44, '2020-03-21 14:05:37', '2020-03-21 14:05:37', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0171', 'H171', '171', 'Flexible', 'Flexible', 1),
(45, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0172', 'H172', '172', '04:30', 'CSA 34', 1),
(46, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0173', 'H173', '173', '04:30', 'CSA 34', 1),
(47, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0175', 'H175', '175', '04:30', 'CSA 34', 1),
(48, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0176', 'H176', '176', '05:30', 'CSA 65', 1),
(49, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0177', 'H177', '177', '04:30', 'CSA 65', 1),
(50, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0178', 'H178', '178', '04:00', 'CSA 34', 1),
(51, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0179', 'H179', '179', '04:30', 'CSA 65', 1),
(52, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0180', 'H180', '180', '05:30', 'CSA 65', 1),
(53, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0181', 'H181', '181', '04:30', 'CSA 34', 1),
(54, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0182', 'H182', '182', 'Flexible', 'Flexible', 1),
(55, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0183', 'H183', '183', 'Flexible', 'Flexible', 1),
(56, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0184', 'H184', '184', '04:30', 'CSA 34', 1),
(57, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0185', 'H185', '185', 'Flexible', 'Flexible', 1),
(58, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0186', 'H186', '186', '04:30', 'CSA 34', 1),
(59, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0187', 'H187', '187', '04:00', 'CSA 34', 1),
(60, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0188', 'H188', '188', '05:30', 'CSA 65', 1),
(61, '2020-03-21 14:05:38', '2020-03-21 14:05:38', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0189', 'H189', '189', '04:30', 'CSA 34', 1),
(62, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0190', 'H190', '190', 'Flexible', 'Flexible', 1),
(63, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0191', 'H191', '191', '06:00', 'CSA 69', 1),
(64, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0192', 'H192', '192', '06:00', 'CSA 69', 1),
(65, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0193', 'H193', '193', '04:30', 'CSA 34', 1),
(66, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0194', 'H194', '194', '04:00', 'CSA 69', 1),
(67, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0195', 'H195', '195', '04:30', 'CSA 65', 1),
(68, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0196', 'H196', '196', 'Flexible', 'Flexible', 1),
(69, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0197', 'H197', '197', '06:30', 'CSA 34', 1),
(70, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0198', 'H198', '198', '04:00', 'CSA 34', 1),
(71, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0199', 'H199', '199', 'Flexible', 'Flexible', 1),
(72, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0200', 'H200', '200', '06:00', 'CSA 69', 1),
(73, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0201', 'H201', '201', '04:00', 'CSA 34', 1),
(74, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0202', 'H202', '202', '04:00', 'CSA 34', 1),
(75, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0203', 'H203', '203', '05:00', 'CSA 69', 1),
(76, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0204', 'H204', '204', '05:30', 'CSA 65', 1),
(77, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0205', 'H205', '205', 'Flexible', 'Flexible', 1),
(78, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0207', 'H207', '207', '04:00', 'CSA 34', 1),
(79, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0208', 'H208', '208', '04:30', 'CSA 65', 1),
(80, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0209', 'H209', '209', 'Flexible', 'Flexible', 1),
(81, '2020-03-21 14:05:39', '2020-03-21 14:05:39', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0211', 'H211', '211', '04:30', 'CSA 34', 1),
(82, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0212', 'H212', '212', '05:30', 'CSA 65', 1),
(83, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0213', 'H213', '213', '05:00', 'CSA 69', 1),
(84, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0214', 'H214', '214', '05:00', 'CSA 69', 1),
(85, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0215', 'H215', '215', '04:30', 'CSA 65', 1),
(86, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0216', 'H216', '216', '05:00', 'CSA 69', 1),
(87, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0218', 'H218', '218', '04:30', 'CSA 34', 1),
(88, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0219', 'H219', '219', '04:30', 'CSA 65', 1),
(89, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0220', 'H220', '220', '06:30', 'CSA 34', 1),
(90, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0221', 'H221', '221', '04:30', 'CSA 65', 1),
(91, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0222', 'H222', '222', '04:00', 'CSA 34', 1),
(92, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0223', 'H223', '223', 'Flexible', 'Flexible', 1),
(93, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0224', 'H224', '224', '05:00', 'CSA 69', 1),
(94, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0225', 'H225', '225', '05:30', 'CSA 65', 1),
(95, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0226', 'H226', '226', '04:30', 'CSA 65', 1),
(96, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0227', 'H227', '227', '04:30', 'CSA 65', 1),
(97, '2020-03-21 14:05:40', '2020-03-21 14:05:40', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0228', 'H228', '228', '06:00', 'CSA 69', 1),
(98, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0229', 'H229', '229', '04:30', 'CSA 65', 1),
(99, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0230', 'H230', '230', '04:00', 'CSA 34', 1),
(100, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0231', 'H231', '231', '05:00', 'CSA 69', 1),
(101, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0232', 'H232', '232', '04:30', 'CSA 34', 1),
(102, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0233', 'H233', '233', '04:30', 'CSA 65', 1),
(103, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0234', 'H234', '234', '05:00', 'CSA 69', 1),
(104, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0244', 'H244', '244', '04:00', 'CSA 69', 1),
(105, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0245', 'H245', '245', '05:00', 'CSA 69', 1),
(106, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0247', 'H247', '247', '04:00', 'CSA 69', 1),
(107, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0248', 'H248', '248', '06:00', 'CSA 69', 1),
(108, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0249', 'H249', '249', 'Flexible', 'Flexible', 1),
(109, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0250', 'H250', '250', 'Flexible', 'Flexible', 1),
(110, '2020-03-21 14:05:41', '2020-03-21 14:05:41', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0257', 'H257', '257', 'Flexible', 'Flexible', 1),
(111, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0258', 'H258', '258', 'Flexible', 'Flexible', 1),
(112, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0260', 'H260', '260', 'Flexible', 'Flexible', 1),
(113, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0263', 'H263', '263', '06:00', 'CSA 69', 1),
(114, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0264', 'H264', '264', 'Flexible', 'Flexible', 1),
(115, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0265', 'H265', '265', '04:00', 'CSA 69', 1),
(116, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0267', 'H267', '267', '05:00', 'CSA 69', 1),
(117, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0268', 'H268', '268', '04:00', 'CSA 69', 1),
(118, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0269', 'H269', '269', 'Flexible', 'Flexible', 1),
(119, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0270', 'H270', '270', '05:00', 'CSA 69', 1),
(120, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0271', 'H271', '271', '04:00', 'CSA 69', 1),
(121, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0273', 'H273', '273', '04:00', 'CSA 69', 1),
(122, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0274', 'H274', '274', '04:00', 'CSA 69', 1),
(123, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0275', 'H275', '275', '06:00', 'CSA 69', 1),
(124, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0276', 'H276', '276', '05:00', 'CSA 69', 1),
(125, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0278', 'H278', '278', 'Flexible', 'Flexible', 1),
(126, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0279', 'H279', '279', '05:00', 'CSA 69', 1),
(127, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0280', 'H280', '280', '05:00', 'CSA 69', 1),
(128, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0281', 'H281', '281', '06:00', 'CSA 69', 1),
(129, '2020-03-21 14:05:42', '2020-03-21 14:05:42', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0282', 'H282', '282', '05:00', 'CSA 69', 1),
(130, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0283', 'H283', '283', '05:00', 'CSA 69', 1),
(131, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0284', 'H284', '284', '04:00', 'CSA 69', 1),
(132, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0285', 'H285', '285', '04:00', 'CSA 69', 1),
(133, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0286', 'H286', '286', '06:00', 'CSA 69', 1),
(134, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0287', 'H287', '287', '04:00', 'CSA 69', 1),
(135, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0288', 'H288', '288', '05:00', 'CSA 69', 1),
(136, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0289', 'H289', '289', '04:00', 'CSA 69', 1),
(137, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0290', 'H290', '290', '04:00', 'CSA 69', 1),
(138, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0291', 'H291', '291', '04:00', 'CSA 34', 1),
(139, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0292', 'H292', '292', '04:30', 'CSA 34', 1),
(140, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0293', 'H293', '293', '04:30', 'CSA 65', 1),
(141, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0294', 'H294', '294', '05:30', 'CSA 65', 1),
(142, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0295', 'H295', '295', '04:00', 'CSA 34', 1),
(143, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0296', 'H296', '296', '04:30', 'CSA 65', 1),
(144, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0297', 'H297', '297', '04:00', 'CSA 69', 1),
(145, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0298', 'H298', '298', '04:30', 'CSA 65', 1),
(146, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0299', 'H299', '299', '04:00', 'CSA 34', 1),
(147, '2020-03-21 14:05:43', '2020-03-21 14:05:43', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0300', 'H300', '300', '04:00', 'CSA 34', 1),
(148, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0301', 'H301', '301', '04:00', 'CSA 34', 1),
(149, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0302', 'H302', '302', '04:30', 'CSA 65', 1),
(150, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0303', 'H303', '303', '06:30', 'CSA 34', 1),
(151, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0304', 'H304', '304', '04:30', 'CSA 65', 1),
(152, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0305', 'H305', '305', '04:30', 'CSA 34', 1),
(153, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0306', 'H306', '306', '04:30', 'CSA 34', 1),
(154, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0307', 'H307', '307', '04:30', 'CSA 65', 1),
(155, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0308', 'H308', '308', '05:30', 'CSA 65', 1),
(156, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0309', 'H309', '309', '06:00', 'CSA 69', 1),
(157, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0310', 'H310', '310', '06:00', 'CSA 69', 1),
(158, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0311', 'H311', '311', '04:00', 'CSA 34', 1),
(159, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0312', 'H312', '312', '04:00', 'CSA 69', 1),
(160, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0313', 'H313', '313', '04:00', 'CSA 69', 1),
(161, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0314', 'H314', '314', '04:00', 'CSA 69', 1),
(162, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0315', 'H315', '315', '04:30', 'CSA 65', 1),
(163, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0316', 'H316', '316', '04:00', 'CSA 69', 1),
(164, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0317', 'H317', '317', '04:00', 'CSA 69', 1),
(165, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0318', 'H318', '318', '04:30', 'CSA 34', 1),
(166, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0319', 'H319', '319', '06:00', 'CSA 69', 1),
(167, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0320', 'H320', '320', '06:30', 'CSA 34', 1),
(168, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0321', 'H321', '321', '06:30', 'CSA 34', 1),
(169, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0322', 'H322', '322', '04:00', 'CSA 69', 1),
(170, '2020-03-21 14:05:44', '2020-03-21 14:05:44', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0323', 'H323', '323', '06:00', 'CSA 69', 1),
(171, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0324', 'H324', '324', '05:00', 'CSA 69', 1),
(172, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0325', 'H325', '325', '05:30', 'CSA 65', 1),
(173, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0326', 'H326', '326', '04:00', 'CSA 69', 1),
(174, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0327', 'H327', '327', '06:00', 'CSA 69', 1),
(175, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0328', 'H328', '328', '06:00', 'CSA 69', 1),
(176, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0329', 'H329', '329', '05:00', 'CSA 69', 1),
(177, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0330', 'H330', '330', '04:30', 'CSA 34', 1),
(178, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0331', 'H331', '331', '04:00', 'CSA 34', 1),
(179, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0332', 'H332', '332', '04:00', 'CSA 34', 1),
(180, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0333', 'H333', '333', '04:30', 'CSA 34', 1),
(181, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0334', 'H334', '334', '05:30', 'CSA 65', 1),
(182, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0335', 'H335', '335', '04:30', 'CSA 65', 1),
(183, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0336', 'H336', '336', '06:30', 'CSA 34', 1),
(184, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0337', 'H337', '337', '06:00', 'CSA 69', 1),
(185, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0338', 'H338', '338', '06:00', 'CSA 69', 1),
(186, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0339', 'H339', '339', '05:00', 'CSA 69', 1),
(187, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0340', 'H340', '340', '06:00', 'CSA 69', 1),
(188, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0341', 'H341', '341', '05:00', 'CSA 69', 1),
(189, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0342', 'H342', '342', '06:00', 'CSA 69', 1),
(190, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0343', 'H343', '343', '06:30', 'CSA 34', 1),
(191, '2020-03-21 14:05:45', '2020-03-21 14:05:45', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0344', 'H344', '344', '05:00', 'CSA 69', 1),
(192, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0345', 'H345', '345', '05:00', 'CSA 69', 1),
(193, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0346', 'H346', '346', '04:00', 'CSA 69', 1),
(194, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0347', 'H347', '347', '04:00', 'CSA 34', 1),
(195, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0348', 'H348', '348', '05:30', 'CSA 65', 1),
(196, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0349', 'H349', '349', '05:30', 'CSA 65', 1),
(197, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0350', 'H350', '350', '06:30', 'CSA 34', 1),
(198, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0351', 'H351', '351', '04:00', 'CSA 69', 1),
(199, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0352', 'H352', '352', '04:00', 'CSA 69', 1),
(200, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0353', 'H353', '353', '05:00', 'CSA 69', 1),
(201, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0354', 'H354', '354', '06:00', 'CSA 69', 1),
(202, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0355', 'H355', '355', '04:00', 'CSA 69', 1),
(203, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0356', 'H356', '356', '05:00', 'CSA 69', 1),
(204, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0357', 'H357', '357', '04:00', 'CSA 69', 1),
(205, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0358', 'H358', '358', '06:00', 'CSA 69', 1),
(206, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0359', 'H359', '359', '04:00', 'CSA 69', 1),
(207, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0360', 'H360', '360', '06:00', 'CSA 69', 1),
(208, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0361', 'H361', '361', '04:00', 'CSA 69', 1),
(209, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0362', 'H362', '362', '04:00', 'CSA 69', 1),
(210, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0363', 'H363', '363', '05:00', 'CSA 69', 1),
(211, '2020-03-21 14:05:46', '2020-03-21 14:05:46', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0364', 'H364', '364', '04:00', 'CSA 69', 1),
(212, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0365', 'H365', '365', '06:30', 'CSA 34', 1),
(213, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0366', 'H366', '366', '06:30', 'CSA 34', 1),
(214, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0367', 'H367', '367', '04:00', 'CSA 34', 1),
(215, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0368', 'H368', '368', '06:30', 'CSA 34', 1),
(216, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0369', 'H369', '369', '04:30', 'CSA 65', 1),
(217, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0370', 'H370', '370', '04:00', 'CSA 34', 1),
(218, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0371', 'H371', '371', '05:30', 'CSA 65', 1),
(219, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0372', 'H372', '372', '04:30', 'CSA 34', 1),
(220, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0373', 'H373', '373', '04:00', 'CSA 34', 1),
(221, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0374', 'H374', '374', '04:30', 'CSA 65', 1),
(222, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0375', 'H375', '375', '04:00', 'CSA 34', 1),
(223, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0376', 'H376', '376', '04:30', 'CSA 34', 1),
(224, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0377', 'H377', '377', '06:30', 'CSA 34', 1),
(225, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0378', 'H378', '378', '42', '42', 1),
(226, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0379', 'H379', '379', '05:30', 'CSA 65', 1),
(227, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0380', 'H380', '380', '04:00', 'CSA 34', 1),
(228, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0381', 'H381', '381', '42', '42', 1),
(229, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0382', 'H382', '382', '05:30', 'CSA 65', 1),
(230, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0383', 'H383', '383', '06:30', 'CSA 34', 1),
(231, '2020-03-21 14:05:47', '2020-03-21 14:05:47', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0384', 'H384', '384', '04:30', 'CSA 65', 1),
(232, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0385', 'H385', '385', '05:00', 'CSA 69', 1),
(233, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0386', 'H386', '386', '05:00', 'CSA 69', 1),
(234, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0387', 'H387', '387', '06:00', 'CSA 69', 1),
(235, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0388', 'H388', '388', '05:00', 'CSA 69', 1),
(236, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0389', 'H389', '389', '04:00', 'CSA 69', 1),
(237, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0390', 'H390', '390', '04:00', 'CSA 34', 1),
(238, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0391', 'H391', '391', '04:00', 'CSA 69', 1),
(239, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0392', 'H392', '392', '05:00', 'CSA 69', 1),
(240, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0393', 'H393', '393', '04:00', 'CSA 69', 1),
(241, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0394', 'H394', '394', '06:00', 'CSA 69', 1),
(242, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0395', 'H395', '395', '05:00', 'CSA 69', 1),
(243, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0396', 'H396', '396', '04:00', 'CSA 69', 1),
(244, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0397', 'H397', '397', '04:30', 'CSA 65', 1),
(245, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0398', 'H398', '398', '04:00', 'CSA 69', 1),
(246, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0399', 'H399', '399', '04:00', 'CSA 34', 1),
(247, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0400', 'H400', '400', '04:00', 'CSA 34', 1),
(248, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0401', 'H401', '401', '04:30', 'CSA 34', 1),
(249, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0402', 'H402', '402', '06:30', 'CSA 34', 1),
(250, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0403', 'H403', '403', '04:30', 'CSA 65', 1),
(251, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0404', 'H404', '404', '05:00', 'CSA 69', 1),
(252, '2020-03-21 14:05:48', '2020-03-21 14:05:48', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0405', 'H405', '405', '04:00', 'CSA 69', 1),
(253, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0406', 'H406', '406', '04:00', 'CSA 34', 1),
(254, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0407', 'H407', '407', '05:30', 'CSA 65', 1),
(255, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0408', 'H408', '408', '05:30', 'CSA 65', 1),
(256, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0409', 'H409', '409', '06:30', 'CSA 34', 1),
(257, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0410', 'H410', '410', '04:00', 'CSA 34', 1),
(258, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0411', 'H411', '411', '04:00', 'CSA 34', 1),
(259, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0412', 'H412', '412', '04:30', 'CSA 34', 1),
(260, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0413', 'H413', '413', '04:00', 'CSA 34', 1),
(261, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0414', 'H414', '414', '04:30', 'CSA 65', 1),
(262, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0415', 'H415', '415', '04:30', 'CSA 65', 1),
(263, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0416', 'H416', '416', '05:30', 'CSA 65', 1),
(264, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0417', 'H417', '417', '06:30', 'CSA 34', 1),
(265, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0418', 'H418', '418', '04:00', 'CSA 69', 1),
(266, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0419', 'H419', '419', '05:00', 'CSA 69', 1),
(267, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0420', 'H420', '420', '05:00', 'CSA 69', 1),
(268, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'HT140-0421', 'H421', '421', '06:00', 'CSA 69', 1),
(269, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'RMI 313', 'R313', 'R313', '04:30', 'RMI 68', 1),
(270, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'RMI 318', 'R318', 'R318', '04:30', 'RMI 68', 1),
(271, '2020-03-21 14:05:49', '2020-03-21 14:05:49', '0000-00-00 00:00:00', '2020-03-21', 'RMI 319', 'R319', 'R319', '04:30', 'RMI 68', 1),
(272, '2020-03-21 14:05:50', '2020-03-21 14:05:50', '0000-00-00 00:00:00', '2020-03-21', 'RMI 320', 'R320', 'R320', '04:30', 'RMI 68', 1),
(273, '2020-03-21 14:05:50', '2020-03-21 14:05:50', '0000-00-00 00:00:00', '2020-03-21', 'RMI 322', 'R322', 'R322', '04:30', 'RMI 68', 1),
(274, '2020-03-21 14:05:50', '2020-03-21 14:05:50', '0000-00-00 00:00:00', '2020-03-21', 'RMI 323', 'R323', 'R323', '04:30', 'RMI 68', 1),
(275, '2020-03-21 14:05:50', '2020-03-21 14:05:50', '0000-00-00 00:00:00', '2020-03-21', 'RMI 324', 'R324', 'R324', '04:30', 'RMI 68', 1),
(276, '2020-03-21 14:05:50', '2020-03-21 14:05:50', '0000-00-00 00:00:00', '2020-03-21', 'RMI 325', 'R325', 'R325', '04:30', 'RMI 68', 1),
(277, '2020-03-21 14:05:50', '2020-03-21 14:05:50', '0000-00-00 00:00:00', '2020-03-21', 'RMI 326', 'R326', 'R326', '04:30', 'RMI 68', 1),
(278, '2020-03-21 14:05:50', '2020-03-21 14:05:50', '0000-00-00 00:00:00', '2020-03-21', 'RMI 327', 'R327', 'R327', '04:30', 'RMI 68', 1),
(279, '2020-03-21 14:05:50', '2020-03-21 14:05:50', '0000-00-00 00:00:00', '2020-03-21', 'RMI 328', 'R328', 'R328', '04:30', 'RMI 68', 1),
(280, '2020-03-21 14:05:50', '2020-03-21 14:05:50', '0000-00-00 00:00:00', '2020-03-21', 'RMI 329', 'R329', 'R329', '04:30', 'RMI 68', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_statuspassing`
--

CREATE TABLE `table_statuspassing` (
  `id` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `shift` int(2) NOT NULL,
  `passing_plan` int(5) NOT NULL,
  `passing_actual` int(5) NOT NULL,
  `passing_ach` float NOT NULL,
  `status` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `by_area` int(25) NOT NULL,
  `by_user` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `table_supplaypassing`
--

CREATE TABLE `table_supplaypassing` (
  `id` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `shift` int(2) NOT NULL,
  `material` varchar(100) NOT NULL,
  `jam_1` int(2) NOT NULL,
  `jam_2` int(2) NOT NULL,
  `jam_3` int(2) NOT NULL,
  `jam_4` int(2) NOT NULL,
  `jam_5` int(2) NOT NULL,
  `jam_6` int(2) NOT NULL,
  `jam_7` int(2) NOT NULL,
  `jam_8` int(2) NOT NULL,
  `jam_9` int(2) NOT NULL,
  `jam_10` int(2) NOT NULL,
  `jam_11` int(2) NOT NULL,
  `jam_12` int(2) NOT NULL,
  `by_user` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_supplaypassing`
--

INSERT INTO `table_supplaypassing` (`id`, `created_at`, `updated_at`, `deleted_at`, `date`, `shift`, `material`, `jam_1`, `jam_2`, `jam_3`, `jam_4`, `jam_5`, `jam_6`, `jam_7`, `jam_8`, `jam_9`, `jam_10`, `jam_11`, `jam_12`, `by_user`) VALUES
(1, '2020-06-17 09:55:26', '2020-06-17 09:55:26', NULL, '2020-06-17', 1, 'HCV PRG', 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 0, 2),
(2, '2020-06-17 09:55:27', '2020-06-17 09:55:27', NULL, '2020-06-17', 1, 'T200 CT1', 7, 7, 7, 7, 7, 7, 7, 7, 7, 10, 10, 10, 2),
(3, '2020-06-17 09:55:27', '2020-06-17 09:55:27', NULL, '2020-06-17', 1, 'T300 CT1', 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 2),
(4, '2020-06-17 09:55:27', '2020-06-17 09:55:27', NULL, '2020-06-17', 1, 'T200 CT2', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 2),
(5, '2020-06-17 09:55:27', '2020-06-17 09:55:27', NULL, '2020-06-17', 1, 'T300 CT2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 2),
(6, '2020-06-17 09:55:27', '2020-06-17 09:55:27', NULL, '2020-06-17', 1, 'T100 NT', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2),
(7, '2020-06-19 08:57:53', '2020-06-19 08:57:53', NULL, '2020-06-19', 1, 'HCV PRG', 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 0, 1),
(8, '2020-06-19 08:57:53', '2020-06-19 08:57:53', NULL, '2020-06-19', 1, 'T200 CT1', 7, 7, 7, 7, 7, 7, 7, 7, 7, 10, 10, 10, 1),
(9, '2020-06-19 08:57:54', '2020-06-19 08:57:54', NULL, '2020-06-19', 1, 'T300 CT1', 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 1),
(10, '2020-06-19 08:57:54', '2020-06-19 08:57:54', NULL, '2020-06-19', 1, 'T200 CT2', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 1),
(11, '2020-06-19 08:57:54', '2020-06-19 08:57:54', NULL, '2020-06-19', 1, 'T300 CT2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 1),
(12, '2020-06-19 08:57:54', '2020-06-19 08:57:54', NULL, '2020-06-19', 1, 'T100 NT', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 1),
(13, '2020-06-22 10:13:20', '2020-06-22 10:13:20', NULL, '2020-06-22', 1, 'HCV PRG', 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 0, 1),
(14, '2020-06-22 10:13:21', '2020-06-22 10:13:21', NULL, '2020-06-22', 1, 'T200 CT1', 7, 7, 7, 7, 7, 7, 7, 7, 7, 10, 10, 10, 1),
(15, '2020-06-22 10:13:21', '2020-06-22 10:13:21', NULL, '2020-06-22', 1, 'T300 CT1', 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 1),
(16, '2020-06-22 10:13:21', '2020-06-22 10:13:21', NULL, '2020-06-22', 1, 'T200 CT2', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 1),
(17, '2020-06-22 10:13:21', '2020-06-22 10:13:21', NULL, '2020-06-22', 1, 'T300 CT2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 1),
(18, '2020-06-22 10:13:21', '2020-06-22 10:13:21', NULL, '2020-06-22', 1, 'T100 NT', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 1),
(19, '2020-06-23 10:41:37', '2020-06-23 10:41:37', NULL, '2020-06-23', 1, 'HCV PRG', 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 0, 2),
(20, '2020-06-23 10:41:37', '2020-06-23 10:41:37', NULL, '2020-06-23', 1, 'T200 CT1', 7, 7, 7, 7, 7, 7, 7, 7, 7, 10, 10, 10, 2),
(21, '2020-06-23 10:41:37', '2020-06-23 10:41:37', NULL, '2020-06-23', 1, 'T300 CT1', 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 2),
(22, '2020-06-23 10:41:37', '2020-06-23 10:41:37', NULL, '2020-06-23', 1, 'T200 CT2', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 2),
(23, '2020-06-23 10:41:37', '2020-06-23 10:41:37', NULL, '2020-06-23', 1, 'T300 CT2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 2),
(24, '2020-06-23 10:41:37', '2020-06-23 10:41:37', NULL, '2020-06-23', 1, 'T100 NT', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2),
(25, '2020-06-24 10:19:33', '2020-06-24 10:19:33', NULL, '2020-06-24', 1, 'HCV PRG', 4, 4, 4, 4, 4, 4, 4, 4, 4, 0, 0, 0, 2),
(26, '2020-06-24 10:19:33', '2020-06-24 10:19:33', NULL, '2020-06-24', 1, 'T200 CT1', 7, 7, 7, 7, 7, 7, 7, 7, 7, 10, 10, 10, 2),
(27, '2020-06-24 10:19:33', '2020-06-24 10:19:33', NULL, '2020-06-24', 1, 'T300 CT1', 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 2),
(28, '2020-06-24 10:19:34', '2020-06-24 10:19:34', NULL, '2020-06-24', 1, 'T200 CT2', 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 2),
(29, '2020-06-24 10:19:34', '2020-06-24 10:19:34', NULL, '2020-06-24', 1, 'T300 CT2', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 2),
(30, '2020-06-24 10:19:34', '2020-06-24 10:19:34', NULL, '2020-06-24', 1, 'T100 NT', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2),
(31, '2020-07-17 07:06:42', '2020-07-17 07:06:42', NULL, '2020-07-17', 1, 'BCLSA', 0, 0, 0, 0, 0, 11, 11, 11, 0, 0, 0, 0, 1),
(32, '2020-07-17 07:06:42', '2020-07-17 07:06:42', NULL, '2020-07-17', 1, 'HCV PRG', 0, 3, 3, 3, 3, 0, 0, 0, 3, 3, 3, 3, 1),
(33, '2020-07-17 07:06:42', '2020-07-17 07:06:42', NULL, '2020-07-17', 1, 'T200 CT1', 7, 7, 7, 7, 7, 4, 4, 4, 7, 7, 7, 7, 1),
(34, '2020-07-17 07:06:42', '2020-07-17 07:06:42', NULL, '2020-07-17', 1, 'T300 CT1', 10, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 1),
(35, '2020-07-17 07:06:42', '2020-07-17 07:06:42', NULL, '2020-07-17', 1, 'T200 CT2', 8, 10, 10, 10, 10, 4, 4, 4, 10, 10, 10, 10, 1),
(36, '2020-07-17 07:06:42', '2020-07-17 07:06:42', NULL, '2020-07-17', 1, 'T300 CT2', 5, 5, 5, 5, 5, 4, 4, 4, 5, 5, 5, 5, 1),
(37, '2020-07-17 07:06:42', '2020-07-17 07:06:42', NULL, '2020-07-17', 1, 'T100 NT', 4, 4, 4, 4, 4, 0, 0, 0, 4, 4, 4, 4, 1),
(38, '2020-07-17 07:06:42', '2020-07-17 07:06:42', NULL, '2020-07-17', 1, 'HCV WARA', 0, 0, 0, 0, 0, 6, 6, 6, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_users`
--

CREATE TABLE `table_users` (
  `id` bigint(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `activation_key` varchar(100) DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `area` int(10) NOT NULL,
  `level` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `table_users`
--

INSERT INTO `table_users` (`id`, `created_at`, `updated_at`, `deleted_at`, `username`, `password`, `full_name`, `description`, `email`, `phone`, `activation_key`, `last_login`, `area`, `level`) VALUES
(1, '2019-05-03 00:00:00', '2019-05-03 00:00:00', NULL, 'Administrator', '$2y$10$ES0vpcOg1NVE3wCAGXI2dOljZSq1UuHFpdS0f/7/.4jW6ch2URYpy', 'Administrator', 'Authorized Personnel Only', 'administrator@saptaindra.co.id', '051-0000001', '', '2020-02-18 11:33:03', 0, 13),
(2, '2019-05-03 00:00:00', '2019-05-03 00:00:00', NULL, 'tes', '$2y$10$ES0vpcOg1NVE3wCAGXI2dOljZSq1UuHFpdS0f/7/.4jW6ch2URYpy', 'Tester', 'Authorized Personnel Only', 'administrator@saptaindra.co.id', '051-0000001', '', '2020-02-18 11:33:03', 0, 14),
(3, '2019-05-03 00:00:00', '2019-05-03 00:00:00', NULL, '34', '$2y$10$ES0vpcOg1NVE3wCAGXI2dOljZSq1UuHFpdS0f/7/.4jW6ch2URYpy', 'KM 34', 'Personalized Input Km 34', '34@saptaindra.co.id', '051-0000001', '', '2020-02-18 11:33:03', 0, 14),
(4, '2019-05-03 00:00:00', '2019-05-03 00:00:00', NULL, '65', '$2y$10$ES0vpcOg1NVE3wCAGXI2dOljZSq1UuHFpdS0f/7/.4jW6ch2URYpy', 'KM 65', 'Personalized Input Km 65', '65@saptaindra.co.id', '051-0000001', '', '2020-02-18 11:33:03', 0, 14),
(5, '2019-05-03 00:00:00', '2019-05-03 00:00:00', NULL, '69', '$2y$10$ES0vpcOg1NVE3wCAGXI2dOljZSq1UuHFpdS0f/7/.4jW6ch2URYpy', 'KM 69', 'Personalized Input Km 69', '69@saptaindra.co.id', '051-0000001', '', '2020-02-18 11:33:03', 0, 14),
(6, '2019-05-03 00:00:00', '2019-05-03 00:00:00', NULL, 'jigsaw', '$2y$10$ES0vpcOg1NVE3wCAGXI2dOljZSq1UuHFpdS0f/7/.4jW6ch2URYpy', 'tester input', 'Authorized Personnel Only', 'tester@saptaindra.co.id', '051-0000001', '', '2020-02-18 11:33:03', 0, 14),
(7, '2019-05-03 00:00:00', '2019-05-03 00:00:00', NULL, 'jigsaw2', '$2y$10$ES0vpcOg1NVE3wCAGXI2dOljZSq1UuHFpdS0f/7/.4jW6ch2URYpy', 'tester input', 'Authorized Personnel Only', 'tester@saptaindra.co.id', '051-0000001', '', '2020-02-18 11:33:03', 0, 14),
(8, '2019-05-03 00:00:00', '2019-05-03 00:00:00', NULL, 'jigsaw3', '$2y$10$ES0vpcOg1NVE3wCAGXI2dOljZSq1UuHFpdS0f/7/.4jW6ch2URYpy', 'tester input', 'Authorized Personnel Only', 'tester@saptaindra.co.id', '051-0000001', '', '2020-02-18 11:33:03', 0, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enum`
--
ALTER TABLE `enum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_enum`
--
ALTER TABLE `table_enum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_equipment`
--
ALTER TABLE `table_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_quality`
--
ALTER TABLE `table_quality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_settingunit`
--
ALTER TABLE `table_settingunit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_shiftoperations`
--
ALTER TABLE `table_shiftoperations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_shiftos`
--
ALTER TABLE `table_shiftos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_statuspassing`
--
ALTER TABLE `table_statuspassing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_supplaypassing`
--
ALTER TABLE `table_supplaypassing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_users`
--
ALTER TABLE `table_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enum`
--
ALTER TABLE `enum`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `table_enum`
--
ALTER TABLE `table_enum`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `table_equipment`
--
ALTER TABLE `table_equipment`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `table_quality`
--
ALTER TABLE `table_quality`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `table_settingunit`
--
ALTER TABLE `table_settingunit`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_shiftoperations`
--
ALTER TABLE `table_shiftoperations`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `table_shiftos`
--
ALTER TABLE `table_shiftos`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `table_statuspassing`
--
ALTER TABLE `table_statuspassing`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_supplaypassing`
--
ALTER TABLE `table_supplaypassing`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `table_users`
--
ALTER TABLE `table_users`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
