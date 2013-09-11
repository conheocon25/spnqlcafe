-- MySQL dump 10.13  Distrib 5.1.70, for unknown-linux-gnu (x86_64)
--
-- Host: localhost    Database: qlcafe_dbdemo
-- ------------------------------------------------------
-- Server version	5.1.70-cll

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cafedemo2_app`
--

DROP TABLE IF EXISTS `cafedemo2_app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_app` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_app`
--

LOCK TABLES `cafedemo2_app` WRITE;
/*!40000 ALTER TABLE `cafedemo2_app` DISABLE KEYS */;
INSERT INTO `cafedemo2_app` VALUES (1,'SPN Cafe Demo 01','0909 000 000','Phường 5 Thành Phố Vĩnh Long','tuanbuithanh@gmail.com','data/images/banner/logo.png','cafedemo2_','cafedemo2_','2012-06-30 10:00:00','0000-00-00 00:00:00','2012-12-26 00:28:02',0,0);
/*!40000 ALTER TABLE `cafedemo2_app` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_category`
--

DROP TABLE IF EXISTS `cafedemo2_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_category` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` binary(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_category`
--

LOCK TABLES `cafedemo2_category` WRITE;
/*!40000 ALTER TABLE `cafedemo2_category` DISABLE KEYS */;
INSERT INTO `cafedemo2_category` VALUES (13,'Cafe',NULL),(14,'Sinh tố',NULL),(15,'Nước ép',NULL),(16,'Kem',NULL),(17,'Yaoua',NULL),(18,'Nước uống đóng chai',NULL),(19,'Nước chế biến',NULL),(20,'Trà',NULL),(21,'Sữa',NULL),(22,'Ca cao',NULL),(23,'Chanh',NULL),(24,'Thuốc lá',NULL),(25,'C2',NULL),(27,'xiro sua',NULL);
/*!40000 ALTER TABLE `cafedemo2_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_collect_customer`
--

DROP TABLE IF EXISTS `cafedemo2_collect_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_collect_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo2_customer_collect_1` (`idcustomer`),
  CONSTRAINT `cafedemo2_customer_collect_1` FOREIGN KEY (`idcustomer`) REFERENCES `cafedemo2_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_collect_customer`
--

LOCK TABLES `cafedemo2_collect_customer` WRITE;
/*!40000 ALTER TABLE `cafedemo2_collect_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `cafedemo2_collect_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_collect_general`
--

DROP TABLE IF EXISTS `cafedemo2_collect_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_collect_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_term` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo2_collect_1` (`id_term`),
  CONSTRAINT `cafedemo2_collect_general_1` FOREIGN KEY (`id_term`) REFERENCES `cafedemo2_term_collect` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_collect_general`
--

LOCK TABLES `cafedemo2_collect_general` WRITE;
/*!40000 ALTER TABLE `cafedemo2_collect_general` DISABLE KEYS */;
INSERT INTO `cafedemo2_collect_general` VALUES (5,2,'2013-05-18',10,'d');
/*!40000 ALTER TABLE `cafedemo2_collect_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_config`
--

DROP TABLE IF EXISTS `cafedemo2_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `param` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_config`
--

LOCK TABLES `cafedemo2_config` WRITE;
/*!40000 ALTER TABLE `cafedemo2_config` DISABLE KEYS */;
INSERT INTO `cafedemo2_config` VALUES (1,'ROW_PER_PAGE','12'),(5,'DISCOUNT','0');
/*!40000 ALTER TABLE `cafedemo2_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_course`
--

DROP TABLE IF EXISTS `cafedemo2_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_course` (
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
  KEY `foreign_field` (`idcategory`),
  CONSTRAINT `cafedemo2_course_1` FOREIGN KEY (`idcategory`) REFERENCES `cafedemo2_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_course`
--

LOCK TABLES `cafedemo2_course` WRITE;
/*!40000 ALTER TABLE `cafedemo2_course` DISABLE KEYS */;
INSERT INTO `cafedemo2_course` VALUES (148,13,'Cafe đá','','Ly',10000,0,0,0,''),(149,13,'Cafe đen','','Ly',9000,0,0,0,''),(150,13,'Cafe sữa nóng','','Ly',13000,0,0,0,''),(151,13,'Cafe sữa đá','','Ly',14000,0,0,0,''),(152,14,'Sinh tố bơ','','Ly',20000,0,0,0,''),(153,14,'Sinh tố Sapô','','Ly',20000,0,0,0,''),(154,14,'Sinh tố mãng cầu','','Ly',20000,0,0,0,''),(155,14,'Sinh tố cà chua','','Ly',20000,0,0,0,''),(156,14,'Sinh tố cà rốt','','Ly',20000,0,0,0,''),(157,14,'Sinh tố thơm','','Ly',20000,0,0,0,''),(158,14,'Sinh tố cam','','Ly',20000,0,0,0,''),(159,14,'Sinh tố chanh tuyết','','Ly',20000,0,0,0,''),(160,14,'Sinh tố dâu','','Ly',20000,0,0,0,''),(161,14,'Sinh tố thập cẩm','','Ly',20000,0,0,0,''),(162,16,'Kem sôcôla','','Ly',25000,0,0,0,''),(163,16,'Kem dâu tây','','Ly',25000,0,0,0,''),(164,16,'Kem cafe ','','Ly',27000,0,0,0,''),(165,16,'Kem sầu riêng','','Ly',25000,0,0,0,''),(166,16,'Kem trái cây','','Ly',27000,0,0,0,''),(167,16,'Kem thập cẩm','','Ly',27000,0,0,0,''),(168,16,'Kem 3 màu','','Ly',25000,0,0,0,''),(169,20,'Trà lipton đá','','Ly',10000,0,0,0,''),(170,20,'Trà lipton nóng','','Ly',9000,0,0,0,''),(171,20,'Trà lipton mật ong','','Ly',14000,0,0,0,''),(172,20,'Trà đường nóng','Trà đường nóng','Ly',9000,0,0,0,''),(173,20,'Trà đường đá','','Ly',10000,0,0,0,''),(174,20,'Trà chanh nóng','','Ly',9000,0,0,0,''),(175,20,'Trà chanh đá','','Ly',10000,0,0,0,''),(176,20,'Lipton sữa đá','','Ly',14000,0,0,0,''),(177,20,'Lipton sữa nóng','','Ly',13000,0,0,0,''),(178,17,'Yaoua sữa đá','','Ly',14000,0,0,0,''),(179,17,'Yaoua trái cây','','Ly',15000,0,0,0,''),(180,17,'Yaoua dâu','','Ly',15000,0,0,0,''),(181,17,'Yaoua mơ','','Ly',15000,0,0,0,''),(182,17,'Yaoua mứt','','Ly',15000,0,0,0,''),(183,17,'Yaoua cam','','Ly',15000,0,0,0,''),(184,17,'Yaoua hủ','Yaoua hủ','Hủ',10000,0,0,0,''),(185,18,'Sting dâu','Sting dâu','Chai',14000,0,0,0,''),(186,18,'Đậu nành','Đậu nành','Chai',12000,0,0,0,''),(187,18,'Bò húc','Bò húc','Chai',17000,0,0,0,''),(188,18,'Number one','Number one','Chai',16000,0,0,0,''),(189,18,'Sá xị','Sá xị','Chai',14000,0,0,0,''),(190,18,'Pepsi ','Pepsi ','Chai',15000,0,0,0,''),(191,18,'7 up','7 up','Chai',15000,0,0,0,''),(192,18,'Trà xanh','Trà xanh','Chai',15000,0,0,0,''),(193,18,'Dr.Thanh','Dr.Thanh','Chai',16000,0,0,0,''),(194,18,'Cam lon','Cam lon','Lon',17000,0,0,0,''),(195,18,'Nước suối','Nước suối','Chai',12000,0,0,0,''),(196,15,'Nước ép dâu','','Ly',20000,0,0,0,''),(197,15,'Nước ép kê','','Ly',20000,0,0,0,''),(198,15,'Nước ép táo','','Ly',20000,0,0,0,''),(199,15,'Nước ép cà chua','','Ly',20000,0,0,0,''),(200,15,'Nước ép cà rốt','','Ly',20000,0,0,0,''),(201,15,'Nước ép cam','','Ly',20000,0,0,0,''),(202,19,'Đá me','','Ly',10000,0,0,0,''),(203,19,'Tắc xí muội','','Ly',11000,0,0,0,''),(204,19,'Xí muội đá','','Ly',11000,0,0,0,''),(205,19,'Xí muội nóng','','Ly',10000,0,0,0,''),(206,19,'Rau má thường','Rau má thường','Ly',14000,0,0,0,''),(207,19,'Rau má dừa','Rau má dừa','Ly',16000,0,0,0,''),(208,19,'Rau má sữa','Rau má sữa','Ly',16000,0,0,0,''),(209,19,'Xirô dâu','','Ly',12000,0,0,0,''),(210,19,'Xirô sữa','','Ly',14000,0,0,0,''),(211,21,'Sữa quế','','Ly',14000,0,0,0,''),(212,21,'Sữa đá','','Ly',14000,0,0,0,''),(213,21,'Sữa tươi đá','','Ly',12000,0,0,0,''),(214,21,'Sữa tươi không đá','Sữa tươi không đá','Ly',11000,0,0,0,''),(215,22,'Ca cao đá','','Ly',12000,0,0,0,''),(216,22,'Ca cao nóng','Ca cao nóng','Ly',11000,0,0,0,''),(217,22,'Ca cao sữa đá','','Ly',14000,0,0,0,''),(218,22,'Ca cao sữa nóng','','Ly',13000,0,0,0,''),(219,19,'Đá me sữa ','','Ly',12000,0,0,0,''),(220,23,'Chanh tươi nóng','','Ly',9000,0,0,0,''),(222,23,'Chanh muối đá','','Ly',10000,0,0,0,''),(223,23,'Chanh muối nóng','','Ly',9000,0,0,0,''),(224,23,'Chanh dây','','Ly',12000,0,0,0,''),(225,23,'Chanh tươi đá','','Ly',10000,0,0,0,''),(226,15,'Cam vắt đá','','Ly',15000,0,0,0,''),(227,15,'Cam vắt không đá','','Ly',14000,0,0,0,''),(228,15,'Cam sữa','','Ly',17000,0,0,0,''),(229,15,'Cam mật ong','','Ly',17000,0,0,0,''),(230,18,'Khăn lạnh','Khăn lạnh','Cái',2000,0,0,0,''),(231,19,'Dừa đá','','Ly',16000,0,0,0,''),(232,19,'Dừa lạnh','','Trái',15000,0,0,0,''),(234,15,'Nước ép thập cẩm','','Ly',22000,0,0,0,''),(235,24,'555','555','Gói',35000,0,0,0,''),(236,24,'Mèo','Mèo','Gói',25000,0,0,0,''),(237,24,'555 (điếu)','','Điếu',2000,0,0,0,''),(238,24,'Mèo tép','','Bao',7000,0,0,0,''),(239,24,'Mèo (điếu)','','Điếu',1500,0,0,0,''),(240,21,'bac xiu nong','','Ly',13000,0,0,0,''),(241,21,'bac xiu đa','','Ly',14000,0,0,0,''),(242,21,'sua nong','','Ly',12000,0,0,0,''),(243,25,'','','Bao',14000,0,0,0,''),(244,27,'sam dua sua','sam dua sua','Ly',14000,0,0,0,'');
/*!40000 ALTER TABLE `cafedemo2_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_customer`
--

DROP TABLE IF EXISTS `cafedemo2_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_customer` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `card` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_customer`
--

LOCK TABLES `cafedemo2_customer` WRITE;
/*!40000 ALTER TABLE `cafedemo2_customer` DISABLE KEYS */;
INSERT INTO `cafedemo2_customer` VALUES (1,'Khách Hàng Vãng Lai',0,'893970784300','0945030709','','',0);
/*!40000 ALTER TABLE `cafedemo2_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_domain`
--

DROP TABLE IF EXISTS `cafedemo2_domain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_domain`
--

LOCK TABLES `cafedemo2_domain` WRITE;
/*!40000 ALTER TABLE `cafedemo2_domain` DISABLE KEYS */;
INSERT INTO `cafedemo2_domain` VALUES (1,'Khu Vực A'),(2,'Khu Vực B'),(4,'Khác');
/*!40000 ALTER TABLE `cafedemo2_domain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_employee`
--

DROP TABLE IF EXISTS `cafedemo2_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_employee`
--

LOCK TABLES `cafedemo2_employee` WRITE;
/*!40000 ALTER TABLE `cafedemo2_employee` DISABLE KEYS */;
INSERT INTO `cafedemo2_employee` VALUES (1,'Phan Văn A',1,'0908 000000','Đồng Tháp'),(2,'Lê Thanh B',0,'093464 646','TP Vĩnh Long');
/*!40000 ALTER TABLE `cafedemo2_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_order_import`
--

DROP TABLE IF EXISTS `cafedemo2_order_import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_order_import` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo2_order_import_1` (`idsupplier`),
  CONSTRAINT `cafedemo2_order_import_1` FOREIGN KEY (`idsupplier`) REFERENCES `cafedemo2_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_order_import`
--

LOCK TABLES `cafedemo2_order_import` WRITE;
/*!40000 ALTER TABLE `cafedemo2_order_import` DISABLE KEYS */;
INSERT INTO `cafedemo2_order_import` VALUES (7,9,'2013-04-07',''),(18,9,'2013-04-05',''),(19,9,'2013-04-09',''),(20,1,'2013-04-10',''),(23,1,'2013-04-12',''),(24,9,'2013-04-12',''),(28,1,'2013-04-13',''),(30,6,'2013-04-13',''),(33,6,'2013-04-02',''),(35,6,'2013-04-06',''),(36,6,'2013-04-07',''),(37,6,'2013-04-12',''),(38,6,'2013-04-14',''),(40,1,'2013-04-15',''),(46,6,'2013-03-31',''),(48,9,'2013-03-31',''),(50,1,'2013-04-17',''),(53,9,'2013-04-20',''),(55,1,'2013-04-21',''),(61,9,'2013-04-23',''),(67,6,'2013-04-24',''),(71,6,'2013-04-28',''),(76,9,'2013-04-29','Đậu nành sấy: 100 bich x 4000đ'),(78,1,'2013-04-22',''),(79,1,'2013-04-25',''),(80,1,'2013-04-27',''),(82,1,'2013-05-01',''),(83,6,'2013-05-01',''),(84,9,'2013-05-03',''),(88,1,'2013-05-05',''),(89,1,'2013-05-06',''),(91,6,'2013-05-06',''),(93,6,'2013-05-07',''),(94,1,'2013-05-07',''),(97,9,'2013-05-06',''),(99,1,'2013-05-10',''),(101,1,'2013-05-11',''),(105,9,'2013-05-11',''),(107,1,'2013-05-13',''),(112,1,'2013-05-19',''),(115,6,'2013-05-19',''),(117,6,'2013-03-28','Tồn kho tính đến ngày 28/03'),(118,9,'2013-03-28','Tồn khó tính đến ngày 28/03\r\n'),(121,6,'2013-05-16',''),(123,6,'2013-05-20','');
/*!40000 ALTER TABLE `cafedemo2_order_import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_order_import_detail`
--

DROP TABLE IF EXISTS `cafedemo2_order_import_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_order_import_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idorder` int(11) NOT NULL,
  `idresource` int(11) NOT NULL,
  `count` float NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo2_order_import_detail_1` (`idorder`),
  KEY `cafedemo2_order_import_detail_2` (`idresource`),
  CONSTRAINT `cafedemo2_order_import_detail_1` FOREIGN KEY (`idorder`) REFERENCES `cafedemo2_order_import` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cafedemo2_order_import_detail_2` FOREIGN KEY (`idresource`) REFERENCES `cafedemo2_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_order_import_detail`
--

LOCK TABLES `cafedemo2_order_import_detail` WRITE;
/*!40000 ALTER TABLE `cafedemo2_order_import_detail` DISABLE KEYS */;
INSERT INTO `cafedemo2_order_import_detail` VALUES (2,7,44,100,3000),(23,18,59,9,26667),(24,18,58,1,0),(25,19,39,10,16500),(26,19,40,10,23500),(27,20,2,5,16000),(35,23,2,5,16000),(36,24,59,10,27500),(38,28,2,5,16000),(42,30,27,10,17500),(46,33,27,5,19000),(47,35,27,10,17500),(48,36,28,20,2500),(49,37,28,20,2500),(50,24,61,200,550),(51,38,28,20,2500),(55,40,2,5,16000),(66,46,27,2,0),(67,46,28,23,0),(68,46,29,29,0),(69,46,30,25,0),(70,46,31,25,0),(71,46,32,130,0),(84,46,17,59,0),(85,48,59,8,0),(86,48,39,11,0),(87,48,40,6,0),(88,48,35,377,0),(90,50,2,5,16000),(94,53,61,500,538),(95,53,39,20,16700),(99,55,2,5,16000),(105,61,44,50,3000),(106,61,59,33,27273),(107,67,31,10,17700),(108,67,30,10,16800),(117,71,27,10,17500),(124,78,2,3,16000),(125,79,2,6,16000),(126,80,2,3,16000),(130,82,2,5,16000),(131,83,28,20,2500),(132,84,43,40,1700),(133,84,65,20,15400),(134,84,40,20,23000),(135,84,39,30,17100),(140,88,2,4,16000),(142,89,2,4,16000),(144,91,31,10,19500),(145,91,30,10,16800),(148,93,27,10,17500),(149,94,2,3,16000),(152,97,61,6,26900),(157,99,2,3,16000),(159,101,2,3,16000),(162,105,44,48,3000),(165,107,2,3,16000),(168,112,2,5,16000),(172,115,27,10,17500),(188,117,17,59,0),(189,117,30,25,15500),(190,117,31,25,19500),(191,117,29,29,0),(192,117,27,2,0),(193,117,32,130,0),(194,117,28,23,0),(197,118,35,377,0),(198,118,39,1.1,165000),(199,118,40,0.6,235000),(200,118,58,8,0),(201,118,65,0.4,155000),(203,121,28,20,2500),(206,123,29,10,10500),(207,123,30,10,18500),(208,123,31,10,20500);
/*!40000 ALTER TABLE `cafedemo2_order_import_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_paid_customer`
--

DROP TABLE IF EXISTS `cafedemo2_paid_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_paid_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo2_customer_paid_1` (`idcustomer`),
  CONSTRAINT `cafedemo2_customer_paid_1` FOREIGN KEY (`idcustomer`) REFERENCES `cafedemo2_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_paid_customer`
--

LOCK TABLES `cafedemo2_paid_customer` WRITE;
/*!40000 ALTER TABLE `cafedemo2_paid_customer` DISABLE KEYS */;
INSERT INTO `cafedemo2_paid_customer` VALUES (18,1,'2013-05-16',1,'');
/*!40000 ALTER TABLE `cafedemo2_paid_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_paid_general`
--

DROP TABLE IF EXISTS `cafedemo2_paid_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_paid_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_term` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo2_paid_1` (`id_term`),
  CONSTRAINT `cafedemo2_paid_general_1` FOREIGN KEY (`id_term`) REFERENCES `cafedemo2_term` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_paid_general`
--

LOCK TABLES `cafedemo2_paid_general` WRITE;
/*!40000 ALTER TABLE `cafedemo2_paid_general` DISABLE KEYS */;
INSERT INTO `cafedemo2_paid_general` VALUES (9,10,'2013-04-01',157000,'Chi tiền chợ'),(10,10,'2013-04-02',146000,'Tiền chợ'),(11,10,'2013-04-03',189000,'Tiền chợ'),(12,10,'2013-04-04',184000,'Tiền chợ'),(13,10,'2013-04-05',173000,'Tiền chợ'),(14,10,'2013-04-06',213000,'Tiền chợ'),(15,10,'2013-04-07',123000,'Tiền chợ'),(16,10,'2013-04-08',224000,'Tiền chợ'),(17,10,'2013-04-09',200000,'Tiền chợ'),(23,10,'2013-04-10',102000,'Tiền chợ'),(25,10,'2013-04-11',106000,'Tiền chợ'),(27,10,'2013-04-13',163000,'Tiền chợ'),(33,10,'2013-04-14',221000,'Tiền chợ'),(34,10,'2013-04-15',122000,'Tiền chợ'),(35,10,'2013-04-17',222000,'Tiền chợ'),(36,10,'2013-04-18',118000,'Tiền chợ'),(38,10,'2013-04-19',122000,'Tiền chợ'),(39,10,'2013-04-20',134000,'Tiền chợ\r\n'),(42,10,'2013-04-22',120000,'Tiền chợ\r\n'),(43,1,'2013-04-20',649000,'Tiền điện sinh hoạt'),(45,10,'2013-04-23',97000,'Tiền chợ'),(47,10,'2013-04-24',65000,'Tiền chợ'),(49,10,'2013-04-25',177000,'Tiền chợ'),(51,10,'2013-04-26',100000,'Tiền chợ'),(52,10,'2013-04-27',102000,'Tiền chợ'),(54,10,'2013-04-28',103000,'Tiền chợ'),(55,10,'2013-04-29',126000,'Tiền chợ'),(57,10,'2013-05-01',95000,'Tiền chợ'),(59,10,'2013-05-03',183000,'Tiền chợ'),(60,10,'2013-05-02',62000,'Tiền chợ'),(61,10,'2013-05-04',85000,'Tiền chợ'),(62,10,'2013-05-05',89000,'Tiền chợ\r\n'),(63,10,'2013-05-06',32000,'Tiền chợ'),(64,4,'2013-04-30',10500000,'Lương NV chưa tính phụ cấp'),(65,1,'2013-04-30',6000000,''),(66,2,'2013-04-30',1500000,'Tạm tính'),(67,10,'2013-05-07',211000,'Tiền chợ\r\n'),(70,10,'2013-05-08',115000,'Tiền chợ'),(71,10,'2013-05-09',117000,'Tiền chợ'),(73,10,'2013-05-10',81000,'Tiền chợ'),(74,10,'2013-05-11',99000,'Tiền chợ\r\n'),(75,10,'2013-05-12',330000,'Tiền chợ'),(76,10,'2013-05-13',85000,'Tiền chợ\r\n'),(77,10,'2013-05-14',74500,'Tiền chợ'),(79,3,'2013-04-30',5600000,'Thuế TTĐB'),(80,12,'2013-04-30',3250000,'chi tiền đầu chai cho NV'),(81,10,'2013-05-15',221000,''),(82,10,'2013-05-16',106000,''),(83,10,'2013-05-17',129000,''),(85,10,'2013-05-18',99000,''),(86,10,'2013-05-19',85000,''),(88,10,'2013-05-20',40000,'');
/*!40000 ALTER TABLE `cafedemo2_paid_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_paid_supplier`
--

DROP TABLE IF EXISTS `cafedemo2_paid_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_paid_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo2_supplier_paid_1` (`idsupplier`),
  CONSTRAINT `cafedemo2_supplier_paid_1` FOREIGN KEY (`idsupplier`) REFERENCES `cafedemo2_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_paid_supplier`
--

LOCK TABLES `cafedemo2_paid_supplier` WRITE;
/*!40000 ALTER TABLE `cafedemo2_paid_supplier` DISABLE KEYS */;
INSERT INTO `cafedemo2_paid_supplier` VALUES (1,1,'2012-08-01',2300000,'được không ?'),(2,1,'2012-07-03',350000,'Ghi chú gì đây'),(3,1,'2012-07-26',750000,'Ghi ghi gì gì đó'),(8,6,'2012-09-19',1000000,'Thử nè được không đó !'),(9,1,'2012-09-19',1000000,'lung tung quá đi'),(11,1,'2012-01-01',123,'sdfdsfggf'),(12,1,'2012-09-24',1230000,'đâu biết'),(13,1,'2012-09-24',1213232,''),(14,1,'2012-09-24',34243243,''),(15,1,'2012-09-24',21323,''),(16,1,'2012-09-24',123323,''),(17,1,'2012-09-24',21323,'');
/*!40000 ALTER TABLE `cafedemo2_paid_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_r2c`
--

DROP TABLE IF EXISTS `cafedemo2_r2c`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_r2c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_course` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `value1` double NOT NULL,
  `value2` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo2_r2c_1` (`id_course`),
  KEY `cafedemo2_r2c_2` (`id_resource`),
  CONSTRAINT `cafedemo2_r2c_1` FOREIGN KEY (`id_course`) REFERENCES `cafedemo2_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cafedemo2_r2c_2` FOREIGN KEY (`id_resource`) REFERENCES `cafedemo2_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_r2c`
--

LOCK TABLES `cafedemo2_r2c` WRITE;
/*!40000 ALTER TABLE `cafedemo2_r2c` DISABLE KEYS */;
/*!40000 ALTER TABLE `cafedemo2_r2c` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_resource`
--

DROP TABLE IF EXISTS `cafedemo2_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_resource` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo2_resource_1` (`idsupplier`),
  CONSTRAINT `cafedemo2_resource_1` FOREIGN KEY (`idsupplier`) REFERENCES `cafedemo2_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_resource`
--

LOCK TABLES `cafedemo2_resource` WRITE;
/*!40000 ALTER TABLE `cafedemo2_resource` DISABLE KEYS */;
INSERT INTO `cafedemo2_resource` VALUES (1,1,'Nước đá ống','Kg',0,'Nước đá dùng để uống trà, cafe'),(2,1,'Nước đá ướp','Cây',0,'Dùng để ướp lạnh'),(3,1,'Nước đá viên','Kg',0,'Viên cưa dùng uống bia'),(14,1,'Nước đá tủ lạnh','Gói',0,'Nước đá lấy từ tủ lạnh nhà'),(17,6,'Bánh','Bịch',0,''),(27,6,'Xúc Xích','Bịch',0,''),(28,6,'CW DOUBLEMINT','Hộp',0,''),(29,6,'Chả Giò','Bịch',0,''),(30,6,'Khô Bò','Bịch',0,''),(31,6,'Mít Sấy','Bịch',0,''),(32,6,'Đậu Phộng ','Bịch',0,''),(34,9,'Trái Cây','Dĩa',0,''),(35,9,'Đậu Phộng sấy','Bịch',0,''),(36,9,'Đậu Phộng chiên','Bịch',0,''),(39,9,'Thuốc Craven','Cây',165000,''),(40,9,'Thuốc 555','Cây',235000,''),(43,9,'Quẹt gas','Hộp',85000,''),(44,9,'Đậu Nành','Gói',3000,'Mua ngoài'),(58,9,'Khô Mực','Con',0,''),(59,9,'Khô_Mực','Con',0,''),(61,9,'Khăn Lạnh','Hộp',27000,''),(65,9,'Thuốc Hút','Cây',155000,''),(66,9,'Bánh tráng rế','Bịch',15000,'Bánh tráng gói chả giò rế'),(67,9,'Thịt ghẹ','Kg',80000,'Thịt ghẹ gói chả giò rế'),(68,9,'Khoai cao','Kg',30000,'Khoai cao gói chả giò rế');
/*!40000 ALTER TABLE `cafedemo2_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_session`
--

DROP TABLE IF EXISTS `cafedemo2_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_session` (
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
  KEY `cafedemo2_session_3` (`idcustomer`),
  CONSTRAINT `cafedemo2_session_1` FOREIGN KEY (`idtable`) REFERENCES `cafedemo2_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cafedemo2_session_2` FOREIGN KEY (`iduser`) REFERENCES `cafedemo2_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cafedemo2_session_3` FOREIGN KEY (`idcustomer`) REFERENCES `cafedemo2_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1427 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_session`
--

LOCK TABLES `cafedemo2_session` WRITE;
/*!40000 ALTER TABLE `cafedemo2_session` DISABLE KEYS */;
INSERT INTO `cafedemo2_session` VALUES (1,29,1,1,'2013-08-14 01:35:40','2013-08-14 01:35:40','',1,0,10,0,0,40000),(2,1,1,1,'2013-08-14 01:57:01','2013-08-14 01:57:01','',1,0,0,0,0,52000),(3,4,1,1,'2013-08-14 02:03:06','2013-08-14 02:03:06','',1,0,0,0,0,54000),(6,1,1,1,'2013-08-14 02:45:34','2013-08-14 02:45:34','',1,0,0,0,0,48000),(8,3,1,1,'2013-08-14 05:33:10','2013-08-14 05:33:10','',1,0,0,0,0,90000),(10,4,1,1,'2013-08-14 07:55:34','2013-08-14 07:55:34','',1,0,0,0,0,104000),(30,1,1,1,'2013-08-14 16:26:57','2013-08-14 16:26:57','',1,0,0,0,0,0),(31,1,1,1,'2013-08-14 16:31:17','2013-08-14 16:31:17','',1,0,0,0,0,49000),(32,2,1,1,'2013-08-14 16:35:49','2013-08-14 16:35:49','',1,0,0,0,0,0),(34,2,1,1,'2013-08-15 06:42:30','2013-08-15 06:42:30','',1,0,20,0,0,59000),(35,40,1,1,'2013-08-15 06:43:23','2013-08-15 06:43:23','',1,0,20,0,0,88000),(36,34,1,1,'2013-08-15 06:47:20','2013-08-15 06:47:20','',1,0,20,0,0,16000),(37,45,1,1,'2013-08-15 06:54:54','2013-08-15 06:54:54','',1,0,20,0,0,24000),(38,1,1,1,'2013-08-15 06:56:27','2013-08-15 06:56:27','',1,0,20,0,0,24000),(39,31,1,1,'2013-08-15 07:00:28','2013-08-15 07:00:28','',1,0,20,0,0,77000),(40,4,1,1,'2013-08-15 07:03:48','2013-08-15 07:03:48','',1,0,20,0,0,32000),(41,32,1,1,'2013-08-15 07:04:42','2013-08-15 07:04:42','',1,0,20,0,0,16000),(42,49,1,1,'2013-08-15 07:06:13','2013-08-15 07:06:13','',1,0,20,0,0,24000),(43,51,1,1,'2013-08-15 07:10:12','2013-08-15 07:10:12','',1,0,20,0,0,8000),(44,51,1,1,'2013-08-15 07:12:06','2013-08-15 07:12:06','',1,0,20,0,0,32000),(45,33,1,1,'2013-08-15 07:14:51','2013-08-15 07:14:51','',1,0,20,0,0,16000),(46,28,1,1,'2013-08-15 07:17:45','2013-08-15 07:17:45','',1,0,20,0,0,14000),(47,30,1,1,'2013-08-15 07:41:42','2013-08-15 07:41:42','',1,0,20,0,0,12000),(48,34,1,1,'2013-08-15 07:51:55','2013-08-15 07:51:55','',1,0,20,0,0,35000),(49,40,1,1,'2013-08-15 07:52:57','2013-08-15 07:52:57','',1,0,20,0,0,0),(50,3,1,1,'2013-08-15 07:53:44','2013-08-15 07:53:44','',1,0,20,0,0,22000),(51,4,1,1,'2013-08-15 07:59:37','2013-08-15 07:59:37','',1,0,20,0,0,22000),(52,1,1,1,'2013-08-15 08:02:05','2013-08-15 08:02:05','',1,0,20,0,0,24000),(53,2,1,1,'2013-08-15 08:02:45','2013-08-15 08:02:45','',1,0,20,0,0,8000),(54,35,1,1,'2013-08-15 08:09:20','2013-08-15 08:09:20','',1,0,20,0,0,8000),(55,33,1,1,'2013-08-15 08:15:55','2013-08-15 08:15:55','',1,0,20,0,0,11000),(56,45,1,1,'2013-08-15 08:16:38','2013-08-15 08:16:38','',1,0,20,0,0,8000),(57,41,1,1,'2013-08-15 08:18:03','2013-08-15 08:18:03','',1,0,20,0,0,46000),(58,44,1,1,'2013-08-15 08:18:50','2013-08-15 08:18:50','',1,0,20,0,0,18000),(59,32,1,1,'2013-08-15 08:30:41','2013-08-15 08:30:41','',1,0,20,0,0,14000),(60,4,1,1,'2013-08-15 08:32:59','2013-08-15 08:32:59','',1,0,20,0,0,22000),(61,32,1,1,'2013-08-15 08:37:53','2013-08-15 08:37:53','',1,0,20,0,0,35000),(62,29,1,1,'2013-08-15 08:38:10','2013-08-15 08:38:10','',1,0,20,0,0,24000),(63,47,1,1,'2013-08-15 08:38:47','2013-08-15 08:38:47','',1,0,20,0,0,16000),(64,34,1,1,'2013-08-15 08:43:36','2013-08-15 08:43:36','',1,0,20,0,0,8000),(65,45,1,1,'2013-08-15 08:47:00','2013-08-15 08:47:00','',1,0,20,0,0,26000),(66,46,1,1,'2013-08-15 08:47:18','2013-08-15 08:47:18','',1,0,20,0,0,32000),(67,38,1,1,'2013-08-15 08:49:10','2013-08-15 08:49:10','',1,0,20,0,0,27000),(68,43,1,1,'2013-08-15 08:49:30','2013-08-15 08:49:30','',1,0,20,0,0,16000),(69,3,1,1,'2013-08-15 08:50:48','2013-08-15 08:50:48','',1,0,20,0,0,24000),(70,44,1,1,'2013-08-15 08:56:06','2013-08-15 08:56:06','',1,0,20,0,0,8000),(71,36,1,1,'2013-08-15 09:06:28','2013-08-15 09:06:28','',1,0,20,0,0,19000),(72,37,1,1,'2013-08-15 09:11:11','2013-08-15 09:11:11','',1,0,20,0,0,16000),(73,47,1,1,'2013-08-15 09:18:22','2013-08-15 09:18:22','',1,0,20,0,0,8000),(74,41,1,1,'2013-08-15 09:25:21','2013-08-15 09:25:21','',1,0,20,0,0,43000),(75,31,1,1,'2013-08-15 09:28:16','2013-08-15 09:28:16','',1,0,20,0,0,58000),(76,45,1,1,'2013-08-15 09:34:56','2013-08-15 09:34:56','',1,0,20,0,0,19000),(77,48,1,1,'2013-08-15 09:37:05','2013-08-15 09:37:05','',1,0,0,0,0,0),(78,44,1,1,'2013-08-15 09:51:41','2013-08-15 09:51:41','',1,0,20,0,0,8000),(79,32,1,1,'2013-08-15 09:52:22','2013-08-15 09:52:22','',1,0,20,0,0,30000),(80,34,1,1,'2013-08-15 09:53:07','2013-08-15 09:53:07','',1,0,20,0,0,16000),(81,31,1,1,'2013-08-15 09:54:24','2013-08-15 09:54:24','',1,0,20,0,0,16000),(82,46,1,1,'2013-08-15 10:12:29','2013-08-15 10:12:29','',1,0,0,0,0,0),(83,30,1,1,'2013-08-15 10:12:42','2013-08-15 10:12:42','',1,0,20,0,0,10000),(84,32,1,1,'2013-08-15 10:31:43','2013-08-15 10:31:43','',1,0,20,0,0,34000),(85,33,1,1,'2013-08-15 10:35:00','2013-08-15 10:35:00','',1,0,20,0,0,37000),(86,45,1,1,'2013-08-15 10:42:35','2013-08-15 10:42:35','',1,0,20,0,0,32000),(87,44,1,1,'2013-08-15 10:50:17','2013-08-15 10:50:17','',1,0,20,0,0,16000),(88,35,1,1,'2013-08-15 10:56:34','2013-08-15 10:56:34','',1,0,20,0,0,16000),(89,39,1,1,'2013-08-15 11:04:55','2013-08-15 11:04:55','',1,0,20,0,0,24000),(90,40,1,1,'2013-08-15 11:17:13','2013-08-15 11:17:13','',1,0,20,0,0,20000),(91,45,1,1,'2013-08-15 11:26:49','2013-08-15 11:26:49','',1,0,20,0,0,72000),(92,33,1,1,'2013-08-15 11:27:53','2013-08-15 11:27:53','',1,0,20,0,0,46000),(93,29,1,1,'2013-08-15 11:34:50','2013-08-15 11:34:50','',1,0,20,0,0,27000),(94,30,1,1,'2013-08-15 11:39:08','2013-08-15 11:39:08','',1,0,20,0,0,8000),(95,35,1,1,'2013-08-15 11:54:49','2013-08-15 11:54:49','',1,0,20,0,0,24000),(96,43,1,1,'2013-08-15 12:09:46','2013-08-15 12:09:46','',1,0,20,0,0,47000),(97,33,1,1,'2013-08-15 12:16:17','2013-08-15 12:16:17','',1,0,20,0,0,33000),(98,43,1,1,'2013-08-15 12:22:22','2013-08-15 12:22:22','',1,0,20,0,0,68000),(495,29,1,1,'2013-08-18 13:52:52','2013-08-18 13:52:52','',1,0,0,0,0,28000),(496,32,1,1,'2013-08-18 13:55:07','2013-08-18 13:55:07','',1,0,0,0,0,40000),(497,30,1,1,'2013-08-18 14:22:51','2013-08-18 14:22:51','',1,0,0,0,0,76000),(498,39,1,1,'2013-08-18 14:36:18','2013-08-18 14:36:18','',1,0,0,0,0,44000),(499,44,1,1,'2013-08-18 14:37:56','2013-08-18 14:37:56','',1,0,0,0,0,20000),(595,44,1,1,'2013-08-19 09:25:39','2013-08-19 09:25:39','',1,0,0,0,0,20000),(596,42,1,1,'2013-08-19 09:28:07','2013-08-19 09:28:07','',1,0,0,0,0,17000),(616,39,1,1,'2013-08-19 12:18:52','2013-08-19 12:18:52','',1,0,0,0,0,20000),(617,34,1,1,'2013-08-19 12:21:45','2013-08-19 12:21:45','',1,0,0,0,0,10000),(619,33,1,1,'2013-08-19 12:40:32','2013-08-19 12:40:32','',1,0,0,0,0,15000),(625,41,1,1,'2013-08-19 14:03:36','2013-08-19 14:03:36','',1,0,0,0,0,36000),(626,29,1,1,'2013-08-19 14:05:40','2013-08-19 14:05:40','',1,0,0,0,0,52000),(679,33,1,1,'2013-08-20 06:58:28','2013-08-20 06:58:28','',1,0,0,0,0,20000),(680,1,1,1,'2013-08-20 07:05:04','2013-08-20 07:05:04','',1,0,0,0,0,10000),(681,32,1,1,'2013-08-20 07:05:18','2013-08-20 07:05:18','',1,0,0,0,0,24000),(682,2,1,1,'2013-08-20 07:05:36','2013-08-20 07:05:36','',1,0,0,0,0,10000),(683,45,1,1,'2013-08-20 07:10:51','2013-08-20 07:10:51','',1,0,0,0,0,29000),(684,30,1,1,'2013-08-20 07:27:34','2013-08-20 07:27:34','',1,0,0,0,0,20000),(685,4,1,1,'2013-08-20 07:27:53','2013-08-20 07:27:53','',1,0,0,0,0,96000),(686,28,1,1,'2013-08-20 07:27:56','2013-08-20 07:27:56','',1,0,0,0,0,50000),(687,44,1,1,'2013-08-20 07:31:24','2013-08-20 07:31:24','',1,0,0,0,0,33000),(688,35,1,1,'2013-08-20 07:39:10','2013-08-20 07:39:10','',1,0,0,0,0,20000),(689,45,1,1,'2013-08-20 07:48:18','2013-08-20 07:48:18','',1,0,0,0,0,20000),(690,36,1,1,'2013-08-20 07:56:29','2013-08-20 07:56:29','',1,0,0,0,0,36000),(691,29,1,1,'2013-08-20 07:57:06','2013-08-20 07:57:06','',1,0,0,0,0,55000),(692,31,1,1,'2013-08-20 08:09:03','2013-08-20 08:09:03','',1,0,0,0,0,30000),(693,40,1,1,'2013-08-20 08:16:25','2013-08-20 08:16:25','',1,0,0,0,0,44000),(694,38,1,1,'2013-08-20 08:17:03','2013-08-20 08:17:03','',1,0,0,0,0,30000),(695,33,1,1,'2013-08-20 08:28:53','2013-08-20 08:28:53','',1,0,0,0,0,34000),(696,43,1,1,'2013-08-20 08:34:30','2013-08-20 08:34:30','',1,0,0,0,0,20000),(697,41,1,1,'2013-08-20 08:37:54','2013-08-20 08:37:54','',1,0,0,0,0,13000),(698,33,1,1,'2013-08-20 08:46:34','2013-08-20 08:46:34','',1,0,0,0,0,45000),(699,34,1,1,'2013-08-20 08:52:09','2013-08-20 08:52:09','',1,0,0,0,0,29000),(700,44,1,1,'2013-08-20 08:53:21','2013-08-20 08:53:21','',1,0,0,0,0,14000),(701,37,1,1,'2013-08-20 09:05:10','2013-08-20 09:05:10','',1,0,0,0,0,43000),(702,30,1,1,'2013-08-20 09:05:35','2013-08-20 09:05:35','',1,0,0,0,0,30000),(703,49,1,1,'2013-08-20 09:05:59','2013-08-20 09:05:59','',1,0,0,0,0,10000),(704,29,1,1,'2013-08-20 09:10:49','2013-08-20 09:10:49','',1,0,0,0,0,50000),(705,45,1,1,'2013-08-20 09:27:47','2013-08-20 09:27:47','',1,0,0,0,0,41000),(706,35,1,1,'2013-08-20 09:28:03','2013-08-20 09:28:03','',1,0,0,0,0,58000),(707,36,1,1,'2013-08-20 09:28:40','2013-08-20 09:28:40','',1,0,0,0,0,30000),(708,44,1,1,'2013-08-20 09:29:07','2013-08-20 09:29:07','',1,0,0,0,0,47000),(709,31,1,1,'2013-08-20 09:41:24','2013-08-20 09:41:24','',1,0,0,0,0,28000),(710,39,1,1,'2013-08-20 09:48:36','2013-08-20 09:48:36','',1,0,0,0,0,32000),(711,43,1,1,'2013-08-20 09:50:26','2013-08-20 09:50:26','',1,0,0,0,0,10000),(712,41,1,1,'2013-08-20 09:56:54','2013-08-20 09:56:54','',1,0,0,0,0,20000),(713,32,1,1,'2013-08-20 10:01:32','2013-08-20 10:01:32','',1,0,0,0,0,50000),(714,42,1,1,'2013-08-20 10:08:20','2013-08-20 10:08:20','',1,0,0,0,0,12000),(715,38,1,1,'2013-08-20 10:15:19','2013-08-20 10:15:19','',1,0,0,0,0,20000),(717,30,1,1,'2013-08-20 10:56:49','2013-08-20 10:56:49','',1,0,0,0,0,10000),(718,35,1,1,'2013-08-20 10:57:46','2013-08-20 10:57:46','',1,0,0,0,0,29000),(719,34,1,1,'2013-08-20 10:59:30','2013-08-20 10:59:30','',1,0,0,0,0,14000),(720,49,1,1,'2013-08-20 11:11:49','2013-08-20 11:11:49','',1,0,0,0,0,10000),(721,36,1,1,'2013-08-20 11:12:53','2013-08-20 11:12:53','',1,0,0,0,0,34000),(722,36,1,1,'2013-08-20 11:25:34','2013-08-20 11:25:34','',1,0,0,0,0,20000),(723,31,1,1,'2013-08-20 11:34:45','2013-08-20 11:34:45','',1,0,0,0,0,30000),(724,40,1,1,'2013-08-20 11:44:16','2013-08-20 11:44:16','',1,0,0,0,0,22000),(725,33,1,1,'2013-08-20 11:51:27','2013-08-20 11:51:27','',1,0,0,0,0,10000),(737,38,1,1,'2013-08-20 13:23:20','2013-08-20 13:23:20','',1,0,0,0,0,40000),(738,34,1,1,'2013-08-20 13:31:06','2013-08-20 13:31:06','',1,0,0,0,0,10000),(739,31,1,1,'2013-08-20 13:36:15','2013-08-20 13:36:15','',1,0,0,0,0,20000),(740,32,1,1,'2013-08-20 13:36:47','2013-08-20 13:36:47','',1,0,0,0,0,38000),(741,41,1,1,'2013-08-20 13:49:15','2013-08-20 13:49:15','',1,0,0,0,0,10000),(742,39,1,1,'2013-08-20 13:55:58','2013-08-20 13:55:58','',1,0,0,0,0,35000),(743,29,1,1,'2013-08-20 13:56:15','2013-08-20 13:56:15','',1,0,0,0,0,26000),(744,30,1,1,'2013-08-20 14:01:20','2013-08-20 14:01:20','',1,0,0,0,0,31000),(819,31,1,1,'2013-08-21 09:17:38','2013-08-21 09:17:38','',1,0,0,0,0,55000),(820,2,1,1,'2013-08-21 09:22:35','2013-08-21 09:22:35','',1,0,0,0,0,25000),(821,40,1,1,'2013-08-21 09:26:10','2013-08-21 09:26:10','',1,0,0,0,0,24000),(822,44,1,1,'2013-08-21 09:26:32','2013-08-21 09:26:32','',1,0,0,0,0,42000),(823,35,1,1,'2013-08-21 09:29:37','2013-08-21 09:29:37','',1,0,0,0,0,19000),(824,38,1,1,'2013-08-21 09:30:21','2013-08-21 09:30:21','',1,0,0,0,0,60000),(825,30,1,1,'2013-08-21 09:32:44','2013-08-21 09:32:44','',1,0,0,0,0,20000),(826,45,1,1,'2013-08-21 09:40:46','2013-08-21 09:40:46','',1,0,0,0,0,20000),(827,33,1,1,'2013-08-21 09:53:51','2013-08-21 09:53:51','',1,0,0,0,0,24000),(828,32,1,1,'2013-08-21 09:54:29','2013-08-21 09:54:29','',1,0,0,0,0,28000),(829,40,1,1,'2013-08-21 10:00:11','2013-08-21 10:00:11','',1,0,0,0,0,36000),(835,32,1,1,'2013-08-21 11:52:43','2013-08-21 11:52:43','',1,0,0,0,0,26000),(907,40,1,1,'2013-08-21 19:59:03','2013-08-21 19:59:03','',1,0,0,0,0,10000),(908,37,1,1,'2013-08-21 20:01:34','2013-08-21 20:01:34','',1,0,0,0,0,54000),(909,28,1,1,'2013-08-21 20:02:31','2013-08-21 20:02:31','',1,0,0,0,0,20000),(910,36,1,1,'2013-08-21 20:03:04','2013-08-21 20:03:04','',1,0,0,0,0,20000),(911,48,1,1,'2013-08-21 20:15:55','2013-08-21 20:15:55','',1,0,0,0,0,24000),(912,43,1,1,'2013-08-21 20:59:37','2013-08-21 20:59:37','',1,0,0,0,0,34000),(913,36,1,1,'2013-08-21 21:05:11','2013-08-21 21:05:11','',1,0,0,0,0,30000),(914,3,1,1,'2013-08-21 21:23:37','2013-08-21 21:23:37','',1,0,0,0,0,30000),(915,2,1,1,'2013-08-21 21:45:09','2013-08-21 21:45:09','',1,0,0,0,0,7000),(1098,30,1,1,'2013-08-23 13:56:42','2013-08-23 13:56:42','',1,0,0,0,0,10000),(1099,39,1,1,'2013-08-23 13:56:52','2013-08-23 13:56:52','',1,0,0,0,0,30000),(1100,44,1,1,'2013-08-23 14:07:00','2013-08-23 14:07:00','',1,0,0,0,0,24000),(1101,29,1,1,'2013-08-23 14:12:28','2013-08-23 14:12:28','',1,0,0,0,0,47000),(1102,33,1,1,'2013-08-23 14:12:48','2013-08-23 14:12:48','',1,0,0,0,0,40000),(1103,45,1,1,'2013-08-23 14:17:35','2013-08-23 14:17:35','',1,0,0,0,0,55000),(1104,32,1,1,'2013-08-23 14:18:38','2013-08-23 14:18:38','',1,0,0,0,0,20000),(1105,31,1,1,'2013-08-23 14:41:00','2013-08-23 14:41:00','',1,0,0,0,0,46000),(1106,43,1,1,'2013-08-23 14:41:22','2013-08-23 14:41:22','',1,0,0,0,0,25000),(1107,42,1,1,'2013-08-23 14:43:39','2013-08-23 14:43:39','',1,0,0,0,0,10000),(1108,40,1,1,'2013-08-23 14:53:35','2013-08-23 14:53:35','',1,0,0,0,0,20000),(1109,32,1,1,'2013-08-23 15:13:47','2013-08-23 15:13:47','',1,0,0,0,0,50000),(1110,33,1,1,'2013-08-23 15:29:23','2013-08-23 15:29:23','',1,0,0,0,0,20000),(1111,2,1,1,'2013-08-23 15:42:11','2013-08-23 15:42:11','',1,0,0,0,0,21000),(1112,31,1,1,'2013-08-23 15:46:12','2013-08-23 15:46:12','',1,0,0,0,0,14000),(1113,1,1,1,'2013-08-23 16:08:46','2013-08-23 16:08:46','',1,0,0,0,0,25000),(1114,45,1,1,'2013-08-23 16:25:42','2013-08-23 16:25:42','',1,0,0,0,0,12000),(1115,33,1,1,'2013-08-23 16:28:13','2013-08-23 16:28:13','',1,0,0,0,0,10000),(1116,2,1,1,'2013-08-23 16:37:56','2013-08-23 16:37:56','',1,0,0,0,0,24000),(1117,4,1,1,'2013-08-23 16:38:33','2013-08-23 16:38:33','',1,0,0,0,0,32000),(1118,39,1,1,'2013-08-23 16:40:06','2013-08-23 16:40:06','',1,0,0,0,0,24000),(1119,40,1,1,'2013-08-23 16:42:45','2013-08-23 16:42:45','',1,0,0,0,0,52000),(1120,28,1,1,'2013-08-23 16:48:45','2013-08-23 16:48:45','',1,0,0,0,0,10000),(1218,42,1,1,'2013-08-24 14:03:14','2013-08-24 14:03:14','',1,0,0,0,0,20000),(1219,40,1,1,'2013-08-24 14:30:13','2013-08-24 14:30:13','',1,0,0,0,0,29000),(1220,44,1,1,'2013-08-24 14:45:48','2013-08-24 14:45:48','',1,0,0,0,0,10000),(1221,38,1,1,'2013-08-24 14:50:48','2013-08-24 14:50:48','',1,0,0,0,0,45000),(1222,45,1,1,'2013-08-24 14:53:13','2013-08-24 14:53:13','',1,0,0,0,0,35000),(1223,39,1,1,'2013-08-24 15:09:36','2013-08-24 15:09:36','',1,0,0,0,0,20000),(1224,35,1,1,'2013-08-24 15:15:19','2013-08-24 15:15:19','',1,0,0,0,0,10000),(1225,32,1,1,'2013-08-24 16:00:40','2013-08-24 16:00:40','',1,0,0,0,0,10000),(1226,45,1,1,'2013-08-24 16:24:35','2013-08-24 16:24:35','',1,0,0,0,0,10000);
/*!40000 ALTER TABLE `cafedemo2_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_session_detail`
--

DROP TABLE IF EXISTS `cafedemo2_session_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_session_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsession` int(11) NOT NULL,
  `idcourse` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idsession` (`idsession`),
  KEY `idcourse` (`idcourse`),
  CONSTRAINT `cafedemo2_session_detail_1` FOREIGN KEY (`idsession`) REFERENCES `cafedemo2_session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cafedemo2_session_detail_2` FOREIGN KEY (`idcourse`) REFERENCES `cafedemo2_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2788 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_session_detail`
--

LOCK TABLES `cafedemo2_session_detail` WRITE;
/*!40000 ALTER TABLE `cafedemo2_session_detail` DISABLE KEYS */;
INSERT INTO `cafedemo2_session_detail` VALUES (1,1,215,2,12000),(2,1,148,2,10000),(3,2,215,2,12000),(4,2,217,2,14000),(5,3,218,2,13000),(6,3,151,2,14000),(10,6,215,4,12000),(11,8,215,4,12000),(12,8,217,3,14000),(13,10,215,1,12000),(14,10,224,1,12000),(15,10,191,1,0),(16,10,177,2,13000),(17,10,175,1,10000),(18,10,217,1,14000),(19,10,148,3,10000),(82,30,191,1,15),(83,30,187,1,17),(84,31,191,1,15000),(85,31,187,1,17000),(86,31,194,1,17000),(88,34,148,6,10000),(89,35,148,10,10000),(90,35,169,1,10000),(91,36,148,2,10000),(92,37,148,3,10000),(93,38,148,3,10000),(94,39,151,1,14000),(95,40,148,2,10000),(96,40,154,1,20000),(97,41,148,2,10000),(98,42,148,3,10000),(99,43,148,1,10000),(100,44,148,4,10000),(101,45,148,2,10000),(103,34,212,1,14000),(105,48,148,3,10000),(107,50,148,2,10000),(108,48,151,1,14000),(109,39,148,2,10000),(110,50,238,1,7000),(111,51,169,2,10000),(112,52,148,3,10000),(113,53,148,1,10000),(114,54,148,1,10000),(115,55,151,1,14000),(116,56,148,1,10000),(117,57,148,5,10000),(118,58,150,1,13000),(119,58,149,1,9000),(120,51,238,1,7000),(121,59,238,1,7000),(122,59,148,1,10000),(123,60,238,1,7000),(124,61,148,3,10000),(125,62,148,3,10000),(126,63,148,2,10000),(127,39,155,1,20000),(128,39,150,1,13000),(129,39,185,1,14000),(130,57,238,1,7000),(131,64,148,1,10000),(132,65,148,1,10000),(133,66,148,4,10000),(134,39,179,1,15000),(135,67,148,2,10000),(136,68,148,2,10000),(137,69,148,3,10000),(139,60,148,2,10000),(140,70,148,1,10000),(142,47,232,1,15000),(144,71,148,1,10000),(145,61,217,1,14000),(147,72,152,1,20000),(148,71,178,1,14000),(150,65,214,1,11000),(151,65,216,1,11000),(152,73,148,1,10000),(153,67,151,1,14000),(156,75,151,1,14000),(157,75,148,3,10000),(158,75,185,1,14000),(159,75,179,1,15000),(161,74,148,4,10000),(162,74,151,1,14000),(163,76,151,1,14000),(164,76,169,1,10000),(167,79,148,2,10000),(168,79,173,1,10000),(170,81,148,2,10000),(172,79,238,1,7000),(174,83,213,1,12000),(175,80,148,2,10000),(176,84,152,1,20000),(177,84,213,1,12000),(178,85,204,1,11000),(179,85,226,1,15000),(180,85,154,1,20000),(181,86,152,2,20000),(183,88,148,2,10000),(186,87,148,2,10000),(187,89,148,3,10000),(188,84,148,1,10000),(189,90,232,1,15000),(190,90,148,1,10000),(191,91,215,3,12000),(192,91,178,2,14000),(193,92,151,2,14000),(194,92,148,3,10000),(196,91,237,8,2000),(198,94,148,1,10000),(199,95,148,3,10000),(200,78,169,1,10000),(201,96,169,1,10000),(202,96,212,1,14000),(203,96,235,1,35000),(205,97,232,1,15000),(206,97,148,1,10000),(207,97,231,1,16000),(208,98,148,2,10000),(209,93,148,2,10000),(210,93,178,1,14000),(212,91,148,1,10000),(219,98,154,1,20000),(224,98,169,1,10000),(225,98,235,1,35000),(280,46,148,1,10000),(281,46,238,1,7000),(994,495,178,2,14000),(995,496,148,4,10000),(998,497,217,3,14000),(999,497,151,1,14000),(1000,497,148,2,10000),(1001,498,225,2,10000),(1002,499,148,1,10000),(1003,499,169,1,10000),(1006,498,215,2,12000),(1202,595,148,2,10000),(1203,596,148,1,10000),(1207,596,238,1,7000),(1237,616,148,2,10000),(1238,617,148,1,10000),(1241,619,232,1,15000),(1253,625,175,1,10000),(1254,625,208,1,16000),(1255,625,148,1,10000),(1258,626,217,1,14000),(1259,626,151,2,14000),(1265,626,148,1,10000),(1364,679,148,2,10000),(1365,680,148,1,10000),(1366,681,148,1,10000),(1367,681,151,1,14000),(1368,682,148,1,10000),(1369,683,151,1,14000),(1370,683,226,1,15000),(1371,684,148,2,10000),(1372,686,148,5,10000),(1373,687,148,1,10000),(1374,687,149,1,9000),(1375,687,151,1,14000),(1376,688,148,2,10000),(1377,689,148,2,10000),(1378,690,231,1,16000),(1379,690,153,1,20000),(1380,691,148,2,10000),(1381,691,235,1,35000),(1382,692,148,3,10000),(1383,693,169,1,10000),(1384,694,148,3,10000),(1385,693,178,1,14000),(1386,695,148,2,10000),(1388,697,150,1,13000),(1389,698,148,1,10000),(1390,699,151,1,14000),(1391,699,190,1,15000),(1392,698,235,1,35000),(1393,700,217,1,14000),(1394,696,148,2,10000),(1395,701,148,2,10000),(1396,702,169,2,10000),(1397,702,225,1,10000),(1398,703,148,1,10000),(1399,704,152,1,20000),(1400,704,207,1,16000),(1401,701,170,1,9000),(1402,705,148,2,10000),(1403,706,176,1,14000),(1404,706,152,1,20000),(1405,707,148,3,10000),(1406,708,148,4,10000),(1407,693,148,2,10000),(1408,706,169,1,10000),(1409,709,217,2,14000),(1410,695,176,1,14000),(1411,710,148,1,10000),(1412,706,151,1,14000),(1413,701,151,1,14000),(1414,711,148,1,10000),(1415,705,151,1,14000),(1416,712,148,2,10000),(1417,713,190,1,15000),(1418,713,232,1,15000),(1420,705,238,1,7000),(1421,704,151,1,14000),(1422,714,195,1,12000),(1423,715,148,2,10000),(1424,685,232,1,15000),(1425,685,189,1,14000),(1426,685,207,2,16000),(1427,685,236,1,25000),(1430,713,148,2,10000),(1433,718,151,1,14000),(1434,718,232,1,15000),(1435,719,206,1,14000),(1436,720,148,1,10000),(1437,708,238,1,7000),(1438,721,148,2,10000),(1439,717,148,1,10000),(1440,722,148,1,10000),(1441,710,232,1,15000),(1442,723,148,3,10000),(1443,722,169,1,10000),(1444,685,184,1,10000),(1445,724,169,1,10000),(1446,724,219,1,12000),(1447,710,238,1,7000),(1448,725,148,1,10000),(1462,721,151,1,14000),(1469,737,148,4,10000),(1470,738,148,1,10000),(1471,739,152,1,20000),(1472,740,148,1,10000),(1473,740,178,2,14000),(1474,741,148,1,10000),(1475,742,151,2,14000),(1476,743,215,1,12000),(1477,743,178,1,14000),(1478,742,238,1,7000),(1479,744,231,1,16000),(1480,744,179,1,15000),(1632,819,148,3,10000),(1633,819,179,1,15000),(1634,819,169,1,10000),(1635,820,148,1,10000),(1636,820,232,1,15000),(1638,821,148,1,10000),(1639,821,151,1,14000),(1640,822,224,1,12000),(1641,823,172,1,9000),(1642,824,232,4,15000),(1643,825,148,2,10000),(1644,826,148,2,10000),(1645,822,148,3,10000),(1646,827,148,1,10000),(1647,827,151,1,14000),(1648,828,151,2,14000),(1649,829,148,1,10000),(1650,823,148,1,10000),(1651,829,178,1,14000),(1652,829,224,1,12000),(1661,835,151,1,14000),(1662,835,219,1,12000),(1807,907,148,1,10000),(1808,908,155,1,20000),(1809,908,148,2,10000),(1810,909,173,1,10000),(1811,909,148,1,10000),(1812,910,169,2,10000),(1813,908,185,1,14000),(1814,911,178,1,14000),(1815,911,169,1,10000),(1820,912,148,2,10000),(1821,913,148,1,10000),(1822,913,152,1,20000),(1823,912,185,1,14000),(1824,914,155,1,20000),(1825,914,148,1,10000),(1826,915,238,1,7000),(2163,1098,148,1,10000),(2164,1099,148,3,10000),(2165,1100,148,1,10000),(2166,1100,151,1,14000),(2167,1101,179,2,15000),(2168,1102,152,1,20000),(2169,1102,153,1,20000),(2170,1103,148,2,10000),(2171,1104,148,2,10000),(2172,1103,235,1,35000),(2173,1101,148,1,10000),(2174,1101,238,1,7000),(2175,1105,151,1,14000),(2176,1105,153,1,20000),(2177,1106,190,1,15000),(2178,1106,148,1,10000),(2179,1107,148,1,10000),(2180,1108,169,1,10000),(2181,1105,195,1,12000),(2182,1108,148,1,10000),(2183,1109,148,5,10000),(2184,1110,148,2,10000),(2185,1111,213,1,12000),(2186,1112,151,1,14000),(2187,1111,223,1,9000),(2188,1113,149,1,9000),(2189,1113,193,1,16000),(2190,1114,219,1,12000),(2191,1115,148,1,10000),(2192,1116,151,1,14000),(2193,1116,148,1,10000),(2194,1117,238,1,7000),(2195,1117,232,1,15000),(2196,1117,148,1,10000),(2197,1118,226,1,15000),(2198,1118,170,1,9000),(2199,1119,166,1,27000),(2200,1119,232,1,15000),(2201,1120,173,1,10000),(2202,1119,148,1,10000),(2380,1218,148,2,10000),(2381,1219,170,1,9000),(2382,1220,148,1,10000),(2383,1221,204,1,11000),(2384,1221,148,1,10000),(2385,1221,184,1,10000),(2386,1221,151,1,14000),(2387,1222,226,1,15000),(2388,1222,148,2,10000),(2389,1223,184,1,10000),(2390,1223,148,1,10000),(2391,1224,148,1,10000),(2392,1225,148,1,10000),(2393,1226,148,1,10000),(2394,1219,148,2,10000);
/*!40000 ALTER TABLE `cafedemo2_session_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_store`
--

DROP TABLE IF EXISTS `cafedemo2_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_store`
--

LOCK TABLES `cafedemo2_store` WRITE;
/*!40000 ALTER TABLE `cafedemo2_store` DISABLE KEYS */;
INSERT INTO `cafedemo2_store` VALUES (1,'Kho nhà','Ghi chú gì đây ?');
/*!40000 ALTER TABLE `cafedemo2_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_supplier`
--

DROP TABLE IF EXISTS `cafedemo2_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_supplier` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `debt` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_supplier`
--

LOCK TABLES `cafedemo2_supplier` WRITE;
/*!40000 ALTER TABLE `cafedemo2_supplier` DISABLE KEYS */;
INSERT INTO `cafedemo2_supplier` VALUES (1,'Nhà máy Nước Đá ...','0703 ....','Phường 5','Cung cấp nước đá',0),(6,'Coop Mart','070','Vĩnh Long','Cung cấp mọi thứ',0),(9,'KHÁC','','','',0);
/*!40000 ALTER TABLE `cafedemo2_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_table`
--

DROP TABLE IF EXISTS `cafedemo2_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddomain` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iddomain` (`iddomain`),
  CONSTRAINT `cafedemo2_table_1` FOREIGN KEY (`iddomain`) REFERENCES `cafedemo2_domain` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_table`
--

LOCK TABLES `cafedemo2_table` WRITE;
/*!40000 ALTER TABLE `cafedemo2_table` DISABLE KEYS */;
INSERT INTO `cafedemo2_table` VALUES (1,1,'Bàn 18',0,'0'),(2,1,'Bàn 19',0,'0'),(3,1,'Bàn 20',0,'0'),(4,1,'Bàn 21',0,'0'),(28,1,'Bàn 22',1,'0'),(29,2,'Bàn 01',1,'0'),(30,2,'Bàn 02',1,'0'),(31,2,'Bàn 03',1,'0'),(32,2,'Bàn 04',1,'0'),(33,2,'Bàn 05',1,'0'),(34,2,'Bàn 06',1,'0'),(35,2,'Bàn 07',1,'0'),(36,2,'Bàn 08',1,'0'),(37,2,'Bàn 09',1,'0'),(38,2,'Bàn 10',1,'0'),(39,2,'Bàn 11',1,'0'),(40,2,'Bàn 12',1,'0'),(41,2,'Bàn 13',1,'0'),(42,2,'Bàn 14',1,'0'),(43,2,'Bàn 15',1,'0'),(44,2,'Bàn 16',1,'0'),(45,2,'Bàn 17',1,'0'),(46,2,'Bàn 18',1,'0'),(47,2,'Bàn 19',1,'0'),(48,2,'Bàn 20',1,'0'),(49,4,'1',1,'0'),(50,4,'2',1,'0'),(51,4,'3',1,'0'),(52,4,'4',1,'0'),(53,4,'5',1,'0'),(54,4,'6',1,'0'),(55,4,'7',1,'0'),(56,4,'8',1,'0'),(57,4,'9',1,'0'),(58,4,'10',1,'0'),(59,2,'Bàn 21',1,'0');
/*!40000 ALTER TABLE `cafedemo2_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_term`
--

DROP TABLE IF EXISTS `cafedemo2_term`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_term`
--

LOCK TABLES `cafedemo2_term` WRITE;
/*!40000 ALTER TABLE `cafedemo2_term` DISABLE KEYS */;
INSERT INTO `cafedemo2_term` VALUES (1,'Tiền Điện',0),(2,'Tiền Nước',0),(3,'Thuế',0),(4,'Lương Nhân Viên',0),(10,'Tiền Ăn Nhân Viên',0),(12,'Tiền Phụ Cấp',0);
/*!40000 ALTER TABLE `cafedemo2_term` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_term_collect`
--

DROP TABLE IF EXISTS `cafedemo2_term_collect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_term_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_term_collect`
--

LOCK TABLES `cafedemo2_term_collect` WRITE;
/*!40000 ALTER TABLE `cafedemo2_term_collect` DISABLE KEYS */;
INSERT INTO `cafedemo2_term_collect` VALUES (2,'Phụ Phẩm'),(3,'Đặc Biệt');
/*!40000 ALTER TABLE `cafedemo2_term_collect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_tracking`
--

DROP TABLE IF EXISTS `cafedemo2_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_tracking`
--

LOCK TABLES `cafedemo2_tracking` WRITE;
/*!40000 ALTER TABLE `cafedemo2_tracking` DISABLE KEYS */;
INSERT INTO `cafedemo2_tracking` VALUES (1,'2013-08-01','2013-08-31'),(2,'2013-09-01','2013-09-30'),(3,'2013-10-01','2013-10-31'),(4,'2013-11-01','2013-11-30'),(5,'2013-12-01','2013-12-31');
/*!40000 ALTER TABLE `cafedemo2_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_unit`
--

DROP TABLE IF EXISTS `cafedemo2_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_unit` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_unit`
--

LOCK TABLES `cafedemo2_unit` WRITE;
/*!40000 ALTER TABLE `cafedemo2_unit` DISABLE KEYS */;
INSERT INTO `cafedemo2_unit` VALUES (1,'Ly'),(2,'Điếu'),(3,'Chai'),(4,'Lon'),(5,'Dĩa'),(6,'Thùng'),(7,'Két'),(9,'Bịch'),(10,'Gói'),(11,'Cái'),(12,'Cây'),(13,'Giờ'),(14,'Bao'),(15,'Con'),(16,'Kg'),(17,'Hộp'),(18,'Hủ'),(19,'Trái');
/*!40000 ALTER TABLE `cafedemo2_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo2_user`
--

DROP TABLE IF EXISTS `cafedemo2_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo2_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo2_user`
--

LOCK TABLES `cafedemo2_user` WRITE;
/*!40000 ALTER TABLE `cafedemo2_user` DISABLE KEYS */;
INSERT INTO `cafedemo2_user` VALUES (1,'Quản lý','quanly@gmail.com','123456',0,' Người quản lý hệ thống','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',4,''),(9,'Nhân viên','nhavien@gmail.com','123456',1,'Nhân viên Thu Ngân','2013-08-13 19:31:11','2013-08-13 19:31:11','2013-08-13 19:31:11',1,'');
/*!40000 ALTER TABLE `cafedemo2_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_app`
--

DROP TABLE IF EXISTS `cafedemo_app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_app` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_app`
--

LOCK TABLES `cafedemo_app` WRITE;
/*!40000 ALTER TABLE `cafedemo_app` DISABLE KEYS */;
INSERT INTO `cafedemo_app` VALUES (1,'SPN Cafe Demo 01','0909 000 000','Phường 5 Thành Phố Vĩnh Long','tuanbuithanh@gmail.com','data/images/banner/logo.png','cafedemo_','cafedemo_','2012-06-30 10:00:00','0000-00-00 00:00:00','2012-12-26 00:28:02',0,0);
/*!40000 ALTER TABLE `cafedemo_app` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_category`
--

DROP TABLE IF EXISTS `cafedemo_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_category` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` binary(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_category`
--

LOCK TABLES `cafedemo_category` WRITE;
/*!40000 ALTER TABLE `cafedemo_category` DISABLE KEYS */;
INSERT INTO `cafedemo_category` VALUES (13,'Cafe',NULL),(14,'Sinh tố',NULL),(15,'Nước ép',NULL),(16,'Kem',NULL),(17,'Yaoua',NULL),(18,'Nước uống đóng chai',NULL),(19,'Nước chế biến',NULL),(20,'Trà',NULL),(21,'Sữa',NULL),(22,'Ca cao',NULL),(23,'Chanh',NULL),(24,'Thuốc lá',NULL),(25,'C2',NULL),(27,'xiro sua',NULL);
/*!40000 ALTER TABLE `cafedemo_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_collect_customer`
--

DROP TABLE IF EXISTS `cafedemo_collect_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_collect_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo_customer_collect_1` (`idcustomer`),
  CONSTRAINT `cafedemo_customer_collect_1` FOREIGN KEY (`idcustomer`) REFERENCES `cafedemo_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_collect_customer`
--

LOCK TABLES `cafedemo_collect_customer` WRITE;
/*!40000 ALTER TABLE `cafedemo_collect_customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `cafedemo_collect_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_collect_general`
--

DROP TABLE IF EXISTS `cafedemo_collect_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_collect_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_term` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo_collect_1` (`id_term`),
  CONSTRAINT `cafedemo_collect_general_1` FOREIGN KEY (`id_term`) REFERENCES `cafedemo_term_collect` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_collect_general`
--

LOCK TABLES `cafedemo_collect_general` WRITE;
/*!40000 ALTER TABLE `cafedemo_collect_general` DISABLE KEYS */;
INSERT INTO `cafedemo_collect_general` VALUES (5,2,'2013-05-18',10,'d');
/*!40000 ALTER TABLE `cafedemo_collect_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_config`
--

DROP TABLE IF EXISTS `cafedemo_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `param` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_config`
--

LOCK TABLES `cafedemo_config` WRITE;
/*!40000 ALTER TABLE `cafedemo_config` DISABLE KEYS */;
INSERT INTO `cafedemo_config` VALUES (1,'ROW_PER_PAGE','12'),(5,'DISCOUNT','0');
/*!40000 ALTER TABLE `cafedemo_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_course`
--

DROP TABLE IF EXISTS `cafedemo_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_course` (
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
  KEY `foreign_field` (`idcategory`),
  CONSTRAINT `cafedemo_course_1` FOREIGN KEY (`idcategory`) REFERENCES `cafedemo_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_course`
--

LOCK TABLES `cafedemo_course` WRITE;
/*!40000 ALTER TABLE `cafedemo_course` DISABLE KEYS */;
INSERT INTO `cafedemo_course` VALUES (148,13,'Cafe đá','','Ly',10000,0,0,0,''),(149,13,'Cafe đen','','Ly',9000,0,0,0,''),(150,13,'Cafe sữa nóng','','Ly',13000,0,0,0,''),(151,13,'Cafe sữa đá','','Ly',14000,0,0,0,''),(152,14,'Sinh tố bơ','','Ly',20000,0,0,0,''),(153,14,'Sinh tố Sapô','','Ly',20000,0,0,0,''),(154,14,'Sinh tố mãng cầu','','Ly',20000,0,0,0,''),(155,14,'Sinh tố cà chua','','Ly',20000,0,0,0,''),(156,14,'Sinh tố cà rốt','','Ly',20000,0,0,0,''),(157,14,'Sinh tố thơm','','Ly',20000,0,0,0,''),(158,14,'Sinh tố cam','','Ly',20000,0,0,0,''),(159,14,'Sinh tố chanh tuyết','','Ly',20000,0,0,0,''),(160,14,'Sinh tố dâu','','Ly',20000,0,0,0,''),(161,14,'Sinh tố thập cẩm','','Ly',20000,0,0,0,''),(162,16,'Kem sôcôla','','Ly',25000,0,0,0,''),(163,16,'Kem dâu tây','','Ly',25000,0,0,0,''),(164,16,'Kem cafe ','','Ly',27000,0,0,0,''),(165,16,'Kem sầu riêng','','Ly',25000,0,0,0,''),(166,16,'Kem trái cây','','Ly',27000,0,0,0,''),(167,16,'Kem thập cẩm','','Ly',27000,0,0,0,''),(168,16,'Kem 3 màu','','Ly',25000,0,0,0,''),(169,20,'Trà lipton đá','','Ly',10000,0,0,0,''),(170,20,'Trà lipton nóng','','Ly',9000,0,0,0,''),(171,20,'Trà lipton mật ong','','Ly',14000,0,0,0,''),(172,20,'Trà đường nóng','Trà đường nóng','Ly',9000,0,0,0,''),(173,20,'Trà đường đá','','Ly',10000,0,0,0,''),(174,20,'Trà chanh nóng','','Ly',9000,0,0,0,''),(175,20,'Trà chanh đá','','Ly',10000,0,0,0,''),(176,20,'Lipton sữa đá','','Ly',14000,0,0,0,''),(177,20,'Lipton sữa nóng','','Ly',13000,0,0,0,''),(178,17,'Yaoua sữa đá','','Ly',14000,0,0,0,''),(179,17,'Yaoua trái cây','','Ly',15000,0,0,0,''),(180,17,'Yaoua dâu','','Ly',15000,0,0,0,''),(181,17,'Yaoua mơ','','Ly',15000,0,0,0,''),(182,17,'Yaoua mứt','','Ly',15000,0,0,0,''),(183,17,'Yaoua cam','','Ly',15000,0,0,0,''),(184,17,'Yaoua hủ','Yaoua hủ','Hủ',10000,0,0,0,''),(185,18,'Sting dâu','Sting dâu','Chai',14000,0,0,0,''),(186,18,'Đậu nành','Đậu nành','Chai',12000,0,0,0,''),(187,18,'Bò húc','Bò húc','Chai',17000,0,0,0,''),(188,18,'Number one','Number one','Chai',16000,0,0,0,''),(189,18,'Sá xị','Sá xị','Chai',14000,0,0,0,''),(190,18,'Pepsi ','Pepsi ','Chai',15000,0,0,0,''),(191,18,'7 up','7 up','Chai',15000,0,0,0,''),(192,18,'Trà xanh','Trà xanh','Chai',15000,0,0,0,''),(193,18,'Dr.Thanh','Dr.Thanh','Chai',16000,0,0,0,''),(194,18,'Cam lon','Cam lon','Lon',17000,0,0,0,''),(195,18,'Nước suối','Nước suối','Chai',12000,0,0,0,''),(196,15,'Nước ép dâu','','Ly',20000,0,0,0,''),(197,15,'Nước ép kê','','Ly',20000,0,0,0,''),(198,15,'Nước ép táo','','Ly',20000,0,0,0,''),(199,15,'Nước ép cà chua','','Ly',20000,0,0,0,''),(200,15,'Nước ép cà rốt','','Ly',20000,0,0,0,''),(201,15,'Nước ép cam','','Ly',20000,0,0,0,''),(202,19,'Đá me','','Ly',10000,0,0,0,''),(203,19,'Tắc xí muội','','Ly',11000,0,0,0,''),(204,19,'Xí muội đá','','Ly',11000,0,0,0,''),(205,19,'Xí muội nóng','','Ly',10000,0,0,0,''),(206,19,'Rau má thường','Rau má thường','Ly',14000,0,0,0,''),(207,19,'Rau má dừa','Rau má dừa','Ly',16000,0,0,0,''),(208,19,'Rau má sữa','Rau má sữa','Ly',16000,0,0,0,''),(209,19,'Xirô dâu','','Ly',12000,0,0,0,''),(210,19,'Xirô sữa','','Ly',14000,0,0,0,''),(211,21,'Sữa quế','','Ly',14000,0,0,0,''),(212,21,'Sữa đá','','Ly',14000,0,0,0,''),(213,21,'Sữa tươi đá','','Ly',12000,0,0,0,''),(214,21,'Sữa tươi không đá','Sữa tươi không đá','Ly',11000,0,0,0,''),(215,22,'Ca cao đá','','Ly',12000,0,0,0,''),(216,22,'Ca cao nóng','Ca cao nóng','Ly',11000,0,0,0,''),(217,22,'Ca cao sữa đá','','Ly',14000,0,0,0,''),(218,22,'Ca cao sữa nóng','','Ly',13000,0,0,0,''),(219,19,'Đá me sữa ','','Ly',12000,0,0,0,''),(220,23,'Chanh tươi nóng','','Ly',9000,0,0,0,''),(222,23,'Chanh muối đá','','Ly',10000,0,0,0,''),(223,23,'Chanh muối nóng','','Ly',9000,0,0,0,''),(224,23,'Chanh dây','','Ly',12000,0,0,0,''),(225,23,'Chanh tươi đá','','Ly',10000,0,0,0,''),(226,15,'Cam vắt đá','','Ly',15000,0,0,0,''),(227,15,'Cam vắt không đá','','Ly',14000,0,0,0,''),(228,15,'Cam sữa','','Ly',17000,0,0,0,''),(229,15,'Cam mật ong','','Ly',17000,0,0,0,''),(230,18,'Khăn lạnh','Khăn lạnh','Cái',2000,0,0,0,''),(231,19,'Dừa đá','','Ly',16000,0,0,0,''),(232,19,'Dừa lạnh','','Trái',15000,0,0,0,''),(234,15,'Nước ép thập cẩm','','Ly',22000,0,0,0,''),(235,24,'555','555','Gói',35000,0,0,0,''),(236,24,'Mèo','Mèo','Gói',25000,0,0,0,''),(237,24,'555 (điếu)','','Điếu',2000,0,0,0,''),(238,24,'Mèo tép','','Bao',7000,0,0,0,''),(239,24,'Mèo (điếu)','','Điếu',1500,0,0,0,''),(240,21,'bac xiu nong','','Ly',13000,0,0,0,''),(241,21,'bac xiu đa','','Ly',14000,0,0,0,''),(242,21,'sua nong','','Ly',12000,0,0,0,''),(243,25,'','','Bao',14000,0,0,0,''),(244,27,'sam dua sua','sam dua sua','Ly',14000,0,0,0,'');
/*!40000 ALTER TABLE `cafedemo_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_customer`
--

DROP TABLE IF EXISTS `cafedemo_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_customer` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `card` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_customer`
--

LOCK TABLES `cafedemo_customer` WRITE;
/*!40000 ALTER TABLE `cafedemo_customer` DISABLE KEYS */;
INSERT INTO `cafedemo_customer` VALUES (1,'Khách Hàng Vãng Lai',0,'893970784300','0945030709','','',0);
/*!40000 ALTER TABLE `cafedemo_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_domain`
--

DROP TABLE IF EXISTS `cafedemo_domain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_domain`
--

LOCK TABLES `cafedemo_domain` WRITE;
/*!40000 ALTER TABLE `cafedemo_domain` DISABLE KEYS */;
INSERT INTO `cafedemo_domain` VALUES (1,'Khu Vực A'),(2,'Khu Vực B'),(4,'Khác');
/*!40000 ALTER TABLE `cafedemo_domain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_employee`
--

DROP TABLE IF EXISTS `cafedemo_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_employee`
--

LOCK TABLES `cafedemo_employee` WRITE;
/*!40000 ALTER TABLE `cafedemo_employee` DISABLE KEYS */;
INSERT INTO `cafedemo_employee` VALUES (1,'Phan Văn A',1,'0908 000000','Đồng Tháp'),(2,'Lê Thanh B',0,'093464 646','TP Vĩnh Long');
/*!40000 ALTER TABLE `cafedemo_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_order_import`
--

DROP TABLE IF EXISTS `cafedemo_order_import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_order_import` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo_order_import_1` (`idsupplier`),
  CONSTRAINT `cafedemo_order_import_1` FOREIGN KEY (`idsupplier`) REFERENCES `cafedemo_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_order_import`
--

LOCK TABLES `cafedemo_order_import` WRITE;
/*!40000 ALTER TABLE `cafedemo_order_import` DISABLE KEYS */;
INSERT INTO `cafedemo_order_import` VALUES (7,9,'2013-04-07',''),(18,9,'2013-04-05',''),(19,9,'2013-04-09',''),(20,1,'2013-04-10',''),(23,1,'2013-04-12',''),(24,9,'2013-04-12',''),(28,1,'2013-04-13',''),(30,6,'2013-04-13',''),(33,6,'2013-04-02',''),(35,6,'2013-04-06',''),(36,6,'2013-04-07',''),(37,6,'2013-04-12',''),(38,6,'2013-04-14',''),(40,1,'2013-04-15',''),(46,6,'2013-03-31',''),(48,9,'2013-03-31',''),(50,1,'2013-04-17',''),(53,9,'2013-04-20',''),(55,1,'2013-04-21',''),(61,9,'2013-04-23',''),(67,6,'2013-04-24',''),(71,6,'2013-04-28',''),(76,9,'2013-04-29','Đậu nành sấy: 100 bich x 4000đ'),(78,1,'2013-04-22',''),(79,1,'2013-04-25',''),(80,1,'2013-04-27',''),(82,1,'2013-05-01',''),(83,6,'2013-05-01',''),(84,9,'2013-05-03',''),(88,1,'2013-05-05',''),(89,1,'2013-05-06',''),(91,6,'2013-05-06',''),(93,6,'2013-05-07',''),(94,1,'2013-05-07',''),(97,9,'2013-05-06',''),(99,1,'2013-05-10',''),(101,1,'2013-05-11',''),(105,9,'2013-05-11',''),(107,1,'2013-05-13',''),(112,1,'2013-05-19',''),(115,6,'2013-05-19',''),(117,6,'2013-03-28','Tồn kho tính đến ngày 28/03'),(118,9,'2013-03-28','Tồn khó tính đến ngày 28/03\r\n'),(121,6,'2013-05-16',''),(123,6,'2013-05-20','');
/*!40000 ALTER TABLE `cafedemo_order_import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_order_import_detail`
--

DROP TABLE IF EXISTS `cafedemo_order_import_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_order_import_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idorder` int(11) NOT NULL,
  `idresource` int(11) NOT NULL,
  `count` float NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo_order_import_detail_1` (`idorder`),
  KEY `cafedemo_order_import_detail_2` (`idresource`),
  CONSTRAINT `cafedemo_order_import_detail_1` FOREIGN KEY (`idorder`) REFERENCES `cafedemo_order_import` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cafedemo_order_import_detail_2` FOREIGN KEY (`idresource`) REFERENCES `cafedemo_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_order_import_detail`
--

LOCK TABLES `cafedemo_order_import_detail` WRITE;
/*!40000 ALTER TABLE `cafedemo_order_import_detail` DISABLE KEYS */;
INSERT INTO `cafedemo_order_import_detail` VALUES (2,7,44,100,3000),(23,18,59,9,26667),(24,18,58,1,0),(25,19,39,10,16500),(26,19,40,10,23500),(27,20,2,5,16000),(35,23,2,5,16000),(36,24,59,10,27500),(38,28,2,5,16000),(42,30,27,10,17500),(46,33,27,5,19000),(47,35,27,10,17500),(48,36,28,20,2500),(49,37,28,20,2500),(50,24,61,200,550),(51,38,28,20,2500),(55,40,2,5,16000),(66,46,27,2,0),(67,46,28,23,0),(68,46,29,29,0),(69,46,30,25,0),(70,46,31,25,0),(71,46,32,130,0),(84,46,17,59,0),(85,48,59,8,0),(86,48,39,11,0),(87,48,40,6,0),(88,48,35,377,0),(90,50,2,5,16000),(94,53,61,500,538),(95,53,39,20,16700),(99,55,2,5,16000),(105,61,44,50,3000),(106,61,59,33,27273),(107,67,31,10,17700),(108,67,30,10,16800),(117,71,27,10,17500),(124,78,2,3,16000),(125,79,2,6,16000),(126,80,2,3,16000),(130,82,2,5,16000),(131,83,28,20,2500),(132,84,43,40,1700),(133,84,65,20,15400),(134,84,40,20,23000),(135,84,39,30,17100),(140,88,2,4,16000),(142,89,2,4,16000),(144,91,31,10,19500),(145,91,30,10,16800),(148,93,27,10,17500),(149,94,2,3,16000),(152,97,61,6,26900),(157,99,2,3,16000),(159,101,2,3,16000),(162,105,44,48,3000),(165,107,2,3,16000),(168,112,2,5,16000),(172,115,27,10,17500),(188,117,17,59,0),(189,117,30,25,15500),(190,117,31,25,19500),(191,117,29,29,0),(192,117,27,2,0),(193,117,32,130,0),(194,117,28,23,0),(197,118,35,377,0),(198,118,39,1.1,165000),(199,118,40,0.6,235000),(200,118,58,8,0),(201,118,65,0.4,155000),(203,121,28,20,2500),(206,123,29,10,10500),(207,123,30,10,18500),(208,123,31,10,20500);
/*!40000 ALTER TABLE `cafedemo_order_import_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_paid_customer`
--

DROP TABLE IF EXISTS `cafedemo_paid_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_paid_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcustomer` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo_customer_paid_1` (`idcustomer`),
  CONSTRAINT `cafedemo_customer_paid_1` FOREIGN KEY (`idcustomer`) REFERENCES `cafedemo_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_paid_customer`
--

LOCK TABLES `cafedemo_paid_customer` WRITE;
/*!40000 ALTER TABLE `cafedemo_paid_customer` DISABLE KEYS */;
INSERT INTO `cafedemo_paid_customer` VALUES (18,1,'2013-05-16',1,'');
/*!40000 ALTER TABLE `cafedemo_paid_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_paid_general`
--

DROP TABLE IF EXISTS `cafedemo_paid_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_paid_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_term` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo_paid_1` (`id_term`),
  CONSTRAINT `cafedemo_paid_general_1` FOREIGN KEY (`id_term`) REFERENCES `cafedemo_term` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_paid_general`
--

LOCK TABLES `cafedemo_paid_general` WRITE;
/*!40000 ALTER TABLE `cafedemo_paid_general` DISABLE KEYS */;
INSERT INTO `cafedemo_paid_general` VALUES (9,10,'2013-04-01',157000,'Chi tiền chợ'),(10,10,'2013-04-02',146000,'Tiền chợ'),(11,10,'2013-04-03',189000,'Tiền chợ'),(12,10,'2013-04-04',184000,'Tiền chợ'),(13,10,'2013-04-05',173000,'Tiền chợ'),(14,10,'2013-04-06',213000,'Tiền chợ'),(15,10,'2013-04-07',123000,'Tiền chợ'),(16,10,'2013-04-08',224000,'Tiền chợ'),(17,10,'2013-04-09',200000,'Tiền chợ'),(23,10,'2013-04-10',102000,'Tiền chợ'),(25,10,'2013-04-11',106000,'Tiền chợ'),(27,10,'2013-04-13',163000,'Tiền chợ'),(33,10,'2013-04-14',221000,'Tiền chợ'),(34,10,'2013-04-15',122000,'Tiền chợ'),(35,10,'2013-04-17',222000,'Tiền chợ'),(36,10,'2013-04-18',118000,'Tiền chợ'),(38,10,'2013-04-19',122000,'Tiền chợ'),(39,10,'2013-04-20',134000,'Tiền chợ\r\n'),(42,10,'2013-04-22',120000,'Tiền chợ\r\n'),(43,1,'2013-04-20',649000,'Tiền điện sinh hoạt'),(45,10,'2013-04-23',97000,'Tiền chợ'),(47,10,'2013-04-24',65000,'Tiền chợ'),(49,10,'2013-04-25',177000,'Tiền chợ'),(51,10,'2013-04-26',100000,'Tiền chợ'),(52,10,'2013-04-27',102000,'Tiền chợ'),(54,10,'2013-04-28',103000,'Tiền chợ'),(55,10,'2013-04-29',126000,'Tiền chợ'),(57,10,'2013-05-01',95000,'Tiền chợ'),(59,10,'2013-05-03',183000,'Tiền chợ'),(60,10,'2013-05-02',62000,'Tiền chợ'),(61,10,'2013-05-04',85000,'Tiền chợ'),(62,10,'2013-05-05',89000,'Tiền chợ\r\n'),(63,10,'2013-05-06',32000,'Tiền chợ'),(64,4,'2013-04-30',10500000,'Lương NV chưa tính phụ cấp'),(65,1,'2013-04-30',6000000,''),(66,2,'2013-04-30',1500000,'Tạm tính'),(67,10,'2013-05-07',211000,'Tiền chợ\r\n'),(70,10,'2013-05-08',115000,'Tiền chợ'),(71,10,'2013-05-09',117000,'Tiền chợ'),(73,10,'2013-05-10',81000,'Tiền chợ'),(74,10,'2013-05-11',99000,'Tiền chợ\r\n'),(75,10,'2013-05-12',330000,'Tiền chợ'),(76,10,'2013-05-13',85000,'Tiền chợ\r\n'),(77,10,'2013-05-14',74500,'Tiền chợ'),(79,3,'2013-04-30',5600000,'Thuế TTĐB'),(80,12,'2013-04-30',3250000,'chi tiền đầu chai cho NV'),(81,10,'2013-05-15',221000,''),(82,10,'2013-05-16',106000,''),(83,10,'2013-05-17',129000,''),(85,10,'2013-05-18',99000,''),(86,10,'2013-05-19',85000,''),(88,10,'2013-05-20',40000,'');
/*!40000 ALTER TABLE `cafedemo_paid_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_paid_supplier`
--

DROP TABLE IF EXISTS `cafedemo_paid_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_paid_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `note` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo_supplier_paid_1` (`idsupplier`),
  CONSTRAINT `cafedemo_supplier_paid_1` FOREIGN KEY (`idsupplier`) REFERENCES `cafedemo_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_paid_supplier`
--

LOCK TABLES `cafedemo_paid_supplier` WRITE;
/*!40000 ALTER TABLE `cafedemo_paid_supplier` DISABLE KEYS */;
INSERT INTO `cafedemo_paid_supplier` VALUES (1,1,'2012-08-01',2300000,'được không ?'),(2,1,'2012-07-03',350000,'Ghi chú gì đây'),(3,1,'2012-07-26',750000,'Ghi ghi gì gì đó'),(8,6,'2012-09-19',1000000,'Thử nè được không đó !'),(9,1,'2012-09-19',1000000,'lung tung quá đi'),(11,1,'2012-01-01',123,'sdfdsfggf'),(12,1,'2012-09-24',1230000,'đâu biết'),(13,1,'2012-09-24',1213232,''),(14,1,'2012-09-24',34243243,''),(15,1,'2012-09-24',21323,''),(16,1,'2012-09-24',123323,''),(17,1,'2012-09-24',21323,'');
/*!40000 ALTER TABLE `cafedemo_paid_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_r2c`
--

DROP TABLE IF EXISTS `cafedemo_r2c`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_r2c` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_course` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `value1` double NOT NULL,
  `value2` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo_r2c_1` (`id_course`),
  KEY `cafedemo_r2c_2` (`id_resource`),
  CONSTRAINT `cafedemo_r2c_1` FOREIGN KEY (`id_course`) REFERENCES `cafedemo_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cafedemo_r2c_2` FOREIGN KEY (`id_resource`) REFERENCES `cafedemo_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_r2c`
--

LOCK TABLES `cafedemo_r2c` WRITE;
/*!40000 ALTER TABLE `cafedemo_r2c` DISABLE KEYS */;
/*!40000 ALTER TABLE `cafedemo_r2c` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_resource`
--

DROP TABLE IF EXISTS `cafedemo_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_resource` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `idsupplier` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cafedemo_resource_1` (`idsupplier`),
  CONSTRAINT `cafedemo_resource_1` FOREIGN KEY (`idsupplier`) REFERENCES `cafedemo_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_resource`
--

LOCK TABLES `cafedemo_resource` WRITE;
/*!40000 ALTER TABLE `cafedemo_resource` DISABLE KEYS */;
INSERT INTO `cafedemo_resource` VALUES (1,1,'Nước đá ống','Kg',0,'Nước đá dùng để uống trà, cafe'),(2,1,'Nước đá ướp','Cây',0,'Dùng để ướp lạnh'),(3,1,'Nước đá viên','Kg',0,'Viên cưa dùng uống bia'),(14,1,'Nước đá tủ lạnh','Gói',0,'Nước đá lấy từ tủ lạnh nhà'),(17,6,'Bánh','Bịch',0,''),(27,6,'Xúc Xích','Bịch',0,''),(28,6,'CW DOUBLEMINT','Hộp',0,''),(29,6,'Chả Giò','Bịch',0,''),(30,6,'Khô Bò','Bịch',0,''),(31,6,'Mít Sấy','Bịch',0,''),(32,6,'Đậu Phộng ','Bịch',0,''),(34,9,'Trái Cây','Dĩa',0,''),(35,9,'Đậu Phộng sấy','Bịch',0,''),(36,9,'Đậu Phộng chiên','Bịch',0,''),(39,9,'Thuốc Craven','Cây',165000,''),(40,9,'Thuốc 555','Cây',235000,''),(43,9,'Quẹt gas','Hộp',85000,''),(44,9,'Đậu Nành','Gói',3000,'Mua ngoài'),(58,9,'Khô Mực','Con',0,''),(59,9,'Khô_Mực','Con',0,''),(61,9,'Khăn Lạnh','Hộp',27000,''),(65,9,'Thuốc Hút','Cây',155000,''),(66,9,'Bánh tráng rế','Bịch',15000,'Bánh tráng gói chả giò rế'),(67,9,'Thịt ghẹ','Kg',80000,'Thịt ghẹ gói chả giò rế'),(68,9,'Khoai cao','Kg',30000,'Khoai cao gói chả giò rế');
/*!40000 ALTER TABLE `cafedemo_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_session`
--

DROP TABLE IF EXISTS `cafedemo_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_session` (
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
  KEY `cafedemo_session_3` (`idcustomer`),
  CONSTRAINT `cafedemo_session_1` FOREIGN KEY (`idtable`) REFERENCES `cafedemo_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cafedemo_session_2` FOREIGN KEY (`iduser`) REFERENCES `cafedemo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cafedemo_session_3` FOREIGN KEY (`idcustomer`) REFERENCES `cafedemo_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1428 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_session`
--

LOCK TABLES `cafedemo_session` WRITE;
/*!40000 ALTER TABLE `cafedemo_session` DISABLE KEYS */;
INSERT INTO `cafedemo_session` VALUES (1,29,1,1,'2013-08-14 01:35:40','2013-08-14 01:35:40','',1,0,10,0,0,40000),(2,1,1,1,'2013-08-14 01:57:01','2013-08-14 01:57:01','',1,0,0,0,0,52000),(3,4,1,1,'2013-08-14 02:03:06','2013-08-14 02:03:06','',1,0,0,0,0,54000),(6,1,1,1,'2013-08-14 02:45:34','2013-08-14 02:45:34','',1,0,0,0,0,48000),(8,3,1,1,'2013-08-14 05:33:10','2013-08-14 05:33:10','',1,0,0,0,0,90000),(10,4,1,1,'2013-08-14 07:55:34','2013-08-14 07:55:34','',1,0,0,0,0,104000),(30,1,1,1,'2013-08-14 16:26:57','2013-08-14 16:26:57','',1,0,0,0,0,0),(31,1,1,1,'2013-08-14 16:31:17','2013-08-14 16:31:17','',1,0,0,0,0,49000),(32,2,1,1,'2013-08-14 16:35:49','2013-08-14 16:35:49','',1,0,0,0,0,0),(34,2,1,1,'2013-08-15 06:42:30','2013-08-15 06:42:30','',1,0,20,0,0,59000),(35,40,1,1,'2013-08-15 06:43:23','2013-08-15 06:43:23','',1,0,20,0,0,88000),(36,34,1,1,'2013-08-15 06:47:20','2013-08-15 06:47:20','',1,0,20,0,0,16000),(37,45,1,1,'2013-08-15 06:54:54','2013-08-15 06:54:54','',1,0,20,0,0,24000),(38,1,1,1,'2013-08-15 06:56:27','2013-08-15 06:56:27','',1,0,20,0,0,24000),(39,31,1,1,'2013-08-15 07:00:28','2013-08-15 07:00:28','',1,0,20,0,0,77000),(40,4,1,1,'2013-08-15 07:03:48','2013-08-15 07:03:48','',1,0,20,0,0,32000),(41,32,1,1,'2013-08-15 07:04:42','2013-08-15 07:04:42','',1,0,20,0,0,16000),(42,49,1,1,'2013-08-15 07:06:13','2013-08-15 07:06:13','',1,0,20,0,0,24000),(43,51,1,1,'2013-08-15 07:10:12','2013-08-15 07:10:12','',1,0,20,0,0,8000),(44,51,1,1,'2013-08-15 07:12:06','2013-08-15 07:12:06','',1,0,20,0,0,32000),(45,33,1,1,'2013-08-15 07:14:51','2013-08-15 07:14:51','',1,0,20,0,0,16000),(46,28,1,1,'2013-08-15 07:17:45','2013-08-15 07:17:45','',1,0,20,0,0,14000),(47,30,1,1,'2013-08-15 07:41:42','2013-08-15 07:41:42','',1,0,20,0,0,12000),(48,34,1,1,'2013-08-15 07:51:55','2013-08-15 07:51:55','',1,0,20,0,0,35000),(49,40,1,1,'2013-08-15 07:52:57','2013-08-15 07:52:57','',1,0,20,0,0,0),(50,3,1,1,'2013-08-15 07:53:44','2013-08-15 07:53:44','',1,0,20,0,0,22000),(51,4,1,1,'2013-08-15 07:59:37','2013-08-15 07:59:37','',1,0,20,0,0,22000),(52,1,1,1,'2013-08-15 08:02:05','2013-08-15 08:02:05','',1,0,20,0,0,24000),(53,2,1,1,'2013-08-15 08:02:45','2013-08-15 08:02:45','',1,0,20,0,0,8000),(54,35,1,1,'2013-08-15 08:09:20','2013-08-15 08:09:20','',1,0,20,0,0,8000),(55,33,1,1,'2013-08-15 08:15:55','2013-08-15 08:15:55','',1,0,20,0,0,11000),(56,45,1,1,'2013-08-15 08:16:38','2013-08-15 08:16:38','',1,0,20,0,0,8000),(57,41,1,1,'2013-08-15 08:18:03','2013-08-15 08:18:03','',1,0,20,0,0,46000),(58,44,1,1,'2013-08-15 08:18:50','2013-08-15 08:18:50','',1,0,20,0,0,18000),(59,32,1,1,'2013-08-15 08:30:41','2013-08-15 08:30:41','',1,0,20,0,0,14000),(60,4,1,1,'2013-08-15 08:32:59','2013-08-15 08:32:59','',1,0,20,0,0,22000),(61,32,1,1,'2013-08-15 08:37:53','2013-08-15 08:37:53','',1,0,20,0,0,35000),(62,29,1,1,'2013-08-15 08:38:10','2013-08-15 08:38:10','',1,0,20,0,0,24000),(63,47,1,1,'2013-08-15 08:38:47','2013-08-15 08:38:47','',1,0,20,0,0,16000),(64,34,1,1,'2013-08-15 08:43:36','2013-08-15 08:43:36','',1,0,20,0,0,8000),(65,45,1,1,'2013-08-15 08:47:00','2013-08-15 08:47:00','',1,0,20,0,0,26000),(66,46,1,1,'2013-08-15 08:47:18','2013-08-15 08:47:18','',1,0,20,0,0,32000),(67,38,1,1,'2013-08-15 08:49:10','2013-08-15 08:49:10','',1,0,20,0,0,27000),(68,43,1,1,'2013-08-15 08:49:30','2013-08-15 08:49:30','',1,0,20,0,0,16000),(69,3,1,1,'2013-08-15 08:50:48','2013-08-15 08:50:48','',1,0,20,0,0,24000),(70,44,1,1,'2013-08-15 08:56:06','2013-08-15 08:56:06','',1,0,20,0,0,8000),(71,36,1,1,'2013-08-15 09:06:28','2013-08-15 09:06:28','',1,0,20,0,0,19000),(72,37,1,1,'2013-08-15 09:11:11','2013-08-15 09:11:11','',1,0,20,0,0,16000),(73,47,1,1,'2013-08-15 09:18:22','2013-08-15 09:18:22','',1,0,20,0,0,8000),(74,41,1,1,'2013-08-15 09:25:21','2013-08-15 09:25:21','',1,0,20,0,0,43000),(75,31,1,1,'2013-08-15 09:28:16','2013-08-15 09:28:16','',1,0,20,0,0,58000),(76,45,1,1,'2013-08-15 09:34:56','2013-08-15 09:34:56','',1,0,20,0,0,19000),(77,48,1,1,'2013-08-15 09:37:05','2013-08-15 09:37:05','',1,0,0,0,0,0),(78,44,1,1,'2013-08-15 09:51:41','2013-08-15 09:51:41','',1,0,20,0,0,8000),(79,32,1,1,'2013-08-15 09:52:22','2013-08-15 09:52:22','',1,0,20,0,0,30000),(80,34,1,1,'2013-08-15 09:53:07','2013-08-15 09:53:07','',1,0,20,0,0,16000),(81,31,1,1,'2013-08-15 09:54:24','2013-08-15 09:54:24','',1,0,20,0,0,16000),(82,46,1,1,'2013-08-15 10:12:29','2013-08-15 10:12:29','',1,0,0,0,0,0),(83,30,1,1,'2013-08-15 10:12:42','2013-08-15 10:12:42','',1,0,20,0,0,10000),(84,32,1,1,'2013-08-15 10:31:43','2013-08-15 10:31:43','',1,0,20,0,0,34000),(85,33,1,1,'2013-08-15 10:35:00','2013-08-15 10:35:00','',1,0,20,0,0,37000),(86,45,1,1,'2013-08-15 10:42:35','2013-08-15 10:42:35','',1,0,20,0,0,32000),(87,44,1,1,'2013-08-15 10:50:17','2013-08-15 10:50:17','',1,0,20,0,0,16000),(88,35,1,1,'2013-08-15 10:56:34','2013-08-15 10:56:34','',1,0,20,0,0,16000),(89,39,1,1,'2013-08-15 11:04:55','2013-08-15 11:04:55','',1,0,20,0,0,24000),(90,40,1,1,'2013-08-15 11:17:13','2013-08-15 11:17:13','',1,0,20,0,0,20000),(91,45,1,1,'2013-08-15 11:26:49','2013-08-15 11:26:49','',1,0,20,0,0,72000),(92,33,1,1,'2013-08-15 11:27:53','2013-08-15 11:27:53','',1,0,20,0,0,46000),(93,29,1,1,'2013-08-15 11:34:50','2013-08-15 11:34:50','',1,0,20,0,0,27000),(94,30,1,1,'2013-08-15 11:39:08','2013-08-15 11:39:08','',1,0,20,0,0,8000),(95,35,1,1,'2013-08-15 11:54:49','2013-08-15 11:54:49','',1,0,20,0,0,24000),(96,43,1,1,'2013-08-15 12:09:46','2013-08-15 12:09:46','',1,0,20,0,0,47000),(97,33,1,1,'2013-08-15 12:16:17','2013-08-15 12:16:17','',1,0,20,0,0,33000),(98,43,1,1,'2013-08-15 12:22:22','2013-08-15 12:22:22','',1,0,20,0,0,68000),(495,29,1,1,'2013-08-18 13:52:52','2013-08-18 13:52:52','',1,0,0,0,0,28000),(496,32,1,1,'2013-08-18 13:55:07','2013-08-18 13:55:07','',1,0,0,0,0,40000),(497,30,1,1,'2013-08-18 14:22:51','2013-08-18 14:22:51','',1,0,0,0,0,76000),(498,39,1,1,'2013-08-18 14:36:18','2013-08-18 14:36:18','',1,0,0,0,0,44000),(499,44,1,1,'2013-08-18 14:37:56','2013-08-18 14:37:56','',1,0,0,0,0,20000),(595,44,1,1,'2013-08-19 09:25:39','2013-08-19 09:25:39','',1,0,0,0,0,20000),(596,42,1,1,'2013-08-19 09:28:07','2013-08-19 09:28:07','',1,0,0,0,0,17000),(616,39,1,1,'2013-08-19 12:18:52','2013-08-19 12:18:52','',1,0,0,0,0,20000),(617,34,1,1,'2013-08-19 12:21:45','2013-08-19 12:21:45','',1,0,0,0,0,10000),(619,33,1,1,'2013-08-19 12:40:32','2013-08-19 12:40:32','',1,0,0,0,0,15000),(625,41,1,1,'2013-08-19 14:03:36','2013-08-19 14:03:36','',1,0,0,0,0,36000),(626,29,1,1,'2013-08-19 14:05:40','2013-08-19 14:05:40','',1,0,0,0,0,52000),(679,33,1,1,'2013-08-20 06:58:28','2013-08-20 06:58:28','',1,0,0,0,0,20000),(680,1,1,1,'2013-08-20 07:05:04','2013-08-20 07:05:04','',1,0,0,0,0,10000),(681,32,1,1,'2013-08-20 07:05:18','2013-08-20 07:05:18','',1,0,0,0,0,24000),(682,2,1,1,'2013-08-20 07:05:36','2013-08-20 07:05:36','',1,0,0,0,0,10000),(683,45,1,1,'2013-08-20 07:10:51','2013-08-20 07:10:51','',1,0,0,0,0,29000),(684,30,1,1,'2013-08-20 07:27:34','2013-08-20 07:27:34','',1,0,0,0,0,20000),(685,4,1,1,'2013-08-20 07:27:53','2013-08-20 07:27:53','',1,0,0,0,0,96000),(686,28,1,1,'2013-08-20 07:27:56','2013-08-20 07:27:56','',1,0,0,0,0,50000),(687,44,1,1,'2013-08-20 07:31:24','2013-08-20 07:31:24','',1,0,0,0,0,33000),(688,35,1,1,'2013-08-20 07:39:10','2013-08-20 07:39:10','',1,0,0,0,0,20000),(689,45,1,1,'2013-08-20 07:48:18','2013-08-20 07:48:18','',1,0,0,0,0,20000),(690,36,1,1,'2013-08-20 07:56:29','2013-08-20 07:56:29','',1,0,0,0,0,36000),(691,29,1,1,'2013-08-20 07:57:06','2013-08-20 07:57:06','',1,0,0,0,0,55000),(692,31,1,1,'2013-08-20 08:09:03','2013-08-20 08:09:03','',1,0,0,0,0,30000),(693,40,1,1,'2013-08-20 08:16:25','2013-08-20 08:16:25','',1,0,0,0,0,44000),(694,38,1,1,'2013-08-20 08:17:03','2013-08-20 08:17:03','',1,0,0,0,0,30000),(695,33,1,1,'2013-08-20 08:28:53','2013-08-20 08:28:53','',1,0,0,0,0,34000),(696,43,1,1,'2013-08-20 08:34:30','2013-08-20 08:34:30','',1,0,0,0,0,20000),(697,41,1,1,'2013-08-20 08:37:54','2013-08-20 08:37:54','',1,0,0,0,0,13000),(698,33,1,1,'2013-08-20 08:46:34','2013-08-20 08:46:34','',1,0,0,0,0,45000),(699,34,1,1,'2013-08-20 08:52:09','2013-08-20 08:52:09','',1,0,0,0,0,29000),(700,44,1,1,'2013-08-20 08:53:21','2013-08-20 08:53:21','',1,0,0,0,0,14000),(701,37,1,1,'2013-08-20 09:05:10','2013-08-20 09:05:10','',1,0,0,0,0,43000),(702,30,1,1,'2013-08-20 09:05:35','2013-08-20 09:05:35','',1,0,0,0,0,30000),(703,49,1,1,'2013-08-20 09:05:59','2013-08-20 09:05:59','',1,0,0,0,0,10000),(704,29,1,1,'2013-08-20 09:10:49','2013-08-20 09:10:49','',1,0,0,0,0,50000),(705,45,1,1,'2013-08-20 09:27:47','2013-08-20 09:27:47','',1,0,0,0,0,41000),(706,35,1,1,'2013-08-20 09:28:03','2013-08-20 09:28:03','',1,0,0,0,0,58000),(707,36,1,1,'2013-08-20 09:28:40','2013-08-20 09:28:40','',1,0,0,0,0,30000),(708,44,1,1,'2013-08-20 09:29:07','2013-08-20 09:29:07','',1,0,0,0,0,47000),(709,31,1,1,'2013-08-20 09:41:24','2013-08-20 09:41:24','',1,0,0,0,0,28000),(710,39,1,1,'2013-08-20 09:48:36','2013-08-20 09:48:36','',1,0,0,0,0,32000),(711,43,1,1,'2013-08-20 09:50:26','2013-08-20 09:50:26','',1,0,0,0,0,10000),(712,41,1,1,'2013-08-20 09:56:54','2013-08-20 09:56:54','',1,0,0,0,0,20000),(713,32,1,1,'2013-08-20 10:01:32','2013-08-20 10:01:32','',1,0,0,0,0,50000),(714,42,1,1,'2013-08-20 10:08:20','2013-08-20 10:08:20','',1,0,0,0,0,12000),(715,38,1,1,'2013-08-20 10:15:19','2013-08-20 10:15:19','',1,0,0,0,0,20000),(717,30,1,1,'2013-08-20 10:56:49','2013-08-20 10:56:49','',1,0,0,0,0,10000),(718,35,1,1,'2013-08-20 10:57:46','2013-08-20 10:57:46','',1,0,0,0,0,29000),(719,34,1,1,'2013-08-20 10:59:30','2013-08-20 10:59:30','',1,0,0,0,0,14000),(720,49,1,1,'2013-08-20 11:11:49','2013-08-20 11:11:49','',1,0,0,0,0,10000),(721,36,1,1,'2013-08-20 11:12:53','2013-08-20 11:12:53','',1,0,0,0,0,34000),(722,36,1,1,'2013-08-20 11:25:34','2013-08-20 11:25:34','',1,0,0,0,0,20000),(723,31,1,1,'2013-08-20 11:34:45','2013-08-20 11:34:45','',1,0,0,0,0,30000),(724,40,1,1,'2013-08-20 11:44:16','2013-08-20 11:44:16','',1,0,0,0,0,22000),(725,33,1,1,'2013-08-20 11:51:27','2013-08-20 11:51:27','',1,0,0,0,0,10000),(737,38,1,1,'2013-08-20 13:23:20','2013-08-20 13:23:20','',1,0,0,0,0,40000),(738,34,1,1,'2013-08-20 13:31:06','2013-08-20 13:31:06','',1,0,0,0,0,10000),(739,31,1,1,'2013-08-20 13:36:15','2013-08-20 13:36:15','',1,0,0,0,0,20000),(740,32,1,1,'2013-08-20 13:36:47','2013-08-20 13:36:47','',1,0,0,0,0,38000),(741,41,1,1,'2013-08-20 13:49:15','2013-08-20 13:49:15','',1,0,0,0,0,10000),(742,39,1,1,'2013-08-20 13:55:58','2013-08-20 13:55:58','',1,0,0,0,0,35000),(743,29,1,1,'2013-08-20 13:56:15','2013-08-20 13:56:15','',1,0,0,0,0,26000),(744,30,1,1,'2013-08-20 14:01:20','2013-08-20 14:01:20','',1,0,0,0,0,31000),(819,31,1,1,'2013-08-21 09:17:38','2013-08-21 09:17:38','',1,0,0,0,0,55000),(820,2,1,1,'2013-08-21 09:22:35','2013-08-21 09:22:35','',1,0,0,0,0,25000),(821,40,1,1,'2013-08-21 09:26:10','2013-08-21 09:26:10','',1,0,0,0,0,24000),(822,44,1,1,'2013-08-21 09:26:32','2013-08-21 09:26:32','',1,0,0,0,0,42000),(823,35,1,1,'2013-08-21 09:29:37','2013-08-21 09:29:37','',1,0,0,0,0,19000),(824,38,1,1,'2013-08-21 09:30:21','2013-08-21 09:30:21','',1,0,0,0,0,60000),(825,30,1,1,'2013-08-21 09:32:44','2013-08-21 09:32:44','',1,0,0,0,0,20000),(826,45,1,1,'2013-08-21 09:40:46','2013-08-21 09:40:46','',1,0,0,0,0,20000),(827,33,1,1,'2013-08-21 09:53:51','2013-08-21 09:53:51','',1,0,0,0,0,24000),(828,32,1,1,'2013-08-21 09:54:29','2013-08-21 09:54:29','',1,0,0,0,0,28000),(829,40,1,1,'2013-08-21 10:00:11','2013-08-21 10:00:11','',1,0,0,0,0,36000),(835,32,1,1,'2013-08-21 11:52:43','2013-08-21 11:52:43','',1,0,0,0,0,26000),(907,40,1,1,'2013-08-21 19:59:03','2013-08-21 19:59:03','',1,0,0,0,0,10000),(908,37,1,1,'2013-08-21 20:01:34','2013-08-21 20:01:34','',1,0,0,0,0,54000),(909,28,1,1,'2013-08-21 20:02:31','2013-08-21 20:02:31','',1,0,0,0,0,20000),(910,36,1,1,'2013-08-21 20:03:04','2013-08-21 20:03:04','',1,0,0,0,0,20000),(911,48,1,1,'2013-08-21 20:15:55','2013-08-21 20:15:55','',1,0,0,0,0,24000),(912,43,1,1,'2013-08-21 20:59:37','2013-08-21 20:59:37','',1,0,0,0,0,34000),(913,36,1,1,'2013-08-21 21:05:11','2013-08-21 21:05:11','',1,0,0,0,0,30000),(914,3,1,1,'2013-08-21 21:23:37','2013-08-21 21:23:37','',1,0,0,0,0,30000),(915,2,1,1,'2013-08-21 21:45:09','2013-08-21 21:45:09','',1,0,0,0,0,7000),(1098,30,1,1,'2013-08-23 13:56:42','2013-08-23 13:56:42','',1,0,0,0,0,10000),(1099,39,1,1,'2013-08-23 13:56:52','2013-08-23 13:56:52','',1,0,0,0,0,30000),(1100,44,1,1,'2013-08-23 14:07:00','2013-08-23 14:07:00','',1,0,0,0,0,24000),(1101,29,1,1,'2013-08-23 14:12:28','2013-08-23 14:12:28','',1,0,0,0,0,47000),(1102,33,1,1,'2013-08-23 14:12:48','2013-08-23 14:12:48','',1,0,0,0,0,40000),(1103,45,1,1,'2013-08-23 14:17:35','2013-08-23 14:17:35','',1,0,0,0,0,55000),(1104,32,1,1,'2013-08-23 14:18:38','2013-08-23 14:18:38','',1,0,0,0,0,20000),(1105,31,1,1,'2013-08-23 14:41:00','2013-08-23 14:41:00','',1,0,0,0,0,46000),(1106,43,1,1,'2013-08-23 14:41:22','2013-08-23 14:41:22','',1,0,0,0,0,25000),(1107,42,1,1,'2013-08-23 14:43:39','2013-08-23 14:43:39','',1,0,0,0,0,10000),(1108,40,1,1,'2013-08-23 14:53:35','2013-08-23 14:53:35','',1,0,0,0,0,20000),(1109,32,1,1,'2013-08-23 15:13:47','2013-08-23 15:13:47','',1,0,0,0,0,50000),(1110,33,1,1,'2013-08-23 15:29:23','2013-08-23 15:29:23','',1,0,0,0,0,20000),(1111,2,1,1,'2013-08-23 15:42:11','2013-08-23 15:42:11','',1,0,0,0,0,21000),(1112,31,1,1,'2013-08-23 15:46:12','2013-08-23 15:46:12','',1,0,0,0,0,14000),(1113,1,1,1,'2013-08-23 16:08:46','2013-08-23 16:08:46','',1,0,0,0,0,25000),(1114,45,1,1,'2013-08-23 16:25:42','2013-08-23 16:25:42','',1,0,0,0,0,12000),(1115,33,1,1,'2013-08-23 16:28:13','2013-08-23 16:28:13','',1,0,0,0,0,10000),(1116,2,1,1,'2013-08-23 16:37:56','2013-08-23 16:37:56','',1,0,0,0,0,24000),(1117,4,1,1,'2013-08-23 16:38:33','2013-08-23 16:38:33','',1,0,0,0,0,32000),(1118,39,1,1,'2013-08-23 16:40:06','2013-08-23 16:40:06','',1,0,0,0,0,24000),(1119,40,1,1,'2013-08-23 16:42:45','2013-08-23 16:42:45','',1,0,0,0,0,52000),(1120,28,1,1,'2013-08-23 16:48:45','2013-08-23 16:48:45','',1,0,0,0,0,10000),(1218,42,1,1,'2013-08-24 14:03:14','2013-08-24 14:03:14','',1,0,0,0,0,20000),(1219,40,1,1,'2013-08-24 14:30:13','2013-08-24 14:30:13','',1,0,0,0,0,29000),(1220,44,1,1,'2013-08-24 14:45:48','2013-08-24 14:45:48','',1,0,0,0,0,10000),(1221,38,1,1,'2013-08-24 14:50:48','2013-08-24 14:50:48','',1,0,0,0,0,45000),(1222,45,1,1,'2013-08-24 14:53:13','2013-08-24 14:53:13','',1,0,0,0,0,35000),(1223,39,1,1,'2013-08-24 15:09:36','2013-08-24 15:09:36','',1,0,0,0,0,20000),(1224,35,1,1,'2013-08-24 15:15:19','2013-08-24 15:15:19','',1,0,0,0,0,10000),(1225,32,1,1,'2013-08-24 16:00:40','2013-08-24 16:00:40','',1,0,0,0,0,10000),(1226,45,1,1,'2013-08-24 16:24:35','2013-08-24 16:24:35','',1,0,0,0,0,10000),(1427,1,1,1,'2013-09-05 17:54:35','2013-09-05 17:54:35','',0,0,0,0,0,24000);
/*!40000 ALTER TABLE `cafedemo_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_session_detail`
--

DROP TABLE IF EXISTS `cafedemo_session_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_session_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsession` int(11) NOT NULL,
  `idcourse` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idsession` (`idsession`),
  KEY `idcourse` (`idcourse`),
  CONSTRAINT `cafedemo_session_detail_1` FOREIGN KEY (`idsession`) REFERENCES `cafedemo_session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cafedemo_session_detail_2` FOREIGN KEY (`idcourse`) REFERENCES `cafedemo_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2789 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_session_detail`
--

LOCK TABLES `cafedemo_session_detail` WRITE;
/*!40000 ALTER TABLE `cafedemo_session_detail` DISABLE KEYS */;
INSERT INTO `cafedemo_session_detail` VALUES (1,1,215,2,12000),(2,1,148,2,10000),(3,2,215,2,12000),(4,2,217,2,14000),(5,3,218,2,13000),(6,3,151,2,14000),(10,6,215,4,12000),(11,8,215,4,12000),(12,8,217,3,14000),(13,10,215,1,12000),(14,10,224,1,12000),(15,10,191,1,0),(16,10,177,2,13000),(17,10,175,1,10000),(18,10,217,1,14000),(19,10,148,3,10000),(82,30,191,1,15),(83,30,187,1,17),(84,31,191,1,15000),(85,31,187,1,17000),(86,31,194,1,17000),(88,34,148,6,10000),(89,35,148,10,10000),(90,35,169,1,10000),(91,36,148,2,10000),(92,37,148,3,10000),(93,38,148,3,10000),(94,39,151,1,14000),(95,40,148,2,10000),(96,40,154,1,20000),(97,41,148,2,10000),(98,42,148,3,10000),(99,43,148,1,10000),(100,44,148,4,10000),(101,45,148,2,10000),(103,34,212,1,14000),(105,48,148,3,10000),(107,50,148,2,10000),(108,48,151,1,14000),(109,39,148,2,10000),(110,50,238,1,7000),(111,51,169,2,10000),(112,52,148,3,10000),(113,53,148,1,10000),(114,54,148,1,10000),(115,55,151,1,14000),(116,56,148,1,10000),(117,57,148,5,10000),(118,58,150,1,13000),(119,58,149,1,9000),(120,51,238,1,7000),(121,59,238,1,7000),(122,59,148,1,10000),(123,60,238,1,7000),(124,61,148,3,10000),(125,62,148,3,10000),(126,63,148,2,10000),(127,39,155,1,20000),(128,39,150,1,13000),(129,39,185,1,14000),(130,57,238,1,7000),(131,64,148,1,10000),(132,65,148,1,10000),(133,66,148,4,10000),(134,39,179,1,15000),(135,67,148,2,10000),(136,68,148,2,10000),(137,69,148,3,10000),(139,60,148,2,10000),(140,70,148,1,10000),(142,47,232,1,15000),(144,71,148,1,10000),(145,61,217,1,14000),(147,72,152,1,20000),(148,71,178,1,14000),(150,65,214,1,11000),(151,65,216,1,11000),(152,73,148,1,10000),(153,67,151,1,14000),(156,75,151,1,14000),(157,75,148,3,10000),(158,75,185,1,14000),(159,75,179,1,15000),(161,74,148,4,10000),(162,74,151,1,14000),(163,76,151,1,14000),(164,76,169,1,10000),(167,79,148,2,10000),(168,79,173,1,10000),(170,81,148,2,10000),(172,79,238,1,7000),(174,83,213,1,12000),(175,80,148,2,10000),(176,84,152,1,20000),(177,84,213,1,12000),(178,85,204,1,11000),(179,85,226,1,15000),(180,85,154,1,20000),(181,86,152,2,20000),(183,88,148,2,10000),(186,87,148,2,10000),(187,89,148,3,10000),(188,84,148,1,10000),(189,90,232,1,15000),(190,90,148,1,10000),(191,91,215,3,12000),(192,91,178,2,14000),(193,92,151,2,14000),(194,92,148,3,10000),(196,91,237,8,2000),(198,94,148,1,10000),(199,95,148,3,10000),(200,78,169,1,10000),(201,96,169,1,10000),(202,96,212,1,14000),(203,96,235,1,35000),(205,97,232,1,15000),(206,97,148,1,10000),(207,97,231,1,16000),(208,98,148,2,10000),(209,93,148,2,10000),(210,93,178,1,14000),(212,91,148,1,10000),(219,98,154,1,20000),(224,98,169,1,10000),(225,98,235,1,35000),(280,46,148,1,10000),(281,46,238,1,7000),(994,495,178,2,14000),(995,496,148,4,10000),(998,497,217,3,14000),(999,497,151,1,14000),(1000,497,148,2,10000),(1001,498,225,2,10000),(1002,499,148,1,10000),(1003,499,169,1,10000),(1006,498,215,2,12000),(1202,595,148,2,10000),(1203,596,148,1,10000),(1207,596,238,1,7000),(1237,616,148,2,10000),(1238,617,148,1,10000),(1241,619,232,1,15000),(1253,625,175,1,10000),(1254,625,208,1,16000),(1255,625,148,1,10000),(1258,626,217,1,14000),(1259,626,151,2,14000),(1265,626,148,1,10000),(1364,679,148,2,10000),(1365,680,148,1,10000),(1366,681,148,1,10000),(1367,681,151,1,14000),(1368,682,148,1,10000),(1369,683,151,1,14000),(1370,683,226,1,15000),(1371,684,148,2,10000),(1372,686,148,5,10000),(1373,687,148,1,10000),(1374,687,149,1,9000),(1375,687,151,1,14000),(1376,688,148,2,10000),(1377,689,148,2,10000),(1378,690,231,1,16000),(1379,690,153,1,20000),(1380,691,148,2,10000),(1381,691,235,1,35000),(1382,692,148,3,10000),(1383,693,169,1,10000),(1384,694,148,3,10000),(1385,693,178,1,14000),(1386,695,148,2,10000),(1388,697,150,1,13000),(1389,698,148,1,10000),(1390,699,151,1,14000),(1391,699,190,1,15000),(1392,698,235,1,35000),(1393,700,217,1,14000),(1394,696,148,2,10000),(1395,701,148,2,10000),(1396,702,169,2,10000),(1397,702,225,1,10000),(1398,703,148,1,10000),(1399,704,152,1,20000),(1400,704,207,1,16000),(1401,701,170,1,9000),(1402,705,148,2,10000),(1403,706,176,1,14000),(1404,706,152,1,20000),(1405,707,148,3,10000),(1406,708,148,4,10000),(1407,693,148,2,10000),(1408,706,169,1,10000),(1409,709,217,2,14000),(1410,695,176,1,14000),(1411,710,148,1,10000),(1412,706,151,1,14000),(1413,701,151,1,14000),(1414,711,148,1,10000),(1415,705,151,1,14000),(1416,712,148,2,10000),(1417,713,190,1,15000),(1418,713,232,1,15000),(1420,705,238,1,7000),(1421,704,151,1,14000),(1422,714,195,1,12000),(1423,715,148,2,10000),(1424,685,232,1,15000),(1425,685,189,1,14000),(1426,685,207,2,16000),(1427,685,236,1,25000),(1430,713,148,2,10000),(1433,718,151,1,14000),(1434,718,232,1,15000),(1435,719,206,1,14000),(1436,720,148,1,10000),(1437,708,238,1,7000),(1438,721,148,2,10000),(1439,717,148,1,10000),(1440,722,148,1,10000),(1441,710,232,1,15000),(1442,723,148,3,10000),(1443,722,169,1,10000),(1444,685,184,1,10000),(1445,724,169,1,10000),(1446,724,219,1,12000),(1447,710,238,1,7000),(1448,725,148,1,10000),(1462,721,151,1,14000),(1469,737,148,4,10000),(1470,738,148,1,10000),(1471,739,152,1,20000),(1472,740,148,1,10000),(1473,740,178,2,14000),(1474,741,148,1,10000),(1475,742,151,2,14000),(1476,743,215,1,12000),(1477,743,178,1,14000),(1478,742,238,1,7000),(1479,744,231,1,16000),(1480,744,179,1,15000),(1632,819,148,3,10000),(1633,819,179,1,15000),(1634,819,169,1,10000),(1635,820,148,1,10000),(1636,820,232,1,15000),(1638,821,148,1,10000),(1639,821,151,1,14000),(1640,822,224,1,12000),(1641,823,172,1,9000),(1642,824,232,4,15000),(1643,825,148,2,10000),(1644,826,148,2,10000),(1645,822,148,3,10000),(1646,827,148,1,10000),(1647,827,151,1,14000),(1648,828,151,2,14000),(1649,829,148,1,10000),(1650,823,148,1,10000),(1651,829,178,1,14000),(1652,829,224,1,12000),(1661,835,151,1,14000),(1662,835,219,1,12000),(1807,907,148,1,10000),(1808,908,155,1,20000),(1809,908,148,2,10000),(1810,909,173,1,10000),(1811,909,148,1,10000),(1812,910,169,2,10000),(1813,908,185,1,14000),(1814,911,178,1,14000),(1815,911,169,1,10000),(1820,912,148,2,10000),(1821,913,148,1,10000),(1822,913,152,1,20000),(1823,912,185,1,14000),(1824,914,155,1,20000),(1825,914,148,1,10000),(1826,915,238,1,7000),(2163,1098,148,1,10000),(2164,1099,148,3,10000),(2165,1100,148,1,10000),(2166,1100,151,1,14000),(2167,1101,179,2,15000),(2168,1102,152,1,20000),(2169,1102,153,1,20000),(2170,1103,148,2,10000),(2171,1104,148,2,10000),(2172,1103,235,1,35000),(2173,1101,148,1,10000),(2174,1101,238,1,7000),(2175,1105,151,1,14000),(2176,1105,153,1,20000),(2177,1106,190,1,15000),(2178,1106,148,1,10000),(2179,1107,148,1,10000),(2180,1108,169,1,10000),(2181,1105,195,1,12000),(2182,1108,148,1,10000),(2183,1109,148,5,10000),(2184,1110,148,2,10000),(2185,1111,213,1,12000),(2186,1112,151,1,14000),(2187,1111,223,1,9000),(2188,1113,149,1,9000),(2189,1113,193,1,16000),(2190,1114,219,1,12000),(2191,1115,148,1,10000),(2192,1116,151,1,14000),(2193,1116,148,1,10000),(2194,1117,238,1,7000),(2195,1117,232,1,15000),(2196,1117,148,1,10000),(2197,1118,226,1,15000),(2198,1118,170,1,9000),(2199,1119,166,1,27000),(2200,1119,232,1,15000),(2201,1120,173,1,10000),(2202,1119,148,1,10000),(2380,1218,148,2,10000),(2381,1219,170,1,9000),(2382,1220,148,1,10000),(2383,1221,204,1,11000),(2384,1221,148,1,10000),(2385,1221,184,1,10000),(2386,1221,151,1,14000),(2387,1222,226,1,15000),(2388,1222,148,2,10000),(2389,1223,184,1,10000),(2390,1223,148,1,10000),(2391,1224,148,1,10000),(2392,1225,148,1,10000),(2393,1226,148,1,10000),(2394,1219,148,2,10000),(2788,1427,215,2,12000);
/*!40000 ALTER TABLE `cafedemo_session_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_store`
--

DROP TABLE IF EXISTS `cafedemo_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_store`
--

LOCK TABLES `cafedemo_store` WRITE;
/*!40000 ALTER TABLE `cafedemo_store` DISABLE KEYS */;
INSERT INTO `cafedemo_store` VALUES (1,'Kho nhà','Ghi chú gì đây ?');
/*!40000 ALTER TABLE `cafedemo_store` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_supplier`
--

DROP TABLE IF EXISTS `cafedemo_supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_supplier` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `debt` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_supplier`
--

LOCK TABLES `cafedemo_supplier` WRITE;
/*!40000 ALTER TABLE `cafedemo_supplier` DISABLE KEYS */;
INSERT INTO `cafedemo_supplier` VALUES (1,'Nhà máy Nước Đá ...','0703 ....','Phường 5','Cung cấp nước đá',0),(6,'Coop Mart','070','Vĩnh Long','Cung cấp mọi thứ',0),(9,'KHÁC','','','',0);
/*!40000 ALTER TABLE `cafedemo_supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_table`
--

DROP TABLE IF EXISTS `cafedemo_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddomain` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iddomain` (`iddomain`),
  CONSTRAINT `cafedemo_table_1` FOREIGN KEY (`iddomain`) REFERENCES `cafedemo_domain` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_table`
--

LOCK TABLES `cafedemo_table` WRITE;
/*!40000 ALTER TABLE `cafedemo_table` DISABLE KEYS */;
INSERT INTO `cafedemo_table` VALUES (1,1,'Bàn 18',0,'0'),(2,1,'Bàn 19',0,'0'),(3,1,'Bàn 20',0,'0'),(4,1,'Bàn 21',0,'0'),(28,1,'Bàn 22',1,'0'),(29,2,'Bàn 01',1,'0'),(30,2,'Bàn 02',1,'0'),(31,2,'Bàn 03',1,'0'),(32,2,'Bàn 04',1,'0'),(33,2,'Bàn 05',1,'0'),(34,2,'Bàn 06',1,'0'),(35,2,'Bàn 07',1,'0'),(36,2,'Bàn 08',1,'0'),(37,2,'Bàn 09',1,'0'),(38,2,'Bàn 10',1,'0'),(39,2,'Bàn 11',1,'0'),(40,2,'Bàn 12',1,'0'),(41,2,'Bàn 13',1,'0'),(42,2,'Bàn 14',1,'0'),(43,2,'Bàn 15',1,'0'),(44,2,'Bàn 16',1,'0'),(45,2,'Bàn 17',1,'0'),(46,2,'Bàn 18',1,'0'),(47,2,'Bàn 19',1,'0'),(48,2,'Bàn 20',1,'0'),(49,4,'1',1,'0'),(50,4,'2',1,'0'),(51,4,'3',1,'0'),(52,4,'4',1,'0'),(53,4,'5',1,'0'),(54,4,'6',1,'0'),(55,4,'7',1,'0'),(56,4,'8',1,'0'),(57,4,'9',1,'0'),(58,4,'10',1,'0'),(59,2,'Bàn 21',1,'0');
/*!40000 ALTER TABLE `cafedemo_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_term`
--

DROP TABLE IF EXISTS `cafedemo_term`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_term`
--

LOCK TABLES `cafedemo_term` WRITE;
/*!40000 ALTER TABLE `cafedemo_term` DISABLE KEYS */;
INSERT INTO `cafedemo_term` VALUES (1,'Tiền Điện',0),(2,'Tiền Nước',0),(3,'Thuế',0),(4,'Lương Nhân Viên',0),(10,'Tiền Ăn Nhân Viên',0),(12,'Tiền Phụ Cấp',0);
/*!40000 ALTER TABLE `cafedemo_term` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_term_collect`
--

DROP TABLE IF EXISTS `cafedemo_term_collect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_term_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_term_collect`
--

LOCK TABLES `cafedemo_term_collect` WRITE;
/*!40000 ALTER TABLE `cafedemo_term_collect` DISABLE KEYS */;
INSERT INTO `cafedemo_term_collect` VALUES (2,'Phụ Phẩm'),(3,'Đặc Biệt');
/*!40000 ALTER TABLE `cafedemo_term_collect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_tracking`
--

DROP TABLE IF EXISTS `cafedemo_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_tracking`
--

LOCK TABLES `cafedemo_tracking` WRITE;
/*!40000 ALTER TABLE `cafedemo_tracking` DISABLE KEYS */;
INSERT INTO `cafedemo_tracking` VALUES (1,'2013-08-01','2013-08-31'),(2,'2013-09-01','2013-09-30'),(3,'2013-10-01','2013-10-31'),(4,'2013-11-01','2013-11-30'),(5,'2013-12-01','2013-12-31');
/*!40000 ALTER TABLE `cafedemo_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_unit`
--

DROP TABLE IF EXISTS `cafedemo_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_unit` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_unit`
--

LOCK TABLES `cafedemo_unit` WRITE;
/*!40000 ALTER TABLE `cafedemo_unit` DISABLE KEYS */;
INSERT INTO `cafedemo_unit` VALUES (1,'Ly'),(2,'Điếu'),(3,'Chai'),(4,'Lon'),(5,'Dĩa'),(6,'Thùng'),(7,'Két'),(9,'Bịch'),(10,'Gói'),(11,'Cái'),(12,'Cây'),(13,'Giờ'),(14,'Bao'),(15,'Con'),(16,'Kg'),(17,'Hộp'),(18,'Hủ'),(19,'Trái');
/*!40000 ALTER TABLE `cafedemo_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cafedemo_user`
--

DROP TABLE IF EXISTS `cafedemo_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cafedemo_user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cafedemo_user`
--

LOCK TABLES `cafedemo_user` WRITE;
/*!40000 ALTER TABLE `cafedemo_user` DISABLE KEYS */;
INSERT INTO `cafedemo_user` VALUES (1,'Quản lý','quanly@gmail.com','admin123456',0,' Người quản lý hệ thống','0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00',4,''),(9,'Nhân viên','nhavien@gmail.com','admin123456',1,'Nhân viên Thu Ngân','2013-08-13 19:31:11','2013-08-13 19:31:11','2013-08-13 19:31:11',1,'');
/*!40000 ALTER TABLE `cafedemo_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-06 10:40:01
