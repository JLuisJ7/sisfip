<?php

class CotizacionController extends Controller
{

/*public function actionAjaxgenerarSolicitud(){
	

		
	}*/

public function actionAjaxEliminarDetalleCotizacion(){
		$NroCotizacion=$_POST['NroCotizacion'];
		

		$detalle=Detallecotizacion::model()->deleteAll('idCotizacion=:idCotizacion',array(':idCotizacion'=>$NroCotizacion));
		Util::renderJSON($detalle);
	}

	public function actionAjaxImprimirCotizacion(){
		$NroCotizacion=$_POST['NroCotizacion'];
		
		$cotizacion = Cotizacion::model()->obtenerCotizacion($NroCotizacion);
		$detalle = Detallecotizacion::model()->obtenerDetalleCotizacionImprimir($NroCotizacion);

		Util::renderJSON(array( 'Cotizacion' => $cotizacion,'Detalle'=>$detalle ));
	}
	public function actionAjaxeditarCotizacion(){
		$NroCotizacion=$_POST['NroCotizacion'];
		
		$cotizacion = Cotizacion::model()->obtenerCotizacion($NroCotizacion);
		$detalle = Detallecotizacion::model()->obtenerDetalleCotizacion($NroCotizacion);

		Util::renderJSON(array( 'Cotizacion' => $cotizacion,'Detalle'=>$detalle ));
	}

	public function actionAjaxCotizacionesxCliente(){	
		$doc_ident=$_POST['doc_ident'];
		$cotizacion = Cotizacion::model()->CotizacionesxCliente($doc_ident);
		Util::renderJSON($cotizacion);
		
	}

	public function actionAjaxObtenerNroCotizacion(){		
		$cotizacion = Cotizacion::model()->ObtenerNroCotizacion();
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$cotizacion[0]));
		
	}


public function actionAjaxRegistrarCotizacion(){
	//cotizacion
$idCliente=$_POST['idCliente'];
$idCotizacion=$_POST['idCotizacion'];
$muestra=$_POST['muestra'];
$cond_tecnica=$_POST['cond_tecnica'];
$detalle_servicios=$_POST['detalle_servicios'];
$total=$_POST['total'];
$fecha_Entrega=$_POST['fecha_Entrega'];
$cant_Muestra_necesaria=$_POST['cant_Muestra_necesaria'];


		$respuesta = Cotizacion::model() -> registrarCotizacion($idCliente,$cond_tecnica,$detalle_servicios,$total,$fecha_Entrega,$cant_Muestra_necesaria,$muestra);

		
		Util::renderJSON(array( 'success' => $respuesta ));
	}

public function actionAjaxActualizarCotizacion(){
	//cotizacion
$idCliente=$_POST['idCliente'];
$idCotizacion=$_POST['idCotizacion'];
$muestra=$_POST['muestra'];
$cond_tecnica=$_POST['cond_tecnica'];
$detalle_servicios=$_POST['detalle_servicios'];
$total=$_POST['total'];
$fecha_Entrega=$_POST['fecha_Entrega'];
$cant_Muestra_necesaria=$_POST['cant_Muestra_necesaria'];

$cotizacion = Cotizacion::model()->findByPk($idCotizacion);
$cotizacion->idCliente=$idCliente;
$cotizacion->cond_tecnica=$cond_tecnica;
$cotizacion->detalle_servicios=$detalle_servicios;
$cotizacion->total=$total;
$cotizacion->fecha_Entrega=$fecha_Entrega;
$cotizacion->cant_Muestra_necesaria=$cant_Muestra_necesaria;
$cotizacion->muestra=$muestra;

 $resultado = array('valor'=>1,'message'=>'Servicio Registrado correctamente.');     		
if(!$cotizacion->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido Registrar el servicio, intentelo nuevamente');

}
			

		
		//$respuesta = Cotizacion::model() -> registrarCotizacion($idCliente,$cond_tecnica,$detalle_servicios,$total,$fecha_Entrega,$cant_Muestra_necesaria,$muestra);

		
		Util::renderJSON(array( 'success' => $resultado ));
	}


public function actionAjaxRegistrarDetalleCotizacion(){

$idCotizacion=$_POST['idCotizacion'];
$muestra=$_POST['muestra'];

$json=$_POST['json'];
$array = json_decode($json);

	
foreach($array as $obj){
			$idServicio=$obj->id;			
			$Precio=$obj->Tarifa;	
			$Acreditado=$obj->Acreditado;			
 $respuesta=Detallecotizacion::model() -> registrarDetalleCotizacion($idCotizacion,$idServicio,$Precio,$muestra,$Acreditado);



}
		
		Util::renderJSON(array( 'success' => $respuesta ));
	}



	public function actionIndex()
	{
		$this->render('index');
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$this->render('index');
		}
	}
	public function actionRegistrar()
	{
		
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$this->render('registrar');
		}
		
	}

	public function actionCotizaciones()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$this->render('cotizaciones');
		}
		
	}
	
}