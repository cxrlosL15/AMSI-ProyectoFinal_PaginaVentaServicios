<?php 
require_once 'funcionesCliente.php';

$IDArticulo = (isset($_GET['Id_Servicios'])) ? $_GET['Id_Servicios'] : null;
	
$datosArticulo=getDetalleServicio($IDArticulo);

	if($datosArticulo!=null)
	{?>	
			
			<div id="detalleProducto">
				<center><img  src="<?=$datosArticulo['mostrarFoto']?>"/></center>
				<h6 class="product-title"><a href="#"><?=$datosArticulo['NombreServicio']?></a></h6>
				<h6 class="product-title"><a href="#">Tiempo: <?=$datosArticulo['PeriodoTiempo']?></a></h6>
				<div class="product-price-wrap">				<!-- PrecioActual -->
					<div class="product-price">$<?=$datosArticulo['Precio']?></div>
				</div>																				<!-- CAMBIAR ACCIÓN -->
				<button class="button button-sm button-secondary button-ujarak"><a href="<?=ROOTURL.'?accion=prestamoArticulo&Id_Servicios='.$datosArticulo['Id_Servicios']?>"> COMPRAR</a></button>
			</div>
<?php	
		
	}	
?>