<!--Si hay tiempo modificar diseño-->
<?php
include("fusioncharts.php");
?>

<script type="text/javascript" src="<?=JS?>fusioncharts.js"></script>
<script type="text/javascript" src="<?=JS?>fusioncharts.theme.fusion.js"></script>
		
<script type="text/javascript">
	FusionCharts && FusionCharts.ready(function () {
		var trans = document.getElementById("controllers").getElementsByTagName("input");
		for (var i=0, len=trans.length; i<len; i++) {                
			if (trans[i].type == "radio"){
				trans[i].onchange = function() {
					changeChartType(this.value);
				};
			}
		}
	});
	
	function changeChartType(chartType) {
		for (var k in FusionCharts.items) {
			if (FusionCharts.items.hasOwnProperty(k)) {
				FusionCharts.items[k].chartType(chartType);
			}
		}
	};
</script>



<html>
	</body>
		<center>
			<div align="center">
				</br><br>
					<h2>Gr&aacute;fico</h2>
				<p style="padding-left: 90px">Has elegido la funcionalidad de "Ver reportes". Seleciona el tipo de gr&aacute;fica que deseas visualizar </p> <!--Agregar padding a los demás formluarios-->
				</br>
				
				<div id="controllers" align="center">
					<input type="radio" name="div-size" value="column2d"/>Barras 2D 
					<input type="radio" name="div-size" checked value="pie3d"/>Pay 3D
					<input type="radio" name="div-size" value="bar2d"/>Barras Horizontales 2D
				</div>
				<br/>
				<div id="filtros" align="center">
					<a href="<?=ROOTURL?>?accion=reportes&filtro=tipoVenta">+Por tipo de venta (web/tienda)</a>&nbsp;&nbsp;
					<a href="<?=ROOTURL?>?accion=reportes&filtro=sucursal">+Por Sucursal </a> &nbsp;&nbsp;
					<a href="<?=ROOTURL?>?accion=reportes&filtro=mes">+Por Mes (año actual)</a>&nbsp;&nbsp;
					<a href="<?=ROOTURL?>?accion=reportes&filtro=producto">+Por Productos</a>&nbsp;&nbsp;
				</div>
				<br/>
				<div id="verGrafico">Aqu&iacute; se cargar&aacute; el gr&aacute;fico</div>
			</div>
		</form>
	</center>
</body>

<?php
$filtro = isset($_GET['filtro'])?$_GET['filtro']:'tipoVenta';
$archivoJSON = "generarDatos.php";

if($filtro == 'tipoVenta')$archivoJSON = "reporteTipoVenta.php";
if($filtro == 'sucursal')$archivoJSON = "reporteSucursal.php";
if($filtro == 'mes')$archivoJSON = "reportePorMes.php";
if($filtro == 'producto')$archivoJSON = "reportePorProducto.php";
      // chart object
      $ChartJSON = new FusionCharts("pie3d", "grafico1" , "1000", "500", "verGrafico", "jsonurl", "Reportes/$archivoJSON"); //al final está la ruta del archivo de los datos generados
		//						tipoGrafico 	Nombre	tamañoH	vertical  espacioDondeSeVerá jsonURL==>los datos se generan como arrelgos
      // Render the chart
      $ChartJSON->render();
?>