-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2022 a las 14:49:03
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
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'propietario',
  `cod_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'codigo podder',
  `not_pode` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre registro',
  `fec_pode` date NOT NULL COMMENT 'fecha registro',
  `num_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero poder',
  `tom_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tomo poder',
  `fol_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'expediente '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `cor_inqj` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `cod_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'codigo podder',
  `not_regi` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre registro',
  `fec_regi` date NOT NULL COMMENT 'fecha registro',
  `num_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero poder',
  `tom_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tomo poder',
  `fol_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'expediente '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_muni` int(10) NOT NULL,
  `nom_muni` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_esta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagador`
--

CREATE TABLE `pagador` (
  `id_paga` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id pagador',
  `cod_paga` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `nom_paga` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre',
  `ape_paga` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'apellido',
  `nac_paga` varchar(1) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nacionalidad pagador',
  `ci_paga` varchar(12) COLLATE utf8_spanish_ci NOT NULL COMMENT 'cedula',
  `rif_paga` varchar(12) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif pagador',
  `loc_paga` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel local pagador',
  `cel_paga` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tel celular pagador',
  `cor_paga` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo pagador',
  `est_paga` int(11) NOT NULL COMMENT 'estado pagador',
  `mun_paga` int(11) NOT NULL COMMENT 'municipio pagador',
  `par_paga` int(11) NOT NULL COMMENT 'parroquia pagador',
  `dir_paga` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion pagador',
  `ofi_paga` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion de oficina',
  `tip_paga` int(11) NOT NULL COMMENT 'tipo de pagador',
  `id_inqu` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagador_juridico`
--

CREATE TABLE `pagador_juridico` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_pagj` varchar(76) COLLATE utf8_spanish_ci NOT NULL,
  `nom_pagj` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre o razon social',
  `rif_pagj` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif juridico',
  `act_pagj` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'actividad comercial',
  `dir_pagj` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion fiscal',
  `tel_pagj` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cor_pagj` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `cod_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'codigo poder',
  `not_regi` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre registro',
  `fec_regi` date NOT NULL COMMENT 'fecha registro',
  `num_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero poder',
  `tom_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tomo poder',
  `fol_regi` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'expediente ',
  `id_inqu` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `id_parr` int(10) NOT NULL,
  `nom_parr` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_muni` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paypal`
--

CREATE TABLE `paypal` (
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cor_payp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo paypal',
  `nom_payp` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre paypal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_inmueble`
--

CREATE TABLE `tipo_inmueble` (
  `id_tipo` varchar(5) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id tipo de inmueble',
  `nom_tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de inmueble'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id_tipo` int(10) NOT NULL COMMENT 'id tipo de pago',
  `nom_tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de pago'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
-- Indices de la tabla `apoderado_juridico`
--
ALTER TABLE `apoderado_juridico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rif_apoj` (`rif_apoj`);

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
-- Indices de la tabla `pagador`
--
ALTER TABLE `pagador`
  ADD PRIMARY KEY (`id_paga`);

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
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id_repr`);

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
