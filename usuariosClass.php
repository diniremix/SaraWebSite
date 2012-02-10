<?php
	require_once ("../xajax0_6/xajax_core/xajax.inc.php");
	//conjunto de funciones para el manejo de usuarios
	class UsuariosClass {
		var $conn;
	 	var $host;
	 	var $username;
	 	var $password;
	 	var $db;
	 	
	 	function UsuariosClass(){
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
		
		function getUsuario($datoUser){
			//busca un unico usuario para su modificacion 
			$sql_query="SELECT * FROM `usuarios` WHERE identificacion=$datoUser";
			$result = mysql_query($sql_query);			
			$row=mysql_fetch_assoc($result);
			return $row;		
		}	
				
		function getUsuarios(){
			//lista todos los usuarios
			$sql_query="SELECT * FROM `usuarios`";
			$result = mysql_query($sql_query);												
			$consulta='<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
		<thead>
			<tr>
				<td>No.</td>
				<td>identificaci&oacute;n</td>
				<td>Usuario</td>
				<td>Nombres</td>
				<td>Acciones</td>
			</tr>
		</thead><tbody>';
			$clase='<tr class="odd">';
			$i=0;
			while ($row=mysql_fetch_array($result)){
				$i++;
				$ide=$row['identificacion'];
				if($i%2!=0){
					$consulta.= $clase;
				}else{
					$consulta.='<tr>';
				}
				$consulta.= '   <td>'.$row['id'].'</td>
								<td>'.$row['identificacion'].'</td>
								<td><strong>'.$row['user'].'</strong></td>
								<td>'.$row['nombres'].' '.$row['apellidos'].'</td>
								<td><a href="#" onclick="xajax_usuarios(\''.$ide.'\',\'eliminar\'); return false;" class="button" title="Eliminar un usuario"\''. $ide.'\'"><span class="ui-icon ui-icon-trash"></span></a>
									<a href="#" onclick="xajax_usuarios(\''.$ide.'\',\'modificar\'); return false;" class="button" title="Modificar un usuario"><span class="ui-icon ui-icon-pencil"></span></a>
								</td>
							</tr>';							
			}
			$consulta.='</tbody></table>
	';
			return $consulta;						
		}
			
		function setUsuario($form){
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
		function delUsuario($data){
			//eliminar un usuario
			$query_del="DELETE FROM `usuarios` WHERE `identificacion`=$data";
			$result1 = mysql_query($query_del);			
			return true;							
		}
		
	}//conexionClass 
	
	function usuarios($formData,$param){
		//menu ppal
		$objResponse = new xajaxResponse();
		$objconexion = new UsuariosClass();
		$objconexion->connect();
		$div='';
		switch ($param) {
			case 'buscarTodo' :
					$objResponse->call("alluser");
					$div=$objconexion->getUsuarios();
					$objResponse->assign("msgbuser","innerHTML",$div);										
			break;
			case 'guardar' :
					if($ok=$objconexion->setUsuario($formData)){
						$div='<div id="tipsuccess" name="tipsuccess" class="message success close"><h2>Felicidades!</h2><p>El usuario ha sido guardado con exito.</p></div>';						
					}else{
						$div='<div id="tiperror" name="tiperror" class="message error close"><h2>Alerta!</h2><p>El usuario NO pudo ser guardado en la base de datos.</p></div>';
					}
					$objResponse->assign("msguser","innerHTML",$div);
			break;	
			case 'eliminar' :
				$objResponse->alert('Eliminando usuario');
				if($ok=$objconexion->delUsuario($formData)){
					$objResponse->call("alluser");
					//$objResponse->call("alluser");
				}
			break;
			case 'modificar' :
				$objResponse->alert('modificando datos de usuario');			
				if($ok=$objconexion->getUsuario($formData)){
					$objResponse->assign("identi", "value", $ok['identificacion']);
					$objResponse->assign("nombres", "value", $ok['nombres']);
					$objResponse->assign("apellidos", "value", $ok['apellidos']);
					$objResponse->assign("user", "value", $ok['user']);
					$objResponse->assign("pass", "value", $ok['contrasenna']);
					$objResponse->assign("tuser", "value", $ok['usuario_tipo']);
					$objResponse->call("alluser");
					$objResponse->call("nuevouser");
				}
			break;
			default :
				$div='<div id="tipwarning" name="tipwarning" class="message warning close"><h2>Alerta!</h2><p>Ha ocurrido un Error inesperado!.</p></div>';
			break;
		}
		
		return $objResponse;
	}
?>
