/*
    INICIO Fn Cotizacion
*/
var OrdenCore = {
    imprimirOrden:function(nroOrden){
        $.ajax({
        url: 'index.php?r=orden/AjaxImprimirOrden',
        type: 'POST',       
        data: {nroOrden: nroOrden},
        })
        .done(function(data) {
            console.log(data.Orden);
            console.log(data.Detalle);

        })
        .fail(function() {
            console.log("error");
        })
        .always(function(data) {
            /*------*/
            $.post('formato-orden_trabajo.php', {
                        laboratorio:data.Orden[0].laboratorio,
                        fecha_emision:data.Orden[0].fecha_emision, 
                        año:data.Orden[0].año,
                        cant_muestra:data.Orden[0].cant_muestra, 
                        codigo:data.Orden[0].codigo, 
                        dia:data.Orden[0].dia, 
                        mes:data.Orden[0].mes, 
                        metodocliente:data.Orden[0].metodocliente,
                        nombre:data.Orden[0].nombre, 
                        nroOrden:data.Orden[0].nroOrden,
                        observacion_m:data.Orden[0].observacion_m, 
                        observaciones_o:data.Orden[0].observaciones_o, 
                        peso_volumen:data.Orden[0].peso_volumen, 
                        presentacion:data.Orden[0].presentacion,
                                            
                        detalle:JSON.stringify(data.Detalle), 
            }, function (result) {
                    WinId = window.open('', '_blank');//resolucion de la ventana
                    WinId.document.open();
                    WinId.document.write(result);
                    //WinId.document.close();
            });      
            /*-------------*/

        });
    },
    ordenesDTecnico: function(){
        //alert("hola");
        var me = this;
        
        Util.createGrid('#OrdenesTecnico',{
            toolButons:'',
            url:'index.php?r=orden/AjaxListarOrdenesDTecnico',
            columns:[
                {"mData": "nroOrden", "sClass": "alignCenter"},
                {"mData": "Muestra", "sClass": "alignCenter"},                
                {"mData": "Codigo", "sClass": "alignCenter"},
                {"mData": "laboratorio", "sClass": "alignCenter"},
                {"mData": "fecha", "sClass": "alignCenter"},  
                {
                    "mData": 'nroOrden',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "150px",
                    /*"mRender": function(o) {
                        return '<form action="index.php?r=orden/editar" method="POST"><input type="hidden" name="nroOrden" value="' + o + '"><input  class="btn btn-default btn-sm" value="Editar Reporte" type="submit"></form>';
                    }*/
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-default btn-sm imprimirOrden"><i class="fa fa-print"></i></a><span style="color:transparent;">__</span><a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-success btn-sm enviarOrdenAnalista"><i class="fa fa-envelope"></i></a><span style="color:transparent;">__</span><a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm eliminarOrden">Eliminar</a>';
                    }
                }
            ],
            fnDrawCallback: function() {
                $('.imprimirOrden').click(function() {
                    me.imprimirOrden($(this).attr('lang'));
                });
                $('.enviarOrdenAnalista').click(function() {
                     me.actualizarEstadoOrden($(this).attr('lang'),1);
                });
                $('.eliminarOrden').click(function() {
                    me.eliminarOrden($(this).attr('lang'));
                  

                });


            }
        });
    },
    actualizarEstadoOrden: function(nroOrden,estado){
        $.ajax({
            url: 'index.php?r=orden/AjaxActualizarEstadoOrden',
            type: 'POST',
            data: {
                nroOrden: nroOrden,
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
    eliminarOrden: function(nroOrden){
        $.ajax({
            url: 'index.php?r=orden/AjaxEliminarOrden',
            type: 'POST',
            data: {
                nroOrden: nroOrden            
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
            setTimeout(function() {
                                location.reload();
                            }, 1000);   
        });
        
    },
    ordenesAnalista: function(){
        //alert("hola");
        var me = this;
        
        Util.createGrid('#OrdenesAnalista',{
            toolButons:'',
            url:'index.php?r=orden/AjaxListarOrdenesAnalista',
            columns:[
                {"mData": "nroOrden", "sClass": "alignCenter"},
                {"mData": "Muestra", "sClass": "alignCenter"},                
                {"mData": "Codigo", "sClass": "alignCenter"},
                {"mData": "laboratorio", "sClass": "alignCenter"},
                {"mData": "fecha", "sClass": "alignCenter"},  
                {
                    "mData": 'nroOrden',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "600px",
                    "mRender": function(o) {
                        return '  <form action="index.php?r=ensayos/generar_reporte" method="POST"><a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-default btn-sm imprimirOrden"><i class="fa fa-print"></i></a><span style="color:transparent;">__</span><input type="hidden" name="nroOrden" value="' + o + '"><input  class="btn btn-warning btn-sm" value="Generar Reporte" type="submit"></form>';
                    }
                }
            ],
            fnDrawCallback: function() {
                 $('.imprimirOrden').click(function() {
                    me.imprimirOrden($(this).attr('lang'));
                });

            }
        });
    },
    consultarOrdenT:function(NroOrdenTrabajo){
        var me = this;
        $.ajax({
        url: 'index.php?r=orden/AjaxconsultarOrdenAnalista',
        type: 'POST',       
        data: {NroOrdenTrabajo: NroOrdenTrabajo},       
        })
        .done(function(data) {
            console.log(data.Orden);
            
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
$("#btn_Generar_Solicitud").removeAttr('disabled');
$("#btn_GuardarCotizacion").removeAttr('disabled');
$("#btn_imprimirCotizacion").removeAttr('disabled');



            /*-------*/
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
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm consultarCotizacion"><i class="fa fa-eye"></i> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-default btn-sm eliminarCotizacion"><i class="fa fa-print"></i></a>';
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
    registrarOrdenTrabajo: function(nroOrden,nroSolicitud,fecha_emision,laboratorio,idMuestra,codMuestra,observaciones,fecha_entrega,codPersonal,detalle){
        

        var me = this;
        $.ajax({
            url: 'index.php?r=orden/AjaxRegistrarOrdenTrabajo',
            type: 'POST',
            data: {
                nroOrden:nroOrden,
                nroSolicitud:nroSolicitud,
                fecha_emision:fecha_emision,
                laboratorio:laboratorio,
                idMuestra:idMuestra,
                codMuestra:codMuestra,
                observaciones:observaciones,
                fecha_entrega:fecha_entrega,
                codPersonal:codPersonal             
                },
        })
        .done(function(response) {
            console.log(response);
             me.registrarDetalleOrdenTrab(nroOrden,detalle);
             $('#Success').show();
             //boton generar solicitud
             //$("#idCotSolicitud").val(idCotizacion);
            //$("#btn_Generar_Solicitud").removeAttr('disabled');

            
                setTimeout(function(){
                      window.location.href = "index.php?r=solicitud/solicitudes";
                }, 1000);

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
    registrarDetalleOrdenTrab: function(nroOrden,detalle){
        $.ajax({
            url: 'index.php?r=orden/AjaxRegistrarDetalleOrdenTrab',
            type: 'POST',
            data: {
                nroOrden:nroOrden,                           
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
$("#btn_Generar_Solicitud").removeAttr('disabled');
$("#btn_GuardarCotizacion").removeAttr('disabled');
$("#btn_imprimirCotizacion").removeAttr('disabled');



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
        "bFilter": false,
        fnDrawCallback: function() {

                $('.checkACred')
.change(function() {
     console.log($(this).val());
    if ($(this).is(':checked')) {
       costo=$("#txtCosto").val();
       $("#"+$(this).val()+"").text('SI');
      //$("#"+$(this).val()+"").show();
      
    } else {
      // $("#"+$(this).val()+"").show();
       $("#"+$(this).val()+"").text('NO');
    }
}).change();
              
            } 
    } );
console.log(detalle);
    $.each(detalle,function(index, value){ 
        if (value.acreditado=='SI') {
            $('#DetalleCotizacion').DataTable().row.add([
            value.id, value.descripcion, value.metodo, value.tiempo_entrega, value.cantM_X_ensayo, value.precio, '<span id="check'+value.id+'" style="display:none;">SI</span><input type="checkbox" value="check'+value.id+'" class="checkACred" checked>'
            ]).draw();
        }else{
            $('#DetalleCotizacion').DataTable().row.add([
            value.id, value.descripcion, value.metodo, value.tiempo_entrega, value.cantM_X_ensayo, value.precio, '<span id="check'+value.id+'" style="display:none;">NO</span><input type="checkbox" value="check'+value.id+'" class="checkACred" >'
            ]).draw();
        }
          

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
