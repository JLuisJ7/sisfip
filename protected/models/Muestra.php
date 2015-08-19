<?php

/**
 * This is the model class for table "muestra".
 *
 * The followings are the available columns in table 'muestra':
 * @property integer $idMuestra
 * @property integer $idCliente
 * @property string $nombre
 * @property string $marca
 * @property string $identificacion
 * @property integer $Cant_Muestra
 * @property string $estado
 * @property string $presentacion
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Cliente $idCliente0
 * @property Solicitud[] $solicituds
 */
class Muestra extends CActiveRecord
{

	public function ActualizarMuestra($idMuestra,$idCliente,$codigo,$nombre,$cant_muestra,$peso_volumen,$metodocliente,$presentacion,$observaciones){
		$resultado = array('valor'=>1,'message'=>'Servicio actualizado correctamente.');

		$muestra = Muestra::model()->findByPk($idMuestra);
$muestra->idMuestra=$idMuestra;
$muestra->idCliente=$idCliente;
$muestra->codigo=$codigo;
$muestra->nombre=$nombre;

$muestra->Cant_Muestra=$cant_muestra;
$muestra->peso_volumen=$peso_volumen;
$muestra->metodocliente=$metodocliente;
$muestra->presentacion=$presentacion;
$muestra->observaciones=$observaciones;

			
		
			if(!$muestra->save()){
				$resultado = array('valor'=>0, 'message'=>'No hemos podido Actualizar el Servicio');
			}
		

		return $resultado;
	}


	public function RegistrarMuestra($idCliente,$nombre,$marca,$identificacion,$cant_muestra,$presentacion,$observaciones){

		$resultado = array('valor'=>1,'message'=>'Servicio Registrado correctamente.');

		
$muestra=new Muestra;
$muestra->idCliente=$idCliente;
$muestra->nombre=$nombre;
$muestra->marca=$marca;
$muestra->identificacion=$identificacion;
$muestra->Cant_Muestra=$cant_muestra;
$muestra->presentacion=$presentacion;
$muestra->observaciones=$observaciones;

      		
if(!$muestra->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido Registrar el servicio, intentelo nuevamente');

}
			

		return $resultado;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'muestra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCliente, nombre', 'required'),
			array('idCliente, Cant_Muestra', 'numerical', 'integerOnly'=>true),
			array('nombre, marca, identificacion', 'length', 'max'=>45),
			array('estado', 'length', 'max'=>1),
			array('presentacion', 'length', 'max'=>100),
			array('observaciones', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idMuestra, idCliente, nombre, marca, identificacion, Cant_Muestra, estado, presentacion, observaciones', 'safe', 'on'=>'search'),
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
			'idCliente0' => array(self::BELONGS_TO, 'Cliente', 'idCliente'),
			'solicituds' => array(self::HAS_MANY, 'Solicitud', 'idMuestra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMuestra' => 'Id Muestra',
			'idCliente' => 'Id Cliente',
			'nombre' => 'Nombre',
			'marca' => 'Marca',
			'identificacion' => 'Identificacion',
			'Cant_Muestra' => 'Cant Muestra',
			'estado' => 'Estado',
			'presentacion' => 'Presentacion',
			'observaciones' => 'Observaciones',
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

		$criteria->compare('idMuestra',$this->idMuestra);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('identificacion',$this->identificacion,true);
		$criteria->compare('Cant_Muestra',$this->Cant_Muestra);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('presentacion',$this->presentacion,true);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Muestra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
