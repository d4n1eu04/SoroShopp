-- MariaDB dump 10.19  Distrib 10.8.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: soroshopp
-- ------------------------------------------------------
-- Server version	10.8.3-MariaDB

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
  `data_anuncio` date NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`idanuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncio`
--

LOCK TABLES `anuncio` WRITE;
/*!40000 ALTER TABLE `anuncio` DISABLE KEYS */;
INSERT INTO `anuncio` VALUES
(5,5,'Will','Cachorro','2022-06-12',15.98),
(6,5,'Gato preto','dkdkdk','2022-06-12',10),
(7,5,'macaco prego','kfdskajdfksjafdksl','2022-06-12',10),
(8,6,'ipad','ipad de viado','2022-06-12',999),
(9,1,'CAchorro','adsfsd','2022-06-14',1922.34),
(10,1,'carro','carro','2022-06-14',1455.99);
/*!40000 ALTER TABLE `anuncio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES
(1,'Esportes'),
(2,'Eletrônicos'),
(3,'Moda e Acessórios');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idanuncio` int(11) NOT NULL,
  `titulo` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favoritos`
--

LOCK TABLES `favoritos` WRITE;
/*!40000 ALTER TABLE `favoritos` DISABLE KEYS */;
/*!40000 ALTER TABLE `favoritos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imganuncio`
--

DROP TABLE IF EXISTS `imganuncio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imganuncio` (
  `idimganuncio` int(11) NOT NULL AUTO_INCREMENT,
  `idanuncio` int(11) NOT NULL,
  `arquivo` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idimganuncio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imganuncio`
--

LOCK TABLES `imganuncio` WRITE;
/*!40000 ALTER TABLE `imganuncio` DISABLE KEYS */;
/*!40000 ALTER TABLE `imganuncio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imguser`
--

DROP TABLE IF EXISTS `imguser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imguser` (
  `idimg` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `arquivo` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idimg`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imguser`
--

LOCK TABLES `imguser` WRITE;
/*!40000 ALTER TABLE `imguser` DISABLE KEYS */;
INSERT INTO `imguser` VALUES
(1,1,'foto.png');
/*!40000 ALTER TABLE `imguser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipousuario` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tipousuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES
(1,'Usuário'),
(2,'Vendedor'),
(3,'Administrador');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
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
  `idimgperfil` int(11) NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES
(1,'Daniel Luís Bevilacqua','d4n1eu_04','2004-03-30','$2y$10$Zy5926ef.gsZH4GKmXw/1uFns8ByDL7x5QoCIVZY2kQ5fb3TzERk2','Sorocaba',3,'danielluisbevilacqua2004@gmail.com',0,NULL,NULL),
(2,'Nome','Usuario','2022-02-02','123','Sorocaba',1,'teste@gmail.com',0,NULL,NULL),
(3,'Jonas Brothers','jonas_brothers','2022-04-13','$2y$10$Eqc2LL2oM4ArmH8ZCquf6uxMhtXYP6DO0R4mzY6k8iGEBEaJQ1cCe','Sorocaba',1,'jonas.brothers@gmail.com',0,NULL,NULL),
(4,'Junio Gonçalves','Juniomestrelevi','2022-05-27','$2y$10$LdAnvixl10u2TGFC2hEjIuLAd/d2v22X6nfatIL1wgb.apYadts8m','Sorocaba',1,'junio@gmail.com',0,NULL,NULL),
(5,'Bárbara ','babi','2005-08-01','$2y$10$LvHNn5IBU5JzTPTbS.PrSOIgvi6XX3AzUBT8vJXeBWZ8flIEAhpOu','SP',1,'barbarapena@gmail.com',0,NULL,NULL),
(6,'miguel','miguelluis','2007-03-09','$2y$10$84sroJXsAdDiobUEKHZvMeJJiyiDDgx3bCwn7klC0dq8KOx9zwsJi','18044720,sjj,magn0lia',1,'miguelluis@gmail.com',0,NULL,NULL),
(7,'Daniel Luís 2','danieu','2004-03-30','$2y$10$b/0PuHlh3I.66wY.FUfPqeBweR.McXoPafzvJBkZ4dDf/F2H9pVHy','180022,jdkfa,dfafd',1,'danieu@gmail.com',0,NULL,NULL),
(9,'DAnie2131313131!@#%!%$@!#','sfas','2022-06-08','$2y$10$ExVnAre8jULBi54FL9JFD.92U4VpkkQi2Q7NJHkNhdteAmkCPfIGC','01301203,132123,sdfaasd',1,'barbarapena@gmail.com',0,NULL,NULL),
(12,'Pedro Paulo','pedrinhooow#','2004-03-30','$2y$10$BDKhTPCj26DwaoNRlsfPluwmzuDFXukHSXv8DmNYx8mo3mLji5IrO','18072044,Rua Amélia do Rosário Gaspar,Parque São Bento,Sorocaba,SP,nº69',1,'predo@gmail.com',1,'15991203862','49011888871');
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

-- Dump completed on 2022-06-13 23:17:09
