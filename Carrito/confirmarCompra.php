
<?php
	if(isset($_SESSION['carrito']) && isset($_SESSION['cliente_session'])) //Indica si hay artículos en tu carrito y si ha iniciado sesión el usuario(Cliente)
	{		
?>
	<form id="frmConfirmar" id="frmConfirmar" action="Carrito/addCompra.php" method="POST">
		<fieldset>
			<input type="hidden" name="accion" id="accion" value="addCompra" />
			<input type="hidden" name="IDCliente" id="IDCliente" value="<?=$_SESSION['cliente_session']?>" />
			<h2 class="fs-title">Confirmar compra!!!</h2>
		
			<table id="listCompra"> 
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
			$descuento = 0;
			foreach($_SESSION['carrito'] as $IDArticulo => $campos)
			{
				$datosArticulo=getDetalleArticulo($IDArticulo);
				$Importe = $datosArticulo['PrecioActual']*$campos['cantidad'] - $campos['Descuento'];
				$subTotal += $Importe;
				$cantArticulos += $campos['cantidad'];
				$descuento += $campos['Descuento'];
				
			?>		<!-- UTILIZAR EN LA TABLA VENTA DETALLE-->	
					<input type="hidden" name="listArticulos[<?=$IDArticulo?>][IDArticulo]" id="listArticulos[<?=$IDArticulo?>][IDArticulo]" value="<?=$IDArticulo?>" />
					<input type="hidden" name="listArticulos[<?=$IDArticulo?>][Precio]" id="listArticulos[<?=$IDArticulo?>][Precio]" value="<?=$datosArticulo['PrecioActual']?>" />
					<input type="hidden" name="listArticulos[<?=$IDArticulo?>][Cantidad]" id="listArticulos[<?=$IDArticulo?>][Cantidad]" value="<?=$campos['cantidad']?>" />
					<input type="hidden" name="listArticulos[<?=$IDArticulo?>][Descuento]" id="listArticulos[<?=$IDArticulo?>][Descuento]" value="<?=$campos['Descuento']?>" />
					<input type="hidden" name="listArticulos[<?=$IDArticulo?>][Importe]" id="listArticulos[<?=$IDArticulo?>][Importe]" value="<?=$Importe?>" />
			
					<tr>
						<td><?=$datosArticulo['IDArticulo']?></td>
						<td><?=$datosArticulo['NameArticulo']?></td>
						<td><?=$datosArticulo['Marca']?></td>
						<td class="precios">$ <?=number_format($datosArticulo['PrecioActual'], 2, '.', ',')?></td>
						<td><?=$campos['cantidad']?></td>
						<td class="precios">$ <?=number_format($campos['Descuento'], 2, '.', ',')?></td>
						<td class="precios">$ <?=number_format($Importe, 2, '.', ',')?></td>
					</tr>
					
			<?php	}	
			
					$IVA = $subTotal * 0.08;	
					$importeTotal = $subTotal + $IVA;
			?>
					<tr>
						<td colspan="6" class="precios">subtotal:</td>	
						<td class="precios"><?=number_format($subTotal, 2, '.', ',')?></td>
					</tr>
					<tr>
						<td colspan="6" class="precios">IVA: </td>	
						<td class="precios">$<?=number_format($IVA, 2, '.', ',')?></td>
					</tr>
					<tr>
						<th colspan="6" class="precios">IMPORTE TOTAL</th>	
						<th class="precios"><h2>$<?=number_format($importeTotal, 2, '.', ',')?></h2></th>
					</tr>
			</table>
			</br>
			
			<input type="hidden" name="cantArticulos" id="cantArticulos" value="<?=$cantArticulos?>"/>
			<input type="hidden" name="Descuento" id="Descuento"value="<?=$descuento?>" />
			<input type="hidden" name="subTotal" id="subTotal"value="<?=$subTotal?>" />
			<input type="hidden" name="IVA" id="IVA"value="<?=$IVA?>" />
			<input type="hidden" name="importeTotal" id="importeTotal"value="<?=$importeTotal?>" />
			
			<!-----------------Selecionar Tarjeta para procesar compra-------------------------->
			<label class="fs-subtitle">Selecciona el metodo de pago
				<select name="metodoPago" id="metodoPago" required>
					<option value="CREDITO">Tarjeta de Cr&eacute;dito</option>
					<option value="DEBITO">Tarjeta de D&eacute;bito</option>			
				</select>
			</label>
			
			<?php  $listTarjetas = getListTarjetas($_SESSION['cliente_session']);
				if($listTarjetas != null ) //null significa vacio
					{	?>
					<label class="fs-subtitle">Selecciona la tarjeta de pago
						<select name="infoMetodoPago" id="infoMetodoPago" required>
							
							<?php foreach($listTarjetas as $renglon=>$campos) 
									{	?>
										<option value="<?=$campos['Numero']?>"> <?=$campos['nombreTitular']?> - <?=substr_replace($campos['Numero'],"**** **** ****",0,12)?> </option>
							<?php 	}	?>
						</select>
					</label>
					</br></br>
					<input type="submit" name="submit" id="submit" class="submit action-button" value="CONFIRMAR" />
			<?php 	}else{	?>
					<br>
					<center>
						<h2>Tienes que registrar una tarjeta para proceder al pago</h2>
						<input type="button" value="Anterior" onclick=self.location="<?=ROOTURL?>?accion=carrito" />
						<input type="button" value="Registrar Tarjeta" onclick=self.location="<?=ROOTURL?>?accion=addTarjetas" />
					</center>	
			<?php 	}	?>			
			
		</fieldset>
	</form>
	
<?php } else {	?>
		
		<br>
		<center>
			<h2>Tienes que iniciar sesi&oacute;n para confirmar la compra</h2>
			<input type="button" value="Iniciar sesi&oacute;n" onclick=self.location="<?=ROOTURL?>?accion=login" />
		</center>			
<?php }?>