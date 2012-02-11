<?php
	session_start();
	if (isset($_SESSION['session_login']) && isset($_SESSION['session_rol'])){
		header("Location: admin.php");
	}else{
		header("Location: login.php");
	} 
?>
