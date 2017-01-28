-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 27 2017 г., 08:03
-- Версия сервера: 5.6.31
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `absolute`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'hello123');

-- --------------------------------------------------------

--
-- Структура таблицы `main`
--

CREATE TABLE IF NOT EXISTS `main` (
  `currency` varchar(10) NOT NULL,
  `td_buy` varchar(10) NOT NULL,
  `buy` double NOT NULL,
  `buy_tender` double NOT NULL,
  `td_sell` varchar(10) NOT NULL,
  `sell` double NOT NULL,
  `sell_tender` double NOT NULL,
  `day_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `main`
--

INSERT INTO `main` (`currency`, `td_buy`, `buy`, `buy_tender`, `td_sell`, `sell`, `sell_tender`, `day_time`) VALUES
('EUR', 'up', 27.3, 0.01, 'down', 28.3, 0.02, '2017-01-15 00:08:03'),
('EUR/USD', 'up', 27.8, 0.01, 'down', 29.3, 0.01, '2017-01-15 00:00:00'),
('RUB', 'up', 28.3, 0.01, 'down', 29.3, 0.01, '2017-01-15 00:00:00'),
('USD', 'up', 27.8, 0.01, 'down', 28.3, 0.01, '2017-01-15 00:00:00'),
('USD/RUB', 'up', 27.8, 0.01, 'down', 29.3, 0.01, '2017-01-15 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Индексы таблицы `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`currency`,`day_time`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
