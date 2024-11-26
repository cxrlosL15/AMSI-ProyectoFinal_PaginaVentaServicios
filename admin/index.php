<?php
include_once('configuracion.php');
           //isset es para identificar la existencia de una variable con el método GET o POST
$accion = (isset($_POST['accion']))?$_POST['accion']:null;
$accion = (isset($_GET['accion']))?$_GET['accion']:$accion;

if(isset($_SESSION['user_session']))
{
	
//echo "accion tiene valor de: ".$accion;

	include_once("header.php");

		switch($accion)
		{
			case "listGeneral":
				 include_once("ConexionBD/listGeneral.php");
			break;
			//-----------Sección de Clientes----------------
			case "listClientes":
				 include_once("Clientes/listClientes.php");
			break;
			
			case "deleteCliente":
				 include_once("Clientes/deleteCliente.php");
			break;
		
			case "addCliente":
				 include_once("Clientes/formCliente.php");
			break;
			
			case "editCliente":
				 include_once("Clientes/formEditCliente.php");
			break;
			
			case "imgCliente":
				 include_once("Clientes/datosImagenCliente.php");
			break;
			
			//-----------Sección de Articulos-----------------
			case "listArticulos":
				 include_once("Articulos/listArticulos.php");
			break;
			
			case "deleteArticulo":
				 include_once("Articulos/deleteArticulo.php");
			break;
			
			case "addArticulo":
				 include_once("Articulos/formArticulo.php");
			break;
			
			case "editArticulo":
				 include_once("Articulos/formEditArticulo.php");
			break;
			
			case "imgArticulo":
				 include_once("Articulos/datosImagenArticulo.php");
			break;
			
			//-----------Sección de Ventas-----------------
			case "listVentas":
				 include_once("Ventas/listVentas.php");
			break;
			
			case "addVentas":
					 include_once("Ventas/formVentas.php");
			break;
			
			case "estadoVenta":
				 include_once("Ventas/estadoVenta.php");
			break;
			
			//-----------Sección de Usuarios----------------
			case "listUsuarios":
				 include_once("Usuarios/listUsuarios.php");
			break;
			
			case "deleteUsuario":
				 include_once("Usuarios/deleteUsuario.php");
			break;
		
			case "addUsuario":
				 include_once("Usuarios/formUsuario.php");
			break;
			
			case "editUsuario":
				 include_once("Usuarios/formEditUsuario.php");
			break;
			
			case "imgUsuario":
				 include_once("Usuarios/datosImagenUsuario.php");
			break;
			
			case "reportes":
				include_once("Reportes/verReporte.php");
			break;
		
			case "reportesSupervisor":
				include_once("Reportes/verReporteSupervisor.php");
			break;
			
			/*INICIO DE ESPACIO PARA COMENTARIOS (Funcionalidad Extra)*/
			
			case 'listQuejas':
				include_once("Comentarios/listQuejas.php");
			break;
		
			case 'listSugerencias':
				include_once("Comentarios/listSugerencias.php");
			break;
			
			case 'deleteSugerencia':
				include_once("Comentarios/deleteSugerencia.php");
			break;
		
			case 'deleteQueja':
				include_once("Comentarios/deleteQueja.php");
			break;
			
			/*FIN DE ESPACIO PARA COMENTARIOS*/

			
			default:
				 include_once("home.php");
			break;
		}
			include_once("footer.php");
	
} else	{
			include_once("Login/formLogin.php");
		}

?>