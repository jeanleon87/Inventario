<?php

/**
 * This is the model class for table "subcategoria".
 *
 * The followings are the available columns in table 'subcategoria':
 * @property integer $id
 * @property string $subcategoria
 * @property integer $categoria_id
 *
 * The followings are the available model relations:
 * @property Producto[] $productos
 * @property Categoria $categoria
 */
class Subcategoria extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'subcategoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subcategoria', 'required','message'=>'Por favor ingrese un nombre para la subcategoria'),
			array('categoria_id', 'required','message'=>'Por favor seleccione una categoria'),
			array('categoria_id', 'numerical', 'integerOnly'=>true),
			array('subcategoria', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subcategoria, categoria.categoria', 'safe', 'on'=>'search'),
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
			'productos' => array(self::HAS_MANY, 'Producto', 'subcategoria_id'),
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'categoria_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subcategoria' => 'Subcategoria',
			'categoria_id' => 'Categoria',
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
		$criteria->with=array('categoria');		
		$criteria->compare('id',$this->id);
		$criteria->compare('subcategoria',$this->subcategoria,true);
		$criteria->compare('categoria.categoria',$this->categoria_id,true);		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subcategoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
