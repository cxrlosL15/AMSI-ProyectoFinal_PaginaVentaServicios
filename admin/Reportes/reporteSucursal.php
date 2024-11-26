<?php
include('../configuracion.php');
include('../MySqli_conexionDB.php');
	$query = 'SELECT SUM(V.CantArticulos) AS CantArticulos, SUM(V.Descuento) AS Descuento, SUM(V.subTotal) AS subTotal, SUM(V.importeTotal) AS importeTotal, U.Sucursal
				FROM ventas V 
				LEFT JOIN usuarios U 
					ON V.IDUsuario = U.IDUsuario
                    GROUP BY U.Sucursal';
	if(!$resultado = mysqli_query($conexion,$query))
	{
		exit(mysqli_error($conexion));
	}
	
	$lista = array();
	if(mysqli_num_rows($resultado)>0)
	{
		while($renglon = mysqli_fetch_assoc($resultado))
		{	
			if($renglon['Sucursal']==null)
				$sucursal = "WEB";
			else
				$sucursal = $renglon['Sucursal'];
			
			$lista[] = array( //varios renglones o registros
				'label' => $sucursal,
				'value' => $renglon['importeTotal']
				);		
		}
	}

$chartDatos= array ( "chart" =>  
								array( 
									"caption" => "Ventas por Sucursal",
									"xAxisName" => "Sucursales",
									"yAxisName" => "Total de venta", 
									"numberPrefix" => "$", 
									"theme" => "candy"
								)
							  );
							  
$chartDatos["data"] = $lista;

echo json_encode($chartDatos);	
?>