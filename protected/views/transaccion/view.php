<?php
/* @var $this TransaccionController */
/* @var $model Transaccion */

$this->breadcrumbs=array(
	'Transaccions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Transaccion', 'url'=>array('index')),
	array('label'=>'Create Transaccion', 'url'=>array('create')),
	array('label'=>'Update Transaccion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Transaccion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Transaccion', 'url'=>array('admin')),
);
?>

<h1>View Transaccion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'transaccion',
	),
)); ?>
