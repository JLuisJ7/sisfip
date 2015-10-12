<?php 
$codigo=$_POST['codigo'];
$fecha_registro=$_POST['fecha_registro'];
$laboratorio=$_POST['laboratorio'];
$nombre=$_POST['nombre'];
$nroEnsayo=$_POST['nroEnsayo'];
$nroOrden=$_POST['nroOrden'];
$cod_reporte=$_POST['cod_reporte'];
$cod_ordentrab=$_POST['cod_ordentrab'];
$observaciones=$_POST['observaciones'];

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
			<td colspan="5" align="center" class="n_b_l bold">
				REPORTE   DE  ENSAYOS	  <br>
				(FORMATO DTL-004.01 )
			</td>
		</tr>
		<tr>
			<td colspan="5" align="center" class="n_b_b b_r bold">
				REPORTE   DE   ENSAYOS   N°  <span class="orden_d"><?php echo $cod_reporte; ?></span>
			</td>
		</tr>
		<tr>
			<td class="" colspan="4"></td>
			<td class="n_b_l b_r align-r" colspan="1">Fecha : <?php echo $fecha_registro; ?> <br>
(año/mes/día)
 <span class="orden_d"> </span></td>
		</tr>
		<tr class="row_title" >
			<td  class=" bold">
				1.
			</td>
			<td colspan="4" class="n_b_l b_r bold">
				INFORMACIÓN GENERAL.  
			</td>
		</tr>
		<tr>
			<td class="">1.1</td>
			<td class="" colspan="2">Sección del Laboratorio : <span class="orden_d"> <?php echo $laboratorio; ?></span></td>
			<td class="b_r" colspan="2"><span class="nro_col">1.2</span> Nº de Orden de Trabajo :<span class="orden_d"><?php echo $cod_ordentrab; ?></span></td>
		</tr>
		<tr>
			<td class="">1.3</td>
			<td class="" colspan="2">Código de Muestra : <span class="orden_d"><?php echo $codigo; ?> </span></td>
			<td class="b_r" colspan="2"><span class="nro_col">1.4</span> Producto Ensayado : <span class="orden_d"><?php echo $nombre; ?> </span></td>
		</tr>
		
		<tr class="row_title" >
			<td  class=" bold">
				2.
			</td>
			<td colspan="4" class="n_b_l b_r bold">
				ENSAYOS   Y   RESULTADOS   OBTENIDOS. 
			</td>
		</tr>
		<tr class="header_detalle">
			<td  class="bold center">N°</td>
			<td  class="bold center">ENSAYOS  REALIZADOS</td>
			<td  class="bold center "  >RESULTADOS  OBTENIDOS</td>
			<td  class="bold center "  >MÉTODOS  DE <br> ENSAYOS <br> APLICADOS
			</td>			
			<td  class="bold center b_r" style="width: 150px;" >FIRMA DEL ANALISTA RESPONSABLE DEL ENSAYO  </td>			
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
		<td class="center"><?php echo $obj->resultado; ?></td>
		<td class="center"><?php echo $obj->metodo; ?></td>	
		<td class="center b_r"></td>	
	</tr>
<?php 
		$item++; 
		}
?>
		<tr class="row_title" >
			<td  class=" bold">
				3.
			</td>
			<td colspan="4" class="n_b_l b_r bold">
				OBSERVACIONES APLICABLES A LOS ENSAYOS.
			</td>
		</tr>
		<tr>
			<td colspan="5 " class="b_r" height="50px">
				<?php echo $observaciones;  ?>
			</td>

		</tr>
		<tr class="row_title" >
			<td  class=" bold">
				4.
			</td>
			<td colspan="4" class="n_b_l b_r bold">
				REVISIÓN,   APROBACIÓN   Y   AUTORIZACIÓN.
			</td>
		</tr>
		<tr>
		<td colspan="4" class="n_b_b">
			
		</td>
		<td colspan="1" class="b_r align-c">
			20...../...... /.... <br>
				(año/mes/día)
 
		</td>
	</tr>
		<tr class="firma">
		<td class=" center" colspan="4" cellspadding="16px" >
			
<p class="bold"><hr></p>			
<p class="bold">Responsable de la Sección de Analítica </p>
<p class="bold">CERTIPETRO</p>
<p class="bold">Facultad de Ingeniería de Petróleo, Gas Natural y petroquímica – UNI</p>  
<p class="bold" style="color:transparent;">c</p>

		</td>
		<td class="center b_r " colspan="1" cellspadding="16px">
			
			<br>
			<br>
<p class="bold">Hora:11:03:00 a.m. </p>
<p class="bold">Hora:02:03:00 p.m. </p>
<p class="bold" style="color:transparent;">c</p>
<p class="bold" style="color:transparent;">c</p>
<p class="bold" style="color:transparent;">c</p> 

		</td>
	</tr>
	
	<tr>
		<td class="b_r" colspan="5">FORMATO N° DTL – 002.02</td>
	</tr>
	</table>
</div>
</body>
</html>
