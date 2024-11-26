</br></br>
	<h2>Eliminar Cliente</h2>
	<p>Has elegido la funionalidad de "Eliminar datos del Cliente"</p>
</br>

<?php
	include_once('MySqli_conexiondb.php');

	$IDCliente = (isset($_GET['IDCliente']))?$_GET['IDCliente']:null;
	$respuesta = (isset($_GET['respuesta']))?$_GET['respuesta']:null;

	if(!$respuesta)
	{
?>
	<html>
		<body>
		<div id="deleteform">
		<form>
			<center>
				<br>
				<h3>Eliminar datos del Cliente</h3>
				<h4>¿Estás seguro de eliminar el registro del cliente?</h4>
				<br>
				<input type="button" value="Si" onclick=self.location="<?=ROOTURL?>?accion=deleteCliente&IDCliente=<?=$IDCliente?>&respuesta=si" />
				<input type="button" value="No" onclick=self.location="<?=ROOTURL?>?accion=listClientes" />
				<br>
			</center>
		</form>
		</div>
		</body>
	</html>	
<?php } ?>

<?php 
	if($respuesta=="si")
	{
		//DELETE FROM nombreTabla WHERE nombreCampo=ValorBuscar
		$query = "DELETE FROM clientes WHERE IDCliente=".$IDCliente;
		$resultado = mysqli_query($conexion,$query);
		if(!$resultado)
		{
			
		?>
			<html>
				<body>
				<div id="deleteform">
				<form>
					<center>
					<br>
					<h3>¡¡Error al intentar eliminar el registro del cliente!!<?=mysqli_error($conexion)?></h3>
					<input type="button" value="Ir a la lista de Clientes" onclick=self.location="<?=ROOTURL?>?accion=listClientes" />
					<br>
					</center>
				</form>
				</div>
				</body>
			</html>		
							
<?php	} else {	?>

			<html>
				<body>
				<div id="deleteform">
				<form>
					<center>
					<br>
					<h3>¡¡Registro del cliente eliminado!!</h3>
					<input type="button" value="Ir a la lista de Clientes" onclick=self.location="<?=ROOTURL?>?accion=listClientes" />
					<br>
					</center>
				</form>
				</div>
				</body>
			</html>	
			
		<?php	}

	}
	
?>