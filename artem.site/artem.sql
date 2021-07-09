-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: artem
-- ------------------------------------------------------
-- Server version	5.7.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `phone`
--

DROP TABLE IF EXISTS `phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `image` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone`
--

LOCK TABLES `phone` WRITE;
/*!40000 ALTER TABLE `phone` DISABLE KEYS */;
INSERT INTO `phone` VALUES (1,'iPhone XR','/assets/images/xr.jpg'),(2,'iPhone SE','/assets/images/se.jpg'),(3,'iPhone 11 ','/assets/images/11.jpg'),(4,'iPhone 11 Pro','/assets/images/11pro.jpg'),(5,'iPhone 11 Pro Max','/assets/images/11promax.jpg');
/*!40000 ALTER TABLE `phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phoneprice`
--

DROP TABLE IF EXISTS `phoneprice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phoneprice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phoneprice`
--

LOCK TABLES `phoneprice` WRITE;
/*!40000 ALTER TABLE `phoneprice` DISABLE KEYS */;
INSERT INTO `phoneprice` VALUES (1,1,649,'2020-05-14 02:34:32'),(2,1,650,'2020-03-31 21:00:00'),(3,1,700,'2020-02-29 21:00:00'),(4,1,649,'2020-01-31 21:00:00'),(5,1,649,'2019-12-31 21:00:00'),(6,1,649,'2019-11-30 21:00:00'),(7,1,649,'2019-10-31 21:00:00'),(8,1,450,'2019-09-30 21:00:00'),(9,1,649,'2019-08-31 21:00:00'),(10,1,649,'2019-07-31 21:00:00'),(11,1,649,'2019-06-30 21:00:00'),(12,1,800,'2019-05-31 21:00:00'),(13,1,649,'2019-04-30 21:00:00'),(14,1,649,'2019-03-31 21:00:00'),(15,1,649,'2019-02-28 21:00:00'),(16,1,649,'2019-01-31 21:00:00'),(17,1,649,'2018-12-31 21:00:00'),(18,2,399,'2020-04-30 21:00:00'),(19,2,399,'2020-03-31 21:00:00'),(20,2,549,'2020-02-29 21:00:00'),(21,2,449,'2020-01-31 21:00:00'),(22,2,349,'2019-12-31 21:00:00'),(23,2,249,'2019-11-30 21:00:00'),(24,2,659,'2019-10-31 21:00:00'),(25,2,440,'2019-09-30 21:00:00'),(26,2,349,'2019-08-31 21:00:00'),(27,2,349,'2019-07-31 21:00:00'),(28,2,549,'2019-06-30 21:00:00'),(29,2,200,'2019-05-31 21:00:00'),(30,2,349,'2019-04-30 21:00:00'),(31,2,259,'2019-03-31 21:00:00'),(32,2,355,'2019-02-28 21:00:00'),(33,2,349,'2019-01-31 21:00:00'),(34,2,549,'2018-12-31 21:00:00'),(35,3,699,'2020-04-30 21:00:00'),(36,3,799,'2020-03-31 21:00:00'),(37,3,849,'2020-02-29 21:00:00'),(38,3,449,'2020-01-31 21:00:00'),(39,3,749,'2019-12-31 21:00:00'),(40,3,649,'2019-11-30 21:00:00'),(41,3,659,'2019-10-31 21:00:00'),(42,3,880,'2019-09-30 21:00:00'),(43,3,849,'2019-08-31 21:00:00'),(44,3,749,'2019-07-31 21:00:00'),(45,3,679,'2019-06-30 21:00:00'),(46,3,750,'2019-05-31 21:00:00'),(47,3,869,'2019-04-30 21:00:00'),(48,3,659,'2019-03-31 21:00:00'),(49,3,755,'2019-02-28 21:00:00'),(50,3,849,'2019-01-31 21:00:00'),(51,3,949,'2018-12-31 21:00:00'),(52,4,999,'2020-04-30 21:00:00'),(53,4,1100,'2020-03-31 21:00:00'),(54,4,1050,'2020-02-29 21:00:00'),(55,4,1000,'2020-01-31 21:00:00'),(56,4,1350,'2019-12-31 21:00:00'),(57,4,900,'2019-11-30 21:00:00'),(58,4,1250,'2019-10-31 21:00:00'),(59,4,1000,'2019-09-30 21:00:00'),(60,4,1000,'2019-08-31 21:00:00'),(61,4,1000,'2019-07-31 21:00:00'),(62,4,999,'2019-06-30 21:00:00'),(63,4,1199,'2019-05-31 21:00:00'),(64,4,1299,'2019-04-30 21:00:00'),(65,4,1000,'2019-03-31 21:00:00'),(66,4,1000,'2019-02-28 21:00:00'),(67,4,1500,'2019-01-31 21:00:00'),(68,4,1499,'2018-12-31 21:00:00'),(69,5,1099,'2020-04-30 21:00:00'),(70,5,1500,'2020-03-31 21:00:00'),(71,5,1450,'2020-02-29 21:00:00'),(72,5,1200,'2020-01-31 21:00:00'),(73,5,1450,'2019-12-31 21:00:00'),(74,5,1199,'2019-11-30 21:00:00'),(75,5,1250,'2019-10-31 21:00:00'),(76,5,1200,'2019-09-30 21:00:00'),(77,5,1650,'2019-08-31 21:00:00'),(78,5,1100,'2019-07-31 21:00:00'),(79,5,1000,'2019-06-30 21:00:00'),(80,5,1499,'2019-05-31 21:00:00'),(81,5,1199,'2019-04-30 21:00:00'),(82,5,1399,'2019-03-31 21:00:00'),(83,5,1499,'2019-02-28 21:00:00'),(84,5,1599,'2019-01-31 21:00:00'),(85,5,1699,'2018-12-31 21:00:00');
/*!40000 ALTER TABLE `phoneprice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `passwordhash` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (10,'test@test.test','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),(11,'test2@test.test','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),(12,'test@test.test2','40bd001563085fc35165329ea1ff5c5ecbdbbeef');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-14 21:43:42
