/*
Navicat MySQL Data Transfer

Source Server         : segundods
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : gym

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-11-01 15:55:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE `tb_usuarios` (
  `id_usuario` int(8) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(25) NOT NULL,
  `apellido_usuario` varchar(25) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `fecha_expiracion` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
