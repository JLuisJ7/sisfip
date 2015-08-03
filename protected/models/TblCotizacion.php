<?php

/**
 * This is the model class for table "tbl_cotizacion".
 *
 * The followings are the available columns in table 'tbl_cotizacion':
 * @property string $idCotizacion
 * @property integer $idCliente
 * @property integer $idProducto
 * @property string $total
 * @property string $aprobado
 * @property string $estado
 */
class TblCotizacion extends CActiveRecord
{

public function obtenerCotizacion($idCotizacion){

	$sql = "select idCotizacion,cli.nombre as Cliente,prod.descProd as Producto,total,aprobado from tbl_cotizacion as cot inner join tbl_cliente as cli ON cli.idCliente=cot.idCliente inner join tbl_producto as prod ON prod.idProducto=cot.idProducto and idCotizacion=".$idCotizacion;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
}

public function ListarCotizaciones(){
$sql = "select idCotizacion,cli.nombre as Cliente,prod.descProd as Producto,total,aprobado from tbl_cotizacion as cot inner join tbl_cliente as cli ON cli.idCliente=cot.idCliente inner join tbl_producto as prod ON prod.idProducto=cot.idProducto";
	

		return Yii::app()->db->createCommand($sql)->queryAll();

}
public function RegistrarCotizacion($idCotizacion,$idCliente,$idProducto,$total){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		
		$Cotizacion=new TblCotizacion;
		$Cotizacion->idCotizacion=$idCotizacion;
		$Cotizacion->idCliente=$idCliente;
		$Cotizacion->idProducto=$idProducto;
		$Cotizacion->total=$total;
		

      		
if(!$Cotizacion->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');

}
			

		return $resultado;
	}


	public function ObtenerNroCotizacion(){

$sql = "select count(idCotizacion)+1 as nroCot from tbl_cotizacion";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_cotizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCliente, idProducto', 'numerical', 'integerOnly'=>true),
			array('total', 'length', 'max'=>8),
			array('aprobado, estado', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCotizacion, idCliente, idProducto, total, aprobado, estado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCotizacion' => 'Id Cotizacion',
			'idCliente' => 'Id Cliente',
			'idProducto' => 'Id Producto',
			'total' => 'Total',
			'aprobado' => 'Aprobado',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idCotizacion',$this->idCotizacion,true);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('idProducto',$this->idProducto);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('aprobado',$this->aprobado,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblCotizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
