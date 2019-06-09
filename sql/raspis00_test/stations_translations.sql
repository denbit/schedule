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

-- Zrzut struktury tabela raspis00_test.stations_translations
CREATE TABLE IF NOT EXISTS `stations_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `station_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reference_9` (`station_id`),
  KEY `FK_stations_translations_site_langs` (`lang_id`),
  CONSTRAINT `FK_stations_translations_site_langs` FOREIGN KEY (`lang_id`) REFERENCES `site_langs` (`lang_id`),
  CONSTRAINT `fk_reference_9` FOREIGN KEY (`station_id`) REFERENCES `stations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.stations_translations: ~27 rows (około)
/*!40000 ALTER TABLE `stations_translations` DISABLE KEYS */;
INSERT INTO `stations_translations` (`id`, `lang_id`, `name`, `description`, `station_id`) VALUES
	(1, 1, 'гоптовка', 'Метро:\r\nАвтостанция удалена от центра Москвы. Лучший и быстрый вариант - добраться на метро. Ближайшая станция "Щёлковская" - это конечная по Арбатско-Покровской линии. Потом до автостанции "Центральная" пройтись пешком пару минут.\r\nДругие виды транспорта:\r\nМожно сесть на общественный транспорт, но учитывайте вероятность пробок и пересадок.\r\nЕсли вы находитесь в одном их аэропортов Москвы, то намного проще воспользоваться аэроэкспрессом и дальше следовать на метро https://aeroexpress.ru/\r\nАвтостанция «Центральная» открыта на время реконструкции Центрального автовокзала Москвы. Она построена под дорожной эстакадой Щёлковского шоссе недалеко от перекрёстка с 9-й Парковой и Уральской улицами.\r\nОснащение:\r\nперроны;\r\nбилетные кассы;\r\nкомфортный зал ожидания;\r\nинформационные табло;\r\nнавигационные указатели.\r\nС 24 апреля 2017 года на неё переведены все пригородные маршруты Московской области и некоторые междугородние маршруты. У автостанции две зоны для посадки, разделённые оживлённым перекрёстком. С одной отправляются автобусы среднего, большого и особо большого класса вместимости, а с другой - микроавтобусы, даже если они следуют в одном направлении. Рекомендуется выбирать вид транспорта до выхода из метро.', 1),
	(2, 2, 'Гоптівка', 'Метро:\r\nАвтостанція віддалена від центру Москви. Кращий і швидкий варіант - дістатися на метро. Найближча станція "Щолківська" - це кінцева по Арбатсько-Покровської лінії. Потім до автостанції "Центральна" пройтися пішки пару хвилин.\r\nІнші види транспорту:\r\nМожна сісти на громадський транспорт, але враховуйте ймовірність пробок і пересадок.\r\nЯкщо ви перебуваєте в одному їх аеропортів Москви, то набагато простіше скористатися Аероекспрес і далі слідувати на метро https://aeroexpress.ru/\r\nАвтостанція «Центральна» відкрита на час реконструкції Центрального автовокзалу Москви. Вона побудована під дорожньої естакадою Щелковського шосе недалеко від перехрестя з 9-й Парковій і Уральської вулицями.\r\nоснащення:\r\nперони;\r\nквиткові каси;\r\nкомфортний зал очікування;\r\nінформаційні табло;\r\nнавігаційні вказівники.\r\nЗ 24 квітня 2017 року на неї переведені всі приміські маршрути Московської області і деякі міжміські маршрути. У автостанції дві зони для посадки, розділені жвавим перехрестям. З одного відправляються автобуси середнього, великого й особливо великого класу місткості, а з іншого - мікроавтобуси, навіть якщо вони йдуть в одному напрямку. Рекомендується вибирати вид транспорту до виходу з метро.', 1),
	(3, 3, 'Goptivka', 'Metro:\r\nThe bus station is remote from the center of Moscow. The best and fastest option is to get on the metro. The nearest station is "Shchelkovskaya" - it is the terminal on the Arbat-Pokrovskaya line. Then walk to the bus station "Central" walk a couple of minutes.\r\nOther types of transport:\r\nYou can take public transport, but consider the probability of traffic jams and transplants.\r\nIf you are in one of their airports in Moscow, it is much easier to take aeroexpress and continue to follow the metro https://aeroexpress.ru/\r\nBus station "Central" is open for the time of reconstruction of the Central Bus Station in Moscow. It was built under the road overpass of Schelkovsky Highway near the intersection with the 9th Park and Ural streets.\r\nEquipment:\r\naprons;\r\nticket offices;\r\ncomfortable waiting room;\r\ninformation boards;\r\nnavigation signs.\r\nSince April 24, 2017 all suburban routes of the Moscow region and some intercity routes have been transferred to it. The bus station has two zones for landing, separated by a busy intersection. With one, buses of medium, large and extra large capacity are dispatched, and on the other, minibuses, even if they follow the same direction. It is recommended to choose the mode of transport before exiting the metro.', 1),
	(4, 1, 'Джизза', 'Метро:Автостанция удалена от центра Киева', 3),
	(5, 2, 'Джізза', 'Метро:Автостанція віддалена від центра Києва', 3),
	(6, 3, 'jizza', 'Metro:The bus station is remote from the center of Kyiv', 3),
	(7, 1, 'Низза', 'Метро:Автостанция удалена от центра Харькова', 2),
	(8, 2, 'Нізза', 'Метро:Автостанція віддалена від центра Харкова', 2),
	(9, 3, 'nizza', 'Metro:The bus station is remote from the center of Kharkov', 2),
	(10, 1, 'гоптовка2', 'Метро:Автостанция удалена от центра Донецка', 4),
	(11, 2, 'гоптівка2', 'Метро:Автостанція віддалена від центра Донецька', 4),
	(12, 3, 'Goptivka2', 'Metro:The bus station is remote from the center of Donetsk', 4),
	(13, 1, 'Гоптовка3', 'Метро:Автостанция удалена от центра Луганска', 5),
	(14, 2, 'Гоптівка3', 'Метро:Автостанція віддалена від центра Луганська', 5),
	(15, 3, 'Goptivka3', 'Metro:The bus station is remote from the center of Lugansk', 5),
	(16, 1, 'Джизза2', 'Метро:Автостанция удалена от центра Днепра', 6),
	(17, 2, 'Джізза2', 'Метро:Автостанція віддалена від центра Дніпра', 6),
	(18, 3, 'jizza2', 'Metro:The bus station is remote from the center of Dnipro', 6),
	(19, 1, 'Джизза3', 'Метро:Автостанция удалена от центра Львова ', 7),
	(20, 2, 'Джізза3', 'Метро:Автостанція віддалена від центра Львова', 7),
	(21, 3, 'jizza3', 'Metro:The bus station is remote from the center of lviv', 7),
	(22, 1, 'Низза2', 'Метро:Автостанция удалена от центра Карпат', 8),
	(23, 2, 'Нізза2', 'Метро:Автостанція віддалена від центра Карпат', 8),
	(24, 3, 'nizza2', 'Metro:The bus station is remote from the center of Karpaty', 8),
	(25, 1, 'Низза3', 'Метро:Автостанция удалена от центра Мариуполь', 9),
	(26, 2, 'Нізза3', 'Метро:Автостанція віддалена від центра Маріуполя', 9),
	(27, 3, 'nizza3', 'Metro:The bus station is remote from the center of Maryupol', 9);
/*!40000 ALTER TABLE `stations_translations` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
