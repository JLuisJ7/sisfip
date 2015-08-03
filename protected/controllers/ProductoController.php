<?php

class ProductoController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAjaxListarProductos(){
		
		$productos = Producto::model()->listarProductos();

		Util::renderJSON($productos);
	}

	

}