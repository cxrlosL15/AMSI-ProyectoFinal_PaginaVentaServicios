<?php
//librerias o extensiones, ayudan a realizar funcionalidades sin codificar todo

//aquí se establece la conexion con los datos de donde se encuenta mi base de datos
$conexion = new mysqli(DBHOST,DBUSER,DBPASSWD,DBNAME);

//si falla la conexion , que me muestre el error
if($conexion->connect_error)
{
	die("Conexión fallida".$conexion->connect_error);
}

//echo 'conexion exitosa';

//para que no salgan simbolos o espacio en negro en los acentos
$query = "SET NAMES 'utf8'";

// el signo de admiración quiere decir SINO ES EXITO
if(!$resultado= mysqli_query($conexion,$query))
{
	exit(mysql_error($conexion));
}

?>