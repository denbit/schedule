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

-- Zrzut struktury tabela raspis00_test.stations
CREATE TABLE IF NOT EXISTS `stations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_intermediated` smallint(6) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `cyr_name` varchar(255) DEFAULT NULL,
  `latin_name` varchar(255) DEFAULT NULL,
  `national_name` varchar(255) DEFAULT NULL,
  `desc_for_own` varchar(50) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `translated_info_cached` longtext,
  PRIMARY KEY (`id`),
  KEY `fk_reference_8` (`city_id`),
  CONSTRAINT `fk_reference_8` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.stations: ~10 rows (około)
/*!40000 ALTER TABLE `stations` DISABLE KEYS */;
INSERT INTO `stations` (`id`, `is_intermediated`, `city_id`, `cyr_name`, `latin_name`, `national_name`, `desc_for_own`, `tel`, `translated_info_cached`) VALUES
	(1, 1, 1, 'Винница глваная', NULL, NULL, 'hopta', '990052', NULL),
	(2, 1, 3, 'Днепр', 'Днепр', 'Днепр', 'nizza', '920056', NULL),
	(3, 1, 2, NULL, NULL, NULL, 'jizza', '920033', NULL),
	(4, 1, 1, 'Виница Ас2', NULL, NULL, 'hopta2', '990052', NULL),
	(5, 1, 1, 'Южная', NULL, NULL, 'hopta3', '990052', NULL),
	(6, 1, 2, NULL, NULL, NULL, 'jizza2', '920033', NULL),
	(7, 1, 2, NULL, NULL, NULL, 'jizza3', '920033', NULL),
	(8, 1, 3, NULL, NULL, NULL, 'nizza2', '920056', NULL),
	(9, 1, 3, NULL, NULL, NULL, 'nizza3', '920056', NULL),
	(10, 1, 9, 'Киев Главн', 'Kyiv Golovnyj', 'Київ Головний', NULL, NULL, NULL);
/*!40000 ALTER TABLE `stations` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
