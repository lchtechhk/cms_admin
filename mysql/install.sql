CREATE DATABASE  IF NOT EXISTS `cms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci */;
USE `cms`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cms
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
-- Table structure for table `action_recorder`
--

DROP TABLE IF EXISTS `action_recorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `action_recorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `success` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_action_recorder_module` (`module`),
  KEY `idx_action_recorder_user_id` (`user_id`),
  KEY `idx_action_recorder_identifier` (`identifier`),
  KEY `idx_action_recorder_date_added` (`date_added`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_recorder`
--

LOCK TABLES `action_recorder` WRITE;
/*!40000 ALTER TABLE `action_recorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_recorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address_book`
--

DROP TABLE IF EXISTS `address_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `address_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `countries_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cities_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estate` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `building` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_address_book_customers_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_book`
--

LOCK TABLES `address_book` WRITE;
/*!40000 ALTER TABLE `address_book` DISABLE KEYS */;
INSERT INTO `address_book` VALUES (110,0,NULL,'','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',NULL,'','',NULL),(114,16,'1','2','',NULL,NULL,NULL,NULL,'1','','','','2019-05-13 13:53:27',NULL,'2019-05-13 13:53:27',NULL,'active','active',''),(115,16,'1','2','',NULL,NULL,NULL,NULL,'1','','','','2019-05-13 13:54:08',NULL,'2019-05-13 14:05:59',NULL,'active','active',''),(116,16,'a1233','s','d',NULL,NULL,NULL,NULL,'2','','','','2019-05-13 14:06:06',NULL,'2019-05-13 14:13:27',NULL,'active','inactive',''),(117,14,'1','2','3',NULL,NULL,NULL,NULL,'2','','','','2019-06-15 17:29:08',NULL,'2019-06-15 17:29:08',NULL,'active','inactive','');
/*!40000 ALTER TABLE `address_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address_format`
--

DROP TABLE IF EXISTS `address_format`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `address_format` (
  `address_format_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_format` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `address_summary` varchar(48) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`address_format_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_format`
--

LOCK TABLES `address_format` WRITE;
/*!40000 ALTER TABLE `address_format` DISABLE KEYS */;
/*!40000 ALTER TABLE `address_format` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `administrators` (
  `myid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `adminType` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`myid`),
  UNIQUE KEY `administrators_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (1,'Admin','','admin@gmail.com','$2y$10$oG7Hz/ikZqsvAjQM06hA9uci8IUPFr77Jo/g/.uWwT8yDEeCmDdLi',1,'address','Nivada','12','31271','223','+92 314 6681998','resources/views/admin/images/admin_profile/1505132393.1486628854.fast.jpg',1,'ZcGnzrXc1TbDiUVGM0CUJNbextsE1fiyLPIP7uzafdnL2unNAuVDISiGwq6p','0000-00-00 00:00:00','2017-12-11 20:58:51',''),(4,'Admin','','demo@ionic.com','$2y$10$vbQE1Lbu1kXCAILSvaH0uOZ3oA6oZdCf/0kjQB16iGnjc3eTaFBeu',1,'address','Nivada','12','31271','223','+92 314 6681998','resources/views/admin/images/admin_profile/1505132393.1486628854.fast.jpg',1,'fKgKDWq2EOujXJyZjYk3j7moCzpjLBccKw8bGDP1FUKrWPpvvXmpsjn1CFcz',NULL,NULL,''),(5,'Vector','Coder','vectorcoder@gmail.com','$2y$10$TKJBNrT7bkFqz49XazJL7.mTa49DI9CeCcZipjuFer1h.OeZWsaHC',1,'228 Park Ave S','New York','1','10003','223','+1 656 458 787 87','resources/views/admin/images/admin_profile/1505132393.1486628854.fast.jpg',1,'AEuL3ix3r4xQpW1yvYYWsyojhRXnFobPWrWdYVLNI7BzQjUTGVyFjHt16nxY',NULL,'2018-02-07 07:54:49',''),(6,'Admin','','demo@ecommerce.com','$2y$10$vbQE1Lbu1kXCAILSvaH0uOZ3oA6oZdCf/0kjQB16iGnjc3eTaFBeu',1,'address','Nivada','1','10003','223','+1 656 458 787 87','resources/views/admin/images/admin_profile/1505132393.1486628854.fast.jpg',1,NULL,NULL,NULL,'');
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alert_settings`
--

DROP TABLE IF EXISTS `alert_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `alert_settings` (
  `alert_id` int(100) NOT NULL AUTO_INCREMENT,
  `create_customer_email` tinyint(1) NOT NULL DEFAULT '0',
  `create_customer_notification` tinyint(1) NOT NULL DEFAULT '0',
  `order_status_email` tinyint(1) NOT NULL DEFAULT '0',
  `order_status_notification` tinyint(1) NOT NULL DEFAULT '0',
  `new_product_email` tinyint(1) NOT NULL DEFAULT '0',
  `new_product_notification` tinyint(1) NOT NULL DEFAULT '0',
  `forgot_email` tinyint(1) NOT NULL DEFAULT '0',
  `forgot_notification` tinyint(1) NOT NULL DEFAULT '0',
  `news_email` tinyint(1) NOT NULL DEFAULT '0',
  `news_notification` tinyint(1) NOT NULL DEFAULT '0',
  `contact_us_email` tinyint(1) NOT NULL DEFAULT '0',
  `contact_us_notification` tinyint(1) NOT NULL DEFAULT '0',
  `order_email` tinyint(1) NOT NULL DEFAULT '0',
  `order_notification` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`alert_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alert_settings`
--

LOCK TABLES `alert_settings` WRITE;
/*!40000 ALTER TABLE `alert_settings` DISABLE KEYS */;
INSERT INTO `alert_settings` VALUES (1,0,1,0,1,0,1,0,1,0,1,0,0,0,0);
/*!40000 ALTER TABLE `alert_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_calls_list`
--

DROP TABLE IF EXISTS `api_calls_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `api_calls_list` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nonce` text NOT NULL,
  `url` varchar(64) NOT NULL,
  `device_id` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_calls_list`
--

LOCK TABLES `api_calls_list` WRITE;
/*!40000 ALTER TABLE `api_calls_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_calls_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `code` char(5) COLLATE utf8_general_mysql500_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'新界','NT1',1,'2019-01-19 23:58:20',NULL,'2019-02-24 17:17:28',NULL,'active'),(2,'AreaCode1','Area1',2,'2019-02-28 23:58:03',NULL,'2019-05-13 02:01:30',NULL,'active'),(3,'','',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',NULL,''),(4,'','',0,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',NULL,'');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `banners` (
  `banners_id` int(11) NOT NULL AUTO_INCREMENT,
  `banners_title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `banners_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banners_image` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `banners_group` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `banners_html_text` mediumtext COLLATE utf8_unicode_ci,
  `expires_impressions` int(7) DEFAULT '0',
  `expires_date` datetime DEFAULT NULL,
  `date_scheduled` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `date_status_change` datetime DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banners_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`banners_id`),
  KEY `idx_banners_group` (`banners_group`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,'banner-1','7','resources/assets/images/banner_images/1504099866.banner_1.jpg','',NULL,0,'2030-01-01 00:00:00',NULL,'2017-08-30 13:31:06','2017-08-30 13:31:06',1,'category',''),(2,'Banner-2','12','resources/assets/images/banner_images/1502370343.banner_2.jpg','',NULL,0,'2020-01-01 00:00:00',NULL,'2017-08-10 13:05:43',NULL,1,'category',''),(3,'Banner-3','23','resources/assets/images/banner_images/1502370366.banner_3.jpg','',NULL,0,'2030-01-01 00:00:00',NULL,'2017-08-10 13:06:06',NULL,1,'category',''),(4,'Banner-4','17','resources/assets/images/banner_images/1502370387.banner_4.jpg','',NULL,0,'2030-01-01 00:00:00',NULL,'2017-08-10 13:06:27',NULL,1,'category',''),(5,'Banner-5','19','resources/assets/images/banner_images/1502370406.banner_5.jpg','',NULL,0,'2030-01-01 00:00:00',NULL,'2017-08-10 13:06:46',NULL,1,'category','');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners_history`
--

DROP TABLE IF EXISTS `banners_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `banners_history` (
  `banners_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `banners_id` int(11) NOT NULL,
  `banners_shown` int(5) NOT NULL DEFAULT '0',
  `banners_clicked` int(5) NOT NULL DEFAULT '0',
  `banners_history_date` datetime NOT NULL,
  PRIMARY KEY (`banners_history_id`),
  KEY `idx_banners_history_banners_id` (`banners_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners_history`
--

LOCK TABLES `banners_history` WRITE;
/*!40000 ALTER TABLE `banners_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `banners_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` mediumtext COLLATE utf8_unicode_ci,
  `icon` mediumtext COLLATE utf8_unicode_ci,
  `sort_order` int(3) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'resources/assets/images/category_images/1557766530.螢幕截圖 2019-05-11 下午2.05.14.png','resources/assets/images/category_icons/1557762999.螢幕截圖 2019-05-11 下午2.05.04.png',NULL,NULL,'2019-05-13 23:55:56',NULL,'2019-05-17 14:05:26',NULL,'active'),(4,'resources/assets/images/category_images/1557767383.螢幕截圖 2019-05-11 下午2.04.53.png','resources/assets/images/category_icons/1558067666.Screenshot_2019-05-16-17-39-07-522_com.android.settings.png',NULL,NULL,'2019-05-14 01:09:43',NULL,'2019-05-17 14:05:10',NULL,'active'),(9,'resources/assets/images/category_images/1558079165.Screenshot_2019-05-17-15-21-51-154_com.instagram.android.png',NULL,NULL,NULL,'2019-05-17 14:05:48',NULL,'2019-06-04 16:22:02',NULL,'active');
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
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`category_description_id`),
  KEY `idx_categories_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_description`
--

LOCK TABLES `category_description` WRITE;
/*!40000 ALTER TABLE `category_description` DISABLE KEYS */;
INSERT INTO `category_description` VALUES (1,'Categhk',1,1,'2019-05-13 23:55:56',NULL,'2019-05-17 14:05:26',NULL,'active'),(2,'abc123',2,1,'2019-05-13 23:55:56',NULL,'2019-05-17 14:05:26',NULL,'active'),(5,'Category2',1,4,'2019-05-14 01:09:43',NULL,'2019-05-17 14:05:10',NULL,'active'),(14,'216',2,4,'2019-05-17 14:05:04',NULL,'2019-05-17 14:05:10',NULL,'active'),(15,'12手11',1,9,'2019-05-17 14:05:48',NULL,'2019-06-04 16:22:02',NULL,'active'),(16,'3232',2,9,'2019-05-17 14:05:48',NULL,'2019-06-04 16:22:02',NULL,'active');
/*!40000 ALTER TABLE `category_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `code` char(5) COLLATE utf8_general_mysql500_ci NOT NULL,
  `countries_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'HongKong','HK',1,'2019-01-19 23:16:53',NULL,'2019-02-01 00:06:54',NULL,'active'),(2,'japan city1','japa1',2,'2019-02-27 23:45:54',NULL,'2019-05-13 02:01:22',NULL,'active');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iso_code_1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iso_code_2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_format_id` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) NOT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_COUNTRIES_NAME` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'China','CH1','AFG',1,'2019-01-31 22:32:17',0,'2019-02-24 02:08:27',NULL,'active'),(2,'Japan1','Japan',NULL,NULL,'2019-02-27 23:45:36',0,'2019-05-13 02:01:05',NULL,'active'),(16,'Country','CountryCod',NULL,NULL,'2019-05-14 01:57:04',0,'2019-05-14 01:57:04',NULL,'active');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `coupons` (
  `coupans_id` int(100) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `discount_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Options: fixed_cart, percent, fixed_product and percent_product. Default: fixed_cart.',
  `amount` int(11) NOT NULL,
  `expiry_date` datetime NOT NULL,
  `usage_count` int(100) NOT NULL,
  `individual_use` tinyint(1) NOT NULL DEFAULT '0',
  `product_ids` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exclude_product_ids` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usage_limit` int(100) NOT NULL,
  `usage_limit_per_user` int(100) NOT NULL,
  `limit_usage_to_x_items` int(100) NOT NULL,
  `free_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `product_categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excluded_product_categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exclude_sale_items` tinyint(1) NOT NULL DEFAULT '0',
  `minimum_amount` decimal(10,2) NOT NULL,
  `maximum_amount` decimal(10,2) NOT NULL,
  `email_restrictions` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `used_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`coupans_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `currencies` (
  `currencies_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `code` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `symbol_left` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symbol_right` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `decimal_point` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thousands_point` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `decimal_places` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` float(13,8) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`currencies_id`),
  KEY `idx_currencies_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'U.S. Dollar','USD','$',NULL,'.','.','2',NULL,'2017-02-09 00:00:00'),(2,'Euro','EUR',NULL,'€','.','.','2',NULL,NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_gender` char(1) COLLATE utf8_unicode_ci DEFAULT '0',
  `customers_firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customers_lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_dob` date DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customers_default_address_id` int(11) DEFAULT NULL,
  `customers_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customers_fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `customers_newsletter` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_picture` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `idx_customers_email_address` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (4,'1','Jamie','User','2018-11-09','jamie951123@gmail.com','',NULL,'53403540','344444','123123',NULL,NULL,NULL,'',1,'','0000-00-00 00:00:00',NULL,'2019-04-01 00:20:39',NULL,'active'),(12,'1','12321','12321','2019-04-22','admin332@gmail.com','',NULL,'1234','344444','',NULL,NULL,NULL,'resources/assets/images/user_profile/1557598057.螢幕截圖 2019-05-11 下午2.05.14.png',0,'','2019-04-01 00:29:50',NULL,'2019-05-12 02:07:37',NULL,'active'),(13,'F','12321','12321','1900-12-27','wqewq@gmail.com','',NULL,'2213213213','44444444','',NULL,NULL,NULL,'resources/assets/images/user_profile/1557685439.螢幕截圖 2019-05-11 下午2.05.04.png',0,'','2019-05-12 02:06:01',NULL,'2019-05-13 02:23:59',NULL,'active'),(14,'','test','test','0000-00-00','admin1232131@gmail.com','',NULL,'','','123213',NULL,NULL,NULL,'resources/assets/images/user_profile/1557685921.螢幕截圖 2019-05-11 下午2.05.14.png',0,'','2019-05-13 02:32:01',NULL,'2019-05-13 02:32:01',NULL,'active');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers_basket`
--

DROP TABLE IF EXISTS `customers_basket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `customers_basket` (
  `customers_basket_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL,
  `products_id` text COLLATE utf8_unicode_ci NOT NULL,
  `customers_basket_quantity` int(2) NOT NULL,
  `final_price` decimal(15,4) DEFAULT NULL,
  `customers_basket_date_added` char(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_order` tinyint(1) NOT NULL DEFAULT '0',
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`customers_basket_id`),
  KEY `idx_customers_basket_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers_basket`
--

LOCK TABLES `customers_basket` WRITE;
/*!40000 ALTER TABLE `customers_basket` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers_basket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers_basket_attributes`
--

DROP TABLE IF EXISTS `customers_basket_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `customers_basket_attributes` (
  `customers_basket_attributes_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_basket_id` int(100) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `products_id` text COLLATE utf8_unicode_ci NOT NULL,
  `products_options_id` int(11) NOT NULL,
  `products_options_values_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`customers_basket_attributes_id`),
  KEY `idx_customers_basket_att_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers_basket_attributes`
--

LOCK TABLES `customers_basket_attributes` WRITE;
/*!40000 ALTER TABLE `customers_basket_attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers_basket_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers_info`
--

DROP TABLE IF EXISTS `customers_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `customers_info` (
  `customers_info_id` int(11) NOT NULL,
  `customers_info_date_of_last_logon` datetime DEFAULT NULL,
  `customers_info_number_of_logons` int(5) DEFAULT NULL,
  `customers_info_date_account_created` datetime DEFAULT NULL,
  `customers_info_date_account_last_modified` datetime DEFAULT NULL,
  `global_product_notifications` int(1) DEFAULT '0',
  PRIMARY KEY (`customers_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers_info`
--

LOCK TABLES `customers_info` WRITE;
/*!40000 ALTER TABLE `customers_info` DISABLE KEYS */;
INSERT INTO `customers_info` VALUES (1,'2017-08-30 13:48:39',NULL,'2017-08-15 08:48:18','2017-08-15 08:52:17',1),(2,'2017-08-25 20:23:21',1,'2017-08-25 20:23:21',NULL,1),(3,'2017-09-08 10:06:03',4,'2017-09-07 13:05:38',NULL,1),(4,'2018-11-07 17:09:05',25,'2017-09-07 12:45:36','2018-11-09 06:09:12',1),(5,'2018-11-17 08:16:21',9,'2018-11-14 15:51:54','2018-11-19 02:06:40',1);
/*!40000 ALTER TABLE `customers_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `devices` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `device_id` text COLLATE utf8_unicode_ci NOT NULL,
  `customers_id` int(100) NOT NULL DEFAULT '0',
  `device_type` text COLLATE utf8_unicode_ci NOT NULL,
  `register_date` int(100) NOT NULL DEFAULT '0',
  `update_date` int(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `isDesktop` tinyint(1) NOT NULL DEFAULT '0',
  `onesignal` tinyint(1) NOT NULL DEFAULT '0',
  `isEnableMobile` tinyint(1) NOT NULL DEFAULT '1',
  `isEnableDesktop` tinyint(1) NOT NULL DEFAULT '1',
  `ram` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `processor` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_os` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_notify` tinyint(1) NOT NULL DEFAULT '1',
  `fcm` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `code` char(5) COLLATE utf8_general_mysql500_ci NOT NULL,
  `area_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `district`
--

LOCK TABLES `district` WRITE;
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` VALUES (1,'1','Code1',1,'2019-01-21 23:33:26',NULL,'2019-03-01 00:14:16',NULL,'active'),(8,'2','123',1,'2019-02-25 00:21:32',NULL,'2019-03-01 00:14:20',NULL,'active'),(9,'31','31',2,'2019-03-01 00:07:35',NULL,'2019-05-13 02:01:49',NULL,'active');
/*!40000 ALTER TABLE `district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fedex_shipping`
--

DROP TABLE IF EXISTS `fedex_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `fedex_shipping` (
  `fedex_id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parcel_height` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parcel_width` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_package` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fedex_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fedex_shipping`
--

LOCK TABLES `fedex_shipping` WRITE;
/*!40000 ALTER TABLE `fedex_shipping` DISABLE KEYS */;
INSERT INTO `fedex_shipping` VALUES (1,'FedEx','','','','','','','','','','','','','','');
/*!40000 ALTER TABLE `fedex_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flate_rate`
--

DROP TABLE IF EXISTS `flate_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `flate_rate` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `flate_rate` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flate_rate`
--

LOCK TABLES `flate_rate` WRITE;
/*!40000 ALTER TABLE `flate_rate` DISABLE KEYS */;
INSERT INTO `flate_rate` VALUES (1,'10','USD');
/*!40000 ALTER TABLE `flate_rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `geo_zones`
--

DROP TABLE IF EXISTS `geo_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `geo_zones` (
  `geo_zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `geo_zone_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `geo_zone_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`geo_zone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geo_zones`
--

LOCK TABLES `geo_zones` WRITE;
/*!40000 ALTER TABLE `geo_zones` DISABLE KEYS */;
INSERT INTO `geo_zones` VALUES (1,'Florida','Florida local sales tax zone','2017-01-10 00:00:00','2017-01-11 00:00:00');
/*!40000 ALTER TABLE `geo_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hula_our_infos`
--

DROP TABLE IF EXISTS `hula_our_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `hula_our_infos` (
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hula_our_infos`
--

LOCK TABLES `hula_our_infos` WRITE;
/*!40000 ALTER TABLE `hula_our_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `hula_our_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `label_value`
--

DROP TABLE IF EXISTS `label_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `label_value` (
  `label_value_id` int(100) NOT NULL AUTO_INCREMENT,
  `label_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language_id` int(100) DEFAULT NULL,
  `label_id` int(100) DEFAULT NULL,
  PRIMARY KEY (`label_value_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1501 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `label_value`
--

LOCK TABLES `label_value` WRITE;
/*!40000 ALTER TABLE `label_value` DISABLE KEYS */;
INSERT INTO `label_value` VALUES (1372,'Most Liked',1,956),(1371,'Special',1,957),(1370,'Top Seller',1,958),(1369,'Newest ',1,959),(1368,'Likes',1,960),(1366,'Mobile',1,962),(1367,'My Account',1,961),(1365,'Date of Birth',1,963),(1364,'Update',1,964),(1355,'Orders ID',1,970),(1356,'Product Price',1,971),(1357,'No. of Products',1,972),(1358,'Date',1,973),(1359,'Customer Address',1,974),(1360,'Customer Orders',1,968),(1361,'Change Password',1,967),(1362,'New Password',1,966),(1363,'Current Password',1,965),(1354,'Order Status',1,969),(1353,'Please add your new shipping address for the futher processing of the your order',1,975),(1352,'Add new Address',1,976),(1351,'Create an Account',1,977),(1350,'First Name',1,978),(1349,'Last Name',1,979),(1348,'Already Memeber?',1,980),(1341,'Billing Address',1,987),(1342,'Order',1,986),(1343,'Next',1,985),(1344,'Same as Shipping Address',1,984),(1345,'Billing Info',1,981),(1346,'Address',1,982),(1347,'Phone',1,983),(1339,'Products',1,989),(1340,'Shipping Method',1,988),(1334,'Order Notes',1,994),(1335,'Shipping Cost',1,993),(1336,'Tax',1,992),(1337,'Products Price',1,991),(1338,'SubTotal',1,990),(1333,'Payment',1,995),(1332,'Card Number',1,996),(1331,'Expiration Date',1,997),(1330,'Expiration',1,998),(1329,'Error: invalid card number!',1,999),(1328,'Error: invalid expiry date!',1,1000),(1327,'Error: invalid cvc number!',1,1001),(1326,'Continue',1,1002),(1325,'My Cart',1,1003),(1324,'Your cart is empty',1,1004),(1323,'continue shopping',1,1005),(1322,'Price',1,1006),(1318,'Remove',1,1010),(1319,'by',1,1008),(1320,'View',1,1009),(1321,'Quantity',1,1007),(1317,'Proceed',1,1011),(1315,'Country',1,1013),(1316,'Shipping Address',1,1012),(1313,'Zone',1,1015),(1314,'other',1,1014),(1311,'Post code',1,1017),(1312,'City',1,1016),(1309,'State',1,1018),(1310,'Update Address',1,1019),(1307,'login & Register',1,1021),(1308,'Save Address',1,1020),(1306,'Please login or create an account for free',1,1022),(1305,'Log Out',1,1023),(1304,'My Wish List',1,1024),(1303,'Filters',1,1025),(1302,'Price Range',1,1026),(1301,'Close',1,1027),(1299,'Clear',1,1029),(1300,'Apply',1,1028),(1298,'Menu',1,1030),(1297,'Home',1,1031),(1373,'Cancel',1,955),(1374,'Sort Products',1,954),(1375,'Special Products',1,953),(1376,'Price : low - high',1,952),(1377,'Price : high - low',1,951),(1378,'Z - A',1,950),(1379,'A - Z',1,949),(1380,'All',1,948),(1381,'Explore More',1,947),(1382,'Note to the buyer',1,946),(1383,'Coupon',1,945),(1384,'coupon code',1,944),(1385,'Coupon Amount',1,943),(1386,'Coupon Code',1,942),(1387,'Food Categories',1,941),(1388,'Recipe of Day',1,940),(1389,'Top Dishes',1,939),(1390,'Skip',1,938),(1391,'Term and Services',1,937),(1392,'Privacy Policy',1,936),(1393,'Refund Policy',1,935),(1394,'Newest',1,934),(1395,'OUT OF STOCK',1,933),(1396,'Select Language',1,932),(1397,'Reset',1,931),(1398,'Shop',1,930),(1399,'Settings',1,929),(1400,'Enter keyword',1,928),(1401,'News',1,927),(1402,'Top Sellers',1,926),(1403,'Go Back',1,925),(1404,'Word Press Post Detail',1,924),(1405,'Explore',1,923),(1406,'Continue Adding',1,922),(1407,'Your wish List is empty',1,921),(1408,'Favourite',1,920),(1409,'Continue Shopping',1,919),(1410,'My Orders',1,918),(1411,'Thank you for shopping with us.',1,917),(1412,'Thank You',1,916),(1413,'Shipping method',1,915),(1414,'Sub Categories',1,914),(1415,'Main Categories',1,913),(1416,'Search',1,912),(1417,'Reset Filters',1,911),(1418,'No Products Found',1,910),(1419,'OFF',1,909),(1420,'Techincal details',1,908),(1421,'Product Description',1,907),(1422,'ADD TO CART',1,906),(1423,'Add to Cart',1,905),(1424,'In Stock',1,904),(1425,'Out of Stock',1,903),(1426,'New',1,902),(1427,'Product Details',1,901),(1428,'Shipping',1,900),(1429,'Sub Total',1,899),(1430,'Total',1,898),(1431,'Price Detail',1,897),(1432,'Order Detail',1,896),(1433,'Got It!',1,895),(1434,'Skip Intro',1,894),(1435,'Intro',1,893),(1436,'REMOVE',1,892),(1437,'Deals',1,891),(1438,'All Categories',1,890),(1439,'Most Liked',1,889),(1440,'Special Deals',1,888),(1441,'Top Seller',1,887),(1442,'Products are available.',1,886),(1443,'Recently Viewed',1,885),(1444,'Please connect to the internet',1,884),(1445,'Contact Us',1,881),(1446,'Name',1,882),(1447,'Your Message',1,883),(1448,'Categories',1,880),(1449,'About Us',1,879),(1450,'Send',1,878),(1451,'Forgot Password',1,877),(1452,'Register',1,876),(1453,'Password',1,875),(1454,'Email',1,874),(1455,'or',1,873),(1456,'Login with',1,872),(1457,'Creating an account means you\'re okay with shopify\'s Terms of Service, Privacy Policy',1,2),(1458,'I\'ve forgotten my password?',1,1),(1459,NULL,1,NULL),(1462,'Creating an account means you’re okay with our',1,1033),(1465,'Login',1,1034),(1468,'Turn on/off Local Notifications',1,1035),(1471,'Turn on/off Notifications',1,1036),(1474,'Change Language',1,1037),(1477,'Official Website',1,1038),(1480,'Rate Us',1,1039),(1483,'Share',1,1040),(1486,'Edit Profile',1,1041),(1489,'A percentage discount for the entire cart',1,1042),(1492,'A fixed total discount for the entire cart',1,1043),(1495,'A fixed total discount for selected products only',1,1044),(1498,'A percentage discount for selected products only',1,1045);
/*!40000 ALTER TABLE `label_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `labels`
--

DROP TABLE IF EXISTS `labels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `labels` (
  `label_id` int(100) NOT NULL AUTO_INCREMENT,
  `label_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`label_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1046 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labels`
--

LOCK TABLES `labels` WRITE;
/*!40000 ALTER TABLE `labels` DISABLE KEYS */;
INSERT INTO `labels` VALUES (2,'Creating an account means you’re okay with shopify\'s Terms of Service, Privacy Policy'),(1031,'Home'),(1,'I\'ve forgotten my password?'),(1030,'Menu'),(1029,'Clear'),(1028,'Apply'),(1027,'Close'),(1026,'Price Range'),(1025,'Filters'),(1024,'My Wish List'),(1023,'Log Out'),(1022,'Please login or create an account for free'),(1021,'Login & Register'),(1020,'Save Address'),(1018,'State'),(1019,'Update Address'),(1017,'Post code'),(1016,'City'),(1015,'Zone'),(1014,'other'),(1013,'Country'),(1012,'Shipping Address'),(1011,'Proceed'),(1010,'Remove'),(1008,'by'),(1009,'View'),(1007,'Quantity'),(1006,'Price'),(1005,'continue shopping'),(1004,'Your cart is empty'),(1003,'My Cart'),(1002,'Continue'),(1001,'Error: invalid cvc number!'),(1000,'Error: invalid expiry date!'),(999,'Error: invalid card number!'),(998,'Expiration'),(997,'Expiration Date'),(996,'Card Number'),(995,'Payment'),(994,'Order Notes'),(993,'Shipping Cost'),(992,'Tax'),(991,'Products Price'),(990,'SubTotal'),(989,'Products'),(988,'Shipping Method'),(987,'Billing Address'),(986,'Order'),(985,'Next'),(984,'Same as Shipping Address'),(981,'Billing Info'),(982,'Address'),(983,'Phone'),(980,'Already Memeber?'),(979,'Last Name'),(978,'First Name'),(977,'Create an Account'),(976,'Add new Address'),(975,'Please add your new shipping address for the futher processing of the your order'),(969,'Order Status'),(970,'Orders ID'),(971,'Product Price'),(972,'No. of Products'),(973,'Date'),(974,'Customer Address'),(968,'Customer Orders'),(967,'Change Password'),(966,'New Password'),(965,'Current Password'),(964,'Update'),(963,'Date of Birth'),(962,'Mobile'),(961,'My Account'),(960,'Likes'),(959,'newest'),(958,'top seller'),(957,'special'),(956,'most liked'),(955,'Cancel'),(954,'Sort Products'),(953,'Special Products'),(952,'Price : low - high'),(951,'Price : high - low'),(950,'Z - A'),(949,'A - Z'),(948,'All'),(947,'Explore More'),(946,'Note to the buyer'),(945,'Coupon'),(944,'coupon code'),(943,'Coupon Amount'),(942,'Coupon Code'),(941,'Food Categories'),(940,'Recipe of Day'),(939,'Top Dishes'),(938,'Skip'),(937,'Term and Services'),(936,'Privacy Policy'),(935,'Refund Policy'),(934,'Newest'),(933,'OUT OF STOCK'),(932,'Select Language'),(931,'Reset'),(930,'Shop'),(929,'Settings'),(928,'Enter keyword'),(927,'News'),(926,'Top Sellers'),(925,'Go Back'),(924,'Word Press Post Detail'),(923,'Explore'),(922,'Continue Adding'),(921,'Your wish List is empty'),(920,'Favourite'),(919,'Continue Shopping'),(918,'My Orders'),(917,'Thank you for shopping with us.'),(916,'Thank You'),(915,'Shipping method'),(914,'Sub Categories'),(913,'Main Categories'),(912,'Search'),(911,'Reset Filters'),(910,'No Products Found'),(909,'OFF'),(908,'Techincal details'),(907,'Product Description'),(906,'ADD TO CART'),(905,'Add to Cart'),(904,'In Stock'),(903,'Out of Stock'),(902,'New'),(901,'Product Details'),(900,'Shipping'),(899,'Sub Total'),(898,'Total'),(897,'Price Detail'),(896,'Order Detail'),(895,'Got It!'),(894,'Skip Intro'),(893,'Intro'),(892,'REMOVE'),(891,'Deals'),(890,'All Categories'),(889,'Most Liked'),(888,'Special Deals'),(887,'Top Seller'),(886,'Products are available.'),(885,'Recently Viewed'),(884,'Please connect to the internet'),(881,'Contact Us'),(882,'Name'),(883,'Your Messsage'),(880,'Categories'),(879,'About Us'),(878,'Send'),(877,'Forgot Password'),(876,'Register'),(875,'Password'),(874,'Email'),(873,'or'),(872,'Login with'),(1033,'Creating an account means you’re okay with our'),(1034,'Login'),(1035,'Turn on/off Local Notifications'),(1036,'Turn on/off Notifications'),(1037,'Change Language'),(1038,'Official Website'),(1039,'Rate Us'),(1040,'Share'),(1041,'Edit Profile'),(1042,'A percentage discount for the entire cart'),(1043,'A fixed total discount for the entire cart'),(1044,'A fixed total discount for selected products only'),(1045,'A percentage discount for selected products only');
/*!40000 ALTER TABLE `labels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `languages` (
  `languages_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8_unicode_ci,
  `directory` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(3) DEFAULT NULL,
  `direction` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`languages_id`),
  KEY `IDX_LANGUAGES_NAME` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'HongKong','hk','resources/assets/images/language_flags/1541783039.HK.png','hongkong',NULL,'rtl',1),(2,'English','eg','resources/assets/images/language_flags/1541783039.HK.png','English',NULL,'rtl',1);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liked_products`
--

DROP TABLE IF EXISTS `liked_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `liked_products` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `liked_products_id` int(100) NOT NULL,
  `liked_customers_id` int(100) NOT NULL,
  `date_liked` datetime DEFAULT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liked_products`
--

LOCK TABLES `liked_products` WRITE;
/*!40000 ALTER TABLE `liked_products` DISABLE KEYS */;
INSERT INTO `liked_products` VALUES (10,79,1,'2017-08-22 07:51:10'),(11,78,1,'2017-08-22 07:51:13'),(12,1,3,'2017-09-07 12:25:48'),(13,2,3,'2017-09-07 12:25:52'),(14,4,3,'2017-09-07 12:25:55'),(15,80,3,'2017-09-08 10:09:40'),(16,79,3,'2017-09-08 10:09:43'),(17,78,3,'2017-09-08 10:09:44'),(18,81,3,'2017-09-08 10:09:46'),(20,80,4,'2018-08-28 09:31:30'),(21,81,4,'2018-09-23 15:37:56'),(22,82,5,'2018-11-17 08:18:39');
/*!40000 ALTER TABLE `liked_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text COLLATE utf8_general_mysql500_ci,
  `image` mediumtext COLLATE utf8_general_mysql500_ci,
  `slug` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer`
--

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` VALUES (1,'https://ionicframework.com/docs/installation/environment','resources/assets/images/manufacturer/1558087365.IMG-20190517-WA0005.jpg',NULL,'2019-05-13 23:55:56',NULL,'2019-05-17 18:03:07',NULL,'active');
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturer_description`
--

DROP TABLE IF EXISTS `manufacturer_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `manufacturer_description` (
  `manufacturer_description_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_general_mysql500_ci NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `manufacturer_id` int(11) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`manufacturer_description_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer_description`
--

LOCK TABLES `manufacturer_description` WRITE;
/*!40000 ALTER TABLE `manufacturer_description` DISABLE KEYS */;
INSERT INTO `manufacturer_description` VALUES (1,'manufactuerer done',1,1,'2019-05-13 23:55:56',NULL,'2019-05-17 18:03:07',NULL,''),(2,'english123w',2,1,'2019-05-13 23:55:56',NULL,'2019-05-17 18:03:07',NULL,'');
/*!40000 ALTER TABLE `manufacturer_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturers_info`
--

DROP TABLE IF EXISTS `manufacturers_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `manufacturers_info` (
  `manufacturers_id` int(11) NOT NULL,
  `languages_id` int(11) NOT NULL,
  `manufacturers_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_clicked` int(5) NOT NULL DEFAULT '0',
  `date_last_click` datetime DEFAULT NULL,
  PRIMARY KEY (`manufacturers_id`,`languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturers_info`
--

LOCK TABLES `manufacturers_info` WRITE;
/*!40000 ALTER TABLE `manufacturers_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `manufacturers_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_image` mediumtext COLLATE utf8_unicode_ci,
  `news_date_added` datetime NOT NULL,
  `news_last_modified` datetime DEFAULT NULL,
  `news_status` tinyint(1) NOT NULL,
  `is_feature` tinyint(1) NOT NULL DEFAULT '0',
  `news_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`news_id`),
  KEY `idx_products_date_added` (`news_date_added`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (5,'resources/assets/images/news_images/1502109905.h.png','2017-08-07 12:45:05',NULL,1,0,''),(6,'resources/assets/images/news_images/1503929511.banner-3.png','2017-08-22 06:36:32','2017-08-28 02:11:51',1,1,''),(7,'resources/assets/images/news_images/1503929570.banner-4.png','2017-08-22 07:00:29','2017-08-28 02:12:50',1,1,''),(8,'resources/assets/images/news_images/1504092360.about.svg','2017-08-22 07:03:16','2017-08-30 11:26:00',1,0,''),(9,'resources/assets/images/news_images/1504092640.laravel2.svg','2017-08-22 07:57:33','2017-08-30 11:30:40',1,0,''),(10,'resources/assets/images/news_images/1504092240.ionic.svg','2017-08-22 07:59:33','2017-08-30 11:24:00',1,0,''),(11,'resources/assets/images/news_images/1504091780.restaurant.svg','2017-08-22 08:04:29','2017-08-30 11:16:20',1,0,''),(12,'resources/assets/images/news_images/1504091963.fashion.svg','2017-08-22 08:06:23','2017-08-30 11:19:23',1,0,''),(13,'resources/assets/images/news_images/1504092054.electronics.svg','2017-08-22 08:07:23','2017-08-30 11:20:54',1,0,''),(14,'resources/assets/images/news_images/1504091642.language.svg','2017-08-22 08:10:39','2017-08-30 11:14:02',1,0,''),(15,'resources/assets/images/news_images/1504091465.payment.svg','2017-08-22 08:15:16','2017-08-30 11:11:05',1,0,''),(16,'resources/assets/images/news_images/1504091072.push_notifications.svg','2017-08-22 08:17:28','2017-08-30 11:04:32',1,0,''),(17,'resources/assets/images/news_images/1504091049.local_notifications.svg','2017-08-22 08:18:08','2017-08-30 11:04:09',1,0,''),(18,'resources/assets/images/news_images/1504091024.products.svg','2017-08-22 08:18:51','2017-08-30 11:03:44',1,0,''),(19,'resources/assets/images/news_images/1504091001.social.svg','2017-08-22 08:19:35','2017-08-30 11:03:21',1,0,''),(20,'resources/assets/images/news_images/1504090986.shipping_method.svg','2017-08-22 08:22:33','2017-08-30 11:03:06',1,0,''),(21,'resources/assets/images/news_images/1504090941.theme.svg','2017-08-22 08:23:22','2017-08-30 11:02:21',1,0,''),(22,'resources/assets/images/news_images/1504090926.coupon_support.svg','2017-08-22 10:52:53','2017-08-30 11:02:06',1,0,''),(23,'resources/assets/images/news_images/1504090906.profile_pic.svg','2017-08-22 10:53:45','2017-08-30 11:01:46',1,0,''),(24,'resources/assets/images/news_images/1504090888.social_share.svg','2017-08-22 10:54:24','2017-08-30 11:01:28',1,0,''),(25,'resources/assets/images/news_images/1504090868.wishlist.svg','2017-08-22 10:55:13','2017-08-30 11:01:08',1,0,''),(26,'resources/assets/images/news_images/1504088925.wordpress.svg','2017-08-22 10:56:15','2017-08-30 10:28:45',1,0,''),(27,'resources/assets/images/news_images/1504088895.app_tutorial.svg','2017-08-22 10:56:55','2017-08-30 10:28:15',1,0,''),(28,'resources/assets/images/news_images/1504088865.price_filter.svg','2017-08-22 10:59:38','2017-08-30 10:27:45',1,0,''),(29,'resources/assets/images/news_images/1504088836.sorting.svg','2017-08-22 11:03:06','2017-08-30 10:27:16',1,0,''),(30,'resources/assets/images/news_images/1504088735.product_searching.svg','2017-08-22 11:03:53','2017-08-30 10:25:35',1,0,''),(31,'resources/assets/images/news_images/1504088705.fully_customizable.svg','2017-08-22 11:04:34','2017-08-30 10:25:05',1,0,''),(32,'resources/assets/images/news_images/1504087261.horizontal_Slider.svg','2017-08-22 11:09:25','2017-08-30 10:01:01',1,0,''),(33,'resources/assets/images/news_images/1504087219.customization.svg','2017-08-22 11:13:38','2017-08-30 10:00:19',1,0,''),(34,'resources/assets/images/news_images/1504087179.grid_list.svg','2017-08-22 11:14:16','2017-08-30 09:59:39',1,0,''),(35,'resources/assets/images/news_images/1504083663.home_page_styles.svg','2017-08-22 11:15:19','2017-08-30 09:01:03',1,0,''),(36,'resources/assets/images/news_images/1504015398.shop_page.svg','2017-08-22 11:16:24','2017-08-29 02:03:18',1,0,''),(37,'resources/assets/images/news_images/1504015381.my_orders.svg','2017-08-22 11:17:04','2017-08-29 02:03:01',1,0,''),(38,'resources/assets/images/news_images/1504015363.about_contact_pages.svg','2017-08-22 11:17:49','2017-08-29 02:02:43',1,0,''),(39,'resources/assets/images/news_images/1504083589.Asset 2.svg','2017-08-22 11:18:14','2017-08-30 08:59:49',1,0,''),(40,'resources/assets/images/news_images/1504015347.info_pages.svg','2017-08-22 11:18:53','2017-08-29 02:02:27',1,0,''),(41,'resources/assets/images/news_images/1504015330.app_settings.svg','2017-08-22 11:19:57','2017-08-29 02:02:10',1,0,''),(42,'resources/assets/images/news_images/1504015307.recently_item.svg','2017-08-22 11:24:05','2017-08-29 02:01:47',1,0,''),(43,'resources/assets/images/news_images/1504015288.move_to_top.svg','2017-08-22 11:24:47','2017-08-29 02:01:28',1,0,''),(44,'resources/assets/images/news_images/1504015272.product_price_discount.svg','2017-08-22 11:25:49','2017-08-29 02:01:12',1,0,''),(45,'resources/assets/images/news_images/1504015246.inventory_management.svg','2017-08-22 11:26:24','2017-08-29 02:00:46',1,0,''),(46,'resources/assets/images/news_images/1504013177.horizontal_Slider.svg','2017-08-22 11:26:59','2017-08-29 01:26:17',1,0,''),(47,'resources/assets/images/news_images/1504013161.on_scroll_product_loading.svg','2017-08-22 11:33:04','2017-08-29 01:26:01',1,0,''),(48,'resources/assets/images/news_images/1504013140.product_additional_attributes.svg','2017-08-22 11:36:02','2017-08-29 01:25:40',1,0,''),(49,'resources/assets/images/news_images/1504012761.multi_product_images.svg','2017-08-22 11:36:36','2017-08-29 01:19:21',1,0,''),(50,'resources/assets/images/news_images/1503928378.cart_page.svg','2017-08-22 11:37:11','2017-08-28 01:52:58',1,0,''),(51,'resources/assets/images/news_images/1503928065.shipping_managment.svg','2017-08-22 11:37:48','2017-08-28 01:47:45',1,0,''),(52,'resources/assets/images/news_images/1504083328.Asset 1.svg','2017-08-22 11:38:21','2017-08-30 08:55:28',1,0,''),(53,'resources/assets/images/news_images/1503927733.animtions.svg','2017-08-22 11:38:58','2017-08-28 01:42:38',1,0,'');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news_categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_image` mediumtext COLLATE utf8_unicode_ci,
  `categories_icon` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `news_categories_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`categories_id`),
  KEY `idx_categories_parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_categories`
--

LOCK TABLES `news_categories` WRITE;
/*!40000 ALTER TABLE `news_categories` DISABLE KEYS */;
INSERT INTO `news_categories` VALUES (6,'resources/assets/images/news_categories_images/1504092793.app_features.svg','',0,NULL,'2017-08-22 06:20:50','2017-08-30 11:33:13',''),(7,'resources/assets/images/news_categories_images/1504092906.introduction.svg','',0,NULL,'2017-08-22 06:22:50','2017-08-30 11:35:06',''),(8,'resources/assets/images/news_categories_images/1504092995.platform.svg','',0,NULL,'2017-08-22 06:30:31','2017-08-30 11:36:35',''),(9,'resources/assets/images/news_categories_images/1504093080.screenshots.svg','',0,NULL,'2017-08-22 06:31:50','2017-08-30 11:38:00','');
/*!40000 ALTER TABLE `news_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_categories_description`
--

DROP TABLE IF EXISTS `news_categories_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news_categories_description` (
  `categories_description_id` int(100) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `categories_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`categories_description_id`),
  KEY `idx_categories_name` (`categories_name`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_categories_description`
--

LOCK TABLES `news_categories_description` WRITE;
/*!40000 ALTER TABLE `news_categories_description` DISABLE KEYS */;
INSERT INTO `news_categories_description` VALUES (16,6,1,'App Features'),(17,6,2,'App Functies'),(18,6,4,'ميزات التطبيق'),(19,7,1,'Introduction'),(20,7,2,'Invoering'),(21,7,4,'المقدمة'),(22,8,1,'Platforms'),(23,8,2,'Platforms'),(24,8,4,'منصات'),(25,9,1,'Screen Shots'),(26,9,2,'Schermafbeeldingen'),(27,9,4,'لقطات الشاشة');
/*!40000 ALTER TABLE `news_categories_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_description`
--

DROP TABLE IF EXISTS `news_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news_description` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `news_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `news_description` text COLLATE utf8_unicode_ci,
  `news_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_viewed` int(5) DEFAULT '0',
  PRIMARY KEY (`news_id`,`language_id`),
  KEY `products_name` (`news_name`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_description`
--

LOCK TABLES `news_description` WRITE;
/*!40000 ALTER TABLE `news_description` DISABLE KEYS */;
INSERT INTO `news_description` VALUES (5,1,'Test Post','<p>Test PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest PostTest Post</p>\r\n',NULL,0),(5,2,'German Test Post','<p>German Test PostGerman Test PostGerman Test PostGerman Test PostGerman Test PostGerman Test PostGerman Test Post</p>\r\n',NULL,0),(5,4,'Arabic Test Post','<p>Arabic Test PostArabic Test PostArabic Test PostArabic Test PostArabic Test PostArabic Test PostArabic Test Post</p>\r\n',NULL,0),(6,1,'Why To choose this App for your Project?','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(6,2,'Waarom deze applicatie?','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(6,4,'لماذا هذا التطبيق؟','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(7,1,'Tools and Technology','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(7,2,'Gereedschap en technologie','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(7,4,'الأدوات والتكنولوجيا','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(8,1,'About Us','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(8,2,'Over ons','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(8,4,'معلومات عنا','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(9,1,'Laravel','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(9,2,'Laravel','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(9,4,'Laravel','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(10,1,'Ionic Framework','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(10,2,'Ionic Framework','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(10,4,'الإطار الأيوني','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(11,1,'Resturant','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(11,2,'Resturant','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(11,4,'المطعم','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(12,1,'Fashion','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(12,2,'Mode','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(12,4,'موضه','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(13,1,'Electronics','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(13,2,'Elektronica','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(13,4,'إلكترونيات','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(14,1,'Multi Language','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(14,2,'Multi Language','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(14,4,'متعدد اللغات','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(15,1,'Multiple Payment Gateways','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(15,2,'Meerdere betalingsgateways','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(15,4,'بوابات الدفع المتعددة','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(16,1,'Push Notifications','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(16,2,'Push Notifications','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(16,4,'دفع الإخطارات','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(17,1,'Local Notifications','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(17,2,'Lokale meldingen','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(17,4,'الإشعارات المحلية','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(18,1,'All Types of Products Friendly','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(18,2,'Alle soorten producten vriendelijk','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(18,4,'جميع أنواع المنتجات ودية','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(19,1,'Log-in via Social Accounts','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(19,2,'Inloggen via sociale accounts','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(19,4,'تسجيل الدخول عبر الحسابات الاجتماعية','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(20,1,'Multiple Shipping Methods','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(20,2,'Meerdere verzendmethoden','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(20,4,'طرق الشحن متعددة','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(21,1,'Interactive Theme & Easy Customization with SaSS','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(21,2,'Interactief thema en gemakkelijke aanpassing met SaSS','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(21,4,'موضوع التفاعلية وسهولة التخصيص مع ساس','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(22,1,'Coupon Support','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(22,2,'Coupon Ondersteuning','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(22,4,'دعم القسيمة','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(23,1,'Profile Picture','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(23,2,'Profielfoto','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(23,4,'الصوره الشخصيه','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(24,1,'Social Share','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(24,2,'Sociaal aandeel','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(24,4,'حصة الاجتماعي','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(25,1,'Wish List','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(25,2,'Wenslijst','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(25,4,'الأماني','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(26,1,'WordPress Blog','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(26,2,'WordPress Blog','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(26,4,'مدونة وورد','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(27,1,'App Tutorial / Intro Screens','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(27,2,'App Tutorial / Intro Screens','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(27,4,'التطبيق التعليمي / شاشات مقدمة','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(28,1,'Price & Keyword Filters','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(28,2,'Prijs- en sleutelwoordfilters','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(28,4,'السعر والكلمات الرئيسية الفلاتر','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(29,1,'Product Sorting','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(29,2,'Product sorteren','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(29,4,'فرز المنتجات','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(30,1,'Product Searching','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(30,2,'Product zoeken','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(30,4,'البحث عن المنتج','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(31,1,'Fully Customizable','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(31,2,'Volledig klantgericht','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(31,4,'تماما للتخصيص','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(32,1,'Horizontal Product Slider','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(32,2,'Horizontale Product Slider','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(32,4,'أفقي المنتج المنزلق','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(33,1,'Customizable Features & Functionalities','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(33,2,'Aanpasbare eigenschappen en functionaliteit','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(33,4,'الميزات والتخصيص وظائف','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(34,1,'Product Grid & List View','<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\\\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(34,2,'Product Grid & Lijstweergave','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(34,4,'شبكة المنتج وعرض القائمة','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \\\"ليتراسيت\\\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \\\"ألدوس بايج مايكر\\\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \\\"ليتراسيت\\\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \\\"ألدوس بايج مايكر\\\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \\\"ليتراسيت\\\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \\\"ألدوس بايج مايكر\\\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(35,1,'5 Home Page Styles','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(35,2,'5 Home Page Styles','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(35,4,'5 الصفحة الرئيسية أنماط','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(36,1,'Beautiful Single Shop Page For Complete Catalog','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(36,2,'Mooie single shop pagina voor complete catalogus','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(36,4,'جميلة صفحة واحدة متجر للكتالوج الكامل','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(37,1,'My Orders','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(37,2,'mijn bestellingen','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(37,4,'طلباتي','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(38,1,'About & Contact Pages','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(38,2,'Over & Contactpagina\'s','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(38,4,'حول الصفحات والاتصال','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(39,1,'Laravel Blog Pages','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(39,2,'Laravel blog pagina\'s','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(39,4,'صفحات لارافيل المدونة','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(40,1,'Info Pages','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(40,2,'Info pagina\'s','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(40,4,'صفحات المعلومات','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(41,1,'App Settings Page','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(41,2,'App Settings Page','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(41,4,'صفحة إعدادات التطبيق','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(42,1,'Recently Item Viewed Block on Home Page','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(42,2,'Onlangs Item bekeken Blok op Startpagina','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(42,4,'تم مؤخرا عرض العنصر بلوك أون هوم بادج','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(43,1,'Move to Top Slider Button','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(43,2,'Ga naar de bovenste schuifknop','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(43,4,'الانتقال إلى أعلى زر المنزلق','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(44,1,'Product Price Discount','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(44,2,'Productprijs korting','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(44,4,'خصم سعر المنتج','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(45,1,'Inventory Management','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(45,2,'ادارة المخزون','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(45,4,'Voorraadbeheer','<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &quot;ليتراسيت&quot; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &quot;ألدوس بايج مايكر&quot; (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(46,1,'Horizontal Slider on Home Page','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(46,2,'Horizontale schuifregelaar op de startpagina','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(46,4,'أفقي المنزلق على الصفحة الرئيسية','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(47,1,'On-scroll Product Loading','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(47,2,'On-scroll Product Loading','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(47,4,'أون-سكرول برودوكت لوادينغ','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(48,1,'Product Additional Attributes / Commerce Pricing Attributes','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(48,2,'Product Aanvullende Attributen / Handelsprijzen Attributen','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(48,4,'سمات المنتج الإضافية / سمات التسعير التجاري','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(49,1,'Multiple Product Images','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(49,2,'Meerdere productafbeeldingen','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(49,4,'صور المنتج متعددة','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(50,1,'Beautiful Cart Page','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(50,2,'Mooie winkelwagen pagina','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(50,4,'صفحة العربة الجميلة','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(51,1,'Shipping Address Management','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(51,2,'Verzendadresbeheer','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(51,4,'إدارة عنوان الشحن','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(52,1,'Woocommerce Api','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(52,2,'Woocommerce Api','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(52,4,'ووكومرس أبي','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(53,1,'Animations','<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(53,2,'animaties','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0),(53,4,'الرسوم المتحركة','<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ionic\\\" src=\\\"https://ionicframework.com/img/ionic-meta.jpg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.<br />\r\n<img alt=\\\"Image result for angularjs\\\" src=\\\"http://paislee.io/content/images/2014/Aug/angular_js.svg\\\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, persecuti neglegentur ei sit, assum accusata atomorum duo ne, timeam philosophia ex sea. Pri malorum blandit splendide id, est ea autem docendi interesset. Et vivendo lobortis has, te ius summo epicurei atomorum, an usu novum officiis intellegebat. Ne ridens dicunt eos, vel ad atqui mazim oratio. At vix nisl dolore similique, vidit dicat elitr eum te. Id eum mentitum nominavi, velit oporteat referrentur mei ei, et sea legimus suscipit. Quis augue altera mei et.</p>\r\n\r\n<p><img alt=\\\"Image result for ngcordova\\\" src=\\\"http://ngcordova.com/img/cta-image.png\\\" /></p>\r\n',NULL,0);
/*!40000 ALTER TABLE `news_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_to_news_categories`
--

DROP TABLE IF EXISTS `news_to_news_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `news_to_news_categories` (
  `news_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`news_id`,`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_to_news_categories`
--

LOCK TABLES `news_to_news_categories` WRITE;
/*!40000 ALTER TABLE `news_to_news_categories` DISABLE KEYS */;
INSERT INTO `news_to_news_categories` VALUES (5,5),(6,7),(7,7),(8,7),(9,8),(10,8),(11,9),(12,9),(13,9),(14,6),(15,6),(16,6),(17,6),(18,6),(19,6),(20,6),(21,6),(22,6),(23,6),(24,6),(25,6),(26,6),(27,6),(28,6),(29,6),(30,6),(31,6),(32,6),(33,6),(34,6),(35,6),(36,6),(37,6),(38,6),(39,6),(40,6),(41,6),(42,6),(43,6),(44,6),(45,6),(46,6),(47,6),(48,6),(49,6),(50,6),(51,6),(52,6),(53,6);
/*!40000 ALTER TABLE `news_to_news_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `newsletters` (
  `newsletters_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `date_sent` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `locked` int(1) DEFAULT '0',
  PRIMARY KEY (`newsletters_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletters`
--

LOCK TABLES `newsletters` WRITE;
/*!40000 ALTER TABLE `newsletters` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `customer_company` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `customer_street_address` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `customer_suburb` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `customer_city` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `customer_postcode` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `customer_state` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `customer_country` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `customer_telephone` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `delivery_name` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `delivery_company` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `delivery_street_address` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `delivery_suburb` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `delivery_city` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `delivery_postcode` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `delivery_state` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `delivery_country` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `billing_name` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `billing_company` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `billing_street_address` varchar(255) COLLATE utf8_general_mysql500_ci NOT NULL,
  `billing_suburb` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `billing_postcode` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `shipping_cost` decimal(10,2) DEFAULT NULL,
  `shipping_method` varchar(100) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `shipping_duration` int(100) DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `date_purchased` datetime DEFAULT NULL,
  `order_date_finished` datetime DEFAULT NULL,
  `order_information` mediumtext COLLATE utf8_general_mysql500_ci,
  `is_seen` tinyint(1) DEFAULT '0',
  `coupon_code` text COLLATE utf8_general_mysql500_ci,
  `coupon_amount` int(100) DEFAULT NULL,
  `free_shipping` tinyint(1) DEFAULT '0',
  `customer_remark` tinytext COLLATE utf8_general_mysql500_ci,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `order_status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,1,'customer_name','customer_company','customer_street_addresscustomer_suburb','customer_suburb','customer_city','customer_postcode','customer_state','customer_country','22224444','acornjamie123@gmail.com','delivery_name','delivery_company','delivery_street_address','delivery_suburb','delivery_city','delivery_postcode','delivery_state','delivery_country','billing_name','billing_company','billing_street_address','billing_suburb','billing_city','billing_postcode','billing_state','billing_country',1.00,'car',NULL,'payment_method',50.00,'2019-01-01 00:00:00','2019-01-02 00:00:00','order_information',0,'coupon_code',200,0,'customer_remark','2019-01-01 00:00:00',1,'2019-06-10 00:14:19','1','active','complete');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_comment`
--

DROP TABLE IF EXISTS `order_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order_comment` (
  `order_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `comment` mediumtext COLLATE utf8_general_mysql500_ci,
  `customer_notified` int(1) DEFAULT '0',
  `permission` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`order_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_comment`
--

LOCK TABLES `order_comment` WRITE;
/*!40000 ALTER TABLE `order_comment` DISABLE KEYS */;
INSERT INTO `order_comment` VALUES (1,1,'comment',0,'Admin','2019-06-09 00:00:00',NULL,'',NULL,'active');
/*!40000 ALTER TABLE `order_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL,
  `currency_id` int(11) NOT NULL,
  `product_price` decimal(15,2) NOT NULL,
  `final_price` decimal(15,2) NOT NULL,
  `product_quantity` int(2) NOT NULL,
  `weight` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `weight_unit` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `product_model` varchar(12) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `product_tax` decimal(7,0) DEFAULT NULL,
  PRIMARY KEY (`order_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
INSERT INTO `order_product` VALUES (1,1,1,'A',0,10.00,50.00,5,NULL,NULL,NULL,NULL),(2,1,2,'B',0,20.00,100.00,5,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL DEFAULT '0',
  `order_status_name` varchar(32) COLLATE utf8_general_mysql500_ci NOT NULL,
  `order_status_description` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `public_flag` int(11) DEFAULT '1',
  `downloads_flag` int(11) DEFAULT '0',
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status`
--

LOCK TABLES `order_status` WRITE;
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL AUTO_INCREMENT,
  `total_tax` decimal(7,0) DEFAULT NULL,
  `customers_id` int(11) NOT NULL,
  `customers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customers_company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_street_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_suburb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customers_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customers_address_format_id` int(5) DEFAULT NULL,
  `delivery_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_street_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_suburb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_address_format_id` int(5) DEFAULT NULL,
  `billing_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_street_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_suburb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address_format_id` int(5) DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_owner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_number` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc_expires` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_purchased` datetime DEFAULT NULL,
  `orders_date_finished` datetime DEFAULT NULL,
  `currency` char(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_value` decimal(14,6) DEFAULT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) DEFAULT NULL,
  `shipping_method` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_duration` int(100) DEFAULT NULL,
  `order_information` mediumtext COLLATE utf8_unicode_ci,
  `is_seen` tinyint(1) DEFAULT '0',
  `coupon_code` text COLLATE utf8_unicode_ci,
  `coupon_amount` int(100) DEFAULT NULL,
  `exclude_product_ids` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_categories` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excluded_product_categories` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `free_shipping` tinyint(1) DEFAULT '0',
  `product_ids` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordered_source` tinyint(1) DEFAULT '0',
  `customer_remark` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`orders_id`),
  KEY `idx_orders_customers_id` (`customers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (16,NULL,5,'1 2',NULL,'3','','','','other',NULL,'4','test123@gmail.com',NULL,'1 2',NULL,'3','','','','other',NULL,NULL,'1 2',NULL,'3','','','','other',NULL,NULL,'cash_on_delivery',NULL,NULL,NULL,NULL,'2018-11-19 18:16:34','2018-11-19 18:16:34',NULL,'$',2018.000000,200.00,0.00,'',NULL,'[]',1,'',0,NULL,NULL,NULL,0,NULL,2,''),(17,NULL,5,'1 2',NULL,'3','','','','other',NULL,'4','test123@gmail.com',NULL,'1 2',NULL,'3','','','','other',NULL,NULL,'1 2',NULL,'3','','','','other',NULL,NULL,'cash_on_delivery',NULL,NULL,NULL,NULL,'2018-11-20 04:29:51','2018-11-20 04:29:51',NULL,'$',2018.000000,105.00,0.00,'',NULL,'[]',1,'',0,NULL,NULL,NULL,0,NULL,2,'快');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_products`
--

DROP TABLE IF EXISTS `orders_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders_products` (
  `orders_products_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `products_model` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `products_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `products_price` decimal(15,2) NOT NULL,
  `final_price` decimal(15,2) NOT NULL,
  `products_tax` decimal(7,0) NOT NULL,
  `products_quantity` int(2) NOT NULL,
  PRIMARY KEY (`orders_products_id`),
  KEY `idx_orders_products_orders_id` (`orders_id`),
  KEY `idx_orders_products_products_id` (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_products`
--

LOCK TABLES `orders_products` WRITE;
/*!40000 ALTER TABLE `orders_products` DISABLE KEYS */;
INSERT INTO `orders_products` VALUES (1,1,81,NULL,'RUFFLED COTTON CARDIGAN',72.00,72.00,1,1),(2,2,80,NULL,'FLAG COMBED COTTON SWEATER',99.99,99.99,1,1),(3,2,78,NULL,'CABLE-KNIT CASHMERE SWEATER',195.00,195.00,1,1),(4,3,81,NULL,'RUFFLED COTTON CARDIGAN',72.00,72.00,1,1),(5,4,78,NULL,'CABLE-KNIT CASHMERE SWEATER',195.00,390.00,1,2),(6,5,79,NULL,'FAIR ISLE HOODED SWEATER',45.00,90.00,1,2),(7,5,80,NULL,'FLAG COMBED COTTON SWEATER',99.99,199.98,1,2),(8,6,6,NULL,'cake',89.50,89.50,1,1),(9,6,82,NULL,'王老吉',3.00,3.00,1,1),(10,6,4,NULL,'Biscuits',85.00,85.00,1,1),(11,7,4,NULL,'Biscuits',85.00,85.00,1,1),(12,8,82,NULL,'王老吉',3.00,6.00,1,2),(13,9,82,NULL,'王老吉',3.00,3.00,1,1),(14,10,82,NULL,'王老吉',3.00,6.00,1,2),(15,11,6,NULL,'cake',89.50,268.50,1,3),(16,12,4,NULL,'Biscuits',85.00,85.00,1,1),(17,13,82,NULL,'王老吉',3.00,3.00,1,1),(18,14,82,NULL,'王老吉',3.00,3.00,1,1),(19,15,82,NULL,'王老吉',3.00,3.00,1,1),(20,16,2,NULL,'小蛋糕',100.00,100.00,1,1),(21,16,1,NULL,'酸奶',100.00,100.00,1,1),(22,17,5,NULL,'維他',100.00,100.00,1,1),(23,17,6,NULL,'水',5.00,5.00,1,1);
/*!40000 ALTER TABLE `orders_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_products_attributes`
--

DROP TABLE IF EXISTS `orders_products_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders_products_attributes` (
  `orders_products_attributes_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `orders_products_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `products_options` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `products_options_values` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `options_values_price` decimal(15,2) NOT NULL,
  `price_prefix` char(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`orders_products_attributes_id`),
  KEY `idx_orders_products_att_orders_id` (`orders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_products_attributes`
--

LOCK TABLES `orders_products_attributes` WRITE;
/*!40000 ALTER TABLE `orders_products_attributes` DISABLE KEYS */;
INSERT INTO `orders_products_attributes` VALUES (1,6,8,6,'Size','Small',0.00,'+'),(2,6,10,4,'Size','Small',0.00,'+'),(3,7,11,4,'Size','Small',0.00,'+'),(4,11,15,6,'Size','Small',0.00,'+'),(5,17,23,6,'Size','Small',0.00,'+');
/*!40000 ALTER TABLE `orders_products_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_products_download`
--

DROP TABLE IF EXISTS `orders_products_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders_products_download` (
  `orders_products_download_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL DEFAULT '0',
  `orders_products_id` int(11) NOT NULL DEFAULT '0',
  `orders_products_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `download_maxdays` int(2) NOT NULL DEFAULT '0',
  `download_count` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orders_products_download_id`),
  KEY `idx_orders_products_download_orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_products_download`
--

LOCK TABLES `orders_products_download` WRITE;
/*!40000 ALTER TABLE `orders_products_download` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_products_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_status`
--

DROP TABLE IF EXISTS `orders_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders_status` (
  `orders_status_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `orders_status_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `public_flag` int(11) DEFAULT '1',
  `downloads_flag` int(11) DEFAULT '0',
  PRIMARY KEY (`orders_status_id`,`language_id`),
  KEY `idx_orders_status_name` (`orders_status_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_status`
--

LOCK TABLES `orders_status` WRITE;
/*!40000 ALTER TABLE `orders_status` DISABLE KEYS */;
INSERT INTO `orders_status` VALUES (1,1,'Pending',1,0),(2,1,'Completed',1,0),(3,1,'Cancel',1,0);
/*!40000 ALTER TABLE `orders_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_status_description`
--

DROP TABLE IF EXISTS `orders_status_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders_status_description` (
  `orders_status_description_id` int(100) NOT NULL AUTO_INCREMENT,
  `orders_status_id` int(100) NOT NULL,
  `orders_status_name` varchar(255) NOT NULL,
  `language_id` int(100) NOT NULL,
  PRIMARY KEY (`orders_status_description_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_status_description`
--

LOCK TABLES `orders_status_description` WRITE;
/*!40000 ALTER TABLE `orders_status_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_status_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_status_history`
--

DROP TABLE IF EXISTS `orders_status_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders_status_history` (
  `orders_status_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `orders_status_id` int(5) NOT NULL,
  `date_added` datetime NOT NULL,
  `customer_notified` int(1) DEFAULT '0',
  `comments` mediumtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`orders_status_history_id`),
  KEY `idx_orders_status_history_orders_id` (`orders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_status_history`
--

LOCK TABLES `orders_status_history` WRITE;
/*!40000 ALTER TABLE `orders_status_history` DISABLE KEYS */;
INSERT INTO `orders_status_history` VALUES (1,1,1,'2017-08-22 07:50:27',1,NULL),(2,2,1,'2017-09-07 01:23:50',1,NULL),(3,3,1,'2017-09-07 01:27:52',1,NULL),(4,4,1,'2017-09-07 01:38:22',1,NULL),(5,5,1,'2017-09-07 01:38:25',1,NULL),(6,6,1,'2017-09-07 01:38:28',1,NULL),(7,7,1,'2017-09-07 01:38:30',1,NULL),(8,8,1,'2017-09-08 10:13:10',1,NULL),(9,9,1,'2017-09-08 10:13:12',1,NULL),(10,10,1,'2017-09-08 10:13:15',1,NULL),(11,10,2,'2017-12-21 07:53:10',1,''),(12,9,3,'2017-12-21 07:53:31',1,''),(13,1,1,'2018-11-04 06:18:28',1,''),(14,2,1,'2018-11-04 06:23:08',1,'Ok'),(15,3,1,'2018-11-09 06:14:11',1,'你好'),(16,4,1,'2018-11-13 05:34:53',1,'卜'),(17,5,1,'2018-11-13 05:45:52',1,NULL),(18,6,1,'2018-11-15 11:53:44',1,''),(19,7,1,'2018-11-15 11:56:00',1,'Ijbbb'),(20,8,1,'2018-11-15 04:24:18',1,''),(21,9,1,'2018-11-15 04:25:19',1,''),(22,10,1,'2018-11-15 04:26:40',1,''),(23,11,1,'2018-11-15 04:39:39',1,''),(24,12,1,'2018-11-15 05:09:11',1,''),(25,13,1,'2018-11-17 08:17:20',1,''),(26,14,1,'2018-11-17 12:32:27',1,''),(27,15,1,'2018-11-19 01:52:16',1,''),(28,16,1,'2018-11-19 06:16:34',1,''),(29,16,2,'2018-11-19 06:16:47',1,''),(30,17,1,'2018-11-20 04:29:51',1,'快');
/*!40000 ALTER TABLE `orders_status_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_total`
--

DROP TABLE IF EXISTS `orders_total`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders_total` (
  `orders_total_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(15,4) NOT NULL,
  `class` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`orders_total_id`),
  KEY `idx_orders_total_orders_id` (`orders_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_total`
--

LOCK TABLES `orders_total` WRITE;
/*!40000 ALTER TABLE `orders_total` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_total` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pages` (
  `page_id` int(100) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'privacy-policy',0,1),(2,'term-services',0,1),(3,'refund-policy',0,1),(4,'about-us',0,1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages_description`
--

DROP TABLE IF EXISTS `pages_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pages_description` (
  `page_description_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(100) NOT NULL,
  `page_id` int(100) NOT NULL,
  PRIMARY KEY (`page_description_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages_description`
--

LOCK TABLES `pages_description` WRITE;
/*!40000 ALTER TABLE `pages_description` DISABLE KEYS */;
INSERT INTO `pages_description` VALUES (1,'Privacy Policy','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy</p>\r\n\r\n<p>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen</p>\r\n\r\n<p>book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>\r\n\r\n<p>unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n\r\n<p>and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem</p>\r\n\r\n<p>Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard</p>\r\n\r\n<p>dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>\r\n\r\n<p>specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining</p>\r\n\r\n<p>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum</p>\r\n\r\n<p>passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem</p>\r\n\r\n<p>Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s</p>\r\n\r\n<p>standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make</p>\r\n\r\n<p>a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>\r\n\r\n<p>the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n\r\n<p>it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>\r\n\r\n<p>the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n\r\n<p>it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum.</p>\r\n',1,1),(4,'Term & Services','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy</p>\r\n\r\n<p>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen</p>\r\n\r\n<p>book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>\r\n\r\n<p>unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n\r\n<p>and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem</p>\r\n\r\n<p>Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard</p>\r\n\r\n<p>dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>\r\n\r\n<p>specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining</p>\r\n\r\n<p>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum</p>\r\n\r\n<p>passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem</p>\r\n\r\n<p>Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s</p>\r\n\r\n<p>standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make</p>\r\n\r\n<p>a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>\r\n\r\n<p>the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n\r\n<p>it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>\r\n\r\n<p>the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n\r\n<p>it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum.</p>\r\n',1,2),(7,'Refund Policy','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy</p>\r\n\r\n<p>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen</p>\r\n\r\n<p>book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>\r\n\r\n<p>unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n\r\n<p>and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem</p>\r\n\r\n<p>Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard</p>\r\n\r\n<p>dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>\r\n\r\n<p>specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining</p>\r\n\r\n<p>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum</p>\r\n\r\n<p>passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem</p>\r\n\r\n<p>Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s</p>\r\n\r\n<p>standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make</p>\r\n\r\n<p>a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>\r\n\r\n<p>the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n\r\n<p>it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>\r\n\r\n<p>the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n\r\n<p>it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum.</p>\r\n',1,3),(10,'About Us','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy</p>\r\n\r\n<p>text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen</p>\r\n\r\n<p>book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>\r\n\r\n<p>unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,</p>\r\n\r\n<p>and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem</p>\r\n\r\n<p>Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard</p>\r\n\r\n<p>dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type</p>\r\n\r\n<p>specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining</p>\r\n\r\n<p>essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum</p>\r\n\r\n<p>passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem</p>\r\n\r\n<p>Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s</p>\r\n\r\n<p>standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make</p>\r\n\r\n<p>a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>\r\n\r\n<p>the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n\r\n<p>it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>\r\n\r\n<p>the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n\r\n<p>it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n\r\n<p>remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>\r\n\r\n<p>Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions</p>\r\n\r\n<p>of Lorem Ipsum.</p>\r\n',1,4);
/*!40000 ALTER TABLE `pages_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_description`
--

DROP TABLE IF EXISTS `payment_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `payment_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL,
  `payment_name` varchar(32) NOT NULL,
  `sub_name_1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sub_name_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_description`
--

LOCK TABLES `payment_description` WRITE;
/*!40000 ALTER TABLE `payment_description` DISABLE KEYS */;
INSERT INTO `payment_description` VALUES (1,'Braintree',1,'Braintree','Credit Card','Paypal'),(4,'',1,'Stripe','',''),(5,'',1,'Paypal','',''),(6,'Cash on Delivery',1,'Cash On Delivery','','');
/*!40000 ALTER TABLE `payment_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments_setting`
--

DROP TABLE IF EXISTS `payments_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `payments_setting` (
  `payments_id` int(100) NOT NULL AUTO_INCREMENT,
  `braintree_enviroment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `braintree_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `braintree_merchant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `braintree_public_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `braintree_private_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brantree_active` tinyint(1) NOT NULL DEFAULT '0',
  `stripe_enviroment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `secret_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publishable_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_active` tinyint(1) NOT NULL DEFAULT '0',
  `cash_on_delivery` tinyint(1) NOT NULL DEFAULT '0',
  `cod_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_status` tinyint(1) NOT NULL DEFAULT '0',
  `paypal_enviroment` tinyint(1) DEFAULT '0',
  `payment_currency` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payments_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments_setting`
--

LOCK TABLES `payments_setting` WRITE;
/*!40000 ALTER TABLE `payments_setting` DISABLE KEYS */;
INSERT INTO `payments_setting` VALUES (1,'0','Braintree','','','',0,'0','Stripe','','',0,1,'Cash On Delivery','Paypal','',0,0,'USD');
/*!40000 ALTER TABLE `payments_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(4) NOT NULL,
  `low_limit` int(4) NOT NULL,
  `image` mediumtext COLLATE utf8_unicode_ci,
  `currency_id` int(11) DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `special_status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `special_price` decimal(15,2) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight_unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `liked` int(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_class_id` int(11) NOT NULL,
  `is_feature` tinyint(1) NOT NULL DEFAULT '0',
  `ordered` int(11) NOT NULL DEFAULT '0',
  `model` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `idx_products_model` (`model`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,30,0,'resources/assets/images/product_images/1560064697.螢幕截圖 2019-05-11 下午2.04.53.png',NULL,300.00,'cancel',0.00,'0000-00-00','','',0,NULL,2,1,'2019-06-09 14:46:18',NULL,'2019-06-09 23:44:44',NULL,'active','',0,0,0,NULL),(2,30,0,NULL,NULL,300.00,'cancel',0.00,NULL,'','',0,NULL,2,1,'2019-06-09 14:48:39',NULL,'2019-06-09 14:48:39',NULL,'active','',0,0,0,NULL),(3,50,0,'resources/assets/images/product_images/1560063313.螢幕截圖 2019-05-11 下午2.05.04.png',NULL,500.00,'cancel',0.00,NULL,'','',0,NULL,2,1,'2019-06-09 14:55:13',NULL,'2019-06-09 14:55:13',NULL,'active','',0,0,0,NULL),(4,50,0,'resources/assets/images/product_images/1560063362.螢幕截圖 2019-05-11 下午2.05.04.png',NULL,500.00,'cancel',0.00,NULL,'','',0,NULL,2,1,'2019-06-09 14:56:02',NULL,'2019-06-09 14:56:02',NULL,'active','',0,0,0,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_attribute`
--

DROP TABLE IF EXISTS `product_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `product_attribute` (
  `product_attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `options_value_id` int(11) NOT NULL,
  `options_value_price` decimal(15,2) NOT NULL,
  `price_prefix` char(1) COLLATE utf8_general_mysql500_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`product_attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_attribute`
--

LOCK TABLES `product_attribute` WRITE;
/*!40000 ALTER TABLE `product_attribute` DISABLE KEYS */;
INSERT INTO `product_attribute` VALUES (1,1,1,1,10.00,'A',1,'2019-06-13 00:00:00',NULL,'2019-06-13',NULL,'active');
/*!40000 ALTER TABLE `product_attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_description`
--

DROP TABLE IF EXISTS `product_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `product_description` (
  `product_description_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `product_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewed` int(5) DEFAULT '0',
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`product_description_id`,`language_id`),
  KEY `products_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_description`
--

LOCK TABLES `product_description` WRITE;
/*!40000 ALTER TABLE `product_description` DISABLE KEYS */;
INSERT INTO `product_description` VALUES (1,1,1,'Product A  (HongKong)','Description (HongKong)',NULL,0,'2019-06-09 14:46:18',NULL,'2019-06-09 23:44:44',NULL,'active'),(2,2,1,'Product A (English) ★','Description (English)',NULL,0,'2019-06-09 14:46:18',NULL,'2019-06-09 23:44:44',NULL,'active'),(3,1,2,'Product B  (HongKong)','Description (HongKong)',NULL,0,'2019-06-09 14:48:39',NULL,'2019-06-09 14:48:39',NULL,'active'),(4,2,2,'Product B(English) ★','Description (English)',NULL,0,'2019-06-09 14:48:39',NULL,'2019-06-09 14:48:39',NULL,'active'),(5,1,3,'Product C  (HongKong)','Description (HongKong)',NULL,0,'2019-06-09 14:55:13',NULL,'2019-06-09 14:55:13',NULL,'active'),(6,2,3,'Product C (English) ★','Description (English)',NULL,0,'2019-06-09 14:55:13',NULL,'2019-06-09 14:55:13',NULL,'active'),(7,1,4,'Product D  (HongKong)','Description (HongKong)',NULL,0,'2019-06-09 14:56:02',NULL,'2019-06-09 14:56:02',NULL,'active'),(8,2,4,'Product D (English) ★','Description (English)',NULL,0,'2019-06-09 14:56:02',NULL,'2019-06-09 14:56:02',NULL,'active');
/*!40000 ALTER TABLE `product_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` mediumtext COLLATE utf8_general_mysql500_ci,
  `description` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`product_image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` VALUES (3,1,NULL,'',0,'2019-06-17 12:07:41',NULL,'2019-06-17 12:07:41',NULL,'active'),(5,1,'resources/assets/images/product_images/1560751874.IMG-20190617-WA0000.jpeg','Abcd',0,'2019-06-17 13:14:05',NULL,'2019-06-17 14:11:14',NULL,'active');
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_option`
--

DROP TABLE IF EXISTS `product_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `product_option` (
  `product_option_id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`product_option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_option`
--

LOCK TABLES `product_option` WRITE;
/*!40000 ALTER TABLE `product_option` DISABLE KEYS */;
INSERT INTO `product_option` VALUES (12,'2019-07-04 16:50:38',NULL,'2019-07-04 16:50:38',NULL,'active');
/*!40000 ALTER TABLE `product_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_option_description`
--

DROP TABLE IF EXISTS `product_option_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `product_option_description` (
  `product_option_description_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `product_option_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`product_option_description_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_option_description`
--

LOCK TABLES `product_option_description` WRITE;
/*!40000 ALTER TABLE `product_option_description` DISABLE KEYS */;
INSERT INTO `product_option_description` VALUES (9,1,12,'Name (HongKong)','2019-07-04 16:50:38',NULL,'2019-07-04 16:50:38',NULL,'active'),(10,2,12,'Name (English)','2019-07-04 16:50:38',NULL,'2019-07-04 16:50:38',NULL,'active');
/*!40000 ALTER TABLE `product_option_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_option_value`
--

DROP TABLE IF EXISTS `product_option_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `product_option_value` (
  `product_option_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_option_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`product_option_value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_option_value`
--

LOCK TABLES `product_option_value` WRITE;
/*!40000 ALTER TABLE `product_option_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_option_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_option_value_description`
--

DROP TABLE IF EXISTS `product_option_value_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `product_option_value_description` (
  `product_option_value_description_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `product_option_value_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL DEFAULT '',
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`product_option_value_description_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_option_value_description`
--

LOCK TABLES `product_option_value_description` WRITE;
/*!40000 ALTER TABLE `product_option_value_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_option_value_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_attributes`
--

DROP TABLE IF EXISTS `products_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products_attributes` (
  `products_attributes_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL,
  `options_values_id` int(11) NOT NULL,
  `options_values_price` decimal(15,2) NOT NULL,
  `price_prefix` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`products_attributes_id`),
  KEY `idx_products_attributes_products_id` (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=423 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_attributes`
--

LOCK TABLES `products_attributes` WRITE;
/*!40000 ALTER TABLE `products_attributes` DISABLE KEYS */;
INSERT INTO `products_attributes` VALUES (61,6,4,29,0.00,'+',0),(62,6,4,32,0.00,'+',0),(63,6,4,35,0.00,'+',0),(64,6,4,38,0.00,'+',0),(65,6,5,30,0.00,'+',0),(66,6,5,34,0.00,'+',0),(67,6,5,36,0.00,'+',0),(68,6,5,40,0.00,'+',0),(69,6,6,31,0.00,'+',0),(70,6,6,33,0.00,'+',0),(71,6,6,37,0.00,'+',0),(72,6,6,39,0.00,'+',0),(73,7,4,32,0.00,'+',0),(74,7,4,35,0.00,'+',0),(75,7,5,34,0.00,'+',0),(76,7,5,36,0.00,'+',0),(77,7,6,33,0.00,'+',0),(78,7,6,37,0.00,'+',0),(79,8,4,29,0.00,'+',0),(80,8,4,32,0.00,'+',0),(81,8,5,30,0.00,'+',0),(82,8,5,34,0.00,'+',0),(83,8,6,31,0.00,'+',0),(84,8,6,33,0.00,'+',0),(85,9,4,32,0.00,'+',0),(86,9,4,35,0.00,'+',0),(87,9,4,38,0.00,'+',0),(88,9,5,34,0.00,'+',0),(89,9,5,36,0.00,'+',0),(90,9,5,40,0.00,'+',0),(91,9,6,33,0.00,'+',0),(92,9,6,37,0.00,'+',0),(93,9,6,39,0.00,'+',0),(94,10,4,35,0.00,'+',0),(95,10,4,38,0.00,'+',0),(96,10,5,36,0.00,'+',0),(97,10,5,40,0.00,'+',0),(98,10,6,37,0.00,'+',0),(99,10,6,39,0.00,'+',0),(100,11,7,41,0.00,'+',0),(101,11,7,42,0.00,'+',0),(102,11,7,43,0.00,'+',0),(103,11,8,49,0.00,'+',0),(104,11,8,50,0.00,'+',0),(105,11,8,51,0.00,'+',0),(106,11,9,57,0.00,'+',0),(107,11,9,58,0.00,'+',0),(108,11,9,59,0.00,'+',0),(109,11,10,65,0.00,'+',0),(110,11,10,66,0.00,'+',0),(111,11,11,68,0.00,'+',0),(112,11,11,69,0.00,'+',0),(113,11,12,71,0.00,'+',0),(114,11,12,72,0.00,'+',0),(115,12,1,1,0.00,'+',0),(116,12,1,3,0.00,'+',0),(117,12,2,20,0.00,'+',0),(118,12,2,22,0.00,'+',0),(119,12,3,10,0.00,'+',0),(120,12,3,12,0.00,'+',0),(121,12,7,44,0.00,'+',0),(122,12,7,45,0.00,'+',0),(123,12,7,46,0.00,'+',0),(124,12,7,47,0.00,'+',0),(125,12,8,52,0.00,'+',0),(126,12,8,53,0.00,'+',0),(127,12,8,54,0.00,'+',0),(128,12,8,55,0.00,'+',0),(129,12,9,60,0.00,'+',0),(130,12,9,61,0.00,'+',0),(131,12,9,62,0.00,'+',0),(132,12,9,63,0.00,'+',0),(133,12,10,65,0.00,'+',0),(134,12,10,66,0.00,'+',0),(135,12,10,67,0.00,'+',0),(136,12,11,68,0.00,'+',0),(137,12,11,69,0.00,'+',0),(138,12,11,70,0.00,'+',0),(139,12,12,71,0.00,'+',0),(140,12,12,72,0.00,'+',0),(141,12,12,73,0.00,'+',0),(142,13,7,41,0.00,'+',0),(143,13,7,42,0.00,'+',0),(144,13,8,49,0.00,'+',0),(145,13,8,50,0.00,'+',0),(146,13,9,57,0.00,'+',0),(147,13,9,58,0.00,'+',0),(148,13,10,65,0.00,'+',0),(149,13,10,67,0.00,'+',0),(150,13,11,68,0.00,'+',0),(151,13,11,70,0.00,'+',0),(152,13,12,71,0.00,'+',0),(153,13,12,73,0.00,'+',0),(154,14,4,74,0.00,'+',0),(155,14,4,75,0.00,'+',0),(156,14,4,76,0.00,'+',0),(157,14,4,77,0.00,'+',0),(158,14,5,78,0.00,'+',0),(159,14,5,79,0.00,'+',0),(160,14,5,80,0.00,'+',0),(161,14,5,81,0.00,'+',0),(162,14,6,82,0.00,'+',0),(163,14,6,83,0.00,'+',0),(164,14,6,84,0.00,'+',0),(165,14,6,85,0.00,'+',0),(166,15,4,76,0.00,'+',0),(167,15,5,80,0.00,'+',0),(168,15,6,85,0.00,'+',0),(169,16,4,75,0.00,'+',0),(170,16,4,76,0.00,'+',0),(171,16,4,77,0.00,'+',0),(172,16,5,79,0.00,'+',0),(173,16,5,80,0.00,'+',0),(174,16,5,81,0.00,'+',0),(175,16,6,83,0.00,'+',0),(176,16,6,84,0.00,'+',0),(177,16,6,85,0.00,'+',0),(178,17,1,5,0.00,'+',0),(179,17,2,24,0.00,'+',0),(180,17,3,14,0.00,'+',0),(181,17,4,74,0.00,'+',0),(182,17,4,75,0.00,'+',0),(183,17,5,78,0.00,'+',0),(184,17,5,79,0.00,'+',0),(185,17,6,82,0.00,'+',0),(186,17,6,83,0.00,'+',0),(187,19,4,76,0.00,'+',0),(188,19,4,77,0.00,'+',0),(189,19,5,80,0.00,'+',0),(190,19,5,81,0.00,'+',0),(191,19,6,84,0.00,'+',0),(192,19,6,85,0.00,'+',0),(193,24,4,29,0.00,'+',0),(194,24,4,32,0.00,'+',0),(195,24,4,35,0.00,'+',0),(196,24,5,30,0.00,'+',0),(197,24,5,34,0.00,'+',0),(198,24,5,36,0.00,'+',0),(199,24,6,31,0.00,'+',0),(200,24,6,33,0.00,'+',0),(201,24,6,37,0.00,'+',0),(202,25,4,29,0.00,'+',0),(203,25,5,30,0.00,'+',0),(204,25,6,31,0.00,'+',0),(205,26,4,32,0.00,'+',0),(206,26,5,34,0.00,'+',0),(207,26,6,33,0.00,'+',0),(208,27,4,32,0.00,'+',0),(209,27,4,35,0.00,'+',0),(210,27,5,34,0.00,'+',0),(211,27,5,36,0.00,'+',0),(212,27,6,33,0.00,'+',0),(213,27,6,37,0.00,'+',0),(214,28,4,29,0.00,'+',0),(215,28,4,32,0.00,'+',0),(216,28,5,30,0.00,'+',0),(217,28,5,34,0.00,'+',0),(218,28,6,31,0.00,'+',0),(219,28,6,33,0.00,'+',0),(220,29,4,29,0.00,'+',0),(221,29,4,32,0.00,'+',0),(222,29,4,35,0.00,'+',0),(223,29,4,38,0.00,'+',0),(224,29,5,30,0.00,'+',0),(225,29,5,34,0.00,'+',0),(226,29,5,36,0.00,'+',0),(227,29,5,40,0.00,'+',0),(228,29,6,31,0.00,'+',0),(229,29,6,33,0.00,'+',0),(230,29,6,37,0.00,'+',0),(231,29,6,39,0.00,'+',0),(232,30,4,29,0.00,'+',0),(233,30,5,30,0.00,'+',0),(234,30,6,31,0.00,'+',0),(235,31,4,87,0.00,'+',0),(236,31,4,88,0.00,'+',0),(237,31,4,89,0.00,'+',0),(238,31,4,90,0.00,'+',0),(239,31,5,86,0.00,'+',0),(240,31,5,94,0.00,'+',0),(241,31,5,95,0.00,'+',0),(242,31,5,96,0.00,'+',0),(243,31,6,100,0.00,'+',0),(244,31,6,101,0.00,'+',0),(245,31,6,102,0.00,'+',0),(246,31,6,103,0.00,'+',0),(247,32,4,87,0.00,'+',0),(248,32,4,88,0.00,'+',0),(249,32,4,89,0.00,'+',0),(250,32,4,90,0.00,'+',0),(251,32,5,86,0.00,'+',0),(252,32,5,94,0.00,'+',0),(253,32,5,95,0.00,'+',0),(254,32,5,96,0.00,'+',0),(255,32,6,100,0.00,'+',0),(256,32,6,101,0.00,'+',0),(257,32,6,102,0.00,'+',0),(258,32,6,103,0.00,'+',0),(259,33,4,91,0.00,'+',0),(260,33,4,92,0.00,'+',0),(261,33,4,93,0.00,'+',0),(262,33,5,97,0.00,'+',0),(263,33,5,98,0.00,'+',0),(264,33,5,99,0.00,'+',0),(265,33,6,104,0.00,'+',0),(266,33,6,105,0.00,'+',0),(267,33,6,106,0.00,'+',0),(268,38,4,107,0.00,'+',0),(269,38,4,110,0.00,'+',0),(270,38,4,111,0.00,'+',0),(271,38,5,109,0.00,'+',0),(272,38,5,113,0.00,'+',0),(273,38,5,114,0.00,'+',0),(274,38,6,108,0.00,'+',0),(275,38,6,116,0.00,'+',0),(276,38,6,117,0.00,'+',0),(277,39,4,111,0.00,'+',0),(278,39,5,114,0.00,'+',0),(279,39,6,117,0.00,'+',0),(280,40,4,107,0.00,'+',0),(281,40,4,110,0.00,'+',0),(282,40,5,109,0.00,'+',0),(283,40,5,113,0.00,'+',0),(284,40,6,108,0.00,'+',0),(285,40,6,116,0.00,'+',0),(286,42,4,111,0.00,'+',0),(287,42,4,112,0.00,'+',0),(288,42,5,114,0.00,'+',0),(289,42,5,115,0.00,'+',0),(290,42,6,117,0.00,'+',0),(291,42,6,118,0.00,'+',0),(292,43,4,112,0.00,'+',0),(293,43,5,115,0.00,'+',0),(294,43,6,118,0.00,'+',0),(295,44,4,111,0.00,'+',0),(296,44,4,112,0.00,'+',0),(297,44,5,114,0.00,'+',0),(298,44,5,115,0.00,'+',0),(299,44,6,117,0.00,'+',0),(300,44,6,118,0.00,'+',0),(301,50,4,125,0.00,'+',0),(302,50,5,127,0.00,'+',0),(303,50,6,126,0.00,'+',0),(304,48,1,119,0.00,'+',0),(305,48,1,122,0.00,'+',0),(306,48,2,121,0.00,'+',0),(307,48,2,123,0.00,'+',0),(308,48,3,120,0.00,'+',0),(309,48,3,124,0.00,'+',0),(310,48,4,125,0.00,'+',0),(311,48,4,130,0.00,'+',0),(312,48,5,127,0.00,'+',0),(313,48,5,129,0.00,'+',0),(314,48,6,126,0.00,'+',0),(315,48,6,128,0.00,'+',0),(316,49,4,130,0.00,'+',0),(317,49,5,129,0.00,'+',0),(318,49,6,128,0.00,'+',0),(319,51,4,125,0.00,'+',0),(320,51,5,127,0.00,'+',0),(321,51,6,126,0.00,'+',0),(322,52,1,119,0.00,'+',0),(323,52,2,121,0.00,'+',0),(324,52,3,120,0.00,'+',0),(325,53,4,132,0.00,'+',0),(326,53,5,135,0.00,'+',0),(327,53,6,136,0.00,'+',0),(328,52,4,131,0.00,'+',0),(329,52,5,133,0.00,'+',0),(330,52,6,134,0.00,'+',0),(331,54,1,2,0.00,'+',0),(332,54,1,3,0.00,'+',0),(333,54,2,21,0.00,'+',0),(334,54,2,22,0.00,'+',0),(335,54,3,11,0.00,'+',0),(336,54,3,12,0.00,'+',0),(337,55,4,29,0.00,'+',0),(338,55,4,32,0.00,'+',0),(339,55,4,35,0.00,'+',0),(341,55,5,30,0.00,'+',0),(342,55,5,34,0.00,'+',0),(343,55,5,36,0.00,'+',0),(345,55,6,31,0.00,'+',0),(346,55,6,33,0.00,'+',0),(347,55,6,37,0.00,'+',0),(351,56,4,137,0.00,'+',0),(352,56,5,140,0.00,'+',0),(353,56,6,143,0.00,'+',0),(354,57,1,2,0.00,'+',0),(355,57,1,3,0.00,'+',0),(356,57,2,21,0.00,'+',0),(357,57,2,22,0.00,'+',0),(358,57,3,11,0.00,'+',0),(359,57,3,12,0.00,'+',0),(360,57,4,138,0.00,'+',0),(361,57,5,141,0.00,'+',0),(362,57,6,145,0.00,'+',0),(363,58,4,29,0.00,'+',0),(364,58,4,32,0.00,'+',0),(365,58,4,35,0.00,'+',0),(366,58,5,30,0.00,'+',0),(367,58,5,34,0.00,'+',0),(368,58,5,36,0.00,'+',0),(369,58,6,31,0.00,'+',0),(370,58,6,33,0.00,'+',0),(371,58,6,37,0.00,'+',0),(372,59,4,29,0.00,'+',0),(373,59,5,30,0.00,'+',0),(374,59,6,31,0.00,'+',0),(375,60,4,35,0.00,'+',0),(376,60,5,36,0.00,'+',0),(377,60,6,37,0.00,'+',0),(378,61,4,32,0.00,'+',0),(379,61,4,35,0.00,'+',0),(380,61,5,34,0.00,'+',0),(381,61,5,36,0.00,'+',0),(382,61,6,33,0.00,'+',0),(383,61,6,37,0.00,'+',0),(384,63,4,29,0.00,'+',0),(385,63,4,35,0.00,'+',0),(386,63,5,30,0.00,'+',0),(387,63,5,36,0.00,'+',0),(388,63,6,31,0.00,'+',0),(389,63,6,37,0.00,'+',0),(390,66,7,41,0.00,'+',0),(391,66,8,49,0.00,'+',0),(392,66,9,57,0.00,'+',0),(393,66,10,65,0.00,'+',0),(394,66,11,68,0.00,'+',0),(395,66,12,71,0.00,'+',0),(396,67,4,32,0.00,'+',0),(397,67,4,35,0.00,'+',0),(398,67,5,34,0.00,'+',0),(399,67,5,36,0.00,'+',0),(400,67,6,33,0.00,'+',0),(401,67,6,37,0.00,'+',0),(402,68,7,42,0.00,'+',0),(403,68,8,50,0.00,'+',0),(404,68,9,58,0.00,'+',0),(405,68,10,65,0.00,'+',0),(406,68,11,68,0.00,'+',0),(407,68,12,71,0.00,'+',0),(408,69,4,74,0.00,'+',0),(409,69,4,75,0.00,'+',0),(410,69,4,76,0.00,'+',0),(411,69,5,78,0.00,'+',0),(412,69,5,79,0.00,'+',0),(413,69,5,80,0.00,'+',0),(414,69,6,82,0.00,'+',0),(415,69,6,83,0.00,'+',0),(416,69,6,84,0.00,'+',0),(417,70,4,74,0.00,'+',0),(418,70,4,75,0.00,'+',0),(419,70,5,78,0.00,'+',0),(420,70,5,79,0.00,'+',0),(421,70,6,82,0.00,'+',0),(422,70,6,83,0.00,'+',0);
/*!40000 ALTER TABLE `products_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_attributes_download`
--

DROP TABLE IF EXISTS `products_attributes_download`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products_attributes_download` (
  `products_attributes_id` int(11) NOT NULL,
  `products_attributes_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `products_attributes_maxdays` int(2) DEFAULT '0',
  `products_attributes_maxcount` int(2) DEFAULT '0',
  PRIMARY KEY (`products_attributes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_attributes_download`
--

LOCK TABLES `products_attributes_download` WRITE;
/*!40000 ALTER TABLE `products_attributes_download` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_attributes_download` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `image` mediumtext COLLATE utf8_unicode_ci,
  `htmlcontent` mediumtext COLLATE utf8_unicode_ci,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_images_prodid` (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_images`
--

LOCK TABLES `products_images` WRITE;
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
INSERT INTO `products_images` VALUES (1,81,'resources/assets/images/product_images/1535537687.Screenshot_2018-08-29-15-45-10-514_com.whatsapp.png','123',1),(2,81,'resources/assets/images/product_images/1535537719.IMG-20180829-WA0013.jpg','',2),(3,4,'resources/assets/images/product_images/1542681362.IMG_20181120_103525.jpg','',1);
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_notifications`
--

DROP TABLE IF EXISTS `products_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products_notifications` (
  `products_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`products_id`,`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_notifications`
--

LOCK TABLES `products_notifications` WRITE;
/*!40000 ALTER TABLE `products_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_options`
--

DROP TABLE IF EXISTS `products_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products_options` (
  `products_options_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_options_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `categories_id` int(100) NOT NULL,
  `session_regenerate_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`products_options_id`,`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_options`
--

LOCK TABLES `products_options` WRITE;
/*!40000 ALTER TABLE `products_options` DISABLE KEYS */;
INSERT INTO `products_options` VALUES (1,1,'Colors',0,'1502106343'),(4,1,'Size',0,'1502106711'),(7,1,'Waist',0,'1502187895'),(10,1,'Length',0,'1502187939');
/*!40000 ALTER TABLE `products_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_options_values`
--

DROP TABLE IF EXISTS `products_options_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products_options_values` (
  `products_options_values_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_options_values_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`products_options_values_id`,`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_options_values`
--

LOCK TABLES `products_options_values` WRITE;
/*!40000 ALTER TABLE `products_options_values` DISABLE KEYS */;
INSERT INTO `products_options_values` VALUES (1,1,'Brown'),(2,1,'Cream'),(3,1,'Blue'),(4,1,'Multi'),(5,1,'Black'),(6,1,'Grey'),(7,1,'White'),(8,1,'Purple'),(9,1,'Navy'),(29,1,'Small'),(32,1,'Medium'),(35,1,'Large'),(38,1,'Extra Large'),(41,1,'28W'),(42,1,'30W'),(43,1,'32W'),(44,1,'34W'),(45,1,'36W'),(46,1,'38W'),(47,1,'40W'),(48,1,'42W'),(65,1,'30L'),(66,1,'32L'),(67,1,'34L'),(74,1,'7D'),(75,1,'8D'),(76,1,'8.5D'),(77,1,'9D'),(87,1,'24'),(88,1,'25'),(89,1,'26'),(90,1,'27'),(91,1,'28'),(92,1,'29'),(93,1,'30'),(107,1,'New Born'),(110,1,'3 Mos'),(111,1,'6 Mos'),(112,1,'9 Mos'),(119,1,'Hollywood Cream'),(122,1,'Vintage Silver'),(125,1,'King'),(130,1,'Full'),(131,1,'15\"x20\"'),(132,1,'22\"x22\"'),(137,1,'3T'),(138,1,'4T'),(139,1,'5T');
/*!40000 ALTER TABLE `products_options_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_options_values_to_products_options`
--

DROP TABLE IF EXISTS `products_options_values_to_products_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products_options_values_to_products_options` (
  `products_options_values_to_products_options_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_options_id` int(11) NOT NULL,
  `products_options_values_id` int(11) NOT NULL,
  PRIMARY KEY (`products_options_values_to_products_options_id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_options_values_to_products_options`
--

LOCK TABLES `products_options_values_to_products_options` WRITE;
/*!40000 ALTER TABLE `products_options_values_to_products_options` DISABLE KEYS */;
INSERT INTO `products_options_values_to_products_options` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,1,7),(8,1,8),(9,1,9),(10,3,10),(11,3,11),(12,3,12),(13,3,13),(14,3,14),(15,3,15),(16,3,16),(17,3,17),(18,3,18),(20,2,20),(21,2,21),(22,2,22),(23,2,23),(24,2,24),(25,2,25),(26,2,26),(27,2,27),(28,2,28),(29,4,29),(30,5,30),(31,6,31),(32,4,32),(33,6,33),(34,5,34),(35,4,35),(36,5,36),(37,6,37),(38,4,38),(39,6,39),(40,5,40),(41,7,41),(42,7,42),(43,7,43),(44,7,44),(45,7,45),(46,7,46),(47,7,47),(48,7,48),(49,8,49),(50,8,50),(51,8,51),(52,8,52),(53,8,53),(54,8,54),(55,8,55),(56,8,56),(57,9,57),(58,9,58),(59,9,59),(60,9,60),(61,9,61),(62,9,62),(63,9,63),(64,9,64),(65,10,65),(66,10,66),(67,10,67),(68,11,68),(69,11,69),(70,11,70),(71,12,71),(72,12,72),(73,12,73),(74,4,74),(75,4,75),(76,4,76),(77,4,77),(78,5,78),(79,5,79),(80,5,80),(81,5,81),(82,6,82),(83,6,83),(84,6,84),(85,6,85),(86,5,86),(87,4,87),(88,4,88),(89,4,89),(90,4,90),(91,4,91),(92,4,92),(93,4,93),(94,5,94),(95,5,95),(96,5,96),(97,5,97),(98,5,98),(99,5,99),(100,6,100),(101,6,101),(102,6,102),(103,6,103),(104,6,104),(105,6,105),(106,6,106),(107,4,107),(108,6,108),(109,5,109),(110,4,110),(111,4,111),(112,4,112),(113,5,113),(114,5,114),(115,5,115),(116,6,116),(117,6,117),(118,6,118),(119,1,119),(120,3,120),(121,2,121),(122,1,122),(123,2,123),(124,3,124),(125,4,125),(126,6,126),(127,5,127),(128,6,128),(129,5,129),(130,4,130),(131,4,131),(132,4,132),(133,5,133),(134,6,134),(135,5,135),(136,6,136),(137,4,137),(138,4,138),(139,4,139),(140,5,140),(141,5,141),(142,5,142),(143,6,143),(144,6,144),(145,6,145);
/*!40000 ALTER TABLE `products_options_values_to_products_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_to_categories`
--

DROP TABLE IF EXISTS `products_to_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products_to_categories` (
  `products_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`products_id`,`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_to_categories`
--

LOCK TABLES `products_to_categories` WRITE;
/*!40000 ALTER TABLE `products_to_categories` DISABLE KEYS */;
INSERT INTO `products_to_categories` VALUES (1,1),(1,2),(2,3),(2,4),(5,1),(5,2),(6,1),(6,2);
/*!40000 ALTER TABLE `products_to_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `reviews` (
  `reviews_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `customers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reviews_rating` int(1) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `reviews_status` tinyint(1) NOT NULL DEFAULT '0',
  `reviews_read` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reviews_id`),
  KEY `idx_reviews_products_id` (`products_id`),
  KEY `idx_reviews_customers_id` (`customers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews_description`
--

DROP TABLE IF EXISTS `reviews_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `reviews_description` (
  `reviews_id` int(11) NOT NULL,
  `languages_id` int(11) NOT NULL,
  `reviews_text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`reviews_id`,`languages_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews_description`
--

LOCK TABLES `reviews_description` WRITE;
/*!40000 ALTER TABLE `reviews_description` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sec_directory_whitelist`
--

DROP TABLE IF EXISTS `sec_directory_whitelist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sec_directory_whitelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `directory` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sec_directory_whitelist`
--

LOCK TABLES `sec_directory_whitelist` WRITE;
/*!40000 ALTER TABLE `sec_directory_whitelist` DISABLE KEYS */;
/*!40000 ALTER TABLE `sec_directory_whitelist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sessions` (
  `sesskey` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `expiry` int(11) unsigned NOT NULL,
  `value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sesskey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'facebook_app_id','907608576060481','2018-04-26 19:00:00','2018-07-03 01:50:42'),(2,'facebook_secret_id','158109115c6019beb4a4193ed5d620b9','2018-04-26 19:00:00','2018-07-03 01:50:42'),(3,'facebook_login','1','2018-04-26 19:00:00','2018-07-03 01:50:42'),(4,'contact_us_email','vectorcoder@gmail.com','2018-04-26 19:00:00','2018-07-03 02:17:08'),(5,'address','D-ground','2018-04-26 19:00:00','2018-07-03 02:17:08'),(6,'city','Faisalabad','2018-04-26 19:00:00','2018-07-03 02:17:08'),(7,'state','Punjab','2018-04-26 19:00:00','2018-07-03 02:17:08'),(8,'zip','38000','2018-04-26 19:00:00','2018-07-03 02:17:08'),(9,'country','Pakistan','2018-04-26 19:00:00','2018-07-03 02:17:08'),(10,'latitude','31.4063632','2018-04-26 19:00:00','2018-07-03 02:17:08'),(11,'longitude','73.10692979999999','2018-04-26 19:00:00','2018-07-03 02:17:08'),(12,'phone_no','+92 3457765876','2018-04-26 19:00:00','2018-07-03 02:17:08'),(13,'fcm_android','','2018-04-26 19:00:00','2018-05-22 10:59:51'),(14,'fcm_ios',NULL,'2018-04-26 19:00:00',NULL),(15,'fcm_desktop',NULL,'2018-04-26 19:00:00',NULL),(16,'website_logo','resources/assets/images/site_images/1525072842.logo-blue-v1.png','2018-04-26 19:00:00',NULL),(17,'fcm_android_sender_id',NULL,'2018-04-26 19:00:00',NULL),(18,'fcm_ios_sender_id','','2018-04-26 19:00:00','2018-05-22 10:59:51'),(19,'app_name','Ionic Shop','2018-04-26 19:00:00','2018-07-03 02:17:08'),(20,'currency_symbol','$','2018-04-26 19:00:00','2018-07-03 02:17:08'),(21,'new_product_duration','20','2018-04-26 19:00:00','2018-07-03 02:17:08'),(22,'notification_title','Ionic Ecommerce','2018-04-26 19:00:00','2018-07-03 02:10:38'),(23,'notification_text','A bundle of products waiting for you!','2018-04-26 19:00:00',NULL),(24,'lazzy_loading_effect','Detail','2018-04-26 19:00:00','2018-07-03 02:10:38'),(25,'footer_button','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(26,'cart_button','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(27,'featured_category',NULL,'2018-04-26 19:00:00',NULL),(28,'notification_duration','day','2018-04-26 19:00:00','2018-07-03 02:10:38'),(29,'home_style','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(30,'wish_list_page','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(31,'edit_profile_page','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(32,'shipping_address_page','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(33,'my_orders_page','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(34,'contact_us_page','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(35,'about_us_page','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(36,'news_page','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(37,'intro_page','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(38,'setting_page','1','2018-04-26 19:00:00',NULL),(39,'share_app','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(40,'rate_app','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(41,'site_url','http://ionicecommerce.com/','2018-04-26 19:00:00','2018-07-03 02:17:08'),(42,'admob','0','2018-04-26 19:00:00','2018-07-04 02:08:18'),(43,'admob_id','ca-app-pub-5138652967372552~1074356914','2018-04-26 19:00:00','2018-07-04 02:08:18'),(44,'ad_unit_id_banner','ca-app-pub-5138652967372552/7596367384','2018-04-26 19:00:00','2018-07-04 02:08:18'),(45,'ad_unit_id_interstitial','ca-app-pub-5138652967372552/9602920919','2018-04-26 19:00:00','2018-07-04 02:08:18'),(46,'category_style','1','2018-04-26 19:00:00','2018-07-03 02:10:38'),(47,'package_name','https://itunes.apple.com/us/app/ionic-shop/id1342112345?mt=8','2018-04-26 19:00:00','2018-07-03 02:10:38'),(48,'google_analytic_id','test','2018-04-26 19:00:00','2018-07-03 02:10:38'),(49,'themes','themeone','2018-04-26 19:00:00',NULL),(50,'company_name','VC','2018-04-26 19:00:00',NULL),(51,'facebook_url','#','2018-04-26 19:00:00',NULL),(52,'google_url','#','2018-04-26 19:00:00',NULL),(53,'twitter_url','#','2018-04-26 19:00:00',NULL),(54,'linked_in','#','2018-04-26 19:00:00',NULL),(55,'default_notification','onesignal','2018-04-26 19:00:00','2018-05-22 10:59:51'),(56,'onesignal_app_id','6053d948-b8f6-472a-87e4-379fa89f78d8','2018-04-26 19:00:00','2018-05-22 10:59:51'),(57,'onesignal_sender_id','50877237723','2018-04-26 19:00:00','2018-05-22 10:59:51'),(58,'ios_admob','0','2018-04-26 19:00:00','2018-07-04 02:08:18'),(59,'ios_admob_id','AdMob ID','2018-04-26 19:00:00','2018-07-04 02:08:18'),(60,'ios_ad_unit_id_banner','ca-app-pub-5138652967372552/2060782633','2018-04-26 19:00:00','2018-07-04 02:08:18'),(61,'ios_ad_unit_id_interstitial','ca-app-pub-5138652967372552/3318023987','2018-04-26 19:00:00','2018-07-04 02:08:18'),(62,'google_login','1',NULL,NULL),(63,'google_app_id',NULL,NULL,NULL),(64,'google_secret_id',NULL,NULL,NULL),(65,'google_callback_url',NULL,NULL,NULL),(66,'facebook_callback_url',NULL,NULL,NULL),(67,'is_app_purchased','1',NULL,'2018-05-03 22:24:44'),(68,'is_desktop_purchased','0',NULL,'2018-05-03 22:24:44'),(69,'consumer_key','ada691a715307861907d65d36d',NULL,'2018-07-05 05:23:10'),(70,'consumer_secret','a75e40ec1530786190b62316d1',NULL,'2018-07-05 05:23:10'),(71,'order_email','vectorcoder@gmail.com',NULL,'2018-07-03 02:17:08'),(72,'website_themes','1',NULL,NULL),(73,'seo_title',NULL,NULL,NULL),(74,'seo_metatag',NULL,NULL,NULL),(75,'seo_keyword',NULL,NULL,NULL),(76,'seo_description',NULL,NULL,NULL),(77,'before_head_tag',NULL,NULL,NULL),(78,'end_body_tag',NULL,NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_description`
--

DROP TABLE IF EXISTS `shipping_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `shipping_description` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(11) NOT NULL,
  `table_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sub_labels` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_description`
--

LOCK TABLES `shipping_description` WRITE;
/*!40000 ALTER TABLE `shipping_description` DISABLE KEYS */;
INSERT INTO `shipping_description` VALUES (1,'Free Shipping',1,'free_shipping',''),(4,'Local Pickup',1,'local_pickup',''),(7,'Flat Rate',1,'flate_rate',''),(10,'UPS Shipping',1,'ups_shipping','{\"nextDayAir\":\"Next Day Air\",\"secondDayAir\":\"2nd Day Air\",\"ground\":\"Ground\",\"threeDaySelect\":\"3 Day Select\",\"nextDayAirSaver\":\"Next Day AirSaver\",\"nextDayAirEarlyAM\":\"Next Day Air Early A.M.\",\"secondndDayAirAM\":\"2nd Day Air A.M.\"}');
/*!40000 ALTER TABLE `shipping_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_methods`
--

DROP TABLE IF EXISTS `shipping_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `shipping_methods` (
  `shipping_methods_id` int(100) NOT NULL AUTO_INCREMENT,
  `methods_type_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isDefault` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `table_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`shipping_methods_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_methods`
--

LOCK TABLES `shipping_methods` WRITE;
/*!40000 ALTER TABLE `shipping_methods` DISABLE KEYS */;
INSERT INTO `shipping_methods` VALUES (1,'upsShipping',0,0,'ups_shipping'),(2,'freeShipping',1,1,'free_shipping'),(3,'localPickup',0,1,'local_pickup'),(4,'flateRate',0,1,'flate_rate');
/*!40000 ALTER TABLE `shipping_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders_images`
--

DROP TABLE IF EXISTS `sliders_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sliders_images` (
  `sliders_id` int(11) NOT NULL AUTO_INCREMENT,
  `sliders_title` varchar(64) NOT NULL,
  `sliders_url` varchar(255) NOT NULL,
  `sliders_image` varchar(255) NOT NULL,
  `sliders_group` varchar(64) NOT NULL,
  `sliders_html_text` mediumtext NOT NULL,
  `expires_date` datetime NOT NULL,
  `date_added` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `type` varchar(64) NOT NULL,
  `date_status_change` datetime DEFAULT NULL,
  `languages_id` int(100) NOT NULL,
  PRIMARY KEY (`sliders_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders_images`
--

LOCK TABLES `sliders_images` WRITE;
/*!40000 ALTER TABLE `sliders_images` DISABLE KEYS */;
INSERT INTO `sliders_images` VALUES (1,'Slider-1','81','resources/assets/images/slider_images/1520516873.192c136def2a09558ea0dfd85e0d5ed2.jpg','','','2029-01-03 00:00:00','2018-03-30 10:48:07',1,'product','2018-03-30 10:48:07',0),(2,'Slider-2','76','resources/assets/images/slider_images/1520516894.1502370343.banner_2.jpg','','','2019-01-31 00:00:00','2018-03-30 10:50:48',1,'product','2018-03-30 10:50:48',0),(3,'Slider-3','','resources/assets/images/slider_images/1520517279.1502370387.banner_4.jpg','','','2029-01-01 00:00:00','2018-03-30 10:54:22',1,'top seller','2018-03-30 10:54:22',0);
/*!40000 ALTER TABLE `sliders_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specials`
--

DROP TABLE IF EXISTS `specials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `specials` (
  `specials_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `specials_new_products_price` decimal(15,2) NOT NULL,
  `specials_date_added` int(100) NOT NULL,
  `specials_last_modified` int(100) NOT NULL,
  `expires_date` int(100) NOT NULL,
  `date_status_change` int(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`specials_id`),
  KEY `idx_specials_products_id` (`products_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specials`
--

LOCK TABLES `specials` WRITE;
/*!40000 ALTER TABLE `specials` DISABLE KEYS */;
INSERT INTO `specials` VALUES (1,25,150.00,1502195102,0,1667174400,0,1),(2,39,27.85,1502264917,0,1640995200,0,1),(3,43,21.99,1502268005,0,1640995200,0,1),(4,44,23.55,1502268706,0,1640995200,0,1),(5,48,450.00,1502274870,0,1640995200,0,1),(6,62,22.20,1502351882,0,1659398400,0,1),(7,65,23.50,1502353123,0,1646092800,0,1),(8,67,445.00,1502362089,0,1640995200,0,1),(9,70,23.99,1502363119,0,1640995200,0,1),(10,73,23.50,1502364697,0,1640995200,0,1),(11,80,99.99,1502366586,0,1640995200,0,1);
/*!40000 ALTER TABLE `specials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` mediumtext COLLATE utf8_general_mysql500_ci,
  `icon` mediumtext COLLATE utf8_general_mysql500_ci,
  `sort_order` int(3) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `category_id` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`sub_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category`
--

LOCK TABLES `sub_category` WRITE;
/*!40000 ALTER TABLE `sub_category` DISABLE KEYS */;
INSERT INTO `sub_category` VALUES (2,'resources/assets/images/sub_category_images/1557765247.螢幕截圖 2019-05-11 下午2.04.30.png',NULL,NULL,NULL,'2019-05-14 00:34:07',NULL,'2019-05-14 00:54:19',NULL,'active','1'),(3,'resources/assets/images/sub_category_images/1557767400.螢幕截圖 2019-05-11 下午2.05.14.png','resources/assets/images/sub_category_icons/1558066018.Screenshot_2019-05-16-20-07-23-623_com.instagram.android.png',NULL,NULL,'2019-05-14 01:10:00',NULL,'2019-05-17 15:46:30',NULL,'active','1'),(5,'resources/assets/images/sub_category_images/1558079217.Screenshot_2019-05-17-15-21-52-975_com.instagram.android.png',NULL,NULL,NULL,'2019-05-17 15:46:50',NULL,'2019-05-17 15:46:57',NULL,'active','1');
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
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`sub_category_description_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_category_description`
--

LOCK TABLES `sub_category_description` WRITE;
/*!40000 ALTER TABLE `sub_category_description` DISABLE KEYS */;
INSERT INTO `sub_category_description` VALUES (2,'sub123',1,2,'0000-00-00 00:00:00',NULL,'2019-05-14 00:54:19',NULL,'active'),(3,'Hk',1,3,'0000-00-00 00:00:00',NULL,'2019-05-17 15:46:30',NULL,'active'),(5,'Hkk',2,0,'2019-05-17 15:46:30',NULL,'2019-05-17 15:46:30',NULL,'active'),(6,'As',1,5,'2019-05-17 15:46:50',NULL,'2019-05-17 15:46:57',NULL,'active'),(7,'En',2,5,'2019-05-17 15:46:50',NULL,'2019-05-17 15:46:57',NULL,'active');
/*!40000 ALTER TABLE `sub_category_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_class`
--

DROP TABLE IF EXISTS `tax_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tax_class` (
  `tax_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_class_title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tax_class_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`tax_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_class`
--

LOCK TABLES `tax_class` WRITE;
/*!40000 ALTER TABLE `tax_class` DISABLE KEYS */;
INSERT INTO `tax_class` VALUES (1,'Sale Tax','This tax apply on products related to USA item.',NULL,'2017-08-07 07:06:53');
/*!40000 ALTER TABLE `tax_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_rates`
--

DROP TABLE IF EXISTS `tax_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tax_rates` (
  `tax_rates_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_zone_id` int(11) NOT NULL,
  `tax_class_id` int(11) NOT NULL,
  `tax_priority` int(5) DEFAULT '1',
  `tax_rate` decimal(7,2) NOT NULL,
  `tax_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`tax_rates_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_rates`
--

LOCK TABLES `tax_rates` WRITE;
/*!40000 ALTER TABLE `tax_rates` DISABLE KEYS */;
INSERT INTO `tax_rates` VALUES (1,43,1,1,7.00,'',NULL,'2017-08-07 07:07:45');
/*!40000 ALTER TABLE `tax_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `unit` (
  `unit_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `language_id` int(100) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` VALUES (1,'Gram',1,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',NULL,''),(2,'Kilogram',1,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',NULL,'');
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ups_shipping`
--

DROP TABLE IF EXISTS `ups_shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ups_shipping` (
  `ups_id` int(100) NOT NULL AUTO_INCREMENT,
  `pickup_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isDisplayCal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serviceType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shippingEnvironment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `person_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_of_package` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parcel_height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parcel_width` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ups_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ups_shipping`
--

LOCK TABLES `ups_shipping` WRITE;
/*!40000 ALTER TABLE `ups_shipping` DISABLE KEYS */;
INSERT INTO `ups_shipping` VALUES (1,'07','','US_01,US_02,US_03,US_12,US_13,US_14,US_59','0','','','','','','','D Ground','','US','NY','10312','New York City','','','','UPS Shipping');
/*!40000 ALTER TABLE `ups_shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `view_category`
--

DROP TABLE IF EXISTS `view_category`;
/*!50001 DROP VIEW IF EXISTS `view_category`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_category` AS SELECT 
 1 AS `category_id`,
 1 AS `name`,
 1 AS `image`,
 1 AS `icon`,
 1 AS `slug`,
 1 AS `sort_order`,
 1 AS `create_date`,
 1 AS `create_by_id`,
 1 AS `edit_date`,
 1 AS `edit_by_id`,
 1 AS `status`,
 1 AS `language_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_country_city`
--

DROP TABLE IF EXISTS `view_country_city`;
/*!50001 DROP VIEW IF EXISTS `view_country_city`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_country_city` AS SELECT 
 1 AS `countries_id`,
 1 AS `countries_name`,
 1 AS `cities_id`,
 1 AS `cities_name`,
 1 AS `cities_code`,
 1 AS `cities_status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_country_city_area`
--

DROP TABLE IF EXISTS `view_country_city_area`;
/*!50001 DROP VIEW IF EXISTS `view_country_city_area`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_country_city_area` AS SELECT 
 1 AS `countries_id`,
 1 AS `countries_name`,
 1 AS `cities_id`,
 1 AS `cities_name`,
 1 AS `cities_code`,
 1 AS `area_id`,
 1 AS `area_name`,
 1 AS `area_code`,
 1 AS `area_status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_country_city_area_district`
--

DROP TABLE IF EXISTS `view_country_city_area_district`;
/*!50001 DROP VIEW IF EXISTS `view_country_city_area_district`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_country_city_area_district` AS SELECT 
 1 AS `countries_id`,
 1 AS `countries_name`,
 1 AS `cities_id`,
 1 AS `cities_name`,
 1 AS `cities_code`,
 1 AS `area_id`,
 1 AS `area_name`,
 1 AS `area_code`,
 1 AS `district_id`,
 1 AS `district_name`,
 1 AS `district_code`,
 1 AS `district_status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_country_city_area_district_zone`
--

DROP TABLE IF EXISTS `view_country_city_area_district_zone`;
/*!50001 DROP VIEW IF EXISTS `view_country_city_area_district_zone`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_country_city_area_district_zone` AS SELECT 
 1 AS `countries_id`,
 1 AS `countries_name`,
 1 AS `cities_id`,
 1 AS `cities_name`,
 1 AS `cities_code`,
 1 AS `area_id`,
 1 AS `area_name`,
 1 AS `area_code`,
 1 AS `district_id`,
 1 AS `district_name`,
 1 AS `district_code`,
 1 AS `district_status`,
 1 AS `zone_id`,
 1 AS `zone_name`,
 1 AS `zone_code`,
 1 AS `zone_status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_customer`
--

DROP TABLE IF EXISTS `view_customer`;
/*!50001 DROP VIEW IF EXISTS `view_customer`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_customer` AS SELECT 
 1 AS `id`,
 1 AS `customers_gender`,
 1 AS `customers_firstname`,
 1 AS `customers_lastname`,
 1 AS `customers_dob`,
 1 AS `email`,
 1 AS `user_name`,
 1 AS `customers_default_address_id`,
 1 AS `customers_telephone`,
 1 AS `customers_fax`,
 1 AS `password`,
 1 AS `customers_newsletter`,
 1 AS `fb_id`,
 1 AS `google_id`,
 1 AS `customers_picture`,
 1 AS `is_seen`,
 1 AS `remember_token`,
 1 AS `create_date`,
 1 AS `create_by_id`,
 1 AS `edit_date`,
 1 AS `edit_by_id`,
 1 AS `status`,
 1 AS `countries_name`,
 1 AS `countries_so_code_1`,
 1 AS `countries_iso_code_2`,
 1 AS `countries_address_format_id`,
 1 AS `countries_create_date`,
 1 AS `countries_create_by_id`,
 1 AS `countries_edit_date`,
 1 AS `countries_edit_by_id`,
 1 AS `countries_status`,
 1 AS `entry_company`,
 1 AS `entry_firstname`,
 1 AS `entry_lastname`,
 1 AS `countries_id`,
 1 AS `cities_id`,
 1 AS `area_id`,
 1 AS `district_id`,
 1 AS `zones_id`,
 1 AS `zones_name`,
 1 AS `zones_code`,
 1 AS `zones_district_id`,
 1 AS `zones_create_date`,
 1 AS `zones_create_by_id`,
 1 AS `zones_edit_date`,
 1 AS `zones_edit_by_id`,
 1 AS `zones_status`,
 1 AS `entry_create_date`,
 1 AS `entry_create_by_id`,
 1 AS `entry_edit_date`,
 1 AS `entry_edit_by_id`,
 1 AS `entry_status`,
 1 AS `entry_address`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_manufacturer`
--

DROP TABLE IF EXISTS `view_manufacturer`;
/*!50001 DROP VIEW IF EXISTS `view_manufacturer`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_manufacturer` AS SELECT 
 1 AS `manufacturer_id`,
 1 AS `name`,
 1 AS `url`,
 1 AS `image`,
 1 AS `slug`,
 1 AS `language_id`,
 1 AS `create_date`,
 1 AS `create_by_id`,
 1 AS `edit_date`,
 1 AS `edit_by_id`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_order`
--

DROP TABLE IF EXISTS `view_order`;
/*!50001 DROP VIEW IF EXISTS `view_order`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_order` AS SELECT 
 1 AS `order_id`,
 1 AS `customer_id`,
 1 AS `customer_name`,
 1 AS `customer_company`,
 1 AS `customer_street_address`,
 1 AS `customer_suburb`,
 1 AS `customer_city`,
 1 AS `customer_postcode`,
 1 AS `customer_state`,
 1 AS `customer_country`,
 1 AS `customer_telephone`,
 1 AS `email`,
 1 AS `delivery_name`,
 1 AS `delivery_company`,
 1 AS `delivery_street_address`,
 1 AS `delivery_suburb`,
 1 AS `delivery_city`,
 1 AS `delivery_postcode`,
 1 AS `delivery_state`,
 1 AS `delivery_country`,
 1 AS `billing_name`,
 1 AS `billing_company`,
 1 AS `billing_street_address`,
 1 AS `billing_suburb`,
 1 AS `billing_city`,
 1 AS `billing_postcode`,
 1 AS `billing_state`,
 1 AS `billing_country`,
 1 AS `payment_method`,
 1 AS `date_purchased`,
 1 AS `order_date_finished`,
 1 AS `order_price`,
 1 AS `shipping_cost`,
 1 AS `shipping_method`,
 1 AS `shipping_duration`,
 1 AS `order_information`,
 1 AS `is_seen`,
 1 AS `coupon_code`,
 1 AS `coupon_amount`,
 1 AS `free_shipping`,
 1 AS `customer_remark`,
 1 AS `create_date`,
 1 AS `create_by_id`,
 1 AS `edit_date`,
 1 AS `edit_by_id`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_order_product`
--

DROP TABLE IF EXISTS `view_order_product`;
/*!50001 DROP VIEW IF EXISTS `view_order_product`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_order_product` AS SELECT 
 1 AS `order_product_id`,
 1 AS `order_id`,
 1 AS `product_id`,
 1 AS `product_name`,
 1 AS `currency_id`,
 1 AS `product_price`,
 1 AS `final_price`,
 1 AS `product_quantity`,
 1 AS `weight`,
 1 AS `weight_unit`,
 1 AS `image`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_product`
--

DROP TABLE IF EXISTS `view_product`;
/*!50001 DROP VIEW IF EXISTS `view_product`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_product` AS SELECT 
 1 AS `product_id`,
 1 AS `category_id`,
 1 AS `sub_category_id`,
 1 AS `category_name`,
 1 AS `sub_category_name`,
 1 AS `sub_category_image`,
 1 AS `sub_category_icon`,
 1 AS `product_description_id`,
 1 AS `language_id`,
 1 AS `name`,
 1 AS `description`,
 1 AS `url`,
 1 AS `viewed`,
 1 AS `quantity`,
 1 AS `model`,
 1 AS `image`,
 1 AS `price`,
 1 AS `special_status`,
 1 AS `special_price`,
 1 AS `expiry_date`,
 1 AS `weight`,
 1 AS `weight_unit`,
 1 AS `ordered`,
 1 AS `tax_class_id`,
 1 AS `manufacturer_id`,
 1 AS `liked`,
 1 AS `low_limit`,
 1 AS `is_feature`,
 1 AS `slug`,
 1 AS `create_date`,
 1 AS `create_by_id`,
 1 AS `edit_date`,
 1 AS `edit_by_id`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_product_option`
--

DROP TABLE IF EXISTS `view_product_option`;
/*!50001 DROP VIEW IF EXISTS `view_product_option`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_product_option` AS SELECT 
 1 AS `product_option_id`,
 1 AS `name`,
 1 AS `language_id`,
 1 AS `create_date`,
 1 AS `create_by_id`,
 1 AS `edit_date`,
 1 AS `edit_by_id`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_product_option_value`
--

DROP TABLE IF EXISTS `view_product_option_value`;
/*!50001 DROP VIEW IF EXISTS `view_product_option_value`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_product_option_value` AS SELECT 
 1 AS `product_option_value_id`,
 1 AS `name`,
 1 AS `language_id`,
 1 AS `product_option_id`,
 1 AS `create_date`,
 1 AS `create_by_id`,
 1 AS `edit_date`,
 1 AS `edit_by_id`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_sub_category`
--

DROP TABLE IF EXISTS `view_sub_category`;
/*!50001 DROP VIEW IF EXISTS `view_sub_category`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `view_sub_category` AS SELECT 
 1 AS `sub_category_id`,
 1 AS `category_name`,
 1 AS `category_id`,
 1 AS `sub_category_name`,
 1 AS `image`,
 1 AS `icon`,
 1 AS `slug`,
 1 AS `sort_order`,
 1 AS `create_date`,
 1 AS `create_by_id`,
 1 AS `edit_date`,
 1 AS `edit_by_id`,
 1 AS `status`,
 1 AS `category_language_id`,
 1 AS `sub_category_language_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `whos_online`
--

DROP TABLE IF EXISTS `whos_online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `whos_online` (
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `session_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `time_entry` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `time_last_click` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `last_page_url` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whos_online`
--

LOCK TABLES `whos_online` WRITE;
/*!40000 ALTER TABLE `whos_online` DISABLE KEYS */;
INSERT INTO `whos_online` VALUES (1,'muzammil younas','','','2017-08-30 13:','',''),(2,'Rabia Saqib','','','2017-08-25 20:','',''),(3,'Test Ionicecommerce','','','2017-09-08 10:','',''),(4,'Jamie Lam','','','2018-11-07 17:','',''),(5,'Tester Lee','','','2018-11-17 08:','','');
/*!40000 ALTER TABLE `whos_online` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by_id` int(11) DEFAULT NULL,
  `edit_date` datetime NOT NULL,
  `edit_by_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_zones_country_id` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
INSERT INTO `zones` VALUES (1,'彩虹1','CHOIHUN1',1,'2019-01-19 22:32:12',NULL,'2019-05-13 02:01:57',NULL,'active'),(2,'牛頭角','Code2',1,'2019-01-19 23:30:59',NULL,'2019-02-24 17:18:03',NULL,'active'),(9,'Japan','Zone',7,'2019-02-25 00:20:57',NULL,'2019-02-25 00:20:57',NULL,'active');
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zones_to_geo_zones`
--

DROP TABLE IF EXISTS `zones_to_geo_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `zones_to_geo_zones` (
  `association_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_country_id` int(11) NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `geo_zone_id` int(11) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`association_id`),
  KEY `idx_zones_to_geo_zones_country_id` (`zone_country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones_to_geo_zones`
--

LOCK TABLES `zones_to_geo_zones` WRITE;
/*!40000 ALTER TABLE `zones_to_geo_zones` DISABLE KEYS */;
/*!40000 ALTER TABLE `zones_to_geo_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `view_category`
--

/*!50001 DROP VIEW IF EXISTS `view_category`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_category` AS select `category`.`category_id` AS `category_id`,`category_description`.`name` AS `name`,`category`.`image` AS `image`,`category`.`icon` AS `icon`,`category`.`slug` AS `slug`,`category`.`sort_order` AS `sort_order`,`category`.`create_date` AS `create_date`,`category`.`create_by_id` AS `create_by_id`,`category`.`edit_date` AS `edit_date`,`category`.`edit_by_id` AS `edit_by_id`,`category`.`status` AS `status`,`category_description`.`language_id` AS `language_id` from (`category` left join `category_description` on((`category_description`.`category_id` = `category`.`category_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_country_city`
--

/*!50001 DROP VIEW IF EXISTS `view_country_city`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_country_city` AS select `countries`.`id` AS `countries_id`,`countries`.`name` AS `countries_name`,`cities`.`id` AS `cities_id`,`cities`.`name` AS `cities_name`,`cities`.`code` AS `cities_code`,`cities`.`status` AS `cities_status` from (`cities` left join `countries` on((`cities`.`countries_id` = `countries`.`id`))) where (`countries`.`id` is not null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_country_city_area`
--

/*!50001 DROP VIEW IF EXISTS `view_country_city_area`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_country_city_area` AS select `countries`.`id` AS `countries_id`,`countries`.`name` AS `countries_name`,`cities`.`id` AS `cities_id`,`cities`.`name` AS `cities_name`,`cities`.`code` AS `cities_code`,`area`.`id` AS `area_id`,`area`.`name` AS `area_name`,`area`.`code` AS `area_code`,`area`.`status` AS `area_status` from ((`area` left join `cities` on((`area`.`city_id` = `cities`.`id`))) left join `countries` on((`cities`.`countries_id` = `countries`.`id`))) where ((`cities`.`id` is not null) and (`countries`.`id` is not null)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_country_city_area_district`
--

/*!50001 DROP VIEW IF EXISTS `view_country_city_area_district`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_country_city_area_district` AS select `countries`.`id` AS `countries_id`,`countries`.`name` AS `countries_name`,`cities`.`id` AS `cities_id`,`cities`.`name` AS `cities_name`,`cities`.`code` AS `cities_code`,`area`.`id` AS `area_id`,`area`.`name` AS `area_name`,`area`.`code` AS `area_code`,`district`.`id` AS `district_id`,`district`.`name` AS `district_name`,`district`.`code` AS `district_code`,`district`.`status` AS `district_status` from (((`district` left join `area` on((`district`.`area_id` = `area`.`id`))) left join `cities` on((`area`.`city_id` = `cities`.`id`))) left join `countries` on((`cities`.`countries_id` = `countries`.`id`))) where ((`countries`.`id` is not null) and (`cities`.`id` is not null) and (`area`.`id` is not null)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_country_city_area_district_zone`
--

/*!50001 DROP VIEW IF EXISTS `view_country_city_area_district_zone`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_country_city_area_district_zone` AS select `countries`.`id` AS `countries_id`,`countries`.`name` AS `countries_name`,`cities`.`id` AS `cities_id`,`cities`.`name` AS `cities_name`,`cities`.`code` AS `cities_code`,`area`.`id` AS `area_id`,`area`.`name` AS `area_name`,`area`.`code` AS `area_code`,`district`.`id` AS `district_id`,`district`.`name` AS `district_name`,`district`.`code` AS `district_code`,`district`.`status` AS `district_status`,`zones`.`id` AS `zone_id`,`zones`.`name` AS `zone_name`,`zones`.`code` AS `zone_code`,`zones`.`status` AS `zone_status` from ((((`zones` left join `district` on((`zones`.`district_id` = `district`.`id`))) left join `area` on((`district`.`area_id` = `area`.`id`))) left join `cities` on((`area`.`city_id` = `cities`.`id`))) left join `countries` on((`cities`.`countries_id` = `countries`.`id`))) where ((`countries`.`id` is not null) and (`cities`.`id` is not null) and (`area`.`id` is not null) and (`district`.`id` is not null)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_customer`
--

/*!50001 DROP VIEW IF EXISTS `view_customer`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_customer` AS select `customers`.`id` AS `id`,`customers`.`customers_gender` AS `customers_gender`,`customers`.`customers_firstname` AS `customers_firstname`,`customers`.`customers_lastname` AS `customers_lastname`,`customers`.`customers_dob` AS `customers_dob`,`customers`.`email` AS `email`,`customers`.`user_name` AS `user_name`,`customers`.`customers_default_address_id` AS `customers_default_address_id`,`customers`.`customers_telephone` AS `customers_telephone`,`customers`.`customers_fax` AS `customers_fax`,`customers`.`password` AS `password`,`customers`.`customers_newsletter` AS `customers_newsletter`,`customers`.`fb_id` AS `fb_id`,`customers`.`google_id` AS `google_id`,`customers`.`customers_picture` AS `customers_picture`,`customers`.`is_seen` AS `is_seen`,`customers`.`remember_token` AS `remember_token`,`customers`.`create_date` AS `create_date`,`customers`.`create_by_id` AS `create_by_id`,`customers`.`edit_date` AS `edit_date`,`customers`.`edit_by_id` AS `edit_by_id`,`customers`.`status` AS `status`,`countries`.`name` AS `countries_name`,`countries`.`iso_code_1` AS `countries_so_code_1`,`countries`.`iso_code_2` AS `countries_iso_code_2`,`countries`.`address_format_id` AS `countries_address_format_id`,`countries`.`create_date` AS `countries_create_date`,`countries`.`create_by_id` AS `countries_create_by_id`,`countries`.`edit_date` AS `countries_edit_date`,`countries`.`edit_by_id` AS `countries_edit_by_id`,`countries`.`status` AS `countries_status`,`address_book`.`company` AS `entry_company`,`address_book`.`firstname` AS `entry_firstname`,`address_book`.`lastname` AS `entry_lastname`,`address_book`.`countries_id` AS `countries_id`,`address_book`.`cities_id` AS `cities_id`,`address_book`.`area_id` AS `area_id`,`address_book`.`district_id` AS `district_id`,`address_book`.`zone_id` AS `zones_id`,`zones`.`name` AS `zones_name`,`zones`.`code` AS `zones_code`,`zones`.`district_id` AS `zones_district_id`,`zones`.`create_date` AS `zones_create_date`,`zones`.`create_by_id` AS `zones_create_by_id`,`zones`.`edit_date` AS `zones_edit_date`,`zones`.`edit_by_id` AS `zones_edit_by_id`,`zones`.`status` AS `zones_status`,`address_book`.`create_date` AS `entry_create_date`,`address_book`.`create_by_id` AS `entry_create_by_id`,`address_book`.`edit_date` AS `entry_edit_date`,`address_book`.`edit_by_id` AS `entry_edit_by_id`,`address_book`.`status` AS `entry_status`,`address_book`.`address` AS `entry_address` from ((((`customers` left join `address_book` on((`address_book`.`id` = `customers`.`customers_default_address_id`))) left join `countries` on((`countries`.`id` = `address_book`.`customer_id`))) left join `zones` on((`zones`.`id` = `address_book`.`zone_id`))) left join `customers_info` on((`customers_info`.`customers_info_id` = `customers`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_manufacturer`
--

/*!50001 DROP VIEW IF EXISTS `view_manufacturer`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_manufacturer` AS select `manufacturer`.`manufacturer_id` AS `manufacturer_id`,`manufacturer_description`.`name` AS `name`,`manufacturer`.`url` AS `url`,`manufacturer`.`image` AS `image`,`manufacturer`.`slug` AS `slug`,`manufacturer_description`.`language_id` AS `language_id`,`manufacturer`.`create_date` AS `create_date`,`manufacturer`.`create_by_id` AS `create_by_id`,`manufacturer`.`edit_date` AS `edit_date`,`manufacturer`.`edit_by_id` AS `edit_by_id`,`manufacturer`.`status` AS `status` from (`manufacturer` left join `manufacturer_description` on((`manufacturer`.`manufacturer_id` = `manufacturer_description`.`manufacturer_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_order`
--

/*!50001 DROP VIEW IF EXISTS `view_order`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_order` AS select `order`.`order_id` AS `order_id`,`order`.`customer_id` AS `customer_id`,`order`.`customer_name` AS `customer_name`,`order`.`customer_company` AS `customer_company`,`order`.`customer_street_address` AS `customer_street_address`,`order`.`customer_suburb` AS `customer_suburb`,`order`.`customer_city` AS `customer_city`,`order`.`customer_postcode` AS `customer_postcode`,`order`.`customer_state` AS `customer_state`,`order`.`customer_country` AS `customer_country`,`order`.`customer_telephone` AS `customer_telephone`,`order`.`email` AS `email`,`order`.`delivery_name` AS `delivery_name`,`order`.`delivery_company` AS `delivery_company`,`order`.`delivery_street_address` AS `delivery_street_address`,`order`.`delivery_suburb` AS `delivery_suburb`,`order`.`delivery_city` AS `delivery_city`,`order`.`delivery_postcode` AS `delivery_postcode`,`order`.`delivery_state` AS `delivery_state`,`order`.`delivery_country` AS `delivery_country`,`order`.`billing_name` AS `billing_name`,`order`.`billing_company` AS `billing_company`,`order`.`billing_street_address` AS `billing_street_address`,`order`.`billing_suburb` AS `billing_suburb`,`order`.`billing_city` AS `billing_city`,`order`.`billing_postcode` AS `billing_postcode`,`order`.`billing_state` AS `billing_state`,`order`.`billing_country` AS `billing_country`,`order`.`payment_method` AS `payment_method`,`order`.`date_purchased` AS `date_purchased`,`order`.`order_date_finished` AS `order_date_finished`,`order`.`order_price` AS `order_price`,`order`.`shipping_cost` AS `shipping_cost`,`order`.`shipping_method` AS `shipping_method`,`order`.`shipping_duration` AS `shipping_duration`,`order`.`order_information` AS `order_information`,`order`.`is_seen` AS `is_seen`,`order`.`coupon_code` AS `coupon_code`,`order`.`coupon_amount` AS `coupon_amount`,`order`.`free_shipping` AS `free_shipping`,`order`.`customer_remark` AS `customer_remark`,`order`.`create_date` AS `create_date`,`order`.`create_by_id` AS `create_by_id`,`order`.`edit_date` AS `edit_date`,`order`.`edit_by_id` AS `edit_by_id`,`order`.`status` AS `status` from (`order` left join `order_product` on((`order`.`order_id` = `order_product`.`order_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_order_product`
--

/*!50001 DROP VIEW IF EXISTS `view_order_product`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_order_product` AS select `order_product`.`order_product_id` AS `order_product_id`,`order_product`.`order_id` AS `order_id`,`order_product`.`product_id` AS `product_id`,`order_product`.`product_name` AS `product_name`,`order_product`.`currency_id` AS `currency_id`,`order_product`.`product_price` AS `product_price`,`order_product`.`final_price` AS `final_price`,`order_product`.`product_quantity` AS `product_quantity`,`order_product`.`weight` AS `weight`,`order_product`.`weight_unit` AS `weight_unit`,`product`.`image` AS `image` from (`order_product` left join `product` on((`product`.`product_id` = `order_product`.`product_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_product`
--

/*!50001 DROP VIEW IF EXISTS `view_product`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_product` AS select `product`.`product_id` AS `product_id`,`view_sub_category`.`category_id` AS `category_id`,`product`.`sub_category_id` AS `sub_category_id`,`view_sub_category`.`category_name` AS `category_name`,`view_sub_category`.`sub_category_name` AS `sub_category_name`,`view_sub_category`.`image` AS `sub_category_image`,`view_sub_category`.`icon` AS `sub_category_icon`,`product_description`.`product_description_id` AS `product_description_id`,`product_description`.`language_id` AS `language_id`,`product_description`.`name` AS `name`,`product_description`.`description` AS `description`,`product_description`.`url` AS `url`,`product_description`.`viewed` AS `viewed`,`product`.`quantity` AS `quantity`,`product`.`model` AS `model`,`product`.`image` AS `image`,`product`.`price` AS `price`,`product`.`special_status` AS `special_status`,`product`.`special_price` AS `special_price`,`product`.`expiry_date` AS `expiry_date`,`product`.`weight` AS `weight`,`product`.`weight_unit` AS `weight_unit`,`product`.`ordered` AS `ordered`,`product`.`tax_class_id` AS `tax_class_id`,`product`.`manufacturer_id` AS `manufacturer_id`,`product`.`liked` AS `liked`,`product`.`low_limit` AS `low_limit`,`product`.`is_feature` AS `is_feature`,`product`.`slug` AS `slug`,`product`.`create_date` AS `create_date`,`product`.`create_by_id` AS `create_by_id`,`product`.`edit_date` AS `edit_date`,`product`.`edit_by_id` AS `edit_by_id`,`product`.`status` AS `status` from ((`product` left join `product_description` on((`product`.`product_id` = `product_description`.`product_id`))) left join `view_sub_category` on((`view_sub_category`.`sub_category_id` = `product`.`sub_category_id`))) where (`product_description`.`language_id` is not null) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_product_option`
--

/*!50001 DROP VIEW IF EXISTS `view_product_option`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_product_option` AS select `product_option`.`product_option_id` AS `product_option_id`,`product_option_description`.`name` AS `name`,`product_option_description`.`language_id` AS `language_id`,`product_option`.`create_date` AS `create_date`,`product_option`.`create_by_id` AS `create_by_id`,`product_option`.`edit_date` AS `edit_date`,`product_option`.`edit_by_id` AS `edit_by_id`,`product_option`.`status` AS `status` from (`product_option` left join `product_option_description` on((`product_option_description`.`product_option_id` = `product_option`.`product_option_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_product_option_value`
--

/*!50001 DROP VIEW IF EXISTS `view_product_option_value`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_product_option_value` AS select `product_option_value`.`product_option_value_id` AS `product_option_value_id`,`product_option_value_description`.`name` AS `name`,`product_option_value_description`.`language_id` AS `language_id`,`product_option_value`.`product_option_id` AS `product_option_id`,`product_option_value`.`create_date` AS `create_date`,`product_option_value`.`create_by_id` AS `create_by_id`,`product_option_value`.`edit_date` AS `edit_date`,`product_option_value`.`edit_by_id` AS `edit_by_id`,`product_option_value`.`status` AS `status` from (`product_option_value` left join `product_option_value_description` on((`product_option_value`.`product_option_value_id` = `product_option_value_description`.`product_option_value_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_sub_category`
--

/*!50001 DROP VIEW IF EXISTS `view_sub_category`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_sub_category` AS select `sub_category`.`sub_category_id` AS `sub_category_id`,`category_description`.`name` AS `category_name`,`sub_category`.`category_id` AS `category_id`,`sub_category_description`.`name` AS `sub_category_name`,`sub_category`.`image` AS `image`,`sub_category`.`icon` AS `icon`,`sub_category`.`slug` AS `slug`,`sub_category`.`sort_order` AS `sort_order`,`sub_category`.`create_date` AS `create_date`,`sub_category`.`create_by_id` AS `create_by_id`,`sub_category`.`edit_date` AS `edit_date`,`sub_category`.`edit_by_id` AS `edit_by_id`,`sub_category`.`status` AS `status`,`category_description`.`language_id` AS `category_language_id`,`sub_category_description`.`language_id` AS `sub_category_language_id` from ((`sub_category` left join `category_description` on((`category_description`.`category_id` = `sub_category`.`category_id`))) left join `sub_category_description` on((`sub_category_description`.`sub_category_id` = `sub_category`.`sub_category_id`))) where (`category_description`.`language_id` = `sub_category_description`.`language_id`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-04 17:59:50
