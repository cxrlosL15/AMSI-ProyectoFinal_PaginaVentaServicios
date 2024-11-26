<?php

require_once('../configuracion.php');
include_once('../MySqli_conexiondb.php');

echo $accion = $_POST['accion'];
$APaterno = $_POST['APaterno'];
$AMaterno = $_POST['AMaterno'];
$Nombre = $_POST['Nombre'];
$CorreoElectronico = $_POST['CorreoElectronico'];

	require_once(HEADERADMIN);

		if($accion=="addCliente")
		{ 
			//INSERT INTO nombreTabla (nombreCampo1, nombreCampo2, nombreCampo3, ...) VALUES (valorCampo1, valorCampo2, valorCampo3, ...)
			$query ="INSERT INTO clientes (APaterno, AMaterno, Nombre, CorreoElectronico) VALUES ('$APaterno', '$AMaterno', '$Nombre', '$CorreoElectronico')";
exit;
			$resultado = mysqli_query($conexion,$query);
				if(!$resultado)
				{	?>
						
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Error al intentar registrar los datos del Cliente!!<?=mysqli_error($conexion)?></h3>
										<br><input type="button" value="Ir a la lista de Clientes" onclick=self.location="<?=ROOTURL?>?accion=listClientes" />
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
										<h3>¡¡Cliente Registrado!!</h3>
										<br><input type="button" value="Ir a la lista de Clientes" onclick=self.location="<?=ROOTURL?>?accion=listClientes" />
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
										<br><input type="button" value="Ir a la lista de Clientes" onclick=self.location="<?=ROOTURL?>?accion=listClientes" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>
			
<?php	} ?>
<?php	require_once(FOOTERADMIN);	?>