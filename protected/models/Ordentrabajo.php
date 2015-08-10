<?php

/**
 * This is the model class for table "ordentrabajo".
 *
 * The followings are the available columns in table 'ordentrabajo':
 * @property string $nroOrden
 * @property string $nroSolicitud
 * @property string $fecha_emision
 * @property string $laboratorio
 * @property integer $idMuestra
 * @property string $codMuestra
 * @property string $observaciones
 * @property string $fecha_entrega
 * @property integer $codPersonal
 *
 * The followings are the available model relations:
 * @property Detalleordentrab[] $detalleordentrabs
 * @property Muestra $idMuestra0
 * @property Solicitud $nroSolicitud0
 */
class Ordentrabajo extends CActiveRecord
{

	public function obtenerNroOrdenT(){

$sql = "select count(*)+1 as nroOrden,DATE_FORMAT(NOW(),'%d-%m-%Y') as fecha from ordentrabajo";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordentrabajo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_emision, idMuestra', 'required'),
			array('idMuestra, codPersonal', 'numerical', 'integerOnly'=>true),
			array('nroSolicitud', 'length', 'max'=>10),
			array('laboratorio', 'length', 'max'=>50),
			array('codMuestra', 'length', 'max'=>5),
			array('observaciones', 'length', 'max'=>200),
			array('fecha_entrega', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroOrden, nroSolicitud, fecha_emision, laboratorio, idMuestra, codMuestra, observaciones, fecha_entrega, codPersonal', 'safe', 'on'=>'search'),
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
			'detalleordentrabs' => array(self::HAS_MANY, 'Detalleordentrab', 'nroOrden'),
			'idMuestra0' => array(self::BELONGS_TO, 'Muestra', 'idMuestra'),
			'nroSolicitud0' => array(self::BELONGS_TO, 'Solicitud', 'nroSolicitud'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nroOrden' => 'Nro Orden',
			'nroSolicitud' => 'Nro Solicitud',
			'fecha_emision' => 'Fecha Emision',
			'laboratorio' => 'Laboratorio',
			'idMuestra' => 'Id Muestra',
			'codMuestra' => 'Cod Muestra',
			'observaciones' => 'Observaciones',
			'fecha_entrega' => 'Fecha Entrega',
			'codPersonal' => 'Cod Personal',
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

		$criteria->compare('nroOrden',$this->nroOrden,true);
		$criteria->compare('nroSolicitud',$this->nroSolicitud,true);
		$criteria->compare('fecha_emision',$this->fecha_emision,true);
		$criteria->compare('laboratorio',$this->laboratorio,true);
		$criteria->compare('idMuestra',$this->idMuestra);
		$criteria->compare('codMuestra',$this->codMuestra,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('codPersonal',$this->codPersonal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ordentrabajo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
