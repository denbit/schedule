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

-- Zrzut struktury tabela raspis00_test.reviews_to_company
CREATE TABLE IF NOT EXISTS `reviews_to_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` longtext,
  `ansewer_to_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reference_1` (`company_id`),
  KEY `fk_reference_18` (`ansewer_to_id`),
  CONSTRAINT `fk_reference_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  CONSTRAINT `fk_reference_18` FOREIGN KEY (`ansewer_to_id`) REFERENCES `reviews_to_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.reviews_to_company: ~3 rows (około)
/*!40000 ALTER TABLE `reviews_to_company` DISABLE KEYS */;
INSERT INTO `reviews_to_company` (`id`, `company_id`, `name`, `email`, `comment`, `ansewer_to_id`) VALUES
	(1, 1, 'Игорь ', 'blabla@gmail.com', 'супер круто', 1),
	(2, 2, 'Андрей', 'superyeah@gmail.com', 'фу,фигня', 2),
	(3, 3, 'Вячеслав', 'superslav@gmail.com', 'офигеть жесть', 3);
/*!40000 ALTER TABLE `reviews_to_company` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
