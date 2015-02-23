<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'categorias'=>array('index'),$model->categoria,
);

$this->menu=array(
	array('label'=>'nueva categoria', 'url'=>array('create')),
	array('label'=>'ver categorias', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>