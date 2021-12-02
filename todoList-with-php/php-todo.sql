-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Nis 2021, 19:56:10
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE php_todo;
-- Veritabanı: `php-todo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(11) NOT NULL,
  `todo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `todo_title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `status`, `todo_title`) VALUES
(22, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit pariatur natus error est sapiente delectus consequatur esse maxime nam quasi, reiciendis quisquam, repellendus earum iusto in impedit ratione laborum quibusdam?', 1, 'lorem'),
(23, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit pariatur natus error est sapiente delectus consequatur esse maxime nam quasi, reiciendis quisquam, repellendus earum iusto in impedit ratione laborum quibusdam?', 1, 'lorem'),
(24, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Odit pariatur natus error est sapiente delectus consequatur esse maxime nam quasi, reiciendis quisquam, repellendus earum iusto in impedit ratione laborum quibusdam?', 2, 'lorem'),
(25, 'dadsada', 2, 'asdas'),
(28, 'AAA', 2, 'AAA'),
(30, 'AAAAA', 1, 'AAAA');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
