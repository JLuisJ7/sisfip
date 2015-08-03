-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2015 a las 01:02:01
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sisfip`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admcatalogo`
--

CREATE TABLE IF NOT EXISTS `admcatalogo` (
  `ide_elemento` int(10) unsigned NOT NULL,
  `ide_grupo` int(10) unsigned NOT NULL,
  `des_nombre` varchar(250) NOT NULL,
  `ide_estado` char(1) NOT NULL,
  `des_usu_registra` varchar(250) DEFAULT NULL,
  `fec_registra` datetime DEFAULT NULL,
  `des_usu_modifica` varchar(250) DEFAULT NULL,
  `fec_modifica` datetime DEFAULT NULL,
  `cod_sunat` varchar(10) DEFAULT NULL,
  `des_abrev` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admcatalogo`
--

INSERT INTO `admcatalogo` (`ide_elemento`, `ide_grupo`, `des_nombre`, `ide_estado`, `des_usu_registra`, `fec_registra`, `des_usu_modifica`, `fec_modifica`, `cod_sunat`, `des_abrev`) VALUES
(1, 1, 'ADMINISTRADOR', '1', 'lalipazaga@sismima.com', '2015-04-18 21:46:25', NULL, NULL, NULL, NULL),
(2, 2, 'MODULO DE VENTAS', '1', 'lalipazaga@sismima.com', '2015-04-18 21:54:55', NULL, NULL, NULL, NULL),
(3, 2, 'MODULO DE COMPRAS', '1', 'lalipazaga@sismima.com', '2015-04-18 21:54:57', NULL, NULL, NULL, NULL),
(4, 2, 'CONTROL DE FACTURACION', '1', 'lalipazaga@sismima.com', '2015-04-18 21:54:59', NULL, NULL, NULL, NULL),
(5, 2, 'CONTROL DE ALMACEN', '1', 'lalipazaga@sismima.com', '2015-04-18 21:55:00', NULL, NULL, NULL, NULL),
(6, 2, 'MODULO DE PERSONAL', '1', 'lalipazaga@sismima.com', '2015-04-18 21:55:02', NULL, NULL, NULL, NULL),
(7, 2, 'MODULO DE COTIZACIONES', '1', 'lalipazaga@sismima.com', '2015-04-18 21:55:04', NULL, NULL, NULL, NULL),
(8, 2, 'CONSULTA DE REPORTES', '1', 'lalipazaga@sismima.com', '2015-04-18 21:55:05', NULL, NULL, NULL, NULL),
(9, 2, 'SEGURIDAD', '1', 'lalipazaga@sismima.com', '2015-04-18 21:55:08', NULL, NULL, NULL, NULL),
(10, 3, 'DOC. NACIONAL DE IDENTIDAD', '1', 'lalipazaga@sismima.com', '2015-04-19 14:00:08', NULL, NULL, '01', 'D.N.I.'),
(11, 3, 'CARNE DE EXTRANJERIA', '1', 'lalipazaga@sismima.com', '2015-04-19 14:00:08', NULL, NULL, '04', 'C.EX.'),
(12, 4, 'PERSONA NATURAL', '1', 'lalipazaga@sismima.com', '2015-04-19 23:53:25', NULL, NULL, NULL, NULL),
(13, 4, 'PERSONA JURIDICA', '1', 'lalipazaga@sismima.com', '2015-04-19 23:54:29', NULL, NULL, NULL, NULL),
(14, 3, 'REG. UNICO DE CONTRIBUYENTES', '1', 'lalipazaga@sismima.com', '2015-04-20 02:13:16', NULL, NULL, '06', 'R.U.C.'),
(15, 3, 'PASAPORTE', '1', 'lalipazaga@sismima.com', '2015-04-20 02:13:28', NULL, NULL, '07', 'PAS.'),
(16, 3, 'PARTIDA DE NACIMIENTO', '1', 'lalipazaga@sismima.com', '2015-04-20 02:14:42', NULL, NULL, '11', 'PART. NAC.'),
(17, 5, 'USUARIO', '1', 'lalipazaga@sismima.com', '2015-04-21 01:11:14', NULL, NULL, NULL, NULL),
(18, 5, 'EMPLEADO', '1', 'lalipazaga@sismima.com', '2015-04-21 01:13:19', NULL, NULL, NULL, NULL),
(19, 5, 'PROVEEDOR', '1', 'lalipazaga@sismima.com', '2015-04-21 01:16:11', NULL, NULL, NULL, NULL),
(20, 5, 'CLIENTE', '1', 'lalipazaga@sismima.com', '2015-04-21 01:16:48', NULL, NULL, NULL, NULL),
(21, 6, 'MASCULINO', '1', 'lalipazaga@sismima.com', '2015-04-21 01:16:48', NULL, NULL, NULL, NULL),
(22, 6, 'FEMENINO', '1', 'lalipazaga@sismima.com', '2015-04-21 01:16:48', NULL, NULL, NULL, NULL),
(23, 7, 'SOLTERO(A)', '1', 'lalipazaga@sismima.com', '2015-04-21 17:07:18', NULL, NULL, NULL, NULL),
(24, 7, 'CASADO(A)', '1', 'lalipazaga@sismima.com', '2015-04-21 17:07:32', NULL, NULL, NULL, NULL),
(25, 7, 'VIUDO(A)', '1', 'lalipazaga@sismima.com', '2015-04-21 17:07:49', NULL, NULL, NULL, NULL),
(26, 7, 'CONVIVIENTE', '1', 'lalipazaga@sismima.com', '2015-04-21 17:07:49', NULL, NULL, NULL, NULL),
(27, 7, 'DIVORCIADO(A)', '1', 'lalipazaga@sismima.com', '2015-04-21 17:08:12', NULL, NULL, NULL, NULL),
(28, 7, 'SEPARADO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:08:19', NULL, NULL, NULL, NULL),
(29, 8, 'SECUNDARIA COMPLETA', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(30, 8, 'SUPERIOR TECNICO COMPLETO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(31, 8, 'SUPERIOR TECNICO INCOMPLETO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(32, 8, 'SUPERIOR UNIVERSITARIO COMPLETO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(33, 8, 'SUPERIOR UNIVERSITARIO INCOMPLETO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(34, 8, 'PRIMARIA', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(35, 8, 'DIPLOMATURA', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(36, 8, 'MAGISTER', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(37, 8, 'DOCTORADO', '1', 'lalipazaga@sismima.com', '2015-04-21 17:11:22', NULL, NULL, NULL, NULL),
(38, 2, 'Reutilizables', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(39, 2, 'Cotización', '1', '', NULL, NULL, NULL, NULL, NULL),
(40, 2, 'SERVICIO', '1', '', NULL, NULL, NULL, NULL, NULL),
(41, 2, 'SOLICITUD', '1', '', NULL, NULL, NULL, NULL, NULL),
(42, 2, 'ORDEN DE TRABAJO', '1', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admgrcatalogo`
--

CREATE TABLE IF NOT EXISTS `admgrcatalogo` (
  `ide_grupo` int(10) unsigned NOT NULL,
  `des_nombre` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admgrcatalogo`
--

INSERT INTO `admgrcatalogo` (`ide_grupo`, `des_nombre`) VALUES
(1, 'TIPO DE USUARIO'),
(2, 'MENU'),
(3, 'TIPO DE DOCUMENTO'),
(4, 'TIPO DE PERSONA'),
(5, 'TIPO CONDICION'),
(6, 'SEXO'),
(7, 'ESTADO CIVIL'),
(8, 'GRADO DE INSTRUCCION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admopcion`
--

CREATE TABLE IF NOT EXISTS `admopcion` (
  `ide_opcion` int(10) unsigned NOT NULL,
  `ide_modulo` int(10) unsigned NOT NULL,
  `des_nombre` varchar(250) NOT NULL,
  `des_ruta` varchar(250) DEFAULT NULL,
  `ind_padre` int(10) unsigned NOT NULL,
  `subPadre` varchar(3) DEFAULT NULL,
  `ide_estado` char(1) NOT NULL,
  `des_usu_registra` varchar(250) DEFAULT NULL,
  `fec_registra` datetime DEFAULT NULL,
  `des_usu_modifica` varchar(250) DEFAULT NULL,
  `fec_modifica` datetime DEFAULT NULL,
  `des_icon` varchar(45) DEFAULT NULL,
  `ind_orden` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admopcion`
--

INSERT INTO `admopcion` (`ide_opcion`, `ide_modulo`, `des_nombre`, `des_ruta`, `ind_padre`, `subPadre`, `ide_estado`, `des_usu_registra`, `fec_registra`, `des_usu_modifica`, `fec_modifica`, `des_icon`, `ind_orden`) VALUES
(1, 2, 'VENTAS', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-18 22:04:06', NULL, NULL, 'tags', 1),
(2, 2, 'Boletas', 'ventas/boletas', 1, '0', '1', 'lalipazaga@sismima.com', '2015-04-18 22:07:13', NULL, NULL, '', 0),
(3, 3, 'COMPRAS', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-18 22:10:18', NULL, NULL, 'shopping-cart', 2),
(4, 3, 'REGISTRO DE COMPRAS', 'compras/registraCompra', 3, '0', '1', 'lalipazaga@sismima.com', '2015-04-18 22:10:58', NULL, NULL, '', 0),
(5, 2, 'Clientes', 'ventas/listadoClientes', 1, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 05:23:58', NULL, NULL, '', 0),
(6, 3, 'Proveedores', 'compras/listadoProveedores', 3, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 18:06:58', NULL, NULL, '', 0),
(7, 5, 'Cotizacion', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 18:15:58', NULL, NULL, 'tasks', 3),
(8, 5, 'Productos', 'almacen/listadoProductos', 7, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(9, 9, 'SEGURIDAD', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 21:11:21', NULL, NULL, 'lock', 10),
(10, 9, 'PARAMETROS GENERALES', 'seguridad/parametrosGenerales', 9, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 21:12:13', NULL, NULL, NULL, 0),
(11, 6, 'PERSONAL', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 22:32:19', NULL, NULL, 'users', 4),
(12, 6, 'Empleados', 'personal/listadoEmpleados', 11, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 22:34:19', NULL, NULL, NULL, 0),
(13, 9, 'Usuarios', 'seguridad/listaUsuarios', 9, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 23:41:11', NULL, NULL, NULL, NULL),
(14, 9, 'REGISTRA PERSONAS', 'seguridad/listadoPersonas', 9, '0', '1', 'lalipazaga@sismima.com', '2015-04-26 05:30:18', NULL, NULL, NULL, NULL),
(15, 2, 'Generar Factura', 'ventas/registrarFactura', 1, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(16, 2, 'Facturas', 'ventas/facturas', 1, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(17, 5, 'Inventario', 'almacen/Inventario', 7, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(18, 3, 'Ordenes de Compra', 'compras/ordenesCompra', 3, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(19, 38, 'UTILITARIOS', '--', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'wrench', 6),
(20, 38, 'Parametros Generales', 'utilitarios/parametrosGenerales', 19, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(21, 8, 'REPORTES', '--', 0, '0', '1', 'admin@sismima', '2015-06-07 00:00:00', NULL, NULL, 'bar-chart', 8),
(22, 8, 'Ventas', '--', 21, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 8, 'Compras', '--', 21, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 8, 'Cotizacionss', '--', 21, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 8, 'Clientes', 'reportes/clientes', 22, '22', '1', NULL, NULL, NULL, NULL, 'shopping-cart', NULL),
(26, 8, 'Productos', 'reportes/almacen', 24, '24', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 8, 'Proveedores', 'reportes/proveedores', 23, '23', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 8, 'Facturas', 'reportes/facturas', 22, '22', '1', NULL, NULL, NULL, NULL, 'shopping-cart', NULL),
(29, 8, 'Ordenes de Compra', 'reportes/ordenescompra', 23, '23', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 9, 'Registrar Usuario', 'seguridad/registrarUsuarios', 9, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 23:41:11', NULL, NULL, NULL, NULL),
(31, 5, 'Productos', 'almacen/Producto', 7, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(32, 5, 'Servicio', 'almacen/Servicio', 7, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(33, 5, 'Registrar Cotización', 'almacen/Cotizacion', 7, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(34, 5, 'Cotizaciones', 'almacen/Cotizaciones', 7, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(35, 39, 'COTIZACIÓN', '', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'list-alt', 1),
(36, 39, 'Nueva Cotización', 'cotizacion/registrar', 35, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(37, 40, 'SERVICIOS', 'servicio/index', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'list-alt', 1),
(38, 41, 'SOLICITUD', '', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'list-alt', 1),
(39, 39, 'Cotizaciones', 'cotizacion/cotizaciones', 35, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(40, 41, 'Nueva solicitud', 'solicitud/registrar', 38, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(41, 42, 'ORDEN DE TRABAJO', '', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'list-alt', 1),
(42, 41, 'Nueva Orden de Trabajo', 'orden/registrar', 41, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admrol`
--

CREATE TABLE IF NOT EXISTS `admrol` (
  `ide_rol` int(10) unsigned NOT NULL,
  `des_nombre` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admrol`
--

INSERT INTO `admrol` (`ide_rol`, `des_nombre`) VALUES
(1, 'Atencion al cliente'),
(2, 'Director Tecnico'),
(3, 'GERENTE DE COMPRAS'),
(4, 'GERENTE DE ALMACEN'),
(5, 'GERENTE DE RRHH'),
(6, 'VISITANTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admrolopcion`
--

CREATE TABLE IF NOT EXISTS `admrolopcion` (
  `ide_rolopcion` int(10) unsigned NOT NULL,
  `ide_opcion` int(10) unsigned NOT NULL,
  `ide_rol` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admrolopcion`
--

INSERT INTO `admrolopcion` (`ide_rolopcion`, `ide_opcion`, `ide_rol`) VALUES
(45, 30, 1),
(47, 32, 1),
(48, 33, 1),
(50, 34, 1),
(51, 34, 2),
(52, 30, 2),
(53, 7, 2),
(54, 35, 1),
(55, 36, 1),
(56, 37, 1),
(57, 38, 1),
(58, 39, 1),
(59, 40, 1),
(60, 41, 1),
(61, 42, 1),
(62, 42, 2),
(63, 41, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `doc_ident` varchar(12) NOT NULL,
  `atencion_a` varchar(45) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `correo` varchar(25) DEFAULT NULL,
  `referencia` varchar(200) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT '0',
  `distrito` varchar(20) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombres`, `doc_ident`, `atencion_a`, `direccion`, `telefono`, `correo`, `referencia`, `fecha_registro`, `estado`, `distrito`, `provincia`) VALUES
(1, 'Jose Luis Ayala', '71886624', 'Umayux group', 'av lima 790', '944659233', 'abcd@gmail.com', 'si referencia alguna', '2015-07-30 04:15:16', '0', NULL, ''),
(2, 'Juan Luis PEREx', '71886625', 'Juan Luis PEREx', 'Juan Luis PEREx', 'Juan Luis ', 'Juan Lui', 'Juan Luis PEREx', '2015-07-30 04:40:09', '0', NULL, ''),
(3, 'Juan Luis PEREx', '71886625', 'Juan Luis PEREx', 'Juan Luis PEREx', 'Juan Luis ', 'Juan Lui', 'Juan Luis PEREx', '2015-07-30 04:40:35', '0', NULL, ''),
(4, '12345678912', '12345678912', '12345678912', '12345678912', '12345678912', '12345678912', '12345678912', '2015-07-31 18:13:40', '0', NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE IF NOT EXISTS `cotizacion` (
  `idCotizacion` int(11) unsigned NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idCliente` int(11) NOT NULL,
  `cond_tecnica` varchar(200) DEFAULT NULL,
  `detalle_servicios` varchar(200) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `fecha_Entrega` date DEFAULT NULL,
  `cant_Muestra_necesaria` int(11) DEFAULT NULL,
  `estado` varchar(12) DEFAULT NULL,
  `muestra` varchar(30) NOT NULL DEFAULT '',
  `eliminado` char(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`idCotizacion`, `fecha_registro`, `idCliente`, `cond_tecnica`, `detalle_servicios`, `total`, `fecha_Entrega`, `cant_Muestra_necesaria`, `estado`, `muestra`, `eliminado`) VALUES
(1, '2015-07-30 04:15:16', 1, 'Condiciones Técnicas Especiales Aplicables a los servicios:', 'Condiciones Técnicas Especiales Aplicables a los servicios:', '677.00', '2015-07-31', 7, NULL, 'Petroleo', '0'),
(2, '2015-07-30 04:40:09', 2, 'Juan Luis PEREx', 'Juan Luis PEREx', '677.00', '2015-07-31', 1, NULL, 'Juan Luis PEREx', '0'),
(3, '2015-07-30 04:40:35', 3, 'Juan Luis PEREx', 'Juan Luis PEREx', '519.00', '2015-07-31', 1, NULL, 'Juan Luis PEREx', '0'),
(4, '2015-07-31 18:09:43', 1, '       \n         ', '       \n         ', '603.00', '2015-08-02', 7, NULL, 'Nitrogeno', '0'),
(5, '2015-07-31 18:13:40', 4, '12345678912', '12345678912', '1271.00', '2015-08-02', 1, NULL, '12345678912', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecotizacion`
--

CREATE TABLE IF NOT EXISTS `detallecotizacion` (
  `idServicio` int(11) NOT NULL,
  `idCotizacion` int(11) unsigned NOT NULL DEFAULT '0',
  `Muestra` varchar(30) DEFAULT NULL,
  `recomendado` char(1) DEFAULT NULL,
  `acreditado` char(2) DEFAULT 'NO',
  `estado` char(1) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallecotizacion`
--

INSERT INTO `detallecotizacion` (`idServicio`, `idCotizacion`, `Muestra`, `recomendado`, `acreditado`, `estado`, `precio`) VALUES
(1, 1, 'Petroleo', NULL, 'NO', NULL, '264.00'),
(3, 1, 'Petroleo', NULL, 'NO', NULL, '413.00'),
(4, 2, 'Juan Luis PEREx', NULL, 'NO', NULL, '106.00'),
(6, 2, 'Juan Luis PEREx', NULL, 'NO', NULL, '244.00'),
(1, 5, '12345678912', NULL, 'NO', NULL, '264.00'),
(6, 5, '12345678912', NULL, 'NO', NULL, '244.00'),
(5, 5, '12345678912', NULL, 'NO', NULL, '0.00'),
(7, 5, '12345678912', NULL, 'NO', NULL, '244.00'),
(4, 5, '12345678912', NULL, 'NO', NULL, '106.00'),
(3, 5, '12345678912', NULL, 'NO', NULL, '413.00'),
(2, 4, 'Nitrogeno', NULL, 'NO', NULL, '190.00'),
(3, 4, 'Nitrogeno', NULL, 'NO', NULL, '413.00'),
(4, 3, 'Juan Luis PEREx', NULL, 'NO', NULL, '106.00'),
(3, 3, 'Juan Luis PEREx', NULL, 'NO', NULL, '413.00'),
(5, 3, 'Juan Luis PEREx', NULL, 'NO', NULL, '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesolicitud`
--

CREATE TABLE IF NOT EXISTS `detallesolicitud` (
  `idServicio` int(11) NOT NULL,
  `nroSolicitud` int(10) unsigned NOT NULL,
  `acreditado` char(2) DEFAULT 'NO',
  `estado` char(1) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `idEmpleado` int(10) unsigned NOT NULL,
  `apePat` varchar(50) DEFAULT NULL,
  `apeMat` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `DNI` char(8) DEFAULT NULL,
  `telefono` char(9) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `fechaReg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `apePat`, `apeMat`, `nombres`, `fechaNac`, `DNI`, `telefono`, `sexo`, `fechaReg`, `estado`) VALUES
(1, '.', '.', 'Atención al cliente', '1996-06-07', '71886624', '944659233', 'M', '2015-05-24 13:26:06', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestra`
--

CREATE TABLE IF NOT EXISTS `muestra` (
  `idMuestra` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `identificacion` varchar(45) DEFAULT NULL,
  `Cant_Muestra` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT '0',
  `presentacion` varchar(100) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `muestra`
--

INSERT INTO `muestra` (`idMuestra`, `idCliente`, `nombre`, `marca`, `identificacion`, `Cant_Muestra`, `estado`, `presentacion`, `observaciones`) VALUES
(1, 1, 'Nitrogeno', 'Nitrogeno', 'Nitrogeno', 7, '0', 'Nitrogeno', 'NitrogenoNitrogeno'),
(2, 1, 'Nitrogeno', 'Nitrogeno', 'Nitrogeno', 7, '0', 'Nitrogeno', 'NitrogenoNitrogeno'),
(3, 1, 'Nitrogeno', 'Nitrogeno', 'Nitrogeno', 7, '0', 'Nitrogeno', 'NitrogenoNitrogeno'),
(4, 3, 'Juan Luis PEREx', 'Juan Lui', 'Juan Lui', 1, '0', 'Juan Lui', 'Juan LuiJuan Lui'),
(5, 1, 'Petroleo', 'Petroleo', 'Petroleo', 7, '0', 'Petroleo', 'Petroleo\n    '),
(6, 1, 'Petroleo', 'Petroleo', 'Petroleo', 7, '0', 'Petroleo', 'Petroleo\n    '),
(7, 1, 'Petroleo', '', '', 7, '0', '', '       \n    '),
(8, 1, 'Petroleo', '', '', 7, '0', '', '       \n    '),
(9, 1, 'Petroleo', '', '', 7, '0', '', '       \n    '),
(10, 1, 'Petroleo', '', '', 7, '0', '', '       \n    '),
(11, 1, 'Petroleo', '', '', 7, '0', '', '       \n    ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `idServicio` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `metodo` varchar(45) DEFAULT NULL,
  `tiempo_entrega` int(11) DEFAULT NULL,
  `cantM_x_ensayo` int(11) DEFAULT NULL,
  `tarifa` decimal(8,2) DEFAULT NULL,
  `tarifa_Acred` decimal(8,2) DEFAULT '0.00',
  `detalle` varchar(200) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`idServicio`, `descripcion`, `metodo`, `tiempo_entrega`, `cantM_x_ensayo`, `tarifa`, `tarifa_Acred`, `detalle`, `fecha_registro`, `estado`) VALUES
(1, 'Agua por Destilación', 'D95-05 ?1', 1, 400, '264.00', '0.00', '\n         ', '2015-07-22 13:02:08', '0'),
(2, 'Agua y Sedimentos', 'D1796-11', 1, 400, '190.00', '0.00', '       \n         ', '2015-07-22 13:03:23', '0'),
(3, 'Azufre Total', 'D4294-10', 1, 50, '413.00', '0.00', '\n      \n         ', '2015-07-22 13:33:46', '0'),
(4, 'Color ASTM', 'D1500-12', 1, 50, '106.00', '0.00', '', '2015-07-22 13:43:24', '0'),
(5, 'Color Comercial', 'Visual', 1, 50, '0.00', '0.00', 'este servicio no se cobra', '2015-07-22 16:37:47', '0'),
(6, 'Cenizas', 'D482-07', 3, 400, '244.00', '0.00', '       \n         ', '2015-07-22 16:38:23', '0'),
(7, 'Corrosión Lámina de Cobre ', 'D130-12', 1, 100, '244.00', '0.00', '', '2015-07-22 16:55:21', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sispersona`
--

CREATE TABLE IF NOT EXISTS `sispersona` (
  `ide_persona` int(10) unsigned NOT NULL,
  `des_nombres` varchar(250) DEFAULT NULL,
  `des_apepat` varchar(250) DEFAULT NULL,
  `des_apemat` varchar(250) DEFAULT NULL,
  `nro_documento` varchar(20) NOT NULL,
  `des_telefono` char(9) DEFAULT NULL,
  `des_correo` varchar(45) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `ide_estcivil` char(1) DEFAULT NULL,
  `fec_nacimiento` date DEFAULT NULL,
  `Sueldo` decimal(10,2) NOT NULL,
  `ide_estado` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sispersona`
--

INSERT INTO `sispersona` (`ide_persona`, `des_nombres`, `des_apepat`, `des_apemat`, `nro_documento`, `des_telefono`, `des_correo`, `sexo`, `ide_estcivil`, `fec_nacimiento`, `Sueldo`, `ide_estado`) VALUES
(1, 'Atencion al Cliente', '', '', '71886624', '972620265', 'luisayala@hotmail.com', 'M', '1', '1987-06-03', '1000.00', '0'),
(15, 'Directo Tecnico', '', '', '12345689', '944659233', 'cesarrojas@gmail.com', 'M', '1', '1994-05-07', '1000.00', '0'),
(16, 'Cristian', 'Contreras', 'Contreras', '26598745', '222222222', 'cristian@sismima.com', 'M', '2', '1992-10-16', '3000.00', '0'),
(25, 'Carlos', 'More', 'Huamani', '12315656', '123456879', 'carlosmore@gmail.com', 'M', '1', '1993-11-01', '1300.25', '1'),
(26, 'Freddy', 'Rengifo', 'Rengifo', '12365789', '123569858', 'freddy@gmail.com', 'M', '1', '1994-05-27', '1000.00', '0'),
(27, 'oswaldo', 'martinez', 'neyra', '10236585', '123659859', 'oswaldo@gmail.com', 'M', '1', '1994-04-09', '1000.00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sisusuario`
--

CREATE TABLE IF NOT EXISTS `sisusuario` (
  `ide_usuario` int(10) unsigned NOT NULL,
  `des_usuario` varchar(50) NOT NULL,
  `des_password` varchar(50) NOT NULL,
  `ide_rol` int(10) unsigned NOT NULL,
  `ide_persona` int(10) unsigned NOT NULL,
  `correo` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sisusuario`
--

INSERT INTO `sisusuario` (`ide_usuario`, `des_usuario`, `des_password`, `ide_rol`, `ide_persona`, `correo`, `estado`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 'luisayala@hotmail.com', '1'),
(2, 'dtecnico', 'e10adc3949ba59abbe56e057f20f883e', 2, 15, 'cesarrojas@gmail.com', '1'),
(3, 'cristian', 'b08c8c585b6d67164c163767076445d6', 3, 16, 'cristian@sismima.com', '0'),
(4, 'carlosmore', 'e10adc3949ba59abbe56e057f20f883e', 3, 25, 'carlosmore@gmail.com', '0'),
(5, 'freddy', 'e10adc3949ba59abbe56e057f20f883e', 3, 26, 'freddy@gmail.com', '0'),
(6, 'oswaldo', '202cb962ac59075b964b07152d234b70', 3, 27, 'oswaldo@gmail.com', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `nroSolicitud` int(10) unsigned NOT NULL,
  `nroCotizacion` int(10) unsigned NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idMuestra` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ensayos` char(1) DEFAULT '',
  `Inspeccion` char(1) DEFAULT '',
  `muestreo` char(1) DEFAULT '',
  `otros` varchar(200) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT '0.00',
  `fecha_entrega` date NOT NULL,
  `Acreditacion` char(2) DEFAULT 'NO',
  `Contramuestras` char(2) DEFAULT 'NO',
  `observaciones` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`nroSolicitud`, `nroCotizacion`, `idCliente`, `idMuestra`, `fecha_registro`, `Ensayos`, `Inspeccion`, `muestreo`, `otros`, `total`, `fecha_entrega`, `Acreditacion`, `Contramuestras`, `observaciones`) VALUES
(1, 4, 1, 3, '2015-08-03 10:33:40', 'X', 'X', 'X', 'Nitrogeno', '603.00', '0000-00-00', 'SI', 'SI', 'NitrogenoNitrogeno'),
(2, 3, 3, 4, '2015-08-03 10:37:06', 'X', 'X', 'X', 'asdsad', '519.00', '2015-08-29', 'NO', 'NO', 'Juan LuiJuan Lui');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admcatalogo`
--
ALTER TABLE `admcatalogo`
  ADD PRIMARY KEY (`ide_elemento`);

--
-- Indices de la tabla `admgrcatalogo`
--
ALTER TABLE `admgrcatalogo`
  ADD PRIMARY KEY (`ide_grupo`);

--
-- Indices de la tabla `admopcion`
--
ALTER TABLE `admopcion`
  ADD PRIMARY KEY (`ide_opcion`);

--
-- Indices de la tabla `admrol`
--
ALTER TABLE `admrol`
  ADD PRIMARY KEY (`ide_rol`);

--
-- Indices de la tabla `admrolopcion`
--
ALTER TABLE `admrolopcion`
  ADD PRIMARY KEY (`ide_rolopcion`), ADD KEY `ide_opcion` (`ide_opcion`), ADD KEY `ide_rol` (`ide_rol`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`idCotizacion`), ADD KEY `fk_Cotizacion_Cliente` (`idCliente`);

--
-- Indices de la tabla `detallecotizacion`
--
ALTER TABLE `detallecotizacion`
  ADD KEY `fk_DetC_serv` (`idServicio`), ADD KEY `idCotizacion` (`idCotizacion`);

--
-- Indices de la tabla `detallesolicitud`
--
ALTER TABLE `detallesolicitud`
  ADD KEY `fk_DetSol_Sol` (`nroSolicitud`), ADD KEY `fk_DetSol_Serv` (`idServicio`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `muestra`
--
ALTER TABLE `muestra`
  ADD PRIMARY KEY (`idMuestra`), ADD KEY `fk_Muest_Cli` (`idCliente`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idServicio`);

--
-- Indices de la tabla `sispersona`
--
ALTER TABLE `sispersona`
  ADD PRIMARY KEY (`ide_persona`);

--
-- Indices de la tabla `sisusuario`
--
ALTER TABLE `sisusuario`
  ADD PRIMARY KEY (`ide_usuario`), ADD KEY `pk_user_rol` (`ide_rol`), ADD KEY `pk_user_persona` (`ide_persona`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`nroSolicitud`,`nroCotizacion`), ADD KEY `fk_Sol_Cot` (`nroCotizacion`), ADD KEY `fk_Sol_cli` (`idCliente`), ADD KEY `fk_Sol_muest` (`idMuestra`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admcatalogo`
--
ALTER TABLE `admcatalogo`
  MODIFY `ide_elemento` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `admgrcatalogo`
--
ALTER TABLE `admgrcatalogo`
  MODIFY `ide_grupo` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `admopcion`
--
ALTER TABLE `admopcion`
  MODIFY `ide_opcion` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `admrol`
--
ALTER TABLE `admrol`
  MODIFY `ide_rol` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `admrolopcion`
--
ALTER TABLE `admrolopcion`
  MODIFY `ide_rolopcion` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `idCotizacion` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `muestra`
--
ALTER TABLE `muestra`
  MODIFY `idMuestra` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `sispersona`
--
ALTER TABLE `sispersona`
  MODIFY `ide_persona` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `sisusuario`
--
ALTER TABLE `sisusuario`
  MODIFY `ide_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admrolopcion`
--
ALTER TABLE `admrolopcion`
ADD CONSTRAINT `admrolopcion_ibfk_1` FOREIGN KEY (`ide_opcion`) REFERENCES `admopcion` (`ide_opcion`),
ADD CONSTRAINT `admrolopcion_ibfk_2` FOREIGN KEY (`ide_rol`) REFERENCES `admrol` (`ide_rol`);

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
ADD CONSTRAINT `fk_Cotizacion_Cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallecotizacion`
--
ALTER TABLE `detallecotizacion`
ADD CONSTRAINT `detallecotizacion_ibfk_1` FOREIGN KEY (`idCotizacion`) REFERENCES `cotizacion` (`idCotizacion`),
ADD CONSTRAINT `fk_DetC_serv` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`);

--
-- Filtros para la tabla `detallesolicitud`
--
ALTER TABLE `detallesolicitud`
ADD CONSTRAINT `fk_DetSol_Serv` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`),
ADD CONSTRAINT `fk_DetSol_Sol` FOREIGN KEY (`nroSolicitud`) REFERENCES `solicitud` (`nroSolicitud`);

--
-- Filtros para la tabla `muestra`
--
ALTER TABLE `muestra`
ADD CONSTRAINT `fk_Muest_Cli` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `sisusuario`
--
ALTER TABLE `sisusuario`
ADD CONSTRAINT `pk_user_persona` FOREIGN KEY (`ide_persona`) REFERENCES `sispersona` (`ide_persona`),
ADD CONSTRAINT `pk_user_rol` FOREIGN KEY (`ide_rol`) REFERENCES `admrol` (`ide_rol`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
ADD CONSTRAINT `fk_Sol_Cot` FOREIGN KEY (`nroCotizacion`) REFERENCES `cotizacion` (`idCotizacion`),
ADD CONSTRAINT `fk_Sol_cli` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
ADD CONSTRAINT `fk_Sol_muest` FOREIGN KEY (`idMuestra`) REFERENCES `muestra` (`idMuestra`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
