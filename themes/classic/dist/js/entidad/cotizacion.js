/*
    INICIO Fn Cotizacion
*/
var CotizacionCore = {
    CotizacionesxCliente: function(nroDoc){
       var me = this;
       var table = $('#CotizacionesCliente').DataTable();
        table.destroy();
        $.ajax({
            url: 'index.php?r=cotizacion/AjaxCotizacionesxCliente',
            type: 'POST',       
            data: {
               
                doc_ident:nroDoc
            },
        })
        .done(function(response) {
            console.log(response);
             var table = $('#CotizacionesCliente').DataTable( {
                "paging":   true,
                "ordering": false,
                "info":     false,
                "bFilter": false,
                "data": response,
                columns:[               
                    {"mData": "idCotizacion", "sClass": "alignCenter"},
                    {"mData": "muestra", "sClass": "alignCenter"},
                    {"mData": "fecha_registro", "sClass": "alignCenter"},
                    {"mData": "fecha_entrega", "sClass": "alignCenter"},
                    {"mData": "cant_Muestra_necesaria", "sClass": "alignCenter"},
                    {"mData": "total", "sClass": "alignCenter"}, 
                    {"mData": "estado", "sClass": "alignCenter"},                
                    {
                    "mData": 'idCotizacion',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "150px",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm consultarCotizacion"><i class="fa fa-pencil"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm eliminarCotizacion"><i class="fa fa-trash-o"></i></a>';
                    }
                }
                   
                ],
            fnDrawCallback: function() {
                $('.eliminarCotizacion').click(function() {
                    me.imprimirCotizacion($(this).attr('lang'));
                });
                $('.consultarCotizacion').click(function() {
                    me.consultarCotizacion($(this).attr('lang'));
                    

                });

            }              
            });
            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           
        });
        
    },
    registrarCotizacion: function(idCotizacion,idCliente,muestra,cond_tecnica,detalle_servicios,total,fecha_Entrega,cant_Muestra_necesaria,detalle){
        var me = this;
        $.ajax({
            url: 'index.php?r=cotizacion/AjaxRegistrarCotizacion',
            type: 'POST',
            data: {
                idCotizacion:idCotizacion,
                idCliente:idCliente,
                muestra,muestra,
                cond_tecnica:cond_tecnica,
                detalle_servicios:detalle_servicios,
                total:total,
                fecha_Entrega:fecha_Entrega,
                cant_Muestra_necesaria:cant_Muestra_necesaria,               
                },
        })
        .done(function(response) {
            console.log(response);
             me.registrarDetalleCotizacion(idCotizacion,muestra,detalle);

        })
           
    },
    actualizarCotizacion: function(idCotizacion,idCliente,muestra,cond_tecnica,detalle_servicios,total,fecha_Entrega,cant_Muestra_necesaria,detalle){
        var me = this;
        me.eliminarDetalleCotizacion(idCotizacion);
        $.ajax({
            url: 'index.php?r=cotizacion/AjaxActualizarCotizacion',
            type: 'POST',
            data: {
                idCotizacion:idCotizacion,
                idCliente:idCliente,
                muestra,muestra,
                cond_tecnica:cond_tecnica,
                detalle_servicios:detalle_servicios,
                total:total,
                fecha_Entrega:fecha_Entrega,
                cant_Muestra_necesaria:cant_Muestra_necesaria,               
                },
        })
        .done(function(response) {
            console.log(response);
             me.registrarDetalleCotizacion(idCotizacion,muestra,detalle);
        })

           
    },
    registrarDetalleCotizacion: function(idCotizacion,muestra,detalle){
        $.ajax({
            url: 'index.php?r=cotizacion/AjaxRegistrarDetalleCotizacion',
            type: 'POST',
            data: {
                idCotizacion:idCotizacion,
                muestra,muestra,               
                json:JSON.stringify(detalle),
                },
        })
        .done(function(response) {
            console.log(response);
        })
           
    },
    eliminarDetalleCotizacion: function(NroCotizacion){
        $.ajax({
            url: 'index.php?r=cotizacion/AjaxEliminarDetalleCotizacion',
            type: 'POST',
            data: {
                NroCotizacion:NroCotizacion,               
                },
        })
        .done(function(response) {
            console.log(response);
        })
           
    },
    consultarCotizacion:function(NroCotizacion){
        var me = this;
        $.ajax({
        url: 'index.php?r=cotizacion/AjaxeditarCotizacion',
        type: 'POST',       
        data: {NroCotizacion: NroCotizacion},       
        })
        .done(function(data) {
            console.log(data.Cotizacion);
            
           me.llenarDetalle(data.Detalle);

        })
        .fail(function() {
            console.log("error");
        })
        .always(function(data) {
            /*------*/
            $("#fecha_registro").text(data.Cotizacion[0].fecha_registro);
             $("#txtNomCliente").val(data.Cotizacion[0].nombres);
 $("#txtDocumento").val(data.Cotizacion[0].doc_ident); 
 $("#txtDocumento").attr('data-id',data.Cotizacion[0].idCliente);;
 $("#txtAtencion").val(data.Cotizacion[0].atencion_a);
 $("#txtDireccion").val(data.Cotizacion[0].direccion);
 $("#txtTelefono").val(data.Cotizacion[0].telefono);
 $("#txtEmail").val(data.Cotizacion[0].correo);
 $("#txtRefCliente").val(data.Cotizacion[0].referencia);
$("#txtCondTecnicas").val(data.Cotizacion[0].cond_tecnica);
$("#txtDetalles").val(data.Cotizacion[0].detalle_servicios);
$("#txtTotal").val(data.Cotizacion[0].total);
$("#txtTiempo").val(data.Cotizacion[0].fecha_entrega);
$("#txtCantidad").val(data.Cotizacion[0].cant_Muestra_necesaria);
$("#txtMuestra").val(data.Cotizacion[0].muestra);
$("#Edit_NroCotizacion").attr('data-nro',data.Cotizacion[0].idCotizacion);
$("#Edit_NroCotizacion").text(data.Cotizacion[0].idCotizacion);
$("#idCotSolicitud").val(data.Cotizacion[0].idCotizacion);


            /*-------*/
        });

        

    },
    llenarDetalle:function(detalle){
        var table = $('#DetalleCotizacion').DataTable();
        table.destroy();
        $('#DetalleCotizacion').dataTable({  
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
console.log(detalle);
    $.each(detalle,function(index, value){ 
        
          $('#DetalleCotizacion').DataTable().row.add([
            value.id, value.descripcion, value.metodo, value.tiempo_entrega, value.cantM_X_ensayo, value.precio, value.acreditado
            ]).draw();

        });
 /*---- Eliminar Fila---------*/
 $('#DetalleCotizacion tbody').on( 'click', 'button', function () {
        
        var table = $('#DetalleCotizacion').DataTable();
        
        table.row( $(this).parents('tr') ).remove().draw( false );         
          
        if(table.column(5).data().length==0){
            $("#txtTotal").val('0.00'); 
            
        }else{
          calcularTotal();
         
        }        


    } );

    },
    imprimirCotizacion:function(NroCotizacion){
        $.ajax({
        url: 'index.php?r=cotizacion/AjaxImprimirCotizacion',
        type: 'POST',       
        data: {NroCotizacion: NroCotizacion},
        })
        .done(function(data) {
            console.log(data.Cotizacion);
            console.log(data.Detalle);

        })
        .fail(function() {
            console.log("error");
        })
        .always(function(data) {
            /*------*/
            $.post('formato-cotizacion.php', { 
                        atencion_a:data.Cotizacion[0].atencion_a, 
                        cant_Muestra_necesaria:data.Cotizacion[0].cant_Muestra_necesaria, 
                        cond_tecnica:data.Cotizacion[0].cond_tecnica, 
                        correo:data.Cotizacion[0].correo, 
                        detalle_servicios:data.Cotizacion[0].detalle_servicios, 
                        direccion:data.Cotizacion[0].direccion, 
                        doc_ident:data.Cotizacion[0].doc_ident,
                        fecha_entrega:data.Cotizacion[0].fecha_entrega, 
                        fecha_registro:data.Cotizacion[0].fecha_registro, 
                        idCotizacion:data.Cotizacion[0].idCotizacion, 
                        muestra:data.Cotizacion[0].muestra, 
                        nombres:data.Cotizacion[0].nombres, 
                        referencia:data.Cotizacion[0].referencia, 
                        telefono:data.Cotizacion[0].telefono, 
                        total:data.Cotizacion[0].total,
                        detalle:JSON.stringify(data.Detalle),
            }, function (result) {
                    WinId = window.open('', '_blank');//resolucion de la ventana
                    WinId.document.open();
                    WinId.document.write(result);
                    //WinId.document.close();
            });      
            /*-------------*/

        });
    }
}



/*
    INICIO Fn Cliente
*/
var ClienteCore = {

 consultarCliente: function(nro_doc){
        $.ajax({
            url: 'index.php?r=cliente/AjaxConsultarClientexDoc',
            type: 'POST',            
            data: {doc_ident: nro_doc},
        })
        .done(function(response) {
            data=response;
            console.log(data);
            if (data==null) {
                $("#doc_Exist").show();
                $("#txtDocumento").attr('data-id','Nuevo');
            }else{
              $("#txtNomCliente").val(data.nombres);
$("#txtDocumento").val(data.doc_ident);
$("#txtDocumento").attr('data-id',data.idCliente);
$("#txtAtencion").val(data.atencion_a);
$("#txtDireccion").val(data.direccion);
$("#txtTelefono").val(data.telefono);
$("#txtEmail").val(data.correo);
$("#txtRefCliente").val(data.referencia);  
}

            
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
           
        });
        
    },
    registrarCliente: function(nombres,doc_ident,atencion_a,direccion,telefono,correo,referencia){
        var idCliente;
        $.ajax({
            url: 'index.php?r=cliente/AjaxRegistrarCliente',
            type: 'POST',
            async: false,
            data: {
                nombres:nombres,
                doc_ident:doc_ident,
                atencion_a:atencion_a,
                direccion:direccion,
                telefono:telefono,
                correo:correo,
                referencia:referencia
            },
        })
        .done(function(response) {
           idCliente=response.idGenerado;;
          
        })
        .always(function(response) {
          
        });
 return idCliente;
         
      
    },
    actualizarCliente: function(idCliente,nombres,doc_ident,atencion_a,direccion,telefono,correo,referencia,distrito,provincia){
      
        var idCliente;
        $.ajax({
            url: 'index.php?r=cliente/AjaxActualizarCliente',
            type: 'POST',            
            data: {
                idCliente:idCliente,
                nombres:nombres,
                doc_ident:doc_ident,
                atencion_a:atencion_a,
                direccion:direccion,
                telefono:telefono,
                correo:correo,
                referencia:referencia,
                distrito:distrito,
                provincia:provincia
            },
        })
        .done(function(response) {
          console(response);
          
        })
        .always(function(response) {
          
        });

         
      
    },
    registrarMuestra: function(idCliente,nombre,marca,identificacion,cant_muestra,presentacion,observaciones){
        var idMuestra;
        $.ajax({
            url: 'index.php?r=cliente/AjaxRegistrarMuestra',
            type: 'POST',
            async: false,
            data: {
                idCliente:idCliente,
                nombre:nombre,
                marca:marca,
                identificacion:identificacion,
                cant_muestra:cant_muestra,
                presentacion:presentacion,
                observaciones:observaciones
            },
        })
        .done(function(response) {
           idMuestra=response.idGenerado;;
          
        })
        .always(function(response) {
          
        });
 return idMuestra;
         
      
    },
    sumarCliente: function(num1,num2){
        var suma;
        suma=num1*num2;
        return suma;
    }

}



/*************************/
    



function calcularTotal(){
  var table=$('#DetalleCotizacion').DataTable(); 

  var total = table 
    .column(5)
    .data()
    .reduce( function (a, b) {
      //console.log(a+"->"+b );
        return parseFloat(a) + parseFloat(b);
    } );
   $("#txtTotal").val(parseFloat(total).toFixed(2)); 
}   

function calcularFechaEntrega(){

  var detalle = $('#DetalleCotizacion').tableToJSON();
        var mayor=0;
        $.each(detalle,function(index, value){  

            if(value.Tiempo>=mayor){
                
                 mayor=value.Tiempo;
                 console.log(value.Tiempo);
            }
        
    });
   $("#txtTiempo").val(mayor); 
}   


