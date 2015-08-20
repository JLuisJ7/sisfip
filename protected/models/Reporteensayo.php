<?php

/**
 * This is the model class for table "reporteensayo".
 *
 * The followings are the available columns in table 'reporteensayo':
 * @property string $nroEnsayo
 * @property string $nroOrden
 * @property integer $idMuestra
 * @property string $fecha_emision
 * @property string $fecha_registro
 * @property string $laboratorio
 * @property string $observaciones
 * @property string $fecha_entrega
 * @property string $hora_entrega
 * @property string $estado
 * @property string $eliminado
 *
 * The followings are the available model relations:
 * @property Detreporteensayo[] $detreporteensayos
 * @property Muestra $idMuestra0
 * @property Ordentrabajo $nroOrden0
 */
class Reporteensayo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reporteensayo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroEnsayo, nroOrden, fecha_registro', 'required'),
			array('idMuestra', 'numerical', 'integerOnly'=>true),
			array('nroEnsayo, nroOrden', 'length', 'max'=>10),
			array('laboratorio', 'length', 'max'=>50),
			array('observaciones', 'length', 'max'=>255),
			array('estado, eliminado', 'length', 'max'=>1),
			array('fecha_emision, fecha_entrega, hora_entrega', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroEnsayo, nroOrden, idMuestra, fecha_emision, fecha_registro, laboratorio, observaciones, fecha_entrega, hora_entrega, estado, eliminado', 'safe', 'on'=>'search'),
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
			'detreporteensayos' => array(self::HAS_MANY, 'Detreporteensayo', 'nroEnsayo'),
			'idMuestra0' => array(self::BELONGS_TO, 'Muestra', 'idMuestra'),
			'nroOrden0' => array(self::BELONGS_TO, 'Ordentrabajo', 'nroOrden'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nroEnsayo' => 'Nro Ensayo',
			'nroOrden' => 'Nro Orden',
			'idMuestra' => 'Id Muestra',
			'fecha_emision' => 'Fecha Emision',
			'fecha_registro' => 'Fecha Registro',
			'laboratorio' => 'Laboratorio',
			'observaciones' => 'Observaciones',
			'fecha_entrega' => 'Fecha Entrega',
			'hora_entrega' => 'Hora Entrega',
			'estado' => 'Estado',
			'eliminado' => 'Eliminado',
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

		$criteria->compare('nroEnsayo',$this->nroEnsayo,true);
		$criteria->compare('nroOrden',$this->nroOrden,true);
		$criteria->compare('idMuestra',$this->idMuestra);
		$criteria->compare('fecha_emision',$this->fecha_emision,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('laboratorio',$this->laboratorio,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('hora_entrega',$this->hora_entrega,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('eliminado',$this->eliminado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reporteensayo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
