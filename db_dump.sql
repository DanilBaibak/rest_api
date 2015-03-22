/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ng_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ng_groups`;

CREATE TABLE `ng_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ng_groups` WRITE;
/*!40000 ALTER TABLE `ng_groups` DISABLE KEYS */;

INSERT INTO `ng_groups` (`id`, `name`)
VALUES
	(1,'Phone'),
	(2,'Table'),
	(3,'LapTop');

/*!40000 ALTER TABLE `ng_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ng_products
# ------------------------------------------------------------

CREATE TABLE `ng_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `cost` varchar(45) DEFAULT NULL,
  `group` varchar(45) DEFAULT NULL,
  `shipper` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table ng_shippers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ng_shippers`;

CREATE TABLE `ng_shippers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `ng_shippers` WRITE;
/*!40000 ALTER TABLE `ng_shippers` DISABLE KEYS */;

INSERT INTO `ng_shippers` (`id`, `name`)
VALUES
	(1,'Apple'),
	(2,'Sony'),
	(3,'Nokia');

/*!40000 ALTER TABLE `ng_shippers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
