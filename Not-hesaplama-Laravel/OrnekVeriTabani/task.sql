-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 06 Tem 2022, 16:27:57
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `task2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lesson_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `taking_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_name`, `teacher_id`, `taking_student`, `created_at`, `updated_at`) VALUES
(2, 'das', NULL, ',,,,2', NULL, '2022-07-06 13:11:31'),
(3, 'des', NULL, ',,,,2', NULL, '2022-07-06 13:11:32'),
(4, 'aa', NULL, ',2', NULL, '2022-07-06 13:16:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_lessons_table', 1),
(2, '2014_10_12_000000_create_points_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `vize` int(11) DEFAULT NULL,
  `final` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `points`
--

INSERT INTO `points` (`id`, `lesson_id`, `student_id`, `vize`, `final`, `created_at`, `updated_at`) VALUES
(11, 4, 2, NULL, NULL, NULL, NULL),
(9, 2, 2, 32, 21, NULL, '2022-07-06 13:17:35'),
(10, 3, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'deneme', '1', 'deneme@gmail.com', NULL, '$2y$10$QoezDx.4EVA7QVnlbORSF.u0hp0epz4hr4ccfsKHH3Yrg5gHprqoq', NULL, '2022-07-05 19:22:08', '2022-07-05 19:22:08'),
(2, 'ogrenci', '0', 'ogrenci@gmail.com', NULL, '$2y$10$NgDB66ELyU3jCZvkSVGxme64ZWNJYZg33pI9qdSiXbJAfd2cks7n2', NULL, '2022-07-05 19:22:50', '2022-07-05 19:22:50'),
(3, 'deneme2', '1', 'deneme2@gmail.com', NULL, '$2y$10$XAeZKy/Oa3RvWnJ8SDkrOuNLJVJh2xdSCv71j7QUx.gRDaSOqcWyS', NULL, '2022-07-06 13:18:37', '2022-07-06 13:18:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
