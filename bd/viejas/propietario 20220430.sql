-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-05-2022 a las 03:57:45
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
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id propietario',
  `cod_prop` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `nom_prop` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre',
  `ape_prop` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'apellido',
  `nac_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nacionalidad propietario',
  `ci_prop` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'cedula',
  `rif_prop` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif propietario',
  `loc_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel local propietario',
  `cel_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel celular propietario',
  `cor_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo propietario',
  `est_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'estado propietario',
  `mun_prop` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'municipio propietario',
  `par_prop` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'parroquia propietario',
  `dir_prop` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion propietario',
  `ofi_prop` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion de oficina',
  `tip_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de propietario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_prop`, `cod_prop`, `nom_prop`, `ape_prop`, `nac_prop`, `ci_prop`, `rif_prop`, `loc_prop`, `cel_prop`, `cor_prop`, `est_prop`, `mun_prop`, `par_prop`, `dir_prop`, `ofi_prop`, `tip_prop`) VALUES
('P-00000001', 'P-10Jose Torres', 'Jose', 'Torres', 'V', '999888', '999', '04145017681', '', '', '14', '', '', 'Cale 57', 'Cale 57', ''),
('P-00000002', 'P-01Ana Soto', 'Ana', 'Soto', 'V', '9622222', '1', '3', '9999', '99999', '13', '145', '145', 'Calle Nueva', 'Calle Nueva', ''),
('P-00000003', 'P-10Jose 8', 'Jose', '8', 'V', '8', '8', '8', '8', '8@kkk', '14', '', '', '8', '8', ''),
('P-00000004', 'P- ', '', '', '', '', '', '', '', '', '0', '', '', '', '', ''),
('P-00000005', 'P-01andres 8989', 'andres', '8989', 'V', '989898', '98', '98', '989', '89', '4', '', '', '89', '89', ''),
('P-00000006', 'P-01as as', 'as', 'as', '', '233232', '', '', '', '', '0', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_prop`),
  ADD UNIQUE KEY `ci_prop` (`ci_prop`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
