
<div id="listCarrito">
<br>
	<?php

	if(isset($_SESSION['carrito'])) //Existe varible carrito?
	{
		
	?>
		<h2>Mi carrito de compras</h2>
		<table border="1"> 
			<tr>
				<th>ID</th>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Descripccion</th>
				<th>Precio</th>
				<th>Periodo de tiempo</th>
				<th colspan="2">Acciones</th>	
				<th>Importe</th>
			</tr>
		
	<?php 	
		$total = 0;
		foreach($_SESSION['carrito'] as $Id_Servicios => $campos)
		{
			$datosArticulo = getDetalleServicio($Id_Servicios);
    
    // Verifica si la clave "PrecioActual" está definida en el array $datosArticulo
    if(isset($datosArticulo['Precio']))
	{
        $total += $datosArticulo['Precio'];
    } else {
        // Si la clave no está definida, muestra un mensaje de advertencia
        echo "Advertencia: La clave 'Precio' no está definida en el array.";
    }
		
		?>			
				<tr>
					<td><?=$datosArticulo['Id_Servicios']?></td>
					<td><center><img src="<?=$datosArticulo['mostrarFoto']?>"/></center></td>
					<td><?=$datosArticulo['NombreServicio']?></td>
					<td><?=$datosArticulo['Descripccion']?></td>
					
					
					<td class="precios">$ <?=number_format($datosArticulo['Precio'], 2, '.', ',')?></td>
					
					<td><?=$campos['Cantidad']?></td>
					<td>
						<button class="button-carrito button-agregar">
							<a href="<?=ROOTURL?>?accion=addCarrito&vista=enCarrito&Id_Servicios=<?=$datosArticulo['IDArticulo']?>"> Agregar </a>
						</button>
					</td>
					<td>
						<button class="button-carrito button-eliminar">
							<a href="<?=ROOTURL?>?accion=deleteCarrito&vista=enCarrito&Id_Servicios=<?=$datosArticulo['IDArticulo']?>"> Eliminar </a>
						</button>	
					</td>
					<td class="precios">$ <?=number_format($importe, 2, '.', ',')?></td>
				</tr>
				
		<?php	}	?>
				<tr>
					<th colspan="8" class="precios">IMPORTE TOTAL</th>	
					<th><h2>$<?=number_format($total, 2, '.', ',')?></th>
				</tr>
				<tr>
					<td colspan="8"></td>	
					<td colspan="3"><input type="button" value="Proceder al pago..." onclick=self.location="<?=ROOTURL?>?accion=personalizarCompra" /></td>
				</tr>
		</table>
		
	<?php } else {?>
	
		<br>
		<h2>No tienes Articulos en tu carrito</h2>

	<?php }?>
</div>