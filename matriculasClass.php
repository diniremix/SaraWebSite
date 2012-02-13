<?php
	require_once ("../xajax0_6/xajax_core/xajax.inc.php");
	//conjunto de funciones para el manejo de usuarios
	class matriculasClass {
		var $conn;
	 	var $host;
	 	var $username;
	 	var $password;
	 	var $db;
	 	
	 	function matriculasClass(){
	 		//Constructor
	 		$this->host='localhost';
	 		$this->username='root';
	 		$this->password='';
	 		$this->db='saradb';
	 	}
		
		function connect(){
			$conn = mysql_connect('localhost','root','') or die( mysql_error() );
			mysql_select_db('saradb',$conn) or die( mysql_error() );
			return $this->conn;
		}
		
		function getMatricula($datoUser){
			//busca un unico usuario para su modificacion 
			$sql_query="SELECT * FROM `matriculas` WHERE identif=$datoUser";
			$result = mysql_query($sql_query);			
			$row=mysql_fetch_assoc($result);
			return $row;		
		}	
				
		function getMatriculas(){
			//lista todos los usuarios
			$sql_query="SELECT * FROM `matriculas`";
			$result = mysql_query($sql_query);												
			$consulta='<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
		<thead>
			<tr>
				<td><input type="checkbox" class="checkall" /></td>
				<td>No.</td>
				<td>Identificaci&oacute;n</td>
				<td>C&oacute;digo Icfes</td>
				<td>Estado</td>
			</tr>
		</thead>
		<tbody>';
			$clase='<tr class="odd">';
			$i=0;
			$Estado="Inactivo";
			while ($row=mysql_fetch_array($result)){
				$i++;
				$ide=$row['identif'];
				if($row['Estado']>"0"){
					$Estado="Activo";
				}else{
					$Estado="Inactivo";					
				}
				if($i%2!=0){
					$consulta.= $clase;
				}else{
					$consulta.='<tr>';
				}
				$consulta.= '   <td>'.$row['id'].'</td>
								<td>'.$row['identif'].'</td>
								<td><strong>'.$row['cicfes'].'</strong></td>
								<td>'.$row['nombres'].' '.$row['apellidos'].'</td>
								<td>'.$Estado.'</td>
								<td><a href="#" onclick="xajax_matriculas(\''.$ide.'\',\'eliminar\'); return false;" class="button" title="Eliminar una Matricula"\''. $ide.'\'"><span class="ui-icon ui-icon-trash"></span></a>
									<a href="#" onclick="xajax_matriculas(\''.$ide.'\',\'modificar\'); return false;" class="button" title="Modificar una Matricula"><span class="ui-icon ui-icon-pencil"></span></a>
								</td>
							</tr>';							
			}
			$consulta.='</tbody></table>
	';
			return $consulta;						
		}
			
		function setMatricula($form){
			//guarda un usuario
			$identi=$form['identi'];
			$nombres=$form['nombres'];
			$apellidos=$form['apellidos'];
			$user=$form['user'];
			$pass=md5($form['pass']);
			$tuser=$form['tuser'];
			$sql_query="INSERT INTO `usuarios` (`identificacion`,`nombres`,`apellidos`,`user`,`contrasenna`,`usuario_tipo`)";
			$sql_query.=" VALUES($identi,'$nombres','$apellidos','$user','$pass',$tuser)";
			$result = mysql_query($sql_query);
			return true;
		}	
		function delMatricula($data){
			//eliminar un usuario
			$query_del="DELETE FROM `matriculas` WHERE `identif`=$data";
			$result1 = mysql_query($query_del);			
			return true;							
		}
		
	}//conexionClass 
	
	function matriculas($formData,$param){
		//menu ppal
		$objResponse = new xajaxResponse();
		$objconexion = new matriculasClass();
		$objconexion->connect();
		$div='';
		switch ($param) {
			case 'buscarTodo' :
					$objResponse->call("allMatr");
					$div=$objconexion->getMatriculas();
					$objResponse->assign("msgbmatr","innerHTML",$div);										
			break;
			case 'guardar' :
					if($ok=$objconexion->setMatricula($formData)){
						$div='<div id="tipsuccess" name="tipsuccess" class="message success close"><h2>Felicidades!</h2><p>La matricula ha sido guardada con exito.</p></div>';						
					}else{
						$div='<div id="tiperror" name="tiperror" class="message error close"><h2>Alerta!</h2><p>La matricula NO pudo ser guardada en la base de datos.</p></div>';
					}
					$objResponse->assign("msgmatr","innerHTML",$div);
			break;	
			case 'eliminar' :
				$objResponse->alert('Eliminando Matricula Academica');
				if($ok=$objconexion->delMatricula($formData)){
					$objResponse->call("allMatr");
					//$objResponse->call("alluser");
				}
			break;
			case 'modificar' :
				$objResponse->alert('modificando Matricula Academica');			
				if($ok=$objconexion->getMatricula($formData)){
					$objResponse->assign("identi", "value", $ok['identif']);
					$objResponse->assign("nombres", "value", $ok['nombres']);
					$objResponse->assign("apellidos", "value", $ok['apellidos']);
					$objResponse->assign("user", "value", $ok['user']);
					$objResponse->assign("pass", "value", $ok['contrasenna']);
					$objResponse->assign("tuser", "value", $ok['usuario_tipo']);
					$objResponse->call("allMatr");
					$objResponse->call("nuevaMatr");
				}
			break;
			default :
				$div='<div id="tipwarning" name="tipwarning" class="message warning close"><h2>Alerta!</h2><p>Ha ocurrido un Error inesperado!.</p></div>';
			break;
		}
		
		return $objResponse;
	}
?>
