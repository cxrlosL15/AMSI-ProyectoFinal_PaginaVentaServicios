<?php

require_once('../configuracion.php');
include_once('../MySqli_conexiondb.php');

$accion = $_POST['accion'];
$APaterno = $_POST['APaterno'];
$AMaterno = $_POST['AMaterno'];
$Nombre = $_POST['Nombre'];
$NombreUsuario = $_POST['NombreUsuario'];
$Contrasena = $_POST['Contrasena'];
$Estado = $_POST['Estado'];
$Puesto = $_POST['Puesto'];
$Sucursal = $_POST['Sucursal'];

	require_once(HEADERADMIN);

		if($accion=="addUsuario")
		{ 
			//INSERT INTO nombreTabla (nombreCampo1, nombreCampo2, nombreCampo3, ...) VALUES (valorCampo1, valorCampo2, valorCampo3, ...)
			$query ="INSERT INTO usuarios (APaterno, AMaterno, Nombre, NombreUsuario, Contrasena, Estado, Puesto, Sucursal) VALUES ('$APaterno', '$AMaterno', '$Nombre', '$NombreUsuario', '$Contrasena', 'ACTIVO', '$Puesto', '$Sucursal')";

			$resultado = mysqli_query($conexion,$query);
				if(!$resultado)
				{	?>
						
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Error al intentar registrar los datos del Usuario!!<?=mysqli_error($conexion)?></h3>
										<br><input type="button" value="Ir a la lista de Usuarios" onclick=self.location="<?=ROOTURL?>?accion=listUsuarios" />
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
										<h3>¡¡Usuario Registrado!!</h3>
										<br><input type="button" value="Ir a la lista de Usuarios" onclick=self.location="<?=ROOTURL?>?accion=listUsuarios" />
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
										<h3>¡¡Opci&oaccute;n incorrecta!!</h3>
										<br><input type="button" value="Ir a la lista de Usuarios" onclick=self.location="<?=ROOTURL?>?accion=listUsuarios" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>
			
<?php	} ?>
<?php	require_once(FOOTERADMIN);	?>