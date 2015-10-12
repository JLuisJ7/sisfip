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
	<h3 class="box-title">Informe de Ensayos Nro: <b id="NroInforme" NroInforme="" >    </b></h3>
	
<?php else: ?>
	<h3 class="box-title">Informe de Ensayos Nro: <b id="NroInforme" NroReporte="<?php echo $data; ?>">   </b></h3>
	
<?php endif; ?>
	<h3 class="box-title" style="float:right;" id="fecha_actual"></h3>
</div>
<div class="box-body">
<div class="box-header">
	<h3 class="box-title">INFORMACIÓN GENERAL </h3>
</div>
	<div class="form-group col-md-6">
	<label class="" for="">Solicitante : </label>
	<input type="text" class="form-control" id="txtSolicitante" data-id="" id-cliente="">
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">RUC : </label>
	<input type="text" class="form-control" id="txtRUC">
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Dirección Legal : </label>
	<input type="text" class="form-control" id="txtDireccion" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Provincia / Departamento : </label>
	<input type="text" class="form-control" id="txtProvincia" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Teléfonos / Fax : </label>
	<input type="text" class="form-control" id="txtTelefono" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Solicitud : </label>
	<input type="text" class="form-control" id="txtSolicitud" >
	</div>

	<div class="form-group col-md-12">
	<label class="" for="">Fecha de Recepcion de Solicitud : </label>
	<input type="text" class="form-control" id="txtFecha_R_Solicitud" >
	</div>
	
	<div class="form-group col-md-12">
	<label class="" for="">Ensayos / Servicios Solicitados : </label>
	<input type="text" class="form-control" id="txtEnsayos_Solicitados" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Fecha de Inicio de Ensayo: </label>
	<input type="date" class="form-control" id="txtFecha_Inicio" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Fecha de Termino de Ensayo: </label>
	<input type="date" class="form-control" id="txtFecha_Termino" >
	</div>	

	<div class="form-group col-md-12">
		<h3 class="box-title">INFORMACIÓN DEL PRODUCTO </h3>
	</div>	

	<div class="form-group col-md-6">
	<label class="" for="">Producto (Nombre Genérico) : </label>
	<input type="text" class="form-control" id="txtProducto" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Identificación de las Muestras Recepcionadas</label>
	<input type="text" class="form-control" id="txtIdentificiacion" >
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Marca Comercial o Especial de las Muestras</label>
	<input type="text" class="form-control" id="txtMarca" >
	</div>


	<div class="form-group col-md-4">
	<label class="" for="">Número de Muestras Recepcionadas</label>
	<input type="text" class="form-control" id="txtNumeroMuestra" >
	</div>
	<div class="form-group col-md-4">
	<label class="" for="">Cantidad de Muestra Recepcionada</label>
	<input type="text" class="form-control" id="txtCantidadMuestra" >
	</div>
	<div class="form-group col-md-4">
	<label class="" for="">Forma de Presentación de las Muestras</label>
	<input type="text" class="form-control" id="txtPresentacion" >
	</div>
	

	<table id="DetalleReporte" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%" style="border-bottom:2px solid;">
	<thead>
	<tr>                        
	<th style="vertical-align: middle;" >ID</th>                        
	<th style="vertical-align: middle;" >Ensayo</th>	
	<th style="vertical-align: middle;" >Metodo</th>
	<th style="vertical-align: middle;" >Resultado</th>	
	</tr>
	</thead>                 
	</table>
	
	
	
	<div class="form-group col-md-12">
	<label class="" for="">Observaciones : </label>
	<textarea id="txtObservOrden" class="form-control col-md-12"  rows="2" >       
    </textarea>
	</div>
	<!-- <div class="row">
		<div class="form-group col-md-4">	
			<label class="" for="">Fecha y hora de Entrega de los Resultados : </label>
			<div class="input-group">
				<div class="input-group-addon"><input type="date" class="form-control" id="txtFecha" ></div>			
				<div class="input-group-addon"><input type="time" class="form-control" id="txtHora" ></div>			
			</div>				
		</div>
	</div> -->
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
var cod_reporte=$("#NroReporte").attr('data-codigo');
var nroOrden=$("#NroOrdenTrabajo").attr('NroOrden');
var laboratorio=$("#txtLaboratorio").val();
var idMuestra=$("#txtNomMuestra").attr('data-id');
var observaciones=$("#txtObservOrden").val();
var ingresado_por=1;
var detalle = $('#DetalleReporte').tableToJSON();
	ReporteCore.registrarReporteEnsayos(nroReporte,nroOrden,cod_reporte,idMuestra,laboratorio,observaciones,ingresado_por,detalle);
	//var DetalleReporte=$("#DetalleReporte").val();
});

	$("#btn_cancelar_resultado").click(function(event) {
		  $("#FormResultado").hide();
	});
	
	$(document).ready(function() {
		GenerarNroInforme();

		
				
	});


	
</script>

