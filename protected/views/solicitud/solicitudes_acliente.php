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
	<h3 class="box-title">Solicitudes</h3>
	
</div>
<div class="box-body">

	<!-- Cotizaciones por Cliente -->
	<table id="SolicitudesA_Cliente" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>                        
                        <th style="vertical-align: middle;" >Codigo</th>
                        <th style="vertical-align: middle;" >Cliente</th>
                        <th style="vertical-align: middle;" >Muestra</th>
                        <th style="vertical-align: middle;" >Fecha Registro</th>   	                    
                        <th style="vertical-align: middle;" >Fecha Entrega</th>                        
                        <th style="vertical-align: middle;" >Total</th>
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

<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/cotizacion.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/solicitud.js" type="text/javascript"></script>
<script>
    window.onload=function(){
        SolicitudCore.listar_SolicitudesAtencionCliente();
    };
  

  
</script>


