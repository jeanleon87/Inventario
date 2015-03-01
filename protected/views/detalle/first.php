<?php
/* @var $this DetalleController */
/* @var $model Detalle */

$this->breadcrumbs=array(
	'Detalles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Detalle', 'url'=>array('index')),
	array('label'=>'Create Detalle', 'url'=>array('create')),
	array('label'=>'View Detalle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Detalle', 'url'=>array('admin')),
);
?>

<h1>Cargar asiento inicial de: <?php echo $model->producto->producto; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>