-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: localhost    Database: cms
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_image` mediumtext COLLATE utf8_unicode_ci,
  `category_icon` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(3) DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'resources/assets/images/category_images/1542638517.512.png','resources/assets/images/category_icons/1502101166.man-standing-up.png',NULL,'drink-1','0000-00-00 00:00:00',NULL,'',NULL,''),(2,'resources/assets/images/category_images/1542639564.unnamed.jpg','resources/assets/images/category_icons/1542639554.unnamed.jpg',NULL,'drink','0000-00-00 00:00:00',NULL,'',NULL,''),(3,'resources/assets/images/category_images/1542639521.splash.png','',NULL,'snack','0000-00-00 00:00:00',NULL,'',NULL,''),(4,'resources/assets/images/category_images/1542644133.IMG_20181115_013910.jpg','resources/assets/images/category_icons/1542644115.IMG_20181115_013910.jpg',NULL,'sanck','0000-00-00 00:00:00',NULL,'',NULL,'');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_description`
--

DROP TABLE IF EXISTS `category_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `category_description` (
  `category_description_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_description_id`),
  KEY `idx_categories_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_description`
--

LOCK TABLES `category_description` WRITE;
/*!40000 ALTER TABLE `category_description` DISABLE KEYS */;
INSERT INTO `category_description` VALUES (1,'Drink',1,1),(2,'飲料',5,1),(3,'維他',1,2),(4,'維他',5,2),(5,'Snack',1,3),(6,'小食',5,3),(7,'卡樂B',1,4),(8,'卡樂B',5,4);
/*!40000 ALTER TABLE `category_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_image` mediumtext COLLATE utf8_general_mysql500_ci,
  `category_icon` mediumtext COLLATE utf8_general_mysql500_ci NOT NULL,
  `sort_order` int(3) DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `category_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`sub_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category`
--

LOCK TABLES `sub_category` WRITE;
/*!40000 ALTER TABLE `sub_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category_description`
--

DROP TABLE IF EXISTS `sub_category_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sub_category_description` (
  `sub_category_description_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_general_mysql500_ci NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `sub_category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sub_category_description_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category_description`
--

LOCK TABLES `sub_category_description` WRITE;
/*!40000 ALTER TABLE `sub_category_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_category_description` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-06 17:47:20
