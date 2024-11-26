<?php
require_once('../configuracionCliente.php');
include_once('../MySqli_conexiondb.php');
//print_r($_REQUEST);
$accion = $_POST['accion'];
$Nombre = $_POST['Nombre'];
$APaterno = $_POST['APaterno'];
$AMaterno = $_POST['AMaterno'];
$CorreoElectronico = $_POST['CorreoElectronico'];
$DetalleQueja = $_POST['DetalleQueja'];
$FechaQueja = $_POST['FechaQueja'];

require_once(HEADERCLIENTE);
		if( $accion = "registroQueja")
		{ 
			$query = "INSERT INTO quejas (Nombre, APaterno, AMaterno, CorreoElectronico, DetalleQueja, FechaQueja) VALUES ('$Nombre', '$APaterno', '$AMaterno', '$CorreoElectronico', '$DetalleQueja', '$FechaQueja')";
			
			$resultado = mysqli_query($conexion,$query);
				if(!$resultado) 
				{	?>
			
				<center>
					<br>
					<h2 class="fs-title">¡¡¡Error al intentar enviar tu queja!!!<?=mysqli_error($conexion)?></h2>
					<input type="button" value="Intentalo de nuevo" onclick=self.location="<?=ROOTURL?>?accion=misQuejas" />
				</center>
				
<?php 			}else { ?>
	
					<center>
						<br>
						<h2 class="fs-title">¡¡¡Se envi&oacute; correctamente tu queja!!!</h2>
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