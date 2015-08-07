<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Servicios';
// Titulo del modulo
$this->moduleTitle="Servicios";
// Subtitulo del modulo
$this->moduleSubTitle="Servicios";
// Breadcrumbs
$this->breadcrumbs=array(
	'Servicios',
);?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class='box-header with-border'>
          <h3 class='box-title'><i class="fa fa-user"></i> <b id="text-Accion">Registrar</b> Servicio <?php echo $data; ?></h3>
        </div>
        <div class="box-body">
          <div class="row">

    <form action="" method="post" name="ServicioForm" id="ServicioForm"  onclick="" >
          

      <div class="form-group col-md-6">
        <label class="" for="txtServicio">Servicio: </label>
         <input type="text" class="form-control" id="txtServicio" data-id="">
      </div>
      <div class="form-group col-md-6">
        <label class="" for="txtMetodo">Metodo: </label>
         <input type="text" class="form-control" id="txtMetodo" >
      </div>
      <div class="form-group col-md-3">
        <label class="" for="txtTiempoEntrega">Tiempo de Entrega: </label>
         <input type="number" class="form-control" id="txtTiempoEntrega" >
      </div>
      <div class="form-group col-md-3">
        <label class="" for="txtCantMuestra">Cantidad de Muestras: </label>
         <input type="number" class="form-control" id="txtCantMuestra" >
      </div>
      <div class="form-group col-md-3">
        <label class="" for="txtTarifa">Tarifa Normal: </label>
         <input type="text" class="form-control" id="txtTarifa" >
      </div>
      <div class="form-group col-md-3">
        <label class="" for="txtTarifaAcred">Tarifa Acreditado: </label>
         <input type="text" class="form-control" id="txtTarifaAcred" >
      </div>
      <div class="form-group col-md-12">
        <label class="" for="">Detalle: </label>       
         <textarea id="txtDetalle" class="form-control col-md-12"  rows="2">       
         </textarea>
      </div>
      <div class="form-group col-md-6 ">
        <input class="btn btn-primary col-md-12" type="button" id="btn-Accion-M" value="Registrar" >
      </div>
      <div class="form-group col-md-6">
        <input class="btn btn-danger col-md-12" type="reset" id="btn-Cancelar-M" value="Cancelar">
      </div>
    </form>

    </div><!--end row  -->
    
<div class="row">
  <div class="alert alert-success alert-dismissable" id="alert-message" style="display:none;">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>  <i class="icon fa fa-check"></i> Alert!</h4>
<span id="text-message"></span>
</div> 
</div>
    



        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class='box-header with-border'>
          <h3 class='box-title'><i class="fa fa-user"></i> Servicios</h3>
        </div>
        <div class="box-body">
          <table id="listarServicios" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
            <thead>
              <tr>
                <!--th style="vertical-align: middle;">#</th-->
                <th style="vertical-align: middle;" >ID</th>                
                <th style="vertical-align: middle;" >Servicio</th>
                <th style="vertical-align: middle;" >Metodo</th>
                <th style="vertical-align: middle;" >Tiempo</th>
                <th style="vertical-align: middle;" >Cant</th>
                <th style="vertical-align: middle;" >Precio</th>
                <th style="vertical-align: middle;" >&nbsp;</th>
              </tr>
            </thead>                 
          </table>


        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
<script src="<?php echo Yii::app()->theme->baseUrl;?>/dist/js/entidad/servicio.js" type="text/javascript"></script>
<script>
    window.onload=function(){
        ServicioCore.initListadoServicios();
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
