#CREATE DATABASE message_db;

#USE message_db;

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `company_name`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` char(3) NOT NULL,
  `password` varchar(30) NOT NULL,
  `number` int(15) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

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


-- ----------------------------
-- Table structure for `stock_data`
-- ----------------------------
DROP TABLE IF EXISTS `message_content`;
CREATE TABLE `message_content` (
  `number` int(15) NOT NULL,
  `receiver` int(15) NOT NULL,
  `time` varchar(20) NOT NULL,
  `bearer` VARCHAR(10) NOT NULL,
  `ref` int(10) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`number`)

)