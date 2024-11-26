<?php

$listClientes = obtenerListaClientes();
$listArticulos = obtenerListaArticulos();

?>

<br><br><h2>Registro de Ventas</h2>
<p>Has elegido la funcionalidad de "Registrar una Venta"</p>
<br>

<center>
	<form name="formVenta" id="formVenta" action="Ventas/addVenta.php" method="POST">
		<input type="hidden" name="accion" id="accion" value="addVenta" />
		<input type="hidden" name="Estado" id="Estado" value="CONFIRMADA" />
		<input type="hidden" name="ventaEn" id="ventaEn" value="WEB" />
		<input type="hidden" name="ImporteTotal" id="ImporteTotal" value="ImporteTotal" />
		
		<br><h3>Registrar Venta</h3>
		
		<label>Selecciona el cliente*
			<?php if($listClientes != null )
					{	?>
					<select name="IDCliente" id="IDCliente" required>		
				
						<?php	foreach($listClientes as $renglon=>$campos)
								{	if($campos['CantidadDisponible']<>0 && $campos['Estado']==1)
									?>
									<option value="<?=$campos['IDCliente']?>"  > <?=$campos['APaterno']?> - <?=$campos['AMaterno']?> - <?=$campos['Nombre']?> </option>
						<?php	}	?>
					</select>
			<?php	}	?>
			
		</label><br>
		
		<label>Selecciona el Art&iacute;culo*
			<?php if($listArticulos != null )
					{	?>
					<select name="IDArticulo" id="IDArticulo" required>		
				
						<?php	foreach($listArticulos as $renglon=>$campos)
								{	?>
									<option value="<?=$campos['IDArticulo']?>"> <?=$campos['NameArticulo']?> - <?=$campos['Marca']?> - $<?=$campos['PrecioActual']?> - <?=$campos['FechaRegistro']?> </option>
						<?php	}	?>
					</select>
			<?php	}	?>
		</label></br>
		
		<label>Metodo de pago*
			<input type="text" name="metodoPago" id="metodoPago" required />
		</label></br>
		
		<label>Precio de Venta*
			<input type="text" name="PrecioVenta" id="PrecioVenta" required />
		</label></br>
		
		<label>Cantidad*<br>
			<input type="text" name="Cantidad" id="Cantidad" required />
		</label></br>
		
		</label>Fecha de la Venta*
			<input type="date" name="FechaVenta" id="FechaVenta" required />
		</label></br>

		<input type="submit" name="btnRegistrar" id="btnRegistrar" value="Registrar Venta" />
		
	</form>
</center>