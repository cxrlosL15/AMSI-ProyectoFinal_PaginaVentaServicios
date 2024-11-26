</br></br>
	<h2>Subir Foto de perfil del Usuario</h2>
	<p>Has elegido la funcionalidad de "Agregar imagen"</p>
</br>
<?php

$IDUsuario =(isset($_GET['IDUsuario'])) ? $_GET['IDUsuario'] : null;

$DatosUsuario=obtenerDatosUsuario($IDUsuario); //Se obtienen los datos del usuario para subir la...

	if($DatosUsuario!==null)
		{ 
			$IDUsuario = $DatosUsuario['IDUsuario'];
			$imagen = $DatosUsuario['mostrarFoto'];
			$APaterno = $DatosUsuario['APaterno'];
			$AMaterno = $DatosUsuario['AMaterno'];
			$Nombre = $DatosUsuario['Nombre'];
			$Puesto = $DatosUsuario['Puesto'];
			$Estado = $DatosUsuario['Estado'];
			$Sucursal = $DatosUsuario['Sucursal'];
			//$NombreUsuario = $DatosUsuario['NombreUsuario'];
			//$Contrasena = $DatosUsuario['Contrasena']
		}
?>
	<div id="datosUsuario">
		<html>
			<body>
				<center>
					<form name="frmUsuario" action="Usuarios/usuarios_SubirFoto.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" id="IDUsuarioFoto" name="IDUsuarioFoto" value="<?=$IDUsuario?>" />
						
						<br><h3>Subir imagen del Usuario</h3>
						<center><img src="<?=$imagen?>" /></center></br>
						
						<label> IDUsuario: <span>*</span>
							<input type="text" id="IDUsuario" name="IDUsuario" value="<?=$IDUsuario?>" disabled />
						</label>
						
						<label> APaterno: <span>*</span>
							<input type="text"  name="txtAPaterno" placeholder="APaterno" value="<?=$APaterno?>" disabled />
						</label>
						
						<label> AMaterno: <span>*</span>
							<input type="text"  name="txtAMaterno" placeholder="AMaterno" value="<?=$AMaterno?>" disabled />
						</label>
						
						<label> Nombre: <span>*</span>
							<input type="text"  name="txtNombre" placeholder="Nombre" value="<?=$Nombre?>" disabled />
						</label></br>
						
						<label> Puesto: <span>*</span></br>
							<input type="text"  name="txtPuesto" placeholder="Puesto" value="<?=$Puesto?>" disabled />
						</label></br>
						
						<label> Estado: <span>*</span></br>
							<input type="text"  name="txtEstado" placeholder="Estado" value="<?=$Estado?>" disabled />
						</label>
						
						<label> Sucursal: <span>*</span></br>
							<input type="text"  name="txtEstado" placeholder="Sucursal" value="<?=$Sucursal?>" disabled />
						</label>
						
						<!--Código eliminado-->
						
						<input type="file" id="uploadImage" name="uploadImage" />
						
						<input type="submit" name="btnRegistrar" value="subirImagen" />
				</center>
			</body>
		</html>
	</div>				
		<div style="clear: both;">&nbsp;</div>