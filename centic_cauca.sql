-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2026 a las 21:23:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `centic_cauca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'HP', 'hp', '2026-05-08 00:22:35', '2026-05-08 00:22:35'),
(2, 'Lenovo', 'lenovo', '2026-05-08 00:22:35', '2026-05-08 00:22:35'),
(3, 'ASUS', 'asus', '2026-05-08 00:22:36', '2026-05-08 00:22:36'),
(4, 'Acer', 'acer', '2026-05-08 00:22:36', '2026-05-08 00:22:36'),
(5, 'Dell', 'dell', '2026-05-08 00:22:36', '2026-05-08 00:22:36'),
(6, 'MSI', 'msi', '2026-05-08 00:22:36', '2026-05-08 00:22:36'),
(7, 'Epson', 'epson', '2026-05-08 00:22:36', '2026-05-08 00:22:36'),
(8, 'Brother', 'brother', '2026-05-08 00:22:36', '2026-05-08 00:22:36'),
(9, 'Cooler Master', 'cooler-master', '2026-05-08 00:22:36', '2026-05-08 00:22:36'),
(10, 'Targus', 'targus', '2026-05-08 00:22:36', '2026-05-08 00:22:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL DEFAULT '#00e5ff',
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `color`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'All in One', 'aio', '#00e5ff', '🖥️', '2026-05-08 00:22:35', '2026-05-08 00:22:35'),
(2, 'Portátil', 'portatil', '#a259ff', '💻', '2026-05-08 00:22:35', '2026-05-08 00:22:35'),
(3, 'Gaming', 'gaming', '#ff3d71', '🎮', '2026-05-08 00:22:35', '2026-05-08 00:22:35'),
(4, 'Impresora', 'impresora', '#00d68f', '🖨️', '2026-05-08 00:22:35', '2026-05-08 00:22:35'),
(5, 'Accesorio', 'accesorio', '#ffb800', '🔌', '2026-05-08 00:22:35', '2026-05-08 00:22:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_03_152224_create_categories_table', 1),
(5, '2026_05_04_162335_create_brands_table', 1),
(6, '2026_05_04_215744_create_products_table', 1),
(7, '2026_05_06_163622_create_promos_table', 1),
(8, '2026_05_06_193858_add_image_url_to_products_table', 1),
(9, '2026_05_06_195517_add_image_id_to_products_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `specs` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`specs`)),
  `price` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `image_id` varchar(255) DEFAULT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT 0,
  `has_iva_included` tinyint(1) NOT NULL DEFAULT 0,
  `has_promo` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `sku`, `category_id`, `brand_id`, `name`, `slug`, `specs`, `price`, `icon`, `image_url`, `image_id`, `is_new`, `has_iva_included`, `has_promo`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'AIO-HP-001', 1, 1, 'AIO DG0011LA', 'aio-dg0011la', '[\"Intel N100 (N-series)\",\"8GB DDR5 \\/ 21.4\\\" FHD\",\"SSD 256GB \\/ FreeDOS \\/ Negro\"]', 1199000, '🖥️', 'https://drive.google.com/file/d/1X9hO_PPi4bDVeRizklDHraaTmBryJnxB/view?usp=drive_link', NULL, 1, 0, 0, 1, '2026-05-08 00:22:36', '2026-05-08 00:22:36'),
(2, 'AIO-HP-002', 1, 1, 'AIO 24-CR0310LA', 'aio-24-cr0310la', '[\"Intel Core N100\",\"8GB \\/ 23.8\\\" FHD\",\"SSD 512GB \\/ FreeDos \\/ Negro\"]', 1279000, '🖥️', 'https://drive.google.com/file/d/1X9hO_PPi4bDVeRizklDHraaTmBryJnxB/view?usp=drive_link', NULL, 1, 0, 0, 1, '2026-05-08 00:22:36', '2026-05-08 00:22:36'),
(3, 'AIO-LEN-001', 1, 2, 'AIO A100 (F0J6002NLD)', 'aio-a100-f0j6002nld', '[\"Intel Core i3 N305 1.8GHz\",\"8GB \\/ 23.8\\\" FHD\",\"SSD 512GB \\/ FreeDos \\/ Gris Perla\"]', 1599000, '🖥️', 'https://drive.google.com/file/d/1X9hO_PPi4bDVeRizklDHraaTmBryJnxB/view?usp=drive_link', NULL, 0, 0, 0, 1, '2026-05-08 00:22:36', '2026-05-08 00:22:36'),
(4, 'AIO-HP-003', 1, 1, 'AIO 24-CB1028LA', 'aio-24-cb1028la', '[\"Intel Core i5 1235U 1.3GHz\",\"8GB \\/ 23.8\\\" FHD\",\"SSD 512GB \\/ Linux \\/ Negro\"]', 1949000, '🖥️', 'https://drive.google.com/file/d/1X9hO_PPi4bDVeRizklDHraaTmBryJnxB/view?usp=drive_link', NULL, 0, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(5, 'AIO-LEN-002', 1, 2, 'AIO IdeaCentre 24IRH9', 'aio-ideacentre-24irh9', '[\"Intel Core i5-13420H\",\"8GB \\/ 23.8\\\" FHD \\/ RJ-45\",\"SSD 512GB \\/ NO OS \\/ Luna Grey\"]', 1999000, '🖥️', 'https://images.unsplash.com/photo-1593642632823-8f78536788c6?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(6, 'AIO-ASU-001', 1, 3, 'V440VAK-WPC1060', 'aio-v440vak-wpc1060', '[\"Intel Core i5\",\"8GB \\/ 23.8\\\" FHD\",\"SSD 512GB \\/ NO OS \\/ Blanco\"]', 2099000, '🖥️', 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(7, 'AIO-HP-004', 1, 1, 'AIO 240 (B88BKAT#ABM)', 'aio-240-b88bkat-abm', '[\"Intel Core i5-1334U\",\"16GB \\/ 23.8\\\" FHD\",\"SSD 512GB \\/ Linux \\/ Negro\"]', 2099000, '🖥️', 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(8, 'AIO-LEN-003', 1, 2, 'AIO IdeaCentre 5 3 24ALC6', 'aio-ideacentre-5-3-24alc6', '[\"AMD Ryzen 5 7430U\",\"8GB \\/ 23.8\\\" FHD\",\"SSD 256GB \\/ Linux \\/ Blanco\"]', 1599000, '🖥️', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(9, 'AIO-HP-005', 1, 1, 'ProOne 245 G10', 'aio-proone-245-g10', '[\"AMD Ryzen 5 7520U 2.8GHz\",\"16GB \\/ 23.8\\\" FHD\",\"SSD 512GB \\/ FreeDos \\/ Silver Mineral\"]', 1999000, '🖥️', 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(10, 'AIO-LEN-004', 1, 2, 'ThinkCentre Neo 50a 24 Gen 5', 'aio-thinkcentre-neo-50a-24-gen-5', '[\"Intel Core i7-13620H\",\"8GB DDR5 \\/ 23.8\\\" \\/ RJ-45\",\"SSD 512GB \\/ Negro\"]', 2449000, '🖥️', 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(11, 'AIO-LEN-005', 1, 2, 'AIO IdeaCentre 3 24ALC6', 'aio-ideacentre-3-24alc6', '[\"AMD Ryzen 7 7730U 2.0GHz\",\"8GB \\/ 23.8\\\" FHD\",\"SSD 512GB \\/ FreeDos \\/ Negro\"]', 2119000, '🖥️', 'https://images.unsplash.com/photo-1517336714731-489689fd1ca5?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(12, 'LAP-HP-001', 2, 1, '255R G10', 'laptop-255r-g10', '[\"AMD Athlon 7120U\",\"8GB \\/ 15.6\\\" FHD\",\"SSD 512GB \\/ FreeDos \\/ Plateado \\/ Teclado Num\\u00e9rico\"]', 1249000, '💻', 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(13, 'LAP-HP-002', 2, 1, '15-FD0130', 'laptop-15-fd0130', '[\"Intel Core i3-1215U 3.3GHz\",\"8GB \\/ 15.6\\\" FHD\",\"SSD 512GB \\/ FreeDOS \\/ Silver\"]', 1299000, '💻', 'https://images.unsplash.com/photo-1517336714731-489689fd1ca5?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(14, 'LAP-LEN-001', 2, 2, 'IdeaPad Slim 3 15IRU8', 'laptop-ideapad-slim-3-15iru8', '[\"Intel Core i3 1315U\",\"8GB \\/ 15.6\\\" FHD\",\"SSD 512GB \\/ FreeDOS \\/ Gris\"]', 1329000, '💻', 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(15, 'LAP-ASU-001', 2, 3, 'Go 15 E1504FA-NJ1961', 'laptop-go-15-e1504fa-nj1961', '[\"AMD Ryzen 3 7320U\",\"8GB \\/ 15.6\\\" FHD\",\"SSD 512GB \\/ Linux \\/ Cool Silver\"]', 1289000, '💻', 'https://images.unsplash.com/photo-1544731612-de7f96afe55f?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(16, 'LAP-ASU-002', 2, 3, 'Go 15 E1504FA-BQ2377', 'laptop-go-15-e1504fa-bq2377', '[\"AMD Ryzen 3 7320U\",\"8GB \\/ 15.6\\\" FHD\",\"SSD 512GB \\/ Keep OS \\/ Cool Silver\"]', 1299000, '💻', 'https://images.unsplash.com/photo-1589561084283-930aa7b1ce50?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(17, 'LAP-ASU-003', 2, 3, 'Go 15 E1504FA-BQ2676', 'laptop-go-15-e1504fa-bq2676', '[\"AMD Ryzen 3 7320U\",\"8GB \\/ 15.6\\\" FHD\",\"SSD 512GB \\/ Keep OS \\/ Cool Silver\"]', 1299000, '💻', 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(18, 'LAP-LEN-002', 2, 2, 'V14 G4 AMN', 'laptop-v14-g4-amn', '[\"AMD Ryzen 3 7320U 2.4GHz \\/ RJ-45\",\"16GB \\/ 14\\\" HD\",\"SSD 256GB \\/ NO OS \\/ Gris \\u00c1rtico\"]', 1439000, '💻', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:37', '2026-05-08 00:22:37'),
(19, 'LAP-HP-003', 2, 1, '255 G10', 'laptop-255-g10', '[\"AMD Ryzen 3 7320U\",\"16GB \\/ 15.6\\\" FHD \\/ Teclado Num\\u00e9rico\",\"SSD 512GB \\/ Linux \\/ Gray Mineral\"]', 1499000, '💻', 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(20, 'LAP-LEN-003', 2, 2, 'IdeaPad 15AMN8', 'laptop-ideapad-15amn8', '[\"AMD Ryzen 3 7320U\",\"16GB \\/ 15.3\\\" FHD\",\"SSD 512GB \\/ Artic Grey\"]', 1569000, '💻', 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(21, 'LAP-HP-004', 2, 1, '15-FD0158LA', 'laptop-15-fd0158la', '[\"Intel Core i5 1235U\",\"8GB \\/ 15.6\\\" HD \\/ Doble Ranura RAM\",\"SSD 512GB \\/ Linux \\/ Plata\"]', 1499000, '💻', 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(22, 'LAP-HP-005', 2, 1, '240 G10', 'laptop-240-g10', '[\"Intel Core i5-1334U\",\"8GB \\/ 14\\\" HD\",\"SSD 512GB \\/ Linux \\/ Gray\"]', 1519000, '💻', 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(23, 'LAP-HP-006', 2, 1, '14-DQ5039LA', 'laptop-14-dq5039la', '[\"Intel Core i5 1235U 1.3GHz\",\"8GB \\/ 14\\\" HD\",\"SSD 512GB \\/ FreeDOS \\/ Plateado\"]', 1699000, '💻', 'https://images.unsplash.com/photo-1587831990711-23ca6441447b?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(24, 'LAP-HP-007', 2, 1, '245 G10', 'laptop-245-g10', '[\"AMD Ryzen 5 7530U 2.0GHz\",\"8GB \\/ 14\\\" HD\",\"SSD 512GB \\/ Linux \\/ Gray Mineral\"]', 1519000, '💻', 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(25, 'LAP-LEN-004', 2, 2, 'V14 G4', 'laptop-v14-g4', '[\"AMD Ryzen 5 7520U 2.8GHz \\/ RJ-45\",\"16GB \\/ 14\\\" FHD \\/ AMD Radeon\",\"SSD 512GB \\/ Linux \\/ Gris \\u00c1rtico\"]', 1669000, '💻', 'https://images.unsplash.com/photo-1593642632823-8f78536788c6?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(26, 'LAP-LEN-005', 2, 2, 'V15 G4 AMN', 'laptop-v15-g4-amn', '[\"AMD Ryzen 5 7520U 2.8GHz\",\"16GB \\/ 15.6\\\" FHD\",\"SSD 512GB \\/ Linux \\/ Gris \\u00c1rtico\"]', 1689000, '💻', 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(27, 'LAP-LEN-006', 2, 2, 'IdeaPad Slim 3 15AMN8', 'laptop-ideapad-slim-3-15amn8', '[\"AMD Ryzen 5 7520U\",\"16GB \\/ 15.6\\\" FHD\",\"SSD 512GB \\/ Abyss Blue\"]', 1689000, '💻', 'https://images.unsplash.com/photo-1517336714731-489689fd1ca5?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(28, 'LAP-HP-008', 2, 1, '15-FC0256LA', 'laptop-15-fc0256la', '[\"AMD Ryzen 5 7520U \\/ AMD Radeon\",\"16GB \\/ 15.6\\\" FHD\",\"SSD 512GB \\/ FreeDos \\/ Azul\"]', 1769000, '💻', 'https://images.unsplash.com/photo-1544731612-de7f96afe55f?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(29, 'LAP-ASU-004', 2, 3, 'VivoBook E1504FA-BQ2334', 'laptop-vivobook-e1504fa-bq2334', '[\"AMD Ryzen 5 7520U 2.8GHz\",\"16GB \\/ 15.6\\\" FHD + Morral + Mouse\",\"SSD 512GB \\/ OS Keep \\/ Cool Silver\"]', 1829000, '💻', 'https://images.unsplash.com/photo-1589561084283-930aa7b1ce50?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(30, 'LAP-ASU-005', 2, 3, 'VivoBook X1504VA-E84556', 'laptop-vivobook-x1504va-e84556', '[\"Intel Core i5-120U 1.3GHz\",\"16GB \\/ 15.6\\\" FHD TouchScreen\",\"SSD 512GB \\/ OS Keep \\/ Quiet Blue\"]', 2199000, '💻', 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(31, 'LAP-ACE-001', 2, 4, 'TMP216-51-56ZP', 'laptop-tmp216-51-56zp', '[\"Intel Core i5 1335U 3.3GHz\",\"16GB DDR4 \\/ 16\\\" WUXGA \\/ Windows 11 Pro\",\"SSD 1TB \\/ Iron Grey + Kaspersky\"]', 2799000, '💻', 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:38', '2026-05-08 00:22:38'),
(32, 'LAP-LEN-007', 2, 2, 'V14 G4 (i7)', 'laptop-v14-g4-i7', '[\"Intel Core i7-1355U\",\"8GB \\/ 14\\\" HD\",\"SSD 512GB \\/ NO OS \\/ Iron Gray\"]', 2149000, '💻', 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(33, 'LAP-LEN-008', 2, 2, 'IdeaPad Slim 3 15IRH10', 'laptop-ideapad-slim-3-15irh10', '[\"Intel Core i7 13620H 2.4GHz\",\"8GB \\/ 15.3\\\" WUXGA\",\"SSD 1TB \\/ NO OS \\/ Luna Grey\"]', 2199000, '💻', 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(34, 'LAP-DEL-001', 2, 5, 'Inspirón 9KP97', 'laptop-inspiron-9kp97', '[\"Intel Core i7 1335U\",\"16GB \\/ 15.6\\\" FHD \\/ Windows 11 Pro\",\"SSD 512GB \\/ Plateado + Kaspersky\"]', 2749000, '💻', 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(35, 'LAP-ASU-006', 2, 3, 'VivoBook M1502-BQ925', 'laptop-vivobook-m1502-bq925', '[\"AMD Ryzen 7 5825U\",\"16GB \\/ 15.6\\\" FHD\",\"SSD 512GB \\/ Keep OS \\/ Cool Silver\"]', 1929000, '💻', 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(36, 'GAM-LEN-001', 3, 2, 'LOQ 15IAX9E', 'gaming-loq-15iax9e', '[\"Intel Core i5 12450HX\",\"8GB \\/ 15.9\\\" FHD \\/ RTX 3050 6GB\",\"SSD 512GB \\/ FreeDos \\/ Gris\"]', 2610000, '🎮', 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(37, 'GAM-HP-001', 3, 1, 'Gaming Victus 15-FB3019LA', 'gaming-victus-15-fb3019la', '[\"AMD Ryzen 7 7445HS 4.7GHz \\/ RJ-45\",\"8GB \\/ 15.6\\\" FHD 144Hz \\/ RTX 3050 6GB\",\"SSD 512GB \\/ Linux \\/ Gris\"]', 2610000, '🎮', 'https://images.unsplash.com/photo-1595327656903-2f54e37ce09b?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(38, 'GAM-HP-002', 3, 1, 'Gaming Victus 15-FA0021LA', 'gaming-victus-15-fa0021la', '[\"Intel Core i5 12450H 2.0GHz\",\"8GB \\/ 15.6\\\" FHD \\/ RTX 3050 4GB\",\"SSD 512GB \\/ Windows 11 Home \\/ Azul + Kaspersky\"]', 2699000, '🎮', 'https://images.unsplash.com/photo-1587202372634-32705e3e568e?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(39, 'GAM-MSI-001', 3, 6, 'Thin A15 B13UC-3256XCO', 'gaming-thin-a15-b13uc-3256xco', '[\"Intel Core i5 13420H 2.1GHz \\/ RJ-45\",\"8GB \\/ 15.6\\\" FHD \\/ RTX 3050 4GB\",\"SSD 512GB \\/ FreeDos \\/ Cosmo Gray + Morral + Kaspersky\"]', 2699000, '🎮', 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(40, 'GAM-ACE-001', 3, 4, 'Gamer Nitro Lite NL16-71G-5616', 'gaming-nitro-lite-nl16-71g-5616', '[\"Intel Core i5-210H \\/ RJ-45\",\"16GB DDR5 \\/ 16\\\" WUXGA \\/ RTX 3050 6GB\",\"SSD 512GB \\/ Shael Black + Kaspersky\"]', 2869000, '🎮', 'https://images.unsplash.com/photo-1547394765-185e1e68f34e?w=400&h=300&fit=crop', NULL, 1, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(41, 'GAM-ACE-002', 3, 4, 'Gaming Nitro Lite NL16-71G-57G5', 'gaming-nitro-lite-nl16-71g-57g5', '[\"Intel Core i5-13420H 2.1GHz \\/ RJ-45\",\"16GB DDR5 \\/ 15.6\\\" FHD \\/ RTX 3050 6GB\",\"SSD 512GB \\/ Tigerlily Red + Kaspersky\"]', 2899000, '🎮', 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(42, 'GAM-MSI-002', 3, 6, 'Thin A15 B7UC-624XCO', 'gaming-thin-a15-b7uc-624xco', '[\"AMD Ryzen 7 7735HS 3.2GHz \\/ RJ-45\",\"8GB \\/ 15.6\\\" FHD \\/ RTX 3050 4GB\",\"SSD 512GB \\/ FreeDos \\/ Cosmo Gray + Morral + Kaspersky\"]', 2899000, '🎮', 'https://images.unsplash.com/photo-1595327656903-2f54e37ce09b?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(43, 'GAM-ACE-003', 3, 4, 'Gaming Nitro V 15 ANV15-42-R976', 'gaming-nitro-v-15-anv15-42-r976', '[\"AMD Ryzen 7 7445HS \\/ RJ-45\",\"16GB DDR5 \\/ 15.6\\\" FHD \\/ RTX 3050 6GB\",\"SSD 512GB NVMe \\/ Obsidian Black + Kaspersky\"]', 3049000, '🎮', 'https://images.unsplash.com/photo-1587202372634-32705e3e568e?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(44, 'GAM-MSI-003', 3, 6, 'Thin A15 B7VE-476XCO', 'gaming-thin-a15-b7ve-476xco', '[\"AMD Ryzen 7 7735HS 3.2GHz \\/ RJ-45\",\"16GB \\/ 15.6\\\" FHD \\/ RTX 4050 6GB GDDR6\",\"SSD 512GB \\/ FreeDos \\/ Cosmo Gray + Morral\"]', 4699000, '🎮', 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?w=400&h=300&fit=crop', NULL, 1, 1, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(45, 'IMP-HP-001', 4, 1, 'Smart Tank 581', 'impresora-smart-tank-581', '[\"Impresi\\u00f3n, Copia, Escaneado\",\"Inkjet \\/ Hasta 1200\\u00d71200 ppp \\/ 12ppm\",\"USB 2.0 + Wi-Fi + Bluetooth\"]', 689000, '🖨️', 'https://images.unsplash.com/photo-1612815154858-60aa4c43e64e?w=400&h=300&fit=crop', NULL, 1, 1, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(46, 'IMP-HP-002', 4, 1, 'Smart Tank 585', 'impresora-smart-tank-585', '[\"Impresi\\u00f3n, Copia, Escaneado\",\"Inkjet \\/ Hasta 1200\\u00d71200 ppp \\/ 12ppm\",\"USB 2.0 + Wi-Fi + Bluetooth\"]', 689000, '🖨️', 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=400&h=300&fit=crop', NULL, 1, 1, 0, 1, '2026-05-08 00:22:39', '2026-05-08 00:22:39'),
(47, 'IMP-EPS-001', 4, 7, 'Multifuncional L3210', 'impresora-multifuncional-l3210', '[\"Imprimir, Escanear, Copiar\",\"5760\\u00d71440 DPI Color \\/ 600\\u00d71200 DPI Esc\\u00e1ner\",\"Conexi\\u00f3n USB\"]', 699000, '🖨️', 'https://images.unsplash.com/photo-1589652717521-10c0d092dea9?w=400&h=300&fit=crop', NULL, 0, 1, 0, 1, '2026-05-08 00:22:40', '2026-05-08 00:22:40'),
(48, 'IMP-BRO-001', 4, 8, 'DCP-T430W', 'impresora-dcp-t430w', '[\"Impresi\\u00f3n, Copiado, Escaneado \\/ Wi-Fi\",\"Hasta 27ppm negro \\/ 23ppm color (modo Eco)\",\"Hasta 7.500 p\\u00e1g. negro \\/ 5.000 p\\u00e1g. color\"]', 729000, '🖨️', 'https://images.unsplash.com/photo-1589652717521-10c0d092dea9?w=400&h=300&fit=crop', NULL, 1, 1, 1, 1, '2026-05-08 00:22:40', '2026-05-08 00:22:40'),
(49, 'IMP-HP-003', 4, 1, 'LaserJet MFP M141W', 'impresora-laserjet-mfp-m141w', '[\"Impresi\\u00f3n, Copia, Escaneado L\\u00e1ser B&N\",\"600\\u00d7600 ppp \\/ 27ppm\",\"Papel com\\u00fan, sobre, postal, etiqueta\"]', 755000, '🖨️', 'https://images.unsplash.com/photo-1612815154858-60aa4c43e64e?w=400&h=300&fit=crop', NULL, 0, 1, 0, 1, '2026-05-08 00:22:40', '2026-05-08 00:22:40'),
(50, 'IMP-EPS-002', 4, 7, 'EcoTank L3251', 'impresora-ecotank-l3251', '[\"Imprimir, Copiar, Escanear \\/ Wi-Fi\",\"Alta velocidad de impresi\\u00f3n\",\"Hasta 4.500 p\\u00e1gs. negro \\/ 7.500 p\\u00e1gs. color\"]', 799000, '🖨️', 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=400&h=300&fit=crop', NULL, 1, 1, 0, 1, '2026-05-08 00:22:40', '2026-05-08 00:22:40'),
(51, 'IMP-BRO-002', 4, 8, 'DCP-T730Dw', 'impresora-dcp-t730dw', '[\"Impresi\\u00f3n, Copiado, Escaneado \\/ Wi-Fi\",\"Hasta 27ppm negro \\/ 23ppm color\",\"6000\\u00d71200 dpi \\/ Tinta ultra alto rendimiento\"]', 829000, '🖨️', 'https://images.unsplash.com/photo-1589652717521-10c0d092dea9?w=400&h=300&fit=crop', NULL, 0, 1, 0, 1, '2026-05-08 00:22:40', '2026-05-08 00:22:40'),
(52, 'IMP-EPS-003', 4, 7, 'L5590 EcoTank', 'impresora-l5590-ecotank', '[\"Imprimir, Escanear, Copiar\",\"4800\\u00d71200 DPI \\/ USB + Wi-Fi + Ethernet\",\"50% m\\u00e1s r\\u00e1pida \\/ 600\\u00d71200 DPI esc\\u00e1ner\"]', 1199000, '🖨️', 'https://images.unsplash.com/photo-1612815154858-60aa4c43e64e?w=400&h=300&fit=crop', NULL, 1, 1, 1, 1, '2026-05-08 00:22:40', '2026-05-08 00:22:40'),
(53, 'ACC-CM-001', 5, 9, 'Cooler Splitter 1 a 3 A-RGB', 'accesorio-cooler-splitter-1-a-3-argb', '[\"Divide se\\u00f1al A-RGB 1 entrada \\/ 3 salidas\"]', 21000, '🔌', 'https://images.unsplash.com/photo-1587202372634-32705e3e568e?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:40', '2026-05-08 00:22:40'),
(54, 'ACC-CM-002', 5, 9, 'Cooler Splitter 1 a 5 A-RGB 3 Pines', 'accesorio-cooler-splitter-1-a-5-argb-3-pines', '[\"Divide se\\u00f1al A-RGB 1 entrada \\/ 5 salidas\"]', 22000, '🔌', 'https://images.unsplash.com/photo-1595327656903-2f54e37ce09b?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:40', '2026-05-08 00:22:40'),
(55, 'ACC-CM-003', 5, 9, 'Grease IC Essential E2 1.5ml', 'accesorio-grease-ic-essential-e2-1-5ml', '[\"Pasta t\\u00e9rmica de alto rendimiento\"]', 30000, '🔌', 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:40', '2026-05-08 00:22:40'),
(56, 'ACC-CM-004', 5, 9, 'Fan MF120 S2 (Disipador)', 'accesorio-fan-mf120-s2-disipador', '[\"Fan RGB 120mm\"]', 35000, '🔌', 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:40', '2026-05-08 00:22:40'),
(57, 'ACC-CM-005', 5, 9, 'Controlador Pequeño Fans RGB', 'accesorio-controlador-pequeno-fans-rgb', '[\"Control de iluminaci\\u00f3n RGB\"]', 65000, '🔌', 'https://images.unsplash.com/photo-1547394765-185e1e68f34e?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:41', '2026-05-08 00:22:41'),
(58, 'ACC-CM-006', 5, 9, 'Disipador I71C', 'accesorio-disipador-i71c', '[\"Disipador con iluminaci\\u00f3n RGB\"]', 75000, '🔌', 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:41', '2026-05-08 00:22:41'),
(59, 'ACC-CM-007', 5, 9, 'Mouse MM720', 'accesorio-mouse-mm720', '[\"Mouse gaming ultraligero \\/ Negro o Blanco\"]', 65000, '🔌', 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:41', '2026-05-08 00:22:41'),
(60, 'ACC-CM-008', 5, 9, 'Mouse MM711 White Matte', 'accesorio-mouse-mm711-white-matte', '[\"Mouse gaming ultraligero \\/ Blanco mate\"]', 89000, '🔌', 'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:41', '2026-05-08 00:22:41'),
(61, 'ACC-LEN-001', 5, 2, 'Morral Casual B210', 'accesorio-morral-casual-b210', '[\"Morral para port\\u00e1til \\/ IVA incluido\"]', 79000, '🔌', 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=300&fit=crop', NULL, 1, 1, 0, 1, '2026-05-08 00:22:41', '2026-05-08 00:22:41'),
(62, 'ACC-LEN-002', 5, 2, 'Mouse Inalámbrico ThinkPad Essential', 'accesorio-mouse-inalambrico-thinkpad-essential', '[\"Mouse inal\\u00e1mbrico \\/ IVA incluido\"]', 79000, '🔌', 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400&h=300&fit=crop', NULL, 1, 1, 0, 1, '2026-05-08 00:22:41', '2026-05-08 00:22:41'),
(63, 'ACC-TAR-001', 5, 10, 'Morral Targus Intellect', 'accesorio-morral-targus-intellect', '[\"Morral para port\\u00e1til \\/ IVA incluido\"]', 65000, '🔌', 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=300&fit=crop', NULL, 1, 1, 0, 1, '2026-05-08 00:22:41', '2026-05-08 00:22:41'),
(64, 'ACC-HP-001', 5, 1, 'Cartucho Nro 664 Negra/Tricolor', 'accesorio-cartucho-nro-664-negra-tricolor', '[\"Tinta HP compatible\"]', 28000, '🔌', 'https://images.unsplash.com/photo-1612815154858-60aa4c43e64e?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:41', '2026-05-08 00:22:41'),
(65, 'ACC-HP-002', 5, 1, 'Cartucho Nro 675 Tricolor', 'accesorio-cartucho-nro-675-tricolor', '[\"Tinta HP compatible\"]', 45000, '🔌', 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:41', '2026-05-08 00:22:41'),
(66, 'ACC-HP-003', 5, 1, 'Cartucho Nro 670 Tintas Individuales', 'accesorio-cartucho-nro-670-tintas-individuales', '[\"Amarillo, Azul, Magenta\"]', 28000, '🔌', 'https://images.unsplash.com/photo-1589652717521-10c0d092dea9?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:42', '2026-05-08 00:22:42'),
(67, 'ACC-HP-004', 5, 1, 'Botella Tinta HP M0H55AL Magenta', 'accesorio-botella-tinta-hp-m0h55al-magenta', '[\"70ml \\/ 8.000 p\\u00e1ginas de rendimiento\"]', 39000, '🔌', 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=400&h=300&fit=crop', NULL, 0, 0, 0, 1, '2026-05-08 00:22:42', '2026-05-08 00:22:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promos`
--

CREATE TABLE `promos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'centic.cauca@gmail.com', '2026-05-08 00:22:42', '$2y$12$TrHlY3zeFtG4TbJXETM.3e6f8W4dMTPgCvbzVZyj/H8cXhSVvZlme', NULL, '2026-05-08 00:22:42', '2026-05-08 00:22:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indices de la tabla `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
