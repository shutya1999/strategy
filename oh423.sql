-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 21 2019 г., 12:27
-- Версия сервера: 10.2.7-MariaDB
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `oh423`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('Manager', 1, 'менеджеры с правом добавлять пользователей', NULL, NULL, 1527586789, 1527586789),
('создание пользователя', 2, 'создание пользователя', NULL, NULL, 1527587871, 1527587871);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short` varchar(16) NOT NULL,
  `default` smallint(6) NOT NULL DEFAULT 0,
  `date_update` int(11) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lang`
--

INSERT INTO `lang` (`id`, `url`, `img_url`, `local`, `name`, `short`, `default`, `date_update`, `date_create`) VALUES
(2, 'ru', '/images/ru.png', 'ru-RU', 'Русский', 'Рус', 0, 1469520200, 1469520200),
(4, 'ua', '/images/ua.png', 'uk-UA', 'Украинский', 'Укр', 0, 1469520200, 1469520200),
(5, 'en', '/images/en.png', 'en-EN', 'English', 'Eng', 1, 1469520200, 1469520200);

-- --------------------------------------------------------

--
-- Структура таблицы `local`
--

CREATE TABLE `local` (
  `id` int(11) NOT NULL,
  `var` varchar(255) NOT NULL,
  `ru` text DEFAULT NULL,
  `ua` text DEFAULT NULL,
  `en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `local`
--

INSERT INTO `local` (`id`, `var`, `ru`, `ua`, `en`) VALUES
(1, 'txtTest', 'Заглушка (русский)', 'Заглушка (українська)', 'Заглушка (english)');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1523015289),
('m140209_132017_init', 1523015293),
('m140403_174025_create_account_table', 1523015293),
('m140504_113157_update_tables', 1523015295),
('m140504_130429_create_token_table', 1523015295),
('m140830_171933_fix_ip_field', 1523015295),
('m140830_172703_change_account_table_name', 1523015295),
('m141222_110026_update_ip_field', 1523015295),
('m141222_135246_alter_username_length', 1523015295),
('m150614_103145_update_social_account_table', 1523015296),
('m150623_212711_fix_username_notnull', 1523015296),
('m151218_234654_add_timezone_to_profile', 1523015296),
('m160929_103127_add_last_login_at_to_user_table', 1523015297);

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, 'Artur', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Ukrain', 'http://st.zhyvoedelo.com/', 'admin UAitLAB', 'Europe/Warsaw');

-- --------------------------------------------------------

--
-- Структура таблицы `profile1`
--

CREATE TABLE `profile1` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(64) NOT NULL,
  `date` varchar(64) NOT NULL,
  `period` int(11) NOT NULL,
  `program` varchar(64) NOT NULL,
  `payment` int(11) NOT NULL,
  `payment_date` varchar(64) NOT NULL,
  `card_num` int(11) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `midname` varchar(64) NOT NULL,
  `birth` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `pasport` varchar(64) NOT NULL,
  `pasport_date` varchar(64) NOT NULL,
  `code_id` varchar(64) NOT NULL,
  `company` varchar(64) NOT NULL,
  `job` varchar(64) NOT NULL,
  `tel` varchar(64) NOT NULL,
  `manager` int(11) NOT NULL,
  `bankid_id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile1`
--

INSERT INTO `profile1` (`id`, `user_id`, `code`, `date`, `period`, `program`, `payment`, `payment_date`, `card_num`, `surname`, `name`, `midname`, `birth`, `address`, `mail`, `pasport`, `pasport_date`, `code_id`, `company`, `job`, `tel`, `manager`, `bankid_id`) VALUES
(1, 47, '-', '-', 1, '-', 1, '-', 0, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `redirect`
--

CREATE TABLE `redirect` (
  `id` int(11) NOT NULL,
  `old` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `redirect`
--

INSERT INTO `redirect` (`id`, `old`, `destination`) VALUES
(1, '/test', '/site/redirect_test/');

-- --------------------------------------------------------

--
-- Структура таблицы `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `social_account`
--

INSERT INTO `social_account` (`id`, `user_id`, `provider`, `client_id`, `data`, `code`, `created_at`, `email`, `username`) VALUES
(7, 1, 'google', '104134355095686098021', '{\"kind\":\"plus#person\",\"etag\":\"\\\"jb1Xzanox6i8Zyse4DcYD8sZqy0/IavbsYyrvHXhDQ28Xq-JT9Co8ZU\\\"\",\"gender\":\"male\",\"emails\":[{\"value\":\"hydrolisk82@gmail.com\",\"type\":\"account\"}],\"objectType\":\"person\",\"id\":\"104134355095686098021\",\"displayName\":\"Artur Yaroshuk\",\"name\":{\"familyName\":\"Yaroshuk\",\"givenName\":\"Artur\"},\"url\":\"https://plus.google.com/104134355095686098021\",\"image\":{\"url\":\"https://lh5.googleusercontent.com/-OpBA-gWhh7U/AAAAAAAAAAI/AAAAAAAAAAA/APUIFaODyymwX3SYjBYZiHXrWQJWsjM44Q/mo/photo.jpg?sz=50\",\"isDefault\":true},\"isPlusUser\":true,\"language\":\"ru\",\"circledByCount\":2,\"verified\":false}', NULL, NULL, 'hydrolisk82@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'HrARR2ymCZphY6MsMymwFKuOMAe0s4Jx', 1544621611, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) DEFAULT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `promo_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `role`, `parent_id`, `token`, `promo_id`) VALUES
(1, 'admin', 'hydrolisk82@gmail.com', '$2y$12$j7dqRCslVOtz.wvhY0cgSehbBo/36cRmCC8qtGQMQjlpZo/EeYOgu', 'M158BlXEB8aWf3FQJQMW8aualK4Zodzn', 1523350379, NULL, NULL, '127.0.0.1', 1523350337, 1539072703, 0, 1566377084, 1, 0, 'B47hnts11bTG46kv', 'default');

--
-- Триггеры `user`
--
DELIMITER $$
CREATE TRIGGER `gen_hash` BEFORE INSERT ON `user` FOR EACH ROW SET NEW.token = MD5(NEW.email)
$$
DELIMITER ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `var` (`var`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `profile1`
--
ALTER TABLE `profile1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `redirect`
--
ALTER TABLE `redirect`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Индексы таблицы `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `local`
--
ALTER TABLE `local`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `profile1`
--
ALTER TABLE `profile1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `redirect`
--
ALTER TABLE `redirect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
