<html>
	</body>
		<center>
		<br>
				<form id="frmQueja" id="frmQueja" action="ComentariosCliente/registroQueja.php" method="POST">
					<input type="hidden" name="accion" id="accion" value="registroQueja" />
				  
				  <fieldset>
						<h2 class="fs-title">¡Presenta tu queja!</h2>
					
						<input type="text" name="Nombre" placeholder="Nombre" required /></br>
						
						<input type="text" name="APaterno" placeholder="Apellido Paterno" required /></br>
						
						<input type="text" name="AMaterno" placeholder="Apellido Materno" required /></br>
						
						<input type="text" name="CorreoElectronico" placeholder="Correo Electr&oacute;nico" required /></br>
						
						<input type="text" name="DetalleQueja" placeholder="Por favor, redacte su queja aqu&iacute;" required /></br>
						
						<label>Fecha de envio de queja: </br>
						<input type="date" name="FechaQueja" id="FechaQueja" required />
						</label></br>
						
						<input type="submit" name="submit" class="submit action-button" value="Enviar" /></br>
				  </fieldset>
				  
				</form>
		</center>
	</body>
</html>	