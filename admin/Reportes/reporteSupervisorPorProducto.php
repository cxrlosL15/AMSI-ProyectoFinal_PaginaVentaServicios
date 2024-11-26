<?php
include('../configuracion.php');
include('../MySqli_conexionDB.php');
$sucursal = $_GET['sucursal'];

	$query = 'SELECT VD.IDArticulo, COUNT(VD.IDArticulo) AS CantArticulos, SUM(VD.Importe), A.NameArticulo, U.Sucursal
				FROM ventas V 
				LEFT JOIN ventasdetalle VD ON V.IDVenta = VD.IDVenta
				INNER JOIN articulos A ON VD.IDArticulo=A.IDArticulo
				INNER JOIN usuarios U on V.IDUsuario=U.IDUsuario
					WHERE U.Sucursal="'.$sucursal.'"
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
									"caption" => "Ventas por Articulo", //título del gráfico
									"xAxisName" => "Articulo", //títulos en la gráficas de barras
									"yAxisName" => "Cantidad", //títulos en la gráficas de barras
									"numberPrefix" => "", // se puede colocar $ para cantidades
									"theme" => "candy" //diseño del gráfico ==> fint  ocean  fusion
								)
							  );
							  
$chartDatos["data"] = $lista;

echo json_encode($chartDatos);	
?>