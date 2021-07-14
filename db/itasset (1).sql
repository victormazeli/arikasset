-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 04:42 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itasset`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_category`
--

CREATE TABLE `asset_category` (
  `asset_category_id` int(20) NOT NULL,
  `asset_category_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_category`
--

INSERT INTO `asset_category` (`asset_category_id`, `asset_category_desc`) VALUES
(1, 'All in one'),
(2, 'Printer'),
(3, 'Laptop'),
(5, 'Ups'),
(6, 'Scanner'),
(7, 'Copy Machine'),
(8, 'Desktop');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` varchar(200) NOT NULL,
  `user` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `office` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `extension` varchar(100) NOT NULL,
  `has_edit` int(20) NOT NULL,
  `status` int(20) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `user`, `department`, `office`, `unit`, `extension`, `has_edit`, `status`, `location_id`) VALUES
('0000', 'AJAYI MANRAJAB', 'CORPORATE SERVICES', 'ADMIN', 'UNIFORM', 'HQ/OLD BUILDING', 0, 1, 13),
('0001', 'GLORY UGOCHUKWU', 'CORPORATE SERVICES', 'ADMIN ', 'UNIFORM', 'HQ/OLD BUILDING', 0, 1, 13),
('0002', 'OMOWONUOLA FAGBEMI', 'MARKETING', 'MARKETING', 'MARKETING', 'HQ/OLD BUILDING', 0, 1, 13),
('0726', 'DAVID EYIDA', 'HUMAN RESOURCE', 'GENERAL OFFICE', 'GENERAL OFFICE', 'HQ/OLD BUILDING', 0, 1, 13),
('0774', 'CHIDINMA UGORJI', 'HUMAN RESOURCE', 'L N D', 'L N D', 'HQ/OLD BUILDING', 0, 1, 13),
('1012', 'FRANCIS OKAFOR', 'SECURITY', 'VP SECURITY', 'VP SECURITY', 'HQ/OLD BUILDING', 0, 1, 13),
('1039', 'ADENIYI ADEKALA', 'SECURITY', 'CSO`S OFFICE', 'CSO`S OFFICE', 'HQ/OLD BUILDING', 0, 1, 13),
('1350', 'INNOCENT EHIKALE', 'QUALITY, HEALTH N SAFETY', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE', 'HQ/OLD BUILDING', 0, 1, 13),
('1512', 'OMONIYI MARIAM', 'SECURITY', 'VP SECURITY', 'VP SECURITY', 'HQ/OLD BUILDING', 0, 0, 13),
('1585', 'CECILIA OGUNNUSI', 'CORPORATE SERVICES', 'PROCUREMENT', 'PROCUREMENT', 'HQ/OLD BUILDING', 0, 1, 13),
('1607', 'OLAMIDE OGUNOJUWO', 'INSURANCE', 'INSURANCE', 'INSURANCE', 'HQ/OLD BUILDING', 0, 1, 13),
('1625', 'HART ADOLPHUS', 'QUALITY, HEALTH N SAFETY', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE ', 'HQ/OLD BUILDING', 0, 1, 13),
('1638', 'EDITH EHIGIE', 'CORPORATE SERVICES', 'ADMIN', 'ADMIN', 'HQ/OLD BUILDING', 0, 1, 13),
('3217', 'BETHEL UKAERU', 'TECHNICAL N MAINTENANCE', 'TECHNICAL', 'TECHNICAL', 'HQ/OLD BUILDING', 0, 1, 13),
('3357', 'AMAKA MUANYA', 'COMMERCIAL\n', 'GLOBAL SALES N DISTR', 'GLOBAL SALES N DISTR', 'HQ/OLD BUILDING', 0, 1, 13),
('3447', 'OLUFOLAKE AJAYI', 'HUMAN RESOURCE', 'L N D', 'L N D', 'HQ/OLD BUILDING', 0, 1, 13),
('3561', 'AKEEM ABASS', 'HUMAN RESOURCE', 'HR ADVISORS', 'HR ADVISORS', 'HQ/OLD BUILDING', 0, 1, 13),
('4081', 'FRIDAY UWANNI', 'QUALITY, HEALTH N SAFETY', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE', 'HQ/OLD BUILDING', 0, 1, 13),
('4175', 'OLUGBENGA  DARAMOLA', 'GROUND OPS ', 'GROUND OPS TRAINING', 'GROUND OPS TRAINING', 'HQ/OLD BUILDING', 0, 1, 13),
('4181', 'AUDU EDACHE', 'CORPORATE SERVICES', 'ADMIN ', 'TRANSPORT ', 'HQ/OLD BUILDING', 0, 1, 13),
('4300', 'EMMANUEL NWAOHIA', 'COMMERCIAL\n', 'TRAVEL AGENCY DESK', 'TRAVEL AGENCY DESK', 'HQ/OLD BUILDING', 0, 1, 13),
('4322', 'JOESPH AGOMUO', 'CORPORATE SERVICES', 'PROTOCOL', 'PROTOCOL', 'HQ/OLD BUILDING', 0, 1, 13),
('4323', 'OLANREWAJU OTTUN', 'CORPORATE SERVICES', 'PROTOCOL', 'PROTOCOL', 'HQ/OLD BUILDING', 0, 1, 13),
('4571', 'OLUWATOYIN AGHOMI', 'HUMAN RESOURCE', 'HR MANAGER\'S OFFICE', 'HR MANAGER\'S OFFICE', 'HQ/OLD BUILDING', 0, 1, 13),
('4797', 'CATHERINE UDEH', 'COMMERCIAL', 'STAFF TRAVEL', 'STAFF TRAVEL', 'HQ/OLD BUILDING', 0, 1, 13),
('4802', 'IJEOMA AFAKWU', 'QUALITY, HEALTH N SAFETY', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE ', 'HQ/OLD BUILDING', 0, 1, 13),
('5014', 'EDDY AZIKE', 'QUALITY, HEALTH N SAFETY', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE ', 'HQ/OLD BUILDING', 0, 1, 13),
('5346', 'EMMANUEL BALAMI', 'TECHNICAL N MAINTENANCE\n', 'VP MAINTENANCE', 'VP MAINTENANCE', 'HQ/OLD BUILDING', 0, 1, 13),
('5383', 'OLUCHI IMOAGELE', 'TECHNICAL N MAINTENANCE\n', 'TECHNICAL', 'TECHNICAL', 'HQ/OLD BUILDING', 0, 1, 13),
('5460', 'ODOSOME AGBEBAKU', 'QUALITY, HEALTH N SAFETY', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE', 'HQ/OLD BUILDING', 0, 1, 13),
('5671', 'EBERE UGWU', 'TECHNICAL N MAINTENANCE', 'TECHNICAL ', 'TECHNICAL', 'HQ/OLD BUILDING', 0, 1, 13),
('6036', 'ANDREW ODION', 'COMMERCIAL\n', 'MARKETING', 'MARKETING', 'HQ/OLD BUILDING', 0, 1, 13),
('6141', 'ISAH IBRAHIM', 'CORPORATE SERVICES', 'ADMIN ', 'ADMIN ', 'HQ/OLD BUILDING', 0, 1, 13),
('6395', 'PATIENCE AHAMS\n', 'CORPORATE SERVICES', 'ADMIN', 'ADMIN', 'HQ/OLD BUILDING', 0, 1, 13),
('6467', 'ENOH UMUOKORO', 'HUMAN RESOURCE', 'GENERAL OFFICE', 'GENERAL OFFICE', 'HQ/OLD BUILDING', 0, 1, 13),
('6527', 'TOLULOPE OLAOSEBIKAN', 'COMMERCIAL', 'MARKETING', 'MARKETING', 'HQ/OLD BUILDING', 0, 1, 13),
('6716', 'PETER OGUNSANMI', 'HUMAN RESOURCE', 'HR MANAGER\'S OFFICE', 'HR MANAGER\'S OFFICE', 'HQ/OLD BUILDING', 0, 1, 13),
('7008', 'BELLA UGO-ONOGU', 'CORPORATE SERVICES', 'ADMIN', 'ADMIN', 'HQ/OLD BUILDING', 0, 1, 13),
('7036', 'NNEKA OKOLONJI', 'COMMERCIAL\n', 'GLOBAL SALES N DISTR', 'GLOBAL SALES N DISTR', 'HQ/OLD BUILDING', 0, 1, 13),
('7041', 'BELLA CHIKELU', 'HUMAN RESOURCE', 'L N D', 'L N D', 'HQ/OLD BUILDING', 0, 1, 13),
('7054', 'TOYIN ADEDAPO', 'COMMERCIAL\n', 'CORPORATE SALES', 'CORPORATE SALES', 'HQ/OLD BUILDING', 0, 1, 13),
('7111', 'OLUFELA KUBOYE', 'GROUND OPS', 'TRAINING', 'TRAINING', 'HQ/OLD BUILDING', 0, 1, 13),
('7115', 'UBA UCHENNA', 'COMMERCIAL', 'REFUND', 'REFUND', 'HQ/OLD BUILDING', 0, 1, 13),
('7120', 'STELLA OSAKWE', 'COMMERCIAL\n', 'NETWORK PLANNING', 'NETWORK PLANNING', 'HQ/OLD BUILDING', 0, 1, 13),
('7136', 'OLA ADEBANJI', 'COMMERCIAL', 'MARKETING', 'MARKETING', 'HQ/OLD BUILDING', 0, 1, 13),
('7278', 'CHARITY ENAH-EJEMBI', 'COMMERCIAL\n', 'TRO TRAINER\'S', 'TRO TRAINER\'S', 'HQ/OLD BUILDING', 0, 1, 13),
('7298', 'CHARLES NWAMADI', 'COMMERCIAL\n', 'TRAVEL AGENCY DESK', 'TRAVEL AGENCY DESK', 'HQ/OLD BUILDING', 0, 1, 13),
('7356', 'PRINCE AHUCHAOGU', 'COMMERCIAL', 'REFUND', 'REFUND', 'HQ/OLD BUILDING', 0, 1, 13),
('7391', 'JOESPH TOSIN', 'MARKETING', 'MARKETING', 'MARKETING', 'HQ/OLD BUILDING', 0, 1, 13),
('7592', 'OJEVWE GBOGIDI', 'COMMERCIAL\n', 'GLOBAL SALES N DISTR', 'GLOBAL SALES N DISTR', 'HQ/OLD BUILDING', 0, 1, 13),
('7593', 'TEMITOPE OMOLEWU', 'COMMERCIAL\n', 'TRO TRAINER\'S', 'TRO TRAINER\'S', 'HQ/OLD BUILDING', 0, 1, 13),
('7612', 'ODINAKA OJUKWU', 'COMMERCIAL\n', 'CORPORATE SALES', 'CORPORATE SALES', 'HQ/OLD BUILDING', 0, 1, 13),
('7614', 'KIKELOMO LAWAL', 'COMMERCIAL', 'REFUND', 'REFUND', 'HQ/OLD BUILDING', 0, 1, 13),
('7663', 'AZUWUIKE IHEKUNA', 'COMMERCIAL', 'REFUND', 'REFUND', 'HQ/OLD BUILDING', 0, 1, 13),
('7666', 'UMOH ENOH', 'COMMERCIAL', 'REFUND', 'REFUND', 'HQ/OLD BUILDING', 0, 1, 13),
('7739', 'IDOWU DAWODU', 'COMMERCIAL\n', 'GLOBAL SALES N DISTR', 'GLOBAL SALES N DISTR', 'HQ/OLD BUILDING', 0, 1, 13),
('7763', 'ENIOLA OLUWOLE', 'COMMERCIAL', 'REFUND', 'REFUND', 'HQ/OLD BUILDING', 0, 1, 13),
('7792', 'IDARESIT ESSIEN', 'HUMAN RESOURCE', 'HR ADVISORS', 'HR ADVISORS', 'HQ/OLD BUILDING', 0, 1, 13),
('7809', 'NKEBET ESEN', 'COMMERCIAL', 'STAFF TRAVEL', 'STAFF TRAVEL', 'HQ/OLD BUILDING', 0, 1, 13),
('7816', 'BOSEDE OLADIMEJI', 'CORPORATE SERVICES', 'PROCUREMENT', 'PROCUREMENT', 'HQ/OLD BUILDING', 0, 1, 13),
('7836', 'OBAFEMI AKINTOYE', 'COMMERCIAL\n', 'TRAVEL AGENCY DESK', 'TRAVEL AGENCY DESK', 'HQ/OLD BUILDING', 0, 1, 13),
('7909', 'OMOBOLA ODUNUGA', 'CORPORATE SERVICES', 'PROCUREMENT', 'PROCUREMENT', 'HQ/OLD BUILDING', 0, 1, 13),
('8011', 'ADEBOWALE ASAYE', 'HUMAN RESOURCE', 'HR MANAGER\'S OFFICE', 'HR MANAGER\'S OFFICE', 'HQ/OLD BUILDING', 0, 1, 13),
('8023', 'KATE OBASI', 'HUMAN RESOURCE', 'GENERAL OFFICE', 'GENERAL OFFICE', 'HQ/OLD BUILDING', 0, 1, 13),
('8034', 'OLUBUNMI AFUSANYA', 'HUMAN RESOURCE', 'GENERAL OFFICE', 'GENERAL OFFICE', 'HQ/OLD BUILDING', 0, 1, 13),
('8051', 'IRIBHOGBE ASIBOR', 'HUMAN RESOURCE', 'L N D', 'L N D', 'HQ/OLD BUILDING', 0, 1, 13),
('8058', 'IJEOMA IKE-OKEREKE', 'HUMAN RESOURCE', 'VP HR', 'VP HR', 'HQ/OLD BUILDING', 0, 1, 13),
('8060', 'ELIZABETH RICHARDS', 'HUMAN RESOURCE', 'L N D', 'L N D', 'HQ/OLD BUILDING', 0, 1, 13),
('AD00', 'ADMIN', 'CORPORATE SERVICES', 'ADMIN', 'ADMIN', 'HQ/OLD BUILDING', 0, 1, 13),
('COR0', 'CORPORATE SALES', 'COMMERCIAL\n', 'CORPORATE SALES', 'CORPORATE SALES', 'HQ/OLD BUILDING', 0, 1, 13),
('GL00', 'GLOBAL SALES N DISTR', 'COMMERCIAL\n', 'GLOBAL SALES N DISTR', 'GLOBAL SALES N DISTR', 'HQ/OLD BUILDING', 0, 1, 13),
('HRM0', 'HR MANAGER\'S OFFICE ', 'HUMAN RESOURCE', 'HR MANAGER\'S OFFICE', 'HR MANAGER\'S OFFICE', 'HQ/OLD BUILDING', 0, 1, 13),
('LND0', 'L N D', 'HUMAN RESOURCE', 'L N D', 'L N D', 'HQ/OLD BUILDING', 0, 1, 13),
('MRK0', 'MARKETING', 'COMMERCIAL', 'MARKETING', 'MARKETING', 'HQ/OLD BUILDING', 0, 1, 13),
('PR0', 'PROCUREMENT', 'CORPORATE SERVICES', 'PROCUREMENT', 'PROCUREMENT', 'HQ/OLD BUILDING', 0, 1, 13),
('PRO0', 'PROTOCOL', 'CORPORATE SERVICES', 'PROTOCOL', 'PROTOCOL', 'HQ/OLD BUILDING', 0, 1, 13),
('QUA0', 'QUALITY ASSURANCE', 'QUALITY, HEALTH N SAFETY', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE ', 'HQ/OLD BUILDING', 0, 1, 13),
('REF0', 'REFUND', 'COMMERCIAL', 'REFUND', 'REFUND', 'HQ/OLD BUILDING', 0, 1, 13),
('STR0', 'STAFFT TRAVEL', 'COMMERCIAL', 'STAFF TRAVEL', 'STAFF TRAVEL', 'HQ/OLD BUILDING', 0, 1, 13),
('TEC0', 'TECHNICAL', 'TECHNICAL N MAINTENANCE', 'TECHNICAL', 'TECHNICAL', 'HQ/OLD BUILDING', 0, 1, 13),
('TR00', 'TRAVEL AGENCY DESK', 'COMMERCIAL\n', 'TRAVEL AGENCY DESK', 'TRAVEL AGENCY DESK', 'HQ/OLD BUILDING', 0, 1, 13),
('TRA0', 'TRANSPORT\n', 'CORPORATE SERVICES', 'ADMIN', 'TRANSPORT', 'HQ/OLD BUILDING', 0, 1, 13),
('TRN00', 'TRAINING', 'GROUND OPS', 'TRAINING', 'TRAINING', 'HQ/OLD BUILDING', 0, 1, 13),
('UN00', 'UNIFORM', 'CORPORATE SERVICES', 'ADMIN', 'UNIFORM', 'HQ/OLD BUILDING', 0, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `employee_asset`
--

CREATE TABLE `employee_asset` (
  `employee_asset_id` int(20) NOT NULL,
  `asset_id` int(20) NOT NULL,
  `employee_id` varchar(200) NOT NULL,
  `date_assigned` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transfer_status` int(11) NOT NULL,
  `transfer_date` datetime NOT NULL,
  `location_id` int(20) NOT NULL,
  `tr_response` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_asset`
--

INSERT INTO `employee_asset` (`employee_asset_id`, `asset_id`, `employee_id`, `date_assigned`, `transfer_status`, `transfer_date`, `location_id`, `tr_response`) VALUES
(1, 8, '0000', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(2, 5, 'UN00', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(3, 2, 'UN00', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(4, 8, 'TRA0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(5, 3, '7136', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(6, 2, 'MRK0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(7, 3, '6527', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(8, 8, '7666', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(9, 1, '7763', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(10, 2, 'STR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(11, 1, 'STR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(12, 6, 'STR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(13, 6, 'STR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(14, 5, '4797', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(15, 5, 'STR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(16, 5, '7763', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(17, 1, '7809', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(18, 8, '7614', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(19, 2, 'REF0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(20, 8, '7115', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(21, 1, '7663', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(22, 5, '7666', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(23, 1, '7356', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(24, 5, '7115', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(25, 5, '7592', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(26, 1, '3357', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(27, 1, '7036', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(28, 5, '7036', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(29, 5, 'GL00', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(30, 1, 'TR00', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(31, 1, '7298', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(32, 2, 'TR00', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(33, 3, '7120', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(34, 3, '7593', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(35, 3, '7278', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(36, 3, '7146', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(37, 1, '7054', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(38, 8, 'COR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(39, 8, 'COR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(40, 1, 'COR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(41, 3, '7739', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(42, 2, 'GL00', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(43, 8, '4300', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(44, 5, 'TR00', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(45, 3, '7836', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(46, 2, 'TR00', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(47, 1, 'COR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(48, 8, 'COR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(49, 8, 'COR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(50, 8, 'COR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(51, 2, 'COR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(52, 3, '7612', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(53, 8, '0001', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(54, 8, '4181', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(55, 5, '4181', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(56, 2, '4181', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(57, 8, '4323', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(58, 5, 'PRO0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(59, 8, '4322', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(60, 2, 'PRO0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(61, 8, '6141', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(62, 2, '6141', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(63, 2, '1638', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(64, 5, '1638', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(65, 1, '6395', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(66, 2, '6395', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(67, 5, '6395', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(68, 8, '1638', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(69, 1, '7909', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(70, 5, '7909', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(71, 2, '7909', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(72, 3, '1585', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(73, 2, 'PR0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(74, 3, '7816', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(75, 2, '7008', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(76, 1, '7008', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(77, 3, '0001', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(78, 3, 'AD00', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(79, 5, '7008', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(80, 2, 'TRN00', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(81, 3, '7111', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(82, 3, '4175', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(83, 8, '0774', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(84, 8, '3447', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(85, 8, '8051', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(86, 5, '8051', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(87, 2, '1625', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(88, 2, 'LND0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(89, 7, 'LND0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(90, 3, '6716', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(91, 2, 'HRM0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(92, 8, '8060', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(93, 8, '7041', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(94, 5, '8060', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(95, 5, '8023', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(96, 3, '4571', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(97, 3, '8011', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(98, 8, '7792', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(99, 8, '3561', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(100, 2, '8058', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(101, 1, '8034', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(102, 8, '6467', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(103, 3, '8058', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(104, 8, '0726', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(105, 3, '1607', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(106, 2, '1607', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(107, 3, 'MRK0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(108, 3, '0002', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(109, 8, '0739', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(110, 5, '0739', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(111, 2, '0739', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(112, 3, '5460', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(113, 3, '4081', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(114, 2, '4081', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(115, 8, '5014', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(116, 5, '5014', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(117, 8, '1625', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(118, 5, '1625', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(119, 3, '4802', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(120, 2, 'QUA0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(121, 2, 'QUA0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(122, 8, '1350', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(123, 5, '1350', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(124, 2, '1012', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(125, 1, '1012', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(126, 5, '1012', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(127, 2, '1512', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(128, 2, '1512', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(129, 8, '1512', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(130, 5, '1512', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(131, 1, '1039', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(132, 2, '1039', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(133, 5, '1039', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(134, 2, 'TEC0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(135, 5, 'TEC0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(136, 8, '3217', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(137, 2, 'TEC0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(138, 2, '5671', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(139, 5, '5671', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(140, 8, '5671', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(141, 8, 'TEC0', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(142, 8, '5383', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(143, 3, '5346', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(144, 2, '5346', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0),
(145, 3, '6036', '2019-12-10 15:41:54', 0, '0000-00-00 00:00:00', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `it_asset`
--

CREATE TABLE `it_asset` (
  `asset_id` int(20) NOT NULL,
  `asset_category_id` int(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `serialno` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `hdd` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `con` varchar(20) NOT NULL,
  `has_edit` int(20) NOT NULL,
  `location_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_asset`
--

INSERT INTO `it_asset` (`asset_id`, `asset_category_id`, `description`, `serialno`, `ram`, `hdd`, `os`, `processor`, `con`, `has_edit`, `location_id`) VALUES
(1, 8, 'HP 280 G2 MT', '4CE6470JO2', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(2, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(3, 2, 'HP LASER JET P2015', 'CNBW734766', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(4, 8, 'HP COMPAQ DC5700 SFF', '2UA72815WY', '4GB', '500GB', 'WIN XP', 'NA', 'out of service', 0, 13),
(5, 3, 'HP PROBOin service 450 G2', 'CND4382WN9', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(6, 2, 'HP LASER JET P4014N', 'CNFX306105', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(7, 3, 'HP 250 G4 NOTEBOin service', 'CND60311V2', '4GB', '500GB', 'WIN 7', 'CORE I3', 'in service', 0, 13),
(8, 8, 'HP 280 G2MT', 'CZC70779DCJ', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(9, 1, 'HP COMPAQ ELITE 8300', 'CZC311PSR', '4GB', '500GB', 'WIN 10', 'CORE I5', 'in service', 0, 13),
(10, 2, 'HP LASERJET P4015N', 'CNFY254145', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(11, 1, 'HP COMPAQ ELITE 8300', 'CZC3111PTI', '4GB', '500GB', 'WIN 10', 'CORE I5', 'out of service', 0, 13),
(12, 6, 'HP SCANJET G3110', 'CN26IAOJN', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(13, 6, 'HP SCANJET G3110', 'CN35TBAO61', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(14, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(15, 5, 'APC 800VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(16, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(17, 1, 'HP 3520 ', 'CZC304FZ', '4GB', '500GB', 'WIN 7', 'CORE I3', 'in service', 0, 13),
(18, 8, 'HP 280 G2MT', '8CG83714F4', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(19, 2, 'HP LASER PRO MA P225DN', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(20, 8, 'HP 290 G2MT', 'CZC7079DKY', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(21, 1, 'HP COMPAQ ELITE 8300', '3CR53102C8', '4GB', '1TB', 'WIN 8', 'CORE I3', 'in service', 0, 13),
(22, 5, 'APC 800VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(23, 1, 'HP PAVILON 20', '4CS3205J7', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(24, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(25, 5, 'APC 750VA', '4CE6470JRB', '4GB', '500GB', 'WIN 10', 'CORE I3', 'out of service', 0, 13),
(26, 1, 'HP 3520 ', 'CZC34032LV', '4GB', '500GB', 'WIN 7', 'CORE I3', 'in service', 0, 13),
(27, 1, 'HP 3520 ', 'CZC34032LL', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(28, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(29, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(30, 1, 'DELL OPTIPLEX 3030', '44ZHRJD2', '2GB', '500GB', 'WIN 7', 'CORE ', 'in service', 0, 13),
(31, 1, 'HP COMPAQ ELITE 8300', 'CZC3111PX3', '4GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(32, 2, 'HP COLOR LASERJET CM 1312', 'CND895JP9Q', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 13),
(33, 3, 'HP PRO BOin service 6470B', 'CND4382WF9', '4GB', '500GB', 'WIN 8.1', 'CORE 15', 'in service', 0, 13),
(34, 3, 'HP PRO BOin service 450 G2', 'CND4382WF7', '4GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(35, 3, 'HP PRO BOin service 6470B', 'CND4382WF8', '4GB', '500GB', 'WIN 10', 'CORE I5', 'in service', 0, 13),
(36, 3, 'HP PRO BOin service 6470B', 'CND4382WF6', '4GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(37, 1, 'OPTIPLEX 3030 1', 'HZHBDD2', '4GB', '500GB', 'WIN 7', 'CORE I3', 'in service', 0, 13),
(38, 8, 'HP COMPAQ', 'CZC8321706', '4GB', '500GB', 'WIN 7', 'CORE', 'out of service', 0, 13),
(39, 8, 'HP COMPAQ', 'MXL63600FY', '4GB', '500GB', 'WIN 7', 'CORE', 'out of service', 0, 13),
(40, 1, 'DELL OPTIPLEX 3030 ', 'HZHNL82', '4GB', '500GB', 'WIN 7', 'CORE', 'in service', 0, 13),
(41, 3, 'HP 250G6 NOTEBOin service PC', 'CND7374S49', '4GB', '500GB ', 'WIN 10', 'CORE I5', 'in service', 0, 13),
(42, 2, 'HP LASERJET P4015N', 'CNFY197849', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(43, 8, 'HP 280G2 MT', 'CZC70790DMN', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(44, 5, 'APC 800VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(45, 3, 'HP 630 NOTEBOin service PC', 'NA', '4GB', '500GB', 'WIN 7', 'CORE', 'in service', 0, 13),
(46, 2, 'LASERJET PRO MFP M225DN', 'CND877YDGI', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(47, 1, 'HP COMPAQ ELITE 8300', 'CZC3111PSX', '4GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(48, 8, 'HP COMPAQ', 'CZC94781FM', 'NA', 'NA', 'WIN 10', 'NA', 'out of service', 0, 13),
(49, 8, 'HP COMPAQ', 'CZC2379LF4', 'NA', 'NA', 'WIN 7', 'NA', 'out of service', 0, 13),
(50, 8, 'HP COMPAQ ', 'CZC832178M', 'NA', 'NA', 'WIN 7', 'NA', 'out of service', 0, 13),
(51, 2, 'HP LASERJET PRO 400', 'CND8F6164K', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(52, 3, 'HP COMPAQ 6710B', 'CNU738YJP', '4GB', '500GB', 'WIN 7', 'CORE', 'out of service', 0, 13),
(53, 8, 'HP 500 BMT', 'MXL132IM4N', '4GB', '500GB', 'WIN 7', 'CORE', 'in service', 0, 13),
(54, 8, 'HP 280G1 MT BUSINESS', 'TRF51103R8', '4GB', '500GB', 'WIN 10', 'CORE', 'in service', 0, 13),
(55, 5, 'APC 1500VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(56, 2, 'HP LJ PRO MFD M227SDN', 'VNC3P204453', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(57, 8, 'HP COMPAQ DC5700 SFF', 'USH749070G', '4GB', '500GB', 'WIN 8', 'PENTIUM', 'in service', 0, 13),
(58, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(59, 8, 'HP PRO 3500 SERIES MT', 'CZC23562XV', '4GB', '500GB', 'WIN 8.1', 'CORE', 'in service', 0, 13),
(60, 2, 'HP COLOR LJ PRO MFP 280', 'VNBNL42HIV', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(61, 8, 'HP COMPAQ ELITE 8300 SFF', 'CZC9478L53', '4GB', '500GB', 'WIN 10', 'PENTIUM\n', 'in service', 0, 13),
(62, 2, 'HP LASER JET P40KIN', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(63, 2, 'LASER JET 100 COLOR MFP M175', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(64, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(65, 1, 'HP COMPAQ ELITE 8300', 'USH347A0F8', '8GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(66, 2, 'HP COLOR LJ PRO MFP M477FDN', 'VNB8HBPD15', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(67, 5, 'APC 1000 VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(68, 8, 'HP COMPAQ DC 7900 SFF', 'CZC931BRSY', '4GB', '500GB', 'WIN 8', 'CORE', 'in service', 0, 13),
(69, 1, 'HP PRO ONE 400 G3 ', 'CZC7527SLG', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(70, 5, 'APC 800VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(71, 2, 'HP LASERJET MFP M227 FDW', 'VNC4G08027', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(72, 3, 'HP PRO BOin service 4540S ', '2CE3180QWX', '4GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(73, 2, 'HP LASERJET 100 COLOR MFP', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(74, 3, 'HP PRO BOin service 450 G3', '5CD748BRQW', '4GB', '500GB', 'WIN 10', 'CORE I5 ', 'in service', 0, 13),
(75, 2, 'HP LASERJET PRO MFP M28 HDW', 'VNBNL3G73S', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(76, 1, 'HP PRO 3520 ', 'CZC3403213', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(77, 3, 'HP PRO BOin service 450', 'CND4443LSX', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(78, 3, 'HP PRO BOin service 450 ', 'CND4382WWK', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(79, 5, 'APC 750VA', 'NA\n', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(80, 2, 'HP COLOR LJ PRO CM1415 MFP', 'CNJ6D4FI6W', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(81, 3, 'HP PRO BOin service 4440S', '2CE3170YDG', '4GB', '500GB  ', 'WIN 10', 'CORE I5', 'in service', 0, 13),
(82, 3, 'HP 250 G5 NOTEBOin service ', 'CND6508QK5', '4GB', '500GB', 'WIN 10 ', 'CORE I5', 'in service', 0, 13),
(83, 8, 'HP 280 G2 MT', 'CZC7079DB3', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(84, 8, 'HP 280 G2 SFF', '4CE6470KDK', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(85, 8, 'HP 280 G2 MT', 'CZC710B6TY', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(86, 5, 'APC 800', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 0, 13),
(87, 2, 'HP LASERJET 300 COLOR MFP M375NW', 'CND8F8JB7C', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(88, 2, 'HP LASERJET 4250', 'CNHXR28606', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(89, 7, 'SHARP ARM 207', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(90, 3, 'HP PRO BOin service 450G4', 'NA', '4GB', '500GB', 'WIN 10', 'CORE I5', 'in service', 0, 13),
(91, 2, 'HP COLOR LJ 100 MFH M175NW', 'CND8F3D1QL', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(92, 8, 'HP 280G2 MT ', 'CZC723B4V3', '4GB', '500GB', 'WIN10', 'CORE I3', 'in service', 0, 13),
(93, 8, 'HP 280G2 MT', 'CZC7079DJG', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(94, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(95, 5, 'APC 1500VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(96, 3, 'HP 250G5', 'CND6250INB', '4GB', '500GB', 'WIN 7', 'CORE I3', 'in service', 0, 13),
(97, 3, 'HP 250G5 NOTEBOin service', 'CND70234RN', '4GB', '500GB', 'WIN 10', 'CORE I5 ', 'in service', 0, 13),
(98, 8, 'HP 280G2 SFF', '4CE6470KO2', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(99, 8, 'HP 280 G2MT', 'CZC7077FNX', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(100, 2, 'HP LASERJET PRO 400 MFF', 'CND8FD6C85', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(101, 1, 'HP 3520 ', 'CZC34032CB', '4GB', '500GB', 'WIN 7', 'CORE I3', 'in service', 0, 13),
(102, 8, 'HP 280 G2MT ', 'CZC70Z7FDX', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(103, 3, 'HP PRO BOin service 450 G3', 'NA', '4GB', '500GB', 'WIN 10', 'CORE I5', 'in service', 0, 13),
(104, 8, 'HP COMPAQ 6200 PRO', 'CZC2379LFQ', '2GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(105, 3, 'HP PRO BOin service 4540S ', '2CE3I80NX9', '4GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(106, 2, 'LASER JET 100 COLOR MFP M175', 'CND8F4RCKR', '4GB', '500GB', 'WIN 7', '', 'in service', 0, 13),
(107, 3, 'HP PROBOin service 4530S', '2CE3221XS6', '4GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(108, 3, 'HP PROBOin service 4540S', 'USH30IAODS', '4GB', '500GB', 'WIN 10', 'CORE I5', 'in service', 0, 13),
(109, 8, 'HP 280 G2 MT', 'CZCC63075PB', '4GB', '500GB', 'WIN 10', 'CORE', 'in service', 0, 13),
(110, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(111, 2, 'HP COLOR LASER JET PRO 300 ', 'CND8F53GQ3', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(112, 3, 'HP PAVILLION G6 NOTEBOin service', 'NA', '4GB', '500GB', 'WIN 10 ', 'CORE I3', 'in service', 0, 13),
(113, 3, 'HP PROBOin service 450 G3', '5CD8100JN3', '4GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(114, 2, 'LASER JET PRO MFD M227SDN', 'VNC4GB08154', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(115, 8, 'HP 280 G2 SFF ', '4CE6470JIG', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(116, 5, 'APC 750VA ', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(117, 8, 'HP COMPAQ 8000 ELITE SFF ', 'CZC036524B', '3GB', '500GB', 'WIN 7', 'CORE', 'in service', 0, 13),
(118, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(119, 3, 'HP PRO', 'CND7374S35', '4GB', '500GB', 'WIN 10', 'CORE I5', 'in service', 0, 13),
(120, 2, 'HP LASERJET 4250N', 'CNHXP67434', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(121, 2, 'HP COLOR LJ PRO 300 MFP M375NW', 'CND87BB8LN', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(122, 8, 'HP 280 G2 SFF', '4CE7061CJH', '4GB', '500GB', 'WIN 10', 'CORE I5', 'in service', 0, 13),
(123, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(124, 2, 'HP COLOR LJ 100 MFP M175', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(125, 1, 'HP PRO ONE 400 G3 ', 'CZC75275KI', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(126, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(127, 2, 'HP COLOR LJ PRO CM1415 MFP', 'CNJ6D4COWK', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(128, 2, 'HID FARGO HDP5000', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(129, 8, 'HP 280 G2 MT BUSINESS PC', 'CZC7079DBV', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(130, 5, 'APC 800VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(131, 1, 'HP PRO ONE 400 G1', 'CZC42025IH', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(132, 2, 'HP COLOR LASER JET PRO', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(133, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(134, 2, 'LASERJET PRO MFP M225DN', 'CNB9H3492G', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(135, 5, 'APC 1500VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(136, 8, 'HP 280 G2 SSF BUSINESS PC', '4CEE470K00', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(137, 2, 'HP LASER JET 1320', 'CNHK38949', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(138, 2, 'HP LASERJET 100 COLOR MFP', 'NA', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(139, 5, 'APC 750VA', 'NA', 'NA', 'NA', 'NA', 'NA', 'out of service', 0, 13),
(140, 8, 'HP COMPAQ ELITE', 'NA', '4GB', '500GB', 'WIN 7', 'CORE I5', 'in service', 0, 13),
(141, 8, 'HP 280 G2 SFF', '4CE6470JR9', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(142, 8, 'HP 280 G2 MT', 'CZC7077FW2', '4GB', '500GB', 'WIN 10', 'CORE I3', 'in service', 0, 13),
(143, 3, 'HP 250 G5 NOTEBOin service PC', 'CND628IYG9', '4GB', '500GB', 'WIN 7', 'CORE I3', 'in service', 0, 13),
(144, 2, 'HP COLOR LJ PRO MFP M281 FDN', 'VNBNK923BP', 'NA', 'NA', 'NA', 'NA', 'in service', 0, 13),
(145, 3, 'HP PROBOin service 450 G4', '5CD7480NF1', '8GB', '1TB', 'WIN 10', 'CORE I7', 'in service', 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `it_asset_inventory`
--

CREATE TABLE `it_asset_inventory` (
  `it_asset_inventory_id` int(11) NOT NULL,
  `asset_id` int(20) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it_asset_inventory`
--

INSERT INTO `it_asset_inventory` (`it_asset_inventory_id`, `asset_id`, `entry_date`, `status`) VALUES
(1, 1, '2019-12-09 10:10:38', 1),
(2, 2, '2019-12-09 10:10:38', 1),
(3, 3, '2019-12-09 10:10:38', 1),
(4, 4, '2019-12-09 10:10:38', 1),
(5, 5, '2019-12-09 10:10:38', 1),
(6, 6, '2019-12-09 10:10:38', 1),
(7, 7, '2019-12-09 10:10:38', 1),
(8, 8, '2019-12-09 10:10:38', 1),
(9, 9, '2019-12-09 10:10:38', 1),
(10, 10, '2019-12-09 10:10:38', 1),
(11, 11, '2019-12-09 10:10:38', 1),
(12, 12, '2019-12-09 10:10:38', 1),
(13, 13, '2019-12-09 10:10:38', 1),
(14, 14, '2019-12-09 10:10:38', 1),
(15, 15, '2019-12-09 10:10:38', 1),
(16, 16, '2019-12-09 10:10:38', 1),
(17, 17, '2019-12-09 10:10:38', 1),
(18, 18, '2019-12-09 10:10:38', 1),
(19, 19, '2019-12-09 10:10:38', 1),
(20, 20, '2019-12-09 10:10:38', 1),
(21, 21, '2019-12-09 10:10:38', 1),
(22, 22, '2019-12-09 10:10:38', 1),
(23, 23, '2019-12-09 10:10:38', 1),
(24, 24, '2019-12-09 10:10:38', 1),
(25, 25, '2019-12-09 10:10:38', 1),
(26, 26, '2019-12-09 10:10:38', 1),
(27, 27, '2019-12-09 10:10:38', 1),
(28, 28, '2019-12-09 10:10:38', 1),
(29, 29, '2019-12-09 10:10:38', 1),
(30, 30, '2019-12-09 10:10:38', 1),
(31, 31, '2019-12-09 10:10:38', 1),
(32, 32, '2019-12-09 10:10:38', 1),
(33, 33, '2019-12-09 10:10:38', 1),
(34, 34, '2019-12-09 10:10:38', 1),
(35, 35, '2019-12-09 10:10:38', 1),
(36, 36, '2019-12-09 10:10:38', 1),
(37, 37, '2019-12-09 10:10:38', 1),
(38, 38, '2019-12-09 10:10:38', 1),
(39, 39, '2019-12-09 10:10:38', 1),
(40, 40, '2019-12-09 10:10:38', 1),
(41, 41, '2019-12-09 10:10:38', 1),
(42, 42, '2019-12-09 10:10:38', 1),
(43, 43, '2019-12-09 10:10:38', 1),
(44, 44, '2019-12-09 10:10:38', 1),
(45, 45, '2019-12-09 10:10:38', 1),
(46, 46, '2019-12-09 10:10:38', 1),
(47, 47, '2019-12-09 10:10:38', 1),
(48, 48, '2019-12-09 10:10:38', 1),
(49, 49, '2019-12-09 10:10:38', 1),
(50, 50, '2019-12-09 10:10:38', 1),
(51, 51, '2019-12-09 10:10:38', 1),
(52, 52, '2019-12-09 10:10:38', 1),
(53, 53, '2019-12-09 10:10:38', 1),
(54, 54, '2019-12-09 10:10:38', 1),
(55, 55, '2019-12-09 10:10:38', 1),
(56, 56, '2019-12-09 10:10:38', 1),
(57, 57, '2019-12-09 10:10:38', 1),
(58, 58, '2019-12-09 10:10:38', 1),
(59, 59, '2019-12-09 10:10:38', 1),
(60, 60, '2019-12-09 10:10:38', 1),
(61, 61, '2019-12-09 10:10:38', 1),
(62, 62, '2019-12-09 10:10:38', 1),
(63, 63, '2019-12-09 10:10:38', 1),
(64, 64, '2019-12-09 10:10:38', 1),
(65, 65, '2019-12-09 10:10:38', 1),
(66, 66, '2019-12-09 10:10:38', 1),
(67, 67, '2019-12-09 10:10:38', 1),
(68, 68, '2019-12-09 10:10:38', 1),
(69, 69, '2019-12-09 10:10:38', 1),
(70, 70, '2019-12-09 10:10:38', 1),
(71, 71, '2019-12-09 10:10:38', 1),
(72, 72, '2019-12-09 10:10:38', 1),
(73, 73, '2019-12-09 10:10:38', 1),
(74, 74, '2019-12-09 10:10:38', 1),
(75, 75, '2019-12-09 10:10:38', 1),
(76, 76, '2019-12-09 10:10:38', 1),
(77, 77, '2019-12-09 10:10:38', 1),
(78, 78, '2019-12-09 10:10:38', 1),
(79, 79, '2019-12-09 10:10:38', 1),
(80, 80, '2019-12-09 10:10:38', 1),
(81, 81, '2019-12-09 10:10:38', 1),
(82, 82, '2019-12-09 10:10:38', 1),
(83, 83, '2019-12-09 10:10:38', 1),
(84, 84, '2019-12-09 10:10:38', 1),
(85, 85, '2019-12-09 10:10:38', 1),
(86, 86, '2019-12-09 10:10:38', 1),
(87, 87, '2019-12-09 10:10:38', 1),
(88, 88, '2019-12-09 10:10:38', 1),
(89, 89, '2019-12-09 10:10:38', 1),
(90, 90, '2019-12-09 10:10:38', 1),
(91, 91, '2019-12-09 10:10:38', 1),
(92, 92, '2019-12-09 10:10:38', 1),
(93, 93, '2019-12-09 10:10:38', 1),
(94, 94, '2019-12-09 10:10:38', 1),
(95, 95, '2019-12-09 10:10:38', 1),
(96, 96, '2019-12-09 10:10:38', 1),
(97, 97, '2019-12-09 10:10:38', 1),
(98, 98, '2019-12-09 10:10:38', 1),
(99, 99, '2019-12-09 10:10:38', 1),
(100, 100, '2019-12-09 10:10:38', 1),
(101, 101, '2019-12-09 10:10:38', 1),
(102, 102, '2019-12-09 10:10:38', 1),
(103, 103, '2019-12-09 10:10:38', 1),
(104, 104, '2019-12-09 10:10:38', 1),
(105, 105, '2019-12-09 10:10:38', 1),
(106, 106, '2019-12-09 10:10:38', 1),
(107, 107, '2019-12-09 10:10:38', 1),
(108, 108, '2019-12-09 10:10:38', 1),
(109, 109, '2019-12-09 10:10:38', 1),
(110, 110, '2019-12-09 10:10:38', 1),
(111, 111, '2019-12-09 10:10:38', 1),
(112, 112, '2019-12-09 10:10:38', 1),
(113, 113, '2019-12-09 10:10:38', 1),
(114, 114, '2019-12-09 10:10:38', 1),
(115, 115, '2019-12-09 10:10:38', 1),
(116, 116, '2019-12-09 10:10:38', 1),
(117, 117, '2019-12-09 10:10:38', 1),
(118, 118, '2019-12-09 10:10:38', 1),
(119, 119, '2019-12-09 10:10:38', 1),
(120, 120, '2019-12-09 10:10:38', 1),
(121, 121, '2019-12-09 10:10:38', 1),
(122, 122, '2019-12-09 10:10:38', 1),
(123, 123, '2019-12-09 10:10:38', 1),
(124, 124, '2019-12-09 10:10:38', 1),
(125, 125, '2019-12-09 10:10:38', 1),
(126, 126, '2019-12-09 10:10:38', 1),
(127, 127, '2019-12-09 10:10:38', 1),
(128, 128, '2019-12-09 10:10:38', 1),
(129, 129, '2019-12-09 10:10:38', 1),
(130, 130, '2019-12-09 10:10:38', 1),
(131, 131, '2019-12-09 10:10:38', 1),
(132, 132, '2019-12-09 10:10:38', 1),
(133, 133, '2019-12-09 10:10:38', 1),
(134, 134, '2019-12-09 10:10:38', 1),
(135, 135, '2019-12-09 10:10:38', 1),
(136, 136, '2019-12-09 10:10:38', 1),
(137, 137, '2019-12-09 10:10:38', 1),
(138, 138, '2019-12-09 10:10:38', 1),
(139, 139, '2019-12-09 10:10:38', 1),
(140, 140, '2019-12-09 10:10:38', 1),
(141, 141, '2019-12-09 10:10:38', 1),
(142, 142, '2019-12-09 10:10:38', 1),
(143, 143, '2019-12-09 10:10:38', 1),
(144, 144, '2019-12-09 10:10:38', 1),
(145, 145, '2019-12-09 10:10:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(20) NOT NULL,
  `location_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`) VALUES
(1, 'Abuja'),
(2, 'Asaba'),
(3, 'Benin'),
(4, 'Bauchi'),
(5, 'Calabar'),
(6, 'Enugu'),
(7, 'Gombe'),
(8, 'Illorin'),
(9, 'Ibadan'),
(10, 'Jos'),
(11, 'Kaduna'),
(12, 'Kano'),
(13, 'Lagos'),
(15, 'Owerri'),
(16, 'Portharcour'),
(17, 'Sokoto'),
(18, 'Uyo'),
(19, 'Warri'),
(20, 'Yola'),
(21, 'Accra'),
(22, 'Dakar'),
(23, 'Luanda'),
(24, 'Monrovia');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `location_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `location_id`) VALUES
(1, 'it-abuja', 1),
(2, 'it-asaba', 2),
(3, 'it-benin', 3),
(4, 'it-bauchi', 4),
(5, 'it-calabar', 5),
(6, 'it-enugu', 6),
(7, 'it-gombe', 7),
(8, 'it-illorin', 8),
(9, 'it-ibadan', 9),
(10, 'it-jos', 10),
(11, 'it-kaduna', 11),
(12, 'it-kano', 12),
(13, 'it-lagos', 13),
(15, 'it-owerri', 15),
(16, 'it-portharcourt', 16),
(17, 'it-sokoto', 17),
(18, 'it-uyo', 18),
(19, 'it-warri', 19),
(20, 'it-yola', 20),
(21, 'it-accra', 21),
(22, 'it-dakar', 22),
(23, 'it-luanda', 23),
(24, 'it-monrovia', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_category`
--
ALTER TABLE `asset_category`
  ADD PRIMARY KEY (`asset_category_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_asset`
--
ALTER TABLE `employee_asset`
  ADD PRIMARY KEY (`employee_asset_id`);

--
-- Indexes for table `it_asset`
--
ALTER TABLE `it_asset`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `it_asset_inventory`
--
ALTER TABLE `it_asset_inventory`
  ADD PRIMARY KEY (`it_asset_inventory_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_category`
--
ALTER TABLE `asset_category`
  MODIFY `asset_category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_asset`
--
ALTER TABLE `employee_asset`
  MODIFY `employee_asset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `it_asset`
--
ALTER TABLE `it_asset`
  MODIFY `asset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `it_asset_inventory`
--
ALTER TABLE `it_asset_inventory`
  MODIFY `it_asset_inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
