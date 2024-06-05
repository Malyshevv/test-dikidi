-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Июн 05 2024 г., 06:55
-- Версия сервера: 5.7.44
-- Версия PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dikidi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bike`
--

CREATE TABLE `bike` (
                        `id` int(11) NOT NULL,
                        `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `bike_type_id` int(11) DEFAULT NULL,
                        `discontinued` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bike`
--

INSERT INTO `bike` (`id`, `name`, `bike_type_id`, `discontinued`) VALUES
                                                                      (1, 'CFMOTO 800NK ADVANCED (ABS)', 1, 0),
                                                                      (2, 'Bajaj Dominar 400 Touring Limited Edition Green', 2, 1),
                                                                      (3, 'Yamaha R3', 3, 0),
                                                                      (4, 'SE Ninja', 3, 0),
                                                                      (5, 'Harley-Davidson Sportster S', 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `bike_type`
--

CREATE TABLE `bike_type` (
                             `id` int(11) NOT NULL,
                             `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bike_type`
--

INSERT INTO `bike_type` (`id`, `name`) VALUES
                                           (1, 'Дорожные'),
                                           (6, 'Классические'),
                                           (4, 'Круизеры'),
                                           (2, 'Нейкеды'),
                                           (9, 'Спортивно-туристические'),
                                           (3, 'Спортивные'),
                                           (7, 'Тройки'),
                                           (8, 'Туристические'),
                                           (5, 'Чопперы');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `v_biketypeview`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `v_biketypeview` (
                                  `bike_type` varchar(255)
    ,`bike_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Структура для представления `v_biketypeview`
--
DROP TABLE IF EXISTS `v_biketypeview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `v_biketypeview`  AS SELECT `bt`.`name` AS `bike_type`, count(`b`.`id`) AS `bike_count` FROM (`bike_type` `bt` left join `bike` `b` on(((`bt`.`id` = `b`.`bike_type_id`) and (`b`.`discontinued` = FALSE)))) GROUP BY `bt`.`name` ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bike`
--
ALTER TABLE `bike`
    ADD PRIMARY KEY (`id`),
  ADD KEY `bike_type_id_index` (`bike_type_id`),
  ADD KEY `id_index` (`id`),
  ADD KEY `discontinued_index` (`discontinued`);

--
-- Индексы таблицы `bike_type`
--
ALTER TABLE `bike_type`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_index` (`id`),
  ADD KEY `name_index` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bike`
--
ALTER TABLE `bike`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `bike_type`
--
ALTER TABLE `bike_type`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bike`
--
ALTER TABLE `bike`
    ADD CONSTRAINT `bike_ibfk_1` FOREIGN KEY (`bike_type_id`) REFERENCES `bike_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
