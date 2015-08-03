<?php/*
$atencion_a=$_POST['atencion_a'];
$cant_Muestra_necesaria=$_POST['cant_Muestra_necesaria'];
$cond_tecnica=$_POST['cond_tecnica'];
$correo=$_POST['correo'];
$detalle_servicios=$_POST['detalle_servicios'];
$direccion=$_POST['direccion'];
$doc_ident=$_POST['doc_ident'];
$fecha_entrega=$_POST['fecha_entrega'];
$fecha_registro=$_POST['fecha_registro'];
$idCotizacion=$_POST['idCotizacion'];
$muestra=$_POST['muestra'];
$nombres=$_POST['nombres'];
$referencia=$_POST['referencia'];
$telefono=$_POST['telefono'];
$total=$_POST['total'];
*/
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formato Cotizacion</title>
	<style>
	*{
		font-size: 12px;
	}
	.bold{
		font-weight: bold;
	}
	table{
		border: 0;
	}

	tr{
		border:0;
	}
	td{
		border-left: 1px solid #000;
   	 border-bottom: 1px solid;
   	     padding-left: 6px;
	}

.border-t{
	border-top: 1px solid #000;
}
.border-r{
border-right: 1px solid #000;
}
.border-l{
border-left: 1px solid #000;
}
.border-b{
border-bottom: 1px solid #000;
}

.n_border-b{
border-bottom: 0px;
}
.n_border-l{
border-left: 0px;
}
.n_border-r{
border-right: 0px;
}
.n_border-t{
border-top: 0px;
}

.det{
	padding: 8px;
	text-align: center;
	font-weight: bold;
	text-decoration: underline;
}
.align-c{
	text-align: center;
}
.align-r{
	text-align: right;
}

.rtc{
	font-weight: bold;
}

.firma p{
	margin: 0;
	font-weight: bold;
	}
	hr{
	margin-left: 16px;
	margin-right: 16px;
	}

</style>
</head>
<body>
	<div>
	<table border="0" cellspacing="0" cellspading="0" style="max-width:1024px;margin:0 auto;">
	<tr>
		<td colspan="4" class="border-t border-r n_border-b" style="	text-align: center;font-weight: bold; padding-bottom: 1em;">COTIZACION DE SERVICIOS PARA ENSAYOS N°:  <span class="bold"><?php echo $idCotizacion; ?></span></td>
	</tr>
	<tr>
		<td colspan="4" class="border-r">Fecha :  <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr class="rtc">
		<td >1.</td>
		<td colspan="3" class="n_border-l border-r"> INFORMACION DEL CLIENTE/SOLICITANTE</td>
	</tr>
	<tr>
		<td>1.1</td>
		<td>Cliente/Solicitante:  <span class="bold"><?php echo ''; ?></span></td>
		<td colspan="2" class="border-r">RUC o DNI:  <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr>
		<td>1.2</td>
		<td colspan="3" class="border-r">Atención a:  <span class="bold"><?php echo ''; ?></span></td>		
	</tr>
	<tr>
		<td>1.3</td>
		<td colspan="3" class="border-r">Dirección :  <span class="bold"><?php echo ''; ?></span></td>		
	</tr>
	<tr>
		<td>1.4</td>
		<td >Teléfono/fax :  <span class="bold"><?php echo ''; ?></span></td>	
		<td colspan="2" class="border-r">E-mail: <span class="bold"><?php echo ''; ?></span></td>	
	</tr>
	<tr>
		<td>1.5</td>
		<td colspan="3" class="border-r">Comunicación de Referencia :  <span class="bold"><?php echo ''; ?></span></td>		
	</tr>
	<tr class="rtc">
		<td>2</td>
		<td colspan="3" class="n_border-l border-r">INFORMACION SOBRE LOS SERVICIOS. </td>		
	</tr>
	<tr>
		<td>2.1</td>
		<td colspan="3" class="border-r">Nombre del Producto:  <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr>
		<td>2.2</td>
		<td colspan="3" class="border-r">Servicios Solicitados</td>
	</tr>
	<tr>
		<td>2.3</td>
		<td colspan="3" class="border-r">Condiciones Técnicas Especiales Aplicables a los Servicios : <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr>
		<td>2.4</td>
		<td colspan="3" class="border-r">Detalles sobre los Servicios ofrecidos : <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr>
		<td class="det ">ITEMS</td>
		<td class="det ">SERVICIOS</td>
		<td class="det ">METODOLOGIA</td>
		<td class="det border-r" style="width:110px;">TARIFA POR SERVICIO(S/.)</td>
	</tr>
<!-- 	<?php 
$json=$_POST['detalle'];
$array = json_decode($json);

		
	$item=1;
foreach($array as $obj){
			
 ?>
	<tr>
		<td class="align-c"><?php echo $item;?></td>
		<td class="align-c"><?php echo $obj->descripcion; ?></td>
		<td class="align-c"><?php echo $obj->metodo; ?></td>
		<td class="border-r align-c"><?php echo $obj->precio; ?></td>
	</tr>
<?php 
		$item++; 
		}
?> -->
	<tr>
		<td colspan="2" class="bold">Ensayos Recomendados</td>
		<td colspan="" class=" bold " >Valor Total de los Servicios</td>
		<td class="bold border-r align-c"><?php echo ''; ?></td>
	</tr>
	<tr class="rtc">
		<td>3</td>
		<td colspan="3" class="n_border-l border-r">CONDICIONES DE PAGO Y ENTREGA DE LOS RESULTADOS.</td>
	</tr>
	<tr>
		<td class="n_border-b ">3.1</td>
		<td colspan="2" class="n_border-l n_border-b ">Condiciones de Pago de los Servicios:Condiciones de Pago de los Servicios: El pago de los servicios prestados se realizara con adelanto del 50% 
contrato del servicio y cancelación a la entrega del Informe de Ensayos.
En caso contrario se aceptará el servicio previa orden de compra
(RUC 20169004359),  debiéndose  informar  esta operación,  dentro de las 24 horas,  mediante  presentación 
original del depósito, a fin de procesar su registro contable.
</td>
<td class="n_border-l n_border-b border-r"></td>
	</tr>
	<tr>
		<td class="n_border-b ">3.2</td>
		<td colspan="2" class="n_border-l n_border-b ">Fecha de Entrega de los Resultados : <span class="bold"><?php echo ''; ?></span></td>
		<td class="border-r n_border-b n_border-l"></td>
	</tr>
	<tr>
		<td class="n_border-b ">3.3</td>
		<td colspan="2" class="n_border-l n_border-b ">Cantidad de muestra necesaria: <span class="bold"><?php echo ''; ?></span></td>
		<td class="border-r n_border-b n_border-l"></td>
	</tr>
	<tr>
		<td>3.4</td>
		<td colspan="2" class="n_border-l ">La presente cotización tiene validez por 15 días a partir de la fecha</td>
		<td class="border-r n_border-l"></td>
	</tr>
	<tr>
		<td colspan="4" class="n_border-b border-r">
			Atentamente
		</td>
	</tr>
	<tr>
		<td colspan="2"></td>

		<td colspan="2" cellspadding="16px" class=" n_border-l border-r align-c firma">
			
<p><hr></p>			
<p>Nombre del Jefe </p>
<p>Jefe de la Oficina de Servicios al Cliente</p>  
<p>CERTIPETRO</p> 
<p>Universidad Nacional de Ingeniería - FIP</p>

		</td>
	</tr>
	<tr>
		<td colspan="4" class="border-r">Formato DGG-012.03</td>
	</tr>
</table>
</div>
</body>
</html>
