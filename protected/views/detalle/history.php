<?php
/* @var $this DetalleController */
/* @var $model Detalle */

$this->breadcrumbs=array(
	'Detalles'=>array('admin'),
	$model->producto->producto,
);

$this->menu=array(	
	array('label'=>'Ingreso', 'url'=>array('create','id'=>$model->id)),
	array('label'=>'Egreso', 'url'=>array('add','id'=>$model->id)),
	array('label'=>'Asiento', 'url'=>array('update', 'id'=>$model->id)),	
);

?>

<h1>Historico Detallado <?php echo $model->producto->producto; ?></h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$dataProvider,
	'summaryText'=>'',
	//'filter'=>$model,
	'rowCssClassExpression'=>'$data->getColor(2)',
	'columns'=>array(
		'id',
		array('name'=>'fecha','type'=>'date'),
		'precio',		
		array(
              'name'=>'cantidad',
              'value'=>'$data->cantidad',
              'footer'=>$total
           ),
		'comentario',		
		'transaccion.transaccion',
		array(
			'header'=>'Opciones',
			'class'=>'CButtonColumn',
			'template'=>'{view}{plus}{minus}{first}{delete}',    	
			'htmlOptions'=>array('width'=>'170px'),	
    		'buttons'=>array(
    			'delete'=> array(
    				'label'=>'Eliminar',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',   
            		 				
				),
    			'first'=> array(
    				'label'=>'Editar',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/edit.png',
            		'url'=>'Yii::app()->createUrl("detalle/first", array("id"=>$data->id))',    				
				),
    			'view' => array(
            		'label'=>'Historico',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',      		
            		//'url'=>'Yii::app()->createUrl("producto/c", array("id"=>$data->id))',
        		),
    			'plus' => array(
            		'label'=>'Ingreso',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/plus.png',      		
            		'url'=>'Yii::app()->createUrl("detalle/create", array("id"=>$data->id))',
        		),
        		'minus' => array(
            		'label'=>'Egreso',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/minus.png',            		
            		'url'=>'Yii::app()->createUrl("detalle/add", array("id"=>$data->id))',
        		),
    		),
		),
	),
)); ?>