-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: nhl
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `contactanos`
--

DROP TABLE IF EXISTS `contactanos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactanos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `servicio` varchar(250) DEFAULT NULL,
  `numero` varchar(9) DEFAULT NULL,
  `mensaje` text,
  `emailMarck` varchar(10) DEFAULT NULL,
  `new` varchar(10) DEFAULT NULL,
  `production` varchar(10) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_hora_actualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactanos`
--

LOCK TABLES `contactanos` WRITE;
/*!40000 ALTER TABLE `contactanos` DISABLE KEYS */;
INSERT INTO `contactanos` VALUES (178,'Juan','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','..........','no','no','no','0','2024-07-29 20:04:48','2024-07-29 20:04:48'),(179,'fawert','diegogabrielcentenofalcon7@gmail.com','Gestion de redes sociales','987654321','sdfsdfsdf','no','no','no','0','2024-07-29 20:15:27','2024-07-29 20:15:27'),(180,'fawert','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','sdvsdddf','no','no','no','0','2024-07-29 20:31:08','2024-07-29 20:31:08'),(181,'fawert','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','sdvsdddf','no','no','no','0','2024-07-29 20:31:10','2024-07-29 20:31:10'),(182,'diego','diegogabrielcentenofalcon7@gmail.com','Gestion de redes sociales','946595031','hola','no','no','no','0','2024-07-29 20:31:30','2024-07-29 20:31:30'),(183,'diego','diegogabrielcentenofalcon7@gmail.com','Gestion de redes sociales','946595031','hola','no','no','no','0','2024-07-29 20:31:32','2024-07-29 20:31:32'),(184,'diego','diegogabrielcentenofalcon7@gmail.com','Gestion de redes sociales','946595031','hola','no','no','no','0','2024-07-29 20:31:34','2024-07-29 20:31:34'),(185,'diego','diegogabrielcentenofalcon7@gmail.com','Gestion de redes sociales','946595031','hola','no','no','no','0','2024-07-29 20:31:34','2024-07-29 20:31:34'),(186,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','asdasd','no','no','no','0','2024-07-29 20:31:45','2024-07-29 20:31:45'),(187,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','asdasd','no','no','no','0','2024-07-29 20:31:46','2024-07-29 20:31:46'),(188,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','asdasd','no','no','no','0','2024-07-29 20:31:46','2024-07-29 20:31:46'),(189,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','asdasd','no','no','no','0','2024-07-29 20:31:46','2024-07-29 20:31:46'),(190,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031',',,,,,,,,,,,,,,,,,','no','no','no','0','2024-07-29 20:32:20','2024-07-29 20:32:20'),(191,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031',',,,,,,,,,,,,,,,,,','no','no','no','0','2024-07-29 20:32:21','2024-07-29 20:32:21'),(192,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','....','no','no','no','0','2024-07-29 20:32:25','2024-07-29 20:32:25'),(193,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','....','no','no','no','0','2024-07-29 20:32:25','2024-07-29 20:32:25'),(194,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','....','no','no','no','0','2024-07-29 20:32:25','2024-07-29 20:32:25'),(195,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','....','no','no','no','0','2024-07-29 20:32:25','2024-07-29 20:32:25'),(196,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','....','no','no','no','0','2024-07-29 20:32:26','2024-07-29 20:32:26'),(197,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','....','no','no','no','0','2024-07-29 20:32:26','2024-07-29 20:32:26'),(198,'diego','diegogabrielcentenofalcon7@gmail.com','Desing y desarrollo web','946595031','hola','no','no','no','0','2024-07-29 20:32:41','2024-07-29 20:32:41'),(199,'Jhonatan','jhonatanhuaman76@gmail.com','Desing y desarrollo web','987456321','ASD','no','no','no','0','2024-07-30 16:37:36','2024-07-30 16:37:36');
/*!40000 ALTER TABLE `contactanos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libroreclamacion`
--

DROP TABLE IF EXISTS `libroreclamacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libroreclamacion` (
  `idReclamacion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `documento` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `numeroDocumento` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `celular` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `direccion` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `distrito` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ciudad` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tipoReclamo` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `servicioContratado` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `reclamoPerson` varchar(1050) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `checkReclamoForm` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `aceptaPoliticaPrivacidad` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idReclamacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libroreclamacion`
--

LOCK TABLES `libroreclamacion` WRITE;
/*!40000 ALTER TABLE `libroreclamacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `libroreclamacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalbranding`
--

DROP TABLE IF EXISTS `modalbranding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modalbranding` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `correo` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalbranding`
--

LOCK TABLES `modalbranding` WRITE;
/*!40000 ALTER TABLE `modalbranding` DISABLE KEYS */;
/*!40000 ALTER TABLE `modalbranding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modaldesing`
--

DROP TABLE IF EXISTS `modaldesing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modaldesing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `correo` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modaldesing`
--

LOCK TABLES `modaldesing` WRITE;
/*!40000 ALTER TABLE `modaldesing` DISABLE KEYS */;
INSERT INTO `modaldesing` VALUES (1,'Daniela','Infantes','danielamij251@gmail.com'),(2,'sebastian','cardenas','sebastian.clover.52@gmail.com'),(3,'sebastian','cardenas','sebastian.clover.52@gmail.com'),(4,'Juan Carlos Molina ','Molina','tmlighting@hotmail.com'),(6,'johao','montoya','johaomontoya01@gmail.com'),(7,'johao','montoya','johaomontoya01@gmail.com'),(8,'Luis','Cáceres','luisjorgejorge1919@gmail.com'),(9,'Luis Jorge','Cáceres B','luisjorgejorge1919@gmail.com'),(10,'Branco Manuel','Arguedas ','bm.arguedasv@gmail.com'),(11,'Luis Jorge','Cáceres B','luisjorgejorge1919@gmail.com'),(12,'Juan','Jhon','juansuarezf16@gmail.com'),(13,'Juan carlos','Molina or','tmlighting@hotmail.com'),(14,'jennyfer Jesus ','Horna Vil','hornavillarjenni@gmail.com'),(15,'Nicolle','Lozano Sa','nicollels_18@hotmail.com'),(16,'Gabriela','Chinga Pa','gabychinga@gmail.com'),(17,'Zack','970339137','axellaziness@gmail.com'),(18,'Antony Aranda','970339137','axellaziness@gmail.com'),(19,'Antony Aranda','970339137','axellaziness@gmail.com'),(20,'Zack','970339137','axellaziness@gmail.com'),(21,'prueba','940759137','taodrake01@gmail.com'),(22,'Antony Aranda','970339137','axellaziness@gmail.com'),(23,'Nicolle Lozano','993771339','nicollels_18@hotmail.com'),(24,'123','988777666','diegolevanososa@gmail.com'),(25,'Franco','990269910','lopezurcia@gmail.com'),(26,'diego','946595031','diegogabrielcentenofalcon7@gmail.com'),(27,'adad','987654321','asdad@hotmail.com'),(28,'asda','987654321','asdad@hotmail.com'),(29,'asda','987654321','brayan@gmail.com'),(30,'hoy','987654321','asdad@hotmail.com'),(31,'Brayan','997742033','brayan.alaya@hotmail.com'),(32,'Brayan','997742033','brayan.alaya@hotmail.com'),(33,'Brayan','997742033','brayan.alaya@hotmail.com'),(34,'Brayan','997742033','brayan.alaya@hotmail.com'),(35,'Brayan ','997742033','brayan.alaya@hotmail.com'),(36,'Brayan','997742033','brayan.alaya@hotmail.com'),(37,'Brayan','987456211','brayan.alaya@hotmail.com'),(38,'Brayan','987456123','brayan.alaya@hotmail.com'),(39,'sdadadada','987654321','brayan.alaya@hotmail.com');
/*!40000 ALTER TABLE `modaldesing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalgestion`
--

DROP TABLE IF EXISTS `modalgestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modalgestion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `correo` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalgestion`
--

LOCK TABLES `modalgestion` WRITE;
/*!40000 ALTER TABLE `modalgestion` DISABLE KEYS */;
INSERT INTO `modalgestion` VALUES (1,'Daniela Infantes','999351599','danielamij251@gmail.com'),(2,'Daniela','Infantes','danielamij251@gmail.com'),(3,'sebastian','Cardenas','sebastian.clover.52@gmail.com'),(4,'asdadas','cardenas','taodrake01@gmail.com'),(6,'asdadas','cardenas','sebastian.clover.52@gmail.com'),(7,'asdadas','cardenas','sebastian.clover.52@gmail.com'),(8,'sebastian','940759137','sebastian.clover.52@gmail.com'),(9,'asdadas','cardenas','sebastian.clover.52@gmail.com'),(10,'Antony Aranda','970339137','axellaziness@gmail.com'),(11,'sebastian','940759137','sebastian.clover.52@gmail.com'),(12,'asdadas','cardenas','sebastian.clover.52@gmail.com'),(13,'sebastian','940759137','sebastian.clover.52@gmail.com'),(14,'Daniela Michelle Infantes Juárez ','999355516','danielamij251@gmail.com'),(15,'Daniela Infantes','999351599','danielamij251@gmail.com'),(16,'jennyfer Jesus ','943004092','hornavillarjenni@gmail.com'),(17,'Jennyfer Jesus Horna Villar ','943004092','jenny30052002@gmail.com'),(18,'Akiro','987063652','akirothor@gmail.com'),(19,'Kado12','912151197','gonzalosh01@gmail.com'),(20,'Gonzalo Daniel Sotelo Huamán','912151197','gonzalosh01@gmail.com'),(21,'hoy','987654321','asdad@hotmail.com');
/*!40000 ALTER TABLE `modalgestion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalmarketing`
--

DROP TABLE IF EXISTS `modalmarketing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modalmarketing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `correo` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalmarketing`
--

LOCK TABLES `modalmarketing` WRITE;
/*!40000 ALTER TABLE `modalmarketing` DISABLE KEYS */;
INSERT INTO `modalmarketing` VALUES (1,'Daniela Infantes','999351599','danielamij251@gmail.com'),(2,'Daniela','Infantes','undefined'),(3,'asdadas','cardenas','undefined'),(4,'sebastian','940759137','sebastian.clover.52@gmail.com'),(6,'asdadas','cardenas','undefined'),(7,'johao','montoya','undefined'),(8,'Antony','Aranda','undefined'),(9,'Nicolle','Lozano Sa','undefined'),(10,'pingui','929177594','undefined'),(11,'prueba1','940759137','undefined'),(12,'prueba1','940759137','undefined'),(13,'Renzo','956185681','undefined'),(14,'Franco','990269910','lopezurcia@gmail.com'),(15,'hoy','987654321','asdad@hotmail.com');
/*!40000 ALTER TABLE `modalmarketing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personcamino5`
--

DROP TABLE IF EXISTS `personcamino5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personcamino5` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personcamino5`
--

LOCK TABLES `personcamino5` WRITE;
/*!40000 ALTER TABLE `personcamino5` DISABLE KEYS */;
INSERT INTO `personcamino5` VALUES (2,'Daniela Infantes','danielamij251@gmail.com','999 351 599'),(3,'carloss','informestami01@gmail.com','978 883 199'),(4,'Juan carlos','yuntasproducciones@gmail.com','912849782'),(5,'Daniela Infantes','danielamij251@gmail.com','999 351 599'),(6,'Daniela Infantes','danielamij251@gmail.com','999351599'),(7,'sebastian','taodrake01@gmail.com','940759137'),(8,'sebastian','taodrake01@gmail.com','940759137'),(9,'sebastian','sebastian.clover.52@gmail.com','940759137'),(10,'jennyfer Jesus ','hornavillarjenni@gmail.com','943004092'),(11,'Antony Aranda','axellaziness@gmail.com','970339137'),(12,'hoy','asdad@hotmail.com','987654321'),(13,'hoy2','asdad@hotmail.com','987654321');
/*!40000 ALTER TABLE `personcamino5` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personcampañas3`
--

DROP TABLE IF EXISTS `personcampañas3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personcampañas3` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personcampañas3`
--

LOCK TABLES `personcampañas3` WRITE;
/*!40000 ALTER TABLE `personcampañas3` DISABLE KEYS */;
INSERT INTO `personcampañas3` VALUES (1,'Daniela Infantes','999351599','danielamij251@gmail.com'),(2,'Daniela Infantes','999351599','danielamij251@gmail.com'),(3,'Daniela Infantes','999351599','danielamij251@gmail.com'),(4,'Daniela Infantes','999 351 599','danielamij251@gmail.com'),(5,'Daniela Infantes','999351599','danielamij251@gmail.com'),(6,'Daniela Infantes','999351599','danielamij251@gmail.com'),(7,'carloss','936910425','ventasneonhouse@gmail.com'),(8,'Daniela Infantes','999 351 599','danielamij251@gmail.com'),(9,'carloss','912 849 782','yuntasproducciones@gmail.com'),(10,'Juan carlos','912849782','yuntasproducciones@gmail.com'),(11,'Diego MF','900265655','dmarquezf11@gmail.com'),(12,'hoy','987654321','asdad@hotmail.com'),(13,'hoy','987654321','asdad@hotmail.com'),(14,'hoy','987654321','asdad@hotmail.com'),(15,'hoy','987654321','asdad@hotmail.com'),(16,'hoy','987654321','asdad@hotmail.com');
/*!40000 ALTER TABLE `personcampañas3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persondigi1`
--

DROP TABLE IF EXISTS `persondigi1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persondigi1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `service` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persondigi1`
--

LOCK TABLES `persondigi1` WRITE;
/*!40000 ALTER TABLE `persondigi1` DISABLE KEYS */;
INSERT INTO `persondigi1` VALUES (17,'sebastian','940759137','sebastian.clover.52@gmail.com','0'),(18,'johao montoya','910376683','johaomontoya01@gmail.com','0'),(19,'Daniela Infantes','999351599','danielamij251@gmail.com','1'),(20,'Daniela Infantes','999355516','danielamij251@gmail.com','1'),(21,'Daniela Infantes','999351599','danielamij251@gmail.com','0'),(22,'Daniela Infantes','999351599','danielamij251@gmail.com','0'),(23,'Gabriela Chinga Pastor','991494279','gabychinga@gmail.com','0'),(24,'Victor Miguel Granda Herrera','966956176','grandahvictor@gmail.com','0'),(25,'Victor Miguel Granda Herrera','966956176','grandahvictor@gmail.com','0'),(26,'Daniela Infantes','999351599','danielamij251@gmail.com','0'),(27,'sebastian','940759137','sebastian.clover.52@gmail.com','0'),(28,'dikalz','931805941','dikalzeeuu@gmail.com','0'),(29,'Daniela Infantes','999351599','danielamij251@gmail.com','1'),(30,'Daniela Infantes','999351599','danielamij251@gmail.com','0'),(31,'Daniela Infantes','999351599','danielamij251@gmail.com','0'),(32,'Gabriela Chinga Pastor','991494279','gabychinga@gmail.com','0'),(33,'Levanoi','989898989','dikalzeeuu@gmail.com','2'),(34,'Daniela Infantes','999351599','danielamij251@gmail.com','0'),(35,'asds','999888777','dikalzeeuu@gmail.com','1'),(37,'Diaklz','931805941','dikalz@gmail.com','Diseño y Desarrollo Web'),(38,'sdasd sadas ','931805941','dikalzeeuu@gmail.com','Diseño y Desarrollo Web'),(39,'sdasd sadsa ','994673564','123@gmail.com','Diseño y Desarrollo Web'),(40,'sdasd','931805941','asdsd@gmail.com','Gestión de Redes Sociales'),(41,'sadasd','931805941','asdasd@gmail.com','Marketing y Gestión Digital'),(42,'123','931805941','diegolevanososa@gmail.com','Diseño y Desarrollo Web'),(43,'123','931805941','123@gmail.com','Diseño y Desarrollo Web'),(44,'Ssndkska','931805941','Ajjsa@gmail.com','Diseño y Desarrollo Web'),(45,'2323','931805941','122@gmail.com','Diseño y Desarrollo Web'),(46,'12112','931805941','123@gmail.com','Diseño y Desarrollo Web'),(47,'diego','931805941','123@gmail.com','Diseño y Desarrollo Web'),(48,'Diego Bautista López','954368018','diego.bautistamlp@gmail.com','Diseño y Desarrollo Web'),(49,'Diego Bautista López','954368018','diego.bautistamlp@gmail.com','Diseño y Desarrollo Web'),(50,'Diego Bautista López','954368018','diego.bautistamlp@gmail.com','Gestión de Redes Sociales'),(51,'asdasd','954368018','diego.bautis@gmail.com','Diseño y Desarrollo Web'),(52,'Diego Bautista López','954368018','diego.bautistamlp@gmail.com','Diseño y Desarrollo Web'),(53,'Diego Bautista López','913746209','diego.bautistamlp@gmail.com','Diseño y Desarrollo Web'),(54,'Diego Bautista López','954368018','diego.bautistamlp@gmail.com','Diseño y Desarrollo Web'),(55,'Diego Bautista López','954368018','diego.bautistamlp@gmail.com','Gestión de Redes Sociales'),(56,'Diego Bautista López','954368018','diego.bautistamlp@gmail.com','Diseño y Desarrollo Web'),(57,'Alexia Villa-Gracía','926843547','avcm030820@gmail.com','Marketing y Gestión Digital'),(58,'Franck candela','913469852','candelafernandezf@gmail.com','Diseño y Desarrollo Web');
/*!40000 ALTER TABLE `persondigi1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personredes4`
--

DROP TABLE IF EXISTS `personredes4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personredes4` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personredes4`
--

LOCK TABLES `personredes4` WRITE;
/*!40000 ALTER TABLE `personredes4` DISABLE KEYS */;
INSERT INTO `personredes4` VALUES (1,'Daniela Infantes','999351599','danielamij251@gmail.com'),(2,'Daniela Infantes','999351599','danielamij251@gmail.com'),(3,'Daniela Infantes','999351599','danielamij251@gmail.com'),(4,'Daniela Infantes','999351599','danielamij251@gmail.com'),(5,'Rosa Jhannis ','936910425','ventasneonhouse@gmail.com'),(6,'Juan carlos','936910425','yuntasproducciones@gmail.com'),(7,'juka','978 883 199','informestami01@gmail.com'),(8,'sebastian','940759137','sebastian.clover.52@gmail.com'),(9,'hoy','987654351','asdad@hotmail.com');
/*!40000 ALTER TABLE `personredes4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personweb2`
--

DROP TABLE IF EXISTS `personweb2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personweb2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personweb2`
--

LOCK TABLES `personweb2` WRITE;
/*!40000 ALTER TABLE `personweb2` DISABLE KEYS */;
INSERT INTO `personweb2` VALUES (5,'Daniela Infantes','danielamij251@gmail.com','999351599'),(6,'Daniela Infantes','danielamij251@gmail.com','999351599'),(7,'Daniela Infantes','danielamij251@gmail.com','999351599'),(8,'Daniela Infantes','danielamij251@gmail.com','999351599'),(9,'Daniela Infantes','danielamij251@gmail.com','999351599'),(10,'Daniela Infantes','danielamij251@gmail.com','999351599'),(11,'Daniela','danielamij251@gmail.com','999351599'),(12,'Daniela Infantes','danielamij251@gmail.com','999351599'),(13,'carloss','informestami01@gmail.com','978 883 199'),(14,'Daniela Infantes','danielamij251@gmail.com','999 351 599'),(15,'carloss','informestami01@gmail.com','978 883 199'),(16,'Daniela Infantes','danielamij251@gmail.com','999351599'),(17,'carloss','tmlighting@hotmail.com','936910425'),(18,'Juan','dmarquezf11@gmail.com','900265655'),(19,'johao montoya','kodabarbitas87@gmail.com','910376683'),(20,'asdasdad','dadasd@hotmail.com','987654321'),(21,'asdada','dadasd@hotmail.com','997742033'),(22,'dada','brayan.alaya@hotmail.com','987654321'),(23,'asdad','asdad@hotmail.com','987654321'),(24,'asdad','asdad@hotmail.com','987654321'),(25,'cerveza artesanal helada1','asdad@hotmail.com','987654321'),(26,'sdadad','asdad@hotmail.com','987654321'),(27,'hoy','asdad@hotmail.com','987354321');
/*!40000 ALTER TABLE `personweb2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posting_blog`
--

DROP TABLE IF EXISTS `posting_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posting_blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(300) DEFAULT NULL,
  `contenido` text,
  `link` text,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posting_blog`
--

LOCK TABLES `posting_blog` WRITE;
/*!40000 ALTER TABLE `posting_blog` DISABLE KEYS */;
INSERT INTO `posting_blog` VALUES (5,'¿Listo para conquistar el mercado digital?','Desbloquea el potencial oculto, descubre cómo una página bien diseñada puede atraer más clientes e impulsar tu crecimiento.','https://943060409.blogspot.com/2024/07/por-que-tu-negocio-necesita-una-pagina.html','2024-07-03 14:05:50'),(7,'Beneficio de las redes sociales para nuevos emprendedores','Impulsa tu marca con nuestra gestión profesional de redes sociales. Conecta, interactúa y destaca en el mundo digital. ¡Descubre cómo podemos potenciar tu presencia hoy mismo!','https://943060409.blogspot.com/2024/07/gestion-de-redes-sociales.html','2024-07-15 11:00:27'),(8,'“El Arte del Branding: Cómo construir una marca que resuene”','Atrévete a explorar el potencial ilimitado que tiene una estrategia de branding bien ejecutada y conquista el corazón y la mente de tus clientes. ','https://943060409.blogspot.com/2024/07/descubre-el-poder-del-branding-para.html','2024-07-15 11:01:39'),(9,'Las herramientas esenciales para crear una página web profesional','Descubre las mejores herramientas para diseñar una página web que destaque en el mundo digital actual. Desde plataformas intuitivas hasta programas avanzados para profesionales, cada herramienta cuenta. ¡No te quedes atrás!','https://943060409.blogspot.com/2024/07/los-mejores-programas-para-diseno-de.html','2024-07-17 10:05:31'),(10,'Transforma tu Marca: El Poder del Storytelling para Conectar con tu Audiencia','¿Sabías que una buena historia puede hacer más por tu marca que cualquier campaña publicitaria? El storytelling no solo captura la atención de tu audiencia, sino que también crea conexiones emocionales profundas y duraderas. ','https://943060409.blogspot.com/2024/07/como-utilizar-el-storytelling-para.html','2024-07-19 11:05:40'),(11,'¿Cómo crear Contenido Atractivo para Redes Sociales?','¡Destaca con contenido que atrapa! En un mundo saturado de información, captar la atención de tu audiencia es clave. Fortalece la identidad de tu marca, construye una comunidad leal y haz que tu página destaque.','https://943060409.blogspot.com/2024/07/como-estructurar-y-definir-tu.html','2024-07-22 12:57:17'),(12,'Herramientas de diseñador','El mundo del diseño está en constante evolución, y mantenerse al día con las últimas herramientas puede marcar una gran diferencia en tus proyectos.','https://943060409.blogspot.com/2024/07/las-mejores-herramientas-de-diseno-que.html','2024-07-25 13:50:38'),(13,'Marketing de Influencers','El marketing de influencers consiste en asociarse con personas influyentes para promover productos o servicios, utilizando su credibilidad y amplio alcance para conectar con audiencias específicas y potenciar la visibilidad y autenticidad de la marca.','https://943060409.blogspot.com/2024/07/impulsa-tu-marca-con-marketing-de.html','2024-07-26 13:41:20'),(14,' ¿Cómo los Influencers pueden amplificar tu mensaje de marca?','Haz que tu mensaje resuene más allá de los límites tradicionales. ¡Deja que los influencers te ayuden a amplificar tu voz y a conquistar nuevas audiencias!','https://943060409.blogspot.com/2024/08/potencia-tu-marca-con-el-impacto-de-los.html','2024-08-01 09:26:21'),(15,'¿Cómo Diseñar un Logotipo Impactante?','Un logotipo bien diseñado es crucial para captar la atención y transmitir la esencia de tu marca en un solo vistazo. Representa la identidad y valores de tu negocio, diferenciándote en un mercado competitivo. ','https://943060409.blogspot.com/2024/08/la-esencia-de-un-logotipo-impactante-tu.html','2024-08-01 10:12:04'),(16,'¿Tu página web está fallando? ¡Detecta y soluciona errores críticos ahora!','Una página web con errores críticos no solo frustra a tus visitantes, sino que también perjudica tu reputación online. Descubre cómo identificar y resolver estos problemas para garantizar una experiencia de usuario óptima y mejorar tu posicionamiento en los motores de búsqueda.','https://943060409.blogspot.com/2024/08/tu-pagina-web-esta-fallando-detecta-y.html','2024-08-03 12:52:04'),(17,'Marketing de Influencers','Una estrategia SEO optimiza contenido y estructura web, utilizando palabras clave y enlaces para mejorar la visibilidad y atraer tráfico orgánico.','https://943060409.blogspot.com/2024/08/como-optimizar-tu-sitio-web-tecnicas.html','2024-08-07 13:04:30'),(18,'¿Tu marca necesita un cambio? Señales de que es Tiempo de un Rebranding','¡Una manera refrescante de adaptarte a un nuevo público!\r\nPero, ¿cómo saber cuándo es el momento?, aquí te lo explicamos.\r\n','https://943060409.blogspot.com/2024/08/vuelve-ganar-el-interes-de-tu-publico.html','2024-08-09 11:20:44');
/*!40000 ALTER TABLE `posting_blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(250) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `rol` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Admin','Admin2023','Jorge Mandieta\n','Administrador'),(64,'Admin','juan12345','JUAN CARLOS ','Administrador'),(65,'FiorellaUser','FioUser','Fiorella Estefania Espinoza Aguirre','Administrador'),(67,'MelinaR.V','Admin2023','Melina Rivas Valencia','Administrador'),(72,'Franco J.L','Admin2023','Franco Joel Lopez Urcia','Administrador'),(73,'Nayeli P.S','Admin2023','Nayeli Perez San Martin','Administrador'),(74,'Camila G.C.','Admin2023','Camila Gonzales Cobeñas','Administrador'),(75,'Sergio M.R.','Admin2023','Sergio Melendez Rafael','Administrador'),(76,'Ylene M.H.','Admin2023','Ylene Massiel Huapaya Huamani       ','Administrador'),(77,'Camila I.O','Admin2023','Camila Ivet Oyardo Carrillo','Administrador');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-09 17:13:48
