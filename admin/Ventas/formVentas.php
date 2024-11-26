<?php

$listClientes = obtenerListaClientes();
$listArticulos = obtenerListaArticulos();
$IDUsuario = $_SESSION['user_session']['IDUsuario'];
$IDArticulo = isset($_GET['IDArticulo'])?$_GET['IDArticulo']:null;
?>

</br><br>
	<h2>Registrar Venta</h2>
	<p>Has elegido la funcionalidad de "Registrar una Venta"</p>
</br>

<html>
	</body>
		<center>
			<form name="formVenta" id="formVenta" action="Ventas/formConfirmarVenta.php" method="POST">
				<input type="hidden" name="accion" id="accion" value="addVenta" />
				<input type="hidden" name="Estado" id="Estado" value="PROCESO" />
				<input type="hidden" name="IDUsuario" id="IDUsuario" value="<?=$IDUsuario?>" />
				
				<br><h3>Registrar venta</h3>
				
				<label>Selecciona el Cliente*
					<?php  if($listClientes != null ) //null significa vacio
							{	?>
							<select name="IDCliente" id="IDCliente" required>
								
								<?php foreach($listClientes as $renglon=>$campos) 
										{	?>
											<option value="<?=$campos['IDCliente']?>"> <?=$campos['APaterno']?>-<?=$campos['AMaterno']?>-<?=$campos['Nombre']?> </option>
								<?php 	}	?>
							</select>
					<?php 	}	?>
				</label></br>
				<label>Selecciona el Art&iacute;culo*
					<?php  if($listArticulos != null ) //null significa vacio
							{	?>
							<select name="IDArticulo" id="IDArticulo" required >
								
								<?php foreach($listArticulos as $renglon=>$campos) 
										{
											if($campos['CantidadDisponible']<>0 && $campos['Estado']=='DISPONIBLE'){ ?>
											<option value="<?=$campos['IDArticulo']?>" <?=$IDArticulo==$campos['IDArticulo']?'selected':''?> > <?=$campos['NameArticulo']?> - <?=$campos['Marca']?> -  $<?=$campos['PrecioActual']?></option>
										<?php 	}	?>	
								<?php 	}	?>
							</select>
					<?php 	}	?>
				</label></br>
				<label>Cantidad*
					<input type="text" name="Cantidad" id="Cantidad" required />
				</label>
				<label>Agredar Descuento*
					<input type="text" name="Descuento" id="Descuento" required />
				</label>
				<label class="fs-subtitle">Selecciona el metodo de pago
						<select name="metodoPago" id="metodoPago" required>
							<option value="EFECTIVO">EFECTIVO</option>
							<option value="CREDITO">Tarjeta de Cr&eacute;dito</option>
							<option value="DEBITO">Tarjeta de D&eacute;bito</option>			
						</select>
				</label>
				</br></br>
				
				<input type="submit" name="btnPago" id="btnPago" value="Visualizar Detalles" />
				
			</form>
		</center>
	</body>
</html>










