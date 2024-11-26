<?php

require_once('../configuracion.php');
include_once('../MySqli_conexiondb.php');

$accion = $_POST['accion'];
$IDArticulo = $_POST['IDArticulo'];
$NameArticulo = $_POST['NameArticulo'];
$Marca = $_POST['Marca'];
$PrecioActual = $_POST['PrecioActual'];
$CantidadDisponible = $_POST['CantidadDisponible'];
$FechaRegistro = $_POST['FechaRegistro'];
$Estado = $_POST['Estado'];

require_once(HEADERADMIN);

		if($accion=="updateArticulo")
		{ 
		//UPDATE nombreTabla SET nombreCampo1 = nuevoValorCampo1, nombreCampo2 = NuevoValorCampo2, nombreCampo3 = nuevoValorCampo3 WHERE nombreCampo=ValorBuscar
		$query= "UPDATE articulos SET NameArticulo='$NameArticulo', Marca='$Marca', PrecioActual='$PrecioActual', CantidadDisponible='$CantidadDisponible', FechaRegistro='$FechaRegistro', Estado='$Estado' WHERE IDArticulo='$IDArticulo'";
		$resultado = mysqli_query($conexion,$query);
			if(!$resultado)
			{	?>
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Error al intentar actualizar el registro del Art&iacute;culo!!<?=mysqli_error($conexion)?></h3>
										<input type="button" value="Ir a la lista de Art&iacute;culos" onclick=self.location="<?=ROOTURL?>?accion=listArticulos" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>
						
<?php 		} else	{	?>
							
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Datos del Art&iacute;culo Actualizados!!</h3>
										<br><input type="button" value="Ir a la lista de Art&iacute;culos" onclick=self.location="<?=ROOTURL?>?accion=listArticulos" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>	

<?php				}	 ?>

<?php	}	else	{ ?>
						
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Opci&oacute;n incorrecta!!</h3>
										<br><input type="button" value="Ir a la lista de Art&iacute;culos" onclick=self.location="<?=ROOTURL?>?accion=listArticulos" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>
					
<?php				}	?>
<?php	require_once(FOOTERADMIN);	?>