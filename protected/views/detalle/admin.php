<?php
/* @var $this DetalleController */
/* @var $model Detalle */

$this->breadcrumbs=array(
	'Detalles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Detalle', 'url'=>array('index')),
	array('label'=>'Create Detalle', 'url'=>array('create')),
);

?>
<h1>Resumen Inventario General</h1>

<div class="row" style="text-align:right">
	<?php	
		echo CHtml::link('Nueva Categoria','#',array('onclick'=>'addCategoria()'));
		echo '     |     ';	
		echo CHtml::link('Nueva Subcategoria','#',array('onclick'=>'addSubcategoria()'));
		echo '     |     ';
		echo CHtml::link('Nueva Producto','#',array('onclick'=>'addProducto()'));
	?>	
	<div class="row" style="text-align: left">
		<br><br>
		<div class="row">		
			<div id="error" style="display: none;color: red">				
				<strong>Hubo un error!</strong> Por favor intentalo de nuevo.
				<br><br>
			</div>			
			<div id="good" style="display: none;color: green">				
				<strong>Se ha guardado la informacion con exito!</strong>
				<br><br>
			</div>
		</div>
		<div class="row" id="dcategoria" style="display: none;">
			<b>A&ntilde;adir Categoria</b><br>		
			<?php echo CHtml::textField('tcategoria','',array('size'=>60,'maxlength'=>100,'placeholder'=>'Ingrese el nombre deseado')); ?>
			<?php echo CHtml::link('Guardar','#',array('onclick'=>'saveCategoria()'));?>					
		</div>
		
		<div class="row" id="dsubcategoria" style="display: none;">
			<b>A&ntilde;adir Subcategoria</b><br>
			<?php echo CHtml::dropDownList('scategoria', 'scategoria', CHtml::listData(Categoria::model() -> findAll(array('order'=>'categoria')), 'id', 'categoria'), array('empty' => 'Seleccione una categoria')); ?>		
			<?php echo CHtml::textField('tsubcategoria','',array('size'=>60,'maxlength'=>100,'placeholder'=>'Ingrese el nombre deseado')); ?>
			<?php echo CHtml::link('Guardar','#',array('onclick'=>'saveSubcategoria()'));?>					
		</div>
		<div class="row" id="dproducto" style="display: none;">
			<b>A&ntilde;adir Producto</b><br>
			<?php echo CHtml::dropDownList('scategorias', 'scategorias', array('0' => '-Por favor seleccione-') + CHtml::listData(Categoria::model() -> findAll(array('order'=>'categoria')), 'id', 'categoria'), array('id' => 'categorias'));?>
			<?php echo CHtml::dropDownList('ssubcategorias','ssubcategorias',array('0' => '-Por favor seleccione-') + CHtml::listData(Subcategoria::model() -> findAll(array('order'=>'subcategoria')), 'id', 'subcategoria') , array('empty' => '(seleccione una subcategoria)', 'id' => 'subcategoria_id')); ?>
			<?php echo CHtml::textField('tproducto','',array('size'=>45,'maxlength'=>255,'placeholder'=>'Ingrese el nombre deseado')); ?>
			<?php echo CHtml::link('Guardar','#',array('onclick'=>'saveProducto()'));?>					
		</div>
	</div>
</div>

<?php 
$this->widget('ext.groupgridview.GroupGridView', array(
//$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'rowCssClassExpression'=>'$data->getColor(1)',
	'mergeColumns' => array('producto.subcategoria.categoria','producto.subcategoria.subcategoria'),		
	'columns'=>array(						
		array(
  			'name'=>'producto.subcategoria.categoria',  			
  			'value'=>'CHtml::link($data->producto->subcategoria->categoria->categoria,Yii::app()->createUrl("categoria/view",array("id"=>$data->producto->subcategoria->categoria->id)))',
  			'htmlOptions'=>array('width'=>'125px'),
  			'type'=>'raw',
		),
		array(
  			'name'=>'producto.subcategoria.subcategoria',
  			'value'=>'CHtml::link($data->producto->subcategoria->subcategoria,Yii::app()->createUrl("subcategoria/view",array("id"=>$data->producto->subcategoria->id)))',  			
  			'htmlOptions'=>array('width'=>'125px'),
  			'type'=>'raw',
		),				
		array(
  			'name'=>'producto_id',
  			'value'=>'$data->producto->producto',
  			'htmlOptions'=>array('width'=>'300px'),
		),	
		array(
              'name'=>'cantidad',
              'value'=>'$data->total',
              'htmlOptions'=>array('width'=>'30px'),	
		),
		array(
			'header'=>'Comentario',
			'value'=>'$data->producto->descripcion',
			'htmlOptions'=>array('width'=>'30px'),
		),						
		array(
			'header'=>'Opciones',
			'class'=>'CButtonColumn',
			'template'=>'{history}{increase}{decrease}',    	
			'htmlOptions'=>array('width'=>'100px'),	
    		'buttons'=>array(
    			'history' => array(
            		'label'=>'Historico',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
            		'url'=>'Yii::app()->createUrl("detalle/history", array("id"=>$data->id))',     		
            		
        		),
    			'increase' => array(
            		'label'=>'Ingreso',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/plus.png',      		
            		'url'=>'Yii::app()->createUrl("detalle/increase", array("id"=>$data->id))',
        		),
        		'decrease' => array(
            		'label'=>'Egreso',
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/minus.png',            		
            		'url'=>'Yii::app()->createUrl("detalle/decrease", array("id"=>$data->id))',
        		),
        		/*
        		'first'=> array(
    				'label'=>'Editar',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/edit.png',
            		'url'=>'Yii::app()->createUrl("detalle/first", array("id"=>$data->id))',    				
				),
				 */
    			'delete'=> array(
    				'label'=>'Eliminar',      
            		'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',    				
				),    			
    			
    		),
		),		
	),
)); 
?>

<script>
	// creamos un evento onchange para cuando el usuario cambie su seleccion
	// importante: #combo1 hace referencia al ID indicado arriba con: array('id'=>'combo1')
	//
	$('#categorias').change(function() {
		var opcionSeleccionada = $(this);
		// el <option> seleccionado
		var idcategoria = opcionSeleccionada.val();
		// el "value" de ese <option> seleccionado
		if (idcategoria == 0) {
			$('#siguiente').hide('slow');
			return;
		}
		var action = 'index.php?r=/producto/obtenerproductos&idcategoria=' + idcategoria;
		//var action = 'index.php?r=/combodependiente/default/obtenerproductos&idcategoria=' + idcategoria;
		// se pide al action la lista de productos de la categoria seleccionada
		//
		$('#reportarerror').html("");
		$.getJSON(action, function(listaJson) {
			//
			// el action devuelve los productos en su forma JSON, el iterador "$.each" los separará.
			//
			// limpiar el combo productos
			$('#subcategoria_id').find('option').each(function() {
				$(this).remove();
			});
			$('#subcategoria_id').append("<option value='" + 0 + "'> -Por favor seleccione una subcategoria </option>");
			$.each(listaJson, function(key, producto) {
				//
				// "producto" es un objeto JSON que representa al modelo Producto
				// por tanto una llamada a: alert(producto.nombre) dira: "camisas"
				$('#subcategoria_id').append("<option value='" + producto.id + "'>" + producto.subcategoria + "</option>");
			});
			$('#seleccion').html("Ok, ahora selecciona un producto:");
			$('#siguiente').show('slow');
		}).error(function(e) {
			$('#reportarerror').html(e.responseText);
		});
	});
	// para que cuando le des click muestre la seleccion
	//
	$('#botonseleccion').click(function() {
		alert("idproducto es: " + $('#combo2').val());
	}); 
</script>