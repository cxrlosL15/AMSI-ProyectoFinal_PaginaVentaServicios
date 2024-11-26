</br></br>
	<h2>Lista de Usuarios</h2>
	<p>Bienvenido, esta es la lista de usuarios resgistrados en <em>"Papelería Dorada"</em></p>
</br>

<?php

$listaUsuarios = obtenerListaUsuarios();

if($listaUsuarios !=null)
{
?>
		<table border="1">
		<tr>
			<th colspan="11">Lista de Usuarios</th>
		</tr>
		<tr>
			<th>ID</th>
			<th>Foto de perfil</th>
			<th>APaterno</th>
			<th>AMaterno</th>
			<th>Nombre</th>
			<th>Estado</th>
			<th>Puesto</th>
			<th>Sucursal</th>
			<th colspan="3">Acciones/Funcionalidades</th>
		</tr>
	
	<?php
		foreach($listaUsuarios as $renglon=>$campos){ ?>
				<tr>
					<td><?=$campos['IDUsuario']?></td>
					
					<td><center><img class="foto" src="<?=$campos['mostrarFoto']?>"/></center></td>					
					<td><?=$campos['APaterno']?></td>
					<td><?=$campos['AMaterno']?></td>
					<td><?=$campos['Nombre']?></td>
					<td><?=$campos['Estado']?></td>
					<td><?=$campos['Puesto']?></td>
					<td><?=$campos['Sucursal']?></td>
					<td><a href="<?=ROOTURL?>?accion=deleteUsuario&IDUsuario=<?=$campos['IDUsuario']?>"> Eliminar </a></td>
					<td><a href="<?=ROOTURL?>?accion=editUsuario&IDUsuario=<?=$campos['IDUsuario']?>"> Modificar </a></td>
					<td><a href="<?=ROOTURL?>?accion=imgUsuario&IDUsuario=<?=$campos['IDUsuario']?>"> Agregar Imagen </a></td>
				</tr>
				
	<?php   }	?>
	
	</table>
	
<?php  }else {?>

no hay datos

<?php } ?>