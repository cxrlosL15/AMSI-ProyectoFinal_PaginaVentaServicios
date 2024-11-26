<?php
include('../configuracion.php');
include('../MySqli_conexionDB.php');
$sucursal = $_GET['sucursal'];

	$query = 'SELECT SUM(V.CantArticulos) AS CantArticulos, SUM(V.Descuento) AS Descuento, SUM(V.subTotal) AS subTotal, SUM(V.importeTotal) AS importeTotal, U.Sucursal, V.FechaVenta, DATE_FORMAT(V.FechaVenta,"%M") as Mes
				FROM ventas V 
				LEFT JOIN usuarios U 
					ON V.IDUsuario = U.IDUsuario
					WHERE U.Sucursal="'.$sucursal.'"
                    GROUP BY YEAR(V.FechaVenta), MONTH(V.FechaVenta)';
					
	if(!$resultado = mysqli_query($conexion,$query))
	{
		exit(mysqli_error($conexion));
	}
	
	$lista = array();
	if(mysqli_num_rows($resultado)>0)
	{
		while($renglon = mysqli_fetch_assoc($resultado))
		{				
			$lista[] = array( //varios renglones o registros
				'label' => $renglon['Mes'],
				'value' => $renglon['importeTotal']
				);		
		}
	}

$chartDatos= array ( "chart" =>  
								array( 
									"caption" => "Ventas por Mes, año actual",
									"xAxisName" => "Mes",
									"yAxisName" => "Total de venta", 
									"numberPrefix" => "$", 
									"theme" => "candy"
								)
							  );
							  
$chartDatos["data"] = $lista;

echo json_encode($chartDatos);	
?>