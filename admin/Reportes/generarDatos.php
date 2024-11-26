<?php
include('../configuracion.php');
include('../MySqli_conexionDB.php');
	$query = 'SELECT ventaEn, SUM(importeTotal) as importeTotal FROM ventas GROUP BY ventaEn';
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
				'label' => $renglon['ventaEn'],
				'value' => $renglon['importeTotal']
				);		
		}
	}

$chartDatos= array ( "chart" =>  
								array( 
									"caption" => "Ventas por tipo",
									"xAxisName" => "Ventas en",
									"yAxisName" => "Total de venta", 
									"numberPrefix" => "$", 
									"theme" => "candy"
								)
							  );
							  
$chartDatos["data"] = $lista;

echo json_encode($chartDatos);	
?>