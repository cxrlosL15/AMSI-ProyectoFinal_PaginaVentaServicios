<?php
require_once('../configuracionCliente.php');
include_once('../MySqli_conexiondb.php');
//print_r($_REQUEST);
$accion = $_POST['accion'];
$listArticulos = $_POST['listArticulos'];//estan todos los artículos/productos que estan como input´s ocultos
$IDCliente = $_POST['IDCliente'];
$cantArticulos = $_POST['cantArticulos'];
$Descuento = $_POST['Descuento'];
$subTotal = $_POST['subTotal'];
$IVA = $_POST['IVA'];
$importeTotal = $_POST['importeTotal'];
$FechaVenta = date("Y-m-d H:i:s");
$metodoPago = $_POST['metodoPago'];
$infoMetodoPago = $_POST['infoMetodoPago'];
$Estado = "CONFIRMADA";
$ventaEn = "WEB";


//print_r($listArticulos);

//obtener fecha y hora actual $hoy = date("Y-m-d H:i:s");  

require_once(HEADERCLIENTE);
		if( $accion = "addCompra")
		{ 
			//    Query de la tabla Ventas
			$query = "INSERT INTO ventas (IDCliente,cantArticulos,Descuento,subTotal,IVA,importeTotal,FechaVenta,metodoPago,infoMetodoPago,Estado,ventaEn) VALUES ('$IDCliente','$cantArticulos','$Descuento','$subTotal','$IVA','$importeTotal','$FechaVenta','$metodoPago','$infoMetodoPago','$Estado','$ventaEn')";
			//exit;
			$resultado = mysqli_query($conexion,$query);
				if(!$resultado) 
				{	?>
			
				<center>
					<br>
					<h2 class="fs-title">Error al intentar comprar los articulos!!!<?=mysqli_error($conexion)?></h2>
					<input type="button" value="Intentalo de nuevo" onclick=self.location="<?=ROOTURL?>?accion=carrito" />
				</center>
				
<?php 			}else {		
				
				$ultimoIDregistrado = mysqli_insert_id($conexion); 
				$IDVenta = $ultimoIDregistrado;
				
				foreach($listArticulos as $campos)
				{
					$IDArticulo = $campos['IDArticulo'];
					$Cantidad = $campos['Cantidad'];
					$Precio = $campos['Precio'];
					$Descuento = $campos['Descuento'];
					$Importe = $campos['Importe'];
					
					//    Query de la tabla ventasDetalle
					$query = "INSERT INTO ventasdetalle(IDVenta, IDArticulo, Cantidad, Precio, Descuento, Importe) VALUES ('$IDVenta','$IDArticulo','$Cantidad','$Precio','$Descuento','$Importe')";
					mysqli_query($conexion,$query);
				}
				unset($_SESSION['carrito']);//ELIMINAR LA INFORMACIÓN DEL CARRITO
?>	
					<center>
						<br>
						<h2 class="fs-title">Compra realizada Exitosamente!!!</h2>
						<input type="button" value="Ir a mis compras" onclick=self.location="<?=ROOTURL?>?accion=misCompras" />
					</center>
	
<?php 					} ?>
	 
<?php 	}else  { ?>

		<center>
			<br>
			<h2 class="fs-title">Opci&oacute;n incorrecta!!!</h2>
			<input type="button" value="Ir al carrito" onclick=self.location="<?=ROOTURL?>?accion=carrito" />
		</center>
		
<?php 	}	?>
<?php 	require_once(FOOTERCLIENTE);	?>