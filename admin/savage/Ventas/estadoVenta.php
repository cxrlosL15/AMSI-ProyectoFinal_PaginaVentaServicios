</br></br>
	<h2>Estado de Venta</h2>
	<p>Has elegido la funionalidad de "Cambiar Estado de Venta"</p>
</br>

<?php
	include_once('MySqli_conexiondb.php');

	$IDVenta = (isset($_GET['IDVenta']))?$_GET['IDVenta']:null;
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
					<h3>¿Desea cambiar el estado de venta a "CANCELADO"?</h3>
					<input type="button" value="si" onclick=self.location="<?=ROOTURL?>?accion=estadoVenta&IDVenta=<?=$IDVenta?>&respuesta=si" />
					<input type="button" value="no" onclick=self.location="<?=ROOTURL?>?accion=listVentas" />
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
		
		$query = "UPDATE ventas SET Estado='CANCELADO' , FechaVenta=now() WHERE IDVenta=".$IDVenta;
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
						<h3>¡¡Error al intentar cambiar el estado de la Venta!!<?=mysqli_error($conexion)?></h3>
						<input type="button" value="Ir a la lista de Ventas" onclick=self.location="<?=ROOTURL?>?accion=listVentas" />
					<br>
					</center>
				</form>
				</div>
				</body>
			</html>
		
<?php	} else	{	?>
				
				<html>
					<body>
					<div id="deleteform">
					<form>
						<center>
						<br>
							<h3>¡¡Estado de Venta Actualizado!!!</h3>
							<input type="button" value="Ir a la lista de Ventas" onclick=self.location="<?=ROOTURL?>?accion=listVentas" />
						<br>
						</center>
					</form>
					</div>
					</body>
				</html>	
<?php			}

	}
	
?>