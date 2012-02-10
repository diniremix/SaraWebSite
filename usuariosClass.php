<?php
	//session_start();
	//if (isset($_SESSION['login'])){
	//conjunto de funciones
require_once ("../xajax0_6/xajax_core/xajax.inc.php");
	class UsuariosClass {
		var $conn;
	 	var $host;
	 	var $username;
	 	var $password;
	 	var $db;
	 	
	 	function conexion(){
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
			$objUser = new xajaxResponse();				
			$sql_query="SELECT * FROM `usuarios` WHERE identificacion=$datoUser";
			$result = mysql_query($sql_query);
			//$rowUser="";
			while ($row=mysql_fetch_array($result)){
			//$row= new array();
			//$rowUser=mysql_fetch_array($result);
			//$rowUser=mysql_fetch_assoc($result);
				//$rowUser=$row['identificacion'];				
				$objUser->assign("identi", "value", $row['identificacion']);
				$objUser->assign("nombres", "value", $row['nombres']);
				$objUser->assign("apellidos", "value", $row['apellidos']);
				$objUser->assign("user", "value", $row['user']);
				$objUser->assign("pass", "value", $row['contrasenna']);
				$objUser->assign("tuser", "value", $row['usuario_tipo']);
			}
			//return $rowUser;		
			//return $rowUser;
			return $objUser;
		}	
				
		function getUsuarios(){
			$sql_query="SELECT * FROM `usuarios`";
			$result = mysql_query($sql_query);												
			$consulta='<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<td>Nº</td>
					<td>Identificacion</td>
					<td>Nombres</td>
					<td>Usuario</td>
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
								<td>'.$row['nombres'].' '.$row['apellidos'].'</td>
								<td><strong>'.$row['user'].'</strong></td>
								<td><a href="#" onclick="xajax_usuarios(\'.$ide.\',\'eliminar\'); return false;"class="button" title="Eliminar un usuario"><span class="ui-icon ui-icon-trash"></span></a><a href="#" onclick="xajax_usuarios(\'.$ide.\',\'modificar\'); return false;"class="button" title="Modificar un usuario"><span class="ui-icon ui-icon-pencil"></span></a>
								</td>
							</tr>';							
			}
			$consulta.='</tbody></table>
	';
			return $consulta;						
		}
			
		function setUsuario($form){
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
			$query_del="delete from `usuarios` where identificacion=$data";
			$result1 = mysql_query($query_del);			
			return true;							
		}
		
	}//conexionClass 
	
	function usuarios($formData,$param){
		$objResponse = new xajaxResponse();
		//$objGraffiti = new graffiti($sHandle,$sWords);
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
						$div='<div id="msguser" name="msguser" class="message success close"><h2>Felicidades!</h2><p>El usuario ha sido guardado con exito.</p></div>';						
					}else{
						$div='<div id="msguser" name="msguser" class="message error close"><h2>Alerta!</h2><p>El usuario NO pudo ser guardado en la base de datos.</p></div>';
					}
					$objResponse->assign("msguser","innerHTML",$div);
			break;	
			case 'eliminar' :
				$objResponse->alert('esta seguro de eliminar este usuario');
				$objconexion->delUsuario($formData);
				$objResponse->call("alluser");
				$objResponse->call("alluser");
			break;
			case 'modificar' :
				$objResponse->alert('modificando datos de usuario');
				$objResponse->call("alluser");
				$objconexion->getUsuario($formData);
				/*$objResponse->assign("identi", "value", $fila['identificacion']);
				$objResponse->assign("nombres", "value", $fila['nombres']);
				$objResponse->assign("apellidos", "value", $fila['apellidos']);
				$objResponse->assign("user", "value", $fila['user']);
				$objResponse->assign("pass", "value", $fila['contrasenna']);
				$objResponse->assign("tuser", "value", $fila['usuario_tipo']);*/
				$objResponse->call("nuevouser");
			break;
			default :
				$div='<div id="msguser" name="msguser" class="message warning close"><h2>Alerta!</h2><p>Ha ocurrido un Error inesperado!.</p></div>';
			break;
		}
		
		return $objResponse;
	}

$xajax = new xajax();
$xajax->configure("debug", true);
$xajax->register(XAJAX_FUNCTION,"usuarios");
$xajax->configure('javascript URI','../xajax0_6');
$xajax->processRequest(); 			
?>
