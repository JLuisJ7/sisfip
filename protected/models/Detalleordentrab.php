<?php

/**
 * This is the model class for table "detalleordentrab".
 *
 * The followings are the available columns in table 'detalleordentrab':
 * @property string $nroOrden
 * @property integer $idServicio
 * @property string $resultado
 *
 * The followings are the available model relations:
 * @property Ordentrabajo $nroOrden0
 * @property Servicio $idServicio0
 */
class Detalleordentrab extends CActiveRecord
{

	public function registrarDetalleOrdenTrab($nroOrden,$idServicio){

		$resultado = array('valor'=>1,'message'=>'Su solicitud ha sido procesada correctamente.');

		
      		$Detalle=new Detalleordentrab;
      		$Detalle->nroOrden=$nroOrden;
      		$Detalle->idServicio=$idServicio;			
			

			$Detalle->save();

		return $resultado;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detalleordentrab';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idServicio', 'numerical', 'integerOnly'=>true),
			array('nroOrden', 'length', 'max'=>10),
			array('resultado', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroOrden, idServicio, resultado', 'safe', 'on'=>'search'),
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
			'nroOrden0' => array(self::BELONGS_TO, 'Ordentrabajo', 'nroOrden'),
			'idServicio0' => array(self::BELONGS_TO, 'Servicio', 'idServicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nroOrden' => 'Nro Orden',
			'idServicio' => 'Id Servicio',
			'resultado' => 'Resultado',
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
		$criteria->compare('idServicio',$this->idServicio);
		$criteria->compare('resultado',$this->resultado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detalleordentrab the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
