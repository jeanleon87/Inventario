<?php

class DetalleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		$total = 0;
		
		
		$criteria=new CDbCriteria;
		$criteria->with=array('producto');
		$criteria->condition = "producto.id=".$model->producto_id;
		$records = Detalle::model()->findAll($criteria);
		
		foreach ($records as $record) {
            $total += $record->cantidad;			
        }
		
		$dataProvider=new CActiveDataProvider('Detalle',array('criteria'=>$criteria));
		
		//$model=new Categoria('search');
		//$model->unsetAttributes();
		
		$this->render('view',array('dataProvider'=>$dataProvider,'model'=>$model,'total'=>$total,'model'=>$model));
				
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$oldmodel=$this->loadModel($id);
		$model=new Detalle;
		$model->producto_id=$oldmodel->producto_id;
		$model->transaccion_id=1;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Detalle']))
		{
			$model->attributes=$_POST['Detalle'];
			if($model->transaccion_id==2){
				$model->cantidad=$model->cantidad*-1;
			}
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		/*
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$model->fechaString = Yii::app()->format->formatDate($model->fecha);
		
		if(isset($_POST['Detalle']))
		{
			$model->attributes=$_POST['Detalle'];
			if($model->transaccion_id==2){
				$model->cantidad=$model->cantidad*-1;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));*/
		
		$oldmodel=$this->loadModel($id);
		$model=new Detalle;
		$model->producto_id=$oldmodel->producto_id;
		$model->transaccion_id=2;
		$model->precio=0;		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Detalle']))
		{
			$model->attributes=$_POST['Detalle'];
			if($model->transaccion_id==2){
				$model->cantidad=$model->cantidad*-1;
			}
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Detalle');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Detalle('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Detalle']))
			$model->attributes=$_GET['Detalle'];
			
		$criteria=new CDbCriteria;
        $criteria->select = '*, sum(cantidad) as existencia';		
        $criteria->with = 'producto';        
        $criteria->group = 'producto.id';     
		$dataProvider=new CActiveDataProvider('Detalle',array('criteria'=>$criteria));   
		
		$this->render('admin',array('dataProvider'=>$dataProvider,'model'=>$model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Detalle the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Detalle::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Detalle $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detalle-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
