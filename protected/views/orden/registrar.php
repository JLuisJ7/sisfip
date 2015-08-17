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
	<label class="" for="">Nombre del Producto : </label>
	<input type="text" class="form-control" id="txtNomMuestra" >
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
	  <input type="radio" name="rdb_metodo" id="inlineRadio1" value="SI"> SI
	</label>
	<label class="radio-inline">
	  <input type="radio" name="rdb_metodo" id="inlineRadio2" value="NO"> NO
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

	
<div class="row" >
	
	
	
	<div class="col-md-6">
		<button type="button" class="btn btn-primary col-md-12" id="btn_GuardarSolicitud">Guardar e Imprimir</button>
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
$("#btn_GuardarSolicitud").click(function(event) {
/* ------------ */


var txtDocumento=$("#txtDocumento").val();
var txtNomCliente=$("#txtNomCliente").val();
var txtAtencion=$("#txtAtencion").val();
var txtDireccion=$("#txtDireccion").val();
var txtDistrito=$("#txtDistrito").val();
var txtProvincia=$("#txtProvincia").val();
var txtTelefono=$("#txtTelefono").val();
var txtEmail=$("#txtEmail").val();
var txtRefCliente=$("#txtRefCliente").val();

/* ------------ */
var nombre=$("#txtMuestra").val();
var marca=$("#txtMarca").val();
var identificacion=$("#txtIdentificacion").val();
var presentacion=$("#txtPresentacion").val();
var ObservacionesMuestra=$("#txtObservaciones").val();
var cant_muestra=$("#txtCantidad").val();
var idCliente=$("#txtDocumento").attr('data-id');
ClienteCore.actualizarCliente(idCliente,txtNomCliente,txtDocumento,txtAtencion,txtDireccion,txtTelefono,txtEmail,txtRefCliente,txtDistrito,txtProvincia);
  idMuestra=ClienteCore.registrarMuestra(idCliente,nombre,marca,identificacion,cant_muestra,presentacion,ObservacionesMuestra);
/* ------------ */

/* ------------ */

	var Acreditacion=$('input:radio[name=rdb_acreditación]:checked').val();


var Contramuestras=$('input:radio[name=rdb_contramuestras]:checked').val();
var observacionesServ=$("#txtObservacionesServicios").val();

/* ------------ */
var NroSolicitud=$("#NroSolicitud").attr('NroSolicitud');
var NroCotizacion=$("#NroSolicitud").attr('nroCotizacion');


/* ------------ */
if($('input:checkbox[name=chkServEnsayos]').prop('checked')){
	var Ensayos=$('input:checkbox[name=chkServEnsayos]:checked').val();
}else{
	var Ensayos='N';
}

if($('input:checkbox[name=chkServInspeccion]').prop('checked')){
	var Inspeccion=$('input:checkbox[name=chkServInspeccion]:checked').val();
}else{
	var Inspeccion='N';
}

if($('input:checkbox[name=chkServMuestreo]').prop('checked')){
	var muestreo=$('input:checkbox[name=chkServMuestreo]:checked').val();
}else{
	var muestreo='N';
}

if($('input:checkbox[name=chkOtrosServicios]').prop('checked')){
	var otros=$("#txtOtrosServicios").val();
}else{
	var otros=null;
}

//var Ensayos=$('input:checkbox[name=chkServEnsayos]:checked').val();
//var Inspeccion=$('input:checkbox[name=chkServInspeccion]:checked').val();
//var muestreo=$('input:checkbox[name=chkServMuestreo]:checked').val();

//var otros=$("#txtOtrosServicios").val();

var fecha_entrega=$("#txtFecha").val();
var txtHora=$("#txtHora").val();
var total=$("#txtTotal").val();	
/* --------------*/

SolicitudCore.registrarSolicitud(NroSolicitud,NroCotizacion,idCliente,idMuestra,Ensayos,Inspeccion,muestreo,otros,total,fecha_entrega,Acreditacion,Contramuestras,observacionesServ);
});

	
</script>

