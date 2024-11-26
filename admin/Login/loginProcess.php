<?php
//print_r($_POST);

require_once("../configuracion.php");
include('../MySqli_conexionDB.php');

require_once(HEADERADMIN);

$accion = $_POST['accion'];
$NombreUsuario = $_POST['NombreUsuario'];
$Contrasena = $_POST['Contrasena'];

$query = "SELECT IDUsuario, Nombre, NombreUsuario, Contrasena, Estado,Puesto,Sucursal FROM usuarios WHERE NombreUsuario='$NombreUsuario' AND Contrasena='$Contrasena' AND Estado='ACTIVO'";

if($accion == "login")
{
		if(!$resultado = mysqli_query($conexion,$query))
		{  
		?>
		
			<center>
				<h2>Error al intentar Iniciar sesi&oacute;n</h2>
				<h2><?=mysqli_error($conexion)?></h2>
				<input type="button" value="Ir al formulario de inicio de sesi&oacute;n" onclick=self.location="<?=ROOTURL?>" />
			</center>
					
<?php	}else{
			$datosUsuario = mysqli_fetch_assoc($resultado);
			//print_r($datosUsuario);
			if($NombreUsuario==$datosUsuario['NombreUsuario'] && $Contrasena==$datosUsuario['Contrasena'] && 'ACTIVO'==$datosUsuario['Estado'] && mysqli_num_rows($resultado)>0){
				
					//aquí se crea mi variable de sesión para ingresar a mi sistema de información
					$_SESSION['user_session']=$datosUsuario;
					
					//print_r($_SESSION);
				?>
				<center>
					<h2>Usuario autorizado para ingresar</h2>
					<input type="button" value="Ir a la p&aacute;gina principal" onclick=self.location="<?=ROOTURL?>" />
				</center>
				
<?php			header("Location: ".ROOTURL); 
				}else{ ?>
					<center>
						<h2>Usuario no autorizado para ingresar o datos incorrecto</h2>
						<input type="button" value="Ir al formulario de inicio de sesi&oacute;n" onclick=self.location="<?=ROOTURL?>" />
					</center>
	
<?php				}
			
		}
}
include_once(FOOTERADMIN);
?>

<!--<body bgcolor="#fce5d1">
			<font size= "4" face="Lucida Handwriting" align="center">-->