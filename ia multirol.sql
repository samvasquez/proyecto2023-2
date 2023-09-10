/*
Navicat MySQL Data Transfer

Source Server         : My-MSQL
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ia multirol

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-09-07 17:02:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `drivers`
-- ----------------------------
DROP TABLE IF EXISTS `drivers`;
CREATE TABLE `drivers` (
`ID_driver`  decimal(10,0) NOT NULL ,
`ID_user`  varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`driver_name`  char(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
PRIMARY KEY (`ID_driver`),
INDEX `ID_driver` (`ID_driver`) USING BTREE ,
INDEX `driver_name` (`driver_name`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_general_ci

;

-- ----------------------------
-- Records of drivers
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `setup`
-- ----------------------------
DROP TABLE IF EXISTS `setup`;
CREATE TABLE `setup` (
`ID_user`  varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' ,
`setup`  varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`password`  decimal(65,0) NULL DEFAULT '' ,
PRIMARY KEY (`setup`),
FOREIGN KEY (`password`) REFERENCES `user` (`password`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `setup_ibfk_1` (`password`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_general_ci

;

-- ----------------------------
-- Records of setup
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `store network`
-- ----------------------------
DROP TABLE IF EXISTS `store network`;
CREATE TABLE `store network` (
`ID_user`  varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`user_name`  char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`info`  varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '' ,
`ID_driver`  decimal(10,0) NULL DEFAULT '' ,
`password`  decimal(25,0) NULL DEFAULT '' ,
PRIMARY KEY (`user_name`),
FOREIGN KEY (`ID_driver`) REFERENCES `drivers` (`ID_driver`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`password`) REFERENCES `user` (`password`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `enlace` (`ID_driver`) USING BTREE ,
INDEX `x` (`password`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_general_ci

;

-- ----------------------------
-- Records of store network
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
`ID_user`  varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`password`  decimal(20,0) NOT NULL ,
`email`  varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
PRIMARY KEY (`ID_user`),
FOREIGN KEY (`ID_user`) REFERENCES `users_credential` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `password` (`password`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_general_ci

;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('0011', '1994', '');
COMMIT;

-- ----------------------------
-- Table structure for `users_credential`
-- ----------------------------
DROP TABLE IF EXISTS `users_credential`;
CREATE TABLE `users_credential` (
`ID_user`  varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`password_user_2`  decimal(10,0) NOT NULL ,
`name_user2`  text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL ,
`password`  decimal(10,0) NOT NULL ,
PRIMARY KEY (`password_user_2`),
INDEX `password` (`password`) USING BTREE ,
INDEX `ID_user` (`ID_user`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8mb4 COLLATE=utf8mb4_general_ci

;

-- ----------------------------
-- Records of users_credential
-- ----------------------------
BEGIN;
INSERT INTO `users_credential` VALUES ('0011', '0', '', '1994');
COMMIT;
