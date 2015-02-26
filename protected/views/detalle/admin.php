<?php
/* @var $this DetalleController */
/* @var $model Detalle */

$this->breadcrumbs=array(
	'inventario',
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'template' => "{summary}\n{pager}\n{items}\n{pager}",
	'summaryText'=>'',
	'rowCssClassExpression'=>'$data->getColor(1)',
	'columns'=>array(
		array(
			'name'=>'id',
			'value'=>'$data->id',
			'htmlOptions'=>array('width'=>'30px'),			
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
		//'cantidad',
		//array('name'=>'fecha','type'=>'date'),
		//'precio',
		
		//'exento',
		//'comentario',
		/*
		'producto_id',
		'transaccion_id',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{add}{del}',    	
			'htmlOptions'=>array('width'=>'100px'),	
    		'buttons'=>array(
    			'view' => array(
            		'label'=>'Historico',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',      		
            		//'url'=>'Yii::app()->createUrl("producto/c", array("id"=>$data->id))',
        		),
    			'add' => array(
            		'label'=>'Ingreso',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/add.png',      		
            		'url'=>'Yii::app()->createUrl("detalle/create", array("id"=>$data->id))',
        		),
        		'del' => array(
            		'label'=>'Eliminar producto',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',            		
            		'url'=>'Yii::app()->createUrl("detalle/update", array("id"=>$data->id))',
        		),
    		),
		),
	),
)); ?>
