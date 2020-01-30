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

-- Zrzut struktury tabela raspis00_test.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `cyr_name` varchar(255) NOT NULL,
  `latin_name` varchar(255) NOT NULL,
  `national_name` varchar(255) NOT NULL,
  `is_regional` smallint(6) DEFAULT NULL,
  `local_district_id` int(11) DEFAULT NULL,
  `belongs_to_region` int(11) DEFAULT NULL,
  `notice` longtext,
  PRIMARY KEY (`id`),
  KEY `fk_reference_24` (`belongs_to_region`),
  KEY `fk_reference_7` (`country_id`),
  KEY `fk_reference_25` (`local_district_id`),
  CONSTRAINT `fk_reference_24` FOREIGN KEY (`local_district_id`) REFERENCES `local_regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_reference_7` FOREIGN KEY (`country_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.cities: ~25 rows (około)
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`, `country_id`, `cyr_name`, `latin_name`, `national_name`, `is_regional`, `local_district_id`, `belongs_to_region`, `notice`) VALUES
	(1, 0, 'Винница', 'Vinnytsia', 'Вінниця', 1, NULL, NULL, NULL),
	(2, 0, 'Луцк', 'Lutsk', 'Луцк', 1, NULL, NULL, NULL),
	(3, 0, 'Днепр', 'Dnipro', 'Дніпро', 1, NULL, NULL, NULL),
	(4, 0, 'Донецк', 'Donetsk', 'Донецьк', 1, NULL, NULL, NULL),
	(5, 0, 'Житомир', 'Zhytomyr', 'Житомир', 1, NULL, NULL, NULL),
	(7, 0, 'Запорожье', 'Zaporizhzhia', 'Запоріжжя', 1, NULL, NULL, NULL),
	(8, 0, 'Ивано-Франковск', 'Ivano-Frankivsk', 'Івано-Франківськ', 1, NULL, NULL, NULL),
	(9, 0, 'Киев', 'Kyiv', 'Київ', 1, NULL, NULL, NULL),
	(10, 0, 'Кропивницький', 'Kropyvnytsky', 'Кропивницкий', 1, NULL, NULL, NULL),
	(11, 0, 'Луганск', 'Luhansk', 'Луганськ', 1, NULL, NULL, NULL),
	(12, 0, 'Львов', 'Lviv', 'Львів', 1, NULL, NULL, NULL),
	(13, 0, 'Николаев', 'Mykolaiv', 'Миколаїв', 1, NULL, NULL, NULL),
	(14, 0, 'Одесса', 'Odesa', 'Одеса', 1, NULL, NULL, NULL),
	(15, 0, 'Полтава', 'Poltava', 'Полтава', 1, NULL, NULL, NULL),
	(16, 0, 'Ровно', 'Rivne', 'Рівне', 1, NULL, NULL, NULL),
	(17, 0, 'Сумы', 'Sumy', 'Суми', 1, NULL, NULL, NULL),
	(18, 0, 'Тернополь', 'Ternopil', 'Тернопіль', 1, NULL, NULL, NULL),
	(19, 0, 'Харьков', 'Kharkiv', 'Харків', 1, NULL, NULL, NULL),
	(20, 0, 'Херсон', 'Kherson', 'Херсон', 1, NULL, NULL, NULL),
	(21, 0, 'Хмельницк', 'Khmelnytsky', 'Хмельницьк', 1, NULL, NULL, NULL),
	(22, 0, 'Черкассы', 'Cherkasy', 'Черкаси', 1, NULL, NULL, NULL),
	(23, 0, 'Черновцы', 'Chernivtsi', 'Чернівці', 1, NULL, NULL, NULL),
	(24, 0, 'Чернигов', 'Chernihiv', 'Чернігів', 1, NULL, NULL, NULL),
	(25, 0, 'АР Крым', 'AR Krym', 'АР Крим', 1, NULL, NULL, NULL),
	(26, 0, 'Ужгород', 'Uzhgorod', 'Ужгород', 1, NULL, NULL, NULL);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
