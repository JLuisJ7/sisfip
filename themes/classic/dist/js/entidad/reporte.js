/*
    INICIO Fn Cotizacion
*/
var ReporteCore = {
loadListadoReportes: function(){
        //alert("hola");
        var me = this;
        
        Util.createGrid('#listarReportes',{
            toolButons:'',
            url:'index.php?r=ensayos/AjaxListarReportesAnalista',
            columns:[
                {"mData": "idServicio", "sClass": "alignCenter"},
                {"mData": "descripcion", "sClass": "alignCenter"},                
                {"mData": "metodo", "sClass": "alignCenter"},
                {"mData": "tiempo_entrega", "sClass": "alignCenter"},
                {"mData": "cantM_x_ensayo", "sClass": "alignCenter"},
                 {"mData": "tarifa", "sClass": "alignCenter"},            
                {
                    "mData": 'idServicio',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "150px",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm editarServicio"><i class="fa fa-pencil"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm eliminarServicio"><i class="fa fa-trash-o"></i></a>';
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
 imprimirReporte:function(nroOrden){
        $.ajax({
        url: 'index.php?r=ensayos/AjaxImprimirReporte',
        type: 'POST',       
        data: {nroEnsayo: nroEnsayo},
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
    guardarResultadoServicio:function(NroOrden,idservicio,resultado){
       var me = this;
      $.ajax({
                         url: 'index.php?r=orden/AjaxGuardarResultadoServicio',
                         type: 'POST',                        
                         data: {
                            NroOrden:NroOrden,
                            idservicio:idservicio,
                            resultado:resultado,
                        },
                     })
                     .done(function(response) {
                        console.log(response.success['message']);
                            
                           
                            $('#FormResultado').hide('fade');

                            me.consultarDetOrdenT_A(NroOrden);

                     })
                     .fail(function() {
                         console.log("error");
                     })
                     .always(function() {
                         console.log("complete");

                     });

        

    },consultarOrdenT:function(NroOrdenTrabajo){
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
            $("#txtLaboratorio").val(data.Ordentrabajo[0].laboratorio);
            $("#txtNomMuestra").val(data.Ordentrabajo[0].muestra);
            $("#txtNomMuestra").attr('data-id',data.Ordentrabajo[0].idMuestra );
            $("#txtCodMuestra").val(data.Ordentrabajo[0].codigo); 
            $("#btn_Generar_Solicitud").removeAttr('disabled');
            $("#btn_GuardarCotizacion").removeAttr('disabled');
            $("#btn_imprimirCotizacion").removeAttr('disabled');



            /*-------*/
        });

        

    },
    consultarDetOrdenT_A:function(NroOrdenTrabajo){
        var me = this;

        $.ajax({
        url: 'index.php?r=orden/AjaxobtenerDetalleOrdenAnalista',
        type: 'POST',       
        data: {NroOrdenTrabajo: NroOrdenTrabajo},       
        })
        .done(function(data) {
            console.log(data.Orden);
            
        var table = $('#DetalleReporte').DataTable();
        table.clear();
           me.llenarDetalle(data.Detalle);

        })
        .fail(function() {
            console.log("error");
        })
        .always(function(data) {
           
        });

        

    },
    registrarReporteEnsayos: function(nroReporte,nroOrden,idMuestra,laboratorio,observaciones,ingresado_por,detalle){
        

        var me = this;
        $.ajax({
            url: 'index.php?r=ensayos/AjaxRegistrarReporteEnsayos',
            type: 'POST',
            data: {
                nroReporte:nroReporte,
                nroOrden:nroOrden,
                idMuestra:idMuestra,
                laboratorio:laboratorio,
                observaciones:observaciones,
                ingresado_por:ingresado_por,                            
                },
        })
        .done(function(response) {
            console.log(response);
             me.registrarDetalleReporte(nroReporte,detalle);
             $('#Success').show();
             //boton generar solicitud
             //$("#idCotSolicitud").val(idCotizacion);
            //$("#btn_Generar_Solicitud").removeAttr('disabled');

            
                setTimeout(function(){
                      window.location.href = "index.php?r=orden/ordenes_analista";
                }, 1000);

        })
           
    },
    registrarDetalleReporte: function(nroReporte,detalle){
        $.ajax({
            url: 'index.php?r=ensayos/AjaxRegistrarDetalleReporte',
            type: 'POST',
            data: {
                nroReporte:nroReporte,                           
                json:JSON.stringify(detalle),
                },
        })
        .done(function(response) {
            console.log(response);
        })
           
    },
    llenarDetalle:function(detalle){
        
        var table = $('#DetalleReporte').DataTable();
       table.destroy();
        $('#DetalleReporte').dataTable({  
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
        "bFilter": false,
        fnDrawCallback: function() {

            $(".ver_serviciodetalle").click(function(event) {
                $("#FormResultado").show();

                $("#txtServicio").val($(this).attr('servicio'));
                $("#txtServicio").attr({
                    idservicio:$(this).attr('idservicio'),
                    nroOrden:$(this).attr('nroOrden')
                });
                $("#txtMetodo").val( $(this).attr('metodo'));
                $("#txtResultado").val($(this).attr('resultado'));
               
                //
                //
            });

  
              

            } 
    } );
    $.each(detalle,function(index, value){ 
        
            $('#DetalleReporte').DataTable().row.add([
            value.id, value.descripcion, value.metodo,'<a href="#" resultado="'+value.resultado+'"metodo="'+value.metodo+'" servicio="'+value.descripcion+'" idservicio="'+value.id+'" nroOrden="'+value.nroOrden+'"style="margin-left:5px;margin-right:0px" class="btn btn-default btn-sm ver_serviciodetalle"><i class="fa fa-eye"><span style="display:none;">'+value.resultado+'</span></i></a>'
            ]).draw();
        
          

        });


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
