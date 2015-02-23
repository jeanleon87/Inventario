<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'categorias'=>array('index'),
	$model->categoria,
);

$this->menu=array(	
	array('label'=>'nueva categoria', 'url'=>array('create')),
	array('label'=>'ver categorias', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->categoria; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'categoria',
		'estado.estado',
	),
)); ?>
