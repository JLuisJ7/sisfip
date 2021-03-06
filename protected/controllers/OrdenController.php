<?php

class OrdenController extends Controller
{
	public function actionAjaxActualizarEstadoOrden(){
		$nroOrden=$_POST['nroOrden'];
		$estado=$_POST['estado'];
		
		$orden = Ordentrabajo::model()->actualizarEstadoOrden($nroOrden,$estado);

		Util::renderJSON($orden);
	}

public function actionAjaxEliminarOrden(){
		$nroOrden=$_POST['nroOrden'];
		$eliminado=1;
		
		$orden = Ordentrabajo::model()->eliminarOrden($nroOrden,$eliminado);

		Util::renderJSON($orden);
	}
public function actionAjaxImprimirOrden(){
		$nroOrden=$_POST['nroOrden'];
		
		$orden = Ordentrabajo::model()->obtenerPrintOrden($nroOrden);
		$detalle = Detalleordentrab::model()->obtenerPrintDetalleOrden($nroOrden);

		Util::renderJSON(array( 'Orden' => $orden,'Detalle'=>$detalle ));
	}

	public function actionAjaxObtenerNroOrdenT_Sol(){
		$nroSolicitud=$_POST['nroSolicitud'];
		
		$orden = Ordentrabajo::model()->ObtenerNroOrdenT_Sol($nroSolicitud);
	header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$orden[0]));
	}
	public function actionAjaxObtenerNroOrdenT_RE(){
		$nroOrden=$_POST['nroOrden'];
		
		$orden = Ordentrabajo::model()->ObtenerNroOrdenT_RE($nroOrden);
	header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$orden[0]));
	}


public function actionAjaxGuardarResultadoServicio(){
		$NroOrden = $_POST['NroOrden'];
		$idservicio = $_POST['idservicio'];
		$resultado = $_POST['resultado'];

		$respuesta = Detalleordentrab::model()->GuardarResultadoServicio($NroOrden,$idservicio,$resultado);

		Util::renderJSON(array('success' => $respuesta));
	}


public function actionAjaxconsultarOrdenAnalista(){
		$NroOrdenTrabajo=$_POST['NroOrdenTrabajo'];
		
		$Ordentrabajo = Ordentrabajo::model()->obtenerOrdenAnalista($NroOrdenTrabajo);
		$detalle = Detalleordentrab::model()->obtenerDetalleOrdenAnalista($NroOrdenTrabajo);

		Util::renderJSON(array( 'Ordentrabajo' => $Ordentrabajo,'Detalle'=>$detalle ));
	}

	public function actionAjaxobtenerDetalleOrdenAnalista(){
		$NroOrdenTrabajo=$_POST['NroOrdenTrabajo'];
		$detalle = Detalleordentrab::model()->obtenerDetalleOrdenAnalista($NroOrdenTrabajo);

		Util::renderJSON(array('Detalle'=>$detalle ));
	}

public function actionAjaxListarOrdenesAnalista(){
		
		$orden = Ordentrabajo::model()->ListarOrdenesAnalista();

		Util::renderJSON($orden);
	}
	public function actionAjaxListarOrdenesDTecnico(){
		
		$orden = Ordentrabajo::model()->ListarOrdenesdtecnico();

		Util::renderJSON($orden);
	}

public function actionAjaxRegistrarOrdenTrabajo(){
	//cotizacion

$nroOrden=$_POST['nroOrden'];
$nroSolicitud=$_POST['nroSolicitud'];
$cod_ordentrab=$_POST['cod_ordentrab'];
$fecha_emision=$_POST['fecha_emision'];
$laboratorio=$_POST['laboratorio'];
$idMuestra=$_POST['idMuestra'];
$codMuestra=$_POST['codMuestra'];
$observaciones=$_POST['observaciones'];
$fecha_entrega=$_POST['fecha_entrega'];
$hora_entrega=$_POST['hora_entrega'];
$codPersonal=$_POST['codPersonal'];


$date = new DateTime($fecha_emision);
$fecha=$date->format('Y-m-d');
		$respuesta = Ordentrabajo::model() -> registrarOrdenTrabajo($nroOrden,$nroSolicitud,$cod_ordentrab,$fecha,$laboratorio,$idMuestra,$codMuestra,$observaciones,$fecha_entrega,$hora_entrega,$codPersonal);

		
		Util::renderJSON(array( 'success' => $respuesta ));
	}
public function actionAjaxRegistrarDetalleOrdenTrab(){

$nroOrden=$_POST['nroOrden'];

$json=$_POST['json'];
$array = json_decode($json);

	
foreach($array as $obj){
			$idServicio=$obj->ID;			
			
						
 $respuesta=Detalleordentrab::model() -> registrarDetalleOrdenTrab($nroOrden,$idServicio);



}
		
		Util::renderJSON(array( 'success' => $respuesta ));
	}

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
  			if ($rol==1 || $rol==3) {
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
	public function actionOrdenes()
	{

		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1 || $rol==3) {
  				$this->render("ordenes");
  			
  				
  			}else{
  				$this->redirect('index.php');
  			}
  			
			
		}
		
	}

public function actionordenes_analista()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1 || $rol==4) {
  				$this->render('ordenes_analista', array('rol' => $rol));
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