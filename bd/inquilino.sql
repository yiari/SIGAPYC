-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-06-2022 a las 10:16:51
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
-- Estructura de tabla para la tabla `inquilino`
--

CREATE TABLE `inquilino` (
  `id_inqu` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id inquilino',
  `cod_inqu` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `nom_inqu` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre',
  `ape_inqu` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'apellido',
  `nac_inqu` varchar(1) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nacionalidad inquilino',
  `ci_inqu` varchar(12) COLLATE utf8_spanish_ci NOT NULL COMMENT 'cedula',
  `rif_inqu` varchar(12) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif inquilino',
  `loc_inqu` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel local inquilino',
  `cel_inqu` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel celular inquilino',
  `cor_inqu` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo inquilino',
  `est_inqu` int(11) NOT NULL COMMENT 'estado inquilino',
  `mun_inqu` int(11) NOT NULL COMMENT 'municipio inquilino',
  `par_inqu` int(11) NOT NULL COMMENT 'parroquia inquilino',
  `dir_inqu` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion inquilino',
  `ofi_inqu` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion de oficina',
  `tip_inqu` int(11) NOT NULL COMMENT 'tipo de inquilino'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inquilino`
--

INSERT INTO `inquilino` (`id_inqu`, `cod_inqu`, `nom_inqu`, `ape_inqu`, `nac_inqu`, `ci_inqu`, `rif_inqu`, `loc_inqu`, `cel_inqu`, `cor_inqu`, `est_inqu`, `mun_inqu`, `par_inqu`, `dir_inqu`, `ofi_inqu`, `tip_inqu`) VALUES
('I-00000001', 'I-13Maria  Lopez', 'Maria ', 'Lopez', 'V', '8909123', '121122121', '6678899', '1233123', 'adsasa@2222d', 18, 222, 222, 'calle 67', 'feliz', 1),
('I-00000003', 'I-18rtet ertrt', 'rtet', 'ertrt', 'V', '6566565', '', '', '', '', 0, 0, 0, '', '', 1),
('I-00000004', 'I-18retr ertr', 'retr', 'ertr', 'V', '4455453', '', '', '', '', 0, 0, 0, '', '', 1),
('I-00000005', 'I-10 Jose Quero', 'Jose', 'Quero', 'V', '454354', '45645', '+584145017681', '', '', 15, 0, 0, 'Cale 57', 'Cale 57', 1),
('I-00000006', 'I-10 Jose Gregorio Torres Quero', 'Jose Gregorio', 'Torres Quero', 'V', '22212', '2121', '2121', '2121', '', 14, 148, 148, 'Cale 57', 'Cale 57', 1),
('I-00000007', 'I-10 Jose Quero  tryrt', 'Jose', 'Quero  tryrt', 'V', '5454654', '', '+584145017681', '', '', 14, 0, 0, 'Cale 57', 'Cale 57', 1),
('I-00000008', 'I-10 Jose Gregorio Quero', 'Jose Gregorio', 'Quero', 'V', '123', '123', '04145017681', '123', '123', 15, 173, 173, 'Cale 57', 'Cale 57', 1),
('I-00000009', 'I-13 Magda ¨Perozo', 'Magda', '¨Perozo', '', '', '', '', '', '', 0, 0, 0, '', '', 1),
('I-00000010', 'I-13 mmmmmmmm mmmmmmmmm', 'mmmmmmmm', 'mmmmmmmmm', 'V', '2345677', '7898789', '04145017681', '7898798', 'dsadsadd', 14, 152, 152, 'Cale 57', 'Cale 57', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inquilino`
--
ALTER TABLE `inquilino`
  ADD PRIMARY KEY (`id_inqu`),
  ADD UNIQUE KEY `ci_inqu` (`ci_inqu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
