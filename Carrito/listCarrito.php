
<!--<script>
		if (isset($_SESSION['carrito'][$Id_Servicios])) {
			$valor = $_SESSION['carrito'][$Id_Servicios];
		} else {
			echo "El índice 'Id_Servicios' no existe.";
		}
		foreach ($_SESSION['carrito'] as $Id_Servicios => $campos) {
			// Asegúrate de que 'Id_Servicios' y 'campos' están correctamente definidos
			if (isset($campos['Id_Servicios'])) {
				echo "ID: " . $campos['Id_Servicios'];
			} else {
				echo "El índice 'Id_Servicios' no está definido para este elemento.";
			}
	}
		</script>-->
		<div id="listCarrito">
<br>

<?php
// Verifica si el carrito existe y contiene artículos
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
?>
    <h2>Mi carrito de compras</h2>
    <table border="1"> 
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th colspan="2">Acciones</th>    
            <th>Importe</th>
        </tr>
       
<?php 
    $total = 0;

    foreach ($_SESSION['carrito'] as $Id_Servicios => $campos) {
        $datosArticulo = getDetalleServicio($Id_Servicios);

        // Si el artículo no se encuentra, muestra un mensaje y continúa con el siguiente
        if (!$datosArticulo) {
            echo "<tr><td colspan='9'>El artículo con ID $Id_Servicios no se encuentra.</td></tr>";
            continue;
        }

        // Calcula el importe
        $precio = $datosArticulo['Precio'];
        $cantidad = $campos['Cantidad']; 
        $importe = $precio * $cantidad;

        // Acumula el total
        $total += $importe;
?>            
        <tr>
            <td><?=$datosArticulo['Id_Servicios']?></td>
            <td><center><img src="<?=$datosArticulo['mostrarFoto']?>" alt="Imagen del artículo"/></center></td>
            <td><?=$datosArticulo['NombreServicio']?></td>
            <td><?=$datosArticulo['Descripccion']?></td>
            <td class="precios">$<?=number_format($datosArticulo['Precio'], 2, '.', ',')?></td>
            <td><?=$cantidad?></td>
            <td>
                <button class="button-carrito button-agregar">
                    <a href="<?=ROOTURL?>?accion=addCarrito&vista=enCarrito&Id_Servicios=<?=$datosArticulo['Id_Servicios']?>">Agregar</a>
                </button>
            </td>
            <td>
                <button class="button-carrito button-eliminar">
                    <a href="<?=ROOTURL?>?accion=deleteCarrito&vista=enCarrito&Id_Servicios=<?=$datosArticulo['Id_Servicios']?>">Eliminar</a>
                </button>    
            </td>
            <td class="precios">$<?=number_format($importe, 2, '.', ',')?></td>
        </tr>
<?php 
    } // Fin del foreach
?>
        <tr>
            <th colspan="8" class="precios">IMPORTE TOTAL</th>    
            <th><h2 id="monto">$<?=number_format($total, 2, '.', ',')?></h2></th>
        </tr>
        <tr>
            <td colspan="8"></td>    
            <td colspan="3"><input type="button" value="Proceder al pago..." onclick="self.location='<?=ROOTURL?>?accion=personalizarCompra'" /></td>
        </tr>
    </table>

<?php 
} else { 
?>

    <br>
    <h2>No tienes artículos en tu carrito</h2>

<?php 
} 
?>
</div>