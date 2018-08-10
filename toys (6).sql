-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 17 2018 г., 10:25
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `toys`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `created_at`, `updated_at`, `cat_name`) VALUES
(1, NULL, NULL, 'logic'),
(2, NULL, NULL, 'fun'),
(3, NULL, NULL, 'Настольные игры');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_02_23_192814_create_products_table', 1),
(9, '2018_02_23_194711_create_category_table', 1),
(10, '2018_02_23_194845_update_category_table', 1),
(11, '2018_02_23_195601_update_products_table', 2),
(12, '2018_02_25_203659_update_products_table', 3),
(13, '2018_03_06_142251_update_category_table', 4),
(14, '2018_03_06_144151_create_orders_table', 5),
(15, '2018_03_08_105837_update_orders_table', 6),
(16, '2018_03_11_171917_add_columns_to_orders_table', 7),
(17, '2018_03_14_165930_update_products_table', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `order_list` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_list` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `delivery_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `articuls` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `status`, `order_list`, `order_quantity`, `price_list`, `amount`, `created_at`, `updated_at`, `adress`, `name`, `number`, `delivery_method`, `articuls`, `city`) VALUES
(7, 0, 'a:1:{i:0;s:6:\"Castle\";}', 'a:1:{i:0;i:1;}', 'a:1:{i:0;d:327;}', '327', '2018-03-12 08:55:08', '2018-03-12 08:55:08', 'Пушкинская 79/5', 'Влад', 500262587, 'post', 'a:1:{i:0;s:1:\"2\";}', 'Ха'),
(8, 1, 'a:3:{i:0;s:6:\"Castle\";i:1;s:6:\"Castle\";i:2;s:6:\"Castle\";}', 'a:3:{i:0;i:1;i:1;i:1;i:2;i:1;}', 'a:3:{i:0;d:327;i:1;d:654;i:2;d:495;}', '1,476.00', '2018-03-12 09:15:58', '2018-03-12 09:15:58', 'Kosareva 25', 'Влад', 500262587, 'post', 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"5\";i:2;s:1:\"4\";}', 'Харьков');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `articul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` float UNSIGNED NOT NULL,
  `selling_price` float UNSIGNED NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `articul`, `purchase_price`, `selling_price`, `discount`, `category_id`, `short_description`, `description`, `created_at`, `updated_at`, `image`, `site`) VALUES
(1, 'Ninjago', 'ФР-00005381', 0.826, 1.24, 0, 3, 'Игра настольная Ninjago', 'Игра настольная Ninjago', '2018-03-14 15:35:17', '2018-03-14 15:35:17', 'images/Ninjago.jpg', 'http://kancpartner.com.ua'),
(2, 'Robocar Poli', 'ФР-00005382', 0.826, 1.24, 0, 3, 'Игра настольная Robocar Poli', 'Игра настольная Robocar Poli', '2018-03-14 15:44:24', '2018-03-14 15:44:24', 'images/RobocarPoli.jpg', 'http://kancpartner.com.ua'),
(3, 'UNO Kids', 'ФР-00007402', 1.33, 1.985, 0, 3, 'Игра настольная UNO Kids', 'Игра настольная UNO Kids', '2018-03-14 15:46:53', '2018-03-14 15:46:53', 'images/UnoKids.jpg', 'http://kancpartner.com.ua'),
(4, 'Гламурные красотки', 'ФР-00004623', 0.826, 1.24, 0, 3, 'Настольная игра Гламурные красотки', 'Настольная игра Гламурные красотки', '2018-03-14 15:48:50', '2018-03-14 15:48:50', 'images/Glamour.jpg', 'http://kancpartner.com.ua'),
(5, 'Гонки! Спасательный патруль', 'ФР-00005488', 0.826, 1.24, 0, 3, 'Настольная игра Гонки! Спасательный патруль', 'Настольная игра Гонки! Спасательный патруль', '2018-03-14 15:51:04', '2018-03-14 15:51:04', 'images/Patrul.jpg', 'http://kancpartner.com.ua'),
(6, 'Долина фей', 'ФР-00004625', 0.826, 1.24, 0, 3, 'Игра настольная Долина фей', 'Игра настольная Долина фей', '2018-03-14 15:52:11', '2018-03-14 15:52:11', 'images/fei.jpg', 'http://kancpartner.com.ua'),
(7, 'Золушка', 'ФР-00004691', 0.826, 1.24, 0, 3, 'Игра настольная Золушка', 'Игра настольная Золушка', '2018-03-14 15:54:04', '2018-03-14 15:54:04', 'images/zolushka.jpg', 'http://kancpartner.com.ua'),
(8, 'Мои любимые Пони', 'ФР-00005384', 0.826, 1.24, 0, 3, 'Игра настольная Мои любимые Пони', 'Игра настольная Мои любимые Пони', '2018-03-14 15:55:13', '2018-03-14 15:55:13', 'images/Poni.jpg', 'http://kancpartner.com.ua'),
(9, 'Детское Лото', 'DT L40C2U', 0.826, 1.24, 0, 3, 'Настольная игра Детское Лото', 'Настольная игра Детское Лото', '2018-03-14 15:56:21', '2018-03-14 15:56:21', 'images/Loto.jpg', 'http://kancpartner.com.ua'),
(10, 'Домино \"Астерикс и Обеликс\"', '55533', 1.083, 1.624, 0, 3, 'Домино \"Астерикс и Обеликс\"', 'Домино \"Астерикс и Обеликс\"', '2018-03-14 15:57:34', '2018-03-14 15:57:34', 'images/Asteriks.jpg', 'http://kancpartner.com.ua'),
(11, 'Домино \"Винни Пух\"', '54231', 1.163, 1.744, 0, 3, 'Домино \"Винни Пух\"', 'Домино \"Винни Пух\"', '2018-03-14 17:50:23', '2018-03-14 17:50:23', 'images/Puh.jpg', 'http://kancpartner.com.ua'),
(12, 'Домино \"Карлсон\"', '54232', 1.163, 1.744, 0, 3, 'Домино \"Карлсон\"', 'Домино \"Карлсон\"', '2018-03-14 17:51:34', '2018-03-14 17:51:34', 'images/Karlson.jpg', 'http://kancpartner.com.ua'),
(13, 'Домино \"Простоквашино\"', '50989', 1.163, 1.744, 0, 3, 'Домино \"Простоквашино\"', 'Домино \"Простоквашино\"', '2018-03-14 17:52:56', '2018-03-14 17:52:56', 'images/Prostokvashino.jpg', 'http://kancpartner.com.ua'),
(14, 'Домино детское \"Животные\"', 'ФР-00002610', 0.95, 1.426, 0, 3, 'Домино детское \"Животные\"', 'Домино детское \"Животные\"', '2018-03-14 17:58:06', '2018-03-14 17:58:06', 'images/Zveri.jpg', 'http://kancpartner.com.ua'),
(15, 'Домино детское \"Сказки\"', '55226', 0.95, 1.426, 0, 1, 'Домино детское \"Сказки\"', 'Домино детское \"Сказки\"', '2018-03-14 18:02:15', '2018-03-14 18:02:15', 'images/Skazki.jpg', 'http://kancpartner.com.ua'),
(16, '\"Клевая рыбалка\" и \"Кинетический песок', 'ФР-00007659', 7.028, 8.24, 0, 1, 'Игра большая наст. \"2 в 1: \"Клевая рыбалка\" и \"Кинетический песок', 'Игра большая наст. \"2 в 1: \"Клевая рыбалка\" и \"Кинетический песок', '2018-03-14 18:04:21', '2018-03-14 18:04:21', 'images/ribalka.jpg', 'http://kancpartner.com.ua'),
(17, '\"Большой бизнес\"', 'ФР-00004856', 1.447, 2.17, 0, 1, 'Игра большая наст. \"Большой бизнес\"', 'Игра большая наст. \"Большой бизнес\"', '2018-03-14 18:05:56', '2018-03-14 18:05:56', 'images/businessMan.jpg', 'http://kancpartner.com.ua'),
(18, '\"Мегаполия\"', 'ФР-00005025', 1.447, 2.17, 0, 1, 'Игра большая наст. \"Мегаполия\"', 'Игра большая наст. \"Мегаполия\"', '2018-03-14 18:11:33', '2018-03-14 18:11:33', 'images/Megapoliya.jpg', 'http://kancpartner.com.ua'),
(19, '\"КТО Я?\"', 'ФР-00007499', 4.63, 5.773, 0, 1, 'Игра большая наст. \"КТО Я?\"', 'Игра большая наст. \"КТО Я?\"', '2018-03-14 18:13:18', '2018-03-14 18:13:18', 'images/WhoAmI.jpg', 'http://kancpartner.com.ua');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vlad', 'kabantsovlad@gmail.com', '$2y$10$T3LjTzudvezdOKPfoBcggeqDxyg1IuCNcQhFwoqEAvDm/gmGrqt3C', NULL, '2018-02-23 18:15:38', '2018-02-23 18:15:38');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
