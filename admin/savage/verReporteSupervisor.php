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

<br/>
<div align="center">
	<label style="padding: 0px 5px !important;">Gr&aacute;ficos</label>
	<br/><br/>
	<div id="controllers" align="center">
		<input type="radio" name="div-size" value="column2d"/>Barras 2D 
		<input type="radio" name="div-size" checked value="pie3d"/>Pay 3D
		<input type="radio" name="div-size" value="bar2d"/>Barras Horizontales 2D
	</div>
	<br/>
	<div id="filtros" align="center">
		<a href="<?=ROOTURL?>?accion=reportesSupervisor&filtro=tipoPago">+Por m&eacute;todo de pago</a>&nbsp;&nbsp;
		<a href="<?=ROOTURL?>?accion=reportesSupervisor&filtro=usuario">+Por Usuario </a> &nbsp;&nbsp;
		<a href="<?=ROOTURL?>?accion=reportesSupervisor&filtro=mes">+Por Mes (año actual)</a>&nbsp;&nbsp;
		<a href="<?=ROOTURL?>?accion=reportesSupervisor&filtro=producto">+Por Productos</a>&nbsp;&nbsp;
	</div>
	<br/>
	<div id="verGrafico">Aqu&iacute; se cargar&aacute; el gr&aacute;fico</div>
</div>
<?php
$filtro = isset($_GET['filtro'])?$_GET['filtro']:'tipoVenta';
$archivoJSON = "reporteSupervisorPorProducto.php";
$sucursal = $_SESSION['user_session']['Sucursal'];

if($filtro == 'tipoPago')	$archivoJSON = "reporteSupervisorPorMetodoPago.php?sucursal=$sucursal";
if($filtro == 'usuario')	$archivoJSON = "reporteSupervisorPorUsuario.php?sucursal=$sucursal";
if($filtro == 'mes')	$archivoJSON = "reporteSupervisorPorMes.php?sucursal=$sucursal";
if($filtro == 'producto')	$archivoJSON = "reporteSupervisorPorProducto.php?sucursal=$sucursal";
      // chart object
      $ChartJSON = new FusionCharts("pie3d", "grafico1" , "1000", "500", "verGrafico", "jsonurl", "Reportes/$archivoJSON");

      // Render the chart
      $ChartJSON->render();
?>