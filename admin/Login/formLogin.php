<html>	
		<head>
	        <meta charset="UTF-8">
			<meta name="description" content="Venta de articulos de papeleria, 5DM, Desarrollla aplicaciones web con conexi&oacute;n a base de datos">
			<meta name="keywords" content="Articulos de papeleria, articulos escolares, programacion, CETis58, emiliano zapata">
			
			<meta name="author" content="<?=AUTOR?>">
			<title> <?=SITENAME?> | <?=AUTOR?>  </title>
			
			<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
            <link rel="icon" href="favicon.ico" type="image/x-icon">	
			
			<link rel="stylesheet" type="text/css" href="<?=CSS?>login.css" />
		</head>
	<body>	
		<center>
			<form name="formLogin" id="formLogin" action="Login/loginProcess.php" method="POST">
				<input type="hidden" name="accion" id="accion" value="login"  />
				
				<br><h1 class="title">¡Papeler&iacute;a Dorada!</h1>
				
				<div id="logo">
					<img src="<?=IMAGES?>papeleria.jpg" />
				</div>
				
				<h2 class="title">Inicio de sesi&oacute;n</h2>
				
				<input type="text" name="NombreUsuario" id="NombreUsuario" placeholder="Escribe nombre de usuario" required  />
				<br>
				<input type="password" name="Contrasena" id="Contrasena" placeholder="Escribe contrase&ntilde;a" required  />
				<br>
				<input type="submit" name="btnLogin" id="btnLogin" value="Ingresar"  />
				
			</form>
		</center>
	</body>
</html>