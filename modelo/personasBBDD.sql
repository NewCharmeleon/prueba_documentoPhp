-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2015 a las 09:29:25
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `personasbbdd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL,
  `apellido` char(50) NOT NULL,
  `nombre` char(50) NOT NULL,
  `numero_documento` int(8) NOT NULL,
  `sexo` char(10) NOT NULL,
  `nacionalidad` char(10) NOT NULL,
  `archivos_externos` blob NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `ciudad` char(30) NOT NULL,
  `departamento` char(30) NOT NULL,
  `provincia` char(30) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `apellido`, `nombre`, `numero_documento`, `sexo`, `nacionalidad`, `archivos_externos`, `fecha_expedicion`, `fecha_vencimiento`, `domicilio`, `ciudad`, `departamento`, `provincia`, `fecha_nacimiento`, `lugar_nacimiento`) VALUES
(1, 'Gato', 'Don', 22222222, 'M', 'Argentino', '', '2015-10-01', '2030-10-01', 'su calle 111', 'rawson', 'rawson', 'Chubut', '2015-02-17', 'gaiman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` char(20) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'Admin', 'Admin123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;