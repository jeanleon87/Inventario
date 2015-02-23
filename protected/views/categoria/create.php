<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'categorias'=>array('index'),
	'nueva',
);

$this->menu=array(	
	array('label'=>'ver categorias', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>