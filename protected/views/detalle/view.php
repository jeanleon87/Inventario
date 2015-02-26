<?php
/* @var $this DetalleController */
/* @var $model Detalle */

$this->breadcrumbs=array(
	'Detalles'=>array('admin'),
	$model->producto->producto,
);

?>

<h1>Historico <?php echo $model->producto->producto; ?></h1>

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
			'class'=>'CButtonColumn',
		)	
		
	),
)); ?>