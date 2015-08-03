<?php

/**
 * This is the model class for table "servicio".
 *
 * The followings are the available columns in table 'servicio':
 * @property integer $idServicio
 * @property string $descripcion
 * @property string $metodo
 * @property integer $tiempo_entrega
 * @property integer $cantM_x_ensayo
 * @property string $tarifa
 * @property string $tarifa_Acred
 * @property string $detalle
 * @property string $fecha_registro
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Detallecotizacion[] $detallecotizacions
 */
class Servicio extends CActiveRecord
{
	public function eliminarServicio($idServicio){
		$resultado = array('valor'=>1,'message'=>'Servicio actualizado correctamente.');

		$servicio = servicio::model()->findByPk($idServicio);

		$servicio->idServicio=$idServicio;
		$servicio->estado=1;

			
			
		
			if(!$servicio->save()){
				$resultado = array('valor'=>0, 'message'=>'No hemos podido Actualizar el Servicio');
			}
		

		return $resultado;
	}

	public function actualizarServicio($idServicio,$descripcion,$metodo,$tiempo_entrega,$cantM_x_ensayo,$tarifa,$tarifa_Acred,$detalle){
		$resultado = array('valor'=>1,'message'=>'Servicio actualizado correctamente.');

		$servicio = servicio::model()->findByPk($idServicio);

$servicio->idServicio=$idServicio;
$servicio->descripcion=$descripcion;
$servicio->metodo=$metodo;
$servicio->tiempo_entrega=$tiempo_entrega;
$servicio->cantM_x_ensayo=$cantM_x_ensayo;
$servicio->tarifa=$tarifa;
$servicio->tarifa_Acred=$tarifa_Acred;
$servicio->detalle=$detalle;		
			
			
		
			if(!$servicio->save()){
				$resultado = array('valor'=>0, 'message'=>'No hemos podido Actualizar el Servicio');
			}
		

		return $resultado;
	}

public function ObtenerServicio($idServicio){

		$sql = "select * from Servicio where idServicio=".$idServicio;	

		return $this->findAllBySql($sql);

}
public function registrarServicio($descripcion,$metodo,$tiempo_entrega,$cantM_x_ensayo,$tarifa,$tarifa_Acred,$detalle){

		$resultado = array('valor'=>1,'message'=>'Servicio Registrado correctamente.');

		
		$servicio=new Servicio;
$servicio->descripcion=$descripcion;
$servicio->metodo=$metodo;
$servicio->tiempo_entrega=$tiempo_entrega;
$servicio->cantM_x_ensayo=$cantM_x_ensayo;
$servicio->tarifa=$tarifa;
$servicio->tarifa_Acred=$tarifa_Acred;
$servicio->detalle=$detalle;

      		
if(!$servicio->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido Registrar el servicio, intentelo nuevamente');

}
			

		return $resultado;
	}

	
	public function listarServicios(){

		$sql = "select * from Servicio where estado=0";	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}

	public function listarServicios_S(){

		$sql = "select idServicio,descripcion,metodo from Servicio where estado=0";	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tiempo_entrega, cantM_x_ensayo', 'numerical', 'integerOnly'=>true),
			array('descripcion, metodo', 'length', 'max'=>45),
			array('tarifa, tarifa_Acred', 'length', 'max'=>8),
			array('detalle', 'length', 'max'=>200),
			array('estado', 'length', 'max'=>1),
			array('fecha_registro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idServicio, descripcion, metodo, tiempo_entrega, cantM_x_ensayo, tarifa, tarifa_Acred, detalle, fecha_registro, estado', 'safe', 'on'=>'search'),
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
			'detallecotizacions' => array(self::HAS_MANY, 'Detallecotizacion', 'idServicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idServicio' => 'Id Servicio',
			'descripcion' => 'Descripcion',
			'metodo' => 'Metodo',
			'tiempo_entrega' => 'Tiempo Entrega',
			'cantM_x_ensayo' => 'Cant M X Ensayo',
			'tarifa' => 'Tarifa',
			'tarifa_Acred' => 'Tarifa Acred',
			'detalle' => 'Detalle',
			'fecha_registro' => 'Fecha Registro',
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

		$criteria->compare('idServicio',$this->idServicio);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('metodo',$this->metodo,true);
		$criteria->compare('tiempo_entrega',$this->tiempo_entrega);
		$criteria->compare('cantM_x_ensayo',$this->cantM_x_ensayo);
		$criteria->compare('tarifa',$this->tarifa,true);
		$criteria->compare('tarifa_Acred',$this->tarifa_Acred,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Servicio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
