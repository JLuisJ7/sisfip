<?php

class ClienteController extends Controller
{

public function actionAjaxConsultarClientexDoc(){
		$doc_ident=$_POST['doc_ident'];
		
		/*$cliente = Cliente::model()->consultarClientexDoc($doc_ident);*/

		//$exists=Cliente::model()->exists('doc_ident=:doc_ident', array(':doc_ident'=>$doc_ident));
		$cliente=Cliente::model()->find('doc_ident=:doc_ident', array(':doc_ident'=>$doc_ident));
		Util::renderJSON($cliente);
	}

	public function actionAjaxRegistrarCliente(){
$nombres=$_POST['nombres'];
$doc_ident=$_POST['doc_ident'];
$atencion_a=$_POST['atencion_a'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$referencia=$_POST['referencia'];
$respuesta= Cliente::model()->RegistrarCliente($nombres,$doc_ident,$atencion_a,$direccion,$telefono,$correo,$referencia);


		header('Content-Type: application/json; charset="UTF-8"');
    	  Util::renderJSON(
    	  	array( 
    	  		'success' => $respuesta,
    	  		'idGenerado'=>Yii::app()->db->getLastInsertID('Cliente')
    	  		)
    	  	);
	}



public function actionAjaxRegistrarMuestra(){
$idCliente=$_POST['idCliente'];
$nombre=$_POST['nombre'];
$marca=$_POST['marca'];
$identificacion=$_POST['identificacion'];
$cant_muestra=$_POST['cant_muestra'];
$presentacion=$_POST['presentacion'];
$observaciones=$_POST['observaciones'];

$respuesta= Muestra::model()->RegistrarMuestra($idCliente,$nombre,$marca,$identificacion,$cant_muestra,$presentacion,$observaciones);


		header('Content-Type: application/json; charset="UTF-8"');
    	  Util::renderJSON(
    	  	array( 
    	  		'success' => $respuesta,
    	  		'idGenerado'=>Yii::app()->db->getLastInsertID('Muestra')
    	  		)
    	  	);
	}

	public function actionIndex()
	{
		if($this->verificarSessiousuario()==FALSE){
			$this->redirect("login.php");
		}else{
			$this->render("index");
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