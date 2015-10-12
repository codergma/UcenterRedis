-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: code_igniter
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `ci_user`
--

DROP TABLE IF EXISTS `ci_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户UID',
  `username` char(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` char(32) NOT NULL DEFAULT '' COMMENT '邮箱地址',
  `email_valid` int(1) NOT NULL DEFAULT '0',
  `email_valid_at` int(10) NOT NULL DEFAULT '0' COMMENT '验证时间',
  `gender` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'male:1,female:0',
  `hidden` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'hidden:1,else:0',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册IP',
  `regdate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册日期',
  `lastsigninip` char(15) NOT NULL DEFAULT '' COMMENT '最后登录IP',
  `lastsignintime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `login_expiry_at` int(11) NOT NULL DEFAULT '0',
  `salt` char(6) NOT NULL,
  `secques` char(8) NOT NULL DEFAULT '',
  `cell_num_valid` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'valid:1,invalid:0',
  `cell_num` varchar(20) NOT NULL DEFAULT '' COMMENT 'cell-phone number',
  `wx_login_openid` varchar(50) DEFAULT NULL COMMENT '微信登录openid',
  `openid` varchar(50) DEFAULT NULL COMMENT '微信openid',
  `is_bind` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否绑定微信',
  `user_profile` varchar(1024) NOT NULL COMMENT '个人简介',
  `user_signature` varchar(256) NOT NULL COMMENT '个性签名',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `cell_num` (`cell_num`),
  KEY `openid` (`openid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-12 11:52:36
