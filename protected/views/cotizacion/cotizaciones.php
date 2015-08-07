<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Cotización';
// Titulo del modulo
$this->moduleTitle="Cotización";
// Subtitulo del modulo
$this->moduleSubTitle="Cotización de Servicios para Ensayos";
// Breadcrumbs
$this->breadcrumbs=array(
	'Cotización de Servicios para Ensayos',
);?>
<style>
	tbody {
    text-align:center;
}

</style>
<!-- Main content -->
<section class="content">

<!--end contadores-->
<div class="box box-primary">
<div class="box-header">
	<h3 class="box-title">Cotizaciones por Cliente</h3>
	
</div>
<div class="box-body">

	<!-- Date range -->
	<div class="form-group col-md-3">	
		<label class="" for="">DNI o RUC: <span class="text-danger " id="doc_Exist" style="display:none;">El cliente no Existe</span></label>
		<div class="input-group">
			<input type="text" class="form-control" id="txtDocumento_b" data-id="" autofocus>
			<span class="input-group-btn">
			    <button class="btn btn-default " type="button" id="BuscarCliente"><i class="fa fa-search"></i></button>
			</span>
		</div>	
	</div>	
	<div class="form-group col-md-9">
	<label class="" for="">Cliente / Solicitante : </label>
	<input type="text" class="form-control cli_block" id="txtNomCliente_b" >
	</div>
	<!-- Cotizaciones por Cliente -->
	<table id="CotizacionesCliente" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>                        
                        <th style="vertical-align: middle;" >ID</th>
                        <th style="vertical-align: middle;" >Muestra</th>
                        <th style="vertical-align: middle;" >Fecha</th>                        
                        <th style="vertical-align: middle;" >Fecha Entrega</th>
                        <th style="vertical-align: middle;" >Cantidad</th>
                        <th style="vertical-align: middle;" >Total</th>                       
                        <th style="vertical-align: middle;" >Estado</th>
                        <th style="vertical-align: middle;" ></th>
                      </tr>
                    </thead>                 
                  </table>


	



</div><!-- /.box-body -->

<div class="alert alert-success alert-dismissable" id="Success" style="display:none;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>  <i class="icon fa fa-check"></i> Alert!</h4>
Cotización Guardada Correctamente
</div>                  
</div><!-- /.box -->
<!--end contadores-->


</section><!-- /.content -->
<!-- Main content -->
<section class="content">

<!--end contadores-->
<div class="box box-primary">
<div class="box-header">
	<h3 class="box-title">Cotizacion de Servicios para Ensayos Nro: <b id="Edit_NroCotizacion" data-nro="">     </b></h3>
	<h3 class="box-title" style="float:right;" id="fecha_registro">2015-07-16 </h3>
</div>
<div class="box-body">

	<!-- Date range -->
	<div class="form-group col-md-3">	
		<label class="" for="">DNI o RUC: <span class="text-danger " id="doc_Exist" style="display:none;">El cliente no Existe</span></label>
		<div class="input-group">
			<input type="text" class="form-control" id="txtDocumento" data-id="">
			<span class="input-group-btn">
			    <button class="btn btn-default " type="button" id="BuscarCliente"><i class="fa fa-search"></i></button>
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
	<div class="form-group col-md-12">
	<label class="" for="">Direccion : </label>
	<input type="text" class="form-control cli_block" id="txtDireccion" >
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
	<label class="" for="s_listarProd">Seleccione Muestra : </label>

	<select id="s_listarProducto" class="selectpicker form-control" data-live-search="true" title="Muestras " style="display:none;">
	<option value="">Seleccione </option>
	</select>
	</div>
	<div class="form-group col-md-12">
	<label class="" for="">Muestra : </label>
	<input type="text" class="form-control" id="txtMuestra" >
	</div>


	<div class="form-group col-md-8">
	<label class="" for="s_listarServicio">Servicio : <span id="repeatServicio" class="text-danger"></span></label>
	<select id="listarServicio" class="selectpicker form-control" data-live-search="true" title="Seleccione Servicio" style="display:none;">
	<option value="">Seleccione Servicio</option>
	</select>

	</div>

    <div class="form-group">
            <label for="" style="color:transparent;">Agregar</label><br>
            <button id="agregarServicio2" type="button" class="btn btn-default"><i class="fa fa-cart-plus" ></i> Agregar</button>         
    </div>

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
	<th style="vertical-align: middle;" >Eliminar</th>
	</tr>
	</thead>                 
	</table>


	
<div class="row" >
	
	<div class="form-group col-md-4">	
		<label class="" for="">Fecha de Entrega de los Resultados : </label>
		<div class="input-group">
			<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			<input type="date" class="form-control" id="txtTiempo" >			
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
        <label class="" for="">Condiciones Técnicas Especiales Aplicables a los servicios: </label>       
         <textarea id="txtCondTecnicas" class="form-control col-md-12"  rows="2">       
         </textarea>
      </div>
    <div class="form-group col-md-12">
        <label class="" for="">Detalle sobre los Servicios Ofrecido: </label>       
         <textarea id="txtDetalles" class="form-control col-md-12"  rows="2">       
         </textarea>
    </div>
	<div class="col-md-4">
		<button type="button" class="btn btn-primary col-md-12" id="btn_GuardarCotizacion" disabled>Guardar <i class="fa fa-floppy-o"></i></button>
	</div>
	<div class="col-md-4">
		<button type="button" class="btn btn-primary col-md-12" id="btn_imprimirCotizacion" disabled>Imprimir</button>
	</div>
	<div class="col-md-4">
		<button type="button" class="btn btn-danger col-md-12" id="btn_cancelar" >Cancelar</button>
	</div>

	<div class="col-md-12" style="margin-top:1em;">
		<form action="index.php?r=solicitud/registrar" method="POST">
			<input type="hidden" value="" name="NroCotizacion" id="idCotSolicitud">
		<button type="submit" class="btn btn-primary col-md-12" id="btn_Generar_Solicitud" disabled>Generar Solicitud </button>			
		</form>
	</div>
	

</div>


</div><!-- /.box-body -->

<div class="alert alert-success alert-dismissable" id="Success" style="display:none;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>  <i class="icon fa fa-check"></i> Alert!</h4>
Cotización Guardada Correctamente
</div>                  
</div><!-- /.box -->
<!--end contadores-->


</section><!-- /.content -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/cotizacion.js" type="text/javascript"></script>

<script>
/*	$("#btn_Generar_Solicitud").click(function(event) {
	console.log('message');
var NroCotizacion=$("#Edit_NroCotizacion").attr('data-nro');
$.post('index.php?r=cotizacion/AjaxgenerarSolicitud',{NroCotizacion:NroCotizacion});
});*/

$("#btn_cancelar").click(function(event) {
	location.reload();

});
$("#btn_GuardarCotizacion").click(function(event) {
/*cliente */
/*
var nombres= $("#txtNomCliente").val();
var doc_ident= $("#txtDocumento").val();
var atencion_a= $("#txtAtencion").val();
var direccion= $("#txtDireccion").val();
var telefono= $("#txtTelefono").val();
var referencia= $("#txtRefCliente").val();
var correo= $("#txtEmail").val();
*/
var NroCotizacion=$("#Edit_NroCotizacion").attr('data-nro');
var idCliente= $("#txtDocumento").attr('data-id');

var cond_tecnica=$("#txtCondTecnicas").val();
var detalle_servicios=$("#txtDetalles").val();
var total=$("#txtTotal").val();
var fecha_Entrega=$("#txtTiempo").val();
var cant_Muestra_necesaria=$("#txtCantidad").val();
var muestra=$("#txtMuestra").val();
var idCotizacion=$("#NroCotizacion").attr('data-nro');
var detalle = $('#DetalleCotizacion').tableToJSON();

CotizacionCore.actualizarCotizacion(NroCotizacion,idCliente,muestra,cond_tecnica,detalle_servicios,total,fecha_Entrega,cant_Muestra_necesaria,detalle);


setTimeout(function() {	
	CotizacionCore.imprimirCotizacion(NroCotizacion);
}, 1000);

});


$("#btn_imprimirCotizacion").click(function(event) {
	var NroCotizacion=$("#Edit_NroCotizacion").attr('data-nro');
	CotizacionCore.imprimirCotizacion(NroCotizacion);
});

            /*------------*/
$('#agregarServicio2').on( 'click', function () {

    var idServicio=$("#listarServicio").val();

    $.ajax({
        url: 'index.php?r=servicio/AjaxObtenerServicio',
        type: 'POST',        
        data: {idServicio:parseInt(idServicio)},
    })
    .done(function(response) {
        //console.log(response);
        var detalle = $('#DetalleCotizacion').tableToJSON();
        var repeat=false;
        $.each(detalle,function(index, value){  

            if(value.id===response[0].idServicio){
                //console.log('repetido');    
                repeat=true;       
                //console.log(detalle);
                return false;  
            }
        
        });

        if(repeat===false){
            $('#DetalleCotizacion').DataTable().row.add([
                   response[0].idServicio,
                   response[0].descripcion,
                   response[0].metodo,
                   response[0].tiempo_entrega,
                   response[0].cantM_x_ensayo+' ml',
                   response[0].tarifa,
                   'SI'
            ]).draw();
         }else if(repeat===true){
            //alert("el servicio ya esta agregado al detalle");
            $("#repeatServicio").text('El servicio ya esta agregado en el detalle');
         }   
         
    })
        .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
        calcularTotal();
        setTimeout(function(){
            $("#repeatServicio").text('');
        },5000);
        
    });
        


       
    } );
	
</script>	
<script>
listarServicios();
	$(document).ready(function() {
		$("#BuscarCliente").click(function(event) {
			var nro_doc= $("#txtDocumento_b").val();
			CotizacionCore.CotizacionesxCliente(nro_doc);
		});

	

	});


$(document).ready(function() {
    
    /* $('#DetalleCotizacion').dataTable({  
      "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": " ",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        },   
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button class='btn btn-danger'><i class='fa fa-trash-o '></i></button>"
        } ],
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false
    } );
/************************/
$('#DetalleCotizacion tbody ').on( 'click', 'button', function () {
        
        var table = $('#DetalleCotizacion').DataTable();
        
        table.row( $(this).parents('tr') ).remove().draw( false );         
          
        if(table.column(5).data().length==0){
            $("#txtTotal").val('0.00'); 
            $("#txtTiempo").val(0); 
        }else{
          calcularTotal();
         
        }        


    } );
/*************************/
} );

</script>