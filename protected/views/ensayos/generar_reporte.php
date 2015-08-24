<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Reporte de Ensayos';
// Titulo del modulo
$this->moduleTitle="Reporte de Ensayos";
// Subtitulo del modulo
$this->moduleSubTitle="Reporte de Ensayos";
// Breadcrumbs
$this->breadcrumbs=array(
	'Reporte de Ensayos',
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
	<h3 class="box-title">Reporte de Ensayos Nro: <b id="NroReporte" NroReporte="" >    </b></h3>
	<h3 class="box-title">Nº de Orden de Trabajo :<b id="NroReporte" NroReporte="" >    </b></h3>		
<?php else: ?>
	<h3 class="box-title">Reporte de Ensayos Nro: <b id="NroReporte" NroReporte="<?php echo $data; ?>">   </b></h3>
	<h3 class="box-title">Nº de Orden de Trabajo : <b id="NroOrdenTrabajo" NroOrden="<?php echo $data; ?>" >  <?php echo $data; ?> </b></h3>

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
	
	

	<table id="DetalleReporte" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%" style="border-bottom:2px solid;">
	<thead>
	<tr>                        
	<th style="vertical-align: middle;" >ID</th>                        
	<th style="vertical-align: middle;" >Ensayo</th>	
	<th style="vertical-align: middle;" >Metodo</th>
	<th style="vertical-align: middle;" ><span style="display:none;">RES</span></th>	
	</tr>
	</thead>                 
	</table>
	
	<div id="FormResultado" class="row" style="margin:2em;border:2px solid;padding:1em;display:none;">
		<div class="col-md-12">
			<h3 style="text-align:center;">Resultado de servicio</h3>
		</div>
		<hr style="border:2px solid;">
		<div class="form-group col-md-6">
	<label class="" for="">Servicio : </label>
	<input type="text" class="form-control" id="txtServicio" disabled>
	</div>
		<div class="form-group col-md-6">
	<label class="" for="">Metodo : </label>
	<input type="text" class="form-control" id="txtMetodo" disabled>
	</div>
		<div class="form-group col-md-12">
	<label class="" for="">Resultado: </label>
	<input type="text" class="form-control" id="txtResultado" >
	</div>
	<div class="col-md-6">
		<button type="button" class="btn btn-primary col-md-12" id="btn_GuardarResultado">Guardar</button>
	</div>
	<div class="col-md-6">
		<button type="button" class="btn btn-danger col-md-12" id="btn_cancelar_resultado">Cancelar</button>
	</div>
	</div>
	
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
   		Reporte de Ensayos  Guardado Correctamente
   		</div>
   	</div>
</div>
	
<div class="row" >
	
	
	
	<div class="col-md-6">
		<button type="button" class="btn btn-primary col-md-12" id="btn_GuardarReporte">Guardar e Imprimir</button>
	</div>
	<div class="col-md-6">
		<button type="button" class="btn btn-danger col-md-12" id="btn_cancelar">Cancelar</button>
	</div>

	<div class="col-md-12" style="margin-top:1em;">
		<button type="button" class="btn btn-primary col-md-12" id="btn_aceptar_Solicitud">Enviar a analista</button>
	</div>
	

</div>


</div><!-- /.box-body -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/cotizacion.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/solicitud.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/ordentrab.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/reporte.js" type="text/javascript"></script>

<script>

$("#btn_GuardarResultado").click(function(event) {
	var NroOrden=$("#txtServicio").attr('nroOrden');	
	var idservicio=$("#txtServicio").attr('idservicio');
    var resultado=$("#txtResultado").val();

	ReporteCore.guardarResultadoServicio(NroOrden,idservicio,resultado);
	
});

$("#btn_GuardarReporte").click(function(event) {
var nroReporte=$("#NroReporte").attr('NroReporte');
var nroOrden=$("#NroOrdenTrabajo").attr('NroOrden');
var laboratorio=$("#txtLaboratorio").val();
var idMuestra=$("#txtNomMuestra").attr('data-id');
var observaciones=$("#txtObservOrden").val();
var ingresado_por=1;
var detalle = $('#DetalleReporte').tableToJSON();
	ReporteCore.registrarReporteEnsayos(nroReporte,nroOrden,idMuestra,laboratorio,observaciones,ingresado_por,detalle);
	//var DetalleReporte=$("#DetalleReporte").val();
});

	$("#btn_cancelar_resultado").click(function(event) {
		  $("#FormResultado").hide();
	});
	
	$(document).ready(function() {
		ObtenerNroReporteE();

		var NroOrdenTrabajo=$("#NroOrdenTrabajo").attr('NroOrden');
		if (NroOrdenTrabajo!='') {
			ReporteCore.consultarOrdenT(NroOrdenTrabajo);
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
var fecha_emision=$("#fecha_actual").text();
var laboratorio=$("#txtLaboratorio").val();
var idMuestra=$("#txtNomMuestra").attr('data-id');
var idCliente=$("#txtNomMuestra").attr('id-cliente');
var NomMuestra=$("#txtNomMuestra").val();
var codMuestra=$("#txtCodMuestra").val();
var observaciones=$("#txtObservOrden").val();
var fecha_entrega=$("#txtFecha").val();
var detalle = $('#DetalleOrden').tableToJSON();
var hora=$("#txtHora").val();

var cant_muestra=$("#txtNumUnidad").val();
var peso_volumen=$("#txtPesoVol").val();
var presentacion=$("#txtPresentacion").val();
var metodocliente=$("#rdb_metodo").val();

var observaciones=$("#txtObservMuestra").val();

ClienteCore.actualizarMuestra(idMuestra,idCliente,codMuestra,NomMuestra,cant_muestra,peso_volumen,metodocliente,presentacion,observaciones);
OrdenCore.registrarOrdenTrabajo(nroOrden,nroSolicitud,fecha_emision,laboratorio,idMuestra,codMuestra,observaciones,fecha_entrega+hora,1,detalle);




});

	
</script>

