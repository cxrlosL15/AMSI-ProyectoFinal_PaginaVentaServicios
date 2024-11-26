</br></br>
	<h2>Subir Foto de Art&iacute;culo de Papeler&iacute;a</h2>
	<p>Has elegido la funcionalidad de "Agregar imagen"</p>
</br>
<?php

$IDArticulo =(isset($_GET['IDArticulo'])) ? $_GET['IDArticulo'] : null;

$DatosArticulo=obtenerDatosArticulo($IDArticulo); //Se obtienen los datos del artículo para subir la...

	if($DatosArticulo!==null)
		{ 
			$IDArticulo = $DatosArticulo['IDArticulo'];
			$imagen = $DatosArticulo['mostrarFoto'];
			$NameArticulo = $DatosArticulo['NameArticulo'];
			$Marca = $DatosArticulo['Marca'];
			$Estado = $DatosArticulo['Estado'];
		}
?>
	<div id="datosArticulo">
		<html>
			<body>
				<center>
						<form name="frmArticulo" action="Articulos/articulos_SubirFoto.php" method="POST" enctype="multipart/form-data">																
						<input type="hidden" name="IDArticuloFoto" id="IDArticuloFoto" value="<?=$IDArticulo?>" />
						
						<br><h3>Subir imagen del Art&iacute;culo</h3>
						<center><img src="<?=$imagen?>" /></center></br>
						
						<label> * IDArticulo: 
							<input type="text" name="IDArticulo" id="IDArticulo" value="<?=$IDArticulo?>" disabled />
						</label></br>
						
						<label>* Nombre del Art&iacute;culo:
							<input type="text" name="IDNameArticulo" id="IDNameArticulo" value="<?=$NameArticulo?>" disabled />
						</label></br>
						
						<label>* Marca: </br>
							<input type="text" name="Marca" id="Marca" value="<?=$Marca?>" disabled />
						</label></br>
						
						<label>* Estado: </br>
							<input type="text" name="Estado" id="Estado" value="<?=$Estado?>" disabled />
						</label></br></br>
						
						<input type="file" id="uploadImage" name="uploadImage"/> </br>
						
						<input type="submit" name="btnRegistrar" id="btnRegistrar" value="subirImagen" />
						</form>
				</center>
			</body>
		</html>
	</div>






























