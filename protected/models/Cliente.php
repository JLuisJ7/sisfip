<?php

/**
 * This is the model class for table "cliente".
 *
 * The followings are the available columns in table 'cliente':
 * @property integer $idCliente
 * @property string $nombres
 * @property string $doc_ident
 * @property string $atencion_a
 * @property string $direccion
 * @property string $telefono
 * @property string $correo
 * @property string $referencia
 * @property string $fecha_registro
 * @property string $estado
 * @property string $distrito
 *
 * The followings are the available model relations:
 * @property Cotizacion[] $cotizacions
 * @property Muestra[] $muestras
 */
class Cliente extends CActiveRecord
{

public function consultarClientexDoc($doc_ident){

		$sql = "select * from Cliente where doc_ident='".$doc_ident."'";
			

if($c>0){
return $this->findAllBySql($sql);
}else{
	return 0;
}
}

public function RegistrarCliente($nombres,$doc_ident,$atencion_a,$direccion,$telefono,$correo,$referencia){

		$resultado = array('valor'=>1,'message'=>'Servicio Registrado correctamente.');

		
		$cliente=new Cliente;
$cliente->nombres=$nombres;
$cliente->doc_ident=$doc_ident;
$cliente->atencion_a=$atencion_a;
$cliente->direccion=$direccion;
$cliente->telefono=$telefono;
$cliente->correo=$correo;
$cliente->referencia=$referencia;

      		
if(!$cliente->save()){
	
	$resultado = array('valor'=>0, 'message'=>'No hemos podido Registrar el servicio, intentelo nuevamente');

}
			

		return $resultado;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombres, doc_ident', 'required'),
			array('nombres, atencion_a', 'length', 'max'=>45),
			array('doc_ident, telefono', 'length', 'max'=>12),
			array('direccion', 'length', 'max'=>50),
			array('correo', 'length', 'max'=>25),
			array('referencia', 'length', 'max'=>200),
			array('estado', 'length', 'max'=>1),
			array('distrito', 'length', 'max'=>20),
			array('fecha_registro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCliente, nombres, doc_ident, atencion_a, direccion, telefono, correo, referencia, fecha_registro, estado, distrito', 'safe', 'on'=>'search'),
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
			'cotizacions' => array(self::HAS_MANY, 'Cotizacion', 'idCliente'),
			'muestras' => array(self::HAS_MANY, 'Muestra', 'idCliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCliente' => 'Id Cliente',
			'nombres' => 'Nombres',
			'doc_ident' => 'Doc Ident',
			'atencion_a' => 'Atencion A',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'correo' => 'Correo',
			'referencia' => 'Referencia',
			'fecha_registro' => 'Fecha Registro',
			'estado' => 'Estado',
			'distrito' => 'Distrito',
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

		$criteria->compare('idCliente',$this->idCliente);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('doc_ident',$this->doc_ident,true);
		$criteria->compare('atencion_a',$this->atencion_a,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('distrito',$this->distrito,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
