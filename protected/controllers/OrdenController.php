<?php

class OrdenController extends Controller
{

	public function actionAjaxObtenerNroOrden(){		
		$orden = Ordentrabajo::model()->obtenerNroOrdenT();
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$orden[0]));
		
	}
	
	public function actionRegistrar()
	{

		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1) {
  				//	$NroCotizacion=$_POST['NroCotizacion'];
			$NroSolicitud = Yii::app()->request->getParam('NroSolicitud');
			if(empty($NroSolicitud)){
				$this->render("registrar");
			}else{
				//$cotizacion = Cotizacion::model()->obtenerCotizacion($NroCotizacion);
				//$detalle = Detallecotizacion::model()->obtenerDetalleCotizacion($NroCotizacion);
				
				$this->render('registrar', array('data' => $NroSolicitud));
				
				
			}
  				
  			}else{
  				$this->redirect('index.php');
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