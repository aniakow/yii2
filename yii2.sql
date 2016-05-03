-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Maj 2016, 01:43
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `yii2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id_category` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id_category`, `name`, `description`) VALUES
(1, 'Agroturystyka', ''),
(2, 'Pensjonat', ''),
(3, 'Internat', ''),
(4, 'Schronisko', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `name` varchar(40) NOT NULL,
  `nip` varchar(13) NOT NULL,
  `address_street` varchar(50) NOT NULL,
  `address_city` varchar(50) NOT NULL,
  `address_zip` varchar(6) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `companies`
--

INSERT INTO `companies` (`id`, `category_id`, `add_date`, `name`, `nip`, `address_street`, `address_city`, `address_zip`, `active`, `comments`) VALUES
(1, 1, '2016-04-28', 'Usługi hotelowe', '753-15-20-320', 'ul. Kolejowa 2', 'Mosina', '62-050', 1, ''),
(2, 2, '2016-04-28', 'Noclegi Hrapek', '777 66 55 444', 'ul. Chmielna 6', 'Mielno', '67-032', 1, ''),
(3, 1, '2016-04-29', 'abg', '000-000-00-00', 'Address Street', 'Address City', 'Addres', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean maximus pellentesque magna, eget vestibulum erat accumsan eget. Vestibulum ornare facilisis pretium. Ut nec justo vulputate, pharetra ligula vel, molestie nibh. Nullam volutpat ut orci ut fermentum. Mauris fermentum, erat vitae pellentesque vulputate, nisl lacus suscipit nibh, in pellentesque urna elit nec orci. Phasellus eget commodo nulla, a bibendum neque. In vehicula vitae dolor quis bibendum. Nunc commodo mi ex, a blandit leo malesuada nec. Maecenas eget dapibus odio. Ut eget sagittis augue. Praesent ipsum erat, porta vitae massa vel, tempus bibendum ligula. Suspendisse tempus libero at vehicula viverra. Maecenas eget libero felis.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1461894720),
('m130524_201442_init', 1461894739);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `services`
--

CREATE TABLE IF NOT EXISTS `services` (
`service_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `service_company`
--

CREATE TABLE IF NOT EXISTS `service_company` (
`id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'annkowalska81', '65pFplJGTm-dNSYegg0VuVzXibOFJW8S', '$2y$13$10/Kpg7C1yh3FLSQ.xWB3O2pFM7TXN13OFXvSJ7peOawOMdTMKj.y', NULL, 'annkowalska81@gmail.com', 10, 1461912714, 1461912714);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `service_company`
--
ALTER TABLE `service_company`
 ADD PRIMARY KEY (`id`), ADD KEY `company_id` (`company_id`,`service_id`), ADD KEY `company_id_2` (`company_id`), ADD KEY `service_id` (`service_id`), ADD KEY `company_id_3` (`company_id`), ADD KEY `service_id_2` (`service_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `companies`
--
ALTER TABLE `companies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `services`
--
ALTER TABLE `services`
MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `service_company`
--
ALTER TABLE `service_company`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
