<?php

/**
 * This is the model class for table "tbl_servicio".
 *
 * The followings are the available columns in table 'tbl_servicio':
 * @property integer $idServicio
 * @property integer $idProducto
 * @property string $descServ
 * @property string $metodo
 * @property integer $stock
 * @property string $precio
 *
 * The followings are the available model relations:
 * @property TblProducto $idProducto0
 */
class TblServicio extends CActiveRecord
{

public function ListarServicios(){
$sql = "select idServicio,prod.descProd as Producto,descServ as Servicio,metodo,stock,precio from tbl_servicio as serv inner join tbl_producto as prod ON prod.idProducto=serv.idProducto";
	

		return Yii::app()->db->createCommand($sql)->queryAll();

}
public function RegistrarServicio($idProducto,$descServ,$metodo,$stock,$precio){

	$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		
		$servicio=new TblServicio;
		$servicio->idProducto=$idProducto;
$servicio->descServ=$descServ;
$servicio->metodo=$metodo;
$servicio->stock=$stock;
$servicio->precio=$precio;
		
		

      		
if(!$servicio->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido realizar su solicitud, intentelo nuevamente');

}

		return $resultado;
	}


	public function listarServicio($idProducto){


		$sql = "SELECT * FROM tbl_Servicio where idProducto=".$idProducto;
	

		return $this->findAllBySql($sql);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProducto, stock', 'numerical', 'integerOnly'=>true),
			array('descServ, metodo', 'length', 'max'=>30),
			array('precio', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idServicio, idProducto, descServ, metodo, stock, precio', 'safe', 'on'=>'search'),
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
			'idProducto0' => array(self::BELONGS_TO, 'TblProducto', 'idProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idServicio' => 'Id Servicio',
			'idProducto' => 'Id Producto',
			'descServ' => 'Desc Serv',
			'metodo' => 'Metodo',
			'stock' => 'Stock',
			'precio' => 'Precio',
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

		$criteria->compare('idServicio',$this->idServicio);
		$criteria->compare('idProducto',$this->idProducto);
		$criteria->compare('descServ',$this->descServ,true);
		$criteria->compare('metodo',$this->metodo,true);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('precio',$this->precio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblServicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
