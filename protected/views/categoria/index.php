<?php
/* @var $this CategoriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'categorias',
);

$this->menu=array(
	array('label'=>'nueva categoria', 'url'=>array('create')),
	array('label'=>'ver categorias', 'url'=>array('admin')),
);
?>

<h1>categorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
