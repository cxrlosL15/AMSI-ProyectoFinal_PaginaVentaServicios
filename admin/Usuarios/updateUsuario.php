<?php

require_once('../configuracion.php');
include_once('../MySqli_conexiondb.php');

$accion = $_POST['accion'];
$IDUsuario = $_POST['IDUsuario'];
$APaterno = $_POST['APaterno'];
$AMaterno = $_POST['AMaterno'];
$Nombre = $_POST['Nombre'];
$NombreUsuario = $_POST['NombreUsuario'];
$Contrasena = $_POST['Contrasena'];
$Estado = $_POST['Estado'];
$Puesto = $_POST['Puesto'];
$Sucursal = $_POST['Sucursal'];

require_once(HEADERADMIN);

		if($accion=="updateUsuario")
		{ 
		//UPDATE nombreTabla SET nombreCampo1 = nuevoValorCampo1, nombreCampo2 = NuevoValorCampo2, nombreCampo3 = nuevoValorCampo3 WHERE nombreCampo=ValorBuscar
		$query= "UPDATE usuarios SET APaterno='$APaterno', AMaterno='$AMaterno', Nombre='$Nombre', NombreUsuario='$NombreUsuario', Contrasena='$Contrasena', Estado='$Estado', Puesto='$Puesto', Sucursal='$Sucursal' WHERE IDUsuario='$IDUsuario'";
		$resultado = mysqli_query($conexion,$query);
				if(!$resultado)
				{	?>
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Error al intentar actualizar los datos del Usuario!!<?=mysqli_error($conexion)?></h3>
										<input type="button" value="Ir a la lista de Usuarios" onclick=self.location="<?=ROOTURL?>?accion=listUsuarios" />
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
										<h3>¡¡Datos del Usuario Actualizados!!</h3>
										<input type="button" value="Ir a la lista de Usuarios" onclick=self.location="<?=ROOTURL?>?accion=listUsuarios" />
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
										<h3>¡¡Opci&oaccute;n incorrecta!!</h3>
										<input type="button" value="Ir a la lista de Usuarios" onclick=self.location="<?=ROOTURL?>?accion=listUsuarios" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>		
<?php			}	?>
<?php	require_once(FOOTERADMIN);	?>