-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 19-09-2018 a las 16:30:38
-- Versión del servidor: 5.6.38
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `manu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `acceso_administrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `password`, `acceso_administrador`) VALUES
(1, 'manugarcia', '$2y$12$iCJuihgbj.RVrLehe5PBneLboIpCMreCnLsnb6AKN1Swr824elEFy', 1),
(7, 'admin6', '$2y$12$OOa14Hd9W8fpQNh9eeR9WO.4XiqK4BMCu4Hdwn/wKtaikkoNBZ1X2', 0),
(8, 'admin7', '$2y$12$w4CdAlY0jsmFT0C0nPonreMV2.SZS6AJ81E8unVL9FcISwBJwgKKq', 0),
(13, 'admin11', '$2y$12$LdEOLwH1l/.2ebyyqgqbmuYXuildZaqL72sGjRSNsZJc1lMnhyKZm', 1),
(14, 'admin12', '$2y$12$oHxEySUkdf05j2owYZHRFeYjvkgmUTnnhd0yWIKu0P1Kreyc3ybbe', 0),
(16, 'admin13', '$2y$12$v1DsL1mx7yFnwAZmcEVLeO7NZVqecnfW9FrGTCjJI4SEIVDZP02Vm', 0),
(18, 'admin14', '$2y$12$cEyvwmisH/iFcARwEFA3/u4pKYNmCIIA2oc8B67ns3hk2nCAfas82', 0),
(19, 'admin15', '$2y$12$3sWfE1WU13jozikHKZFxauLAjB2H/ubcCvfOGVuKwQE48ASlmcR3i', 0),
(20, 'admin16', '$2y$12$SiTvOkBlu7ngIl9iP.eMQ.QfydV2ltx3R1KDjrtKU4Dy8hoYFsvCa', 0),
(21, 'admin17', '$2y$12$UZJ9Z5EMAg0FKrWwzDDbqu9a/ksE.uTsBx3/tBXgmHjw0XMizC.ZK', 0),
(24, 'admin18', '$2y$12$J7aPrG3FqnbcdR4DNdd.guR5/KORRGpbqn0pK7ZAQbjDqYO9ad8z.', 0),
(25, 'pepe', '$2y$12$deWuGyQx4gebawSpbBtFveQn9DNDHL402t3tQWzsYHCg8G8mQ2UDi', 0),
(26, 'juancar@gmail.com', '$2y$12$3tw1ZarI.7sG0vkDdeg6O.BIG1EhorNiJLjcPzQdYM4b6VE23CelC', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `id_asignaciones` int(11) NOT NULL,
  `trabajador_id` int(11) NOT NULL,
  `fiesta_id` int(11) NOT NULL,
  `puesto_id` int(11) NOT NULL,
  `editado` datetime NOT NULL,
  `email_env` int(11) NOT NULL,
  `fichado` int(11) NOT NULL,
  `email_confirmado` int(11) NOT NULL,
  `hora_fichado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`id_asignaciones`, `trabajador_id`, `fiesta_id`, `puesto_id`, `editado`, `email_env`, `fichado`, `email_confirmado`, `hora_fichado`) VALUES
(3, 65, 6, 6, '2018-08-08 00:00:00', 0, 0, 0, '0000-00-00 00:00:00'),
(5, 70, 6, 6, '2018-08-07 00:00:00', 0, 0, 0, '0000-00-00 00:00:00'),
(7, 67, 8, 6, '2018-08-07 00:00:00', 0, 1, 0, '2018-09-06 16:29:59'),
(14, 71, 5, 5, '2018-08-29 12:14:50', 0, 0, 0, '0000-00-00 00:00:00'),
(17, 75, 5, 5, '2018-08-29 12:15:00', 0, 0, 0, '0000-00-00 00:00:00'),
(19, 66, 5, 7, '2018-08-29 12:38:37', 0, 0, 0, '0000-00-00 00:00:00'),
(30, 67, 6, 7, '2018-08-29 15:17:39', 0, 0, 0, '0000-00-00 00:00:00'),
(31, 1, 9, 6, '2018-08-29 15:18:03', 0, 1, 0, '2018-09-05 17:41:19'),
(32, 71, 4, 6, '2018-08-29 15:18:38', 0, 1, 0, '2018-09-05 17:22:03'),
(33, 70, 5, 7, '2018-08-29 15:33:19', 0, 0, 0, '0000-00-00 00:00:00'),
(34, 66, 6, 7, '2018-08-29 15:44:19', 0, 0, 0, '0000-00-00 00:00:00'),
(35, 66, 6, 6, '2018-08-29 15:45:16', 0, 0, 0, '0000-00-00 00:00:00'),
(36, 66, 6, 7, '2018-08-29 15:45:25', 0, 0, 0, '0000-00-00 00:00:00'),
(42, 67, 7, 5, '2018-08-29 17:28:00', 0, 1, 0, '2018-09-05 17:24:38'),
(43, 76, 7, 5, '2018-08-29 17:29:12', 0, 1, 0, '2018-09-05 17:24:42'),
(44, 65, 10, 5, '2018-08-30 10:38:15', 0, 1, 0, '2018-09-06 10:57:24'),
(46, 66, 12, 6, '2018-08-30 12:03:04', 0, 0, 0, '0000-00-00 00:00:00'),
(47, 66, 20, 6, '2018-08-30 12:03:28', 0, 1, 0, '2018-09-07 18:36:35'),
(48, 75, 22, 7, '2018-08-30 12:12:14', 0, 1, 0, '2018-09-05 16:46:11'),
(50, 66, 10, 5, '2018-08-30 17:57:16', 0, 1, 0, '2018-09-06 11:21:44'),
(51, 75, 4, 6, '2018-08-30 17:59:38', 0, 1, 0, '2018-09-05 17:22:07'),
(52, 70, 19, 6, '2018-08-31 20:49:50', 0, 0, 1, '0000-00-00 00:00:00'),
(55, 75, 22, 5, '2018-08-31 20:54:41', 0, 1, 0, '2018-09-05 16:46:52'),
(57, 67, 22, 5, '2018-09-03 09:58:31', 0, 1, 0, '2018-09-05 14:09:19'),
(58, 71, 22, 5, '2018-09-03 09:58:34', 0, 1, 0, '2018-09-05 16:46:55'),
(59, 66, 22, 5, '2018-09-03 09:58:38', 0, 1, 0, '2018-09-05 14:02:16'),
(60, 66, 22, 5, '2018-09-03 09:58:41', 0, 1, 0, '2018-09-05 14:04:02'),
(61, 65, 22, 5, '2018-09-03 09:58:45', 0, 1, 0, '2018-09-05 14:02:33'),
(62, 67, 22, 5, '2018-09-03 09:58:48', 0, 1, 0, '2018-09-05 14:06:47'),
(63, 66, 22, 5, '2018-09-03 09:58:50', 0, 1, 0, '2018-09-05 14:04:30'),
(64, 75, 22, 5, '2018-09-03 09:58:54', 0, 1, 0, '2018-09-05 16:46:58'),
(65, 72, 22, 5, '2018-09-03 09:58:57', 0, 1, 0, '2018-09-05 16:47:01'),
(66, 76, 22, 5, '2018-09-03 09:59:01', 0, 1, 0, '2018-09-05 16:47:03'),
(67, 67, 22, 5, '2018-09-03 09:59:04', 0, 1, 0, '2018-09-05 14:10:07'),
(68, 66, 22, 5, '2018-09-03 09:59:07', 0, 1, 0, '2018-09-05 16:47:06'),
(69, 70, 22, 5, '2018-09-03 09:59:10', 0, 1, 0, '2018-09-05 16:47:09'),
(70, 70, 22, 5, '2018-09-03 09:59:13', 0, 1, 0, '2018-09-05 16:47:11'),
(71, 71, 22, 5, '2018-09-03 09:59:15', 0, 1, 0, '2018-09-05 16:47:14'),
(72, 75, 22, 5, '2018-09-03 09:59:20', 0, 1, 0, '2018-09-05 16:47:17'),
(73, 76, 22, 5, '2018-09-03 09:59:24', 0, 1, 0, '2018-09-05 16:47:19'),
(74, 72, 22, 5, '2018-09-03 09:59:26', 0, 1, 0, '2018-09-05 14:10:14'),
(75, 70, 22, 5, '2018-09-03 09:59:30', 0, 1, 0, '2018-09-05 14:10:10'),
(76, 67, 22, 5, '2018-09-03 09:59:33', 0, 1, 0, '2018-09-05 14:09:22'),
(79, 65, 12, 6, '2018-09-05 12:44:47', 0, 0, 0, '0000-00-00 00:00:00'),
(80, 65, 12, 6, '2018-09-05 12:44:56', 0, 0, 0, '0000-00-00 00:00:00'),
(81, 65, 12, 6, '2018-09-05 12:44:58', 0, 0, 0, '0000-00-00 00:00:00'),
(82, 65, 12, 6, '2018-09-05 12:45:02', 0, 0, 0, '0000-00-00 00:00:00'),
(85, 66, 12, 6, '2018-09-05 15:14:48', 0, 0, 0, '0000-00-00 00:00:00'),
(87, 65, 12, 6, '2018-09-05 15:17:50', 0, 0, 0, '0000-00-00 00:00:00'),
(88, 65, 12, 6, '2018-09-05 15:17:55', 0, 0, 0, '0000-00-00 00:00:00'),
(89, 65, 12, 7, '2018-09-05 15:23:59', 0, 0, 0, '0000-00-00 00:00:00'),
(90, 65, 12, 7, '2018-09-05 15:24:12', 0, 0, 0, '0000-00-00 00:00:00'),
(93, 65, 12, 5, '2018-09-05 15:24:49', 0, 0, 0, '0000-00-00 00:00:00'),
(94, 65, 12, 7, '2018-09-05 15:25:21', 0, 0, 0, '0000-00-00 00:00:00'),
(96, 65, 12, 6, '2018-09-05 15:28:03', 0, 0, 0, '0000-00-00 00:00:00'),
(98, 77, 12, 6, '2018-09-05 15:29:32', 0, 0, 0, '0000-00-00 00:00:00'),
(105, 65, 4, 5, '2018-09-05 17:10:25', 0, 1, 0, '2018-09-05 17:22:11'),
(106, 66, 10, 6, '2018-09-05 17:11:42', 0, 1, 0, '2018-09-06 11:23:42'),
(107, 65, 19, 7, '2018-09-06 12:39:18', 0, 0, 0, '0000-00-00 00:00:00'),
(108, 67, 19, 7, '2018-09-06 12:39:22', 0, 0, 0, '0000-00-00 00:00:00'),
(109, 70, 19, 7, '2018-09-06 12:39:25', 0, 0, 0, '0000-00-00 00:00:00'),
(110, 70, 19, 7, '2018-09-06 12:39:28', 0, 0, 0, '0000-00-00 00:00:00'),
(111, 71, 19, 7, '2018-09-06 12:39:31', 0, 0, 0, '0000-00-00 00:00:00'),
(112, 72, 19, 7, '2018-09-06 12:39:34', 0, 0, 0, '0000-00-00 00:00:00'),
(116, 65, 8, 6, '2018-09-06 12:40:24', 0, 1, 0, '2018-09-06 19:18:30'),
(117, 66, 8, 6, '2018-09-06 12:40:28', 0, 1, 0, '2018-09-06 19:18:35'),
(119, 66, 8, 6, '2018-09-06 12:40:51', 0, 1, 0, '2018-09-06 19:19:21'),
(120, 67, 8, 6, '2018-09-06 12:40:54', 0, 1, 0, '2018-09-06 19:18:39'),
(122, 66, 8, 6, '2018-09-06 12:41:15', 0, 1, 0, '2018-09-06 19:19:23'),
(124, 66, 8, 6, '2018-09-06 12:41:29', 0, 1, 0, '2018-09-06 19:19:26'),
(125, 67, 8, 6, '2018-09-06 12:41:32', 0, 1, 0, '2018-09-06 19:19:28'),
(126, 67, 8, 6, '2018-09-06 12:41:35', 0, 1, 0, '2018-09-06 19:19:31'),
(127, 66, 8, 6, '2018-09-06 12:41:38', 0, 1, 0, '2018-09-06 19:19:34'),
(128, 65, 8, 7, '2018-09-06 12:41:47', 0, 1, 0, '2018-09-06 19:19:37'),
(129, 71, 8, 7, '2018-09-06 12:41:50', 0, 1, 0, '2018-09-06 19:19:40'),
(130, 72, 8, 7, '2018-09-06 12:41:53', 0, 1, 0, '2018-09-06 19:19:42'),
(131, 72, 8, 5, '2018-09-06 12:42:41', 0, 1, 0, '2018-09-06 19:19:45'),
(132, 75, 8, 5, '2018-09-06 12:42:44', 0, 1, 0, '2018-09-06 19:19:48'),
(133, 77, 8, 5, '2018-09-06 12:42:47', 0, 1, 0, '2018-09-06 19:19:50'),
(136, 65, 8, 6, '2018-09-06 12:44:03', 0, 1, 0, '2018-09-06 19:19:53'),
(137, 65, 8, 6, '2018-09-06 12:44:06', 0, 1, 0, '2018-09-06 19:19:56'),
(138, 65, 8, 6, '2018-09-06 12:44:09', 0, 1, 0, '2018-09-06 19:19:59'),
(139, 65, 8, 6, '2018-09-06 12:44:11', 0, 1, 0, '2018-09-06 19:20:03'),
(141, 66, 8, 6, '2018-09-06 12:44:27', 0, 1, 0, '2018-09-06 19:20:06'),
(142, 70, 8, 6, '2018-09-06 12:44:30', 0, 1, 0, '2018-09-06 19:20:09'),
(143, 71, 8, 6, '2018-09-06 12:44:33', 0, 1, 0, '2018-09-06 19:20:13'),
(144, 65, 20, 5, '2018-09-06 19:29:04', 0, 1, 0, '2018-09-07 18:36:42'),
(145, 66, 20, 5, '2018-09-06 19:29:07', 0, 1, 0, '2018-09-07 18:36:39'),
(146, 67, 20, 5, '2018-09-06 19:29:10', 0, 1, 0, '2018-09-07 18:36:44'),
(147, 75, 20, 5, '2018-09-06 19:29:13', 0, 1, 0, '2018-09-07 18:36:46'),
(148, 71, 20, 5, '2018-09-06 19:29:16', 0, 1, 0, '2018-09-07 18:56:10'),
(149, 67, 13, 6, '2018-09-06 19:36:09', 0, 1, 0, '2018-09-07 11:27:43'),
(150, 65, 13, 5, '2018-09-06 19:36:23', 0, 1, 0, '2018-09-07 11:27:55'),
(151, 66, 13, 5, '2018-09-06 19:36:26', 0, 1, 0, '2018-09-07 11:27:49'),
(152, 70, 13, 5, '2018-09-06 19:36:30', 0, 1, 0, '2018-09-07 11:27:52'),
(153, 71, 13, 5, '2018-09-06 19:36:32', 0, 1, 0, '2018-09-07 11:28:01'),
(154, 75, 13, 5, '2018-09-06 19:36:35', 0, 1, 0, '2018-09-07 11:27:58'),
(156, 65, 19, 6, '2018-09-07 12:31:04', 0, 0, 0, '0000-00-00 00:00:00'),
(157, 65, 19, 6, '2018-09-07 12:31:47', 0, 0, 0, '0000-00-00 00:00:00'),
(158, 65, 19, 6, '2018-09-07 12:32:03', 0, 0, 0, '0000-00-00 00:00:00'),
(159, 65, 19, 5, '2018-09-07 12:32:38', 0, 0, 0, '0000-00-00 00:00:00'),
(160, 65, 19, 6, '2018-09-10 20:54:24', 0, 0, 0, '0000-00-00 00:00:00'),
(161, 66, 19, 6, '2018-09-10 20:54:42', 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiestas`
--

CREATE TABLE `fiestas` (
  `id_fiesta` int(11) NOT NULL,
  `nombre_evento` varchar(50) NOT NULL,
  `nombre_sala` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `observaciones` text NOT NULL,
  `editado` datetime NOT NULL,
  `archivado` int(11) NOT NULL,
  `observaciones_final` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fiestas`
--

INSERT INTO `fiestas` (`id_fiesta`, `nombre_evento`, `nombre_sala`, `fecha`, `hora_inicio`, `observaciones`, `editado`, `archivado`, `observaciones_final`) VALUES
(4, 'Tercera fiesta', '', '2018-09-07', '15:06:00', 'Otras observaciones', '2018-08-03 11:12:37', 3, 'todo ok'),
(5, 'Cuarta fiesta', '', '2019-00-00', '11:15:00', '', '2018-08-03 11:17:04', 3, ''),
(6, 'Nombre de la fiesta', 'Nombre de la sala', '2019-09-08', '11:45:00', 'Texto de la fiesta\r\n', '2018-08-03 11:52:31', 3, ''),
(7, 'NomBRE de OTRa fiesta', 'NoMBRE de OTRa Sala', '2018-12-07', '18:35:00', 'Aqui PONGO lo que QuiEra', '2018-09-07 11:55:26', 3, ''),
(8, 'NomBRE De UNA FiesTa', 'NomBRE De UNA SAla', '2019-06-07', '14:07:00', 'Texto de una fiesta', '2018-08-03 11:59:17', 3, ''),
(9, 'Otra fiesta', 'Otra sala', '2019-04-08', '12:00:00', 'Texto texto texto', '2018-08-03 12:00:38', 3, ''),
(10, 'Nombre hora', 'Sala hora', '2019-01-08', '04:05:00', 'Observaciones hora', '2018-08-30 10:37:42', 3, ''),
(11, 'Segunda hora', 'Segunda hora', '2019-01-01', '23:59:00', 'Segunda hora', '2018-08-30 10:39:52', 0, ''),
(12, 'Tercera hora', 'Tercera hora', '2018-09-05', '16:44:01', 'Observaciones tercera hora\r\n', '2018-08-30 10:41:56', 3, ''),
(13, 'Tercera hora', 'Tercera hora', '2018-09-07', '18:33:00', 'Observaciones tercera hora\r\n', '2018-08-30 10:42:23', 3, ''),
(15, 'Cuarta hora', 'Cuarta hora ', '2019-02-19', '03:02:02', 'Observaciones cuarta hora\r\n', '2018-08-30 11:12:14', 3, ''),
(16, '', '', '2019-02-02', '00:00:00', '', '2018-08-30 11:15:35', 0, ''),
(17, '', '', '2019-01-01', '00:00:00', '', '2018-08-30 11:16:45', 0, ''),
(18, '', '', '2019-01-01', '00:00:00', '', '2018-08-30 11:28:52', 0, ''),
(19, 'Sexta fiesta', 'Sexta fieta', '2019-09-10', '20:57:00', '', '2018-08-30 11:30:56', 0, ''),
(20, 'Fiesta 7', 'Fiesta 7', '2018-09-07', '18:49:00', '', '2018-08-30 11:37:50', 3, 'siiiii'),
(21, 'Fiesta 8 ', 'Fiesta 8', '2019-08-31', '23:00:00', '', '2018-08-30 11:39:27', 0, ''),
(22, 'Fiesta 9', 'Fiesta 9', '2018-09-05', '10:20:00', '', '2018-08-30 11:40:45', 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_notas` int(11) NOT NULL,
  `text` text NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_notas`, `text`, `editado`) VALUES
(73, 'Una nota\r\n', '2018-09-19 10:57:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `id_puestos` int(11) NOT NULL,
  `nombre_puesto` varchar(20) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`id_puestos`, `nombre_puesto`, `editado`) VALUES
(5, 'Camarero', '2018-08-01 10:43:22'),
(6, 'Tiketero', '2018-08-01 10:58:28'),
(7, 'Guardarropa', '2018-08-01 10:58:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id_trabajador` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `primer_apellido` varchar(20) NOT NULL,
  `segundo_apellido` varchar(20) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `url_dni_1` varchar(50) NOT NULL,
  `url_dni_2` varchar(50) NOT NULL,
  `banco` varchar(24) NOT NULL,
  `ss` varchar(12) NOT NULL,
  `tlf` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url_foto` varchar(50) NOT NULL,
  `editado` datetime NOT NULL,
  `observaciones` text NOT NULL,
  `ultimo_email_ficha` datetime NOT NULL,
  `ultimo_email_asignaciones` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id_trabajador`, `nombre`, `primer_apellido`, `segundo_apellido`, `dni`, `url_dni_1`, `url_dni_2`, `banco`, `ss`, `tlf`, `email`, `url_foto`, `editado`, `observaciones`, `ultimo_email_ficha`, `ultimo_email_asignaciones`) VALUES
(1, 'Manu Garcia Moreno', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'Nombre1', 'Apellsssido1', 'Segundo 1', 'adfdf', 'adfdf_1.jpg', 'adfdf_2.jpg', '342423455555555555555555', '3432424ddddd', '4234234', '32423@4344', 'adfdf_3.jpg', '2018-08-24 18:15:01', 'Observaciones primer trabajador', '2018-08-31 16:30:10', '2018-09-19 16:13:24'),
(66, 'Nombre2', 'Apellido2', 'Segundo Apellido2', '98616459', '98616459_1.jpg', '98616459_2.jpg', '654654', '321321', '645651', 'kjhkj@xn--klk-7ma', '98616459_3.jpg', '2018-08-02 18:12:11', 'Observaciones del segundo trabajador', '2018-08-31 13:41:16', '0000-00-00 00:00:00'),
(67, 'Nombre3', 'Apellido3', 'Segundo Apellido3', '4910659', '4910659_1.jpg', '4910659_2.jpg', '981968169', '8961941', '78916191', '9849@564616', '4910659_3.jpg', '2018-08-02 18:15:56', 'Observaciones del tercer trabajador', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'Nombre4', 'Apellido4', 'Segundo_apellido4', '55', '55_1.jpg', '55_2.jpg', 'es3213213213213213123123', '', '999999999', 'ju@jj', '55_3.jpg', '2018-08-02 18:51:59', 'Observaciones del cuarto trabajador', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'Nombre4', 'Apellido4', 'Segundo_apellido4', '54', '54_1.jpg', '54_2.jpg', 'es3213213213213213123123', '', '999999999', 'ju@jj', '54_3.jpg', '2018-08-02 18:53:02', 'Observaciones del cuarto trabajador', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'Nombre7', 'Apellido7', 'Apellido7', '54645', '54645_1.jpg', '54645_2.jpg', '321313123123131232132131', '312312312312', '321313131', '321312@gmillskj', '54645_3.jpg', '2018-08-02 18:57:00', 'Observaciones del sexto invitado', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'Juan Carlos', 'De Bernardo', 'De Bernardo', 'lllllllll', 'lllllllll_1.jpg', 'lllllllll_2.jpg', 'llllllllllllllllllllllll', 'llllllllllll', '685624740', 'carabancap@gmail.com', 'lllllllll_3.jpg', '2018-08-27 12:57:03', 'Ninguna observación', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'Juan Carlos', 'De Bernardo', 'De Bernardo', 'fsfasfads', 'fsfasfads_1.jpg', 'fsfasfads_2.jpg', 'AKLJDFOPJIKLDJFOIdfasg O', 'dfalskjdfoas', '685624740', 'carabancap@gmail.com', 'fsfasfads_3.jpg', '2018-08-29 17:25:35', 'adsfasdfasdfasdfasdfasfdasdfasfasfasdfasdfasdfdasfasfa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'Juan Carlos', 'De Bernardo', 'De Bernardo', 'dddsdfsfd', 'dddsdfsfd_1.jpg', 'dddsdfsfd_2.jpg', 'dddddddddddddddddddddddd', 'dddddddddddd', '685624740', 'carabancap@gmail.com', 'dddsdfsfd_3.jpg', '2018-08-31 12:41:09', 'prueba fecha envío de email', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'Juan Carlos', 'De Bernardo', 'De Bernardo', 'lñkjñklhj', 'lñkjñklhj_1.jpg', 'lñkjñklhj_2.jpg', 'asdfasdfasdfasdfasdfasdf', 'asdfasdfasdf', '685624740', 'juancarpliego@gmail.com', 'lñkjñklhj_3.jpg', '2018-08-31 13:03:06', '', '2018-08-31 20:51:10', '2018-08-31 16:43:22'),
(79, 'Ssssssssssssssssssss', 'Ssssssss', '', 'sssssssss', 'sssssssss_1.jpg', 'sssssssss_2.jpg', '', '', '', '', 'sssssssss_3.jpg', '2018-09-07 16:11:40', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id_asignaciones`,`trabajador_id`,`fiesta_id`,`puesto_id`),
  ADD KEY `puesto_id` (`puesto_id`),
  ADD KEY `fiesta_id` (`fiesta_id`),
  ADD KEY `trabajador_id` (`trabajador_id`);

--
-- Indices de la tabla `fiestas`
--
ALTER TABLE `fiestas`
  ADD PRIMARY KEY (`id_fiesta`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_notas`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`id_puestos`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id_trabajador`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id_asignaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT de la tabla `fiestas`
--
ALTER TABLE `fiestas`
  MODIFY `id_fiesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_notas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `id_puestos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`puesto_id`) REFERENCES `puestos` (`id_puestos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`fiesta_id`) REFERENCES `fiestas` (`id_fiesta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asignaciones_ibfk_3` FOREIGN KEY (`trabajador_id`) REFERENCES `trabajadores` (`id_trabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION;
