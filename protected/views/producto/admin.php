<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Manage',
);

$this->menu=array(	
	array('label'=>'Create Producto', 'url'=>array('create')),
);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'id',
			'value'=>'$data->id',
			'htmlOptions'=>array('width'=>'30px'),
		),
		array(
			'name'=>'subcategoria.categoria.categoria',
			'value'=>'$data->subcategoria->categoria->categoria',
		),		
		array(
			'name'=>'subcategoria_id',
			'value'=>'$data->subcategoria->subcategoria',
		),		
		'producto',
		'descripcion',		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
