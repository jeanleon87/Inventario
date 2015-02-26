<?php
/* @var $this CategoriaController */
/* @var $model Categoria */

$this->breadcrumbs=array('categorias');

$this->menu=array(	
	array('label'=>'nueva categoria', 'url'=>array('create')),	
);

?>
<h1>categorias</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categoria-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'template' => "{summary}\n{pager}\n{items}\n{pager}",
	'summaryText'=>'',
	'columns'=>array(
		array(
			'name'=>'id',
			'value'=>'$data->id',
			'htmlOptions'=>array('width'=>'30px'),			
		),
		'categoria',		
		array(
			'class'=>'CButtonColumn',
    		'template'=>'{update}{delete}',
    		'deleteConfirmation'=>"js:'Desea eliminar '+$(this).parent().parent().children(':nth-child(2)').text()+'?. Esta operacion no se puede deshacer. Continuar?'",
    		'buttons'=>array(
    			'update' => array(
            		'label'=>'Editar categoria',            		
            		'url'=>'Yii::app()->createUrl("categoria/update", array("id"=>$data->id))',
        		),
        		'delete' => array(
            		'label'=>'Eliminar categoria',            		
            		'url'=>'Yii::app()->createUrl("categoria/delete", array("id"=>$data->id))',
        		),
    		),
		),
	),
)); ?>
