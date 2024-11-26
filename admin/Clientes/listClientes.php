</br></br>
	<h2>Lista de Clientes</h2>
	<p>Bienvenido, esta es la lista de clientes resgistrados en <em>"Papelería Dorada"</em></p>
</br>

<?php

$listaClientes = obtenerListaClientes();

if($listaClientes !=null)
{
?>
		<table border="1">
		<tr>
			<th colspan="9">Lista de Clientes</th>
		</tr>
		<tr>
			<th>ID</th>
			<th>Foto de perfil</th>
			<th>APaterno</th>
			<th>AMaterno</th>
			<th>Nombre</th>
			<th>CorreoElectronico</th>
			
			<th colspan="3">Acciones/Funcionalidades</th>
		</tr>
	
	<?php
		foreach($listaClientes as $renglon=>$campos){ ?>
				<tr>
					<td><?=$campos['IDCliente']?></td>
					<td><center><img class="foto" src="<?=$campos['mostrarFoto']?>"/></center></td> <!--nuevo -->
					<td><?=$campos['APaterno']?></td>
					<td><?=$campos['AMaterno']?></td>
					<td><?=$campos['Nombre']?></td>
					<td><?=$campos['CorreoElectronico']?></td>
					
					<td><a href="<?=ROOTURL?>?accion=deleteCliente&IDCliente=<?=$campos['IDCliente']?>"> Eliminar </a></td>
					<td><a href="<?=ROOTURL?>?accion=editCliente&IDCliente=<?=$campos['IDCliente']?>"> Modificar </a></td>
					<td><a href="<?=ROOTURL?>?accion=imgCliente&IDCliente=<?=$campos['IDCliente']?>"> Agregar Imagen </a></td> <!--nuevo -->
				</tr>
				
	<?php   }	?>
	
	</table>
	
<?php  }else {?>

no hay datos

<?php } ?>