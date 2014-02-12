/*
SQLyog Ultimate - MySQL GUI v8.21 
MySQL - 5.1.36-community-log : Database - active_record
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`active_record` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `active_record`;

/*Table structure for table `book_images` */

DROP TABLE IF EXISTS `book_images`;

CREATE TABLE `book_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` bigint(20) DEFAULT NULL,
  `caption` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `imagename` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(5) DEFAULT '1',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `account_id` (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `book_images` */

insert  into `book_images`(`id`,`book_id`,`caption`,`description`,`imagename`,`order`,`status`,`created`,`updated`) values (1,1,'test',NULL,'1389412818_desert.jpg',NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,'Test 2',NULL,'1389412915_hydrangeas.jpg',NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `books` */

insert  into `books`(`id`,`name`,`author`) values (1,'Book 1','Mr Salim Khan');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
