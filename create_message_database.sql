CREATE DATABASE message_db;

USE message_db;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` BIGINT(30) NOT NULL,
  PRIMARY KEY (`number`)
) ;


DROP TABLE IF EXISTS `message_content`;
CREATE TABLE `message_content` (
  `message_id` BIGINT(15) NOT NULL AUTO_INCREMENT,
  `number` BIGINT(15) NULL,
  `receiver` BIGINT(15)  NULL,
  `time` varchar(20) NOT NULL,
  `bearer` VARCHAR(10) NOT NULL,
  `ref` int(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`message_id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;