-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: soroshopp
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

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
-- Current Database: `soroshopp`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `soroshopp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `soroshopp`;

--
-- Table structure for table `anuncio`
--

DROP TABLE IF EXISTS `anuncio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anuncio` (
  `idanuncio` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double NOT NULL,
  `data_anuncio` date NOT NULL,
  PRIMARY KEY (`idanuncio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncio`
--

LOCK TABLES `anuncio` WRITE;
/*!40000 ALTER TABLE `anuncio` DISABLE KEYS */;
/*!40000 ALTER TABLE `anuncio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nasc` date NOT NULL,
  `senha` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES
(1,'Daniel Luís Bevilacqua','d4n1eu_04','2004-03-30','$2y$10$Zy5926ef.gsZH4GKmXw/1uFns8ByDL7x5QoCIVZY2kQ5fb3TzERk2','Sorocaba',1,'danielluisbevilacqua2004@gmail.com'),
(2,'Nome','Usuario','2022-02-02','123','Sorocaba',1,'teste@gmail.com'),
(3,'Jonas Brothers','jonas_brothers','2022-04-13','$2y$10$Eqc2LL2oM4ArmH8ZCquf6uxMhtXYP6DO0R4mzY6k8iGEBEaJQ1cCe','Sorocaba',1,'jonas.brothers@gmail.com');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 19:34:26
