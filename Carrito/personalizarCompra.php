
<div id="listCarrito">
<br>
<?php
	if(isset($_SESSION['carrito']))
	{		
?>
			<h2 class="fs-title">Personalizando mi compra!!!</h2>
		
			<table> 
				<tr>
					<th>C&oacute;digo</th>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Descuento</th>
					<th>Importe</th>
				</tr>		
		<?php 	
			$importeTotal = 0;
			$subTotal = 0;
			$IVA = 0;
			$cantArticulos = 0;
			$Descuento = 0;
			foreach($_SESSION['carrito'] as $IDArticulo => $campos)
			{
				$datosArticulo=getDetalleArticulo($IDArticulo);				
				$cantArticulos += $campos['cantidad'];
				$Descuento = $_SESSION['carrito'][$IDArticulo]['Descuento'];
				$Importe = $datosArticulo['PrecioActual']*$campos['cantidad'] - $Descuento;
				$subTotal += $Importe;
			?>						
					<tr>
						<td><?=$datosArticulo['IDArticulo']?></td>
						<td><?=$datosArticulo['NameArticulo']?></td>
						<td><?=$datosArticulo['Marca']?></td>
						<td class="precios">$ <?=number_format($datosArticulo['PrecioActual'], 2, '.', ',')?></td>
						<td><?=$campos['cantidad']?></td>
						
						<td class="precios">
							<form id="frmPersonalizarCompra" id="frmPersonalizarCompra" action="Carrito/accionesCarritoPersonalizar.php" method="POST">		
								<input type="hidden" name="accion" id="accion" value="procesarPago" />
								<input type="hidden" name="IDArticulo" id="IDArticulo" value="<?=$IDArticulo?>" />
								<input type="hidden" name="cantidad" id="cantidad" value="<?=$campos['cantidad']?>" />
								<input type="text" name="Descuento" id="Descuento" value="<?=$Descuento?>" />
								<input type="submit" name="aplicarDescuento" id="aplicarDescuento" value="aplicar Descuento" />
							</form>
						</td>
						<td class="precios">$ <?=number_format($Importe, 2, '.', ',')?></td>
					</tr>
					
			<?php	}	
			
					$IVA = $subTotal * 0.08;	
					$importeTotal = $subTotal + $IVA;
			?>
					<tr>
						<td colspan="6" class="precios">subtotal:</td>	
						<td class="precios">$ <?=number_format($subTotal, 2, '.', ',')?></td>
						
					</tr>
					<tr>
						<td colspan="6" class="precios">IVA: </td>	
						<td class="precios">$ <?=number_format($IVA, 2, '.', ',')?></td>
						
					</tr>
					<tr>
						<th colspan="6" class="precios">IMPORTE TOTAL</th>	
						<th class="precios"><h2>$<?=number_format($importeTotal, 2, '.', ',')?></th>						
					</tr>
					<tr>
					<td colspan="5"></td>	
					<td colspan="5">
						<input type="button" value="Anterior" onclick=self.location="<?=ROOTURL?>?accion=carrito" />
						<input type="button" value="Seleccionar m&eacute;todo de pago" onclick=self.location="<?=ROOTURL?>?accion=pagar" />
					</td>
				</tr>
			</table>
	
<?php } else {	?>
		
			<br>
			<h2>No tienes Libros en tu carrito</h2>
<?php }?>
</div>