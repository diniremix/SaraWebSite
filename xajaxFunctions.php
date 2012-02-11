<?php 
	/* Implementacion de xajax
	* para crear las conexiones de las clases
	* y otras configuraciones necesarias
	* para el funcionamiento correcto de xajax
	*/
	require_once("usuariosClass.php");
	require_once("pinesClass.php");
	require_once("loginClass.php");
	$xajax = new xajax();
	$xajax->configure("debug", true);
	$xajax->register(XAJAX_FUNCTION,"usuarios");
	$xajax->register(XAJAX_FUNCTION,"pines");
	$xajax->register(XAJAX_FUNCTION,"login");
	
	//desactivar modo debug para produccion
	$xajax->configure("debug", true);
	$xajax->configure('javascript URI','../xajax0_6');
	$xajax->processRequest(); 			
	$xajax->printJavascript(); 
?>
