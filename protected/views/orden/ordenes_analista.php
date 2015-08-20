<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Ordenes de Trabajo';
// Titulo del modulo
$this->moduleTitle="Ordenes de Trabajo";
// Subtitulo del modulo
$this->moduleSubTitle="Ordenes de Trabajo";
// Breadcrumbs
$this->breadcrumbs=array(
	'Ordenes de Trabajo',
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
	<h3 class="box-title">Ordenes</h3>
	
</div>
<div class="box-body">

	<!-- Cotizaciones por Cliente -->
	<table id="OrdenesAnalista" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th style="vertical-align: middle;" >nroOrden</th>
                        <th style="vertical-align: middle;" >Muestra</th>   	                    
                        <th style="vertical-align: middle;" >Codigo</th>
                        <th style="vertical-align: middle;" >Laboratorio</th>
                        <th style="vertical-align: middle;" >Fecha</th>
                        <th style="vertical-align: middle;" ></th>
                        
                      </tr>
                    </thead>                 
                  </table>


	



</div><!-- /.box-body -->

                 
</div><!-- /.box -->
<!--end contadores-->


</section><!-- /.content -->

<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/cotizacion.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/solicitud.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/ordentrab.js" type="text/javascript"></script>
<script>
    window.onload=function(){
        OrdenCore.ordenesAnalista();
    };
  

  
</script>


