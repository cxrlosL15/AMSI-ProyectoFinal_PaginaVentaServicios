</br></br>
	<h2>Lista de QUEJAS enviadas por clientes</h2>
	<p>Bienvenido, esta es la lista de quejas enviadas por clientes de <em>"Papelería Dorada"</em></p>
</br>

<?php

$listaQuejas = obtenerListaQuejas();

if($listaQuejas !=null)
{
?>
		<table border="1">
		<tr>
			<th colspan="8">Lista de Quejas de Clientes</th>
		</tr>
		<tr>
			<th>IDQueja</th>
			<th>Nombre</th>
			<th>APaterno</th>
			<th>AMaterno</th>
			<th>CorreoElectronico</th>
			<th>DetalleQueja</th>
			<th>FechaQueja</th>
			<th>Acciones/Funcionalidades</th>
		</tr>
	
	<?php
		foreach($listaQuejas as $renglon=>$campos){ ?>
				<tr>
					<td><?=$campos['IDQueja']?></td>
					<td><?=$campos['Nombre']?></td>			
					<td><?=$campos['APaterno']?></td>
					<td><?=$campos['AMaterno']?></td>
					<td><?=$campos['CorreoElectronico']?></td>
					<td><?=$campos['DetalleQueja']?></td>
					<td><?=$campos['FechaQueja']?></td>
					<td><a href="<?=ROOTURL?>?accion=deleteQueja&IDQueja=<?=$campos['IDQueja']?>"> Eliminar </a></td>
					
				</tr>
				
	<?php   }	?>
	
	</table>
	
<?php  }else {?>

no hay datos

<?php } ?>