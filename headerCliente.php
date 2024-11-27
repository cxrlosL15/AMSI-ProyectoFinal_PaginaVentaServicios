<!DOCTYPE html> <!--tipo de documento, comentarios -->
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Renta de servicios, Freelance">
		
		<meta name="keywords" content="Servicios, IA, programacion, Freelance, POO" />
		
		<meta name="author" content="<?=AUTOR?>" />
		
		<link rel="icon" href="<?=ROOTURL?>favicon.ico" type="image/x-icon"/>
		
		<title><?=SITENAME?> | <?=AUTOR?></title>
		
		<link rel="stylesheet" type="text/css" href="<?=CSS?>menu.css" />		
		<link rel="stylesheet" type="text/css" href="<?=CSS?>general.css" />
		<link rel="stylesheet" type="text/css" href="<?=CSS?>producto.css" />
		
		<!--Recien agregado-->
		<link rel="stylesheet" type="text/css" href="<?=CSS?>login.css" />		
		<link rel="stylesheet" type="text/css" href="<?=CSS?>tabla.css" />
		<link rel="stylesheet" type="text/css" href="<?=CSS?>formularios.css" />
		

		 
		<script src="<?=JS?>fechaActual.js"></script>
	</head>
	
  
	
	<body onload="horaActual()">
		<?php	
		
		
			var_dump($_SESSION);
			$opcion=""; $accion="";
			
			

			
			if(isset($_GET['accion']))
			{
				$menuactivo="current-menu-item"; 
				$opcion = $accion=$_GET['accion'];
				
				if($accion=="addTarjetas" || $accion=="listTarjetas" || $accion=="misCompras" || $accion=="miPerfil" )
					$opcion="miEspacio";
			}else 
				$menuactivo="";				
		?>		
		<div id="header">
			<div id="logo"> <img src="<?=IMAGES?>logo.jpg"/></div>
			
			<div id="datosClientes">
				<?php 
					if(isset($_SESSION['cliente_session'])) //Aquí se consulta el nombre del usuario(alumno) que inició sesión
					{
						echo '<b>'.getDatosClienteLogin($_SESSION['cliente_session']).' --></b>';
					}
				?>
				<b id="fechaActual"></b>
				
			</div>
			<h1><FONT SIZE=150><b> <?=AUTOR?> </b></font></h1>
			<!--Foto Perfil-->
			
				
			<div id="menu">
				<ul>
				  <li class="<?=$menuactivo==""?"current-menu-item":""?>"><a href="<?=ROOTURL?>">Home</a></li>
				  
				  <li class="<?=$opcion=="servicios"?$menuactivo:""?>"> <a href="<?=ROOTURL?>?accion=servicios">Servicios</a></li>
				  
				  <li class="<?=$opcion=="registro"?$menuactivo:""?>"> <a href="<?=ROOTURL?>?accion=registro">Registrate</a></li>	
				  
				  <!--Aquí se muestra el menú de opciones de acuerdo si se que inició sesión o no-->
				  <?php if(isset($_SESSION['cliente_session'])){ ?> <!-- $_SESSION, son variables de sesión o también conocidas como cookies -->
				  
				  <li class="<?=$opcion=="miEspacio"?$menuactivo:""?>"> <a href="<?=ROOTURL?>?accion=miEspacio">Mi espacio</a>
						<ul>
							<li><a href="<?=ROOTURL?>?accion=misCompras">Mis Compras</a></li>
							<li><a href="<?=ROOTURL?>?accion=addTarjetas">Agregar Tarjetas </a></li>
							<li><a href="<?=ROOTURL?>?accion=listTarjetas">Lista de Tarjetas </a></li>
							<li><a href="<?=ROOTURL?>?accion=miPerfil">Mi Perfil</a></li>
						</ul>
					</li>
					
					
				  <!--ESPACIO NUEVO PARA COMENTARIOS-->
				  <li class="<?=$opcion=="comentarios"?$menuactivo:""?>"> <a href="<?=ROOTURL?>?accion=comentarios">Comentarios</a>
						<ul>
							<li><a href="<?=ROOTURL?>?accion=misSugerencias">Sugerencias </a></li>
							<li><a href="<?=ROOTURL?>?accion=misQuejas">Quejas</a></li>
						</ul>
					</li>
				  <!--FIN DE ESPACIO NUEVO PARA COMENTARIOS-->
				  
				  
					<li><a href="Login/logout.php">Cerrar Sesi&oacute;n</a></li>
					
				  <?php } else { ?>
					
					<li class="<?=$accion=="login"?$menuactivo:""?>"><a href="<?=ROOTURL?>?accion=login">Iniciar Sesi&oacute;n</a></li>
				  <?php } ?>
				  
				  
				  <?php
				  
					$cantidad = 0; 
					if(isset($_SESSION['carrito'])){
						foreach($_SESSION['carrito'] as $Id_Servicios => $campos)
							$cantidad += $campos['cantidad'];
						
						if (count($_SESSION['carrito'])==0)
							unset($_SESSION['carrito']);
					}
				  ?>
				  <li class="<?=$opcion=="carrito"?$menuactivo:""?>"> <a href="<?=ROOTURL?>?accion=carrito">Carrito (<?=$cantidad?>) </a></li>
				  
				</ul></br>
			</div>
		</div>
		