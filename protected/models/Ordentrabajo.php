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
 * @property string $fecha_registro
 * @property string $estado
 * @property string $eliminado
 *
 * The followings are the available model relations:
 * @property Detalleordentrab[] $detalleordentrabs
 * @property Muestra $idMuestra0
 * @property Solicitud $nroSolicitud0
 */
class Ordentrabajo extends CActiveRecord
{

public function obtenerPrintOrden($nroOrden){

		$sql = "select nroOrden,DATE_FORMAT(o.fecha_registro,'%d-%m-%Y') as fecha_emision,laboratorio,m.nombre,m.codigo,m.cant_muestra,m.peso_volumen,m.presentacion,m.metodocliente,m.observaciones as observacion_m,o.observaciones as observaciones_o,year(o.fecha_entrega) as año,month(o.fecha_entrega)as mes,day(o.fecha_entrega) as dia from ordentrabajo as o inner join muestra as m on m.idMuestra=o.idMuestra where nroOrden=".$nroOrden;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}


public function obtenerOrdenAnalista($NroOrdenTrabajo){

		$sql = "select nroOrden,laboratorio,o.idMuestra,codMuestra as codigo,m.nombre as muestra from ordentrabajo as o inner join muestra as m on m.idMuestra=o.idMuestra  where nroOrden=".$NroOrdenTrabajo;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}


	public function ListarOrdenesAnalista(){

		$sql = "select nroOrden as nroOrden,DATE_FORMAT(fecha_registro,'%d-%m-%Y') as fecha,nombre as Muestra,codMuestra as Codigo,laboratorio,o.estado from ordentrabajo as o inner join muestra as m on m.idMuestra=o.idMuestra where o.estado=1;";	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}

	public function ListarOrdenesdtecnico(){

		$sql = "select nroOrden as nroOrden,DATE_FORMAT(fecha_registro,'%d-%m-%Y') as fecha,nombre as Muestra,codMuestra as Codigo,laboratorio,o.estado from ordentrabajo as o inner join muestra as m on m.idMuestra=o.idMuestra where o.estado=0;";	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}


		public function registrarOrdenTrabajo($nroOrden,$nroSolicitud,$fecha_emision,$laboratorio,$idMuestra,$codMuestra,$observaciones,$fecha_entrega,$codPersonal){

		$resultado = array('valor'=>1,'message'=>'Orden Registrado correctamente.');

		
		$orden=new Ordentrabajo;

$orden->nroOrden=$nroOrden;
$orden->nroSolicitud=$nroSolicitud;
$orden->fecha_emision=$fecha_emision;
$orden->laboratorio=$laboratorio;
$orden->idMuestra=$idMuestra;
$orden->codMuestra=$codMuestra;
$orden->observaciones=$observaciones;
$orden->fecha_entrega=$fecha_entrega;
$orden->codPersonal=$codPersonal;
      		
if(!$orden->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido Registrar la orden, intentelo nuevamente');

}
			

		return $resultado;
	}

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
			array('idMuestra', 'required'),
			array('idMuestra, codPersonal', 'numerical', 'integerOnly'=>true),
			array('nroOrden, nroSolicitud', 'length', 'max'=>10),
			array('laboratorio', 'length', 'max'=>50),
			array('codMuestra', 'length', 'max'=>5),
			array('observaciones', 'length', 'max'=>200),
			array('estado, eliminado', 'length', 'max'=>1),
			array('fecha_emision, fecha_entrega, fecha_registro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroOrden, nroSolicitud, fecha_emision, laboratorio, idMuestra, codMuestra, observaciones, fecha_entrega, codPersonal, fecha_registro, estado, eliminado', 'safe', 'on'=>'search'),
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
			'fecha_registro' => 'Fecha Registro',
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

		$criteria->compare('nroOrden',$this->nroOrden,true);
		$criteria->compare('nroSolicitud',$this->nroSolicitud,true);
		$criteria->compare('fecha_emision',$this->fecha_emision,true);
		$criteria->compare('laboratorio',$this->laboratorio,true);
		$criteria->compare('idMuestra',$this->idMuestra);
		$criteria->compare('codMuestra',$this->codMuestra,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('codPersonal',$this->codPersonal);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
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
	 * @return Ordentrabajo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
