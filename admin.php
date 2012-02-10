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
		<title>SARA</title>
		<!-- End of Page title -->
		
		<!-- Libraries -->
		<link type="text/css" href="css/startup.css" rel="stylesheet" />	
		<link type="text/css" href="css/layout.css" rel="stylesheet" />	
		
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/easyTooltip.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="js/hoverIntent.js"></script>
		<script type="text/javascript" src="js/superfish.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/startup.js"></script>		
		<!-- End of Libraries -->			
	</head>
	<body>
<!-- Container -->
		<div id="container">
		
			<!-- Header -->
			<div id="header">
				
				<!-- Top -->
				<div id="top">

					<!-- Logo -->
					<div class="logo"> 
						<!--<a href="#" title="Administration Home" class="tooltip"><img src="assets/logos.png" alt="Wide Admin" /></a> -->
					</div>
					<!-- End of Logo -->
					<?php
						include_once('infouser.php'); 
					?>					
				</div>
				<!-- End of Top-->
				<?php
					include_once('menubar.php'); 
				?>
				<?php
					include_once('search.php'); 
				?>					
			</div>
			<!-- End of Header -->
			
			<!-- Background wrapper -->
			<div id="bgwrap">

			<!-- Main Content -->
				<div id="content">
					<div id="main">
						<!--<h1>Reporte de <span>PIN</span></h1>
						<p>Sistema Administrativo de Registro Acad&eacute;mico</p>-->
						<h1>Bienvenido, <span>Admin</span>!</h1>
						<p>Qu&eacute; quieres hacer hoy?</p>
													
						<div id="bhome" name="bhome">
							<a href="#" onclick='mostrarppal();' class="button" title="Home!"><span class="ui-icon ui-icon-home"></span>Inicio</a>
						</div>
											
						<?php
							include_once('menuppal.php'); 
						?>							
						<?php
							//implementado
							include_once('menuser.php'); 
						?>						
						<?php
							//implementado
							include_once('menunuser.php'); 
						?>
						<?php
							//implementado
							include_once('menutuser.php'); 
						?>
						<?php
							//implementado
							include_once('menupines.php'); 
						?>	
						<?php
							//implementado
							include_once('menunupin.php'); 
						?>
						<?php
							//implementado
							include_once('menutpin.php'); 
						?>																				
						<?php
							include_once('menumatr.php'); 
						?>
						<?php
							include_once('menunumatr.php'); 
						?>	
						<?php
							include_once('menutmatr.php'); 
						?>																				
						<?php
							include_once('dlgnac.php'); 
						?>	
					</div><!-- Main Content -->
				</div>
			<!-- End of Main Content -->
				<?php
					include_once('sidebar.php'); 
				?>			
			</div>
		<!-- End of bgwrap -->
	</div>
	<!-- End of Container -->
	<?php
		include_once('footer.php'); 
	?>
</body>
<?php
include_once('menujs.php'); 	
?>
</html>
