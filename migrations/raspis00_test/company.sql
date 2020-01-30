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

-- Zrzut struktury tabela raspis00_test.company
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `cyr_name` varchar(255) DEFAULT NULL,
  `latin_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cyr_address` varchar(255) DEFAULT NULL,
  `latin_address` varchar(255) DEFAULT NULL,
  `judicial_form` longtext,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_users_id_fk` (`user_id`),
  CONSTRAINT `company_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.company: ~3 rows (około)
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` (`id`, `name`, `cyr_name`, `latin_name`, `address`, `cyr_address`, `latin_address`, `judicial_form`, user_id) VALUES
	(1, 'Без компании', 'Перевозка', 'Perevozka', 'Харків,Мира4', 'Харьков, Мира 4', 'Kharkiv,Mira 4', 'ЧП', NULL),
	(2, 'Компания', 'Перевозка', 'Perevozka', 'Харків,Мира5', 'Харьков, Мира 5', 'Kharkiv,Mira 5', 'ИП', NULL),
	(3, 'Супер компания', 'Перевозка', 'Perevozka', 'Харків,Мира6', 'Харьков, Мира 6', 'Kharkiv,Mira 6', 'ООО', NULL);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
