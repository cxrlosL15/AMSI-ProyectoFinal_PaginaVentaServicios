<?php
	require_once '../configuracionCliente.php';
	$db_host = DBHOST;
	$db_name = DBNAME;
	$db_CorreoElectronico = DBUSER;
	$db_pass = DBPASSWD;
	//print_r($_REQUEST);
	require_once(HEADERCLIENTE);
	
	try{		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_CorreoElectronico,$db_pass);
		
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}

	if(isset($_POST['btnLogin']))
	{
		$CorreoElectronico = trim($_POST['CorreoElectronico']);
		$Contrasena = trim($_POST['Contrasena']);//quitar espacio antes y despues de la palabra
		
		try
		{			
			$stmt = $db_con->prepare("SELECT * FROM clientes WHERE CorreoElectronico='".$CorreoElectronico."'");
		
			$stmt->execute();
			//print_r($stmt);
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			//print_r($row);
			if($count==0)//no existe usuario
				$DBcontraseña ="";
			else
				$DBcontraseña =$row['Contrasena'];
			//exit;
			
			if($DBcontraseña==$Contrasena){				
				
				echo "ok"; // log in
				$_SESSION['cliente_session'] = $row['Id_Cliente'];
				header("Location: ".ROOTURL);//regresa a la página principal
			}
			else{?>
					</br>
					<center>
						<h2>Usuario no autorizado para ingresar o datos incorrecto</h2>
						<input type="button" value="Ir al formulario de inicio de sesi&oacute;n" onclick=self.location="<?=ROOTURL?>" />
					</center>
<?php			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
include_once(FOOTERCLIENTE);
?>