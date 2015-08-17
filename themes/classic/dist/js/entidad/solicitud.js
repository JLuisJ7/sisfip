/*
    INICIO Fn Cotizacion
*/
var SolicitudCore = {
    
    listar_SolicitudesAprobadas: function(){
        //alert("hola");
        var me = this;
        
        Util.createGrid('#SolicitudesAprobadas',{
            toolButons:'',
            url:'index.php?r=solicitud/AjaxListarSolicitudesAprobadas',
            columns:[
                {"mData": "nroSolicitud", "sClass": "alignCenter"},
                {"mData": "cliente", "sClass": "alignCenter"},                
                {"mData": "muestra", "sClass": "alignCenter"},
                {"mData": "fecha_registro", "sClass": "alignCenter"},
                {"mData": "fecha_entrega", "sClass": "alignCenter"},
                 {"mData": "total", "sClass": "alignCenter"},            
                {
                    "mData": 'nroSolicitud',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "150px",
                    "mRender": function(o) {
                        return '<form action="index.php?r=orden/registrar" method="POST"><input type="hidden" name="NroSolicitud" value="' + o + '"><input  class="btn btn-warning btn-sm" value="enviar" type="submit"></form><a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm eliminarServicio"><i class="fa fa-trash-o"></i></a>';
                    }
                }
            ],
            fnDrawCallback: function() {
                $('.eliminarServicio').click(function() {
                    me.alertEliminarServicio($(this).attr('lang'));
                });
                $('.editarServicio').click(function() {
                    me.obtenerServicio($(this).attr('lang'));
                    $("#btn-Accion-M").attr('value', 'Actualizar');
                    $("#text-Accion").text('Actualizar');

                });

            }
        });
    },
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
    registrarSolicitud: function(nroSolicitud,nroCotizacion,idCliente,idMuestra,Ensayos,Inspeccion,muestreo,otros,total,fecha_entrega,Acreditacion,Contramuestras,observaciones,detalle){
        var me = this;
        $.ajax({
            url: 'index.php?r=solicitud/AjaxRegistrarSolicitud',
            type: 'POST',
            data: {
               nroSolicitud:nroSolicitud,
               nroCotizacion:nroCotizacion,
               idCliente:idCliente,
               idMuestra:idMuestra,
               Ensayos:Ensayos,
               Inspeccion:Inspeccion,
               muestreo:muestreo,
               otros:otros,
               total:total,
               fecha_entrega:fecha_entrega,
               Acreditacion:Acreditacion,
               Contramuestras:Contramuestras,
               observaciones:observaciones               
                },
        })
        .done(function(response) {
            console.log(response);
             me.registrarDetalleSolicitud(nroSolicitud,detalle);
              $('#Success').show();

        })
           
    },
    registrarDetalleSolicitud: function(nroSolicitud,detalle){
        $.ajax({
            url: 'index.php?r=solicitud/AjaxRegistrarDetalleSolicitud',
            type: 'POST',
            data: {
                nroSolicitud:nroSolicitud,                            
                json:JSON.stringify(detalle),
                },
        })
        .done(function(response) {
            console.log(response);
        })
           
    },
    consultarSolicitudOT:function(nroSolicitud){
        var me = this;
        $.ajax({
        url: 'index.php?r=solicitud/AjaxConsultarSolicitudOT',
        type: 'POST',       
        data: {nroSolicitud: nroSolicitud},       
        })
        .done(function(data) {
            //console.log(data.Cotizacion);
            
           me.llenarDetalleOT(data.Detalle);

        })
        .fail(function() {
            console.log("error");
        })
        .always(function(data) {
            /*------*/
$("#txtNomMuestra").val(data.Solicitud[0].nombre);
$("#txtNomMuestra").attr('data-id',data.Solicitud[0].idMuestra);
$("#txtNumUnidad").val(data.Solicitud[0].cant_muestra);

$("#txtPresentacion").val(data.Solicitud[0].presentacion);

        


            /*-------*/
        });

        

    },
    actualizarEstadoSolicitud: function(idSolicitud,estado){
        $.ajax({
            url: 'index.php?r=solicitud/AjaxActualizarEstadoSolicitud',
            type: 'POST',
            data: {
                idSolicitud: idSolicitud,
                estado:estado
            },
        })
        .done(function(response) {
            console.log(response);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
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
    llenarDetalleOT:function(detalle){
        var table = $('#DetalleOrden').DataTable();
        table.destroy();
        $('#DetalleOrden').dataTable({  
      "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": " ",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        },
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false
    } );
console.log(detalle);
    $.each(detalle,function(index, value){ 
        
          $('#DetalleOrden').DataTable().row.add([
            value.idServicio, value.descripcion, value.metodo
            ]).draw();

        });
 /*---- Eliminar Fila---------*/
 $('#DetalleOrden tbody').on( 'click', 'button', function () {
        
        var table = $('#DetalleOrden').DataTable();
        
        table.row( $(this).parents('tr') ).remove().draw( false );         
          
        if(table.column(5).data().length==0){
            $("#txtTotal").val('0.00'); 
            
        }else{
          calcularTotal();
         
        }        


    } );

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
