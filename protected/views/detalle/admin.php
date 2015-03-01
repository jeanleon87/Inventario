<?php
/* @var $this DetalleController */
/* @var $model Detalle */

$this->breadcrumbs=array(
	'Detalles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Detalle', 'url'=>array('index')),
	array('label'=>'Create Detalle', 'url'=>array('create')),
);

?>

<h1>Resumen Inventario General</h1>

<?php 
$this->widget('ext.groupgridview.GroupGridView', array(
//$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'rowCssClassExpression'=>'$data->getColor(1)',
	'mergeColumns' => array('producto.subcategoria.categoria','producto.subcategoria.subcategoria'),		
	'columns'=>array(						
		array(
  			'name'=>'producto.subcategoria.categoria',  			
  			'value'=>'CHtml::link($data->producto->subcategoria->categoria->categoria,Yii::app()->createUrl("categoria/view",array("id"=>$data->producto->subcategoria->categoria->id)))',
  			'htmlOptions'=>array('width'=>'125px'),
  			'type'=>'raw',
		),
		array(
  			'name'=>'producto.subcategoria.subcategoria',
  			'value'=>'CHtml::link($data->producto->subcategoria->subcategoria,Yii::app()->createUrl("subcategoria/view",array("id"=>$data->producto->subcategoria->id)))',  			
  			'htmlOptions'=>array('width'=>'125px'),
  			'type'=>'raw',
		),				
		array(
  			'name'=>'producto_id',
  			'value'=>'$data->producto->producto',
  			'htmlOptions'=>array('width'=>'300px'),
		),	
		array(
              'name'=>'cantidad',
              'value'=>'$data->total',
              'htmlOptions'=>array('width'=>'30px'),	
		),
		array(
			'header'=>'Comentario',
			'value'=>'$data->producto->descripcion',
			'htmlOptions'=>array('width'=>'30px'),
		),						
		array(
			'header'=>'Opciones',
			'class'=>'CButtonColumn',
			'template'=>'{history}{increase}{decrease}',    	
			'htmlOptions'=>array('width'=>'100px'),	
    		'buttons'=>array(
    			'history' => array(
            		'label'=>'Historico',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
            		'url'=>'Yii::app()->createUrl("detalle/history", array("id"=>$data->id))',     		
            		
        		),
    			'increase' => array(
            		'label'=>'Ingreso',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/plus.png',      		
            		'url'=>'Yii::app()->createUrl("detalle/increase", array("id"=>$data->id))',
        		),
        		'decrease' => array(
            		'label'=>'Egreso',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/minus.png',            		
            		'url'=>'Yii::app()->createUrl("detalle/decrease", array("id"=>$data->id))',
        		),
        		/*
        		'first'=> array(
    				'label'=>'Editar',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/edit.png',
            		'url'=>'Yii::app()->createUrl("detalle/first", array("id"=>$data->id))',    				
				),
				 */
    			'delete'=> array(
    				'label'=>'Eliminar',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',    				
				),    			
    			
    		),
		),		
	),
)); ?>
