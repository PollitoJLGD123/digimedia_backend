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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libroreclamacion`
--

DROP TABLE IF EXISTS `libroreclamacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libroreclamacion` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libroreclamacion`
--

LOCK TABLES `libroreclamacion` WRITE;
/*!40000 ALTER TABLE `libroreclamacion` DISABLE KEYS */;
INSERT INTO `libroreclamacion` VALUES (1,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(2,'dadadada','dadad','DNI','77777777','correo@correo.com','123456789','cajamarca','cajamarca','cajamarca','QUEJA','OTROS','sdadadad','true','true'),(3,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(4,'dadadada','dadad','DNI','77777777','correo@correo.com','123456789','cajamarca','cajamarca','cajamarca','QUEJA','OTROS','sdadadad','true','true'),(5,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(6,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(7,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(8,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(9,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(10,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(11,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(12,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(13,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(14,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(15,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(16,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(17,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(18,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(19,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(20,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(21,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(22,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(23,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(24,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(25,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(26,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(27,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(28,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(29,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(30,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(31,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(32,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(33,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(34,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(35,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(36,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(37,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(38,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(39,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(40,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(41,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(42,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(43,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(44,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(45,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(46,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(47,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(48,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(49,'a','a','a','a','a','a','a','a','a','a','0','0','0','0'),(50,'a','a','a','a','a','a','a','a','a','a','0','0','0','0');
/*!40000 ALTER TABLE `libroreclamacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (10,'0001_01_01_000000_create_users_table',1),(11,'0001_01_01_000001_create_cache_table',1),(12,'0001_01_01_000002_create_jobs_table',1),(13,'2025_01_24_225155_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalservicios`
--

DROP TABLE IF EXISTS `modalservicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modalservicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8mb3_unicode_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `servicio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `servicio_id` (`servicio_id`),
  CONSTRAINT `modalservicios_ibfk_1` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalservicios`
--

LOCK TABLES `modalservicios` WRITE;
/*!40000 ALTER TABLE `modalservicios` DISABLE KEYS */;
INSERT INTO `modalservicios` VALUES (1,'Daniela','Infantes','danielamij251@gmail.com','2025-01-23 19:19:40',3),(2,'sebastian','cardenas','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',1),(3,'sebastian','cardenas','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',2),(4,'Juan Carlos Molina ','Molina','tmlighting@hotmail.com','2025-01-23 19:19:40',3),(5,'johao','montoya','johaomontoya01@gmail.com','2025-01-23 19:19:40',1),(6,'johao','montoya','johaomontoya01@gmail.com','2025-01-23 19:19:40',2),(7,'Luis','Cáceres','luisjorgejorge1919@gmail.com','2025-01-23 19:19:40',3),(8,'Luis Jorge','Cáceres B','luisjorgejorge1919@gmail.com','2025-01-23 19:19:40',1),(9,'Branco Manuel','Arguedas ','bm.arguedasv@gmail.com','2025-01-23 19:19:40',2),(10,'Luis Jorge','Cáceres B','luisjorgejorge1919@gmail.com','2025-01-23 19:19:40',2),(11,'Juan','Jhon','juansuarezf16@gmail.com','2025-01-23 19:19:40',3),(12,'Juan carlos','Molina or','tmlighting@hotmail.com','2025-01-23 19:19:40',4),(13,'jennyfer Jesus ','Horna Vil','hornavillarjenni@gmail.com','2025-01-23 19:19:40',2),(14,'Nicolle','Lozano Sa','nicollels_18@hotmail.com','2025-01-23 19:19:40',4),(15,'Gabriela','Chinga Pa','gabychinga@gmail.com','2025-01-23 19:19:40',3),(16,'Zack','970339137','axellaziness@gmail.com','2025-01-23 19:19:40',2),(17,'Antony Aranda','970339137','axellaziness@gmail.com','2025-01-23 19:19:40',1),(18,'Antony Aranda','970339137','axellaziness@gmail.com','2025-01-23 19:19:40',4),(19,'Zack','970339137','axellaziness@gmail.com','2025-01-23 19:19:40',3),(20,'prueba','940759137','taodrake01@gmail.com','2025-01-23 19:19:40',2),(21,'Antony Aranda','970339137','axellaziness@gmail.com','2025-01-23 19:19:40',1),(22,'Nicolle Lozano','993771339','nicollels_18@hotmail.com','2025-01-23 19:19:40',3),(23,'123','988777666','diegolevanososa@gmail.com','2025-01-23 19:19:40',1),(24,'Franco','990269910','lopezurcia@gmail.com','2025-01-23 19:19:40',2),(25,'diego','946595031','diegogabrielcentenofalcon7@gmail.com','2025-01-23 19:19:40',4),(26,'adad','987654321','asdad@hotmail.com','2025-01-23 19:19:40',3),(27,'asda','987654321','asdad@hotmail.com','2025-01-23 19:19:40',2),(28,'asda','987654321','brayan@gmail.com','2025-01-23 19:19:40',1),(29,'hoy','987654321','asdad@hotmail.com','2025-01-23 19:19:40',4),(30,'Brayan','997742033','brayan.alaya@hotmail.com','2025-01-23 19:19:40',4),(31,'Brayan','997742033','brayan.alaya@hotmail.com','2025-01-23 19:19:40',3),(32,'Brayan','997742033','brayan.alaya@hotmail.com','2025-01-23 19:19:40',2),(33,'Brayan','997742033','brayan.alaya@hotmail.com','2025-01-23 19:19:40',1),(34,'Brayan ','997742033','brayan.alaya@hotmail.com','2025-01-23 19:19:40',4),(35,'Brayan','997742033','brayan.alaya@hotmail.com','2025-01-23 19:19:40',3),(36,'Brayan','987456211','brayan.alaya@hotmail.com','2025-01-23 19:19:40',2),(37,'Brayan','987456123','brayan.alaya@hotmail.com','2025-01-23 19:19:40',1),(38,'sdadadada','987654321','brayan.alaya@hotmail.com','2025-01-23 19:19:40',4),(64,'Daniela Infantes','999351599','danielamij251@gmail.com','2025-01-23 19:19:40',3),(65,'Daniela','Infantes','danielamij251@gmail.com','2025-01-23 19:19:40',2),(66,'sebastian','Cardenas','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',1),(67,'asdadas','cardenas','taodrake01@gmail.com','2025-01-23 19:19:40',4),(68,'asdadas','cardenas','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',3),(69,'asdadas','cardenas','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',2),(70,'sebastian','940759137','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',1),(71,'asdadas','cardenas','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',4),(72,'Antony Aranda','970339137','axellaziness@gmail.com','2025-01-23 19:19:40',3),(73,'sebastian','940759137','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',2),(74,'asdadas','cardenas','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',1),(75,'sebastian','940759137','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',1),(76,'Daniela Michelle Infantes Juárez ','999355516','danielamij251@gmail.com','2025-01-23 19:19:40',2),(77,'Daniela Infantes','999351599','danielamij251@gmail.com','2025-01-23 19:19:40',3),(78,'jennyfer Jesus ','943004092','hornavillarjenni@gmail.com','2025-01-23 19:19:40',4),(79,'Jennyfer Jesus Horna Villar ','943004092','jenny30052002@gmail.com','2025-01-23 19:19:40',1),(80,'Akiro','987063652','akirothor@gmail.com','2025-01-23 19:19:40',2),(81,'Kado12','912151197','gonzalosh01@gmail.com','2025-01-23 19:19:40',3),(82,'Gonzalo Daniel Sotelo Huamán','912151197','gonzalosh01@gmail.com','2025-01-23 19:19:40',4),(83,'hoy','987654321','asdad@hotmail.com','2025-01-23 19:19:40',1),(95,'Daniela Infantes','999351599','danielamij251@gmail.com','2025-01-23 19:19:40',2),(96,'Daniela','Infantes','undefined','2025-01-23 19:19:40',4),(97,'asdadas','cardenas','undefined','2025-01-23 19:19:40',1),(98,'sebastian','940759137','sebastian.clover.52@gmail.com','2025-01-23 19:19:40',2),(99,'asdadas','cardenas','undefined','2025-01-23 19:19:40',3),(100,'johao','montoya','undefined','2025-01-23 19:19:40',4),(101,'Antony','Aranda','undefined','2025-01-23 19:19:40',1),(102,'Nicolle','Lozano Sa','undefined','2025-01-23 19:19:40',2),(103,'pingui','929177594','undefined','2025-01-23 19:19:40',3),(104,'prueba1','940759137','undefined','2025-01-23 19:19:40',4),(105,'prueba1','940759137','undefined','2025-01-23 19:19:40',1),(106,'Renzo','956185681','undefined','2025-01-23 19:19:40',2),(107,'Franco','990269910','lopezurcia@gmail.com','2025-01-23 19:19:40',3),(110,'nombreessss','123456789','correo@correo.com','2025-02-04 15:13:11',2),(111,'nombreessss','123456789','correo@correo.com','2025-02-04 15:14:52',2),(112,'nombreessss','123456789','correo@correo.com','2025-02-04 15:23:31',2),(113,'nombreessss','123456789','correo@correo.com','2025-02-04 15:25:25',2),(114,'nombreessss','123456789','correo@correo.com','2025-02-04 15:26:09',2),(115,'nombreessss','123456789','correo@correo.com','2025-02-04 15:28:40',2),(116,'nombreessss','123456789','correo@correo.com','2025-02-04 15:56:30',2),(117,'nombreessss','123456789','correo@correo.com','2025-02-04 18:07:25',1),(118,'nombreessss','123456789','correo@correo.com','2025-02-04 18:25:58',1),(119,'nombreessss','123456789','correo@correo.com','2025-02-04 18:34:57',1),(120,'nombreessss','123456789','correo@correo.com','2025-02-04 18:53:59',1),(121,'nombreessss','123456789','correo@correo.com','2025-02-04 18:55:39',1),(122,'nombreessss','123456789','correo@correo.com','2025-02-04 18:58:23',2),(123,'nombreessss','123456789','correo@correo.com','2025-02-04 19:01:11',2),(126,'brayan','123456789','dadada@hotmail.com','2025-02-07 14:45:23',1),(127,'brayan','123456789','brayan.alaya@dasdad.com','2025-02-07 14:50:49',1),(128,'anthony','123456789','brayan.alaya@dasdad.com','2025-02-07 14:51:12',1),(129,'anthony','123456789','brayan.alaya@dasdad.com','2025-02-07 14:51:12',1);
/*!40000 ALTER TABLE `modalservicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'Diseño y desarrollo web'),(2,'Gestión de redes sociales'),(3,'Marketing y gestión digital'),(4,'Branding y Diseño');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@admin.com',NULL,'$2y$12$j0scXXQ/Rnc6JYpmY4Jtnu8eqW9VJDZ/zH6Mtjix4/zmsB.V44dvu',1,'2025-01-25 15:06:35','2025-02-01 00:31:11',NULL),(2,'usuario','user@user.com',NULL,'$2y$12$8UPl9S9FsPdn/R.uWVTr1OgnzyNuSYxs5v3kfq2zYUwSNVuhGpEWm',0,NULL,'2025-02-19 01:18:10','2025-02-19 01:18:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-18 16:16:06
