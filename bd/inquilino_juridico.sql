-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-06-2022 a las 01:48:27
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
-- Estructura de tabla para la tabla `inquilino_juridico`
--

CREATE TABLE `inquilino_juridico` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_inqu` varchar(76) COLLATE utf8_spanish_ci NOT NULL,
  `nom_inqj` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre o razon social',
  `rif_inqj` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif juridico',
  `act_inqj` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'actividad comercial',
  `dir_inqj` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion fiscal',
  `tel_inqj` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cor_inqj` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inquilino_juridico`
--

INSERT INTO `inquilino_juridico` (`id`, `cod_inqu`, `nom_inqj`, `rif_inqj`, `act_inqj`, `dir_inqj`, `tel_inqj`, `cor_inqj`) VALUES
('IJ-0000001', '', 'inquilino 1', '099090', '90909090', '9099009', '0', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inquilino_juridico`
--
ALTER TABLE `inquilino_juridico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rif_inqj` (`rif_inqj`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
