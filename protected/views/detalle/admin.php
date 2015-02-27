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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$model->search(),
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
  			'header'=>'Categoria',
  			'value'=>'$data->producto->subcategoria->categoria->categoria',
  			'htmlOptions'=>array('width'=>'200px'),
		),
		array(
  			'header'=>'Subcategoria',
  			'value'=>'$data->producto->subcategoria->subcategoria',
  			'htmlOptions'=>array('width'=>'150px'),
		),
		array(
  			'name'=>'producto_id',
  			'value'=>'$data->producto->producto',
  			'htmlOptions'=>array('width'=>'200px'),
		),
		array(
              'name'=>'cantidad',
              'value'=>'$data->total',
              'htmlOptions'=>array('width'=>'30px'),	
           ),
		array(
			'header'=>'Comentario',
			'value'=>'$data->producto->descripcion'
		),
		array(
			'header'=>'Opciones',
			'class'=>'CButtonColumn',
			'template'=>'{view}{plus}{minus}{update}',    	
			'htmlOptions'=>array('width'=>'170px'),	
    		'buttons'=>array(
    			'delete'=> array(
    				'label'=>'Eliminar',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',    				
				),
    			'update'=> array(
    				'label'=>'Editar',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/edit.png',    				
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
