-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2013 at 08:37 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qlkao_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `baduc_app`
--

CREATE TABLE IF NOT EXISTS `baduc_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `banner` varchar(125) CHARACTER SET utf8 NOT NULL,
  `prefix` varchar(50) CHARACTER SET utf8 NOT NULL,
  `alias` varchar(256) CHARACTER SET utf8 NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_activity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` tinyint(4) NOT NULL,
  `page_view` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `baduc_app`
--

INSERT INTO `baduc_app` (`id`, `name`, `phone`, `address`, `email`, `banner`, `prefix`, `alias`, `date_created`, `date_modified`, `date_activity`, `type`, `page_view`) VALUES
(1, 'Karaoke Ba Đức', '0945 03 07 09', 'Phó Cơ Điều P3 - TPVL', '', 'data/images/banner/logo.png', 'baduc_', 'baduc_', '2012-06-30 17:00:00', '0000-00-00 00:00:00', '2012-12-26 07:28:02', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `baduc_category`
--

CREATE TABLE IF NOT EXISTS `baduc_category` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` binary(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `baduc_category`
--

INSERT INTO `baduc_category` (`id`, `name`, `picture`) VALUES
(3, 'BEER', NULL),
(8, 'NƯỚC GIẢI KHÁT', NULL),
(11, 'THUỐC HÚT', NULL),
(12, 'THỨC ĂN', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `baduc_collect_customer`
--

CREATE TABLE IF NOT EXISTS `baduc_collect_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `baduc_customer_collect_1` (`idcustomer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `baduc_collect_customer`
--

INSERT INTO `baduc_collect_customer` (`id`, `idcustomer`, `date`, `value`, `note`) VALUES
(2, 15, '2013-05-18', 1000001, 'Trả lần 1, lẻ 1 đồng'),
(3, 17, '2013-05-01', 2087000, 'thanh toán nợ cũ');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_collect_general`
--

CREATE TABLE IF NOT EXISTS `baduc_collect_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_term` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `baduc_collect_1` (`id_term`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `baduc_collect_general`
--

INSERT INTO `baduc_collect_general` (`id`, `id_term`, `date`, `value`, `note`) VALUES
(5, 2, '2013-05-20', 10111, 'ddddd'),
(6, 2, '2013-09-08', 1, 'thử nghiệm');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_config`
--

CREATE TABLE IF NOT EXISTS `baduc_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `param` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `baduc_config`
--

INSERT INTO `baduc_config` (`id`, `param`, `value`) VALUES
(1, 'PRICE_HOUR_NORMAL_1', '70000'),
(2, 'PRICE_HOUR_NORMAL_2', '90000'),
(3, 'PRICE_HOUR_VIP_1', '80000'),
(4, 'PRICE_HOUR_VIP_2', '100000'),
(5, 'DISCOUNT', '0'),
(6, 'ROW_PER_PAGE', '12'),
(7, 'GUEST_VISIT', '109');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_course`
--

CREATE TABLE IF NOT EXISTS `baduc_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategory` int(25) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `shortname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price1` bigint(20) NOT NULL,
  `price2` bigint(20) NOT NULL,
  `price3` bigint(20) NOT NULL,
  `price4` bigint(20) NOT NULL,
  `picture` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_field` (`idcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=148 ;

--
-- Dumping data for table `baduc_course`
--

INSERT INTO `baduc_course` (`id`, `idcategory`, `name`, `shortname`, `unit`, `price1`, `price2`, `price3`, `price4`, `picture`) VALUES
(15, 11, 'Thuốc hút', 'Thuốc hút', 'Gói', 25000, 0, 0, 0, NULL),
(53, 8, 'Trà Xanh', 'Trà Xanh', 'Chai', 15000, 0, 0, 0, NULL),
(54, 8, 'C2', 'C2', 'Chai', 15000, 0, 0, 0, NULL),
(55, 8, 'Dr Thanh', 'Dr Thanh', 'Chai', 15000, 0, 0, 0, NULL),
(56, 8, 'Nước Yến', 'Nước Yến', 'Lon', 15000, 0, 0, 0, NULL),
(107, 3, 'Heniken', 'Heniken', 'Chai', 18000, 0, 0, 0, ''),
(108, 3, 'Heniken', 'Heniken', 'Lon', 20000, 0, 0, 0, ''),
(110, 12, 'Trái Cây', 'Trái Cây', 'Dĩa', 50000, 0, 0, 0, ''),
(111, 3, 'Sài Gòn đỏ', 'Sài Gòn đỏ', 'Chai', 12000, 0, 0, 0, ''),
(112, 3, 'Sài Gòn XK', 'Sài Gòn XK', 'Chai', 15000, 0, 0, 0, ''),
(113, 3, 'Sài Gòn XK', 'Sài Gòn XK', 'Lon', 17000, 0, 0, 0, ''),
(114, 3, 'Bia 333', 'Bia 333', 'Lon', 16000, 0, 0, 0, ''),
(115, 11, 'Thuốc 555', 'Thuốc 555', 'Gói', 30000, 0, 0, 0, ''),
(116, 11, 'Thuốc Craven', 'Thuốc Craven', 'Gói', 25000, 0, 0, 0, ''),
(117, 12, 'Oshi', 'Oshi', 'Gói', 10000, 0, 0, 0, ''),
(118, 12, 'Chả Giò', 'Chả Giò', 'Gói', 15000, 0, 0, 0, ''),
(119, 12, 'Khô Bò', 'Khô Bò', 'Gói', 30000, 0, 0, 0, ''),
(120, 12, 'Mít sấy', 'Mít sấy', 'Gói', 30000, 0, 0, 0, ''),
(121, 12, 'Xúc Xích', 'Xúc Xích', 'Gói', 30000, 0, 0, 0, ''),
(122, 12, 'Chewing Gum', 'Chewing Gum', 'Cây', 6000, 0, 0, 0, ''),
(123, 12, 'Đậu Phộng chiên', 'Đậu Phộng chiên', 'Gói', 10000, 0, 0, 0, ''),
(124, 12, 'Đậu Phộng sấy', 'Đậu Phộng sấy', 'Gói', 10000, 0, 0, 0, ''),
(125, 12, 'Đậu Phộng', 'Đậu Phộng', 'Gói', 7000, 0, 0, 0, ''),
(126, 8, 'Lavie', 'Lavie', 'Chai', 10000, 0, 0, 0, ''),
(127, 8, 'Pepsi', 'Pepsi', 'Lon', 15000, 0, 0, 0, ''),
(128, 8, '7 Up', '7 Up', 'Lon', 15000, 0, 0, 0, ''),
(129, 8, 'Cam', 'Cam', 'Lon', 15000, 0, 0, 0, ''),
(131, 12, 'Khăn Lạnh', 'Khăn Lạnh', 'Cái', 2000, 0, 0, 0, ''),
(132, 12, 'Quẹt gas', 'Quẹt gas', 'Cái', 4000, 0, 0, 0, ''),
(134, 12, 'Khô Mực', 'Khô Mực', 'Con', 50000, 0, 0, 0, ''),
(135, 12, 'Chả Lụa', 'Chả Lụa', 'Dĩa', 50000, 0, 0, 0, ''),
(136, 8, 'Red_Bull', 'Red_Bull', 'Lon', 15000, 0, 0, 0, ''),
(137, 3, 'Tiger', 'Tiger', 'Chai', 14000, 0, 0, 0, ''),
(138, 3, 'Tiger Bạc', 'Tiger Bạc', 'Chai', 15000, 0, 0, 0, ''),
(139, 12, 'Đậu Nành rang', 'Đậu Nành rang', 'Gói', 10000, 0, 0, 0, ''),
(140, 3, 'Tiger', 'Tiger', 'Lon', 19000, 0, 0, 0, ''),
(141, 12, 'Cơm Cháy', 'Cơm Cháy', 'Bịch', 17000, 0, 0, 0, ''),
(142, 12, 'Cá Cơm', 'Cá Cơm', 'Gói', 12000, 0, 0, 0, ''),
(143, 8, 'Sting', 'Sting', 'Chai', 15000, 0, 0, 0, ''),
(144, 12, 'Khô_Mực', 'Khô_Mực', 'Con', 60000, 0, 0, 0, ''),
(145, 12, 'Chà giò rế', 'Chà giò rế', 'Dĩa', 60000, 0, 0, 0, ''),
(146, 12, 'Nhái chiên giòn', 'Nhái', 'Dĩa', 60000, 0, 0, 0, ''),
(147, 12, 'Đậu Nành sấy', 'Đậu nành sấy', 'Gói', 12000, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_customer`
--

CREATE TABLE IF NOT EXISTS `baduc_customer` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `card` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `baduc_customer`
--

INSERT INTO `baduc_customer` (`id`, `name`, `type`, `card`, `phone`, `address`, `note`, `discount`) VALUES
(1, 'Khách Hàng Vãng Lai', 0, '893970784300', '0945030709', '', '', 0),
(12, 'Lê Hồng Đức', 1, '893970784301', '0918585203', 'Cty TNHH MTV Ba Đức Vĩnh Long', 'Giám Đốc', 0),
(13, 'Nguyễn Quang Minh', 0, '893970784302', '', '', '', 0),
(14, 'Phan Thanh Phong', 0, '893970784303', '', '', 'Toàn', 0),
(15, 'Phạm Minh Tuấn Anh', 0, '893970784304', '', 'Vĩnh Long', 'Kế Toán', 0),
(16, 'Lê Nguyễn Đông Khoa', 1, '893970784305', '0945030709', 'Cty TNHH MTV Ba Đức Vĩnh Long', 'P. GĐ', 0),
(17, 'Lê Thành Tâm', 0, '893970784306', '', '', '', 0),
(18, 'Cường Cầu Đôi', 0, '893970784307', '', 'Cầu Đôi', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `baduc_domain`
--

CREATE TABLE IF NOT EXISTS `baduc_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `baduc_domain`
--

INSERT INTO `baduc_domain` (`id`, `name`) VALUES
(1, 'KHU A'),
(2, 'KHU B'),
(3, 'KHU VIP');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_employee`
--

CREATE TABLE IF NOT EXISTS `baduc_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `baduc_employee`
--

INSERT INTO `baduc_employee` (`id`, `name`, `job`, `gender`, `phone`, `address`) VALUES
(1, 'Phan Xuân Mai', '', 1, '0946 915 700', 'Cao Lãnh - Đồng Tháp'),
(2, 'Phan Lê Hữu Phúc', '', 0, '0986 468 896', 'Cao Lãnh, Đồng Tháp'),
(3, 'Nguyễn Văn A', 'Quản lý', 1, '11224', 'Trà Vinh');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_guest`
--

CREATE TABLE IF NOT EXISTS `baduc_guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(16) CHARACTER SET latin1 NOT NULL,
  `entry_time` varchar(32) CHARACTER SET latin1 NOT NULL,
  `exit_time` varchar(32) CHARACTER SET latin1 NOT NULL,
  `agent` varchar(16) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `baduc_guest`
--

INSERT INTO `baduc_guest` (`id`, `ip`, `entry_time`, `exit_time`, `agent`) VALUES
(5, '192.168.1.3', '1378665438', '1378669038', '192.168.1.3');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_order_import`
--

CREATE TABLE IF NOT EXISTS `baduc_order_import` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `baduc_order_import_1` (`idsupplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=124 ;

--
-- Dumping data for table `baduc_order_import`
--

INSERT INTO `baduc_order_import` (`id`, `idsupplier`, `date`, `description`) VALUES
(7, 9, '2013-04-07', ''),
(10, 12, '2013-04-01', ''),
(11, 12, '2013-04-02', ''),
(12, 12, '2013-04-04', ''),
(13, 12, '2013-04-05', ''),
(14, 12, '2013-04-07', ''),
(15, 12, '2013-04-08', ''),
(16, 12, '2013-04-09', ''),
(18, 9, '2013-04-05', ''),
(19, 9, '2013-04-09', ''),
(20, 1, '2013-04-10', ''),
(21, 8, '2013-04-11', ''),
(22, 12, '2013-04-11', ''),
(23, 1, '2013-04-12', ''),
(24, 9, '2013-04-12', ''),
(25, 12, '2013-04-12', ''),
(28, 1, '2013-04-13', ''),
(29, 12, '2013-04-13', ''),
(30, 6, '2013-04-13', ''),
(31, 8, '2013-04-13', ''),
(32, 8, '2013-04-02', ''),
(33, 6, '2013-04-02', ''),
(35, 6, '2013-04-06', ''),
(36, 6, '2013-04-07', ''),
(37, 6, '2013-04-12', ''),
(38, 6, '2013-04-14', ''),
(39, 12, '2013-04-14', ''),
(40, 1, '2013-04-15', ''),
(41, 12, '2013-04-15', ''),
(42, 8, '2013-04-15', ''),
(43, 12, '2013-04-16', ''),
(45, 11, '2013-03-31', ''),
(46, 6, '2013-03-31', ''),
(48, 9, '2013-03-31', ''),
(49, 12, '2013-04-17', ''),
(50, 1, '2013-04-17', ''),
(51, 12, '2013-04-18', ''),
(52, 12, '2013-04-19', ''),
(53, 9, '2013-04-20', ''),
(54, 12, '2013-04-20', ''),
(55, 1, '2013-04-21', ''),
(57, 8, '2013-04-22', ''),
(61, 9, '2013-04-23', ''),
(62, 12, '2013-04-23', ''),
(67, 6, '2013-04-24', ''),
(68, 12, '2013-04-26', ''),
(69, 12, '2013-04-27', ''),
(70, 12, '2013-04-28', ''),
(71, 6, '2013-04-28', ''),
(72, 8, '2013-04-28', ''),
(73, 8, '2013-04-29', ''),
(76, 9, '2013-04-29', 'Đậu nành sấy: 100 bich x 4000đ'),
(77, 12, '2013-04-29', ''),
(78, 1, '2013-04-22', ''),
(79, 1, '2013-04-25', ''),
(80, 1, '2013-04-27', ''),
(81, 12, '2013-05-01', ''),
(82, 1, '2013-05-01', ''),
(83, 6, '2013-05-01', ''),
(84, 9, '2013-05-03', ''),
(85, 8, '2013-05-03', ''),
(86, 12, '2013-05-03', ''),
(87, 12, '2013-05-05', ''),
(88, 1, '2013-05-05', ''),
(89, 1, '2013-05-06', ''),
(90, 12, '2013-05-06', ''),
(91, 6, '2013-05-06', ''),
(92, 11, '2013-05-07', ''),
(93, 6, '2013-05-07', ''),
(94, 1, '2013-05-07', ''),
(95, 8, '2013-05-07', ''),
(96, 12, '2013-05-07', ''),
(97, 9, '2013-05-06', ''),
(98, 12, '2013-05-08', ''),
(99, 1, '2013-05-10', ''),
(100, 12, '2013-05-10', ''),
(101, 1, '2013-05-11', ''),
(102, 8, '2013-05-11', ''),
(105, 9, '2013-05-11', ''),
(106, 8, '2013-05-14', ''),
(107, 1, '2013-05-13', ''),
(108, 12, '2013-05-13', ''),
(111, 11, '2013-03-28', 'Tồn kho tính đến ngày 28/03'),
(112, 1, '2013-05-19', ''),
(113, 8, '2013-05-19', ''),
(114, 12, '2013-05-19', ''),
(115, 6, '2013-05-19', ''),
(116, 8, '2013-03-31', 'Tồn tính đến ngày 28/03'),
(117, 6, '2013-03-28', 'Tồn kho tính đến ngày 28/03'),
(118, 9, '2013-03-28', 'Tồn khó tính đến ngày 28/03\r\n'),
(120, 12, '2013-05-15', ''),
(121, 6, '2013-05-16', ''),
(122, 12, '2013-05-17', ''),
(123, 6, '2013-05-20', '');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_order_import_detail`
--

CREATE TABLE IF NOT EXISTS `baduc_order_import_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idorder` int(11) NOT NULL,
  `idresource` int(11) NOT NULL,
  `count` float NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `baduc_order_import_detail_1` (`idorder`),
  KEY `baduc_order_import_detail_2` (`idresource`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=209 ;

--
-- Dumping data for table `baduc_order_import_detail`
--

INSERT INTO `baduc_order_import_detail` (`id`, `idorder`, `idresource`, `count`, `price`) VALUES
(2, 7, 44, 100, 3000),
(3, 10, 53, 2, 10000),
(4, 11, 54, 2, 15000),
(5, 11, 53, 1, 15000),
(6, 11, 48, 2, 7500),
(7, 11, 55, 1, 12000),
(8, 12, 54, 2, 12500),
(9, 12, 53, 3, 13500),
(10, 12, 55, 2, 12000),
(11, 12, 48, 2, 10000),
(12, 13, 55, 1, 8000),
(13, 13, 54, 2, 11000),
(14, 13, 53, 1, 17000),
(15, 14, 53, 3, 10000),
(16, 14, 48, 1, 10000),
(17, 15, 47, 10, 9000),
(18, 14, 52, 5, 22000),
(19, 16, 54, 2, 15000),
(20, 16, 48, 3, 6700),
(23, 18, 59, 9, 26667),
(24, 18, 58, 1, 0),
(25, 19, 39, 10, 16500),
(26, 19, 40, 10, 23500),
(27, 20, 2, 5, 16000),
(28, 21, 19, 5, 313000),
(29, 21, 22, 5, 178000),
(30, 21, 20, 5, 362000),
(31, 22, 48, 3, 6700),
(32, 22, 53, 2, 12500),
(33, 22, 54, 7, 11450),
(34, 22, 56, 4, 6500),
(35, 23, 2, 5, 16000),
(36, 24, 59, 10, 27500),
(37, 25, 53, 2, 15000),
(38, 28, 2, 5, 16000),
(39, 29, 48, 2, 5000),
(40, 29, 54, 2, 13000),
(41, 29, 53, 3, 12000),
(42, 30, 27, 10, 17500),
(43, 29, 47, 10, 9000),
(44, 31, 20, 5, 362000),
(45, 32, 19, 5, 313000),
(46, 33, 27, 5, 19000),
(47, 35, 27, 10, 17500),
(48, 36, 28, 20, 2500),
(49, 37, 28, 20, 2500),
(50, 24, 61, 200, 550),
(51, 38, 28, 20, 2500),
(52, 39, 50, 1, 17000),
(53, 39, 53, 2, 11000),
(54, 39, 54, 3, 9000),
(55, 40, 2, 5, 16000),
(56, 41, 53, 2, 11000),
(57, 41, 50, 1, 15000),
(58, 42, 19, 5, 313000),
(59, 42, 21, 5, 132000),
(60, 42, 22, 5, 178000),
(61, 42, 62, 5, 280000),
(62, 42, 63, 1, 258000),
(63, 43, 50, 1, 20000),
(64, 45, 45, 44, 7000),
(65, 45, 46, 40, 7000),
(66, 46, 27, 2, 0),
(67, 46, 28, 23, 0),
(68, 46, 29, 29, 0),
(69, 46, 30, 25, 0),
(70, 46, 31, 25, 0),
(71, 46, 32, 130, 0),
(84, 46, 17, 59, 0),
(85, 48, 59, 8, 0),
(86, 48, 39, 11, 0),
(87, 48, 40, 6, 0),
(88, 48, 35, 377, 0),
(89, 49, 55, 2, 12500),
(90, 50, 2, 5, 16000),
(91, 51, 53, 2, 10500),
(92, 51, 54, 2, 12500),
(93, 52, 47, 15, 8000),
(94, 53, 61, 500, 538),
(95, 53, 39, 20, 16700),
(96, 54, 53, 3, 10000),
(97, 54, 54, 5, 12000),
(98, 54, 55, 2, 15000),
(99, 55, 2, 5, 16000),
(100, 57, 19, 10, 313000),
(101, 57, 21, 10, 132000),
(102, 57, 22, 10, 178000),
(103, 62, 53, 2, 12000),
(104, 62, 55, 2, 10000),
(105, 61, 44, 50, 3000),
(106, 61, 59, 33, 27273),
(107, 67, 31, 10, 17700),
(108, 67, 30, 10, 16800),
(109, 68, 47, 12, 8584),
(110, 68, 54, 2, 6000),
(111, 68, 53, 2, 13000),
(112, 68, 50, 1, 13000),
(113, 69, 55, 2, 10000),
(114, 69, 53, 2, 12000),
(115, 69, 54, 2, 6000),
(116, 70, 53, 3, 11660),
(117, 71, 27, 10, 17500),
(118, 72, 19, 4, 313000),
(119, 73, 19, 5, 313000),
(120, 73, 21, 10, 132000),
(121, 77, 47, 3, 15000),
(122, 77, 54, 6, 14850),
(123, 77, 55, 3, 15335),
(124, 78, 2, 3, 16000),
(125, 79, 2, 6, 16000),
(126, 80, 2, 3, 16000),
(127, 81, 53, 6, 11000),
(128, 81, 54, 5, 9000),
(129, 81, 55, 2, 12000),
(130, 82, 2, 5, 16000),
(131, 83, 28, 20, 2500),
(132, 84, 43, 40, 1700),
(133, 84, 65, 20, 15400),
(134, 84, 40, 20, 23000),
(135, 84, 39, 30, 17100),
(136, 85, 21, 10, 132000),
(137, 85, 60, 1, 173000),
(138, 86, 55, 2, 12000),
(139, 87, 47, 21, 9000),
(140, 88, 2, 4, 16000),
(141, 87, 54, 3, 7000),
(142, 89, 2, 4, 16000),
(143, 90, 53, 6, 10000),
(144, 91, 31, 10, 19500),
(145, 91, 30, 10, 16800),
(147, 92, 46, 1, 350000),
(148, 93, 27, 10, 17500),
(149, 94, 2, 3, 16000),
(150, 95, 21, 10, 132000),
(151, 96, 53, 6, 10000),
(152, 97, 61, 6, 26900),
(153, 95, 74, 1, 185000),
(154, 95, 72, 1, 148000),
(155, 98, 54, 2, 5000),
(156, 98, 55, 2, 10000),
(157, 99, 2, 3, 16000),
(158, 100, 54, 6, 8333),
(159, 101, 2, 3, 16000),
(160, 102, 19, 5, 313000),
(161, 102, 21, 5, 132000),
(162, 105, 44, 48, 3000),
(163, 106, 19, 3, 313000),
(164, 106, 22, 5, 178000),
(165, 107, 2, 3, 16000),
(166, 108, 54, 2, 9000),
(167, 108, 53, 1, 15000),
(168, 112, 2, 5, 16000),
(169, 113, 20, 4, 362000),
(170, 113, 21, 10, 132000),
(171, 114, 54, 3, 8000),
(172, 115, 27, 10, 17500),
(173, 114, 52, 1, 15000),
(174, 114, 47, 2, 8000),
(175, 116, 19, 5.12, 313000),
(176, 116, 20, 7.33, 362000),
(177, 116, 21, 38.45, 132000),
(178, 116, 22, 8.4, 178000),
(179, 116, 23, 6.54, 261500),
(180, 116, 62, 1, 280000),
(181, 116, 26, 7.67, 238000),
(182, 116, 25, 9.5, 260000),
(183, 116, 24, 3.5, 207000),
(184, 116, 63, 0.75, 86000),
(185, 116, 76, 0.95, 173000),
(186, 116, 64, 1, 108000),
(188, 117, 17, 59, 0),
(189, 117, 30, 25, 15500),
(190, 117, 31, 25, 19500),
(191, 117, 29, 29, 0),
(192, 117, 27, 2, 0),
(193, 117, 32, 130, 0),
(194, 117, 28, 23, 0),
(195, 111, 45, 0.88, 350000),
(196, 111, 46, 0.8, 350000),
(197, 118, 35, 377, 0),
(198, 118, 39, 1.1, 165000),
(199, 118, 40, 0.6, 235000),
(200, 118, 58, 8, 0),
(201, 118, 65, 0.4, 155000),
(202, 120, 54, 3, 8000),
(203, 121, 28, 20, 2500),
(204, 122, 54, 5, 10000),
(205, 122, 52, 1, 15000),
(206, 123, 29, 10, 10500),
(207, 123, 30, 10, 18500),
(208, 123, 31, 10, 20500);

-- --------------------------------------------------------

--
-- Table structure for table `baduc_paid_customer`
--

CREATE TABLE IF NOT EXISTS `baduc_paid_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `baduc_customer_paid_1` (`idcustomer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `baduc_paid_customer`
--

INSERT INTO `baduc_paid_customer` (`id`, `idcustomer`, `date`, `value`, `note`) VALUES
(18, 1, '2013-05-16', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_paid_general`
--

CREATE TABLE IF NOT EXISTS `baduc_paid_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_term` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `baduc_paid_1` (`id_term`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=90 ;

--
-- Dumping data for table `baduc_paid_general`
--

INSERT INTO `baduc_paid_general` (`id`, `id_term`, `date`, `value`, `note`) VALUES
(9, 10, '2013-04-01', 157000, 'Chi tiền chợ'),
(10, 10, '2013-04-02', 146000, 'Tiền chợ'),
(11, 10, '2013-04-03', 189000, 'Tiền chợ'),
(12, 10, '2013-04-04', 184000, 'Tiền chợ'),
(13, 10, '2013-04-05', 173000, 'Tiền chợ'),
(14, 10, '2013-04-06', 213000, 'Tiền chợ'),
(15, 10, '2013-04-07', 123000, 'Tiền chợ'),
(16, 10, '2013-04-08', 224000, 'Tiền chợ'),
(17, 10, '2013-04-09', 200000, 'Tiền chợ'),
(19, 11, '2013-04-09', 57000, 'Tiền mua trái cây + bông cúng'),
(20, 11, '2013-04-06', 163000, 'Chi mua đồ điện '),
(21, 11, '2013-04-08', 250000, 'Mua CB'),
(22, 11, '2013-04-07', 57000, 'Trái cây cúng+bao kiếng trái cây'),
(23, 10, '2013-04-10', 102000, 'Tiền chợ'),
(25, 10, '2013-04-11', 106000, 'Tiền chợ'),
(26, 11, '2013-04-11', 30000, 'Trái cây cúng'),
(27, 10, '2013-04-13', 163000, 'Tiền chợ'),
(28, 11, '2013-04-13', 465000, 'Tiếp khách(Công An phường)\r\n'),
(31, 11, '2013-04-14', 400000, 'Nhập bình gas'),
(32, 11, '2013-04-14', 127000, 'Bông+trái cây cúng,Khoai mon làm chả giò,Nước rửa '),
(33, 10, '2013-04-14', 221000, 'Tiền chợ'),
(34, 10, '2013-04-15', 122000, 'Tiền chợ'),
(35, 10, '2013-04-17', 222000, 'Tiền chợ'),
(36, 10, '2013-04-18', 118000, 'Tiền chợ'),
(38, 10, '2013-04-19', 122000, 'Tiền chợ'),
(39, 10, '2013-04-20', 134000, 'Tiền chợ\r\n'),
(40, 11, '2013-04-19', 38000, 'Mua tương ớt + phô mai cho khách'),
(41, 11, '2013-04-20', 38000, 'Chai lau kiếng+bông cúng+bao kiếng trái cây\r\n'),
(42, 10, '2013-04-22', 120000, 'Tiền chợ\r\n'),
(43, 1, '2013-04-20', 649000, 'Tiền điện sinh hoạt'),
(44, 11, '2013-04-22', 42000, 'Bông + trái cây cúng,Tiền cafe Anh 2 tiếp khách'),
(45, 10, '2013-04-23', 97000, 'Tiền chợ'),
(46, 11, '2013-04-23', 34000, 'Trái cây cúng'),
(47, 10, '2013-04-24', 65000, 'Tiền chợ'),
(48, 11, '2013-04-24', 21000, 'Mua hóa đơn bán lẻ\r\n'),
(49, 10, '2013-04-25', 177000, 'Tiền chợ'),
(50, 11, '2013-04-25', 26000, 'Bông cúng+bọc đựng da cá basa'),
(51, 10, '2013-04-26', 100000, 'Tiền chợ'),
(52, 10, '2013-04-27', 102000, 'Tiền chợ'),
(53, 11, '2013-04-27', 168000, 'Trả tiền vật liệu(cát)+bình nước lọc(2 bình)'),
(54, 10, '2013-04-28', 103000, 'Tiền chợ'),
(55, 10, '2013-04-29', 126000, 'Tiền chợ'),
(56, 11, '2013-04-29', 19000, 'Muối+ớt làm rang muối'),
(57, 10, '2013-05-01', 95000, 'Tiền chợ'),
(58, 11, '2013-05-01', 24000, 'Bao kiếng trái cây(3 bao)'),
(59, 10, '2013-05-03', 183000, 'Tiền chợ'),
(60, 10, '2013-05-02', 62000, 'Tiền chợ'),
(61, 10, '2013-05-04', 85000, 'Tiền chợ'),
(62, 10, '2013-05-05', 89000, 'Tiền chợ\r\n'),
(63, 10, '2013-05-06', 32000, 'Tiền chợ'),
(64, 4, '2013-04-30', 10500000, 'Lương NV chưa tính phụ cấp'),
(65, 1, '2013-04-30', 6000000, ''),
(66, 2, '2013-04-30', 1500000, 'Tạm tính'),
(67, 10, '2013-05-07', 211000, 'Tiền chợ\r\n'),
(68, 11, '2013-05-07', 136000, 'Nấu cháo gà( Anh Khoa)\r\n'),
(69, 11, '2013-05-08', 7000, 'Mua hóa đơn bán lẻ'),
(70, 10, '2013-05-08', 115000, 'Tiền chợ'),
(71, 10, '2013-05-09', 117000, 'Tiền chợ'),
(72, 11, '2013-05-10', 6000, 'Cafe cho tài xế của khách'),
(73, 10, '2013-05-10', 81000, 'Tiền chợ'),
(74, 10, '2013-05-11', 99000, 'Tiền chợ\r\n'),
(75, 10, '2013-05-12', 330000, 'Tiền chợ'),
(76, 10, '2013-05-13', 85000, 'Tiền chợ\r\n'),
(77, 10, '2013-05-14', 74500, 'Tiền chợ'),
(78, 11, '2013-05-12', 141000, 'Mua chổi+cây lau nhà'),
(79, 3, '2013-04-30', 5600001, 'Thuế TTĐB'),
(80, 12, '2013-04-30', 3250000, 'chi tiền đầu chai cho NV'),
(81, 10, '2013-05-15', 221000, ''),
(82, 10, '2013-05-16', 106000, ''),
(83, 10, '2013-05-17', 129000, ''),
(85, 10, '2013-05-18', 99000, ''),
(86, 10, '2013-05-19', 85000, ''),
(87, 11, '2013-05-19', 414000, 'Bình gas+nguyên liệu làm motor'),
(88, 10, '2013-05-20', 40000, '');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_paid_pay_roll`
--

CREATE TABLE IF NOT EXISTS `baduc_paid_pay_roll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idemployee` int(11) NOT NULL,
  `date` date NOT NULL,
  `value_base` int(11) NOT NULL,
  `value_sub` int(11) NOT NULL,
  `value_pre` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `baduc_paid_pay_roll_1` (`idemployee`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `baduc_paid_pay_roll`
--

INSERT INTO `baduc_paid_pay_roll` (`id`, `idemployee`, `date`, `value_base`, `value_sub`, `value_pre`, `note`) VALUES
(1, 2, '2013-09-10', 21, 31, 41, ''),
(2, 2, '2013-09-08', 2, 3, 4, NULL),
(4, 2, '2013-09-01', 1, 2, 3, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_paid_supplier`
--

CREATE TABLE IF NOT EXISTS `baduc_paid_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `baduc_supplier_paid_1` (`idsupplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `baduc_paid_supplier`
--

INSERT INTO `baduc_paid_supplier` (`id`, `idsupplier`, `date`, `value`, `note`) VALUES
(1, 1, '2012-08-01', 2300000, 'được không ?'),
(2, 1, '2012-07-03', 350000, 'Ghi chú gì đây'),
(3, 1, '2012-07-26', 750000, 'Ghi ghi gì gì đó'),
(8, 6, '2012-09-19', 1000000, 'Thử nè được không đó !'),
(9, 1, '2012-09-19', 1000000, 'lung tung quá đi'),
(11, 1, '2012-01-01', 123, 'sdfdsfggf'),
(12, 1, '2012-09-24', 1230000, 'đâu biết'),
(13, 1, '2012-09-24', 1213232, ''),
(14, 1, '2012-09-24', 34243243, ''),
(15, 1, '2012-09-24', 21323, ''),
(16, 1, '2012-09-24', 123323, ''),
(17, 1, '2012-09-24', 21323, '');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_r2c`
--

CREATE TABLE IF NOT EXISTS `baduc_r2c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_course` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `value1` double NOT NULL,
  `value2` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `baduc_r2c_1` (`id_course`),
  KEY `baduc_r2c_2` (`id_resource`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `baduc_r2c`
--

INSERT INTO `baduc_r2c` (`id`, `id_course`, `id_resource`, `value1`, `value2`) VALUES
(28, 114, 24, 24, 1),
(29, 108, 20, 24, 1),
(30, 113, 23, 24, 1),
(31, 114, 1, 10, 1),
(32, 114, 2, 1, 1),
(33, 107, 19, 24, 1),
(34, 111, 21, 20, 1),
(35, 112, 22, 20, 1),
(36, 137, 26, 24, 1),
(37, 140, 62, 24, 1),
(38, 138, 25, 24, 1),
(39, 128, 69, 24, 1),
(40, 54, 64, 24, 1),
(41, 126, 63, 24, 1),
(42, 55, 74, 24, 1),
(43, 129, 73, 24, 1),
(44, 56, 75, 24, 1),
(45, 127, 72, 24, 1),
(46, 136, 71, 24, 1),
(47, 53, 70, 24, 1),
(48, 143, 76, 24, 1),
(49, 134, 58, 1, 1),
(50, 144, 59, 1, 1),
(51, 119, 30, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `baduc_resource`
--

CREATE TABLE IF NOT EXISTS `baduc_resource` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `baduc_resource_1` (`idsupplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=77 ;

--
-- Dumping data for table `baduc_resource`
--

INSERT INTO `baduc_resource` (`id`, `idsupplier`, `name`, `unit`, `price`, `description`) VALUES
(1, 1, 'Nước đá ống', 'Kg', 0, 'Nước đá dùng để uống trà, cafe'),
(2, 1, 'Nước đá ướp', 'Cây', 0, 'Dùng để ướp lạnh'),
(3, 1, 'Nước đá viên', 'Kg', 0, 'Viên cưa dùng uống bia'),
(14, 1, 'Nước đá tủ lạnh', 'Gói', 0, 'Nước đá lấy từ tủ lạnh nhà'),
(17, 6, 'Bánh', 'Bịch', 0, ''),
(19, 8, 'Heniken', 'Két', 313000, ''),
(20, 8, 'Heniken', 'Thùng', 362000, ''),
(21, 8, 'Sài gòn đỏ', 'Két', 132000, ''),
(22, 8, 'Sài gòn XK', 'Két', 178000, ''),
(23, 8, 'Sài Gòn XK', 'Thùng', 261500, ''),
(24, 8, 'Bia 333', 'Thùng', 207000, ''),
(25, 8, 'Tiger Bạc', 'Két', 260000, ''),
(26, 8, 'Tiger', 'Két', 238000, ''),
(27, 6, 'Xúc Xích', 'Bịch', 0, ''),
(28, 6, 'CW DOUBLEMINT', 'Hộp', 0, ''),
(29, 6, 'Chả Giò', 'Bịch', 0, ''),
(30, 6, 'Khô Bò', 'Bịch', 0, ''),
(31, 6, 'Mít Sấy', 'Bịch', 0, ''),
(32, 6, 'Đậu Phộng ', 'Bịch', 0, ''),
(34, 9, 'Trái Cây', 'Dĩa', 0, ''),
(35, 9, 'Đậu Phộng sấy', 'Bịch', 0, ''),
(36, 9, 'Đậu Phộng chiên', 'Bịch', 0, ''),
(39, 9, 'Thuốc Craven', 'Cây', 165000, ''),
(40, 9, 'Thuốc 555', 'Cây', 235000, ''),
(43, 9, 'Quẹt gas', 'Hộp', 85000, ''),
(44, 9, 'Đậu Nành', 'Gói', 3000, 'Mua ngoài'),
(45, 11, 'Cơm Cháy', 'Thùng', 350000, 'abc'),
(46, 11, 'Cá Cơm', 'Thùng', 350000, '0'),
(47, 12, 'Ổi', 'Kg', 0, ''),
(48, 12, 'Củ Sắn', 'Kg', 0, ''),
(49, 12, 'Mít', 'Kg', 0, ''),
(50, 12, 'Chôm Chôm', 'Kg', 0, ''),
(51, 12, 'Xoài Thái', 'Kg', 0, ''),
(52, 12, 'Xoài ĐàiLoan', 'Kg', 0, ''),
(53, 12, 'Xoài chua', 'Kg', 0, ''),
(54, 12, 'Mận', 'Kg', 0, ''),
(55, 12, 'Sơ ri', 'Kg', 0, ''),
(56, 12, 'Thơm', 'Kg', 0, ''),
(57, 12, 'Khóm', 'Kg', 0, ''),
(58, 9, 'Khô Mực', 'Con', 0, ''),
(59, 9, 'Khô_Mực', 'Con', 0, ''),
(60, 8, 'Sting', 'Thùng', 173000, ''),
(61, 9, 'Khăn Lạnh', 'Hộp', 27000, ''),
(62, 8, 'Tiger', 'Thùng', 280000, ''),
(63, 8, 'Lavie', 'Thùng', 86000, ''),
(64, 8, 'C2', 'Thùng', 108000, ''),
(65, 9, 'Thuốc Hút', 'Cây', 155000, ''),
(66, 9, 'Bánh tráng rế', 'Bịch', 15000, 'Bánh tráng gói chả giò rế'),
(67, 9, 'Thịt ghẹ', 'Kg', 80000, 'Thịt ghẹ gói chả giò rế'),
(68, 9, 'Khoai cao', 'Kg', 30000, 'Khoai cao gói chả giò rế'),
(69, 8, '7 Up', 'Thùng', 153000, ''),
(70, 8, 'Trà Xanh', 'Thùng', 158000, ''),
(71, 8, 'Red_Bull', 'Thùng', 186000, ''),
(72, 8, 'Pepsi', 'Thùng', 153000, ''),
(73, 8, 'Cam', 'Thùng', 130000, ''),
(74, 8, 'Dr Thanh', 'Thùng', 186000, ''),
(75, 8, 'Nước Yến', 'Thùng', 142000, ''),
(76, 8, 'Sting', 'Thùng', 173000, '');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_session`
--

CREATE TABLE IF NOT EXISTS `baduc_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtable` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `datetimeend` datetime DEFAULT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `discount_value` int(11) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  `surtax` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idtable` (`idtable`),
  KEY `iduser` (`iduser`),
  KEY `baduc_session_3` (`idcustomer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=441 ;

--
-- Dumping data for table `baduc_session`
--

INSERT INTO `baduc_session` (`id`, `idtable`, `iduser`, `idcustomer`, `datetime`, `datetimeend`, `note`, `status`, `discount_value`, `discount_percent`, `surtax`, `payment`, `value`) VALUES
(158, 2, 3, 1, '2013-04-06 17:20:27', '2013-04-06 18:20:00', '', 1, 0, 0, 0, 0, 275000),
(162, 16, 3, 1, '2013-04-07 20:24:15', '2013-04-07 21:52:00', '', 1, 0, 0, 0, 0, 312000),
(163, 27, 3, 1, '2013-04-08 00:25:37', '2013-04-08 03:10:00', '', 1, 0, 0, 0, 0, 802000),
(164, 26, 3, 1, '2013-04-08 00:44:28', '2013-04-08 02:21:00', 'Ghi chú:Phụ thu thêm chả giò', 1, 0, 0, 70000, 0, 950000),
(165, 2, 3, 1, '2013-04-08 17:50:25', '2013-04-08 19:25:00', '', 1, 0, 0, 0, 0, 434000),
(166, 16, 3, 18, '2013-04-08 18:43:42', '2013-04-08 19:53:00', 'Anh Cường nợ', 1, 0, 0, 0, 0, 402000),
(168, 2, 3, 1, '2013-04-08 21:42:07', '2013-04-08 23:52:00', 'Phụ thụ : Thuốc Jet', 1, 0, 0, 25000, 0, 576000),
(169, 16, 3, 1, '2013-04-08 23:00:00', '2013-04-09 00:00:00', '', 1, 0, 0, 0, 0, 403000),
(170, 1, 3, 1, '2013-04-08 23:29:12', '2013-04-09 01:05:00', '', 1, 0, 0, 0, 500000, 304000),
(171, 17, 3, 1, '2013-04-09 00:00:00', '2013-04-09 01:15:00', '', 1, 0, 0, 0, 0, 347000),
(172, 1, 3, 1, '2013-04-09 01:05:00', '2013-04-09 02:05:00', '', 1, 0, 0, 0, 0, 150000),
(173, 2, 3, 1, '2013-04-09 19:46:26', '2013-04-09 21:05:00', '', 1, 0, 0, 0, 0, 400000),
(174, 2, 3, 1, '2013-04-09 22:06:58', '2013-04-09 23:20:00', 'Ghi chú : Phụ thu thuốc hút', 1, 0, 0, 25000, 0, 321000),
(175, 15, 3, 1, '2013-04-09 22:54:01', '2013-04-10 01:05:00', 'Phụ thu: 2  Sting', 1, 0, 0, 24000, 0, 378000),
(176, 27, 3, 1, '2013-04-10 00:24:25', '2013-04-10 01:50:00', '', 1, 0, 0, 0, 0, 317000),
(178, 17, 3, 1, '2013-04-10 19:33:00', '2013-04-10 21:30:00', '', 1, 0, 0, 0, 0, 559000),
(179, 16, 3, 1, '2013-04-10 21:16:15', '2013-04-10 22:22:00', '', 1, 0, 0, 0, 0, 109000),
(180, 2, 3, 1, '2013-04-11 00:15:24', '2013-04-11 01:30:00', '', 1, 0, 0, 0, 0, 429000),
(181, 16, 3, 1, '2013-04-11 00:57:46', '2013-04-11 03:10:00', '', 1, 0, 0, 0, 0, 513000),
(182, 17, 3, 1, '2013-04-11 01:36:37', '2013-04-11 03:20:00', '', 1, 0, 0, 0, 0, 464000),
(183, 2, 3, 1, '2013-04-11 16:15:00', '2013-04-11 17:05:00', '', 1, 0, 0, 0, 0, 188000),
(184, 2, 3, 1, '2013-04-11 19:57:56', '2013-04-11 20:57:00', '', 1, 0, 0, 0, 0, 280000),
(186, 27, 3, 1, '2013-04-11 20:05:00', '2013-04-11 21:50:00', '', 1, 0, 0, 0, 0, 412000),
(187, 3, 3, 16, '2013-04-11 20:28:24', '2013-04-11 23:15:00', 'Anh Tâm nợ', 1, 0, 0, 0, 0, 358000),
(188, 2, 3, 1, '2013-04-11 22:00:35', '2013-04-11 22:50:00', '', 1, 0, 0, 0, 0, 196000),
(189, 17, 3, 1, '2013-04-11 23:16:51', '2013-04-12 01:05:00', '', 1, 0, 0, 0, 0, 519000),
(190, 2, 3, 1, '2013-04-11 23:41:43', '2013-04-12 01:15:00', '', 1, 0, 0, 0, 0, 436000),
(191, 16, 3, 1, '2013-04-11 23:43:48', '2013-04-12 03:05:00', '', 1, 0, 0, 0, 0, 498000),
(192, 27, 3, 1, '2013-04-11 23:43:53', '2013-04-12 01:47:00', 'Ghi chú phụ thu: Thuốc hút 2 gói,Mì trứng', 1, 0, 0, 60000, 0, 870000),
(193, 1, 3, 1, '2013-04-11 23:50:28', '2013-04-12 01:30:00', '', 1, 0, 0, 0, 0, 451000),
(194, 26, 3, 1, '2013-04-12 00:23:39', '2013-04-12 01:52:00', 'Ghi chú: Phụ thu thuốc hút', 1, 0, 0, 25000, 0, 389000),
(195, 15, 3, 1, '2013-04-12 00:30:00', '2013-04-12 02:40:00', '', 1, 0, 0, 0, 0, 850000),
(196, 2, 3, 1, '2013-04-12 14:45:00', '2013-04-12 16:30:00', 'Ghi chú:Phụ thu thuốc hút,mì trứng', 1, 0, 0, 40000, 0, 523000),
(197, 27, 3, 1, '2013-04-12 16:35:58', '2013-04-12 18:35:00', 'Ghi chú:Phụ thu bánh mì chả lụa', 1, 0, 0, 200000, 0, 1475000),
(198, 2, 3, 1, '2013-04-12 19:56:12', '2013-04-12 21:40:00', 'Ghi chú : Phụ thu thuốc hút', 1, 0, 0, 25000, 0, 597000),
(199, 16, 3, 1, '2013-04-12 21:28:19', '2013-04-12 22:38:00', '', 1, 0, 0, 0, 0, 359000),
(200, 2, 3, 1, '2013-04-12 22:04:33', '2013-04-13 00:13:00', '', 1, 0, 0, 0, 0, 327000),
(201, 17, 3, 1, '2013-04-12 22:47:15', '2013-04-13 00:00:00', '', 1, 0, 0, 0, 0, 265000),
(202, 14, 3, 1, '2013-04-12 22:52:00', '2013-04-12 23:55:00', '', 1, 0, 0, 0, 0, 404000),
(204, 16, 3, 1, '2013-04-12 23:01:00', '2013-04-13 01:25:00', '', 1, 0, 0, 0, 0, 781000),
(205, 1, 3, 1, '2013-04-13 00:14:04', '2013-04-13 02:26:00', 'Ghi chú : Cộng tiền thối dư ', 1, 0, 0, 6000, 0, 400000),
(206, 27, 3, 1, '2013-04-13 00:28:58', '2013-04-13 01:37:00', '', 1, 0, 0, 0, 0, 323000),
(207, 2, 3, 1, '2013-04-13 18:27:16', '2013-04-13 20:30:00', 'Ghi chú :Phụ thu Bánh mì heo quay', 1, 0, 0, 150000, 0, 1580000),
(208, 3, 3, 17, '2013-04-13 20:00:56', '2013-04-14 01:00:00', 'Anh Tâm nợ', 2, 0, 0, 0, 0, 1397000),
(209, 2, 3, 16, '2013-04-13 23:47:30', '2013-04-14 01:25:00', 'Anh Khoa tiếp khách', 1, 0, 0, 0, 0, 398000),
(210, 2, 3, 1, '2013-04-14 15:32:00', '2013-04-14 17:45:00', '', 1, 0, 0, 0, 0, 477000),
(211, 2, 3, 1, '2013-04-14 22:57:29', '2013-04-15 02:05:00', '', 1, 0, 0, 0, 0, 953000),
(212, 16, 3, 1, '2013-04-14 23:20:40', '2013-04-15 00:20:00', '', 1, 0, 0, 0, 0, 223000),
(213, 1, 3, 1, '2013-04-14 23:56:53', '2013-04-15 00:56:00', '', 1, 0, 0, 0, 0, 430000),
(214, 1, 3, 1, '2013-04-15 01:44:39', '2013-04-15 02:44:00', '', 1, 0, 0, 0, 0, 277000),
(215, 2, 3, 1, '2013-04-15 16:52:30', '2013-04-15 17:52:00', '', 1, 0, 0, 0, 0, 225000),
(216, 1, 3, 1, '2013-04-15 21:03:24', '2013-04-15 22:30:00', '', 1, 0, 0, 0, 0, 216000),
(217, 16, 3, 1, '2013-04-15 22:26:27', '2013-04-16 00:08:00', '', 1, 0, 0, 0, 0, 336000),
(218, 2, 3, 1, '2013-04-15 22:31:47', '2013-04-15 22:31:47', '', 1, 0, 0, 0, 0, 0),
(219, 2, 3, 1, '2013-04-16 17:26:00', '2013-04-16 19:36:00', 'Ghi chú:Ly cafe đá,thuốc hút', 1, 0, 0, 35000, 0, 637000),
(220, 17, 3, 1, '2013-04-16 19:02:48', '2013-04-16 20:00:00', 'Ghi chú: Thực thu 187.000', 1, 0, 0, 0, 0, 186000),
(221, 26, 3, 1, '2013-04-16 19:31:39', '2013-04-16 21:15:00', '', 1, 0, 0, 0, 0, 372000),
(222, 2, 3, 1, '2013-04-16 21:47:56', '2013-04-16 23:08:00', 'Ghi chú: Tặng 1 dĩa chả giò', 1, 0, 0, 0, 0, 281000),
(223, 27, 3, 1, '2013-04-16 22:12:00', '2013-04-17 00:00:00', 'Ghi chú: Tặng 1 dĩa chả giò', 1, 0, 0, 0, 0, 462000),
(224, 2, 3, 1, '2013-04-17 22:08:20', '2013-04-17 22:56:00', 'Ghi chú: Phụ thu thuốc hút', 1, 0, 0, 25000, 0, 192000),
(225, 2, 3, 1, '2013-04-18 13:14:49', '2013-04-18 15:08:00', '', 1, 0, 0, 0, 0, 1453000),
(226, 2, 3, 17, '2013-04-18 19:37:50', '2013-04-18 21:21:00', 'Ghi chú: Phụ thu thuốc hút,Anh Tâm nợ', 2, 0, 0, 25000, 0, 590000),
(227, 17, 3, 1, '2013-04-18 21:14:21', '2013-04-18 22:31:00', '', 1, 0, 0, 0, 0, 139000),
(228, 17, 3, 1, '2013-04-20 20:44:41', '2013-04-21 00:19:00', 'Ghi chú: Phụ thu trà đá', 1, 0, 0, 20000, 0, 988000),
(229, 2, 3, 1, '2013-04-20 22:36:32', '2013-04-21 00:10:00', '', 1, 0, 0, 0, 0, 546000),
(230, 16, 3, 1, '2013-04-20 22:46:28', '2013-04-21 00:00:00', '', 1, 0, 0, 0, 0, 232000),
(231, 14, 3, 1, '2013-04-21 15:40:00', '2013-04-21 17:57:00', '', 1, 0, 0, 0, 0, 1210000),
(233, 16, 3, 1, '2013-04-21 21:30:00', '2013-04-21 22:52:00', 'Ghi chú:Phụ thu thuốc hút', 1, 0, 0, 25000, 0, 362000),
(234, 17, 3, 1, '2013-04-22 15:30:40', '2013-04-22 17:08:00', '', 1, 0, 0, 0, 0, 360000),
(235, 16, 3, 1, '2013-04-22 17:35:00', '2013-04-22 19:06:00', '', 1, 0, 0, 0, 0, 341000),
(237, 2, 3, 1, '2013-04-19 13:05:00', '2013-04-19 14:28:00', 'Ghi chú:Phụ thu hộp Phô mai', 1, 0, 0, 35000, 0, 561000),
(238, 1, 3, 1, '2013-04-19 14:45:00', '2013-04-19 17:15:00', '', 1, 0, 0, 0, 0, 292000),
(239, 17, 3, 1, '2013-04-19 16:15:00', '2013-04-19 17:27:00', '', 1, 0, 0, 0, 0, 274000),
(240, 27, 3, 12, '2013-04-19 19:15:00', '2013-04-19 20:35:00', 'Mợ 3 tiếp khách', 1, 0, 0, 0, 0, 253000),
(241, 2, 3, 1, '2013-04-19 20:36:00', '2013-04-19 23:05:00', 'Phụ thu:Thuốc hút', 1, 0, 0, 25000, 0, 1022000),
(242, 26, 3, 1, '2013-04-19 21:00:00', '2013-04-19 22:25:00', '', 1, 0, 0, 0, 0, 562000),
(243, 27, 3, 1, '2013-04-19 23:15:00', '2013-04-20 01:26:00', 'Phụ thu: Trái cây thêm', 1, 0, 0, 30000, 0, 794000),
(244, 2, 3, 1, '2013-04-22 21:07:15', '2013-04-22 22:57:00', '', 1, 0, 0, 0, 0, 347000),
(246, 16, 3, 1, '2013-04-22 22:32:00', '2013-04-23 00:13:00', 'Ghi chú:Phụ thu thuốc hút', 1, 0, 0, 25000, 0, 719000),
(247, 2, 3, 1, '2013-04-23 15:02:00', '2013-04-23 16:40:00', '', 1, 0, 0, 0, 0, 424000),
(248, 27, 3, 1, '2013-04-23 19:07:07', '2013-04-23 20:25:00', '', 1, 0, 15, 0, 0, 396000),
(249, 2, 3, 1, '2013-04-23 20:40:00', '2013-04-23 23:57:00', '', 1, 0, 0, 0, 0, 703000),
(250, 27, 3, 1, '2013-04-23 22:02:41', '2013-04-24 01:22:00', '', 1, 0, 0, 0, 0, 814000),
(251, 1, 3, 1, '2013-04-24 15:09:00', '2013-04-24 17:09:00', '', 1, 0, 0, 0, 0, 298000),
(252, 16, 3, 1, '2013-04-24 17:30:00', '2013-04-24 19:41:00', 'Thu 1.030.000', 1, 0, 0, 0, 0, 1031000),
(253, 2, 3, 1, '2013-04-24 18:47:02', '2013-04-24 21:00:00', '', 1, 0, 0, 0, 0, 841000),
(254, 2, 3, 1, '2013-04-24 22:47:00', '2013-04-25 00:30:00', '', 1, 0, 0, 0, 0, 369000),
(255, 2, 3, 1, '2013-04-25 13:14:09', '2013-04-25 15:14:00', '', 1, 0, 0, 0, 0, 556000),
(256, 14, 3, 1, '2013-04-25 15:57:00', '2013-04-25 16:45:00', '', 1, 0, 0, 0, 0, 451000),
(258, 2, 3, 16, '2013-04-25 22:00:00', '2013-04-25 23:50:00', 'Thuoc JET,Phiếu Anh 2', 1, 0, 0, 25000, 0, 1304000),
(259, 16, 3, 1, '2013-04-25 23:17:01', '2013-04-26 00:50:00', '', 1, 0, 0, 0, 0, 485000),
(260, 17, 3, 1, '2013-04-26 21:18:43', '2013-04-26 23:57:00', '', 1, 0, 0, 0, 0, 511000),
(261, 26, 3, 1, '2013-04-26 23:09:05', '2013-04-27 00:15:00', '', 1, 0, 0, 0, 0, 630000),
(262, 2, 3, 1, '2013-04-26 23:50:09', '2013-04-27 01:30:00', '', 1, 0, 0, 0, 0, 425000),
(263, 16, 3, 1, '2013-04-27 00:09:08', '2013-04-27 01:33:00', 'Thuốc hút', 1, 0, 0, 25000, 0, 507000),
(264, 2, 3, 1, '2013-04-27 18:00:09', '2013-04-27 19:55:00', '', 1, 0, 0, 0, 0, 866000),
(265, 16, 3, 17, '2013-04-27 18:12:34', '2013-04-27 20:10:00', 'Anh Tâm Nợ', 2, 0, 0, 0, 0, 332000),
(266, 1, 3, 1, '2013-04-27 23:00:00', '2013-04-27 23:45:00', 'Phụ thu mực+cánh gà chiên nước mắm', 1, 0, 0, 407000, 0, 1054000),
(267, 2, 3, 1, '2013-04-27 22:50:49', '2013-04-28 01:43:00', '', 1, 0, 0, 0, 0, 789000),
(268, 14, 3, 1, '2013-04-28 14:45:16', '2013-04-28 16:30:00', '', 1, 0, 0, 0, 0, 1377000),
(269, 17, 3, 1, '2013-04-28 14:52:57', '2013-04-28 15:16:00', '', 1, 0, 0, 0, 0, 161000),
(270, 2, 3, 1, '2013-04-28 16:54:18', '2013-04-28 18:12:00', '', 1, 0, 0, 0, 0, 571000),
(273, 2, 3, 1, '2013-04-28 20:24:00', '2013-04-28 21:36:00', '', 1, 0, 0, 0, 0, 211000),
(274, 26, 3, 1, '2013-04-28 18:35:00', '2013-04-28 19:52:00', '', 1, 0, 0, 0, 0, 288000),
(275, 17, 3, 1, '2013-04-28 22:24:16', '2013-04-28 22:54:00', '', 1, 0, 0, 0, 0, 123000),
(276, 16, 3, 1, '2013-04-28 22:35:00', '2013-04-29 00:29:00', '', 1, 0, 0, 0, 0, 494000),
(277, 2, 3, 1, '2013-04-28 22:50:41', '2013-04-28 23:56:00', '', 1, 0, 0, 0, 0, 302000),
(278, 26, 3, 1, '2013-04-29 14:00:00', '2013-04-29 15:53:00', '', 1, 0, 0, 0, 0, 983000),
(279, 27, 3, 1, '2013-04-29 14:05:00', '2013-04-29 15:10:00', 'Thuốc hút', 1, 0, 0, 25000, 0, 224000),
(280, 16, 3, 1, '2013-04-29 16:16:00', '2013-04-29 18:35:00', '', 1, 0, 0, 0, 0, 308000),
(281, 2, 3, 1, '2013-04-29 21:58:00', '2013-04-29 23:38:00', 'Phụ thu thuốc hút.Nhí  Nợ', 1, 0, 0, 25000, 0, 519000),
(282, 16, 3, 1, '2013-04-29 23:16:52', '2013-04-30 00:45:00', '', 1, 0, 0, 0, 0, 326000),
(283, 17, 3, 1, '2013-04-30 14:35:00', '2013-04-30 16:27:00', '', 1, 0, 0, 0, 0, 395000),
(284, 2, 3, 1, '2013-04-30 19:15:00', '2013-05-01 21:20:00', 'Anh 2 Tặng 1 con khô mực', 1, 0, 0, 0, 0, 2652000),
(285, 26, 3, 12, '2013-04-30 19:25:00', '2013-04-30 21:35:00', 'Cậu mợ 3 tiếp khách(Chú út+Chú 6 Cao)', 1, 0, 0, 0, 0, 995000),
(286, 16, 3, 1, '2013-04-30 20:00:00', '2013-04-30 21:05:00', '', 1, 0, 0, 0, 0, 312000),
(287, 27, 3, 1, '2013-04-30 20:44:00', '2013-04-30 23:05:00', 'Phụ thu thuốc 555', 1, 0, 0, 35000, 0, 974000),
(288, 16, 3, 1, '2013-04-30 21:40:00', '2013-04-30 23:40:00', '', 1, 0, 0, 0, 0, 616000),
(289, 1, 3, 1, '2013-04-30 21:46:00', '2013-04-30 23:35:00', '', 1, 0, 0, 0, 0, 423000),
(290, 2, 3, 16, '2013-04-30 22:25:00', '2013-04-30 23:25:00', 'Anh 2 tiếp khách Anh Tuấn', 1, 0, 0, 0, 0, 176000),
(295, 17, 3, 1, '2013-04-30 21:45:00', '2013-04-30 23:45:00', '', 1, 0, 0, 0, 0, 718000),
(296, 27, 3, 1, '2013-05-01 14:12:00', '2013-05-01 15:43:00', 'Phụ thu :Trái cây thêm', 1, 0, 0, 30000, 0, 0),
(297, 16, 3, 1, '2013-05-01 19:05:00', '2013-05-01 21:29:00', '', 1, 0, 0, 0, 0, 0),
(298, 26, 3, 1, '2013-05-01 22:49:16', '2013-05-01 23:50:00', '', 1, 0, 0, 0, 0, 0),
(299, 26, 3, 1, '2013-05-02 21:44:13', '2013-05-02 22:30:00', '', 1, 0, 0, 0, 0, 0),
(300, 2, 3, 1, '2013-05-02 22:45:00', '2013-05-03 00:06:00', '', 1, 0, 0, 0, 0, 0),
(301, 16, 3, 1, '2013-05-02 23:03:00', '2013-05-03 01:00:00', '', 1, 0, 0, 0, 0, 0),
(302, 27, 3, 1, '2013-05-02 23:25:00', '2013-05-03 00:27:00', '', 1, 0, 0, 0, 0, 0),
(303, 2, 3, 1, '2013-05-03 00:00:00', '2013-05-03 01:00:00', 'Anh Minh nợ', 1, 0, 0, 0, 0, 0),
(304, 1, 3, 1, '2013-05-03 00:12:34', '2013-05-03 00:12:34', '', 1, 0, 0, 0, 0, 0),
(305, 2, 3, 1, '2013-05-03 15:19:00', '2013-05-03 16:50:00', 'Phụ thu thuốc hút', 1, 0, 0, 25000, 0, 0),
(306, 2, 3, 1, '2013-05-03 18:37:00', '2013-05-03 22:23:00', 'Anh Tâm(Đã trừ phiếu này vào lương)', 1, 0, 0, 0, 0, 0),
(307, 1, 3, 1, '2013-05-04 20:36:12', '2013-05-04 22:28:00', '', 1, 0, 0, 0, 0, 0),
(308, 2, 3, 1, '2013-05-04 21:04:41', '2013-05-04 21:56:00', '', 1, 0, 0, 0, 0, 0),
(309, 16, 3, 1, '2013-05-04 23:28:04', '2013-05-05 00:28:00', '', 1, 0, 0, 0, 0, 0),
(310, 2, 3, 1, '2013-05-05 12:16:00', '2013-05-05 14:10:00', 'Thu 430.000', 1, 0, 0, 0, 0, 0),
(311, 2, 3, 1, '2013-05-05 16:30:00', '2013-05-05 19:30:00', '3 dĩa khô nhái + 1 dĩa chả giò.Anh2 (Nợ)', 1, 0, 0, 0, 0, 0),
(312, 14, 3, 1, '2013-05-05 17:21:17', '2013-05-05 19:10:00', '', 1, 0, 0, 0, 0, 0),
(313, 16, 3, 1, '2013-05-05 19:00:00', '2013-05-05 20:49:00', 'Bớt khách ', 1, 1000, 0, 0, 0, 0),
(314, 2, 3, 1, '2013-05-05 22:38:07', '2013-05-06 01:06:00', 'Anh toàn +Anh Minh (Nợ)', 1, 0, 0, 0, 0, 0),
(315, 1, 3, 1, '2013-05-05 23:40:51', '2013-05-06 01:05:00', '', 1, 0, 0, 0, 0, 0),
(316, 16, 3, 1, '2013-05-05 23:41:06', '2013-05-06 02:10:00', 'Phụ thu Trái cây thêm', 1, 0, 0, 30000, 0, 0),
(317, 2, 3, 1, '2013-05-06 20:00:00', '2013-05-06 21:20:00', '', 1, 0, 0, 0, 0, 0),
(318, 16, 3, 1, '2013-05-06 21:04:41', '2013-05-06 22:55:00', '', 1, 0, 0, 0, 0, 0),
(319, 17, 3, 1, '2013-05-06 22:05:17', '2013-05-07 01:50:00', 'Phụ thu: thuốc hút.Anh Khoa tặng 1 phần nhái sấy', 1, 0, 0, 25000, 0, 0),
(320, 2, 3, 1, '2013-05-06 23:03:31', '2013-05-07 01:07:00', '', 1, 0, 0, 0, 0, 0),
(321, 14, 3, 1, '2013-05-06 23:27:57', '2013-05-07 01:56:00', 'Phụ thu: Thuốc hút + mì ', 1, 0, 0, 35000, 0, 0),
(322, 2, 3, 1, '2013-05-07 16:47:36', '2013-05-07 18:55:00', 'Phụ thu:Thuốc hút', 1, 0, 0, 25000, 0, 0),
(325, 17, 3, 1, '2013-05-07 17:10:00', '2013-05-07 19:30:00', 'Phụ thu: thuốc hút', 1, 0, 0, 25000, 0, 0),
(326, 3, 3, 1, '2013-05-07 17:47:54', '2013-05-07 18:53:00', '', 1, 0, 0, 0, 0, 0),
(327, 1, 3, 1, '2013-05-07 21:51:44', '2013-05-07 21:51:44', '', 1, 0, 0, 0, 0, 0),
(328, 17, 3, 1, '2013-05-07 23:28:23', '2013-05-08 00:26:00', '', 1, 0, 0, 0, 0, 0),
(329, 1, 3, 1, '2013-05-07 23:34:24', '2013-05-08 00:40:00', '', 1, 0, 0, 0, 0, 0),
(330, 2, 3, 1, '2013-05-07 23:57:39', '2013-05-08 04:10:00', 'Phụ thu: Thuốc hút + khăn giấy bịch', 1, 0, 0, 55000, 0, 0),
(331, 2, 3, 1, '2013-05-08 21:44:39', '2013-05-08 23:15:00', '', 1, 0, 0, 0, 0, 0),
(332, 26, 3, 1, '2013-05-09 18:10:30', '2013-05-09 19:30:00', 'Phụ thu:thuốc hút', 1, 1000, 0, 25000, 0, 0),
(336, 2, 3, 1, '2013-04-01 12:45:00', '2013-04-01 14:15:00', '', 1, 1000, 0, 0, 0, 450000),
(337, 26, 3, 1, '2013-04-01 23:30:00', '2013-04-02 00:45:00', 'Phụ thu :Thuốc hút+mì gói', 1, 0, 0, 35000, 0, 436000),
(339, 2, 3, 1, '2013-04-02 23:15:00', '2013-04-03 00:45:00', '', 1, 0, 0, 0, 0, 401000),
(340, 2, 3, 1, '2013-04-01 21:10:00', '2013-04-02 00:10:00', 'Phụ thu: Thuốc hút', 1, 92000, 0, 25000, 0, 820000),
(342, 16, 3, 1, '2013-04-03 12:35:00', '2013-04-03 13:19:00', '', 1, 0, 0, 0, 0, 269000),
(343, 27, 3, 1, '2013-04-03 19:44:00', '2013-04-03 23:34:00', 'Tặng 2 dĩa khô mực+1 dĩa chả giò ghế', 1, 0, 20, 0, 0, 1444000),
(344, 16, 3, 15, '2013-04-03 19:55:00', '2013-04-03 21:45:00', 'NỢ', 1, 0, 0, 0, 0, 457000),
(345, 26, 3, 1, '2013-04-03 20:35:00', '2013-04-03 21:55:00', '', 1, 0, 0, 0, 0, 657000),
(346, 2, 3, 1, '2013-04-03 22:50:00', '2013-04-04 00:35:00', '', 1, 0, 0, 0, 0, 391000),
(347, 2, 3, 1, '2013-04-04 20:36:00', '2013-04-04 21:42:00', '', 1, 0, 0, 0, 0, 205000),
(348, 16, 3, 1, '2013-04-04 20:56:00', '2013-04-04 22:09:00', '', 1, 0, 0, 0, 0, 236000),
(349, 17, 3, 1, '2013-04-04 21:02:00', '2013-04-04 22:15:00', '', 1, 0, 0, 0, 0, 345000),
(350, 17, 3, 1, '2013-04-04 00:07:00', '2013-04-04 02:04:00', 'Anh Khoa tặng 1 dĩa khô mực', 1, 0, 0, 0, 0, 405000),
(351, 2, 3, 16, '2013-04-04 00:20:00', '2013-04-04 03:10:00', 'Anh Khoa Tiếp khách', 1, 0, 0, 0, 0, 710000),
(352, 26, 3, 1, '2013-04-04 00:20:00', '2013-04-04 01:55:00', '', 1, 0, 0, 0, 0, 406000),
(353, 16, 3, 1, '2013-04-05 00:01:00', '2013-04-05 03:54:00', '', 1, 1000, 0, 0, 0, 893000),
(354, 27, 3, 1, '2013-04-06 23:58:00', '2013-04-07 03:15:00', 'Thực thu', 1, 0, 0, 8000, 0, 990000),
(355, 16, 3, 1, '2013-04-06 00:53:00', '2013-04-06 01:53:00', '', 1, 0, 0, 0, 0, 254000),
(356, 16, 3, 1, '2013-04-02 00:30:00', '2013-04-02 02:15:00', 'Anh Khoa tặng 1 khô mực', 1, 0, 0, 0, 0, 297000),
(357, 27, 3, 1, '2013-04-02 00:10:00', '2013-04-02 01:55:00', '', 1, 0, 0, 0, 0, 485000),
(358, 16, 3, 1, '2013-04-19 23:30:00', '2013-04-20 01:00:00', '', 1, 0, 0, 0, 0, 379000),
(359, 2, 3, 1, '2013-04-19 00:45:00', '2013-04-19 02:15:00', 'Phụ thu:thuốc hút', 1, 0, 0, 25000, 0, 422000),
(363, 15, 3, 1, '2013-04-30 21:45:00', '2013-04-30 21:45:00', 'Anh Khoa khuyến mãi tiền karaoke', 1, 0, 0, 0, 0, 310000),
(366, 2, 3, 1, '2013-05-09 23:07:24', '2013-05-10 01:32:00', '', 1, 0, 0, 0, 0, 0),
(367, 16, 3, 1, '2013-05-09 23:16:16', '2013-05-10 00:42:00', 'Phụ thu:Thuốc hút', 1, 0, 0, 25000, 0, 0),
(368, 26, 3, 16, '2013-04-09 12:55:00', '2013-04-09 12:55:00', 'Anh 2 Tiếp khách', 1, 0, 0, 0, 0, 509000),
(372, 26, 3, 1, '2013-05-10 13:09:28', '2013-05-10 14:35:00', 'Anh Khoa tặng 1 dĩa nhái chiên', 1, 0, 0, 0, 0, 0),
(373, 3, 3, 1, '2013-04-30 23:00:00', '2013-05-01 00:15:00', '', 1, 2000, 0, 0, 0, 332000),
(374, 14, 3, 1, '2013-04-30 23:05:00', '2013-05-01 00:15:00', '', 1, 0, 0, 0, 0, 235000),
(375, 2, 3, 1, '2013-05-10 17:28:21', '2013-05-10 19:15:00', '', 1, 0, 0, 0, 0, 0),
(376, 16, 3, 1, '2013-05-08 12:09:00', '2013-05-08 12:09:00', 'Anh 2 nhậu với Anh Tuấn cá cơm(NỢ)', 1, 0, 0, 0, 0, 0),
(377, 17, 3, 1, '2013-05-10 20:51:07', '2013-05-10 23:32:00', 'Phụ thu:Thuốc hút', 1, 0, 0, 25000, 0, 0),
(378, 1, 3, 1, '2013-05-10 22:42:09', '2013-05-11 00:06:00', 'Phụ thu:Thuốc hút', 1, 0, 0, 25000, 0, 0),
(379, 2, 3, 1, '2013-05-11 12:04:00', '2013-05-11 13:42:00', '', 1, 0, 0, 0, 0, 0),
(380, 16, 3, 1, '2013-05-11 14:05:32', '2013-05-11 19:36:00', 'Phiếu của anh Tuấn Anh (NỢ)', 1, 0, 0, 0, 0, 0),
(381, 26, 3, 1, '2013-05-11 17:30:00', '2013-05-11 20:05:00', 'Cậu 3 tiếp khách(Cùng ngày phòng Anh Tuấn Anh)', 1, 0, 0, 0, 0, 0),
(383, 2, 3, 1, '2013-05-11 22:34:11', '2013-05-12 01:37:00', 'Phụ thu:Thuốc hút+ trà đá', 1, 1000, 0, 35000, 0, 0),
(386, 17, 3, 1, '2013-05-12 01:36:07', '2013-05-12 03:36:00', 'Phụ thu:Trà đá', 1, 0, 0, 5000, 0, 0),
(387, 1, 3, 1, '2013-05-12 01:14:00', '2013-05-12 01:14:00', 'Phụ thu:Thuốc hút', 1, 0, 0, 25000, 0, 0),
(390, 1, 1, 1, '2013-05-11 22:34:00', '2013-05-12 00:55:00', '', 1, 0, 0, 0, 0, 0),
(391, 3, 3, 1, '2013-05-11 23:14:00', '2013-05-12 01:50:00', '', 1, 0, 0, 0, 0, 0),
(392, 26, 3, 1, '2013-05-12 15:35:00', '2013-05-12 18:20:00', '', 1, 0, 0, 0, 0, 0),
(393, 2, 3, 1, '2013-05-13 17:34:23', '2013-05-13 19:12:00', 'Phụ thu:Thuốc hút', 1, 0, 0, 25000, 0, 0),
(395, 3, 3, 1, '2013-05-13 22:10:00', '2013-05-13 23:47:00', '', 1, 0, 0, 0, 0, 0),
(396, 17, 3, 1, '2013-05-14 21:34:36', '2013-05-14 23:58:00', '', 1, 0, 0, 1000, 0, 0),
(397, 1, 3, 1, '2013-05-15 13:15:00', '2013-05-15 14:41:00', 'Mợ 3 tặng 1 dĩa nhái chiên+1 đậu nành rang', 1, 0, 0, 0, 0, 0),
(398, 27, 3, 1, '2013-05-15 13:19:24', '2013-05-15 15:20:00', 'Phụ thu: Mít ', 1, 0, 0, 70000, 0, 0),
(399, 1, 3, 1, '2013-05-15 14:41:00', '2013-05-15 15:41:14', 'Mợ 3 tiếp khách', 1, 0, 0, 0, 0, 0),
(400, 1, 3, 1, '2013-05-15 19:42:21', '2013-05-15 19:42:21', 'BÁN LẺ', 1, 0, 0, 0, 0, 0),
(402, 17, 2, 1, '2013-05-16 18:15:00', '2013-05-16 20:08:00', 'Thực thu', 1, 6000, 0, 0, 0, 480000),
(404, 2, 3, 1, '2013-05-15 22:47:00', '2013-05-16 00:47:00', 'Phụ thu: Thuốc hút', 1, 0, 0, 25000, 0, 363000),
(405, 2, 3, 1, '2013-05-16 21:46:07', '2013-05-16 23:39:00', '', 1, 0, 0, 0, 0, 293000),
(406, 3, 3, 1, '2013-05-16 22:04:00', '2013-05-16 22:35:00', '', 1, 0, 0, 0, 0, 60000),
(407, 1, 3, 1, '2013-05-16 22:04:00', '2013-05-17 00:05:00', 'Giu 1 bằng lái xe+cmnd(Quỳnh Nợ)Trả trước 200.000đ', 1, 0, 0, 0, 0, 363000),
(408, 2, 3, 1, '2013-05-17 17:30:00', '2013-05-17 18:50:00', '', 1, 0, 0, 0, 0, 445000),
(409, 1, 3, 1, '2013-05-17 18:30:00', '2013-05-17 20:45:00', 'MỢ 3 TIẾP KHÁCH', 1, 0, 0, 0, 0, 263000),
(410, 26, 3, 1, '2013-05-17 19:17:38', '2013-05-17 20:20:00', '', 1, 0, 0, 0, 0, 672000),
(411, 2, 3, 1, '2013-05-17 19:57:17', '2013-05-17 21:19:00', '', 1, 0, 0, 0, 0, 253000),
(412, 14, 3, 1, '2013-05-17 20:58:41', '2013-05-17 22:00:00', '', 1, 0, 0, 0, 0, 344000),
(413, 2, 3, 1, '2013-05-17 23:43:25', '2013-05-18 01:20:00', 'Phụ thu:Thuốc hút', 1, 0, 0, 25000, 0, 330000),
(414, 27, 3, 1, '2013-05-18 19:25:00', '2013-05-18 21:00:00', '', 1, 0, 20, 0, 0, 560000),
(416, 2, 3, 1, '2013-05-18 20:04:00', '2013-05-18 20:40:00', '', 1, 0, 0, 0, 0, 182000),
(417, 17, 3, 1, '2013-05-18 22:13:26', '2013-05-18 22:45:00', '', 1, 0, 0, 0, 0, 163000),
(419, 1, 3, 1, '2013-05-19 00:45:34', '2013-05-19 00:45:34', 'BÁN LẺ', 1, 0, 0, 0, 0, 35000),
(420, 26, 3, 1, '2013-05-19 12:38:00', '2013-05-19 15:00:00', '', 1, 0, 0, 0, 0, 676000),
(421, 16, 3, 1, '2013-05-19 15:35:00', '2013-05-19 16:35:00', '', 1, 0, 0, 0, 0, 272000),
(422, 26, 3, 1, '2013-05-19 15:35:00', '2013-05-19 15:35:00', 'Anh Khoa (NỢ) Nhậu với Anh Đoàn', 1, 0, 0, 0, 0, 273000),
(423, 27, 3, 1, '2013-05-19 17:00:00', '2013-05-19 18:30:00', '', 1, 0, 0, 0, 0, 546000),
(424, 2, 3, 1, '2013-05-18 23:31:00', '2013-05-19 00:42:00', '', 1, 0, 0, 0, 0, 232000),
(425, 2, 3, 1, '2013-05-19 20:20:00', '2013-05-19 22:43:00', 'Anh Khoa(NỢ) nhậu với a Đoàn', 1, 0, 0, 0, 0, 640000),
(426, 16, 3, 1, '2013-05-19 20:29:00', '2013-05-19 22:05:00', '', 1, 0, 0, 0, 0, 594000),
(428, 26, 3, 1, '2013-05-19 21:15:28', '2013-05-19 22:15:00', 'THỰC THU', 1, 4000, 0, 0, 0, 250000),
(429, 1, 3, 1, '2013-05-19 23:12:48', '2013-05-20 00:43:00', '', 1, 0, 0, 0, 0, 317000),
(430, 17, 3, 1, '2013-05-19 23:56:00', '2013-05-20 00:35:00', '', 1, 0, 0, 0, 0, 202000),
(431, 26, 3, 1, '2013-05-20 14:35:00', '2013-05-20 17:35:00', 'Phụ thu:Thuốc hút(2 gói)', 1, 0, 0, 50000, 0, 1030000),
(433, 27, 3, 16, '2013-05-20 15:20:00', '2013-05-20 15:20:00', '', 2, 0, 0, 0, 0, 670000),
(434, 27, 3, 1, '2013-05-20 16:30:00', '2013-05-20 18:11:00', '', 1, 0, 0, 0, 0, 411000),
(435, 2, 3, 1, '2013-05-20 23:20:00', '2013-05-21 00:20:00', '', 1, 0, 0, 0, 0, 266000),
(436, 16, 3, 1, '2013-05-20 23:20:00', '2013-05-21 00:50:00', '', 1, 0, 0, 0, 0, 332000),
(437, 17, 3, 1, '2013-05-21 00:02:00', '2013-05-21 01:50:00', '', 1, 0, 0, 0, 0, 276000),
(438, 1, 1, 1, '2013-09-03 10:30:00', '2013-09-03 14:00:00', '', 0, 0, 0, 0, 0, 491000),
(440, 17, 1, 1, '2013-08-11 01:11:39', '2013-08-11 01:55:00', '', 0, 0, 0, 0, 0, 159000);

-- --------------------------------------------------------

--
-- Table structure for table `baduc_session_detail`
--

CREATE TABLE IF NOT EXISTS `baduc_session_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsession` int(11) NOT NULL,
  `idcourse` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idsession` (`idsession`),
  KEY `idcourse` (`idcourse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1827 ;

--
-- Dumping data for table `baduc_session_detail`
--

INSERT INTO `baduc_session_detail` (`id`, `idsession`, `idcourse`, `count`, `price`) VALUES
(303, 158, 111, 11, 12000),
(304, 158, 110, 1, 50000),
(305, 158, 131, 6, 2000),
(306, 158, 122, 2, 6000),
(326, 162, 111, 7, 12000),
(327, 162, 110, 1, 50000),
(328, 162, 131, 5, 2000),
(329, 162, 122, 1, 6000),
(330, 162, 120, 1, 30000),
(331, 163, 111, 29, 12000),
(332, 163, 110, 1, 50000),
(333, 163, 131, 10, 2000),
(334, 164, 138, 16, 15000),
(335, 164, 110, 1, 50000),
(337, 164, 131, 10, 2000),
(338, 163, 127, 2, 12000),
(340, 164, 134, 4, 50000),
(341, 164, 53, 3, 12000),
(342, 164, 120, 1, 30000),
(343, 164, 119, 1, 30000),
(344, 164, 142, 1, 12000),
(345, 164, 118, 1, 15000),
(346, 164, 115, 1, 30000),
(347, 164, 122, 1, 6000),
(348, 164, 121, 1, 30000),
(349, 164, 139, 2, 10000),
(350, 163, 117, 1, 10000),
(351, 163, 122, 1, 6000),
(352, 163, 118, 1, 15000),
(353, 163, 121, 1, 30000),
(354, 163, 116, 1, 25000),
(355, 165, 111, 17, 12000),
(356, 165, 110, 1, 50000),
(357, 165, 131, 5, 2000),
(358, 166, 111, 16, 12000),
(359, 166, 110, 1, 50000),
(360, 166, 131, 3, 2000),
(361, 165, 139, 1, 10000),
(362, 165, 122, 2, 6000),
(363, 165, 132, 1, 4000),
(364, 165, 116, 1, 25000),
(365, 166, 119, 1, 30000),
(366, 166, 139, 1, 10000),
(367, 166, 117, 1, 10000),
(368, 166, 122, 1, 6000),
(369, 168, 138, 18, 15000),
(370, 168, 110, 1, 50000),
(371, 168, 131, 2, 2000),
(372, 169, 137, 13, 14000),
(374, 169, 110, 1, 50000),
(375, 169, 131, 2, 2000),
(376, 170, 111, 5, 12000),
(377, 170, 110, 1, 50000),
(379, 168, 139, 2, 10000),
(380, 168, 142, 1, 12000),
(381, 171, 111, 8, 12000),
(382, 171, 110, 1, 50000),
(383, 171, 131, 2, 2000),
(384, 169, 117, 1, 10000),
(385, 169, 139, 1, 10000),
(386, 169, 118, 1, 15000),
(387, 169, 121, 1, 30000),
(388, 169, 122, 2, 6000),
(390, 170, 134, 1, 50000),
(391, 171, 119, 1, 30000),
(392, 171, 121, 1, 30000),
(393, 171, 122, 2, 6000),
(394, 171, 142, 1, 12000),
(395, 172, 111, 5, 12000),
(396, 173, 108, 10, 20000),
(397, 173, 110, 1, 50000),
(398, 173, 131, 5, 2000),
(399, 173, 122, 2, 6000),
(400, 173, 139, 1, 10000),
(401, 174, 112, 8, 15000),
(402, 174, 131, 2, 2000),
(403, 174, 110, 1, 50000),
(404, 174, 122, 2, 6000),
(405, 175, 111, 4, 12000),
(406, 175, 110, 1, 50000),
(408, 176, 111, 7, 12000),
(409, 176, 110, 1, 50000),
(410, 176, 131, 2, 2000),
(411, 175, 119, 1, 30000),
(412, 175, 120, 1, 30000),
(418, 176, 125, 1, 7000),
(419, 176, 142, 1, 12000),
(420, 176, 141, 1, 17000),
(427, 178, 111, 21, 12000),
(428, 178, 110, 1, 50000),
(429, 178, 131, 5, 2000),
(430, 178, 117, 1, 10000),
(431, 178, 121, 1, 30000),
(432, 178, 122, 1, 6000),
(433, 178, 116, 1, 25000),
(434, 179, 126, 1, 10000),
(435, 180, 112, 13, 15000),
(436, 180, 110, 1, 50000),
(437, 180, 131, 5, 2000),
(438, 181, 110, 1, 50000),
(440, 181, 111, 20, 12000),
(441, 180, 120, 1, 30000),
(442, 180, 122, 1, 6000),
(443, 180, 132, 1, 4000),
(444, 180, 142, 1, 12000),
(445, 180, 139, 1, 10000),
(446, 182, 110, 1, 50000),
(448, 182, 112, 12, 15000),
(449, 181, 123, 1, 10000),
(450, 181, 118, 1, 15000),
(451, 182, 141, 1, 17000),
(452, 182, 117, 1, 10000),
(453, 182, 124, 1, 10000),
(454, 182, 122, 2, 6000),
(455, 182, 115, 1, 30000),
(456, 183, 108, 4, 20000),
(469, 183, 134, 1, 50000),
(470, 184, 112, 7, 15000),
(471, 184, 110, 1, 50000),
(472, 184, 131, 3, 2000),
(473, 186, 112, 9, 15000),
(474, 186, 110, 1, 50000),
(475, 186, 131, 1, 2000),
(476, 187, 111, 9, 12000),
(477, 184, 119, 1, 30000),
(478, 186, 134, 1, 50000),
(479, 188, 111, 6, 12000),
(480, 188, 110, 1, 50000),
(482, 189, 107, 14, 18000),
(483, 189, 110, 1, 50000),
(485, 193, 112, 12, 15000),
(486, 193, 134, 1, 50000),
(487, 193, 110, 1, 50000),
(488, 193, 131, 6, 2000),
(489, 193, 126, 1, 10000),
(490, 192, 111, 30, 12000),
(491, 192, 110, 1, 50000),
(492, 192, 131, 8, 2000),
(493, 194, 112, 11, 15000),
(494, 194, 110, 1, 50000),
(495, 194, 131, 1, 2000),
(496, 191, 111, 8, 12000),
(497, 191, 110, 2, 50000),
(499, 195, 138, 15, 15000),
(500, 195, 110, 1, 50000),
(501, 195, 131, 10, 2000),
(502, 190, 111, 20, 12000),
(503, 190, 110, 1, 50000),
(504, 190, 131, 3, 2000),
(505, 189, 120, 1, 30000),
(506, 189, 125, 1, 7000),
(507, 189, 142, 1, 12000),
(508, 189, 122, 1, 6000),
(509, 192, 117, 2, 10000),
(510, 192, 119, 1, 30000),
(511, 192, 120, 1, 30000),
(512, 192, 121, 1, 30000),
(513, 192, 123, 1, 10000),
(514, 192, 124, 1, 10000),
(515, 192, 142, 1, 12000),
(516, 192, 143, 1, 12000),
(517, 192, 116, 1, 25000),
(518, 195, 117, 3, 10000),
(519, 195, 139, 2, 10000),
(520, 195, 120, 1, 30000),
(521, 195, 125, 3, 7000),
(522, 195, 124, 2, 10000),
(523, 195, 119, 2, 30000),
(524, 195, 121, 2, 30000),
(525, 195, 122, 1, 6000),
(526, 195, 142, 2, 12000),
(527, 195, 118, 2, 15000),
(528, 195, 132, 1, 4000),
(529, 195, 116, 1, 25000),
(530, 195, 115, 1, 30000),
(531, 196, 111, 20, 12000),
(532, 196, 110, 1, 50000),
(533, 196, 131, 10, 2000),
(534, 196, 134, 1, 50000),
(535, 197, 108, 48, 20000),
(536, 197, 110, 1, 50000),
(537, 197, 131, 10, 2000),
(538, 197, 117, 1, 10000),
(539, 197, 139, 1, 10000),
(540, 197, 125, 1, 7000),
(541, 197, 121, 1, 30000),
(542, 197, 141, 1, 17000),
(543, 197, 122, 2, 6000),
(544, 198, 112, 20, 15000),
(545, 198, 110, 1, 50000),
(546, 198, 131, 5, 2000),
(547, 198, 134, 1, 50000),
(548, 198, 122, 1, 6000),
(549, 199, 108, 8, 20000),
(550, 199, 126, 1, 10000),
(551, 199, 110, 1, 50000),
(552, 199, 131, 2, 2000),
(553, 199, 121, 1, 30000),
(555, 204, 112, 20, 15000),
(556, 204, 110, 1, 50000),
(557, 204, 131, 6, 2000),
(558, 201, 111, 8, 12000),
(559, 201, 110, 1, 50000),
(560, 201, 131, 2, 2000),
(561, 202, 112, 15, 15000),
(562, 202, 110, 1, 50000),
(563, 202, 131, 2, 2000),
(564, 200, 111, 5, 12000),
(565, 200, 143, 2, 12000),
(566, 200, 110, 1, 50000),
(568, 202, 120, 1, 30000),
(569, 201, 122, 1, 6000),
(570, 206, 108, 4, 20000),
(571, 206, 143, 1, 12000),
(572, 206, 110, 1, 50000),
(573, 206, 131, 1, 2000),
(574, 205, 111, 11, 12000),
(575, 205, 110, 1, 50000),
(576, 205, 131, 2, 2000),
(577, 204, 139, 1, 10000),
(578, 204, 117, 2, 10000),
(579, 204, 118, 1, 15000),
(580, 204, 125, 2, 7000),
(581, 204, 141, 1, 17000),
(582, 204, 121, 1, 30000),
(583, 204, 116, 1, 25000),
(584, 204, 120, 1, 30000),
(585, 204, 119, 1, 30000),
(586, 204, 122, 2, 6000),
(587, 206, 121, 2, 30000),
(588, 206, 122, 1, 6000),
(589, 205, 139, 1, 10000),
(590, 207, 107, 48, 18000),
(592, 207, 110, 2, 50000),
(593, 207, 126, 2, 10000),
(594, 207, 54, 1, 10000),
(595, 207, 131, 20, 2000),
(596, 207, 119, 1, 30000),
(597, 207, 120, 1, 30000),
(598, 207, 117, 2, 10000),
(599, 207, 124, 1, 10000),
(600, 207, 118, 1, 15000),
(601, 207, 121, 1, 30000),
(603, 207, 141, 1, 17000),
(604, 207, 122, 1, 6000),
(605, 207, 115, 1, 30000),
(606, 207, 139, 1, 10000),
(607, 207, 116, 1, 25000),
(608, 209, 112, 14, 15000),
(609, 209, 142, 1, 12000),
(610, 209, 139, 2, 10000),
(611, 208, 111, 69, 12000),
(612, 208, 110, 2, 50000),
(613, 208, 131, 10, 2000),
(614, 209, 131, 5, 2000),
(615, 210, 107, 14, 18000),
(616, 210, 110, 1, 50000),
(617, 210, 131, 10, 2000),
(618, 212, 111, 6, 12000),
(619, 212, 110, 1, 50000),
(620, 212, 131, 3, 2000),
(621, 213, 111, 11, 12000),
(622, 213, 110, 1, 50000),
(624, 212, 122, 1, 6000),
(625, 213, 120, 1, 30000),
(626, 213, 119, 1, 30000),
(627, 213, 117, 2, 10000),
(628, 213, 123, 1, 10000),
(629, 213, 124, 1, 10000),
(630, 213, 121, 1, 30000),
(631, 213, 141, 1, 17000),
(632, 213, 142, 1, 12000),
(633, 214, 111, 6, 12000),
(634, 214, 110, 1, 50000),
(636, 211, 111, 43, 12000),
(637, 211, 110, 1, 50000),
(638, 211, 131, 16, 2000),
(639, 211, 125, 1, 7000),
(640, 211, 122, 2, 6000),
(641, 211, 115, 1, 30000),
(642, 211, 116, 1, 25000),
(643, 214, 117, 1, 10000),
(644, 214, 139, 1, 10000),
(645, 214, 122, 1, 6000),
(646, 214, 116, 1, 25000),
(647, 214, 118, 1, 15000),
(648, 215, 111, 7, 12000),
(649, 215, 110, 1, 50000),
(650, 215, 131, 6, 2000),
(651, 215, 139, 1, 10000),
(652, 216, 111, 3, 12000),
(653, 216, 110, 1, 50000),
(655, 217, 111, 11, 12000),
(656, 217, 110, 1, 50000),
(657, 217, 131, 1, 2000),
(658, 219, 107, 20, 18000),
(659, 219, 110, 1, 50000),
(660, 219, 131, 9, 2000),
(661, 220, 111, 4, 12000),
(663, 220, 131, 1, 2000),
(664, 219, 117, 1, 10000),
(665, 221, 107, 8, 18000),
(666, 221, 110, 1, 50000),
(667, 221, 131, 3, 2000),
(668, 220, 134, 1, 50000),
(669, 222, 107, 4, 18000),
(670, 222, 110, 1, 50000),
(671, 222, 131, 2, 2000),
(672, 223, 112, 13, 15000),
(673, 223, 110, 1, 50000),
(674, 223, 131, 1, 2000),
(675, 222, 122, 1, 6000),
(676, 222, 132, 1, 4000),
(677, 222, 116, 1, 25000),
(678, 223, 139, 1, 10000),
(679, 223, 116, 1, 25000),
(680, 224, 112, 3, 15000),
(681, 224, 110, 1, 50000),
(683, 225, 110, 1, 50000),
(684, 225, 131, 30, 2000),
(685, 225, 134, 2, 50000),
(686, 225, 119, 1, 30000),
(687, 225, 117, 1, 10000),
(688, 225, 121, 1, 30000),
(689, 225, 116, 1, 25000),
(690, 225, 115, 1, 30000),
(691, 225, 122, 1, 6000),
(692, 225, 139, 2, 10000),
(693, 225, 108, 48, 20000),
(694, 226, 111, 20, 12000),
(695, 226, 110, 1, 50000),
(696, 226, 131, 10, 2000),
(697, 227, 143, 2, 12000),
(698, 226, 134, 2, 50000),
(699, 228, 112, 27, 15000),
(700, 228, 110, 2, 50000),
(701, 228, 131, 9, 2000),
(702, 228, 144, 1, 60000),
(703, 229, 108, 17, 20000),
(704, 229, 110, 1, 50000),
(706, 230, 111, 6, 12000),
(707, 230, 110, 1, 50000),
(709, 229, 122, 1, 6000),
(710, 229, 139, 1, 10000),
(711, 228, 118, 1, 15000),
(712, 228, 117, 1, 10000),
(713, 228, 123, 1, 10000),
(714, 228, 142, 1, 12000),
(715, 228, 141, 1, 17000),
(716, 231, 107, 48, 18000),
(717, 231, 110, 1, 50000),
(718, 231, 131, 20, 2000),
(719, 231, 120, 1, 30000),
(720, 231, 117, 1, 10000),
(721, 231, 122, 1, 6000),
(722, 231, 139, 2, 10000),
(723, 231, 115, 1, 30000),
(727, 233, 111, 11, 12000),
(728, 233, 110, 1, 50000),
(729, 233, 131, 1, 2000),
(732, 233, 120, 1, 30000),
(740, 234, 111, 12, 12000),
(741, 234, 144, 1, 60000),
(742, 234, 131, 8, 2000),
(743, 234, 122, 1, 6000),
(744, 234, 139, 1, 10000),
(745, 234, 124, 1, 10000),
(746, 235, 112, 8, 15000),
(747, 235, 110, 1, 50000),
(748, 235, 131, 2, 2000),
(749, 237, 107, 16, 18000),
(750, 237, 110, 1, 50000),
(751, 237, 131, 10, 2000),
(752, 237, 53, 1, 12000),
(753, 237, 143, 1, 12000),
(754, 237, 115, 1, 30000),
(755, 237, 141, 1, 17000),
(756, 238, 126, 3, 10000),
(757, 238, 134, 1, 50000),
(758, 238, 120, 1, 30000),
(759, 238, 125, 1, 7000),
(760, 239, 111, 9, 12000),
(761, 239, 110, 1, 50000),
(762, 239, 131, 1, 2000),
(763, 239, 121, 1, 30000),
(764, 240, 107, 5, 18000),
(765, 240, 126, 1, 10000),
(766, 240, 139, 2, 10000),
(767, 241, 107, 35, 18000),
(768, 241, 110, 2, 50000),
(769, 241, 131, 5, 2000),
(770, 241, 139, 1, 10000),
(771, 241, 122, 1, 6000),
(772, 241, 141, 1, 17000),
(773, 242, 107, 17, 18000),
(774, 242, 110, 1, 50000),
(775, 242, 131, 2, 2000),
(776, 242, 119, 1, 30000),
(777, 242, 120, 1, 30000),
(778, 243, 111, 27, 12000),
(779, 243, 110, 1, 50000),
(780, 243, 131, 10, 2000),
(781, 243, 120, 1, 30000),
(782, 243, 119, 1, 30000),
(783, 243, 117, 1, 10000),
(784, 243, 118, 1, 15000),
(785, 243, 121, 1, 30000),
(786, 243, 141, 1, 17000),
(787, 243, 123, 1, 10000),
(788, 243, 124, 1, 10000),
(789, 235, 142, 1, 12000),
(790, 235, 141, 1, 17000),
(791, 235, 121, 1, 30000),
(792, 244, 111, 8, 12000),
(794, 244, 110, 1, 50000),
(795, 244, 143, 1, 12000),
(796, 246, 107, 24, 18000),
(797, 246, 110, 1, 50000),
(798, 246, 131, 10, 2000),
(799, 244, 139, 1, 10000),
(800, 244, 125, 2, 7000),
(801, 246, 121, 1, 30000),
(802, 246, 139, 1, 10000),
(803, 247, 111, 20, 12000),
(804, 247, 110, 1, 50000),
(805, 247, 131, 10, 2000),
(806, 248, 111, 20, 12000),
(807, 248, 110, 1, 50000),
(808, 248, 131, 10, 2000),
(809, 248, 122, 1, 6000),
(810, 248, 139, 2, 10000),
(811, 249, 111, 14, 12000),
(812, 249, 110, 1, 50000),
(813, 249, 131, 5, 2000),
(814, 250, 110, 1, 50000),
(816, 249, 144, 1, 60000),
(817, 250, 143, 4, 12000),
(818, 250, 111, 26, 12000),
(819, 249, 139, 1, 10000),
(820, 249, 125, 1, 7000),
(821, 249, 119, 1, 30000),
(822, 249, 143, 1, 12000),
(823, 249, 145, 1, 60000),
(824, 250, 120, 1, 30000),
(825, 250, 139, 1, 10000),
(826, 250, 125, 1, 7000),
(827, 250, 116, 1, 25000),
(828, 251, 107, 6, 18000),
(829, 251, 110, 1, 50000),
(830, 252, 110, 1, 50000),
(831, 252, 131, 20, 2000),
(832, 253, 112, 32, 15000),
(833, 253, 110, 2, 50000),
(834, 253, 131, 10, 2000),
(835, 252, 107, 39, 18000),
(836, 252, 126, 3, 10000),
(837, 252, 125, 1, 7000),
(838, 252, 124, 1, 10000),
(839, 252, 139, 1, 10000),
(840, 252, 118, 1, 15000),
(841, 253, 122, 1, 6000),
(842, 253, 123, 1, 10000),
(843, 253, 124, 1, 10000),
(844, 253, 139, 2, 10000),
(845, 254, 112, 9, 15000),
(846, 254, 110, 1, 50000),
(848, 254, 120, 1, 30000),
(849, 255, 111, 26, 12000),
(850, 255, 110, 1, 50000),
(851, 255, 131, 3, 2000),
(852, 255, 118, 1, 15000),
(853, 255, 139, 2, 10000),
(854, 255, 125, 1, 7000),
(855, 255, 122, 1, 6000),
(856, 256, 107, 16, 18000),
(857, 256, 110, 1, 50000),
(858, 256, 131, 10, 2000),
(859, 256, 116, 1, 25000),
(860, 256, 142, 1, 12000),
(861, 258, 107, 44, 18000),
(862, 258, 110, 2, 50000),
(863, 258, 131, 10, 2000),
(864, 259, 108, 12, 20000),
(865, 259, 110, 1, 50000),
(866, 259, 131, 3, 2000),
(867, 258, 144, 2, 60000),
(868, 258, 139, 1, 10000),
(869, 258, 142, 1, 12000),
(870, 258, 145, 1, 60000),
(871, 259, 124, 1, 10000),
(872, 259, 139, 1, 10000),
(873, 259, 115, 1, 30000),
(874, 260, 111, 11, 12000),
(875, 260, 110, 1, 50000),
(876, 260, 131, 1, 2000),
(877, 261, 107, 22, 18000),
(878, 261, 110, 1, 50000),
(879, 261, 131, 11, 2000),
(880, 260, 120, 1, 30000),
(881, 260, 139, 1, 10000),
(882, 260, 117, 1, 10000),
(883, 260, 118, 1, 15000),
(884, 260, 116, 1, 25000),
(885, 261, 122, 2, 6000),
(886, 261, 139, 2, 10000),
(887, 261, 117, 1, 10000),
(888, 261, 126, 1, 10000),
(889, 263, 111, 18, 12000),
(890, 263, 110, 1, 50000),
(891, 263, 131, 20, 2000),
(892, 262, 111, 10, 12000),
(893, 262, 110, 1, 50000),
(894, 262, 131, 3, 2000),
(895, 262, 120, 1, 30000),
(896, 262, 119, 1, 30000),
(897, 262, 117, 2, 10000),
(898, 262, 125, 1, 7000),
(899, 262, 142, 1, 12000),
(900, 263, 139, 5, 10000),
(901, 264, 111, 38, 12000),
(902, 264, 110, 1, 50000),
(903, 264, 131, 10, 2000),
(904, 265, 111, 10, 12000),
(905, 265, 110, 1, 50000),
(906, 265, 131, 1, 2000),
(907, 264, 144, 1, 60000),
(908, 264, 120, 1, 30000),
(909, 264, 119, 1, 30000),
(910, 264, 117, 1, 10000),
(911, 264, 121, 1, 30000),
(912, 264, 139, 1, 10000),
(913, 264, 122, 1, 6000),
(914, 264, 143, 1, 12000),
(915, 266, 107, 23, 18000),
(916, 266, 110, 1, 50000),
(917, 266, 131, 4, 2000),
(918, 267, 111, 30, 12000),
(919, 267, 110, 1, 50000),
(920, 267, 131, 10, 2000),
(921, 266, 126, 2, 10000),
(922, 266, 54, 2, 10000),
(923, 266, 142, 1, 12000),
(924, 266, 139, 3, 10000),
(925, 266, 116, 1, 25000),
(926, 267, 120, 1, 30000),
(927, 267, 117, 1, 10000),
(929, 267, 118, 1, 15000),
(930, 267, 122, 1, 6000),
(931, 267, 115, 1, 30000),
(932, 267, 139, 1, 10000),
(933, 269, 107, 4, 18000),
(934, 269, 110, 1, 50000),
(935, 269, 131, 6, 2000),
(936, 268, 107, 50, 18000),
(937, 268, 110, 1, 50000),
(938, 268, 131, 30, 2000),
(939, 268, 126, 2, 10000),
(940, 268, 144, 2, 60000),
(941, 268, 122, 1, 6000),
(942, 268, 139, 1, 10000),
(943, 268, 125, 2, 7000),
(944, 268, 117, 2, 10000),
(945, 268, 116, 1, 25000),
(946, 268, 115, 1, 30000),
(947, 270, 107, 18, 18000),
(948, 270, 110, 1, 50000),
(949, 270, 131, 10, 2000),
(956, 270, 116, 1, 25000),
(957, 270, 118, 1, 15000),
(958, 270, 142, 1, 12000),
(959, 270, 139, 2, 10000),
(960, 270, 125, 2, 7000),
(963, 274, 131, 1, 2000),
(964, 274, 110, 1, 50000),
(965, 274, 111, 5, 12000),
(966, 274, 126, 1, 10000),
(967, 274, 139, 1, 10000),
(968, 274, 119, 1, 30000),
(969, 274, 122, 1, 6000),
(970, 273, 107, 2, 18000),
(971, 273, 119, 1, 30000),
(972, 273, 121, 1, 30000),
(973, 273, 125, 1, 7000),
(974, 275, 137, 2, 14000),
(976, 275, 110, 1, 50000),
(977, 276, 111, 20, 12000),
(978, 276, 131, 4, 2000),
(979, 276, 110, 1, 50000),
(980, 277, 111, 10, 12000),
(981, 277, 121, 1, 30000),
(982, 277, 142, 1, 12000),
(983, 277, 141, 1, 17000),
(984, 277, 116, 1, 25000),
(985, 276, 116, 1, 25000),
(986, 278, 110, 2, 50000),
(987, 278, 111, 56, 12000),
(988, 279, 110, 2, 50000),
(990, 278, 131, 30, 2000),
(991, 279, 131, 6, 2000),
(992, 280, 111, 4, 12000),
(993, 280, 110, 1, 50000),
(994, 280, 131, 4, 2000),
(995, 280, 139, 3, 10000),
(996, 280, 54, 1, 10000),
(997, 281, 111, 14, 12000),
(998, 281, 110, 1, 50000),
(999, 281, 131, 7, 2000),
(1000, 282, 111, 12, 12000),
(1001, 282, 110, 1, 50000),
(1003, 281, 119, 1, 30000),
(1004, 281, 141, 1, 17000),
(1005, 281, 121, 1, 30000),
(1006, 281, 139, 1, 10000),
(1007, 281, 116, 1, 25000),
(1008, 283, 112, 12, 15000),
(1009, 283, 131, 7, 2000),
(1010, 283, 126, 1, 10000),
(1012, 283, 144, 1, 60000),
(1013, 284, 114, 12, 16000),
(1014, 284, 110, 1, 50000),
(1015, 284, 131, 7, 2000),
(1017, 284, 124, 1, 10000),
(1018, 284, 142, 1, 12000),
(1019, 284, 141, 1, 17000),
(1020, 284, 117, 1, 10000),
(1021, 285, 107, 29, 18000),
(1022, 285, 110, 1, 50000),
(1024, 285, 54, 3, 10000),
(1025, 285, 120, 2, 30000),
(1026, 285, 144, 1, 60000),
(1027, 285, 117, 1, 10000),
(1028, 285, 142, 1, 12000),
(1029, 285, 141, 1, 17000),
(1030, 285, 125, 1, 7000),
(1031, 285, 123, 1, 10000),
(1032, 286, 111, 10, 12000),
(1033, 286, 110, 1, 50000),
(1035, 286, 126, 1, 10000),
(1036, 286, 139, 1, 10000),
(1037, 286, 116, 1, 25000),
(1038, 287, 138, 8, 15000),
(1039, 287, 107, 24, 18000),
(1040, 287, 110, 1, 50000),
(1041, 287, 131, 10, 2000),
(1043, 287, 119, 1, 30000),
(1044, 287, 121, 1, 30000),
(1045, 287, 124, 1, 10000),
(1046, 287, 122, 2, 6000),
(1047, 288, 112, 13, 15000),
(1048, 288, 110, 1, 50000),
(1049, 288, 131, 7, 2000),
(1050, 288, 126, 1, 10000),
(1051, 288, 120, 1, 30000),
(1052, 288, 119, 1, 30000),
(1053, 288, 117, 2, 10000),
(1054, 288, 122, 3, 6000),
(1055, 288, 121, 1, 30000),
(1056, 288, 125, 1, 7000),
(1057, 288, 142, 1, 12000),
(1058, 288, 139, 2, 10000),
(1059, 289, 108, 7, 20000),
(1060, 289, 54, 2, 10000),
(1062, 289, 131, 6, 2000),
(1063, 289, 120, 1, 30000),
(1064, 289, 123, 1, 10000),
(1065, 289, 124, 1, 10000),
(1066, 289, 142, 1, 12000),
(1067, 289, 116, 1, 25000),
(1068, 290, 111, 3, 12000),
(1069, 290, 110, 1, 50000),
(1070, 295, 111, 31, 12000),
(1071, 295, 110, 1, 50000),
(1072, 295, 131, 10, 2000),
(1073, 295, 119, 1, 30000),
(1074, 295, 125, 1, 7000),
(1075, 295, 139, 1, 10000),
(1076, 295, 142, 1, 12000),
(1077, 295, 122, 2, 6000),
(1078, 295, 116, 1, 25000),
(1079, 296, 107, 31, 18000),
(1080, 296, 110, 1, 50000),
(1081, 296, 131, 6, 2000),
(1082, 296, 117, 1, 10000),
(1083, 296, 125, 1, 7000),
(1084, 296, 139, 1, 10000),
(1085, 297, 110, 1, 50000),
(1086, 297, 131, 1, 2000),
(1087, 297, 111, 20, 12000),
(1088, 297, 139, 2, 10000),
(1089, 298, 108, 18, 20000),
(1090, 298, 110, 2, 50000),
(1091, 298, 131, 8, 2000),
(1092, 298, 119, 1, 30000),
(1093, 298, 122, 6, 6000),
(1094, 298, 116, 1, 25000),
(1095, 298, 139, 2, 10000),
(1096, 298, 123, 1, 10000),
(1097, 298, 124, 1, 10000),
(1098, 299, 111, 6, 12000),
(1099, 299, 110, 1, 50000),
(1100, 299, 131, 6, 2000),
(1101, 300, 111, 6, 12000),
(1102, 300, 110, 1, 50000),
(1103, 300, 131, 1, 2000),
(1104, 301, 111, 12, 12000),
(1105, 301, 110, 1, 50000),
(1106, 301, 131, 4, 2000),
(1107, 300, 120, 1, 30000),
(1108, 300, 121, 1, 30000),
(1109, 300, 122, 1, 6000),
(1110, 304, 111, 12, 12000),
(1111, 304, 144, 1, 60000),
(1112, 304, 143, 1, 12000),
(1113, 302, 111, 13, 12000),
(1114, 302, 110, 1, 50000),
(1115, 302, 131, 1, 2000),
(1116, 302, 117, 1, 10000),
(1117, 301, 121, 1, 30000),
(1118, 303, 111, 4, 12000),
(1119, 303, 110, 1, 50000),
(1120, 305, 110, 1, 50000),
(1121, 305, 131, 7, 2000),
(1122, 305, 111, 14, 12000),
(1123, 305, 121, 1, 30000),
(1124, 305, 122, 1, 6000),
(1125, 305, 142, 1, 12000),
(1126, 305, 120, 1, 30000),
(1127, 306, 111, 33, 12000),
(1128, 306, 110, 1, 50000),
(1129, 306, 131, 5, 2000),
(1130, 306, 144, 1, 60000),
(1131, 306, 143, 1, 12000),
(1132, 307, 111, 10, 12000),
(1133, 307, 110, 1, 50000),
(1135, 308, 111, 6, 12000),
(1136, 308, 110, 1, 50000),
(1137, 308, 131, 1, 2000),
(1138, 308, 117, 1, 10000),
(1139, 308, 125, 1, 7000),
(1140, 307, 132, 1, 4000),
(1141, 307, 122, 1, 6000),
(1142, 307, 115, 1, 30000),
(1143, 309, 111, 9, 12000),
(1144, 309, 110, 1, 50000),
(1145, 309, 131, 8, 2000),
(1146, 309, 139, 1, 10000),
(1147, 310, 111, 11, 12000),
(1148, 310, 110, 1, 50000),
(1149, 310, 131, 5, 2000),
(1150, 310, 120, 1, 30000),
(1151, 310, 119, 1, 30000),
(1152, 310, 121, 1, 30000),
(1153, 310, 122, 1, 6000),
(1154, 310, 126, 1, 10000),
(1155, 311, 114, 10, 16000),
(1156, 311, 110, 3, 50000),
(1158, 312, 107, 24, 18000),
(1159, 312, 110, 1, 50000),
(1160, 312, 131, 10, 2000),
(1161, 312, 120, 1, 30000),
(1162, 312, 142, 1, 12000),
(1163, 312, 125, 2, 7000),
(1164, 313, 107, 22, 18000),
(1165, 313, 110, 1, 50000),
(1166, 313, 131, 6, 2000),
(1167, 311, 142, 3, 12000),
(1168, 311, 139, 6, 10000),
(1169, 311, 116, 1, 25000),
(1170, 313, 119, 1, 30000),
(1171, 313, 122, 2, 6000),
(1172, 313, 141, 1, 17000),
(1173, 314, 111, 56, 12000),
(1174, 314, 110, 1, 50000),
(1175, 314, 131, 10, 2000),
(1176, 316, 111, 24, 12000),
(1177, 316, 110, 1, 50000),
(1178, 316, 131, 6, 2000),
(1179, 315, 112, 4, 15000),
(1181, 315, 131, 2, 2000),
(1182, 315, 119, 1, 30000),
(1183, 315, 142, 1, 12000),
(1184, 314, 126, 1, 10000),
(1185, 314, 139, 4, 10000),
(1186, 316, 144, 1, 60000),
(1187, 316, 119, 1, 30000),
(1188, 316, 120, 1, 30000),
(1189, 316, 118, 1, 15000),
(1190, 316, 121, 1, 30000),
(1191, 316, 115, 1, 30000),
(1192, 316, 139, 1, 10000),
(1193, 316, 125, 2, 7000),
(1194, 316, 123, 1, 10000),
(1196, 316, 142, 1, 12000),
(1197, 316, 141, 1, 17000),
(1198, 317, 107, 24, 18000),
(1199, 317, 110, 1, 50000),
(1200, 317, 131, 10, 2000),
(1201, 317, 120, 1, 30000),
(1202, 317, 121, 1, 30000),
(1203, 317, 122, 1, 6000),
(1204, 317, 123, 1, 10000),
(1205, 317, 142, 1, 12000),
(1206, 318, 137, 8, 14000),
(1207, 318, 110, 1, 50000),
(1208, 318, 131, 7, 2000),
(1209, 318, 132, 1, 4000),
(1210, 319, 111, 25, 12000),
(1211, 319, 110, 2, 50000),
(1212, 319, 131, 1, 2000),
(1213, 321, 111, 40, 12000),
(1214, 321, 110, 1, 50000),
(1215, 321, 131, 9, 2000),
(1216, 320, 112, 34, 15000),
(1217, 320, 110, 2, 50000),
(1218, 320, 131, 10, 2000),
(1219, 319, 117, 1, 10000),
(1220, 319, 121, 1, 30000),
(1221, 319, 139, 1, 10000),
(1222, 319, 132, 1, 4000),
(1223, 320, 122, 2, 6000),
(1225, 321, 121, 1, 30000),
(1226, 321, 132, 1, 4000),
(1227, 321, 141, 1, 17000),
(1228, 322, 111, 25, 12000),
(1229, 322, 110, 1, 50000),
(1235, 325, 107, 33, 18000),
(1236, 325, 110, 1, 50000),
(1237, 325, 131, 20, 2000),
(1238, 325, 144, 2, 60000),
(1239, 326, 107, 12, 18000),
(1240, 326, 110, 1, 50000),
(1241, 326, 131, 10, 2000),
(1242, 325, 127, 3, 15000),
(1243, 325, 116, 1, 25000),
(1244, 322, 126, 1, 10000),
(1245, 326, 120, 1, 30000),
(1246, 326, 147, 1, 12000),
(1247, 326, 139, 1, 10000),
(1248, 326, 142, 1, 12000),
(1249, 326, 132, 1, 4000),
(1250, 322, 141, 1, 17000),
(1251, 322, 147, 2, 12000),
(1252, 322, 132, 1, 4000),
(1253, 327, 107, 6, 18000),
(1254, 327, 110, 1, 50000),
(1255, 327, 146, 1, 60000),
(1256, 328, 111, 8, 12000),
(1257, 328, 110, 1, 50000),
(1259, 329, 112, 8, 15000),
(1260, 329, 110, 1, 50000),
(1262, 330, 111, 20, 12000),
(1263, 330, 110, 1, 50000),
(1264, 330, 131, 10, 2000),
(1265, 330, 143, 1, 15000),
(1266, 328, 122, 1, 6000),
(1267, 329, 142, 1, 12000),
(1268, 330, 118, 1, 15000),
(1269, 330, 121, 1, 30000),
(1270, 330, 132, 1, 4000),
(1271, 330, 122, 2, 6000),
(1272, 330, 125, 2, 7000),
(1273, 331, 111, 14, 12000),
(1274, 331, 110, 1, 50000),
(1275, 331, 131, 2, 2000),
(1276, 331, 132, 1, 4000),
(1277, 331, 115, 1, 30000),
(1278, 332, 112, 27, 15000),
(1279, 332, 110, 1, 50000),
(1280, 332, 131, 10, 2000),
(1297, 336, 111, 17, 12000),
(1298, 336, 110, 1, 50000),
(1299, 336, 131, 6, 2000),
(1300, 336, 122, 1, 6000),
(1301, 336, 117, 2, 10000),
(1302, 336, 125, 1, 5000),
(1303, 336, 123, 1, 10000),
(1304, 336, 118, 1, 15000),
(1305, 336, 143, 2, 12000),
(1306, 332, 117, 1, 10000),
(1307, 332, 147, 1, 12000),
(1308, 332, 122, 1, 6000),
(1309, 332, 116, 1, 25000),
(1310, 332, 115, 1, 30000),
(1311, 332, 132, 1, 4000),
(1312, 332, 123, 1, 10000),
(1313, 332, 124, 1, 10000),
(1314, 332, 142, 1, 12000),
(1315, 337, 111, 11, 12000),
(1316, 337, 110, 1, 50000),
(1317, 337, 131, 3, 2000),
(1318, 337, 119, 1, 30000),
(1319, 337, 116, 1, 25000),
(1320, 337, 132, 1, 4000),
(1321, 337, 122, 2, 6000),
(1322, 337, 141, 1, 17000),
(1328, 339, 110, 1, 50000),
(1329, 339, 131, 3, 2000),
(1330, 339, 119, 1, 30000),
(1331, 339, 111, 15, 12000),
(1332, 340, 107, 30, 18000),
(1333, 340, 110, 1, 50000),
(1334, 340, 131, 8, 2000),
(1335, 340, 125, 1, 5000),
(1336, 340, 122, 1, 6000),
(1337, 342, 107, 9, 18000),
(1338, 342, 110, 1, 50000),
(1339, 342, 131, 3, 2000),
(1340, 343, 108, 61, 20000),
(1341, 343, 110, 2, 50000),
(1342, 343, 131, 5, 2000),
(1343, 343, 120, 1, 30000),
(1344, 343, 117, 2, 10000),
(1345, 343, 122, 2, 6000),
(1346, 343, 118, 1, 15000),
(1347, 343, 141, 1, 15000),
(1348, 344, 107, 13, 18000),
(1349, 344, 110, 1, 50000),
(1350, 344, 131, 4, 2000),
(1351, 345, 140, 3, 18000),
(1352, 345, 110, 1, 50000),
(1353, 345, 131, 10, 2000),
(1354, 345, 121, 1, 30000),
(1355, 345, 122, 1, 6000),
(1356, 345, 123, 1, 10000),
(1357, 345, 115, 1, 30000),
(1358, 345, 107, 18, 18000),
(1359, 346, 112, 10, 15000),
(1360, 346, 110, 1, 50000),
(1361, 346, 131, 1, 2000),
(1362, 346, 117, 1, 10000),
(1363, 346, 122, 1, 6000),
(1364, 346, 141, 1, 15000),
(1365, 347, 107, 3, 18000),
(1366, 347, 110, 1, 50000),
(1367, 347, 131, 1, 2000),
(1368, 348, 108, 3, 20000),
(1369, 348, 110, 1, 50000),
(1370, 348, 131, 1, 2000),
(1371, 348, 142, 1, 15000),
(1372, 349, 107, 8, 18000),
(1373, 349, 110, 1, 50000),
(1374, 349, 131, 3, 2000),
(1375, 349, 121, 1, 30000),
(1376, 349, 122, 1, 6000),
(1377, 350, 112, 11, 15000),
(1378, 350, 110, 1, 50000),
(1379, 350, 131, 2, 2000),
(1380, 350, 132, 1, 4000),
(1381, 350, 122, 1, 6000),
(1382, 351, 107, 15, 18000),
(1383, 351, 110, 1, 50000),
(1384, 351, 131, 3, 2000),
(1385, 351, 142, 1, 12000),
(1386, 351, 121, 1, 30000),
(1387, 351, 122, 2, 6000),
(1388, 351, 115, 1, 30000),
(1389, 351, 116, 1, 25000),
(1390, 351, 126, 2, 10000),
(1391, 352, 111, 15, 12000),
(1392, 352, 110, 1, 50000),
(1393, 352, 131, 9, 2000),
(1394, 353, 111, 28, 12000),
(1395, 353, 110, 1, 50000),
(1396, 353, 131, 10, 2000),
(1397, 353, 121, 1, 30000),
(1398, 353, 116, 1, 25000),
(1399, 353, 117, 1, 10000),
(1400, 353, 142, 1, 12000),
(1401, 353, 141, 1, 15000),
(1402, 353, 122, 2, 6000),
(1403, 353, 125, 2, 5000),
(1404, 353, 123, 1, 10000),
(1405, 353, 124, 1, 10000),
(1406, 353, 132, 1, 4000),
(1407, 354, 111, 35, 12000),
(1408, 354, 110, 1, 50000),
(1409, 354, 131, 10, 2000),
(1410, 354, 142, 1, 12000),
(1411, 354, 118, 1, 15000),
(1412, 354, 141, 1, 15000),
(1413, 354, 120, 1, 30000),
(1414, 354, 122, 2, 6000),
(1415, 354, 125, 2, 5000),
(1416, 354, 123, 1, 10000),
(1417, 354, 124, 1, 10000),
(1418, 354, 117, 2, 10000),
(1419, 354, 119, 1, 30000),
(1420, 355, 111, 7, 12000),
(1421, 355, 110, 1, 50000),
(1423, 355, 120, 1, 30000),
(1424, 356, 112, 5, 15000),
(1425, 356, 110, 1, 50000),
(1426, 356, 131, 1, 2000),
(1427, 356, 143, 1, 12000),
(1428, 357, 112, 14, 15000),
(1429, 357, 110, 1, 50000),
(1430, 357, 131, 3, 2000),
(1431, 357, 132, 1, 4000),
(1432, 357, 124, 1, 10000),
(1433, 357, 115, 1, 30000),
(1434, 358, 111, 12, 12000),
(1435, 358, 110, 1, 50000),
(1436, 358, 131, 5, 2000),
(1437, 358, 121, 1, 30000),
(1438, 358, 117, 1, 10000),
(1439, 359, 112, 13, 15000),
(1440, 359, 110, 1, 30000),
(1441, 359, 131, 3, 2000),
(1442, 359, 142, 1, 14000),
(1443, 359, 141, 1, 17000),
(1444, 363, 107, 13, 18000),
(1445, 363, 110, 1, 50000),
(1446, 363, 131, 5, 2000),
(1447, 363, 139, 1, 10000),
(1448, 363, 122, 1, 6000),
(1459, 368, 107, 21, 18000),
(1460, 368, 110, 1, 50000),
(1461, 368, 131, 10, 2000),
(1462, 368, 139, 1, 10000),
(1463, 368, 122, 2, 6000),
(1464, 368, 123, 1, 10000),
(1465, 368, 132, 1, 4000),
(1466, 368, 116, 1, 25000),
(1476, 366, 111, 6, 12000),
(1478, 367, 111, 20, 12000),
(1479, 367, 110, 1, 50000),
(1480, 367, 131, 5, 2000),
(1481, 367, 139, 1, 10000),
(1483, 367, 132, 1, 4000),
(1484, 367, 120, 1, 30000),
(1485, 367, 125, 1, 7000),
(1493, 366, 139, 1, 10000),
(1494, 366, 123, 1, 10000),
(1495, 372, 112, 20, 15000),
(1496, 372, 110, 1, 50000),
(1497, 372, 131, 10, 2000),
(1498, 373, 111, 7, 12000),
(1499, 373, 110, 1, 50000),
(1501, 373, 126, 4, 10000),
(1502, 373, 119, 1, 30000),
(1503, 373, 141, 1, 17000),
(1504, 374, 137, 5, 14000),
(1505, 374, 110, 1, 50000),
(1506, 374, 131, 5, 2000),
(1507, 376, 112, 24, 15000),
(1508, 376, 110, 1, 50000),
(1510, 376, 121, 1, 30000),
(1511, 376, 146, 1, 60000),
(1512, 376, 139, 2, 10000),
(1513, 376, 147, 1, 12000),
(1514, 376, 116, 1, 25000),
(1515, 375, 112, 9, 15000),
(1516, 375, 110, 1, 50000),
(1517, 375, 131, 5, 2000),
(1518, 375, 142, 1, 12000),
(1519, 375, 122, 1, 6000),
(1520, 375, 139, 1, 10000),
(1521, 377, 111, 17, 12000),
(1522, 377, 110, 1, 50000),
(1523, 377, 131, 5, 2000),
(1524, 378, 111, 4, 12000),
(1525, 378, 110, 1, 50000),
(1526, 378, 131, 4, 2000),
(1527, 377, 116, 1, 25000),
(1528, 377, 122, 1, 6000),
(1529, 377, 125, 1, 7000),
(1530, 378, 132, 1, 4000),
(1531, 379, 111, 3, 12000),
(1532, 379, 110, 1, 50000),
(1533, 379, 131, 5, 2000),
(1534, 379, 122, 1, 6000),
(1536, 379, 139, 1, 10000),
(1537, 379, 121, 1, 30000),
(1538, 380, 110, 1, 50000),
(1539, 380, 107, 32, 18000),
(1540, 380, 131, 7, 2000),
(1541, 381, 107, 29, 18000),
(1542, 381, 110, 1, 50000),
(1543, 381, 131, 10, 2000),
(1544, 381, 146, 2, 60000),
(1546, 381, 139, 2, 10000),
(1547, 380, 117, 2, 10000),
(1548, 380, 139, 2, 10000),
(1549, 380, 122, 2, 6000),
(1550, 380, 121, 1, 30000),
(1551, 380, 132, 1, 4000),
(1552, 380, 115, 1, 30000),
(1553, 380, 118, 1, 15000),
(1554, 383, 111, 30, 12000),
(1555, 383, 131, 9, 2000),
(1563, 383, 110, 1, 50000),
(1565, 383, 117, 1, 10000),
(1566, 383, 121, 1, 30000),
(1567, 383, 132, 1, 4000),
(1572, 386, 112, 20, 15000),
(1573, 386, 110, 2, 50000),
(1574, 386, 131, 8, 2000),
(1575, 386, 127, 1, 15000),
(1576, 390, 107, 24, 18000),
(1577, 390, 110, 1, 50000),
(1578, 390, 131, 15, 2000),
(1579, 390, 144, 1, 60000),
(1580, 391, 112, 12, 15000),
(1581, 391, 110, 1, 50000),
(1582, 391, 131, 2, 2000),
(1583, 391, 120, 1, 30000),
(1584, 391, 119, 1, 30000),
(1585, 391, 139, 1, 10000),
(1586, 391, 121, 1, 30000),
(1587, 386, 141, 1, 17000),
(1588, 386, 125, 1, 7000),
(1589, 386, 122, 1, 6000),
(1590, 386, 121, 1, 30000),
(1591, 386, 119, 1, 30000),
(1592, 386, 120, 1, 30000),
(1593, 386, 118, 1, 15000),
(1594, 392, 112, 26, 15000),
(1595, 392, 110, 1, 50000),
(1596, 392, 131, 15, 2000),
(1597, 392, 146, 2, 60000),
(1598, 392, 145, 2, 60000),
(1599, 392, 142, 1, 12000),
(1600, 392, 141, 1, 17000),
(1601, 392, 122, 1, 6000),
(1602, 392, 119, 1, 30000),
(1603, 392, 123, 1, 10000),
(1604, 392, 124, 1, 10000),
(1605, 392, 132, 1, 4000),
(1606, 392, 116, 1, 25000),
(1607, 393, 110, 2, 50000),
(1608, 393, 107, 35, 18000),
(1609, 393, 131, 17, 2000),
(1610, 393, 142, 2, 12000),
(1611, 393, 139, 3, 10000),
(1612, 393, 146, 1, 60000),
(1613, 393, 145, 1, 60000),
(1614, 395, 110, 1, 50000),
(1615, 395, 131, 2, 2000),
(1616, 395, 121, 1, 30000),
(1617, 395, 112, 13, 15000),
(1618, 395, 126, 1, 10000),
(1619, 396, 112, 30, 15000),
(1620, 396, 110, 2, 50000),
(1621, 396, 131, 10, 2000),
(1622, 396, 126, 1, 10000),
(1623, 396, 139, 1, 10000),
(1624, 396, 119, 1, 30000),
(1625, 396, 141, 1, 17000),
(1627, 397, 107, 6, 18000),
(1628, 398, 108, 48, 20000),
(1629, 398, 110, 2, 50000),
(1630, 398, 131, 6, 2000),
(1631, 398, 139, 1, 10000),
(1632, 398, 120, 1, 30000),
(1633, 398, 118, 1, 15000),
(1634, 398, 115, 1, 30000),
(1635, 398, 116, 1, 25000),
(1636, 398, 132, 1, 4000),
(1637, 398, 146, 1, 60000),
(1638, 399, 107, 3, 18000),
(1639, 400, 120, 1, 30000),
(1640, 400, 119, 1, 30000),
(1641, 400, 118, 1, 15000),
(1642, 400, 121, 1, 30000),
(1643, 400, 147, 1, 12000),
(1644, 400, 142, 1, 12000),
(1645, 400, 141, 1, 17000),
(1646, 400, 124, 1, 10000),
(1647, 400, 132, 1, 4000),
(1648, 400, 116, 2, 25000),
(1649, 400, 55, 1, 15000),
(1654, 402, 111, 17, 12000),
(1655, 402, 110, 1, 50000),
(1656, 402, 131, 9, 2000),
(1658, 404, 107, 6, 18000),
(1659, 404, 110, 1, 50000),
(1660, 402, 119, 1, 30000),
(1661, 402, 120, 1, 30000),
(1662, 405, 111, 6, 12000),
(1663, 405, 110, 1, 50000),
(1664, 405, 131, 1, 2000),
(1665, 406, 137, 1, 14000),
(1668, 407, 111, 11, 12000),
(1669, 407, 110, 1, 50000),
(1670, 408, 107, 14, 18000),
(1671, 408, 110, 1, 50000),
(1672, 408, 131, 10, 2000),
(1673, 409, 126, 4, 10000),
(1674, 409, 139, 3, 10000),
(1675, 408, 121, 1, 30000),
(1676, 410, 111, 31, 12000),
(1677, 410, 110, 1, 50000),
(1678, 410, 131, 20, 2000),
(1679, 410, 54, 2, 15000),
(1680, 410, 143, 2, 15000),
(1681, 411, 111, 6, 12000),
(1682, 411, 110, 1, 50000),
(1683, 411, 131, 2, 2000),
(1684, 410, 120, 1, 30000),
(1685, 410, 117, 1, 10000),
(1686, 410, 122, 1, 6000),
(1687, 412, 107, 6, 18000),
(1688, 412, 110, 1, 50000),
(1689, 412, 131, 6, 2000),
(1690, 411, 132, 1, 4000),
(1691, 412, 125, 1, 7000),
(1692, 412, 145, 1, 60000),
(1693, 412, 118, 1, 15000),
(1694, 413, 111, 9, 12000),
(1695, 413, 110, 1, 50000),
(1696, 413, 131, 1, 2000),
(1697, 414, 112, 25, 15000),
(1698, 414, 110, 1, 50000),
(1700, 414, 126, 1, 10000),
(1701, 414, 142, 1, 12000),
(1702, 414, 139, 1, 10000),
(1706, 414, 146, 1, 60000),
(1707, 416, 107, 4, 18000),
(1708, 416, 131, 3, 2000),
(1709, 416, 110, 1, 50000),
(1710, 414, 118, 1, 15000),
(1711, 414, 122, 1, 6000),
(1712, 414, 132, 1, 4000),
(1714, 417, 112, 4, 15000),
(1715, 417, 110, 1, 50000),
(1716, 417, 131, 3, 2000),
(1723, 419, 126, 1, 10000),
(1724, 419, 116, 1, 25000),
(1725, 420, 107, 20, 18000),
(1726, 420, 110, 1, 50000),
(1727, 420, 131, 10, 2000),
(1728, 420, 126, 1, 10000),
(1729, 420, 143, 1, 15000),
(1730, 420, 139, 1, 10000),
(1731, 420, 147, 1, 12000),
(1732, 420, 117, 1, 10000),
(1733, 420, 146, 2, 0),
(1734, 421, 110, 1, 50000),
(1735, 421, 131, 10, 2000),
(1736, 421, 111, 11, 12000),
(1737, 422, 107, 11, 18000),
(1738, 422, 110, 1, 50000),
(1740, 422, 116, 1, 25000),
(1741, 423, 137, 21, 14000),
(1742, 423, 110, 1, 50000),
(1743, 423, 131, 6, 2000),
(1744, 423, 119, 1, 30000),
(1745, 423, 121, 1, 30000),
(1746, 423, 139, 1, 10000),
(1747, 424, 111, 4, 12000),
(1748, 424, 119, 1, 30000),
(1749, 424, 141, 1, 17000),
(1750, 424, 143, 1, 15000),
(1751, 424, 118, 1, 15000),
(1752, 425, 107, 15, 18000),
(1753, 425, 110, 1, 50000),
(1754, 425, 131, 10, 2000),
(1755, 425, 146, 1, 60000),
(1756, 425, 116, 1, 25000),
(1757, 426, 108, 13, 20000),
(1758, 426, 110, 2, 50000),
(1759, 426, 131, 4, 2000),
(1766, 428, 112, 5, 15000),
(1767, 428, 110, 1, 50000),
(1768, 428, 131, 1, 2000),
(1769, 426, 118, 1, 15000),
(1770, 426, 116, 1, 25000),
(1771, 426, 122, 1, 6000),
(1772, 426, 132, 1, 4000),
(1773, 426, 147, 1, 12000),
(1774, 426, 139, 1, 10000),
(1775, 426, 117, 1, 10000),
(1776, 428, 122, 1, 6000),
(1777, 428, 139, 1, 10000),
(1778, 428, 142, 1, 12000),
(1779, 429, 110, 1, 50000),
(1780, 429, 131, 6, 2000),
(1781, 429, 111, 10, 12000),
(1782, 430, 111, 7, 12000),
(1783, 430, 110, 1, 50000),
(1785, 430, 139, 1, 10000),
(1786, 431, 107, 24, 18000),
(1787, 431, 110, 2, 50000),
(1788, 431, 131, 20, 2000),
(1789, 431, 126, 5, 10000),
(1793, 433, 108, 21, 20000),
(1794, 433, 110, 1, 50000),
(1795, 433, 131, 10, 2000),
(1796, 433, 144, 1, 60000),
(1797, 433, 146, 2, 60000),
(1798, 434, 108, 12, 20000),
(1799, 431, 120, 1, 30000),
(1800, 431, 119, 1, 30000),
(1801, 431, 142, 1, 12000),
(1802, 431, 139, 1, 10000),
(1803, 431, 123, 1, 10000),
(1804, 431, 117, 2, 10000),
(1805, 431, 122, 1, 6000),
(1806, 434, 139, 2, 10000),
(1807, 434, 122, 1, 6000),
(1808, 434, 117, 1, 10000),
(1809, 435, 112, 8, 15000),
(1810, 435, 110, 1, 50000),
(1811, 435, 131, 3, 2000),
(1812, 436, 112, 9, 15000),
(1813, 436, 110, 1, 50000),
(1814, 436, 131, 6, 2000),
(1815, 437, 111, 4, 12000),
(1816, 437, 110, 1, 50000),
(1817, 437, 131, 3, 2000),
(1818, 437, 132, 1, 4000),
(1819, 437, 122, 1, 6000),
(1820, 440, 114, 4, 16000),
(1821, 440, 107, 1, 18000),
(1822, 440, 111, 1, 12000),
(1823, 438, 114, 3, 16000),
(1824, 438, 107, 1, 18000),
(1825, 438, 111, 1, 12000),
(1826, 438, 137, 12, 14000);

-- --------------------------------------------------------

--
-- Table structure for table `baduc_store`
--

CREATE TABLE IF NOT EXISTS `baduc_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `baduc_store`
--

INSERT INTO `baduc_store` (`id`, `name`, `note`) VALUES
(1, 'Kho nhà', 'Ghi chú gì đây ?');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_supplier`
--

CREATE TABLE IF NOT EXISTS `baduc_supplier` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `debt` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `baduc_supplier`
--

INSERT INTO `baduc_supplier` (`id`, `name`, `phone`, `address`, `note`, `debt`) VALUES
(1, 'ĐL Nước Đá', '0703456456', 'Trí Phường 4', 'Cung cấp nước đá', 0),
(6, 'Coop Mart', '070', 'Vĩnh Long', 'Cung cấp mọi thứ', 0),
(8, 'Nhà PP Đoan Trang', '0703 822 227 - ', '64/6N Trần Phú P4 TP Vĩnh Long', '', 0),
(9, 'KHÁC', '', '', '', 0),
(11, 'CH Tuấn', '', 'P4, TPVL', 'Cung cấp thực phẩm', 0),
(12, 'Vựa Trái Cây', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `baduc_table`
--

CREATE TABLE IF NOT EXISTS `baduc_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddomain` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iddomain` (`iddomain`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `baduc_table`
--

INSERT INTO `baduc_table` (`id`, `iddomain`, `name`, `iduser`, `type`) VALUES
(1, 1, 'Phòng 01', 0, '0'),
(2, 1, 'Phòng 02', 0, '0'),
(3, 1, 'Phòng 03', 0, '0'),
(4, 1, 'Phòng 04', 0, '0'),
(14, 2, 'Phòng 07', 0, '0'),
(15, 2, 'Phòng 08', 0, '0'),
(16, 2, 'Phòng 09', 0, '0'),
(17, 2, 'Phòng 10', 0, '0'),
(26, 3, 'Phòng 05', 0, '1'),
(27, 3, 'Phòng 06', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_term`
--

CREATE TABLE IF NOT EXISTS `baduc_term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `baduc_term`
--

INSERT INTO `baduc_term` (`id`, `name`, `type`) VALUES
(1, 'Tiền Điện', 0),
(2, 'Tiền Nước', 0),
(3, 'Thuế', 0),
(4, 'Lương Nhân Viên', 0),
(10, 'Tiền Ăn Nhân Viên', 0),
(11, 'CP Khác', 0),
(12, 'Tiền Phụ Cấp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `baduc_term_collect`
--

CREATE TABLE IF NOT EXISTS `baduc_term_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `baduc_term_collect`
--

INSERT INTO `baduc_term_collect` (`id`, `name`) VALUES
(2, 'Phụ Phẩm'),
(3, 'Đặc Biệt');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_tracking`
--

CREATE TABLE IF NOT EXISTS `baduc_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `estate_rate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `baduc_tracking`
--

INSERT INTO `baduc_tracking` (`id`, `date_start`, `date_end`, `estate_rate`) VALUES
(1, '2013-01-01', '2013-01-31', 0),
(2, '2013-02-01', '2013-02-28', 0),
(3, '2013-03-01', '2013-03-31', 0),
(4, '2013-04-01', '2013-04-30', 0),
(5, '2013-05-01', '2013-05-31', 0),
(6, '2013-06-01', '2013-07-31', 0),
(7, '2013-07-01', '2013-07-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `baduc_tracking_store`
--

CREATE TABLE IF NOT EXISTS `baduc_tracking_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tracking` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `count_old` int(11) NOT NULL,
  `count_import` int(11) NOT NULL,
  `count_export` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `baduc_tracking_store`
--


-- --------------------------------------------------------

--
-- Table structure for table `baduc_unit`
--

CREATE TABLE IF NOT EXISTS `baduc_unit` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `baduc_unit`
--

INSERT INTO `baduc_unit` (`id`, `name`) VALUES
(1, 'Ly'),
(2, 'Điếu'),
(3, 'Chai'),
(4, 'Lon'),
(5, 'Dĩa'),
(6, 'Thùng'),
(7, 'Két'),
(9, 'Bịch'),
(10, 'Gói'),
(11, 'Cái'),
(12, 'Cây'),
(13, 'Giờ'),
(14, 'Bao'),
(15, 'Con'),
(16, 'Kg'),
(17, 'Hộp');

-- --------------------------------------------------------

--
-- Table structure for table `baduc_user`
--

CREATE TABLE IF NOT EXISTS `baduc_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datecreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateupdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateactivity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` tinyint(4) NOT NULL,
  `code` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `baduc_user`
--

INSERT INTO `baduc_user` (`id`, `name`, `email`, `pass`, `gender`, `note`, `datecreate`, `dateupdate`, `dateactivity`, `type`, `code`) VALUES
(1, 'Bùi Thanh Tuấn', 'tuanbuithanh@gmail.com', 'admin123456', 0, ' ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, ''),
(2, 'Lê Nguyễn Đông Khoa', 'lekhoa.bdc@gmail.com', '123456', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, ''),
(3, 'Phan Xuân Mai', 'maiphan.bdc@gmail.com', '123456', 1, ' ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, ''),
(4, 'Phan Lê Hữu Phúc', 'phucphan.bdc@gmail.com', '123456', 0, '', '2013-04-07 18:54:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, ''),
(5, 'Lê Quang Minh', 'minhle.bdc@gmail.com', '123456', 0, '', '2013-05-21 02:21:20', '2013-05-21 02:21:20', '2013-05-21 02:21:20', 1, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baduc_collect_customer`
--
ALTER TABLE `baduc_collect_customer`
  ADD CONSTRAINT `baduc_customer_collect_1` FOREIGN KEY (`idcustomer`) REFERENCES `baduc_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_collect_general`
--
ALTER TABLE `baduc_collect_general`
  ADD CONSTRAINT `baduc_collect_general_1` FOREIGN KEY (`id_term`) REFERENCES `baduc_term_collect` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_course`
--
ALTER TABLE `baduc_course`
  ADD CONSTRAINT `baduc_course_1` FOREIGN KEY (`idcategory`) REFERENCES `baduc_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_order_import`
--
ALTER TABLE `baduc_order_import`
  ADD CONSTRAINT `baduc_order_import_1` FOREIGN KEY (`idsupplier`) REFERENCES `baduc_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_order_import_detail`
--
ALTER TABLE `baduc_order_import_detail`
  ADD CONSTRAINT `baduc_order_import_detail_1` FOREIGN KEY (`idorder`) REFERENCES `baduc_order_import` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baduc_order_import_detail_2` FOREIGN KEY (`idresource`) REFERENCES `baduc_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_paid_customer`
--
ALTER TABLE `baduc_paid_customer`
  ADD CONSTRAINT `baduc_customer_paid_1` FOREIGN KEY (`idcustomer`) REFERENCES `baduc_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_paid_general`
--
ALTER TABLE `baduc_paid_general`
  ADD CONSTRAINT `baduc_paid_general_1` FOREIGN KEY (`id_term`) REFERENCES `baduc_term` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_paid_supplier`
--
ALTER TABLE `baduc_paid_supplier`
  ADD CONSTRAINT `baduc_supplier_paid_1` FOREIGN KEY (`idsupplier`) REFERENCES `baduc_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_r2c`
--
ALTER TABLE `baduc_r2c`
  ADD CONSTRAINT `baduc_r2c_1` FOREIGN KEY (`id_course`) REFERENCES `baduc_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baduc_r2c_2` FOREIGN KEY (`id_resource`) REFERENCES `baduc_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_resource`
--
ALTER TABLE `baduc_resource`
  ADD CONSTRAINT `baduc_resource_1` FOREIGN KEY (`idsupplier`) REFERENCES `baduc_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_session`
--
ALTER TABLE `baduc_session`
  ADD CONSTRAINT `baduc_session_1` FOREIGN KEY (`idtable`) REFERENCES `baduc_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baduc_session_2` FOREIGN KEY (`iduser`) REFERENCES `baduc_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baduc_session_3` FOREIGN KEY (`idcustomer`) REFERENCES `baduc_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_session_detail`
--
ALTER TABLE `baduc_session_detail`
  ADD CONSTRAINT `baduc_session_detail_1` FOREIGN KEY (`idsession`) REFERENCES `baduc_session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `baduc_session_detail_2` FOREIGN KEY (`idcourse`) REFERENCES `baduc_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baduc_table`
--
ALTER TABLE `baduc_table`
  ADD CONSTRAINT `baduc_table_1` FOREIGN KEY (`iddomain`) REFERENCES `baduc_domain` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
