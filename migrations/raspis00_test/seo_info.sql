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

-- Zrzut struktury tabela raspis00_test.seo_info
CREATE TABLE IF NOT EXISTS `seo_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_page` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext,
  `name` varchar(255) DEFAULT NULL,
  `before_route` longtext,
  `menu_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_seo_info_pages` (`to_page`),
  CONSTRAINT `FK_seo_info_pages` FOREIGN KEY (`to_page`) REFERENCES `pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.seo_info: ~3 rows (około)
/*!40000 ALTER TABLE `seo_info` DISABLE KEYS */;
INSERT INTO `seo_info` (`id`, `to_page`, `title`, `description`, `name`, `before_route`, `menu_title`) VALUES
	(1, 0, 'main', 'Main', 'main', 'smth', 'smth'),
	(2, 2, 'Головна', 'Головна', 'Головна', 'Головна', 'Головна'),
	(3, 3, 'Главная', 'Главная', 'Главная', 'Главная', 'Главная');
/*!40000 ALTER TABLE `seo_info` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
