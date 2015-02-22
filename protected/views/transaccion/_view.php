<?php
/* @var $this TransaccionController */
/* @var $data Transaccion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transaccion')); ?>:</b>
	<?php echo CHtml::encode($data->transaccion); ?>
	<br />


</div>