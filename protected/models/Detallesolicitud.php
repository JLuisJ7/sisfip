<?php

/**
 * This is the model class for table "detallesolicitud".
 *
 * The followings are the available columns in table 'detallesolicitud':
 * @property integer $idServicio
 * @property string $nroSolicitud
 * @property string $acreditado
 * @property string $estado
 * @property string $precio
 *
 * The followings are the available model relations:
 * @property Servicio $idServicio0
 * @property Solicitud $nroSolicitud0
 */
class Detallesolicitud extends CActiveRecord
{

public function obtenerPrintDetalleSolicitud($nroSolicitud){

		$sql = "select serv.descripcion,serv.metodo,detsol.precio from detallesolicitud as detsol inner join servicio as serv ON serv.idServicio=detsol.idServicio where nroSolicitud=".$nroSolicitud;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}
	
public function obtenerDetalleSolicitudOT($nroSolicitud){

		$sql = "select ds.idServicio,serv.descripcion,serv.metodo from detallesolicitud ds inner join servicio as serv ON serv.idServicio=ds.idServicio where nroSolicitud=".$nroSolicitud;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}
	public function registrarDetalleSolicitud($idServicio,$nroSolicitud,$Acreditado,$Precio){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		
      		$Detalle=new Detallesolicitud;
      		$Detalle->idServicio=$idServicio;			
			$Detalle->nroSolicitud=$nroSolicitud;
			$Detalle->acreditado=$Acreditado;			
			$Detalle->precio=$Precio;
			

			$Detalle->save();

		return $resultado;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detallesolicitud';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idServicio, nroSolicitud', 'required'),
			array('idServicio', 'numerical', 'integerOnly'=>true),
			array('nroSolicitud', 'length', 'max'=>10),
			array('acreditado', 'length', 'max'=>2),
			array('estado', 'length', 'max'=>1),
			array('precio', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idServicio, nroSolicitud, acreditado, estado, precio', 'safe', 'on'=>'search'),
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
			'idServicio0' => array(self::BELONGS_TO, 'Servicio', 'idServicio'),
			'nroSolicitud0' => array(self::BELONGS_TO, 'Solicitud', 'nroSolicitud'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idServicio' => 'Id Servicio',
			'nroSolicitud' => 'Nro Solicitud',
			'acreditado' => 'Acreditado',
			'estado' => 'Estado',
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
		$criteria->compare('nroSolicitud',$this->nroSolicitud,true);
		$criteria->compare('acreditado',$this->acreditado,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('precio',$this->precio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detallesolicitud the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
