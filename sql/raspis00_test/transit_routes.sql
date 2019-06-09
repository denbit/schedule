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

-- Zrzut struktury tabela raspis00_test.transit_routes
CREATE TABLE IF NOT EXISTS `transit_routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id_station` int(11) DEFAULT NULL,
  `to_id_station` int(11) DEFAULT NULL,
  `arrival` time DEFAULT NULL,
  `departure` time DEFAULT NULL,
  `belongs_to_route` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reference_11` (`belongs_to_route`),
  KEY `fk_re4` (`from_id_station`),
  KEY `fk_re5` (`to_id_station`),
  CONSTRAINT `fk_re4` FOREIGN KEY (`from_id_station`) REFERENCES `stations` (`id`),
  CONSTRAINT `fk_re5` FOREIGN KEY (`to_id_station`) REFERENCES `stations` (`id`),
  CONSTRAINT `fk_reference_11` FOREIGN KEY (`belongs_to_route`) REFERENCES `routes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.transit_routes: ~21 rows (około)
/*!40000 ALTER TABLE `transit_routes` DISABLE KEYS */;
INSERT INTO `transit_routes` (`id`, `from_id_station`, `to_id_station`, `arrival`, `departure`, `belongs_to_route`) VALUES
	(1, 2, 8, '15:46:02', '18:46:08', 1),
	(2, 8, 9, '16:49:03', '19:49:08', 1),
	(3, 1, 5, '15:49:46', '16:49:47', 2),
	(4, 8, 9, '15:50:15', '16:50:17', 2),
	(5, 3, 6, '17:50:36', '19:50:41', 3),
	(6, 6, 7, '18:51:03', '20:51:07', 3),
	(7, 1, 1, '00:00:00', '00:20:00', 7),
	(8, 4, 4, '01:00:00', '01:05:00', 7),
	(9, 2, 2, '03:00:00', '00:00:00', 7),
	(10, 1, 4, '00:00:00', '00:20:00', 8),
	(11, 4, 2, '01:00:00', '01:05:00', 8),
	(12, 2, 3, '03:00:00', '00:00:00', 8),
	(13, 1, 4, '00:00:00', '00:20:00', 9),
	(14, 4, 2, '01:00:00', '01:05:00', 9),
	(15, 2, 3, '03:00:00', '00:00:00', 9),
	(28, 1, 4, '00:00:00', '00:20:00', 14),
	(29, 4, 2, '01:00:00', '01:05:00', 14),
	(30, 2, 3, '03:00:00', '00:00:00', 14),
	(31, 1, 4, '00:00:00', '00:20:00', 15),
	(32, 4, 2, '01:00:00', '01:05:00', 15),
	(33, 2, 3, '03:00:00', '00:00:00', 15);
/*!40000 ALTER TABLE `transit_routes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
