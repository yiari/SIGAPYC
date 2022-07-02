-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-04-2022 a las 21:16:24
-- Versión del servidor: 5.7.12-log
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquileres`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoderado_juridico`
--

CREATE TABLE `apoderado_juridico` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nom_apoj` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre o razon social',
  `rif_apoj` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif juridico',
  `act_apoj` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'actividad comercial',
  `dir_apoj` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion fiscal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indices de la tabla `apoderado_juridico`
--
ALTER TABLE `apoderado_juridico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rif_apoj` (`rif_apoj`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
