<?php 
//-------------------------------------------------- FUNCIONES ARTICULOS --------------------------------------------------//
function getListServicios(){
    include('MySqli_conexionDB.php'); // Asegúrate de que la ruta sea correcta

    // Define la constante si aún no lo has hecho
    // define('IMAGES_ORIGEN', 'ruta/a/tu/directorio/de/imagenes/');

    $folderRuta = "admin/Servicios/fotos/";

    $query = "SELECT Id_Servicios, NombreServicio, Descripccion, Precio, PeriodoTiempo, Imagen, Estado FROM servicios WHERE Estado='ACTIVO';";
    if (!$result = mysqli_query($conexion, $query)) {
        exit(mysqli_error($conexion));
    }
    $lista = array();
    if(mysqli_num_rows($result) > 0) {
        while ($renglon = mysqli_fetch_assoc($result)) {
            if($renglon['Imagen']=="")
                $foto = IMAGES_ORIGEN.'Servicios/fotos/0.png'; // Asegúrate de que IMAGES_ORIGEN esté definido
            else
                $foto = IMAGES_ORIGEN.'Servicios/fotos/'.$renglon['Imagen'];

            $lista[] = array(
                'Id_Servicios' => $renglon['Id_Servicios'],
                'mostrarFoto' => $foto,
                'Imagen' => $renglon['Imagen'],
                'NombreServicio' => $renglon['NombreServicio'],
                'Descripccion' => $renglon['Descripccion'],
                'Precio' => $renglon['Precio'],
                'PeriodoTiempo' => $renglon['PeriodoTiempo'],
                'Estado' => $renglon['Estado']
            );
        }
    }
    return $lista;
}
function getDetalleServicio($Id_Servicios)
{
	include("MySqli_conexionDB.php");
    $query = "SELECT Id_Servicios, Imagen, NombreServicio, Descripccion, Precio, PeriodoTiempo, Estado, Cantidad FROM servicios WHERE Id_Servicios='$Id_Servicios'";
    if (!$result = mysqli_query($conexion, $query)) {
        exit(mysqli_error($conexion));
    }
    $lista = array();

    if (mysqli_num_rows($result) > 0) {
        while ($renglon = mysqli_fetch_assoc($result)) {
            if ($renglon['Imagen'] == "")
                $foto = IMAGES_ORIGEN . 'Servicios/fotos/0.png';
            else
                $foto = IMAGES_ORIGEN . 'Servicios/fotos/' . $renglon['Imagen'];

            $lista[] = array(
                'Id_Servicios' => $renglon['Id_Servicios'],
                'mostrarFoto' => $foto,
                'Imagen' => $renglon['Imagen'],
                'NombreServicio' => $renglon['NombreServicio'],
                'Descripccion' => $renglon['Descripccion'],
                'Precio' => $renglon['Precio'],
                'PeriodoTiempo' => $renglon['PeriodoTiempo'],
                'Cantidad' => $renglon['Cantidad']
            );
        }
    }
    return $lista;
}
//-------------------------------------------------- FIN FUNCIONES ARTICULOS --------------------------------------------------//

//-------------------------------------------------- FUNCIONES DEL CLIENTE --------------------------------------------------//

function getDatosClienteLogin($IDCliente){
	include("MySqli_conexionDB.php");
	$nombre = "";
	
	$query = "SELECT Id_Cliente, APaterno, AMaterno, Nombre, Estado FROM clientes WHERE Id_Cliente='$IDCliente'";
    if (!$result = mysqli_query($conexion, $query)) {
        exit(mysqli_error($conexion));
    }
    $lista = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nombre = $row['Nombre']." ".$row['APaterno']." ".$row['AMaterno'];

            
        }
    }
	return $nombre;
}

function getListTarjetas($IDCliente){
	include('MySqli_conexionDB.php');
	
	$query = "SELECT IDTarjeta, IDCliente, nombreTitular, Numero, FechaVencimiento, CVC, Estado FROM tarjetas WHERE Estado=1 AND IDCliente='$IDCliente'";
	if (!$result = mysqli_query($conexion, $query)) {
        exit(mysqli_error($conexion));
    }
    $lista = array();
    if(mysqli_num_rows($result) > 0) {
        while ($renglon = mysqli_fetch_assoc($result)) {
    
            $lista[] = array(
				'IDTarjeta' => $renglon['IDTarjeta'],
				'IDCliente' => $renglon['IDCliente'],
				'nombreTitular' => $renglon['nombreTitular'],
				'Numero' => $renglon['Numero'],
				'FechaVencimiento' => $renglon['FechaVencimiento'],
				'CVC' => $renglon['CVC'],
				'Estado' => $renglon['Estado']
				);
        }
    }
    return $lista;
}
function getListMisCompras($IDCliente){
	include('MySqli_conexionDB.php');
	
	$query = "SELECT IDVenta, IDCliente, CantArticulos, Descuento, subTotal, IVA, importeTotal, FechaVenta, metodoPago, infoMetodoPago, Estado, IDUsuario, ventaEn FROM ventas WHERE IDCliente='$IDCliente'";
	if (!$result = mysqli_query($conexion, $query)) {
        exit(mysqli_error($conexion));
    }
    $lista = array();
    if(mysqli_num_rows($result) > 0) {
        while ($renglon = mysqli_fetch_assoc($result)) {
    
            $lista[] = array(
				'IDVenta' => $renglon['IDVenta'],
				'IDCliente' => $renglon['IDCliente'],
				'CantArticulos' => $renglon['CantArticulos'],
				'Descuento' => $renglon['Descuento'],
				'subTotal' => $renglon['subTotal'],
				'IVA' => $renglon['IVA'],
				'importeTotal' => $renglon['importeTotal'],
				'FechaVenta' => $renglon['FechaVenta'],
				'metodoPago' => $renglon['metodoPago'],
				'infoMetodoPago' => $renglon['infoMetodoPago'],
				'Estado' => $renglon['Estado'],
				'IDUsuario' => $renglon['IDUsuario'],
				'ventaEn' => $renglon['ventaEn']
				//LOS RENGLONES DE IDUSUARIO Y VENTAEN NO ESTABAN EN EL DE LA PROFE
				);
        }
    }
    return $lista;
}
function getListMisComprasDetalle($IDVenta){
	include('MySqli_conexionDB.php');
	
	$query = "SELECT IDVentaDetalle, IDVenta, IDArticulo, Cantidad, Precio, Descuento, Importe FROM ventasdetalle WHERE IDVenta='$IDVenta'";
	if (!$result = mysqli_query($conexion, $query)) {
        exit(mysqli_error($conexion));
    }
    $lista = array();
    if(mysqli_num_rows($result) > 0) {
        while ($renglon = mysqli_fetch_assoc($result)) {
    
            $lista[] = array(
				'IDVentaDetalle' => $renglon['IDVentaDetalle'],
				'IDVenta' => $renglon['IDVenta'],
				'Id_Servicios' => $renglon['Id_Servicios'],
				'Cantidad' => $renglon['Cantidad'],
				'Precio' => $renglon['Precio'],
				'Descuento' => $renglon['Descuento'],
				'Importe' => $renglon['Importe']
				);
        }
    }
    return $lista;
}

function obtenerDatosCliente($IDCliente)
{				
		include('MySqli_conexiondb.php');
		$query = "SELECT IDCliente, Foto, APaterno, AMaterno, Nombre, CorreoElectronico FROM clientes WHERE IDCliente=".$IDCliente;
		$result = mysqli_query($conexion,$query);
		if(!$result)
		{
			exit(mysqli_error($conexion));
		}
		$lista = array();
		
		if(mysqli_num_rows($result) > 0) //*result*
		{
			while($renglon = mysqli_fetch_assoc($result)) {
				
				if($renglon['Foto']==null) //If de subir imagen
					$foto = ROOTURL.'Clientes/fotos/0.png';
				else
					$foto = ROOTURL.'Clientes/fotos/'.$renglon['Foto'];
				
				$lista = array(
						'IDCliente' => $renglon['IDCliente'],
						'mostrarFoto' => $foto,
						'Foto' => $renglon['Foto'],
						'APaterno' => $renglon['APaterno'],
						'AMaterno' => $renglon['AMaterno'],
						'Nombre' => $renglon['Nombre'],
						'CorreoElectronico' => $renglon['CorreoElectronico']
						);
			}
		}
		return $lista;
}

/*
function getPerfilCliente($IDCliente){
	include("MySqli_conexionDB.php");
	$folderRuta = "admin/Clientes/fotos/";
	
	$query = "SELECT IDCliente, Foto, APaterno, AMaterno, Nombre, Estado, CorreoElectronico, Contrasena FROM clientes WHERE IDCliente=$IDCliente";
    $resultado = mysqli_query($conexion,$query);
		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}
		$fotoPerfil = array();
		
		if(mysqli_num_rows($resultado)>0)
		{
			 while ($renglon = mysqli_fetch_assoc($result)) {
        	if($renglon['Foto']==null) //If de subir imagen
					$foto = ROOTURL.'Clientes/fotos/0.png';
				else
					$foto = ROOTURL.'Clientes/fotos/'.$renglon['Foto'];
				
				$fotoPerfil[] = array(
						'mostrarFoto' => $foto,
						'Foto' => $renglon['Foto']
						);
			}
		}
		return $foto;
}*/

//-------------------------------------------------- FIN FUNCIONES CLIENTE --------------------------------------------------//

?>