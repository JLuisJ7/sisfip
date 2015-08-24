<?php

class EnsayosController extends Controller
{
	public function actionAjaxRegistrarReporteEnsayos(){
	//cotizacion


$nroReporte=$_POST['nroReporte'];
$nroOrden=$_POST['nroOrden'];
$idMuestra=$_POST['idMuestra'];
$laboratorio=$_POST['laboratorio'];
$observaciones=$_POST['observaciones'];
$ingresado_por=$_POST['ingresado_por'];
		$respuesta = Reporteensayo::model() -> registrarRegistrarReporteEnsayos($nroReporte,$nroOrden,$idMuestra,$laboratorio,$observaciones,$ingresado_por);

		
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
public function actiongenerar_informe()
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