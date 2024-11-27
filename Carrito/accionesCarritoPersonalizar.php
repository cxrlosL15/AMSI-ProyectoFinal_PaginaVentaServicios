<?php
require_once('../configuracionCliente.php');
$Id_Servicios = $_REQUEST['Id_Servicios'];
$accion = $_REQUEST['accion'];
//print_r($_REQUEST);
if(isset($_SESSION['carrito'][$Id_Servicios])){ 
	if($accion=='procesarPago')
	{
		$_SESSION['carrito'][$Id_Servicios]['Descuento'] = $_REQUEST['Descuento'];
		$_SESSION['carrito'][$Id_Servicios]['Cantidad'] = $_REQUEST['Cantidad'];	
		$ruta = ROOTURL."?accion=personalizarCompra";		
	}
	
}
//print_r($_SESSION);
ksort($_SESSION['carrito']);//ordena el arreglo por IDArticulo

//exit;	

header("Location: ".$ruta);//redireccionar
?>