<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'productos'=>array('index'),
	'nuevo',
);

$this->menu=array(
	array('label'=>'nuevo producto', 'url'=>array('create')),
	array('label'=>'ver productos', 'url'=>array('admin')),
);
?>
<h3>nuevo producto</h3> 
<?php $this->renderPartial('_form', array('model'=>$model)); ?>