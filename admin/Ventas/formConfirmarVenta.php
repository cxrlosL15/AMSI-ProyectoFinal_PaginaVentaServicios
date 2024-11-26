<?php
require_once("../configuracion.php");

require_once(HEADERADMIN);

$IDUsuario = $_POST['IDUsuario'];
$accion = $_POST['accion'];
$IDCliente = $_POST['IDCliente'];
$IDArticulo = $_POST['IDArticulo'];
$Cantidad = $_POST['Cantidad'];
$Descuento = $_POST['Descuento'];
$metodoPago = $_POST['metodoPago'];

$datosCliente = obtenerDatosCliente($IDCliente);
$datosArticulo = obtenerDatosArticulo($IDArticulo);

$subTotal = $datosArticulo['PrecioActual']*$Cantidad - $Descuento;
$IVA = $subTotal * 0.08;	
$importeTotal = $subTotal + $IVA;

//print_r($_POST);
?>

</br><br>
	<h2>Visualizar Detalles de la Venta</h2>
</br>

<html>
	</body>
		<center>
			
			<form name="formVenta" id="formVenta" action="addVentas.php" method="POST">
				<input type="hidden" name="accion" id="accion" value="addVentas" />
				<input type="hidden" name="Estado" id="Estado" value="CONFIRMADO" />
				<input type="hidden" name="IDUsuario" id="IDUsuario" value="<?=$IDUsuario?>" />
				<input type="hidden" name="IDCliente" id="IDCliente" value="<?=$IDCliente?>"  />
				<input type="hidden" name="IDArticulo" id="IDArticulo" value="<?=$IDArticulo?>"  />
				
				<br><h3>Confirmar Compra</h3>
				
				<label>Cliente*
					<input type="text" name="datosCliente" id="datosCliente" value="<?=$datosCliente['Nombre']?> <?=$datosCliente['APaterno']?> <?=$datosCliente['AMaterno']?>" readonly  />
				</label></br>
				<label>Art&iacute;culo*
					<input type="text" name="datosCliente" id="datosCliente" value="<?=$datosArticulo['NameArticulo']?> <?=$datosArticulo['Marca']?>" readonly />
				</label></br>
				<label>Precio*
					<input type="text" name="Precio" id="Precio" value="<?=$datosArticulo['PrecioActual']?>" readonly />
				</label></br>
				<label>Cantidad*
					<input type="text" name="Cantidad" id="Cantidad" value="<?=$Cantidad?>" readonly />
				</label>
				<label>Descuento*
					<input type="text" name="Descuento" id="Descuento" value="<?=$Descuento?>" readonly />
				</label></br>
				<label>Metodo de pago*
					<input type="text" name="metodoPago" id="metodoPago" value="<?=$metodoPago?>" readonly />
				</label></br></br>
				<label>SubTotal*
					<input type="text" name="subTotal" id="subTotal" value="<?=$subTotal?>" readonly />
				</label></br></br>
				<label>IVA*
					<input type="text" name="IVA" id="IVA" value="<?=$IVA?>" readonly />
				</label></br></br>
				<label>Total*
					<input type="text" name="importeTotal" id="importeTotal" value="<?=$importeTotal?>" readonly />
				</label></br></br>
				<input type="submit" name="btnPago" id="btnPago" value="Registrar Venta" />
				
			</form>
		</center>
	</body>
</html>	
		
		
<?php include_once(FOOTERADMIN);?>









