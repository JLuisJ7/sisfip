<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Reportes';
// Titulo del modulo
$this->moduleTitle="Reportes";
// Subtitulo del modulo
$this->moduleSubTitle="Reportes";
// Breadcrumbs
$this->breadcrumbs=array(
	'Reportes',
);?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class='box-header with-border'>
          <h3 class='box-title'><i class="fa fa-user"></i> Reportes de Ensayos</h3>
        </div>
        <div class="box-body">
          <table id="listarReportes" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
            <thead>
              <tr>
                <!--th style="vertical-align: middle;">#</th-->
                <th style="vertical-align: middle;" >Nro</th>                
                <th style="vertical-align: middle;" >Laboratorio</th>
                <th style="vertical-align: middle;" >Producto</th>
                <th style="vertical-align: middle;" >Codigo</th>
                <th style="vertical-align: middle;" >Fecha</th>
                <th style="vertical-align: middle;" >nroOrden</th>
                <th style="vertical-align: middle;" >&nbsp;</th>
              </tr>
            </thead>                 
          </table>


        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/reporte.js" type="text/javascript"></script>
<script>
    window.onload=function(){
        ReporteCore.loadListadoReportes();
    };
    jQuery(document).ready(function($) {
      $("#btn-Cancelar-M").click(function(event) {        
        $("#txtServicio").attr('data-id', '');
        $("#text-Accion").text('Registrar');
        $("#btn-Accion-M").val('Registrar');
        //event.preventDefault(); 

      });


      $("#btn-Accion-M").click(function(event) {

        var Accion=$(this).val();                        
        var descripcion =$("#txtServicio").val();
        var metodo =$("#txtMetodo").val();
        var tiempo_entrega =$("#txtTiempoEntrega").val();
        var cantM_x_ensayo =$("#txtCantMuestra").val();
        var tarifa =$("#txtTarifa").val();
        var tarifa_Acred =$("#txtTarifaAcred").val();
        var detalle =$("#txtDetalle").val();
        ServicioCore.realizarTransaccion(Accion,descripcion,metodo,tiempo_entrega,cantM_x_ensayo,tarifa,tarifa_Acred,detalle);
      });

    });
</script>
