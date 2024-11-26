</br></br>
	<h2>Modificar Cliente</h2>
	<p>Has elegido la funcionalidad de "Modificar datos del Cliente"</p>
</br>

<?php

$IDCliente = $_GET['IDCliente'];

$datosCliente = obtenerDatosCliente($IDCliente);

		if($datosCliente!=null)
		{?>
			<html>
				<body>
					<center>
						<form name="frmEditCliente" id="frmEditCliente" action="Clientes/updateCliente.php" method="POST">
							
							<br><h3 class="titulosform">Modificar datos del Cliente</h3>
							
							<input type="hidden" name="accion" id="accion" value="updateCliente" />
							<input type="hidden" name="IDCliente" id="IDCliente"  value="<?=$datosCliente['IDCliente']?>" />
							
							<label>IDCliente: <?=$datosCliente['IDCliente']?>
							</label></br>
							
							<label>Apellido Paterno
								<input type="text" name="APaterno" id="APaterno" value="<?=$datosCliente['APaterno']?>"  required />
							</label></br>
							
							<label>Apellido Materno
								<input type="text" name="AMaterno" id="AMaterno"  value="<?=$datosCliente['AMaterno']?>" required />
							</label></br>
							
							<label>Nombre
								<input type="text" name="Nombre" id="Nombre"  value="<?=$datosCliente['Nombre']?>" required />
							</label></br>
							
							<label>Correo Electr&oacute;nico
								<input type="text" name="CorreoElectronico" id="CorreoElectronico"  value="<?=$datosCliente['CorreoElectronico']?>" required />
							</label></br>
							
							<input type="submit" name="btnActualizar" id="btnActualizar" value="Actualizar datos" />
						</form>
					</center>
				</body>
			</html>
<?php	}

?>