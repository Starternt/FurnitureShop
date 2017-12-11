-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 11 2017 г., 18:03
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(13, 'Ручки', 4, 1),
(14, 'Скрытые ручки', 2, 1),
(15, 'Ручки-профили', 3, 1),
(16, 'Изготовление рамочных фасадов', 5, 1),
(17, 'Цокольная система', 6, 1),
(18, 'Кромочный профиль', 7, 1),
(19, 'Профили для ниш', 8, 1),
(20, 'Карусели', 14, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `description`, `status`) VALUES
(1, '  Prev Next Профиль 901014 для фасадов без ручек (49,3х23 мм), черный, 5 м.', 14, 344323, 666, 1, 'HP', 'an item from hell', 1),
(2, ' Профиль для LED-подсветки 901127 для фасадов без ручек (51х24 мм), анодированный алюминий, 6 м.', 14, 2343847, 435, 1, 'Hewlett Packard', 'Скрытые ручки придают кухне современный внешний вид в сочетании с высочайшей функциональностью.\r\nЦвет: черный\r\nДлина: 5 метров\r\nОбращаем Ваше внимание, что профиль поставляется в хлыстах по 5 метров. Цена указана на хлыст (5 м.)', 1),
(3, '  Prev Next Профиль 901013 для фасадов без ручек (63,6х23 мм), черный, 5 м.', 14, 2028027, 270, 1, 'Asus', 'Скрытые ручки придают кухне современный внешний вид в сочетании с высочайшей функциональностью.\r\nЦвет: черный.\r\nДлина: 5 метров\r\nОбращаем Ваше внимание, что профиль поставляется в хлыстах по 5 метров. Цена указана на хлыст (5 м.)', 1),
(4, 'Профиль 928145 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 м', 14, 2019487, 325, 1, 'Acer', 'Скрытые ручки с LED-подсветкой создает уютную атмосферу комфорта на Вашей кухне. LED-подсветка освещает рабочую поверхность, что создает впечатляющий визуальный эффект. Светодиодная лента в комплект не входит.\r\n\r\nЦвет: анодированный алюминий\r\nДлина: 5000 мм\r\nОбращаем Ваше внимание, что профиль поставляется в хлыстах по 5 м. Цена указана на хлыст (5000 мм)', 1),
(5, 'Профиль для навесных ящиков 901281, черный, 5 м.', 17, 1953212, 275, 1, 'Acer', 'Профиль для навесных ящиков 901281, черный, 5 м.Профиль для навесных ящиков 901281, черный, 5 м.Профиль для навесных ящиков 901281, черный, 5 м.', 1),
(6, ' Угловой соединитель 550512', 14, 1602042, 370, 1, 'Lenovo', '\r\nУгловой соединитель 550512\r\nУгловой соединитель 550512\r\nУгловой соединитель 550512\r\nУгловой соединитель 550512\r\nУгловой соединитель 550512', 1),
(7, ' Угловой соединитель 550512fa', 14, 2028367, 430, 1, 'Asus', '\r\nУгловой соединитель 550512ss\r\nУгловой соединитель 550512ss\r\nУгловой соединитель 550512ss', 1),
(8, 'Профиль 928143 для LED-подсветки верхнего шкафа для 55 мм плиты, анодированный алюминий, 5 м', 13, 1129365, 780, 1, 'Samsung', 'Профиль 928143 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 мПрофиль 928143 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 мПрофиль 928143 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 м', 1),
(9, 'Профиль 928143 для LED-подсветки верхнего шкафа для 77 мм плиты, анодированный алюминий, 5 м', 16, 1128670, 640, 1, 'Samsung', 'Профиль 928143 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 мПрофиль 928143 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 мПрофиль343 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 м', 1),
(10, 'Профиль 928143 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 м', 20, 683364, 210, 1, 'Gazer', 'Светорассеивающий профиль-заглушка для LED-подсветки, матовый, 2 мСветорассеивающий профиль-заглушка для LED-подсветки, матовый, 2 мСветорассеивающий профиль-заглушка для LED-подсветки, матовый, 2 м', 1),
(11, 'Профиль 928143 для LED-подсветки верхнего шкафа для 33 мм плиты, анодированный алюминий, 5 м', 15, 355025, 175, 1, 'Dell', 'С расширением Full HD Вы сможете рассмотреть мельчайшие детали. Dell E2314H предоставит Вам резкое и четкое изображение, с которым любая работа будет в удовольствие. Full HD 1920 x 1080 при 60 Гц разрешение (макс.)', 1),
(12, 'Профиль 928143 для LED-подсветки верхнего шкафа для 333 мм плиты, анодированный алюминий, 5 м', 19, 1563832, 1320, 1, 'Everest', 'Профиль 928143 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 мПрофиль 928143 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 мПрофиль 928143 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 мПрофиль 928143 для LED-подсветки верхнего шкафа для 16 мм плиты, анодированный алюминий, 5 м', 1),
(13, 'Светорассеивающий профиль-заглушка для LED-подсветки, матовый, 2 м', 14, 23555, 32, 1, 'Schociu', 'Светорассеивающий профиль-заглушка для LED-подсветки, матовый, 2 мСветорассеивающий профиль-заглушка для LED-подсветки, матовый, 2 мСветорассеивающий профиль-заглушка для LED-подсветки, матовый, 2 мСветорассеивающий профиль-заглушка для LED-подсветки, матовый, 2 м', 1),
(14, ' Угловой соединитель внутренний для черного профиля 901014, черный', 18, 43543543, 32, 1, 'Acuo', '\r\nУгловой соединитель внутренний для черного профиля 901014, черный\r\nУгловой соединитель внутренний для черного профиля 901014, черный\r\nУгловой соединитель внутренний для черного профиля 901014, черный\r\nУгловой соединитель внутренний для черного профиля 901014, черный', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(45, 'Test', '1', '123123123', 4, '2015-05-14 09:54:45', '{\"1\":1,\"2\":1,\"3\":2}', 3),
(46, 'Test', 'g3424242342', 'фыа', 4, '2015-05-18 15:34:42', '{\"44\":3,\"43\":3}', 1),
(47, 'Test', '32423432', 'no', 3, '2017-10-15 23:00:53', '{\"1\":3,\"2\":1,\"3\":4}', 1),
(48, 'Test', '3242343', '3232', 3, '2017-10-15 23:02:54', '{\"1\":3,\"2\":1,\"3\":4}', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(61, 'Test', 'test@test.test', '$2y$10$6bi2/V8MFxV.BurjlZ.1AOnWk06UsErbO9QFtqR1PWkZqx4p6EIm6', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;