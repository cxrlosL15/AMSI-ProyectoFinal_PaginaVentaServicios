<div id="listTarjetas">
<br>
	<?php
	$IDCliente = $_SESSION['cliente_session'];
	$listTarjetas = getListTarjetas($IDCliente);
	if($listTarjetas!=null)
	{			
	?>
		<h2>Mi tarjetas</h2>
		<table border="1"> 
			<tr>
				<th>Nombre Titular</th>
				<th>N&uacute;mero Tarjeta</th>
				<th>Fecha Vencimiento</th>
				<th>CVC</th>			
				<th>Acciones</th>
			</tr>
		
		<?php 	
		foreach($listTarjetas as $campos)
		{			
		?>			
				<tr>
					<td><?=$campos['nombreTitular']?></td>
					<td><?=substr_replace($campos['Numero'],"**** **** ****",0,12)?></td> <!--Reemplazar cierto número de caracteres-->
					<td><?=$campos['FechaVencimiento']?></td>
					<td><?=substr_replace($campos['CVC'],"***",0,3)?></td>
					<td><a href="<?=ROOTURL?>?accion=deleteTarjeta&IDTarjeta=<?=$campos['IDTarjeta']?>"> Eliminar</a></td>
				
				</tr>
				
		<?php	}	?>
				
		</table>
		
	<?php } else {?>
	
		<br>
		<h2>No tienes Tarjetas registradas</h2>

	<?php }?>
</div>