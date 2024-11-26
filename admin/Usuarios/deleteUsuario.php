</br></br>
	<h2>Eliminar Usuario</h2>
	<p>Has elegido la funcionalidad de "Eliminar datos del Usuario"</p>
</br>

<?php
	include_once('MySqli_conexiondb.php');

	$IDUsuario = (isset($_GET['IDUsuario']))?$_GET['IDUsuario']:null;
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
				<h3>Eliminar datos del Usuario</h3>
				<h4>¿Estás seguro de eliminar el registro del usuario?</h4>
				<br>
				<input type="button" value="Si" onclick=self.location="<?=ROOTURL?>?accion=deleteUsuario&IDUsuario=<?=$IDUsuario?>&respuesta=si" />
				<input type="button" value="No" onclick=self.location="<?=ROOTURL?>?accion=listUsuarios" />
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
		$query = "DELETE FROM usuarios WHERE IDUsuario=".$IDUsuario;
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
					<h3>¡¡Error al intentar eliminar el registro del usuario!!<?=mysqli_error($conexion)?></h3>
					<input type="button" value="Ir a la lista de Usuarios" onclick=self.location="<?=ROOTURL?>?accion=listUsuarios" />
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
					<h3>¡¡Registro del usuario eliminado!!</h3>
					<input type="button" value="Ir a la lista de Usuarios" onclick=self.location="<?=ROOTURL?>?accion=listUsuarios" />
					<br>
					</center>
				</form>
				</div>
				</body>
			</html>	
			
		<?php	}

	}
	
?>