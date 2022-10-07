-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-07-2022 a las 16:33:01
-- Versión del servidor: 8.0.29-0ubuntu0.20.04.3
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_wsctechlab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `i001t_documentos`
--

CREATE TABLE `i001t_documentos` (
  `co_documento` int UNSIGNED NOT NULL,
  `nb_documento` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `tx_descripcion` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `tx_url` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL DEFAULT 'no_disponible.pdf',
  `in_estado` set('0','1') CHARACTER SET utf8mb3 COLLATE utf8_general_ci DEFAULT NULL COMMENT '0=close,1=open',
  `co_unidad` int NOT NULL,
  `fe_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fe_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `co_usuario_add` int UNSIGNED NOT NULL,
  `co_usuario_upd` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `i001t_documentos`
--

INSERT INTO `i001t_documentos` (`co_documento`, `nb_documento`, `tx_descripcion`, `tx_url`, `in_estado`, `co_unidad`, `fe_add`, `co_usuario_add`, `co_usuario_upd`) VALUES
(1, 'Calibración de un dinamómetro de 10 ton', 'Calibración de un dinamómetro de 10 ton', 'no_disponible.pdf', '1', 1, '2022-07-08 18:06:43', 1, 1),
(2, 'Calibración de dinamometro de 10 ton de capacidad', 'Calibración de dinamometro de 10 ton de capacidad', 'no_disponible.pdf', NULL, 1, '2022-07-08 19:14:47', 1, 1),
(3, 'Calibración de dinamometro de 10 ton de capacidad', 'Calibración de dinamometro de 10 ton de capacidad', 'no_disponible.pdf', NULL, 1, '2022-07-08 19:15:02', 1, 1),
(4, 'Ensayo de calibración de dinamometro', 'Ensayo de calibración de dinamometro', 'no_disponible.pdf', NULL, 1, '2022-07-08 19:15:47', 1, 1),
(5, 'Traccion de empalmes fijos', 'Traccion de empalmes fijos', 'no_disponible.pdf', NULL, 1, '2022-07-08 19:16:15', 1, 1),
(6, 'ensayo de traccion de dos empalmes fijos', 'ensayo de traccion de dos empalmes fijos', 'no_disponible.pdf', NULL, 1, '2022-07-08 19:17:09', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `i002t_unidades`
--

CREATE TABLE `i002t_unidades` (
  `co_unidad` int NOT NULL,
  `tx_nombre` varchar(100) NOT NULL,
  `fe_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fe_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `i002t_unidades`
--

INSERT INTO `i002t_unidades` (`co_unidad`, `tx_nombre`, `fe_add`) VALUES
(1, 'Ingeniería Mecánica - Ensayos Mećanicos', '2022-07-08 18:11:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `i003t_usuarios`
--

CREATE TABLE `i003t_usuarios` (
  `co_usuario` int UNSIGNED NOT NULL,
  `nu_rut` varchar(40) NOT NULL,
  `tx_nombre` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `tx_apellido` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `tx_correo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `tx_telefono` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `url_avatar` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci,
  `tx_password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `co_usuario_rol` int UNSIGNED NOT NULL DEFAULT '1',
  `tx_rol` set('Administrador','Usuario','Cliente') NOT NULL,
  `in_status` set('0','1','2') CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active,2=delete',
  `fe_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fe_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `co_usuario_add` int UNSIGNED NOT NULL,
  `co_usuario_upd` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `i003t_usuarios`
--

INSERT INTO `i003t_usuarios` (`co_usuario`, `nu_rut`, `tx_nombre`, `tx_apellido`, `tx_correo`, `tx_telefono`, `url_avatar`, `tx_password`, `co_usuario_rol`, `tx_rol`, `in_status`, `fe_add`, `fe_upd`, `co_usuario_add`, `co_usuario_upd`) VALUES
(1, '164196178', 'Steve', 'Cariola', 'admin@techlab.cl', '12345678', NULL, '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrador', '1', '2022-07-08 14:31:52', '2022-07-08 14:31:52', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `i004t_roles`
--

CREATE TABLE `i004t_roles` (
  `co_rol` int UNSIGNED NOT NULL,
  `nb_rol` varchar(50) NOT NULL,
  `in_status` set('0','1','2') NOT NULL COMMENT '0=inactivo,1=activo,2=borrado',
  `fe_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fe_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `co_usuario_add` int UNSIGNED NOT NULL,
  `co_usuario_upd` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `i001t_documentos`
--
ALTER TABLE `i001t_documentos`
  ADD PRIMARY KEY (`co_documento`);

--
-- Indices de la tabla `i002t_unidades`
--
ALTER TABLE `i002t_unidades`
  ADD PRIMARY KEY (`co_unidad`);

--
-- Indices de la tabla `i003t_usuarios`
--
ALTER TABLE `i003t_usuarios`
  ADD PRIMARY KEY (`co_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `i001t_documentos`
--
ALTER TABLE `i001t_documentos`
  MODIFY `co_documento` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `i002t_unidades`
--
ALTER TABLE `i002t_unidades`
  MODIFY `co_unidad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
