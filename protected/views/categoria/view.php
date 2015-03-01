<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Categoria', 'url'=>array('index')),
	array('label'=>'Create Categoria', 'url'=>array('create')),
	array('label'=>'Update Categoria', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Categoria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categoria', 'url'=>array('admin')),
);
?>

<h1>Categoria <b><?php echo $model->categoria; ?></b></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subcategoria-grid',
	'dataProvider'=>$dataProvider,	
	'columns'=>array(		
		array(
			'name'=>'id',
			'value'=>'$data->id',
			'htmlOptions'=>array('width'=>'30px'),
		),
		array(
  			'name'=>'subcategoria',
  			'value'=>'CHtml::link($data->subcategoria,Yii::app()->createUrl("subcategoria/view",array("id"=>$data->id)))',  			
  			'htmlOptions'=>array('width'=>'125px'),
  			'type'=>'raw',
		),		
		array(
			'header'=>'Opciones',
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',    	
			'htmlOptions'=>array('width'=>'100px'),	
    		'buttons'=>array(
    			'view' => array(
            		'label'=>'Historico',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
            		'url'=>'Yii::app()->createUrl("subcategoria/view", array("id"=>$data->id))',
        		),
    			'update' => array(
            		'label'=>'Editar',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/edit.png',      		
            		'url'=>'Yii::app()->createUrl("subcategoria/update", array("id"=>$data->id))',
        		),    			
    		),
		),
	),
)); ?>