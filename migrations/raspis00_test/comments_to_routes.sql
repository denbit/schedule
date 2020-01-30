-- --------------------------------------------------------
-- Host:                         raspis00.mysql.tools
-- Wersja serwera:               5.7.16-10-log - Percona Server (GPL), Release 10, Revision a0c7d0d
-- Serwer OS:                    Linux
-- HeidiSQL Wersja:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Zrzut struktury tabela raspis00_test.comments_to_routes
CREATE TABLE IF NOT EXISTS `comments_to_routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` longtext,
  `ansewer_to_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reference_15` (`route_id`),
  KEY `fk_reference_16` (`ansewer_to_id`),
  CONSTRAINT `fk_reference_15` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`),
  CONSTRAINT `fk_reference_16` FOREIGN KEY (`ansewer_to_id`) REFERENCES `comments_to_routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.comments_to_routes: ~3 rows (około)
/*!40000 ALTER TABLE `comments_to_routes` DISABLE KEYS */;
INSERT INTO `comments_to_routes` (`id`, `route_id`, `name`, `email`, `comment`, `ansewer_to_id`) VALUES
	(1, 1, 'Сюзанна', 'suza@gmail.com', 'все супер, понравилось', 1),
	(2, 2, 'Николь', 'nika@gmail.com', 'очень круто', 2),
	(3, 3, 'Екатерина', 'katia@gmail.com', 'вау, круто', 3);
/*!40000 ALTER TABLE `comments_to_routes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
