<?php
/* @var $this DetalleController */
/* @var $model Detalle */

$this->breadcrumbs=array(
	'inventario',
);

$this->menu=array(
	array('label'=>'nueva categoria', 'url'=>array('create')),
);

?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'template' => "{summary}\n{pager}\n{items}\n{pager}",
	'summaryText'=>'',
	'columns'=>array(
		array(
			'name'=>'id',
			'value'=>'$data->id',
			'htmlOptions'=>array('width'=>'30px'),			
		),		
		array(
  			'name'=>'producto_id',
  			'value'=>'$data->producto->producto',
  			'htmlOptions'=>array('width'=>'100px'),
		),
		array(
              'name'=>'cantidad',
              'value'=>'$data->total',
            ),
		'cantidad',
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
		),
	),
)); ?>
