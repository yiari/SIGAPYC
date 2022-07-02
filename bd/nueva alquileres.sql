-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-06-2022 a las 02:56:52
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
  `id_prop` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'propietario',
  `cod_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'codigo podder',
  `not_pode` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre registro',
  `fec_pode` date NOT NULL COMMENT 'fecha registro',
  `num_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'numero poder',
  `tom_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tomo poder',
  `fol_pode` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'expediente '
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
  `dir_apoj` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'direccion fiscal',
  `tel_apoj` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cor_apoj` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cod_apoj` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
('10', '01160438210103301780', 'OCCIDENTAL DE DESCUE'),
('105', '01040022810220047733', 'VENEZOLANO DE CREDIT'),
('135', '01160438210103301780', 'OCCIDENTAL DE DESCUE'),
('153', '01040022810220047733', 'VENEZOLANO DE CREDIT'),
('18', '01050201210201000121', 'MERCANTIL'),
('25', '01340329523295006411', 'BANESCO'),
('3', '01020141140000029421', 'VENEZUELA'),
('32', '01340335033352118485', 'BANESCO'),
('34', '01150020063000164359', 'EXTERIOR '),
('35', '01150020063000164359', 'EXTERIOR '),
('36', '01160438210103301780', 'OCCIDENTAL DE DESCUE'),
('41', '01020141140000029421', 'VENEZUELA'),
('48', '01150020063000164359', 'EXTERIOR '),
('50', '01080010280200055599', 'PROVINCIAL'),
('54', '01150020063000164359', 'EXTERIOR '),
('61-B', '01340366053661016573', 'BANESCO'),
('7', 'BANESCO/ EXTERIOR ', '01340343112431043447'),
('71', '01080035880200326998', 'PROVINCIAL'),
('73', '01050017081017109524', 'MERCANTIL'),
('93', '01340329523295006411', 'BANESCO'),
('94', '01340329523295006411', 'BANESCO'),
('98', '01150020063000164359', 'EXTERIOR ');

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
  `act_cont` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-Disponible 0-desactivado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`cod_cont`, `cod_inqu`, `cod_inmu`, `can_cont`, `fec_desd`, `fec_hast`, `per_pror`, `dia_pago`, `pas_cont`, `ins_cont`, `fec_cont`, `adm_inmu`, `pap_inmu`, `iva_inmu`, `imp_inmu`, `dep_cont`, `com_cont`, `hab_cont`, `for_cont`, `por_rete`, `ret_cont`, `doc_cont`, `act_cont`) VALUES
('C-00000001', '13-2285', '03-0003-00', '200.00', '2022-01-01', '2023-01-02', '1 año', 5, '2022-01-01', 0, '2021-12-12', '10.00', '10.00', '0.16', '0.03', '600.00', '0.02', '', 'efectivo', '0.00', '', '', 1),
('C-00000002', '18-1854', '03-2021-00', '299.00', '2022-06-01', '2023-06-01', '1', 5, '0000-00-00', 1, '2022-06-01', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '', '', '0.00', '', '', 0),
('C-00000003', '18-1854', '19-1469-01', '6.00', '0000-00-00', '0000-00-00', '6', 6, '0000-00-00', 6, '0000-00-00', '6.00', '0.00', '6.00', '6.00', '6.00', '66.00', '66', '6', '6.00', '6', '', 0);

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
('01-0198-00', '1', '100', 'LO', 'COMERCIO', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR ', 'LA CANDELARIA ', 'ESQ. PUNCERES A ESCALINATA EDIF. ANGIOMAR PISO PB APTO 1 SEC', '', '0.00', '0.00', 0, 0, 0, 0, 2, ' ', '', '', '', '', '', '0000-00-00', '1', '0', '', '01-01-03-U01-002-061-013-000-000-000-', '', '', ''),
('03-0003-00', '3', '1', 'LO', 'COMERCIO', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR ', 'EL RECREO ', 'CALLE LOS HUERTOS CON LA AV. EL MIRADOR URBANIZACION LA CAMP', '', '0.00', '0.00', 0, 0, 0, 0, 2, ' ', '', '', '', '', 'SEGUNDO', '0000-00-00', '27', '143', '1', '01-01-09-U01-018-009-011', '', '1', '1'),
('03-2021-00', '3', '100', 'AP', 'VIVIENDA ', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR ', 'EL RECREO ', 'AV. LOS APAMATES NRO. 14 URBANIZACION LA FLORIDA ', '', '0.00', '0.00', 0, 0, 0, 0, 2, ' ', '', '', '', '', 'SEGUNDO ', '0000-00-00', '7', '2', '', '', '', '', ''),
('04-1271-00', '4', '100', 'LO', 'COMERCIO', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR ', 'EL RECREO ', 'FRENTE A LA CALLE QUE CONDUCE DE LA CARRETERA DEL ESTE A LA ', '', '0.00', '0.00', 0, 0, 0, 0, 2, ' ', '', '', '', '', 'SEGUNDO', '0000-00-00', '', '', '', '', '', '', ''),
('13-0004-00', '13', '100', 'KI', 'COMERCIO', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR ', 'LA CANDELARIA ', 'CALLE ESTE CERO CON CALLE SUR 19 EDIF. C.P.C. TORRE A Y B PI', '', '0.00', '0.00', 0, 0, 0, 0, 2, ' ', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('19-1469-00', '19', '100', 'LO', 'COMERCIO', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR ', 'SAN BERNANDINO', 'AV. PANTEON Y GALIPAN EDIF. SOROCAIMA PISO PB LOCAL B ', '', '0.00', '0.00', 0, 0, 0, 0, 2, ' ', '', '', '', '', 'SEGUNDO', '0000-00-00', '49', '', '', '01-01-15-U01-001-038-001-000-0PB-0LB', '', '', ''),
('19-1469-01', '19', '100', 'LO', 'COMERCIO', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR ', 'LA CANDELARIA ', 'ESQ. CERVECERIA A PUENTE ANAUCO PISO MEZZ LOCAL 22', '', '0.00', '0.00', 0, 0, 0, 0, 2, ' ', '', '', '', '', 'QUINTO ', '0000-00-00', '15', '', '', '01-01-03-U01-001-033-004-00A-0PB-022', '', '', ''),
('21-0011-00', '21', '', 'AP', 'VIVIENDA ', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR ', 'LA VEGA ', 'FRENTE A LA AV. JOSE ANTONIO PAEZ EL PARAISO ', '', '0.00', '0.00', 0, 0, 0, 0, 0, ' ', '', '', '', '', 'TERCERO', '0000-00-00', '58', '44', '', '', '', '', '');

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
  `cor_inqu` varchar(66) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo inquilino',
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
('13-2285', '13-2285', 'MARLYN ANDREINA', 'MARTINEZ DIAZ', 'V', '14890552', '	V148905521', '	 0212-730-47-00 730', '0424-637-16-63', 'CAROLINA.MARTINEZ @ ', 0, 0, 0, 'CALLE LOS HUERTOS CON LA AV. EL MIRADOR URB LA CAMPIÑA PARROQUIA EL RECREO MUNICIPIO LIBERTADOR, CAR', '', 0),
('18-1854', '18-1854', 'FRANCY MARLENY', 'RAMOS DE POLEO', 'V', '3667951', 'V036679510', '0212-731-61-85', '0416-909-31-57', 'ramos.marleny18@gmai', 0, 0, 0, 'CALLE LOS HUERTOS CON LA AV. EL MIRADOR URB LA CAMPIÑA PARROQUIA EL RECREO MUNICIPIO LIBERTADOR, CAR', '', 0);

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
  `cor_prop` varchar(60) COLLATE utf8_spanish_ci NOT NULL COMMENT 'correo propietario',
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

INSERT INTO `propietario` (`id_prop`, `cod_prop`, `nom_prop`, `ape_prop`, `nac_prop`, `ci_prop`, `rif_prop`, `pre_prop`, `loc_prop`, `cel_prop`, `cor_prop`, `est_prop`, `mun_prop`, `par_prop`, `dir_prop`, `ofi_prop`, `tip_prop`, `rep_prop`) VALUES
('10', '10', 'VIRGILIO RAFAEL ', ' AVILA VIVAS', 'V', '1634096', 'V016340967', '', '02122620010', '04166220342', 'virgilioavilavivas@g', 'MIRANDA', 'BARUTA', 'NUESTRA SEÑORA DEL ROSARIO', 'RESIDENCIAS SAUSALITO PISO 1 APTO 11B CALLE LA CEIBA URB EL PEÑON CARACAS', ' EDIFICIO CENTRO RESIDENCIAL SAN FRANCISCO', '1', ''),
('100', '100', 'DIANA E', 'SRULEVITCH KALECHMAN ', 'E', '91302225', 'E813022250', '', '007183364768', '04143305338', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'LA CANDELARIA', 'AV EL PARQUE RESIDENCIAS PLAZA ESTRELLA PISO 5 APTO 5C URB SAN BERNARDINO', 'EDIFICIO PLAZA LA ESTRELLA PISO 5 AV. EL PARQUE UR', '1', ''),
('105', '105', 'ROSA MARIA', ' ROTONDA DE URCIULI', 'V', '6441575', 'V-06441575-8', '', '02127009000', '', 'URCIOLIR@GMAIL.COM', 'DISTRITO CAPITAL', 'LIBERTADOR', 'SUCRE', 'CASA QUINTA VILLA ELBA N 7 PARROQUIA SUCRE CATIA URB LA NUEVA CARACAS ', 'QUINTA VILLA ELBA N 7', '1', ''),
('108', '108', 'GREGORIO JOSE', 'VILA COS', 'V', '', 'V-01740468-3', '', '', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'SANTA ROSALIA', 'PARCELA N 38. UR. LAS LUCES, EL CEMENTERIO ESQ. AV. PRINCIPAL', 'PARCELA N. 38 ', '1', ''),
('110', '110', 'JOSE ', 'VIEITEZ GALIÑO', 'V', '10114070', 'V101140705', '', '', '04146632269', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'LA CANDELARIA', 'APTO N 194 EDIF RESIDENCIAS DORAL MEXICO AV MEXICO CARACAS', 'APTO N 194 EDIF DORAL MEXICO', '1', ''),
('110-A', '110-A', 'JOSE ', 'VIEITEZ GALIÑO', 'V', '10114070', 'V101140705', '', '', '04146632269', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'LA CANDELARIA', 'APTO N 183-A PISO 18 EDIF RESIDENCIAS DORAL MEXICO AV MEXICO CARACAS', 'APTO N 183-A EDIF DORAL MEXICO', '1', ''),
('111', '111', 'JOSE ', 'VIEITEZ GALIÑO', 'V', '10114071', 'V101140705', '', '', '04146632269', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'LA VEGA', 'APTO 24 EDIF RESIDENCIAS EL ROBLE 3RA AV DE LA URB MONTALBAN II', 'APTO 24 EDIF EL ROBLE', '1', ''),
('13', '13', 'JOSE ', 'BAYED MARDENI', 'V', '2937703', 'V-029377037', '', '', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'SANTA ROSALIA', 'EDIF EL CRISTO CARACAS AV FUERZAS ARMADAS ESQ EL CRSITO PARROQUIA SANTA ROSALIA, LIBERTADOR DISTRITO', 'EDIF EL CRISTO ', '1', ''),
('145', '145', 'JORGE  ', 'ALBERTO SALAS', 'V', '2063077', '', '', '', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'ALTAGRACIAS', 'EDIF CENTRO RESIDENCIAL SALAS TORRE A PISO 14 APTO 142 ESQ DE SALAS A CAJA DE AGUA PARROQUIA ALTAGRA', 'EDIF CENTRO RESIDENCIAL SALAS TORRE A PISO 14 APTO', '1', ''),
('146', '146', 'CARLOS ADRIAN', ' VILLASANA OVAÑEZ', 'V', '13355002', 'V133550020', '', '', '04167440959', 'carlosv78@cantv.net', 'DISTRITO CAPITAL', 'LIBERTADOR', 'SAN JUAN', 'TORRE A DEL EDIF RESID ELIZABETH APTO 31-1  PARROQUIA SAN JUAN MUNICIPIO LIBETADOR DISTRITO CAPITAL', 'EDIF ELIZABETH APTO 31-1', '1', ''),
('151', '151', 'LEOPOLDO', ' URBINA CABELLO', '', '', '', '', '', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'EL PARAISO ', 'EDIF DOVI PISO 6 APTO 61 AV PAEZ URB EL PARAISO MUNICIPIO LIBERTADOR DISTRIO CAPITAL ', 'EDIF DOVI PISO 6 APTO 61', '1', ''),
('152', '152', 'GIL DANIELE ', 'GUISEPPE VIT OLIVER', '', '', '', '', '', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'LA CANDELARIA', 'AV. LA INDUSTRIA ENTRE LAS ESQ. DE PUENTE ANUCO A PUENTE REPUBLICA, PQUIA. CANDELARIA.-', 'EDIF FANORAL ', '1', ''),
('153', '153', 'ROSA MARIA', ' ROTONDA DE URCIULI', 'V', '6441575', 'V-06441575-8', '', '02127009000', '', 'URCIOLIR@GMAIL.COM', 'DISTRITO CAPITAL', 'LIBERTADOR', 'SANTA TERESA', 'LOCA N 65 AV OESTE 10 ESQ MIRANDA A REDUCTO PARROQUIA SANTA TERESA CARACAS ', 'QUINTA N. 65 LOCAL N. 65', '1', ''),
('18', '18', 'NATALE', 'CLEMENZA LA ROCCA', 'V', '6206492', '', '', '', '', ' natale.clemenza@gma', 'MIRANDA', 'PETARE', 'LA URBINA', 'LOCAL COMERCIAL CI-8 NIVEL C1 DEL PARQUE COMERCIAL EL AVILA URB LA URBINA CALLE 1 MUNICIPIO PETARE E', 'CENTRO COMERCAL PARQUE EL AVILA LOCAL C1-8', '1', ''),
('19', '19', 'CELESTINO JOSE', 'CARDOSO MORONOS', 'E', '934430', '', '', '', '', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'EL RECREO', 'EDIF INCA PISO PB LOCAL N 4 URB BELLO MONTE PARROQUIA EL RECREO', 'EDIF I NCA LOCA N 4 ', '1', ''),
('21', 'P-10-JOSE ANTONIO  DE SA NOBREGA', 'JOSE ANTONIO ', 'DE SA NOBREGA', '', '6210969', 'V062109692', '', '', '04141198642', 'inesmariadesa@hotmai', '0', '', '', 'EDIF SIVEDY LOCAL 3-A AV MANUEL DIAZ URB SANTA MONICA CARACAS', 'EDIF SIVEDY LOCAL 3-A', '', ''),
('21-A', '21-A', 'INES MARIA ', 'DE SA NOBREGA', '', '6509749', 'V065097490', '', '', '04141198642', 'inesmariadesa@hotmai', 'DISTRITO CAPITAL', 'LIBERTADOR', 'SAN PEDRO', 'EDIF SIVEDY LOCAL 3-A AV MANUEL DIAZ URB SANTA MONICA CARACAS', 'EDIF SIVEDY LOCAL 3-A', '1', ''),
('21-B', 'P-01-AURELIO  ANGOSTINHO DE SA', 'AURELIO ', 'ANGOSTINHO DE SA', '', '6532802', 'V-0623802-7', '', '2122031361', '4241579463', 'AURELIODESA@GMAIL.CO', '0', '', '', 'EDIF SIVEDY LOCAL 3-A AV MANUEL DIAZ URB SANTA MONICA CARACAS', 'EDIF SIVEDY LOCAL 3-A', '', ''),
('22', '22', 'EDUARDO JOSE', 'DAGNINO CASTILLO', 'V', '219766', 'V-00219766-5', '', '04142886834', '02122578161', 'eduardo.dagnino@gmai', 'DISTRITO CAPITAL', 'LIBERTADOR', 'EL RECREO', 'EDIF DAVOLCA PARROQUIA EL RECREO MUNICIPIO LIBERTADOR DISTRITO CAPITAL', 'EDIF DAVOLCA', '1', ''),
('25', '25', 'ENRIQUE ', 'SOTO MAGDALENA', 'V', '4441129', 'V044411292', '', '02127815625', '', 'aesotopresas@hotmail', 'DISTRITO CAPITAL', 'LIBERTADOR', 'EL RECREO', 'QUINTA ANNETTE PRIMERA AV DE LA URB GUAICAIPURO PARROQUIA EL RECREO CARACAS MUNICIPIO LIBERTADOR ', 'QUINTA ANNETTE ', '1', ''),
('27', '27', 'ROCCO ', 'GUARINO CUSTODE ', 'V', '6450308', '', '', '02124625242', '04241519871', 'guarinopedro@yahoo.c', 'DISTRITO CAPITAL', 'LIBERTADOR ', 'SUCRE', 'PARCELA DE TERRENO N 418 AV SUCRE CATIA PARROQUIA SUCRE MUNICIPIO LIBERTADOR DEL DISTRITO CAPITAL ', 'LOCAL 418 ', '1', ''),
('28', 'P-02-BRUNO  GAMMARANO DONNANTUONI', 'BRUNO ', 'GAMMARANO DONNANTUONI', '', '6057091', 'V-06057091-0', '', '02127301398', '04166221789', 'grupobjpa2000@hotmai', '0', '', '', 'EDIIF.MIRADOR-LA CAMPIÑA. AV. EL MIRADOR CON 2DA AV. URB LA CAMPIÑA CARACAS ', 'EDIF MIRADOR ', '', ''),
('29', 'P-02-BRUNO  GAMMARANO DONNANTUONI', 'BRUNO ', 'GAMMARANO DONNANTUONI', '', '6057091', 'V-06057091-0', '', '02127301398', '04166221789', 'grupobjpa2000@hotmai', '0', '', '', 'QNTA MARY GRA PROLONGACION LA CAMPIÑA AV MIRADOR LA CAMPIÑA', 'QUINTA NARY GRA', '', ''),
('3', '3', 'VIRGILIO RAFAEL ', ' AVILA VIVAS', 'V', '1634096', 'V016340967', '', '02122620010', '04166220342', 'virgilioavilavivas@g', 'DISTRITO CAPITAL', 'LIBERTADOR', 'EL RECREO', 'RESIDENCIAS SAUSALITO PISO 1 APTO 11B CALLE LA CEIBA URB EL PEÑON CARACAS', 'EDF TORRE LINCOLN AVENIDA LAS ACACIAS SABANA GRAND', '1', ''),
('32', '32', 'NICOLINO SOLFERINO', 'PALMERINI SALVATI ', 'V', '4439982', 'V-04439982-9', '', '0039085834221', '', 'GIUSEPPINAPALMERINI@', 'DISTRITO CAPITAL', 'SUCRE', 'CHACAO', 'LOCAL 5 Y 6 DEL EDIF TORRE CEMICA CHACAO CON FRENTE A AV FRANCISCO DE MIRANDA ', 'EDF TORRE CEMICA LOCAL  Y 6', '1', ''),
('38', '38', 'MARIA DEL PILAR ', 'MENDEZ FERRE', 'V', '4268164', 'V042681640', '', '02122845453', '', 'mendezmdp@gmail.com', 'MIRANDA', 'EL HATILLO', 'EL HATILLO', 'CALLE PRINCIPAL URB EL CIGARRAL LA BOYERA', 'EDIF LOS JARDINES', '1', ''),
('39', '39', 'LUCIANO PINHEIRO', 'DA COSTA REIS', 'V', '6269727', 'V-06269727-6', '', '02122579748', '04142390750', 'lfdcc@yahoo.com', 'MIRANDA ', 'SUCRE', 'PETARE', 'QUINTA LA ZECA APTO PLANTA ALTA URB EL LLANITO AV NAIGUATA', 'QUINTA LA ZECA APTO PB', '1', ''),
('40', 'P-12-LUCIANO PINHEIRO  DA COSTA REIS', 'LUCIANO PINHEIRO ', 'DA COSTA REIS', '', '6269727', 'V-06269727-6', '', '02122579748', '04142390750', 'lfdcc@yahoo.com', '0', '', '', 'URB EL LLANITO DISTRITO SUCRE ESTADO MIRANDA ', 'QUINTA MARILU ', '', ''),
('41', '41', 'JUAN JOSE ', ' AVILA VIVAS', 'V', '4652691', 'V4652691-7', '', '0212-363-30-12', '0212-2620010', '', 'MIRANDA', 'BARUTA', 'NUESTRA SEÑORA DEL ROSARIO', 'RESD CENTRO POLO PISO 16 APTO. 163-C CALLE GARCILAZO, URB COLINAS DE BELLO MONTE, CARACAS ', 'EDIF CENTRO POLO APTO 163-C', '1', ''),
('49', 'P-02-BRUNO JUNIOR  GAMMARANO CENTI', 'BRUNO JUNIOR ', 'GAMMARANO CENTI', '', '9967063', 'V099670637 ', '', '02127301398', '04166221789', 'grupobjpa2000@hotmai', '0', '', '', 'AV PRINCIPAL DE LAS DELICIAS DOS CALLE EL MIRADOR CON LA PROLONGACION DE LA AV MIRADOR CON LA CAMPIÑ', 'EDIF MIRADOR LOCAL 2', '', ''),
('5', '5', 'ROBERT ', ' BURNS', '', '', '', '', '', '', 'LONGPASSAGES@HOTMAIL', 'DISTRITO CAPITAL', 'LIBERTADOR', 'EL RECREO', 'CALLE GUARICO COLINAS DE BELLO MONTE QUINTA EBBY PLANTA ALTA', 'QUINTA EBBY ', '1', ''),
('50', '50', 'MARIA MAGDALENA ', 'GUTIERREZ DE CABRERA', 'V', '7242222', 'V-07242222-4', '', '02127537785', '', 'lqm33@hotmail.com', 'MIRANDA', 'BARUTA', 'NUESTRA SEÑORA DEL ROSARIO', 'RESD FLAVIA LOCAL COMERCIAL N 2 AV MIGUEL ANGEL ESQ GARCILAZO COLINAS DE BELLO MONTE CARACAS', 'EDIF FLAVIA LOCAL N. 2', '1', ''),
('6', '6', 'CARMEN ZORAIDA DOLORES', ' BUENDICHO PEREZ', 'V', '5612406', 'V056124060', '', '02129621256', '04122550723', 'carmenbte213@hotmail', 'DISTRITO CAPITAL', 'LIBERTADOR', 'SAN AGUSTIN', 'EDIF CENTRO RESIDENCIAL EL CONDE PISO 3 APTO N 3-D AV ESTE 10 EL CONDE CARACAS ', 'EDIF EL CONDE ', '1', ''),
('61', '61', 'DELIA ANTONIA', 'GUIMERANS', 'V', '6975534', 'V069755344', '', '02125730122', '', 'rjsotog@yahoo.es', 'DISTRITO CAPITAL', 'LIBERTADOR', 'LA CANDELARIA', 'LOCALES COMERCIALES 2 Y 3, LOCALES MEZZANINAS 2 Y 3 Y TERRAZAS ANEXOS EDIF TORRE CANAIMA AV ESTE 2 L', 'EDIF TORRE CANAIMA LOCALES  2 Y 3, LOCALES MEZZANI', '1', ''),
('61-A', '61-A', 'MARIA FERNANDA ', 'TEMPRANO ', 'V', '4283463', 'V-04283463-3', '', '02125730122', '', 'basgilc@gmail.com', 'DISTRITO CAPITAL', 'LIBERTADOR', 'LA CANDELARIA', 'LOCALES COMERCIALES 2 Y 3, LOCALES MEZZANINAS 2 Y 3 Y TERRAZAS ANEXOS EDIF TORRE CANAIMA AV ESTE 2 L', 'EDIF TORRE CANAIMA LOCALES  2 Y 3, LOCALES MEZZANI', '1', ''),
('61-B', '61-B', 'MARIELA ', 'LANDAETA LEANDRO ', 'V', '4765746', 'V-04765746-2', '', '02125730122', '', 'camilosanchezredondo', 'DISTRITO CAPITAL', 'LIBERTADOR', 'LA CANDELARIA', 'LOCALES COMERCIALES 2 Y 3, LOCALES MEZZANINAS 2 Y 3 Y TERRAZAS ANEXOS EDIF TORRE CANAIMA AV ESTE 2 L', 'EDIF TORRE CANAIMA LOCALES  2 Y 3, LOCALES MEZZANI', '1', ''),
('64', '64', 'VINCENZO ', 'MORONE MIGNOLI', 'V', '9487074', 'V-09487074-3', '', '02125456405', '04140358539', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'SANTA ROSALIA', 'AV TERESA DE LA PARRA EDF LUCKY PISO 4 APTO 13 URB SANTA MONICA ZONA POSTAL 1040', 'AV PAEZ EDIF. PUENTE HIERRO EL PARAISO PARROQUIA S', '1', ''),
('71', 'P-01-ANTONIO LORENZO  PEREIRA MARQUEZ', 'ANTONIO LORENZO ', 'PEREIRA MARQUEZ', '', '10335493', 'V-10335492-3', '', '02127306034', '', '', '0', '', '', 'QNTA HAVE 2DA CALLE EL MIIRADOR URB LA CAMPIÑA CARACAS ', 'QUINTA HAVE ', '', ''),
('72', '72', 'MARIA MERCEDES ', 'ALARCON CASTRO', 'V', '8081566', '', '', '', '+34671694888', 'NMALARCONC1964@GMAIL', 'DISTRITO CAPITAL', 'LIBERTADOR', 'EL RECREO', 'APARTAMENTO 81 -A EDIF RESD SAN RAFAEL II  AV CARONI ENTRE AV BARUTA Y CALLE TACAGUA URB BELLO MONTE', 'EDIF SAN RAFAEL II LOCAL 81-A', '1', ''),
('72-A', 'P-01-ANTONIO LORENZO  PEREIRA MARQUEZ', 'ANTONIO LORENZO ', 'PEREIRA MARQUEZ', '', '10335492', 'V-10335492-3', '', '02127306034', '', '', '0', '', '', 'QNTA CARMEN EN LA 2DA CALLE EL MIRADOR URB LA CAMPIÑA CARACAS ', 'QUINTA EL CARMEN', '', ''),
('73', '73', 'EDGARDO', 'RIVAS SOSA', 'V', '1754913', 'V017549134', '', '02128606046', '04127304550', 'edgarrisosa@gmail.co', 'DISTRITO CAPITAL', 'LIBERTADOR', 'EL RECREO', 'QUINTA COQUITO AV EL EMPALME  URB EL BOSQUE CARACAS', 'QUINTA COQUITO ', '1', ''),
('78', '78', 'ERNESTO', ' RIZZO', 'E', '281324', 'E2813249', '', '02129868883', '04142634567', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'LA CANDELARIA', 'EDIF DON VICENTE PASAJE EL PORVENIR ESQ SANTO TOMAS A SAN JOSE ', 'EDIF DON VICENTE ', '1', ''),
('79', '79', 'ERNESTO ', 'RIZZO', 'E', '281324', 'E2813249', '', '02129868883', '04142634567', '', 'LA GUAIRA', 'VARGAS', 'MACUTO', 'EDIF PUNTA BRISA PRIMERA TRANSVERSAL LAS QUINCE LETRAS MACUTO ESTADO VARGAS ', 'EDIF PUNTA BRISAS APTO 12-A', '1', ''),
('84', '84', 'SESSA GIORGIO ', 'VITO', 'V', '6144576', 'V-06144576-1', '', '00390679844105', '0039332478560', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'SANTA ROSALIA', 'CARACAS PARROQUIA SANtA ROSALIA URB LOS ROSALES AV NUEVA GRANADA ', 'EDIF PALATINO AT 3C MONTALBAN CARACAS', '1', ''),
('85', '85', 'VITO ', 'SESSA GIORGIO ', 'V', '6144576', 'V-06144576-1', '', '00390679844105', '0039332478560', '', 'DISTRITO CAPITAL', 'LIBERTADOR', 'SAN PEDRO', 'QUINTA VICTORIA N 19 AV NUEVA GRANADA URB LOS ROSALES CARACAS ', 'QUINTA VICTORIA N. 19', '1', ''),
('90', 'P-01-AGUSTIN  SIVERIO ALVAREZ', 'AGUSTIN ', 'SIVERIO ALVAREZ', '', '7101230', 'E007012309', '', '04123721010', '', '', '16', '195', '195', 'LOCAL19 EDIF CENTRO CARACAS UBICADO EN SUR 10 ANGELITOS A QUEBRADOS PARROQUIA SAN JUAN PB DEL EDIF C', 'EDIF CENTRO CARACAS LOCAL 19 ', '', ''),
('91', '91', 'JOSE ', 'SILVERIO ALVAREZ', '', '', '', '', '', '', '', 'MIRANDA', 'CARRIZAL', 'CARRIZAL', 'CALLEJON DON VICTOR CARRIZAL EDO MIRANDA', 'TERRENO CASA N 10', '1', ''),
('93', '93', 'ENRIQUE', ' SOTO MAGDALENA', 'V', '4441129', 'V044411292', '', '02127815625', '', 'aesotopresas@hotmail', 'DISTRITO CAPITAL', 'LIBERTADOR', 'EL RECREO', 'QUINTA YOLANDA AV PRINCIPAL LAS PALMAS CON AV LOS APAMATES URB LA FLORIDA PARROQUIA EL RECREO MUNICI', 'QUINTA YOLANDA ', '1', ''),
('94', '94', 'ENRIQUE ', 'SOTO MAGDALENA', 'V', '4441129', 'V044411292', '', '0212-7815625', '', 'aesotopresas@hotmail', 'DISTRITO CAPITAL', 'LIBERTADOR', 'EL RECREO', 'APTO 12-C PISO 4 EDIF RUBENS EN LA INTERSECCION DE LA PRIMERA TRANSVERSAL Y PRIMERA CALLE DE LA URB ', 'EDIF RUBENS APTO 12-C  PISO 4', '1', ''),
('97', 'P-01-ANTONIO  SOUZZI BLASUCCI', 'ANTONIO', ' SOUZZI BLASUCCI', '', '980480', 'E-009804806', '', '02125770520', '', '', '0', '', '', 'EDIF DORAL CARACAS PISO PB SECTOR LA CANDELARIA ESQ PUENTE ANAUCO Y TEATRO CARACAS', 'EDIF DORAL CARACAS PISO PB', '', ''),
('98', 'P-01-ANTONIO  SOUZZI BLASUCCI', 'ANTONIO', ' SOUZZI BLASUCCI', '', '980480', 'E-009804806', '', '02125770520', '', '', '0', '', '', 'LOCAL COMERCIAL B-1 EDIF SOROCAIMA PB DE LA AV PANTEON Y GALIPAN PARROQUIA LA CANDELARIA ', 'EDIF SOROCAIMA ', '', '');

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
('1', 'PJ-01-ANGIOMAR S.R.L', 'ANGIOMAR S.R.L', 'E007012309', 'COMERCIO ', 'CALLE NORTE ENTRE LA ESQ DE PONCERES A ESCALINATA ', '', 'ISABELLAMORALES@GMAIL.COM/ JORGE.MORALES'),
('115', '115', 'INVERSIONS MARARY, C.A ', 'J-00176302-3', 'COMERCIO ', 'EDIF JB LOCAL SOTANO,LOCAL 1 LOCAL 2 OFI 1-A OFI 1', '0212-730-13-98/', 'CORPORACIONMONAZOMARARAY@GMAIL.COM / MON'),
('135', '135', 'INVERSIONES GUINIMA, C.A', 'J-00223193-9', 'RESD. COMERCIAL ', 'RESD. PIEDRAS BLANCAS URB SAN ROMAN CARACAS PISO 2', '0212-262-00-10/', 'VIRGILIOAVILAVIVAS@GMAIL.COM'),
('141', '141', 'INVERSIONES CALDAS ALTER,C.A', '', 'RESD. COMERCIAL ', 'EDIF KAPADARE LA CANDELARIA AV ESTE 2 LOS CAOBOS ', '/', ''),
('17', 'PJ-03-CORIBAITA C.A', 'CORIBAITA C.A', 'J-00082011-2', 'RESD. COMERCIAL ', 'EDIF CORIBAITA AV LOS APAMATES LA FLORIDA CARACAS', '', 'MARIANOLAVARRIA@GMAIL.COM/ RODRIGUEZOLAV'),
('20', '20', 'CONDOMINIO EDIF MENE GRANDE I Y II', 'J-31398753-0', 'COMERCIO ', 'AV FRANCISCO DE MIRANDA CON AV ANDRES BELLO EDIF M', '4162177844/0412', 'MAXIMINOMF@YAHOO.COM / JMALDONADO1946@HO'),
('34', '34', 'INVERSIONES BRUGADON C.A ', 'J-00348550-0', 'CASA QUINTA ', 'CASA QNTA SAN FRANCISCO AV LOS HUERTOS URB LA CAMP', '0212-730-13-98/', 'GRUPOBJPA2000@HOTMAIL.COM'),
('35', '35', 'INVERSIONES BRUGADON C.A ', 'J-00348550-0', 'CASA QUINTA ', 'QUINTA SAN FRANCISCO AV LOS HUERTOS URB LA CAMPIÑA', '0212-730-13-98/', 'GRUPOBJPA2000@HOTMAIL.COM'),
('36', '36', 'SUCESION ISSAC KIZER ZONENSHEIN', 'J-29957418-0', 'RESD. COMERCIAL ', 'EDIF TACAGUA AV. LECUNA URB. EL CONDE TORRE OESTE ', '/0424-2659093', 'FANKIZMAN@GMAIL.COM'),
('43', '43', 'INVERSIONES ALISASU2    C.A', 'J-31240781-6', 'COMPRA Y VENTAS DE INMUEBLES ', 'EDIF EL TRIANGULO ESQ CALLE 6 CON CALLE 9 LA URBIN', '0212-2849591/', 'SUSANA1956@HOTMAIL.COM'),
('48', '48', 'INVERSIONES BRUGADON C.A ', 'J-00348550-0', 'CASA QUINTA ', 'QUINTA BETINA AV LOS HUERTOS URB LA CAMPIÑA AL NOR', '0212-730-13-98/', 'GRUPOBJPA2000@HOTMAIL.COM'),
('53', '53', 'SUCESION RODRIGUEZ MACHADO', 'J-413017121', 'COMERCIO ', 'CASA AVILANES A RIOS ESQ COLISEO A CORAZON DE JESU', '0212-9935664/04', 'MARIANOLAVARRIA@GMAIL.COM/ RODRIGUEZOLAV'),
('54', '54', 'INVERSIONES SOCAVIGA C.A ', 'J-00271004-7', 'RESD. COMERCIAL ', 'QUINTA TERESA SEGUNDA AV EL MIRADOR CON CALLE LA E', '0212-730-13-98/', 'GRUPOBJPA2000@HOTMAIL.COM'),
('56', '56', 'INVERSIONES 4444', 'J-00199907-8', 'RESD. COMERCIAL ', 'EDIF FRACOSTA CALLE LOS CACIQUES AL FINAL DE LA AV', '0212-2579748/', 'LFDCC@GMAIL.COM'),
('60', 'PJ-10-JUNTA DE CONDOMINIO CENTRO PARQUE CARACA', 'JUNTA DE CONDOMINIO CENTRO PARQUE CARACA', 'J-30862753-4', 'COMERCIO ', 'CENTRO PARQUE CARACAS Y KIOSKO 1-AB. 2-AB, 3-AB 4-', '', 'JUNTACONDOMINIOPARQUECARACAS@GMAIL.COM'),
('7', '7', 'CORPARACION MONAZOR C.A', 'J-000317592-7', 'RESD. COMERCIAL ', 'EDIF ABEL AV MIRADOR PUERTA QUINTA MOÑAMOY URB LA ', '0212-3104626/41', 'CORPORACIONMONAZOMARARAY@GMAIL.COM / MON'),
('70', '70', 'INVERSIONES 4444', 'J-00199907-8', 'RESD. COMERCIAL ', 'EDIF PARQUE CARABOBO PLAZA LOCAL PB NUMERO C-4 AV ', '0212-2579748/', 'LFDCC@GMAIL.COM'),
('75', '75', 'SUCESION CARLOS ROCA CASTRO', 'J-4107748-0', 'COMERCIO ', 'AV JOSE ANTONIO PAEZ DEL PARAISO EDIF A PISO 6 APT', '2129753689/0424', 'CORREODEROSAURA@GMAIL.COM'),
('95', '95', 'RODRIGUEZ MACHADO SUCN', 'J-413017121', 'RESD. COMERCIAL ', 'EDIF 47 ESQ DE COLISEO Y CORAZON DE JESUS CALLE ES', '0212-9935664/04', 'MARIANOLAVARRIA@GMAIL.COM/ RODRIGUEZOLAV'),
('96', '96', 'RODRIGUEZ MACHADO SUCN', 'J-413017121', 'RESD. COMERCIAL ', 'EDIF N 12 ESQ DE SOCORRO A PLAZA ESPAÑA PUENTE AV ', '0212-9935664/04', 'MARIANOLAVARRIA@GMAIL.COM/ RODRIGUEZOLAV'),
('98', '98', 'INVERSIONS NAPLIS C.A ', 'J-00262137-0', 'RESD. COMERCIAL ', 'CALLE EL MIRADOR URB LA CAMPIÑA CARACAS ', '0212-730-60-34/', '');

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

--
-- Volcado de datos para la tabla `tipo_inmueble`
--

INSERT INTO `tipo_inmueble` (`id_tipo`, `nom_tipo`) VALUES
('AP', 'Apartamento'),
('CA', 'Casa'),
('ED', 'Edificio'),
('LO', 'Local'),
('QU', 'Quinta'),
('TE', 'Terreno');

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
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`cod_cont`);

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
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_prop`);

--
-- Indices de la tabla `propietario_juridico`
--
ALTER TABLE `propietario_juridico`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
