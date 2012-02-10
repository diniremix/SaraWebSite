<?php
 echo '
<!-- menu de usuarios-->
<div id="menuser" class="menuser">
<script type = "text/javascript">
function llamar(){
	console.log(\'llamando a alluser...\'):
	alluser();
}
</script>
	<div class="pad20">
	<!-- Big buttons -->
		<ul class="dash">
			<li>
				<a href="#" onclick=\'nuevouser();\' title="Nuevo usuario" class="tooltip">
					<img src="assets/icons/users_two_48.png" alt="" />
					<span>Nuevo usuario</span>
				</a>
			</li>									
			<li>
				<a href="#" onclick="xajax_usuarios(\'data\',\'buscarTodo\'); return false;" title="Busqueda de usuarios" class="tooltip">
					<img src="assets/icons/logviewer.png" alt="" />
					<span>Buscar usuarios</span>
				</a>
			</li>
		</ul>
		<!-- End of Big buttons -->
	</div>
</div>
<!-- menu de usuarios-->
';
?>