<?php

class SolicitudController extends Controller
{

public function actionAjaxImprimirSolicitud(){
		$nroSolicitud=$_POST['nroSolicitud'];
		
		$solicitud = Solicitud::model()->obtenerPrintSolicitud($nroSolicitud);
		$detalle = Detallesolicitud::model()->obtenerPrintDetalleSolicitud($nroSolicitud);

		Util::renderJSON(array( 'Solicitud' => $solicitud,'Detalle'=>$detalle ));
	}

public function actionAjaxConsultarSolicitudOT(){
		$nroSolicitud=$_POST['nroSolicitud'];
		
		$solicitud = Solicitud::model()->obtenerSolicitudOT($nroSolicitud);

		$detalle = Detallesolicitud::model()->obtenerDetalleSolicitudOT($nroSolicitud);

		Util::renderJSON(array( 'Solicitud' => $solicitud,'Detalle'=>$detalle ));
	}
public function actionAjaxListarSolicitudesAprobadas(){
		
		$solicitud = Solicitud::model()->listarSolicitudesAprobadas();

		Util::renderJSON($solicitud);
	}

	public function actionAjaxActualizarEstadoSolicitud(){
		$idSolicitud=$_POST['idSolicitud'];
		$estado=$_POST['estado'];
		
		$solicitud = Solicitud::model()->actualizarEstadoSolicitud($idSolicitud,$estado);

		Util::renderJSON($solicitud);
	}

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
public function actionAjaxRegistrarDetalleSolicitud(){

$nroSolicitud=$_POST['nroSolicitud'];

$json=$_POST['json'];
$array = json_decode($json);

	
foreach($array as $obj){
			$idServicio=$obj->id;			
			$Precio=$obj->Tarifa;	
			$Acreditado=$obj->Acreditado;			
 $respuesta=Detallesolicitud::model() -> registrarDetalleSolicitud($idServicio,$nroSolicitud,$Acreditado,$Precio);



}
		
		Util::renderJSON(array( 'success' => $respuesta ));
	}


	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionSolicitudes()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1 || $rol==3) {
  				$this->render('solicitudes', array('rol' => $rol));
  			}else{
  				$this->redirect('index.php');
  			}
  			
			
		}
		
	}
	public function actionsolicitudes_acliente()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1 || $rol==2) {
  				$this->render('solicitudes_acliente', array('rol' => $rol));
  			}else{
  				$this->redirect('index.php');
  			}
  			
			
		}
		
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