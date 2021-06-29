-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 29 2021 г., 19:18
-- Версия сервера: 10.4.13-MariaDB
-- Версия PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `framework`
--

-- --------------------------------------------------------

--
-- Структура таблицы `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `taskText` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isEdited` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `todo`
--

INSERT INTO `todo` (`id`, `userName`, `userPassword`, `email`, `taskText`, `status`, `isEdited`) VALUES
(1, 'ekgesh', '12345', 'ekgesh@aa.com', 'csmcoisjcojsddssd', 1, 1),
(2, 'Ali', '', 'test@mail.com', 'Newtaskaaaahalil', 0, 1),
(3, 'Ali', '', 'test@mail.com', 'Newtaskqqqqq', 1, 1),
(4, 'dewdwd', '', 'wdee@cc.com', 'cdcdcdfd', 0, 0),
(5, 'dewdwd', '', 'wdee@cc.com', 'cdcdcdfd', 0, 0),
(6, 'dwedw', '', 'aaa@gmail.com', 'dwjdiwjdwijdwjdwidjid', 0, 0),
(7, 'asa', '', 'aa@aa.com', 'edwedew111', 1, 0),
(8, 'asa', '', 'aa@aa.com', 'edwedewdwew', 1, 0),
(9, 'asa', '', 'aa@aa.com', 'edwedew', 0, 0),
(10, 'sasa', '', 'aa@aa.com', 'dsdss', 0, 0),
(11, 'asa', '', 'asa@cc.com', 'dsdsd', 0, 0),
(12, 'yyv', '', 'rrdr@vv.com', 'vyvyv', 0, 0),
(13, 'hbhbj', '', 'hh@cc.com', 'halil', 0, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
