<!DOCTYPE html>
<html>
      <head>
	        <meta charset="UTF-8">
			<meta name="description" content="Venta de articulos de papeleria, 5DM, Desarrolla aplicaciones web con conexi&oacute;n a base de datos">
			<meta name="keywords" content="Articulos de papeleria, articulos escolares, programacion, CETis58, emiliano zapata">
			
			<meta name="author" content="<?=AUTOR?>">
			<title> <?=SITENAME?> | <?=AUTOR?> </title>
			
			<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
			<link rel="icon" href="/favicon.ico" type="image/x-icon">
			
			<link rel="stylesheet" type="text/css" href="<?=CSS?>miEstilo.css" /> 
			<link rel="stylesheet" type="text/css" href="<?=CSS?>tabla.css" />
			<link rel="stylesheet" type="text/css" href="<?=CSS?>menu.css" />
			<link rel="stylesheet" type="text/css" href="<?=CSS?>formulario.css" />
			
			<script src="<?=JS?>fechaActual.js"></script>
       </head>
	   
	   <body onload="horaActual()">
		<?php	

			$opcion=""; $accion="";

			if(isset($_GET['accion']))
			{
				$menuactivo="current-menu-item"; 
				$opcion = $accion=$_GET['accion'];
				
			}else 
				$menuactivo="";				
		?>	
		<div id="header"> <!-- el div es un contenedor o cajón -->
			
			<div id="logo"><img src="<?=IMAGES?>papeleria.jpg" /></div>
			
			<div id="datosAlumnos">
				<?php 
					if(isset($_SESSION['user_session'])) //Aquí se consulta el nombre del usuario que inició sesión
					{
						echo '<br><-- '.$_SESSION['user_session']['Nombre'].' --></br>';
					}
					//print_r($_SESSION['user_session']);
				?>
				<b id="fechaActual"></b>
			</div>
			<h1>Papeler&iacute;a Dorada</h1>
			<div id="menu">
				<ul>	
				<?php $puesto = $_SESSION['user_session']['Puesto'];?>
				
				<?php if($puesto == 'CAPTURISTA' || $puesto =='SUPERVISOR' || $puesto =='SUPERADMIN') 
						{	?>	
						<li>Clientes
							<ul>
								<li><a href="<?=ROOTURL?>?accion=listClientes">Lista Clientes</a></li>
								<li><a href="<?=ROOTURL?>?accion=addCliente">Registrar Cliente</a></li>
							</ul>			
						</li>
				<?php 	} 	?>
				<?php if($puesto == 'CAPTURISTA') 
						{	?>
						<li>Art&iacute;culos
							<ul>
								<li><a href="<?=ROOTURL?>?accion=listArticulos">Lista Art&iacute;culos</a></li>
							</ul>			
						</li>
				<?php 	} 	?>	
				<?php if($puesto =='SUPERVISOR' || $puesto =='SUPERADMIN') 
						{	?>		
						<li>Art&iacute;culos
							<ul>
								<li><a href="<?=ROOTURL?>?accion=listArticulos">Lista Art&iacute;culos</a></li>
								<li><a href="<?=ROOTURL?>?accion=addArticulo">Registrar Art&iacute;culos</a></li>
							</ul>			
						</li>
				<?php 	} 	?>	
				
				<?php if($puesto == 'CAPTURISTA' || $puesto =='SUPERVISOR' || $puesto == 'GERENTE' || $puesto =='SUPERADMIN') 
						{	?>	
						<li>Ventas
							<ul>
								<li><a href="<?=ROOTURL?>?accion=listVentas">Lista Ventas</a></li>
								<li><a href="<?=ROOTURL?>?accion=addVentas">Registrar Ventas </a></li>
							</ul>			
						</li>
				<?php 	} 	?>
				
				<?php if($puesto =='DUENO' || $puesto == 'GERENTE' || $puesto =='SUPERADMIN') 
						{	?>
						<li><a href="<?=ROOTURL?>?accion=reportes">Reportes</a></li>
				<?php 	} 	?>
				<?php if($puesto =='SUPERVISOR' || $puesto =='SUPERADMIN') 
						{	?>
						<li><a href="<?=ROOTURL?>?accion=reportesSupervisor">Reportes Supervisor</a></li>
				<?php 	} 	?>
				<?php if($puesto == 'GERENTE' || $puesto =='SUPERADMIN') 
						{	?>
						
						<li>Usuarios
							<ul>
								<li><a href="<?=ROOTURL?>?accion=listUsuarios">Lista Usuarios</a></li>
								<li><a href="<?=ROOTURL?>?accion=addUsuario">Registrar Usuario</a></li>
							</ul>			
						</li>
				<?php 	} 	?>
				
				<!--ESPACIO NUEVO PARA COMENTARIOS-->
				<?php if($puesto == 'GERENTE' || $puesto =='SUPERADMIN') 
						{	?>
						
						<li>Comentarios
							<ul>
								<li><a href="<?=ROOTURL?>?accion=listQuejas">Lista quejas Clientes</a></li>
								<li><a href="<?=ROOTURL?>?accion=listSugerencias">Lista sugerencias Clientes</a></li>
							</ul>			
						</li>
				<?php 	} 	?>
				<!--FIN DE ESPACIO NUEVO PARA COMENTARIOS-->
				
					<?php 	if(isset($_SESSION['user_session'])){?>
							
							<li><a href="Login/logout.php" >Cerrar Sesi&oacute;n</a></li>
						
					<?php }?>
						
				</ul></br>
			</div>
		</div>
		<div id="contenedor">
		</body>
</html>