<?php
/* @var $this SubcategoriaController */
/* @var $model Subcategoria */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subcategoria-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'categoria_id'); ?>
		<?php
			echo $form->dropDownList($model,'categoria_id', CHtml::listData(Categoria::model()->findAll(array('order'=>'categoria')),'id','categoria'),array('empty' => '(seleccione una categoria)'));
		?>		
		<?php echo $form->error($model,'categoria_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'subcategoria'); ?>
		<?php echo $form->textField($model,'subcategoria',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'subcategoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->