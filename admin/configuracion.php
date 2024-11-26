<?php
	if($_SERVER['SERVER_NAME']=='localhost' || $_SERVER['SERVER_NAME']=='127.0.0.1')
{
                    
    define('ROOTURL', 'http://localhost/papeleriaDorada_cetis58_5DM/admin/');
    define('DOCROOT',$_SERVER['DOCUMENT_ROOT'].'/papeleriaDorada_cetis58_5DM/admin/');
    define('AUTOR','Papeler&iacute;a Dorada Company');
    define ('SITENAME','Papeler&iacute;a Dorada.com');
                        
    define('IMAGES',ROOTURL.'images/');
	define ('LOGIN', ROOTURL.'css/login.css');

	define('CSS',ROOTURL.'css/');
    define('JS',ROOTURL.'js/');/*funcionalidades javascript*/

   define ('DBHOST','localhost');//Nombre de nuestro servidor, adminstrador de base de datos
    define ('DBUSER','root');//Nombre del usuario para accesar
    define ('DBPASSWD','');//Es la contraseña para accesar a la base de datos
    define ('DBNAME','papeleriadorada_cetis58_5dm');//Nombre de la base de datos
	
	define ('HEADERADMIN', DOCROOT.'header.php');
	define ('FOOTERADMIN', DOCROOT.'footer.php');
}

	include_once('funciones.php');
	session_start();
	ini_set("display_errors","On");
?>