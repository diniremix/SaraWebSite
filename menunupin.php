<?php
echo ' 
<!-- formulario de PIN -->
<div id="menunupin" class="menunupin">
<hr/>
	<div class="pad20">
		<form method="#" action="#" onsubmit = "return false;">
		<!-- Fieldset -->
			<fieldset>
				<legend>Formulario de PIN</legend>
				<p>
					<label for="tanno">a&ntilde;o: </label>
					<select name="tanno" id="tanno">
						<option value="0" selected>seleccione</option>
						<option value="1" >2012</option>
						<option value="2" >2011</option>
						<option value="3" >2010</option>
					</select>
				</p>
				<p>
					<label for="mesa">Expedido en: </label>
					<select name="mesa" id="mesa">
						<option value="0" selected>seleccione</option>
						<option value="1" >Enero</option>
						<option value="2" >Febrero</option>
						<option value="3" >Marzo</option>
					</select>
				</p>
				<p>
					<label for="mesb">Expira en:</label>
					<select name="mesb" id="mesb">
						<option value="0" selected>seleccione</option>
						<option value="1" >Enero</option>
						<option value="2" >Febrero</option>
						<option value="3" >Marzo</option>
					</select>
				</p>										
					<p>
						<label for="code">C&oacute;digo: </label>
						<input id="code" name="code" class="sf" type="text" value="" />
						
					</p>
				<p>
				</p>
				<p>
					<span class="validate_error">Todos los campos son requeridos.!</span>
				</p>
				<p align="center">
				<input id="btpinr" name="btpinr" class="button" type="reset" value="Cancelar">
				<input id="btping" name="btping" class="button" type="submit" value="Generar">
				</p>
			</fieldset>
				<!-- End of fieldset -->									
		</form>
	</div>
</div>							
<!-- formulario de PIN -->
';
?>
