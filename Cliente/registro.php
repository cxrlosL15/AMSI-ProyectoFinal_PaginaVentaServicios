
<html>

	<body>
		<center>
				<form id="frmRegistro" id="frmRegistro" action="Cliente/registroCliente.php" method="POST">
					<input type="hidden" name="accion" id="accion" value="registroCliente" />
				  <!-- fieldsets -->
				  <fieldset>
						<h2 class="fs-title">¡¡¡Registrate!!!</h2>
					
						<input type="text" name="Nombre" placeholder="Nombre" required></br>
						
						<input type="text" name="APaterno" placeholder="Apellido Paterno" required></br>
						
						<input type="text" name="AMaterno" placeholder="Apellido Materno" required></br>
						
						<input type="text" name="CorreoElectronico" placeholder="Correo Electr&oacute;nico" required></br>
						
						<div id= contra>
						<input 
            				type="password" 
            				name="Contrasena" 
            				placeholder="Escribir Contrase&ntilde;a" 
            				id="myPswd" 
            				required>


						<div class="checkbox-container">
						<input type="checkbox" onclick="myContra()"> 
						<label for="myPswd">Ver Contraseña</label>
						</div>

						</div>
						<input type="submit" name="submit" class="submit action-button" value="Enviar" required></br>
				  </fieldset>
				</form>
		</center>
	</body>
	<script>
        function myContra() {
            const passwordField = document.getElementById("myPswd");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
</html>

