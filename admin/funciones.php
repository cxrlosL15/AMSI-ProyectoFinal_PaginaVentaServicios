<?php
//este archivo php SOLO VA A TENER CODIGO PHP

function obtenerListaClientes()
{
		include_once('MySqli_conexiondb.php');
		$query = "SELECT IDCliente, Foto, APaterno, AMaterno, Nombre, CorreoElectronico FROM clientes";
		$resultado = mysqli_query($conexion,$query);
		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}
		$lista = array();
		
		if(mysqli_num_rows($resultado)>0)
		{
			while($renglon = mysqli_fetch_assoc($resultado))
			{
				if($renglon['Foto']==null)
					$foto = ROOTURL.'Clientes/fotos/0.png';
				else
					$foto = ROOTURL.'Clientes/fotos/'.$renglon['Foto'];
				
				$lista[] = array(
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

//----------------------------------Fin de las Funcionalidades Clientes-----------------------------------

//---------------------------------------Funcionalidades Articulos------------------------------------------

function obtenerListaArticulos()
{
	include('MySqli_conexiondb.php');
		$query = "SELECT IDArticulo, Foto, NameArticulo, Marca, PrecioActual, CantidadDisponible, FechaRegistro, Estado FROM articulos";
		$resultado = mysqli_query($conexion,$query);
		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}
		$lista = array();
		
		if(mysqli_num_rows($resultado)>0)
		{
			while($renglon = mysqli_fetch_assoc($resultado))
			{
				if($renglon['Foto']==null)
					$foto = ROOTURL.'Articulos/fotos/0.png';
				else
					$foto = ROOTURL.'Articulos/fotos/'.$renglon['Foto'];
				
				$lista[] = array(
						'IDArticulo' => $renglon['IDArticulo'],
						'mostrarFoto' => $foto,
						'Foto' => $renglon['Foto'],
						'NameArticulo' => $renglon['NameArticulo'],
						'Marca' => $renglon['Marca'],
						'PrecioActual' => $renglon['PrecioActual'],
						'CantidadDisponible' => $renglon['CantidadDisponible'],
						'FechaRegistro' => $renglon['FechaRegistro'],
						'Estado' => $renglon['Estado']
						);
			}
		}
		return $lista;
}

function obtenerDatosArticulo($IDArticulo)
{
		include('MySqli_conexiondb.php');
		$query = "SELECT IDArticulo, Foto, NameArticulo, Marca, PrecioActual, CantidadDisponible,  FechaRegistro, Estado FROM articulos WHERE IDArticulo=".$IDArticulo;
		$resultado = mysqli_query($conexion,$query);
		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}
		$lista = array();
		
		if(mysqli_num_rows($resultado)>0)
		{
			while($renglon = mysqli_fetch_assoc($resultado))
			{
				if($renglon['Foto']==null)
					$foto = ROOTURL.'Articulos/fotos/0.png';
				else
					$foto = ROOTURL.'Articulos/fotos/'.$renglon['Foto'];
				
				$lista = array(
						'IDArticulo' => $renglon['IDArticulo'],
						'mostrarFoto' => $foto,
						'Foto' => $renglon['Foto'],
						'NameArticulo' => $renglon['NameArticulo'],
						'Marca' => $renglon['Marca'],
						'PrecioActual' => $renglon['PrecioActual'],
						'CantidadDisponible' => $renglon['CantidadDisponible'],
						'FechaRegistro' => $renglon['FechaRegistro'],
						'Estado' => $renglon['Estado']
						);
			}
		}
		return $lista;
}

//----------------------------------Fin de las Funcionalidades Articulos-----------------------------------

//----------------------------------Inicio de las Funcionalidades Ventas------------------------------------------

function obtenerListaVentas($IDUsuario,$Puesto,$Sucursal)
{
	include('MySqli_conexionDB.php');
	
	if($Puesto=="CAPTURISTA")
		$query = "SELECT V.IDVenta, V.IDCliente, V.CantArticulos, V.Descuento, V.subTotal, V.IVA, V.importeTotal, V.FechaVenta, V.metodoPago, V.infoMetodoPago, V.Estado, V.IDUsuario, V.ventaEn, U.Sucursal, U.Puesto, U.APaterno, U.AMaterno, U.Nombre 
				FROM ventas V 
				INNER JOIN usuarios U 
					ON V.IDUsuario = U.IDUsuario 
						WHERE V.IDUsuario ='$IDUsuario'";
	
	if($Puesto=="SUPERVISOR")
		$query = "SELECT V.IDVenta, V.IDCliente, V.CantArticulos, V.Descuento, V.subTotal, V.IVA, V.importeTotal, V.FechaVenta, V.metodoPago, V.infoMetodoPago, V.Estado, V.IDUsuario, V.ventaEn, U.Sucursal, U.Puesto, U.APaterno, U.AMaterno, U.Nombre 
				FROM ventas V 
				INNER JOIN usuarios U 
					ON V.IDUsuario = U.IDUsuario 
						WHERE U.Sucursal ='$Sucursal'";
	
	if($Puesto=="SUPERADMIN" || $Puesto=="DUENO" || $Puesto=="GERENTE")
		$query = "SELECT V.IDVenta, V.IDCliente, V.CantArticulos, V.Descuento, V.subTotal, V.IVA, V.importeTotal, V.FechaVenta, V.metodoPago, V.infoMetodoPago, V.Estado, V.IDUsuario, V.ventaEn, U.Sucursal, U.Puesto, U.APaterno, U.AMaterno, U.Nombre 
				FROM ventas V 
				LEFT JOIN usuarios U 
					ON V.IDUsuario = U.IDUsuario";
				
	if(!$resultado = mysqli_query($conexion,$query))
	{
		exit(mysqli_error($conexion));
	}
	$lista = array();
	if(mysqli_num_rows($resultado)>0)
	{
		while($renglon = mysqli_fetch_assoc($resultado))
		{
			$lista[] = array( //varios renglones o registros
				'IDVenta' => $renglon['IDVenta'],
				'IDCliente' => $renglon['IDCliente'],
				'CantArticulos' => $renglon['CantArticulos'],
				'Descuento' => $renglon['Descuento'],
				'subTotal' => $renglon['subTotal'],
				'IVA' => $renglon['IVA'],
				'importeTotal' => $renglon['importeTotal'],
				'FechaVenta' => $renglon['FechaVenta'],
				'metodoPago' => $renglon['metodoPago'],
				'Estado' => $renglon['Estado'],
				'IDUsuario' => $renglon['IDUsuario'],
				'nombreUsuario' => $renglon['Nombre']." ".$renglon['APaterno']." ".$renglon['AMaterno'],
				'Sucursal' => $renglon['Sucursal'],
				'ventaEn' => $renglon['ventaEn']
				);		
		}
	}
	return $lista;
}


//----------------------------------Fin de las Funcionalidades Ventas--------------------------------------------

//----------------------------------Inicio de las Funcionalidades Usuarios----------------------------------------

function obtenerListaUsuarios()
{
		include('MySqli_conexiondb.php');
		$query = "SELECT IDUsuario, Foto, APaterno, AMaterno, Nombre, NombreUsuario, Contrasena, Estado, Puesto, Sucursal FROM usuarios";
		$resultado = mysqli_query($conexion,$query);
		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}
		$lista = array();
		
		if(mysqli_num_rows($resultado)>0)
		{
			while($renglon = mysqli_fetch_assoc($resultado))
			{
				if($renglon['Foto']==null)
						$foto = ROOTURL.'Usuarios/fotos/0.png';
					else
						$foto = ROOTURL.'Usuarios/fotos/'.$renglon['Foto'];
					
				$lista[] = array(
						'IDUsuario' => $renglon['IDUsuario'],
						'mostrarFoto' => $foto,
						'Foto' => $renglon['Foto'],
						'APaterno' => $renglon['APaterno'],
						'AMaterno' => $renglon['AMaterno'],
						'Nombre' => $renglon['Nombre'],
						'NombreUsuario' => $renglon['NombreUsuario'],
						'Contrasena' => $renglon['Contrasena'],
						'Estado' => $renglon['Estado'],
						'Puesto' => $renglon['Puesto'],
						'Sucursal' => $renglon['Sucursal']
						);
			}
		}
		return $lista;

}

function obtenerDatosUsuario($IDUsuario)
{
		include('MySqli_conexiondb.php');
		$query = "SELECT IDUsuario, Foto, APaterno, AMaterno, Nombre, NombreUsuario, Contrasena, Estado, Puesto, Sucursal FROM usuarios WHERE IDUsuario=".$IDUsuario;
		$resultado = mysqli_query($conexion,$query);
		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}
		$lista = array();
		
		if(mysqli_num_rows($resultado)>0)
		{
				while($renglon = mysqli_fetch_assoc($resultado)) 
				{
					if($renglon['Foto']==null)
						$foto = ROOTURL.'Usuarios/fotos/0.png';
					else
						$foto = ROOTURL.'Usuarios/fotos/'.$renglon['Foto'];
				
					$lista = array(
							'IDUsuario' => $renglon['IDUsuario'],
							'mostrarFoto' => $foto,
							'Foto' => $renglon['Foto'],
							'APaterno' => $renglon['APaterno'],
							'AMaterno' => $renglon['AMaterno'],
							'Nombre' => $renglon['Nombre'],
							'NombreUsuario' => $renglon['NombreUsuario'],
							'Contrasena' => $renglon['Contrasena'],
							'Estado' => $renglon['Estado'],
							'Puesto' => $renglon['Puesto'],
							'Sucursal' => $renglon['Sucursal']
							);
				}
		}
		return $lista;
}

//----------------------------------Inicio de las Funcionalidades Comentarios----------------------------------------

function obtenerListaSugerencias()
{
		include('MySqli_conexiondb.php');
		$query = "SELECT IDSugerencia, Nombre, APaterno, AMaterno, CorreoElectronico, DetalleSugerencia, FechaSugerencia FROM sugerencias";
		$resultado = mysqli_query($conexion,$query);
		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}
		$lista = array();
		
		if(mysqli_num_rows($resultado)>0)
		{	
			while($renglon = mysqli_fetch_assoc($resultado))
			{
				$lista[] = array(
						'IDSugerencia' => $renglon['IDSugerencia'],
						'Nombre' => $renglon['Nombre'],
						'APaterno' => $renglon['APaterno'],
						'AMaterno' => $renglon['AMaterno'],
						'CorreoElectronico' => $renglon['CorreoElectronico'],
						'DetalleSugerencia' => $renglon['DetalleSugerencia'],
						'FechaSugerencia' => $renglon['FechaSugerencia']
						);
			}
			
		}
		return $lista;

}

function obtenerListaQuejas()
{
		include('MySqli_conexiondb.php');
		$query = "SELECT IDQueja, Nombre, APaterno, AMaterno, CorreoElectronico, DetalleQueja, FechaQueja FROM quejas";
		$resultado = mysqli_query($conexion,$query);
		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}
		$lista = array();
		
		if(mysqli_num_rows($resultado)>0)
		{	
			while($renglon = mysqli_fetch_assoc($resultado))
			{
				$lista[] = array(
						'IDQueja' => $renglon['IDQueja'],
						'Nombre' => $renglon['Nombre'],
						'APaterno' => $renglon['APaterno'],
						'AMaterno' => $renglon['AMaterno'],
						'CorreoElectronico' => $renglon['CorreoElectronico'],
						'DetalleQueja' => $renglon['DetalleQueja'],
						'FechaQueja' => $renglon['FechaQueja']
						);
			}
		}
		return $lista;

}

?>