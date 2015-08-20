<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Solicitud';
// Titulo del modulo
$this->moduleTitle="Solicitud";
// Subtitulo del modulo
$this->moduleSubTitle="Solicitud para servicios de ensayos";
// Breadcrumbs
$this->breadcrumbs=array(
	'Solicitud para servicios de ensayos',
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
	<h3 class="box-title">Solicitud para servicios de Ensayos Nro: <b id="NroSolicitud" NroSolicitud="" nroCotizacion="">    </b></h3>	
<?php else: ?>
	<h3 class="box-title">Solicitud para servicios de Ensayos Nro: <b id="NroSolicitud" NroSolicitud="" nroCotizacion="<?php echo $data; ?>">   </b></h3>

<?php endif; ?>
	<h3 class="box-title" style="float:right;" id="fecha_actual">2015-07-16 </h3>
</div>
<div class="box-body">

	<!-- Date range -->
	<div class="form-group col-md-3">	
		<label class="" for="">DNI o RUC: <span class="text-danger " id="doc_Exist" style="display:none;">El cliente no Existe</span></label>
		<div class="input-group">
			<input type="text" class="form-control" id="txtDocumento" data-id="nuevo" autofocus>
			<span class="input-group-btn">
			    <button class="btn btn-default " type="button" id="consultarNro_Doc"><i class="fa fa-search"></i></button>
			</span>
		</div>	
	</div>	
	<div class="form-group col-md-9">
	<label class="" for="">Cliente / Solicitante : </label>
	<input type="text" class="form-control cli_block" id="txtNomCliente" >
	</div>
	
	<div class="form-group col-md-12">
	<label class="" for="">Atencion a : </label>
	<input type="text" class="form-control cli_block" id="txtAtencion" >
	</div>
	<div class="form-group col-md-4">
	<label class="" for="">Direccion : </label>
	<input type="text" class="form-control cli_block" id="txtDireccion" >
	</div>
	<div class="form-group col-md-4">
	<label class="" for="">Distrito : </label>
	<input type="text" class="form-control cli_block" id="txtDistrito" >
	</div>
	<div class="form-group col-md-4">
	<label class="" for="">Provincia - Departamento : </label>
	<input type="text" class="form-control cli_block" id="txtProvincia" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Telefono : </label>
	<input type="text" class="form-control col-md-12 cli_block" id="txtTelefono" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">E-mail : </label>
	<input type="text" class="form-control col-md-12 cli_block" id="txtEmail" >
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Comunicación de Referencia : </label>
	<input type="text" class="form-control cli_block" id="txtRefCliente" >
	</div>

	<div class="form-group col-md-12">
		<label class="" for="">Servicios Solicitados: </label>
	<label class="checkbox-inline">
	  <input type="checkbox" id="chkServEnsayos" name="chkServEnsayos" value="X"> Ensayos
	</label>
	<label class="checkbox-inline">
	  <input type="checkbox" id="chkServInspeccion" name="chkServInspeccion" value="X"> Inspección
	</label>
	<label class="checkbox-inline">
	  <input type="checkbox" id="chkServMuestreo" name="chkServMuestreo" value="X"> Muestreo
	</label>
	<label class="checkbox-inline">
	  <input type="checkbox" id="chkOtrosServicios" name="chkOtrosServicios" value="X"> otros (especificar)
	  <input type="text" class="" id="txtOtrosServicios" style="">
	</label>

	</div>
	
	<div class="form-group col-md-6">
	<label class="" for="">Muestra : </label>
	<input type="text" class="form-control" id="txtMuestra" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Marca : </label>
	<input type="text" class="form-control" id="txtMarca" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Identificación : </label>
	<input type="text" class="form-control" id="txtIdentificacion" >
	</div>
	<div class="form-group col-md-6">
	<label class="" for="">Presentacion : </label>
	<input type="text" class="form-control" id="txtPresentacion" >
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Observaciones : </label>
	<textarea id="txtObservaciones" class="form-control col-md-12"  rows="2" >       
    </textarea>
	</div>
	

	<!-- <div class="form-group col-md-8">
	<label class="" for="s_listarServicio">Servicio : <span id="repeatServicio" class="text-danger"></span></label>
	<select id="listarServicio" class="selectpicker form-control" data-live-search="true" title="Seleccione Servicio" style="display:none;">
	<option value="">Seleccione Servicio</option>
	</select>

	</div>

    <div class="form-group">
            <label for="" style="color:transparent;">Agregar</label><br>
            <button id="agregarServicio" type="button" class="btn btn-default"><i class="fa fa-cart-plus" ></i> Agregar</button>         
    </div> -->

	<table id="DetalleCotizacion" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%" style="border-bottom:2px solid;">
	<thead>
	<tr>                        
	<th style="vertical-align: middle;" >id</th>                        
	<th style="vertical-align: middle;" >Descripcion</th>	
	<th style="vertical-align: middle;" >Metodologia</th>
	<th style="vertical-align: middle;" >Tiempo </th>
	<th style="vertical-align: middle;" >Cantidad </th> 
	<th style="vertical-align: middle;" >Tarifa</th>                        
	<th style="vertical-align: middle;" >Acreditado</th>
	
	</tr>
	</thead>                 
	</table>



	
<div class="row" >
	
	<div class="form-group col-md-4">	
		<label class="" for="">Fecha y hora de Entrega de los Resultados : </label>
		<div class="input-group">
			<div class="input-group-addon"><input type="date" class="form-control" id="txtFecha" ></div>			
			<div class="input-group-addon"><input type="time" class="form-control" id="txtHora" ></div>			
		</div>
			
	</div>
	<div class="form-group col-md-4">	
		<label class="" for="">Cantidad de Muestra Necesaria : </label>
		<div class="input-group">
			<div class="input-group-addon">NRO</div>
			<input type="text" class="form-control" id="txtCantidad" >
			
		</div>	
	</div>	

	<div class="form-group col-md-4">
	<label class="" for="">Valor total de los servicios : </label>
	<div class="input-group">
	<div class="input-group-addon">Total S/.</div>
	<input type="text" class="form-control" id="txtTotal" placeholder="0.00" value="0.00" disabled>
	</div>
	</div>
<div class="form-group col-md-12">
	<label class="" for="">¿Informe de Ensayo en papel con símbolo de acreditación ?   </label>
	<label class="radio-inline">
	  <input type="radio" name="rdb_acreditación" id="inlineRadio1" value="SI"> SI
	</label>
	<label class="radio-inline">
	  <input type="radio" name="rdb_acreditación" id="inlineRadio2" value="NO" checked> NO
	</label>
	

	</div>
<div class="form-group col-md-12">
	<label class="" for="">¿Entrega de contramuestras ?   </label>
	<label class="radio-inline">
	  <input type="radio" name="rdb_contramuestras" id="inlineRadio1" value="SI"> SI
	</label>
	<label class="radio-inline">
	  <input type="radio" name="rdb_contramuestras" id="inlineRadio2" value="NO" checked> NO
	</label>
	

	</div>
    <div class="form-group col-md-12">
        <label class="" for="">OBSERVACIONES PREVIAS AL SERVICIO SOLICITADO: </label>       
         <textarea id="txtObservacionesServicios" class="form-control col-md-12"  rows="2">       
         </textarea>
    </div>
    <div class="col-md-12"> <div class="alert alert-success alert-dismissable" id="Success" style="display:none;">
   		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
   		<h4>  <i class="icon fa fa-check"></i> Alert!</h4>
   		Solicitud Registrada Correctamente
   		</div>
   	</div>
	<div class="col-md-6">
		<button type="button" class="btn btn-primary col-md-12" id="btn_GuardarSolicitud">Guardar e Imprimir</button>
	</div>
	<div class="col-md-6">
		<button type="button" class="btn btn-danger col-md-12" id="btn_cancelar">Cancelar</button>
	</div>

	<div class="col-md-12" style="margin-top:1em;">
		<button type="button" class="btn btn-primary col-md-12" id="btn_aceptar_Solicitud" disabled>Enviar a Director tecnico</button>
	</div>
	

</div>


</div><!-- /.box-body -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/cotizacion.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/solicitud.js" type="text/javascript"></script>
<script>
	
	$("#btn_aceptar_Solicitud").click(function(event) {
		var NroSolicitud=$("#NroSolicitud").attr('NroSolicitud');
		 SolicitudCore.actualizarEstadoSolicitud(NroSolicitud,1);
	});
	$(document).ready(function() {
		ObtenerNroSolicitud();
		var NroCotizacion=$("#NroSolicitud").attr('nroCotizacion');
		if (NroCotizacion!='') {
			SolicitudCore.consultarCotizacion(NroCotizacion);
		};

				
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
var detalle = $('#DetalleCotizacion').tableToJSON();
SolicitudCore.registrarSolicitud(NroSolicitud,NroCotizacion,idCliente,idMuestra,Ensayos,Inspeccion,muestreo,otros,total,fecha_entrega,Acreditacion,Contramuestras,observacionesServ,detalle);
});

	
</script>

