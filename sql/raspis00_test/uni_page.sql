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

-- Zrzut struktury tabela raspis00_test.uni_page
CREATE TABLE IF NOT EXISTS `uni_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(500) DEFAULT NULL,
  `module_name` varchar(50) DEFAULT NULL,
  `has_permanent_uri` tinyint(1) DEFAULT '0',
  `lang_id` int(11) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reference_3` (`lang_id`),
  KEY `fk_reference_4` (`page_id`),
  CONSTRAINT `fk_reference_3` FOREIGN KEY (`lang_id`) REFERENCES `site_langs` (`lang_id`),
  CONSTRAINT `fk_reference_4` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.uni_page: ~6 rows (około)
/*!40000 ALTER TABLE `uni_page` DISABLE KEYS */;
INSERT INTO `uni_page` (`id`, `url`, `module_name`, `has_permanent_uri`, `lang_id`, `page_id`) VALUES
	(1, '/', 'index', 1, 2, 2),
	(2, '/', 'index', 1, 3, 0),
	(3, '/', 'index', 1, 1, 3),
	(4, '/{search}/{search}', 'search', 0, 3, NULL),
	(5, '/{search}/{search}', 'search', 0, 2, NULL),
	(6, '/{search}/{search}', 'search', 0, 1, NULL);
/*!40000 ALTER TABLE `uni_page` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
