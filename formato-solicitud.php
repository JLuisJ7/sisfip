<?php
$distrito=$_POST['distrito'];
$fecha_registro=$_POST['fecha_registro'];
$Ensayos=$_POST['Ensayos'];
$Inspeccion=$_POST['Inspeccion'];
$acreditacion=$_POST['acreditacion'];
$año=$_POST['año'];
$cant_muestra=$_POST['cant_muestra'];
$cliente=$_POST['cliente'];
$contramuestras=$_POST['contramuestras'];
$dia=$_POST['dia'];
$direccion=$_POST['direccion'];
$documento=$_POST['documento'];
$identificacion=$_POST['identificacion'];
$marca=$_POST['marca'];
$mes=$_POST['mes'];
$metodocliente=$_POST['metodocliente'];
$muestreo=$_POST['muestreo'];
$nombre=$_POST['nombre'];
$nroCotizacion=$_POST['nroCotizacion'];
$nroSolicitud=$_POST['nroSolicitud'];
$observaciones_m=$_POST['observaciones_m'];
$observaciones_sol=$_POST['observaciones_sol'];
$otros=$_POST['otros'];
$presentacion=$_POST['presentacion'];
$provincia=$_POST['provincia'];
$referencia=$_POST['referencia'];
$telefono=$_POST['telefono'];
$total=$_POST['total'];
$detalle=$_POST['detalle'];
$json=$_POST['detalle'];
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
				FORMATO DGG-012.02 <br>
				SOLICITUD PARA SERVICIOS DE ENSAYOS
			</td>
		</tr>
		<tr>
			<td colspan="4" align="center" class="n_b_b b_r bold">
				SOLICITUD PARA SERVICIOS DE ENSAYOS N° <span class="sol_d"><?php echo $nroSolicitud; ?></span>
			</td>
		</tr>
		<tr>
			<td class="" colspan="3">Fecha : <span class="sol_d"><?php echo $fecha_registro; ?> </td>
			<td class="n_b_l b_r" colspan="1">Hora : <span class="sol_d"><?php echo ''; ?> </td>
		</tr>
		<tr class="row_title" >
			<td  class=" bold">
				1.
			</td>
			<td colspan="3" class="n_b_l b_r bold">
				DATOS DEL CLIENTE.
			</td>
		</tr>
		<tr>
			<td class="n_b_b">1.1</td>
			<td class="n_b_b">Nombre : <span class="sol_d"><?php echo $cliente; ?></td>
			<td class="n_b_b b_r" colspan="2"></td>
		</tr>
		<tr>
			<td class="n_b_b">1.2</td>
			<td class="n_b_b">Dirección Legal : <span class="sol_d"><?php echo $direccion; ?></td>
			<td class="n_b_b b_r" colspan="2"><span class="nro_col">1.3</span> Distrito: <span class="sol_d"><?php echo $distrito; ?></td>
		</tr>
		<tr>
			<td class="n_b_b">1.4</td>
			<td class="n_b_b">Provincia/Departamento :   <span class="sol_d"><?php echo $provincia; ?></td>
			<td class="n_b_b b_r" colspan="2"><span class="nro_col">1.5</span> RUC N° : <span class="sol_d"><?php echo $documento; ?></td>
		</tr>
		<tr>
			<td class="">1.6</td>
			<td class="">Teléfonos/Fax : <span class="sol_d"><?php echo $telefono; ?></td>
			<td class=" b_r" colspan="2"><span class="nro_col">1.7</span> Referencias : <span class="sol_d"><?php echo $referencia; ?></td>
		</tr>
		<tr class="row_title" >
			<td class="bold">
				2.
			</td>
			<td colspan="3" class="b_r bold">
				SERVICIOS SOLICITADOS.
			</td>
		</tr>
		<tr>
			<td class="n_b_b">2.1</td>
			<td class="n_b_b">Ensayos : <span class="sol_d"><?php echo $Ensayos; ?></td>
			<td class="n_b_b" colspan=""><span class="nro_col">2.2</span> Inspeccion: <span class="sol_d"><?php echo $Inspeccion; ?></td>
			<td class="n_b_b n_b_l b_r" colspan=""><span class="nro_col">2.3</span> Muestreo: <span class="sol_d"><?php echo $muestreo; ?></td>
		</tr>
		<tr>
			<td class="">2.4</td>			
			<td class="" colspan=""> Otros(especificar): <span class="sol_d"><?php echo $otros; ?></td>
			<td class="b_r" colspan="2"></td>
		</tr>
		<tr class="row_title">
			<td  class="bold">
				3.
			</td>
			<td  colspan="3" class="bold b_r">
				DATOS DE LAS MUESTRAS DE PRODUCTOS.
			</td>
		</tr>
		<tr>
			<td class="">3.1</td>
			<td class="">Nombre del producto según alcance de la acreditación : <span class="sol_d"><?php echo $nombre; ?></td>
			<td class="b_r" colspan="2"><span class="nro_col">3.2</span> Marca Comercial : <span class="sol_d"><?php echo $marca; ?></td>
		</tr>
		<tr>
			<td class="">3.3</td>
			<td class="">Identificación de la muestra según el solicitante : <span class="sol_d"><?php echo $identificacion; ?></td>
			<td class="b_r" colspan="2"><span class="nro_col">3.4</span> Cantidad de Muestra (N° Unidades,Peso,Volumen) : <span class="sol_d"><?php echo $cant_muestra; ?></td>
		</tr>
		<tr>
			<td class="">3.5</td>
			<td class="">Presentación de la muestra : <span class="sol_d"><?php echo $presentacion; ?></td>
			<td class="b_r" colspan="2"><span class="nro_col">3.6</span> Observaciones : <span class="sol_d"><?php echo $observaciones_m; ?></td>
		</tr>
		<tr class="row_title" >
			<td class="bold">
				4.
			</td>
			<td  colspan="3" class="bold b_r">
				ENSAYOS SOLICITADOS.
			</td>
		</tr>
		<tr class="header_detalle">
			<td  class="bold center">N°</td>
			<td  class="bold center">Nombre del Ensayo o Servicio</td>
			<td  class="bold center" style="width: 135px;">Método de Ensayo Aplicable (Autor, Número, Año)</td>
			<td  class="bold center b_r" style="width: 135px;">Valor por Ensayo <br>(en soles)</td>
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
		<td class="center"><?php echo $obj->metodo; ?></td>
		<td class="b_r center"><?php echo $obj->precio; ?></td>
	</tr>
<?php 
		$item++; 
		}
?>
		
		<tr>
			<td class="" colspan="2">El cliente proporciona métodos de ensayos (especificar) : <span class="sol_d"><?php echo $metodocliente; ?></td>
			<td  colspan="2" class="n_b_l b_r bold center">Valor Total de los Servicios : <span class="sol_d"><?php echo $total; ?></td>
		</tr>
		<tr>
			<td  class="bold ">5.</td>
			<td  colspan="" class="n_b_l bold">ENTREGA DE RESULTADOS.</td>
			<td  colspan="2" class="b_r bold"><span class="nro_col" class="bold b_r">6.</span> ENTREGA DE CONTRAMUESTRAS : <span class="sol_d"></td>
		</tr>
		<tr>
			<td class="" colspan="2">
				¿Informe de Ensayo en papel con símbolo de acreditación?  : <span class="sol_d"><?php echo $acreditacion; ?> 
			</td>
			<td class="b_r center" rowspan="2"	colspan="2"><?php echo $contramuestras; ?></td>		
		</tr>
		<tr>
			<td class="" colspan="2">AÑO : <span class="sol_d"><?php echo $año; ?> MES: <span class="sol_d"><?php echo $mes; ?>  DIA : <span class="sol_d"><?php echo $dia; ?> HORA</td>
		</tr>
		<tr class="row_title">
			<td class="bold">
				7.
			</td>
			<td  colspan="3" class="n_b_l bold b_r">
				OBSERVACIONES PREVIAS AL SERVICIO SOLICITADO : <span class="sol_d"><?php echo $observaciones_sol; ?>
			</td>
		</tr>
		<tr class="firma">
		

		<td class="center" colspan="2" cellspadding="16px">
			
<p class="bold"><hr></p>			
<p class="bold">Solicitante </p>
<p class="bold">(D.N.I.,C.E.) Nº</p> 
<p class="bold" style="color:transparent;">c</p>
<p class="bold" style="color:transparent;">c</p> 

		</td>
		<td class="b_r center" colspan="2" cellspadding="16px" >
			
<p class="bold"><hr></p>			
<p class="bold">Nombre del Jefe </p>
<p class="bold">Jefe de la Oficina de Servicios al Cliente</p>  
<p class="bold">CERTIPETRO</p> 
<p class="bold">Universidad Nacional de Ingeniería - FIP</p>

		</td>
	</tr>
	<tr>
		<td class="b_r" colspan="4">Formato DGG-012.02</td>
	</tr>
	</table>
</div>
</body>
</html>
