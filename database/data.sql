-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: laravel
-- ------------------------------------------------------
-- Server version	8.3.0

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

/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('abcxyzui@gmail.com|127.0.0.1','i:1;',1722581303),('abcxyzui@gmail.com|127.0.0.1:timer','i:1722581303;',1722581303),('abcxyzui1@gmail.com|127.0.0.1','i:2;',1722425529),('abcxyzui1@gmail.com|127.0.0.1:timer','i:1722425529;',1722425529),('admin0@gmail.com|127.0.0.1','i:3;',1722580266),('admin0@gmail.com|127.0.0.1:timer','i:1722580266;',1722580266);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (35,'IPhone','iphone',NULL,'Active','1',NULL,0,'2024-06-29 23:21:01','2024-07-30 13:19:54'),(41,'Samsung','samsung',NULL,'Active','0',NULL,0,'2024-07-06 13:21:10','2024-07-30 13:20:06'),(42,'Oppo','oppo',NULL,'Active','0',NULL,0,'2024-07-07 06:23:05','2024-07-30 13:20:22');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

--
-- Table structure for table `image_products`
--

DROP TABLE IF EXISTS `image_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `image_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_products`
--

/*!40000 ALTER TABLE `image_products` DISABLE KEYS */;
INSERT INTO `image_products` VALUES (2,2,'uploads/products/0-1720521392.png',NULL,NULL),(5,5,'uploads/products/0-1721889056.jfif',NULL,NULL),(6,6,'uploads/products/0-1721985596.jfif',NULL,NULL),(7,7,'uploads/products/0-1722008290.jfif',NULL,NULL),(8,8,'uploads/products/0-1722707517.png',NULL,NULL),(9,8,'uploads/products/1-1722707517.jfif',NULL,NULL),(10,8,'uploads/products/2-1722707517.jfif',NULL,NULL),(11,8,'uploads/products/3-1722707517.jpg',NULL,NULL),(12,9,'uploads/products/0-1722708949.jfif',NULL,NULL),(13,9,'uploads/products/1-1722708949.jfif',NULL,NULL),(14,9,'uploads/products/2-1722708949.jfif',NULL,NULL),(15,10,'uploads/products/0-1722709427.jfif',NULL,NULL),(16,10,'uploads/products/1-1722709427.jfif',NULL,NULL),(17,10,'uploads/products/2-1722709427.jfif',NULL,NULL),(18,10,'uploads/products/3-1722709427.jfif',NULL,NULL),(19,11,'uploads/products/0-1722710253.jfif',NULL,NULL),(20,11,'uploads/products/1-1722710253.jfif',NULL,NULL),(21,11,'uploads/products/2-1722710253.jfif',NULL,NULL),(22,11,'uploads/products/3-1722710253.jfif',NULL,NULL),(23,12,'uploads/products/0-1722896118.jpg',NULL,NULL),(24,12,'uploads/products/1-1722896118.jpg',NULL,NULL),(25,12,'uploads/products/2-1722896118.jpg',NULL,NULL),(26,12,'uploads/products/3-1722896118.jpg',NULL,NULL),(27,13,'uploads/products/0-1722896346.jpg',NULL,NULL),(28,13,'uploads/products/1-1722896346.jpg',NULL,NULL);
/*!40000 ALTER TABLE `image_products` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'0001_01_01_000000_create_users_table',1),(6,'0001_01_01_000001_create_cache_table',1),(7,'0001_01_01_000002_create_jobs_table',1),(8,'2024_06_29_130345_create_categories_table',1),(9,'2024_06_29_131259_create_brands_table',2),(17,'2024_06_29_132015_create_products_table',3),(18,'2024_07_04_205109_create_table_image_products',4),(19,'2024_07_09_101619_create_shoppingcart_table',4),(20,'2024_07_09_210031_create_orders_table',5),(21,'2024_07_09_210107_create_order__products_table',5),(22,'2024_07_27_061826_add_role_to_user_table',6),(23,'2024_07_27_165715_add_column_payment_to_orders_table',7),(24,'2024_07_27_230212_change_total_price_to_bigint_in_orders_table',8),(25,'2024_08_02_065554_add_column_total_sold_to_products_table',9),(26,'2024_08_03_102345_update_column_content_to_products_table',10),(27,'2024_08_03_174854_update_column_des_to_products_table',11),(28,'2024_08_03_175109_update_column_des_to_products_table',12),(29,'2024_08_04_103406_add_soft_delete_to_users_table',13),(30,'2024_08_05_213951_add_column_user_id_to_products_table',14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

--
-- Table structure for table `order__products`
--

DROP TABLE IF EXISTS `order__products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order__products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order__products_order_id_foreign` (`order_id`),
  KEY `order__products_product_id_foreign` (`product_id`),
  CONSTRAINT `order__products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order__products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order__products`
--

/*!40000 ALTER TABLE `order__products` DISABLE KEYS */;
INSERT INTO `order__products` VALUES (1,46,11,1,NULL,NULL),(2,47,10,3,NULL,NULL),(3,48,11,1,NULL,NULL),(4,49,10,3,NULL,NULL),(5,50,12,1,NULL,NULL),(6,51,10,1,NULL,NULL),(7,52,7,1,NULL,NULL),(8,53,11,3,NULL,NULL);
/*!40000 ALTER TABLE `order__products` ENABLE KEYS */;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Đang xử lí',
  `phone` int NOT NULL,
  `total_price` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,2,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','success',343921332,1000000000,'2024-07-27 16:44:33','2024-08-03 00:00:57','transfer',NULL),(3,2,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','success',343921332,1000000000,'2024-07-27 23:35:14','2024-07-31 11:59:20','cash',NULL),(4,2,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','success',343921332,1000000000,'2024-07-27 23:55:00','2024-07-30 13:16:08','cash',NULL),(5,2,'Thanh','abcxyzui@gmail.com','Hoa Binh','pending',343921332,4000000000,'2024-07-28 00:11:42','2024-07-30 13:02:45','cash',NULL),(6,2,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,1000000000,'2024-07-28 00:54:30','2024-07-28 00:54:30','cash',NULL),(7,4,'Đặng Hoàng Minh','abcxyzui12@gmail.com','Vũ Thư1 2','success',343921332,2020000000,'2024-07-28 06:01:35','2024-07-30 13:05:21','cash',NULL),(8,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','success',343921332,1000000000,'2024-07-28 06:52:22','2024-07-30 13:05:39','cash',NULL),(9,4,'Minh Hoang Dang','abcxyzui12@gmail.com','Hoa Binh','success',343921332,1000000000,'2024-07-28 07:46:00','2024-07-31 12:24:00','cash',NULL),(10,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','cancel',343921332,2020000000,'2024-07-28 07:56:25','2024-07-31 12:24:03','cash',NULL),(11,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,1000000000,'2024-07-28 07:58:58','2024-07-28 07:58:58','cash',NULL),(12,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,2020000000,'2024-07-28 08:08:42','2024-07-28 08:08:42','cash',NULL),(13,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,2020000000,'2024-07-28 08:09:00','2024-07-28 08:09:00','cash',NULL),(14,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','success',343921332,2020000000,'2024-07-28 08:09:05','2024-07-30 13:16:23','cash',NULL),(15,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,2020000000,'2024-07-28 08:10:07','2024-07-28 08:10:07','cash',NULL),(16,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,2020000000,'2024-07-28 08:10:24','2024-07-28 08:10:24','cash',NULL),(17,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,2020000000,'2024-07-28 08:11:22','2024-07-28 08:11:22','cash',NULL),(18,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,2020000000,'2024-07-28 08:11:27','2024-07-28 08:11:27','cash',NULL),(19,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,2020000000,'2024-07-28 08:16:04','2024-07-28 08:16:04','cash',NULL),(20,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,2020000000,'2024-07-28 08:16:04','2024-07-28 08:16:04','cash',NULL),(21,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','success',343921332,2020000000,'2024-07-28 08:16:08','2024-07-30 13:05:41','cash',NULL),(22,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','success',343921332,2020000000,'2024-07-28 08:16:08','2024-07-30 15:22:30','cash',NULL),(23,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','success',343921332,2020000000,'2024-07-28 08:18:07','2024-07-30 13:05:43','cash',NULL),(24,4,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','success',343921332,2020000000,'2024-07-28 08:18:07','2024-07-30 15:22:23','cash',NULL),(26,2,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','pending',343921332,1000000000,'2024-08-01 16:15:15','2024-08-01 16:15:15','cash',NULL),(27,2,'Minh Hoang Dang','abcxyzui@gmail.com','Hoa Binh','success',343921332,1000000000,'2024-08-01 16:18:26','2024-08-03 00:01:27','transfer',NULL),(28,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,8000000000,'2024-08-02 23:56:15','2024-08-02 23:56:15','cash',NULL),(29,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,8000000000,'2024-08-02 23:56:15','2024-08-02 23:56:15','cash',NULL),(30,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,13000000000,'2024-08-03 04:59:55','2024-08-03 04:59:55','cash',NULL),(31,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,13000000000,'2024-08-03 04:59:55','2024-08-03 04:59:55','cash',NULL),(32,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,13000000000,'2024-08-03 04:59:55','2024-08-03 04:59:55','cash',NULL),(33,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,8000000000,'2024-08-03 05:31:41','2024-08-03 05:31:41','cash',NULL),(34,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,8000000000,'2024-08-03 05:31:41','2024-08-03 05:31:41','cash',NULL),(35,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,8000000000,'2024-08-03 05:31:41','2024-08-03 05:31:41','cash',NULL),(36,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,6000000000,'2024-08-03 05:44:42','2024-08-03 05:44:42','cash',NULL),(37,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,6000000000,'2024-08-03 05:44:42','2024-08-03 05:44:42','cash',NULL),(38,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,7000000000,'2024-08-03 05:46:01','2024-08-03 05:46:01','cash',NULL),(39,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,7000000000,'2024-08-03 05:46:01','2024-08-03 05:46:01','cash',NULL),(40,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','cancel',343921331,7000000000,'2024-08-03 05:46:01','2024-08-03 11:49:15','cash',NULL),(41,2,'Đặng Minh','abcxyzui@gmail.com','Hoa Binh','pending',343921331,150000000,'2024-08-03 11:52:44','2024-08-03 11:52:44','cash',NULL),(42,2,'iPhone 10 128GB','abcxyzui@gmail.com','Hoa Binh','pending',343921331,150000000,'2024-08-03 12:13:16','2024-08-03 12:13:16','transfer',NULL),(43,2,'IPhone 14 Pro Max','admin@gmail.com','a','success',343921331,150000000,'2024-08-03 12:14:22','2024-08-06 08:15:31','cash',NULL),(44,2,'Đặng Minh','abcxyzui@gmail.com','a','cancel',343921331,150000000,'2024-08-03 12:17:25','2024-08-06 08:14:09','cash',NULL),(45,2,'Đặng Minh','abcxyzui@gmail.com','Hòa Bình','pending',343921331,330000000,'2024-08-06 13:25:36','2024-08-06 13:25:36','transfer',NULL),(46,2,'Đặng Minh','abcxyzui@gmail.com','Hòa Bình','pending',343921331,7000000000,'2024-08-06 13:28:48','2024-08-06 13:28:48','transfer',NULL),(47,2,'Đặng Minh','abcxyzui@gmail.com','Hòa Bình','pending',343921331,330000000,'2024-08-06 13:29:17','2024-08-06 13:29:17','transfer',NULL),(48,2,'Đặng Minh','abcxyzui@gmail.com','Hòa Bình','pending',343921331,7330000000,'2024-08-06 13:31:31','2024-08-06 13:31:31','transfer',NULL),(49,2,'Đặng Minh','abcxyzui@gmail.com','Hòa Bình','pending',343921331,7330000000,'2024-08-06 13:31:31','2024-08-06 13:31:31','transfer',NULL),(50,2,'Đặng Minh','abcxyzui@gmail.com','Hòa Bình','success',343921331,1000000,'2024-08-06 13:39:43','2024-08-06 15:41:30','transfer',NULL),(51,2,'Đặng Minh','abcxyzui@gmail.com','Hòa Bình','pending',343921331,1110000000,'2024-08-06 14:29:41','2024-08-06 14:29:41','transfer',NULL),(52,2,'Đặng Minh','abcxyzui@gmail.com','Hòa Bình','pending',343921331,1110000000,'2024-08-06 14:29:41','2024-08-06 14:29:41','transfer',NULL),(53,2,'Đặng Minh','abcxyzui@gmail.com','Hòa Bình','pending',343921331,21000000000,'2024-08-06 14:37:09','2024-08-06 14:37:09','transfer',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int DEFAULT NULL,
  `sku` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `is_featured` int DEFAULT NULL,
  `is_variantion` int DEFAULT NULL COMMENT 'Biến thể',
  `price` double NOT NULL,
  `sale_price` double DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `length` double DEFAULT NULL COMMENT 'dài',
  `wide` double DEFAULT NULL COMMENT 'rộng',
  `height` double DEFAULT NULL COMMENT 'cao',
  `weight` double DEFAULT NULL COMMENT 'nặng',
  `height_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'đơn vị',
  `weight_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'đơn vị',
  `wide_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'đơn vị',
  `length_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'đơn vị',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_sold` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (5,'IP14','ip14','<p>ok</p>','<p>pok</p>','Active',NULL,NULL,NULL,3,35,NULL,NULL,1000000000,900000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-07-24 23:30:56','2024-07-24 23:30:56',18,1),(6,'IPhone 5','iphone-5','<p>1</p>','<p dir=\"ltr\">Với tiến tr&igrave;nh mới &aacute;p dụng tr&ecirc;n A17 Pro, con chip n&agrave;y sẽ gi&uacute;p iPhone 15 Pro Max cải thiện hiệu suất GPU l&ecirc;n đến 20% b&ecirc;n cạnh việc c&ocirc;ng nghệ d&ograve; tia dựa tr&ecirc;n phần mềm nhanh hơn 4 lần so với con chip tiền nhiệm. Khi hiệu suất v&agrave; mức ti&ecirc;u thụ năng lượng được cải thiện, tuổi thọ vi&ecirc;n pin của&nbsp; iPhone 15 Pro Max được đ&aacute;nh gi&aacute; l&agrave; sẽ bền bỉ hơn so với d&ograve;ng sản phẩm cũ.</p>\r\n<h3 dir=\"ltr\">Thời lượng pin Pro</h3>\r\n<p dir=\"ltr\">D&ugrave; được trang bị rất nhiều t&iacute;nh năng mới ti&ecirc;n tiến để phục vụ nhu cầu sử dụng cao của người d&ugrave;ng, iPhone 15 Pro vẫn mang đến cho ch&uacute;ng ta thời lượng pin d&ugrave;ng thoải m&aacute;i cả ng&agrave;y d&agrave;i đầy ấn tượng. Dung lượng pin tr&ecirc;n iPhone 15 Pro Max cho bạn thời gian xem video li&ecirc;n tục l&ecirc;n đến 29 giờ, d&agrave;i hơn 9 giờ so với dung lượng pin tr&ecirc;n iPhone 12 Pro Max. B&ecirc;n cạnh đ&oacute;, m&aacute;y được hỗ trợ USB 3.0 đem đến cho người d&ugrave;ng trải nghiệm truyền v&agrave; xử l&yacute; dữ liệu tốc độ nhanh gấp 20 lần.</p>\r\n<p dir=\"ltr\"><img src=\"https://cdn.hoanghamobile.com/i/content/Uploads/2023/12/14/iphone-15-pro-max-natural-titanium-6-hhm.jpg\"></p>\r\n<h2 dir=\"ltr\">Gi&aacute; dự kiến của iPhone 15 Pro Max</h2>\r\n<p dir=\"ltr\">Gi&aacute; b&aacute;n khởi điểm của iPhone 15 Pro Max khởi điểm điểm từ khoảng 33 triệu VNĐ. Gi&aacute; b&aacute;n sản phẩm d&agrave;nh cho người d&ugrave;ng Việt thay đổi t&ugrave;y thuộc v&agrave;o phi&ecirc;n bản bộ nhớ cũng như thời gian cập bến thị trường Việt Nam. Theo th&ocirc;ng tin mở b&aacute;n mới nhất tr&ecirc;n trang web ch&iacute;nh thức của Apple, mức gi&aacute; cho mỗi phi&ecirc;n bản iPhone 15 Pro Max hiện tại lần lượt như sau:</p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">&nbsp;iPhone 15 Pro Max 256GB: Khoảng 33 triệu VNĐ</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">iPhone 15 Pro Max 512GB: Khoảng 39 triệu VNĐ</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">iPhone 15 Pro Max 1TB: Khoảng 45 triệu VNĐ</p>\r\n</li>\r\n</ul>','Active',NULL,NULL,NULL,5,42,NULL,NULL,1000000000,900000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-07-26 02:19:56','2024-08-03 03:28:16',19,1),(7,'IP 9','ip-9','<p>hừm</p>','<p>oke</p>','Active',NULL,NULL,NULL,5,35,NULL,NULL,1000000000,1900000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-07-26 08:38:10','2024-08-03 11:26:13',200,1),(8,'IPhone 14 Pro Max','iphone-14-pro-max','<div class=\"headline-wrapper\">&nbsp;</div>\r\n<ul class=\"techspecs-list\" role=\"list\">\r\n<li role=\"listitem\">M&agrave;n h&igrave;nh HDR</li>\r\n<li role=\"listitem\">True&nbsp;Tone</li>\r\n<li role=\"listitem\">Dải m&agrave;u rộng (P3)</li>\r\n<li role=\"listitem\">Haptic Touch</li>\r\n<li role=\"listitem\">Tỷ lệ tương phản 2.000.000:1 (ti&ecirc;u chuẩn)</li>\r\n<li role=\"listitem\">Độ s&aacute;ng tối đa 800&nbsp;nit (ti&ecirc;u chuẩn); độ s&aacute;ng đỉnh 1200&nbsp;nit&nbsp;(HDR)</li>\r\n<li role=\"listitem\">Lớp phủ kh&aacute;ng dầu chống in dấu v&acirc;n tay</li>\r\n<li role=\"listitem\">Hỗ trợ hiển thị đồng thời nhiều ng&ocirc;n ngữ v&agrave; k&yacute; tự</li>\r\n</ul>','<p>So với phi&ecirc;n bản tiền nhiệm, iPhone 14 Series vẫn c&oacute; 4 phi&ecirc;n bản. Tuy nhi&ecirc;n, điểm kh&aacute;c biệt đ&oacute; l&agrave; Apple đ&atilde; loại bỏ phi&ecirc;n bản iPhone Mini, thay v&agrave;o đ&oacute;, l&agrave; cho ra mắt d&ograve;ng&nbsp;&nbsp;<strong><a class=\"rank-math-link\" href=\"https://viettelstore.vn/dien-thoai/iphone-14-plus-pid293836.html\" target=\"_blank\" rel=\"noreferrer noopener\" aria-label=\"iPhone 14 Plus (opens in a new tab)\">iPhone 14 Plus</a></strong>. Việc thay đổi n&agrave;y đ&atilde; khiến cho nhiều người d&ugrave;ng v&ocirc; c&ugrave;ng bất ngờ v&igrave; n&oacute; ho&agrave;n to&agrave;n tr&aacute;i ngược với những dự đo&aacute;n trước đ&oacute; từ c&aacute;c chuy&ecirc;n gia.&nbsp;</p>\r\n<div class=\"wp-block-image\">\r\n<figure class=\"aligncenter size-large\"><img class=\"wp-image-201104\" src=\"https://news.khangz.com/wp-content/uploads/2024/04/iphone-dang-mua-nhat-3.jpg\" sizes=\"(max-width: 600px) 100vw, 600px\" srcset=\"https://news.khangz.com/wp-content/uploads/2024/04/iphone-dang-mua-nhat-3.jpg 600w, https://news.khangz.com/wp-content/uploads/2024/04/iphone-dang-mua-nhat-3-300x169.jpg 300w\" alt=\"\">\r\n<figcaption><em>&nbsp;iPhone 14 Series</em></figcaption>\r\n</figure>\r\n</div>\r\n<p>C&oacute; thể n&oacute;i, sự xuất hiện của d&ograve;ng iPhone 14 Series đ&atilde; khiến cho người y&ecirc;u th&iacute;ch iPhone&nbsp; kh&ocirc;ng khỏi bất ngờ về độ cải tiến hơn cả những g&igrave; mong đợi. So với c&aacute;c phi&ecirc;n bản trước đ&oacute;, 4 phi&ecirc;n bản của iPhone 14 lần n&agrave;y đ&atilde; c&oacute; nhiều sự thay đổi đ&aacute;ng kể về ngoại h&igrave;nh cũng như cấu h&igrave;nh b&ecirc;n trong. Rất n&ecirc;n sở hữu trong số những d&ograve;ng điện thoại<strong>&nbsp;iPhone đ&aacute;ng mua nhất</strong> hiện nay.</p>','Active',NULL,NULL,NULL,20,35,NULL,NULL,140000000,90000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-03 10:51:57','2024-08-03 11:38:12',NULL,1),(9,'iPhone 15 128GB','iphone-15-128gb','<ul>\r\n<li>Thiết kế thời thượng v&agrave; bền bỉ - Mặt lưng k&iacute;nh được pha m&agrave;u xu hướng c&ugrave;ng khung viền nh&ocirc;m bền bỉ</li>\r\n<li>Dynamic Island hiển thị linh động mọi th&ocirc;ng b&aacute;o ngay lập tức gi&uacute;p bạn nắm bắt mọi th&ocirc;ng tin</li>\r\n<li>Chụp ảnh đẹp nức l&ograve;ng - Camera ch&iacute;nh 48MP, Độ ph&acirc;n giải l&ecirc;n đến 4x v&agrave; Tele 2x chụp ch&acirc;n dung ho&agrave;n hảo</li>\r\n<li>Pin d&ugrave;ng cả ng&agrave;y kh&ocirc;ng lắng lo - Thời gian xem video l&ecirc;n đến 20 giờ v&agrave; sạc nhanh qua cổng USB-C tiện lợi</li>\r\n<li>Cải tiến hiệu năng vượt bậc - A16 Bionic mạnh mẽ gi&uacute;p bạn c&acirc;n mọi t&aacute;c vụ d&ugrave; c&oacute; y&ecirc;u cầu đồ hoạ cao</li>\r\n</ul>','<blockquote>\r\n<p><strong>iPhone 15 128GB</strong>&nbsp;được trang bị&nbsp;<strong>m&agrave;n h&igrave;nh Dynamic Island k&iacute;ch thước 6.1 inch</strong>&nbsp;với c&ocirc;ng nghệ hiển thị&nbsp;<strong>Super Retina XDR</strong>&nbsp;m&agrave;n lại trải nghiệm h&igrave;nh ảnh vượt trội. Điện thoại với mặt lưng k&iacute;nh nh&aacute;m chống b&aacute;m mồ h&ocirc;i c&ugrave;ng&nbsp;<strong>5 phi&ecirc;n bản m&agrave;u sắc</strong>&nbsp;lựa chọn:&nbsp;<strong>Hồng, V&agrave;ng, Xanh l&aacute;, Xanh dương v&agrave; đen</strong>. Camera tr&ecirc;n&nbsp;<a title=\"iPhone 15 series\" href=\"https://cellphones.com.vn/mobile/apple/iphone-15.html\" target=\"_blank\" rel=\"noopener\"><strong>iPhone 15 series</strong></a>&nbsp;cũng được n&acirc;ng cấp l&ecirc;n&nbsp;<strong>cảm biến 48MP</strong>&nbsp;c&ugrave;ng t&iacute;nh năng chụp<strong>&nbsp;zoom quang học tới 2x</strong>. C&ugrave;ng với thiết kế cổng sạc thay đổi từ lightning sang USB-C v&ocirc; c&ugrave;ng ấn tượng.</p>\r\n</blockquote>\r\n<p><img src=\"https://cdn2.cellphones.com.vn/insecure/rs:fill:0:0/q:90/plain/https://cellphones.com.vn/media/wysiwyg/Phone/Apple/iphone_15/apple-iphone-15-12.JPG\" alt=\"iPhone 15\" loading=\"lazy\"></p>\r\n<p>(Ảnh: Apple.com)</p>\r\n<h2><strong>Tại sao n&ecirc;n mua điện thoại iPhone 15 tại CellphoneS</strong></h2>\r\n<p>L&agrave; một trong những hệ thống b&aacute;n lẻ lớn nhất tại Việt Nam do đ&oacute; c&oacute; nhiều l&yacute; do để kh&aacute;ch h&agrave;ng chọn mua&nbsp;<strong>điện thoại iPhone 15</strong>&nbsp;mới nhất tại hệ thống như:</p>\r\n<ul>\r\n<li>\r\n<p><strong>Sản phẩm ch&iacute;nh h&atilde;ng với chất lượng được đảm bảo</strong>:&nbsp;CellphoneS l&agrave; một trong số &iacute;t những chuỗi b&aacute;n lẻ ch&iacute;nh h&atilde;ng Apple tại Việt Nam sở hữu chuỗi trung t&acirc;m bảo h&agrave;nh ch&iacute;nh h&atilde;ng uỷ quyền Apple - CARES.vn. Nhờ đ&oacute;, khi kh&aacute;ch h&agrave;ng mua h&agrave;ng tại CellphoneS c&oacute; thể&nbsp; ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m với ch&iacute;nh s&aacute;ch bảo h&agrave;nh đổi mới 30 ng&agrave;y đầu khi c&oacute; lỗi từ nh&agrave; sản xuất, bảo h&agrave;nh 12 th&aacute;ng tiện lợi, nhanh ch&oacute;ng tại c&aacute;c trung t&acirc;m bảo h&agrave;nh CARES.vn.</p>\r\n</li>\r\n<li>\r\n<p><strong>Thu cũ l&ecirc;n đời &ndash; trợ gi&aacute; cao</strong>: CellphoneS c&oacute; chương tr&igrave;nh thiết bị cũ với định gi&aacute; cao đồng thời trợ gi&aacute; hấp dẫn khi kh&aacute;ch h&agrave;ng l&ecirc;n đời iPhone 15 mới. Nhờ đ&oacute; kh&aacute;ch h&agrave;ng mua iP15 qua chương tr&igrave;nh thu cũ &ndash; l&ecirc;n đời c&oacute; thể sở hữu được si&ecirc;u phẩm iPhone mới nhất với mức chi ph&iacute; tiết kiệm nhất.</p>\r\n</li>\r\n<li>\r\n<p><strong>Trả g&oacute;p 0% c&ugrave;ng trả trước thấp</strong>: Khi mua điện thoại qua chương tr&igrave;nh trả g&oacute;p tại CellphoneS, kh&aacute;ch h&agrave;ng c&oacute; thể mua iP15 với mức l&atilde;i suất 0% - kh&ocirc;ng trả dước c&ugrave;ng với đ&oacute; l&agrave; kh&ocirc;ng ph&aacute;t sinh ph&iacute; phụ thu. Đặc biệt, ở một số phương thức thanh to&aacute;n, kh&aacute;ch h&agrave;ng c&ograve;n c&oacute; thể mua trả g&oacute;p tr&ecirc;n gi&aacute; b&aacute;n v&ocirc; c&ugrave;ng ấn tượng.</p>\r\n</li>\r\n<li>\r\n<p><strong>Giảm gi&aacute; s&acirc;u cho phụ kiện mua k&egrave;m ch&iacute;nh h&atilde;ng</strong>: Khi mua điện thoại iPhone k&egrave;m c&aacute;c phụ kiện ch&iacute;nh h&atilde;ng như bao da, ốp lưng, củ - c&aacute;p sạc th&igrave; kh&aacute;ch h&agrave;ng sẽ được mua phụ kiện ch&iacute;nh h&atilde;ng với mức gi&aacute; ưu đ&atilde;i.</p>\r\n</li>\r\n<li>\r\n<p><strong>Hệ thống cửa h&agrave;ng to&agrave;n quốc</strong>: Với hệ thống cửa h&agrave;ng ph&acirc;n bố rộng khắp, qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể dễ d&agrave;ng đến v&agrave; trải nghiệm trực tiếp sản phẩm tại cửa h&agrave;ng hoặc mua h&agrave;ng online - giao h&agrave;ng nhanh ch&oacute;ng (Giao h&agrave;ng 2 giờ với đơn h&agrave;ng nội th&agrave;nh H&agrave; Nội v&agrave; Hồ Ch&iacute; Minh).</p>\r\n</li>\r\n</ul>','Active',NULL,NULL,NULL,10,35,NULL,NULL,150000000,140000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-03 11:15:49','2024-08-03 11:38:04',NULL,1),(10,'iPhone 10 128GB','iphone-10-128gb','<ul class=\"parameter__list 114115 active\">\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">M&agrave;n h&igrave;nh:</p>\r\n<div class=\"liright\"><span class=\"comma\">OLED</span><span class=\"comma\">5.8\"</span><span class=\"\">Super Retina</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Hệ điều h&agrave;nh:</p>\r\n<div class=\"liright\"><span class=\"\">iOS 12</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Camera sau:</p>\r\n<div class=\"liright\"><span class=\"\">2 camera 12 MP</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Camera trước:</p>\r\n<div class=\"liright\"><span class=\"\">7 MP</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Chip:</p>\r\n<div class=\"liright\"><span class=\"\">Apple A11 Bionic</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">RAM:</p>\r\n<div class=\"liright\"><span class=\"\">3 GB</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Dung lượng lưu trữ:</p>\r\n<div class=\"liright\"><span class=\"\">64 GB</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">SIM:</p>\r\n<div class=\"liright\"><span class=\"comma\">1 Nano SIM</span><span class=\"\">Hỗ trợ 4G</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Pin, Sạc:</p>\r\n<div class=\"liright\"><span class=\"comma\">2716 mAh</span><span class=\"\">15 W</span></div>\r\n</li>\r\n</ul>','<h3><a title=\"Chi tiết điện thoại iPhone X 64GB\" href=\"https://www.thegioididong.com/dtdd/iphone-x-64gb\" target=\"_blank\" rel=\"noopener\" type=\"Chi tiết điện thoại iPhone X 64GB\">iPhone X 64 GB</a>&nbsp;l&agrave; cụm từ được&nbsp;rất nhiều người mong chờ muốn biết v&agrave; t&igrave;m kiếm tr&ecirc;n Google bởi đ&acirc;y l&agrave; chiếc điện thoại m&agrave; Apple kỉ niệm 10 năm&nbsp;<a title=\"Tham khảo c&aacute;c d&ograve;ng điện thoại Apple iPhone tại Thegioididong.com\" href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\" rel=\"noopener\" type=\"Tham khảo c&aacute;c d&ograve;ng điện thoại Apple iPhone tại Thegioididong.com\">iPhone</a>&nbsp;đầu ti&ecirc;n được b&aacute;n ra.</h3>\r\n<h3>Thiết kế mang t&iacute;nh đột ph&aacute;</h3>\r\n<p>Như c&aacute;c bạn cũng đ&atilde; biết th&igrave; đ&atilde; 4 năm kể từ chiếc&nbsp;<a title=\"Tham khảo c&aacute;c d&ograve;ng điện thoại tại Thegioididong.com\" href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" rel=\"noopener\" type=\"Tham khảo c&aacute;c d&ograve;ng điện thoại tại Thegioididong.com\">điện thoại</a>&nbsp;iPhone 6 v&agrave; iPhone 6 Plus th&igrave; Apple&nbsp;vẫn chưa c&oacute; thay đổi n&agrave;o đ&aacute;ng kể trong thiết kế của m&igrave;nh.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb1.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Thiết kế đột ph&aacute; của điện thoại iPhone X\" src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb1.jpg\" alt=\"Thiết kế đột ph&aacute; của điện thoại iPhone X\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb1.jpg\"></a></p>\r\n<p>Nhưng với iPhone X th&igrave; đ&oacute; lại l&agrave; 1 c&acirc;u chuyện ho&agrave;n to&agrave;n kh&aacute;c, m&aacute;y chuyển qua sử dụng m&agrave;n h&igrave;nh tỉ lệ 19.5:9 mới mẻ với phần diện t&iacute;ch hiển thị mặt trước cực lớn.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb2.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Thiết kế đột ph&aacute; của điện thoại iPhone X\" src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb2.jpg\" alt=\"Thiết kế đột ph&aacute; của điện thoại iPhone X\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb2.jpg\"></a></p>\r\n<p>Mặt lưng k&iacute;nh hỗ trợ sạc nhanh kh&ocirc;ng d&acirc;y cũng như phần camera k&eacute;p đặt dọc cũng l&agrave; những thứ đầu ti&ecirc;n xuất hiện tr&ecirc;n 1 chiếc iPhone.</p>\r\n<h3>M&agrave;n h&igrave;nh với tai thỏ</h3>\r\n<p>Điểm khiến iPhone X bị ch&ecirc; nhiều nhất đ&oacute; ch&iacute;nh l&agrave; phần \"tai thỏ\" ph&iacute;a tr&ecirc;n m&agrave;n h&igrave;nh, Apple đ&atilde; chấp nhận điều n&agrave;y để đặt cụm camera&nbsp;TrueDepth mới của h&atilde;ng.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb15.jpg\"><img class=\" lazyloaded\" title=\"M&agrave;n h&igrave;nh tai thỏ của điện thoại iPhone X\" src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb15.jpg\" alt=\"M&agrave;n h&igrave;nh tai thỏ của điện thoại iPhone X\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb15.jpg\"></a></p>\r\n<p>M&agrave;n h&igrave;nh k&iacute;ch thước 5.8 inch độ ph&acirc;n giải&nbsp;1125 x 2436 pixels đem đến khả năng hiển thị xuất sắc.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb20.jpg\"><img class=\" lazyloaded\" title=\"M&agrave;n h&igrave;nh tai thỏ của điện thoại iPhone X\" src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb20.jpg\" alt=\"M&agrave;n h&igrave;nh tai thỏ của điện thoại iPhone X\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb20.jpg\"></a></p>\r\n<p>iPhone X sử dụng tấm nền&nbsp;<a title=\"T&igrave;m hiểu m&agrave;n h&igrave;nh OLED\" href=\"https://www.thegioididong.com/hoi-dap/man-hinh-oled-la-gi-905762\" target=\"_blank\" rel=\"noopener\" type=\"T&igrave;m hiểu m&agrave;n h&igrave;nh OLED\">OLED</a>&nbsp;(được tinh chỉnh bởi Apple) thay v&igrave; LCD như những chiếc&nbsp;<a title=\"Tham khảo một số mẫu điện thoại đang kinh doanh tại Topzone\" href=\"https://www.topzone.vn/iphone\" target=\"_blank\" rel=\"noopener\">điện thoại&nbsp;iPhone</a>&nbsp;trước đ&acirc;y v&agrave; điều n&agrave;y đem lại cho m&aacute;y 1 m&agrave;u đen thể hiện rất s&acirc;u c&ugrave;ng khả năng t&aacute;i tạo m&agrave;u sắc kh&ocirc;ng k&eacute;m phần ch&iacute;nh x&aacute;c.</p>\r\n<p>Xem th&ecirc;m:&nbsp;<a title=\"Trải nghiệm giao diện iPhone X\" href=\"https://www.thegioididong.com/tin-tuc/trai-nghiem-giao-dien-iphone-x-1041322\" target=\"_blank\" rel=\"noopener\" type=\"Trải nghiệm giao diện iPhone X\">Trải nghiệm giao diện iPhone X: Xem phim, chơi game c&oacute; sướng?</a></p>\r\n<h3>Face ID tạo n&ecirc;n đột ph&aacute;</h3>\r\n<p>Touch ID tr&ecirc;n iPhone X đ&atilde; bị loại bỏ, thay v&agrave;o đ&oacute; l&agrave; bạn sẽ chuyển qua sử dụng Face ID, một phương thức bảo mật sinh trắc học mới của Apple.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb7.jpg\"><img class=\" lazyloaded\" title=\"Face ID tạo n&ecirc;n đột ph&aacute; tr&ecirc;n điện thoại iPhone X\" src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb7.jpg\" alt=\"Face ID tạo n&ecirc;n đột ph&aacute; tr&ecirc;n điện thoại iPhone X\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb7.jpg\"></a></p>\r\n<p>Với sự trợ gi&uacute;p của cụm&nbsp;camera&nbsp;TrueDept th&igrave; iPhone X c&oacute; khả năng nhận diện khu&ocirc;n mặt 3D của người d&ugrave;ng từ đ&oacute; mở kh&oacute;a chiếc iPhone một c&aacute;ch nhanh ch&oacute;ng.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb11.jpg\"><img class=\" lazyloaded\" title=\"Face ID tạo n&ecirc;n đột ph&aacute; tr&ecirc;n điện thoại iPhone X\" src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb11.jpg\" alt=\"Face ID tạo n&ecirc;n đột ph&aacute; tr&ecirc;n điện thoại iPhone X\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb11.jpg\"></a></p>\r\n<p>Tuy sẽ hơi hụt hẫng khi Touch ID đ&atilde; qu&aacute; quen thuộc tr&ecirc;n những chiếc iPhone như tốc độ cũng như trải nghiệm \"kh&oacute;a như kh&ocirc;ng kh&oacute;a\" của Face ID ho&agrave;n to&agrave;n c&oacute; thể khiến bạn y&ecirc;n t&acirc;m sử dụng.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb10.jpg\"><img class=\" lazyloaded\" title=\"Điện thoại iPhone X t&iacute;ch hợp Face ID\" src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb10.jpg\" alt=\"Điện thoại iPhone X t&iacute;ch hợp Face ID\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb10.jpg\"></a></p>\r\n<h3>Thao t&aacute;c vuốt v&agrave; vuốt</h3>\r\n<p>Kh&ocirc;ng c&ograve;n ph&iacute;m Home cứng n&ecirc;n c&aacute;c thao t&aacute;c tr&ecirc;n iPhone X cũng ho&agrave;n to&agrave;n kh&aacute;c so với những đ&agrave;n anh đi trước.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb3.jpg\"><img class=\" lazyloaded\" title=\"Thao t&aacute;c vuốt v&agrave; vuốt tr&ecirc;n điện thoại iPhone X\" src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb3.jpg\" alt=\"Thao t&aacute;c vuốt v&agrave; vuốt tr&ecirc;n điện thoại iPhone X\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb3.jpg\"></a></p>\r\n<p>Giờ đ&acirc;y chỉ với thao t&aacute;c vuốt v&agrave; vuốt từ cạnh dưới l&agrave; bạn đ&atilde; c&oacute; thể truy cập v&agrave;o đa nhiệm, trở về m&agrave;n h&igrave;nh Home một c&aacute;ch nhanh ch&oacute;ng.</p>\r\n<h3>Camera k&eacute;p cải tiến t&iacute;ch hợp Animoji</h3>\r\n<p>iPhone X vẫn sở hữu bộ đ&ocirc;i camera k&eacute;p c&oacute; c&ugrave;ng độ ph&acirc;n giải 12 MP nhưng camera tele thứ 2 với khẩu độ được n&acirc;ng l&ecirc;n mức f/2.4 so với f/2.8 của iPhone 7 Plus.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb-12-5.jpg\"><img class=\" lazyloaded\" title=\"Điện thoại iPhone X t&iacute;ch hợp camera k&eacute;p\" src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb-12-5.jpg\" alt=\"Điện thoại iPhone X t&iacute;ch hợp camera k&eacute;p\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/114115/iphone-x-64gb-12-5.jpg\"></a></p>\r\n<p>Ngo&agrave;i ra th&igrave; cả 2 camera tr&ecirc;n iPhone X đều sở hữu cho m&igrave;nh khả năng chống rung quang học gi&uacute;p bạn dễ d&agrave;ng bắt trọn mọi khoảnh khắc trong cuộc sống.</p>','Active',NULL,NULL,NULL,10,35,NULL,NULL,110000000,10000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-03 11:23:47','2024-08-03 11:38:30',NULL,3),(11,'iPhone 8 128GB','iphone-8-128gb','<ul class=\"parameter__list 114113 active\">\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">M&agrave;n h&igrave;nh:</p>\r\n<div class=\"liright\"><span class=\"comma\">LED-backlit IPS LCD</span><span class=\"comma\">4.7\"</span><span class=\"\">Retina HD</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Hệ điều h&agrave;nh:</p>\r\n<div class=\"liright\"><span class=\"\">iOS 14</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Camera sau:</p>\r\n<div class=\"liright\"><span class=\"\">12 MP</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Camera trước:</p>\r\n<div class=\"liright\"><span class=\"\">7 MP</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Chip:</p>\r\n<div class=\"liright\"><span class=\"\">Apple A11 Bionic</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">RAM:</p>\r\n<div class=\"liright\"><span class=\"\">2 GB</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Dung lượng lưu trữ:</p>\r\n<div class=\"liright\"><span class=\"\">64 GB</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">SIM:</p>\r\n<div class=\"liright\"><span class=\"\">1 Nano SIM</span></div>\r\n</li>\r\n<li data-index=\"0\" data-prop=\"0\">\r\n<p class=\"lileft\">Pin, Sạc:</p>\r\n<div class=\"liright\"><span class=\"\">1821 mAh</span></div>\r\n</li>\r\n</ul>','<h3><a title=\"Chi tiết điện thoại iPhone 8 64GB\" href=\"https://www.thegioididong.com/dtdd/iphone-8-64gb\" target=\"_blank\" rel=\"noopener\" type=\"Chi tiết điện thoại iPhone 8 64GB\">iPhone 8 64GB</a>&nbsp;nổi bật với điểm nhấn mặt lưng k&iacute;nh v&agrave; mặt trước giữ nguy&ecirc;n thiết kế như&nbsp;<a title=\"Chi tiết điện thoại iPhone 7\" href=\"https://www.thegioididong.com/dtdd/iphone-7\" target=\"_blank\" rel=\"noopener\" type=\"Chi tiết điện thoại iPhone 7\">iPhone 7</a>, c&ugrave;ng với đ&oacute; l&agrave; h&agrave;ng loạt c&ocirc;ng nghệ đ&aacute;ng mong đợi như sạc nhanh, kh&ocirc;ng d&acirc;y hay hỗ trợ thực tế ảo AR.</h3>\r\n<h3>Thay đổi phong c&aacute;ch thiết kế</h3>\r\n<p><a title=\"Tham khảo c&aacute;c d&ograve;ng điện thoại tại Thegioididong.com\" href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" rel=\"noopener\" type=\"Tham khảo c&aacute;c d&ograve;ng điện thoại tại Thegioididong.com\">Điện thoại</a>&nbsp;iPhone 8 kết hợp giữa những đường n&eacute;t đ&atilde; l&agrave;m n&ecirc;n chuẩn mực, thương hiệu với sự thời thượng v&agrave; hiện đại của mặt lưng phủ k&iacute;nh cường lực thay v&igrave; nguy&ecirc;n khối kim loại. Điểm thiết kế n&agrave;y mang lại độ b&oacute;ng bẩy, đẹp mắt hơn cho sản phẩm.</p>\r\n<h2><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122094_800x450.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Thiết kế điện thoại iPhone 8\" src=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122094_800x450.jpg\" alt=\"Thiết kế điện thoại iPhone 8\" data-src=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122094_800x450.jpg\"></a></h2>\r\n<p>Mặt lưng k&iacute;nh gi&uacute;p iPhone 8 được t&iacute;ch hợp c&ocirc;ng nghệ sạc kh&ocirc;ng d&acirc;y hiện đại m&agrave; người d&ugrave;ng mong đợi từ l&acirc;u. Ngo&agrave;i ra c&ograve;n l&agrave; lần đầu ti&ecirc;n Apple trang bị c&ocirc;ng nghệ sạc pin nhanh cho&nbsp;<a title=\"Tham khảo c&aacute;c d&ograve;ng iPhone tại Thegioididong.com\" href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\" rel=\"noopener\" type=\"Tham khảo c&aacute;c d&ograve;ng iPhone tại Thegioididong.com\">iPhone</a>.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122088_800x451.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Điện thoại iPhone 8 hỗ trợ sạc kh&ocirc;ng d&acirc;y\" src=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122088_800x451.jpg\" alt=\"Điện thoại iPhone 8 hỗ trợ sạc kh&ocirc;ng d&acirc;y\" data-src=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122088_800x451.jpg\"></a></p>\r\n<p>Phong c&aacute;ch mới cũng đồng thời loại bỏ ho&agrave;n to&agrave;n những chi tiết thừa như phần anten tr&ecirc;n mặt lưng để đưa thiết kế iPhone 8 đến độ ho&agrave;n hảo.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122102_800x450.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Thiết kế điện thoại iPhone 8\" src=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122102_800x450.jpg\" alt=\"Thiết kế điện thoại iPhone 8\" data-src=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122102_800x450.jpg\"></a></p>\r\n<h3>M&agrave;n h&igrave;nh Retina chất lượng</h3>\r\n<p>Mặt trước iPhone 8 vẫn sở hữu m&agrave;n h&igrave;nh 4.7 inch độ ph&acirc;n giải Retina HD nhưng được Apple n&acirc;ng cấp v&agrave; gọi bằng c&aacute;i t&ecirc;n Retina HD True Tone với khả năng hiển thị m&agrave;u ch&iacute;nh x&aacute;c hơn. Ph&iacute;m home cảm ứng lực 3D Touch t&iacute;ch hợp với cả cảm biến v&acirc;n tay.&nbsp;</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122098_800x451.jpg\"><img class=\" lazyloaded\" title=\"M&agrave;n h&igrave;nh điện thoại iPhone 8\" src=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122098_800x451.jpg\" alt=\"M&agrave;n h&igrave;nh điện thoại iPhone 8\" data-src=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122098_800x451.jpg\"></a></p>\r\n<h3>N&acirc;ng cấp camera</h3>\r\n<p>Camera ch&iacute;nh c&oacute; độ ph&acirc;n giải 12 MP, khẩu độ F/1.8 c&ugrave;ng rất nhiều cải tiến về h&igrave;nh ảnh, độ sắc n&eacute;t, tốc độ hay khả năng chụp thiếu s&aacute;ng. Ngo&agrave;i ra c&ograve;n n&acirc;ng cấp một v&agrave;i điểm như hỗ trợ quay video 4K @60fps, v&agrave; n&acirc;ng tiếp video 240fps l&ecirc;n độ ph&acirc;n giải 1080p.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122104_800x451.jpg\"><img class=\" lazyloaded\" title=\"Cụm camera sau điện thoại iPhone 8\" src=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122104_800x451.jpg\" alt=\"Cụm camera sau điện thoại iPhone 8\" data-src=\"https://cdn.tgdd.vn/Files/2017/09/13/1021096/p9122104_800x451.jpg\"></a></p>\r\n<p>Camera trước vẫn c&oacute; độ ph&acirc;n giải 7 MP c&ugrave;ng khẩu độ F/2.2 cho h&igrave;nh ảnh ch&acirc;n thực, sắc n&eacute;t m&agrave; kh&ocirc;ng hề qu&aacute; ảo diệu.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/114112/iphone-8-256gb-h5-1.jpg\"><img class=\" lazyloaded\" title=\"Chụp h&igrave;nh tr&ecirc;n điện thoại iPhone 8\" src=\"https://cdn.tgdd.vn/Products/Images/42/114112/iphone-8-256gb-h5-1.jpg\" alt=\"Chụp h&igrave;nh tr&ecirc;n điện thoại iPhone 8\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/114112/iphone-8-256gb-h5-1.jpg\"></a></p>\r\n<h3>Cấu h&igrave;nh mạnh mẽ nhất</h3>\r\n<p>Điểm qua cấu h&igrave;nh,&nbsp;<a title=\"Tham khảo một số mẫu điện thoại đang kinh doanh tại Topzone\" href=\"https://www.topzone.vn/iphone\" target=\"_blank\" rel=\"noopener\">điện thoại iPhone</a>&nbsp;sẽ sử dụng con chip 6 nh&acirc;n A11 Bionic tương tự như tr&ecirc;n&nbsp;<a title=\"iPhone X\" href=\"https://www.thegioididong.com/dtdd/iphone-x-64gb\" target=\"_blank\" rel=\"noopener\" type=\"iPhone X\">iPhone X</a>, chip c&oacute; sức mạnh cao cấp nhất t&iacute;nh đến thời điểm ra mắt iPhone 8, c&ugrave;ng 2 GB RAM.</p>','Active',NULL,NULL,NULL,65,35,NULL,NULL,7000000000,65000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-03 11:37:33','2024-08-03 11:38:39',NULL,2),(12,'OPPO A18','oppo-a18','<h2><strong>Oppo A18 c&oacute; chống nước kh&ocirc;ng?</strong></h2>\r\n<p>Oppo A18 đ&aacute;ng tin cậy với khả năng chống bụi v&agrave; nước đ&aacute;ng kinh ngạc. Thiết bị n&agrave;y được thiết kế với ti&ecirc;u chuẩn chống nước IPX4, gi&uacute;p bảo vệ thiết bị khỏi c&aacute;c tia nước bắn. Như vậy, bạn c&oacute; thể sử dụng trong qu&aacute; tr&igrave;nh luyện tập thể thao m&agrave; kh&ocirc;ng c&ograve;n qu&aacute; lo lắng. Đồng thời, với khả năng chống bụi IP5X, Oppo A18 ngăn chặn một phần bụi v&agrave; tạp chất từ việc x&acirc;m nhập v&agrave;o b&ecirc;n trong thiết bị.</p>','<h2><strong>Oppo A18 c&oacute; chống nước kh&ocirc;ng?</strong></h2>\r\n<p>Oppo A18 đ&aacute;ng tin cậy với khả năng chống bụi v&agrave; nước đ&aacute;ng kinh ngạc. Thiết bị n&agrave;y được thiết kế với ti&ecirc;u chuẩn chống nước IPX4, gi&uacute;p bảo vệ thiết bị khỏi c&aacute;c tia nước bắn. Như vậy, bạn c&oacute; thể sử dụng trong qu&aacute; tr&igrave;nh luyện tập thể thao m&agrave; kh&ocirc;ng c&ograve;n qu&aacute; lo lắng. Đồng thời, với khả năng chống bụi IP5X, Oppo A18 ngăn chặn một phần bụi v&agrave; tạp chất từ việc x&acirc;m nhập v&agrave;o b&ecirc;n trong thiết bị.</p>','Active',NULL,NULL,NULL,98,42,NULL,NULL,1000000,100000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-05 15:15:18','2024-08-05 15:15:18',NULL,2),(13,'Điện thoại OPPO A58 6GB/128GB','dien-thoai-oppo-a58-6gb128gb','<ul class=\"policy__list\">\r\n<li>\r\n<p>1 đổi 1 trong&nbsp;<strong>30 ng&agrave;y</strong>&nbsp;đối với sản phẩm lỗi tại 2975 si&ecirc;u thị to&agrave;n quốc&nbsp;<a title=\"Ch&iacute;nh s&aacute;ch đổi trả\" href=\"https://www.thegioididong.com/chinh-sach-bao-hanh-san-pham\" target=\"_blank\" rel=\"noopener\">Xem chi tiết</a></p>\r\n</li>\r\n<li data-field=\"IsSameBHAndDT\">\r\n<div class=\"iconl\">&nbsp;</div>\r\n<p>Bảo h&agrave;nh&nbsp;<strong>ch&iacute;nh h&atilde;ng điện thoại 1 năm</strong>&nbsp;tại c&aacute;c trung t&acirc;m bảo h&agrave;nh h&atilde;ng&nbsp;<a title=\"Ch&iacute;nh s&aacute;ch bảo h&agrave;nh\" href=\"https://www.thegioididong.com/bao-hanh/oppo\" target=\"_blank\" rel=\"noopener\">Xem địa chỉ bảo h&agrave;nh</a></p>\r\n</li>\r\n<li>\r\n<div class=\"iconl\">&nbsp;</div>\r\n<p>Bộ sản phẩm gồm: Hộp, S&aacute;ch hướng dẫn, C&acirc;y lấy sim, Ốp lưng, C&aacute;p Type C, Củ sạc nhanh rời đầu Type A&nbsp;<a class=\"hinh-mo-hop-link\">Xem h&igrave;nh</a></p>\r\n</li>\r\n</ul>','<h3>OPPO l&agrave; nh&agrave; sản xuất điện thoại di động h&agrave;ng đầu của Trung Quốc, tiếp tục thể hiện sự đổi mới v&agrave; s&aacute;ng tạo với d&ograve;ng sản phẩm mới mang t&ecirc;n&nbsp;<a title=\"Tham khảo một số mẫu điện thoại OPPO A58 tại Thế Giới Di Động \" href=\"https://www.thegioididong.com/dtdd/oppo-a58\" target=\"_blank\" rel=\"noopener\">OPPO A58</a>. Thiết kế của điện thoại mang đậm t&iacute;nh hiện đại v&agrave; đẹp mắt, c&ugrave;ng với nhiều t&iacute;nh năng hấp dẫn, hứa hẹn sẽ l&agrave;m thỏa m&atilde;n nhu cầu của người d&ugrave;ng.</h3>\r\n<h3>Thiết kế thanh mảnh, sang trọng</h3>\r\n<p>Được ra mắt với thiết kế vu&ocirc;ng vức đầy ấn tượng,&nbsp;<a title=\"Tham khảo một số mẫu điện thoại tại Thế Giới Di Động \" href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" rel=\"noopener\">điện thoại</a>&nbsp;OPPO A58 mang đến vẻ ngo&agrave;i sang trọng v&agrave; tinh tế trong từng đường n&eacute;t. Mặt lưng của chiếc điện thoại n&agrave;y được thiết kế theo phong c&aacute;ch trendy, với việc sử dụng chất liệu thủy tinh hữu cơ v&agrave; đổi m&agrave;u khi tiếp x&uacute;c với &aacute;nh s&aacute;ng, tạo n&ecirc;n một sự b&oacute;ng bẩy v&agrave; l&ocirc;i cuốn trong qu&aacute; tr&igrave;nh m&igrave;nh cầm nắm sử dụng.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043640.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Vẻ ngo&agrave;i cuốn h&uacute;t - OPPO A58\" src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043640.jpg\" alt=\"Vẻ ngo&agrave;i cuốn h&uacute;t - OPPO A58\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043640.jpg\"></a></p>\r\n<p>Khung viền m&aacute;y được l&agrave;m từ hợp kim chắc chắn v&agrave; cứng c&aacute;p, kh&ocirc;ng chỉ tăng t&iacute;nh thẩm mỹ m&agrave; c&ograve;n n&acirc;ng cao độ bền của sản phẩm. Trong qu&aacute; tr&igrave;nh sử dụng nếu bạn chẳng may l&agrave;m rơi th&igrave; khả năng hỏng h&oacute;c của m&aacute;y cũng &iacute;t bị hư hại hơn với kiểu thiết kế n&agrave;y.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043642.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Thiết kế trendy - OPPO A58\" src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043642.jpg\" alt=\"Thiết kế trendy - OPPO A58\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043642.jpg\"></a></p>\r\n<p>Viền m&agrave;n h&igrave;nh của OPPO A58 được thiết kế kh&aacute; mỏng, tạo cho m&igrave;nh cảm gi&aacute;c trải nghiệm hấp dẫn khi sử dụng. Với viền m&agrave;n h&igrave;nh mỏng gi&uacute;p tạo n&ecirc;n điểm nhấn cho thiết kế tổng thể của sản phẩm, l&agrave;m cho chiếc điện thoại trở n&ecirc;n thời thượng v&agrave; đẳng cấp hơn.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043644.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Viền m&agrave;n h&igrave;nh mỏng - OPPO A58 \" src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043644.jpg\" alt=\"Viền m&agrave;n h&igrave;nh mỏng - OPPO A58 \" data-src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043644.jpg\"></a></p>\r\n<p>Mặc d&ugrave;&nbsp;<a title=\"Tham khảo một số mẫu điện thoại OPPO tại Thế Giới Di Động \" href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\" rel=\"noopener\">điện thoại OPPO</a>&nbsp;n&agrave;y c&oacute; thiết kế đẹp v&agrave; sang trọng, tuy nhi&ecirc;n cũng c&oacute; một số hạn chế trong qu&aacute; tr&igrave;nh sử dụng m&agrave; m&igrave;nh cảm nhận được. Đ&oacute; l&agrave; với thiết kế l&agrave; mặt lưng thủy tinh hữu cơ m&aacute;y c&oacute; thể dễ bị trầy xước v&agrave; b&aacute;m dấu v&acirc;n tay khi sử dụng thời gian d&agrave;i. Bạn n&ecirc;n trang bị một ốp lưng hoặc một miếng d&aacute;n để c&oacute; thể bảo vệ m&aacute;y tốt hơn.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043638.jpg\"><img class=\" ls-is-cached lazyloaded\" title=\"Bạn n&ecirc;n trang bị ốp lưng để sử dụng tốt hơn - OPPO A58\" src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043638.jpg\" alt=\"Bạn n&ecirc;n trang bị ốp lưng để sử dụng tốt hơn - OPPO A58\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043638.jpg\"></a></p>\r\n<h3>M&agrave;n h&igrave;nh sắc n&eacute;t c&ugrave;ng k&iacute;ch thước m&agrave;n h&igrave;nh lớn</h3>\r\n<p>M&agrave;n h&igrave;nh tr&ecirc;n chiếc điện thoại OPPO A58 thực sự l&agrave; một điểm nhấn nổi bật, mang đến trải nghiệm h&igrave;nh ảnh tuyệt vời khi m&igrave;nh sử dụng. M&aacute;y trang bị tấm nền LTPS LCD, h&igrave;nh ảnh m&agrave; m&igrave;nh trải nghiệm đem đến chất lượng hiển thị tốt, kh&ocirc;ng bị rỗ qu&aacute; nhiều v&agrave; c&oacute; độ tương phản cao.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043650.jpg\"><img class=\" lazyloaded\" title=\"M&agrave;n h&igrave;nh hiển thị chi tiết - OPPO A58\" src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043650.jpg\" alt=\"M&agrave;n h&igrave;nh hiển thị chi tiết - OPPO A58\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043650.jpg\"></a></p>\r\n<p>Độ ph&acirc;n giải Full HD+ (1080 x 2412 Pixels) tr&ecirc;n m&agrave;n h&igrave;nh rộng 6.72 inch của OPPO A58 mang lại h&igrave;nh ảnh sắc n&eacute;t, chi tiết v&agrave; m&agrave;u sắc sống động. D&ugrave; m&igrave;nh đang xem phim, chơi game hay duyệt web, m&agrave;n h&igrave;nh đều cho trải nghiệm rất tuyệt vời v&agrave; cuốn h&uacute;t.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043647.jpg\"><img class=\" lazyloaded\" title=\"Hiển thị r&otilde; n&eacute;t h&igrave;nh ảnh - OPPO A58\" src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043647.jpg\" alt=\"Hiển thị r&otilde; n&eacute;t h&igrave;nh ảnh - OPPO A58\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-200224-043647.jpg\"></a></p>\r\n<p>Độ s&aacute;ng của m&aacute;y đạt 680 nits, khi sử dụng ngo&agrave;i trời OPPO A58 cho ph&eacute;p m&igrave;nh dễ d&agrave;ng đọc th&ocirc;ng tin ở mức &aacute;nh s&aacute;ng kh&ocirc;ng qu&aacute; gắt. Tuy nhi&ecirc;n, m&igrave;nh vẫn gặp kh&oacute; khăn trong việc sử dụng ngo&agrave;i trời dưới &aacute;nh s&aacute;ng mặt trời mạnh. Mặc d&ugrave; đ&atilde; cải thiện rất nhiều so với c&aacute;c phi&ecirc;n bản trước đ&acirc;y, nhưng vẫn c&ograve;n tiềm ẩn một số vấn đề về khả năng hiển thị trong điều kiện &aacute;nh s&aacute;ng khắc nghiệt.</p>\r\n<h3>Chụp ảnh n&eacute;t hơn với camera 50 MP</h3>\r\n<p>Mặc d&ugrave; kh&ocirc;ng ch&uacute; trọng v&agrave;o việc ph&aacute;t triển mạnh mẽ v&agrave;o hệ thống camera, nhưng với cụm camera k&eacute;p ph&iacute;a sau, gồm cảm biến ch&iacute;nh 50 MP v&agrave; phụ 2 MP, OPPO A58 vẫn mang lại những bức ảnh c&oacute; chất lượng ổn định.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-020823-030949.jpg\"><img class=\" lazyloaded\" title=\"Camera chụp ảnh sắc n&eacute;t - OPPO A58\" src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-020823-030949.jpg\" alt=\"Camera chụp ảnh sắc n&eacute;t - OPPO A58\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-020823-030949.jpg\"></a></p>\r\n<p>M&igrave;nh đ&atilde; sử dụng OPPO A58 để chụp ảnh trong nhiều điều kiện &aacute;nh s&aacute;ng kh&aacute;c nhau v&agrave; nhận được kết quả kh&aacute; h&agrave;i l&ograve;ng. Trong điều kiện đủ s&aacute;ng, c&aacute;c bức ảnh c&oacute; độ chi tiết tốt, h&igrave;nh ảnh h&agrave;i h&ograve;a v&agrave; trung thực. Mặc d&ugrave; m&agrave;u sắc tr&ecirc;n A58 c&oacute; vẻ hơi &aacute;m v&agrave;ng so với thực tế, nhưng độ tương phản cao v&agrave; m&agrave;u sắc đều ổn định.</p>\r\n<p><a class=\"preventdefault\" href=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-47.jpg\"><img class=\" lazyloaded\" title=\"Ảnh chụp trong m&ocirc;i trường đủ s&aacute;ng - OPPO A58\" src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-47.jpg\" alt=\"Ảnh chụp trong m&ocirc;i trường đủ s&aacute;ng - OPPO A58\" data-src=\"https://cdn.tgdd.vn/Products/Images/42/275435/oppo-a58-47.jpg\"></a></p>','Active',NULL,NULL,NULL,50,42,NULL,NULL,15000000,14000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-05 15:19:06','2024-08-05 15:19:06',NULL,3);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

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

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('LvifBJvrK6Cu20WjIqBRbeBidbvmns5gif2w1xdM',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNjVaVFNEZXp2T3ZwZ1gxYTU3OHNDc25acENKV3M4ZGx1TWhXOW5wMiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL29yZGVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1723012343),('qw9ANNp8yFNd0yGYQRGUwh272Zrwa3K26L50vKlT',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSk9mZk1Qb2VVSDFNZ0tnQmJ5YTRzdnhzdDc2T3F3Y2hvR1Z6TjhlQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlcnMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6NDoiY2FydCI7YToxOntzOjc6ImRlZmF1bHQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX19',1722984175);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

--
-- Table structure for table `shoppingcart`
--

DROP TABLE IF EXISTS `shoppingcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`identifier`,`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoppingcart`
--

/*!40000 ALTER TABLE `shoppingcart` DISABLE KEYS */;
INSERT INTO `shoppingcart` VALUES ('2','default','O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}','2024-08-06 14:15:50',NULL),('3','default','O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"c1993b96cef9732a7122c3ed74b600bf\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"c1993b96cef9732a7122c3ed74b600bf\";s:2:\"id\";i:11;s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:14:\"iPhone 8 128GB\";s:5:\"price\";d:7000000000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:34:\"uploads/products/0-1722710253.jfif\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}','2024-08-06 14:16:27',NULL),('4','default','O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}','2024-08-06 10:50:18',NULL),('5','default','O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"c1993b96cef9732a7122c3ed74b600bf\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"c1993b96cef9732a7122c3ed74b600bf\";s:2:\"id\";i:11;s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:14:\"iPhone 8 128GB\";s:5:\"price\";d:7000000000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:1:{s:5:\"image\";s:34:\"uploads/products/0-1722710253.jfif\";}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}','2024-08-06 13:52:58',NULL),('6','default','O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}','2024-07-31 04:29:21',NULL),('7','default','O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}','2024-08-01 23:28:26',NULL),('8','default','O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}','2024-07-30 16:24:34',NULL),('9','default','O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}','2024-08-06 08:17:26',NULL);
/*!40000 ALTER TABLE `shoppingcart` ENABLE KEYS */;

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3' COMMENT '1:admin,2:seller,3:user',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Admin','admin@gmail.com',NULL,'$2y$12$XjGKZluVF0WOkrH5rPGzOejeD5IGPFzADHx083W9lBa46dCDH.fxS','1zBHhXFkgLiiTIp3rBDhgfiIb4KtWbEDwQCDmW5eL7ioALJUSMPRybnkRRV3','2024-06-29 11:13:38','2024-06-29 11:13:38','1',NULL),(3,'Seller','seller@gmail.com',NULL,'$2y$12$kgycvDA262q05mZWug2gJOMZsw937Ptw1J9OR3KzVn9mJJ5pteXLS','FYXYQ6rsSAc4RLGgxuATOMZ496oAFtFiG2XFOd1iAOBkvUQwlWKEK8BR3HYk','2024-07-08 08:59:38','2024-08-05 11:43:30','2',NULL),(4,'Minh Hoang Dang','abcxyzui11@gmail.com',NULL,'$2y$12$aBumPDW6Y1iKJeukC/1HkO9jX5jqxvn2IKlSBB/6SMO2HOQgnyfNO','CZQYkF0MufeEaiF0Kb1dheGSe60GYgfl7lJU5YRpWdhJ9yOnFeC16QZhD6Or','2024-07-08 10:11:28','2024-07-08 10:11:28','3',NULL),(5,'Seller','thanhprovv3@gmail.com',NULL,'$2y$12$exyuDtA/B9o20Z.h0ZcCTuvIAlf5Qr/0b.pX9839m7wfRNjz9M8WG','6Tt1TrEayQvYSf8pFHAJTglFUzPPtAGoZ2qCmpG1iE2kD3dC85uYi4KApCsE','2024-07-28 14:11:57','2024-08-03 14:44:13','2',NULL),(7,'Minh Hoang Dang','abcxyzui0@gmail.com',NULL,'$2y$12$qbe0UQ2jdJHL81ShmmBFB.x9aQcFGs0lcbp2i3OEXrSxecY3NqcIm','AaEBXVCiqhZybQ1XpqhBKFfgKgbr4ReWDKETDSI211k1BhJoRjaJ0hYY9YaF','2024-07-28 14:14:56','2024-08-03 14:43:44','2',NULL),(9,'MInh','abcxyzui80@gmail.com',NULL,'$2y$12$jxfvQg8UrWl2cMHqtNahqOYaebd.yqrJB/hfWE6FS3Oj8ZtgW83bq','aQdDV1G6RQorD4bGk72zGfrdip8xR1LdKKokcIBMIyb8aKPiXlgr2FOjz0SX','2024-08-03 14:54:12','2024-08-03 14:54:12','2',NULL),(10,'Minh','abcxyzui@gmail.com',NULL,'$2y$12$B6sCdgnISx6AcYPfpEoC0u81.i5Os2u6164IbNB/eO23bFZmH60um',NULL,'2024-08-03 15:09:30','2024-08-05 12:12:50','3','2024-08-05 12:12:50'),(11,'Seller','admin02@gmail.com',NULL,'$2y$12$6WdJmofF/uqynrdeh45bouri.ic3SsOCE39m.gFGM5ZREejV1XkAy',NULL,'2024-08-04 03:01:18','2024-08-05 12:12:50','1','2024-08-05 12:12:50'),(12,'Seller','seller02@gmail.com',NULL,'$2y$12$lXusWgk929wridbNtgsf1ubep7cH7zE0PRM2eQtKGQMH6KT4fuhZK',NULL,'2024-08-04 03:06:40','2024-08-05 12:12:50','2','2024-08-05 12:12:50'),(13,'Minh','admin011@gm.com',NULL,'$2y$12$k4yEgKBHpaxprze2Sb8QSesmV4VYyNct85dnmgQJmXtcNCnAb0t5K',NULL,'2024-08-04 03:14:25','2024-08-05 12:11:28','1',NULL),(14,'Minh','admin0111@gm.com',NULL,'$2y$12$p2bPZvU7aB8Puzjlqlqkyuf3GuNjqizPSzIyEAVC6xqfEL.YCglUa',NULL,'2024-08-04 03:16:42','2024-08-05 12:05:34','2',NULL),(15,'Minh','admin011@gm1.com',NULL,'$2y$12$wiWbtYW4Lj6nAzH/y.Ote.mb.tOld72tUQVOwBaDWrmC8vgeFSAfG',NULL,'2024-08-04 03:18:15','2024-08-05 07:51:17','1',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Dumping routines for database 'laravel'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-07 19:48:43
