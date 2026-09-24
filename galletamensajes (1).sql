-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2026 a las 22:20:52
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
-- Base de datos: `galletamensajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galletas_abiertas`
--

CREATE TABLE `galletas_abiertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mensaje_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mensaje` text NOT NULL,
  `abierta_en` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `galletas_abiertas`
--

INSERT INTO `galletas_abiertas` (`id`, `user_id`, `mensaje_id`, `mensaje`, `abierta_en`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'El cielo será tu límite, pues grandes acontecimientos te sucederán.', '2026-07-03 19:21:53', '2026-07-03 19:21:53', '2026-07-03 19:21:53'),
(2, 5, 13, 'Hoy serás reconocido por tus dones especiales y lograrás ser feliz por muchas horas.', '2026-07-03 19:22:30', '2026-07-03 19:22:30', '2026-07-03 19:22:30'),
(3, 5, 14, 'Tu corazón estallará de alegría con la llegada de buenas noticias.', '2026-07-03 19:22:32', '2026-07-03 19:22:32', '2026-07-03 19:22:32'),
(4, 5, 5, 'Vivirás tu vejez con comodidades y riquezas materiales.', '2026-07-03 19:22:34', '2026-07-03 19:22:34', '2026-07-03 19:22:34'),
(5, 1, 5, 'Vivirás tu vejez con comodidades y riquezas materiales.', '2026-07-03 20:31:00', '2026-07-03 20:31:00', '2026-07-03 20:31:00'),
(6, 6, 12, 'Tienes por delante un maravilloso día para triunfar; disfrútalo y compártelo.', '2026-07-03 20:40:26', '2026-07-03 20:40:26', '2026-07-03 20:40:26'),
(7, 6, 14, 'Tu corazón estallará de alegría con la llegada de buenas noticias.', '2026-07-03 20:41:26', '2026-07-03 20:41:26', '2026-07-03 20:41:26'),
(8, 1, 8, 'Te aguarda una larga y feliz vida.', '2026-07-04 15:46:07', '2026-07-04 15:46:07', '2026-07-04 15:46:07'),
(9, 1, 6, 'Confía en tu suerte, que es mucha y te rodeará de prosperidad.', '2026-07-04 15:46:14', '2026-07-04 15:46:14', '2026-07-04 15:46:14'),
(10, 5, 12, 'Tienes por delante un maravilloso día para triunfar; disfrútalo y compártelo.', '2026-07-04 15:47:24', '2026-07-04 15:47:24', '2026-07-04 15:47:24'),
(11, 1, 10, 'Muy pronto serás incluido en muchas reuniones, fiestas y tertulias.', '2026-07-04 16:12:34', '2026-07-04 16:12:34', '2026-07-04 16:12:34'),
(12, 1, 14, 'Tu corazón estallará de alegría con la llegada de buenas noticias.', '2026-08-04 19:49:11', '2026-08-04 19:49:11', '2026-08-04 19:49:11'),
(13, 1, 10, 'Muy pronto serás incluido en muchas reuniones, fiestas y tertulias.', '2026-08-04 19:49:40', '2026-08-04 19:49:40', '2026-08-04 19:49:40'),
(14, 1, 15, 'Mañana puede ser muy tarde para disfrutar lo que tienes hoy.', '2026-08-04 20:19:44', '2026-08-04 20:19:44', '2026-08-04 20:19:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
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
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mensaje` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `mensaje`, `created_at`, `updated_at`) VALUES
(1, 'Tendrás un día de alegrías y buenos momentos, disfrútalos como nunca.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(2, 'Concéntrate en lo que quieres lograr y ganarás. No lo olvides.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(3, 'El cielo será tu límite, pues grandes acontecimientos te sucederán.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(4, 'Te sentirás feliz como un niño y verás al mundo con sus ojos.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(5, 'Vivirás tu vejez con comodidades y riquezas materiales.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(6, 'Confía en tu suerte, que es mucha y te rodeará de prosperidad!', '2026-07-03 19:21:11', '2026-08-04 20:17:26'),
(7, 'No todo el mundo puede recibir las mismas cosas. Sé práctico.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(8, 'Te aguarda una larga y feliz vida.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(9, 'Hoy es el momento de explorar: no temas.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(10, 'Muy pronto serás incluido en muchas reuniones, fiestas y tertulias.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(11, 'Cuando busques lo que más deseas, recuerda hacer tu mejor esfuerzo.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(12, 'Tienes por delante un maravilloso día para triunfar; disfrútalo y compártelo.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(13, 'Hoy serás reconocido por tus dones especiales y lograrás ser feliz por muchas horas.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(14, 'Tu corazón estallará de alegría con la llegada de buenas noticias.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(15, 'Mañana puede ser muy tarde para disfrutar lo que tienes hoy.', '2026-07-03 19:21:11', '2026-07-03 19:21:11'),
(16, 'Serás promovido en tu trabajo debido a tus logros y capacidades.', '2026-07-03 19:21:11', '2026-07-03 19:21:11');

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
(4, '2026_06_01_000001_create_mensajes_table', 1),
(5, '2026_06_01_000002_create_galletas_abiertas_table', 1);

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

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8SciyUDxsaUVua57kdatHTS0D4unC7S4FP9ghHkO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.29.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJ0Q3lYWkMxemJtemtROEJPbVFhV1dDV0dPQmZnTXkwWm8zM3I0cDBNIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvcGFyY2lhbDItd2ViLXBvcnRlbGEtc3VhcmV6LnRlc3RcLz9oZXJkPXByZXZpZXcifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BhcmNpYWwyLXdlYi1wb3J0ZWxhLXN1YXJlei50ZXN0XC8/aGVyZD1wcmV2aWV3Iiwicm91dGUiOiJnYWxsZXRhLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1785872721),
('98EN8Z6RZoByhHKdsGl4U2f0CPYohpDKWuW8vtFC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.29.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJBbWpVdU5JWHdpb0lqUEh4dkcwdFpZUVNkN0xCdUpmMWZUMkNCMUVXIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvcGFyY2lhbDItd2ViLXBvcnRlbGEtc3VhcmV6LnRlc3RcLz9oZXJkPXByZXZpZXcifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BhcmNpYWwyLXdlYi1wb3J0ZWxhLXN1YXJlei50ZXN0XC8/aGVyZD1wcmV2aWV3Iiwicm91dGUiOiJnYWxsZXRhLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1785872716),
('ACnwNj4JOZ6XX86tXVIxmlGmpKVoN3W4FOYFYt9I', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.29.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJ2YUcxTkZQcDJ6azJybW5hMG9pbUpERmVBMHpXZ0dFdURYT0dlbDMwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BhcmNpYWwyLXdlYi1wb3J0ZWxhLXN1YXJlei50ZXN0XC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1785872716),
('AKg0MihfS77368vnBYoVoSpTRpZxaqicdMEktda7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.29.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJlbHVNVGgzckY0VHU1MThqRVFGRmJzYzBKdmthUFhLOXpvZ05mNm5NIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BhcmNpYWwyLXdlYi1wb3J0ZWxhLXN1YXJlei50ZXN0XC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1785872793),
('F0xYzVzrk5HLvegETwxDKzAIeEaX7VbkwQsbKALG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.29.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiI1Ujc4RFQ1RzRRSDA1c1R6b250eXRYS2U4Szhxb2R6Z016eENnV3Z1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BhcmNpYWwyLXdlYi1wb3J0ZWxhLXN1YXJlei50ZXN0XC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1785872721),
('IJZhTtyhp5hfs22aaqpgXSajlIKJhBJAi72zuK8L', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.29.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJQVXRLbEtNTTlhc0c0QTJNU2JWRGJOdjRzbTZaaGQxRWE2TUhYMTczIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvcGFyY2lhbDItd2ViLXBvcnRlbGEtc3VhcmV6LnRlc3RcLz9oZXJkPXByZXZpZXcifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BhcmNpYWwyLXdlYi1wb3J0ZWxhLXN1YXJlei50ZXN0XC8/aGVyZD1wcmV2aWV3Iiwicm91dGUiOiJnYWxsZXRhLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1785872397),
('iKfDImymLjkfrLVwAq0Q1CbOdG8Is9GEqD9fLUiA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ6cU14eUt4bWZ1WFIzVlFiUE02bFlUN3lVSVZyRGxJa0gzNTlpa2VTIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvcGFyY2lhbDItd2ViLXBvcnRlbGEtc3VhcmV6LnRlc3RcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9fQ==', 1785874791),
('VRcFbo5dKUXGRiOZcQtamTnRA3YBBW1IR10g7S6Q', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.29.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJmV21CRG5aRTRSZmc0RkVqNGswdFpCbzZVejBzY0JSSGNVMHlOT2QyIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvcGFyY2lhbDItd2ViLXBvcnRlbGEtc3VhcmV6LnRlc3RcLz9oZXJkPXByZXZpZXcifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BhcmNpYWwyLXdlYi1wb3J0ZWxhLXN1YXJlei50ZXN0XC8/aGVyZD1wcmV2aWV3Iiwicm91dGUiOiJnYWxsZXRhLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1785872793),
('yF8ZEsaeuAcDBmo21PNJKWLp7fTewi62cdpgGtfZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.29.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJUZFZDMUdQQWRLV2owM0o5Y1E3NkNvejRPTFpqR1BpNTlVSWZ5TGRLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3BhcmNpYWwyLXdlYi1wb3J0ZWxhLXN1YXJlei50ZXN0XC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1785872399);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `password`, `remember_token`, `created_at`, `updated_at`, `rol`) VALUES
(1, 'colo', '$2y$12$HGfbvXCX6lzhOrt1ttQhYOnShdQ1ifnCmj/VBwZKRPBo6LSEL51Uq', NULL, '2026-07-03 19:21:11', '2026-07-03 19:21:11', 'administrador'),
(2, 'fran', '$2y$12$79DKpD1gx3xofUbehJhUs.8Ivzi05KWpYqwAlFNIYZJEFpZG6WAlG', NULL, '2026-07-03 19:21:12', '2026-07-03 19:21:12', NULL),
(3, 'marce', '$2y$12$fW4mSKJtyktVuSe8cyFjduJ2OVaiNFJbDobNtxwffPT0WmzdCY6/C', NULL, '2026-07-03 19:21:12', '2026-07-03 19:21:12', NULL),
(4, 'franco', '$2y$12$aOMRHErCyZWEgCv1C7g4S.pJdeKQDo.xNMRgubNzFbHPGc.Zz8QQS', NULL, '2026-07-03 19:21:12', '2026-07-03 19:21:12', NULL),
(5, 'juanma', '$2y$12$jQDSFJrzjrvW3ivyD4XFeeEtrgJSSI..U7az5aW5/CJtqoW0YQdd6', NULL, '2026-07-03 19:22:16', '2026-07-03 19:22:16', NULL),
(6, 'jose', '$2y$12$79p07IP8sgm1X8oJ4O3mfe3Yh9nAad5yeNpEzxLQx6f4K/GtDiJYm', NULL, '2026-07-03 20:40:15', '2026-07-03 20:40:15', NULL);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indices de la tabla `galletas_abiertas`
--
ALTER TABLE `galletas_abiertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galletas_abiertas_user_id_foreign` (`user_id`),
  ADD KEY `galletas_abiertas_mensaje_id_foreign` (`mensaje_id`);

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
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
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
  ADD UNIQUE KEY `users_usuario_unique` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galletas_abiertas`
--
ALTER TABLE `galletas_abiertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `galletas_abiertas`
--
ALTER TABLE `galletas_abiertas`
  ADD CONSTRAINT `galletas_abiertas_mensaje_id_foreign` FOREIGN KEY (`mensaje_id`) REFERENCES `mensajes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `galletas_abiertas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
