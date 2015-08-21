<?php

class EnsayosController extends Controller
{
	
	
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