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

-- Zrzut struktury tabela raspis00_test.page_types
CREATE TABLE IF NOT EXISTS `page_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` enum('dynamic','static') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.page_types: ~2 rows (około)
/*!40000 ALTER TABLE `page_types` DISABLE KEYS */;
INSERT INTO `page_types` (`id`, `type_name`) VALUES
	(1, 'dynamic'),
	(2, 'static');
/*!40000 ALTER TABLE `page_types` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
