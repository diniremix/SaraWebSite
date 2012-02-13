<?php
echo ' 
<!-- formulario de PIN -->
<div id="menunupin" class="menunupin">
<hr/>
	<div class="pad20">
		<form id="fnpin" name="fnpin" onsubmit = "return false;">
		<div id="msgpin" name="msgpin">
			<!-- mensaje de xajax-->						
		</div>
		<!-- Fieldset -->
			<fieldset>
				<legend>Formulario de PIN</legend>
				<p>
					<label for="tanno">a&ntilde;o: </label>
					<select name="tanno" id="tanno">
						<option value="0" selected>seleccione</option>
						';?>						
						<?php
							$i=date("Y");
							$anno="";
							for ($i;$i>=2000;$i--) { 
								$anno.='<option value="'.$i.'">'.$i.'</option>';
							}
							echo $anno;
						?>						 
						<?php
						echo '						
					</select>
				</p>
				<p>
					<label for="mesa">Expedido en: </label>
					<select name="mesa" id="mesa">
						<option value="0" selected>seleccione</option>
						';?>
						<?php
							for ($i=1;$i<=12;$i++) { 
								$ames.='<option value="'.$i.'">'.$i.'</option>';
							}
							echo $ames;
						?>						 
						<?php
						echo '
					</select>
				</p>
				<p>
					<label for="mesb">Expira en:</label>
					<select name="mesb" id="mesb">
						<option value="0" selected>seleccione</option>
						';?>
						<?php
							for ($i=1;$i<=12;$i++) { 
								$bmes.='<option value="'.$i.'">'.$i.'</option>';
							}
							echo $bmes;
						?>						 
						<?php
						echo '
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
				<input id="btping" name="btping" class="button" type="submit" value="Generar" onClick= "xajax_pines(xajax.getFormValues(\'fnpin\'),\'guardar\'); return false;">
				</p>
			</fieldset>
				<!-- End of fieldset -->									
		</form>
	</div>
</div>							
<!-- formulario de PIN -->
';
?>
