<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Productos';
// Titulo del modulo
$this->moduleTitle="Productos";
// Subtitulo del modulo
$this->moduleSubTitle="Productos";
// Breadcrumbs
$this->breadcrumbs=array(
	'Productos',
);?>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class='box-header with-border'>
                  <h3 class='box-title'><i class="fa fa-user"></i> Productos</h3>
                </div>
                <div class="box-body">
                  <table id="listarProductos" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!--th style="vertical-align: middle;">#</th-->
                        <th style="vertical-align: middle;" >ID</th>
                        <th style="vertical-align: middle;" >Producto</th>
                        <th style="vertical-align: middle;" >Estado</th>                                               
                        <th style="vertical-align: middle;" >&nbsp;</th>
                      </tr>
                    </thead>                 
                  </table>


                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<script>
    window.onload=function(){
        ProdCore.initListadoProductos();
    };
</script>