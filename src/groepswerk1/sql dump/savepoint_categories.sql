-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: savepoint
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(31) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Action'),(2,'Indie'),(3,'Adventure'),(4,'RPG'),(5,'Strategy'),(6,'Shooter'),(7,'Casual'),(8,'Simulation'),(9,'Puzzle'),(10,'Arcade'),(11,'Platformer'),(12,'Massively Multiplayer'),(13,'Racing'),(14,'Sports'),(15,'Fighting'),(16,'Family'),(17,'Board Games'),(18,'Educational'),(19,'Card'),(20,'Singleplayer'),(21,'Multiplayer'),(22,'Co-op'),(23,'Story Rich'),(24,'Open World'),(25,'cooperative'),(26,'First-Person'),(27,'2D'),(28,'Third Person'),(29,'Sci-fi'),(30,'Horror'),(31,'FPS'),(32,'Online Co-Op'),(33,'Fantasy'),(34,'Exploration'),(35,'Classic'),(36,'Sandbox'),(37,'Survival'),(38,'Comedy'),(39,'Free to Play'),(40,'Split Screen'),(41,'Stealth'),(42,'Online multiplayer'),(43,'Local Co-Op'),(44,'Action-Adventure'),(45,'Action RPG'),(46,'Tactical'),(47,'Local Multiplayer'),(48,'Third-Person Shooter'),(49,'Early Access'),(50,'Retro'),(51,'Dark'),(52,'PvP'),(53,'Anime'),(54,'Cross-Platform Multiplayer'),(55,'Space'),(56,'Zombies'),(57,'Point & Click'),(58,'role-playing'),(59,'Nudity'),(60,'Hack and Slash'),(61,'War'),(62,'Turn-Based'),(63,'Survival Horror'),(64,'Family Friendly'),(65,'Post-apocalyptic'),(66,'Mystery'),(67,'Choices Matter'),(68,'Dark Fantasy'),(69,'Mature'),(70,'Crafting'),(71,'3D'),(72,'Realistic'),(73,'Side Scroller'),(74,'Historical'),(75,'Cinematic'),(76,'Team-Based'),(77,'Futuristic'),(78,'Roguelike'),(79,'Isometric'),(80,'Medieval'),(81,'RTS'),(82,'Building'),(83,'VR'),(84,'Turn-Based Strategy'),(85,'Military'),(86,'Magic'),(87,'Walking Simulator'),(88,'Competitive'),(89,'Parkour'),(90,'Cyberpunk'),(91,'Beat \'em up'),(92,'Crime'),(93,'Top-Down'),(94,'Online PvP'),(95,'Dystopian'),(96,'mmo'),(97,'Management'),(98,'Visual Novel');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-28 12:07:10
