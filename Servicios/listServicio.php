<h2>Conoce nuestros productos</h2>
<div id="listArticulos">
<?php 
//unset($_SESSION['carrito']);
//var_dump($_SESSION['carrito']);

require_once 'funcionesCliente.php';

$ListArticulos=getListServicios();
//print_r($ListArticulos);
					
	if($ListArticulos!=null)
	{	
		foreach($ListArticulos as $campo) { ?>
			
			<div class="unit-body" >
				<center><img class="foto" src="<?=$campo['mostrarFoto']?>"/></center>
				
			  
			  
			  <div class="product-price-wrap">	
			 <div class="product-price"><href="<?=ROOTURL.'?accion=verArticulo&Id_Servicios='.$campo['Id_Servicios']?>"><?=$campo['NombreServicio']?></div>	
				<div class="product-price">$<?=$campo['Precio']?></div>
			  </div>
			  
			  <button class="button button-secondary  button-ujarak"><a href="<?=ROOTURL.'?accion=addCarrito&Id_Servicios='.$campo['Id_Servicios']?>"> Comprar </a></button>
			</div>
			
<?php	
		}	
	}	
?>
</div>