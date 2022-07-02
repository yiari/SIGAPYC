-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-06-2022 a las 02:26:01
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
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `id_repr` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id representante',
  `cod_repr` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `nom_repr` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre',
  `ape_repr` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'apellido',
  `nac_repr` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nacionalidad representante',
  `ci_repr` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'cedula',
  `rif_repr` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif representante',
  `loc_repr` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel local representante',
  `cel_repr` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel celular representante',
  `cor_repr` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo representante',
  `est_repr` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'estado representante',
  `mun_repr` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'municipio representante',
  `par_repr` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'parroquia representante',
  `dir_repr` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion representante',
  `ofi_repr` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion de oficina',
  `tip_repr` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de representante',
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'propietario',
  `cod_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'codigo podder',
  `not_regi` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre registro',
  `fec_regi` date NOT NULL COMMENT 'fecha registro',
  `num_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero poder',
  `tom_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tomo poder',
  `fol_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'expediente '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`id_repr`, `cod_repr`, `nom_repr`, `ape_repr`, `nac_repr`, `ci_repr`, `rif_repr`, `loc_repr`, `cel_repr`, `cor_repr`, `est_repr`, `mun_repr`, `par_repr`, `dir_repr`, `ofi_repr`, `tip_repr`, `id_prop`, `cod_regi`, `not_regi`, `fec_regi`, `num_regi`, `tom_regi`, `fol_regi`) VALUES
('R-0000001', 'R--8 8', '8', '8', '', '8', '8', '8', '8', '8', '16', '192', '192', '8', '8', '', 'PJ-02-B', '8', '', '0000-00-00', '8', '8', '8'),
('R-0000002', 'R-10-Jose Gregorio Quero', 'Jose Gregorio', 'Quero', '', '545454', '5454', '04145017681', '5454', '5454', '15', '168', '168', 'Cale 57', 'Cale 57', '', 'fgfdgfdgfd', '54', '', '0000-00-00', '45', '54', '45'),
('R-0000003', 'R--8 8', '8', '8', '', '8', '8', '8', '8', '8', '1', '', '', '8', '8', '', 'PJ-0000008', '8', '', '0000-00-00', '8', '8', '88'),
('R-0000004', 'R--8 8', '8', '8', '', '', '8', '8', '8', '8', '16', '', '', '8', '8', '', '', '8', '', '0000-00-00', '8', '8', '8');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id_repr`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
