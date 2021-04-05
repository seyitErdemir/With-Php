-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Nis 2021, 18:28:40
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE web;
--
-- Veritabanı: `web`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurul`
--

CREATE TABLE `kurul` (
  `id` int(11) NOT NULL,
  `resimAdresi` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `linked` varchar(255) DEFAULT NULL,
  `isim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kurul`
--

INSERT INTO `kurul` (`id`, `resimAdresi`, `mail`, `linked`, `isim`) VALUES
(56, 'resimler/python.png', 'asdasd', 'asdasd', 'asdasd'),
(61, 'resimler/python.png', '...', '..', 'python'),
(62, 'resimler/java.png', 'aa', 'aa', 'java'),
(63, 'resimler/js.png', '..', '..', 'javascript'),
(64, 'resimler/js.png', '..', '..', 'javascript');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kurul`
--
ALTER TABLE `kurul`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kurul`
--
ALTER TABLE `kurul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
