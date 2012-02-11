<?php
	session_start();
	if (isset($_SESSION['session_login']) && isset($_SESSION['session_rol'])){
		/*echo "iniciada la sesion ";
		echo "<br>Usuario: ".$_SESSION['session_login'];
		echo "<br>Rol: ".$_SESSION['session_rol'];*/		
		header("Location: http://localhost/sara/admin.php");
	}else{
		header("Location: http://localhost/sara/login.php");
	} 
?>
