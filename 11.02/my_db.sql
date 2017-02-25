-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Лют 25 2017 р., 20:33
-- Версія сервера: 10.1.19-MariaDB
-- Версія PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `my_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `continent`
--

CREATE TABLE `continent` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `continent`
--

INSERT INTO `continent` (`id`, `name`) VALUES
(1, 'Europe'),
(2, 'Asia'),
(3, 'South America'),
(4, 'North America'),
(5, 'Avstralia');

-- --------------------------------------------------------

--
-- Структура таблиці `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `short_name` char(2) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `president` varchar(15) DEFAULT NULL,
  `continent_id` tinyint(4) DEFAULT NULL,
  `premier` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `country`
--

INSERT INTO `country` (`id`, `name`, `short_name`, `area`, `population`, `president`, `continent_id`, `premier`) VALUES
(1, 'Ukraine', 'ua', 603628, 45490000, 'Poroshenko', 1, 'Groysman'),
(2, 'Canada', 'ca', 9985000, 35160000, 'Trudo', 4, 'Peres'),
(3, 'China', 'ch', 9597000, 1357000000, 'Czinpin', 2, 'Hanoyama'),
(4, 'France', 'fr', 643801, 66030000, 'Oland', 1, 'Kordoba'),
(5, 'Poland', 'pl', 312679, 38530000, 'Duda', 1, 'Pudzyanovski'),
(9, 'Brazil', 'br', 8516000, 200400000, 'Temer', 3, 'Ortega'),
(10, 'Avstralia', 'av', 7692000, 23130000, 'Ternbul', 5, 'Donovan');

-- --------------------------------------------------------

--
-- Структура таблиці `country_lang`
--

CREATE TABLE `country_lang` (
  `id` tinyint(3) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `language_id` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `country_lang`
--

INSERT INTO `country_lang` (`id`, `country_id`, `language_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 5),
(4, 2, 7),
(5, 2, 8),
(6, 3, 3),
(7, 3, 9),
(8, 3, 10),
(9, 4, 4),
(10, 4, 5),
(11, 9, 6),
(12, 9, 5),
(13, 10, 5);

-- --------------------------------------------------------

--
-- Структура таблиці `language`
--

CREATE TABLE `language` (
  `id` tinyint(3) NOT NULL,
  `lang` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `language`
--

INSERT INTO `language` (`id`, `lang`) VALUES
(1, 'Ukrainian'),
(2, 'Russian'),
(3, 'Chinese'),
(4, 'French'),
(5, 'English'),
(6, 'Brazilian'),
(7, 'Chipewyan'),
(8, 'Cree'),
(9, 'Mongolian'),
(10, 'Tibetan');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `continent_id` (`continent_id`);

--
-- Індекси таблиці `country_lang`
--
ALTER TABLE `country_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_country` (`country_id`),
  ADD KEY `c_lang` (`language_id`);

--
-- Індекси таблиці `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `continent`
--
ALTER TABLE `continent`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблиці `country_lang`
--
ALTER TABLE `country_lang`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблиці `language`
--
ALTER TABLE `language`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `country`
--
ALTER TABLE `country`
  ADD CONSTRAINT `c_continent` FOREIGN KEY (`continent_id`) REFERENCES `continent` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `country_lang`
--
ALTER TABLE `country_lang`
  ADD CONSTRAINT `c_country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_lang` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
