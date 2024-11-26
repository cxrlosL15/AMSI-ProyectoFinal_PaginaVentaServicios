<?php

require_once('../configuracion.php');
include_once('../MySqli_conexiondb.php');

$accion = $_POST['accion'];
$NameArticulo = $_POST['NameArticulo'];
$Marca = $_POST['Marca'];
$PrecioActual = $_POST['PrecioActual'];
$CantidadDisponible = $_POST['CantidadDisponible'];
$FechaRegistro = $_POST['FechaRegistro'];

	require_once(HEADERADMIN);

		if($accion=="addArticulo")
		{ 
			//INSERT INTO nombreTabla (nombreCampo1, nombreCampo2, nombreCampo3, ...) VALUES (valorCampo1, valorCampo2, valorCampo3, ...)
			$query ="INSERT INTO articulos (NameArticulo, Marca, PrecioActual, CantidadDisponible, FechaRegistro, Estado) VALUES ('$NameArticulo', '$Marca', '$PrecioActual', '$CantidadDisponible', '$FechaRegistro', 'DISPONIBLE')";

			$resultado = mysqli_query($conexion,$query);
				if(!$resultado)
				{	?>
			
					<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Error al intentar registrar el Art&iacute;culo!!<?=mysqli_error($conexion)?></h3>
										<br><input type="button" value="Ir a la lista de Art&iacute;culos" onclick=self.location="<?=ROOTURL?>?accion=listArticulos" />
									<br>
								</center>
							</form>
							</div>
							</body>
					</html>	
				
<?php 			}	else{	?>
						
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Art&iacute;culo Registrado!!</h3>
										<br><input type="button" value="Ir a la lista de Art&iacute;culos" onclick=self.location="<?=ROOTURL?>?accion=listArticulos" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>	
						
<?php					} ?>

<?php 	} else	{ ?>
						
						<html>
							<body>
							<div id="editform">
							<form>
								<center>
									<br>
										<h3>¡¡Opci&oacute;n incorrecta!!!</h3>
										<br><input type="button" value="Ir a la lista de Art&iacute;culos" onclick=self.location="<?=ROOTURL?>?accion=listArticulos" />
									<br>
								</center>
							</form>
							</div>
							</body>
						</html>	

<?php			} ?>
<?php	require_once(FOOTERADMIN);	?>