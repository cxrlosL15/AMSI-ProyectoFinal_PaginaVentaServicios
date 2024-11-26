<?php
$IDArticulo = $_REQUEST['IDArticulo'];
$accion = $_REQUEST['accion'];

if(isset($_SESSION['carrito'][$IDArticulo])){
	if($accion=='addCarrito')
		$_SESSION['carrito'][$IDArticulo]['cantidad']++;//agregar un Articulo
	else{
		$_SESSION['carrito'][$IDArticulo]['cantidad']--;//eliminar un Articulo
		
		if($_SESSION['carrito'][$IDArticulo]['cantidad']==0)
			unset($_SESSION['carrito'][$IDArticulo]);//eliminar el Articulo cuando la cantidad es igual a cero
	}
}else{
	$_SESSION['carrito'][$IDArticulo] = array(
				'cantidad' => 1,
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