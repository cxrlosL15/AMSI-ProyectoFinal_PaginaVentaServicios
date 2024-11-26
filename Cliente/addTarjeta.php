<?php
require_once('../configuracionCliente.php');
include_once('../MySqli_conexiondb.php');
//print_r($_REQUEST);
$accion = $_POST['accion'];
$IDCliente = $_POST['IDCliente'];
$NombreTitular = $_POST['NombreTitular'];
$Numero = $_POST['Numero'];
$FechaVencimiento = $_POST['FechaVencimiento'];
$CVC = $_POST['CVC'];
$Estado = 1;

require_once(HEADERCLIENTE);
		if( $accion = "addTarjeta")
		{ 
			$query = "INSERT INTO tarjetas (IDCliente,NombreTitular,Numero,FechaVencimiento,CVC,Estado) VALUES ('$IDCliente','$NombreTitular','$Numero','$FechaVencimiento','$CVC','$Estado')";
			
			$resultado = mysqli_query($conexion,$query);
				if(!$resultado) 
				{	?>
			
				<center>
					<br>
					<h2 class="fs-title">Error al intentar registrar la tarjeta!!!<?=mysqli_error($conexion)?></h2>
					<input type="button" value="Int&eacute;ntalo de nuevo" onclick=self.location="<?=ROOTURL?>?accion=addTarjetas" />
				</center>
				
<?php 			}else { ?>
	
					<center>
						<br>
						<h2 class="fs-title">Se ha registrado exitosamente la tarjeta!!!</h2>
						<input type="button" value="Ir a la lista de tarjetas" onclick=self.location="<?=ROOTURL?>?accion=listTarjetas" />
					</center>
	
<?php 					} ?>
	 
<?php 	}else  { ?>

		<center>
			<br>
			<h2 class="fs-title">Opci&oacute;n incorrecta!!!</h2>
			<input type="button" value="Ir a la lista de tarjetas" onclick=self.location="<?=ROOTURL?>?accion=listTarjetas" />
		</center>
		
<?php 	}	?>
<?php 	require_once(FOOTERCLIENTE);	?>