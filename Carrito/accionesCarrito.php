<?php
$Id_Servicios = $_REQUEST['Id_Servicios'];
$accion = $_REQUEST['accion'];

if(isset($_SESSION['carrito'][$Id_Servicios])){
	if($accion=='addCarrito')
		$_SESSION['carrito'][$Id_Servicios]['Cantidad']++;//agregar un Articulo
	else{
		$_SESSION['carrito'][$Id_Servicios]['Cantidad']--;//eliminar un Articulo
		
		if($_SESSION['carrito'][$Id_Servicios]['Cantidad']==0)
			unset($_SESSION['carrito'][$Id_Servicios]);//eliminar el Articulo cuando la cantidad es igual a cero
	}
}else{
	$_SESSION['carrito'][$Id_Servicios] = array(
				'Cantidad' => 1,
				'Descuento' => 0
				);	
	echo 'OK';
	
}

ksort($_SESSION['carrito']);//ordena el arreglo por IDArticulo

if(isset($_REQUEST['vista']))
	$ruta = ROOTURL."?accion=carrito";
else
	$ruta = ROOTURL;	

header("Location: ".$ruta);
?>