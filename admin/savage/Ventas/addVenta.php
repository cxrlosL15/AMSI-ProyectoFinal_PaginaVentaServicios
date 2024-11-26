<?php


require_once('../configuracion.php');
include_once('../MySqli_conexiondb.php');

$accion = $_POST['accion'];
$IDCliente = $_POST['IDCliente'];
$IDArticulo = $_POST['IDArticulo'];
$PrecioVenta = $_POST['PrecioVenta'];
$Cantidad = $_POST['Cantidad'];
$Importe = $PrecioVenta * $Cantidad;
$FechaVenta = $_POST['FechaVenta'];
$Estado = $_POST['Estado'];

require_once(HEADERADMIN);
	
		if($accion=="addVenta")
		{ 
			//INSERT INTO nombreTabla (nombreCampo1, nombreCampo2, nombreCampo3, ...) VALUES (valorCampo1, valorCampo2, valorCampo3, ...)
			$query ="INSERT INTO ventas (IDCliente, IDArticulo, PrecioVenta, Cantidad, Importe, FechaVenta,  Estado) VALUES ('$IDCliente', '$IDArticulo', '$PrecioVenta', '$Cantidad',  '$Importe', '$FechaVenta', '$Estado')";

			$resultado = mysqli_query($conexion,$query);
				if(!$resultado)
				{	?>
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Error al intentar registrar la venta!!<?=mysqli_error($conexion)?></h3>
										<br><input type="button" value="Ir a la lista de Ventas" onclick=self.location="<?=ROOTURL?>?accion=listVentas" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>	
<?php 			}else{	?>
						
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Venta registrada!!</h3>
										<br><input type="button" value="Ir a la lista de Ventas" onclick=self.location="<?=ROOTURL?>?accion=listVentas" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>	
<?php				} ?>

<?php 	}else	{ ?>

						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
									<h3>¡¡Opci&oacute;n incorrecta!!</h3>
									<br><input type="button" value="Ir a la lista de Ventas" onclick=self.location="<?=ROOTURL?>?accion=listVentas" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>	
<?php	} ?>
<?php	require_once(FOOTERADMIN);	?>
