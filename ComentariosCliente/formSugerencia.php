<html>
	</body>
		<center>
		<br>
				<form id="frmSugerencia" id="frmSugerencia" action="ComentariosCliente/registroSugerencia.php" method="POST">
					<input type="hidden" name="accion" id="accion" value="registroSugerencia" />
				  
				  <fieldset>
						<h2 class="fs-title">¡Presenta tu sugerencia!</h2>
					
						<input type="text" name="Nombre" placeholder="Nombre" required /></br>
						
						<input type="text" name="APaterno" placeholder="Apellido Paterno" required /></br>
						
						<input type="text" name="AMaterno" placeholder="Apellido Materno" required /></br>
						
						<input type="text" name="CorreoElectronico" placeholder="Correo Electr&oacute;nico" required /></br>
						
						<input type="text" name="DetalleSugerencia" placeholder="Por favor, redacte su sugerencia aqu&iacute;" required /></br>
						
						<label>Fecha de envio de sugerencia: </br>
						<input type="date" name="FechaSugerencia" id="FechaSugerencia" required />
						</label></br>
						
						<input type="submit" name="submit" class="submit action-button" value="Enviar" /></br>
				  </fieldset>
				</form>
		</center>
	</body>
</html>	