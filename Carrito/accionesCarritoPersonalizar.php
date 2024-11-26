<?php
require_once('../configuracionCliente.php');
$IDArticulo = $_REQUEST['IDArticulo'];
$accion = $_REQUEST['accion'];
//print_r($_REQUEST);
if(isset($_SESSION['carrito'][$IDArticulo])){ 
	if($accion=='procesarPago')
	{
		$_SESSION['carrito'][$IDArticulo]['Descuento'] = $_REQUEST['Descuento'];
		$_SESSION['carrito'][$IDArticulo]['cantidad'] = $_REQUEST['cantidad'];	
		$ruta = ROOTURL."?accion=personalizarCompra";		
	}
	
}
//print_r($_SESSION);
ksort($_SESSION['carrito']);//ordena el arreglo por IDArticulo

//exit;	

header("Location: ".$ruta);//redireccionar
?>