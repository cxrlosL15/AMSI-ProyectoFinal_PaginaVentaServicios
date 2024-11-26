</br></br>
	<h2>Eliminar Queja</h2>
	<p>Has elegido la funionalidad de "Eliminar datos de la Queja"</p>
</br>

<?php
	include_once('MySqli_conexiondb.php');

	$IDQueja = (isset($_GET['IDQueja']))?$_GET['IDQueja']:null;
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
				<h3>Eliminar datos de la queja</h3>
				<h4>¿Estás seguro de eliminar el registro de la queja?</h4>
				<br>
				<input type="button" value="Si" onclick=self.location="<?=ROOTURL?>?accion=deleteQueja&IDQueja=<?=$IDQueja?>&respuesta=si" />
				<input type="button" value="No" onclick=self.location="<?=ROOTURL?>?accion=listQuejas" />
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
		$query = "DELETE FROM quejas WHERE IDQueja=".$IDQueja;
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
					<h3>¡¡Error al intentar eliminar la queja del cliente!!<?=mysqli_error($conexion)?></h3>
					<input type="button" value="Ir a la lista de Quejas" onclick=self.location="<?=ROOTURL?>?accion=listQuejas" />
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
					<h3>¡¡Registro de la queja eliminada!!</h3>
					<input type="button" value="Ir a la lista de Quejas" onclick=self.location="<?=ROOTURL?>?accion=listQuejas" />
					<br>
					</center>
				</form>
				</div>
				</body>
			</html>	
			
		<?php	}

	}
	
?>