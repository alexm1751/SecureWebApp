#CREATE DATABASE message_db;

#USE message_db;

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` char(3) NOT NULL,
  `password` varchar(30) NOT NULL,
  `number` int(15) NOT NULL,
  PRIMARY KEY (`number`)
) ;

# -- ----------------------------
# -- Table structure for `error_log`
# -- ----------------------------
# DROP TABLE IF EXISTS `error_log`;
# CREATE TABLE `error_log` (
#   `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
#   `log_message` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
#   `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
#   PRIMARY KEY (`log_id`)
# ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `message_content`;
CREATE TABLE `message_content` (
  `message_id` INT(100) NOT NULL AUTO_INCREMENT,
  `number` BIGINT(100) NULL,
  `receiver` BIGINT(100)  NULL,
  `time` varchar(20) NOT NULL,
  `bearer` VARCHAR(10) NOT NULL,
  `ref` int(20) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`message_id`)
)ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;