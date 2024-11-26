</br><br>
	<h2>Lista de art&iacute;culos de Papeler&iacute;a Dorada</h2>
	<p>Bienvenido a la <em>"Lista de art&iacute;culos de la Papeler&iacute;a Dorada"</em>, esta es la lista de los art&iacute;culos resgistrados en la papeler&iacute;a</p>
</br>

<?php

$listaArticulos = obtenerListaArticulos();

if($listaArticulos!=null)
{
?>
	<table border="1">
		<tr>
			<th colspan="11">Lista de art&iacute;culos</th>
		</tr>
		<tr>
			<th>ID</th>
			<th>ImagenArticulo</th>
			<th>NameArticulo</th>
			<th>Marca</th>
			<th>PrecioActual</th>
			<th>CantidadDisponible</th>
			<th>FechaRegistro</th>
			<th>Estado</th>
			<th colspan="3">Acciones/Funcionalidades</th>
		</tr>

	<?php
		foreach($listaArticulos as $renglon=>$campos){ ?>
				<tr>
					<td><?=$campos['IDArticulo']?></td>
					
					<td><center> <img class="foto" src="<?=$campos['mostrarFoto']?>"/> </center></td>
					
					<td><?=$campos['NameArticulo']?></td>
					<td><?=$campos['Marca']?></td>
					<td> $ <?=$campos['PrecioActual']?></td>
					<td><?=$campos['CantidadDisponible']?></td>
					<td><?=$campos['FechaRegistro']?></td>
					<td><?=$campos['Estado']?></td>
					<td><a href="<?=ROOTURL?>?accion=deleteArticulo&IDArticulo=<?=$campos['IDArticulo']?>"> Eliminar</a></td>
					<td><a href="<?=ROOTURL?>?accion=editArticulo&IDArticulo=<?=$campos['IDArticulo']?>"> Modificar </a></td>
					
					<td><a href="<?=ROOTURL?>?accion=imgArticulo&IDArticulo=<?=$campos['IDArticulo']?>"> Agregar Imagen </a></td>
				</tr>
				
	<?php   }	?>
	</table>
<?php  }else {?>

no hay datos

<?php } ?>