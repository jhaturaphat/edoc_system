/*
 Navicat Premium Data Transfer

 Source Server         : 192.168.100.1
 Source Server Type    : MariaDB
 Source Server Version : 100511 (10.5.11-MariaDB-1-log)
 Source Host           : 192.168.100.1:3306
 Source Schema         : edoc_system

 Target Server Type    : MariaDB
 Target Server Version : 100511 (10.5.11-MariaDB-1-log)
 File Encoding         : 65001

 Date: 07/12/2023 15:07:35
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
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('root', '3', 1701936361);

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
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/admin/*', 2, NULL, NULL, NULL, 1701932659, 1701932659);
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', 2, NULL, NULL, NULL, 1701932712, 1701932712);
INSERT INTO `auth_item` VALUES ('/admin/default/*', 2, NULL, NULL, NULL, 1701932672, 1701932672);
INSERT INTO `auth_item` VALUES ('/admin/menu/*', 2, NULL, NULL, NULL, 1701932711, 1701932711);
INSERT INTO `auth_item` VALUES ('/admin/permission/*', 2, NULL, NULL, NULL, 1701932668, 1701932668);
INSERT INTO `auth_item` VALUES ('/admin/role/*', 2, NULL, NULL, NULL, 1701932692, 1701932692);
INSERT INTO `auth_item` VALUES ('/admin/route/*', 2, NULL, NULL, NULL, 1701932665, 1701932665);
INSERT INTO `auth_item` VALUES ('/admin/rule/*', 2, NULL, NULL, NULL, 1701932663, 1701932663);
INSERT INTO `auth_item` VALUES ('/admin/user/*', 2, NULL, NULL, NULL, 1701932695, 1701932695);
INSERT INTO `auth_item` VALUES ('/backend/*', 2, NULL, NULL, NULL, 1701932656, 1701932656);
INSERT INTO `auth_item` VALUES ('/backend/default/*', 2, NULL, NULL, NULL, 1701932701, 1701932701);
INSERT INTO `auth_item` VALUES ('/backend/edoc-dep/*', 2, NULL, NULL, NULL, 1701932700, 1701932700);
INSERT INTO `auth_item` VALUES ('/backend/edoc-main/*', 2, NULL, NULL, NULL, 1701932703, 1701932703);
INSERT INTO `auth_item` VALUES ('/backend/edoc-status/*', 2, NULL, NULL, NULL, 1701932706, 1701932706);
INSERT INTO `auth_item` VALUES ('/backend/edoc-type/*', 2, NULL, NULL, NULL, 1701932707, 1701932707);
INSERT INTO `auth_item` VALUES ('/user/*', 2, NULL, NULL, NULL, 1701932674, 1701932674);
INSERT INTO `auth_item` VALUES ('/user/admin/*', 2, NULL, NULL, NULL, 1701932678, 1701932678);
INSERT INTO `auth_item` VALUES ('/user/profile/*', 2, NULL, NULL, NULL, 1701932685, 1701932685);
INSERT INTO `auth_item` VALUES ('/user/recovery/*', 2, NULL, NULL, NULL, 1701932683, 1701932683);
INSERT INTO `auth_item` VALUES ('/user/registration/*', 2, NULL, NULL, NULL, 1701932689, 1701932689);
INSERT INTO `auth_item` VALUES ('/user/security/*', 2, NULL, NULL, NULL, 1701932687, 1701932687);
INSERT INTO `auth_item` VALUES ('/user/settings/*', 2, NULL, NULL, NULL, 1701932675, 1701932675);
INSERT INTO `auth_item` VALUES ('root', 1, NULL, NULL, NULL, 1701936301, 1701936301);

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
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('root', '/admin/*');
INSERT INTO `auth_item_child` VALUES ('root', '/backend/*');
INSERT INTO `auth_item_child` VALUES ('root', '/user/*');

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
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for edoc_dep
-- ----------------------------
DROP TABLE IF EXISTS `edoc_dep`;
CREATE TABLE `edoc_dep`  (
  `dep_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสหน่วยงาน',
  `dep_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL COMMENT 'ชื่อหน่วยงาน',
  `dep_user` varchar(13) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'username',
  `dep_pass` varchar(13) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'password',
  `sent_txt` varchar(30) CHARACTER SET tis620 COLLATE tis620_thai_ci NULL DEFAULT NULL COMMENT 'เลขลำดับหนังสือส่ง',
  PRIMARY KEY (`dep_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of edoc_dep
-- ----------------------------
INSERT INTO `edoc_dep` VALUES ('d00008', 'งานคอมพิวเตอร์', '100', '100', 'อบ.0032.301.2.07/');
INSERT INTO `edoc_dep` VALUES ('d00012', 'ฝ่ายเภสัชกรรมชุมชน', '163', '163', 'อบ.0032.303.1.07/');
INSERT INTO `edoc_dep` VALUES ('d00013', 'ห้องจ่ายยาผู้ป่วยนอก', '243', '243', 'อบ.0032.303.1.07/');
INSERT INTO `edoc_dep` VALUES ('d00014', 'งานแพทย์แผนไทย', '164', '164', 'อบ.0032.303.1.07/');
INSERT INTO `edoc_dep` VALUES ('d00015', 'ห้องจ่ายยาผู้ป่วยใน', '105', '105', 'อบ.0032.303.1.07/');
INSERT INTO `edoc_dep` VALUES ('d00016', 'งานคุ้มครองผู้บริโภค', '163', '163', 'อบ.0032.303.1.07/');
INSERT INTO `edoc_dep` VALUES ('d00017', 'ฝ่ายเทคนิคบริการทางการแพทย์', '238', '238', 'อบ.0032.302.1.07/');
INSERT INTO `edoc_dep` VALUES ('d00018', 'งานรังสีการแพทย์', '136', '136', 'อบ.0032.303.2.07/');
INSERT INTO `edoc_dep` VALUES ('d00019', 'กายภาพบำบัด', '114', '114', 'อบ.0032.303.2.07/');
INSERT INTO `edoc_dep` VALUES ('d00020', 'กลุ่มภารกิจด้านบริการปฐมภูมิ', 'fmdetudom', '242', 'อบ.0032.304.07/');
INSERT INTO `edoc_dep` VALUES ('d00021', 'ศูนย์สุขภาพชุมชนที่ 1', 'pcu1', 'pcu1', 'อบ.0032.304.07/');
INSERT INTO `edoc_dep` VALUES ('d00022', 'ศูนย์สุขภาพชุมชนที่ 2', 'pcu2', 'pcu2', 'อบ.0032.304.07/');
INSERT INTO `edoc_dep` VALUES ('d00023', 'ศูนย์สุขภาพชุมชนที่ 3', 'pcu3', 'pcu3', 'อบ.0032.304.07/');
INSERT INTO `edoc_dep` VALUES ('d00024', 'งานโสตทัศนศึกษา', '289', '289', 'อบ.0032.304.07/');
INSERT INTO `edoc_dep` VALUES ('d00025', 'งานโรคติดต่อ', '110', '110', 'อบ.0032.304.07/');
INSERT INTO `edoc_dep` VALUES ('d00026', 'ฝ่ายทันตสาธารณสุข', '236', '236', 'อบ.0032.302.2.07/');
INSERT INTO `edoc_dep` VALUES ('d00027', 'กลุ่มการพยาบาล', '223', '223', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00028', 'หอผู้ป่วยพิเศษ ทวี-กันยา พาสันต์', '441', '441', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00029', 'งานอุบัติเหตุและฉุกเฉิน', '107', '107', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00030', 'อายุรกรรมหญิง', '411', '411', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00031', 'อายุรกรรมชาย', '421', '421', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00032', 'สูติ-นรี เวชกรรม', '112', '112', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00033', 'ศัลยกรรมกระดูก', '147', '147', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00034', 'ศัลยกรรมทั่วไป', '111', '111', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00035', 'กุมารเวชกรรม', '431', '431', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00036', 'งานห้องคลอด', '115', '115', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00037', 'งานห้องผ่าตัด', '116', '116', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00038', 'งานวิสัญญีพยาบาล', '109', '109', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00039', 'งานจ่ายกลาง', '118', '118', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00040', 'งานผู้ป่วยนอก', '248', '248', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00041', 'งานผู้ป่วยนอก(สูติฯ)', '103', '103', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00042', 'คลินิกเฉพาะโรค', '110', '110', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00043', 'งานสวนและสิ่งแวดล้อม', '195', '195', 'อบ.0032.301.07/');
INSERT INTO `edoc_dep` VALUES ('d00044', 'งานรักษาความปลอดภ้ย', '191', '191', 'อบ.0032.301.07/');
INSERT INTO `edoc_dep` VALUES ('d00045', 'งานยานพาหนะ', '130', '130', 'อบ.0032.301.07/');
INSERT INTO `edoc_dep` VALUES ('d00046', 'ติดประกาศ', 'user', '123', 'อบ.0032.301.07/');
INSERT INTO `edoc_dep` VALUES ('d00047', 'ยุทธศาสตร์2', 'hrd', 'hrd', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00048', 'ศูนย์คุณภาพ', '219', '219', 'อบ.0032.301.07/');
INSERT INTO `edoc_dep` VALUES ('d00049', 'ชมรมจริยธรรม', 'moral', 'moral', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00050', 'กรรมการกีฬา', 'sport', 'sport', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00051', 'ผู้อำนวยการ รพร.เดชอุดม', '201', '201', '');
INSERT INTO `edoc_dep` VALUES ('d00052', 'ห้องสมุด', '133', '133', 'อบ.0032.301.2.07/');
INSERT INTO `edoc_dep` VALUES ('d00054', 'งานลูกค้าสัมพันธ์', '291', '291', 'อบ.0032.301.1.07/');
INSERT INTO `edoc_dep` VALUES ('d00055', 'คุณทัตชญา แฝงเพ็ชร', '123', '123', 'อบ.0032.301.1.07/');
INSERT INTO `edoc_dep` VALUES ('d00056', 'งานการเจ้าหน้าที่', '205', '205', 'อบ.0032.301.1.07/');
INSERT INTO `edoc_dep` VALUES ('d00057', 'พิเศษศัลยฯ(ชั้น6)', 'moo', 'moo', NULL);
INSERT INTO `edoc_dep` VALUES ('d00058', 'ตึกพิเศษสูติฯ', '550', '550', NULL);
INSERT INTO `edoc_dep` VALUES ('d00059', 'ศัลยกรรมทั่วไป(ชาย)', '540', '540', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00060', 'ศัลยกรรมทั่วไป(หญิง)', '530', '530', 'อบ.0032.305.07/');
INSERT INTO `edoc_dep` VALUES ('d00061', 'รองผู้อำนวยการ รพร.เดชอุดม', '309', '309', NULL);
INSERT INTO `edoc_dep` VALUES ('d00062', 'ตึกพิเศษศัลยกรรมกระดูก', '520', '520', NULL);
INSERT INTO `edoc_dep` VALUES ('d00063', 'หน่วยไตเทียม', '2518', '2518', NULL);
INSERT INTO `edoc_dep` VALUES ('d00064', 'งานระบาดวิทยา', '777', '777', NULL);
INSERT INTO `edoc_dep` VALUES ('d00065', 'หน่วยไตรเวช(ยกเลิก)', '(ยกเลิก)', '(ยกเลิก)', NULL);
INSERT INTO `edoc_dep` VALUES ('d00066', 'หอผู้ป่วยหนัก(ICU)', 'icu', 'icu', NULL);
INSERT INTO `edoc_dep` VALUES ('d00067', 'งานบัญชี', '174', '470', 'อบ.0032.301.1.07/');
INSERT INTO `edoc_dep` VALUES ('d00068', 'งานสุขภาพจิตและจิตเวช', '601', '609', NULL);
INSERT INTO `edoc_dep` VALUES ('d00069', 'งานนิติการ', '635', '635', NULL);
INSERT INTO `edoc_dep` VALUES ('d00070', 'ฝ่ายการแพทย์(ศูนย์จัดเก็บรายได้)', '282', '282', NULL);
INSERT INTO `edoc_dep` VALUES ('d00071', 'กลุ่มงานอาชีวเวชกรรม', 'occ', 'occ', 'อบ.0032.226.07');
INSERT INTO `edoc_dep` VALUES ('d00072', 'กลุ่มงานพัฒนาบุคลากร', '678', '678', NULL);
INSERT INTO `edoc_dep` VALUES ('d00073', 'หอผู้ป่วยพิเศษกุมารเวชกรรม', '747', '747', NULL);
INSERT INTO `edoc_dep` VALUES ('d00074', 'NICU ทารกแรกเกิดวิกฤต', '830', '830', NULL);
INSERT INTO `edoc_dep` VALUES ('d00075', 'กลุ่มงานสังคมสงเคราะห์', 'sw', 'sw', NULL);
INSERT INTO `edoc_dep` VALUES ('d00076', 'กลุ่มงาน IC + วิจัย', '667', '667', NULL);
INSERT INTO `edoc_dep` VALUES ('d00077', 'งานเพิ่มพูนทักษะ', '2530', '2530', NULL);
INSERT INTO `edoc_dep` VALUES ('d00078', 'รองผอก.ฝ่ายการแพทย์', '2526', '2526', NULL);
INSERT INTO `edoc_dep` VALUES ('d00079', 'พิเศษรวม', '715', '715', NULL);
INSERT INTO `edoc_dep` VALUES ('d00080', 'กลุ่มงานการพยาบาลชุมชน', '171', '171', NULL);
INSERT INTO `edoc_dep` VALUES ('d99999', 'เจ้าหน้าที่ธุรการ', '', '', NULL);

-- ----------------------------
-- Table structure for edoc_dep_group
-- ----------------------------
DROP TABLE IF EXISTS `edoc_dep_group`;
CREATE TABLE `edoc_dep_group`  (
  `dep_group_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสกลุ่มงาน',
  `dep_group_name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อกลุ่มงาน',
  PRIMARY KEY (`dep_group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edoc_dep_group
-- ----------------------------

-- ----------------------------
-- Table structure for edoc_important
-- ----------------------------
DROP TABLE IF EXISTS `edoc_important`;
CREATE TABLE `edoc_important`  (
  `edoc_important_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสความสำคัญของหนังสือ',
  `edoc_important_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL COMMENT 'ชื่อความสำคัญของหนังสือ เช่น ด่วน ด่วนมาก ปกติ',
  PRIMARY KEY (`edoc_important_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edoc_important
-- ----------------------------
INSERT INTO `edoc_important` VALUES ('im01', 'ปกติ');
INSERT INTO `edoc_important` VALUES ('im02', 'ด่วนที่สุด');
INSERT INTO `edoc_important` VALUES ('im03', 'ด่วนมาก');
INSERT INTO `edoc_important` VALUES ('im04', 'ด่วน');

-- ----------------------------
-- Table structure for edoc_main
-- ----------------------------
DROP TABLE IF EXISTS `edoc_main`;
CREATE TABLE `edoc_main`  (
  `e_main_id` int(11) NOT NULL AUTO_INCREMENT,
  `edoc_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'ปีที่รับหนังสือ เช่น 2565',
  `e_id` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'ลำดับที่ทั่วไปหนังสือรับ เช่น 05023',
  `edoc_no_get` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'เลขลำดับหนังสือ เช่น อบ0032.012/ว11',
  `edoc_no_sent` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'เลขที่หนังสือส่ง',
  `edoc_no_keep` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'เลขที่เก็บหนังสือ',
  `edoc_date_doc` varchar(10) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'ลงวันที่ตามเอกสาร',
  `edoc_date_get` varchar(10) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'วันที่รับหนังสือ',
  `edoc_from` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'จาก',
  `edoc_to` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'ถึง',
  `edoc_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '\'\'' COMMENT 'เรื่อง',
  `dep_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'ไม่ได้ใช้',
  `edoc_type_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสประเภทหนังสือ',
  `edoc_status_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสสถานะการดำเนินการของหนังสือ ',
  `edoc_read_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสสถานะการอ่านของหนังสือ ',
  `path` text CHARACTER SET tis620 COLLATE tis620_thai_ci NULL DEFAULT NULL COMMENT 'ชื่อไฟล์ที่ upload เช่น 6301.pdf',
  `edoc_important_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสความสำคัญของหนังสือ',
  `e_id_sent` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NULL DEFAULT '' COMMENT 'ลำดับที่ทั่วไปหนังสือส่ง เช่น 05023',
  `e_id_dud` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NULL DEFAULT '' COMMENT 'ลำดับที่ทั่วไปหนังสือเวียนภายใน เช่น 05023',
  `e_id_radio` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NULL DEFAULT '' COMMENT 'ลำดับที่ทั่วไปหนังสือเวียนวิทยุ เช่น 05023',
  `ip_get_sent` text CHARACTER SET tis620 COLLATE tis620_thai_ci NULL DEFAULT NULL COMMENT 'ip เครื่องที่เปิดอ่าน',
  `create_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'current_timestamp วันเวลาบันทึก',
  `edoc_date_get_2` datetime NULL DEFAULT NULL,
  `edoc_date_doc_2` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`e_main_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1038 CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edoc_main
-- ----------------------------
INSERT INTO `edoc_main` VALUES (1036, '2566', 'et03', 'อบ0033.223.07/1156', '', '', '2023-11-08', '2023-11-09', 'งานป้องกันควบคุมโรค', 'ผอก.รพร.เดชอุดม หัวหน้ากลุ่มภารกิจ หัวหน้างานและเจ', 'แจ้งสถานการโรคติดต่อ', '', 'et03', 'st01', '', '2566-90731bddf203d3af29e73e492d7cae8b.pdf', 'im01', '', '', '', NULL, '2023-11-09 10:25:06', NULL, NULL);
INSERT INTO `edoc_main` VALUES (1035, '2566', 'et01', 'อบ0318/ว1479', '', '', '2023-10-31', '2023-11-07', 'ที่ว่าการอำเภอเดชอุดม', 'ผอก.รพร.เดชอุดม', 'แต่งตั้งคณะกรมมการจัดงานกาชาด', '', 'et01', 'st01', '', '', 'im01', '', '', '', NULL, '2023-11-07 17:57:46', NULL, NULL);
INSERT INTO `edoc_main` VALUES (1030, '2566', '00002', 'อบ0032.331.07', '', '', '2023-08-22', '2023-08-22', 'สสจ.อุบลฯ', 'ผู้อำนวยการ รพร.เดชอุดม', 'หนังสือเวียน 2', '', 'et03', 'st02', '', '', 'im01', '', '', '', NULL, '2023-08-22 09:08:24', NULL, NULL);
INSERT INTO `edoc_main` VALUES (1033, '2566', '00003', 'อบ0032.331.07', '', '', '2023-08-22', '2023-08-22', 'สสจ.อุบลฯ', 'ผู้อำนวยการ รพร.เดชอุดม', 'หนังสือเวียน 3', '', 'et03', 'st01', '', '', 'im02', '', '', '', NULL, '2023-08-22 09:13:22', NULL, NULL);
INSERT INTO `edoc_main` VALUES (1034, '2566', 'et01', 'สธ0235/1782', '', '', '2023-10-26', '2023-11-07', 'สนง.ปลัดกระทรวงสาธาราณสุข', 'ผอก.รพร.เดชอุดม', 'ขอความร่วมมือรายงานผลการดำเนินโครงการ', '', 'et01', 'st01', '', '2566-7afa8ad313591d2cee9294cb53ca10c8.pdf', 'im01', '', '', '', NULL, '2023-11-07 16:54:30', NULL, NULL);
INSERT INTO `edoc_main` VALUES (1029, '2566', '00003', 'อบ0032.331.07', '', '', '2023-08-22', '2023-08-22', 'สสจ.อุบลฯ', 'ผู้อำนวยการ รพร.เดชอุดม', 'หนังสือรับ 3', '', 'et01', 'st01', '', '', 'im01', '', '', '', NULL, '2023-08-22 09:07:39', NULL, NULL);
INSERT INTO `edoc_main` VALUES (1028, '2566', '00001', 'อบ0032.331.07', '', '', '2023-08-23', '2023-08-22', 'สสจ.อุบลฯ', 'ผู้อำนวยการ รพร.เดชอุดม', 'ทดสอบหนังสือเวียน', '', 'et03', 'st01', '', '', 'im01', '', '', '', NULL, '2023-08-22 09:07:14', NULL, NULL);
INSERT INTO `edoc_main` VALUES (1027, '2566', '00002', 'อบ0032.331.07', '', '', '2023-08-15', '2023-08-22', 'สสจ.อุบลฯ', 'ผู้อำนวยการ รพร.เดชอุดม', 'ทดสอบหนังสือรับ 2', '', 'et01', 'st02', '', '', 'im01', '', '', '', NULL, '2023-08-22 09:06:27', NULL, NULL);
INSERT INTO `edoc_main` VALUES (1026, '2566', '00001', 'อบ0032.012/ว11', '', '', '2023-08-14', '2023-08-22', 'สสจ.อุบลฯ', 'ผู้อำนวยการ รพร.เดชอุดม', 'ทดสอบหนังสือรับ', '', 'et01', 'st02', '', '', 'im02', '', '', '', NULL, '2023-08-22 09:05:02', NULL, NULL);
INSERT INTO `edoc_main` VALUES (1037, '2566', 'et01', 'อบ0033.007/ว10690', '', '', '2023-11-03', '2023-11-07', 'สสจ.อบ', 'ผอก.รพร.เดชอุดม', 'นำเงินงบประมาณงบเงินอุดหนุน ประเภทเงินหนุนทั่วไป', '', 'et01', 'st01', '', '2566-1d9748034b41a85333cdffb6af5b5d94.pdf', 'im01', '', '', '', NULL, '2023-11-09 18:57:48', NULL, NULL);

-- ----------------------------
-- Table structure for edoc_read
-- ----------------------------
DROP TABLE IF EXISTS `edoc_read`;
CREATE TABLE `edoc_read`  (
  `edoc_read_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสสถานะการอ่าน',
  `edoc_read_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL COMMENT 'ชื่อสถานะการอ่าน เช่น อ่านแล้ว ยังไม่ได้อ่าน',
  PRIMARY KEY (`edoc_read_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edoc_read
-- ----------------------------
INSERT INTO `edoc_read` VALUES ('re01', 'อ่านแล้ว');
INSERT INTO `edoc_read` VALUES ('re02', 'ยังไม่ได้อ่าน');

-- ----------------------------
-- Table structure for edoc_sent
-- ----------------------------
DROP TABLE IF EXISTS `edoc_sent`;
CREATE TABLE `edoc_sent`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหนังสือ',
  `edoc_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'ปีที่รับหนังสือ เช่น 2565',
  `e_id` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'ลำดับที่ทั่วไปหนังสือรับ เช่น 05023',
  `edoc_read_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT 're02' COMMENT 'รหัสการอ่าน เช่น อ่านแล้ว ยังไม่ได้อ่าน',
  `r_date` varchar(50) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'วันที่รับหนังสือ',
  `dep_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสหน่วยงาน',
  `edoc_type_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสประเภทหนังสือ',
  `e_id_sent` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'ลำดับที่ทั่วไปหนังสือส่ง เช่น 05023',
  `e_id_dud` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'ลำดับที่ทั่วไปหนังสือเวียนภายใน เช่น 05023',
  `user_get` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL COMMENT 'user ที่เปิดอ่าน',
  `date_get` varchar(10) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'วันทีเปิดอ่าน',
  `ip_get` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL COMMENT 'ip เครื่องที่เปิดอ่าน',
  `e_id_radio` varchar(6) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'เลขที่หนังสือเวียนวิทยุ',
  `e_main_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `edoc_id`(`edoc_id`) USING BTREE,
  INDEX `e_id`(`e_id`) USING BTREE,
  INDEX `fk_edoc_sent_edoc_main1_idx`(`e_main_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1169 CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edoc_sent
-- ----------------------------
INSERT INTO `edoc_sent` VALUES (966, '2566', 'et01', 're02', '', 'd00019', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (967, '2566', 'et01', 're02', '', 'd00020', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (965, '2566', 'et01', 're02', '', 'd00018', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (964, '2566', 'et01', 're02', '', 'd00017', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (963, '2566', 'et01', 're02', '', 'd00016', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (961, '2566', 'et01', 're02', '', 'd00014', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (962, '2566', 'et01', 're02', '', 'd00015', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (960, '2566', 'et01', 're02', '', 'd00013', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (959, '2566', 'et01', 're02', '', 'd00012', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (958, '2566', 'et01', 're01', '2023-11-09 10:28:53', 'd00008', '', '', '', 'admin,admin,admin,admin,admin,admin,admin,admin,admin,admin,', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (957, '2566', '00003', 're01', '2023-11-08 08:53:24', 'd00008', '', '', '', 'admin,admin,admin,admin,admin,admin,admin,admin,admin,admin,admin,admin,admin,admin,admin,admin,admin,dep1,dep1,dep1,dep1,dep1,dep1,dep1,dep1,', '', '', '', 1033);
INSERT INTO `edoc_sent` VALUES (968, '2566', 'et01', 're02', '', 'd00021', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (969, '2566', 'et01', 're02', '', 'd00022', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (970, '2566', 'et01', 're02', '', 'd00023', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (971, '2566', 'et01', 're02', '', 'd00024', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (972, '2566', 'et01', 're02', '', 'd00025', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (973, '2566', 'et01', 're02', '', 'd00026', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (974, '2566', 'et01', 're02', '', 'd00027', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (975, '2566', 'et01', 're02', '', 'd00028', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (976, '2566', 'et01', 're02', '', 'd00029', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (977, '2566', 'et01', 're02', '', 'd00030', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (978, '2566', 'et01', 're02', '', 'd00031', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (979, '2566', 'et01', 're02', '', 'd00032', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (980, '2566', 'et01', 're02', '', 'd00033', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (981, '2566', 'et01', 're02', '', 'd00034', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (982, '2566', 'et01', 're02', '', 'd00035', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (983, '2566', 'et01', 're02', '', 'd00036', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (984, '2566', 'et01', 're02', '', 'd00037', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (985, '2566', 'et01', 're02', '', 'd00038', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (986, '2566', 'et01', 're02', '', 'd00039', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (987, '2566', 'et01', 're02', '', 'd00040', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (988, '2566', 'et01', 're02', '', 'd00041', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (989, '2566', 'et01', 're02', '', 'd00042', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (990, '2566', 'et01', 're02', '', 'd00043', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (991, '2566', 'et01', 're02', '', 'd00044', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (992, '2566', 'et01', 're02', '', 'd00045', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (993, '2566', 'et01', 're02', '', 'd00046', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (994, '2566', 'et01', 're02', '', 'd00047', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (995, '2566', 'et01', 're02', '', 'd00048', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (996, '2566', 'et01', 're02', '', 'd00049', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (997, '2566', 'et01', 're02', '', 'd00050', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (998, '2566', 'et01', 're02', '', 'd00051', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (999, '2566', 'et01', 're02', '', 'd00052', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1000, '2566', 'et01', 're02', '', 'd00054', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1001, '2566', 'et01', 're02', '', 'd00055', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1002, '2566', 'et01', 're02', '', 'd00056', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1003, '2566', 'et01', 're02', '', 'd00057', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1004, '2566', 'et01', 're02', '', 'd00058', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1005, '2566', 'et01', 're02', '', 'd00059', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1006, '2566', 'et01', 're02', '', 'd00060', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1007, '2566', 'et01', 're02', '', 'd00061', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1008, '2566', 'et01', 're02', '', 'd00062', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1009, '2566', 'et01', 're02', '', 'd00063', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1010, '2566', 'et01', 're02', '', 'd00064', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1011, '2566', 'et01', 're02', '', 'd00065', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1012, '2566', 'et01', 're02', '', 'd00066', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1013, '2566', 'et01', 're02', '', 'd00067', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1014, '2566', 'et01', 're02', '', 'd00068', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1015, '2566', 'et01', 're02', '', 'd00069', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1016, '2566', 'et01', 're02', '', 'd00070', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1017, '2566', 'et01', 're02', '', 'd00071', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1018, '2566', 'et01', 're02', '', 'd00072', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1019, '2566', 'et01', 're02', '', 'd00073', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1020, '2566', 'et01', 're02', '', 'd00074', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1021, '2566', 'et01', 're02', '', 'd00075', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1022, '2566', 'et01', 're02', '', 'd00076', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1023, '2566', 'et01', 're02', '', 'd00077', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1024, '2566', 'et01', 're02', '', 'd00078', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1025, '2566', 'et01', 're02', '', 'd00079', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1026, '2566', 'et01', 're02', '', 'd00080', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1027, '2566', 'et01', 're02', '', 'd99999', '', '', '', '', '', '', '', 1034);
INSERT INTO `edoc_sent` VALUES (1028, '2566', 'et01', 're01', '2023-11-09 10:29:41', 'd00008', '', '', '', 'admin,admin,admin,admin,admin,admin,admin,admin,', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1029, '2566', 'et01', 're02', '', 'd00012', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1030, '2566', 'et01', 're02', '', 'd00013', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1031, '2566', 'et01', 're02', '', 'd00014', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1032, '2566', 'et01', 're02', '', 'd00015', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1033, '2566', 'et01', 're02', '', 'd00016', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1034, '2566', 'et01', 're02', '', 'd00017', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1035, '2566', 'et01', 're02', '', 'd00018', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1036, '2566', 'et01', 're02', '', 'd00019', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1037, '2566', 'et01', 're02', '', 'd00020', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1038, '2566', 'et01', 're02', '', 'd00021', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1039, '2566', 'et01', 're02', '', 'd00022', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1040, '2566', 'et01', 're02', '', 'd00023', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1041, '2566', 'et01', 're02', '', 'd00024', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1042, '2566', 'et01', 're02', '', 'd00025', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1043, '2566', 'et01', 're02', '', 'd00026', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1044, '2566', 'et01', 're02', '', 'd00027', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1045, '2566', 'et01', 're02', '', 'd00028', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1046, '2566', 'et01', 're02', '', 'd00029', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1047, '2566', 'et01', 're02', '', 'd00030', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1048, '2566', 'et01', 're02', '', 'd00031', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1049, '2566', 'et01', 're02', '', 'd00032', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1050, '2566', 'et01', 're02', '', 'd00033', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1051, '2566', 'et01', 're02', '', 'd00034', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1052, '2566', 'et01', 're02', '', 'd00035', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1053, '2566', 'et01', 're02', '', 'd00036', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1054, '2566', 'et01', 're02', '', 'd00037', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1055, '2566', 'et01', 're02', '', 'd00038', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1056, '2566', 'et01', 're02', '', 'd00039', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1057, '2566', 'et01', 're02', '', 'd00040', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1058, '2566', 'et01', 're02', '', 'd00041', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1059, '2566', 'et01', 're02', '', 'd00042', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1060, '2566', 'et01', 're02', '', 'd00043', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1061, '2566', 'et01', 're02', '', 'd00044', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1062, '2566', 'et01', 're02', '', 'd00045', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1063, '2566', 'et01', 're02', '', 'd00046', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1064, '2566', 'et01', 're02', '', 'd00047', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1065, '2566', 'et01', 're02', '', 'd00048', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1066, '2566', 'et01', 're02', '', 'd00049', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1067, '2566', 'et01', 're02', '', 'd00050', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1068, '2566', 'et01', 're02', '', 'd00051', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1069, '2566', 'et01', 're02', '', 'd00052', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1070, '2566', 'et01', 're02', '', 'd00054', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1071, '2566', 'et01', 're02', '', 'd00055', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1072, '2566', 'et01', 're02', '', 'd00056', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1073, '2566', 'et01', 're02', '', 'd00057', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1074, '2566', 'et01', 're02', '', 'd00058', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1075, '2566', 'et01', 're02', '', 'd00059', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1076, '2566', 'et01', 're02', '', 'd00060', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1077, '2566', 'et01', 're02', '', 'd00061', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1078, '2566', 'et01', 're02', '', 'd00062', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1079, '2566', 'et01', 're02', '', 'd00063', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1080, '2566', 'et01', 're02', '', 'd00064', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1081, '2566', 'et01', 're02', '', 'd00065', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1082, '2566', 'et01', 're02', '', 'd00066', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1083, '2566', 'et01', 're02', '', 'd00067', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1084, '2566', 'et01', 're02', '', 'd00068', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1085, '2566', 'et01', 're02', '', 'd00069', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1086, '2566', 'et01', 're02', '', 'd00070', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1087, '2566', 'et01', 're02', '', 'd00071', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1088, '2566', 'et01', 're02', '', 'd00072', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1089, '2566', 'et01', 're02', '', 'd00073', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1090, '2566', 'et01', 're02', '', 'd00074', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1091, '2566', 'et01', 're02', '', 'd00075', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1092, '2566', 'et01', 're02', '', 'd00076', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1093, '2566', 'et01', 're02', '', 'd00077', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1094, '2566', 'et01', 're02', '', 'd00078', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1096, '2566', 'et01', 're02', '', 'd00080', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1097, '2566', 'et01', 're02', '', 'd99999', '', '', '', '', '', '', '', 1035);
INSERT INTO `edoc_sent` VALUES (1098, '2566', 'et03', 're01', '2023-11-09 10:28:07', 'd00008', '', '', '', 'admin,', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1099, '2566', 'et03', 're02', '', 'd00012', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1100, '2566', 'et03', 're02', '', 'd00013', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1101, '2566', 'et03', 're02', '', 'd00014', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1102, '2566', 'et03', 're02', '', 'd00015', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1103, '2566', 'et03', 're02', '', 'd00016', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1104, '2566', 'et03', 're02', '', 'd00017', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1105, '2566', 'et03', 're02', '', 'd00018', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1106, '2566', 'et03', 're02', '', 'd00019', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1107, '2566', 'et03', 're02', '', 'd00020', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1108, '2566', 'et03', 're02', '', 'd00021', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1109, '2566', 'et03', 're02', '', 'd00022', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1110, '2566', 'et03', 're02', '', 'd00023', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1111, '2566', 'et03', 're02', '', 'd00024', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1112, '2566', 'et03', 're02', '', 'd00025', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1113, '2566', 'et03', 're02', '', 'd00026', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1114, '2566', 'et03', 're02', '', 'd00027', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1115, '2566', 'et03', 're02', '', 'd00028', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1116, '2566', 'et03', 're02', '', 'd00029', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1117, '2566', 'et03', 're02', '', 'd00030', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1118, '2566', 'et03', 're02', '', 'd00031', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1119, '2566', 'et03', 're02', '', 'd00032', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1120, '2566', 'et03', 're02', '', 'd00033', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1121, '2566', 'et03', 're02', '', 'd00034', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1122, '2566', 'et03', 're02', '', 'd00035', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1123, '2566', 'et03', 're02', '', 'd00036', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1124, '2566', 'et03', 're02', '', 'd00037', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1125, '2566', 'et03', 're02', '', 'd00038', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1126, '2566', 'et03', 're02', '', 'd00039', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1127, '2566', 'et03', 're02', '', 'd00040', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1128, '2566', 'et03', 're02', '', 'd00041', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1129, '2566', 'et03', 're02', '', 'd00042', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1130, '2566', 'et03', 're02', '', 'd00043', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1131, '2566', 'et03', 're02', '', 'd00044', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1132, '2566', 'et03', 're02', '', 'd00045', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1133, '2566', 'et03', 're02', '', 'd00046', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1134, '2566', 'et03', 're02', '', 'd00047', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1135, '2566', 'et03', 're02', '', 'd00048', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1136, '2566', 'et03', 're02', '', 'd00049', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1137, '2566', 'et03', 're02', '', 'd00050', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1138, '2566', 'et03', 're02', '', 'd00051', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1139, '2566', 'et03', 're02', '', 'd00052', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1140, '2566', 'et03', 're02', '', 'd00054', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1141, '2566', 'et03', 're02', '', 'd00055', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1142, '2566', 'et03', 're02', '', 'd00056', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1143, '2566', 'et03', 're02', '', 'd00057', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1144, '2566', 'et03', 're02', '', 'd00058', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1145, '2566', 'et03', 're02', '', 'd00059', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1146, '2566', 'et03', 're02', '', 'd00060', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1147, '2566', 'et03', 're02', '', 'd00061', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1148, '2566', 'et03', 're02', '', 'd00062', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1149, '2566', 'et03', 're02', '', 'd00063', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1150, '2566', 'et03', 're02', '', 'd00064', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1151, '2566', 'et03', 're02', '', 'd00065', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1152, '2566', 'et03', 're02', '', 'd00066', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1153, '2566', 'et03', 're02', '', 'd00067', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1154, '2566', 'et03', 're02', '', 'd00068', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1155, '2566', 'et03', 're02', '', 'd00069', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1156, '2566', 'et03', 're02', '', 'd00070', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1157, '2566', 'et03', 're02', '', 'd00071', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1158, '2566', 'et03', 're02', '', 'd00072', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1159, '2566', 'et03', 're02', '', 'd00073', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1160, '2566', 'et03', 're02', '', 'd00074', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1161, '2566', 'et03', 're02', '', 'd00075', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1162, '2566', 'et03', 're02', '', 'd00076', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1163, '2566', 'et03', 're02', '', 'd00077', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1164, '2566', 'et03', 're02', '', 'd00078', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1165, '2566', 'et03', 're02', '', 'd00079', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1166, '2566', 'et03', 're02', '', 'd00080', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1167, '2566', 'et03', 're02', '', 'd99999', '', '', '', '', '', '', '', 1036);
INSERT INTO `edoc_sent` VALUES (1168, '2566', 'et01', 're02', '', 'd00067', '', '', '', '', '', '', '', 1037);

-- ----------------------------
-- Table structure for edoc_status
-- ----------------------------
DROP TABLE IF EXISTS `edoc_status`;
CREATE TABLE `edoc_status`  (
  `edoc_status_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสสถานะการดำเนินการของหนังสือ',
  `edoc_status_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL COMMENT 'ชื่อสถานะการดำเนินการของหนังสือ เช่น ดำเนินการแล้ว อยู่ระหว่างดำเนินการ',
  PRIMARY KEY (`edoc_status_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edoc_status
-- ----------------------------
INSERT INTO `edoc_status` VALUES ('st01', 'ยังไม่ดำเนินการ');
INSERT INTO `edoc_status` VALUES ('st02', 'อยู่ระหว่างดำเนินการ');
INSERT INTO `edoc_status` VALUES ('st03', 'ดำเนินการแล้ว');

-- ----------------------------
-- Table structure for edoc_type
-- ----------------------------
DROP TABLE IF EXISTS `edoc_type`;
CREATE TABLE `edoc_type`  (
  `edoc_type_id` varchar(4) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'รหัสประเภทหนังสือ',
  `edoc_type_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL COMMENT 'ชื่อประเภทหนังสือ เช่น หนังสือรับ หนังสือส่ง หนังสือเวียน',
  PRIMARY KEY (`edoc_type_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of edoc_type
-- ----------------------------
INSERT INTO `edoc_type` VALUES ('et01', 'หนังสือรับ');
INSERT INTO `edoc_type` VALUES ('et02', 'หนังสือส่ง');
INSERT INTO `edoc_type` VALUES ('et03', 'หนังสือแจ้งเวียน');
INSERT INTO `edoc_type` VALUES ('et04', 'หนังสือแจ้งเวียนวิทยุ');

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
-- Records of menu
-- ----------------------------

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
-- Records of migration
-- ----------------------------

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
-- Records of product
-- ----------------------------

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
INSERT INTO `profile` VALUES (3, ' ', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'Pacific/Kiritimati');
INSERT INTO `profile` VALUES (15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Records of social_account
-- ----------------------------

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
INSERT INTO `token` VALUES (15, 'FRc2-pzOnYpyBy_wm8QuG8ZJOAK8BJ97', 1673317125, 0);

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
  `dep_id` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `role` int(11) NULL DEFAULT 30,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `user_unique_username`(`username`) USING BTREE,
  UNIQUE INDEX `user_unique_email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (3, 'admin', 'umt.eng52@gmail.com', '$2y$12$YOkj3pZ1jWmP5kjCqSSch.2ChJBJV9GTDAMj.tmfDKYwzarIF7SQq', 'HTxKEJiNJtRAAmUktgJWUPNdA50xa9_k', 1666067666, NULL, NULL, '::1', 1666067233, 1673235653, 0, 1701933860, '0', 'd00008', 10);
INSERT INTO `user` VALUES (15, 'dep1', 'a@gmail.com', '$2y$12$iD/FGrQGWPOeqIWw1GHnoelSxaHu5aIvru5zvzaA2a3QfKuc9W0qO', 'dbdZXnlzJxLwlPjm3zD-SQ60hmebKZgo', NULL, NULL, NULL, '192.168.180.94', 1673317125, 1673317125, 0, 1699329151, '0', 'd00008', 30);

-- ----------------------------
-- Table structure for user_old
-- ----------------------------
DROP TABLE IF EXISTS `user_old`;
CREATE TABLE `user_old`  (
  `user_id` varchar(7) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '',
  `user_user` varchar(13) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'username',
  `user_pass` varchar(13) CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL DEFAULT '' COMMENT 'password',
  `user_name` text CHARACTER SET tis620 COLLATE tis620_thai_ci NOT NULL COMMENT 'ชื่อผู้ใช้งาน'
) ENGINE = MyISAM CHARACTER SET = tis620 COLLATE = tis620_thai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_old
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
