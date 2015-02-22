<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Listado',
);

$this->menu=array(	
	array('label'=>'Nueva Categoria', 'url'=>array('create')),
);

?>
<h1>Categorias</h1>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categoria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'categoria',
		'estado_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
