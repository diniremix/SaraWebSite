<?php
echo '
<!-- formulario de Matriculas -->
						<div id="menunumatr" class="menunumatr">
						<hr/>
							<div class="pad20">
								<form method="#" action="#" onsubmit = "return false;">
								<!-- Fieldset -->
									<fieldset>
										<legend>Formulario de Matriculas</legend>										
										<p align="left">
											<label for="identi">Identificaci&oacute;n:</label>
											<input id="identi" name="identi" type="text" value="" />
											<label for="dlglinknac">Nacimiento:</label>
											<a href="#" class="button tooltip" title="buscar fecha de nacimiento!" id="dlglinknac"><span class="ui-icon ui-icon-newwin"></span>Ver</a>
											
										</p>
										<p align="left">										
											<label for="nombres">Nombres:</label>					
											<input id="nombres" name="nombre" type="text" value="" />
											<label for="apellidos">Apellidos:</label>
											<input align="right" id="apellidos" name="apellidos" type="text" value="" />
										</p>
										<p>
											<label for="casa">Direcci&oacute;n Resid:</label>
											<input id="casa" name="casa" type="text" value="" />
											<label for="tele">Telefono resid: </label>
											<input id="tele" name="tele" type="text" value="" />
										</p>										
										<p>											
											<label for="scivil">Estado civil:</label>
											<select name="scivil" id="scivil">
												<option value="0" selected>seleccione</option>
												<option value="1" >Soltero(a)</option>
												<option value="2" >Casado(a)</option>
												<option value="3" >Viudo(a)</option>
												<option value="3" >Divorciado(a)</option>
												<option value="3" >Uni&oacute;n libre</option>
											</select>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<label for="strato">Estrato Social:</label>
											<select name="strato" id="strato">
												<option value="0" selected>seleccione</option>
												<option value="1" >0</option>
												<option value="2" >1</option>
												<option value="3" >2</option>
												<option value="3" >3</option>
												<option value="3" >4</option>
											</select>
										</p>										
										<p>
											<label for="icfes">Codigo Icfes:</label>
											<input id="icfes" name="icfes" type="text" value="" />
											<label for="annop">A&ntilde;o presentaci&oacute;n:</label>
											<select name="annop" id="annop">
												<option value="0" selected>seleccione</option>
												<option value="1" >2012</option>
												<option value="2" >2011</option>
												<option value="3" >2010</option>
											</select>																																
										</p>
										<p>
											<label for="email">Correo electr&oacute;nico:</label>
											<input id="email" name="email" type="email" value="" />
											<label for="ciudad">Ciudad:</label>
											<select name="ciudad" id="ciudad">
												<option value="0" selected>seleccione</option>
												<option value="1" >Monteria</option>
												<option value="2" >Ceret&eacute;</option>
												<option value="3" >Lor&iacute;ca</option>
											</select>
										</p>
										<p>
											<label for="npin">Numero PIN: </label>
											<input id="npin" name="npin" type="text" value="" />
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