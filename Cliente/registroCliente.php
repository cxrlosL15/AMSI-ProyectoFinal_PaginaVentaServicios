<?php
require_once('../configuracionCliente.php');
include_once('../MySqli_conexiondb.php');
//print_r($_REQUEST);
$accion = $_POST['accion'];
$Nombre = $_POST['Nombre'];
$APaterno = $_POST['APaterno'];
$AMaterno = $_POST['AMaterno'];
$CorreoElectronico = $_POST['CorreoElectronico'];
$Contrasena = $_POST['Contrasena'];
$Estado = 1;

require_once(HEADERCLIENTE);
		if( $accion = "registroCliente")
		{ 
			$query = "INSERT INTO clientes (Nombre, APaterno, AMaterno, CorreoElectronico, Contrasena, Estado) VALUES ('$Nombre', '$APaterno', '$AMaterno', '$CorreoElectronico', '$Contrasena', '$Estado')";
			
			$resultado = mysqli_query($conexion,$query);
				if(!$resultado and $_POST 
				|| trim($_POST['Nombre']) == ''
				|| trim($_POST['APaterno']) == ''
				|| trim($_POST['AMaterno']) == ''
				|| trim($_POST['CorreoElectronico']) == ''
				|| trim($_POST['Contrasena']) == ''

				) 
				{	?>
			
				<center>
					<br>
					<h2 class="fs-title">¡¡¡Error al intentar registrarte!!!<?=mysqli_error($conexion)?></h2>
					<input type="button" value="Intentalo de nuevo" onclick=self.location="<?=ROOTURL?>?accion=registro" />
				</center>
				
<?php 			}else { ?>
	
					<center>
						<br>
						<h2 class="fs-title">¡¡¡Te has Registrado Exitosamente!!!</h2>
						<input type="button" value="Ir a la lista de articulos" onclick=self.location="<?=ROOTURL?>?accion=articulos" />
					</center>
	
<?php 					} ?>
	 
<?php 	}else  { ?>

		<center>
			<br>
			<h2 class="fs-title">¡¡¡Opci&oacute;n incorrecta!!!</h2>
			<input type="button" value="Ir a la lista de articulos" onclick=self.location="<?=ROOTURL?>?accion=articulos" />
		</center>
		
<?php 	}	?>
<?php 	require_once(FOOTERCLIENTE);	?>