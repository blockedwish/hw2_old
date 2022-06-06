-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: plant_community_db
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auctions`
--

DROP TABLE IF EXISTS `auctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plant_name` varchar(255) DEFAULT NULL,
  `owner_username` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `current_price` int(11) DEFAULT NULL,
  `top_offer_username` varchar(255) DEFAULT NULL,
  `cover_img_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auctions`
--

LOCK TABLES `auctions` WRITE;
/*!40000 ALTER TABLE `auctions` DISABLE KEYS */;
INSERT INTO `auctions` VALUES (1,'Epipremnum aureum (Linden & André) G.S.Bunting','ANGELO','2022-06-01 12:46:07','2022-06-01 22:00:00','2022-06-02 13:52:09',137,'ANGELO','https://www.giardinaggio.it/piante-appartamento/piante-da-interno/potos_NG1.jpg'),(2,'Epipremnum aureum (Linden & André) G.S.Bunting','ANGELO','2022-06-01 12:46:26','2022-06-01 22:00:00','2022-06-02 12:39:16',58,'ANGELO','https://www.nonsprecare.it/wp-content/uploads/2021/11/come-tenere-le-piante-grasse-in-casa-3.jpg'),(3,'Epipremnum aureum (Linden & André) G.S.Bunting','ANGELO','2022-06-02 11:25:02','2022-06-02 22:00:00','2022-06-02 13:50:27',52,'ANGELO','https://www.codiferro.it/wp-content/uploads/2021/05/pothos.jpg'),(4,'Epipremnum aureum (Linden & André) G.S.Bunting','ANGELO','2022-06-02 13:19:52','2022-06-02 22:00:00','2022-06-06 05:45:22',52,'PIPPO','https://www.giardinaggio.it/piante-appartamento/piante-da-interno/potos_NG1.jpg'),(5,'Monstera deliciosa Liebm.','ANGELO','2022-06-02 13:50:54','2022-06-02 22:00:00','2022-06-02 13:50:54',45,NULL,'https://us.123rf.com/450wm/laurashop/laurashop2008/laurashop200800033/152950793-un-fiore-di-monstera-da-una-finestra-giardino-domestico-monstera-deliciosa-o-pianta-di-formaggio-svi.jpg?ver=6'),(6,'Monstera deliciosa Liebm.','ANGELO','2022-06-02 13:53:27','2022-06-02 22:00:00','2022-06-02 13:53:27',44,NULL,'https://www.tuttogreen.it/wp-content/uploads/2021/12/shutterstock_2020013654.jpg'),(7,'Ficus microcarpa L.f.','PIPPO','2022-06-06 05:46:06','2022-06-06 22:00:00','2022-06-06 05:46:13',56,'PIPPO','https://regalisolidali.ant.it/wp-content/uploads/2022/05/bonsai-bat.jpg');
/*!40000 ALTER TABLE `auctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followed_auctions`
--

DROP TABLE IF EXISTS `followed_auctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followed_auctions` (
  `id` varchar(255) NOT NULL,
  `follower_id` varchar(255) DEFAULT NULL,
  `auction_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followed_auctions`
--

LOCK TABLES `followed_auctions` WRITE;
/*!40000 ALTER TABLE `followed_auctions` DISABLE KEYS */;
INSERT INTO `followed_auctions` VALUES ('',NULL,NULL),('16296665bbb994','6296665bbb994',1),('1629740f8370bd','629740f8370bd',1),('162978cafb4d3c','62978cafb4d3c',1),('1629db07e56e5b','629db07e56e5b',1),('2629740f8370bd','629740f8370bd',2),('36296665bbb994','6296665bbb994',3),('66296665bbb994','6296665bbb994',6),('7629db07e56e5b','629db07e56e5b',7);
/*!40000 ALTER TABLE `followed_auctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `img_profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('6296665bbb994','GIUSEPPE','10oYlFz7MOeJw','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYc_JMjic0Mjpv1ZEfDHk1CepHPWrywkgaVg&usqp=CAU','2022-06-01 10:33:59','2022-06-06 06:03:10'),('629740f8370bd','ANGELO','10icvR9M.dFrU','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNe8D1uWY65RyVGAER2EyAV3GOGcJmFCmrqVlrPP7ktQAL9T-dNwZ27IE3WIzEcSa4uX0&usqp=CAU','2022-06-01 08:35:36','2022-06-02 13:55:20'),('62978cafb4d3c','ROSA','10icvR9M.dFrU','https://cdn-icons-png.flaticon.com/512/149/149071.png','2022-06-01 13:58:39','2022-06-01 14:19:08'),('629db07e56e5b','PIPPO','10icvR9M.dFrU','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIPkdJWToEROTZeSrLmd575v5x99BnmwxLO1xip7Y1BUxvCUIy-dKci4IAxdqmN-Ye41s&usqp=CAU','2022-06-06 05:45:02','2022-06-06 05:46:58'),('629db371b2688','UTENTE','10icvR9M.dFrU',NULL,'2022-06-06 05:57:37','2022-06-06 05:59:43');
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

-- Dump completed on 2022-06-06 10:09:00
