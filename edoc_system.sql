/*
 Navicat Premium Data Transfer

 Source Server         : localhost_nopass
 Source Server Type    : MariaDB
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : edoc_system

 Target Server Type    : MariaDB
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 20/10/2022 06:59:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  INDEX `idx-auth_assignment-user_id`(`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `data` blob NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for edoc_dep
-- ----------------------------
DROP TABLE IF EXISTS `edoc_dep`;
CREATE TABLE `edoc_dep`  (
  `dep_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `dep_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `dep_user` varchar(13) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `dep_pass` varchar(13) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `sent_txt` varchar(30) CHARACTER SET tis620 COLLATE tis620_thai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`dep_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for edoc_main
-- ----------------------------
DROP TABLE IF EXISTS `edoc_main`;
CREATE TABLE `edoc_main`  (
  `edoc_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `e_id` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'เลขที่รับ',
  `edoc_no_get` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'เลขที่หนังสือ อบ.',
  `edoc_no_sent` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'เลขที่หนังสือส่ง',
  `edoc_no_keep` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'เลขที่หนังสือเก็บ',
  `edoc_date_doc` varchar(10) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_date_get` varchar(10) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_from` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_to` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `dep_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_type_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_status_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_read_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `path` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_important_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'ประเภทหนังสือ',
  `e_id_sent` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'หนังสือส่ง',
  `e_id_dud` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'หนังสือภายใน',
  `e_id_radio` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'หนังสือรับวิทยุ',
  `ip_get_sent` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`edoc_id`, `e_id`, `e_id_sent`, `e_id_dud`, `e_id_radio`) USING BTREE,
  INDEX `fk_edoc_main_idx`(`edoc_status_id`) USING BTREE,
  INDEX `fk_edoc_type_idx`(`edoc_type_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for edoc_read
-- ----------------------------
DROP TABLE IF EXISTS `edoc_read`;
CREATE TABLE `edoc_read`  (
  `edoc_read_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_read_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`edoc_read_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for edoc_sent
-- ----------------------------
DROP TABLE IF EXISTS `edoc_sent`;
CREATE TABLE `edoc_sent`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edoc_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `e_id` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_read_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `r_date` varchar(10) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_type_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `e_id_sent` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `e_id_dud` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `user_get` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `date_get` varchar(10) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `ip_get` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `e_id_radio` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `dep_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `edoc_id`(`edoc_id`) USING BTREE,
  INDEX `e_id`(`e_id`) USING BTREE,
  INDEX `fk_sent_department_idx`(`dep_id`) USING BTREE,
  INDEX `fk_edoc_read_idx`(`edoc_read_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 391476 CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for edoc_status
-- ----------------------------
DROP TABLE IF EXISTS `edoc_status`;
CREATE TABLE `edoc_status`  (
  `edoc_status_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_status_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`edoc_status_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for edoc_type
-- ----------------------------
DROP TABLE IF EXISTS `edoc_type`;
CREATE TABLE `edoc_type`  (
  `edoc_type_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `edoc_type_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`edoc_type_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parent` int(11) NULL DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order` int(11) NULL DEFAULT NULL,
  `data` blob NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `parent`(`parent`) USING BTREE,
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `ProductID` varchar(7) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `ProductName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `Price` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ProductID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `public_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gravatar_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `gravatar_id` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `bio` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `timezone` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for social_account
-- ----------------------------
DROP TABLE IF EXISTS `social_account`;
CREATE TABLE `social_account`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `code` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `account_unique`(`provider`, `client_id`) USING BTREE,
  UNIQUE INDEX `account_unique_code`(`code`) USING BTREE,
  INDEX `fk_user_account`(`user_id`) USING BTREE,
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for token
-- ----------------------------
DROP TABLE IF EXISTS `token`;
CREATE TABLE `token`  (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE INDEX `token_unique`(`user_id`, `code`, `type`) USING BTREE,
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of token
-- ----------------------------
INSERT INTO `token` VALUES (3, '3WzmrYRUsYdid4IGqAWVrsDPW7P0P8LY', 1666067233, 0);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) NULL DEFAULT NULL,
  `unconfirmed_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `blocked_at` int(11) NULL DEFAULT NULL,
  `registration_ip` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) NULL DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `user_unique_username`(`username`) USING BTREE,
  UNIQUE INDEX `user_unique_email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (3, 'admin', 'umt.eng52@gmail.com', '$2y$12$0jSBUpSmz7K6c3CJ.Hgh4udW7GrIdtdSh0pmRcDEnTncPYkJEF9ba', 'HTxKEJiNJtRAAmUktgJWUPNdA50xa9_k', 1666067666, NULL, NULL, '::1', 1666067233, 1666067233, 0, 1666068941, '0');

SET FOREIGN_KEY_CHECKS = 1;
