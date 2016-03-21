-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2015 a las 21:51:32
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u569800724_evebd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiste`
--

CREATE TABLE IF NOT EXISTS `asiste` (
  `id_u` int(11) NOT NULL,
  `id_e` int(11) NOT NULL,
  `votacion` int(10) DEFAULT NULL,
  `comentarios` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `asiste`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_pagar`
--

CREATE TABLE IF NOT EXISTS `a_pagar` (
  `id_u` int(11) NOT NULL,
  `id_e` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `pagado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compatibilidad`
--

CREATE TABLE IF NOT EXISTS `compatibilidad` (
  `id` int(30) NOT NULL,
  `id_u1` int(11) NOT NULL,
  `id_u2` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compatibilidad`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compatible`
--

CREATE TABLE IF NOT EXISTS `compatible` (
  `id_u1` int(11) NOT NULL,
  `id_u2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compatible`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE IF NOT EXISTS `entradas` (
  `id_u` int(11) NOT NULL,
  `id_e` int(11) NOT NULL,
  `num` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `entradas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(20) NOT NULL,
  `ubicacion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipo` int(10) NOT NULL,
  `descripcion` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(20) DEFAULT NULL,
  `num_asistentes` int(20) DEFAULT NULL,
  `localizacion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `atencion_admin` tinyint(1) NOT NULL,
  `foto` blob,
  `tipo_imagen` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `evento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_evento` int(11) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gest_eventos`
--

CREATE TABLE IF NOT EXISTS `gest_eventos` (
  `id_Us` int(11) NOT NULL,
  `id_Ev` int(11) NOT NULL,
  `duracion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `gest_eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gustar`
--

CREATE TABLE IF NOT EXISTS `gustar` (
  `id_u1` int(11) NOT NULL,
  `id_u2` int(11) NOT NULL,
  `gustar` tinyint(1) DEFAULT NULL,
  `id_ev` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `mensaje` text COLLATE utf8_unicode_ci,
  `emisor` int(20) NOT NULL,
  `receptor` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios_admin`
--

CREATE TABLE IF NOT EXISTS `privilegios_admin` (
  `idAdmin` int(11) NOT NULL,
  `idGestor` int(11) NOT NULL,
  `aceptado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(20) NOT NULL,
  `tipo` int(3) NOT NULL DEFAULT '2',
  `ubicacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `foto` blob,
  `tipo_imagen` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `R_S` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `P_S` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(72) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_n` date NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(10) DEFAULT NULL,
  `atencion_admin` tinyint(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiste`
--
ALTER TABLE `asiste`
  ADD PRIMARY KEY (`id_u`,`id_e`);

--
-- Indices de la tabla `a_pagar`
--
ALTER TABLE `a_pagar`
  ADD PRIMARY KEY (`id_u`);

--
-- Indices de la tabla `compatibilidad`
--
ALTER TABLE `compatibilidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compatible`
--
ALTER TABLE `compatible`
  ADD PRIMARY KEY (`id_u1`,`id_u2`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD KEY `id_u` (`id_u`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `titulo` (`titulo`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `gest_eventos`
--
ALTER TABLE `gest_eventos`
  ADD PRIMARY KEY (`id_Ev`);

--
-- Indices de la tabla `gustar`
--
ALTER TABLE `gustar`
  ADD PRIMARY KEY (`id_u1`,`id_u2`);

--
-- Indices de la tabla `privilegios_admin`
--
ALTER TABLE `privilegios_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compatibilidad`
--
ALTER TABLE `compatibilidad`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
