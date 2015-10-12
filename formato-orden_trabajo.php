<?php 
$laboratorio=$_POST['laboratorio'];
$fecha_emision=$_POST['fecha_emision'];
$año=$_POST['año'];
$cant_muestra=$_POST['cant_muestra'];
$codigo=$_POST['codigo'];
$dia=$_POST['dia'];
$mes=$_POST['mes'];
$metodocliente=$_POST['metodocliente'];
$nombre=$_POST['nombre'];
$nroOrden=$_POST['nroOrden'];
$cod_ordentrab=$_POST['cod_ordentrab'];
$observacion_m=$_POST['observacion_m'];
$observaciones_o=$_POST['observaciones_o'];
$peso_volumen=$_POST['peso_volumen'];
$presentacion=$_POST['presentacion'];                    

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
	.bold{
		font-weight: bold;
	}
	

	.b_t{
		border-top: 1px solid #000;
	}
	.b_r{
	border-right: 1px solid #000;
	}
	.b_l{
	border-left: 1px solid #000;
	}
	.b_b{
	border-bottom: 1px solid #000;
	}

	.n_b_b{
	border-bottom: 0px;
	}
	.n_b_l{
	border-left: 0px;
	}
	.n_b_r{
	border-right: 0px;
	}
	.n_b_t{
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


	.center{
		text-align: center;
	}
	.header_detalle td{
	padding: 1em;
	}
</style>
</head>
<body>
	<div>
	<table  cellspacing="0" cellspading="0" style="max-width:1024px;margin:0 auto;">
		<tr>
			<td colspan="4" align="center" class="n_b_l bold">
				ORDEN DE TRABAJO PARA ENSAYOS  <br>
				( FORMATO DTL - 002.02 )
			</td>
		</tr>
		<tr>
			<td colspan="4" align="center" class="n_b_b b_r bold">
				ORDEN DE TRABAJO PARA ENSAYOS N° <span class="orden_d"><?php echo $cod_ordentrab; ?></span>
			</td>
		</tr>
		<tr>
			<td class="" colspan="3">Fecha de Emisión : <span class="orden_d"> <?php echo $fecha_emision; ?></span></td>
			<td class="n_b_l b_r" colspan="1">Laboratorio/Sección : <span class="orden_d"> <?php echo $laboratorio; ?></span></td>
		</tr>
		<tr class="row_title" >
			<td  class=" bold">
				1.
			</td>
			<td colspan="3" class="n_b_l b_r bold">
				INFORMACIÓN  GENERAL  SOBRE  LA  MUESTRA  DE  PRODUCTOS.
			</td>
		</tr>
		<tr>
			<td class="">1.1</td>
			<td class="">Nombre del Producto : <span class="orden_d"> <?php echo $nombre; ?></span></td>
			<td class="b_r" colspan="2"><span class="nro_col">1.2</span> Código de Muestra :<span class="orden_d"><?php echo $codigo; ?></td>
		</tr>
		<tr>
			<td class="">1.3</td>
			<td class="">N° de Unidades por Muestra : <span class="orden_d"><?php echo $cant_muestra; ?> </span></td>
			<td class="b_r" colspan="2"><span class="nro_col">1.4</span> Peso / Volumen por  Muestra : <span class="orden_d"><?php echo $peso_volumen ?></span></td>
		</tr>
		<tr>
			<td class="">1.5</td>
			
			<td class="b_r" colspan="3">Forma de Presentación : <span class="orden_d"> <?php echo $presentacion ?></span> </td>
		</tr>
		<tr>
			<td class="">1.6</td>
			<td class="">Incluye Método de Ensayo del Cliente ( SI / NO ) : <span class="orden_d"> <?php echo $metodocliente; ?></span></td>
			<td class="b_r" colspan="2"><span class="nro_col">1.7</span> Observaciones Adicionales : <span class="orden_d"><?php echo $observacion_m ?></td>
		</tr>
		<tr class="row_title" >
			<td  class=" bold">
				2.
			</td>
			<td colspan="3" class="n_b_l b_r bold">
				ENSAYOS   SOLICITADOS.
			</td>
		</tr>
		<tr class="header_detalle">
			<td  class="bold center">N°</td>
			<td  class="bold center">ENSAYO</td>
			<td  class="bold center b_r" style="width: 135px;" colspan="2">MÉTODO  DE  ENSAYO</td>
			
		</tr>
			<?php 
$json=$_POST['detalle'];
$array = json_decode($json);

		
	$item=1;
foreach($array as $obj){
			
 ?>
	<tr>
		<td class="center"><?php echo $item;?></td>
		<td class="center"><?php echo $obj->descripcion; ?></td>
		<td class="center b_r" colspan="2"><?php echo $obj->metodo; ?></td>		
	</tr>
<?php 
		$item++; 
		}
?>
		<tr class="row_title" >
			<td  class=" bold">
				3.
			</td>
			<td colspan="3" class="n_b_l b_r bold">
				OBSERVACIONES.
			</td>
		</tr>
		<tr>
			<td colspan="4 " class="b_r" height="50px">
				<span class="orden_d"> <?php echo $observaciones_o ?></span>
			</td>

		</tr>
		<tr class="row_title" >
			<td  class=" bold">
				3.
			</td>
			<td  class="n_b_l  bold">
				FECHA   DE   ENTREGA   DE   LOS   RESULTADOS.
			</td>
			<td class="b_r" colspan="2">AÑO : <?php echo $año; ?>| MES : <?php echo $mes; ?>| DIA : <?php echo $dia; ?>| HORA :</td>
		</tr>
		<tr class="row_title" >
			<td  class=" bold">
				4.
			</td>
			<td  class="n_b_l  bold">
				AUTORIZACIÓN DE LA ORDEN DE TRABAJO.
			</td>
			<td class="b_r bold" colspan="2"><span class="nro_col">5.</span> RECEPCIÓN DE LA ORDEN DE TRABAJO.</td>
		</tr>
		<tr class="firma">
		<td class="n_b_b center" colspan="2" cellspadding="16px" >
			
<p class="bold"><hr></p>			
<p class="bold">Responsable de Sección de Preparación de Muestras </p>
<p class="bold">CERTIPETRO</p>
<p class="bold">Facultad de Ingeniería de Petróleo - UNI</p>  
<p class="bold">( Firma y Sello )</p>

		</td>
		<td class="center b_r n_b_b" colspan="2" cellspadding="16px">
			
<p class="bold"><hr></p>			
<p class="bold">Responsable de la Sección Analítica </p>
<p class="bold">(Firma)</p> 
<p class="bold" style="color:transparent;">c</p>
<p class="bold" style="color:transparent;">c</p> 

		</td>
	</tr>
	<tr>
		<td colspan="2">
			
		</td>
		<td colspan="2" class="b_r">
			Fecha y Hora de Recepción : …………………………………	
		</td>
	</tr>
	<tr>
		<td class="b_r" colspan="4">FORMATO N° DTL – 002.02</td>
	</tr>
	</table>
</div>
</body>
</html>
