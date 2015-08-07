<?php

/**
 * This is the model class for table "detallecotizacion".
 *
 * The followings are the available columns in table 'detallecotizacion':
 * @property integer $idServicio
 * @property string $idCotizacion
 * @property string $Muestra
 * @property string $recomendado
 * @property string $acreditado
 * @property string $estado
 * @property string $precio
 *
 * The followings are the available model relations:
 * @property Cotizacion $idCotizacion0
 * @property Servicio $idServicio0
 */
class Detallecotizacion extends CActiveRecord
{
	public function obtenerDetalleCotizacion($NroCotizacion){

		$sql = "select  detc.idServicio as id,serv.descripcion,serv.metodo,serv.tiempo_entrega,serv.cantM_X_ensayo,detc.precio,detc.acreditado,detc.estado from detallecotizacion as detc inner join servicio as serv ON serv.idServicio=detc.idServicio where idCotizacion=".$NroCotizacion;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}

	public function obtenerDetalleCotizacionImprimir($NroCotizacion){

		$sql = "select serv.descripcion,serv.metodo,detc.precio from detallecotizacion as detc
inner join servicio as serv ON serv.idServicio=detc.idServicio
where idCotizacion=".$NroCotizacion;
	

		return Yii::app()->db->createCommand($sql)->queryAll();
	}

	public function registrarDetalleCotizacion($idCotizacion,$idServicio,$Precio,$muestra,$Acreditado){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		



      		$Detalle=new Detallecotizacion;
      		$Detalle->idCotizacion=$idCotizacion;			
			$Detalle->idServicio=$idServicio;
			$Detalle->Muestra=$muestra;
			$Detalle->precio=$Precio;
			$Detalle->acreditado=$Acreditado;

			$Detalle->save();

		return $resultado;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detallecotizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idServicio', 'required'),
			array('idServicio', 'numerical', 'integerOnly'=>true),
			array('idCotizacion', 'length', 'max'=>11),
			array('Muestra', 'length', 'max'=>30),
			array('recomendado, estado', 'length', 'max'=>1),
			array('acreditado', 'length', 'max'=>2),
			array('precio', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idServicio, idCotizacion, Muestra, recomendado, acreditado, estado, precio', 'safe', 'on'=>'search'),
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
			'idCotizacion0' => array(self::BELONGS_TO, 'Cotizacion', 'idCotizacion'),
			'idServicio0' => array(self::BELONGS_TO, 'Servicio', 'idServicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idServicio' => 'Id Servicio',
			'idCotizacion' => 'Id Cotizacion',
			'Muestra' => 'Muestra',
			'recomendado' => 'Recomendado',
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
		$criteria->compare('idCotizacion',$this->idCotizacion,true);
		$criteria->compare('Muestra',$this->Muestra,true);
		$criteria->compare('recomendado',$this->recomendado,true);
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
	 * @return Detallecotizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
