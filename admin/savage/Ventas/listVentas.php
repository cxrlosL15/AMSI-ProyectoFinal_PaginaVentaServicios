</br></br>
	<h2>Ventas - Papeler&iacute;a Dorada</h2>
	<p>Bienvenido, esta es la lista de las ventas realizadas en la <em> "Papeler&iacute;a Dorada". </em></p>
</br>

<?php

$listaVentas = obtenerListaVentas();

if($listaVentas!=null)
{
?>
	<table border="1">
		<tr>
			<th colspan="13">Lista de Ventas</th>
		</tr>
		<tr>
			<th>IDVenta</th>
			<th>Nombre del Cliente</th>
			<th>Cantidad Art&iacute;culos</th>
			<th>Descuento</th>
			<th>subTotal</th>
			<th>IVA</th>
			<th>ImporteTotal</th>
			<th>FechaVenta</th>
			<th>metodoPago</th>
			<th>Estado</th>
			<th>IDUsuario</th>
			<th>ventaEn</th>
			<th colspan="1">Acciones/Funcionalidades</th>
		</tr>
	
	<?php
		
		foreach($listaVentas as $renglon=>$campos){ ?>
				<tr>
					<td><?=$campos['IDVenta']?></td>
					
					<!--Información del Cliente (Nombre del Cliente)-->
					
					<?php $datosCliente = obtenerDatosCliente($campos ['IDCliente']);	?>
					
					<td><?=$datosCliente['Nombre']?> - <?=$datosCliente['APaterno']?> - <?=$datosCliente['AMaterno']?></td>
					
					
					<!--Información y funcionalidades de la Venta-->
					
					<td><?=$campos['CantArticulos']?></td>
					<td><?=$campos['Descuento']?></td>
					<td>$ <?=$campos['subTotal']?></td>
					<td><?=$campos['IVA']?></td>
					<td>$ <?=$campos['ImporteTotal']?></td>
					<td><?=$campos['FechaVenta']?></td>
					<td><?=$campos['metodoPago']?></td>
					
					<td><?=$campos['Estado']?></td>
					<td><?=$campos['IDUsuario']?></td>
					<td><?=$campos['ventaEn']?></td>
					
					<?php if($campos['Estado']=="CONFIRMADA")
							{?>
							<td><a href="<?=ROOTURL?>?accion=estadoVenta&IDVenta=<?=$campos['IDVenta']?>"> Cancelar venta </a></td>
					<?php	}else{	?>
							<td>**</td>
					<?php	}	?>
					

				</tr>
				
	<?php   }	?>
	
	</table>
	
<?php  }else {?>

no hay datos

<?php } ?>