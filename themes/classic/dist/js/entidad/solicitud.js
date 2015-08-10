/*
    INICIO Fn Cotizacion
*/
var SolicitudCore = {
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
    registrarSolicitud: function(nroSolicitud,nroCotizacion,idCliente,idMuestra,Ensayos,Inspeccion,muestreo,otros,total,fecha_entrega,Acreditacion,Contramuestras,observaciones){
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
             //me.registrarDetalleCotizacion(idCotizacion,muestra,detalle);

        })
           
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
