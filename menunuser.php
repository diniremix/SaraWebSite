<?php
echo '
<!-- menu nuevos usuarios-->
<div id="menunuser" class="menunuser">
<hr/>
	<div class="pad20">
	<!-- Big buttons -->
		<form id="fnuser" name="fnuser" onsubmit = "return false;">
		<!-- Fieldset -->
		<div id="msguser" name="msguser">			
		</div>
			<fieldset>
				<legend>Registro de usuarios nuevos</legend>
				<p align="left">
					<label for="identi">Identificaci&oacute;n: </label>
					<input id="identi" name="identi" type="text" value="" />
				</p>
				<p align="left">										
					<label for="nombres">Nombres: </label>					
					<input id="nombres" name="nombres" type="text" value="" />
					<label for="apellidos">Apellidos: </label>
					<input align="right" id="apellidos" name="apellidos" type="text" value="" />
				</p>
				<p>
					<label for="user">Usuario: </label>
					<input id="user" name="user" type="text" value="" />
					<label for="pass">Contrase&ntilde;a: </label>
					<input id="pass" name="pass" type="password" value="" />
				</p>
				<p>
					<label for="tuser">Tipo de usuario: </label>
					<select name="tuser" id="tuser">
						<option value="0" selected>seleccione</option>
						<option value="1" >Administrador</option>
						<option value="2" >Docente</option>
						<option value="3" >Otro</option>
					</select>
				</p>
				<p>
				</p>
				<p>
					<span class="validate_error">Todos los campos son requeridos.!</span>
				</p>
				<p align="center">
				<input id="btreset" name="btreset" class="button" type="reset" value="Cancelar">
				<input id="btsend" name="btsend" class="button" type="submit" value="Registrar" onClick= "xajax_usuarios(xajax.getFormValues(\'fnuser\'),\'guardar\'); return false;">
				</p>
			</fieldset>
				<!-- End of fieldset -->									
		</form>
		<!-- End of Big buttons -->
	</div>
</div>
<!--menu nuevos usuarios-->	
'; 
?>