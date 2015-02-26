<?php
/* @var $this DetalleController */
/* @var $model Detalle */

$this->breadcrumbs=array(
	'Detalles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Detalle', 'url'=>array('index')),
	array('label'=>'Manage Detalle', 'url'=>array('admin')),
);
?>

<h1>Create Detalle</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>