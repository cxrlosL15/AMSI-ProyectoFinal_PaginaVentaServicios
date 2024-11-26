</br></br>
	<h2>Lista General</h2>
	<p>Lista general de la información de la <em>"Papeler&iacute;a Dorada"</em> ; sirve para una consulta r&aacute;pida.</p>
	<p>¡¡En esta sección NO SE PUEDE eliminar o modificar ningún dato!!</p>
</br>

<!------------------------------- AQUI INICIA LA TABLA DE CLIENTES ------------------------------->
<table border="1">
    <tr>
	    <th colspan="5">Lista de clientes</th>
	</tr>
	<tr>
	    <th>ID</th>
		<th>APaterno</th>
		<th>AMaterno</th>
		<th>Nombre</th>
		<th>CorreoElectronico</th>
	</tr>

	<?php
		include_once('MySqli_conexiondb.php');

		//SELECT nombreCampo1, nombreCampo2, nombreCampo3 FROM nombreTabla
		$query = "SELECT IDCliente, APaterno, AMaterno, Nombre, CorreoElectronico FROM clientes";

		$resultado = mysqli_query($conexion,$query);

		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}

		if(mysqli_num_rows($resultado)>0)
		{
			while($renglon = mysqli_fetch_assoc($resultado))
			{
				echo '<tr>';
					echo '<td>'.$renglon['IDCliente'].'</td>';
					echo '<td>'.$renglon['APaterno'].'</td>';
					echo '<td>'.$renglon['AMaterno'].'</td>';
					echo '<td>'.$renglon['Nombre'].'</td>';
					echo '<td>'.$renglon['CorreoElectronico'].'</td>';
				echo '</tr>';
			}
		}		
	?>

</table>
<!------------------------------- AQUI TERMINA LA TABLA DE CLIENTES ------------------------------->
</br>
</br>
</br>

<!------------------------------- AQUI INICIA LA TABLA DE ARTÍCULOS ------------------------------->
<table border="1">
    <tr>
	    <th colspan="5">Lista de art&iacute;culos</th>
	</tr>
	<tr>
	    <th>ID</th><!--Esta es una celda-->
		<th>NameArticulo</th>
		<th>Marca</th>
		<th>PrecioActual</th>
		<th>FechaRegistro</th>

	</tr>
	<?php

		$query = "SELECT IDArticulo , NameArticulo, Marca, PrecioActual, FechaRegistro FROM articulos";

		$resultado = mysqli_query($conexion,$query);

		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}

		if(mysqli_num_rows($resultado)>0)
		{   
			while($renglon = mysqli_fetch_assoc($resultado))
			{
				echo '<tr>';
					echo '<td>'.$renglon['IDArticulo'].'</td>';
					echo '<td>'.$renglon['NameArticulo'].'</td>';
					echo '<td>'.$renglon['Marca'].'</td>';
					echo '<td>'.$renglon['PrecioActual'].'</td>';
					echo '<td>'.$renglon['FechaRegistro'].'</td>';
				echo '</tr>';
			}
		}

?>
</table>
<!------------------------------- AQUI TERMINA LA TABLA DE ARTÍCULOS ------------------------------->
</br>
</br>
</br>
<!------------------------------- AQUI INICIA LA TABLA DE VENTAS ------------------------------->
<table border="1">
    <tr>
	    <th colspan="12">Lista de Ventas</th>
	</tr>
	<tr>
	    <th>IDVenta</th>
		<th>IDCliente</th>
		<th>CantArticulos</th>
		<th>Descuento</th>
		<th>subTotal</th>
		<th>IVA</th>
		<th>ImporteTotal</th>
		<th>FechaVenta</th>
		<th>metodoPago</th>
		<th>Estado</th>
		<th>IDUsuario</th>
		<th>ventaEn</th>
	</tr>
	<?php

		//SELECT nombreCampo1, nombreCampo2, nombreCampo3 FROM nombreTabla
		$query = "SELECT IDVenta, IDCliente, CantArticulos, Descuento, subTotal, IVA, ImporteTotal, FechaVenta, metodoPago, Estado, IDUsuario, ventaEn FROM ventas";

		$resultado = mysqli_query($conexion,$query);
		
		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}

		if(mysqli_num_rows($resultado)>0)
		{   
			while($renglon = mysqli_fetch_assoc($resultado))
			{
				echo '<tr>';
					echo '<td>'.$renglon['IDVenta'].'</td>';
					echo '<td>'.$renglon['IDCliente'].'</td>';
					echo '<td>'.$renglon['CantArticulos'].'</td>';
					echo '<td>'.$renglon['Descuento'].'</td>';
					echo '<td>'.$renglon['subTotal'].'</td>';
					echo '<td>'.$renglon['IVA'].'</td>';
					echo '<td>'.$renglon['ImporteTotal'].'</td>';
					echo '<td>'.$renglon['FechaVenta'].'</td>';
					echo '<td>'.$renglon['metodoPago'].'</td>';
					echo '<td>'.$renglon['Estado'].'</td>';
					echo '<td>'.$renglon['IDUsuario'].'</td>';
					echo '<td>'.$renglon['ventaEn'].'</td>';
					
				echo '</tr>';
			}
		}
?>
</table>
<!------------------------------- AQUI TERMINA LA TABLA DE VENTAS ------------------------------->
</br>
</br>
</br>
<!------------------------------- AQUI INICIA LA TABLA DE USUARIOS ------------------------------->
<table border="1">
    <tr><!--Aquí empieza un renglón tabla-->
	    <th colspan="9">Lista de Usuarios</th><!--Este es un titulo-->
	</tr>
	<tr>
	    <th>IDUsuario</th>
		<th>Foto</th>
		<th>APaterno</th>
		<th>AMaterno</th>
		<th>Nombre</th>
		<th>Puesto</th>
		<th>NombreUsuario</th>
		<th>Contrasena</th>
		<th>Estado</th>
	</tr>
	<?php
		$query = "SELECT IDUsuario, Foto, APaterno, AMaterno, Nombre, Puesto, NombreUsuario, Contrasena, Estado FROM usuarios";

		$resultado = mysqli_query($conexion,$query);
		
		if(!$resultado)
		{
			exit(mysqli_error($conexion));
		}

		if(mysqli_num_rows($resultado)>0)
		{   
			while($renglon = mysqli_fetch_assoc($resultado))
			{
				echo '<tr>';
					echo '<td>'.$renglon['IDUsuario'].'</td>';
					echo '<td>'.$renglon['Foto'].'</td>';
					echo '<td>'.$renglon['APaterno'].'</td>';
					echo '<td>'.$renglon['AMaterno'].'</td>';
					echo '<td>'.$renglon['Nombre'].'</td>';
					echo '<td>'.$renglon['Puesto'].'</td>';
					echo '<td>'.$renglon['NombreUsuario'].'</td>';
					echo '<td>'.$renglon['Contrasena'].'</td>';
					echo '<td>'.$renglon['Estado'].'</td>';
				echo '</tr>';
			}
		}
?>
</table>
<!------------------------------- AQUI TERMINA LA TABLA DE USUARIOS ------------------------------->