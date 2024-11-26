<!--listVentas-->
<th>Informaci&oacute;n del Art&iacute;culo</th>
<!--Información del Artículo
					
					<?php $datosArticulo = obtenerDatosArticulo($campos ['IDArticulo']);	?>
					
					<td><?=$datosArticulo['NameArticulo']?> - <?=$datosArticulo['Marca']?> - $<?=$datosArticulo['PrecioActual']?></td>-->
					
<!--formVenta-->

<label>Selecciona el Art&iacute;culo*
			<?php if($listArticulos != null )
					{	?>
					<select name="IDArticulo" id="IDArticulo" required>		
				
						<?php	foreach($listArticulos as $renglon=>$campos)
								{	?>
									<option value="<?=$campos['IDArticulo']?>"> <?=$campos['NameArticulo']?> - <?=$campos['Marca']?> - $<?=$campos['PrecioActual']?> - <?=$campos['FechaRegistro']?> </option>
						<?php	}	?>
					</select>
			<?php	}	?>
		</label></br>
		
		