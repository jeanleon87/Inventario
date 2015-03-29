<script type="text/javascript">
	$( document ).ready(function() {
		$("#bien").hide();
		$("#mal").hide();
	});
</script>
<div class="container" id="page">
	<div class="row">
		<div class="span5">        					
			<?php
				echo CHtml::ajaxButton(
			    	$label = 'Subir a DropBox', 
			      	$url = array('backup/default/create'),
			      	$ajaxOptions=array (        	
			          	'dataType'=>'json',
			          	'update'=>'#req_res_loading',
			        	'beforeSend' => 'function() {           
			            	$(\'#loading\').html(\'<img src="'.Yii::app()->baseUrl.'/images/loading.gif'.'"> cargando...\');
			        	}',       
			          	'success'=>'function(respuesta){
			              	if(respuesta.respuesta==1){
			              		$(\'#loading\').html("");
								$("#bien").show();                	                
			              	}
			              	else{
			              		$(\'#loading\').html("");
								$("#mal").show();
			              	}              
			          	}'
			      	),
			      	$htmlOptions=array('class'=>'btn btn-primary btn-block')
				);
			?>
		</div>
		<div class="span5">        					
			<?php
				echo CHtml::ajaxButton(
			    	$label = 'Descargar de DropBox', 
			      	$url = array('site/restoredropbox'),
			      	$ajaxOptions=array (        	
			          	'dataType'=>'json',
			          	'update'=>'#req_res_loading',
			        	'beforeSend' => 'function() {           
			            	$(\'#loading\').html(\'<img src="'.Yii::app()->baseUrl.'/images/loading.gif'.'"> cargando...\');
			        	}',       
			          	'success'=>'function(respuesta){
			              	if(respuesta.respuesta==1){
			              		$(\'#loading\').html("");								
								$("#bien").show();								              
			              	}
		              	else{
			              		$(\'#loading\').html("");
								$("#mal").html(respuesta.msg);
								$("#mal").show();
			              	}              
			          	}'
			      	),
			      	$htmlOptions=array('class'=>'btn btn-primary btn-block')
				);
			?>
		</div>
	</div>
	<div class="row">
		<div class="clearfix"></div>
		<div class="span3"></div>
		<div class="span4">
			<br><br>
			<div id="loading"></div>
			<div id="bien" class="alert alert-success" role="alert">
				<p>Operacion realizada correctamente </p>
				<span><a href="<?php echo Yii::app()->createUrl("detalle/admin");?>">Continuar</a></span>				
			</div>
			<div id="mal" class="alert alert-success" role="alert">Hubo un error!! Intente de nuevo</div>
		</div>
		<div class="span3"></div>
	</div>
</div>