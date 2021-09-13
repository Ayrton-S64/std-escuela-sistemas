-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2021 a las 10:07:03
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `documentacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_tramites`
--

CREATE TABLE `documento_tramites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idTramite` bigint(20) UNSIGNED NOT NULL,
  `blob_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documento_tramites`
--

INSERT INTO `documento_tramites` (`id`, `idTramite`, `blob_data`, `created_at`, `updated_at`) VALUES
(1, 1, 'nose que se pone aqui', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_tramites`
--

CREATE TABLE `estado_tramites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_tramites`
--

INSERT INTO `estado_tramites` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Pendiente', NULL, NULL),
(2, 'Aceptado', NULL, NULL),
(3, 'Rechazado', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_13_053239_create_estado_tramites_table', 1),
(5, '2021_09_06_151216_create_tipo_tramites_table', 1),
(6, '2021_09_06_151238_create_tramites_table', 1),
(7, '2021_09_10_001203_create_operaciones_tramites_table', 1),
(8, '2021_09_10_003249_create_documento_tramites_table', 1),
(9, '2021_09_13_064111_create_tipo_usuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones_tramites`
--

CREATE TABLE `operaciones_tramites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tramite` bigint(20) UNSIGNED NOT NULL,
  `detalle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuarioOrigen` bigint(20) UNSIGNED NOT NULL,
  `rolOrigen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuarioDestino` bigint(20) UNSIGNED NOT NULL,
  `rolDestino` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `operaciones_tramites`
--

INSERT INTO `operaciones_tramites` (`id`, `tramite`, `detalle`, `usuarioOrigen`, `rolOrigen`, `usuarioDestino`, `rolDestino`, `fechaInicio`, `fechaFin`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tramite hecho por ...', 1, 'Estudiante', 2, 'Administrativo', '2021-06-01', '2021-09-13', NULL, NULL),
(2, 1, 'Tramite hecho por ...', 3, 'Administrativo', 4, 'Administrativo', '2021-09-13', '2021-09-13', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tramites`
--

CREATE TABLE `tipo_tramites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_tramites`
--

INSERT INTO `tipo_tramites` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Tramite de noseque 1', NULL, NULL),
(2, 'Tramite de noseque 2', NULL, NULL),
(3, 'Tramite de noseque 3', NULL, NULL),
(4, 'Tramite de noseque 4', NULL, NULL),
(5, 'Tramite de noseque 5', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Alumno', NULL, NULL),
(2, 'Administrativo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoTramite` bigint(20) UNSIGNED NOT NULL,
  `fechaRegistro` date NOT NULL,
  `estado` bigint(20) UNSIGNED NOT NULL,
  `razon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuarioRegistro` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id`, `codigo`, `tipoTramite`, `fechaRegistro`, `estado`, `razon`, `usuarioRegistro`, `created_at`, `updated_at`) VALUES
(1, '00001', 1, '2021-09-13', 1, 'razon noseque', 1, NULL, NULL),
(2, '00002', 3, '2021-09-13', 1, 'razon noseque', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `tipoUsuario` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `tipoUsuario`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jose Delgado Deza', 'jose@unitru.edu.pe', NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL),
(2, 'Ayrton Oscar Alfonso Soto Alarcon', 'ayrton@unitru.edu.pe', NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL),
(3, 'Kenner Alexander Rojas Ahumada', 'kenner@unitru.edu.pe', NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL),
(4, 'Evellyn Miles Guevara Vega', 'evellyn@unitru.edu.pe', NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL),
(5, 'SECRETARIA', 'secre@unitru.edu.pe', NULL, 2, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documento_tramites`
--
ALTER TABLE `documento_tramites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documento_tramites_idtramite_foreign` (`idTramite`);

--
-- Indices de la tabla `estado_tramites`
--
ALTER TABLE `estado_tramites`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operaciones_tramites`
--
ALTER TABLE `operaciones_tramites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operaciones_tramites_tramite_foreign` (`tramite`),
  ADD KEY `operaciones_tramites_usuarioorigen_foreign` (`usuarioOrigen`),
  ADD KEY `operaciones_tramites_usuariodestino_foreign` (`usuarioDestino`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `tipo_tramites`
--
ALTER TABLE `tipo_tramites`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tramites_estado_foreign` (`estado`),
  ADD KEY `tramites_tipotramite_foreign` (`tipoTramite`),
  ADD KEY `tramites_usuarioregistro_foreign` (`usuarioRegistro`);

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
-- AUTO_INCREMENT de la tabla `documento_tramites`
--
ALTER TABLE `documento_tramites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado_tramites`
--
ALTER TABLE `estado_tramites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `operaciones_tramites`
--
ALTER TABLE `operaciones_tramites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_tramites`
--
ALTER TABLE `tipo_tramites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `documento_tramites`
--
ALTER TABLE `documento_tramites`
  ADD CONSTRAINT `documento_tramites_idtramite_foreign` FOREIGN KEY (`idTramite`) REFERENCES `tramites` (`id`);

--
-- Filtros para la tabla `operaciones_tramites`
--
ALTER TABLE `operaciones_tramites`
  ADD CONSTRAINT `operaciones_tramites_tramite_foreign` FOREIGN KEY (`tramite`) REFERENCES `tramites` (`id`),
  ADD CONSTRAINT `operaciones_tramites_usuariodestino_foreign` FOREIGN KEY (`usuarioDestino`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `operaciones_tramites_usuarioorigen_foreign` FOREIGN KEY (`usuarioOrigen`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD CONSTRAINT `tramites_estado_foreign` FOREIGN KEY (`estado`) REFERENCES `estado_tramites` (`id`),
  ADD CONSTRAINT `tramites_tipotramite_foreign` FOREIGN KEY (`tipoTramite`) REFERENCES `tipo_tramites` (`id`),
  ADD CONSTRAINT `tramites_usuarioregistro_foreign` FOREIGN KEY (`usuarioRegistro`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
