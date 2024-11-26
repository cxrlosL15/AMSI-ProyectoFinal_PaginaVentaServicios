</br></br>
	<h2>Eliminar Sugerencia</h2>
	<p>Has elegido la funionalidad de "Eliminar datos de la Sugerencia"</p>
</br>

<?php
	include_once('MySqli_conexiondb.php');

	$IDSugerencia = (isset($_GET['IDSugerencia']))?$_GET['IDSugerencia']:null;
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
				<h3>Eliminar datos de la Sugerencia</h3>
				<h4>¿Estás seguro de eliminar el registro de la Sugerencia?</h4>
				<br>
				<input type="button" value="Si" onclick=self.location="<?=ROOTURL?>?accion=deleteSugerencia&IDSugerencia=<?=$IDSugerencia?>&respuesta=si" />
				<input type="button" value="No" onclick=self.location="<?=ROOTURL?>?accion=listSugerencias" />
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
		$query = "DELETE FROM sugerencias WHERE IDSugerencia=".$IDSugerencia;
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
					<h3>¡¡Error al intentar eliminar la Sugerencia del cliente!!<?=mysqli_error($conexion)?></h3>
					<input type="button" value="Ir a la lista de Sugerencias" onclick=self.location="<?=ROOTURL?>?accion=listSugerencias" />
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
					<h3>¡¡Registro de la Sugerencia eliminada!!</h3>
					<input type="button" value="Ir a la lista de Sugerencias" onclick=self.location="<?=ROOTURL?>?accion=listSugerencias" />
					<br>
					</center>
				</form>
				</div>
				</body>
			</html>	
			
		<?php	}

	}
	
?>