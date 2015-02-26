<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form CActiveForm */
?>
<?php Yii::app() -> clientScript -> registerCoreScript('jquery'); ?>
<div class="form">

	<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'producto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => false, ));
 ?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form -> errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::label('Categorias', 'a'); ?>
		<?php
		echo CHtml::dropDownList('categorias', "", array('0' => '-Por favor seleccione-') + CHtml::listData(Categoria::model() -> findAll(), 'id', 'categoria'), array('id' => 'categorias'));
		?>
	</div>

	<div class="row">
		<?php echo $form -> labelEx($model, 'subcategoria_id'); ?>
		<?php //echo $form->textField($model,'subcategoria_id'); ?>
		<?php echo $form -> dropDownList($model, 'subcategoria_id', array(), array('empty' => '(seleccione una categoria)', 'id' => 'subcategoria_id')); ?>
		<?php echo $form -> error($model, 'subcategoria_id'); ?>
	</div>

	<div class="row">
		<?php echo $form -> labelEx($model, 'producto'); ?>
		<?php echo $form -> textField($model, 'producto', array('size' => 60, 'maxlength' => 100)); ?>
		<?php echo $form -> error($model, 'producto'); ?>
	</div>

	<div class="row">
		<?php echo $form -> labelEx($model, 'descripcion'); ?>
		<?php echo $form -> textField($model, 'descripcion', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form -> error($model, 'descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model -> isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this -> endWidget(); ?>

</div><!-- form -->

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