		</div> <!-- CERRANDO DIV CONTENEDOR -->
		<?php
		$fecha_php = date("d/m/Y"); // Fecha y hora generada por PHP
		?>
		<div id="footer" >

		<h3> <center>
			<!--?php
				echo date ("d")."/" .date("M")."/" .date("Y");
				
			?-->
			<b id="fechaActual" >
				<?php
				echo $fecha_php ?>
			</b>
			<!--onload="horaActual()"-->
			<h1> JUNO JOBS </h1>
			 <br>
			
            Conoce nuestras redes sociales:
			<br>
			<div id="fotosRedesSociales"> 
                    <a><image src= "images/facebook.png" style="width:48px;height:48px;"></a>
                    <a ><image src= "images/instagram.png" style="width:48px;height:48px;"></a>
                    

			</div>
			Correo de Contacto: Juno_Jobs@gmail.com
			<br>
		</div>
	</body>
</html>