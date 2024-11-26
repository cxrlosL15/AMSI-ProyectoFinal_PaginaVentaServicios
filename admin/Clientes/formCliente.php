</br><br>
	<h2>Registrar Cliente</h2>
	<p>Has elegido la funcionalidad de "Registrar datos del Cliente"</p>
</br>
<html>
	</body>
		<center>
			<form name="frmCliente" id="frmCliente" action="Clientes/addCliente.php" method="POST">
				<input type="hidden" name="accion" id="accion" value="addCliente" />
				
				<link rel="StyleSheet" href="<?=ESTILOS?>" type="text/css" />
				
				<br><h3>Registro del Cliente</h3>
				
				<label>Apellido Paterno
					<input type="text" name="APaterno" id="APaterno" required />
				</label></br>
				
				<label>Apellido Materno
					<input type="text" name="AMaterno" id="AMaterno" required />
				</label></br>
				
				<label>Nombre
					<input type="text" name="Nombre" id="Nombre" required />
				</label></br>
				
				<label>Correo Electr&oacute;nico
					<input type="text" name="CorreoElectronico" id="CorreoElectronico" required />
				</label></br><br>
				
				<input type="submit" name="btnRegistrar" id="btnRegistrar" value="Registrar" />
			</form>
		</center>
	</body>
</html>		