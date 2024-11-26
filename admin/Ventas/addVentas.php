<?php

//print_r($_POST);
//print_r($_REQUEST);

require_once('../configuracion.php');
include_once('../MySqli_conexiondb.php');

$accion = $_POST['accion'];
$IDUsuario = $_POST['IDUsuario'];
$IDCliente = $_POST['IDCliente'];
$cantArticulos = $_POST['Cantidad'];
$Descuento = $_POST['Descuento'];
$subTotal = $_POST['subTotal'];
$IVA = $_POST['IVA'];
$importeTotal = $_POST['importeTotal'];
$FechaVenta = date("Y-m-d H:i:s");
$metodoPago = $_POST['metodoPago'];
$infoMetodoPago = "";
$Estado = $_POST['Estado'];
$ventaEn = "MOSTRADOR";

$IDArticulo = $_POST['IDArticulo'];
$Cantidad = $_POST['Cantidad'];
$Precio = $_POST['Precio'];
$Importe = $_POST['subTotal'];

//exit();
require_once(HEADERADMIN);
		if($accion=="addVenta")
		{ 
			$query = "INSERT INTO ventas (IDCliente,cantArticulos,Descuento,subTotal,IVA,importeTotal,FechaVenta,metodoPago,infoMetodoPago,Estado,ventaEn,IDUsuario) VALUES ('$IDCliente','$cantArticulos','$Descuento','$subTotal','$IVA','$importeTotal','$FechaVenta','$metodoPago','$infoMetodoPago','$Estado','$ventaEn','$IDUsuario')";
			//exit;
			$resultado = mysqli_query($conexion,$query);
				if(!$resultado) 
			{	?>
			
				<center>
					<br>
					<h2 class="fs-title">¡¡¡Error al intentar comprar los articulos!!!<?=mysqli_error($conexion)?></h2>
					<input type="button" value="Intentalo de nuevo" onclick=self.location="<?=ROOTURL?>?accion=listVentas" />
				</center>
				
<?php 			}else {		
				
				$ultimoIDregistrado = mysqli_insert_id($conexion); 
				$IDVenta = $ultimoIDregistrado;
				$query = "INSERT INTO ventasdetalle(IDVenta, IDArticulo, Cantidad, Precio, Descuento, Importe) VALUES ('$IDVenta','$IDArticulo','$Cantidad','$Precio','$Descuento','$Importe')";
				mysqli_query($conexion,$query);
?>	
					<center>
						<br>
						<h2 class="fs-title">¡¡¡Venta realizada Exitosamente!!!</h2>
						<input type="button" value="Ir a lista de Articulos" onclick=self.location="<?=ROOTURL?>?accion=listVentas" />
					</center>
	
<?php 					} ?>
	 
<?php 	}else  { ?>

		<center>
			<br>
			<h2 class="fs-title">¡¡¡Opci&oacute;n incorrecta!!!</h2>
			<input type="button" value="Ir a lista de Articulos" onclick=self.location="<?=ROOTURL?>?accion=listVentas" />
		</center>
		
<?php 	}	?>
<?php 	require_once(FOOTERADMIN);	?>
