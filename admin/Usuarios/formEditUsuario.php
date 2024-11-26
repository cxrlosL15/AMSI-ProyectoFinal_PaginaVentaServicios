</br></br>
	<h2>Modificar Usuarios</h2>
	<p>Has elegido la funcionalidad de "Modificar datos del Usuario"</p>
</br>

<?php

$IDUsuario = $_GET['IDUsuario'];

$datosUsuario = obtenerDatosUsuario($IDUsuario);

		if($datosUsuario!=null)
		{?>
			<html>
				<body>
					<center>
						<form name="frmEditUsuario" id="frmEditUsuario" action="Usuarios/updateUsuario.php" method="POST">
							
							<br><h3 class="titulosform">Modificar datos del Usuario</h3>
							
							<input type="hidden" name="accion" id="accion" value="updateUsuario" />
							<input type="hidden" name="IDUsuario" id="IDUsuario"  value="<?=$datosUsuario['IDUsuario']?>" />
							
							<label>IDUsuario: <?=$datosUsuario['IDUsuario']?>
							</label></br>
							
							<label>Apellido Paterno
								<input type="text" name="APaterno" id="APaterno" value="<?=$datosUsuario['APaterno']?>"  required />
							</label></br>
							
							<label>Apellido Materno
								<input type="text" name="AMaterno" id="AMaterno"  value="<?=$datosUsuario['AMaterno']?>" required />
							</label></br>
							
							<label>Nombre</br>
								<input type="text" name="Nombre" id="Nombre"  value="<?=$datosUsuario['Nombre']?>" required />
							</label></br>
							
							<label>Nombre de usuario
								<input type="text" name="NombreUsuario" id="NombreUsuario"  value="<?=$datosUsuario['NombreUsuario']?>" required />
							</label></br>
							
							<label>Contraseña
								<input type="text" name="Contrasena" id="Contrasena"  value="<?=$datosUsuario['Contrasena']?>" required />
							</label></br>
							
							<label>¿Cuál es el Estado del Usuario?
							<select name="Estado" id="Estado" value="<?=$datosUsuario['Estado']?>"   required  >
								  <option selected>ACTIVO
								  <option>BLOQUEADO
								  <option>INACAPACIDAD
								  <option>BAJA
								  <option>VACACIONES
							</select >
							</label><br>
							
							<label>Puesto
							<select name="Puesto" id="Puesto" value="<?=$datosUsuario['Puesto']?>"   required  >
								  <option selected><?=$datosUsuario['Puesto']?>
								  <option>CAPTURISTA
								  <option>SUPERVISOR
								  <option>GERENTE
								  <option>SUPERADMIN
							</select >
							</label><br><br>

							<label>Sucursal
							<select name="Sucursal" id="Sucursal" value="<?=$datosUsuario['Sucursal']?>"   required  >
									<option selected><?=$datosUsuario['Sucursal']?>
									<option>TIJUANA
									<option>ENSENADA
									<option>ROSARITO
							</select >
							</label><br><br>
							
					
							<input type="submit" name="btnActualizar" id="btnActualizar" value="Actualizar datos" />
						</form>
					</center>
				</body>
			</html>
<?php	}

?>