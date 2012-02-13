<?php
echo '
<!-- formulario de Matriculas -->
<div id="menunumatr" class="menunumatr">
<hr/>
	<div class="pad20">
		<form id="fmatr" name="fmatr" onsubmit = "return false;">
		<!-- Fieldset -->
			<div id="msgmatr" name="msgmatr">
				<!-- mensaje de xajax-->						
			</div>
			<fieldset>
				<legend>Formulario de Matriculas a&ntilde;o:'.date("Y").'</legend>										
				<p align="left">
					<label for="midenti">Identificaci&oacute;n:</label>
					<input id="midenti" name="midenti" type="text" value="" />
					<label for="dlglinknac">Nacimiento:</label>
					<a href="#" class="button tooltip" title="buscar fecha de nacimiento!" id="dlglinknac"><span class="ui-icon ui-icon-newwin"></span>Ver</a>
				</p>
				<p align="left">										
					<label for="nombres">Nombres:</label>	
					<input id="nombres" name="nombres" type="text" value="" />
					<label for="apellidos">Apellidos:</label>
					<input align="right" id="apellidos" name="apellidos" type="text" value="" />
				</p>
				<p>
					<label for="sexo">Sexo:</label>
					<select id="sexo" name="sexo"  >
						<option value="0" selected>seleccione</option>
						<option value="1" >Masculino</option>
						<option value="2" >Femenino</option>
						<option value="3" >Otro</option>
					</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
					<label for="scivil">Estado civil:</label>
					<select name="scivil" id="scivil">
						<option value="0" selected>seleccione</option>
						<option value="1" >Soltero(a)</option>
						<option value="2" >Casado(a)</option>
						<option value="3" >Viudo(a)</option>
						<option value="4" >Divorciado(a)</option>
						<option value="5" >Separado(a)</option>
						<option value="6" >Uni&oacute;n libre</option>
					</select>
				</p>										
				<p align="left">											
					<label for="strato">Estrato Social:</label>
					<select name="strato" id="strato">
						<option value="0" selected>seleccione</option>
						<option value="1" >0</option>
						<option value="2" >1</option>
						<option value="3" >2</option>
						<option value="4" >3</option>
						<option value="5" >4</option>
						<option value="6" >5</option>
					</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label for="ciudad">Ciudad:</label>
					<select name="ciudad" id="ciudad" align="right">
						<option value="0" selected>seleccione</option>
						<option value="1" >Monteria</option>
						<option value="2" >Ceret&eacute;</option>
						<option value="3" >Lor&iacute;ca</option>
					</select>
				</p>		
				<p align="left">		
					<label for="casa">Direcci&oacute;n Resid:</label>
					<input id="casa" name="casa" type="text" value="" />
					<label for="tele">Telefono resid: </label>
					<input id="tele" name="tele" type="text" value="" />
				</p>										
				<p align="left">
					<label for="icfes">Codigo Icfes:</label>
					<input id="icfes" name="icfes" type="text" value="" />
					<label for="annop">A&ntilde;o presentaci&oacute;n:</label>
					<select name="annop" id="annop">
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
				<p align="left">
					<label for="npin">Numero PIN: </label>
					<input id="npin" name="npin" type="text" value="" />
					<label for="email">Correo electr&oacute;nico:</label>
					<input id="email" name="email" type="email" value="" />
				</p>
				<p>
				</p>
				<p>
					<span class="validate_error">Todos los campos son requeridos.!</span>
				</p>
				<p align="center">
				<input id="btmatr" name="btmatr" class="button" type="reset" value="Cancelar">
				<input id="btmatm" name="btmatm" class="button" type="submit" value="Matricular">
				</p>
			</fieldset>
				<!-- End of fieldset -->									
		</form>
	</div>
</div>							
<!-- formulario de Matriculas -->
'; 
?>