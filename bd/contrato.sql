-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2022 a las 14:47:21
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
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `cod_cont` varchar(10) NOT NULL COMMENT 'Codigo',
  `cod_inqu` varchar(10) NOT NULL COMMENT 'inquillino',
  `cod_inmu` varchar(10) NOT NULL COMMENT 'Inmueble',
  `can_cont` decimal(10,2) NOT NULL COMMENT 'cannpn de arrendaineto',
  `fec_desd` date NOT NULL COMMENT 'Inicio de contrato',
  `fec_hast` date NOT NULL COMMENT 'Fin de Contrato',
  `per_pror` varchar(12) NOT NULL COMMENT 'periono de prorroga',
  `dia_pago` int(11) NOT NULL COMMENT 'dia de pago',
  `pas_cont` date NOT NULL COMMENT 'a partir de',
  `ins_cont` int(11) NOT NULL COMMENT 'inspeccion de contrato',
  `fec_cont` date NOT NULL COMMENT 'fec contrato',
  `adm_inmu` decimal(10,2) NOT NULL COMMENT 'gastos admin',
  `pap_inmu` decimal(10,2) NOT NULL COMMENT 'gastos inmueble',
  `iva_inmu` decimal(10,2) NOT NULL COMMENT 'IVA',
  `imp_inmu` decimal(10,2) NOT NULL COMMENT 'ISLR',
  `dep_cont` decimal(10,2) NOT NULL COMMENT 'DEposito',
  `com_cont` decimal(10,2) NOT NULL COMMENT 'Comision',
  `hab_cont` varchar(15) NOT NULL COMMENT 'Derecho hab',
  `for_cont` varchar(15) NOT NULL COMMENT 'Forma pago',
  `por_rete` decimal(10,2) NOT NULL,
  `ret_cont` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
