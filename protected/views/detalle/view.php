<?php
/* @var $this DetalleController */
/* @var $model Detalle */

$this->breadcrumbs=array(
	'Detalles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Detalle', 'url'=>array('index')),
	array('label'=>'Create Detalle', 'url'=>array('create')),
	array('label'=>'Update Detalle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Detalle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Detalle', 'url'=>array('admin')),
);
?>

<h1>View Detalle #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'precio',
		'cantidad',
		'exento',
		'comentario',
		'producto_id',
		'transaccion_id',
	),
)); ?>
