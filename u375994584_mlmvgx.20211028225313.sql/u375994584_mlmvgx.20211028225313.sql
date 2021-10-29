-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u375994584_mlmvgx
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(250) DEFAULT NULL,
  `middlename` varchar(250) DEFAULT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'jane','jane','jane','mlm262021','adminmlm2021');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;

--
-- Table structure for table `bunos`
--

DROP TABLE IF EXISTS `bunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bunos_count` int(100) DEFAULT 0,
  `userid` varchar(100) DEFAULT NULL,
  `active1` int(9) DEFAULT 0,
  `active2` int(9) DEFAULT 0,
  `active3` int(9) DEFAULT 0,
  `active4` int(9) DEFAULT 0,
  `active5` int(9) DEFAULT 0,
  `active6` int(9) DEFAULT 0,
  `read_status1` int(9) DEFAULT 0,
  `read_status2` int(9) DEFAULT 0,
  `read_status3` int(9) DEFAULT 0,
  `read_status4` int(9) DEFAULT 0,
  `read_status5` int(9) DEFAULT 0,
  `read_status6` int(9) DEFAULT 0,
  `bonus1` varchar(255) DEFAULT NULL,
  `bonus2` varchar(255) DEFAULT NULL,
  `bonus3` varchar(255) DEFAULT NULL,
  `bonus4` varchar(255) DEFAULT NULL,
  `bonus5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2288 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bunos`
--

/*!40000 ALTER TABLE `bunos` DISABLE KEYS */;
INSERT INTO `bunos` VALUES (18,0,'user@tutorialvilla.com',0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `bunos` ENABLE KEYS */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `total_amount` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (262,1,'0.0.0.0','user@tutorialvilla.com','Berkah Jerah Herbal Tea','berkah_jerah.png',1,480,480);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`u375994584_vgx12com`@`127.0.0.1`*/ /*!50003 TRIGGER `insert_total` BEFORE INSERT ON `cart` FOR EACH ROW SET
new.total_amount= new.qty * new.price */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`u375994584_vgx12com`@`127.0.0.1`*/ /*!50003 TRIGGER `total` BEFORE UPDATE ON `cart` FOR EACH ROW SET
new.total_amount= new.qty * new.price */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `cat`
--

DROP TABLE IF EXISTS `cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat` (
  `cat_id` int(255) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat`
--

/*!40000 ALTER TABLE `cat` DISABLE KEYS */;
INSERT INTO `cat` VALUES (1,'Property'),(2,'Car'),(3,'Gadget'),(4,'Women Fashion'),(5,'Men Fashion'),(6,'Health Products'),(7,'Babies & kids'),(8,'Electronics'),(9,'Home & Furniture'),(10,'Car Parts & Accessories'),(11,'Motorbikes'),(12,'Toys & Games'),(13,'Books'),(14,'Design & Craft'),(15,'Antiques'),(16,'Gardening'),(17,'Pet Supplies'),(18,'Sports'),(19,'Electronic Accessories'),(20,'Beauty Products');
/*!40000 ALTER TABLE `cat` ENABLE KEYS */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `chatroomid` int(11) NOT NULL,
  `message` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_date` datetime NOT NULL,
  `chatid` int(255) NOT NULL,
  `read_stat` int(3) NOT NULL DEFAULT 0,
  `activity` int(11) DEFAULT 1,
  `hotel_id` int(255) DEFAULT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;

--
-- Table structure for table `chat_member`
--

DROP TABLE IF EXISTS `chat_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_member` (
  `chat_memberid` int(11) NOT NULL AUTO_INCREMENT,
  `chatroomid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`chat_memberid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_member`
--

/*!40000 ALTER TABLE `chat_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_member` ENABLE KEYS */;

--
-- Table structure for table `chatroom`
--

DROP TABLE IF EXISTS `chatroom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatroom` (
  `chatroomid` int(11) NOT NULL AUTO_INCREMENT,
  `chat_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `latest_message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_last` datetime DEFAULT NULL,
  `fromwhom` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`chatroomid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatroom`
--

/*!40000 ALTER TABLE `chatroom` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatroom` ENABLE KEYS */;

--
-- Table structure for table `chatrooms`
--

DROP TABLE IF EXISTS `chatrooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatrooms` (
  `chatroomid` int(11) NOT NULL AUTO_INCREMENT,
  `chat_name` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`chatroomid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatrooms`
--

/*!40000 ALTER TABLE `chatrooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `chatrooms` ENABLE KEYS */;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chats` (
  `chatid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `chat_date` datetime NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;

--
-- Table structure for table `commision_settings`
--

DROP TABLE IF EXISTS `commision_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commision_settings` (
  `id_CS` int(255) NOT NULL AUTO_INCREMENT,
  `label_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equivalent_value` float NOT NULL,
  PRIMARY KEY (`id_CS`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commision_settings`
--

/*!40000 ALTER TABLE `commision_settings` DISABLE KEYS */;
INSERT INTO `commision_settings` VALUES (1,'upline',0.01),(2,'downline',0.12);
/*!40000 ALTER TABLE `commision_settings` ENABLE KEYS */;

--
-- Table structure for table `commisions`
--

DROP TABLE IF EXISTS `commisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commisions` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `com_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(255) NOT NULL,
  `comission_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commisions`
--

/*!40000 ALTER TABLE `commisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `commisions` ENABLE KEYS */;

--
-- Table structure for table `compensation`
--

DROP TABLE IF EXISTS `compensation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compensation` (
  `level` int(10) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compensation`
--

/*!40000 ALTER TABLE `compensation` DISABLE KEYS */;
INSERT INTO `compensation` VALUES (1,330),(2,90),(3,20),(4,9),(5,2.1),(6,0),(0,330);
/*!40000 ALTER TABLE `compensation` ENABLE KEYS */;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `num_code` int(3) NOT NULL DEFAULT 0,
  `alpha_2_code` varchar(2) DEFAULT NULL,
  `alpha_3_code` varchar(3) DEFAULT NULL,
  `en_short_name` varchar(52) DEFAULT NULL,
  `nationality` varchar(39) DEFAULT NULL,
  PRIMARY KEY (`num_code`),
  UNIQUE KEY `alpha_2_code` (`alpha_2_code`),
  UNIQUE KEY `alpha_3_code` (`alpha_3_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (4,'AF','AFG','Afghanistan','Afghan'),(8,'AL','ALB','Albania','Albanian'),(10,'AQ','ATA','Antarctica','Antarctic'),(12,'DZ','DZA','Algeria','Algerian'),(16,'AS','ASM','American Samoa','American Samoan'),(20,'AD','AND','Andorra','Andorran'),(24,'AO','AGO','Angola','Angolan'),(28,'AG','ATG','Antigua and Barbuda','Antiguan or Barbudan'),(31,'AZ','AZE','Azerbaijan','Azerbaijani, Azeri'),(32,'AR','ARG','Argentina','Argentine'),(36,'AU','AUS','Australia','Australian'),(40,'AT','AUT','Austria','Austrian'),(44,'BS','BHS','Bahamas','Bahamian'),(48,'BH','BHR','Bahrain','Bahraini'),(50,'BD','BGD','Bangladesh','Bangladeshi'),(51,'AM','ARM','Armenia','Armenian'),(52,'BB','BRB','Barbados','Barbadian'),(56,'BE','BEL','Belgium','Belgian'),(60,'BM','BMU','Bermuda','Bermudian, Bermudan'),(64,'BT','BTN','Bhutan','Bhutanese'),(68,'BO','BOL','Bolivia (Plurinational State of)','Bolivian'),(70,'BA','BIH','Bosnia and Herzegovina','Bosnian or Herzegovinian'),(72,'BW','BWA','Botswana','Motswana, Botswanan'),(74,'BV','BVT','Bouvet Island','Bouvet Island'),(76,'BR','BRA','Brazil','Brazilian'),(84,'BZ','BLZ','Belize','Belizean'),(86,'IO','IOT','British Indian Ocean Territory','BIOT'),(90,'SB','SLB','Solomon Islands','Solomon Island'),(92,'VG','VGB','Virgin Islands (British)','British Virgin Island'),(96,'BN','BRN','Brunei Darussalam','Bruneian'),(100,'BG','BGR','Bulgaria','Bulgarian'),(104,'MM','MMR','Myanmar','Burmese'),(108,'BI','BDI','Burundi','Burundian'),(112,'BY','BLR','Belarus','Belarusian'),(116,'KH','KHM','Cambodia','Cambodian'),(120,'CM','CMR','Cameroon','Cameroonian'),(124,'CA','CAN','Canada','Canadian'),(132,'CV','CPV','Cabo Verde','Cabo Verdean'),(136,'KY','CYM','Cayman Islands','Caymanian'),(140,'CF','CAF','Central African Republic','Central African'),(144,'LK','LKA','Sri Lanka','Sri Lankan'),(148,'TD','TCD','Chad','Chadian'),(152,'CL','CHL','Chile','Chilean'),(156,'CN','CHN','China','Chinese'),(158,'TW','TWN','Taiwan, Province of China','Chinese, Taiwanese'),(162,'CX','CXR','Christmas Island','Christmas Island'),(166,'CC','CCK','Cocos (Keeling) Islands','Cocos Island'),(170,'CO','COL','Colombia','Colombian'),(174,'KM','COM','Comoros','Comoran, Comorian'),(175,'YT','MYT','Mayotte','Mahoran'),(178,'CG','COG','Congo (Republic of the)','Congolese'),(180,'CD','COD','Congo (Democratic Republic of the)','Congolese'),(184,'CK','COK','Cook Islands','Cook Island'),(188,'CR','CRI','Costa Rica','Costa Rican'),(191,'HR','HRV','Croatia','Croatian'),(192,'CU','CUB','Cuba','Cuban'),(196,'CY','CYP','Cyprus','Cypriot'),(203,'CZ','CZE','Czech Republic','Czech'),(204,'BJ','BEN','Benin','Beninese, Beninois'),(208,'DK','DNK','Denmark','Danish'),(212,'DM','DMA','Dominica','Dominican'),(214,'DO','DOM','Dominican Republic','Dominican'),(218,'EC','ECU','Ecuador','Ecuadorian'),(222,'SV','SLV','El Salvador','Salvadoran'),(226,'GQ','GNQ','Equatorial Guinea','Equatorial Guinean, Equatoguinean'),(231,'ET','ETH','Ethiopia','Ethiopian'),(232,'ER','ERI','Eritrea','Eritrean'),(233,'EE','EST','Estonia','Estonian'),(234,'FO','FRO','Faroe Islands','Faroese'),(238,'FK','FLK','Falkland Islands (Malvinas)','Falkland Island'),(239,'GS','SGS','South Georgia and the South Sandwich Islands','South Georgia or South Sandwich Islands'),(242,'FJ','FJI','Fiji','Fijian'),(246,'FI','FIN','Finland','Finnish'),(248,'AX','ALA','Åland Islands','Åland Island'),(250,'FR','FRA','France','French'),(254,'GF','GUF','French Guiana','French Guianese'),(258,'PF','PYF','French Polynesia','French Polynesian'),(260,'TF','ATF','French Southern Territories','French Southern Territories'),(262,'DJ','DJI','Djibouti','Djiboutian'),(266,'GA','GAB','Gabon','Gabonese'),(268,'GE','GEO','Georgia','Georgian'),(270,'GM','GMB','Gambia','Gambian'),(275,'PS','PSE','Palestine, State of','Palestinian'),(276,'DE','DEU','Germany','German'),(288,'GH','GHA','Ghana','Ghanaian'),(292,'GI','GIB','Gibraltar','Gibraltar'),(296,'KI','KIR','Kiribati','I-Kiribati'),(300,'GR','GRC','Greece','Greek, Hellenic'),(304,'GL','GRL','Greenland','Greenlandic'),(308,'GD','GRD','Grenada','Grenadian'),(312,'GP','GLP','Guadeloupe','Guadeloupe'),(316,'GU','GUM','Guam','Guamanian, Guambat'),(320,'GT','GTM','Guatemala','Guatemalan'),(324,'GN','GIN','Guinea','Guinean'),(328,'GY','GUY','Guyana','Guyanese'),(332,'HT','HTI','Haiti','Haitian'),(334,'HM','HMD','Heard Island and McDonald Islands','Heard Island or McDonald Islands'),(336,'VA','VAT','Vatican City State','Vatican'),(340,'HN','HND','Honduras','Honduran'),(344,'HK','HKG','Hong Kong','Hong Kong, Hong Kongese'),(348,'HU','HUN','Hungary','Hungarian, Magyar'),(352,'IS','ISL','Iceland','Icelandic'),(356,'IN','IND','India','Indian'),(360,'ID','IDN','Indonesia','Indonesian'),(364,'IR','IRN','Iran','Iranian, Persian'),(368,'IQ','IRQ','Iraq','Iraqi'),(372,'IE','IRL','Ireland','Irish'),(376,'IL','ISR','Israel','Israeli'),(380,'IT','ITA','Italy','Italian'),(384,'CI','CIV','Côte d\'Ivoire','Ivorian'),(388,'JM','JAM','Jamaica','Jamaican'),(392,'JP','JPN','Japan','Japanese'),(398,'KZ','KAZ','Kazakhstan','Kazakhstani, Kazakh'),(400,'JO','JOR','Jordan','Jordanian'),(404,'KE','KEN','Kenya','Kenyan'),(408,'KP','PRK','Korea (Democratic People\'s Republic of)','North Korean'),(410,'KR','KOR','Korea (Republic of)','South Korean'),(414,'KW','KWT','Kuwait','Kuwaiti'),(417,'KG','KGZ','Kyrgyzstan','Kyrgyzstani, Kyrgyz, Kirgiz, Kirghiz'),(418,'LA','LAO','Lao People\'s Democratic Republic','Lao, Laotian'),(422,'LB','LBN','Lebanon','Lebanese'),(426,'LS','LSO','Lesotho','Basotho'),(428,'LV','LVA','Latvia','Latvian'),(430,'LR','LBR','Liberia','Liberian'),(434,'LY','LBY','Libya','Libyan'),(438,'LI','LIE','Liechtenstein','Liechtenstein'),(440,'LT','LTU','Lithuania','Lithuanian'),(442,'LU','LUX','Luxembourg','Luxembourg, Luxembourgish'),(446,'MO','MAC','Macao','Macanese, Chinese'),(450,'MG','MDG','Madagascar','Malagasy'),(454,'MW','MWI','Malawi','Malawian'),(458,'MY','MYS','Malaysia','Malaysian'),(462,'MV','MDV','Maldives','Maldivian'),(466,'ML','MLI','Mali','Malian, Malinese'),(470,'MT','MLT','Malta','Maltese'),(474,'MQ','MTQ','Martinique','Martiniquais, Martinican'),(478,'MR','MRT','Mauritania','Mauritanian'),(480,'MU','MUS','Mauritius','Mauritian'),(484,'MX','MEX','Mexico','Mexican'),(492,'MC','MCO','Monaco','Monégasque, Monacan'),(496,'MN','MNG','Mongolia','Mongolian'),(498,'MD','MDA','Moldova (Republic of)','Moldovan'),(499,'ME','MNE','Montenegro','Montenegrin'),(500,'MS','MSR','Montserrat','Montserratian'),(504,'MA','MAR','Morocco','Moroccan'),(508,'MZ','MOZ','Mozambique','Mozambican'),(512,'OM','OMN','Oman','Omani'),(516,'NA','NAM','Namibia','Namibian'),(520,'NR','NRU','Nauru','Nauruan'),(524,'NP','NPL','Nepal','Nepali, Nepalese'),(528,'NL','NLD','Netherlands','Dutch, Netherlandic'),(531,'CW','CUW','Curaçao','Curaçaoan'),(533,'AW','ABW','Aruba','Aruban'),(534,'SX','SXM','Sint Maarten (Dutch part)','Sint Maarten'),(535,'BQ','BES','Bonaire, Sint Eustatius and Saba','Bonaire'),(540,'NC','NCL','New Caledonia','New Caledonian'),(548,'VU','VUT','Vanuatu','Ni-Vanuatu, Vanuatuan'),(554,'NZ','NZL','New Zealand','New Zealand, NZ'),(558,'NI','NIC','Nicaragua','Nicaraguan'),(562,'NE','NER','Niger','Nigerien'),(566,'NG','NGA','Nigeria','Nigerian'),(570,'NU','NIU','Niue','Niuean'),(574,'NF','NFK','Norfolk Island','Norfolk Island'),(578,'NO','NOR','Norway','Norwegian'),(580,'MP','MNP','Northern Mariana Islands','Northern Marianan'),(581,'UM','UMI','United States Minor Outlying Islands','American'),(583,'FM','FSM','Micronesia (Federated States of)','Micronesian'),(584,'MH','MHL','Marshall Islands','Marshallese'),(585,'PW','PLW','Palau','Palauan'),(586,'PK','PAK','Pakistan','Pakistani'),(591,'PA','PAN','Panama','Panamanian'),(598,'PG','PNG','Papua New Guinea','Papua New Guinean, Papuan'),(600,'PY','PRY','Paraguay','Paraguayan'),(604,'PE','PER','Peru','Peruvian'),(608,'PH','PHL','Philippines','Philippine, Filipino'),(612,'PN','PCN','Pitcairn','Pitcairn Island'),(616,'PL','POL','Poland','Polish'),(620,'PT','PRT','Portugal','Portuguese'),(624,'GW','GNB','Guinea-Bissau','Bissau-Guinean'),(626,'TL','TLS','Timor-Leste','Timorese'),(630,'PR','PRI','Puerto Rico','Puerto Rican'),(634,'QA','QAT','Qatar','Qatari'),(638,'RE','REU','Réunion','Réunionese, Réunionnais'),(642,'RO','ROU','Romania','Romanian'),(643,'RU','RUS','Russian Federation','Russian'),(646,'RW','RWA','Rwanda','Rwandan'),(652,'BL','BLM','Saint Barthélemy','Barthélemois'),(654,'SH','SHN','Saint Helena, Ascension and Tristan da Cunha','Saint Helenian'),(659,'KN','KNA','Saint Kitts and Nevis','Kittitian or Nevisian'),(660,'AI','AIA','Anguilla','Anguillan'),(662,'LC','LCA','Saint Lucia','Saint Lucian'),(663,'MF','MAF','Saint Martin (French part)','Saint-Martinoise'),(666,'PM','SPM','Saint Pierre and Miquelon','Saint-Pierrais or Miquelonnais'),(670,'VC','VCT','Saint Vincent and the Grenadines','Saint Vincentian, Vincentian'),(674,'SM','SMR','San Marino','Sammarinese'),(678,'ST','STP','Sao Tome and Principe','São Toméan'),(682,'SA','SAU','Saudi Arabia','Saudi, Saudi Arabian'),(686,'SN','SEN','Senegal','Senegalese'),(688,'RS','SRB','Serbia','Serbian'),(690,'SC','SYC','Seychelles','Seychellois'),(694,'SL','SLE','Sierra Leone','Sierra Leonean'),(702,'SG','SGP','Singapore','Singaporean'),(703,'SK','SVK','Slovakia','Slovak'),(704,'VN','VNM','Vietnam','Vietnamese'),(705,'SI','SVN','Slovenia','Slovenian, Slovene'),(706,'SO','SOM','Somalia','Somali, Somalian'),(710,'ZA','ZAF','South Africa','South African'),(716,'ZW','ZWE','Zimbabwe','Zimbabwean'),(724,'ES','ESP','Spain','Spanish'),(728,'SS','SSD','South Sudan','South Sudanese'),(729,'SD','SDN','Sudan','Sudanese'),(732,'EH','ESH','Western Sahara','Sahrawi, Sahrawian, Sahraouian'),(740,'SR','SUR','Suriname','Surinamese'),(744,'SJ','SJM','Svalbard and Jan Mayen','Svalbard'),(748,'SZ','SWZ','Swaziland','Swazi'),(752,'SE','SWE','Sweden','Swedish'),(756,'CH','CHE','Switzerland','Swiss'),(760,'SY','SYR','Syrian Arab Republic','Syrian'),(762,'TJ','TJK','Tajikistan','Tajikistani'),(764,'TH','THA','Thailand','Thai'),(768,'TG','TGO','Togo','Togolese'),(772,'TK','TKL','Tokelau','Tokelauan'),(776,'TO','TON','Tonga','Tongan'),(780,'TT','TTO','Trinidad and Tobago','Trinidadian or Tobagonian'),(784,'AE','ARE','United Arab Emirates','Emirati, Emirian, Emiri'),(788,'TN','TUN','Tunisia','Tunisian'),(792,'TR','TUR','Turkey','Turkish'),(795,'TM','TKM','Turkmenistan','Turkmen'),(796,'TC','TCA','Turks and Caicos Islands','Turks and Caicos Island'),(798,'TV','TUV','Tuvalu','Tuvaluan'),(800,'UG','UGA','Uganda','Ugandan'),(804,'UA','UKR','Ukraine','Ukrainian'),(807,'MK','MKD','Macedonia (the former Yugoslav Republic of)','Macedonian'),(818,'EG','EGY','Egypt','Egyptian'),(826,'GB','GBR','United Kingdom of Great Britain and Northern Ireland','British, UK'),(831,'GG','GGY','Guernsey','Channel Island'),(832,'JE','JEY','Jersey','Channel Island'),(833,'IM','IMN','Isle of Man','Manx'),(834,'TZ','TZA','Tanzania, United Republic of','Tanzanian'),(840,'US','USA','United States of America','American'),(850,'VI','VIR','Virgin Islands (U.S.)','U.S. Virgin Island'),(854,'BF','BFA','Burkina Faso','Burkinabé'),(858,'UY','URY','Uruguay','Uruguayan'),(860,'UZ','UZB','Uzbekistan','Uzbekistani, Uzbek'),(862,'VE','VEN','Venezuela (Bolivarian Republic of)','Venezuelan'),(876,'WF','WLF','Wallis and Futuna','Wallis and Futuna, Wallisian or Futunan'),(882,'WS','WSM','Samoa','Samoan'),(887,'YE','YEM','Yemen','Yemeni'),(894,'ZM','ZMB','Zambia','Zambian');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_order` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) NOT NULL,
  `pid` int(100) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_qty` int(100) NOT NULL,
  `p_status` varchar(100) NOT NULL,
  `tr_id` varchar(255) NOT NULL,
  `p_total` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_order`
--

/*!40000 ALTER TABLE `customer_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_order` ENABLE KEYS */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`u375994584_vgx12com`@`127.0.0.1`*/ /*!50003 TRIGGER `insert_p_total` BEFORE INSERT ON `customer_order` FOR EACH ROW SET
new.p_total= new.p_qty * new.p_price */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`u375994584_vgx12com`@`127.0.0.1`*/ /*!50003 TRIGGER `undate_p_total` BEFORE UPDATE ON `customer_order` FOR EACH ROW SET
new.p_total= new.p_qty * new.p_price */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `for_bonus`
--

DROP TABLE IF EXISTS `for_bonus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `for_bonus` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `level_status` int(255) DEFAULT NULL,
  `userid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `for_bonus`
--

/*!40000 ALTER TABLE `for_bonus` DISABLE KEYS */;
INSERT INTO `for_bonus` VALUES (133,0,'user@tutorialvilla.com','tobe open');
/*!40000 ALTER TABLE `for_bonus` ENABLE KEYS */;

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inbox` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `phone_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inbox`
--

/*!40000 ALTER TABLE `inbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `inbox` ENABLE KEYS */;

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `day_bal` float DEFAULT 0,
  `current_bal` float DEFAULT 0,
  `total_bal` float DEFAULT 0,
  `repurchase_total` float DEFAULT 0,
  `under_userid` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2435 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income`
--

/*!40000 ALTER TABLE `income` DISABLE KEYS */;
INSERT INTO `income` VALUES (1,'user@tutorialvilla.com',0,0,0,0,'');
/*!40000 ALTER TABLE `income` ENABLE KEYS */;

--
-- Table structure for table `income_history`
--

DROP TABLE IF EXISTS `income_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income_history` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `level` int(250) NOT NULL,
  `date` date NOT NULL,
  `category` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33597 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income_history`
--

/*!40000 ALTER TABLE `income_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `income_history` ENABLE KEYS */;

--
-- Table structure for table `income_received`
--

DROP TABLE IF EXISTS `income_received`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income_received` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income_received`
--

/*!40000 ALTER TABLE `income_received` DISABLE KEYS */;
/*!40000 ALTER TABLE `income_received` ENABLE KEYS */;

--
-- Table structure for table `join_request`
--

DROP TABLE IF EXISTS `join_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `join_request` (
  `jr_id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `date_requested` date NOT NULL,
  `store_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transac_code` int(255) DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(255) NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `qty` int(255) NOT NULL DEFAULT 1,
  `store_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`jr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `join_request`
--

/*!40000 ALTER TABLE `join_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `join_request` ENABLE KEYS */;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `val_id` int(255) NOT NULL AUTO_INCREMENT,
  `messages` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_sent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`val_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (34,'xczxczxczxczxczxcxzc','user@tutorialvilla.com','2021-01-28 01:54:03','unread','admin'),(35,'heheheh','user@tutorialvilla.com','2021-01-28 08:32:29','unread','admin');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

--
-- Table structure for table `online_reg`
--

DROP TABLE IF EXISTS `online_reg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `online_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `under_userid` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_level` int(100) NOT NULL DEFAULT 0,
  `side` enum('A','B','C','D','E','F','G','H','I','J','K','L') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_entered` date NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` int(12) DEFAULT NULL,
  `last_movement` date DEFAULT NULL,
  `beneficiary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary_contact` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `date_activated` date DEFAULT NULL,
  `delivery_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_num` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimated_date_of_arrival` date DEFAULT NULL,
  `receipt_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sent` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `reminder` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `online_reg`
--

/*!40000 ALTER TABLE `online_reg` DISABLE KEYS */;
/*!40000 ALTER TABLE `online_reg` ENABLE KEYS */;

--
-- Table structure for table `order_history_details`
--

DROP TABLE IF EXISTS `order_history_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_history_details` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tr_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_transac` datetime NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(255) DEFAULT NULL,
  `tracking_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_process` datetime NOT NULL,
  `imageType` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `imageData` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_history_details`
--

/*!40000 ALTER TABLE `order_history_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_history_details` ENABLE KEYS */;

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_method` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiration_month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiration_year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gcash_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2247 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_method`
--

/*!40000 ALTER TABLE `payment_method` DISABLE KEYS */;
INSERT INTO `payment_method` VALUES (7,'user@tutorialvilla.com','','','','','09159836481','123','09159836485','langihan road');
/*!40000 ALTER TABLE `payment_method` ENABLE KEYS */;

--
-- Table structure for table `payout_request`
--

DROP TABLE IF EXISTS `payout_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payout_request` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(255) NOT NULL,
  `fee` int(250) NOT NULL,
  `date_processed` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_approved` date NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payout_request`
--

/*!40000 ALTER TABLE `payout_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `payout_request` ENABLE KEYS */;

--
-- Table structure for table `pin_list`
--

DROP TABLE IF EXISTS `pin_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pin_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL,
  `status` enum('open','close') NOT NULL DEFAULT 'open',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3833 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pin_list`
--

/*!40000 ALTER TABLE `pin_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `pin_list` ENABLE KEYS */;

--
-- Table structure for table `pin_request`
--

DROP TABLE IF EXISTS `pin_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pin_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `imageType` varchar(250) DEFAULT NULL,
  `imageData` longblob DEFAULT NULL,
  `date` date NOT NULL,
  `status` enum('open','close') NOT NULL DEFAULT 'open',
  `shipping_fee` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=333 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pin_request`
--

/*!40000 ALTER TABLE `pin_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `pin_request` ENABLE KEYS */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` varchar(100) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'1','2','Berkah Jerah Herbal Tea',480,'Herbal Tea','berkah_jerah.png','Berkah Jerah Herbal Tea'),(3,'1','3','VGX Herbal Liniment Turmeric',144,'Liniment Turmeric','vgx_herbal_liniment2.png','VGX Herbal Liniment Turmeric');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `emails` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_questioned` datetime NOT NULL,
  `date_answered` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'On Queue',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

--
-- Table structure for table `received_payment`
--

DROP TABLE IF EXISTS `received_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `received_payment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `uid` int(100) NOT NULL,
  `amt` int(100) NOT NULL,
  `tr_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `received_payment`
--

/*!40000 ALTER TABLE `received_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `received_payment` ENABLE KEYS */;

--
-- Table structure for table `refprovince`
--

DROP TABLE IF EXISTS `refprovince`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refprovince` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `psgcCode` varchar(255) DEFAULT NULL,
  `provDesc` text DEFAULT NULL,
  `regCode` varchar(255) DEFAULT NULL,
  `provCode` varchar(255) DEFAULT NULL,
  `island` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refprovince`
--

/*!40000 ALTER TABLE `refprovince` DISABLE KEYS */;
INSERT INTO `refprovince` VALUES (1,'012800000','ILOCOS NORTE','01','0128','Luzon '),(2,'012900000','ILOCOS SUR','01','0129','Luzon '),(3,'013300000','LA UNION','01','0133','Luzon '),(4,'015500000','PANGASINAN','01','0155','Luzon '),(5,'020900000','BATANES','02','0209','Luzon '),(6,'021500000','CAGAYAN','02','0215','Luzon '),(7,'023100000','ISABELA','02','0231','Luzon '),(8,'025000000','NUEVA VIZCAYA','02','0250','Luzon '),(9,'025700000','QUIRINO','02','0257','Luzon '),(10,'030800000','BATAAN','03','0308','Luzon '),(11,'031400000','BULACAN','03','0314','Luzon '),(12,'034900000','NUEVA ECIJA','03','0349','Luzon '),(13,'035400000','PAMPANGA','03','0354','Luzon '),(14,'036900000','TARLAC','03','0369','Luzon '),(15,'037100000','ZAMBALES','03','0371','Luzon '),(16,'037700000','AURORA','03','0377','Luzon '),(17,'041000000','BATANGAS','04','0410','Luzon '),(18,'042100000','CAVITE','04','0421','Luzon '),(19,'043400000','LAGUNA','04','0434','Luzon '),(20,'045600000','QUEZON','04','0456','Luzon '),(21,'045800000','RIZAL','04','0458','Luzon '),(22,'174000000','MARINDUQUE','17','1740','Luzon '),(23,'175100000','OCCIDENTAL MINDORO','17','1751','Luzon '),(24,'175200000','ORIENTAL MINDORO','17','1752','Luzon '),(25,'175300000','PALAWAN','17','1753','Luzon '),(26,'175900000','ROMBLON','17','1759','Luzon '),(27,'050500000','ALBAY','05','0505','Luzon '),(28,'051600000','CAMARINES NORTE','05','0516','Luzon '),(29,'051700000','CAMARINES SUR','05','0517','Luzon '),(30,'052000000','CATANDUANES','05','0520','Luzon '),(31,'054100000','MASBATE','05','0541','Luzon '),(32,'056200000','SORSOGON','05','0562','Luzon '),(33,'060400000','AKLAN','06','0604','Visayas'),(34,'060600000','ANTIQUE','06','0606','Visayas'),(35,'061900000','CAPIZ','06','0619','Visayas'),(36,'063000000','ILOILO','06','0630','Visayas'),(37,'064500000','NEGROS OCCIDENTAL','06','0645','Visayas'),(38,'067900000','GUIMARAS','06','0679','Visayas'),(39,'071200000','BOHOL','07','0712','Visayas'),(40,'072200000','CEBU','07','0722','Visayas'),(41,'074600000','NEGROS ORIENTAL','07','0746','Visayas'),(42,'076100000','SIQUIJOR','07','0761','Visayas'),(43,'082600000','EASTERN SAMAR','08','0826','Visayas'),(44,'083700000','LEYTE','08','0837','Visayas'),(45,'084800000','NORTHERN SAMAR','08','0848','Visayas'),(46,'086000000','SAMAR (WESTERN SAMAR)','08','0860','Visayas'),(47,'086400000','SOUTHERN LEYTE','08','0864','Visayas'),(48,'087800000','BILIRAN','08','0878','Visayas'),(49,'097200000','ZAMBOANGA DEL NORTE','09','0972','Mindanao'),(50,'097300000','ZAMBOANGA DEL SUR','09','0973','Mindanao'),(51,'098300000','ZAMBOANGA SIBUGAY','09','0983','Mindanao'),(52,'099700000','CITY OF ISABELA','09','0997','Mindanao'),(53,'101300000','BUKIDNON','10','1013','Mindanao'),(54,'101800000','CAMIGUIN','10','1018','Mindanao'),(55,'103500000','LANAO DEL NORTE','10','1035','Mindanao'),(56,'104200000','MISAMIS OCCIDENTAL','10','1042','Mindanao'),(57,'104300000','MISAMIS ORIENTAL','10','1043','Mindanao'),(58,'112300000','DAVAO DEL NORTE','11','1123','Mindanao'),(59,'112400000','DAVAO DEL SUR','11','1124','Mindanao'),(60,'112500000','DAVAO ORIENTAL','11','1125','Mindanao'),(61,'118200000','COMPOSTELA VALLEY','11','1182','Mindanao'),(62,'118600000','DAVAO OCCIDENTAL','11','1186','Mindanao'),(63,'124700000','COTABATO (NORTH COTABATO)','12','1247','Mindanao'),(64,'126300000','SOUTH COTABATO','12','1263','Mindanao'),(65,'126500000','SULTAN KUDARAT','12','1265','Mindanao'),(66,'128000000','SARANGANI','12','1280','Mindanao'),(67,'129800000','COTABATO CITY','12','1298','Mindanao'),(68,'133900000','NCR, CITY OF MANILA, FIRST DISTRICT','13','1339','Luzon'),(69,'133900000','CITY OF MANILA','13','1339','Luzon'),(70,'137400000','NCR, SECOND DISTRICT','13','1374','Luzon'),(71,'137500000','NCR, THIRD DISTRICT','13','1375','Luzon'),(72,'137600000','NCR, FOURTH DISTRICT','13','1376','Luzon'),(73,'140100000','ABRA','14','1401','Luzon'),(74,'141100000','BENGUET','14','1411','Luzon'),(75,'142700000','IFUGAO','14','1427','Luzon'),(76,'143200000','KALINGA','14','1432','Luzon'),(77,'144400000','MOUNTAIN PROVINCE','14','1444','Luzon'),(78,'148100000','APAYAO','14','1481','Luzon'),(79,'150700000','BASILAN','15','1507','Mindanao'),(80,'153600000','LANAO DEL SUR','15','1536','Mindanao'),(81,'153800000','MAGUINDANAO','15','1538','Mindanao'),(82,'156600000','SULU','15','1566','Mindanao'),(83,'157000000','TAWI-TAWI','15','1570','Mindanao'),(84,'160200000','AGUSAN DEL NORTE','16','1602','Mindanao'),(85,'160300000','AGUSAN DEL SUR','16','1603','Mindanao'),(86,'166700000','SURIGAO DEL NORTE','16','1667','Mindanao'),(87,'166800000','SURIGAO DEL SUR','16','1668','Mindanao'),(88,'168500000','DINAGAT ISLANDS','16','1685','Mindanao');
/*!40000 ALTER TABLE `refprovince` ENABLE KEYS */;

--
-- Table structure for table `replacement_request`
--

DROP TABLE IF EXISTS `replacement_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replacement_request` (
  `rep_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `for_under` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reasons` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_requested` date NOT NULL,
  `request_status` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary_contact` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiary_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replacement_request`
--

/*!40000 ALTER TABLE `replacement_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `replacement_request` ENABLE KEYS */;

--
-- Table structure for table `repurchase_qty`
--

DROP TABLE IF EXISTS `repurchase_qty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repurchase_qty` (
  `rep_qty` int(255) NOT NULL,
  `rep_sale` int(255) NOT NULL,
  `prod_name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repurchase_qty`
--

/*!40000 ALTER TABLE `repurchase_qty` DISABLE KEYS */;
INSERT INTO `repurchase_qty` VALUES (86,14,'VGX Kit');
/*!40000 ALTER TABLE `repurchase_qty` ENABLE KEYS */;

--
-- Table structure for table `store`
--

DROP TABLE IF EXISTS `store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store` (
  `store_id` int(255) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_create` date NOT NULL,
  `store_uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store`
--

/*!40000 ALTER TABLE `store` DISABLE KEYS */;
/*!40000 ALTER TABLE `store` ENABLE KEYS */;

--
-- Table structure for table `store_product`
--

DROP TABLE IF EXISTS `store_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store_product` (
  `sp_id` int(255) NOT NULL AUTO_INCREMENT,
  `store_uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(255) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` date NOT NULL,
  `user_store_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images_img` longblob NOT NULL,
  `from_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageType` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_product`
--

/*!40000 ALTER TABLE `store_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `store_product` ENABLE KEYS */;

--
-- Table structure for table `store_product_admin`
--

DROP TABLE IF EXISTS `store_product_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `store_product_admin` (
  `spa_id` int(255) NOT NULL AUTO_INCREMENT,
  `store_uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(255) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_added` date NOT NULL,
  `user_store_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images_img` longblob NOT NULL,
  `from_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageType` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `percentage_value` double NOT NULL,
  PRIMARY KEY (`spa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_product_admin`
--

/*!40000 ALTER TABLE `store_product_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `store_product_admin` ENABLE KEYS */;

--
-- Table structure for table `tree`
--

DROP TABLE IF EXISTS `tree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `A` varchar(50) DEFAULT NULL,
  `B` varchar(50) DEFAULT NULL,
  `C` varchar(50) DEFAULT NULL,
  `D` varchar(250) DEFAULT NULL,
  `E` varchar(250) DEFAULT NULL,
  `F` varchar(250) DEFAULT NULL,
  `G` varchar(250) DEFAULT NULL,
  `H` varchar(250) DEFAULT NULL,
  `I` varchar(250) DEFAULT NULL,
  `J` varchar(250) DEFAULT NULL,
  `K` varchar(250) DEFAULT NULL,
  `L` varchar(250) DEFAULT NULL,
  `Acount` int(100) DEFAULT 0,
  `Bcount` int(100) DEFAULT 0,
  `Ccount` int(100) DEFAULT 0,
  `Dcount` int(90) DEFAULT 0,
  `Ecount` int(90) DEFAULT 0,
  `Fcount` int(90) DEFAULT 0,
  `Gcount` int(90) DEFAULT 0,
  `Hcount` int(90) DEFAULT 0,
  `Icount` int(90) DEFAULT 0,
  `Jcount` int(90) DEFAULT 0,
  `Kcount` int(90) DEFAULT 0,
  `Lcount` int(90) DEFAULT 0,
  `downline_count` int(250) DEFAULT 0,
  `user_level` int(100) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2381 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tree`
--

/*!40000 ALTER TABLE `tree` DISABLE KEYS */;
INSERT INTO `tree` VALUES (1,'user@tutorialvilla.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `tree` ENABLE KEYS */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(250) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `birthday` date DEFAULT NULL,
  `account` varchar(20) NOT NULL,
  `under_userid` varchar(50) NOT NULL,
  `user_level` int(100) NOT NULL DEFAULT 0,
  `side` enum('A','B','C','D','E','F','G','H','I','J','K','L') NOT NULL,
  `date_entered` date NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `profile_pic` text DEFAULT NULL,
  `message` int(12) NOT NULL,
  `last_movement` date DEFAULT NULL,
  `beneficiary` text DEFAULT NULL,
  `beneficiary_contact` text DEFAULT NULL,
  `beneficiary_address` text DEFAULT NULL,
  `mobile2` longtext DEFAULT NULL,
  `facebook` longtext DEFAULT NULL,
  `is_active` varchar(255) NOT NULL DEFAULT 'no',
  `date_activated` date DEFAULT NULL,
  `delivery_address` longtext NOT NULL,
  `work_address` longtext DEFAULT NULL,
  `tracking_num` varchar(250) DEFAULT NULL,
  `prod_condition` varchar(255) DEFAULT NULL,
  `estimated_date_of_arrival` date DEFAULT NULL,
  `receipt_details` text DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `is_sent` varchar(11) NOT NULL DEFAULT '0',
  `reminders` text DEFAULT NULL,
  `user_tracking` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2438 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'samples','cs','onlys','user@tutorialvilla.com','123456','234567891','Gurgaon','1999-09-10','883-158','',0,'','0000-00-00',NULL,NULL,'https://img.favpng.com/17/3/18/computer-icons-user-profile-male-png-favpng-ZmC9dDrp9x27KFnnge0jKWKBs.jpg',1,'2021-01-26','Sample name of beneficiaries','Contact number of beneficiaries','Address of beneficiary here',NULL,NULL,'confirmed','0000-00-00','','',NULL,NULL,NULL,NULL,'01','0','This is a sample if there are reminders from the admin. ',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

--
-- Table structure for table `user_bunos`
--

DROP TABLE IF EXISTS `user_bunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_bunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `bunos_details` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_bunos`
--

/*!40000 ALTER TABLE `user_bunos` DISABLE KEYS */;
INSERT INTO `user_bunos` VALUES (1,'user@tutorialvilla.com','','0000-00-00');
/*!40000 ALTER TABLE `user_bunos` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Table structure for table `userss`
--

DROP TABLE IF EXISTS `userss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userss` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `access` int(1) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userss`
--

/*!40000 ALTER TABLE `userss` DISABLE KEYS */;
INSERT INTO `userss` VALUES (1,'admin','admin','Admin','',1),(2,'lee','lee','lee','',2),(3,'julyn','bf70c261981e1708530982d56d2e8e01','julyn','',2);
/*!40000 ALTER TABLE `userss` ENABLE KEYS */;

--
-- Dumping routines for database 'u375994584_mlmvgx'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-28 22:53:15
