	<center>
		<form name="formLogin" id="formLogin" action="Login/login_process.php" method="POST">
			<input type="hidden" name="accion" id="accion" value="login" />
			
			<fieldset>
			<h2 class="fs-title">Inicio de sesi&oacute;n</h2>
			
			<label class="fs-subtitle">Escribe Correo Electr&oacute;nico:
			<input type="text" name="CorreoElectronico" id="CorreoElectronico" required />
			</label></br>
			<label class="fs-subtitle">Escribe contrase&ntilde;a:
			<input type="password" name="Contrasena" id="Contrasena" required />
			</label></br>
			<input type="submit" name="btnLogin" id="btnLogin" value="Iniciar sesi&oacute;n" />
			</fieldset>
		</form>
	</center>