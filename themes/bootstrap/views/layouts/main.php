<?php /* @var $this Controller */ ?>
<?php Yii::app()->bootstrap->register(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	'collapse' => true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Index', 'url'=>array('/site/index')),
			
				array('label'=>'Almacen', 'url'=>array('/detalle/admin')),
				array('label'=>'Categorias', 'url'=>array('/categoria/admin')),
				array('label'=>'SubCategorias', 'url'=>array('/subcategoria/admin')),
				array('label'=>'Productos', 'url'=>array('/producto/admin')),
				array('label'=>'Operaciones', 'url'=>array('/transaccion/admin'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Reportes', 'url'=>array('/detalle/reportes')),
				array('label'=>'Respaldo', 'url'=>array('/site/backup')),				
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">		
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
