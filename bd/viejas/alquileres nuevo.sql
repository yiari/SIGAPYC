-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-04-2022 a las 10:16:33
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
  `tip_apod` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de apoderado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE `banco` (
  `id_dato` int(10) NOT NULL COMMENT 'id dato',
  `num_cuen` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero de cuenta',
  `id_banc` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'id banco'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco_extranjero`
--

CREATE TABLE `banco_extranjero` (
  `id` int(10) NOT NULL,
  `ban_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'banco extranjero',
  `age_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'agencia',
  `dc_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'digito control',
  `cue_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'cuenta',
  `iba_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'iban',
  `bic_extr` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'bic o swift'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `id_pers` varchar(10) NOT NULL,
  `tip_docu` varchar(25) NOT NULL,
  `rut_docu` varchar(50) NOT NULL
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
  `tip_inmu` int(20) NOT NULL COMMENT 'tipo de inmueble',
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
  `sta_inmu` int(11) NOT NULL DEFAULT '1' COMMENT '1-Disponible 0-desactivado 2-Alquilado '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `nom_inqj` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre o razon social',
  `rif_inqj` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif juridico',
  `act_inqj` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'actividad comercial',
  `dir_inqj` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion fiscal',
  `tel_prop` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `dir_prop` varchar(80) COLLATE utf8_spanish_ci NOT NULL
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
-- Estructura de tabla para la tabla `pago_movil`
--

CREATE TABLE `pago_movil` (
  `id_dato` int(10) NOT NULL,
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
  `id_dato` int(10) NOT NULL,
  `cor_payp` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo paypal',
  `nom_payp` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre paypal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poder`
--

CREATE TABLE `poder` (
  `id` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario_juridico`
--

CREATE TABLE `propietario_juridico` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nom_proj` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre o razon social',
  `rif_proj` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'rif juridico',
  `act_proj` varchar(35) COLLATE utf8_spanish_ci NOT NULL COMMENT 'actividad comercial',
  `dir_proj` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion fiscal'
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
  `id_dato` int(10) NOT NULL COMMENT 'id dato - telefono',
  `tel_zell` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'telefono zelle',
  `cor_zell` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo zelle',
  `nom_zell` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre zelle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  ADD PRIMARY KEY (`id_dato`);

--
-- Indices de la tabla `banco_extranjero`
--
ALTER TABLE `banco_extranjero`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id_dato`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id_parr`);

--
-- Indices de la tabla `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`id_dato`);

--
-- Indices de la tabla `poder`
--
ALTER TABLE `poder`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_prop`),
  ADD UNIQUE KEY `ci_prop` (`ci_prop`);

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
  ADD PRIMARY KEY (`id_dato`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banco`
--
ALTER TABLE `banco`
  MODIFY `id_dato` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id dato', AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `datos_bancarios`
--
ALTER TABLE `datos_bancarios`
  MODIFY `id_dato` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id del propietario', AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
-- AUTO_INCREMENT de la tabla `pago_movil`
--
ALTER TABLE `pago_movil`
  MODIFY `id_dato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id_parr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;
--
-- AUTO_INCREMENT de la tabla `poder`
--
ALTER TABLE `poder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
--
-- AUTO_INCREMENT de la tabla `zelle`
--
ALTER TABLE `zelle`
  MODIFY `id_dato` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id dato - telefono', AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
