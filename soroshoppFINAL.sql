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
--
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
  `descricao` varchar(1500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_anuncio` date NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `slug` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idanuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncio`
--

LOCK TABLES `anuncio` WRITE;
/*!40000 ALTER TABLE `anuncio` DISABLE KEYS */;
INSERT INTO `anuncio` VALUES
(86,17,'Gato Persa','Gato  persa jovem','2022-06-21',8,'gato-persapY5peLBKFrhfsQjOpb4A6FrvebKY7QNY4bETOtGVhLUiA1Dee7','R$ 1.500,00'),
(88,17,'Shiba Inu','Cachorro da raça japonesa Shiba Inu, filhote','2022-06-22',8,'shiba-inuCl207J8KVzj6xRwk8FCjWzbu2eq8g4CIT7A6aEfKxY7EU5C0tH','R$ 3.550,00'),
(89,17,'3DS Vermelho','3DS primeiro modelo, vermelho, usado e com algumas marcas como arranhões leves','2022-06-22',2,'3ds-vermelhodT3vcsiOeiwsTIPWXpsUNDN1gMD3VizGQahCR3QqdIXEumEN61','R$ 700,99'),
(90,17,'Adidas Predator','Adidas Predator Instinct ano 2015, Vermelha/Azul/Branca, tamanho 39','2022-06-22',1,'adidas-predatorS6XxdY402YBsTYv05ixiuK9UA7J6b32uOJg9Puk0URpqgfPi2u','R$ 300,15'),
(91,17,'Fotos de Anime','fotos','2022-06-22',10,'fotos-de-animeckA4GveeeefDzBOxoqNMeUHiQi0gQqH1HY71T3PkFtoDMDGH2a','R$ 32,99');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES
(1,'Esportes'),
(2,'Eletrônicos'),
(3,'Moda e Acessórios'),
(4,'Automóveis e Peças'),
(5,'Brinquedos e Artigos Infantis'),
(6,'Imóveis'),
(7,'Comércio e Escritório'),
(8,'Pets'),
(9,'Casa e Móveis'),
(10,'Diversos');
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
  `arquivo` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arquivo1` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arquivo2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idimganuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imganuncio`
--

LOCK TABLES `imganuncio` WRITE;
/*!40000 ALTER TABLE `imganuncio` DISABLE KEYS */;
INSERT INTO `imganuncio` VALUES
(19,86,'gDfF9q5qXRRZym5qLuu0amora1.jpg','rem9R7dFAeh1clLpep2iamora2.jpg','LHH0ItCudca9Qslx5rnBamora3.jpg'),
(21,88,'ZMZILXH2DBF7Fxh5rTa9shiba1.jpg','09UzfqoTjVTNhEkxhiPEshiba2.jpg','a4YnaFi4zz0RtPKXQYylshiba3.jpg'),
(22,89,'LCaVPQjwcRlAGwCkssoS3ds2.jpg','9giVhInz6O0uFVEj6Ucy3ds3.jpg','r1eChz2qFD6FuIqxbfx93ds1.jpg'),
(23,90,'7jculN6fCndDeOs2KGJBpredator.jpg','vAlk8AZShsVF35TFW1dRpredator2.jpg','sBp8fJIQ0LT0ScPwYZLIpredator3.jpg'),
(24,91,'ASh5xYC5eLHEkVZ45rwIimages.jpeg','pjDQV98N0HxstSEDlgAbhitohito2.jpeg','zHuSlD1a8JBhYjpLxoixfotoanime.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES
(17,'Daniel Luís Bevilacqua','d4n1eu_04','2004-03-30','$2y$10$7Ow6U9hR/Gtp6mWD5xNKhOkPuKUJKutUeA7IIU2oxZOSW0S2L0qme','18044720 ,Rua Berenice Prado Mastrogiovani ,Jardim das Magnólias ,Sorocaba ,SP ,nº60, apto307',2,'danielluisbevilacqua2004@gmail.com',1,'15991203862','49011888871');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venda` (
  `idvenda` int(11) NOT NULL AUTO_INCREMENT,
  `idvendedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idvenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

LOCK TABLES `venda` WRITE;
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-22 10:48:26
