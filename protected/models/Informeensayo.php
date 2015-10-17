<?php

/**
 * This is the model class for table "informeensayo".
 *
 * The followings are the available columns in table 'informeensayo':
 * @property string $nroInforme
 * @property string $codInforme
 * @property string $nroReporte
 * @property string $nroOrden
 * @property string $nroSolicitud
 * @property integer $idCliente
 * @property integer $idMuestra
 * @property string $fecha_inicio
 * @property string $fecha_termino
 * @property string $observaciones
 * @property string $estado
 * @property string $eliminado
 * @property string $fecha_registro
 *
 * The followings are the available model relations:
 * @property Cliente $idCliente0
 * @property Muestra $idMuestra0
 * @property Ordentrabajo $nroOrden0
 * @property Reporteensayo $nroReporte0
 * @property Solicitud $nroSolicitud0
 */
class Informeensayo extends CActiveRecord
{
	public function obtenerNroReporteE(){

$sql = "select count(*)+1 as nroReporte,DATE_FORMAT(NOW(),'%d-%m-%Y') as fecha from Reporteensayo";
	


	return Yii::app()->db->createCommand($sql)->queryAll();
}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'informeensayo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroInforme', 'required'),
			array('idCliente, idMuestra', 'numerical', 'integerOnly'=>true),
			array('nroInforme, nroReporte, nroOrden, nroSolicitud', 'length', 'max'=>10),
			array('codInforme', 'length', 'max'=>100),
			array('observaciones', 'length', 'max'=>255),
			array('estado, eliminado', 'length', 'max'=>1),
			array('fecha_inicio, fecha_termino', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroInforme, codInforme, nroReporte, nroOrden, nroSolicitud, idCliente, idMuestra, fecha_inicio, fecha_termino, observaciones, estado, eliminado, fecha_registro', 'safe', 'on'=>'search'),
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
			'idMuestra0' => array(self::BELONGS_TO, 'Muestra', 'idMuestra'),
			'nroOrden0' => array(self::BELONGS_TO, 'Ordentrabajo', 'nroOrden'),
			'nroReporte0' => array(self::BELONGS_TO, 'Reporteensayo', 'nroReporte'),
			'nroSolicitud0' => array(self::BELONGS_TO, 'Solicitud', 'nroSolicitud'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nroInforme' => 'Nro Informe',
			'codInforme' => 'Cod Informe',
			'nroReporte' => 'Nro Reporte',
			'nroOrden' => 'Nro Orden',
			'nroSolicitud' => 'Nro Solicitud',
			'idCliente' => 'Id Cliente',
			'idMuestra' => 'Id Muestra',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_termino' => 'Fecha Termino',
			'observaciones' => 'Observaciones',
			'estado' => 'Estado',
			'eliminado' => 'Eliminado',
			'fecha_registro' => 'Fecha Registro',
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

		$criteria->compare('nroInforme',$this->nroInforme,true);
		$criteria->compare('codInforme',$this->codInforme,true);
		$criteria->compare('nroReporte',$this->nroReporte,true);
		$criteria->compare('nroOrden',$this->nroOrden,true);
		$criteria->compare('nroSolicitud',$this->nroSolicitud,true);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('idMuestra',$this->idMuestra);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_termino',$this->fecha_termino,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('eliminado',$this->eliminado,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Informeensayo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
