<?php
	include "../configuracion.php";
	include_once('../MySqli_conexiondb.php');
	
	require_once(HEADERADMIN);
	
		if (isset($_POST['btnRegistrar'])) 
		{
			$uploadfile = $_FILES["uploadImage"]["tmp_name"];//variable donde se guarda el archivo tipo imagen
			$folderRuta = "fotos/";
			$tipoImagen = explode("/",$_FILES["uploadImage"]["type"]);//variable donde se guarda el tipo de imagen
			$IDArticulo = $_REQUEST['IDArticuloFoto'];//variable donde se guarda el ID del balón
			$nombreImagen = $IDArticulo.".".$tipoImagen[1]; //se renombra la imagen con el ID del balón para evitar que se reemplacen imagenes con el mismo nombre
			
			//var_dump($_REQUEST);
		if (! is_writable($folderRuta) || ! is_dir($folderRuta)) 
		{ //Si ocurre algún error se muestra el mensaje para regresar a la lista

?>
	<html>
		<body></br>
			<div id="editform">
				<form>
					<center>
							<br>
								<h3 class="title"> Error al intentar Registrar la Foto de perfil</h3>
								<?=mysqli_error($conexion)?>
								<input type="button" value="Ir a la lista de Clientes" onclick=self.location="<?=ROOTURL?>?accion=listClientes" />
							</br>
					</center>
				</form>
			</div>
		</body>
	</html>	
<?php
		}
		$query = "SELECT IDArticulo, Foto FROM articulos WHERE IDArticulo = '$IDArticulo'";
		//se realiza la consulta para verificar si hay una imagen borrarla y guardar la nueva imagen
		
		if (!$result = mysqli_query($conexion, $query))
			exit(mysqli_error($conexion));
		
		if(mysqli_num_rows($result) > 0) {
			
			while ($row = mysqli_fetch_assoc($result)) {
				
				if(file_exists(DOCROOT."Articulos/fotos/".$row['Foto']) && $row['Foto']<>""){
					unlink(DOCROOT."Articulos/fotos/".$row['Foto'])or die("Couldn't delete file");//unlink es la instrucción para borrar archivos
				}
			}
		}
		
		if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $folderRuta . $nombreImagen)) {//se guarda la imagen seleciona
			echo '<img src="' . ROOTURL."Articulos/" . $folderRuta . "" . $nombreImagen . '">';//se muestra la imagen guardada
			$query = "UPDATE articulos SET Foto='$nombreImagen' WHERE IDArticulo = '$IDArticulo'";//se guarda el nombre de la imagen
			
			if (!$result = mysqli_query($conexion, $query))
				exit(mysqli_error($conexion)); 
		}
?>
	<html>
		<body></br>
			<div id="editform">
				<form>
					<center>
						<br>
							<h3>Imagen Guardada!!!</h3>
							<input type="button" value="Ir a la lista de Articulos" onclick=self.location="<?=ROOTURL?>?accion=listArticulos" />
						</br>
					</center>
				</form>
			</div>
		</body>
	</html>	
<?php
		}
		require_once(FOOTERADMIN);
?>