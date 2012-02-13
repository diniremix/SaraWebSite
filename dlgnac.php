<?php
echo '
<!-- Dialogo de nacimiento -->
<form id="fdnac" name="fdnac" onsubmit = "return false;">
<div id="dlgnac" title="Di&aacute;logo de fecha de Nacimiento!">
<p>Favor Seleccione la fecha correspondiente a su <b>Nacimiento.</b></p>
<label for="tnac">A&ntilde;o: </label>
	<select name="tnac" id="tnac">
		<option value="0" selected>seleccione</option>
		';?>
		<?php
			$i=date("Y");
			$anno="";
			for ($i;$i>=1970;$i--) { 
				$anno.='<option value="'.$i.'">'.$i.'</option>';
			}
			echo $anno;
		?>						 
		<?php
		echo '
	</select>
	<label for="tmes">Mes: </label>
	<select name="tmes" id="tmes">
		<option value="0" selected>seleccione</option>
		<option value="1" >Enero</option>
		<option value="2" >Febrero</option>
		<option value="3" >Marzo</option>
	</select><br>
	<label for="tdia">Dia: </label>
	<select name="tdia" id="tdia">
		<option value="0" selected>seleccione</option>
		';?>
			<?php
				for ($i=1;$i<=31;$i++) { 
					$dias.='<option value="'.$i.'">'.$i.'</option>';
				}
				echo $dias;
			?>						 
			<?php
			echo '
	</select>
	</p>
	<p>
		<span class="validate_error">Todos los campos son requeridos.!</span>
	</p>
</div>
</form>

<!-- fin Dialogo de nacimiento -->
'; 
?>
