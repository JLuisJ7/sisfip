# Host: localhost  (Version: 5.6.21)
# Date: 2015-10-12 06:49:52
# Generator: MySQL-Front 5.3  (Build 4.224)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "admcatalogo"
#

CREATE TABLE `admcatalogo` (
  `ide_elemento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ide_grupo` int(10) unsigned NOT NULL,
  `des_nombre` varchar(250) NOT NULL,
  `ide_estado` char(1) NOT NULL,
  `des_usu_registra` varchar(250) DEFAULT NULL,
  `fec_registra` datetime DEFAULT NULL,
  `des_usu_modifica` varchar(250) DEFAULT NULL,
  `fec_modifica` datetime DEFAULT NULL,
  `cod_sunat` varchar(10) DEFAULT NULL,
  `des_abrev` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ide_elemento`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

#
# Data for table "admcatalogo"
#

INSERT INTO `admcatalogo` VALUES (1,1,'ADMINISTRADOR','1','lalipazaga@sismima.com','2015-04-18 21:46:25',NULL,NULL,NULL,NULL),(2,2,'MODULO DE VENTAS','1','lalipazaga@sismima.com','2015-04-18 21:54:55',NULL,NULL,NULL,NULL),(3,2,'MODULO DE COMPRAS','1','lalipazaga@sismima.com','2015-04-18 21:54:57',NULL,NULL,NULL,NULL),(4,2,'CONTROL DE FACTURACION','1','lalipazaga@sismima.com','2015-04-18 21:54:59',NULL,NULL,NULL,NULL),(5,2,'CONTROL DE ALMACEN','1','lalipazaga@sismima.com','2015-04-18 21:55:00',NULL,NULL,NULL,NULL),(6,2,'MODULO DE PERSONAL','1','lalipazaga@sismima.com','2015-04-18 21:55:02',NULL,NULL,NULL,NULL),(7,2,'MODULO DE COTIZACIONES','1','lalipazaga@sismima.com','2015-04-18 21:55:04',NULL,NULL,NULL,NULL),(8,2,'CONSULTA DE REPORTES','1','lalipazaga@sismima.com','2015-04-18 21:55:05',NULL,NULL,NULL,NULL),(9,2,'SEGURIDAD','1','lalipazaga@sismima.com','2015-04-18 21:55:08',NULL,NULL,NULL,NULL),(17,5,'USUARIO','1','lalipazaga@sismima.com','2015-04-21 01:11:14',NULL,NULL,NULL,NULL),(18,5,'EMPLEADO','1','lalipazaga@sismima.com','2015-04-21 01:13:19',NULL,NULL,NULL,NULL),(19,5,'PROVEEDOR','1','lalipazaga@sismima.com','2015-04-21 01:16:11',NULL,NULL,NULL,NULL),(20,5,'CLIENTE','1','lalipazaga@sismima.com','2015-04-21 01:16:48',NULL,NULL,NULL,NULL),(38,2,'Reutilizables','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,NULL),(39,2,'Cotización','1','',NULL,NULL,NULL,NULL,NULL),(40,2,'SERVICIO','1','',NULL,NULL,NULL,NULL,NULL),(41,2,'SOLICITUD','1','',NULL,NULL,NULL,NULL,NULL),(42,2,'ORDEN DE TRABAJO','1','',NULL,NULL,NULL,NULL,NULL),(43,2,'REPORTE DE ENSAYOS','1','',NULL,NULL,NULL,NULL,NULL);

#
# Structure for table "admgrcatalogo"
#

CREATE TABLE `admgrcatalogo` (
  `ide_grupo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `des_nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`ide_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "admgrcatalogo"
#

INSERT INTO `admgrcatalogo` VALUES (1,'TIPO DE USUARIO'),(2,'MENU'),(3,'TIPO DE DOCUMENTO'),(4,'TIPO DE PERSONA'),(5,'TIPO CONDICION'),(6,'SEXO'),(7,'ESTADO CIVIL'),(8,'GRADO DE INSTRUCCION');

#
# Structure for table "admopcion"
#

CREATE TABLE `admopcion` (
  `ide_opcion` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `ind_orden` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`ide_opcion`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

#
# Data for table "admopcion"
#

INSERT INTO `admopcion` VALUES (1,2,'VENTAS','--',0,'0','0','lalipazaga@sismima.com','2015-04-18 22:04:06',NULL,NULL,'tags',1),(2,2,'Boletas','ventas/boletas',1,'0','0','lalipazaga@sismima.com','2015-04-18 22:07:13',NULL,NULL,'',0),(3,3,'COMPRAS','--',0,'0','0','lalipazaga@sismima.com','2015-04-18 22:10:18',NULL,NULL,'shopping-cart',2),(4,3,'REGISTRO DE COMPRAS','compras/registraCompra',3,'0','0','lalipazaga@sismima.com','2015-04-18 22:10:58',NULL,NULL,'',0),(5,2,'Clientes','ventas/listadoClientes',1,'0','0','lalipazaga@sismima.com','2015-04-19 05:23:58',NULL,NULL,'',0),(6,3,'Proveedores','compras/listadoProveedores',3,'0','0','lalipazaga@sismima.com','2015-04-19 18:06:58',NULL,NULL,'',0),(7,5,'Cotizacion','--',0,'0','0','lalipazaga@sismima.com','2015-04-19 18:15:58',NULL,NULL,'tasks',3),(8,5,'Productos','almacen/listadoProductos',7,'0','0','lalipazaga@sismima.com','2015-04-19 18:20:58',NULL,NULL,NULL,0),(9,9,'SEGURIDAD','--',0,'0','1','lalipazaga@sismima.com','2015-04-19 21:11:21',NULL,NULL,'lock',10),(10,9,'PARAMETROS GENERALES','seguridad/parametrosGenerales',9,'0','0','lalipazaga@sismima.com','2015-04-19 21:12:13',NULL,NULL,NULL,0),(11,6,'PERSONAL','--',0,'0','0','lalipazaga@sismima.com','2015-04-19 22:32:19',NULL,NULL,'users',4),(12,6,'Empleados','personal/listadoEmpleados',11,'0','0','lalipazaga@sismima.com','2015-04-19 22:34:19',NULL,NULL,NULL,0),(13,9,'Usuarios','seguridad/listaUsuarios',9,'0','0','lalipazaga@sismima.com','2015-04-19 23:41:11',NULL,NULL,NULL,NULL),(14,9,'REGISTRA PERSONAS','seguridad/listadoPersonas',9,'0','0','lalipazaga@sismima.com','2015-04-26 05:30:18',NULL,NULL,NULL,NULL),(15,2,'Generar Factura','ventas/registrarFactura',1,'0','0','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,NULL),(16,2,'Facturas','ventas/facturas',1,'0','0','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,NULL),(17,5,'Inventario','almacen/Inventario',7,'0','0','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,NULL),(18,3,'Ordenes de Compra','compras/ordenesCompra',3,'0','0','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,NULL),(19,38,'UTILITARIOS','--',0,'0','0','lalipazaga@sismima.com',NULL,NULL,NULL,'wrench',6),(20,38,'Parametros Generales','utilitarios/parametrosGenerales',19,'0','0','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(21,8,'REPORTES','--',0,'0','0','admin@sismima','2015-06-07 00:00:00',NULL,NULL,'bar-chart',8),(22,8,'Ventas','--',21,'1','0',NULL,NULL,NULL,NULL,NULL,NULL),(23,8,'Compras','--',21,'1','0',NULL,NULL,NULL,NULL,NULL,NULL),(24,8,'Cotizacionss','--',21,'1','0',NULL,NULL,NULL,NULL,NULL,NULL),(25,8,'Clientes','reportes/clientes',22,'22','0',NULL,NULL,NULL,NULL,'shopping-cart',NULL),(26,8,'Productos','reportes/almacen',24,'24','0',NULL,NULL,NULL,NULL,NULL,NULL),(27,8,'Proveedores','reportes/proveedores',23,'23','0',NULL,NULL,NULL,NULL,NULL,NULL),(28,8,'Facturas','reportes/facturas',22,'22','0',NULL,NULL,NULL,NULL,'shopping-cart',NULL),(29,8,'Ordenes de Compra','reportes/ordenescompra',23,'23','0',NULL,NULL,NULL,NULL,NULL,NULL),(30,9,'Registrar Usuario','seguridad/registrarUsuarios',9,'0','0','lalipazaga@sismima.com','2015-04-19 23:41:11',NULL,NULL,NULL,NULL),(31,5,'Productos','almacen/Producto',7,'0','0','lalipazaga@sismima.com','2015-04-19 18:20:58',NULL,NULL,NULL,0),(32,5,'Servicio','almacen/Servicio',7,'0','0','lalipazaga@sismima.com','2015-04-19 18:20:58',NULL,NULL,NULL,0),(33,5,'Registrar Cotización','almacen/Cotizacion',7,'0','0','lalipazaga@sismima.com','2015-04-19 18:20:58',NULL,NULL,NULL,0),(34,5,'Cotizaciones','almacen/Cotizaciones',7,'0','0','lalipazaga@sismima.com','2015-04-19 18:20:58',NULL,NULL,NULL,0),(35,39,'COTIZACIÓN','',0,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,'list-alt',2),(36,39,'Generar Cotización','cotizacion/registrar',35,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(37,40,'SERVICIOS','servicio/index',0,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,'list-alt',1),(38,41,'SOLICITUD','',0,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,'list-alt',3),(39,39,'Cotizaciones','cotizacion/cotizaciones',35,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(40,41,'Nueva solicitud','solicitud/registrar',38,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(41,42,'ORDEN DE TRABAJO','',0,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,'list-alt',4),(42,41,'Nueva Orden de Trabajo','orden/registrar',41,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(43,41,'Solicitudes DT','solicitud/solicitudes',38,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(44,43,'ENSAYOS','',0,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,'list-alt',5),(45,43,'Elaborar Reporte de Ensayos','ensayos/generar_reporte',44,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(46,43,'Elaborar Informe de Ensayos','ensayos/generar_informe',44,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(47,41,'Ordenes de Trabajo','orden/ordenes',41,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(48,43,'Informes de Ensayos','ensayos/informes',44,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(49,43,'Reportes de Ensayos','ensayos/reportes',44,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(50,41,'Ordenes de Trabajo Analista','orden/ordenes_analista',41,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(51,41,'Solicitudes Atencion al Cliente','solicitud/solicitudes_acliente',38,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0),(52,43,'Reportes de Ensayos DT','ensayos/reportes_director',44,'0','1','lalipazaga@sismima.com',NULL,NULL,NULL,NULL,0);

#
# Structure for table "admrol"
#

CREATE TABLE `admrol` (
  `ide_rol` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `des_nombre` varchar(250) NOT NULL,
  PRIMARY KEY (`ide_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "admrol"
#

INSERT INTO `admrol` VALUES (1,'Administrador'),(2,'Atencion al Cliente'),(3,'Director Tecnico'),(4,'Analista'),(5,'Reportes'),(6,'Visitante');

#
# Structure for table "admrolopcion"
#

CREATE TABLE `admrolopcion` (
  `ide_rolopcion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ide_opcion` int(10) unsigned NOT NULL,
  `ide_rol` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ide_rolopcion`),
  KEY `ide_opcion` (`ide_opcion`),
  KEY `ide_rol` (`ide_rol`),
  CONSTRAINT `admrolopcion_ibfk_1` FOREIGN KEY (`ide_opcion`) REFERENCES `admopcion` (`ide_opcion`),
  CONSTRAINT `admrolopcion_ibfk_2` FOREIGN KEY (`ide_rol`) REFERENCES `admrol` (`ide_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Data for table "admrolopcion"
#

INSERT INTO `admrolopcion` VALUES (1,37,2),(2,35,2),(3,36,2),(4,39,2),(5,38,2),(6,51,2),(7,38,3),(8,43,3),(9,41,3),(10,47,3),(11,41,4),(12,50,4),(13,44,4),(14,44,3),(15,48,3),(16,49,4),(17,52,3);

#
# Structure for table "cliente"
#

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
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
  `provincia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "cliente"
#

INSERT INTO `cliente` VALUES (1,'JOSE LUIS AYALA BENITO','71886624','Lima','av. independencia','944659233','abc@gmail.com','ninguna','2015-10-05 12:50:11','0','asd','sda');

#
# Structure for table "cotizacion"
#

CREATE TABLE `cotizacion` (
  `idCotizacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_cot` varchar(50) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idCliente` int(11) NOT NULL,
  `cond_tecnica` varchar(200) DEFAULT NULL,
  `detalle_servicios` varchar(200) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `fecha_Entrega` date DEFAULT NULL,
  `cant_Muestra_necesaria` int(11) DEFAULT NULL,
  `estado` varchar(12) DEFAULT NULL,
  `muestra` varchar(30) NOT NULL DEFAULT '',
  `eliminado` char(1) DEFAULT '0',
  PRIMARY KEY (`idCotizacion`),
  KEY `fk_Cotizacion_Cliente` (`idCliente`),
  CONSTRAINT `fk_Cotizacion_Cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "cotizacion"
#

INSERT INTO `cotizacion` VALUES (1,'CT-0001-15','2015-10-05 12:50:12',1,'Todas las condiciones son aplicables','Todas las condiciones son aplicables',454.00,'2015-10-10',7,NULL,'petroleo','0'),(2,'CT-0002-15','2015-10-09 17:30:47',1,'sad asd','sadd\n         ',0.00,'2015-10-10',7,NULL,'asss','0'),(3,'CT-0003-15','2015-10-11 19:17:47',1,'nada       \n         ','nada       \n         ',264.00,'2015-10-31',7,NULL,'PETROLEO','0');

#
# Structure for table "empleado"
#

CREATE TABLE `empleado` (
  `idEmpleado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apePat` varchar(50) DEFAULT NULL,
  `apeMat` varchar(50) DEFAULT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `DNI` char(8) DEFAULT NULL,
  `telefono` char(9) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `fechaReg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT '1',
  PRIMARY KEY (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "empleado"
#

INSERT INTO `empleado` VALUES (1,'.','.','Atención al cliente','1996-06-07','71886624','944659233','M','2015-05-24 08:26:06','1');

#
# Structure for table "muestra"
#

CREATE TABLE `muestra` (
  `idMuestra` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL DEFAULT '',
  `nombre` varchar(45) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `identificacion` varchar(45) DEFAULT NULL,
  `Cant_Muestra` int(11) DEFAULT NULL,
  `peso_volumen` float DEFAULT NULL,
  `metodocliente` char(2) NOT NULL DEFAULT 'NO',
  `estado` char(1) DEFAULT '0',
  `presentacion` varchar(100) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idMuestra`),
  KEY `fk_Muest_Cli` (`idCliente`),
  CONSTRAINT `fk_Muest_Cli` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "muestra"
#

INSERT INTO `muestra` VALUES (1,1,'CM-0001-07-15','petroleo','glp-45','pglp45',7,1,'SI','0','galon','sdaaaaaa\n    '),(2,1,'','petroleo','diesel','abcd',7,NULL,'NO','0','avc','ninguna'),(3,1,'','petroleo','diesel','abcd',7,NULL,'NO','0','botella','adsa       \n    '),(4,1,'','petroleo','diesel','abcd',7,NULL,'NO','0','botella','adsa       \n    '),(5,1,'','petroleo','diesel','abcd',7,NULL,'NO','0','botella','adsa       \n    '),(6,1,'asddd','petroleo','asd','sdf',7,0,'SI','0','sdf','dsasddd');

#
# Structure for table "servicio"
#

CREATE TABLE `servicio` (
  `idServicio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `metodo` varchar(45) DEFAULT NULL,
  `tiempo_entrega` int(11) DEFAULT NULL,
  `cantM_x_ensayo` int(11) DEFAULT NULL,
  `tarifa` decimal(8,2) DEFAULT NULL,
  `tarifa_Acred` decimal(8,2) DEFAULT '0.00',
  `detalle` varchar(200) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT '0',
  PRIMARY KEY (`idServicio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "servicio"
#

INSERT INTO `servicio` VALUES (1,'Agua por Destilación','D95-05 ?1',1,400,264.00,0.00,'\n         ','2015-07-22 08:02:08','0'),(2,'Agua y Sedimentos','D1796-11',1,400,190.00,0.00,'       \n         ','2015-07-22 08:03:23','0'),(3,'Azufre Total','D4294-10',1,50,413.00,0.00,'\n      \n         ','2015-07-22 08:33:46','0'),(4,'Color ASTM','D1500-12',1,50,106.00,0.00,'','2015-07-22 08:43:24','0'),(5,'Color Comercial','Visual',1,50,0.00,0.00,'este servicio no se cobra','2015-07-22 11:37:47','0'),(6,'Cenizas','D482-07',3,400,244.00,0.00,'       \n         ','2015-07-22 11:38:23','0'),(7,'Corrosión Lámina de Cobre ','D130-12',1,100,244.00,300.00,'','2015-07-22 11:55:21','0');

#
# Structure for table "detallecotizacion"
#

CREATE TABLE `detallecotizacion` (
  `idServicio` int(11) NOT NULL,
  `idCotizacion` int(11) unsigned NOT NULL DEFAULT '0',
  `Muestra` varchar(30) DEFAULT NULL,
  `recomendado` char(1) DEFAULT NULL,
  `acreditado` char(2) DEFAULT 'NO',
  `estado` char(1) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  KEY `fk_DetC_serv` (`idServicio`),
  KEY `idCotizacion` (`idCotizacion`),
  CONSTRAINT `detallecotizacion_ibfk_1` FOREIGN KEY (`idCotizacion`) REFERENCES `cotizacion` (`idCotizacion`),
  CONSTRAINT `fk_DetC_serv` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detallecotizacion"
#

INSERT INTO `detallecotizacion` VALUES (1,3,'PETROLEO',NULL,'SI',NULL,264.00),(5,3,'PETROLEO',NULL,'NO',NULL,0.00),(1,1,'petroleo',NULL,'SI',NULL,264.00),(2,1,'petroleo',NULL,'NO',NULL,190.00);

#
# Structure for table "sispersona"
#

CREATE TABLE `sispersona` (
  `ide_persona` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `ide_estado` char(1) NOT NULL,
  PRIMARY KEY (`ide_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "sispersona"
#

INSERT INTO `sispersona` VALUES (1,'Administrador','','','71886624','972620265','luisayala@hotmail.com','M','1','1987-06-03',1000.00,'0'),(2,'Atención al Cliente','','','71886624','972620265','luisayala@hotmail.com','M','1','0000-00-00',0.00,'0'),(3,'Director Tecnico','','','71886624','972620265','','M','1','0000-00-00',1000.00,'0'),(4,'Analista 1','','','71886624','972620265','','M','1','2015-08-16',1000.00,'0'),(5,'Analista 2','','','71886624','972620265','','M','1','2015-08-16',1000.00,'0'),(6,'Analista 3','','','71886624','972620265','','M','1','2015-08-16',1000.00,'0');

#
# Structure for table "sisusuario"
#

CREATE TABLE `sisusuario` (
  `ide_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `des_usuario` varchar(50) NOT NULL,
  `des_password` varchar(50) NOT NULL,
  `ide_rol` int(10) unsigned NOT NULL,
  `ide_persona` int(10) unsigned NOT NULL,
  `correo` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`ide_usuario`),
  KEY `pk_user_rol` (`ide_rol`),
  KEY `pk_user_persona` (`ide_persona`),
  CONSTRAINT `pk_user_persona` FOREIGN KEY (`ide_persona`) REFERENCES `sispersona` (`ide_persona`),
  CONSTRAINT `pk_user_rol` FOREIGN KEY (`ide_rol`) REFERENCES `admrol` (`ide_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "sisusuario"
#

INSERT INTO `sisusuario` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e',1,1,'luisayala@hotmail.com','1'),(2,'acliente','e10adc3949ba59abbe56e057f20f883e',2,2,'luisayala@hotmail.com','1'),(3,'dtecnico','e10adc3949ba59abbe56e057f20f883e',3,3,'luisayala@hotmail.com','1'),(4,'analista1','e10adc3949ba59abbe56e057f20f883e',4,4,'luisayala@hotmail.com','1'),(5,'analista2','e10adc3949ba59abbe56e057f20f883e',4,5,'luisayala@hotmail.com','1'),(6,'analista3','e10adc3949ba59abbe56e057f20f883e',4,6,'luisayala@hotmail.com','1');

#
# Structure for table "solicitud"
#

CREATE TABLE `solicitud` (
  `nroSolicitud` int(10) unsigned NOT NULL,
  `nroCotizacion` int(10) unsigned NOT NULL,
  `cod_solicitud` varchar(100) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idMuestra` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ensayos` char(1) DEFAULT '',
  `Inspeccion` char(1) DEFAULT '',
  `muestreo` char(1) DEFAULT '',
  `otros` varchar(200) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT '0.00',
  `fecha_entrega` date NOT NULL,
  `hora_entrega` time DEFAULT '00:00:00',
  `Acreditacion` char(2) DEFAULT 'NO',
  `Contramuestras` char(2) DEFAULT 'NO',
  `observaciones` varchar(300) DEFAULT NULL,
  `Estado` char(1) NOT NULL DEFAULT '0',
  `eliminado` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nroSolicitud`,`nroCotizacion`),
  KEY `fk_Sol_Cot` (`nroCotizacion`),
  KEY `fk_Sol_cli` (`idCliente`),
  KEY `fk_Sol_muest` (`idMuestra`),
  CONSTRAINT `fk_Sol_Cot` FOREIGN KEY (`nroCotizacion`) REFERENCES `cotizacion` (`idCotizacion`),
  CONSTRAINT `fk_Sol_cli` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  CONSTRAINT `fk_Sol_muest` FOREIGN KEY (`idMuestra`) REFERENCES `muestra` (`idMuestra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "solicitud"
#

INSERT INTO `solicitud` VALUES (1,1,'SS-0001-15',1,1,'2015-10-05 12:51:49','X','N','X','',1048.00,'2015-10-18','00:00:00','NO','NO','ninguna observacion','1','0'),(2,1,'SS-0002-15',1,5,'2015-10-11 20:26:13','X','N','N','',454.00,'2015-10-30','13:30:00','SI','SI','sddddddddddd','1','0'),(3,1,'SS-0003-15',1,6,'2015-10-11 20:29:51','X','N','N','',454.00,'2015-10-31','13:00:00','NO','NO','dffffff','1','0');

#
# Structure for table "ordentrabajo"
#

CREATE TABLE `ordentrabajo` (
  `nroOrden` int(10) unsigned NOT NULL DEFAULT '0',
  `nroSolicitud` int(10) unsigned DEFAULT NULL,
  `cod_ordentrab` varchar(100) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `laboratorio` varchar(50) DEFAULT NULL,
  `idMuestra` int(11) NOT NULL,
  `codMuestra` varchar(100) DEFAULT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `hora_entrega` time DEFAULT '00:00:00',
  `codPersonal` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` char(1) DEFAULT '0',
  `eliminado` char(1) DEFAULT '0',
  PRIMARY KEY (`nroOrden`),
  KEY `fk_orden_solicitud` (`nroSolicitud`),
  KEY `fk_orden_muestra` (`idMuestra`),
  CONSTRAINT `fk_orden_muestra` FOREIGN KEY (`idMuestra`) REFERENCES `muestra` (`idMuestra`),
  CONSTRAINT `fk_orden_solicitud` FOREIGN KEY (`nroSolicitud`) REFERENCES `solicitud` (`nroSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "ordentrabajo"
#

INSERT INTO `ordentrabajo` VALUES (1,1,'OT-0001-01-15','2015-10-06','Lab1',1,'P0001','NINGUNA OBSERVACION','2015-10-07','00:00:00',1,'2015-10-06 09:11:18','1','0'),(2,1,'OT-0001-02-15','2015-10-11','asd',1,'asd','asdddd','0000-00-00','00:00:00',1,'2015-10-11 20:58:53','1','0'),(3,3,'OT-0003-01-15','2015-10-11','ad',6,'asddd','dsasddd','2015-10-22','14:00:00',1,'2015-10-11 21:36:00','1','0'),(4,1,'OT-0001-03-15','2015-10-11','lab1',1,'CM-0001-03-15','asddd','2015-10-29','14:01:00',1,'2015-10-11 21:50:24','1','0'),(5,2,'OT-0002-01-15','2015-10-11','abced',5,'CM-0002-01-15','sasdfq   \n    ','2015-10-24','16:02:00',1,'2015-10-11 21:51:59','1','0'),(6,1,'OT-0001-04-15','2015-10-11','lab1',1,'CM-0001-04-15','sddd','2015-10-31','13:00:00',1,'2015-10-11 21:53:51','1','0'),(7,1,'OT-0001-05-15','2015-10-11','asd',1,'CM-0001-05-15','asdd','2015-10-31','13:01:00',1,'2015-10-11 21:54:56','1','0'),(8,1,'OT-0001-06-15','2015-10-11','dfs',1,'CM-0001-06-15','dsff','2015-10-31','13:00:00',1,'2015-10-11 21:57:59','1','0'),(9,1,'OT-0001-07-15','2015-10-11','asd',1,'CM-0001-07-15','sdaaaaaa\n    ','2015-10-24','16:01:00',1,'2015-10-11 21:58:57','1','0');

#
# Structure for table "detalleordentrab"
#

CREATE TABLE `detalleordentrab` (
  `nroOrden` int(10) unsigned DEFAULT NULL,
  `idServicio` int(11) DEFAULT NULL,
  `resultado` varchar(255) DEFAULT '',
  KEY `fk_serv_detalle` (`idServicio`),
  KEY `nroOrden` (`nroOrden`),
  CONSTRAINT `detalleordentrab_ibfk_1` FOREIGN KEY (`nroOrden`) REFERENCES `ordentrabajo` (`nroOrden`),
  CONSTRAINT `fk_serv_detalle` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detalleordentrab"
#

INSERT INTO `detalleordentrab` VALUES (1,1,'ninguna'),(1,2,'ninguna'),(1,4,NULL),(1,5,NULL),(1,6,'ninguna'),(1,7,'ninguna'),(2,1,NULL),(2,2,NULL),(2,4,NULL),(2,5,NULL),(2,6,NULL),(2,7,NULL),(3,1,NULL),(3,2,NULL),(4,1,NULL),(4,2,'sadsad'),(4,4,NULL),(4,5,NULL),(4,6,'CERR'),(4,7,'ncerr'),(5,1,NULL),(5,2,NULL),(6,1,NULL),(6,2,'asdsdsdsd'),(6,4,NULL),(6,5,NULL),(6,6,'dssssss'),(6,7,NULL),(7,1,NULL),(7,2,NULL),(7,4,NULL),(7,5,NULL),(7,6,NULL),(7,7,NULL),(8,1,NULL),(8,2,NULL),(8,4,NULL),(8,5,NULL),(8,6,NULL),(8,7,NULL),(9,1,NULL),(9,2,NULL),(9,4,NULL),(9,5,NULL),(9,6,NULL),(9,7,NULL);

#
# Structure for table "reporteensayo"
#

CREATE TABLE `reporteensayo` (
  `nroEnsayo` int(10) unsigned NOT NULL,
  `nroOrden` int(10) unsigned NOT NULL,
  `cod_reporte` varchar(100) DEFAULT NULL,
  `idMuestra` int(11) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `laboratorio` varchar(50) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `hora_entrega` time DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `eliminado` char(1) DEFAULT NULL,
  `ingresado_por` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nroEnsayo`),
  KEY `fk_reporte_orden` (`nroOrden`),
  KEY `fk_reporte_muestra` (`idMuestra`),
  CONSTRAINT `fk_reporte_muestra` FOREIGN KEY (`idMuestra`) REFERENCES `muestra` (`idMuestra`),
  CONSTRAINT `fk_reporte_orden` FOREIGN KEY (`nroOrden`) REFERENCES `ordentrabajo` (`nroOrden`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "reporteensayo"
#

INSERT INTO `reporteensayo` VALUES (1,1,NULL,1,NULL,'2015-10-06 10:30:41','Lab1','ninguna',NULL,NULL,'1',NULL,1),(2,4,NULL,1,NULL,'2015-10-11 22:44:54','lab1','       \n    ',NULL,NULL,NULL,NULL,1),(3,6,'RE-0001-04-15',1,NULL,'2015-10-11 23:02:13','lab1','dasss',NULL,NULL,'1',NULL,1),(4,1,'RE-0001-01-15',1,NULL,'2015-10-11 23:02:49','Lab1','       \n    ',NULL,NULL,NULL,NULL,1);

#
# Structure for table "detreporteensayo"
#

CREATE TABLE `detreporteensayo` (
  `nroEnsayo` int(10) unsigned NOT NULL,
  `idServicio` int(11) DEFAULT NULL,
  `analista` int(11) DEFAULT NULL,
  `resultado` varchar(255) DEFAULT NULL,
  KEY `fk_detalle_reporte` (`nroEnsayo`),
  KEY `fk_detreporte_servicio` (`idServicio`),
  CONSTRAINT `fk_detalle_reporte` FOREIGN KEY (`nroEnsayo`) REFERENCES `reporteensayo` (`nroEnsayo`),
  CONSTRAINT `fk_detreporte_servicio` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detreporteensayo"
#

INSERT INTO `detreporteensayo` VALUES (1,1,NULL,'ninguna'),(1,2,NULL,'ninguna'),(1,4,NULL,'null'),(1,5,NULL,'null'),(1,6,NULL,'ninguna'),(1,7,NULL,'ninguna'),(2,1,NULL,'null'),(2,2,NULL,'sadsad'),(2,4,NULL,'null'),(2,5,NULL,'null'),(2,6,NULL,'CERR'),(2,7,NULL,'ncerr'),(3,1,NULL,'null'),(3,2,NULL,'asdsdsdsd'),(3,4,NULL,'null'),(3,5,NULL,'null'),(3,6,NULL,'dssssss'),(3,7,NULL,'null'),(4,1,NULL,'ninguna'),(4,2,NULL,'ninguna'),(4,4,NULL,'null'),(4,5,NULL,'null'),(4,6,NULL,'ninguna'),(4,7,NULL,'ninguna');

#
# Structure for table "detallesolicitud"
#

CREATE TABLE `detallesolicitud` (
  `idServicio` int(11) NOT NULL,
  `nroSolicitud` int(10) unsigned NOT NULL,
  `acreditado` char(2) DEFAULT 'NO',
  `estado` char(1) DEFAULT NULL,
  `precio` decimal(8,2) DEFAULT '0.00',
  KEY `fk_DetSol_Sol` (`nroSolicitud`),
  KEY `fk_DetSol_Serv` (`idServicio`),
  CONSTRAINT `fk_DetSol_Serv` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`),
  CONSTRAINT `fk_DetSol_Sol` FOREIGN KEY (`nroSolicitud`) REFERENCES `solicitud` (`nroSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detallesolicitud"
#

INSERT INTO `detallesolicitud` VALUES (1,1,'SI',NULL,264.00),(2,1,'NO',NULL,190.00),(4,1,'SI',NULL,106.00),(5,1,'NO',NULL,0.00),(6,1,'SI',NULL,244.00),(7,1,'NO',NULL,244.00),(1,2,'SI',NULL,264.00),(2,2,'NO',NULL,190.00),(1,3,'SI',NULL,264.00),(2,3,'NO',NULL,190.00);
