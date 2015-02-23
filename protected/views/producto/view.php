<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->producto,
);

$this->menu=array(
	array('label'=>'nuevo producto', 'url'=>array('create')),
	array('label'=>'ver productos', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->producto; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'producto',
		'descripcion',
		'estado.estado',
		'categoria.categoria',
	),
)); ?>
