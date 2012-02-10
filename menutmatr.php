<?php
echo '
<!-- tabla de Matriculas -->
<div id="menutmatr" class="menutmatr">
	<hr/>
	<div class="pad20">
	<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
		<thead>
			<tr>
				<td><input type="checkbox" class="checkall" /></td>
				<td>No.</td>
				<td>Identificaci&oacute;n</td>
				<td>C&oacute;digo Icfes</td>
				<td>Estado</td>
			</tr>
		</thead>
		<tbody>
			<tr class="odd">
				<td><input type="checkbox" /></td>
				<td>1</td>
				<td>10965813</td>
				<td>SN54321</td>
				<td><strong>Activo</strong></td>
			</tr>
			<tr>
				<td><input type="checkbox" /></td>
				<td>2</td>
				<td>78965256</td>
				<td>SN78945</td>
				<td><strong>Inactivo</strong></td>
			</tr>									
		</tbody>
	</table>
	<p>
		<a href="#" class="button" title="Eliminar una matricula"><span class="ui-icon ui-icon-trash"></span>Eliminar</a>
		<a href="#" class="button"><span class="ui-icon ui-icon-extlink"></span>Exportar</a>								
		<a href="matrPdf.php" class="button"><span class="ui-icon ui-icon-print"></span>Imprimir</a>								
	</p>
	</div>
</div>												
<!-- tabla de Matriculas -->
'; 
?>