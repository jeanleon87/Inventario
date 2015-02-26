<?php

/**
 * This is the model class for table "detalle".
 *
 * The followings are the available columns in table 'detalle':
 * @property integer $id
 * @property string $fecha
 * @property double $precio
 * @property integer $cantidad
 * @property integer $exento
 * @property string $comentario
 * @property integer $producto_id
 * @property integer $transaccion_id
 *
 * The followings are the available model relations:
 * @property Producto $producto
 * @property Transaccion $transaccion
 */
class Detalle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	 
	public $fechaString;
	
	public function tableName()
	{
		return 'detalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('precio, cantidad, producto_id, transaccion_id', 'required'),
			array('cantidad, exento, producto_id, transaccion_id', 'numerical', 'integerOnly'=>true),
			array('precio', 'numerical'),
			array('fecha', 'length', 'max'=>20),
			array('comentario', 'length', 'max'=>255),			
			array('fechaString','convertir_fecha'),  // <---AQUI
			array('fecha, fechaString', 'required'),  // <--- AQUI
			array('fechaString', 'length', 'max'=>20),  // <--- Y AQUI
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha, precio, cantidad, exento, comentario, producto_id, transaccion_id', 'safe', 'on'=>'search'),
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
			'producto' => array(self::BELONGS_TO, 'Producto', 'producto_id'),
			'transaccion' => array(self::BELONGS_TO, 'Transaccion', 'transaccion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha' => 'Fecha',
			'precio' => 'Precio',
			'cantidad' => 'Cantidad',
			'exento' => 'Exento',
			'comentario' => 'Comentario',
			'producto_id' => 'Producto',
			'transaccion_id' => 'Transaccion',
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
		$criteria->with=array('producto');

		$criteria->compare('id',$this->id);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('exento',$this->exento);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('producto.producto',$this->producto_id);
		$criteria->compare('transaccion_id',$this->transaccion_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Detalle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function convertir_fecha($attr, $params){
		$this->fecha = CDateTimeParser::parse($this->fechaString,'dd/MM/yyyy');
        if($this->fecha == null)
        	$this->addError('fecha','La fecha es requerida.');
	}
	
	public function getTotal() {
        $total = 0;
		
		$criteria=new CDbCriteria;
		$criteria->with=array('producto');
		$criteria->condition = "producto.id=".$this->producto_id;
		$records = Detalle::model()->findAll($criteria);
		
        foreach ($records as $record) {
            $total += $record->cantidad;
			
        }
        return $total;
    }
	public function getColor($id){
		$statuscolor='green';
		if($id==1){
			if($this->getTotal()<=0){
				$statuscolor='red';
			}			
		}
		if($id==2){
			if($this->cantidad<=0 && $this->transaccion_id==2){
				$statuscolor='red';
			}
			if($this->cantidad==0 && $this->transaccion_id==3){
				$statuscolor='grey';
			}
		}		
		return $statuscolor;
	}
}
