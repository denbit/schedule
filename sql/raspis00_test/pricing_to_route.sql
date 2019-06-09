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

-- Zrzut struktury tabela raspis00_test.pricing_to_route
CREATE TABLE IF NOT EXISTS `pricing_to_route` (
  `from_station_id` int(11) DEFAULT NULL,
  `to_station_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `currency` varchar(4) DEFAULT NULL,
  `to_route` int(11) DEFAULT NULL,
  KEY `fk_reference_19` (`to_route`),
  KEY `fk_re6` (`from_station_id`),
  KEY `fk_re7` (`to_station_id`),
  CONSTRAINT `fk_re6` FOREIGN KEY (`from_station_id`) REFERENCES `stations` (`id`),
  CONSTRAINT `fk_re7` FOREIGN KEY (`to_station_id`) REFERENCES `stations` (`id`),
  CONSTRAINT `fk_reference_19` FOREIGN KEY (`to_route`) REFERENCES `routes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.pricing_to_route: ~7 rows (około)
/*!40000 ALTER TABLE `pricing_to_route` DISABLE KEYS */;
INSERT INTO `pricing_to_route` (`from_station_id`, `to_station_id`, `price`, `currency`, `to_route`) VALUES
	(2, 8, 10, '12', 1),
	(8, 9, 11, '15', 1),
	(1, 5, 20, '25', 2),
	(8, 9, 21, '25', 2),
	(4, 3, 30, '35', 15),
	(1, 3, 40, 'usd', 15),
	(1, 4, 45, 'uah', 15);
/*!40000 ALTER TABLE `pricing_to_route` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
