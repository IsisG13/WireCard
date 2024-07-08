-- MySQL dump 10.13  Distrib 8.0.37, for Linux (x86_64)
--
-- Host: localhost    Database: wireCard
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `boletos`
--

DROP TABLE IF EXISTS `boletos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `boletos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `numero_boleto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boletos`
--

LOCK TABLES `boletos` WRITE;
/*!40000 ALTER TABLE `boletos` DISABLE KEYS */;
INSERT INTO `boletos` VALUES (1,1,'063928487087','2024-07-03 00:30:43','2024-07-03 00:30:43'),(2,1,'786669861232','2024-07-03 00:39:00','2024-07-03 00:39:00'),(3,1,'832285217494','2024-07-03 00:49:33','2024-07-03 00:49:33'),(4,1,'522345093129','2024-07-03 00:50:22','2024-07-03 00:50:22'),(5,1,'898581465961','2024-07-03 01:03:26','2024-07-03 01:03:26'),(6,1,'489251099375','2024-07-03 01:05:58','2024-07-03 01:05:58'),(7,1,'944362339773','2024-07-03 01:23:39','2024-07-03 01:23:39'),(8,1,'336502613388','2024-07-05 23:34:32','2024-07-05 23:34:32'),(9,1,'815767897986','2024-07-05 23:47:39','2024-07-05 23:47:39'),(10,1,'043724789583','2024-07-05 23:48:19','2024-07-05 23:48:19'),(11,1,'519694687862','2024-07-05 23:48:34','2024-07-05 23:48:34'),(12,1,'010364285964','2024-07-05 23:49:07','2024-07-05 23:49:07'),(13,1,'484582698611','2024-07-05 23:50:48','2024-07-05 23:50:48'),(14,1,'492431725581','2024-07-05 23:52:05','2024-07-05 23:52:05'),(15,1,'349758224925','2024-07-05 23:54:01','2024-07-05 23:54:01'),(16,1,'137891018798','2024-07-05 23:55:29','2024-07-05 23:55:29'),(17,1,'136088852286','2024-07-06 20:10:00','2024-07-06 20:10:00'),(18,1,'862791456925','2024-07-06 20:10:51','2024-07-06 20:10:51'),(19,1,'126744981875','2024-07-06 20:12:16','2024-07-06 20:12:16'),(20,1,'989736531989','2024-07-06 20:13:54','2024-07-06 20:13:54'),(21,1,'169195777667','2024-07-06 20:16:48','2024-07-06 20:16:48'),(22,1,'698433117581','2024-07-06 20:17:17','2024-07-06 20:17:17'),(23,1,'182565127121','2024-07-06 20:18:05','2024-07-06 20:18:05'),(24,1,'554146303454','2024-07-06 22:44:23','2024-07-06 22:44:23'),(25,1,'893336780617','2024-07-06 23:06:31','2024-07-06 23:06:31'),(26,1,'096031510433','2024-07-06 23:07:13','2024-07-06 23:07:13'),(27,1,'434972810369','2024-07-06 23:07:50','2024-07-06 23:07:50'),(28,1,'561590879232','2024-07-06 23:08:27','2024-07-06 23:08:27'),(29,1,'383539200299','2024-07-06 23:10:16','2024-07-06 23:10:16'),(30,1,'273615658306','2024-07-06 23:12:02','2024-07-06 23:12:02');
/*!40000 ALTER TABLE `boletos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` bigint NOT NULL,
  `card_expiration` varchar(255) NOT NULL,
  `card_cvv` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `card_number` (`card_number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cards`
--

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` VALUES (1,1,'Ello',9302948,'28/2030',7777,'2024-07-05 23:33:55','2024-07-05 23:33:55'),(2,1,'Bank',2387462,'10/2033',2094,'2024-07-05 23:47:30','2024-07-05 23:47:30'),(3,1,'oaooa',9999999,'10/4302',9999,'2024-07-06 00:00:01','2024-07-06 00:00:01'),(4,1,'buijkm',89898989,'099090',77878,'2024-07-06 20:09:40','2024-07-06 20:09:40'),(5,1,'fwddw',1213,'134312',3331,'2024-07-06 23:09:26','2024-07-06 23:09:26');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cpf` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'isis','teste','2024-07-02 21:40:58','2024-07-02 22:05:30','87557865698'),(17,'malu','malu@alves','2024-07-04 21:47:45','2024-07-04 21:47:45','82694092683'),(20,'julia','julia@teste','2024-07-04 22:01:12','2024-07-04 22:01:12','48535680'),(21,'Eduarda','duda@teste','2024-07-04 22:03:24','2024-07-04 22:03:24','60293847');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `amount` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `card_id` int DEFAULT NULL,
  `boleto_id` int DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,1,'100.00','boleto',NULL,1,'pending','2024-07-03 00:30:43','2024-07-03 00:30:43'),(8,1,'273','cartao',1,NULL,'paid','2024-07-05 23:33:55','2024-07-05 23:33:55'),(9,1,'17820','boleto',NULL,8,'pending','2024-07-05 23:34:32','2024-07-05 23:34:32'),(10,1,'17820','cartao',1,NULL,'paid','2024-07-05 23:44:52','2024-07-05 23:44:52'),(11,1,'9999999','cartao',2,NULL,'paid','2024-07-05 23:47:30','2024-07-05 23:47:30'),(12,1,'27940','boleto',NULL,9,'pending','2024-07-05 23:47:39','2024-07-05 23:47:39'),(13,1,'273','boleto',NULL,10,'pending','2024-07-05 23:48:19','2024-07-05 23:48:19'),(14,1,'33333333','boleto',NULL,11,'pending','2024-07-05 23:48:34','2024-07-05 23:48:34'),(15,1,'273','boleto',NULL,12,'pending','2024-07-05 23:49:07','2024-07-05 23:49:07'),(16,1,'135','boleto',NULL,13,'pending','2024-07-05 23:50:48','2024-07-05 23:50:48'),(17,1,'222222222','boleto',NULL,14,'pending','2024-07-05 23:52:05','2024-07-05 23:52:05'),(18,1,'273','boleto',NULL,15,'pending','2024-07-05 23:54:01','2024-07-05 23:54:01'),(19,1,'273','boleto',NULL,16,'pending','2024-07-05 23:55:29','2024-07-05 23:55:29'),(20,1,'10101010','cartao',3,NULL,'paid','2024-07-06 00:00:01','2024-07-06 00:00:01'),(21,1,'987','cartao',4,NULL,'paid','2024-07-06 20:09:40','2024-07-06 20:09:40'),(22,1,'6789','boleto',NULL,17,'pending','2024-07-06 20:10:00','2024-07-06 20:10:00'),(23,1,'09890','boleto',NULL,18,'pending','2024-07-06 20:10:51','2024-07-06 20:10:51'),(24,1,'13221','boleto',NULL,19,'pending','2024-07-06 20:12:16','2024-07-06 20:12:16'),(25,1,'54321','boleto',NULL,20,'pending','2024-07-06 20:13:54','2024-07-06 20:13:54'),(26,1,'13432','boleto',NULL,21,'pending','2024-07-06 20:16:48','2024-07-06 20:16:48'),(27,1,'7667','boleto',NULL,22,'pending','2024-07-06 20:17:17','2024-07-06 20:17:17'),(28,1,'10000000','boleto',NULL,23,'pending','2024-07-06 20:18:05','2024-07-06 20:18:05'),(29,1,'82828282','boleto',NULL,24,'pending','2024-07-06 22:44:23','2024-07-06 22:44:23'),(30,1,'7890987','boleto',NULL,25,'pending','2024-07-06 23:06:31','2024-07-06 23:06:31'),(31,1,'888','boleto',NULL,26,'pending','2024-07-06 23:07:13','2024-07-06 23:07:13'),(32,1,'00','boleto',NULL,27,'pending','2024-07-06 23:07:50','2024-07-06 23:07:50'),(33,1,'273','boleto',NULL,28,'pending','2024-07-06 23:08:27','2024-07-06 23:08:27'),(34,1,'273','cartao',5,NULL,'paid','2024-07-06 23:09:26','2024-07-06 23:09:26'),(35,1,'135','boleto',NULL,29,'pending','2024-07-06 23:10:16','2024-07-06 23:10:16'),(36,1,'273','boleto',NULL,30,'pending','2024-07-06 23:12:02','2024-07-06 23:12:02');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'wireCard'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-08 15:31:56
