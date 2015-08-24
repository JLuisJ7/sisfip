-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2015 a las 18:30:13
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

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
(17, 5, 'USUARIO', '1', 'lalipazaga@sismima.com', '2015-04-21 01:11:14', NULL, NULL, NULL, NULL),
(18, 5, 'EMPLEADO', '1', 'lalipazaga@sismima.com', '2015-04-21 01:13:19', NULL, NULL, NULL, NULL),
(19, 5, 'PROVEEDOR', '1', 'lalipazaga@sismima.com', '2015-04-21 01:16:11', NULL, NULL, NULL, NULL),
(20, 5, 'CLIENTE', '1', 'lalipazaga@sismima.com', '2015-04-21 01:16:48', NULL, NULL, NULL, NULL),
(38, 2, 'Reutilizables', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(39, 2, 'Cotización', '1', '', NULL, NULL, NULL, NULL, NULL),
(40, 2, 'SERVICIO', '1', '', NULL, NULL, NULL, NULL, NULL),
(41, 2, 'SOLICITUD', '1', '', NULL, NULL, NULL, NULL, NULL),
(42, 2, 'ORDEN DE TRABAJO', '1', '', NULL, NULL, NULL, NULL, NULL),
(43, 2, 'REPORTE DE ENSAYOS', '1', '', NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admopcion`
--

INSERT INTO `admopcion` (`ide_opcion`, `ide_modulo`, `des_nombre`, `des_ruta`, `ind_padre`, `subPadre`, `ide_estado`, `des_usu_registra`, `fec_registra`, `des_usu_modifica`, `fec_modifica`, `des_icon`, `ind_orden`) VALUES
(1, 2, 'VENTAS', '--', 0, '0', '0', 'lalipazaga@sismima.com', '2015-04-18 22:04:06', NULL, NULL, 'tags', 1),
(2, 2, 'Boletas', 'ventas/boletas', 1, '0', '0', 'lalipazaga@sismima.com', '2015-04-18 22:07:13', NULL, NULL, '', 0),
(3, 3, 'COMPRAS', '--', 0, '0', '0', 'lalipazaga@sismima.com', '2015-04-18 22:10:18', NULL, NULL, 'shopping-cart', 2),
(4, 3, 'REGISTRO DE COMPRAS', 'compras/registraCompra', 3, '0', '0', 'lalipazaga@sismima.com', '2015-04-18 22:10:58', NULL, NULL, '', 0),
(5, 2, 'Clientes', 'ventas/listadoClientes', 1, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 05:23:58', NULL, NULL, '', 0),
(6, 3, 'Proveedores', 'compras/listadoProveedores', 3, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 18:06:58', NULL, NULL, '', 0),
(7, 5, 'Cotizacion', '--', 0, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 18:15:58', NULL, NULL, 'tasks', 3),
(8, 5, 'Productos', 'almacen/listadoProductos', 7, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(9, 9, 'SEGURIDAD', '--', 0, '0', '1', 'lalipazaga@sismima.com', '2015-04-19 21:11:21', NULL, NULL, 'lock', 10),
(10, 9, 'PARAMETROS GENERALES', 'seguridad/parametrosGenerales', 9, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 21:12:13', NULL, NULL, NULL, 0),
(11, 6, 'PERSONAL', '--', 0, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 22:32:19', NULL, NULL, 'users', 4),
(12, 6, 'Empleados', 'personal/listadoEmpleados', 11, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 22:34:19', NULL, NULL, NULL, 0),
(13, 9, 'Usuarios', 'seguridad/listaUsuarios', 9, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 23:41:11', NULL, NULL, NULL, NULL),
(14, 9, 'REGISTRA PERSONAS', 'seguridad/listadoPersonas', 9, '0', '0', 'lalipazaga@sismima.com', '2015-04-26 05:30:18', NULL, NULL, NULL, NULL),
(15, 2, 'Generar Factura', 'ventas/registrarFactura', 1, '0', '0', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(16, 2, 'Facturas', 'ventas/facturas', 1, '0', '0', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(17, 5, 'Inventario', 'almacen/Inventario', 7, '0', '0', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(18, 3, 'Ordenes de Compra', 'compras/ordenesCompra', 3, '0', '0', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, NULL),
(19, 38, 'UTILITARIOS', '--', 0, '0', '0', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'wrench', 6),
(20, 38, 'Parametros Generales', 'utilitarios/parametrosGenerales', 19, '0', '0', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(21, 8, 'REPORTES', '--', 0, '0', '0', 'admin@sismima', '2015-06-07 00:00:00', NULL, NULL, 'bar-chart', 8),
(22, 8, 'Ventas', '--', 21, '1', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 8, 'Compras', '--', 21, '1', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 8, 'Cotizacionss', '--', 21, '1', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 8, 'Clientes', 'reportes/clientes', 22, '22', '0', NULL, NULL, NULL, NULL, 'shopping-cart', NULL),
(26, 8, 'Productos', 'reportes/almacen', 24, '24', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 8, 'Proveedores', 'reportes/proveedores', 23, '23', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 8, 'Facturas', 'reportes/facturas', 22, '22', '0', NULL, NULL, NULL, NULL, 'shopping-cart', NULL),
(29, 8, 'Ordenes de Compra', 'reportes/ordenescompra', 23, '23', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 9, 'Registrar Usuario', 'seguridad/registrarUsuarios', 9, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 23:41:11', NULL, NULL, NULL, NULL),
(31, 5, 'Productos', 'almacen/Producto', 7, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(32, 5, 'Servicio', 'almacen/Servicio', 7, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(33, 5, 'Registrar Cotización', 'almacen/Cotizacion', 7, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(34, 5, 'Cotizaciones', 'almacen/Cotizaciones', 7, '0', '0', 'lalipazaga@sismima.com', '2015-04-19 18:20:58', NULL, NULL, NULL, 0),
(35, 39, 'COTIZACIÓN', '', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'list-alt', 2),
(36, 39, 'Generar Cotización', 'cotizacion/registrar', 35, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(37, 40, 'SERVICIOS', 'servicio/index', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'list-alt', 1),
(38, 41, 'SOLICITUD', '', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'list-alt', 3),
(39, 39, 'Cotizaciones', 'cotizacion/cotizaciones', 35, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(40, 41, 'Nueva solicitud', 'solicitud/registrar', 38, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(41, 42, 'ORDEN DE TRABAJO', '', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'list-alt', 4),
(42, 41, 'Nueva Orden de Trabajo', 'orden/registrar', 41, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(43, 41, 'Solicitudes DT', 'solicitud/solicitudes', 38, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(44, 43, 'ENSAYOS', '', 0, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, 'list-alt', 5),
(45, 43, 'Elaborar Reporte de Ensayos', 'ensayos/generar_reporte', 44, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(46, 43, 'Elaborar Informe de Ensayos', 'ensayos/generar_informe', 44, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(47, 41, 'Ordenes de Trabajo', 'orden/ordenes', 41, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(48, 43, 'Informes de Ensayos', 'ensayos/informes', 44, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(49, 43, 'Reportes de Ensayos', 'ensayos/reportes', 44, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(50, 41, 'Ordenes de Trabajo Analista', 'orden/ordenes_analista', 41, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0),
(51, 41, 'Solicitudes Atencion al Cliente', 'solicitud/solicitudes_acliente', 38, '0', '1', 'lalipazaga@sismima.com', NULL, NULL, NULL, NULL, 0);

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
(1, 'Administrador'),
(2, 'Atencion al Cliente'),
(3, 'Director Tecnico'),
(4, 'Analista'),
(5, 'Reportes'),
(6, 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admrolopcion`
--

CREATE TABLE IF NOT EXISTS `admrolopcion` (
  `ide_rolopcion` int(10) unsigned NOT NULL,
  `ide_opcion` int(10) unsigned NOT NULL,
  `ide_rol` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

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
(63, 41, 2),
(64, 38, 2),
(65, 43, 2),
(66, 44, 1),
(67, 45, 1),
(68, 43, 1),
(69, 46, 1),
(70, 47, 1),
(71, 48, 1),
(72, 49, 1),
(73, 50, 1),
(74, 51, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombres`, `doc_ident`, `atencion_a`, `direccion`, `telefono`, `correo`, `referencia`, `fecha_registro`, `estado`, `distrito`, `provincia`) VALUES
(1, 'Jose Luis Ayala Benito', '71886624', 'Umayux group', 'av lima 790', '944659233', 'abcd@gmail.com', 'si referencia alguna', '2015-07-30 04:15:16', '0', 'dsa', 'sad'),
(2, 'Juan Luis PEREx guadalupe', '71886625', 'Juan Luis PEREx', 'Juan Luis PEREx', 'Juan Luis ', 'Juan Lui', 'Juan Luis PEREx', '2015-07-30 04:40:09', '0', '', ''),
(3, 'Juan Luis PEREx', '71886625', 'Juan Luis PEREx', 'Juan Luis PEREx', 'Juan Luis ', 'Juan Lui', 'Juan Luis PEREx', '2015-07-30 04:40:35', '0', NULL, ''),
(4, '12345678912', '12345678912', '12345678912', '12345678912', '12345678912', '12345678912', '12345678912', '2015-07-31 18:13:40', '0', NULL, ''),
(5, 'Jose Luis', '71886626', 'A', 'a', 'a', 'a', 's', '2015-08-15 23:28:54', '0', NULL, NULL),
(6, 'Carlos dias perez', '71886630', 'nadie', 'av lima', '123456789', 'abc@gmail.com', '123456 los olivos', '2015-08-17 04:22:56', '0', 'av lima', 'av lima'),
(7, 'salas cruz jenifer', '12345678', 'nadie', 'la libertad', '12346789', 'scruz@gmail.com', 'otros', '2015-08-19 06:12:31', '0', 'la Libertad', 'la Libertad');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`idCotizacion`, `fecha_registro`, `idCliente`, `cond_tecnica`, `detalle_servicios`, `total`, `fecha_Entrega`, `cant_Muestra_necesaria`, `estado`, `muestra`, `eliminado`) VALUES
(1, '2015-07-30 04:15:16', 1, 'Condiciones Técnicas Especiales Aplicables a los servicios:', 'Condiciones Técnicas Especiales Aplicables a los servicios:', '677.00', '2015-07-31', 7, NULL, 'Petroleo', '0'),
(2, '2015-07-30 04:40:09', 2, 'Juan Luis PEREx', 'Juan Luis PEREx', '677.00', '2015-07-31', 1, NULL, 'Juan Luis PEREx', '0'),
(3, '2015-07-30 04:40:35', 3, 'Juan Luis PEREx', 'Juan Luis PEREx', '519.00', '2015-07-31', 1, NULL, 'Juan Luis PEREx', '0'),
(4, '2015-07-31 18:09:43', 1, '       \n         ', '       \n         ', '603.00', '2015-08-02', 7, NULL, 'Nitrogeno', '0'),
(5, '2015-07-31 18:13:40', 4, '12345678912', '12345678912', '1271.00', '2015-08-02', 1, NULL, '12345678912', '0'),
(6, '2015-08-15 23:28:54', 5, 'sddddd       \n         ', 'dfsssssssss       \n         ', '698.00', '2015-08-22', 7, NULL, 's', '0'),
(7, '2015-08-15 23:39:09', 1, '11       \n         ', '01       \n         ', '106.00', '2015-08-20', 7, NULL, 'Umayux group', '0'),
(8, '2015-08-15 23:40:20', 1, '11       \n         ', '01       \n         ', '106.00', '2015-08-20', 7, NULL, 'Umayux group', '0'),
(9, '2015-08-15 23:46:12', 1, '111', '111       \n         ', '190.00', '2015-08-12', 3, NULL, 'Umayux group', '0'),
(10, '2015-08-15 23:57:24', 2, 'asasasa       \n         ', 'assasas       \n         ', '804.00', '2015-08-20', 7, NULL, 'zinc', '0'),
(11, '2015-08-15 23:58:10', 2, 'asasasa       \n         ', 'assasas       \n         ', '804.00', '2015-08-20', 7, NULL, 'zinc', '0'),
(12, '2015-08-16 00:00:33', 1, '1256       \n         ', '15235       \n         ', '1090.00', '2015-08-22', 123546, NULL, 'PETROLEO 96', '0'),
(13, '2015-08-17 04:22:56', 6, '123456       \n         ', '123456       \n         ', '677.00', '2015-08-29', 10, NULL, 'alcohol', '0'),
(14, '2015-08-19 06:12:31', 7, 'nada', 'nada       \n         ', '804.00', '2015-08-29', 7, NULL, 'aceite', '0');

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
(5, 3, 'Juan Luis PEREx', NULL, 'NO', NULL, '0.00'),
(6, 6, 's', NULL, 'NO', NULL, '244.00'),
(1, 6, 's', NULL, 'SI', NULL, '264.00'),
(2, 6, 's', NULL, 'NO', NULL, '190.00'),
(4, 7, 'Umayux group', NULL, 'NO', NULL, '106.00'),
(4, 8, 'Umayux group', NULL, 'NO', NULL, '106.00'),
(2, 10, 'zinc', NULL, 'SI', NULL, '190.00'),
(4, 10, 'zinc', NULL, 'NO', NULL, '106.00'),
(1, 10, 'zinc', NULL, 'SI', NULL, '264.00'),
(7, 10, 'zinc', NULL, 'NO', NULL, '244.00'),
(2, 11, 'zinc', NULL, 'SI', NULL, '190.00'),
(4, 11, 'zinc', NULL, 'NO', NULL, '106.00'),
(1, 11, 'zinc', NULL, 'SI', NULL, '264.00'),
(7, 11, 'zinc', NULL, 'NO', NULL, '244.00'),
(1, 1, 'Petroleo', NULL, 'SI', NULL, '264.00'),
(3, 1, 'Petroleo', NULL, 'SI', NULL, '413.00'),
(1, 13, 'alcohol', NULL, 'NO', NULL, '264.00'),
(3, 13, 'alcohol', NULL, 'SI', NULL, '413.00'),
(5, 13, 'alcohol', NULL, 'NO', NULL, '0.00'),
(1, 14, 'aceite', NULL, 'NO', NULL, '264.00'),
(4, 14, 'aceite', NULL, 'SI', NULL, '106.00'),
(6, 14, 'aceite', NULL, 'NO', NULL, '244.00'),
(2, 14, 'aceite', NULL, 'SI', NULL, '190.00'),
(2, 9, 'Umayux group', NULL, 'SI', NULL, '190.00'),
(1, 12, 'PETROLEO 96', NULL, 'SI', NULL, '264.00'),
(3, 12, 'PETROLEO 96', NULL, 'SI', NULL, '413.00'),
(3, 12, 'PETROLEO 96', NULL, 'NO', NULL, '413.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleordentrab`
--

CREATE TABLE IF NOT EXISTS `detalleordentrab` (
  `nroOrden` int(10) unsigned DEFAULT NULL,
  `idServicio` int(11) DEFAULT NULL,
  `resultado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleordentrab`
--

INSERT INTO `detalleordentrab` (`nroOrden`, `idServicio`, `resultado`) VALUES
(11, 1, NULL),
(11, 3, NULL),
(11, 5, NULL),
(12, 1, NULL),
(12, 3, NULL),
(12, 5, NULL),
(13, 1, NULL),
(13, 4, NULL),
(13, 6, NULL),
(13, 2, NULL),
(14, 1, NULL),
(14, 4, NULL),
(14, 6, NULL),
(14, 2, NULL),
(15, 1, NULL),
(15, 4, NULL),
(15, 6, NULL),
(15, 2, NULL),
(16, 2, NULL),
(17, 2, 'asas'),
(18, 1, NULL),
(18, 3, 'asdsadasd'),
(18, 5, 'qqqqqq');

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

--
-- Volcado de datos para la tabla `detallesolicitud`
--

INSERT INTO `detallesolicitud` (`idServicio`, `nroSolicitud`, `acreditado`, `estado`, `precio`) VALUES
(1, 12, 'SI', NULL, '264.00'),
(3, 12, 'SI', NULL, '413.00'),
(5, 12, 'NO', NULL, '0.00'),
(1, 13, 'NO', NULL, '264.00'),
(4, 13, 'SI', NULL, '106.00'),
(6, 13, 'NO', NULL, '244.00'),
(2, 13, 'SI', NULL, '190.00'),
(2, 14, 'SI', NULL, '190.00'),
(1, 15, 'SI', NULL, '264.00'),
(3, 15, 'SI', NULL, '413.00'),
(3, 15, 'NO', NULL, '413.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detreporteensayo`
--

CREATE TABLE IF NOT EXISTS `detreporteensayo` (
  `nroEnsayo` int(10) unsigned NOT NULL,
  `idServicio` int(11) DEFAULT NULL,
  `analista` int(11) DEFAULT NULL,
  `resultado` varchar(255) DEFAULT NULL
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
  `codigo` char(5) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `identificacion` varchar(45) DEFAULT NULL,
  `Cant_Muestra` int(11) DEFAULT NULL,
  `peso_volumen` float DEFAULT NULL,
  `metodocliente` char(2) NOT NULL DEFAULT 'NO',
  `estado` char(1) DEFAULT '0',
  `presentacion` varchar(100) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `muestra`
--

INSERT INTO `muestra` (`idMuestra`, `idCliente`, `codigo`, `nombre`, `marca`, `identificacion`, `Cant_Muestra`, `peso_volumen`, `metodocliente`, `estado`, `presentacion`, `observaciones`) VALUES
(1, 1, '', 'Nitrogeno', 'Nitrogeno', 'Nitrogeno', 7, NULL, 'NO', '0', 'Nitrogeno', 'NitrogenoNitrogeno'),
(2, 1, '', 'Nitrogeno', 'Nitrogeno', 'Nitrogeno', 7, NULL, 'NO', '0', 'Nitrogeno', 'NitrogenoNitrogeno'),
(3, 1, '', 'Nitrogeno', 'Nitrogeno', 'Nitrogeno', 7, NULL, 'NO', '0', 'Nitrogeno', 'NitrogenoNitrogeno'),
(4, 3, '', 'Juan Luis PEREx', 'Juan Lui', 'Juan Lui', 1, NULL, 'NO', '0', 'Juan Lui', 'Juan LuiJuan Lui'),
(5, 1, '', 'Petroleo', 'Petroleo', 'Petroleo', 7, NULL, 'NO', '0', 'Petroleo', 'Petroleo\n    '),
(6, 1, '', 'Petroleo', 'Petroleo', 'Petroleo', 7, NULL, 'NO', '0', 'Petroleo', 'Petroleo\n    '),
(7, 1, '', 'Petroleo', '', '', 7, NULL, 'NO', '0', '', '       \n    '),
(8, 1, '', 'Petroleo', '', '', 7, NULL, 'NO', '0', '', '       \n    '),
(9, 1, '', 'Petroleo', '', '', 7, NULL, 'NO', '0', '', '       \n    '),
(10, 1, '', 'Petroleo', '', '', 7, NULL, 'NO', '0', '', '       \n    '),
(11, 1, '', 'Petroleo', '', '', 7, NULL, 'NO', '0', '', '       \n    '),
(12, 1, '', 'Petroleo', 'av lima 790', 'av lima 790', 7, NULL, 'NO', '0', 'av lima 790', 'av lima 790'),
(13, 1, '', 'Petroleo', 'Petroleo', 'Petroleo', 7, NULL, 'NO', '0', 'Petroleo', 'Petroleo'),
(14, 1, '', 'Petroleo', 'av lima 790', 'Petroleo', 7, NULL, 'NO', '0', 'Petroleo', 'PetroleoPetroleo'),
(15, 1, '', 'Petroleo', 'Petroleo', 'Petroleo', 7, NULL, 'NO', '0', 'Petroleo', 'PetroleoPetroleoPetroleo'),
(16, 1, '', 'Petroleo', 'si referencia alguna', 'si referencia alguna', 7, NULL, 'NO', '0', 'si referencia alguna', 'si referencia alguna'),
(17, 1, '', 'Nitrogeno', 'Jose Luis Ayala', 'Jose Luis Ayala', 7, NULL, 'NO', '0', 'Jose Luis Ayala', 'Jose Luis AyalaJose Luis AyalaJose Luis Ayala'),
(18, 1, '', 'PETROLEO 96', 'DIESEL', 'PTLO96', 123546, NULL, 'NO', '0', 'FRASCO', 'Nniguna       \n    '),
(19, 1, '', 'Petroleo', '', '', 7, NULL, 'NO', '0', '', '       \n    '),
(20, 1, '', 'Petroleo', '', '', 7, NULL, 'NO', '0', '', '       \n    '),
(21, 1, '', 'Petroleo', '71886624', '71886624', 7, NULL, 'NO', '0', '71886624', '71886624'),
(22, 6, '', 'alcohol', 'nada', 'alc71', 10, NULL, 'NO', '0', 'botella', 'no hay observaciones       \n    '),
(23, 6, 'asd', 'alcohol33', '', '', 1033, 3, 'SI', '0', 'av lima33', 'adsssss       \n    '),
(24, 7, 'dsa', 'aceite', 'sad', 'asd', 7, 0, 'SI', '0', 'botella', 'dd'),
(25, 1, 'ASD', 'Petroleo', 'PETROPERU', 'P95', 3, 3, 'SI', '0', 'asss', 'DASSSSS'),
(26, 1, '', 'PETROLEO 96', 'asd', 'ads', 123546, NULL, 'NO', '0', 'asd', '       \n    saddd'),
(27, 1, '', 'PETROLEO 96', 'sad', 'sad', 123546, NULL, 'NO', '0', 'sad', '       \n    dsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordentrabajo`
--

CREATE TABLE IF NOT EXISTS `ordentrabajo` (
  `nroOrden` int(10) unsigned NOT NULL DEFAULT '0',
  `nroSolicitud` int(10) unsigned DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `laboratorio` varchar(50) DEFAULT NULL,
  `idMuestra` int(11) NOT NULL,
  `codMuestra` char(5) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `codPersonal` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT '0',
  `eliminado` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ordentrabajo`
--

INSERT INTO `ordentrabajo` (`nroOrden`, `nroSolicitud`, `fecha_emision`, `laboratorio`, `idMuestra`, `codMuestra`, `observaciones`, `fecha_entrega`, `codPersonal`, `fecha_registro`, `estado`, `eliminado`) VALUES
(1, 12, '0000-00-00', 'B1', 23, 'M003', 'sadsad', '2015-08-01 00:00:00', 1, '2015-08-17 19:08:24', '1', '0'),
(2, 12, '2015-07-17', 'LAB2', 23, 'M002', 'ads\n    ', '2015-08-30 00:00:00', 1, '2015-08-17 19:54:44', '1', '0'),
(3, 12, '0000-00-00', 'sad', 23, 'asd', 'dsadsa', '2015-08-30 00:00:00', 1, '2015-08-17 19:55:39', '0', '0'),
(4, 12, '2015-08-17', 'asddd', 23, 'sad', 'sadddddd', '2015-08-29 00:00:00', 1, '2015-08-17 20:02:08', '0', '0'),
(5, 12, '2015-08-17', '', 23, '', '       \n    ', '2015-08-30 02:00:00', 1, '2015-08-17 20:04:37', '0', '0'),
(6, 12, '2015-08-17', 'saddddd', 23, 'saddd', 'sdadadadadadadada', '0000-00-00 00:00:00', 1, '2015-08-17 20:05:14', '0', '0'),
(7, 12, '2015-08-17', 'ñ', 23, 'ñ', '       ñññ\n    ', '2015-08-30 02:01:00', 1, '2015-08-17 20:11:18', '0', '0'),
(8, 12, '2015-08-17', 'asddd', 23, 'dsaaa', 'asdddddddd\n    ', '2015-08-23 00:00:00', 1, '2015-08-17 20:13:50', '0', '0'),
(9, 12, '2015-08-17', 'fds', 23, 'dsf', 'sdffffff', '2015-08-23 00:00:00', 1, '2015-08-17 20:17:07', '0', '0'),
(10, 12, '2015-08-17', 'dsaaaaa', 23, 'dsa', 'sadddddddd', '2015-08-30 00:00:00', 1, '2015-08-17 20:17:50', '0', '0'),
(11, 12, '2015-08-17', 'dfsfs', 23, 'sdf', 'dddddddd', '2015-08-22 00:00:00', 1, '2015-08-17 20:21:26', '0', '0'),
(12, 12, '2015-08-18', 'lab 3', 23, 'abc', '1231554', '0000-00-00 00:00:00', 1, '2015-08-19 04:50:38', '0', '0'),
(13, 13, '2015-08-19', 'lab5', 24, 'abc', 'a       \n    ', '2015-08-21 00:00:00', 1, '2015-08-19 06:14:25', '0', '0'),
(14, 13, '2015-08-19', '', 24, '', '       \n    ', '0000-00-00 00:00:00', 1, '2015-08-19 06:21:44', '0', '0'),
(15, 13, '2015-08-19', 'adsdsa', 24, 'dsa', 'dd', '2015-08-21 00:00:00', 1, '2015-08-20 04:04:10', '0', '0'),
(16, 14, '2015-08-19', 'asd', 25, 'ad', '3as', '2015-08-14 00:00:00', 1, '2015-08-20 04:50:29', '0', '0'),
(17, 14, '2015-08-19', 'LAB1', 25, 'M0025', 'DASSSSS', '2015-08-27 00:00:00', 1, '2015-08-20 04:51:51', '1', '0'),
(18, 12, '2015-08-19', 'B3', 23, 'M0005', 'adsssss       \n    ', '2015-08-21 00:00:00', 1, '2015-08-20 04:53:50', '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporteensayo`
--

CREATE TABLE IF NOT EXISTS `reporteensayo` (
  `nroEnsayo` int(10) unsigned NOT NULL,
  `nroOrden` int(10) unsigned NOT NULL,
  `idMuestra` int(11) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `laboratorio` varchar(50) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `hora_entrega` time DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `eliminado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'Corrosión Lámina de Cobre ', 'D130-12', 1, 100, '244.00', '300.00', '', '2015-07-22 16:55:21', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sispersona`
--

INSERT INTO `sispersona` (`ide_persona`, `des_nombres`, `des_apepat`, `des_apemat`, `nro_documento`, `des_telefono`, `des_correo`, `sexo`, `ide_estcivil`, `fec_nacimiento`, `Sueldo`, `ide_estado`) VALUES
(1, 'Administrador', '', '', '71886624', '972620265', 'luisayala@hotmail.com', 'M', '1', '1987-06-03', '1000.00', '0'),
(2, 'Atención al Cliente', '', '', '71886624', '972620265', 'luisayala@hotmail.com', 'M', '1', '0000-00-00', '0.00', '0'),
(3, 'Director Tecnico', '', '', '71886624', '972620265', '', 'M', '1', '0000-00-00', '1000.00', '0'),
(4, 'Analista 1', '', '', '71886624', '972620265', '', 'M', '1', '2015-08-16', '1000.00', '0'),
(5, 'Analista 2', '', '', '71886624', '972620265', '', 'M', '1', '2015-08-16', '1000.00', '0'),
(6, 'Analista 3', '', '', '71886624', '972620265', '', 'M', '1', '2015-08-16', '1000.00', '0');

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
(2, 'acliente', 'e10adc3949ba59abbe56e057f20f883e', 2, 2, 'luisayala@hotmail.com', '1'),
(3, 'dtecnico', 'e10adc3949ba59abbe56e057f20f883e', 3, 3, 'luisayala@hotmail.com', '1'),
(4, 'analista1', 'e10adc3949ba59abbe56e057f20f883e', 4, 4, 'luisayala@hotmail.com', '1'),
(5, 'analista2', 'e10adc3949ba59abbe56e057f20f883e', 4, 5, 'luisayala@hotmail.com', '1'),
(6, 'analista3', 'e10adc3949ba59abbe56e057f20f883e', 4, 6, 'luisayala@hotmail.com', '1');

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
  `observaciones` varchar(300) DEFAULT NULL,
  `Estado` char(1) NOT NULL DEFAULT '0',
  `eliminado` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`nroSolicitud`, `nroCotizacion`, `idCliente`, `idMuestra`, `fecha_registro`, `Ensayos`, `Inspeccion`, `muestreo`, `otros`, `total`, `fecha_entrega`, `Acreditacion`, `Contramuestras`, `observaciones`, `Estado`, `eliminado`) VALUES
(1, 4, 1, 3, '2015-08-03 10:33:40', 'X', 'X', 'X', 'Nitrogeno', '603.00', '0000-00-00', 'SI', 'SI', 'NitrogenoNitrogeno', '0', '0'),
(2, 3, 3, 4, '2015-08-03 10:37:06', 'X', 'X', 'X', 'asdsad', '519.00', '2015-08-29', 'NO', 'NO', 'Juan LuiJuan Lui', '0', '0'),
(3, 1, 1, 12, '2015-08-10 05:31:59', 'X', 'X', 'X', '1', '677.00', '2015-08-29', 'SI', 'NO', 'av lima 790av lima 790', '0', '0'),
(4, 1, 1, 13, '2015-08-10 05:33:35', 'X', 'X', 'X', '1', '677.00', '2015-08-29', 'SI', 'NO', 'PetroleoPetroleo', '0', '0'),
(5, 1, 1, 14, '2015-08-10 05:35:25', 'X', 'X', 'X', 'dd', '677.00', '2015-08-20', 'SI', 'NO', 'PetroleoPetroleo', '0', '0'),
(6, 1, 1, 15, '2015-08-10 05:36:14', 'X', 'N', 'X', 'dd', '677.00', '2015-08-29', 'SI', 'NO', 'PetroleoPetroleoPetroleoPetroleo\n         ', '1', '0'),
(7, 1, 1, 16, '2015-08-10 07:30:22', 'X', 'X', 'X', 'si referencia alguna', '677.00', '2015-08-21', 'SI', 'NO', 'si referencia algunasi referencia alguna\n         ', '0', '0'),
(8, 4, 1, 17, '2015-08-10 07:32:44', 'X', 'X', 'X', 'Jose Luis Ayala', '603.00', '2015-08-13', 'SI', 'NO', 'Jose Luis AyalaJose Luis Ayala', '0', '0'),
(9, 12, 1, 18, '2015-08-17 03:41:10', 'X', 'X', 'X', 'observacion', '1598.00', '2015-08-28', 'SI', 'NO', 'ninguna', '1', '0'),
(10, 1, 1, 21, '2015-08-17 04:19:14', 'X', 'X', 'X', '71886624', '677.00', '2015-08-29', 'NO', 'SI', '71886624\n         ', '1', '0'),
(11, 13, 6, 22, '2015-08-17 04:24:28', 'X', 'X', 'X', 'observacion', '677.00', '2015-08-29', 'SI', 'SI', 'entregar contra-muestras ', '1', '0'),
(12, 13, 6, 23, '2015-08-17 04:26:25', 'X', 'X', 'X', '', '677.00', '2015-08-29', 'SI', 'SI', 'av lima\n         ', '1', '0'),
(13, 14, 7, 24, '2015-08-19 06:13:37', 'X', 'X', 'X', 'a', '804.00', '2015-08-29', 'NO', 'NO', 'nada', '1', '0'),
(14, 9, 1, 25, '2015-08-20 04:48:17', 'X', 'X', 'X', 'as', '190.00', '2015-08-27', 'SI', 'NO', 'assssss', '1', '0'),
(15, 12, 1, 27, '2015-08-20 20:36:02', 'N', 'N', 'N', '', '1090.00', '2015-08-30', 'NO', 'NO', 'asd', '0', '0');

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
  ADD PRIMARY KEY (`ide_rolopcion`),
  ADD KEY `ide_opcion` (`ide_opcion`),
  ADD KEY `ide_rol` (`ide_rol`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`idCotizacion`),
  ADD KEY `fk_Cotizacion_Cliente` (`idCliente`);

--
-- Indices de la tabla `detallecotizacion`
--
ALTER TABLE `detallecotizacion`
  ADD KEY `fk_DetC_serv` (`idServicio`),
  ADD KEY `idCotizacion` (`idCotizacion`);

--
-- Indices de la tabla `detalleordentrab`
--
ALTER TABLE `detalleordentrab`
  ADD KEY `fk_serv_detalle` (`idServicio`),
  ADD KEY `nroOrden` (`nroOrden`);

--
-- Indices de la tabla `detallesolicitud`
--
ALTER TABLE `detallesolicitud`
  ADD KEY `fk_DetSol_Sol` (`nroSolicitud`),
  ADD KEY `fk_DetSol_Serv` (`idServicio`);

--
-- Indices de la tabla `detreporteensayo`
--
ALTER TABLE `detreporteensayo`
  ADD KEY `fk_detalle_reporte` (`nroEnsayo`),
  ADD KEY `fk_detreporte_servicio` (`idServicio`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `muestra`
--
ALTER TABLE `muestra`
  ADD PRIMARY KEY (`idMuestra`),
  ADD KEY `fk_Muest_Cli` (`idCliente`);

--
-- Indices de la tabla `ordentrabajo`
--
ALTER TABLE `ordentrabajo`
  ADD PRIMARY KEY (`nroOrden`),
  ADD KEY `fk_orden_solicitud` (`nroSolicitud`),
  ADD KEY `fk_orden_muestra` (`idMuestra`);

--
-- Indices de la tabla `reporteensayo`
--
ALTER TABLE `reporteensayo`
  ADD PRIMARY KEY (`nroEnsayo`),
  ADD KEY `fk_reporte_orden` (`nroOrden`),
  ADD KEY `fk_reporte_muestra` (`idMuestra`);

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
  ADD PRIMARY KEY (`ide_usuario`),
  ADD KEY `pk_user_rol` (`ide_rol`),
  ADD KEY `pk_user_persona` (`ide_persona`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`nroSolicitud`,`nroCotizacion`),
  ADD KEY `fk_Sol_Cot` (`nroCotizacion`),
  ADD KEY `fk_Sol_cli` (`idCliente`),
  ADD KEY `fk_Sol_muest` (`idMuestra`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admcatalogo`
--
ALTER TABLE `admcatalogo`
  MODIFY `ide_elemento` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT de la tabla `admgrcatalogo`
--
ALTER TABLE `admgrcatalogo`
  MODIFY `ide_grupo` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `admopcion`
--
ALTER TABLE `admopcion`
  MODIFY `ide_opcion` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `admrol`
--
ALTER TABLE `admrol`
  MODIFY `ide_rol` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `admrolopcion`
--
ALTER TABLE `admrolopcion`
  MODIFY `ide_rolopcion` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `idCotizacion` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `muestra`
--
ALTER TABLE `muestra`
  MODIFY `idMuestra` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idServicio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `sispersona`
--
ALTER TABLE `sispersona`
  MODIFY `ide_persona` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
-- Filtros para la tabla `detalleordentrab`
--
ALTER TABLE `detalleordentrab`
  ADD CONSTRAINT `detalleordentrab_ibfk_1` FOREIGN KEY (`nroOrden`) REFERENCES `ordentrabajo` (`nroOrden`),
  ADD CONSTRAINT `fk_serv_detalle` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`);

--
-- Filtros para la tabla `detallesolicitud`
--
ALTER TABLE `detallesolicitud`
  ADD CONSTRAINT `fk_DetSol_Serv` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`),
  ADD CONSTRAINT `fk_DetSol_Sol` FOREIGN KEY (`nroSolicitud`) REFERENCES `solicitud` (`nroSolicitud`);

--
-- Filtros para la tabla `detreporteensayo`
--
ALTER TABLE `detreporteensayo`
  ADD CONSTRAINT `fk_detalle_reporte` FOREIGN KEY (`nroEnsayo`) REFERENCES `reporteensayo` (`nroEnsayo`),
  ADD CONSTRAINT `fk_detreporte_servicio` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`);

--
-- Filtros para la tabla `muestra`
--
ALTER TABLE `muestra`
  ADD CONSTRAINT `fk_Muest_Cli` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `ordentrabajo`
--
ALTER TABLE `ordentrabajo`
  ADD CONSTRAINT `fk_orden_muestra` FOREIGN KEY (`idMuestra`) REFERENCES `muestra` (`idMuestra`),
  ADD CONSTRAINT `fk_orden_solicitud` FOREIGN KEY (`nroSolicitud`) REFERENCES `solicitud` (`nroSolicitud`);

--
-- Filtros para la tabla `reporteensayo`
--
ALTER TABLE `reporteensayo`
  ADD CONSTRAINT `fk_reporte_muestra` FOREIGN KEY (`idMuestra`) REFERENCES `muestra` (`idMuestra`),
  ADD CONSTRAINT `fk_reporte_orden` FOREIGN KEY (`nroOrden`) REFERENCES `ordentrabajo` (`nroOrden`);

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
