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

-- Zrzut struktury tabela raspis00_test.routes
CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_station` int(11) NOT NULL,
  `end_station` int(11) DEFAULT NULL,
  `transit_path` longtext,
  `made_by` int(11) DEFAULT NULL,
  `regularity` text,
  PRIMARY KEY (`id`),
  KEY `fk_reference_17` (`made_by`),
  KEY `fk_re2` (`start_station`),
  KEY `fk_re3` (`end_station`),
  CONSTRAINT `fk_re2` FOREIGN KEY (`start_station`) REFERENCES `stations` (`id`),
  CONSTRAINT `fk_re3` FOREIGN KEY (`end_station`) REFERENCES `stations` (`id`),
  CONSTRAINT `fk_reference_17` FOREIGN KEY (`made_by`) REFERENCES `company` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.routes: ~11 rows (około)
/*!40000 ALTER TABLE `routes` DISABLE KEYS */;
INSERT INTO `routes` (`id`, `start_station`, `end_station`, `transit_path`, `made_by`, `regularity`) VALUES
	(1, 1, 4, '1,2', 1, '2,4'),
	(2, 2, 9, '3,4', 2, '1,3'),
	(3, 3, 7, '5,6', 3, '2,5'),
	(4, 1, 3, NULL, 1, '2,7'),
	(5, 1, 3, NULL, 1, '2,7'),
	(6, 1, 3, NULL, 1, '2,7'),
	(7, 1, 3, NULL, 1, '2,7'),
	(8, 1, 3, NULL, 1, '2,7'),
	(9, 1, 3, '13,14,15', 1, '2,7'),
	(14, 1, 3, '28,29,30', 1, '2,7'),
	(15, 1, 3, '31,32,33', 1, '2,7');
/*!40000 ALTER TABLE `routes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
