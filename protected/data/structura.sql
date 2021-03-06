create table Cliente(
idCliente int unsigned primary key,
dni varchar(11),
nombres varchar(100),
atencion varchar(100),
direccion varchar(100),
telefono varchar(15),
correo varchar(20),
referencia varchar(100),
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estado char(1) DEFAULT '0'
);

create table Producto(
idProducto int unsigned auto_increment primary key,
descripcion varchar(30),
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estado char(1) DEFAULT '0'
);

create table Servicio(
idServicio int unsigned,
idProducto int unsigned, 
descripcion varchar(50),
metodo varchar(30),
tiempo_entrega int ,
cant_muestra int,
precio  numeric(8,2),
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
detalle varchar(200),
estado char(1) DEFAULT '0'
);


create table Cotizacion(
idCotizacion int unsigned PRIMARY KEY,
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
idCliente int unsigned,
total numeric(8,2), 
fecha_entrega date,
registrado_por int unsigned,
estado varchar(10),
eliminado char(1) DEFAULT '1'
);

create table DetalleCotizacion(
idCotizacion int unsigned,
idProducto int unsigned,
idServicio int unsigned,
cantidad int, 
tiempo int,
costo numeric(8,2)
);

-- PRIMARY KEYs
ALTER TABLE Servicio ADD CONSTRAINT pk_idServ_idProd PRIMARY KEY(idServicio,idProducto);
-- FOREIGN KEYs

ALTER TABLE DetalleCotizacion ADD CONSTRAINT fk_DetCot_Cot FOREIGN KEY(idCotizacion) references Cotizacion(idCotizacion);
ALTER TABLE DetalleCotizacion ADD CONSTRAINT fk_DetCot_Prod FOREIGN KEY(idProducto) references Producto(idProducto);
ALTER TABLE DetalleCotizacion ADD CONSTRAINT fk_DetCot_Serv FOREIGN KEY(idServicio) references Servicio(idServicio);
ALTER TABLE Cotizacion ADD CONSTRAINT fk_cot_cli FOREIGN KEY(idCliente) references Cliente(idCliente);
ALTER TABLE Servicio ADD CONSTRAINT fk_Serv_Prod FOREIGN KEY(idProducto) references Producto(idProducto);


CREATE  TABLE Solicitud(
 nroSolicitud INT unsigned NOT NULL ,
 nroCotizacion INT unsigned NOT NULL ,
 idCliente INT NOT NULL ,
 idMuestra INT NOT NULL ,
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 Ensayos CHAR(1) NULL ,
 Inspeccion CHAR(1) NULL ,
 muestreo CHAR(1) NULL ,
 otros VARCHAR(200) NULL ,
 total DECIMAL(8,2) NULL ,
 fecha_entrega DATE NULL ,
 Acreditacion CHAR(2) NULL ,
 Contramuestras CHAR(2) NULL ,
 observaciones VARCHAR(300) NULL);
-- PRIMARY KEYs
ALTER TABLE Solicitud ADD CONSTRAINT pk_nroSol_nroCot PRIMARY KEY(nroSolicitud,nroCotizacion);
ALTER TABLE Solicitud ADD CONSTRAINT fk_Sol_Cot FOREIGN KEY(nroCotizacion) references Cotizacion(idCotizacion);
ALTER TABLE Solicitud ADD CONSTRAINT fk_Sol_cli FOREIGN KEY(idCliente) references Cliente(idCliente);
ALTER TABLE Solicitud ADD CONSTRAINT fk_Sol_muest FOREIGN KEY(idMuestra) references Muestra(idMuestra);

CREATE TABLE DetalleSolicitud(
  idServicio int(11) NOT NULL,
  nroSolicitud int(11) unsigned NOT NULL DEFAULT '0',
  acreditado char(2) DEFAULT 'NO',
  estado char(1) DEFAULT NULL,
  precio decimal(8,2) DEFAULT NULL
);

ALTER TABLE DetalleSolicitud ADD CONSTRAINT fk_DetSol_Sol FOREIGN KEY(nroSolicitud) references Solicitud(nroSolicitud);
ALTER TABLE DetalleSolicitud ADD CONSTRAINT fk_DetSol_Serv FOREIGN KEY(idServicio) references Servicio(idServicio);

CREATE TABLE Muestra(
  idMuestra int(11) PRIMARY KEY,
  idCliente int(11) NOT NULL,
  nombre varchar(45) NOT NULL,
  marca varchar(45) ,
  identificacion varchar(45) ,
  Cant_Muestra int, 
  estado char(1) DEFAULT '0',  
  presentacion varchar(100) DEFAULT NULL,
  observaciones varchar(200) DEFAULT NULL, 
);

ALTER TABLE Muestra ADD CONSTRAINT fk_Muest_Cli FOREIGN KEY(idCliente) references Cliente(idCliente);



create table ordenTrabajo(
nroOrden int unsigned auto_increment primary key,
nroSolicitud int unsigned,
fecha_emision TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
laboratorio varchar(50),
idMuestra int,
codMuestra char(5),
observaciones varchar(200),
fecha_entrega datetime,
codPersonal int
);

ALTER TABLE ordenTrabajo ADD CONSTRAINT fk_orden_solicitud FOREIGN KEY(nroSolicitud) references Solicitud(nroSolicitud);
ALTER TABLE ordenTrabajo ADD CONSTRAINT fk_orden_solicitud FOREIGN KEY(idMuestra) references Muestra(idMuestra);

create table detalleOrdenTrab(
nroOrden int unsigned ,
idServicio int
);
ALTER TABLE detalleOrdenTrab ADD CONSTRAINT fk_orden_detalle FOREIGN KEY(nroOrden) references ordenTrabajo(nroOrden);
ALTER TABLE detalleOrdenTrab ADD CONSTRAINT fk_serv_detalle FOREIGN KEY(idServicio) references Servicio(idServicio);

a
MuestraF(
codigo char(5),
Nombre varchar(30), 
unidadespormuestra int,
peso_vol varchar(20),
presentacion varchar(200),
metodoCliente char(2),
observaciones varchar(200)

);


create table reporteensayo(
nroEnsayo int unsigned not null,
nroOrden int unsigned not null,
idMuestra int,
fecha_emision date,
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
laboratorio varchar(50),
observaciones varchar(255),
fecha_entrega date,
hora entrega time,
estado char(1),
eliminado char(1)
);

ALTER TABLE reporteensayo ADD CONSTRAINT fk_reporte_orden FOREIGN KEY(nroOrden) references ordenTrabajo(nroOrden);
ALTER TABLE reporteensayo ADD CONSTRAINT fk_reporte_muestra FOREIGN KEY(idMuestra) references Muestra(idMuestra);

create table detreporteensayo(
nroEnsayo int unsigned not null,
idServicio int,
analista int,
resultado varchar(255)
);

ALTER TABLE reporteensayo ADD CONSTRAINT fk_detalle_reporte FOREIGN KEY(nroEnsayo) references reporteensayo(nroEnsayo);
ALTER TABLE reporteensayo ADD CONSTRAINT fk_detreporte_servicio FOREIGN KEY(idServicio) references servicio(idServicio);


select cli.nombres,cli.direccion,cli.provincia,cli.telefono,cli.doc_ident,sol.nroSolicitud,sol.cod_solicitud,mu.nombre,mu.identificacion,mu.marca,mu.cant_muestra,mu.presentacion,ot.nroOrden,ot.cod_ordentrab,re.cod_reporte,re.nroEnsayo, 
concat('IE-',SUBSTRING(re.cod_reporte,4,100)) as cod_informe
from reporteensayo as re
inner join ordentrabajo as ot on ot.nroOrden=re.nroOrden
inner join muestra as mu on mu.idMuestra=ot.idMuestra
inner join solicitud as sol on sol.nroSolicitud=ot.nroSolicitud
inner join cliente as cli on cli.idCliente=sol.idCliente



create table informeensayo(
nroInforme int unsigned not null,
codInforme varchar(100),
nroReporte int unsigned,
nroOrden int unsigned,
nroSolicitud int unsigned,
idCliente int ,
idMuestra int,
fecha_inicio date,
fecha_termino date,
observaciones varchar(255),
estado char(1) DEFAULT '0',  
eliminado char(1) DEFAULT '0',  
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE informeensayo ADD CONSTRAINT fk_informe_reporteensayo FOREIGN KEY(nroReporte) references reporteensayo(nroEnsayo);
ALTER TABLE informeensayo ADD CONSTRAINT fk_informe_ordentrabajo FOREIGN KEY(nroOrden) references ordentrabajo(nroOrden);
ALTER TABLE informeensayo ADD CONSTRAINT fk_informe_solicitud FOREIGN KEY(nroSolicitud) references solicitud(nroSolicitud);
ALTER TABLE informeensayo ADD CONSTRAINT fk_informe_Cliente FOREIGN KEY(idCliente) references Cliente(idCliente);
ALTER TABLE informeensayo ADD CONSTRAINT fk_informe_Muestra FOREIGN KEY(idMuestra) references Muestra(idMuestra);
