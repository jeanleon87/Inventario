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
				'actions'=>array('increase','decrease','first','ncategoria','nsubcategoria','nproducto','reportes'),
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
		if(!isset($id)){
			$id=$_POST['id'];
		}
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
		
		$dataProvider=new CActiveDataProvider('Detalle',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>10)));
				
		$this->render('history',array('dataProvider'=>$dataProvider,'total'=>$total,'model'=>$model));
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
				$this->redirect(array('history','id'=>$model->id));
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
				$this->redirect(array('history','id'=>$model->id));
				//$this->redirect(array('admin'));
		}

		$this->render('first',array(
			'model'=>$model,
		));
	}

	
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		$first=Detalle::model()->find('producto_id='.$model->producto_id);
		//print_r($first);die;
		
		$this->loadModel($id)->delete();
		
		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin',array('model'=>$first,'id'=>$first->id)));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Detalle',array('order'=>'producto'));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionReportes()
	{
		$categorias=Categoria::model()->findAll(array('group'=>'categoria'));
    /*
    SELECT SUM( DETALLE.CANTIDAD ) AS SUMA
FROM DETALLE
INNER JOIN (
producto
INNER JOIN (
subcategoria
INNER JOIN categoria ON subcategoria.categoria_id = categoria.id
) ON producto.subcategoria_id = subcategoria.id
) ON producto_id = producto.id
GROUP BY CATEGORIA.ID
ORDER BY CATEGORIA.CATEGORIA
    */
    
    $criteria=new CDbCriteria;
    $criteria->select='SUM(t.cantidad) as suma, SUM(t.cantidad*t.precio) as bs, categoria.categoria as categoria';
    $criteria->join="INNER JOIN 
      (producto INNER JOIN 
        (subcategoria 
          INNER JOIN 
          categoria 
          ON subcategoria.categoria_id=categoria.id)
         ON producto.subcategoria_id=subcategoria.id)
      ON producto_id=producto.id";
    $criteria->group="categoria.id";   
    $criteria->order="categoria.categoria"; 
    $dataProvider=new CActiveDataProvider('Detalle',array('criteria'=>$criteria,'pagination'=>false));
    
    
		$this->render('reportes',array('categorias'=>$categorias,'dataProvider'=>$dataProvider));	
		
	}
	
	public function actionAdmin()
	{
		$modelCategoria=new Categoria;
		$model=new Detalle('search');		
		$model->unsetAttributes();  // clear any default values		
		if(isset($_GET['Detalle']))
			$model->attributes=$_GET['Detalle'];
		Yii::app() -> clientScript -> registerScript('add', "
			function abrirHistory(id) {									
				$.ajax({
					type : 'GET',
					'dataType' : 'json',
					url : '" . Yii::app() -> createAbsoluteUrl("detalle/history") . "',
					'data': { id:id},	
					success : function(postData) {												
						if (postData.result == 'OK') {							
							location.reload();																											
						} else {
						}
					},
					async : false
				});										
				$('#dialogohistorico').dialog('open'); return false;							
			}
			function addSubcategoria() {
				$('#error').hide();
				$('#dcategoria').hide();
				$('#dsubcategoria').toggle();							
			}
			function addProducto() {
				$('#error').hide();
				$('#dcategoria').hide();
				$('#dsubcategoria').hide();
				$('#dproducto').toggle();							
			}
			function saveCategoria() {
				$.ajax({
					type : 'POST',
					'dataType' : 'json',
					'data': { categoria:$('#tcategoria').val()},
					url : '" . Yii::app() -> createAbsoluteUrl("detalle/ncategoria") . "',
					success : function(postData) {												
						if (postData.result == 'OK') {
							$('#goodc').show();
							setInterval(function(){
								$('#dialogocategoria').dialog('close')									
							},2500);
							location.reload();																											
						} else {						
							$('#errorc').show();
							setInterval(function(){
								$('#errorc').hide();									
							},5000);
						}
					},
					async : false
				});
			}
			function saveSubcategoria() {
				$.ajax({
					type : 'POST',
					'dataType' : 'json',
					'data': { categoria_id:$('#scategoria').val(),subcategoria:$('#tsubcategoria').val()},
					url : '" . Yii::app() -> createAbsoluteUrl("detalle/nsubcategoria") . "',
					success : function(postData) {												
						if (postData.result == 'OK') {
							$('#goods').show();
							setInterval(function(){
								$('#dialogosubcategoria').dialog('close')	
							},2500);
							location.reload();																											
						} else {
							$('#errors').show();
							setInterval(function(){
								$('#errors').hide();									
							},5000);
						}
					},
					async : false
				});
			}
			function saveProducto() {
				$.ajax({
					type : 'POST',
					'dataType' : 'json',
					'data': { subcategoria:$('#subcategoria_id').val(),producto:$('#tproducto').val()},
					url : '" . Yii::app() -> createAbsoluteUrl("detalle/nproducto") . "',
					success : function(postData) {
						if (postData.result == 'OK') {
							$('#goodp').show();
							setInterval(function(){
								$('#dialogoproducto').dialog('close')	
							},2500);
							$.fn.yiiGridView.update('detalle-grid');																																		
						} else {							
							$('#errorp').html(postData.data);							
							$('#errorp').show();
							setInterval(function(){
								$('#errorp').hide();									
							},5000);
						}
					},
					async : false
				});
			}
		", CClientScript::POS_END);
		$this->render('admin',array('model'=>$model,'modelCategoria'=>$modelCategoria));
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
	
	public function actionNcategoria() {					
		$model=new Categoria;
		$model->categoria=$_POST['categoria'];		
		if($model->save()){
			echo json_encode(array('result' => 'OK'));			
		}
		else{
			echo json_encode(array('result' => 'NO'));
		}	
	}
	
	public function actionNsubcategoria() {					
		$model=new Subcategoria;
		$model->categoria_id=$_POST['categoria_id'];		
		$model->subcategoria=$_POST['subcategoria'];
		if($model->save()){
			echo json_encode(array('result' => 'OK'));			
		}
		else{
			echo json_encode(array('result' => 'NO'));
		}	
	}

	public function actionNproducto() {					
		$model=new Producto;
		$model->subcategoria_id=$_POST['subcategoria'];		
		$model->producto=$_POST['producto'];
		
		if($model->save()){
			$ingresoInicial=new Detalle();				
			$ingresoInicial->fechaString=date("01/01/2015");
			$ingresoInicial->precio=0;
			$ingresoInicial->cantidad=0;				
			$ingresoInicial->comentario="Creacion del producto";
			$ingresoInicial->producto_id=$model->id;
			$ingresoInicial->transaccion_id=3;
			$ingresoInicial->save();
			echo json_encode(array('result' => 'OK'));			
		}
		else{			
			echo json_encode(array('result' => 'NO'));
		}	
	}		
}
