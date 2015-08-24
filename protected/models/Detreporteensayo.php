<?php

/**
 * This is the model class for table "detreporteensayo".
 *
 * The followings are the available columns in table 'detreporteensayo':
 * @property string $nroEnsayo
 * @property integer $idServicio
 * @property integer $analista
 * @property string $resultado
 *
 * The followings are the available model relations:
 * @property Reporteensayo $nroEnsayo0
 * @property Servicio $idServicio0
 */
class Detreporteensayo extends CActiveRecord
{
	public function registrarRegistrarDetalleReporte($nroReporte,$idServicio,$resultado){

		$respuesta = array('valor'=>1,'message'=>'Su DEtalle ha sido procesada correctamente.');

		
      		$Detalle=new Detreporteensayo;
      		$Detalle->nroEnsayo=$nroReporte;
      		$Detalle->idServicio=$idServicio;	
      		$Detalle->resultado=$resultado;			
			

			
			if(!$Detalle->save()){
	
		$respuesta = array('valor'=>1,'message'=>'Su DEtalle ha sido procesada correctamente.');

}

		return $respuesta;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detreporteensayo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nroEnsayo', 'required'),
			array('idServicio, analista', 'numerical', 'integerOnly'=>true),
			array('nroEnsayo', 'length', 'max'=>10),
			array('resultado', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nroEnsayo, idServicio, analista, resultado', 'safe', 'on'=>'search'),
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
			'nroEnsayo0' => array(self::BELONGS_TO, 'Reporteensayo', 'nroEnsayo'),
			'idServicio0' => array(self::BELONGS_TO, 'Servicio', 'idServicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nroEnsayo' => 'Nro Ensayo',
			'idServicio' => 'Id Servicio',
			'analista' => 'Analista',
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

		$criteria->compare('nroEnsayo',$this->nroEnsayo,true);
		$criteria->compare('idServicio',$this->idServicio);
		$criteria->compare('analista',$this->analista);
		$criteria->compare('resultado',$this->resultado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detreporteensayo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
