<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'producto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria_id'); ?>
		<?php
		echo $form->dropDownList($model,'categoria_id', CHtml::listData(Categoria::model()->findAll(),'id','categoria'),array('empty' => '(seleccione una categoria)'));
		?>
		<?php echo $form->error($model,'categoria_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'producto'); ?>
		<?php echo $form->textField($model,'producto',array('size'=>60,'maxlength'=>100,'placeholder'=>'nombre del producto')); ?>
		<?php echo $form->error($model,'producto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>255,'placeholder'=>'breve descripcion del producto')); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_id'); ?>
		<?php
		echo $form->dropDownList($model,'estado_id', CHtml::listData(Estado::model()->findAll(),'id','estado'),array('empty' => '(seleccione un estado)'));
		?>
		<?php echo $form->error($model,'estado_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'crear' : 'guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->