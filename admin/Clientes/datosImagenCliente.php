</br></br>
	<h2>Subir Foto de perfil del Cliente</h2>
	<p>Has elegido la funcionalidad de "Agregar imagen"</p>
</br>
<?php

$IDCliente =(isset($_GET['IDCliente'])) ? $_GET['IDCliente'] : null;

$DatosCliente=obtenerDatosCliente($IDCliente); //Se obtienen los datos del cliente para subir la...

	if($DatosCliente!==null)
		{ 
			$IDCliente = $DatosCliente['IDCliente'];
			$imagen = $DatosCliente['mostrarFoto'];
			$APaterno = $DatosCliente['APaterno'];
			$AMaterno = $DatosCliente['AMaterno'];
			$Nombre = $DatosCliente['Nombre'];
			$CorreoElectronico = $DatosCliente['CorreoElectronico'];
		}
?>
	<div id="datosCliente">
		<html>
			<body>
				<center>
					<form name="frmCliente" action="Clientes/clientes_SubirFoto.php" method="POST" enctype="multipart/form-data"> <!--nuevo -->
						<input type="hidden" name="IDClienteFoto" id="IDClienteFoto" value="<?=$IDCliente?>" />
						
						<br><h3>Subir imagen del Cliente</h3>
						
						<img src="<?=$imagen?>" />
						
						<label> IDCliente: <span>*</span>
								<input type="text" id="IDCliente" name="IDCliente" value="<?=$IDCliente?>" disabled />
						</label>
						
						<label> APaterno: <span>*</span>
								<input type="text"  name="txtAPaterno" placeholder="APaterno" value="<?=$APaterno?>" disabled />
						</label>
						
						<label> AMaterno: <span>*</span>
								<input type="text"  name="txtAMaterno" placeholder="AMaterno" value="<?=$AMaterno?>" disabled />
						</label>
						
						<label> Nombre: <span>*</span>
								<input type="text"  name="txtNombre" placeholder="Nombre" value="<?=$Nombre?>" disabled />
						</label>
						
						<label> CorreoElectronico: <span>*</span>
								<input type="text"  name="txtCorreoElectronico" placeholder="CorreoElectronico" value="<?=$CorreoElectronico?>" disabled />
						</label>
						
						<input type="file" id="uploadImage" name="uploadImage" /> <!--nuevo -->
						
						<input type="submit" name="btnRegistrar" value="subirImagen" />
					</form>
				</center>
			</body>
		</html>
	</div>		
		<div style="clear: both;">&nbsp;</div>