<?php
echo '
<!-- menu  de Matriculas-->
<div id="menumatr" class="menumatr">
	<div class="pad20">
	<!-- Big buttons -->
		<ul class="dash">
			<li>
				<a href="#" onclick=\'nuevaMatr();\' title="Matricular nuevo estudiante" class="tooltip">
					<img src="assets/icons/16_48x48.png" alt="" />
					<span>Nueva matricula</span>
				</a>
			</li>
			<li>
				<a href="#" onclick="xajax_matriculas(\'data\',\'buscarTodo\'); return false;" title="Busqueda de estudiantes matriculados" class="tooltip">
					<img src="assets/icons/alacarte.png" alt="" />
					<span>Busqueda</span>
				</a>
			</li>
		</ul>
		<!-- End of Big buttons -->
	</div>
</div>
<!-- menu  de Matriculas-->
';
?>