-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 31 2023 г., 18:23
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `deniss86_cem`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Status`
--
-- Создание: Май 31 2023 г., 07:56
-- Последнее обновление: Май 31 2023 г., 07:58
--

DROP TABLE IF EXISTS `Status`;
CREATE TABLE `Status` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Status`
--

INSERT INTO `Status` (`id`, `label`, `name`) VALUES
(1, 'новый', 'new'),
(2, 'выполнено', 'completed');

-- --------------------------------------------------------

--
-- Структура таблицы `Tasks`
--
-- Создание: Май 31 2023 г., 07:48
-- Последнее обновление: Май 31 2023 г., 15:07
--

DROP TABLE IF EXISTS `Tasks`;
CREATE TABLE `Tasks` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `status_id` int(2) NOT NULL,
  `admin_edit` int(1) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Tasks`
--

INSERT INTO `Tasks` (`id`, `name`, `email`, `text`, `status_id`, `admin_edit`, `date_create`, `date_update`) VALUES
(19, 'test', 'test@test.com', 'test job edit', 2, 1, '2023-05-31 18:05:50', '2023-05-31 18:07:30'),
(20, 'test 2', 'test2@test.com', 'test job 2', 1, 0, '2023-05-31 18:06:20', '0000-00-00 00:00:00'),
(21, 'test 3', 'test3@test.com', 'test job 3', 1, 0, '2023-05-31 18:06:40', '0000-00-00 00:00:00'),
(22, 'test 4', 'test4@test.com', 'test jb 4', 1, 0, '2023-05-31 18:06:58', '0000-00-00 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Tasks`
--
ALTER TABLE `Tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Status`
--
ALTER TABLE `Status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Tasks`
--
ALTER TABLE `Tasks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
