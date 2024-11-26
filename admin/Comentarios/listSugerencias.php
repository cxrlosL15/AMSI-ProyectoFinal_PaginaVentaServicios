</br></br>
	<h2>Lista de SUGERENCIAS enviadas por clientes</h2>
	<p>Bienvenido, esta es la lista de sugerencias enviadas por clientes de <em>"Papelería Dorada"</em></p>
</br>

<?php

$listaSugerencias = obtenerListaSugerencias();

if($listaSugerencias !=null)
{
?>
		<table border="1">
		<tr>
			<th colspan="8">Lista de sugerencias de Clientes</th>
		</tr>
		<tr>
			<th>IDSugerencia</th>
			<th>Nombre</th>
			<th>APaterno</th>
			<th>AMaterno</th>
			<th>CorreoElectronico</th>
			<th>DetalleSugerencia</th>
			<th>FechaSugerencia</th>
			<th>Acciones/Funcionalidades</th>
		</tr>
	
	<?php
		foreach($listaSugerencias as $renglon=>$campos){ ?>
				<tr>
					<td><?=$campos['IDSugerencia']?></td>
					<td><?=$campos['Nombre']?></td>
					<td><?=$campos['APaterno']?></td>
					<td><?=$campos['AMaterno']?></td>
					<td><?=$campos['CorreoElectronico']?></td>
					<td><?=$campos['DetalleSugerencia']?></td>
					<td><?=$campos['FechaSugerencia']?></td>
					<td><a href="<?=ROOTURL?>?accion=deleteSugerencia&IDSugerencia=<?=$campos['IDSugerencia']?>"> Eliminar </a></td>
				</tr>
				
	<?php   }	?>
	
	</table>
	
<?php  }else {?>

no hay datos

<?php } ?>