<?php
/* @var $this SubcategoriaController */
/* @var $model Subcategoria */

$this->breadcrumbs=array(
	'Subcategorias'=>array('index'),
	'Manage',
);

$this->menu=array(	
	array('label'=>'Create Subcategoria', 'url'=>array('create')),
);

?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subcategoria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(		
		array(
			'name'=>'id',
			'value'=>'$data->id',
			'htmlOptions'=>array('width'=>'30px'),
		),		
		array(
			'name'=>'categoria_id',
			'value'=>'$data->categoria->categoria',
		),
		'subcategoria',		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
