<?php
//=================================================================================
// CONFIGURACIONES DEL MODULO
//=================================================================================
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Cotizacion';
// Titulo del modulo
$this->moduleTitle="Cotizacion";
// Subtitulo del modulo
$this->moduleSubTitle="Cotizacion";
// Breadcrumbs
$this->breadcrumbs=array(
  'Cotizacion',
);?>

<section class="content">
     
          <!--end contadores-->
  <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Cotización Nro:  <b id="NroCotizacion" data-nro="">     </b></h3>
                  <h3 class="box-title" style="float:right;"> 12-07-2015</h3>
                </div>
                <div class="box-body">
                  <!-- Date range -->
  <div class="form-group col-md-12">
      <label class="" for="">Nombre del Cliente: </label>
       <input type="text" class="form-control" id="txtNomCliente" >
    </div>
    <div class="form-group col-md-12">
      <label class="" for="">Direccion: </label>
       <input type="text" class="form-control" id="txtDireccion" >
    </div>
 <div class="form-group col-md-6">
      <label class="" for="">Telefono: </label>
      
       <input type="text" class="form-control col-md-12" id="txtTelefono" >
    
    </div>
    <div class="form-group col-md-6">
      <label class="" for="">E-mail: </label>
     
       <input type="text" class="form-control col-md-12" id="txtEmail" >
     
    </div>
    <div class="form-group col-md-12">
      <label class="" for="s_listarProd">Seleccion Producto: </label>
   
      <select id="s_listarProd" class="selectpicker form-control" data-live-search="true" title="Seleccione " style="display:none;">
        <option value="">Seleccione </option>
      </select>

    </div>
   
           <table id="ListarServicios" class="table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>                        
                        <th style="vertical-align: middle;" >id</th>                        
                        <th style="vertical-align: middle;" >Descripcion</th>
                        <!-- <th style="vertical-align: middle;" >Empleado</th> -->
                        <th style="vertical-align: middle;" >Metodologia</th>
                        <th style="vertical-align: middle;" >Tarifa</th>                        
                        <th style="vertical-align: middle;" ><input type="checkbox"  id="Todoscheckbox"> </th>
                      </tr>
                    </thead>                 
                  </table>
                 
                    
                    
  <div class="form-group col-md-4">
    <label class="sr-only" for="exampleInputAmount"></label>
    <div class="input-group">
      <div class="input-group-addon">Total S/.</div>
      <input type="text" class="form-control" id="txtCosto" placeholder="0.00" value="0.00" disabled>
    </div>
  </div>
  <button type="button" class="btn btn-primary" id="btn_GuardarCotizacion">Guardar Cotización</button>

                
                  

       </div><!-- /.box-body -->

<div class="alert alert-success alert-dismissable" id="Success" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Alert!</h4>
                    Cotización Guardada Correctamente
                  </div>                  
</div><!-- /.box -->
          <!--end contadores-->
       
         
</section><!-- /.content -->



<script>

 
 listarProductos();

function Servicios_x_Producto(idProducto){
        var table = $('#ListarServicios').DataTable();            
        table.destroy();
        var me = this;

        $.ajax({
             url: 'index.php?r=almacen/AjaxListarServicios',
            type: 'POST',       
            data: {          
                     idProducto:idProducto
                },
        })
        .done(function(response) {
            console.log(response);
           
             var table = $('#ListarServicios').DataTable( {
                "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "search":false,
        "data": response,
 columns:[
               
                {"mData": "idServicio", "sClass": "alignCenter"},                
                {"mData": "descServ", "sClass": "alignCenter"},
                //{"mData": "Empleado", "sClass": "alignCenter"},                
                {"mData": "metodo", "sClass": "alignCenter"},
              
                {"mData": "precio", "sClass": "alignCenter"},
                              
                {
                    "mData": null,
                    "bSortable": false,
                    "bFilterable": false,
                     "mRender": function (data, type, row) {
                  /*return row.nroSerie +', '+ row.nroFact;*/
                  return '<input type="checkbox"  class="check_Servicio" data-id="' + row.idServicio + '" value="' + row.precio + '"> ';
                
                }
                }
            ],
            fnDrawCallback: function() {

                $('.check_Servicio')
.change(function() {
    
    if ($(this).is(':checked')) {
       costo=$("#txtCosto").val();
        precio= $(this).val();
       
       suma=parseFloat(costo)+parseFloat(precio);
      $("#txtCosto").val(suma.toFixed(2));
      
    } else {
        costo=$("#txtCosto").val();
        precio= $(this).val();
       
       resta=parseFloat(costo)-parseFloat(precio);
      $("#txtCosto").val(resta.toFixed(2));
    }
}).change();
              $("#txtCosto").val('0.00')  
            }            
            } );
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
           
        });
        


    };

 function obtenerNroCotizacion(){
    
         $.ajax({
        url: 'index.php?r=almacen/AjaxObtenerNroCotizacion',
        type: 'POST'          
    })
    .done(function(response) {   
     data=response.output;     
        //console.log(data.nroComp);

        $("#NroCotizacion").text(data.nroCot);
        $("#NroCotizacion").attr('data-nro', data.nroCot);      
    })
    .fail(function() {
        //console.log("error");
    })
    .always(function() {
        //console.log("complete");
    });
 };

 $(document).ready(function($) {
$("#btn_GuardarCotizacion").click(function(e) {
  e.preventDefault();

 
var nombre=$("#txtNomCliente").val();
var direccion=$("#txtDireccion").val();
var telefono=$("#txtTelefono").val();
var email=$("#txtEmail").val();
var idCliente;
$.ajax({
  url: 'index.php?r=almacen/AjaxRegistrarCliente',
  type: 'POST',
  data: {
    nombre:nombre,
    direccion:direccion,
    telefono:telefono,
    email:email
  },
})
.done(function(response) {
  idCliente=response.idGenerado;
  console.log(idCliente);
})
.fail(function() {
  console.log("error");
})
.always(function() {
var idProducto=$("#s_listarProd").val();
var total=$("#txtCosto").val();
var idCotizacion=$("#NroCotizacion").attr('data-nro');


$.ajax({
  url: 'index.php?r=almacen/AjaxRegistrarCotizacion',
  type: 'POST',  
  data: {
    idCotizacion:idCotizacion,  
    idCliente:idCliente,
    idProducto:idProducto,  
    total:total
},
})
.done(function() {
  console.log("success");
})
.fail(function() {
  console.log("error");
})
.always(function() {
 var idProducto=$("#s_listarProd").val();
var idCotizacion=$("#NroCotizacion").attr('data-nro');
 var foo = [];
$(".check_Servicio").each(function () {
   if ($(this).is(':checked')) {
    //arregloID['idServicio'].push($(this).attr('data-id'));
     foo.push({"idServicio":$(this).attr('data-id')});
  };
           
});
console.log(foo);
$.ajax({
  url: 'index.php?r=Almacen/AjaxRegistrarDetalleCotizacion',
    type: 'Post',  
    data: {
      idCotizacion:idCotizacion,
      idProducto:idProducto,
      idServicio:JSON.stringify(foo),            
            
        },
})
.done(function() {
  console.log("success");
   $("#Success").show('medium');

   setTimeout(function() {

   location.reload();
  }, 2000);
 
   
})
.fail(function() {
  console.log("error");
})
.always(function() {
  console.log("complete");
});
});



});



 });
 


});


setTimeout(function(){
     obtenerNroCotizacion();
    },300);

               $('#Todoscheckbox')
.change(function() {
  var sumarPrecio=0;
      if ($("#Todoscheckbox").is(':checked')) {
          
            $(".check_Servicio").each(function () {
                $(this).prop("checked", true);
                sumarPrecio=parseFloat(sumarPrecio)+parseFloat($(this).val());
            });

        } else {
            $(".check_Servicio").each(function () {
                $(this).prop("checked", false);
            });
        }
         $("#txtCosto").val(sumarPrecio.toFixed(2));
}).change();



    $( "#s_listarProd" )
  .change(function () {
    var  idProducto=$("#s_listarProd").val();  
if(idProducto!=""){ 
  Servicios_x_Producto(idProducto);

}
   

  })
  .change();
  








</script>
 

