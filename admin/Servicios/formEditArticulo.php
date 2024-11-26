</br></br>
	<h2>Modificar Art&iacute;culo</h2>
	<p>Has elegido la funcionalidad de "Modificar datos del Art&iacute;culo"</p>
</br>

<?php

$IDArticulo = $_GET['IDArticulo'];

$datosArticulo = obtenerDatosArticulo($IDArticulo);

		if($datosArticulo!=null)
		{?>
			<center>
				<form name="frmEditArticulo" id="frmEditArticulo" action="Articulos/updateArticulo.php" method="POST">
					<input type="hidden" name="accion" id="accion" value="updateArticulo" />
					<input type="hidden" name="IDArticulo" id="IDArticulo"  value="<?=$datosArticulo['IDArticulo']?>" />
					
					<br><h3>Modificar datos del Art&iacute;culo</h3>
					
					<label>IDArticulo: <?=$datosArticulo['IDArticulo']?>
					</label></br>
					
					<label>Nombre del Art&iacute;culo:
						<input type="text" name="NameArticulo" id="NameArticulo" value="<?=$datosArticulo['NameArticulo']?>"  required />
					</label></br>
					
					<label>Marca: </br>
						<input type="text" name="Marca" id="Marca"  value="<?=$datosArticulo['Marca']?>" required />
					</label></br>
					
					<label>Precio Actual del Art&iacute;culo:
						<input type="text" name="PrecioActual" id="PrecioActual"  value="<?=$datosArticulo['PrecioActual']?>" required />
					</label></br>
					
					<label>Cantidad Disponible:
						<input type="text" name="CantidadDisponible" id="CantidadDisponible"  value="<?=$datosArticulo['CantidadDisponible']?>" required />
					</label></br>
					
					<label>Fecha de Registro del Articulo:
						<input type="date" name="FechaRegistro" id="FechaRegistro"  value="<?=$datosArticulo['FechaRegistro']?>" required />
					</label></br>
					
					<label>¿Cuál es el Estado del Articulo?
							<select name="Estado" id="Estado" value="<?=$datosArticulo['Estado']?>"   required  >
								  <option selected>DISPONIBLE
								  <option>AGOTADO
							</select >
					</label><br><br>
					
					<input type="submit" name="btnActualizar" id="btnActualizar" value="Actualizar datos" />
				</form>
			</center>
<?php	}

?>