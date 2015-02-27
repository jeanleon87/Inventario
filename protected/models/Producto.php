<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $id
 * @property string $producto
 * @property string $descripcion
 * @property integer $subcategoria_id
 *
 * The followings are the available model relations:
 * @property Detalle[] $detalles
 * @property Subcategoria $subcategoria
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
			array('producto, subcategoria_id', 'required'),
			array('subcategoria_id', 'numerical', 'integerOnly'=>true),
			array('producto', 'length', 'max'=>100),
			array('descripcion', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, producto, descripcion, subcategoria_id', 'safe', 'on'=>'search'),
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
			'subcategoria' => array(self::BELONGS_TO, 'Subcategoria', 'subcategoria_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'producto' => 'Producto',
			'descripcion' => 'Descripcion',
			'subcategoria_id' => 'Subcategoria',
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
		$criteria->with=array('subcategoria','subcategoria.categoria');

		$criteria->compare('id',$this->id);
		$criteria->compare('producto',$this->producto,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('subcategoria.subcategoria',$this->subcategoria_id);		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,'pagination'=>false,
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
