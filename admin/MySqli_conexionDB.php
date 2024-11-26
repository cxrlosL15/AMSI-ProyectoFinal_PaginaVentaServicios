<?php

$conexion = new mysqli(DBHOST,DBUSER,DBPASSWD,DBNAME);

if($conexion->connect_error)
{
	die("Conexion fallida".$conexion->connect_error);
}

$query = "SET NAMES 'utf8'";

if(!$resultados= mysqli_query($conexion, $query))
{
	exit(mysql_error($conexion));
}

?>