-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-05-2022 a las 23:59:55
-- Versión del servidor: 5.7.38-cll-lve
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sumiticc_alquileres`
--

-- --------------------------------------------------------

--
-- Estructura para la vista `inquilinos`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`cpses_su5ciencjj`@`localhost` SQL SECURITY DEFINER VIEW `inquilinos`  AS SELECT `inquilino`.`id_inqu` AS `id_inqu`, `inquilino`.`cod_inqu` AS `cod_inqu`, concat(`inquilino`.`nom_inqu`,' ',`inquilino`.`ape_inqu`) AS `nombre`, `inquilino`.`ci_inqu` AS `id`, concat(`inquilino`.`loc_inqu`,' ',`inquilino`.`cel_inqu`) AS `tel_inqu`, `inquilino`.`cor_inqu` AS `cor_inqu`, 'Persona' AS `tipo` FROM `inquilino` ;

--
-- VIEW  `inquilinos`
-- Datos: Ninguna
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
