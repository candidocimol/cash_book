CREATE DATABASE  IF NOT EXISTS `cash_book` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cash_book`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cash_book
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `moviment`
--

DROP TABLE IF EXISTS `moviment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `moviment` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(120) NOT NULL,
  `date` date NOT NULL,
  `value` double NOT NULL,
  `type` enum('input','output') NOT NULL DEFAULT 'input',
  `user_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_moviment_user_idx` (`user_id`),
  CONSTRAINT `fk_moviment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moviment`
--

LOCK TABLES `moviment` WRITE;
/*!40000 ALTER TABLE `moviment` DISABLE KEYS */;
INSERT INTO `moviment` VALUES (1,'Venda a vista','2022-08-01',35.9,'input',1),(2,'Venda de mercadorias a vista','2022-08-01',98.45,'input',1),(3,'Serviço de limpeza','2022-08-01',120,'output',1),(4,'Pagamento de materiais','2022-08-01',250,'output',1),(5,'Pagamento internet','2022-08-01',105.9,'output',1),(6,'venda de mercadorias','2022-08-01',65,'input',1),(7,'Venda de serviço','2022-08-01',90,'input',1),(8,'Pagamente imostos','2022-08-01',189.56,'output',1),(9,'Venda de produtos','2022-08-01',22.85,'input',1),(10,'Venda de produtos','2022-08-01',165.45,'input',1),(11,'Pagamento energia elátrica','2022-08-01',388.85,'output',1),(12,'Pagamento serviço de segurança','2022-08-01',150,'output',1),(13,'Pagamento materiais de escritório','2022-08-01',89.45,'output',1);
/*!40000 ALTER TABLE `moviment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-01 15:23:07
