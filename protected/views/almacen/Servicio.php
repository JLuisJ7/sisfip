<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Modulo de Almacen';
// Titulo del modulo
$this->moduleTitle="Modulo de Almacen";
// Subtitulo del modulo
$this->moduleSubTitle="Inventario";
// Breadcrumbs
$this->breadcrumbs=array(
	'Inventario',
);?>
<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-list-alt"></i> Servicios</h3>
                </div>
                <div class="box-body">
                  <div id="content_nuevo_Servicio" style=""> 
      <div class="form-group col-md-12">
      <label class="" for="s_listarProd">Seleccion Producto: </label>
   
      <select id="s_listarProd" class="selectpicker form-control" data-live-search="true" title="Seleccione " style="display:none;">
        <option value="">Seleccione </option>
      </select>

    </div>
                <div class="form-group col-md-12">

      <label class="" for="">Servicio: </label>
       <input type="text" class="form-control" id="txtServicio" >
    </div>
    <div class="form-group col-md-12">
      <label class="" for="">Metodo: </label>
       <input type="text" class="form-control" id="txtMetodo" >
    </div>
 <div class="form-group col-md-6">
      <label class="" for="">Stock: </label>
      
       <input type="text" class="form-control col-md-12" id="txtStock" >
    
    </div>
    <div class="form-group col-md-6">
      <label class="" for="">Precio: </label>
     
       <input type="text" class="form-control col-md-12" id="txtPrecio" >
     
    </div>
 <div class="form-group col-md-6">
      <button type="button" class="btn btn-primary col-md-12" id="btn_RegistrarServicio">Registrar Servicio</button>
  </div>
  <div class="form-group col-md-6">
      <button type="button" class="btn btn-primary col-md-12" id="btn_ActualizarServicio">Actualizar Servicio</button>
  </div>

  </div>
  <!-- END NUEVO SERVICIO -->

    

                  <table id="listaServicio" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!--th style="vertical-align: middle;">#</th-->
                        <th style="vertical-align: middle;" >Id</th>
                        <th style="vertical-align: middle;" >Producto</th>
                        <th style="vertical-align: middle;" >Descripcion</th>
                        <th style="vertical-align: middle;" >Metodo</th>
                        <th style="vertical-align: middle;" >Stock</th>
                        <th style="vertical-align: middle;" >Precio</th>
                                           
                        
                      </tr>
                    </thead>                 
                  </table>


                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
   <!-- Modal -->
       <script>
        listarProductos();
    window.onload=function(){
        InventCore.initServicio();
    };

$(document).ready(function() {
  $("#btn_RegistrarServicio").click(function(event) {
var idProducto=$('#s_listarProd').val();
var descServ=$('#txtServicio').val();
var metodo=$('#txtMetodo').val();
var stock=$('#txtStock').val();
var precio=$('#txtPrecio').val();
$.ajax({
  url: 'index.php?r=Almacen/AjaxRegistrarServicio',
  type: 'POST',
  data: {
      idProducto:idProducto,
      descServ:descServ,
      metodo:metodo,
      stock:stock,
      precio:precio
  },
})
.done(function() {
  console.log("success");
})
.fail(function() {
  console.log("error");
})
.always(function() {
  console.log("complete");
});

  });
});

</script>

