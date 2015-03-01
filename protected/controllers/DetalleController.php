<?php

class DetalleController extends Controller
{
	public $layout='//layouts/column1';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','history'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('increase','decrease','first'),
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

	public function actionHistory($id)
	{
		$this->layout='//layouts/column2';
		$model=$this->loadModel($id);
		$total = 0;		
		
		$criteria=new CDbCriteria;
		$criteria->with=array('producto');
		$criteria->condition = "producto.id=".$model->producto_id;
		$criteria->order='fecha';
		$records = Detalle::model()->findAll($criteria);
		
		foreach ($records as $record) {
            $total += $record->cantidad;			
        }
		
		$dataProvider=new CActiveDataProvider('Detalle',array('criteria'=>$criteria,'pagination'=>false));
		
		$this->render('history',array('dataProvider'=>$dataProvider,'model'=>$model,'total'=>$total,'model'=>$model));
	}

	public function actionIncrease($id)
	{
		$oldmodel=$this->loadModel($id);
		$model=new Detalle;
		$model->producto_id=$oldmodel->producto_id;
		$model->transaccion_id=1;

		if(isset($_POST['Detalle']))
		{
			$model->attributes=$_POST['Detalle'];
			if($model->transaccion_id==2){
				$model->cantidad=$model->cantidad*-1;
			}
			if($model->save())
				$this->redirect(array('history','id'=>$model->id));
				//$this->redirect(array('admin'));
		}

		$this->render('increase',array(
			'model'=>$model,
		));
	}

	public function actionDecrease($id)
	{	
		$oldmodel=$this->loadModel($id);
		$model=new Detalle;
		$model->producto_id=$oldmodel->producto_id;
		$model->transaccion_id=2;
		$model->precio=0;		

		if(isset($_POST['Detalle']))
		{
			$model->attributes=$_POST['Detalle'];
			if($model->transaccion_id==2){
				$model->cantidad=$model->cantidad*-1;
			}
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
				//$this->redirect(array('admin'));
		}

		$this->render('increase',array(
			'model'=>$model,
		));
	}
	
	public function actionFirst($id)
	{
		
		$model=$this->loadModel($id);
		$model->fechaString = Yii::app()->format->formatDate($model->fecha);
		
		if(isset($_POST['Detalle']))
		{
			$model->attributes=$_POST['Detalle'];			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
				//$this->redirect(array('admin'));
		}

		$this->render('first',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Detalle',array('order'=>'producto'));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionAdmin()
	{
		$model=new Detalle('search');		
		$model->unsetAttributes();  // clear any default values		
		if(isset($_GET['Detalle']))
			$model->attributes=$_GET['Detalle'];
		
		$this->render('admin',array('model'=>$model));
	}

	public function loadModel($id)
	{
		$model=Detalle::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='detalle-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
