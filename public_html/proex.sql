-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 27 2017 г., 08:01
-- Версия сервера: 5.5.45
-- Версия PHP: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `proex`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` tinytext NOT NULL,
  `user` varchar(20) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `message`, `user`, `time`) VALUES
(107, 'hola', 'login6', '2017-02-27 03:06:01'),
(108, 'lampochka', 'login6', '2017-02-27 03:06:32');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `avatar` varchar(35) NOT NULL,
  `breed` varchar(35) NOT NULL,
  `regdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf32 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `email`, `avatar`, `breed`, `regdate`) VALUES
(1, 'login', '0fdd2c4ad0c7d655b218', 'Владислав', 'log@mail.ru', '0', '2', '2017-02-25 14:33:34'),
(2, 'login2', '9a05b906bb79d05bef88', 'Владислав', 'log2@mail.ru', '0', '2', '2017-02-25 14:33:59'),
(3, 'login3', 'a1e5e61966b49c9f09ca', 'Владислав', 'login3@mail.ru', '0', '4', '2017-02-25 15:03:41'),
(4, 'login4', 'ea6204e2bba3bea185be', 'Вадос', 'login4@mail.ru', '0', '3', '2017-02-25 15:27:54'),
(5, 'login5', '495d9b54055902f2a703', 'Вадос', 'login5@mail.ru', '0', '3', '2017-02-25 15:29:08'),
(6, 'login6', '123123', 'ПурсикМурс', 'login6@mail.ru', '1', '3', '2017-02-25 15:44:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
