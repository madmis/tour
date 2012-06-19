-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Май 29 2012 г., 00:04
-- Версия сервера: 5.5.22-log
-- Версия PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tour`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authassignment`
--

CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Admin', 2, NULL, NULL),
('Clients.*', 3, NULL, NULL),
('Franchise', 4, NULL, NULL),
('Franchise', 5, NULL, NULL),
('Request.Admin', 3, NULL, NULL),
('SuperAdmin', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `authitem`
--

CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0-операция, 1-задание, 2-роль',
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('About.*', 1, 'О программе', NULL, 'N;'),
('About.Index', 0, 'Просмотр страницы "О программе"', NULL, NULL),
('Admin', 2, 'Администратор', NULL, NULL),
('Clients.*', 1, 'Справочник "Клиенты"', NULL, 'N;'),
('Clients.Admin', 0, 'Управление клиентами', NULL, NULL),
('Clients.Create', 0, 'Добавление клиента', NULL, NULL),
('Clients.Delete', 0, 'Удаление клиента', NULL, NULL),
('Clients.DialogSelect', 0, 'Диалог выбора клиента', NULL, NULL),
('Clients.Update', 0, 'Редактирование клиента', NULL, NULL),
('Clients.View', 0, 'Просмотр клиента', NULL, NULL),
('Currency.*', 1, 'Справочник  "Валюты"', NULL, 'N;'),
('Currency.Admin', 0, 'Управление валютами', NULL, 'N;'),
('Currency.Create', 0, 'Добавление валюты', NULL, 'N;'),
('Currency.Delete', 0, 'Удаление валюты', NULL, 'N;'),
('Currency.DialogSelect', 0, 'Диалог выбора валюты', NULL, 'N;'),
('Currency.Update', 0, 'Редактирование валюты', NULL, 'N;'),
('Currency.View', 0, 'Просмотр валюты', NULL, 'N;'),
('CurrencyRate.*', 1, 'Справочник  "Курсы валют"', NULL, 'N;'),
('CurrencyRate.Admin', 0, 'Управление курсами валют', NULL, 'N;'),
('CurrencyRate.Create', 0, 'Добавление курсов валют', NULL, 'N;'),
('CurrencyRate.Delete', 0, 'Удаление курсов валют', NULL, 'N;'),
('CurrencyRate.DialogSelect', 0, 'Диалог выбора курсов валют', NULL, 'N;'),
('CurrencyRate.Update', 0, 'Редактирование курсов валют', NULL, 'N;'),
('CurrencyRate.View', 0, 'Просмотр курса валюты', NULL, 'N;'),
('Franchise', 2, 'Франчайзер', NULL, NULL),
('Request.*', 1, 'Заявки', NULL, 'N;'),
('Request.Admin', 0, 'Управление заявками (Текущие)', NULL, NULL),
('Request.Archived', 0, 'Управление заявками (Архив)', NULL, NULL),
('Request.Create', 0, 'Добавление заявки', NULL, ''),
('Request.Delete', 0, 'Удаление заявки', 'return Yii::app()->user->id===$params["id"];', NULL),
('Request.Update', 0, 'Редактирование заявки', 'return Yii::app()->user->id===$params["id"];', NULL),
('Request.View', 0, 'Просмотр заявки', 'return Yii::app()->user->id===$params["id"];', NULL),
('Site.*', 1, 'Главная страница', NULL, 'N;'),
('Site.Index', 0, 'Просмотр главной страницы', NULL, NULL),
('SuperAdmin', 2, 'Супер администратор', NULL, NULL),
('User.*', 1, 'Пользователи', NULL, 'N;'),
('User.Admin', 0, 'Управление пользователями', NULL, NULL),
('User.Create', 0, 'Добавление пользователя', NULL, NULL),
('User.Delete', 0, 'Удаление пользователя', NULL, NULL),
('User.DialogSelect', 0, 'Диалог выбора пользователя', NULL, NULL),
('User.Update', 0, 'Редактирование пользователя', NULL, NULL),
('User.View', 0, 'Просмотр пользователя', NULL, NULL),
('UserActionLog.*', 1, 'Журнал действий пользователей', NULL, 'N;'),
('UserActionLog.Admin', 0, 'Просмотр журнала действий пользователей', NULL, 'N;');

-- --------------------------------------------------------

--
-- Структура таблицы `authitemchild`
--

CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('Admin', 'About.*'),
('Franchise', 'About.*'),
('About.*', 'About.Index'),
('Admin', 'Clients.*'),
('Franchise', 'Clients.*'),
('Clients.*', 'Clients.Admin'),
('Clients.*', 'Clients.Create'),
('Clients.*', 'Clients.Delete'),
('Clients.*', 'Clients.DialogSelect'),
('Clients.*', 'Clients.Update'),
('Clients.*', 'Clients.View'),
('Admin', 'Currency.*'),
('Currency.*', 'Currency.Admin'),
('Currency.*', 'Currency.Create'),
('Currency.*', 'Currency.Delete'),
('Currency.*', 'Currency.DialogSelect'),
('Currency.*', 'Currency.Update'),
('Currency.*', 'Currency.View'),
('Admin', 'CurrencyRate.*'),
('CurrencyRate.*', 'CurrencyRate.Admin'),
('CurrencyRate.*', 'CurrencyRate.Create'),
('CurrencyRate.*', 'CurrencyRate.Delete'),
('CurrencyRate.*', 'CurrencyRate.DialogSelect'),
('CurrencyRate.*', 'CurrencyRate.Update'),
('CurrencyRate.*', 'CurrencyRate.View'),
('Admin', 'Request.*'),
('Franchise', 'Request.*'),
('Request.*', 'Request.Admin'),
('Request.*', 'Request.Archived'),
('Request.*', 'Request.Create'),
('Request.*', 'Request.Delete'),
('Request.*', 'Request.Update'),
('Request.*', 'Request.View'),
('Admin', 'Site.*'),
('Franchise', 'Site.*'),
('Site.*', 'Site.Index'),
('Admin', 'User.*'),
('User.*', 'User.Admin'),
('User.*', 'User.Create'),
('User.*', 'User.Delete'),
('User.*', 'User.DialogSelect'),
('User.*', 'User.Update'),
('User.*', 'User.View'),
('Admin', 'UserActionLog.*'),
('UserActionLog.*', 'UserActionLog.Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) NOT NULL COMMENT 'ФИО',
  `address` text NOT NULL COMMENT 'Адрес',
  `phone` varchar(25) DEFAULT NULL COMMENT 'Телефон',
  `email` varchar(150) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`),
  KEY `fio` (`fio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `fio`, `address`, `phone`, `email`, `comment`) VALUES
(1, 'Иванов Иван Иванович', '27948, Херсонская обл., г. Новая Каховка, ул. Днепровкая, д. 29, кв. 27', '0867894587', 'ivanov@example.com', NULL),
(4, 'Петров Петр Петрович', '02410, г. Киев, пр. Бажана, д. 28, кв. 45', '0245874587', 'petrov@example.com', 'Comment'),
(6, 'Сидоров Сидор Сидорович', 'Хмельницкая обл., г. Хмельницкий, ул. Ленина, д. 34', '0547887887', 'sidorov@example.com', 'Комментарий'),
(7, 'Игнатьев Сергей Николаевич', 'Харьков', NULL, NULL, NULL),
(8, 'Ломова Влентина', 'Киев', NULL, NULL, NULL),
(9, 'Макарова Енисея Борисовна', 'Херсонская обл., г. Каховка', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE `currency` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID записи',
  `name` varchar(100) NOT NULL COMMENT 'Наименование валюты (может быть любым. Уникально)',
  `ISOChar` varchar(3) DEFAULT NULL COMMENT 'Трёхбуквенный алфавитный (alfa-3) код валюты (ISO)',
  `ISONum` varchar(3) DEFAULT NULL COMMENT 'Трёхзначный цифровой (number-3) код валюты (ISO)',
  `base` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Признак базовой валюты. Базовая валюта может быть только 1. Проверка на уровне php.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `ISOChar` (`ISOChar`),
  UNIQUE KEY `ISONum` (`ISONum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Валюты';

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `name`, `ISOChar`, `ISONum`, `base`) VALUES
(1, 'Гривна', 'UAH', '980', 1),
(2, 'Рубль', 'RUB', '643', 0),
(3, 'Доллар', 'USD', '840', 0),
(4, 'Евро', 'EUR', '978', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `currency_rate`
--

CREATE TABLE `currency_rate` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID записи',
  `parentId` smallint(5) unsigned NOT NULL COMMENT 'ID валюты, по отношению к котрой выставляется курс',
  `rate` decimal(10,2) unsigned NOT NULL COMMENT 'Курс',
  `currencyId` smallint(5) unsigned NOT NULL COMMENT 'ID валюты, которая в данном случае выступает валютой',
  `unit` decimal(10,2) unsigned NOT NULL COMMENT 'Количество единиц валюты, за которое дают rate',
  `date` datetime NOT NULL COMMENT 'Дата курса',
  PRIMARY KEY (`id`),
  KEY `parentId` (`parentId`,`currencyId`,`date`),
  KEY `currencyId` (`currencyId`),
  KEY `date` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Курсы валют';

--
-- Дамп данных таблицы `currency_rate`
--

INSERT INTO `currency_rate` (`id`, `parentId`, `rate`, `currencyId`, `unit`, `date`) VALUES
(1, 1, '25.19', 2, '100.00', '2012-05-24 00:00:00'),
(2, 1, '8.04', 3, '1.00', '2012-05-24 00:00:00'),
(3, 1, '10.10', 4, '1.00', '2012-05-25 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(10) NOT NULL COMMENT 'Номер заявки',
  `date` date DEFAULT NULL COMMENT 'Дата заявки',
  `buyer` int(11) NOT NULL COMMENT 'Покупатель (ссылка на таблицу клиентов)',
  `buyer_name` varchar(255) NOT NULL,
  `base_cost` decimal(10,2) DEFAULT NULL COMMENT 'Базовая стоимость',
  `currency` varchar(3) DEFAULT NULL COMMENT 'Валюта (3-х буквенный код)',
  `discount` decimal(5,2) DEFAULT NULL COMMENT 'Скидка, %',
  `comment` text NOT NULL COMMENT 'Комментарий',
  `org` varchar(255) DEFAULT NULL COMMENT 'Организация',
  `officer` int(11) NOT NULL COMMENT 'Ответственный (ссылка на таблицу users)',
  `officer_name` varchar(128) NOT NULL COMMENT 'Имя ответственного пользователя',
  `program` text COMMENT 'Программа',
  `blocked` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT 'Заюлокирована (0-нет, 1-да)',
  `archived` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT 'Архивная (0-нет, 1-да)',
  `pay_status` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT 'Статус оплаты (0-нет, 1-да)',
  `pay_date` date DEFAULT NULL COMMENT 'Дата предполгаемой оплаты',
  `non_cash` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0' COMMENT 'Безналичный расчет (0-нет, 1-да)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`),
  KEY `date` (`date`,`buyer`,`officer`,`blocked`,`archived`,`pay_status`,`pay_date`,`non_cash`),
  KEY `buyer` (`buyer`,`officer`),
  KEY `officer` (`officer`),
  KEY `officer_name` (`officer_name`),
  KEY `buyer_name` (`buyer_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Заказы';

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `number`, `date`, `buyer`, `buyer_name`, `base_cost`, `currency`, `discount`, `comment`, `org`, `officer`, `officer_name`, `program`, `blocked`, `archived`, `pay_status`, `pay_date`, `non_cash`) VALUES
(1, 1, '2012-03-08', 4, 'Петров Петр Петрович', '258.36', 'UAH', '0.00', '', 'Организация', 1, 'superadmin', '', 0, 0, 0, NULL, 0),
(2, 2, '2012-03-01', 6, 'Сидоров Сидор Сидорович', '1258.00', 'UAH', '0.00', '', 'Организация', 1, 'superadmin', '', 0, 1, 0, NULL, 0),
(3, 3, '2012-03-02', 1, 'Иванов Иван Иванович', '5000.00', 'UAH', '0.00', '', 'Организация1', 3, 'dimon', '', 0, 1, 0, '2012-03-05', 0),
(4, 4, '2012-03-01', 8, 'Ломова Влентина', '1258.00', 'UAH', '0.00', '', 'Юг-Торг', 4, 'demo', '', 0, 0, 0, '2012-03-04', 1),
(5, 5, '2012-03-02', 7, 'Игнатьев Сергей Николаевич', '15000.00', 'UAH', '0.00', '', 'Юг-Торг', 4, 'demo', '', 0, 0, 0, '2012-03-11', 0),
(6, 6, '2012-03-01', 9, 'Макарова Енисея Борисовна', '258.36', 'UAH', '0.00', '', 'Тур по миру', 5, 'franc', 'Путешествие во Флориду', 0, 1, 1, '2012-03-03', 0),
(7, 7, '2012-03-02', 6, 'Сидоров Сидор Сидорович', '5000.00', 'UAH', '0.00', '', 'Тур по миру', 5, 'franc', 'Путешествие во Флориду', 0, 0, 1, '2012-03-02', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rights`
--

CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin@example.com'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com'),
(3, 'dimon', 'bd80c96400c0e0d01df3bddc8229e30d', 'dimon@example.com'),
(4, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com'),
(5, 'franc', '556beda6725423548245093854f167ac', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_action_log`
--

CREATE TABLE `user_action_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `old_value` text COMMENT 'Старое значение поля',
  `new_value` text COMMENT 'Новое значение поля',
  `action` varchar(30) NOT NULL COMMENT 'Действие, произведенное с записью',
  `model` varchar(100) NOT NULL COMMENT 'Имя класса модели',
  `field` varchar(50) DEFAULT NULL COMMENT 'Имя поля, с которым производилось действие',
  `user_id` int(11) NOT NULL COMMENT 'Id пользователя',
  `record_id` varchar(50) NOT NULL COMMENT 'Id записи, с котрой производилось действие (была обновлена, удалена или добавлена)',
  `date` datetime NOT NULL COMMENT 'Дата действия',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Таблица логов действий пользователей';

--
-- Дамп данных таблицы `user_action_log`
--

INSERT INTO `user_action_log` (`id`, `old_value`, `new_value`, `action`, `model`, `field`, `user_id`, `record_id`, `date`) VALUES
(1, NULL, NULL, 'INSERT', 'CurrencyRate', NULL, 1, '3', '2012-05-28 23:17:08'),
(2, NULL, '2012-05-25', 'SET', 'CurrencyRate', 'date', 1, '3', '2012-05-28 23:17:08'),
(3, NULL, '4', 'SET', 'CurrencyRate', 'currencyId', 1, '3', '2012-05-28 23:17:08'),
(4, NULL, '1', 'SET', 'CurrencyRate', 'unit', 1, '3', '2012-05-28 23:17:08'),
(5, NULL, '1', 'SET', 'CurrencyRate', 'parentId', 1, '3', '2012-05-28 23:17:08'),
(6, NULL, '10.1', 'SET', 'CurrencyRate', 'rate', 1, '3', '2012-05-28 23:17:08'),
(7, NULL, '3', 'SET', 'CurrencyRate', 'id', 1, '3', '2012-05-28 23:17:08');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authassignment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `currency_rate`
--
ALTER TABLE `currency_rate`
  ADD CONSTRAINT `currency_rate_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `currency_rate_ibfk_2` FOREIGN KEY (`currencyId`) REFERENCES `currency` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`buyer`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`officer`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_3` FOREIGN KEY (`officer_name`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`buyer_name`) REFERENCES `clients` (`fio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
