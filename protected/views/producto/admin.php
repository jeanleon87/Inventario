<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'productos',
);

$this->menu=array(
	array('label'=>'nuevo producto', 'url'=>array('create')),	
);
?>
<h1>productos</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-grid',
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
		array(
  			'name'=>'categoria_id',
  			'value'=>'$data->categoria->categoria',
  			'htmlOptions'=>array('width'=>'100px'),
		),		
		'producto',
		'descripcion',
		array(
  			'name'=>'estado_id',
  			'value'=>'$data->estado->estado',
  			'htmlOptions'=>array('width'=>'70px'),
		),		
		array(
			'class'=>'CButtonColumn',
    		'template'=>'{update}{delete}',
    		'deleteConfirmation'=>"js:'Desea eliminar '+$(this).parent().parent().children(':nth-child(2)').text()+'?. Esta operacion no se puede deshacer. Continuar?'",
    		'buttons'=>array(
    			'update' => array(
            		'label'=>'Editar producto',            		
            		'url'=>'Yii::app()->createUrl("producto/update", array("id"=>$data->id))',
        		),
        		'delete' => array(
            		'label'=>'Eliminar producto',            		
            		'url'=>'Yii::app()->createUrl("producto/delete", array("id"=>$data->id))',
        		),
    		),
		),
	),
)); ?>
