<?php

/**
 * This is the model class for table "solicitud".
 *
 * The followings are the available columns in table 'solicitud':
 * @property string $nroSolicitud
 * @property string $nroCotizacion
 * @property integer $idCliente
 * @property integer $idMuestra
 * @property string $fecha_registro
 * @property string $Ensayos
 * @property string $Inspeccion
 * @property string $muestreo
 * @property string $otros
 * @property string $total
 * @property string $fecha_entrega
 * @property string $Acreditacion
 * @property string $Contramuestras
 * @property string $observaciones
 * @property string $Estado
 * @property string $eliminado
 *
 * The followings are the available model relations:
 * @property Detallesolicitud[] $detallesolicituds
 * @property Ordentrabajo[] $ordentrabajos
 * @property Cotizacion $nroCotizacion0
 * @property Cliente $idCliente0
 * @property Muestra $idMuestra0
 */
class Solicitud extends CActiveRecord
{

public function obtenerPrintSolicitud($nroSolicitud){

		$sql = "select nroSolicitud,nroCotizacion,DATE_FORMAT(sol.fecha_registro,'%d-%m-%Y') as fecha_registro,cli.nombres as cliente,cli.doc_ident as documento,cli.direccion,cli.distrito,cli.provincia,cli.telefono,cli.referencia,Ensayos,Inspeccion,muestreo,sol.otros,m.nombre,m.marca,m.identificacion,m.cant_muestra,m.presentacion,m.observaciones as observaciones_m,m.metodocliente,sol.total,sol.acreditacion,sol.contramuestras,sol.observaciones as observaciones_sol,year(sol.fecha_entrega) as año,month(sol.fecha_entrega)as mes,day(sol.fecha_entrega) as dia from solicitud as sol inner join cliente as cli on cli.idCliente=sol.idCliente inner join cotizacion as cot on cot.idCotizacion=sol.nroCotizacion inner join muestra as m on m.idMuestra=sol.idMuestra
where nroSolicitud=".$nroSolicitud;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}


	public function obtenerSolicitudOT($nroSolicitud){

		$sql = "select nrosolicitud,sol.idCliente,nombre,sol.idMuestra,cant_muestra,peso_volumen,metodocliente,presentacion from solicitud as sol
inner join muestra as m ON m.idMuestra=sol.idMuestra
where nrosolicitud=".$nroSolicitud;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}

		public function listarSolicitudesAprobadas(){

		$sql = "select nroSolicitud,c.idcliente,c.nombres as cliente,m.nombre as muestra,DATE_FORMAT(s.fecha_registro,'%d-%m-%Y') as fecha_registro,DATE_FORMAT(fecha_entrega,'%d-%m-%Y') as fecha_entrega,total from solicitud as s inner join muestra as m on m.idMuestra=s.idMuestra inner join cliente as c on c.idCliente=s.idCliente where s.estado=1";	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}
	public function listarSolicitudesEstado($estado){

		$sql = "select nroSolicitud,c.idcliente,c.nombres as cliente,m.nombre as muestra,DATE_FORMAT(s.fecha_registro,'%d-%m-%Y') as fecha_registro,DATE_FORMAT(fecha_entrega,'%d-%m-%Y') as fecha_entrega,total from solicitud as s inner join muestra as m on m.idMuestra=s.idMuestra inner join cliente as c on c.idCliente=s.idCliente where s.estado=$estado";	

		return Yii::app()->db->createCommand($sql)->queryAll();
	
	}

public function actualizarEstadoSolicitud($idSolicitud,$estado){
		

		
		$command = Yii::app()->db->createCommand("update solicitud set Estado=$estado where nroSolicitud=$idSolicitud");
		return $command->execute();

			
			
		
	}

	public function registrarSolicitud($nroSolicitud,$nroCotizacion,$idCliente,$idMuestra,$Ensayos,$Inspeccion,$muestreo,$otros,$total,$fecha_entrega,$Acreditacion,$Contramuestras,$observaciones){

		$resultado = array('valor'=>1,'message'=>'Servicio Registrado correctamente.');

		
		$solicitud=new Solicitud;
$solicitud->nroSolicitud=$nroSolicitud;
$solicitud->nroCotizacion=$nroCotizacion;
$solicitud->idCliente=$idCliente;
$solicitud->idMuestra=$idMuestra;
$solicitud->Ensayos=$Ensayos;
$solicitud->Inspeccion=$Inspeccion;
$solicitud->muestreo=$muestreo;
$solicitud->otros=$otros;
$solicitud->total=$total;
$solicitud->fecha_entrega=$fecha_entrega;
$solicitud->Acreditacion=$Acreditacion;
$solicitud->Contramuestras=$Contramuestras;
$solicitud->observaciones=$observaciones;
      		
if(!$solicitud->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido Registrar el servicio, intentelo nuevamente');

}
			

		return $resultado;
	}

	public function ObtenerNroSolicitud(){

$sql = "select count(*)+1 as nroSolicitud,DATE_FORMAT(NOW(),'%d-%m-%Y') as fecha from Solicitud";
	


		return Yii::app()->db->createCommand($sql)->queryAll();
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitud';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroSolicitud, nroCotizacion, idCliente, idMuestra, fecha_entrega', 'required'),
			array('idCliente, idMuestra', 'numerical', 'integerOnly'=>true),
			array('nroSolicitud, nroCotizacion', 'length', 'max'=>10),
			array('Ensayos, Inspeccion, muestreo, Estado, eliminado', 'length', 'max'=>1),
			array('otros', 'length', 'max'=>200),
			array('total', 'length', 'max'=>8),
			array('Acreditacion, Contramuestras', 'length', 'max'=>2),
			array('observaciones', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroSolicitud, nroCotizacion, idCliente, idMuestra, fecha_registro, Ensayos, Inspeccion, muestreo, otros, total, fecha_entrega, Acreditacion, Contramuestras, observaciones, Estado, eliminado', 'safe', 'on'=>'search'),
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
			'detallesolicituds' => array(self::HAS_MANY, 'Detallesolicitud', 'nroSolicitud'),
			'ordentrabajos' => array(self::HAS_MANY, 'Ordentrabajo', 'nroSolicitud'),
			'nroCotizacion0' => array(self::BELONGS_TO, 'Cotizacion', 'nroCotizacion'),
			'idCliente0' => array(self::BELONGS_TO, 'Cliente', 'idCliente'),
			'idMuestra0' => array(self::BELONGS_TO, 'Muestra', 'idMuestra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nroSolicitud' => 'Nro Solicitud',
			'nroCotizacion' => 'Nro Cotizacion',
			'idCliente' => 'Id Cliente',
			'idMuestra' => 'Id Muestra',
			'fecha_registro' => 'Fecha Registro',
			'Ensayos' => 'Ensayos',
			'Inspeccion' => 'Inspeccion',
			'muestreo' => 'Muestreo',
			'otros' => 'Otros',
			'total' => 'Total',
			'fecha_entrega' => 'Fecha Entrega',
			'Acreditacion' => 'Acreditacion',
			'Contramuestras' => 'Contramuestras',
			'observaciones' => 'Observaciones',
			'Estado' => 'Estado',
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

		$criteria->compare('nroSolicitud',$this->nroSolicitud,true);
		$criteria->compare('nroCotizacion',$this->nroCotizacion,true);
		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('idMuestra',$this->idMuestra);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('Ensayos',$this->Ensayos,true);
		$criteria->compare('Inspeccion',$this->Inspeccion,true);
		$criteria->compare('muestreo',$this->muestreo,true);
		$criteria->compare('otros',$this->otros,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);
		$criteria->compare('Acreditacion',$this->Acreditacion,true);
		$criteria->compare('Contramuestras',$this->Contramuestras,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('Estado',$this->Estado,true);
		$criteria->compare('eliminado',$this->eliminado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solicitud the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
