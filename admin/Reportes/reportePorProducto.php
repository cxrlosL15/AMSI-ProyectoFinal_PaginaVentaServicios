<?php
include('../configuracion.php');
include('../MySqli_conexionDB.php');
	$query = 'SELECT VD.IDArticulo, COUNT(VD.IDArticulo) AS CantArticulos, SUM(VD.Importe), A.NameArticulo
				FROM ventasdetalle VD
				INNER JOIN articulos A
					ON VD.IDArticulo=A.IDArticulo
						GROUP BY VD.IDArticulo';
					
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
				'label' => $renglon['NameArticulo'],
				
				'value' => $renglon['CantArticulos']
				);		
		}
	}

$chartDatos= array ( "chart" =>  
								array( 
									"caption" => "Ventas por Articulos", //título del gráfico
									"xAxisName" => "Articulo", //títulos en la gráficas de barras
									"yAxisName" => "Cantidad", //títulos en la gráficas de barras
									"numberPrefix" => "", // se puede colocar $ para cantidades
									"theme" => "candy" //diseño del gráfico ==> fint  ocean  fusion  carbon
								)
							  );
							  
$chartDatos["data"] = $lista;

echo json_encode($chartDatos);	
?>