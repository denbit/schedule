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

-- Zrzut struktury tabela raspis00_test.lang_desc
CREATE TABLE IF NOT EXISTS `lang_desc` (
  `in_lang_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `to_lang` int(11) DEFAULT NULL,
  KEY `fk_reference_23` (`to_lang`),
  KEY `fk_re` (`in_lang_id`),
  CONSTRAINT `fk_re` FOREIGN KEY (`in_lang_id`) REFERENCES `site_langs` (`lang_id`),
  CONSTRAINT `fk_reference_23` FOREIGN KEY (`to_lang`) REFERENCES `site_langs` (`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.lang_desc: ~9 rows (około)
/*!40000 ALTER TABLE `lang_desc` DISABLE KEYS */;
INSERT INTO `lang_desc` (`in_lang_id`, `description`, `to_lang`) VALUES
	(1, 'Русский ', 1),
	(1, 'Украинский', 2),
	(1, 'Английский', 3),
	(2, 'Російська', 1),
	(2, 'Українська', 2),
	(2, 'Англійська', 3),
	(3, 'Russia', 1),
	(3, 'Ukraine', 2),
	(3, 'English', 3);
/*!40000 ALTER TABLE `lang_desc` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
