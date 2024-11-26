</br><br>
	<h2>Lista de Ventas de Papeler&iacute;a Dorada</h2>
	<p>Bienvenido a la <em>"Lista de ventas de Papeler&iacute;a Dorada"</em>, esta es la lista de las ventas resgistradas en la papeler&iacute;a</p>
</br>

<?php
$puesto = $_SESSION['user_session']['Puesto'];
$sucursal = $_SESSION['user_session']['Sucursal'];
$IDUsuario = $_SESSION['user_session']['IDUsuario'];

$listaVentas = obtenerListaVentas($IDUsuario,$puesto,$sucursal);

//print_r($listaVentas);

if($listaVentas!=null)
{
?>
	<table border="1"> 
		<tr>
			<th colspan="14">Lista de Ventas</th> 
		</tr>
		<tr>
			<th>IDVenta</th>
			<th>Nombre Cliente</th>
			<th>Nombre Vendedor</th>
			<th>importe de Descuento</th>
			<th>Cantidad art&iacute;culos</th>
			<th>SubTotal</th>
			<th>IVA</th>
			<th>Total</th>
			<th>Fecha Venta</th>
			<th>Metodo de pago</th>
			<th>Estado</th>
			<th>Sucursal</th>
			<th>Venta en</th>
			<th>Acciones</th>
			
		</tr>
	
	<?php 
	    //foreach se utiliza comunmente para arreglos
		foreach($listaVentas as $renglon=>$campos){ ?>
			
			<tr>
				<td><?=$campos['IDVenta']?></td>
				
				<?php $datosCliente = obtenerDatosCliente($campos['IDCliente']);?>
				
				<td><?=$datosCliente['APaterno']?>-<?=$datosCliente['AMaterno']?>-<?=$datosCliente['Nombre']?></td>
				<td><?=$campos['nombreUsuario']?></td>
				<td><?=$campos['Descuento']?></td>
				<td><?=$campos['CantArticulos']?></td>
				<td><?=$campos['subTotal']?></td>
				<td><?=$campos['IVA']?></td>
				<td><?=$campos['importeTotal']?></td>
				<td><?=$campos['FechaVenta']?></td>
				<td><?=$campos['metodoPago']?></td>
				<td><?=$campos['Estado']?></td>
				<td><?=$campos['Sucursal']?></td>
				<td><?=$campos['ventaEn']?></td>
				<td>*Cancelar venta*</td>
			</tr>
			
	<?php	}	?>
	
	</table>
	
<?php } else {?>

no hay datos

<?php }?>
