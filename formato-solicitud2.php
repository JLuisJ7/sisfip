<?php
/*
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
		<td colspan="6" class="border-t border-r n_border-b" style="	text-align: center;font-weight: bold; padding-bottom: 1em;">COTIZACION DE SERVICIOS PARA ENSAYOS N°:  <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr>
		<td colspan="3" class="">Fecha :  <span class="bold"><?php echo ''; ?></span></td>
		<td colspan="3" class="n_border-l border-r">hora :  <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr class="rtc">
		<td >1.</td>
		<td colspan="5" class="n_border-l border-r"> DATOS DEL SOLICITANTE.</td>
	</tr>
	<tr>
		<td>1.1</td>
		<td colspan="5" class="border-r">Nombre:  <span class="bold"><?php echo ''; ?></span></td>		
	</tr>
	<tr>
		<td>1.2</td>
		<td colspan="2" class="">Dirección Legal:  <span class="bold"><?php echo ''; ?></span></td>
		
		<td colspan="3" class="border-r"><span class="num_row">1.3</span> Distrito:  <span class="bold"><?php echo ''; ?></span></td>		
	</tr>
	<tr>
		<td>1.4</td>
		<td colspan="2" class="">Provincia/Departamento :  <span class="bold"><?php echo ''; ?></span></td>
		
		<td colspan="3" class="border-r"><span class="num_row">1.5</span> RUC NRO :  <span class="bold"><?php echo ''; ?></span></td>		
	</tr>
	<tr>
		<td>1.6</td>
		<td colspan="2">Teléfono/fax :  <span class="bold"><?php echo ''; ?></span></td>	
		
		<td colspan="3" class="border-r"> <span class="num_row">1.7</span> referencias: <span class="bold"><?php echo ''; ?></span></td>	
	</tr>	
	<tr class="rtc">
		<td>2</td>
		<td colspan="5" class="n_border-l border-r">SERVICIOS SOLICITADOS. </td>		
	</tr>
	<tr>
		<td>2.1</td>
		<td colspan="1" class="border-r">Ensayos:  <span class="bold"><?php echo ''; ?></span></td>		
		<td colspan="1" class="border-r"> <span class="num_row">2.3</span> Inspección:  <span class="bold"><?php echo ''; ?></span></td>
		
		<td colspan="3" class="border-r"><span class="num_row">2.4</span> Muestreo:  <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr>
		<td>2.4</td>
		<td colspan="5" class="border-r">Otros (especificar)   </td>
	</tr>
	<tr class="rtc">
		<td>3</td>
		<td colspan="5" class="n_border-l border-r">DATOS DE LAS MUESTRAS DE PRODUCTOS </td>		
	</tr>
	<tr>
		<td>3.1</td>
		<td colspan="2" class="border-r">Nombre del producto según alcance de la acreditación: <span class="bold"><?php echo ''; ?></span></td>
		<td>3.2</td>
		<td colspan="2" class="border-r">Marca Comercial : <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr>
		<td>3.3</td>
		<td colspan="2" class="border-r">Identificación de la muestra según el solicitante:: <span class="bold"><?php echo ''; ?></span></td>
		<td>3.4</td>
		<td colspan="2" class="border-r">Cantidad de Muestra (N° Unidades,Peso,Volumen): <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr>
		<td>3.5</td>
		<td colspan="2" class="border-r">Presentación de la muestra:<span class="bold"><?php echo ''; ?></span></td>
		<td>3.6</td>
		<td colspan="2" class="border-r">Observaciones: <span class="bold"><?php echo ''; ?></span></td>
	</tr>
	<tr class="rtc">
		<td>4</td>
		<td colspan="5" class="n_border-l border-r">ENSAYOS SOLICITADOS.</td>		
	</tr>

	<tr>
		<td class="det ">ITEMS</td>
		<td class="det " colspan="2" >SERVICIOS</td>
		<td class="det ">METODOLOGIA</td>
		<td class="det border-r" colspan="" >TARIFA POR SERVICIO(S/.)</td>
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
		<td colspan="3" class="bold">El cliente proporciona métodos de ensayos (especificar):</td>
		<td colspan="3" class=" bold border-r" >Valor Total de los Servicios</td>
		
	</tr>
	<tr class="rtc">
		<td>5.</td>
		<td colspan="2" class="n_border-l border-r">ENTREGA DE RESULTADOS.</td>
		<td>6.</td>
		<td colspan="2" class="n_border-l border-r">ENTREGA DE CONTRAMUESTRAS.</td>
	</tr>
	<tr>
		<td class="n_border-b ">3.1</td>
		<td colspan="2" class="n_border-l n_border-b ">
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
