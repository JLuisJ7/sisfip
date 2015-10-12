<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Orden de Trabajo';
// Titulo del modulo
$this->moduleTitle="Orden de Trabajo";
// Subtitulo del modulo
$this->moduleSubTitle="Orden de Trabajo para servicios de ensayos";
// Breadcrumbs
$this->breadcrumbs=array(
	'Orden de Trabajo para servicios de ensayos',
);?>
<style>
	tbody {
    text-align:center;
}
</style>
<section class="content">

<!--end contadores-->
<div class="box box-primary">
<div class="box-header">
<?php if (empty($data)): ?>
	<h3 class="box-title">Orden de Trabajo para servicios de Ensayos Nro: <b id="NroOrdenTrabajo" NroSolicitud="" >    </b></h3>	
<?php else: ?>
	<h3 class="box-title">Orden de Trabajo para servicios de Ensayos Nro: <b id="NroOrdenTrabajo" NroSolicitud="<?php echo $data; ?>">   </b></h3>

<?php endif; ?>
	<h3 class="box-title" style="float:right;" id="fecha_actual"></h3>
</div>
<div class="box-body">

	<div class="form-group col-md-6">
	<label class="" for="">Laboratorio Sección : </label>
	<input type="text" class="form-control" id="txtLaboratorio" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Nombre del Producto : </label>
	<input type="text" class="form-control" id="txtNomMuestra" data-id="" id-cliente="">
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Codigo de Muestra : </label>
	<input type="text" class="form-control" data-id="" id="txtCodMuestra" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">N° de Unidades por Muestra : </label>
	<input type="text" class="form-control" id="txtNumUnidad" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Peso / Volumen por  Muestra : : </label>
	<input type="text" class="form-control" id="txtPesoVol" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Presentacion : </label>
	<input type="text" class="form-control" id="txtPresentacion" >
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Incluye Método de Ensayo del Cliente ( SI / NO ) :  </label>
	<label class="radio-inline">
	  <input type="radio" name="rdb_metodo" id="rdb_metodo" value="SI"> SI
	</label>
	<label class="radio-inline">
	  <input type="radio" name="rdb_metodo" id="rdb_metodo" value="NO"> NO
	</label>
	

	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Observaciones Adicionales : </label>
	<textarea id="txtObservMuestra" class="form-control col-md-12"  rows="2" >       
    </textarea>
	</div>
	

	<table id="DetalleOrden" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%" style="border-bottom:2px solid;">
	<thead>
	<tr>                        
	<th style="vertical-align: middle;" >ID</th>                        
	<th style="vertical-align: middle;" >Ensayo</th>	
	<th style="vertical-align: middle;" >Metodo</th>	
	</tr>
	</thead>                 
	</table>
	<div class="form-group col-md-12">
	<label class="" for="">Observaciones : </label>
	<textarea id="txtObservOrden" class="form-control col-md-12"  rows="2" >       
    </textarea>
	</div>
	<div class="row">
		<div class="form-group col-md-4">	
			<label class="" for="">Fecha y hora de Entrega de los Resultados : </label>
			<div class="input-group">
				<div class="input-group-addon"><input type="date" class="form-control" id="txtFecha" ></div>			
				<div class="input-group-addon"><input type="time" class="form-control" id="txtHora" ></div>			
			</div>				
		</div>
	</div>
<div class="row">
	<div class="col-md-12"> <div class="alert alert-success alert-dismissable" id="Success" style="display:none;">
   		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   		<h4>  <i class="icon fa fa-check"></i> Alert!</h4>
   		Orden de Trabajo Guardada Correctamente
   		</div>
   	</div>
</div>
	
<div class="row" >
	
	
	
	<div class="col-md-6">
		<button type="button" class="btn btn-primary col-md-12" id="btn_GuardarOrden">Guardar e Imprimir</button>
	</div>
	<div class="col-md-6">
		<button type="button" class="btn btn-danger col-md-12" id="btn_cancelar">Cancelar</button>
	</div>

	<!-- <div class="col-md-12" style="margin-top:1em;">
		<button type="button" class="btn btn-primary col-md-12" id="btn_aceptar_Solicitud">Enviar a analista</button>
	</div> -->
	

</div>


</div><!-- /.box-body -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/cotizacion.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/solicitud.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/ordentrab.js" type="text/javascript"></script>

<script>
	
	
	$(document).ready(function() {
		ObtenerNroOrdenT();

		var nroSolicitud=$("#NroOrdenTrabajo").attr('NroSolicitud');
		if (nroSolicitud!='') {
			SolicitudCore.consultarSolicitudOT(nroSolicitud);
		};

				
	});

$("#btn_aceptar_Solicitud").click(function(event) {
		var NroSolicitud=$("#NroSolicitud").attr('NroSolicitud');
		 SolicitudCore.actualizarEstadoSolicitud(NroSolicitud,1);
	});
$("#btn_GuardarOrden").click(function(event) {
/* ------------ */

var nroOrden=$("#NroOrdenTrabajo").attr('nroordentrabajo');
var nroSolicitud=$("#NroOrdenTrabajo").attr('NroSolicitud');
var cod_ordentrab=$("#NroOrdenTrabajo").attr('data-codigo');
var fecha_emision=$("#fecha_actual").text();
var laboratorio=$("#txtLaboratorio").val();
var idMuestra=$("#txtNomMuestra").attr('data-id');
var idCliente=$("#txtNomMuestra").attr('id-cliente');
var NomMuestra=$("#txtNomMuestra").val();
var codMuestra=$("#txtCodMuestra").val();
var observaciones=$("#txtObservOrden").val();
var fecha_entrega=$("#txtFecha").val();
var detalle = $('#DetalleOrden').tableToJSON();
var hora_entrega=$("#txtHora").val()+':00';

var cant_muestra=$("#txtNumUnidad").val();
var peso_volumen=$("#txtPesoVol").val();
var presentacion=$("#txtPresentacion").val();
var metodocliente=$("#rdb_metodo").val();

var observaciones=$("#txtObservMuestra").val();

ClienteCore.actualizarMuestra(idMuestra,idCliente,codMuestra,NomMuestra,cant_muestra,peso_volumen,metodocliente,presentacion,observaciones);
OrdenCore.registrarOrdenTrabajo(nroOrden,nroSolicitud,cod_ordentrab,fecha_emision,laboratorio,idMuestra,codMuestra,observaciones,fecha_entrega,hora_entrega,1,detalle);




});

	
</script>

