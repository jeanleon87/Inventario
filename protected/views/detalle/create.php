<?php
/* @var $this DetalleController */
/* @var $model Detalle */

$this->breadcrumbs=array(
	'Detalles'=>array('admin'),
	'Create',
);

?>

<h3>Registro de <?php echo $model->producto->producto; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>