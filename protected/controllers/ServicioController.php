<?php

class ServicioController extends Controller
{
	

	public function actionAjaxListarServicios(){
		
		$servicios = Servicio::model()->listarServicios();

		Util::renderJSON($servicios);
	}
	public function actionAjaxListarServicios_S(){
		
		$servicios = Servicio::model()->listarServicios_S();

		Util::renderJSON($servicios);
	}

	public function actionAjaxObtenerServicio(){
		$idServicio=$_POST['idServicio'];
		
		$servicios = Servicio::model()->ObtenerServicio($idServicio);

		Util::renderJSON($servicios);
	}

	public function actionAjaxEliminarServicio(){
		$idServicio=$_POST['idServicio'];
		
		$servicios = Servicio::model()->eliminarServicio($idServicio);

		Util::renderJSON($servicios);
	}

	public function actionAjaxListarServiciosxProducto(){
		$idProducto=$_POST['idProducto'];
		$servicios = Servicio::model()->ListarServiciosxProducto($idProducto);

		Util::renderJSON($servicios);
	}

	public function actionAjaxAccionMantenimiento(){
		$Accion=$_POST['Accion'];
		
		$descripcion=$_POST['descripcion'];
		$descripcion=$_POST['descripcion'];
		$metodo=$_POST['metodo'];
		$tiempo_entrega=$_POST['tiempo_entrega'];
		$cantM_x_ensayo=$_POST['cantM_x_ensayo'];
		$tarifa=$_POST['tarifa'];
		$tarifa_Acred=$_POST['tarifa_Acred'];
		$detalle=$_POST['detalle'];
		if ($Accion=='Registrar') {
			$respuesta = Servicio::model() -> registrarServicio($descripcion,$metodo,$tiempo_entrega,$cantM_x_ensayo,$tarifa,$tarifa_Acred,$detalle);
		}elseif ($Accion=='Actualizar') {
			$idServicio=$_POST['idServicio'];
			$respuesta = Servicio::model() -> actualizarServicio($idServicio,$descripcion,$metodo,$tiempo_entrega,$cantM_x_ensayo,$tarifa,$tarifa_Acred,$detalle);
		}

		
		Util::renderJSON(array( 'success' => $respuesta ));
	}
	

public function actionIndex()
	{
	

		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$this->render("index");
		}
	}

}