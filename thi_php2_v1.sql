/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80025
 Source Host           : localhost:3306
 Source Schema         : thi_php2_v1

 Target Server Type    : MySQL
 Target Server Version : 80025
 File Encoding         : 65001

 Date: 15/07/2021 10:45:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `founding_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of departments
-- ----------------------------
BEGIN;
INSERT INTO `departments` VALUES (1, 'Phòng hành chính', 'Tòa P, Cao đẳng FPT Polytechnic', '2008-06-04', '2021-06-23 18:10:12', '2021-06-23 18:10:12');
INSERT INTO `departments` VALUES (2, 'Phòng tổ chức & quản lý đào tạo', 'Tòa F, Cao đẳng FPT Polytechnic', '2007-03-01', '2021-06-23 18:10:46', '2021-06-23 18:10:46');
INSERT INTO `departments` VALUES (3, 'Phòng Công tác sinh viên', 'Tòa L, số 7 Tôn Thất Thuyết', '2009-07-13', '2021-06-23 18:11:15', '2021-06-23 18:11:15');
COMMIT;

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of employees
-- ----------------------------
BEGIN;
INSERT INTO `employees` VALUES (1, 'Đỗ Thị Bích Hiền', 'Hà Nội', '2011-12-05', 'hiendtb.jpg', 3, 10000000, '2021-06-23 18:12:44', '2021-06-23 18:12:44');
INSERT INTO `employees` VALUES (2, 'Nguyễn Văn Nam', 'Nam ĐỊnh', '2010-01-05', 'namnv.png', 2, 15000000, '2021-06-23 18:13:14', '2021-06-23 18:13:14');
INSERT INTO `employees` VALUES (3, 'Đỗ Thị Thảo', 'Hà Nam', '2006-07-01', 'thaodt.jpg', 1, 9000000, '2021-06-23 18:15:04', '2021-06-23 18:15:04');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
