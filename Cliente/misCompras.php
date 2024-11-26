<div id="listTarjetas">
<?php
//$listaCompras = array();
$IDCliente = $_SESSION['cliente_session'];
$listaCompras = getListMisCompras($IDCliente);

//print_r($listaCompras);
//si $listaCompras es diferente de nulo o vacio
if($listaCompras!=null)
{
?>
<h2>Mis Compras</h2>
		
<?php 	foreach($listaCompras as $renglon=>$campos){	?>   <!-------Foreach de la tabla Ventas------->
	<table id="misCompras"> 
		<tr>
			<th>C&oacute;digo</th>
			<th>Cantidad</th>
			<th>Descuento</th>
			<th>SubTotal</th>
			<th>IVA</th>
			<th>importeTotal</th>
			<th>Fecha Venta</th>
			<th>m&eacute;todo de pago</th>
			<th>Estado</th>
		</tr>
		<tr>			
			<td><?=$campos['IDVenta']?></td>
			<td><?=$campos['CantArticulos']?></td>
			<td><?=$campos['Descuento']?></td>
			<td><?=$campos['subTotal']?></td>
			<td><?=$campos['IVA']?></td>
			<td><?=$campos['importeTotal']?></td>
			<td><?=$campos['FechaVenta']?></td>
			<td><?=$campos['metodoPago']?></td>
			<td><?=$campos['Estado']?></td>				
		</tr>
		
		<tr>
			<table id="misCompras">
				<tr>
					<td></td>
					<th>IDArticulo</th>
					<th>imagen</th>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Cantidad</th>
					<th>Precio Compra</th>
					<th>Descuento</th>
					<th>Importe</th>	
				</tr>	
			<?php 	$listaComprasDetalle = getListMisComprasDetalle($campos['IDVenta']);	?>
			
			<?php 	foreach($listaComprasDetalle as $renglon=>$camposComprasDetalle){	?>   <!-------Foreach de la tabla ventasDetalle------->
			
			<?php 		$datosArticulo=getDetalleArticulo($camposComprasDetalle['IDArticulo']);?>		
					<tr>
						<td></td>
						<td><?=$camposComprasDetalle['IDArticulo']?></td>
						<td><center><img class="foto" src="<?=$datosArticulo['mostrarFoto']?>"/></center></td>
						
						<td><?=$datosArticulo['NameArticulo']?></td>
						<td><?=$datosArticulo['Marca']?></td>
						<td><?=$camposComprasDetalle['Cantidad']?></td>

						<td class="precios">$ <?=$camposComprasDetalle['Precio']?></td>
						<td class="precios">$ <?=$camposComprasDetalle['Descuento']?></td>
						<td class="precios">$ <?=$camposComprasDetalle['Importe']?></td>
					</tr>
					
			<?php	}	?>
			</table>
		</tr>
<?php	}	?>	
	</table>
	
<?php } else {?>

		<h2>A&uacute; no tienes compras</h2>
		<center><input type="button" value="Ir a la lista de articulos " onclick=self.location="<?=ROOTURL?>?accion=articulos" /></center>

<?php }?>
</div>