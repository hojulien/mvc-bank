-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mvc-banks
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email` (`admin_email`),
  UNIQUE KEY `admin_password` (`admin_password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin@gmail.com','$2y$10$WasiG9OoFbbFkemwX1lbAeXWumfZwaVkM766jlHCbvrPvIU1lB7OS');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

--
-- Table structure for table `bankaccounts`
--

DROP TABLE IF EXISTS `bankaccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bankaccounts` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_iban` varchar(40) NOT NULL,
  `bank_typeAccount` enum('Compte courant','Compte épargne') NOT NULL,
  `bank_balance` double(9,2) NOT NULL CHECK (`bank_balance` >= 0),
  `bank_userId` int(11) NOT NULL,
  PRIMARY KEY (`bank_id`),
  UNIQUE KEY `bank_iban` (`bank_iban`),
  KEY `fk_bank_user` (`bank_userId`),
  CONSTRAINT `fk_bank_user` FOREIGN KEY (`bank_userId`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankaccounts`
--

/*!40000 ALTER TABLE `bankaccounts` DISABLE KEYS */;
INSERT INTO `bankaccounts` VALUES (1,'FR7617499123451234567890153','Compte courant',1500.00,1),(2,'FR7614889123451234567890128','Compte épargne',3245.88,2),(3,'FR7617939123451234567890181','Compte courant',1800.00,3),(4,'FR7614158123451234567890197','Compte épargne',250.00,4),(5,'FR7618319123451234567890117','Compte courant',180.48,5),(6,'FR7601234099990123456789046','Compte épargne',10000.00,1);
/*!40000 ALTER TABLE `bankaccounts` ENABLE KEYS */;

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contracts` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_type` enum('Assurance Vie','Assurance Habitation','Crédit Immobilier','Crédit à la Consommation','Compte Épargne Logement (CEL)') NOT NULL,
  `contract_price` double(6,2) NOT NULL,
  `contract_duration` int(11) NOT NULL CHECK (`contract_price` > 0),
  `contract_userId` int(11) NOT NULL,
  PRIMARY KEY (`contract_id`),
  KEY `fk_contract_user` (`contract_userId`),
  CONSTRAINT `fk_contract_user` FOREIGN KEY (`contract_userId`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contracts`
--

/*!40000 ALTER TABLE `contracts` DISABLE KEYS */;
INSERT INTO `contracts` VALUES (5,'Assurance Vie',80.00,120,1),(6,'Assurance Habitation',50.00,24,1),(7,'Compte Épargne Logement (CEL)',60.00,96,2),(8,'Crédit Immobilier',999.99,180,3),(13,'Crédit à la Consommation',250.00,36,4),(14,'Assurance Vie',100.00,120,5);
/*!40000 ALTER TABLE `contracts` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_firstName` varchar(50) NOT NULL,
  `user_lastName` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phoneNumber` varchar(20) NOT NULL,
  `user_address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Doe','John','johndoe@gmail.com','+33724287934','7, Avenue de la Résistance, Paris 14e'),(2,'Doe','Jane','janedoe@gmail.com','+33711223344','7, Avenue de la Résistance, Paris 14e'),(3,'Dupont','Cédric','dupontced@hotmail.fr','+33625242524','45, place de Verdun, Nîmes'),(4,'Carne','Alina','alinac@outlook.com','+45262726272',NULL),(5,'Valjean','Jean','jean-v-revolution@gmail.com','+33711122233',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Dumping routines for database 'mvc-banks'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-09 11:16:12
