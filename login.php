<?php 
	require_once("xajaxFunctions.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Meta -->
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<!-- End of Meta -->
		
		<!-- Page title -->
		<title>Sistema Administrativo de Registro Academico::SARA</title>
		<!-- End of Page title -->
		
		<!-- Libraries -->
		<link type="text/css" href="css/login.css" rel="stylesheet" />	
		<link type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css" rel="stylesheet" />	
		
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/easyTooltip.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript" src="js/startup.js"></script>
		<!-- End of Libraries -->	
	</head>
	<body>
	<div id="container">
		<div class="logo">
			<a href=""><img src="assets/logo.png" alt="" /></a>
		</div>
		<div id="box">
			<div id="boxlogin" name="boxlogin">		
				<div id="msglogin" name="msglogin">
					<!-- mensaje de xajax-->
				</div>
				<form id="formlogin" name="formlogin" onsubmit = "return false;">
					<p class="main">
						<label for="username">Usuario:</label>
						<input id="username" name="username" placeholder="nombre de usuario" /> 
						<label for="password">Contrase&ntilde;a:</label>
						<input id="password" name="password" type="password"  placeholder="contrase&ntilde;a">	
					</p>
					<p class="space">
						<input id="btlogin" name="btlogin" type="submit" value="Entrar" class="login" onClick="xajax_login(xajax.getFormValues('formlogin'),'login'); return false;"/>
						<span>
							<input id="checksave" name="checksave" type="checkbox"/>Recordar esta cuenta
						<br>
							olvid&eacute; el <a href="#" onclick="recpass();">nombre de usuario y/&oacute; contrase&ntilde;a</a>
						</span>	
						<br>
					</p>
				</form>
			</div>

			<div id="boxrecpass" name="boxrecpass">
				<form id="formrest" name="formrest" onsubmit = "return false;">
					<p class="main">
						<label for="edmail">Email:</label>
						<input id="edmail" name="edmail" placeholder="admin@sara.co" /> 			
						<label for="username2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Usuario:</label>
						<input id="username2" name="username2" placeholder="nombre de usuario" />
					</p>				
					<p class="space">
							<input id="btrest" name="btrest" type="submit" value="Reestablecer" class="login" onClick= "xajax_login(xajax.getFormValues('formrest'),'restablecer'); return false;"/>				
						<span>
							<div id="msgrest" name="msgrest">
									<!-- mensaje de xajax-->						
							</div>			
							<a href="#" onclick="login();">Iniciar sesi&oacute;n</a>
						</span>	
						<br>
					</p>
				</form>
			</div>
	</div>
	</body>
	<script type="text/javascript">
		$("#boxrecpass").hide(10);
		function recpass(){
			console.log('cargando boxrecpass');
			$("#boxlogin").hide(200);
			$("#boxrecpass").show(200);
		}
		function login(){
			console.log('cargando boxlogin');
			$("#boxrecpass").hide(200);
			$("#boxlogin").show(200);
		}
	</script>
</html>
