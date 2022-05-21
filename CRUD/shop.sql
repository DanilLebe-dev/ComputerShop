-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 21 2022 г., 09:37
-- Версия сервера: 5.6.51
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` bigint(15) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone_number`, `email`) VALUES
(1, 'Иван ', 2147483647, 'Ivan123@mail.ru'),
(2, 'Федор', 89224814261, 'fedor.aa@mail.ru'),
(5, 'Данил', 89923106723, '21danik11@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `full_name`, `login`, `password`, `email`) VALUES
(1, 'Ян', 'admin', 'admin', 'admin@mail.ru'),
(2, 'Дима', 'log', 'pass', 'dima0072mail.ru'),
(3, 'Вася', 'vasvas', 'vasvas', 'vasvas@mail.ru'),
(5, 'Коля', 'lololo', 'lololo', 'lololo@mail.ru'),
(6, 'Петя', 'kokoko', 'kokoko', 'kokoko@mail.ru'),
(7, 'Данил', 'Danil', '21danik11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `summ` int(11) DEFAULT NULL,
  `col` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `phone_number` bigint(15) DEFAULT NULL,
  `id_employee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_product`, `description`, `summ`, `col`, `date_order`, `id_client`, `phone_number`, `id_employee`) VALUES
(2, 3, '1212', 122222, 12, '2022-05-10', 1, 122, 1),
(3, 2, '123', 222, 2, '0000-00-00', 1, 888, 1),
(23, 3, 'opisanie', 11, 11, '0000-00-00', 1, 11, 1),
(25, 3, 'dea', 122, 1, '2022-05-17', 1, 444, 3),
(26, 3, 'opisanie', 122, 1, '2022-05-17', 2, 444, 3),
(34, 3, 'Видеокарта Geforce GTX 970 4gb', 51000, 3, '2022-05-20', 1, 89224525882, 1),
(35, 2, 'Видеокарта Geforce GTX 980 6gb', 4000, 2, '2022-05-21', 5, 89923106723, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` bigint(11) DEFAULT NULL,
  `col` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `id_product_group` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `col`, `description`, `id_product_group`) VALUES
(2, 'GTX 980', 2000, 5, 'Видеокарта Geforce GTX 980 6gb', 11),
(3, 'GTX 970', 1500, 1, 'Видеокарта Geforce GTX 970 4gb', 11),
(4, 'GTX 1060', 3500, 2, 'Видеокарта Geforce GTX 1060', 11),
(5, 'IntelCore i5 9700k', 900, 1, 'Процессор Интел', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `products_groups`
--

CREATE TABLE `products_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products_groups`
--

INSERT INTO `products_groups` (`id`, `name`) VALUES
(2, 'Процессоры'),
(11, 'Видеокарты'),
(12, 'ОЗУ'),
(13, 'Блоки питания'),
(14, 'Мониторы');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_employee` (`id_employee`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products_groups`
--
ALTER TABLE `products_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `products_groups`
--
ALTER TABLE `products_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_employee`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
