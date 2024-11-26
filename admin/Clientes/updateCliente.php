<?php

require_once('../configuracion.php');
include_once('../MySqli_conexiondb.php');

$accion = $_POST['accion'];
$IDCliente = $_POST['IDCliente'];
$APaterno = $_POST['APaterno'];
$AMaterno = $_POST['AMaterno'];
$Nombre = $_POST['Nombre'];
$CorreoElectronico = $_POST['CorreoElectronico'];

require_once(HEADERADMIN);

		if($accion=="updateCliente")
		{ 
		//UPDATE nombreTabla SET nombreCampo1 = nuevoValorCampo1, nombreCampo2 = NuevoValorCampo2, nombreCampo3 = nuevoValorCampo3 WHERE nombreCampo=ValorBuscar
		$query= "UPDATE clientes SET APaterno='$APaterno', AMaterno='$AMaterno', Nombre='$Nombre', CorreoElectronico='$CorreoElectronico' WHERE IDCliente='$IDCliente'";
		$resultado = mysqli_query($conexion,$query);
				if(!$resultado)
				{	?>
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Error al intentar actualizar los datos del Cliente!!<?=mysqli_error($conexion)?></h3>
										<input type="button" value="Ir a la lista de Clientes" onclick=self.location="<?=ROOTURL?>?accion=listClientes" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>	
<?php 		}else{	?>
						
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Datos del Cliente Actualizados!!</h3>
										<input type="button" value="Ir a la lista de Clientes" onclick=self.location="<?=ROOTURL?>?accion=listClientes" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>	
<?php			}	 ?>

<?php 	}else	{ ?>
						
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Opci&oacute;n incorrecta!!</h3>
										<input type="button" value="Ir a la lista de Clientes" onclick=self.location="<?=ROOTURL?>?accion=listClientes" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>		
<?php			}	?>
<?php	require_once(FOOTERADMIN);	?>