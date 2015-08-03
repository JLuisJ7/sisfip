<?php

class SolicitudController extends Controller
{
public function actionAjaxRegistrarSolicitud(){
	//cotizacion
$nroSolicitud=$_POST['nroSolicitud'];
$nroCotizacion=$_POST['nroCotizacion'];
$idCliente=$_POST['idCliente'];
$idMuestra=$_POST['idMuestra'];
$Ensayos=$_POST['Ensayos'];
$Inspeccion=$_POST['Inspeccion'];
$muestreo=$_POST['muestreo'];
$otros=$_POST['otros'];
$total=$_POST['total'];
$fecha_entrega=$_POST['fecha_entrega'];
$Acreditacion=$_POST['Acreditacion'];
$Contramuestras=$_POST['Contramuestras'];
$observaciones=$_POST['observaciones'];


		$respuesta = Solicitud::model() -> registrarSolicitud($nroSolicitud,$nroCotizacion,$idCliente,$idMuestra,$Ensayos,$Inspeccion,$muestreo,$otros,$total,$fecha_entrega,$Acreditacion,$Contramuestras,$observaciones);

		
		Util::renderJSON(array( 'success' => $respuesta ));
	}


	public function actionAjaxObtenerNroSolicitud(){		
		$solicitud = Solicitud::model()->ObtenerNroSolicitud();
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$solicitud[0]));
		
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionRegistrar()
	{
		
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");

		}else{
			
			//	$NroCotizacion=$_POST['NroCotizacion'];
			$NroCotizacion = Yii::app()->request->getParam('NroCotizacion');
			if(empty($NroCotizacion)){
				$this->render("registrar");
			}else{
				//$cotizacion = Cotizacion::model()->obtenerCotizacion($NroCotizacion);
				//$detalle = Detallecotizacion::model()->obtenerDetalleCotizacion($NroCotizacion);
				
				$this->render('registrar', array('data' => $NroCotizacion));
				
				
			}

	
		}
		


	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}