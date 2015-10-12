<?php

class EnsayosController extends Controller
{

public function actionAjaxActualizarEstadoReporte(){
		$nroEnsayo=$_POST['nroEnsayo'];
		$estado=$_POST['estado'];
		
		$reportes = Reporteensayo::model()->actualizarEstadoReporte($nroEnsayo,$estado);

		Util::renderJSON($reportes);
	}
public function actionAjaxListarReportesAnalista(){
		
		$reportes = Reporteensayo::model()->ListarReportesAnalista();

		Util::renderJSON($reportes);
	}

	public function actionAjaxListarReportesDirector(){
		
		$reportes = Reporteensayo::model()->ListarReportesDirector();

		Util::renderJSON($reportes);
	}

	public function actionAjaxImprimirReporte(){
		$nroEnsayo=$_POST['nroEnsayo'];
		
		$reporte = Reporteensayo::model()->obtenerPrintReporte($nroEnsayo);
		$detalle = Detreporteensayo::model()->obtenerPrintDetalleReporte($nroEnsayo);

		Util::renderJSON(array( 'Reporte' => $reporte,'Detalle'=>$detalle ));
	}


	public function actionAjaxRegistrarReporteEnsayos(){
	//cotizacion


$nroReporte=$_POST['nroReporte'];
$nroOrden=$_POST['nroOrden'];
$idMuestra=$_POST['idMuestra'];
$cod_reporte=$_POST['cod_reporte'];
$laboratorio=$_POST['laboratorio'];
$observaciones=$_POST['observaciones'];
$ingresado_por=$_POST['ingresado_por'];
		$respuesta = Reporteensayo::model() -> registrarRegistrarReporteEnsayos($nroReporte,$nroOrden,$cod_reporte,$idMuestra,$laboratorio,$observaciones,$ingresado_por);

		
		Util::renderJSON(array( 'success' => $respuesta ));
	}
public function actionAjaxRegistrarDetalleReporte(){

$nroReporte=$_POST['nroReporte'];

$json=$_POST['json'];
$array = json_decode($json);

	
foreach($array as $obj){
			$idServicio=$obj->ID;			
			$resultado=$obj->RES;	
						
 $respuesta=Detreporteensayo::model() -> registrarRegistrarDetalleReporte($nroReporte,$idServicio,$resultado);



}
		
		Util::renderJSON(array( 'success' => $respuesta ));
	}

	
	public function actionAjaxObtenerNroReporte(){		
		$reporte = Reporteensayo::model()->obtenerNroReporteE();
		header('Content-Type: application/json; charset="UTF-8"');
    	echo CJSON::encode(array('output'=>$reporte[0]));
		
	}
	public function actionAjaxGenerarNroInforme(){	
		$nroEnsayo=$_POST['nroEnsayo'];
		$reporte = Reporteensayo::model()->generarNroInforme($nroEnsayo);
		$detalle = Detreporteensayo::model()->obtenerPrintDetalleReporte($nroEnsayo);		
		header('Content-Type: application/json; charset="UTF-8"');
    	//echo CJSON::encode(array('output'=>$reporte[0],));
		Util::renderJSON(array('output'=>$reporte[0],'detalle'=>$detalle ));
	}

	public function actionAjaxobtenerDetalleOrdenAnalista(){
		$NroOrdenTrabajo=$_POST['NroOrdenTrabajo'];
		$detalle = Detalleordentrab::model()->obtenerDetalleOrdenAnalista($NroOrdenTrabajo);

		Util::renderJSON(array('Detalle'=>$detalle ));
	}

public function actionInformes()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1 || $rol==3) {
  				$this->render('Informes', array('rol' => $rol));
  			}else{
  				$this->redirect('index.php');
  			}
  			
			
		}
		
	}

public function actionReportes()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1 || $rol==4) {
  				$this->render('reportes', array('rol' => $rol));
  			}else{
  				$this->redirect('index.php');
  			}
  			
			
		}
		
	}

	public function actionreportes_director()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1 || $rol==3) {
  				$this->render('reportes_director', array('rol' => $rol));
  			}else{
  				$this->redirect('index.php');
  			}
  			
			
		}
		
	}
public function actiongenerar_informes()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1 || $rol==3) {
  				$this->render('generar_informe', array('rol' => $rol));
  			}else{
  				$this->redirect('index.php');
  			}
  			
			
		}
		
	}

	public function actiongenerar_informe()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1 || $rol==3) {
  				//$this->render('generar_reporte', array('rol' => $rol));
  				//	$NroCotizacion=$_POST['NroCotizacion'];
				$nroEnsayo = Yii::app()->request->getParam('nroEnsayo');
				if(empty($nroEnsayo)){
					$this->render("registrar");
				}else{
					//$cotizacion = Cotizacion::model()->obtenerCotizacion($NroCotizacion);
					//$detalle = Detallecotizacion::model()->obtenerDetalleCotizacion($NroCotizacion);
					
					$this->render('generar_informe', array('rol' => $rol,'data' => $nroEnsayo));
					
					
				}

  			}else{
  				$this->redirect('index.php');
  			}
  			
			
		}
		
	}

	public function actiongenerar_reporte()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$usuarioSession = Yii::app()->getSession()->get('usuarioSesion');
  			$usuario = $usuarioSession['datausuario'];
  			$rol = $usuarioSession['usuario']['ide_rol'];
  			if ($rol==1 || $rol==4) {
  				//$this->render('generar_reporte', array('rol' => $rol));
  				//	$NroCotizacion=$_POST['NroCotizacion'];
				$nroOrden = Yii::app()->request->getParam('nroOrden');
				if(empty($nroOrden)){
					$this->render("registrar");
				}else{
					//$cotizacion = Cotizacion::model()->obtenerCotizacion($NroCotizacion);
					//$detalle = Detallecotizacion::model()->obtenerDetalleCotizacion($NroCotizacion);
					
					$this->render('generar_reporte', array('rol' => $rol,'data' => $nroOrden));
					
					
				}

  			}else{
  				$this->redirect('index.php');
  			}
  			
			
		}
		
	}

	
}