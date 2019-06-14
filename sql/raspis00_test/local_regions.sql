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

-- Zrzut struktury tabela raspis00_test.local_regions
CREATE TABLE IF NOT EXISTS `local_regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latin_name` varchar(255) NOT NULL,
  `national_name` varchar(255) NOT NULL,
  `cyr_name` varchar(255) NOT NULL,
  `belongs_to_region` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Індекс 2` (`belongs_to_region`)
) ENGINE=InnoDB AUTO_INCREMENT=465 DEFAULT CHARSET=utf8;

-- Zrzucanie danych dla tabeli raspis00_test.local_regions: ~464 rows (około)
/*!40000 ALTER TABLE `local_regions` DISABLE KEYS */;
INSERT INTO `local_regions` (`id`, `latin_name`, `national_name`, `cyr_name`, `belongs_to_region`) VALUES
	(1, 'barskij', 'Барський', 'Барский', 1),
	(2, 'bershadskij', 'Бершадський', 'Бершадский', 1),
	(3, 'vіnnickij', 'Вінницький', 'Винницкий', 1),
	(4, 'gajsinskij', 'Гайсинський', 'Гайсинский', 1),
	(5, 'zhmerinskij', 'Жмеринський', 'Жмеринский', 1),
	(6, 'іllіneckij', 'Іллінецький', 'Ильинецкий', 1),
	(7, 'kalinіvskij', 'Калинівський', 'Калиновский', 1),
	(8, 'kozyatinskij', 'Козятинський', 'Козятинский', 1),
	(9, 'krizhopіlskij', 'Крижопільський', 'Крыжопольский', 1),
	(10, 'lipoveckij', 'Липовецький', 'Липовецкий', 1),
	(11, 'lіtinskij', 'Літинський', 'Литинский', 1),
	(12, 'mogilіv-podіlskij', 'Могилів-Подільський', 'Могилев-Подольский', 1),
	(13, 'murovanokuriloveckij', 'Мурованокуриловецький', 'Мурованокуриловецкий', 1),
	(14, 'nemirіvskij', 'Немирівський', 'Немировский', 1),
	(15, 'oratіvskij', 'Оратівський', 'Оратовский', 1),
	(16, 'pіshhanskij', 'Піщанський', 'Песчанский', 1),
	(17, 'pogrebishhenskij', 'Погребищенський', 'Погребищенский', 1),
	(18, 'tivrіvskij', 'Тиврівський', 'Тывровский', 1),
	(19, 'tomashpіlskij', 'Томашпільський', 'Томашпольский', 1),
	(20, 'trostyaneckij', 'Тростянецький', 'Тростянецкий', 1),
	(21, 'tulchinskij', 'Тульчинський', 'Тульчинский', 1),
	(22, 'xmіlnickij', 'Хмільницький', 'Хмельницкий', 1),
	(23, 'chernіveckij', 'Чернівецький', 'Черновицкий', 1),
	(24, 'chechelnickij', 'Чечельницький', 'Чечельницкий', 1),
	(25, 'shargorodskij', 'Шаргородський', 'Шаргородский', 1),
	(26, 'yampіlskij', 'Ямпільський', 'Ямпольский', 1),
	(27, 'volodimir-volinskij', 'Володимир-Волинський', 'Владимир-Волынский', 2),
	(28, 'goroxіvskij', 'Горохівський', 'Гороховский', 2),
	(29, 'іvanichіvskij', 'Іваничівський', 'Иваничевский', 2),
	(30, 'kamіn-kashirskij', 'Камінь-Каширський', 'Камень-Каширский', 2),
	(31, 'kіvercіvskij', 'Ківерцівський', 'Киверцовский', 2),
	(32, 'kovelskij', 'Ковельський', 'Ковельский', 2),
	(33, 'lokachinskij', 'Локачинський', 'Локачинский', 2),
	(34, 'luckij', 'Луцький', 'Луцкий', 2),
	(35, 'lyubeshіvskij', 'Любешівський', 'Любешовский', 2),
	(36, 'lyubomlskij', 'Любомльський', 'Любомльский', 2),
	(37, 'manevickij', 'Маневицький', 'Маневицкий', 2),
	(38, 'ratnіvskij', 'Ратнівський', 'Куйбышевский', 2),
	(39, 'rozhishhenskij', 'Рожищенський', 'Рожищенский', 2),
	(40, 'starovizhіvskij', 'Старовижівський', 'Старовыжевский', 2),
	(41, 'turіjskij', 'Турійський', 'Турийский', 2),
	(42, 'shackij', 'Шацький', 'Шацкий', 2),
	(43, 'apostolіvskij', 'Апостолівський', 'Апостоловский', 3),
	(44, 'vasilkіvskij', 'Васильківський', 'Васильковский', 3),
	(45, 'verxnodnіprovskij', 'Верхньодніпровський', 'Верхнеднепровский', 3),
	(46, 'dnіprovskij', 'Дніпровський', 'Днепровский', 3),
	(47, 'krivorіzkij', 'Криворізький', 'Криворожский', 3),
	(48, 'krinichanskij', 'Криничанський', 'Криничанский', 3),
	(49, 'magdalinіvskij', 'Магдалинівський', 'Магдалиновский', 3),
	(50, 'mezhіvskij', 'Межівський', 'Межевской', 3),
	(51, 'nіkopolskij', 'Нікопольський', 'Никопольский', 3),
	(52, 'novomoskovskij', 'Новомосковський', 'Новомосковский', 3),
	(53, 'pavlogradskij', 'Павлоградський', 'Павлоградский', 3),
	(54, 'petrikіvskij', 'Петриківський', 'Петриковская', 3),
	(55, 'petropavlіvskij', 'Петропавлівський', 'Петропавловский', 3),
	(56, 'pokrovskij', 'Покровський', 'Покровский', 3),
	(57, 'p\'yatixatskij', 'П\'ятихатський', 'Пятихатский', 3),
	(58, 'sinelnikіvskij', 'Синельниківський', 'Синельниковский', 3),
	(59, 'solonyanskij', 'Солонянський', 'Солонянский', 3),
	(60, 'sofіїvskij', 'Софіївський', 'Софиевский', 3),
	(61, 'tomakіvskij', 'Томаківський', 'Томаковский', 3),
	(62, 'carichanskij', 'Царичанський', 'Царичанский', 3),
	(63, 'shirokіvskij', 'Широківський', 'Широковский', 3),
	(64, 'yur\'їvskij', 'Юр\'ївський', 'Юрьевский', 3),
	(65, 'baxmutskij', 'Бахмутський', 'Бахмутский', 4),
	(66, 'velikonovosіlkіvskij', 'Великоновосілківський', 'Великоновоселковский', 4),
	(67, 'volnovaskij', 'Волноваський', 'Волновахский', 4),
	(68, 'dobropіlskij', 'Добропільський', 'Добропольский', 4),
	(69, 'kostyantinіvskij', 'Костянтинівський', 'Константиновский', 4),
	(70, 'limanskij', 'Лиманський', 'Лиманский', 4),
	(71, 'mangushskij', 'Мангушський', 'Мангушський', 4),
	(72, 'mar\'їnskij', 'Мар\'їнський', 'Марьинский', 4),
	(73, 'nіkolskij', 'Нікольський', 'Никольский', 4),
	(74, 'oleksandrіvskij', 'Олександрівський', 'Александровский', 4),
	(75, 'pokrovskij', 'Покровський', 'Покровский', 4),
	(76, 'slov\'yanskij', 'Слов\'янський', 'Славянский', 4),
	(77, 'yasinuvatskij', 'Ясинуватський', 'Ясиноватский', 4),
	(78, 'andrushіvskij', 'Андрушівський', 'Андрушевский', 5),
	(79, 'baranіvskij', 'Баранівський', 'Барановский', 5),
	(80, 'berdichіvskij', 'Бердичівський', 'Бердичевский', 5),
	(81, 'brusilіvskij', 'Брусилівський', 'Брусиловский', 5),
	(82, 'єmіlchinskij', 'Ємільчинський', 'Емильчинский', 5),
	(83, 'zhitomirskij', 'Житомирський', 'Житомирский', 5),
	(84, 'korostenskij', 'Коростенський', 'Коростенский', 5),
	(85, 'korostishіvskij', 'Коростишівський', 'Коростышевский', 5),
	(86, 'luginskij', 'Лугинський', 'Лугинский', 5),
	(87, 'lyubarskij', 'Любарський', 'Любарский', 5),
	(88, 'malinskij', 'Малинський', 'Малинский', 5),
	(89, 'narodickij', 'Народицький', 'Народицкий', 5),
	(90, 'novograd-volinskij', 'Новоград-Волинський', 'Новоград-Волынский', 5),
	(91, 'ovruckij', 'Овруцький', 'Овруцкий', 5),
	(92, 'olevskij', 'Олевський', 'Олевский', 5),
	(93, 'popіlnyanskij', 'Попільнянський', 'Попельнянский', 5),
	(94, 'pulinskij', 'Пулинський', 'Пулинський', 5),
	(95, 'radomishlskij', 'Радомишльський', 'Радомышльский', 5),
	(96, 'romanіvskij', 'Романівський', 'Романовский', 5),
	(97, 'ruzhinskij', 'Ружинський', 'Ружинский', 5),
	(98, 'xoroshіvskij', 'Хорошівський', 'Хорошевского', 5),
	(99, 'chernyaxіvskij', 'Черняхівський', 'Черняховский', 5),
	(100, 'chudnіvskij', 'Чуднівський', 'Чудновский', 5),
	(101, 'beregіvskij', 'Берегівський', 'Береговский', 6),
	(102, 'velikobereznyanskij', 'Великоберезнянський', 'Великоберезнянский', 6),
	(103, 'vinogradіvskij', 'Виноградівський', 'Виноградовский', 6),
	(104, 'voloveckij', 'Воловецький', 'Воловецкий', 6),
	(105, 'іrshavskij', 'Іршавський', 'Иршавский', 6),
	(106, 'mіzhgіrskij', 'Міжгірський', 'Межгорский', 6),
	(107, 'mukachіvskij', 'Мукачівський', 'Мукачевский', 6),
	(108, 'perechinskij', 'Перечинський', 'Перечинский', 6),
	(109, 'raxіvskij', 'Рахівський', 'Раховский', 6),
	(110, 'svalyavskij', 'Свалявський', 'Свалявский', 6),
	(111, 'tyachіvskij', 'Тячівський', 'Тячевский', 6),
	(112, 'uzhgorodskij', 'Ужгородський', 'Ужгородский', 6),
	(113, 'xustskij', 'Хустський', 'Хустский', 6),
	(114, 'berdyanskij', 'Бердянський', 'Бердянский', 7),
	(115, 'bіlmackij', 'Більмацький', 'Більмацький', 7),
	(116, 'vasilіvskij', 'Василівський', 'Васильевский', 7),
	(117, 'velikobіlozerskij', 'Великобілозерський', 'Великобелозерский', 7),
	(118, 'veselіvskij', 'Веселівський', 'Веселовский', 7),
	(119, 'vіlnyanskij', 'Вільнянський', 'Вольнянский', 7),
	(120, 'gulyajpіlskij', 'Гуляйпільський', 'Гуляйпольский', 7),
	(121, 'zaporіzkij', 'Запорізький', 'Запорожский', 7),
	(122, 'kam\'yansko-dnіprovskij', 'Кам\'янсько-Дніпровський', 'Каменско-Днепровский', 7),
	(123, 'melіtopolskij', 'Мелітопольський', 'Мелитопольский', 7),
	(124, 'mixajlіvskij', 'Михайлівський', 'Михайловский', 7),
	(125, 'novomikolaїvskij', 'Новомиколаївський', 'Новониколаевский', 7),
	(126, 'orіxіvskij', 'Оріхівський', 'Ореховский', 7),
	(127, 'pologіvskij', 'Пологівський', 'Пологовский', 7),
	(128, 'priazovskij', 'Приазовський', 'Приазовский', 7),
	(129, 'primorskij', 'Приморський', 'Приморский', 7),
	(130, 'rozіvskij', 'Розівський', 'Розовский', 7),
	(131, 'tokmackij', 'Токмацький', 'Токмакский', 7),
	(132, 'chernіgіvskij', 'Чернігівський', 'Черниговский', 7),
	(133, 'yakimіvskij', 'Якимівський', 'Акимовский', 7),
	(134, 'bogorodchanskij', 'Богородчанський', 'Богородчанский', 8),
	(135, 'verxovinskij', 'Верховинський', 'Верховинский', 8),
	(136, 'galickij', 'Галицький', 'Галицкий', 8),
	(137, 'gorodenkіvskij', 'Городенківський', 'Городенковский', 8),
	(138, 'dolinskij', 'Долинський', 'Долинский', 8),
	(139, 'kaluskij', 'Калуський', 'Кольский', 8),
	(140, 'kolomijskij', 'Коломийський', 'Коломыйский', 8),
	(141, 'kosіvskij', 'Косівський', 'Косовский', 8),
	(142, 'nadvіrnyanskij', 'Надвірнянський', 'Надворнянский', 8),
	(143, 'rogatinskij', 'Рогатинський', 'Рогатинский', 8),
	(144, 'rozhnyatіvskij', 'Рожнятівський', 'Рожнятовский', 8),
	(145, 'snyatinskij', 'Снятинський', 'Снятинский', 8),
	(146, 'tismenickij', 'Тисменицький', 'Тисменицкий', 8),
	(147, 'tlumackij', 'Тлумацький', 'Толмацкий', 8),
	(148, 'barishіvskij', 'Баришівський', 'Барышевский', 9),
	(149, 'bіlocerkіvskij', 'Білоцерківський', 'Белоцерковский', 9),
	(150, 'boguslavskij', 'Богуславський', 'Богуславский', 9),
	(151, 'borispіlskij', 'Бориспільський', 'Бориспольский', 9),
	(152, 'borodyanskij', 'Бородянський', 'Бородянский', 9),
	(153, 'brovarskij', 'Броварський', 'Броварской', 9),
	(154, 'vasilkіvskij', 'Васильківський', 'Васильковский', 9),
	(155, 'vishgorodskij', 'Вишгородський', 'Вышгородский', 9),
	(156, 'volodarskij', 'Володарський', 'Володарский', 9),
	(157, 'zgurіvskij', 'Згурівський', 'Згуровский', 9),
	(158, 'іvankіvskij', 'Іванківський', 'Иванковский', 9),
	(159, 'kagarlickij', 'Кагарлицький', 'Кагарлицкий', 9),
	(160, 'kiєvo-svyatoshinskij', 'Києво-Святошинський', 'Киево-Святошинский', 9),
	(161, 'makarіvskij', 'Макарівський', 'Макаровский', 9),
	(162, 'mironіvskij', 'Миронівський', 'Мироновский', 9),
	(163, 'obuxіvskij', 'Обухівський', 'Обуховский', 9),
	(164, 'pereyaslav-xmelnickij', 'Переяслав-Хмельницький', 'Переяслав-Хмельницкий', 9),
	(165, 'polіskij', 'Поліський', 'Полесский', 9),
	(166, 'rokitnyanskij', 'Рокитнянський', 'Рокитнянский', 9),
	(167, 'skvirskij', 'Сквирський', 'Сквирский', 9),
	(168, 'stavishhenskij', 'Ставищенський', 'Ставищенский', 9),
	(169, 'tarashhanskij', 'Таращанський', 'Таращанский', 9),
	(170, 'tetіїvskij', 'Тетіївський', 'Тетиевский', 9),
	(171, 'fastіvskij', 'Фастівський', 'Фастовский', 9),
	(172, 'yagotinskij', 'Яготинський', 'Яготинский', 9),
	(173, 'blagovіshhenskij', 'Благовіщенський', 'Благовещенский', 10),
	(174, 'bobrineckij', 'Бобринецький', 'Бобринецкий', 10),
	(175, 'vіlshanskij', 'Вільшанський', 'Ольшанский', 10),
	(176, 'gajvoronskij', 'Гайворонський', 'Гайворонский', 10),
	(177, 'golovanіvskij', 'Голованівський', 'Голованевский', 10),
	(178, 'dobrovelichkіvskij', 'Добровеличківський', 'Добровеличковский', 10),
	(179, 'dolinskij', 'Долинський', 'Долинский', 10),
	(180, 'znam\'yanskij', 'Знам\'янський', 'Знаменский', 10),
	(181, 'kіrovogradskij', 'Кіровоградський', 'Кировоградский', 10),
	(182, 'kompanіїvskij', 'Компаніївський', 'Компанеевский', 10),
	(183, 'maloviskіvskij', 'Маловисківський', 'Маловисковский', 10),
	(184, 'novgorodkіvskij', 'Новгородківський', 'Новгородковский', 10),
	(185, 'novoarxangelskij', 'Новоархангельський', 'Новоархангельский', 10),
	(186, 'novomirgorodskij', 'Новомиргородський', 'Новомиргородский', 10),
	(187, 'novoukraїnskij', 'Новоукраїнський', 'Новоукраинский', 10),
	(188, 'oleksandrіvskij', 'Олександрівський', 'Александровский', 10),
	(189, 'oleksandrіjskij', 'Олександрійський', 'Александрийский', 10),
	(190, 'onufrіїvskij', 'Онуфріївський', 'Онуфриевский', 10),
	(191, 'petrіvskij', 'Петрівський', 'Петровский', 10),
	(192, 'svіtlovodskij', 'Світловодський', 'Светловодский', 10),
	(193, 'ustinіvskij', 'Устинівський', 'Устиновский', 10),
	(194, 'bіlovodskij', 'Біловодський', 'Беловодский', 11),
	(195, 'bіlokurakinskij', 'Білокуракинський', 'Білокуракинський', 11),
	(196, 'kremіnskij', 'Кремінський', 'Кременской', 11),
	(197, 'markіvskij', 'Марківський', 'Марковский', 11),
	(198, 'mіlovskij', 'Міловський', 'Миловский', 11),
	(199, 'novoajdarskij', 'Новоайдарський', 'Новоайдарский', 11),
	(200, 'novopskovskij', 'Новопсковський', 'Новопсковський', 11),
	(201, 'popasnyanskij', 'Попаснянський', 'Попаснянский', 11),
	(202, 'svatіvskij', 'Сватівський', 'Сватовский', 11),
	(203, 'stanichno-luganskij', 'Станично-Луганський', 'Станично-Луганский', 11),
	(204, 'starobіlskij', 'Старобільський', 'Старобельский', 11),
	(205, 'troїckij', 'Троїцький', 'Троицкий', 11),
	(206, 'brodіvskij', 'Бродівський', 'Бродовский', 12),
	(207, 'buskij', 'Буський', 'Буский', 12),
	(208, 'gorodockij', 'Городоцький', 'Городокский', 12),
	(209, 'drogobickij', 'Дрогобицький', 'Дрогобычский', 12),
	(210, 'zhidachіvskij', 'Жидачівський', 'Жидачевский', 12),
	(211, 'zhovkіvskij', 'Жовківський', 'Жолковский', 12),
	(212, 'zolochіvskij', 'Золочівський', 'Золочевский', 12),
	(213, 'kam\'yanka-buzkij', 'Кам\'янка-Бузький', 'Каменка-Бугский', 12),
	(214, 'mikolaїvskij', 'Миколаївський', 'Николаевский', 12),
	(215, 'mostiskij', 'Мостиський', 'Мостиський', 12),
	(216, 'peremishlyanskij', 'Перемишлянський', 'Перемышлянский', 12),
	(217, 'pustomitіvskij', 'Пустомитівський', 'Пустомытовский', 12),
	(218, 'radexіvskij', 'Радехівський', 'Радеховский', 12),
	(219, 'sambіrskij', 'Самбірський', 'Самборский', 12),
	(220, 'skolіvskij', 'Сколівський', 'Сколевский', 12),
	(221, 'sokalskij', 'Сокальський', 'Сокальский', 12),
	(222, 'starosambіrskij', 'Старосамбірський', 'Старосамборский', 12),
	(223, 'strijskij', 'Стрийський', 'Стрыйский', 12),
	(224, 'turkіvskij', 'Турківський', 'Турковский', 12),
	(225, 'yavorіvskij', 'Яворівський', 'Яворивский', 12),
	(226, 'arbuzinskij', 'Арбузинський', 'Арбузинський', 13),
	(227, 'bashtanskij', 'Баштанський', 'Баштанский', 13),
	(228, 'berezanskij', 'Березанський', 'Березанский', 13),
	(229, 'berezneguvatskij', 'Березнегуватський', 'Березнеговатский', 13),
	(230, 'bratskij', 'Братський', 'Братский', 13),
	(231, 'veselinіvskij', 'Веселинівський', 'Веселиновский', 13),
	(232, 'vіtovskij', 'Вітовський', 'Витовский', 13),
	(233, 'voznesenskij', 'Вознесенський', 'Вознесенский', 13),
	(234, 'vradіїvskij', 'Врадіївський', 'Врадиевский', 13),
	(235, 'domanіvskij', 'Доманівський', 'Доманевский', 13),
	(236, 'єlaneckij', 'Єланецький', 'Еланецкий', 13),
	(237, 'kazankіvskij', 'Казанківський', 'Казанковский', 13),
	(238, 'krivoozerskij', 'Кривоозерський', 'Кривоозерский', 13),
	(239, 'mikolaїvskij', 'Миколаївський', 'Николаевский', 13),
	(240, 'novobuzkij', 'Новобузький', 'Новобугский', 13),
	(241, 'novoodeskij', 'Новоодеський', 'Новоодесский', 13),
	(242, 'ochakіvskij', 'Очаківський', 'Очаковский', 13),
	(243, 'pervomajskij', 'Первомайський', 'Первомайский', 13),
	(244, 'snіgurіvskij', 'Снігурівський', 'Снигиревский', 13),
	(245, 'ananїvskij', 'Ананьївський', 'Ананьевский', 14),
	(246, 'arcizkij', 'Арцизький', 'Арцизский', 14),
	(247, 'baltskij', 'Балтський', 'Балтский', 14),
	(248, 'berezіvskij', 'Березівський', 'Березовский', 14),
	(249, 'bіlgorod-dnіstrovskij', 'Білгород-Дністровський', 'Белгород-Днестровский', 14),
	(250, 'bіlyaїvskij', 'Біляївський', 'Беляевский', 14),
	(251, 'bolgradskij', 'Болградський', 'Болградский', 14),
	(252, 'velikomixajlіvskij', 'Великомихайлівський', 'Великомихайловский', 14),
	(253, 'zaxarіvskij', 'Захарівський', 'Захарівський', 14),
	(254, 'іvanіvskij', 'Іванівський', 'Ивановский', 14),
	(255, 'іzmaїlskij', 'Ізмаїльський', 'Измаильский', 14),
	(256, 'kіlіjskij', 'Кілійський', 'Килийский', 14),
	(257, 'kodimskij', 'Кодимський', 'Кодымский', 14),
	(258, 'limanskij', 'Лиманський', 'Лиманский', 14),
	(259, 'lyubashіvskij', 'Любашівський', 'Любашевский', 14),
	(260, 'mikolaїvskij', 'Миколаївський', 'Николаевский', 14),
	(261, 'ovіdіopolskij', 'Овідіопольський', 'Овидиопольский', 14),
	(262, 'oknyanskij', 'Окнянський', 'Окнянський', 14),
	(263, 'podіlskij', 'Подільський', 'Подольский', 14),
	(264, 'renіjskij', 'Ренійський', 'Ренийский', 14),
	(265, 'rozdіlnyanskij', 'Роздільнянський', 'Раздельнянский', 14),
	(266, 'savranskij', 'Савранський', 'Савранский', 14),
	(267, 'saratskij', 'Саратський', 'Саратский', 14),
	(268, 'tarutinskij', 'Тарутинський', 'Тарутинский', 14),
	(269, 'tatarbunarskij', 'Татарбунарський', 'Татарбунарский', 14),
	(270, 'shiryaїvskij', 'Ширяївський', 'Ширяевский', 14),
	(271, 'velikobagachanskij', 'Великобагачанський', 'Великобагачанский', 15),
	(272, 'gadyackij', 'Гадяцький', 'Гадяцкий', 15),
	(273, 'globinskij', 'Глобинський', 'Глобинский', 15),
	(274, 'grebіnkіvskij', 'Гребінківський', 'Гребенковский', 15),
	(275, 'dikanskij', 'Диканський', 'Диканский', 15),
	(276, 'zіnkіvskij', 'Зіньківський', 'Зиньковский', 15),
	(277, 'karlіvskij', 'Карлівський', 'Карловский', 15),
	(278, 'kobelyackij', 'Кобеляцький', 'Кобеляцкий', 15),
	(279, 'kozelshhinskij', 'Козельщинський', 'Козельщинский', 15),
	(280, 'kotelevskij', 'Котелевський', 'Котелевский', 15),
	(281, 'kremenchuckij', 'Кременчуцький', 'Кременчугский', 15),
	(282, 'loxvickij', 'Лохвицький', 'Лохвицкий', 15),
	(283, 'lubenskij', 'Лубенський', 'Лубенский', 15),
	(284, 'mashіvskij', 'Машівський', 'Машевский', 15),
	(285, 'mirgorodskij', 'Миргородський', 'Миргородский', 15),
	(286, 'novosanzharskij', 'Новосанжарський', 'Новосанжарский', 15),
	(287, 'orzhickij', 'Оржицький', 'Оржицкий', 15),
	(288, 'piryatinskij', 'Пирятинський', 'Пирятинский', 15),
	(289, 'poltavskij', 'Полтавський', 'Полтавский', 15),
	(290, 'reshetilіvskij', 'Решетилівський', 'Решетиловский', 15),
	(291, 'semenіvskij', 'Семенівський', 'Семеновский', 15),
	(292, 'xorolskij', 'Хорольський', 'Хорольский', 15),
	(293, 'chornuxinskij', 'Чорнухинський', 'Чернухинский', 15),
	(294, 'chutіvskij', 'Чутівський', 'Чутовский', 15),
	(295, 'shishackij', 'Шишацький', 'Шишацкий', 15),
	(296, 'bereznіvskij', 'Березнівський', 'Березновский', 16),
	(297, 'volodimireckij', 'Володимирецький', 'Владимирецкий', 16),
	(298, 'goshhanskij', 'Гощанський', 'Гощанский', 16),
	(299, 'demidіvskij', 'Демидівський', 'Демидовский', 16),
	(300, 'dubenskij', 'Дубенський', 'Дубенский', 16),
	(301, 'dubrovickij', 'Дубровицький', 'Дубровицкий', 16),
	(302, 'zarіchnenskij', 'Зарічненський', 'Заречненский', 16),
	(303, 'zdolbunіvskij', 'Здолбунівський', 'Здолбуновский', 16),
	(304, 'koreckij', 'Корецький', 'Корецкий', 16),
	(305, 'kostopіlskij', 'Костопільський', 'Костопольский', 16),
	(306, 'mlinіvskij', 'Млинівський', 'Млиновский', 16),
	(307, 'ostrozkij', 'Острозький', 'Острожский', 16),
	(308, 'radivilіvskij', 'Радивилівський', 'Радивиловский', 16),
	(309, 'rіvnenskij', 'Рівненський', 'Ровенский', 16),
	(310, 'rokitnіvskij', 'Рокитнівський', 'Ракитновский', 16),
	(311, 'sarnenskij', 'Сарненський', 'Сарненский', 16),
	(312, 'bіlopіlskij', 'Білопільський', 'Белопольский', 17),
	(313, 'burinskij', 'Буринський', 'Буринский', 17),
	(314, 'velikopisarіvskij', 'Великописарівський', 'Великописаревский', 17),
	(315, 'gluxіvskij', 'Глухівський', 'Глуховский', 17),
	(316, 'konotopskij', 'Конотопський', 'Конотопский', 17),
	(317, 'krasnopіlskij', 'Краснопільський', 'Краснопольский', 17),
	(318, 'kroleveckij', 'Кролевецький', 'Кролевецкий', 17),
	(319, 'lebedinskij', 'Лебединський', 'Лебединский', 17),
	(320, 'lipovodolinskij', 'Липоводолинський', 'Липоводолинский', 17),
	(321, 'nedrigajlіvskij', 'Недригайлівський', 'Недригайловский', 17),
	(322, 'oxtirskij', 'Охтирський', 'Ахтырский', 17),
	(323, 'putivlskij', 'Путивльський', 'Путивльский', 17),
	(324, 'romenskij', 'Роменський', 'Роменский', 17),
	(325, 'seredino-budskij', 'Середино-Будський', 'Середино-Будский', 17),
	(326, 'sumskij', 'Сумський', 'Сумской', 17),
	(327, 'trostyaneckij', 'Тростянецький', 'Тростянецкий', 17),
	(328, 'shostkinskij', 'Шосткинський', 'Шосткинский', 17),
	(329, 'yampіlskij', 'Ямпільський', 'Ямпольский', 17),
	(330, 'berezhanskij', 'Бережанський', 'Бережанский', 18),
	(331, 'borshhіvskij', 'Борщівський', 'Борщевский', 18),
	(332, 'buchackij', 'Бучацький', 'Бучацкий', 18),
	(333, 'gusyatinskij', 'Гусятинський', 'Гусятинский', 18),
	(334, 'zalіshhickij', 'Заліщицький', 'Залещицкий', 18),
	(335, 'zbarazkij', 'Збаразький', 'Збаражский', 18),
	(336, 'zborіvskij', 'Зборівський', 'Зборовский', 18),
	(337, 'kozіvskij', 'Козівський', 'Козовский', 18),
	(338, 'kremeneckij', 'Кременецький', 'Кременецкий', 18),
	(339, 'lanoveckij', 'Лановецький', 'Лановецкий', 18),
	(340, 'monastiriskij', 'Монастириський', 'Монастыриский', 18),
	(341, 'pіdvolochiskij', 'Підволочиський', 'Подволочиский', 18),
	(342, 'pіdgaєckij', 'Підгаєцький', 'Подгаецкий', 18),
	(343, 'terebovlyanskij', 'Теребовлянський', 'Теребовлянский', 18),
	(344, 'ternopіlskij', 'Тернопільський', 'Тернопольский', 18),
	(345, 'chortkіvskij', 'Чортківський', 'Чертковский', 18),
	(346, 'shumskij', 'Шумський', 'Шумский', 18),
	(347, 'balaklіjskij', 'Балаклійський', 'Балаклейский', 19),
	(348, 'barvіnkіvskij', 'Барвінківський', 'Барвенковский', 19),
	(349, 'bliznyukіvskij', 'Близнюківський', 'Близнюковский', 19),
	(350, 'bogoduxіvskij', 'Богодухівський', 'Богодуховский', 19),
	(351, 'borіvskij', 'Борівський', 'Боровской', 19),
	(352, 'valkіvskij', 'Валківський', 'Валковский', 19),
	(353, 'velikoburluckij', 'Великобурлуцький', 'Великобурлукский', 19),
	(354, 'vovchanskij', 'Вовчанський', 'Волчанский', 19),
	(355, 'dvorіchanskij', 'Дворічанський', 'Двуречанский', 19),
	(356, 'dergachіvskij', 'Дергачівський', 'Дергачевский', 19),
	(357, 'zachepilіvskij', 'Зачепилівський', 'Зачепиловский', 19),
	(358, 'zmіїvskij', 'Зміївський', 'Змиевский', 19),
	(359, 'zolochіvskij', 'Золочівський', 'Золочевский', 19),
	(360, 'іzyumskij', 'Ізюмський', 'Изюмский', 19),
	(361, 'kegichіvskij', 'Кегичівський', 'Кегичевский', 19),
	(362, 'kolomackij', 'Коломацький', 'Коломацкий', 19),
	(363, 'krasnogradskij', 'Красноградський', 'Красноградский', 19),
	(364, 'krasnokutskij', 'Краснокутський', 'Краснокутский', 19),
	(365, 'kup\'yanskij', 'Куп\'янський', 'Купянский', 19),
	(366, 'lozіvskij', 'Лозівський', 'Лозовский', 19),
	(367, 'novovodolazkij', 'Нововодолазький', 'Нововодолажский', 19),
	(368, 'pervomajskij', 'Первомайський', 'Первомайский', 19),
	(369, 'pechenіzkij', 'Печенізький', 'Печенежский', 19),
	(370, 'saxnovshhinskij', 'Сахновщинський', 'Сахновщинский', 19),
	(371, 'xarkіvskij', 'Харківський', 'Харьковский', 19),
	(372, 'chuguїvskij', 'Чугуївський', 'Чугуевский', 19),
	(373, 'shevchenkіvskij', 'Шевченківський', 'Шевченковский', 19),
	(374, 'berislavskij', 'Бериславський', 'Бериславский', 20),
	(375, 'bіlozerskij', 'Білозерський', 'Белозерский', 20),
	(376, 'velikolepetiskij', 'Великолепетиський', 'Великолепетихинский', 20),
	(377, 'velikooleksandrіvskij', 'Великоолександрівський', 'Великоалександровский', 20),
	(378, 'verxnorogachickij', 'Верхньорогачицький', 'Верхнерогачицкий', 20),
	(379, 'visokopіlskij', 'Високопільський', 'Высокопольский', 20),
	(380, 'genіcheskij', 'Генічеський', 'Генический', 20),
	(381, 'golopristanskij', 'Голопристанський', 'Голопристанский', 20),
	(382, 'gornostaїvskij', 'Горностаївський', 'Горностаевский', 20),
	(383, 'іvanіvskij', 'Іванівський', 'Ивановский', 20),
	(384, 'kalanchackij', 'Каланчацький', 'Каланчакский', 20),
	(385, 'kaxovskij', 'Каховський', 'Каховский', 20),
	(386, 'nizhnosіrogozkij', 'Нижньосірогозький', 'Нижнесерогозский', 20),
	(387, 'novovoroncovskij', 'Нововоронцовський', 'Нововоронцовский', 20),
	(388, 'novotroїckij', 'Новотроїцький', 'Новотроицкий', 20),
	(389, 'oleshkіvskij', 'Олешківський', 'Олешковская', 20),
	(390, 'skadovskij', 'Скадовський', 'Скадовский', 20),
	(391, 'chaplinskij', 'Чаплинський', 'Чаплинский', 20),
	(392, 'bіlogіrskij', 'Білогірський', 'Белогорский', 21),
	(393, 'vіnkoveckij', 'Віньковецький', 'Виньковецкий', 21),
	(394, 'volochiskij', 'Волочиський', 'Волочиский', 21),
	(395, 'gorodockij', 'Городоцький', 'Городокский', 21),
	(396, 'derazhnyanskij', 'Деражнянський', 'Деражнянский', 21),
	(397, 'dunaєveckij', 'Дунаєвецький', 'Дунаевецкий', 21),
	(398, 'іzyaslavskij', 'Ізяславський', 'Изяславский', 21),
	(399, 'kam\'yanec-podіlskij', 'Кам\'янець-Подільський', 'Каменец-Подольский', 21),
	(400, 'krasilіvskij', 'Красилівський', 'Красиловский', 21),
	(401, 'letichіvskij', 'Летичівський', 'Летичевский', 21),
	(402, 'novoushickij', 'Новоушицький', 'Новоушицкий', 21),
	(403, 'polonskij', 'Полонський', 'Полонский', 21),
	(404, 'slavutskij', 'Славутський', 'Славутский', 21),
	(405, 'starokostyantinіvskij', 'Старокостянтинівський', 'Староконстантиновский', 21),
	(406, 'starosinyavskij', 'Старосинявський', 'Старосинявский', 21),
	(407, 'teofіpolskij', 'Теофіпольський', 'Теофипольский', 21),
	(408, 'xmelnickij', 'Хмельницький', 'Хмельницкий', 21),
	(409, 'chemeroveckij', 'Чемеровецький', 'Чемеровецкий', 21),
	(410, 'shepetіvskij', 'Шепетівський', 'Шепетовский', 21),
	(411, 'yarmolineckij', 'Ярмолинецький', 'Ярмолинский', 21),
	(412, 'gorodishhenskij', 'Городищенський', 'Городищенский', 22),
	(413, 'drabіvskij', 'Драбівський', 'Драбовский', 22),
	(414, 'zhashkіvskij', 'Жашківський', 'Жашковский', 22),
	(415, 'zvenigorodskij', 'Звенигородський', 'Звенигородский', 22),
	(416, 'zolotonіskij', 'Золотоніський', 'Золотоношский', 22),
	(417, 'kam\'yanskij', 'Кам\'янський', 'Каменский', 22),
	(418, 'kanіvskij', 'Канівський', 'Каневский', 22),
	(419, 'katerinopіlskij', 'Катеринопільський', 'Катеринопольский', 22),
	(420, 'korsun-shevchenkіvskij', 'Корсунь-Шевченківський', 'Корсунь-Шевченковский', 22),
	(421, 'lisyanskij', 'Лисянський', 'Лисянский', 22),
	(422, 'mankіvskij', 'Маньківський', 'Маньковский', 22),
	(423, 'monastirishhenskij', 'Монастирищенський', 'Монастырищенский', 22),
	(424, 'smіlyanskij', 'Смілянський', 'Смелянский', 22),
	(425, 'talnіvskij', 'Тальнівський', 'Тальновский', 22),
	(426, 'umanskij', 'Уманський', 'Уманский', 22),
	(427, 'xristinіvskij', 'Христинівський', 'Христиновский', 22),
	(428, 'cherkaskij', 'Черкаський', 'Черкасский', 22),
	(429, 'chigirinskij', 'Чигиринський', 'Чигиринский', 22),
	(430, 'chornobaїvskij', 'Чорнобаївський', 'Чернобаевский', 22),
	(431, 'shpolyanskij', 'Шполянський', 'Шполянский', 22),
	(432, 'vizhnickij', 'Вижницький', 'Вижницкий', 23),
	(433, 'gercaїvskij', 'Герцаївський', 'Герцаевский', 23),
	(434, 'glibockij', 'Глибоцький', 'Глубокский', 23),
	(435, 'zastavnіvskij', 'Заставнівський', 'Заставновский', 23),
	(436, 'kelmeneckij', 'Кельменецький', 'Кельменецкий', 23),
	(437, 'kіcmanskij', 'Кіцманський', 'Кицманский', 23),
	(438, 'novoselickij', 'Новоселицький', 'Новоселицкий', 23),
	(439, 'putilskij', 'Путильський', 'Путильский', 23),
	(440, 'sokiryanskij', 'Сокирянський', 'Сокирянский', 23),
	(441, 'storozhineckij', 'Сторожинецький', 'Сторожинецкий', 23),
	(442, 'xotinskij', 'Хотинський', 'Хотинский', 23),
	(443, 'baxmackij', 'Бахмацький', 'Бахмацкий', 24),
	(444, 'bobrovickij', 'Бобровицький', 'Бобровицкий', 24),
	(445, 'borznyanskij', 'Борзнянський', 'Борзнянский', 24),
	(446, 'varvinskij', 'Варвинський', 'Варвинский', 24),
	(447, 'gorodnyanskij', 'Городнянський', 'Городнянский', 24),
	(448, 'іchnyanskij', 'Ічнянський', 'Ичнянский', 24),
	(449, 'kozeleckij', 'Козелецький', 'Козелецкий', 24),
	(450, 'koropskij', 'Коропський', 'Коропский', 24),
	(451, 'koryukіvskij', 'Корюківський', 'Корюковский', 24),
	(452, 'kulikіvskij', 'Куликівський', 'Куликовский', 24),
	(453, 'menskij', 'Менський', 'Менский', 24),
	(454, 'nіzhinskij', 'Ніжинський', 'Нежинский', 24),
	(455, 'novgorod-sіverskij', 'Новгород-Сіверський', 'Новгород-Северский', 24),
	(456, 'nosіvskij', 'Носівський', 'Носовский', 24),
	(457, 'priluckij', 'Прилуцький', 'Прилуцкий', 24),
	(458, 'rіpkinskij', 'Ріпкинський', 'Репкинский', 24),
	(459, 'semenіvskij', 'Семенівський', 'Семеновский', 24),
	(460, 'snovskij', 'Сновський', 'Сновский', 24),
	(461, 'sosnickij', 'Сосницький', 'Сосницкий', 24),
	(462, 'srіbnyanskij', 'Срібнянський', 'Сребнянский', 24),
	(463, 'talalaїvskij', 'Талалаївський', 'Талалаевский', 24),
	(464, 'chernіgіvskij', 'Чернігівський', 'Черниговский', 24);
/*!40000 ALTER TABLE `local_regions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;