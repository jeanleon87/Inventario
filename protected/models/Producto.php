<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $id
 * @property string $producto
 * @property string $descripcion
 * @property integer $estado_id
 * @property integer $categoria_id
 *
 * The followings are the available model relations:
 * @property Detalle[] $detalles
 * @property Estado $estado
 * @property Categoria $categoria
 */
class Producto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('producto, estado_id, categoria_id', 'required'),
			array('estado_id, categoria_id', 'numerical', 'integerOnly'=>true),
			array('producto', 'length', 'max'=>100),
			array('descripcion', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, producto, descripcion, estado_id, categoria_id', 'safe', 'on'=>'search'),
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
			'detalles' => array(self::HAS_MANY, 'Detalle', 'producto_id'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'estado_id'),
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'categoria_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'id',
			'producto' => 'producto',
			'descripcion' => 'descripcion',
			'estado_id' => 'estado',
			'categoria_id' => 'categoria',
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
		$criteria->with=array('estado','categoria');
		$criteria->compare('id',$this->id);
		$criteria->compare('producto',$this->producto,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estado.estado',$this->estado_id);
		$criteria->compare('categoria.categoria',$this->categoria_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Producto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
