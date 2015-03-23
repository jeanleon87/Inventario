<script>
	$(document).ready(function () {
    $(".data").hide();
    $(".header").click(function () {
    	$(".data").hide();
        $(this).next(".data").toggle(200);
    });
});
</script>
<div class="container">
	<div class="content">
		<div class="grid-view">
			<table border="1" class="items" style="text-align: center">
				<thead>
				<tr>
					<th>Categoria</th>
					<th>Cantidad</th>		
					<th>Total</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($categorias as $categoria) {?>					
				<tr style="background: #B7D6E7" class="header" id="fila<?php echo $categoria->id?>">		
					<td width="33%"><?php echo $categoria->categoria;?></td>
					<td width="33%"><?php print_r(total($categoria->id,1));?></td>		
					<td width="33%"><?php print_r(total($categoria->id,2));?></td>		
				</tr>
				<tr class="data">		
					<td colspan="3">
						<table width="100%" border="3">							
							<?php $subcategorias = Subcategoria::model()->findAll('categoria_id='.$categoria->id);?>							
							<?php foreach ($subcategorias as $subcategoria) {?>								
							<tr style="background: #ECFBD4;">												
								<td width="33%"><?php echo $subcategoria->subcategoria;?></td>
								<td width="33%"><?php print_r(subtotal($subcategoria->id,1));?></td>
								<td width="33%"><?php print_r(subtotal($subcategoria->id,2));?></td>					
							</tr>
							<?php $productos = Producto::model()->findAll('subcategoria_id='.$subcategoria->id);?>							
							<?php if(count($productos)>1){?>
							<tr>
								<td colspan="3">
									<table width="100%">										
										
										<?php foreach ($productos as $producto) {?>
										<tr>																			
											<td width="33%"><?php echo $producto->producto;?></td>
											<td width="33%"><?php print_r(subtotal2($producto->id,1));?></td>
											<td width="33%"><?php print_r(subtotal2($producto->id,2));?></td>					
										</tr>
										<?php }?>
									</table>
								</td>
							</tr>
							<?php }?>				
							<?php }?>							
						</table>
					</td>		
				</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
    
function total($id,$op) {
	$columnas='';
	$condicion='';
	if($op==1){
		$columnas='detalle.cantidad';
		$condicion=' AND detalle.transaccion_id <>3 AND detalle.cantidad>0';
	}
	else if($op==2){
		$columnas='detalle.cantidad*detalle.precio';
		$condicion=' AND detalle.cantidad >0 AND detalle.transaccion_id <> 3';
	}
		return Yii::app()->db->createCommand("
			SELECT SUM({$columnas})
			FROM detalle
			INNER JOIN 
			(producto INNER JOIN 
				(subcategoria 
					INNER JOIN 
					categoria 
					ON subcategoria.categoria_id=categoria.id)
				 ON producto.subcategoria_id=subcategoria.id)
			ON detalle.producto_id=producto.id							
			WHERE categoria.id={$id}{$condicion}
		")->queryScalar();    	 
}

function subtotal($id,$op) {
	$columnas='';
	$condicion='';
	if($op==1){
		$columnas='detalle.cantidad';	
		$condicion=' AND (detalle.transaccion_id = 1)';
	}
	else if($op==2){
		$columnas='detalle.cantidad*detalle.precio';
		$condicion=' AND detalle.cantidad >0 AND (detalle.transaccion_id = 1)';
	}
		return Yii::app()->db->createCommand("
			SELECT SUM({$columnas})
			FROM detalle
			INNER JOIN 
			(producto INNER JOIN 
				(subcategoria 
					INNER JOIN 
					categoria 
					ON subcategoria.categoria_id=categoria.id)
				 ON producto.subcategoria_id=subcategoria.id)
			ON detalle.producto_id=producto.id							
			WHERE subcategoria.id={$id}{$condicion}
		")->queryScalar();    	 
}

function subtotal2($id,$op) {
	$columnas='';
	$condicion='';
	if($op==1){
		$columnas='detalle.cantidad';	
		$condicion=' AND (detalle.transaccion_id = 1)';
	}
	else if($op==2){
		$columnas='detalle.cantidad*detalle.precio';
		$condicion=' AND detalle.cantidad >0 AND (detalle.transaccion_id = 1)';
	}
		return Yii::app()->db->createCommand("
			SELECT SUM({$columnas})
			FROM detalle
			INNER JOIN 
			producto
			ON detalle.producto_id=producto.id							
			WHERE producto.id={$id}{$condicion}
		")->queryScalar();    	 
}
?>