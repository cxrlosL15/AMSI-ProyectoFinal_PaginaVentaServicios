<?php

if($_SERVER['SERVER_NAME']=='localhost' || $_SERVER['SERVER_NAME']=='127.0.0.1')
{
	define('ROOTURL','http://'.$_SERVER['SERVER_NAME'].'/Juno_Jobs/');
	define('DOCROOT',$_SERVER['DOCUMENT_ROOT'].'/Juno_Jobs/');

	define('SITENAME','junoJobs.com');
	define('AUTOR','Juno Jobs');
	define('CSS',ROOTURL.'css/');
	define('JS',ROOTURL.'js/');/*funcionalidades javascript*/
	define('IMAGES',ROOTURL.'images/');
	
	/**/
	define('IMAGES_ORIGEN','http://'.$_SERVER['SERVER_NAME'].'/Juno_Jobs/admin/');
	
	define('DBHOST','localhost');
	define('DBUSER','root');//este es el nombre de usuario para entrar a phpMyAdmin
	define('DBPASSWD','');//ESTA ES LA CONTRASEÑA PARA ENTRAR A PHPMYADMIN
	define('DBNAME','juno_jobs');//nombre de mi base de datos a utilizar
	
	define('HEADERCLIENTE',DOCROOT.'headerCliente.php');
	define('FOOTERCLIENTE',DOCROOT.'footerCliente.php');
}
include_once('funcionesCliente.php');
session_start();//aquí ya estoy indicando que estoy utilizando variables de sesion
ini_set("display_errors","On");
?>