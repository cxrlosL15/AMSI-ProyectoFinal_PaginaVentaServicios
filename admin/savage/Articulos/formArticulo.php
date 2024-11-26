</br><br>
	<h2>Registrar Art&iacute;culo</h2>
	<p>Has elegido la funcionalidad de "Registrar datos del Art&iacute;culo"</p>
</br>

<html>
	</body>
		<center>
				<form name="frmArticulo" id="frmArticulo" action="Articulos/addArticulo.php" method="POST">
				<input type="hidden" name="accion" id="accion" value="addArticulo" />
				<input type="hidden" name="Estado" id="Estado" value="DISPONIBLE"	/>
				
				<br><h3>Registro del Art&iacute;culo</h3>
				
				<label>Nombre del Art&iacute;culo:
					<input type="text" name="NameArticulo" id="NameArticulo" required />
				</label></br>
				
				<label>Marca: </br>
					<input type="text" name="Marca" id="Marca" required />
				</label></br>
				
				<label>Precio Actual del Art&iacute;culo:
					<input type="text" name="PrecioActual" id="PrecioActual" required />
				</label></br>
				
				<label>Cantidad Disponible:
					<input type="text" name="CantidadDisponible" id="CantidadDisponible" required />
				</label></br>
				
				<label>Fecha de Registro del Articulo: </br>
					<input type="date" name="FechaRegistro" id="FechaRegistro" required />
				</label></br>
				
				<label> Estado: </br>
					<input  type="text" name="Estado" id="Estado" value="DISPONIBLE"   disabled  />
				</label> </br>

				<input type="submit" name="btnRegistrar" id="btnRegistrar" value="Registrar" />
			</form>
		</center>
	</body>
</html>