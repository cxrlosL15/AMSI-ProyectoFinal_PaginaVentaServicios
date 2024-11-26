</br>
	<h2>Eliminar Art&iacute;culo</h2>
	<p>Has elegido la funionalidad de "Eliminar datos del Art&iacute;culo"</p>
</br>

<?php
	include_once('MySqli_conexiondb.php');

	$IDArticulo = (isset($_GET['IDArticulo']))?$_GET['IDArticulo']:null;
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
				<h3>Eliminar datos del Art&iacute;culo</h3>
				<h4>¿Estás seguro de eliminar el registro del art&iacute;culo?</h4>
				<input type="button" value="si" onclick=self.location="<?=ROOTURL?>?accion=deleteArticulo&IDArticulo=<?=$IDArticulo?>&respuesta=si" />
				<input type="button" value="no" onclick=self.location="<?=ROOTURL?>?accion=listArticulos" />
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
		$query = "DELETE FROM articulos WHERE IDArticulo=".$IDArticulo;
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
					<h3>¡¡Error al intentar eliminar el registro del Art&iacute;culo!!<?=mysqli_error($conexion)?></h3>
					<input type="button" value="Ir a la lista de Art&iacute;culo" onclick=self.location="<?=ROOTURL?>?accion=listArticulos" />
					<br>
					</center>
				</form>
				</div>
				</body>
			</html>		
		
<?php	}  else {	?>
				
				<html>
					<body>
					<div id="deleteform">
					<form>
						<center>
						<br>
						<h3> ¡¡¡Registro del Art&iacute;culo eliminado!!!</h3>
						<input type="button" value="Ir a la lista de Art&iacute;culo" onclick=self.location="<?=ROOTURL?>?accion=listArticulos" />
						<br>
						</center>
					</form>
					</div>
					</body>
				</html>	
		<?php	}
	}
	
?>