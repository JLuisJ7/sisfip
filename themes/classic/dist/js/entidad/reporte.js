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
                {"mData": "cod_reporte", "sClass": "alignCenter"},
                {"mData": "laboratorio", "sClass": "alignCenter"},                
                {"mData": "nombre", "sClass": "alignCenter"},
                {"mData": "codigo", "sClass": "alignCenter"},
                {"mData": "fecha_registro", "sClass": "alignCenter"},
                 {"mData": "cod_ordentrab", "sClass": "alignCenter"},            
                {
                    "mData": 'nroEnsayo',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "150px",
                    "mRender": function(o) {
                        return '<a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-default btn-sm imprimirReporte"><i class="fa fa-print"></i></a><a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-warning btn-sm enviarReporte"><i class="fa fa-envelope"></i></a> <a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-danger btn-sm eliminarServicio"><i class="fa fa-trash-o"></i></a>';
                    }
                }
            ],
            fnDrawCallback: function() {
                
                $('.imprimirReporte').click(function() {
                    me.imprimirReporte($(this).attr('lang'));                  
                });

                $('.enviarReporte').click(function() {
                    me.actualizarEstadoReporte($(this).attr('lang'),1);                  
                });

            }
        });
    },
    actualizarEstadoReporte: function(nroEnsayo,estado){
        $.ajax({
            url: 'index.php?r=ensayos/AjaxActualizarEstadoReporte',
            type: 'POST',
            data: {
                nroEnsayo: nroEnsayo,
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
    loadListadoReportesDirector: function(){
        //alert("hola");
        var me = this;
        
        Util.createGrid('#listarReportesDirector',{
            toolButons:'',
            url:'index.php?r=ensayos/AjaxListarReportesDirector',
            columns:[
                {"mData": "cod_reporte", "sClass": "alignCenter"},
                {"mData": "laboratorio", "sClass": "alignCenter"},                
                {"mData": "nombre", "sClass": "alignCenter"},
                {"mData": "codigo", "sClass": "alignCenter"},
                {"mData": "fecha_registro", "sClass": "alignCenter"},
                 {"mData": "cod_ordentrab", "sClass": "alignCenter"},            
                {
                    "mData": 'nroEnsayo',
                    "bSortable": false,
                    "bFilterable": false,
                    //"width": "150px",
                    "mRender": function(o) {
                        return '<form action="index.php?r=ensayos/generar_informe" method="POST"><a href="#" style="margin-left:5px;margin-right:0px" lang="' + o + '" class="btn btn-default btn-sm imprimirReporte"><i class="fa fa-print"></i></a><span style="color:transparent;">__</span><input type="hidden" name="nroEnsayo" value="' + o + '"><input  class="btn btn-warning btn-sm" value="Generar Informe" type="submit"></form>';
                    }
                }
            ],
            fnDrawCallback: function() {
               
                $('.imprimirReporte').click(function() {
                    me.imprimirReporte($(this).attr('lang'));
                   

                });

            }
        });
    },
 imprimirReporte:function(nroEnsayo){
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
            $.post('formato-reporte_ensayos.php', {
                codigo:data.Reporte[0].codigo,
                fecha_registro:data.Reporte[0].fecha_registro,
                laboratorio:data.Reporte[0].laboratorio,
                nombre: data.Reporte[0].nombre,
                nroEnsayo:data.Reporte[0].nroEnsayo,
                nroOrden: data.Reporte[0].nroOrden,
                cod_reporte: data.Reporte[0].cod_reporte,
                cod_ordentrab: data.Reporte[0].cod_ordentrab,
                observaciones: data.Reporte[0].observaciones,
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
    registrarReporteEnsayos: function(nroReporte,nroOrden,cod_reporte,idMuestra,laboratorio,observaciones,ingresado_por,detalle){
        

        var me = this;
        $.ajax({
            url: 'index.php?r=ensayos/AjaxRegistrarReporteEnsayos',
            type: 'POST',
            data: {
                nroReporte:nroReporte,
                nroOrden:nroOrden,
                cod_reporte:cod_reporte,
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
