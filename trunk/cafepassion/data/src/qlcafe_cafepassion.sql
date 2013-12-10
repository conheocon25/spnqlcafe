-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 04:49 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qlcafe_cafepassion`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app`
--

CREATE TABLE IF NOT EXISTS `tbl_app` (
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
-- Dumping data for table `tbl_app`
--

INSERT INTO `tbl_app` (`id`, `name`, `phone`, `address`, `email`, `banner`, `prefix`, `alias`, `date_created`, `date_modified`, `date_activity`, `type`, `page_view`) VALUES
(1, 'Karaoke Ba Đức', '0945 03 07 09', 'Phó Cơ Điều P3 - TPVL', '', 'data/images/banner/logo.png', 'tbl_', 'tbl_', '2012-06-30 17:00:00', '0000-00-00 00:00:00', '2012-12-26 07:28:02', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` binary(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `picture`) VALUES
(3, 'Cafe', NULL),
(8, 'Sinh tố', NULL),
(11, 'Nước ép', NULL),
(12, 'Kem', NULL),
(13, 'Yaourt', NULL),
(14, 'Nước giải khát', NULL),
(15, 'Nước pha chế', NULL),
(16, 'Lipton - Trà', NULL),
(17, 'Rau má - Sữa', NULL),
(20, 'Thuốc lá', NULL),
(21, 'Điểm tâm sáng', NULL),
(22, 'Cơm trưa VP', NULL),
(23, 'Khác', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_collect_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_collect_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_customer_collect_1` (`idcustomer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_collect_customer`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_collect_general`
--

CREATE TABLE IF NOT EXISTS `tbl_collect_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_term` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_collect_1` (`id_term`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_collect_general`
--

INSERT INTO `tbl_collect_general` (`id`, `id_term`, `date`, `value`, `note`) VALUES
(5, 2, '2013-05-18', 10, 'd'),
(6, 3, '2013-12-06', 2000000, 'Bổ sung quỹ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE IF NOT EXISTS `tbl_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `param` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`id`, `param`, `value`) VALUES
(1, 'PRICE_HOUR_NORMAL_1', '70000'),
(2, 'PRICE_HOUR_NORMAL_2', '90000'),
(3, 'PRICE_HOUR_VIP_1', '80000'),
(4, 'PRICE_HOUR_VIP_2', '100000'),
(5, 'DISCOUNT', '0'),
(6, 'ROW_PER_PAGE', '12'),
(7, 'GUEST_VISIT', '9247'),
(8, 'EVERY_5_MINUTES', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE IF NOT EXISTS `tbl_course` (
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
  `is_discount` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `foreign_field` (`idcategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=332 ;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `idcategory`, `name`, `shortname`, `unit`, `price1`, `price2`, `price3`, `price4`, `picture`, `is_discount`) VALUES
(53, 8, 'Sinh tố bơ', 'Sinh tố bơ', 'Ly', 25000, 25000, 25000, 25000, '', 1),
(54, 8, 'Sinh tố cà chua', 'Sinh tố cà chua', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(55, 8, 'Sinh tố cà rốt', 'Sinh tố cà rốt', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(56, 8, 'Sinh tố cam', 'Sinh tố cam', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(107, 3, 'Cafe đá', 'Cafe đá', 'Ly', 10000, 10000, 10000, 10000, '', 1),
(108, 3, 'Cafe nóng', 'Cafe nóng', 'Ly', 10000, 10000, 10000, 10000, '', 1),
(110, 12, 'Kem 3 viên', 'Kem 3 viên', 'Ly', 26000, 26000, 26000, 26000, '', 1),
(111, 3, 'Cafe sữa đá', 'Cafe sữa đá', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(112, 3, 'Cafe sữa nóng', 'Cafe sữa nóng', 'Ly', 14000, 14000, 14000, 14000, '', 1),
(117, 12, 'Kem cafe', 'Kem cafe', 'Ly', 24000, 24000, 24000, 24000, '', 1),
(118, 12, 'Kem dâu', 'Kem dâu', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(119, 12, 'Kem sầu riêng', 'Kem sầu riêng', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(120, 12, 'Kem chocolate', 'Kem chocolate', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(121, 12, 'Kem thập cẩm', 'Kem thập cẩm', 'Ly', 27000, 27000, 27000, 27000, '', 1),
(122, 12, 'Kem trái dừa', 'Kem trái dừa', 'Ly', 30000, 30000, 30000, 30000, '', 1),
(126, 8, 'Sinh tố chanh', 'Sinh tố chanh', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(127, 8, 'Sinh tố dâu', 'Sinh tố dâu', 'Ly', 24000, 24000, 24000, 24000, '', 1),
(128, 8, 'Sinh tố mãng cầu', 'Sinh tố mãng cầu', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(129, 8, 'Sinh tố sapô', 'Sinh tố sapô', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(136, 8, 'Sinh tố thập cẩm', 'Sinh tố thập cẩm', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(149, 13, 'Yaourt cam tươi', 'Yaourt cam tươi', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(161, 13, 'Yaourt dâu', 'Yaourt dâu', 'Ly', 25000, 25000, 25000, 25000, '', 1),
(162, 13, 'Yaourt hủ', 'Yaourt hủ', 'Hủ', 10000, 10000, 10000, 10000, '', 1),
(174, 15, 'Dừa đá', 'Dừa đá', 'Ly', 16000, 16000, 16000, 16000, '', 1),
(175, 15, 'Dừa trái', 'Dừa trái', 'Trái', 15000, 15000, 15000, 15000, '', 1),
(176, 15, 'Đá me', 'Đá me', 'Ly', 13000, 13000, 13000, 13000, '', 1),
(177, 15, 'Đá me sữa', 'Đá me sữa', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(178, 15, 'Rau má dừa', 'Rau má dừa', 'Ly', 16000, 16000, 16000, 16000, '', 1),
(179, 15, 'Rau má sữa', 'Rau má sữa', 'Ly', 16000, 16000, 16000, 16000, '', 1),
(180, 15, 'Rau má thường', 'Rau má thường', 'Ly', 14000, 14000, 14000, 14000, '', 1),
(181, 15, 'Tắc xí muội nóng', 'Tắc xí muội nóng', 'Ly', 14000, 14000, 14000, 14000, '', 1),
(182, 15, 'Chanh xí muội nóng', 'Chanh xí muội nóng', 'Ly', 14000, 14000, 14000, 14000, '', 1),
(183, 15, 'Xí muội đá', 'Xí muội đá', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(184, 15, 'Sâm dứa', 'Sâm dứa', 'Ly', 13000, 13000, 13000, 13000, '', 1),
(185, 15, 'Sâm dứa sữa', 'Sâm dứa sữa', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(187, 11, 'Ép cà chua', 'Ép cà chua', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(188, 11, 'Ép carrot', 'Ép carrot', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(189, 11, 'Ép cam', 'Ép cam', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(190, 11, 'Ép dâu', 'Ép dâu', 'Ly', 25000, 25000, 25000, 25000, '', 1),
(191, 11, 'Ép lê', 'Ép lê', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(192, 11, 'Ép táo', 'Ép táo', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(193, 11, 'Ép thơm', 'Ép thơm', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(194, 14, '7 up', '7 up', 'Chai', 15000, 15000, 15000, 15000, '', 1),
(196, 14, 'Cam Twister', 'Cam Twister', 'Chai', 14000, 14000, 14000, 14000, '', 1),
(197, 14, 'Dr Thanh', 'Dr Thanh', 'Chai', 16000, 16000, 16000, 16000, '', 1),
(198, 14, 'Đậu nành', 'Đậu nành', 'Chai', 12000, 12000, 12000, 12000, '', 1),
(199, 14, 'Sting dâu sữa', 'Sting dâu sữa', 'Chai', 16000, 16000, 16000, 16000, '', 1),
(200, 14, 'Nước tăng lực', 'Nước tăng lực', 'Chai', 16000, 16000, 16000, 16000, '', 1),
(201, 14, 'Nước suối', 'Nước suối', 'Chai', 12000, 12000, 12000, 12000, '', 1),
(202, 14, 'Pepsi', 'Pepsi', 'Chai', 15000, 15000, 15000, 15000, '', 1),
(203, 14, 'Coca cola', 'Coca cola', 'Chai', 15000, 15000, 15000, 15000, '', 1),
(204, 14, 'Sting dâu', 'Sting dâu', 'Chai', 13000, 13000, 13000, 13000, '', 1),
(205, 14, 'Trà xanh 0 độ', 'Trà xanh 0 độ', 'Chai', 15000, 15000, 15000, 15000, '', 1),
(206, 17, 'Rau má dừa', 'Rau má dừa', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(207, 17, 'Rau má sữa', 'Rau má sữa', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(208, 17, 'Sữa dâu tươi', 'Sữa dâu tươi', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(209, 17, 'Sữa nóng', 'Sữa nóng', 'Ly', 10000, 10000, 10000, 10000, '', 1),
(210, 17, 'Sữa thêm', 'Sữa thêm', 'Ly', 5000, 5000, 5000, 5000, '', 1),
(211, 17, 'Sữa đá', 'Sữa đá', 'Ly', 12000, 12000, 12000, 12000, '', 1),
(212, 17, 'Sữa tươi', 'Sữa tươi', 'Ly', 12000, 12000, 12000, 12000, '', 1),
(213, 20, '555 1/2 gói', '555 1/2 gói', 'Gói', 18000, 18000, 18000, 18000, '', 0),
(214, 20, '555 điếu', '555 điếu', 'Điếu', 2000, 2000, 2000, 2000, '0', 0),
(215, 20, 'Mèo lớn', 'Mèo lớn', 'Gói', 25000, 25000, 25000, 25000, '', 0),
(216, 20, 'Mèo điếu', 'Mèo điếu', 'Điếu', 1500, 1500, 1500, 1500, '0', 0),
(217, 20, 'Mèo tép', 'Mèo tép', 'Gói', 7000, 7000, 7000, 7000, '0', 0),
(218, 16, 'Lipton sữa đá', 'Lipton sữa đá', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(219, 16, 'Lipton sữa nóng', 'Lipton sữa nóng', 'Ly', 13000, 13000, 13000, 13000, '', 1),
(220, 16, 'Trà sữa', 'Trà sữa', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(221, 16, 'Trà chanh', 'Trà chanh', 'Ly', 12000, 12000, 12000, 12000, '', 1),
(222, 16, 'Trà đường đá', 'Trà đường đá', 'Ly', 10000, 10000, 10000, 10000, '', 1),
(223, 16, 'Trà đường nóng', 'Trà đường nóng', 'Ly', 8000, 8000, 8000, 8000, '', 1),
(224, 16, 'Lipton đá', 'Lipton đá', 'Ly', 12000, 12000, 12000, 12000, '', 1),
(225, 16, 'Lipton mật ong nóng', 'Lipton mật ong nóng', 'Ly', 13000, 13000, 13000, 13000, '', 1),
(226, 16, 'Lipton nóng', 'Lipton nóng', 'Ly', 10000, 10000, 10000, 10000, '', 1),
(228, 13, 'Yaourt sữa đá', 'Yaourt sữa đá', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(229, 13, 'Yaourt trái cây', 'Yaourt trái cây', 'Ly', 25000, 25000, 25000, 25000, '', 1),
(230, 21, 'Bò bít tết trứng', 'Bò bít tết trứng', 'Phần', 30000, 30000, 30000, 30000, '0', 0),
(231, 21, 'Bò bít tết ko trứng', 'Bò bít tết ko trứng', 'Phần', 25000, 25000, 25000, 25000, '0', 0),
(232, 21, 'Mỳ Ý', 'Mỳ Ý', 'Phần', 25000, 25000, 25000, 25000, '0', 0),
(233, 21, 'Bánh mì ốp la chả', 'Bánh mì ốp la chả', 'Phần', 20000, 20000, 20000, 20000, '0', 0),
(234, 21, 'Bánh mì ốp la', 'Bánh mì ốp la', 'Phần', 15000, 15000, 15000, 15000, '0', 0),
(235, 21, 'Mì gói xào bò', 'Mì gói xào bò', 'Phần', 20000, 20000, 20000, 20000, '', 0),
(236, 21, 'Nui xào bò', 'Nui xào bò', 'Phần', 20000, 20000, 20000, 20000, '', 0),
(237, 21, 'Mì gói nấu bò', 'Mì gói nấu bò', 'Phần', 20000, 20000, 20000, 20000, '', 0),
(238, 21, 'Trứng thêm', 'Trứng thêm', 'Cái', 5000, 5000, 5000, 5000, '', 0),
(239, 21, 'Mì gói thêm', 'Mì gói thêm', 'Gói', 5000, 5000, 5000, 5000, '', 0),
(240, 21, 'Bánh mì thêm', 'Bánh mì thêm', 'Cái', 5000, 5000, 5000, 5000, '', 0),
(241, 22, 'Cơm gà kho', 'Cơm gà kho', 'Phần', 22000, 22000, 22000, 22000, '', 0),
(242, 22, 'Cơm cá kho tộ', 'Cơm cá kho tộ', 'Phần', 22000, 22000, 22000, 22000, '', 0),
(243, 22, 'Cơm tép ram', 'Cơm tép ram', 'Phần', 22000, 22000, 22000, 22000, '', 0),
(244, 22, 'Cơm sườn ram', 'Cơm sườn ram', 'Phần', 22000, 22000, 22000, 22000, '', 0),
(245, 22, 'Cơm cánh gà chiên', 'Cơm cánh gà chiên', 'Phần', 22000, 22000, 22000, 22000, '', 0),
(246, 16, 'Lipton mật ong đá', 'Lipton mật ong đá', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(247, 16, 'Lipton xí muội nóng', 'Lipton xí muội nóng', 'Ly', 13000, 13000, 13000, 13000, '', 1),
(248, 16, 'Lipton xí muội đá', 'Lipton xí muội đá', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(249, 16, 'Lipton bạc hà', 'Lipton bạc hà', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(250, 16, 'Lipton cam', 'Lipton cam', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(251, 16, 'Lipton 3 tầng', 'Lipton 3 tầng', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(252, 16, 'Trà cúc nóng', 'Trà cúc nóng', 'Ly', 10000, 10000, 10000, 10000, '', 1),
(253, 16, 'Trà cúc đá', 'Trà cúc đá', 'Ly', 12000, 12000, 12000, 12000, '', 1),
(254, 3, 'Bạc xỉu nóng', 'Bạc xỉu nóng', 'Ly', 14000, 14000, 14000, 14000, '', 1),
(255, 3, 'Bạc xỉu đá', 'Bạc xỉu đá', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(256, 3, 'Cafe Kem', 'Cafe Kem', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(257, 3, 'Cafe Rhum', 'Cafe Rhum', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(258, 3, 'Cafe Baileys', 'Cafe Baileys', 'Ly', 26000, 26000, 26000, 26000, '', 1),
(259, 3, 'Cafe sữa Baileys', 'Cafe sữa Baileys', 'Ly', 28000, 28000, 28000, 28000, '', 1),
(260, 3, 'Cafe Đam mê', 'Cafe Đam mê', 'Ly', 28000, 28000, 28000, 28000, '', 1),
(261, 3, 'Cacao nóng', 'Cacao nóng', 'Ly', 14000, 14000, 14000, 14000, '', 1),
(262, 3, 'Cacao đá', 'Cacao đá', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(263, 3, 'Cacao sữa nóng', 'Cacao sữa nóng', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(264, 3, 'Cacao sữa đá', 'Cacao sữa đá', 'Ly', 17000, 17000, 17000, 17000, '', 1),
(265, 15, 'Chanh nóng', 'Chanh nóng', 'Ly', 10000, 10000, 10000, 10000, '', 1),
(266, 15, 'Chanh đá', 'Chanh đá', 'Ly', 12000, 12000, 12000, 12000, '', 1),
(267, 15, 'Chanh muối nóng', 'Chanh muối nóng', 'Ly', 10000, 10000, 10000, 10000, '', 1),
(268, 15, 'Chanh muối đá', 'Chanh muối đá', 'Ly', 12000, 12000, 12000, 12000, '', 1),
(269, 15, 'Chanh rhum', 'Chanh rhum', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(270, 15, 'Xí muội nóng', 'Xí muội nóng', 'Ly', 14000, 14000, 14000, 14000, '', 1),
(271, 15, 'Chanh xí muội đá', 'Chanh xí muội đá', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(272, 15, 'Chanh muối xí muội', 'Chanh muối xí muội', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(273, 15, 'Tắc xí muội đá', 'Tắc xí muội đá', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(274, 15, 'Bạc hà', 'Bạc hà', 'Ly', 13000, 13000, 13000, 13000, '', 1),
(275, 15, 'Bạc hà sữa', 'Bạc hà sữa', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(276, 15, 'Siro dâu', 'Siro dâu', 'Ly', 13000, 13000, 13000, 13000, '', 1),
(277, 15, 'Đá me xí muội', 'Đá me xí muội', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(278, 15, 'Siro dâu sữa', 'Siro dâu sữa', 'Ly', 15000, 15000, 15000, 15000, '', 1),
(279, 8, 'Sinh tố chanh dây', 'Sinh tố chanh dây', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(280, 8, 'Sinh tố Thơm', 'Sinh tố Thơm', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(281, 8, 'Sinh tố Dừa', 'Sinh tố Dừa', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(282, 8, 'Sinh tố Táo', 'Sinh tố Táo', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(283, 8, 'Sinh tố Lê', 'Sinh tố Lê', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(284, 8, 'ST rau má dừa', 'ST rau má dừa', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(285, 8, 'Sinh tố Bưởi', 'Sinh tố Bưởi', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(286, 8, 'Sinh tố cafe', 'Sinh tố cafe', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(287, 8, 'ST tự chọn 2 món', 'ST tự chọn 2 món', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(288, 8, 'ST tự chọn 3 món', 'ST tự chọn 3 món', 'Ly', 25000, 25000, 25000, 25000, '', 1),
(289, 8, 'ST tự chọn 4 món', 'ST tự chọn 4 món', 'Ly', 28000, 28000, 28000, 28000, '', 1),
(290, 8, 'ST chanh muối', 'ST chanh muối', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(291, 8, 'Dâu dằm', 'Dâu dằm', 'Ly', 25000, 25000, 25000, 25000, '', 1),
(292, 8, 'Mãng cầu dằm', 'Mãng cầu dằm', 'Ly', 25000, 25000, 25000, 25000, '', 1),
(293, 8, 'Bơ dầm', 'Bơ dầm', 'Ly', 25000, 25000, 25000, 25000, '', 1),
(294, 12, 'Kem 1 viên', 'Kem 1 viên', 'Ly', 12000, 12000, 12000, 12000, '', 1),
(295, 12, 'Kem 2 viên', 'Kem 2 viên', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(296, 12, 'Kem dừa', 'Kem dừa', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(297, 12, 'Kem vani', 'Kem vani', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(298, 12, 'Kem Khoai môn', 'Kem Khoai môn', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(299, 12, 'Kem cacao', 'Kem cacao', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(300, 12, 'Kem sum vầy', 'Kem sum vầy', 'Ly', 27000, 27000, 27000, 27000, '', 1),
(301, 12, 'Kem chủ nhật hồng', 'Kem chủ nhật hồng', 'Ly', 27000, 27000, 27000, 27000, '', 1),
(302, 12, 'Kem nước cam', 'Kem nước cam', 'Ly', 25000, 25000, 25000, 25000, '', 1),
(303, 12, 'Kem đậu xanh', 'Kem đậu xanh', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(304, 12, 'Kem Rhum', 'Kem Rhum', 'Ly', 24000, 24000, 24000, 24000, '', 1),
(305, 11, 'Ép 4 mùa', 'Ép 4 mùa', 'Ly', 28000, 28000, 28000, 28000, '', 1),
(306, 11, 'Ép bưởi', 'Ép bưởi', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(307, 11, 'Ép cam mật ong', 'Ép cam mật ong', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(308, 11, 'Ép cam sữa', 'Ép cam sữa', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(309, 11, 'Ép chanh dây', 'Ép chanh dây', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(310, 11, 'Ép dâu sữa', 'Ép dâu sữa', 'Ly', 26000, 26000, 26000, 26000, '', 1),
(311, 11, 'Ép tự chọn 2 món', 'Ép tự chọn 2 món', 'Ly', 22000, 22000, 22000, 22000, '', 1),
(312, 11, 'Ép tự chọn 3 món', 'Ép tự chọn 3 món', 'Ly', 25000, 25000, 25000, 25000, '', 1),
(313, 13, 'Yaourt bạc hà', 'Yaourt bạc hà', 'Ly', 18000, 18000, 18000, 18000, '', 1),
(314, 13, 'Yaourt bưởi', 'Yaourt bưởi', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(315, 13, 'Yaourt cafe đá', 'Yaourt cafe đá', 'Ly', 16000, 16000, 16000, 16000, '', 1),
(316, 13, 'Yaourt chanh dây', 'Yaourt chanh dây', 'Ly', 20000, 20000, 20000, 20000, '', 1),
(317, 13, 'Yaourt Đam mê', 'Yaourt Đam mê', 'Ly', 28000, 28000, 28000, 28000, '', 1),
(318, 17, 'Đậu nành nấu', 'Đậu nành nấu', 'Ly', 7000, 7000, 7000, 7000, '', 1),
(319, 17, 'Rau má', 'Rau má', 'Ly', 13000, 13000, 13000, 13000, '', 1),
(320, 17, 'Sữa chanh xí muội', 'Sữa chanh xí muội', 'Ly', 16000, 16000, 16000, 16000, '', 1),
(321, 17, 'Sữa tươi cacao đá', 'Sữa tươi cacao đá', 'Ly', 16000, 16000, 16000, 16000, '', 1),
(322, 17, 'Sữa tươi cafe', 'Sữa tươi cafe', 'Ly', 14000, 14000, 14000, 14000, '', 1),
(323, 20, '555 gói lớn', '555 gói lớn', 'Gói', 35000, 35000, 35000, 35000, '', 0),
(324, 20, 'Mèo trung', 'Mèo trung', 'Gói', 22000, 22000, 22000, 22000, '', 0),
(325, 23, 'Khăn lạnh', 'Khăn lạnh', 'Cái', 2000, 2000, 2000, 2000, '', 1),
(326, 23, 'Nước ép thêm', 'Nước ép thêm', 'Ly', 10000, 10000, 10000, 10000, '', 1),
(327, 23, 'Phụ thu nhạc', 'Phụ thu nhạc', 'Bàn', 5000, 5000, 5000, 5000, '', 0),
(328, 23, 'Phụ thu PL', 'Phụ thu PL', 'Bàn', 50000, 50000, 50000, 50000, '', 0),
(329, 23, 'Rau má thêm', 'Rau má thêm', 'Ly', 5000, 5000, 5000, 5000, '', 1),
(330, 23, 'Trái cây dĩa lớn', 'Trái cây dĩa lớn', 'Dĩa', 35000, 35000, 35000, 35000, '', 1),
(331, 23, 'Trái cây dĩa nhỏ', 'Trái cây dĩa nhỏ', 'Dĩa', 25000, 25000, 25000, 25000, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `card` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `type`, `card`, `phone`, `address`, `note`, `discount`) VALUES
(1, 'KHÁCH VÃNG LAI', 0, '893970784300', '', '', '', 0),
(12, 'Nguyễn Văn A', 1, '123456789', '0919 111 222', 'Vĩnh Long', '', 5),
(13, 'Nguyễn Văn B', 0, '', '', '', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_domain`
--

CREATE TABLE IF NOT EXISTS `tbl_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_domain`
--

INSERT INTO `tbl_domain` (`id`, `name`) VALUES
(1, 'PHÒNG LẠNH 1'),
(2, 'PHÒNG LẠNH 2'),
(3, 'SÂN VƯỜN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `salary_base` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `job`, `gender`, `phone`, `address`, `salary_base`) VALUES
(1, 'Nguyễn Văn A', 'Bảo vệ', 0, '0946 111 222', 'P4 - Vĩnh Long', 2000000),
(2, 'Nguyễn Văn B', 'Phục vụ', 0, '0932502838', 'Châu Thành, Đồng Tháp', 0),
(3, 'Nguyễn Văn C', 'Phục vụ', 0, '0', 'Sóc Trăng', 0),
(4, 'Nguyễn Văn D', 'Phục vụ', 1, '', 'Châu Thành, Đồng Tháp', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guest`
--

CREATE TABLE IF NOT EXISTS `tbl_guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(16) CHARACTER SET latin1 NOT NULL,
  `entry_time` varchar(32) CHARACTER SET latin1 NOT NULL,
  `exit_time` varchar(32) CHARACTER SET latin1 NOT NULL,
  `agent` varchar(16) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=150 ;

--
-- Dumping data for table `tbl_guest`
--

INSERT INTO `tbl_guest` (`id`, `ip`, `entry_time`, `exit_time`, `agent`) VALUES
(149, '115.78.94.118', '1383319305', '1383322905', '115.78.94.118');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_import`
--

CREATE TABLE IF NOT EXISTS `tbl_order_import` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_order_import_1` (`idsupplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=349 ;

--
-- Dumping data for table `tbl_order_import`
--

INSERT INTO `tbl_order_import` (`id`, `idsupplier`, `date`, `description`) VALUES
(347, 9, '2013-11-01', 'Nhập hàng'),
(348, 8, '2013-12-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_import_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_order_import_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idorder` int(11) NOT NULL,
  `idresource` int(11) NOT NULL,
  `count` float NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_order_import_detail_1` (`idorder`),
  KEY `tbl_order_import_detail_2` (`idresource`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=637 ;

--
-- Dumping data for table `tbl_order_import_detail`
--

INSERT INTO `tbl_order_import_detail` (`id`, `idorder`, `idresource`, `count`, `price`) VALUES
(629, 347, 35, 2, 160000),
(630, 347, 36, 4, 185000),
(631, 347, 39, 3, 150000),
(632, 347, 40, 2, 120000),
(633, 347, 43, 2, 180000),
(634, 348, 19, 2, 60000),
(635, 348, 20, 1, 80000),
(636, 348, 101, 1, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paid_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_paid_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_customer_paid_1` (`idcustomer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_paid_customer`
--

INSERT INTO `tbl_paid_customer` (`id`, `idcustomer`, `date`, `value`, `note`) VALUES
(18, 1, '2013-05-16', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paid_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_paid_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employee` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_employee` (`id_employee`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_paid_employee`
--

INSERT INTO `tbl_paid_employee` (`id`, `id_employee`, `date`, `value`, `note`) VALUES
(1, 1, '2013-10-05', 100000, 'Ứng đợt 2'),
(2, 1, '2013-10-01', 200000, 'Ứng đợt 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paid_general`
--

CREATE TABLE IF NOT EXISTS `tbl_paid_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_term` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_paid_1` (`id_term`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=167 ;

--
-- Dumping data for table `tbl_paid_general`
--

INSERT INTO `tbl_paid_general` (`id`, `id_term`, `date`, `value`, `note`) VALUES
(9, 10, '2013-04-01', 157000, 'Chi tiền chợ'),
(10, 10, '2013-04-02', 146000, 'Tiền chợ'),
(11, 10, '2013-04-03', 189000, 'Tiền chợ'),
(12, 10, '2013-04-04', 184000, 'Tiền chợ'),
(20, 11, '2013-04-06', 163000, 'Chi mua đồ điện '),
(21, 11, '2013-04-08', 250000, 'Mua CB'),
(22, 11, '2013-04-07', 57000, 'Trái cây cúng+bao kiếng trái cây'),
(66, 2, '2013-04-30', 2100000, 'Tạm tính'),
(111, 3, '2013-07-31', 1500000, 'Thuế TTĐB Tháng 07'),
(112, 1, '2013-07-31', 4000000, 'Tiền điện T07'),
(113, 2, '2013-07-31', 2000000, 'Tiền nước T07'),
(155, 3, '2013-08-31', 800000, 'Thuế TTĐB T08'),
(156, 3, '2013-09-30', 850000, 'Thuế TTĐB T09'),
(158, 1, '2013-08-31', 5800000, 'Tiền điện T08'),
(159, 1, '2013-09-30', 3700000, 'Tiền điện T09'),
(160, 2, '2013-08-31', 2200000, 'Tiền nước T08'),
(161, 2, '2013-09-30', 2300000, 'Tiền nước T09'),
(163, 1, '2013-05-31', 4700000, 'Tiền điện T05'),
(164, 1, '2013-06-30', 3900000, 'Tiền điện T06'),
(165, 2, '2013-05-31', 2350000, 'Tiền nước T05'),
(166, 2, '2013-06-30', 2260000, 'Tiền nước T06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paid_pay_roll`
--

CREATE TABLE IF NOT EXISTS `tbl_paid_pay_roll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employee` int(11) NOT NULL,
  `date` date NOT NULL,
  `value_base` int(11) NOT NULL,
  `value_sub` int(11) NOT NULL,
  `value_pre` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_paid_pay_roll_1` (`id_employee`),
  KEY `id_employee` (`id_employee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_paid_pay_roll`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_paid_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_paid_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_supplier_paid_1` (`idsupplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_paid_supplier`
--

INSERT INTO `tbl_paid_supplier` (`id`, `idsupplier`, `date`, `value`, `note`) VALUES
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
-- Table structure for table `tbl_pay_roll`
--

CREATE TABLE IF NOT EXISTS `tbl_pay_roll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_employee` int(11) NOT NULL,
  `date` date NOT NULL,
  `state` int(11) NOT NULL,
  `extra` int(11) NOT NULL,
  `late` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_employee` (`id_employee`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_pay_roll`
--

INSERT INTO `tbl_pay_roll` (`id`, `id_employee`, `date`, `state`, `extra`, `late`) VALUES
(1, 1, '2013-10-01', 1, 0, 0),
(2, 1, '2013-10-02', 1, 0, 0),
(3, 1, '2013-10-03', 1, 0, 0),
(4, 1, '2013-10-04', 1, 0, 0),
(5, 1, '2013-10-05', 1, 0, 0),
(6, 1, '2013-10-06', 1, 0, 0),
(7, 1, '2013-10-07', 1, 0, 0),
(8, 1, '2013-10-08', 1, 0, 0),
(9, 1, '2013-10-09', 1, 0, 0),
(10, 1, '2013-10-10', 1, 0, 0),
(11, 1, '2013-10-11', 1, 0, 0),
(12, 1, '2013-10-12', 1, 0, 0),
(13, 1, '2013-10-13', 1, 0, 0),
(14, 1, '2013-10-14', 1, 0, 0),
(15, 1, '2013-10-31', 1, 0, 0),
(16, 1, '2013-10-30', 1, 0, 0),
(17, 1, '2013-10-15', 1, 0, 0),
(18, 1, '2013-10-16', 1, 0, 0),
(19, 1, '2013-10-17', 1, 0, 0),
(20, 1, '2013-10-18', 1, 0, 0),
(21, 1, '2013-10-19', 1, 0, 0),
(22, 1, '2013-10-25', 1, 0, 0),
(23, 1, '2013-10-27', 1, 0, 0),
(24, 1, '2013-10-24', 1, 0, 0),
(25, 1, '2013-10-21', 1, 0, 0),
(26, 1, '2013-10-20', 1, 0, 0),
(27, 1, '2013-10-23', 1, 0, 0),
(28, 1, '2013-10-22', 1, 0, 0),
(29, 1, '2013-10-26', 1, 0, 0),
(30, 1, '2013-10-28', 1, 0, 0),
(31, 1, '2013-10-29', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_r2c`
--

CREATE TABLE IF NOT EXISTS `tbl_r2c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_course` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `value1` double NOT NULL,
  `value2` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_r2c_1` (`id_course`),
  KEY `tbl_r2c_2` (`id_resource`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=158 ;

--
-- Dumping data for table `tbl_r2c`
--

INSERT INTO `tbl_r2c` (`id`, `id_course`, `id_resource`, `value1`, `value2`) VALUES
(103, 107, 19, 1, 40),
(106, 108, 20, 1, 40),
(154, 197, 36, 1, 24),
(157, 205, 35, 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resource`
--

CREATE TABLE IF NOT EXISTS `tbl_resource` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_resource_1` (`idsupplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=102 ;

--
-- Dumping data for table `tbl_resource`
--

INSERT INTO `tbl_resource` (`id`, `idsupplier`, `name`, `unit`, `price`, `description`) VALUES
(2, 1, 'Đá viên lớn', 'Kg', 800, 'Nước đá cưa - Bao 20kg'),
(14, 1, 'Nước đá ướp', 'Kg', 800, 'Đá cây ướp bia'),
(17, 6, 'Bánh', 'Gói', 5000, ''),
(19, 8, 'Hạt loại 1', 'Kg', 60000, ''),
(20, 8, 'Hạt loại 2', 'Kg', 80000, ''),
(27, 6, 'Xúc xích', 'Gói', 17000, ''),
(35, 9, 'Trà xanh 0 độ', 'Thùng', 160000, 'Thùng 24 chai 500ml'),
(36, 9, 'Dr Thanh', 'Thùng', 185000, 'Thùng 24 chai 370 ml'),
(39, 9, 'Pepsi', 'Thùng', 150000, 'Thùng 24 lon 330 ml'),
(40, 9, 'Mirinda Cam', 'Thùng', 120000, 'Thùng 24 lon 330ml'),
(43, 9, 'Sting đỏ', 'Thùng', 180000, 'Thùng 24 lon 330ml'),
(47, 12, 'Ổi', 'Kg', 9000, ''),
(48, 12, 'Củ sắn', 'Kg', 15000, ''),
(49, 12, 'Mít', 'Kg', 18000, ''),
(50, 12, 'Chôm chôm', 'Kg', 10000, ''),
(51, 12, 'Xoài Thái', 'Kg', 15000, ''),
(52, 12, 'Xoài Đài Loan', 'Kg', 15000, ''),
(53, 12, 'Xoài chua', 'Kg', 15000, ''),
(54, 12, 'Mận', 'Kg', 10000, ''),
(55, 12, 'Sơ ri', 'Kg', 12000, ''),
(56, 12, 'Thơm', 'Kg', 12000, ''),
(57, 12, 'Khóm', 'Kg', 10000, ''),
(79, 12, 'Dưa hấu', 'Kg', 10000, ''),
(82, 12, 'Táo', 'Kg', 10000, ''),
(84, 12, 'Cóc', 'Kg', 6000, ''),
(91, 1, 'Đá ống viên lớn', 'Kg', 800, 'Bao 20kg'),
(99, 12, 'Bưởi', 'Kg', 10000, ''),
(101, 8, 'Hạt loại 3', 'Kg', 120000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE IF NOT EXISTS `tbl_session` (
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
  KEY `tbl_session_3` (`idcustomer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_session`
--

INSERT INTO `tbl_session` (`id`, `idtable`, `iduser`, `idcustomer`, `datetime`, `datetimeend`, `note`, `status`, `discount_value`, `discount_percent`, `surtax`, `payment`, `value`) VALUES
(1, 1, 1, 1, '2013-11-12 09:53:20', '2013-11-12 09:53:20', '', 1, 0, 0, 0, 0, 0),
(2, 2, 1, 1, '2013-11-12 10:52:22', '2013-11-12 10:52:22', '', 1, 0, 0, 0, 0, 0),
(3, 1, 1, 1, '2013-11-12 15:17:53', '2013-11-12 15:17:53', '', 1, 0, 0, 0, 0, 0),
(4, 1, 1, 1, '2013-11-30 16:38:17', '2013-11-30 16:38:17', '', 1, 0, 0, 0, 0, 0),
(5, 2, 1, 1, '2013-12-06 01:19:35', '2013-12-06 01:19:35', '', 1, 0, 0, 0, 0, 0),
(6, 4, 1, 1, '2013-12-06 01:19:48', '2013-12-06 01:19:48', '', 1, 0, 0, 0, 0, 0),
(7, 4, 1, 1, '2013-12-06 01:24:00', '2013-12-06 01:24:00', '', 0, 0, 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_session_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsession` int(11) NOT NULL,
  `idcourse` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idsession` (`idsession`),
  KEY `idcourse` (`idcourse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_session_detail`
--

INSERT INTO `tbl_session_detail` (`id`, `idsession`, `idcourse`, `count`, `price`) VALUES
(5, 3, 205, 3, 15000),
(6, 3, 197, 3, 16000),
(8, 5, 107, 4, 10000),
(9, 6, 107, 10, 10000),
(10, 7, 107, 10, 10000),
(11, 7, 213, 2, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_store`
--

CREATE TABLE IF NOT EXISTS `tbl_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_store`
--

INSERT INTO `tbl_store` (`id`, `name`, `note`) VALUES
(1, 'Kho nhà', 'Ghi chú gì đây ?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `debt` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `name`, `phone`, `address`, `note`, `debt`) VALUES
(1, 'ĐL NƯỚC ĐÁ', '0703 11 22 33', 'Phường 4', 'Cung cấp nước đá', 0),
(6, 'Siêu thị COOP MART', 'chưa cập nhật', 'Vĩnh Long', '', 0),
(8, 'ĐL Cafe hạt', '0703 111 222', 'P4 Vĩnh Long', '', 0),
(9, 'ĐL Nước ngọt', '', '', '', 0),
(12, 'VỰA TRÁI CÂY', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_table`
--

CREATE TABLE IF NOT EXISTS `tbl_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddomain` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iddomain` (`iddomain`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=98 ;

--
-- Dumping data for table `tbl_table`
--

INSERT INTO `tbl_table` (`id`, `iddomain`, `name`, `iduser`, `type`) VALUES
(1, 1, 'L1-01', 1, '0'),
(2, 1, 'L1-02', 1, '0'),
(3, 1, 'L1-03', 1, '0'),
(4, 1, 'L1-04', 1, '0'),
(14, 2, 'L2-01', 1, '0'),
(15, 2, 'L2-02', 1, '0'),
(16, 2, 'L2-03', 1, '0'),
(17, 2, 'L2-04', 1, '0'),
(26, 3, 'SV-01', 1, '0'),
(27, 3, 'SV-02', 1, '0'),
(28, 1, 'L1-05', 1, '0'),
(29, 1, 'L1-06', 1, '0'),
(30, 1, 'L1-07', 1, '0'),
(31, 1, 'L1-08', 1, '0'),
(32, 1, 'L1-09', 1, '0'),
(33, 1, 'L1-10', 1, '0'),
(34, 1, 'L1-11', 1, '0'),
(35, 1, 'L1-12', 1, '0'),
(36, 1, 'L1-13', 1, '0'),
(37, 1, 'L1-14', 1, '0'),
(38, 1, 'L1-15', 1, '0'),
(39, 1, 'L1-16', 1, '0'),
(40, 1, 'L1-17', 1, '0'),
(41, 1, 'L1-18', 1, '0'),
(42, 1, 'L1-19', 1, '0'),
(43, 1, 'L1-20', 1, '0'),
(44, 2, 'L2-05', 1, '0'),
(45, 2, 'L2-06', 1, '0'),
(46, 2, 'L2-07', 1, '0'),
(47, 2, 'L2-08', 1, '0'),
(48, 2, 'L2-09', 1, '0'),
(49, 2, 'L2-10', 1, '0'),
(50, 2, 'L2-11', 1, '0'),
(51, 2, 'L2-12', 1, '0'),
(52, 2, 'L2-13', 1, '0'),
(53, 2, 'L2-14', 1, '0'),
(54, 2, 'L2-15', 1, '0'),
(55, 2, 'L2-16', 1, '0'),
(56, 2, 'L2-17', 1, '0'),
(57, 2, 'L2-18', 1, '0'),
(58, 2, 'L2-19', 1, '0'),
(59, 2, 'L2-20', 1, '0'),
(60, 3, 'SV-03', 1, '0'),
(61, 3, 'SV-04', 1, '0'),
(62, 3, 'SV-05', 1, '0'),
(63, 3, 'SV-06', 1, '0'),
(64, 3, 'SV-07', 1, '0'),
(65, 3, 'SV-08', 1, '0'),
(66, 3, 'SV-09', 1, '0'),
(67, 3, 'SV-10', 1, '0'),
(68, 3, 'SV-11', 1, '0'),
(69, 3, 'SV-12', 1, '0'),
(70, 3, 'SV-13', 1, '0'),
(71, 3, 'SV-14', 1, '0'),
(72, 3, 'SV-15', 1, '0'),
(73, 3, 'SV-16', 1, '0'),
(74, 3, 'SV-17', 1, '0'),
(75, 3, 'SV-18', 1, '0'),
(76, 3, 'SV-19', 1, '0'),
(77, 3, 'SV-20', 1, '0'),
(78, 3, 'SV-21', 1, '0'),
(79, 3, 'SV-22', 1, '0'),
(80, 3, 'SV-23', 1, '0'),
(81, 3, 'SV-24', 1, '0'),
(82, 3, 'SV-25', 1, '0'),
(83, 3, 'SV-26', 1, '0'),
(84, 3, 'SV-27', 1, '0'),
(85, 3, 'SV-28', 1, '0'),
(86, 3, 'SV-29', 1, '0'),
(87, 3, 'SV-30', 1, '0'),
(88, 3, 'SV-31', 1, '0'),
(89, 3, 'SV-32', 1, '0'),
(90, 3, 'SV-33', 1, '0'),
(91, 3, 'SV-34', 1, '0'),
(92, 3, 'SV-35', 1, '0'),
(93, 3, 'SV-36', 1, '0'),
(94, 3, 'SV-37', 1, '0'),
(95, 3, 'SV-38', 1, '0'),
(96, 3, 'SV-39', 1, '0'),
(97, 3, 'SV-40', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_term`
--

CREATE TABLE IF NOT EXISTS `tbl_term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_term`
--

INSERT INTO `tbl_term` (`id`, `name`, `type`) VALUES
(1, 'Tiền Điện', 0),
(2, 'Tiền Nước', 0),
(3, 'Thuế', 0),
(10, 'Tiền Ăn Nhân Viên', 0),
(11, 'CP Khác', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_term_collect`
--

CREATE TABLE IF NOT EXISTS `tbl_term_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_term_collect`
--

INSERT INTO `tbl_term_collect` (`id`, `name`) VALUES
(2, 'Phụ Phẩm'),
(3, 'Đặc Biệt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracking`
--

CREATE TABLE IF NOT EXISTS `tbl_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `paid_general` int(11) NOT NULL,
  `paid_pay_roll` int(11) NOT NULL,
  `paid_import` int(11) NOT NULL,
  `collect_general` int(11) NOT NULL,
  `collect_customer` int(11) NOT NULL,
  `collect_selling_debt` int(11) NOT NULL,
  `collect_selling_nodebt` int(11) NOT NULL,
  `estate_rate` int(11) NOT NULL,
  `store_value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_tracking`
--

INSERT INTO `tbl_tracking` (`id`, `date_start`, `date_end`, `paid_general`, `paid_pay_roll`, `paid_import`, `collect_general`, `collect_customer`, `collect_selling_debt`, `collect_selling_nodebt`, `estate_rate`, `store_value`) VALUES
(10, '2013-10-01', '2013-10-31', 0, 0, 0, 0, 0, 0, 0, 0, 19227030),
(11, '2013-11-01', '2013-11-30', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, '2013-12-01', '2013-12-31', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, '2014-01-01', '2014-01-31', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, '2014-02-01', '2014-02-28', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracking_course`
--

CREATE TABLE IF NOT EXISTS `tbl_tracking_course` (
  `id` int(11) NOT NULL,
  `id_tracking` int(11) NOT NULL,
  `id_td` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tracking_course`
--

INSERT INTO `tbl_tracking_course` (`id`, `id_tracking`, `id_td`, `id_course`, `count`, `price`, `value`) VALUES
(0, 12, 6, 213, 2, 0, 0),
(0, 12, 6, 107, 34, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracking_daily`
--

CREATE TABLE IF NOT EXISTS `tbl_tracking_daily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tracking` int(11) NOT NULL,
  `date` date NOT NULL,
  `selling` bigint(20) NOT NULL,
  `import` bigint(20) NOT NULL,
  `store` bigint(20) NOT NULL,
  `paid` bigint(20) NOT NULL,
  `collect` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbl_tracking_daily`
--

INSERT INTO `tbl_tracking_daily` (`id`, `id_tracking`, `date`, `selling`, `import`, `store`, `paid`, `collect`) VALUES
(1, 12, '2013-12-01', 0, 0, 0, 0, 0),
(2, 12, '2013-12-02', 0, 0, 0, 0, 0),
(3, 12, '2013-12-03', 0, 0, 0, 0, 0),
(4, 12, '2013-12-04', 0, 0, 0, 0, 0),
(5, 12, '2013-12-05', 0, 0, 0, 0, 0),
(6, 12, '2013-12-06', 390000, 320000, 146000, 0, 2000000),
(7, 12, '2013-12-07', 0, 0, 0, 0, 0),
(8, 12, '2013-12-08', 0, 0, 0, 0, 0),
(9, 12, '2013-12-09', 0, 0, 0, 0, 0),
(10, 12, '2013-12-10', 0, 0, 0, 0, 0),
(11, 12, '2013-12-11', 0, 0, 0, 0, 0),
(12, 12, '2013-12-12', 0, 0, 0, 0, 0),
(13, 12, '2013-12-13', 0, 0, 0, 0, 0),
(14, 12, '2013-12-14', 0, 0, 0, 0, 0),
(15, 12, '2013-12-15', 0, 0, 0, 0, 0),
(16, 12, '2013-12-16', 0, 0, 0, 0, 0),
(17, 12, '2013-12-17', 0, 0, 0, 0, 0),
(18, 12, '2013-12-18', 0, 0, 0, 0, 0),
(19, 12, '2013-12-19', 0, 0, 0, 0, 0),
(20, 12, '2013-12-20', 0, 0, 0, 0, 0),
(21, 12, '2013-12-21', 0, 0, 0, 0, 0),
(22, 12, '2013-12-22', 0, 0, 0, 0, 0),
(23, 12, '2013-12-23', 0, 0, 0, 0, 0),
(24, 12, '2013-12-24', 0, 0, 0, 0, 0),
(25, 12, '2013-12-25', 0, 0, 0, 0, 0),
(26, 12, '2013-12-26', 0, 0, 0, 0, 0),
(27, 12, '2013-12-27', 0, 0, 0, 0, 0),
(28, 12, '2013-12-28', 0, 0, 0, 0, 0),
(29, 12, '2013-12-29', 0, 0, 0, 0, 0),
(30, 12, '2013-12-30', 0, 0, 0, 0, 0),
(31, 12, '2013-12-31', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracking_store`
--

CREATE TABLE IF NOT EXISTS `tbl_tracking_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tracking` int(11) NOT NULL,
  `id_td` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `count_old` float NOT NULL,
  `count_import` float NOT NULL,
  `count_export` float NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1711 ;

--
-- Dumping data for table `tbl_tracking_store`
--

INSERT INTO `tbl_tracking_store` (`id`, `id_tracking`, `id_td`, `id_resource`, `count_old`, `count_import`, `count_export`, `price`) VALUES
(1707, 12, 6, 19, 0, 2, 0.9, 60000),
(1708, 12, 6, 20, 0, 1, 0, 80000),
(1709, 12, 6, 35, 0, 0, 0, 160000),
(1710, 12, 6, 36, 0, 0, 0, 185000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE IF NOT EXISTS `tbl_unit` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id`, `name`) VALUES
(1, 'Ly'),
(2, 'Điếu'),
(3, 'Chai'),
(4, 'Lon'),
(5, 'Dĩa'),
(6, 'Thùng'),
(7, 'Két'),
(9, 'Bịch'),
(10, 'Gói'),
(20, 'Trái'),
(21, 'Cái'),
(22, 'Hủ'),
(23, 'Kg'),
(24, 'Phần'),
(25, 'Bàn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `pass`, `gender`, `note`, `datecreate`, `dateupdate`, `dateactivity`, `type`, `code`) VALUES
(1, 'Tuấn', 'tuanbuithanh@gmail.com', 'admin068368', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, ''),
(2, 'Thảo', 'thao@gmail.com', '123456', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 4, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_collect_customer`
--
ALTER TABLE `tbl_collect_customer`
  ADD CONSTRAINT `tbl_customer_collect_1` FOREIGN KEY (`idcustomer`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_collect_general`
--
ALTER TABLE `tbl_collect_general`
  ADD CONSTRAINT `tbl_collect_general_1` FOREIGN KEY (`id_term`) REFERENCES `tbl_term_collect` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `tbl_course_1` FOREIGN KEY (`idcategory`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_import`
--
ALTER TABLE `tbl_order_import`
  ADD CONSTRAINT `tbl_order_import_1` FOREIGN KEY (`idsupplier`) REFERENCES `tbl_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_import_detail`
--
ALTER TABLE `tbl_order_import_detail`
  ADD CONSTRAINT `tbl_order_import_detail_1` FOREIGN KEY (`idorder`) REFERENCES `tbl_order_import` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_import_detail_2` FOREIGN KEY (`idresource`) REFERENCES `tbl_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_paid_customer`
--
ALTER TABLE `tbl_paid_customer`
  ADD CONSTRAINT `tbl_customer_paid_1` FOREIGN KEY (`idcustomer`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_paid_employee`
--
ALTER TABLE `tbl_paid_employee`
  ADD CONSTRAINT `tbl_paid_employee_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `tbl_employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_paid_general`
--
ALTER TABLE `tbl_paid_general`
  ADD CONSTRAINT `tbl_paid_general_1` FOREIGN KEY (`id_term`) REFERENCES `tbl_term` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_paid_pay_roll`
--
ALTER TABLE `tbl_paid_pay_roll`
  ADD CONSTRAINT `tbl_paid_pay_roll_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `tbl_employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_paid_supplier`
--
ALTER TABLE `tbl_paid_supplier`
  ADD CONSTRAINT `tbl_supplier_paid_1` FOREIGN KEY (`idsupplier`) REFERENCES `tbl_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pay_roll`
--
ALTER TABLE `tbl_pay_roll`
  ADD CONSTRAINT `tbl_pay_roll_ibfk_1` FOREIGN KEY (`id_employee`) REFERENCES `tbl_employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_r2c`
--
ALTER TABLE `tbl_r2c`
  ADD CONSTRAINT `tbl_r2c_1` FOREIGN KEY (`id_course`) REFERENCES `tbl_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_r2c_2` FOREIGN KEY (`id_resource`) REFERENCES `tbl_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_resource`
--
ALTER TABLE `tbl_resource`
  ADD CONSTRAINT `tbl_resource_1` FOREIGN KEY (`idsupplier`) REFERENCES `tbl_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD CONSTRAINT `tbl_session_1` FOREIGN KEY (`idtable`) REFERENCES `tbl_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_session_2` FOREIGN KEY (`iduser`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_session_3` FOREIGN KEY (`idcustomer`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_session_detail`
--
ALTER TABLE `tbl_session_detail`
  ADD CONSTRAINT `tbl_session_detail_1` FOREIGN KEY (`idsession`) REFERENCES `tbl_session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_session_detail_2` FOREIGN KEY (`idcourse`) REFERENCES `tbl_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_table`
--
ALTER TABLE `tbl_table`
  ADD CONSTRAINT `tbl_table_1` FOREIGN KEY (`iddomain`) REFERENCES `tbl_domain` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
