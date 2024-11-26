<form id="frmTarjeta" id="frmTarjeta" action="Cliente/addTarjeta.php" method="POST">

	<input type="hidden" name="accion" id="accion" value="addTarjeta" />
	
	<input type="hidden" name="IDCliente" id="IDCliente" value="<?=$_SESSION['cliente_session']?>" />
	
  <!-- fieldsets -->
  <fieldset>
  
    <h2 class="fs-title">Registro de tarjeta!!!</h2>
	
		<input type="text" 	name="NombreTitular" id="NombreTitular" placeholder="Nombre Titular" />
		
		<input type="text" name="Numero" id="Numero" placeholder="Numero" />
		
		<input type="date" name="FechaVencimiento" id="FechaVencimiento" placeholder="Fecha vencimiento" />
		
		<input type="password" name="CVC" id="CVC" placeholder="CVC" />   
		
		<input type="submit" name="submit" id="submit" class="submit action-button" value="Enviar" />
  
  </fieldset>
</form>
