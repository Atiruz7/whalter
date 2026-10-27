-- ========================================================
-- EXPORTACIÓN DE BASE DE DATOS - PROYECTO WEB WALTHER
-- Compatible con MySQL 5.7+ / MariaDB 10.3+ (InfinityFree / cPanel)
-- Generado para despliegue y respaldo
-- ========================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- --------------------------------------------------------
-- Estructura de tabla para `users`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcado de datos para la tabla `users`
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES (1, 'Administrador', 'admin@walther.test', '$2y$12$JEnPkxpFB4uzOteJd.OupuJCv7BWZqcJVjUkKDJNpDpm9EGhF1xbi', '2026-10-27 09:34:50', '2026-10-27 09:34:50');

-- --------------------------------------------------------
-- Estructura de tabla para `site_settings`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE `site_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Walther',
  `brand_logo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_buttons` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `hero2_background_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero2_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero2_video_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcado de datos para la tabla `site_settings`
INSERT INTO `site_settings` (`id`, `brand_name`, `brand_logo_path`, `tagline`, `hero_image_path`, `hero_title`, `hero_description`, `hero_buttons`, `hero2_background_path`, `hero2_text`, `hero2_video_path`, `whatsapp_number`, `whatsapp_message`, `facebook_url`, `tiktok_url`, `credit_url`, `created_at`, `updated_at`) VALUES (1, 'Walther', NULL, 'Bienes Raíces • Motivación • Crecimiento Personal • Emprendimiento • Deporte', NULL, 'Una marca para personas que quieren crecer, superar sus límites y construir un futuro con propósito.', 'Inspira. Aprende. Emprende. Invierte. Crece.', '[{\"text\":\"Agendar una reuni\\u00f3n\",\"url\":\"#contacto\"},{\"text\":\"Escr\\u00edbenos\",\"url\":\"#contacto\"}]', 'images/hero2-fondoBanner.jpg', 'Conversemos y tomemos un café', 'videos/hero2.mp4', '+51 929 664 204', 'Deseo agendar una reunión mientras nos tomamos un café', 'https://web.facebook.com/walter.quesuallpayucra', 'https://www.tiktok.com/@walther_04', NULL, '2026-10-27 10:02:53', '2026-10-27 10:02:53');

-- --------------------------------------------------------
-- Estructura de tabla para `products`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcado de datos para la tabla `products`
INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_path`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Asesoría inmobiliaria', 'Acompañamiento para comprar, vender o invertir en bienes raíces con información clara y estrategia.', NULL, NULL, 1, 1, '2026-10-27 10:02:53', '2026-10-27 10:02:53');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_path`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Mentoría de crecimiento personal', 'Sesiones enfocadas en hábitos, mentalidad y organización para vivir con propósito.', NULL, NULL, 2, 1, '2026-10-27 10:02:53', '2026-10-27 10:02:53');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_path`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Charlas motivacionales', 'Conferencias y mensajes para equipos, colegios y eventos que buscan inspirar a la acción.', NULL, NULL, 3, 1, '2026-10-27 10:02:53', '2026-10-27 10:02:53');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_path`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'Acompañamiento emprendedor', 'Identificación de oportunidades y desarrollo de una mentalidad emprendedora desde cero.', NULL, NULL, 4, 1, '2026-10-27 10:02:53', '2026-10-27 10:02:53');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_path`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'Estilo de vida activo', 'Contenido y acompañamiento sobre disciplina deportiva y hábitos saludables.', NULL, NULL, 5, 1, '2026-10-27 10:02:53', '2026-10-27 10:02:53');

-- --------------------------------------------------------
-- Tablas de soporte de Laravel (sesiones, caché, jobs)
-- --------------------------------------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------
-- Estructura de tabla para `migrations`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcado de datos para la tabla `migrations`
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_10_26_125116_create_site_settings_table', 2),
(5, '2026_10_26_141833_create_products_table', 2),
(6, '2026_10_26_213005_add_credit_url_to_site_settings_table', 2);

-- --------------------------------------------------------
-- Tablas para Colas y Trabajos de Laravel
-- --------------------------------------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;

