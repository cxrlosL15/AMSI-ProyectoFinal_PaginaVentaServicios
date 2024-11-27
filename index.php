<?php
require_once('configuracionCliente.php');

	$accion = (isset($_POST['accion'])) ? $_POST['accion'] : null;
	$accion = (isset($_GET['accion'])) ? $_GET['accion'] : $accion;
	//echo $accion;

	include_once(HEADERCLIENTE);// variable global
	
	switch($accion) {
		case 'registro':
			include_once("Cliente/registro.php");
		break;

		case 'Ventas':
			include_once("Servicios/listServicio.php");
		break;
		
		case 'verArticulo':
			include_once("Servicios/detalleServicio.php");
		break;
		
		case 'addCarrito':
			include_once("Carrito/accionesCarrito.php");
		break;
		
		case 'deleteCarrito':
			include_once("Carrito/accionesCarrito.php");
		break;
		
		case 'carrito':
			include_once("Carrito/listCarrito.php");
		break;

		case 'login':
			include_once("Login/formLogin.php");
		break;
		
		case 'addTarjetas':
			include_once("Cliente/formTarjetas.php");
		break;
		
		case 'listTarjetas':
			include_once("Cliente/listTarjetas.php");
		break;
		
		case 'misCompras':
			include_once("Cliente/misCompras.php");
		break;
		
		case 'miPerfil':
			include_once("Cliente/miPerfil.php");
		break;
		
		case 'personalizarCompra':
			include_once("Carrito/personalizarCompra.php");
		break;
		
		case 'pagar':
			include_once("Carrito/confirmarCompra.php");
		break;
		
		//INICIO DE ESPACIO PARA COMENTARIOS (Funcionalidad extra)
		
		case 'comentarios':
			include_once("ComentariosCliente/introComentarios.php");
		break;
		
		case 'misQuejas':
			include_once("ComentariosCliente/formQueja.php");
		break;
		
		case 'misSugerencias':
			include_once("ComentariosCliente/formSugerencia.php");
		break;
		
		//FIN DE ESPACIO PARA COMENTARIOS
		
		
		default:
			include_once("homeCliente.php");
		break;
	}
	
	include_once(FOOTERCLIENTE);
	
?>
