-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 23 2017 г., 21:23
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `fivebyfive`
--

-- --------------------------------------------------------

--
-- Структура таблицы `fivebyfive`
--

CREATE TABLE IF NOT EXISTS `fivebyfive` (
  `id` int(1) NOT NULL,
  `cell0` int(1) NOT NULL,
  `cell1` int(1) NOT NULL,
  `cell2` int(1) NOT NULL,
  `cell3` int(1) NOT NULL,
  `cell4` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fivebyfive`
--

INSERT INTO `fivebyfive` (`id`, `cell0`, `cell1`, `cell2`, `cell3`, `cell4`) VALUES
(0, 0, 0, 0, 0, 0),
(1, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
