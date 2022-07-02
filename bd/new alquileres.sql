-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-05-2022 a las 07:48:12
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
-- Estructura de tabla para la tabla `apoderado`
--

CREATE TABLE `apoderado` (
  `id_apod` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id apoderado',
  `cod_apod` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `nom_apod` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre',
  `ape_apod` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'apellido',
  `nac_apod` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nacionalidad apoderado',
  `ci_apod` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'cedula',
  `rif_apod` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif apoderado',
  `loc_apod` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel local apoderado',
  `cel_apod` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel celular apoderado',
  `cor_apod` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo apoderado',
  `est_apod` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'estado apoderado',
  `mun_apod` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'municipio apoderado',
  `par_apod` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'parroquia apoderado',
  `dir_apod` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion apoderado',
  `ofi_apod` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion de oficina',
  `tip_apod` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de apoderado',
   id_prop varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'propietario',  
  `cod_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'codigo podder',
  `not_pode` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre registro',
  `fec_pode` date COLLATE utf8_spanish_ci NOT NULL COMMENT 'fecha registro',
  `num_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero poder',
  `tom_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tomo poder',
  `fol_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'expediente '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--representante (id_repr, cod_repr, nom_repr, ape_repr, nac_repr, ci_repr, rif_repr, loc_repr, cel_repr, cor_repr, est_repr, mun_repr, par_repr, dir_repr, ofi_repr, tip_repr, id_prop, cod_pode, not_pode, fec_pode, num_pode, tom_pode, fol_pode

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
   id_prop varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'propietario',  
  `cod_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'codigo podder',
  `not_regi` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre registro',
  `fec_regi` date COLLATE utf8_spanish_ci NOT NULL COMMENT 'fecha registro',
  `num_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero poder',
  `tom_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tomo poder',
  `fol_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'expediente '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `apoderado`
--

INSERT INTO `apoderado` (`id_apod`, `cod_apod`, `nom_apod`, `ape_apod`, `nac_apod`, `ci_apod`, `rif_apod`, `loc_apod`, `cel_apod`, `cor_apod`, `est_apod`, `mun_apod`, `par_apod`, `dir_apod`, `ofi_apod`, `tip_apod`) VALUES
('A-00000001', 'P-16-purodetentacion ', 'purodetentacion', '', '', '', '', '02515144895', '', '', '14', '', '', 'Calle Nueva', 'Calle Nueva', ''),
('A-00000002', 'A-15-o o', 'o', 'o', '000', '90', 'o', 'o', 'o', 'o', '1', '', '', 'o', 'o', ''),
('A-00000003', 'A-01-apoderado 3 apoderado ape', 'apoderado 3', 'apoderado ape', 'V', '909809', '908908', '098', '098', '098', '19', '234', '234', '809', '8', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoderado_juridico`
--

CREATE TABLE `apoderado_juridico` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nom_apoj` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre o razon social',
  `rif_apoj` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif juridico',
  `act_apoj` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'actividad comercial',
  `dir_apoj` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion fiscal',
  `tel_apoj` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cor_apoj` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cod_apoj` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `apoderado_juridico`
--

INSERT INTO `apoderado_juridico` (`id`, `nom_apoj`, `rif_apoj`, `act_apoj`, `dir_apoj`, `tel_apoj`, `cor_apoj`, `cod_apoj`) VALUES
('AJ-0000001', 'Jose Gregorio Torres Quero', 'i', '', 'i', '', '', 'AJ-10-Jose Gregorio Torres Quero'),
('AJ-0000002', 'Jose Gregorio Torres Quero', 'i22', '', 'i', '', '', 'AJ-10-Jose Gregorio Torres Quero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id dato',
  `num_cuen` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero de cuenta',
  `id_banc` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id banco'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`id_prop`, `num_cuen`, `id_banc`) VALUES
('', 'b', 'b'),
('1', '9879878978998', 'nuevo'),
('2', '10', '101011'),
('A-00000003', 'oio', 'ii'),
('P-00000001', 'A bbb', 'A'),
('P-00000012', '2', '1'),
('P-00000013', 'cuenta', 'banco'),
('P-00000014', 'CUENTA', 'NACIONAL'),
('P-00000015', 'cue', 'nac'),
('PJ-0000001', 'B', 'B'),
('PJ-0000003', '2', '1'),
('PJ-0000004', 'b', 'b'),
('PJ-0000005', 'b', 'b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco_extranjero`
--

CREATE TABLE `banco_extranjero` (
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ban_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'banco extranjero',
  `age_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'agencia',
  `dc_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'digito control',
  `cue_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'cuenta',
  `iba_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'iban',
  `bic_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'bic o swift'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banco_extranjero`
--

INSERT INTO `banco_extranjero` (`id_prop`, `ban_extr`, `age_extr`, `dc_extr`, `cue_extr`, `iba_extr`, `bic_extr`) VALUES
('', '1', '2', '3', '4', '5', '6'),
('PJ-0000003', '4', '5', '6', '7', '8', '9'),
('PJ-0000005', '1', '2', '3', '4', '5', '6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `id_bene` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id beneficiario',
  `cod_bene` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `nom_bene` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre',
  `ape_bene` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'apellido',
  `nac_bene` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nacionalidad beneficiario',
  `ci_bene` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'cedula',
  `rif_bene` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif beneficiario',
  `loc_bene` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel local beneficiario',
  `cel_bene` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel celular beneficiario',
  `cor_bene` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo beneficiario',
  `est_bene` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'estado beneficiario',
  `mun_bene` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'municipio beneficiario',
  `par_bene` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'parroquia beneficiario',
  `dir_bene` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion beneficiario',
  `ofi_bene` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion de oficina',
  `tip_bene` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de beneficiario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario_juridico`
--

CREATE TABLE `beneficiario_juridico` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_bene` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `nom_benj` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre o razon social',
  `rif_benj` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif juridico',
  `act_benj` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'actividad comercial',
  `dir_benj` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion fiscal',
  `tel_benj` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cor_benj` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `cod_cont` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Codigo',
  `cod_inqu` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'inquillino',
  `cod_inmu` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Inmueble',
  `can_cont` decimal(10,2) NOT NULL COMMENT 'cannpn de arrendaineto',
  `fec_desd` date NOT NULL COMMENT 'Inicio de contrato',
  `fec_hast` date NOT NULL COMMENT 'Fin de Contrato',
  `per_pror` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'periono de prorroga',
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
  `hab_cont` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Derecho hab',
  `for_cont` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Forma pago',
  `por_rete` decimal(10,2) NOT NULL,
  `ret_cont` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `doc_cont` longtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `act_cont` tinyint(4) NOT NULL COMMENT '1-Disponible 0-desactivado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`cod_cont`, `cod_inqu`, `cod_inmu`, `can_cont`, `fec_desd`, `fec_hast`, `per_pror`, `dia_pago`, `pas_cont`, `ins_cont`, `fec_cont`, `adm_inmu`, `pap_inmu`, `iva_inmu`, `imp_inmu`, `dep_cont`, `com_cont`, `hab_cont`, `for_cont`, `por_rete`, `ret_cont`, `doc_cont`, `act_cont`) VALUES
('C-00000013', 'I-00000001', 'I-00000001', '0.00', '0000-00-00', '0000-00-00', '', 0, '0000-00-00', 0, '0000-00-00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '0.00', '', '', 0),
('C-00000014', 'I-00000001', 'I-00000001', '0.00', '0000-00-00', '0000-00-00', '', 0, '0000-00-00', 0, '0000-00-00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '0.00', '', '', 0),
('C-00000015', 'I-00000001', 'I-00000001', '990890.00', '0000-00-00', '0000-00-00', '9', 9, '0000-00-00', 99, '0000-00-00', '9.00', '9.00', '9.00', '9.00', '9.00', '9.00', '9', '9', '9.00', '9', '', 0),
('C-00000016', 'I-00000001', 'I-00000001', '8.00', '0000-00-00', '0000-00-00', '98', 98, '0000-00-00', 89, '0000-00-00', '89.00', '89.00', '0.00', '89.00', '8989.00', '0.00', '89', '8989', '89.00', '', '', 0),
('C-00000017', 'I-00000001', 'I-00000001', '0.00', '0000-00-00', '0000-00-00', '', 0, '0000-00-00', 0, '0000-00-00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '0.00', '', '', 0),
('C-00000018', 'I-00000001', 'I-00000001', '4343.00', '2022-05-01', '2022-05-31', '34', 3, '0000-00-00', 34, '2022-06-08', '34.00', '34.00', '43.00', '34.00', '34.00', '34.00', '34', '34', '43.00', '34', '', 0),
('C-00000019', 'I-00000001', 'I-00000001', '8.00', '0008-01-08', '0008-01-08', '8', 8, '0000-00-00', 8, '0000-00-00', '8.00', '8.00', '8.00', '8.00', '8.00', '8.00', '8', '8', '8.00', '8', '', 0),
('C-00000020', 'I-00000001', 'I-00000001', '89.00', '0000-00-00', '0000-00-00', '98', 89, '0000-00-00', 89, '0089-09-08', '0.00', '8989.00', '89.00', '89.00', '89.00', '89.00', '89', '89', '89.00', '89', '', 0),
('C-00000021', 'I-00000001', 'I-00000001', '8998.00', '0008-08-09', '0008-08-08', '88', 88, '0000-00-00', 88, '0008-08-08', '8.00', '8.00', '8.00', '8.00', '8.00', '8.00', '8', '8', '8.00', '8', '', 0),
('C-00000022', 'I-00000001', 'I-00000001', '9.00', '0000-00-00', '0000-00-00', '9', 9, '0000-00-00', 9, '0000-00-00', '9.00', '9.00', '9.00', '9.00', '9.00', '9.00', '9', '9', '9.00', '9', '', 0),
('C-00000023', 'I-00000001', 'I-00000001', '200.00', '2022-05-01', '2023-05-01', '1', 3, '0000-00-00', 2, '2022-05-23', '2.00', '2.00', '2.00', '2.00', '2.00', '2.00', '2', '2', '2.00', '2', '', 0),
('C-00000024', '0', '', '0.00', '0000-00-00', '0000-00-00', '', 0, '0000-00-00', 0, '0000-00-00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '0.00', '', '', 0),
('C-00000025', '0', '', '0.00', '0000-00-00', '0000-00-00', '', 0, '0000-00-00', 0, '0000-00-00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '0.00', '', '', 0),
('C-00000026', 'I-00000001', 'I-00000001', '2.00', '0000-00-00', '0000-00-00', '8', 8, '0000-00-00', 88, '0000-00-00', '8.00', '8.00', '8.00', '8.00', '8.00', '8.00', '8', '88', '8.00', '8', '', 0),
('C-00000027', 'I-00000001', 'I-00000001', '8.00', '0000-00-00', '0000-00-00', '8', 8, '0000-00-00', 8, '0000-00-00', '8.00', '8.00', '8.00', '8.00', '8.00', '8.00', '8', '8', '8.00', '8', '', 0),
('C-00000028', 'I-00000001', 'I-00000001', '8.00', '0000-00-00', '0000-00-00', '8', 8, '0000-00-00', 8, '0000-00-00', '8.00', '8.00', '8.00', '8.00', '8.00', '8.00', '8', '8', '8.00', '8', '', 0),
('C-00000029', 'I-00000005', 'I-00000001', '54343.00', '2022-05-19', '2022-05-26', '5', 4, '0000-00-00', 2, '2022-05-26', '2.00', '2.00', '2.00', '2.00', '2.00', '2.00', '2', '2', '2.00', '2', '', 0),
('C-00000030', 'I-00000006', 'I-00000001', '9.00', '0000-00-00', '0000-00-00', '9', 9, '0000-00-00', 9, '0000-00-00', '9.00', '9.00', '9.00', '9.00', '9.00', '9.00', '9', '9', '9.00', '9', '', 0),
('C-00000031', 'I-00000001', 'I-00000004', '0.00', '0000-00-00', '0000-00-00', '', 0, '0000-00-00', 0, '0000-00-00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '', '', '0.00', '', '', 0),
('C-00000032', 'I-00000001', 'I-00000004', '8.00', '0000-00-00', '0000-00-00', '8', 8, '0000-00-00', 8, '0000-00-00', '8.00', '8.00', '8.00', '8.00', '8.00', '8.00', '8', '8', '8.00', '8', '', 0),
('C-00000033', 'I-00000006', 'I-00000004', '8.00', '0000-00-00', '0000-00-00', '8', 8, '0000-00-00', 8, '0000-00-00', '8.00', '8.00', '8.00', '8.00', '8.00', '8.00', '8', '8', '8.00', '8', '', 0),
('C-00000034', 'I-00000005', 'I-00000003', '1233.00', '2022-05-01', '2023-05-31', '2', 2, '0000-00-00', 2, '2022-05-31', '1.00', '2.00', '2.00', '2.00', '2.00', '2.00', '2', '2', '2.00', '2', '', 0),
('C-00000035', 'I-00000001', 'I-00000003', '12.00', '0000-00-00', '0000-00-00', '12', 12, '0000-00-00', 12, '0000-00-00', '12.00', '12.00', '12.00', '12.00', '12.00', '12.00', '12', '12', '12.00', '12', '', 0),
('C-00000036', 'I-00000001', 'I-00000001', '2123.00', '2022-05-01', '2023-05-31', '12', 12, '0000-00-00', 12, '2022-05-25', '1.00', '2.00', '2.00', '2.00', '2.00', '22.00', '2', '2', '2.00', '2', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_bancarios`
--

CREATE TABLE `datos_bancarios` (
  `id_dato` int(10) NOT NULL COMMENT 'id del propietario',
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id propietario',
  `tip_pago` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de pago'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `id_pers` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tip_docu` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `rut_docu` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `id_pers`, `tip_docu`, `rut_docu`) VALUES
(1, 'P-00000008', 'ced_docu', 'archivos/ced_P-00000008.'),
(2, 'P-00000008', 'rif_docu', 'archivos/rif_P-00000008.'),
(3, 'P-00000008', 'ref_docu1', 'archivos/Rp1_P-00000008.'),
(4, 'P-00000008', 'ref_docu2', 'archivos/Rp2_P-00000008.'),
(5, 'P-00000008', 'fam_docu1', 'archivos/Rf1_P-00000008.'),
(6, 'P-00000009', 'ced_docu', 'archivos/ced_P-00000009.'),
(7, 'P-00000009', 'rif_docu', 'archivos/rif_P-00000009.'),
(8, 'P-00000009', 'ref_docu1', 'archivos/Rp1_P-00000009.'),
(9, 'P-00000009', 'ref_docu2', 'archivos/Rp2_P-00000009.'),
(10, 'P-00000009', 'fam_docu1', 'archivos/Rf1_P-00000009.'),
(11, 'P-00000010', 'ced_docu', 'archivos/ced_P-00000010.'),
(12, 'P-00000010', 'rif_docu', 'archivos/rif_P-00000010.'),
(13, 'P-00000010', 'ref_docu1', 'archivos/Rp1_P-00000010.'),
(14, 'P-00000010', 'ref_docu2', 'archivos/Rp2_P-00000010.'),
(15, 'P-00000010', 'fam_docu1', 'archivos/Rf1_P-00000010.'),
(16, 'P-00000011', 'ced_docu', 'archivos/ced_P-00000011.'),
(17, 'P-00000011', 'rif_docu', 'archivos/rif_P-00000011.'),
(18, 'P-00000011', 'ref_docu1', 'archivos/Rp1_P-00000011.'),
(19, 'P-00000011', 'ref_docu2', 'archivos/Rp2_P-00000011.'),
(20, 'P-00000011', 'fam_docu1', 'archivos/Rf1_P-00000011.'),
(21, 'P-00000011', 'fam_docu2', 'archivos/Rf2_P-00000011.'),
(22, 'P-00000012', 'ced_docu', 'archivos/ced_P-00000012.'),
(23, 'P-00000012', 'rif_docu', 'archivos/rif_P-00000012.'),
(24, 'P-00000012', 'ref_docu1', 'archivos/Rp1_P-00000012.'),
(25, 'P-00000012', 'ref_docu2', 'archivos/Rp2_P-00000012.'),
(26, 'P-00000012', 'fam_docu1', 'archivos/Rf1_P-00000012.'),
(27, 'P-00000012', 'fam_docu2', 'archivos/Rf2_P-00000012.'),
(28, 'PJ-0000003', 'reg_merc', 'archivos/Registro_PJ-0000003.'),
(29, 'PJ-0000003', 'rif_docj', 'archivos/rif_PJ-0000003.'),
(30, 'PJ-0000003', 'ref_docj1', 'archivos/Rpj1_PJ-0000003.'),
(31, 'PJ-0000003', 'ref_docj2', 'archivos/Rpj2_PJ-0000003.'),
(32, 'PJ-0000003', 'act_cons', 'archivos/ActaC_PJ-0000003.'),
(33, 'PJ-0000003', 'act_asam', 'archivos/ActaA_PJ-0000003.'),
(34, 'PJ-0000005', 'reg_merc', 'archivos/Registro_PJ-0000005.'),
(35, 'PJ-0000005', 'fam_docj1', 'archivos/Rfj1_PJ-0000005.'),
(36, 'PJ-0000005', 'fam_docj2', 'archivos/Rfj2_PJ-0000005.'),
(37, 'PJ-0000005', 'act_cons', 'archivos/ActaC_PJ-0000005.'),
(38, '', 'ced_docu', 'archivos/ced_.'),
(39, '', 'rif_docu', 'archivos/rif_.'),
(40, '', 'ref_docu1', 'archivos/Rp1_.'),
(41, '', 'ref_docu2', 'archivos/Rp2_.'),
(42, '', 'rif_docj', 'archivos/rif_.'),
(43, '', 'rif_docj', 'archivos/rif_.'),
(44, '', 'ref_docj1', 'archivos/Rpj1_.'),
(45, '', 'ref_docj2', 'archivos/Rpj2_.'),
(46, '', 'act_asam', 'archivos/ActaA_.'),
(47, '', 'ref_docj1', 'archivos/Rpj1_.'),
(48, '', 'reg_merc', 'archivos/Registro_.'),
(49, 'PJ-0000004', 'reg_merc', 'archivos/Registro_PJ-0000004.'),
(50, 'PJ-0000004', 'ref_docj2', 'archivos/Rpj2_PJ-0000004.'),
(51, 'PJ-0000004', 'fam_docj2', 'archivos/Rfj2_PJ-0000004.'),
(52, 'PJ-0000004', 'act_asam', 'archivos/ActaA_PJ-0000004.'),
(53, 'I-00000001', 'doc_inmu', 'archivos/doc_inmu_I-00000001.'),
(54, 'I-00000001', 'aut_inmu', 'archivos/aut_inmu_I-00000001.'),
(55, 'P-00000001', 'ced_docu', 'archivos/ced_P-00000001.'),
(56, 'P-00000001', 'rif_docu', 'archivos/rif_P-00000001.'),
(57, 'P-00000001', 'ref_docu1', 'archivos/Rp1_P-00000001.'),
(58, 'P-00000001', 'ref_docu2', 'archivos/Rp2_P-00000001.'),
(59, 'P-00000001', 'fam_docu1', 'archivos/Rf1_P-00000001.'),
(60, 'P-00000001', 'fam_docu2', 'archivos/Rf2_P-00000001.'),
(61, 'PJ-0000001', 'reg_merc', 'archivos/Registro_PJ-0000001.'),
(62, 'PJ-0000001', 'rif_docj', 'archivos/rif_PJ-0000001.'),
(63, 'PJ-0000001', 'act_cons', 'archivos/ActaC_PJ-0000001.'),
(64, 'PJ-0000001', 'act_asam', 'archivos/ActaA_PJ-0000001.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docu_inmuebles`
--

CREATE TABLE `docu_inmuebles` (
  `id` int(10) NOT NULL,
  `cod_inmu` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'codigo del inmueble',
  `fic_inmu` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'ficha catastral',
  `pro_inmu` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'documento de propiedad',
  `fre_inmu` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'planilla derecho de frente',
  `ser_inmu1` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Servicios 1',
  `ser_inmu2` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Servicios 2',
  `ser_inmu3` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Servicios 3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `ID` int(10) NOT NULL,
  `nom_esta` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_esta` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`ID`, `nom_esta`, `id_esta`) VALUES
(1, 'Amazonas', '1'),
(2, 'Anzoátegui', '2'),
(3, 'Apure', '3'),
(4, 'Aragua', '4'),
(5, 'Barinas', '5'),
(6, 'Bolívar', '6'),
(7, 'Carabobo', '7'),
(8, 'Cojedes', '8'),
(9, 'Caracas', '9'),
(10, 'Delta Amacuro', '10'),
(11, 'Falcón', '11'),
(12, 'Guárico', '12'),
(13, 'La Guaira', '13'),
(14, 'Lara', '14'),
(15, 'Mérida', '15'),
(16, 'Miranda', '16'),
(17, 'Monagas', '17'),
(18, 'Nueva Esparta', '18'),
(19, 'Portuguesa', '19'),
(20, 'Sucre', '20'),
(21, 'Táchira', '21'),
(22, 'Trujillo', '22'),
(23, 'Yaracuy', '23'),
(24, 'Zulia', '24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `id_inmu` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'codigo del inmueble',
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id del propietario',
  `por_part` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'porc de participacion',
  `tip_inmu` varchar(2) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de inmueble',
  `act_inmu` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Actividad comercial',
  `ant_inmu` varchar(5) COLLATE utf8_spanish_ci NOT NULL COMMENT 'antiguedad',
  `img_inmu` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'imagen del inmueble',
  `cod_esta` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'estado',
  `cod_muni` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'municipio',
  `cod_parr` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'parroquia',
  `dir_inmu` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion',
  `pun_inmu` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'punto de referencia',
  `mtr_inmu` decimal(8,2) NOT NULL COMMENT 'metros del terreno',
  `mtr_cons` decimal(8,2) NOT NULL COMMENT 'metros de construccion',
  `hab_inmu` int(5) NOT NULL COMMENT 'nro de habitaciones',
  `ban_inmu` int(5) NOT NULL COMMENT 'nro de baños',
  `est_inmu` int(5) NOT NULL COMMENT 'estacionamiento',
  `ser_inmu` int(5) NOT NULL COMMENT 'mtrs servidumbre de paso',
  `sta_inmu` int(11) NOT NULL DEFAULT '1' COMMENT '1-Disponible 0-desactivado 2-Alquilado ',
  `let_inmu` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `lim_nort` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `lim_sur` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `lim_este` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `lim_oest` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `nom_regi` varchar(75) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Registro',
  `fec_regi` date NOT NULL COMMENT 'fecha registro',
  `tom_regi` varchar(5) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tomo registro',
  `fol_regi` varchar(5) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Folio',
  `asi_regi` varchar(5) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Asiento',
  `fic_cata` varchar(75) COLLATE utf8_spanish_ci NOT NULL COMMENT 'ficha catastral',
  `num_regi` varchar(5) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero de ',
  `nom_inmu` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `uso_inmu` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`id_inmu`, `id_prop`, `por_part`, `tip_inmu`, `act_inmu`, `ant_inmu`, `img_inmu`, `cod_esta`, `cod_muni`, `cod_parr`, `dir_inmu`, `pun_inmu`, `mtr_inmu`, `mtr_cons`, `hab_inmu`, `ban_inmu`, `est_inmu`, `ser_inmu`, `sta_inmu`, `let_inmu`, `lim_nort`, `lim_sur`, `lim_este`, `lim_oest`, `nom_regi`, `fec_regi`, `tom_regi`, `fol_regi`, `asi_regi`, `fic_cata`, `num_regi`, `nom_inmu`, `uso_inmu`) VALUES
('I-00000001', 'P-00000001', '12', 'LC', 'Comercial', '11', 'archivos/foto_I-00000001.jpg', '01', '88', '22', 'Cale 57', 'frente ', '12.00', '0.00', 12, 2, 2, 12, 2, 'AVA-69', 'Rita Colmenarez', 'Deyanira López', 'Pedro Gomez', 'Calle 57A que es su frente', 'Registro primero', '2016-10-12', '3', '56', '56', 'A9998.09099-99999', '45', '', ''),
('I-00000002', 'P-00000001', '1', 'AP', 'Vivienda', '1', 'archivos/foto_I-00000002.jpg', '1', '', '', 'Cale 57', '12', '0.00', '0.00', 0, 0, 0, 0, 1, '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('I-00000003', 'P-00000001', '', 'CA', '', '1', 'archivos/foto_I-00000003.jpg', '', '', '', '', '', '0.00', '0.00', 0, 0, 0, 0, 2, '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('I-00000004', 'PJ-0000001', '', 'ED', '', '', 'archivos/foto_I-00000004.jpg', '', '', '', '', '', '0.00', '0.00', 0, 0, 0, 0, 2, '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `inq`
-- (See below for the actual view)
--
CREATE TABLE `inq` (
`id` varchar(10)
,`cod_inqu` varchar(76)
,`nom_inqj` varchar(40)
,`rif_inqj` varchar(15)
,`act_inqj` varchar(35)
,`dir_inqj` varchar(50)
,`tel_inqj` varchar(15)
,`cor_inqj` varchar(80)
);

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
('I-00000007', 'I-10 Jose Quero  tryrt', 'Jose', 'Quero  tryrt', 'V', '5454654', '', '+584145017681', '', '', 14, 0, 0, 'Cale 57', 'Cale 57', 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_muni` int(10) NOT NULL,
  `nom_muni` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_esta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_muni`, `nom_muni`, `id_esta`) VALUES
(1, 'Alto Orinoco', 1),
(2, 'Atabapo', 1),
(3, 'Atures', 1),
(4, 'Autana', 1),
(5, 'Manapiare', 1),
(6, 'Maroa', 1),
(7, 'Río Negro', 1),
(8, 'Anaco', 2),
(9, 'Aragua', 2),
(10, 'Manuel Ezequiel Bruzual', 2),
(11, 'Diego Bautista Urbaneja', 2),
(12, 'Peñalver', 2),
(13, 'Francisco del Carmen Carvajal', 2),
(14, 'General Sir Arthur McGregor', 2),
(15, 'Guanta', 2),
(16, 'Independencia', 2),
(17, 'José Gregorio Monagas', 2),
(18, 'Juan Antonio Sotillo', 2),
(19, 'Juan Manuel Cajigal', 2),
(20, 'Libertad', 2),
(21, 'Miranda', 2),
(22, 'Pedro María Freites', 2),
(23, 'Píritu', 2),
(24, 'Guanipa', 2),
(25, 'San Juan de Capistrano', 2),
(26, 'Santa Ana', 2),
(27, 'Simón Bolívar', 2),
(28, 'Simón Rodríguez', 2),
(29, 'Achaguas', 3),
(30, 'Biruaca', 3),
(31, 'Muñoz', 3),
(32, 'Páez', 3),
(33, 'Pedro Camejo', 3),
(34, 'Rómulo Gallegos', 3),
(35, 'San Fernando', 3),
(36, 'Atanasio Girardot', 4),
(37, 'Bolívar', 4),
(38, 'Camatagua', 4),
(39, 'Francisco Linares Alcántara', 4),
(40, 'José Ángel Lamas', 4),
(41, 'José Félix Ribas', 4),
(42, 'José Rafael Revenga', 4),
(43, 'Libertador', 4),
(44, 'Mario Briceño Iragorry', 4),
(45, 'Ocumare de la Costa de Oro', 4),
(46, 'San Casimiro', 4),
(47, 'San Sebastián', 4),
(48, 'Santiago Mariño', 4),
(49, 'Santos Michelena', 4),
(50, 'Sucre', 4),
(51, 'Tovar', 4),
(52, 'Urdaneta', 4),
(53, 'Zamora', 4),
(54, 'Alberto Arvelo Torrealba', 5),
(55, 'Andrés Eloy Blanco', 5),
(56, 'Antonio José de Sucre', 5),
(57, 'Arismendi', 5),
(58, 'Barinas', 5),
(59, 'Bolívar', 5),
(60, 'Cruz Paredes', 5),
(61, 'Ezequiel Zamora', 5),
(62, 'Obispos', 5),
(63, 'Pedraza', 5),
(64, 'Rojas', 5),
(65, 'Sosa', 5),
(66, 'Caroní', 6),
(67, 'Cedeño', 6),
(68, 'El Callao', 6),
(69, 'Gran Sabana', 6),
(70, 'Heres', 6),
(71, 'Piar', 6),
(72, 'Angostura (antes Raúl Leoni)', 6),
(73, 'Roscio', 6),
(74, 'Sifontes', 6),
(75, 'Sucre', 6),
(76, 'Padre Pedro Chien', 6),
(77, 'Bejuma', 7),
(78, 'Carlos Arvelo', 7),
(79, 'Diego Ibarra', 7),
(80, 'Guacara', 7),
(81, 'Juan José Mora', 7),
(82, 'Libertador', 7),
(83, 'Los Guayos', 7),
(84, 'Miranda', 7),
(85, 'Montalbán', 7),
(86, 'Naguanagua', 7),
(87, 'Puerto Cabello', 7),
(88, 'San Diego', 7),
(89, 'San Joaquín', 7),
(90, 'Valencia', 7),
(91, 'Anzoátegui', 8),
(92, 'Tinaquillo', 8),
(93, 'Girardot', 8),
(94, 'Lima Blanco', 8),
(95, 'Pao de San Juan Bautista', 8),
(96, 'Ricaurte', 8),
(97, 'Rómulo Gallegos', 8),
(98, 'Ezequiel Zamora', 8),
(99, 'Tinaco', 8),
(100, 'Libertador', 9),
(101, 'Antonio Díaz', 10),
(102, 'Casacoima', 10),
(103, 'Pedernales', 10),
(104, 'Tucupita', 10),
(105, 'Acosta', 11),
(106, 'Bolívar', 11),
(107, 'Buchivacoa', 11),
(108, 'Cacique Manaure', 11),
(109, 'Carirubana', 11),
(110, 'Colina', 11),
(111, 'Dabajuro', 11),
(112, 'Democracia', 11),
(113, 'Falcón', 11),
(114, 'Federación', 11),
(115, 'Jacura', 11),
(116, 'José Laurencio Silva', 11),
(117, 'Los Taques', 11),
(118, 'Mauroa', 11),
(119, 'Miranda', 11),
(120, 'Monseñor Iturriza', 11),
(121, 'Palmasola', 11),
(122, 'Petit', 11),
(123, 'Píritu', 11),
(124, 'San Francisco', 11),
(125, 'Sucre', 11),
(126, 'Tocópero', 11),
(127, 'Unión', 11),
(128, 'Urumaco', 11),
(129, 'Zamora', 11),
(130, 'Camaguán', 12),
(131, 'Chaguaramas', 12),
(132, 'El Socorro', 12),
(133, 'José Félix Ribas', 12),
(134, 'José Tadeo Monagas', 12),
(135, 'Juan Germán Roscio', 12),
(136, 'Julián Mellado', 12),
(137, 'Las Mercedes', 12),
(138, 'Leonardo Infante', 12),
(139, 'Pedro Zaraza', 12),
(140, 'Ortiz', 12),
(141, 'San Gerónimo de Guayabal', 12),
(142, 'San José de Guaribe', 12),
(143, 'Santa María de Ipire', 12),
(144, 'Sebastián Francisco de Miranda', 12),
(145, 'Vargas', 13),
(146, 'Andrés Eloy Blanco', 14),
(147, 'Crespo', 14),
(148, 'Iribarren', 14),
(149, 'Jiménez', 14),
(150, 'Morán', 14),
(151, 'Palavecino', 14),
(152, 'Simón Planas', 14),
(153, 'Torres', 14),
(154, 'Urdaneta', 14),
(155, 'Alberto Adriani', 15),
(156, 'Andrés Bello', 15),
(157, 'Antonio Pinto Salinas', 15),
(158, 'Aricagua', 15),
(159, 'Arzobispo Chacón', 15),
(160, 'Campo Elías', 15),
(161, 'Caracciolo Parra Olmedo', 15),
(162, 'Cardenal Quintero', 15),
(163, 'Guaraque', 15),
(164, 'Julio César Salas', 15),
(165, 'Justo Briceño', 15),
(166, 'Libertador', 15),
(167, 'Miranda', 15),
(168, 'Obispo Ramos de Lora', 15),
(169, 'Padre Noguera', 15),
(170, 'Pueblo Llano', 15),
(171, 'Rangel', 15),
(172, 'Rivas Dávila', 15),
(173, 'Santos Marquina', 15),
(174, 'Sucre', 15),
(175, 'Tovar', 15),
(176, 'Tulio Febres Cordero', 15),
(177, 'Zea', 15),
(178, 'Acevedo', 16),
(179, 'Andrés Bello', 16),
(180, 'Baruta', 16),
(181, 'Brión', 16),
(182, 'Buroz', 16),
(183, 'Carrizal', 16),
(184, 'Chacao', 16),
(185, 'Cristóbal Rojas', 16),
(186, 'El Hatillo', 16),
(187, 'Guaicaipuro', 16),
(188, 'Independencia', 16),
(189, 'Lander', 16),
(190, 'Los Salias', 16),
(191, 'Páez', 16),
(192, 'Paz Castillo', 16),
(193, 'Pedro Gual', 16),
(194, 'Plaza', 16),
(195, 'Simón Bolívar', 16),
(196, 'Sucre', 16),
(197, 'Urdaneta', 16),
(198, 'Zamora', 16),
(199, 'Acosta', 17),
(200, 'Aguasay', 17),
(201, 'Bolívar', 17),
(202, 'Caripe', 17),
(203, 'Cedeño', 17),
(204, 'Ezequiel Zamora', 17),
(205, 'Libertador', 17),
(206, 'Maturín', 17),
(207, 'Piar', 17),
(208, 'Punceres', 17),
(209, 'Santa Bárbara', 17),
(210, 'Sotillo', 17),
(211, 'Uracoa', 17),
(212, 'Antolín del Campo', 18),
(213, 'Arismendi', 18),
(214, 'Díaz', 18),
(215, 'García', 18),
(216, 'Gómez', 18),
(217, 'Maneiro', 18),
(218, 'Marcano', 18),
(219, 'Mariño', 18),
(220, 'Península de Macanao', 18),
(221, 'Tubores', 18),
(222, 'Villalba', 18),
(223, 'Agua Blanca', 19),
(224, 'Araure', 19),
(225, 'Esteller', 19),
(226, 'Guanare', 19),
(227, 'Guanarito', 19),
(228, 'Monseñor José Vicente de Unda', 19),
(229, 'Ospino', 19),
(230, 'Páez', 19),
(231, 'Papelón', 19),
(232, 'San Genaro de Boconoíto', 19),
(233, 'San Rafael de Onoto', 19),
(234, 'Santa Rosalía', 19),
(235, 'Sucre', 19),
(236, 'Turén', 19),
(237, 'Andrés Eloy Blanco', 20),
(238, 'Andrés Mata', 20),
(239, 'Arismendi', 20),
(240, 'Benítez', 20),
(241, 'Bermúdez', 20),
(242, 'Bolívar', 20),
(243, 'Cajigal', 20),
(244, 'Cruz Salmerón Acosta', 20),
(245, 'Libertador', 20),
(246, 'Mariño', 20),
(247, 'Mejía', 20),
(248, 'Montes', 20),
(249, 'Ribero', 20),
(250, 'Sucre', 20),
(251, 'Valdez', 20),
(252, 'Andrés Bello', 21),
(253, 'Antonio Rómulo Costa', 21),
(254, 'Ayacucho', 21),
(255, 'Bolívar', 21),
(256, 'Cárdenas', 21),
(257, 'Córdoba', 21),
(258, 'Fernández Feo', 21),
(259, 'Francisco de Miranda', 21),
(260, 'García de Hevia', 21),
(261, 'Guásimos', 21),
(262, 'Independencia', 21),
(263, 'Jáuregui', 21),
(264, 'José María Vargas', 21),
(265, 'Junín', 21),
(266, 'Libertad', 21),
(267, 'Libertador', 21),
(268, 'Lobatera', 21),
(269, 'Michelena', 21),
(270, 'Panamericano', 21),
(271, 'Pedro María Ureña', 21),
(272, 'Rafael Urdaneta', 21),
(273, 'Samuel Darío Maldonado', 21),
(274, 'San Cristóbal', 21),
(275, 'Seboruco', 21),
(276, 'Simón Rodríguez', 21),
(277, 'Sucre', 21),
(278, 'Torbes', 21),
(279, 'Uribante', 21),
(280, 'San Judas Tadeo', 21),
(281, 'Andrés Bello', 22),
(282, 'Boconó', 22),
(283, 'Bolívar', 22),
(284, 'Candelaria', 22),
(285, 'Carache', 22),
(286, 'Escuque', 22),
(287, 'José Felipe Márquez Cañizales', 22),
(288, 'Juan Vicente Campos Elías', 22),
(289, 'La Ceiba', 22),
(290, 'Miranda', 22),
(291, 'Monte Carmelo', 22),
(292, 'Motatán', 22),
(293, 'Pampán', 22),
(294, 'Pampanito', 22),
(295, 'Rafael Rangel', 22),
(296, 'San Rafael de Carvajal', 22),
(297, 'Sucre', 22),
(298, 'Trujillo', 22),
(299, 'Urdaneta', 22),
(300, 'Valera', 22),
(301, 'Arístides Bastidas', 23),
(302, 'Bolívar', 23),
(303, 'Bruzual', 23),
(304, 'Cocorote', 23),
(305, 'Independencia', 23),
(306, 'José Antonio Páez', 23),
(307, 'La Trinidad', 23),
(308, 'Manuel Monge', 23),
(309, 'Nirgua', 23),
(310, 'Peña', 23),
(311, 'San Felipe', 23),
(312, 'Sucre', 23),
(313, 'Urachiche', 23),
(314, 'Veroes', 23),
(315, 'Almirante Padilla', 24),
(316, 'Baralt', 24),
(317, 'Bolívar', 24),
(318, 'Cabimas', 24),
(319, 'Catatumbo', 24),
(320, 'Colón', 24),
(321, 'Francisco Javier Pulgar', 24),
(322, 'Guajira', 24),
(323, 'Jesús Enrique Losada', 24),
(324, 'Jesús María Semprún', 24),
(325, 'La Cañada de Urdaneta', 24),
(326, 'Lagunillas', 24),
(327, 'Machiques de Perijá', 24),
(328, 'Mara', 24),
(329, 'Maracaibo', 24),
(330, 'Miranda', 24),
(331, 'Rosario de Perijá', 24),
(332, 'San Francisco', 24),
(333, 'Santa Rita', 24),
(334, 'Sucre', 24),
(335, 'Valmore Rodríguez', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_movil`
--

CREATE TABLE `pago_movil` (
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ced_pmov` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'cedula pago movil',
  `ban_pmov` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'banco pago movil',
  `cel_pmov` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'celular pago movil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago_movil`
--

INSERT INTO `pago_movil` (`id_prop`, `ced_pmov`, `ban_pmov`, `cel_pmov`) VALUES
('', 'b', '', 'b'),
('A-00000003', 'iou', 'io', 'io'),
('P-00000013', 'pmc', 'pmb', 'pmcel'),
('P-00000014', 'CP', 'BP', 'CELP'),
('P-00000015', 'om1', 'pm2', 'pm3'),
('PJ-0000001', 'B', 'B', 'B'),
('PJ-0000003', '11', '12', '13'),
('PJ-0000004', 'b', 'b', 'b'),
('PJ-0000005', 'b', '', 'b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `id_parr` int(10) NOT NULL,
  `nom_parr` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_muni` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id_parr`, `nom_parr`, `id_muni`) VALUES
(1, 'La Esmeralda', 1),
(2, 'San Fernando de Atabapo', 2),
(3, 'Puerto Ayacucho', 3),
(4, 'Isla Ratón', 4),
(5, 'San Juan de Manapiare', 5),
(6, 'Maroa', 6),
(7, 'San Carlos de Río Negro', 7),
(8, 'Anaco', 8),
(9, 'Aragua de Barcelona', 9),
(10, 'Clarines', 10),
(11, 'Lechería', 11),
(12, 'Puerto Píritu', 12),
(13, 'Valle de Guanape', 13),
(14, 'El Chaparro', 14),
(15, 'Guanta', 15),
(16, 'Soledad', 16),
(17, 'Mapire', 17),
(18, 'Puerto La Cruz', 18),
(19, 'Onoto', 19),
(20, 'San Mateo', 20),
(21, 'Pariaguán', 21),
(22, 'Cantaura', 22),
(23, 'Píritu', 23),
(24, 'San José de Guanipa', 24),
(25, 'Boca de Uchire', 25),
(26, 'Santa Ana', 26),
(27, 'Barcelona', 27),
(28, 'El Tigre', 28),
(29, 'Achaguas', 29),
(30, 'Biruaca', 30),
(31, 'Bruzual', 31),
(32, 'Guasdualito', 32),
(33, 'San Juan de Payara', 33),
(34, 'Elorza', 34),
(35, 'San Fernando de Apure', 35),
(36, 'Maracay', 36),
(37, 'San Mateo', 37),
(38, 'Camatagua', 38),
(39, 'Santa Rita', 39),
(40, 'Santa Cruz de Aragua', 40),
(41, 'La Victoria', 41),
(42, 'El Consejo', 42),
(43, 'Palo Negro', 43),
(44, 'El Limón', 44),
(45, 'Ocumare de la Costa', 45),
(46, 'San Casimiro', 46),
(47, 'San Sebastián de Los Reyes', 47),
(48, 'Turmero', 48),
(49, 'Las Tejerías', 49),
(50, 'Cagua', 50),
(51, 'Colonia Tovar', 51),
(52, 'Barbacoas', 52),
(53, 'Villa de Cura', 53),
(54, 'Sabaneta', 54),
(55, 'El Cantón', 55),
(56, 'Socopó', 56),
(57, 'Arismendi', 57),
(58, 'Barinas', 58),
(59, 'Barinitas', 59),
(60, 'Barrancas', 60),
(61, 'Santa Bárbara', 61),
(62, 'Obispos', 62),
(63, 'Ciudad Bolivia', 63),
(64, 'Libertad', 64),
(65, 'Ciudad de Nutrias', 65),
(66, 'Ciudad Guayana', 66),
(67, 'Caicara del Orinoco', 67),
(68, 'El Callao', 68),
(69, 'Santa Elena de Uairén', 69),
(70, 'Ciudad Bolívar', 70),
(71, 'Upata', 71),
(72, 'Ciudad Piar', 72),
(73, 'Guasipati', 73),
(74, 'El Dorado', 74),
(75, 'Maripa', 75),
(76, 'El Palmar', 76),
(77, 'Bejuma', 77),
(78, 'Güigüe', 78),
(79, 'Mariara', 79),
(80, 'Guacara', 80),
(81, 'Morón', 81),
(82, 'Tocuyito', 82),
(83, 'Los Guayos', 83),
(84, 'Miranda', 84),
(85, 'Montalbán', 85),
(86, 'Naguanagua', 86),
(87, 'Puerto Cabello', 87),
(88, 'San Diego', 88),
(89, 'San Joaquín', 89),
(90, 'Valencia', 90),
(91, 'Cojedes', 91),
(92, 'Tinaquillo', 92),
(93, 'El Baúl', 93),
(94, 'Macapo', 94),
(95, 'El Pao', 95),
(96, 'Libertad', 96),
(97, 'Las Vegas', 97),
(98, 'San Carlos', 98),
(99, 'Tinaco', 99),
(100, 'Caracas', 100),
(101, 'Curiapo', 101),
(102, 'Sierra Imataca', 102),
(103, 'Pedernales', 103),
(104, 'Tucupita', 104),
(105, 'San Juan de los Cayos', 105),
(106, 'San Luis', 106),
(107, 'Capatárida', 107),
(108, 'Yaracal', 108),
(109, 'Punto Fijo', 109),
(110, 'La Vela de Coro', 110),
(111, 'Dabajuro', 111),
(112, 'Pedregal', 112),
(113, 'Pueblo Nuevo', 113),
(114, 'Churuguara', 114),
(115, 'Jacura', 115),
(116, 'Tucacas', 116),
(117, 'Santa Cruz de Los Taques', 117),
(118, 'Mene de Mauroa', 118),
(119, 'Santa Ana de Coro', 119),
(120, 'Chichiriviche', 120),
(121, 'Palmasola', 121),
(122, 'Cabure', 122),
(123, 'Píritu', 123),
(124, 'Mirimire', 124),
(125, 'La Cruz de Taratara', 125),
(126, 'Tocópero', 126),
(127, 'Santa Cruz de Bucaral', 127),
(128, 'Urumaco', 128),
(129, 'Puerto Cumarebo', 129),
(130, 'Camaguán', 130),
(131, 'Chaguaramas', 131),
(132, 'El Socorro', 132),
(133, 'Tucupido', 133),
(134, 'Altagracia de Orituco', 134),
(135, 'San Juan de los Morros', 135),
(136, 'El Sombrero', 136),
(137, 'Las Mercedes', 137),
(138, 'Valle de La Pascua', 138),
(139, 'Zaraza', 139),
(140, 'Ortiz', 140),
(141, 'Guayabal', 141),
(142, 'San José de Guaribe', 142),
(143, 'Santa María de Ipire', 143),
(144, 'Calabozo', 144),
(145, 'La Guaira', 145),
(146, 'Sanare', 146),
(147, 'Duaca', 147),
(148, 'Barquisimeto', 148),
(149, 'Quibor', 149),
(150, 'El Tocuyo', 150),
(151, 'Cabudare', 151),
(152, 'Sarare', 152),
(153, 'Carora', 153),
(154, 'Siquisique', 154),
(155, 'El Vigía', 155),
(156, 'La Azulita', 156),
(157, 'Santa Cruz de Mora', 157),
(158, 'Aricagua', 158),
(159, 'Canaguá', 159),
(160, 'Ejido', 160),
(161, 'Tucaní', 161),
(162, 'Santo Domingo', 162),
(163, 'Guaraque', 163),
(164, 'Arapuey', 164),
(165, 'Torondoy', 165),
(166, 'Mérida', 166),
(167, 'Timotes', 167),
(168, 'Santa Elena de Arenales', 168),
(169, 'Santa María de Caparo', 169),
(170, 'Pueblo Llano', 170),
(171, 'Mucuchíes', 171),
(172, 'Bailadores', 172),
(173, 'Tabay', 173),
(174, 'Lagunillas', 174),
(175, 'Tovar', 175),
(176, 'Nueva Bolivia', 176),
(177, 'Zea', 177),
(178, 'Caucagua', 178),
(179, 'San José de Barlovento', 179),
(180, 'Baruta (Caracas)', 180),
(181, 'Higuerote', 181),
(182, 'Mamporal', 182),
(183, 'Carrizal', 183),
(184, 'Caracas', 184),
(185, 'Charallave', 185),
(186, 'Caracas', 186),
(187, 'Los Teques', 187),
(188, 'Santa Teresa del Tuy', 188),
(189, 'Ocumare del Tuy', 189),
(190, 'San Antonio de los Altos', 190),
(191, 'Río Chico', 191),
(192, 'Santa Lucía', 192),
(193, 'Cúpira', 193),
(194, 'Guarenas', 194),
(195, 'San Francisco de Yare', 195),
(196, 'Petare (Caracas)', 196),
(197, 'Cúa', 197),
(198, 'Guatire', 198),
(199, 'San Antonio de Capayacuar', 199),
(200, 'Aguasay', 200),
(201, 'Caripito', 201),
(202, 'Caripe', 202),
(203, 'Caicara de Maturín', 203),
(204, 'Punta de Mata', 204),
(205, 'Temblador', 205),
(206, 'Maturín', 206),
(207, 'Aragua de Maturín', 207),
(208, 'Quiriquire', 208),
(209, 'Santa Bárbara', 209),
(210, 'Barrancas del Orinoco', 210),
(211, 'Uracoa', 211),
(212, 'La Plaza de Paraguachí', 212),
(213, 'La Asunción', 213),
(214, 'San Juan Bautista', 214),
(215, 'El Valle del Espíritu Santo', 215),
(216, 'Santa Ana', 216),
(217, 'Pampatar', 217),
(218, 'Juan Griego', 218),
(219, 'Porlamar', 219),
(220, 'Boca de Río', 220),
(221, 'Punta de Piedras', 221),
(222, 'San Pedro de Coche', 222),
(223, 'Agua Blanca', 223),
(224, 'Araure', 224),
(225, 'Píritu', 225),
(226, 'Guanare', 226),
(227, 'Guanarito', 227),
(228, 'Paraíso de Chabasquén', 228),
(229, 'Ospino', 229),
(230, 'Acarigua', 230),
(231, 'Papelón', 231),
(232, 'Boconoíto', 232),
(233, 'San Rafael de Onoto', 233),
(234, 'El Playón', 234),
(235, 'Biscucuy', 235),
(236, 'Villa Bruzual', 236),
(237, 'Casanay', 237),
(238, 'San José de Aerocuar', 238),
(239, 'Río Caribe', 239),
(240, 'El Pilar', 240),
(241, 'Carúpano', 241),
(242, 'Marigüitar', 242),
(243, 'Yaguaraparo', 243),
(244, 'Araya', 244),
(245, 'Tunapuy', 245),
(246, 'Irapa', 246),
(247, 'San Antonio del Golfo', 247),
(248, 'Cumanacoa', 248),
(249, 'Cariaco', 249),
(250, 'Cumaná', 250),
(251, 'Güiria', 251),
(252, 'Cordero', 252),
(253, 'Las Mesas', 253),
(254, 'Colón', 254),
(255, 'San Antonio del Táchira', 255),
(256, 'Táriba', 256),
(257, 'Santa Ana de Táchira', 257),
(258, 'San Rafael del Piñal', 258),
(259, 'San José de Bolívar', 259),
(260, 'La Fría', 260),
(261, 'Palmira', 261),
(262, 'Capacho Nuevo', 262),
(263, 'La Grita', 263),
(264, 'El Cobre', 264),
(265, 'Rubio', 265),
(266, 'Capacho Viejo', 266),
(267, 'Abejales', 267),
(268, 'Lobatera', 268),
(269, 'Michelena', 269),
(270, 'Coloncito', 270),
(271, 'Ureña', 271),
(272, 'Delicias', 272),
(273, 'La Tendida', 273),
(274, 'San Cristóbal', 274),
(275, 'Seboruco', 275),
(276, 'San Simón', 276),
(277, 'Queniquea', 277),
(278, 'San Josecito', 278),
(279, 'Pregonero', 279),
(280, 'Umuquena', 280),
(281, 'Santa Isabel', 281),
(282, 'Boconó', 282),
(283, 'Sabana Grande', 283),
(284, 'Chejendé', 284),
(285, 'Carache', 285),
(286, 'Escuque', 286),
(287, 'El Paradero', 287),
(288, 'Campo Elías', 288),
(289, 'Santa Apolonia', 289),
(290, 'El Dividive', 290),
(291, 'Monte Carmelo', 291),
(292, 'Motatán', 292),
(293, 'Pampán', 293),
(294, 'Pampanito', 294),
(295, 'Betijoque', 295),
(296, 'Carvajal', 296),
(297, 'Sabana de Mendoza', 297),
(298, 'Trujillo', 298),
(299, 'La Quebrada', 299),
(300, 'Valera', 300),
(301, 'San Pablo', 301),
(302, 'Aroa', 302),
(303, 'Chivacoa', 303),
(304, 'Cocorote', 304),
(305, 'Independencia', 305),
(306, 'Sabana de Parra', 306),
(307, 'Boraure', 307),
(308, 'Yumare', 308),
(309, 'Nirgua', 309),
(310, 'Yaritagua', 310),
(311, 'San Felipe', 311),
(312, 'Guama', 312),
(313, 'Urachiche', 313),
(314, 'Farriar', 314),
(315, 'El Toro', 315),
(316, 'San Timoteo', 316),
(317, 'Tía Juana', 317),
(318, 'Cabimas', 318),
(319, 'Encontrados', 319),
(320, 'San Carlos del Zulia', 320),
(321, 'Pueblo Nuevo-El Chivo', 321),
(322, 'Sinamaica', 322),
(323, 'La Concepción', 323),
(324, 'Casigua El Cubo', 324),
(325, 'Concepción', 325),
(326, 'Ciudad Ojeda', 326),
(327, 'Machiques', 327),
(328, 'San Rafael del Moján', 328),
(329, 'Maracaibo', 329),
(330, 'Los Puertos de Altagracia', 330),
(331, 'La Villa del Rosario', 331),
(332, 'San Francisco', 332),
(333, 'Santa Rita', 333),
(334, 'Bobures', 334),
(335, 'Bachaquero', 335);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paypal`
--

CREATE TABLE `paypal` (
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cor_payp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo paypal',
  `nom_payp` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre paypal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paypal`
--

INSERT INTO `paypal` (`id_prop`, `cor_payp`, `nom_payp`) VALUES
('', 'i', ''),
('0', '10', '10'),
('A-00000003', 'io', 'io'),
('P-00000012', '3', '3'),
('P-00000013', 'paypal', 'paypal'),
('P-00000014', 'PAYPAL', 'PAYPAL'),
('P-00000015', 'py', 'py'),
('PJ-0000001', 'B', 'B'),
('PJ-0000003', '3', '3'),
('PJ-0000004', 'b', 'b'),
('PJ-0000005', 'b', 'b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poder`
--

CREATE TABLE `poder` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `not_pode` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'notaria o registro',
  `fec_pode` date NOT NULL COMMENT 'fecha',
  `num_pode` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero',
  `tom_pode` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tomo',
  `fol_pode` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'folio o asiento real'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `poder`
--

INSERT INTO `poder` (`id`, `not_pode`, `fec_pode`, `num_pode`, `tom_pode`, `fol_pode`) VALUES
('1', 'notaria', '2022-05-18', 'numero', 'tomo', 'folio'),
('2', 'uio', '0000-00-00', 'i', 'io', 'i');

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
  `pre_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Presentacion propietario',
  `loc_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel local propietario',
  `cel_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel celular propietario',
  `cor_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo propietario',
  `est_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'estado propietario',
  `mun_prop` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'municipio propietario',
  `par_prop` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'parroquia propietario',
  `dir_prop` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion propietario',
  `ofi_prop` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion de oficina',
  `tip_prop` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de propietario',
  `rep_prop` varchar(75) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_prop`, `cod_prop`, `nom_prop`, `ape_prop`, `nac_prop`, `ci_prop`, `rif_prop`, `loc_prop`, `cel_prop`, `cor_prop`, `est_prop`, `mun_prop`, `par_prop`, `dir_prop`, `ofi_prop`, `tip_prop`, `rep_prop`) VALUES
('P-00000001', 'P-01-Pedro Mosquera', 'Pedro ', 'Mosquera', '', '222', 'A', 'A', '', 'A', '1', '', '', 'A', 'A', '', ''),
('P-00000002', 'P-- ', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario_juridico`
--

CREATE TABLE `propietario_juridico` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_prop` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `nom_proj` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre o razon social',
  `rif_proj` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif juridico',
  `act_proj` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'actividad comercial',
  `dir_proj` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion fiscal',
  `tel_proj` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cor_proj` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario_juridico`
--

INSERT INTO `propietario_juridico` (`id`, `cod_prop`, `nom_proj`, `rif_proj`, `act_proj`, `dir_proj`, `tel_proj`, `cor_proj`) VALUES
('PJ-0000001', 'PJ-02-B', 'B', 'J-3899988776', 'B', 'B', '58 414 0987666', 'B'),
('PJ-0000002', 'PJ--', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_inmueble`
--

CREATE TABLE `tipo_inmueble` (
  `id_tipo` varchar(5) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id tipo de inmueble',
  `nom_tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de inmueble'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_inmueble`
--

INSERT INTO `tipo_inmueble` (`id_tipo`, `nom_tipo`) VALUES
('AP', 'Apartamento'),
('CA', 'Casa'),
('ED', 'Edificio'),
('LC', 'Local'),
('QU', 'Quinta'),
('TR', 'Terreno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id_tipo` int(10) NOT NULL COMMENT 'id tipo de pago',
  `nom_tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de pago'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`id_tipo`, `nom_tipo`) VALUES
(1, 'Transferencia'),
(2, 'Pago Móvil'),
(3, 'Paypal'),
(4, 'Zelle'),
(5, 'Extranjero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `usuario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `contrasena`, `nombre`, `tipo_usuario`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrador Web', 1),
(2, 'usuario', 'b665e217b51994789b02b1838e730d6b93baa30f', 'Usuario Estandar', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zelle`
--

CREATE TABLE `zelle` (
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id dato - telefono',
  `tel_zell` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'telefono zelle',
  `cor_zell` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo zelle',
  `nom_zell` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre zelle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `zelle`
--

INSERT INTO `zelle` (`id_prop`, `tel_zell`, `cor_zell`, `nom_zell`) VALUES
('', 'b', 'b', ''),
('P-00000001', 'A', 'A', ''),
('P-00000012', '4', '5', ''),
('P-00000013', 'zelle', 'cor_zeñ', ''),
('P-00000014', 'ZELLE', 'CORREO', ''),
('P-00000015', 'ze1', 'ze2', ''),
('PJ-0000001', 'B', 'B', ''),
('PJ-0000003', '16', '16', ''),
('PJ-0000004', 'b', 'b', ''),
('PJ-0000005', 'b', 'b', '');

-- --------------------------------------------------------

--
-- Estructura para la vista `inq`
--
DROP TABLE IF EXISTS `inq`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inq`  AS  (select `inquilino_juridico`.`id` AS `id`,`inquilino_juridico`.`cod_inqu` AS `cod_inqu`,`inquilino_juridico`.`nom_inqj` AS `nom_inqj`,`inquilino_juridico`.`rif_inqj` AS `rif_inqj`,`inquilino_juridico`.`act_inqj` AS `act_inqj`,`inquilino_juridico`.`dir_inqj` AS `dir_inqj`,`inquilino_juridico`.`tel_inqj` AS `tel_inqj`,`inquilino_juridico`.`cor_inqj` AS `cor_inqj` from `inquilino_juridico`) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apoderado`
--
ALTER TABLE `apoderado`
  ADD PRIMARY KEY (`id_apod`),
  ADD UNIQUE KEY `ci_apod` (`ci_apod`);

--
-- Indices de la tabla `apoderado_juridico`
--
ALTER TABLE `apoderado_juridico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rif_apoj` (`rif_apoj`);

--
-- Indices de la tabla `banco`
--
ALTER TABLE `banco`
  ADD PRIMARY KEY (`id_prop`);

--
-- Indices de la tabla `banco_extranjero`
--
ALTER TABLE `banco_extranjero`
  ADD PRIMARY KEY (`id_prop`);

--
-- Indices de la tabla `datos_bancarios`
--
ALTER TABLE `datos_bancarios`
  ADD PRIMARY KEY (`id_dato`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docu_inmuebles`
--
ALTER TABLE `docu_inmuebles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`id_inmu`);

--
-- Indices de la tabla `inquilino`
--
ALTER TABLE `inquilino`
  ADD PRIMARY KEY (`id_inqu`),
  ADD UNIQUE KEY `ci_inqu` (`ci_inqu`);

--
-- Indices de la tabla `inquilino_juridico`
--
ALTER TABLE `inquilino_juridico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rif_inqj` (`rif_inqj`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_muni`);

--
-- Indices de la tabla `pago_movil`
--
ALTER TABLE `pago_movil`
  ADD PRIMARY KEY (`id_prop`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id_parr`);

--
-- Indices de la tabla `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`id_prop`);

--
-- Indices de la tabla `poder`
--
ALTER TABLE `poder`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propietario_juridico`
--
ALTER TABLE `propietario_juridico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rif_proj` (`rif_proj`);

--
-- Indices de la tabla `tipo_inmueble`
--
ALTER TABLE `tipo_inmueble`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zelle`
--
ALTER TABLE `zelle`
  ADD PRIMARY KEY (`id_prop`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT de la tabla `docu_inmuebles`
--
ALTER TABLE `docu_inmuebles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id_muni` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;
--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id_parr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;
--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `id_tipo` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id tipo de pago', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
