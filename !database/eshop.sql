/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 100422
 Source Host           : localhost:3306
 Source Schema         : eshop

 Target Server Type    : MariaDB
 Target Server Version : 100422
 File Encoding         : 65001

 Date: 08/08/2022 19:05:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (25, '2022-07-27 16:06:26', '2022-07-27 16:06:26', 'Κάρτες Γραφικών', NULL, '1658937986.jpg');
INSERT INTO `categories` VALUES (26, '2022-07-27 16:11:28', '2022-07-27 16:11:28', 'Οθόνες', NULL, '1658938288.jpg');
INSERT INTO `categories` VALUES (27, '2022-07-27 16:15:06', '2022-07-27 16:15:06', 'Επεξεργαστής', NULL, '1658938506.jpg');
INSERT INTO `categories` VALUES (28, '2022-07-27 16:17:59', '2022-07-27 16:17:59', 'Κινητο Τηλέφωνο', NULL, '1658938679.jpg');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_07_25_070847_create_categories_table', 2);
INSERT INTO `migrations` VALUES (6, '2022_07_25_082519_create_categories_table', 3);
INSERT INTO `migrations` VALUES (7, '2022_07_25_112544_create_products_table', 4);
INSERT INTO `migrations` VALUES (8, '2022_07_26_091310_create_cart_table', 5);
INSERT INTO `migrations` VALUES (9, '2022_07_26_181111_create_orders_table', 6);
INSERT INTO `migrations` VALUES (10, '2022_07_26_181133_create_order_items_table', 6);

-- ----------------------------
-- Table structure for order_items
-- ----------------------------
DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_items
-- ----------------------------
INSERT INTO `order_items` VALUES (1, '1', '1', '5', '456', '2022-07-26 18:38:35', '2022-07-26 18:38:35');
INSERT INTO `order_items` VALUES (2, '1', '3', '3', '25', '2022-07-26 18:38:35', '2022-07-26 18:38:35');
INSERT INTO `order_items` VALUES (3, '1', '9', '1', '233', '2022-07-26 18:38:35', '2022-07-26 18:38:35');
INSERT INTO `order_items` VALUES (4, '2', '1', '5', '456', '2022-07-26 18:41:32', '2022-07-26 18:41:32');
INSERT INTO `order_items` VALUES (5, '2', '3', '3', '25', '2022-07-26 18:41:32', '2022-07-26 18:41:32');
INSERT INTO `order_items` VALUES (6, '2', '9', '1', '233', '2022-07-26 18:41:32', '2022-07-26 18:41:32');
INSERT INTO `order_items` VALUES (7, '3', '1', '1', '456', '2022-07-26 18:59:51', '2022-07-26 18:59:51');
INSERT INTO `order_items` VALUES (8, '3', '3', '4', '25', '2022-07-26 18:59:51', '2022-07-26 18:59:51');
INSERT INTO `order_items` VALUES (9, '4', '4', '4', '345', '2022-07-27 12:32:11', '2022-07-27 12:32:11');
INSERT INTO `order_items` VALUES (10, '5', '4', '1', '345', '2022-07-27 12:59:06', '2022-07-27 12:59:06');
INSERT INTO `order_items` VALUES (11, '6', '8', '2', '450', '2022-07-27 13:00:01', '2022-07-27 13:00:01');
INSERT INTO `order_items` VALUES (12, '7', '4', '1', '345', '2022-07-27 13:11:50', '2022-07-27 13:11:50');
INSERT INTO `order_items` VALUES (13, '8', '4', '1', '345', '2022-07-27 13:13:19', '2022-07-27 13:13:19');
INSERT INTO `order_items` VALUES (14, '9', '4', '1', '345', '2022-07-27 13:21:11', '2022-07-27 13:21:11');
INSERT INTO `order_items` VALUES (15, '10', '4', '1', '345', '2022-07-27 13:40:10', '2022-07-27 13:40:10');
INSERT INTO `order_items` VALUES (16, '17', '4', '1', '345', '2022-07-27 13:51:44', '2022-07-27 13:51:44');
INSERT INTO `order_items` VALUES (17, '19', '4', '1', '345', '2022-07-27 14:42:00', '2022-07-27 14:42:00');
INSERT INTO `order_items` VALUES (18, '20', '4', '1', '345', '2022-07-27 14:44:18', '2022-07-27 14:44:18');
INSERT INTO `order_items` VALUES (19, '22', '6', '1', '222', '2022-07-27 14:46:41', '2022-07-27 14:46:41');
INSERT INTO `order_items` VALUES (20, '23', '6', '1', '222', '2022-07-27 14:49:22', '2022-07-27 14:49:22');
INSERT INTO `order_items` VALUES (21, '24', '8', '3', '450', '2022-07-27 14:56:17', '2022-07-27 14:56:17');
INSERT INTO `order_items` VALUES (22, '25', '6', '1', '222', '2022-07-27 14:57:13', '2022-07-27 14:57:13');
INSERT INTO `order_items` VALUES (23, '26', '6', '1', '222', '2022-07-27 14:58:35', '2022-07-27 14:58:35');
INSERT INTO `order_items` VALUES (24, '27', '4', '1', '345', '2022-07-27 15:22:01', '2022-07-27 15:22:01');
INSERT INTO `order_items` VALUES (25, '28', '4', '1', '345', '2022-07-27 15:26:26', '2022-07-27 15:26:26');
INSERT INTO `order_items` VALUES (26, '29', '12', '2', '345', '2022-07-27 16:22:10', '2022-07-27 16:22:10');
INSERT INTO `order_items` VALUES (27, '29', '11', '1', '860', '2022-07-27 16:22:10', '2022-07-27 16:22:10');
INSERT INTO `order_items` VALUES (28, '29', '10', '1', '467', '2022-07-27 16:22:10', '2022-07-27 16:22:10');
INSERT INTO `order_items` VALUES (29, '30', '10', '1', '467', '2022-07-27 18:31:48', '2022-07-27 18:31:48');
INSERT INTO `order_items` VALUES (30, '30', '11', '3', '860', '2022-07-27 18:31:48', '2022-07-27 18:31:48');
INSERT INTO `order_items` VALUES (31, '31', '10', '3', '467', '2022-07-27 18:44:49', '2022-07-27 18:44:49');
INSERT INTO `order_items` VALUES (32, '31', '14', '1', '452', '2022-07-27 18:44:49', '2022-07-27 18:44:49');
INSERT INTO `order_items` VALUES (33, '32', '10', '2', '467', '2022-07-27 20:13:39', '2022-07-27 20:13:39');
INSERT INTO `order_items` VALUES (34, '32', '13', '4', '345', '2022-07-27 20:13:39', '2022-07-27 20:13:39');
INSERT INTO `order_items` VALUES (35, '33', '11', '3', '860', '2022-08-08 15:53:49', '2022-08-08 15:53:49');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cate_id` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (11, 25, 'Asus GeForce RTX 3090', 'κάρτα γραφικών', '860', '1658938182.jpg', '7', '1243422', '2022-07-27 16:09:42', '2022-08-08 15:53:49');
INSERT INTO `products` VALUES (12, 26, 'AOC C24G2U/BK VA', 'monitor', '345', '1658938335.jpg', '20', '14567', '2022-07-27 16:12:15', '2022-07-27 16:22:10');
INSERT INTO `products` VALUES (13, 26, 'LG 24GN600-B IPS HDR Monitor', 'monitor', '345', '1658938379.jpg', '5', '12388498', '2022-07-27 16:12:59', '2022-07-27 20:13:39');
INSERT INTO `products` VALUES (14, 26, 'Samsung C27F390FHR', 'monitor', '452', '1658938419.jpg', '8', '9087', '2022-07-27 16:13:39', '2022-07-27 18:44:49');
INSERT INTO `products` VALUES (15, 27, 'Intel Core i5', 'cpu', '235', '1658938553.jpg', '4', '657', '2022-07-27 16:15:53', '2022-07-27 16:15:53');
INSERT INTO `products` VALUES (16, 28, 'Nokia X100', 'mobile', '689', '1658938715.jpg', '10', '6543', '2022-07-27 16:18:35', '2022-07-27 16:18:35');
INSERT INTO `products` VALUES (17, 28, 'I Phone 10', 'mobile', '890', '1658938754.jpg', '5', '78', '2022-07-27 16:19:14', '2022-07-27 16:19:14');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'admin@admin.com', 'Admin', 'Adminastrator', NULL, '$2y$10$0p7lbs5etZ/T0ryg7bMnL.2amnMB52vwSwNHNzdzPpBO4gbwy1GGq', '2022-07-25 18:52:38', '2022-07-27 16:22:10');

SET FOREIGN_KEY_CHECKS = 1;
