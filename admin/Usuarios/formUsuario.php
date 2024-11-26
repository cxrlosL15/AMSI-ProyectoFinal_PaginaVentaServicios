</br><br>
	<h2>Registrar Usuario</h2>
	<p>Has elegido la funcionalidad de "Registrar datos del Usuario"</p>
</br>
<html>
	</body>
		<center>
			<form name="frmUsuario" id="frmUsuario" action="Usuarios/addUsuario.php" method="POST">
				<input type="hidden" name="accion" id="accion" value="addUsuario" />
				<input type="hidden" name="Estado" id="Estado" value="ACTIVO"	/>
				
				<link rel="StyleSheet" href="<?=ESTILOS?>" type="text/css" />
				
				<br><h3>Registro del Usuario</h3>
				
				<label>Apellido Paterno*
					<input type="text" name="APaterno" id="APaterno" required />
				</label></br>
				
				<label>Apellido Materno*
					<input type="text" name="AMaterno" id="AMaterno" required />
				</label></br>
				
				<label>Nombre*
					<input type="text" name="Nombre" id="Nombre" required />
				</label></br>
				
				<label>Nombre de usuario*
					<input type="text" name="NombreUsuario" id="NombreUsuario" required />
				</label></br>
				
				<label>Contraseña*
					<input type="text" name="Contrasena" id="Contrasena" required />
				</label></br>
				
				<label> Estado* </br>
					<input  type="text" name="Estado" id="Estado" value="ACTIVO"   disabled  />
				</label> </br>
				
				<label>Puesto
							<select name="Puesto" id="Puesto" value="Puesto"   required  >
								  <option selected>CAPTURISTA
								  <option>SUPERVISOR
								  <option>GERENTE
								  <option>SUPERADMIN
							</select >
				</label><br><br>

				<label>Sucursal
							<select name="Sucursal" id="Sucursal" value="Sucursal"   required  >
								  <option selected>TIJUANA
								  <option>ENSENADA
								  <option>ROSARITO
							</select >
				</label><br><br>
				
				<input type="submit" name="btnRegistrar" id="btnRegistrar" value="Registrar" />
			</form>
		</center>
	</body>
</html>		