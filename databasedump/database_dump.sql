/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : baseproject

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2014-12-15 14:46:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `banner_id` int(255) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `order` int(255) NOT NULL,
  `link` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('39', '4b91d83b0d645541413ce83ca2a495a2.jpg', '1', null);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `abbreviation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Category A', 'Cat.A');
INSERT INTO `categories` VALUES ('4', 'Category B', 'Cat.B');
INSERT INTO `categories` VALUES ('5', 'Category C', 'Cat.C');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `starred` int(1) DEFAULT '0',
  `img` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('107', '0002', 'Product B', 'This is the description of the product B', null, 'f1f3863faaa189738113d6d419fa200a.png', '4');

-- ----------------------------
-- Table structure for products_icons
-- ----------------------------
DROP TABLE IF EXISTS `products_icons`;
CREATE TABLE `products_icons` (
  `product_icon_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  PRIMARY KEY (`product_icon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=398 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products_icons
-- ----------------------------
INSERT INTO `products_icons` VALUES ('397', 'Icon 1', '107', '1878befdbcdb11a4693d68f4d3813a4e.png');

-- ----------------------------
-- Table structure for ufs
-- ----------------------------
DROP TABLE IF EXISTS `ufs`;
CREATE TABLE `ufs` (
  `uf_id` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`uf_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ufs
-- ----------------------------
INSERT INTO `ufs` VALUES ('AC', 'Acre');
INSERT INTO `ufs` VALUES ('AL', 'Alagoas');
INSERT INTO `ufs` VALUES ('AP', 'Amapá');
INSERT INTO `ufs` VALUES ('AM', 'Amazonas');
INSERT INTO `ufs` VALUES ('BA', 'Bahia');
INSERT INTO `ufs` VALUES ('CE', 'Ceará');
INSERT INTO `ufs` VALUES ('DF', 'Distrito Federal');
INSERT INTO `ufs` VALUES ('ES', 'Espírito Santo');
INSERT INTO `ufs` VALUES ('GO', 'Goiás');
INSERT INTO `ufs` VALUES ('MA', 'Maranhão');
INSERT INTO `ufs` VALUES ('MT', 'Mato Grosso');
INSERT INTO `ufs` VALUES ('MS', 'Mato Grosso do Sul');
INSERT INTO `ufs` VALUES ('MG', 'Minas Gerais');
INSERT INTO `ufs` VALUES ('PA', 'Pará');
INSERT INTO `ufs` VALUES ('PB', 'Paraíba');
INSERT INTO `ufs` VALUES ('PR', 'Paraná');
INSERT INTO `ufs` VALUES ('PE', 'Pernambuco');
INSERT INTO `ufs` VALUES ('PI', 'Piauí');
INSERT INTO `ufs` VALUES ('RJ', 'Rio de Janeiro');
INSERT INTO `ufs` VALUES ('RN', 'Rio Grande do Norte');
INSERT INTO `ufs` VALUES ('RS', 'Rio Grande do Sul');
INSERT INTO `ufs` VALUES ('RO', 'Rondônia');
INSERT INTO `ufs` VALUES ('RR', 'Roraima');
INSERT INTO `ufs` VALUES ('SC', 'Santa Catarina');
INSERT INTO `ufs` VALUES ('SP', 'São Paulo');
INSERT INTO `ufs` VALUES ('SE', 'Sergipe');
INSERT INTO `ufs` VALUES ('TO', 'Tocantins');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `email` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `last_login` int(11) DEFAULT NULL,
  `last_ip` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `level` varchar(1) CHARACTER SET latin1 DEFAULT '0',
  `record` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Gustavo Pezzi', 'gustavocp@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '1418658075', '127.0.0.1', '', '1313502341');
